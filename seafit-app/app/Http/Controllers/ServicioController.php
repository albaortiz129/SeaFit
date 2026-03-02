<?php

namespace App\Http\Controllers;

use App\Models\Clase; // Importante para que pueda leer las clases de la DB
use Illuminate\Http\Request;

class ServicioController extends Controller
{
    /**
     * Muestra la oferta completa de servicios y clases.
     */
    public function index()
{
    // Obtenemos las clases que ya vimos que tienes en Tinker
    $clases = \App\Models\Clase::all(); 

    // IMPORTANTE: 'servicios.servicios' significa carpeta 'servicios' archivo 'servicios.blade.php'
    return view('servicios.servicios', compact('clases'));
}
}