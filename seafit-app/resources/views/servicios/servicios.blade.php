@extends('moldes.inicio')

@section('titulo', 'Servicios Detallados - SeaFit')

@section('contenido')
<script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
<link href="https://fonts.googleapis.com/css2?family=Lexend:wght@400;500;700;900&display=swap" rel="stylesheet" />
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet" />

<div class="bg-white font-display text-[#4B5563]">
    <main class="flex flex-1 flex-col items-center flex-grow">
        {{-- CABECERA --}}
        <div class="w-full text-center py-16 bg-[#F8F8F8] border-b border-gray-200">
            <h1 class="text-gray-900 text-4xl lg:text-5xl font-black leading-tight tracking-tighter">
                Descubre la Oferta Completa de SeaFit
            </h1>
            <p class="text-lg mt-3 max-w-3xl mx-auto">
                Selecciona el camino que mejor se adapta a tus objetivos.
            </p>
        </div>

        <div class="layout-content-container flex flex-col w-full max-w-6xl flex-1 gap-16 px-4 py-16 lg:py-24">
            
            {{-- SECCIÓN CLASES COLECTIVAS --}}
            <section id="clases" class="grid grid-cols-1 lg:grid-cols-2 gap-12 p-8 rounded-xl bg-white border border-gray-200 shadow-lg">
                <div class="flex flex-col gap-4">
                    <div class="w-12 h-12 rounded-full flex items-center justify-center bg-[#1A3878]/10">
                        <span class="material-symbols-outlined text-3xl text-[#1A3878]">groups</span>
                    </div>
                    <h2 class="text-gray-900 text-3xl font-black">Clases Colectivas</h2>
                    <p class="text-lg">Disfruta de la energía del grupo y entrena con expertos.</p>
                    <ul class="list-disc list-inside space-y-1">
                        <li>Yoga & Meditación: Encuentra tu equilibrio.</li>
                        <li>Spinning & Cardio: Quema calorías al máximo.</li>
                    </ul>
                    <button class="flex w-fit min-w-[160px] items-center justify-center rounded-lg h-12 px-6 bg-[#1A3878] text-white font-bold hover:opacity-90 transition-colors mt-4">
                        Ver Agenda Completa
                    </button>
                </div>

                {{-- LISTADO DINÁMICO --}}
                <div class="bg-[#F4F4F4] p-6 rounded-xl border border-[#1A3878]/20 shadow-md max-h-[450px] overflow-y-auto">
                    <div class="flex justify-between items-center mb-4 pb-2 border-b border-gray-300">
                        <h3 class="text-gray-900 font-bold text-xl">Clases de Hoy</h3>
                        <span class="text-gray-500 text-sm">{{ now()->translatedFormat('l, d M') }}</span>
                    </div>

                    <div class="space-y-3">
                        @forelse($clases as $clase)
                            <div class="flex items-center justify-between p-3 rounded-lg border border-white bg-white hover:bg-[#1A3878]/5 transition-colors">
                                <div class="flex-1">
                                    <p class="font-bold text-gray-900">{{ substr($clase->hora_inicio, 0, 5) }}h</p>
                                    <p class="text-[#1A3878] font-semibold">{{ $clase->nombre }}</p>
                                    <p class="text-xs text-gray-500">Aforo: {{ $clase->capacidad_max }} plazas</p>
                                </div>
                                <button class="bg-[#1A3878] text-white text-sm font-semibold px-4 py-2 rounded-lg hover:bg-[#0A1931]">
                                    Reservar
                                </button>
                            </div>
                        @empty
                            <p class="text-center text-gray-500">No hay clases hoy.</p>
                        @endforelse
                    </div>
                </div>
            </section>

            {{-- SECCIÓN ENTRENADOR PERSONAL --}}
            <section id="entrenador" class="grid grid-cols-1 lg:grid-cols-2 gap-12 p-8 rounded-xl bg-[#F4F4F4] border border-gray-200 shadow-lg">
                <div class="rounded-xl overflow-hidden shadow-lg h-full min-h-[300px] bg-gray-300" style="background-image: url('{{ asset('imagenes/entrenador.jpg') }}'); background-size: cover;"></div>
                <div class="flex flex-col gap-4">
                    <div class="w-12 h-12 rounded-full flex items-center justify-center bg-[#1A3878]/10">
                        <span class="material-symbols-outlined text-3xl text-[#1A3878]">fitness_center</span>
                    </div>
                    <h2 class="text-gray-900 text-3xl font-black">Entrenador Personal</h2>
                    <p class="text-lg">Planes 100% adaptados a tus metas monitorizando tu progreso.</p>
                    <button class="flex w-fit min-w-[200px] items-center justify-center rounded-lg h-12 px-6 bg-[#1A3878] text-white font-bold mt-4">
                        Solicitar Sesión de Valoración
                    </button>
                </div>
            </section>

            {{-- SECCIÓN MEMBRESÍA --}}
            <section id="membresia" class="p-8 rounded-xl bg-white border border-gray-200 shadow-lg text-center">
                <div class="flex flex-col gap-4 items-center">
                    <div class="w-12 h-12 rounded-full flex items-center justify-center bg-[#1A3878]/10">
                        <span class="material-symbols-outlined text-3xl text-[#1A3878]">pool</span>
                    </div>
                    <h2 class="text-gray-900 text-3xl font-black">Acceso Total (Membresía)</h2>
                    <p class="text-lg max-w-4xl mx-auto">Tu llave a todas nuestras instalaciones. Disfruta sin restricciones del gimnasio, la piscina y zonas relax.</p>
                </div>
                <div class="grid grid-cols-1 sm:grid-cols-3 gap-6 mt-8">
                    <div class="p-4 rounded-lg bg-[#F4F4F4] border border-gray-200">
                        <span class="material-symbols-outlined text-4xl text-[#1A3878]">fitness_center</span>
                        <h4 class="font-bold text-gray-900 mt-2">Gimnasio y Cardio</h4>
                    </div>
                    <div class="p-4 rounded-lg bg-[#F4F4F4] border border-gray-200">
                        <span class="material-symbols-outlined text-4xl text-[#1A3878]">pool</span>
                        <h4 class="font-bold text-gray-900 mt-2">Piscina Climatizada</h4>
                    </div>
                    <div class="p-4 rounded-lg bg-[#F4F4F4] border border-gray-200">
                        <span class="material-symbols-outlined text-4xl text-[#1A3878]">sauna</span>
                        <h4 class="font-bold text-gray-900 mt-2">Zonas Wellness</h4>
                    </div>
                </div>
                <button class="mt-8 min-w-[250px] h-12 px-6 bg-[#1A3878] text-white font-bold rounded-lg" onclick="window.location.href='/tarifas'">
                    Ver Planes y Precios de Membresía
                </button>
            </section>
        </div>
    </main>

    {{-- FOOTER OSCURO --}}
    <footer class="w-full bg-[#0A1931] text-gray-200 mt-12 border-t border-[#1A3878]/20">
        <div class="mx-auto max-w-7xl px-6 py-16">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-10 text-center md:text-left">
                <div class="flex flex-col items-center md:items-start">
                    <img src="{{ asset('imagenes/Logo transparente.png') }}" alt="SeaFit Logo" class="h-20 w-auto mb-4">
                    <p class="text-gray-400 text-sm">Tu centro deportivo de confianza. Entrena con la mejor tecnología de reserva online.</p>
                </div>
                <div>
                    <h3 class="text-[#1A3878] font-bold uppercase mb-4">Soporte</h3>
                    <ul class="text-sm space-y-2 text-gray-400">
                        <li>Centro de Ayuda</li>
                        <li>Contacto</li>
                    </ul>
                </div>
                <div>
                    <h3 class="text-[#1A3878] font-bold uppercase mb-4">Síguenos</h3>
                    <div class="flex justify-center md:justify-start gap-4">
                        {{-- Iconos sociales --}}
                        <span class="material-symbols-outlined cursor-pointer hover:text-white">facebook</span>
                        <span class="material-symbols-outlined cursor-pointer hover:text-white">instaphoto</span>
                    </div>
                </div>
            </div>
            <div class="mt-10 border-t border-gray-700 pt-6 text-center text-xs text-gray-500">
                © 2026 SeaFit Sports. Todos los derechos reservados.
            </div>
        </div>
    </footer>
</div>
@endsection