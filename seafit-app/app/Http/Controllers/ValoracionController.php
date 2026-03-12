<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ValoracionController extends Controller
{
    public function enviar(Request $request)
    {
        // Esto simula que todo ha ido bien
        return back()->with('exito', '¡Solicitud enviada correctamente! Un entrenador te contactará pronto.');
    }
}