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
    \App\Models\Clase::create([
        'nombre' => 'Yoga Flow',
        'instructor' => 'Lucía Méndez',
        'sala' => 'Sala Zen',
        'hora_inicio' => '09:30:00',
        'dia_semana' => 'Lunes',
        'capacidad_max' => 15,
        'descripcion' => 'Clase de yoga suave para empezar la semana con energía y equilibrio.'
    ]);

    \App\Models\Clase::create([
        'nombre' => 'HIIT Intenso',
        'instructor' => 'Carlos Fit',
        'sala' => 'Zona Funcional',
        'hora_inicio' => '18:00:00',
        'dia_semana' => 'Miércoles',
        'capacidad_max' => 20,
        'descripcion' => 'Entrenamiento de alta intensidad para quemar grasa y mejorar resistencia.'
    ]);

    \App\Models\Clase::create([
        'nombre' => 'Spinning Pro',
        'instructor' => 'Sergio Ciclo',
        'sala' => 'Sala Ciclo',
        'hora_inicio' => '19:15:00',
        'dia_semana' => 'Viernes',
        'capacidad_max' => 25,
        'descripcion' => 'Súbete a la bici y recorre etapas virtuales a máxima potencia.'
    ]);
}
}
