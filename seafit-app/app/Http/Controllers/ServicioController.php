<?php

namespace App\Http\Controllers;

use App\Models\Clase;
use Illuminate\Http\Request;

class ServicioController extends Controller
{
    /**
     * Muestra la página principal de servicios con las clases de hoy.
     */
    public function index(Request $request)
    {
        // Capturamos el día de la URL, si no hay, usamos 'Lunes'
        $diaSeleccionado = $request->query('dia', 'Lunes');

        // Filtramos las clases para que la lista de "Hoy" cambie
        $clases = Clase::where('dia_semana', $diaSeleccionado)
            ->orderBy('hora_inicio', 'asc')
            ->get();

        return view('servicios.servicios', compact('clases', 'diaSeleccionado'));
    }

    /**
     * Muestra la agenda semanal filtrada por día.
     */
    public function agenda(Request $request)
    {
        // Capturamos el día de la URL o usamos Lunes por defecto
        $diaSeleccionado = $request->query('dia', 'Lunes');

        // Filtramos las clases por el día seleccionado
        $clases = Clase::where('dia_semana', $diaSeleccionado)
            ->orderBy('hora_inicio', 'asc')
            ->get();

        return view('servicios.agenda', compact('clases', 'diaSeleccionado'));
    }
}