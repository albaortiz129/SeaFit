<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ClaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
{
    // LUNES (Tus originales + extra)
    \App\Models\Clase::create([
        'nombre' => 'Yoga Flow',
        'instructor' => 'Lucía Méndez',
        'sala' => 'Sala Zen',
        'hora_inicio' => '09:00:00',
        'dia_semana' => 'Lunes',
        'capacidad_max' => 15,
        'descripcion' => 'Clase de yoga suave para empezar la semana con energía.'
    ]);

    \App\Models\Clase::create([
        'nombre' => 'Spinning Avanzado',
        'instructor' => 'Sergio Ciclo',
        'sala' => 'Sala Ciclo',
        'hora_inicio' => '10:30:00',
        'dia_semana' => 'Lunes',
        'capacidad_max' => 20,
        'descripcion' => 'Súbete a la bici a máxima potencia.'
    ]);

    // MARTES
    \App\Models\Clase::create([
        'nombre' => 'Crossfit Init',
        'instructor' => 'Marc Fuerza',
        'sala' => 'Box',
        'hora_inicio' => '08:30:00',
        'dia_semana' => 'Martes',
        'capacidad_max' => 12,
        'descripcion' => 'Iniciación a movimientos de fuerza.'
    ]);

    // MIÉRCOLES (Tu original de HIIT)
    \App\Models\Clase::create([
        'nombre' => 'HIIT Intenso',
        'instructor' => 'Carlos Fit',
        'sala' => 'Zona Funcional',
        'hora_inicio' => '18:00:00',
        'dia_semana' => 'Miércoles',
        'capacidad_max' => 20,
        'descripcion' => 'Quema grasa y mejora tu resistencia.'
    ]);

    // JUEVES
    \App\Models\Clase::create([
        'nombre' => 'Zumba Party',
        'instructor' => 'Sonia Ritmo',
        'sala' => 'Sala 1',
        'hora_inicio' => '19:00:00',
        'dia_semana' => 'Jueves',
        'capacidad_max' => 25,
        'descripcion' => 'Diversión y cardio al ritmo de la música.'
    ]);

    // VIERNES (Tu original de Spinning)
    \App\Models\Clase::create([
        'nombre' => 'Spinning Pro',
        'instructor' => 'Sergio Ciclo',
        'sala' => 'Sala Ciclo',
        'hora_inicio' => '19:15:00',
        'dia_semana' => 'Viernes',
        'capacidad_max' => 25,
        'descripcion' => 'Etapas virtuales a máxima potencia.'
    ]);
}
}
