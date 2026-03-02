<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegistroController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ServicioController;

// --- INICIO ---
Route::get('/', function () {
    return view('welcome');
});

// --- PÁGINAS INFORMATIVAS ---
Route::get('/tarifas', function () { return view('paginas.tarifas'); });
Route::get('/contacto', function () { return view('paginas.contacto'); });
Route::get('/servicios', [ServicioController::class, 'index']);
Route::get('/agenda', function () { return view('servicios.agenda'); });

// --- REGISTRO (React) ---
Route::get('/registro', function () { return view('usuario.registro'); });
Route::post('/api/registro', [RegistroController::class, 'registrar']);

// --- AUTENTICACIÓN (Login / Logout) ---
Route::get('/login', function () { return view('usuario.iniciosesion'); })->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// --- ÁREA PRIVADA (Protegida) ---
// El middleware 'auth' asegura que solo entren usuarios logueados
Route::get('/perfil', function () {
    return view('usuario.perfil');
})->middleware('auth');

