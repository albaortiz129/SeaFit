@extends('moldes.inicio')

@section('titulo', 'SeaFit - Tu gimnasio online')

@section('contenido')

<div class="inicio-contenedor">
    {{-- 1. Banner Principal (Hero) --}}
    <section class="inicio-hero" style="background-image: linear-gradient(rgba(0,0,0,0.6), rgba(0,0,0,0.6)), url('{{ asset('imagenes/fondo-gym.jpg') }}');">
        <div class="hero-texto">
            <h1>Olvídate de colas y llamadas. Accede a todo nuestro catálogo al instante.</h1>
            <a href="{{ url('/registro') }}" class="btn-reg" style="display:inline-block; margin-top:20px; text-decoration:none;">Empezar ahora</a>
        </div>
    </section>

   {{-- 2. Título de Introducción --}}
<section class="inicio-intro">
    <h2>¿Listo para empezar?</h2>
    <p>Todo lo que necesitas para empezar</p>
</section>

{{-- 3. Cuadrícula de Servicios --}}
<section class="inicio-servicios-grid">
    <div class="tarjeta-servicio-inicio">
        <div class="icono-azul">👥</div>
        <h3>Clases colectivas</h3>
        <p>Accede al catálogo completo de clases. Consulta los horarios disponibles. Garantiza tu plaza con nuestra herramienta de reserva online antes de cada entrenamiento.</p>
        <a href="#" class="link-servicio">Ver Clases &rarr;</a>
    </div>

    <div class="tarjeta-servicio-inicio">
        <div class="icono-azul">🏋️</div>
        <h3>Entrenador Personal</h3>
        <p>Maximiza tus resultados con un plan 100% a tu medida. Agenda, reprograma y confirma tus sesiones directamente con tu entrenador a través de nuestra plataforma web.</p>
        <a href="#" class="link-servicio">Saber Más &rarr;</a>
    </div>

    <div class="tarjeta-servicio-inicio">
        <div class="icono-azul">🏅</div>
        <h3>Membresía</h3>
        <p>Acceso total y sin restricciones a todas las instalaciones y clases. Suscríbete ahora eligiendo la modalidad de pago que prefieras (mensual, trimestral o anual).</p>
        <a href="#" class="link-servicio">Ver Tarifas &rarr;</a>
    </div>
</section>
</div>
@endsection