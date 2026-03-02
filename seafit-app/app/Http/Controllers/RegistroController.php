<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class RegistroController extends Controller
{
    public function registrar(Request $request)
    {
        try {
            // 1. Validar los datos recibidos
            $validator = Validator::make($request->all(), [
                'nombre'           => 'required|string|max:255',
                'apellidos'        => 'required|string|max:255',
                'dni'              => 'required|string|unique:users,dni',
                'fecha_nacimiento' => 'required|date',
                'telefono'         => 'required|string|max:20',
                'email'            => 'required|email|unique:users,email',
                'password'         => 'required|string|min:6', // <--- AÑADIDO: Mínimo 6 caracteres
                'domicilio'        => 'required|string|max:255',
                'tarifa'           => 'required|string',
                'metodo_pago'      => 'required|string',
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'error' => 'Errores de validación',
                    'detalles' => $validator->errors()
                ], 422);
            }

            // 2. Crear el usuario
            $user = new User();
            $user->nombre = $request->nombre;
            $user->apellidos = $request->apellidos;
            $user->dni = $request->dni;
            $user->fecha_nacimiento = $request->fecha_nacimiento;
            $user->telefono = $request->telefono;
            $user->email = $request->email;
            $user->domicilio = $request->domicilio;
            $user->tarifa = $request->tarifa;
            $user->metodo_pago = $request->metodo_pago;
            
            // Ciframos la contraseña que viene del formulario de React
            $user->password = Hash::make($request->password);
            
            $user->save();

            return response()->json([
                'mensaje' => '¡Socio registrado con éxito en SeaFit!',
                'usuario_id' => $user->id,
                'email' => $user->email
            ], 201);

        } catch (\Exception $e) {
            Log::error('Error en Registro SeaFit: ' . $e->getMessage());
            return response()->json([
                'error' => 'No se pudo completar el registro',
                'debug' => $e->getMessage()
            ], 500);
        }
    }
}