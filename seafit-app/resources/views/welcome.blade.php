@extends('moldes.inicio')

@section('titulo', 'SeaFit - Tu gimnasio online')

@section('contenido')

    <div class="inicio-contenedor">
        {{-- 1. Banner Principal (Hero) --}}
        <section class="inicio-hero"
            style="background-image: linear-gradient(rgba(0,0,0,0.6), rgba(0,0,0,0.6)), url('{{ asset('imagenes/banner.jpg') }}');">
            <div class="hero-texto">
                <h1>Olvídate de colas y llamadas. Accede a todo nuestro catálogo al instante.</h1>
                <a href="{{ url('/registro') }}" class="btn-reg"
                    style="display:inline-block; margin-top:20px; text-decoration:none;">Empezar ahora</a>
            </div>
        </section>

        {{-- 2. Título de Introducción --}}
        <section class="inicio-intro">
            <h2>¿Listo?</h2>
            <p>Todo lo que necesitas para empezar</p>
        </section>

        {{-- 3. Cuadrícula de Servicios --}}
        <section class="inicio-servicios-grid px-4 py-16 max-w-7xl mx-auto grid grid-cols-1 md:grid-cols-3 gap-8">

            {{-- Tarjeta: Clases Colectivas --}}
            <div
                class="tarjeta-servicio-inicio bg-white p-8 rounded-2xl border border-gray-100 shadow-sm flex flex-col items-start text-left transition-all hover:shadow-md">
                <div
                    class="contenedor-icono-imagen mb-6 bg-[#1A3878] p-4 rounded-xl flex items-center justify-center w-16 h-16">
                    <img src="{{ asset('imagenes/clases-logo.png') }}" alt="Clases Colectivas">
                </div>
                <h3 class="text-gray-900 text-xl font-bold mb-4">Clases colectivas</h3>
                <p class="text-gray-600 text-base leading-relaxed mb-6">
                    Accede al catálogo completo de clases. Consulta los horarios disponibles. Garantiza tu plaza con nuestra
                    herramienta de reserva online antes de cada entrenamiento.
                </p>
                <a href="{{ url('/servicios') }}" class="text-[#1A3878] font-bold flex items-center gap-2 hover:underline">
                    Ver Clases <span class="material-symbols-outlined text-sm">arrow_forward</span>
                </a>
            </div>

            {{-- SECCIÓN ENTRENADOR PERSONAL --}}
<div class="tarjeta-servicio-inicio bg-white p-8 rounded-2xl border border-gray-100 shadow-sm flex flex-col items-start text-left transition-all hover:shadow-md">
        <div class="contenedor-icono-imagen mb-6 bg-[#1A3878] p-4 rounded-xl flex items-center justify-center w-16 h-16">
            <img src="{{ asset('imagenes/gimnasio-cardio-logo.png') }}" alt="Entrenador Personal">
        </div>
        <h3 class="text-gray-900 text-xl font-bold mb-4 uppercase">Entrenador Personal</h3>
        <p class="text-gray-600 text-base leading-relaxed mb-4">
    Nuestro equipo de profesionales diseñará un plan 100% adaptado a tus metas, monitorizando tu progreso y ajustando la rutina al detalle.
</p>
<ul class="text-gray-600 text-sm space-y-2 mb-6">
    <li class="flex items-center gap-2">
        <span class="w-1.5 h-1.5 rounded-full bg-[#1A3878]"></span> Planes nutricionales personalizados.
    </li>
    <li class="flex items-center gap-2">
        <span class="w-1.5 h-1.5 rounded-full bg-[#1A3878]"></span> Seguimiento por nuestra plataforma web.
    </li>
    <li class="flex items-center gap-2">
        <span class="w-1.5 h-1.5 rounded-full bg-[#1A3878]"></span> Especialización en masa muscular y pérdida de peso.
    </li>
</ul>
        <a href="{{ route('valoracion') }}" class="text-[#1A3878] font-bold flex items-center gap-2 hover:underline">
    Solicitar Valoración <span class="material-symbols-outlined text-sm">arrow_forward</span>
</a>
    </div>
            {{-- Tarjeta: Membresía --}}
            <div
                class="tarjeta-servicio-inicio bg-white p-8 rounded-2xl border border-gray-100 shadow-sm flex flex-col items-start text-left transition-all hover:shadow-md">
                <div
                    class="contenedor-icono-imagen mb-6 bg-[#1A3878] p-4 rounded-xl flex items-center justify-center w-16 h-16">
                    {{-- Cambiado de membresia.jpg a check-logo.png que es el que tienes en tu carpeta --}}
                    <img src="{{ asset('imagenes/piscina-logo.png') }}" alt="Membresía">
                </div>
                <h3 class="text-gray-900 text-xl font-bold mb-4">Membresía</h3>
                <p class="text-gray-600 text-base leading-relaxed mb-6">
                    Acceso total y sin restricciones a todas las instalaciones y clases. Suscríbete ahora eligiendo la
                    modalidad de pago que prefieras (mensual, trimestral o anual).
                </p>
                <a href="{{ url('/tarifas') }}" class="text-[#1A3878] font-bold flex items-center gap-2 hover:underline">
                    Ver Tarifas <span class="material-symbols-outlined text-sm">arrow_forward</span>
                </a>
            </div>
        </section>
    </div>
@endsection