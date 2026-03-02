@extends('moldes.inicio')

@section('titulo', 'SeaFit - Tu gimnasio online')

@section('contenido')
{{-- El div react-root se ha eliminado de aquí para que no salga el formulario --}}

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
        <p>Todo lo que necesitas para tu entrenamiento</p>
    </section>

    {{-- 3. Cuadrícula de Servicios --}}
    <section class="inicio-servicios-grid">
        <div class="tarjeta-servicio-inicio">
            <span class="icono-servicio">👥</span>
            <h3>Clases colectivas</h3>
            <p>Accede al catálogo completo de clases. Consulta los horarios disponibles y garantiza tu plaza online.</p>
        </div>

        <div class="tarjeta-servicio-inicio">
            <span class="icono-servicio">🏋️</span>
            <h3>Entrenador Personal</h3>
            <p>Maximiza tus resultados con un plan a tu medida. Agenda y confirma sesiones directamente.</p>
        </div>

        <div class="tarjeta-servicio-inicio">
            <span class="icono-servicio">🎖️</span>
            <h3>Membresía</h3>
            <p>Acceso total a todas las instalaciones. Elige tu modalidad de pago (mensual, trimestral o anual).</p>
        </div>
    </section>
</div>
@endsection