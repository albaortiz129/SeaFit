<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Clase extends Model
{
    use HasFactory;

    protected $table = 'clases'; // Aseguramos que apunte a la tabla correcta

    // Lista de campos que se pueden llenar (MUY IMPORTANTE)
    protected $fillable = [
        'nombre', 
        'instructor', 
        'sala', 
        'hora_inicio', 
        'dia_semana', 
        'capacidad_max', 
        'descripcion', 
        'imagen'
    ];
}