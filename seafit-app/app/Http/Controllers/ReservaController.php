<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Clase;
use Illuminate\Support\Facades\Auth;

class ReservaController extends Controller
{
    public function reservar(Request $request, $id)
    {
        // Si no está logueado, lo mandamos al login
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        // Lógica de reserva (V1: Simulación de éxito)
        return back()->with('success', '¡Reserva confirmada!');
    }
}