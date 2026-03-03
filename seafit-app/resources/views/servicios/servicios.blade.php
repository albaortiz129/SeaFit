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
                    Selecciona el camino que mejor se adapta a tus objetivos: entrenamientos grupales, soporte personal o acceso ilimitado.
                </p>
            </div>

            <div class="layout-content-container flex flex-col w-full max-w-6xl flex-1 gap-16 px-4 py-16 lg:py-24">

                {{-- SECCIÓN CLASES COLECTIVAS --}}
                <section id="clases" class="grid grid-cols-1 lg:grid-cols-2 gap-12 p-10 rounded-3xl bg-white border border-gray-100 shadow-2xl transition-all hover:shadow-gray-200">
                    <div class="flex flex-col gap-6">
                        <div class="w-14 h-14 rounded-full flex items-center justify-center bg-[#1A3878]/10">
                            <span class="material-symbols-outlined text-4xl text-[#1A3878]">groups</span>
                        </div>
                        <h2 class="text-gray-900 text-4xl font-black tracking-tight">Clases Colectivas</h2>
                        <p class="text-gray-600 text-lg leading-relaxed">
                            Disfruta de la energía del grupo y entrena con expertos en distintas disciplinas. Tenemos clases para todos los niveles y objetivos.
                        </p>
                        <ul class="space-y-3 text-gray-700">
                            <li class="flex items-center gap-3">
                                <span class="w-1.5 h-1.5 rounded-full bg-[#1A3878]"></span> Yoga & Meditación: Encuentra tu equilibrio.
                            </li>
                            <li class="flex items-center gap-3">
                                <span class="w-1.5 h-1.5 rounded-full bg-[#1A3878]"></span> Pilates & Core: Fortalece tu centro.
                            </li>
                            <li class="flex items-center gap-3">
                                <span class="w-1.5 h-1.5 rounded-full bg-[#1A3878]"></span> Spinning & Cardio: Quema calorías al máximo.
                            </li>
                            <li class="flex items-center gap-3">
                                <span class="w-1.5 h-1.5 rounded-full bg-[#1A3878]"></span> Zumba & Baile: Diviértete en movimiento.
                            </li>
                        </ul>
                        <button onclick="window.location.href='{{ route('agenda') }}'"
                            class="flex w-fit min-w-[180px] items-center justify-center rounded-xl h-14 px-8 bg-[#1A3878] text-white text-lg font-bold hover:bg-[#0A1931] transition-all shadow-lg hover:shadow-[#1A3878]/30 mt-4">
                            Ver Agenda Completa
                        </button>
                    </div>

                    {{-- LISTADO DINÁMICO --}}
                    <div class="bg-[#F8F9FA] p-8 rounded-3xl border border-gray-200 shadow-inner max-h-[550px] overflow-y-auto">
                        <div class="flex justify-between items-center mb-6 pb-4 border-b border-gray-200">
                            <h3 class="text-gray-900 font-extrabold text-2xl uppercase">Clases del {{ request('dia', 'Lunes') }}</h3>
                            <span class="text-gray-500 font-medium text-base">{{ now()->translatedFormat('d M') }}</span>
                        </div>

                        {{-- Selector de días Funcional --}}
                        <div class="flex gap-3 overflow-x-auto pb-6 mb-2">
                            @php 
                                $diasSemana = ['Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes']; 
                                $diaActivo = request('dia', 'Lunes');
                            @endphp
                            @foreach($diasSemana as $dia)
                                <a href="{{ route('servicios', ['dia' => $dia]) }}#clases"
                                    class="flex-shrink-0 text-sm font-bold px-6 py-2 rounded-full transition-all 
                                    {{ $diaActivo == $dia ? 'bg-[#1A3878] text-white shadow-md' : 'bg-white text-gray-600 border border-gray-200 hover:bg-gray-100' }}">
                                    {{ $dia }}
                                </a>
                            @endforeach
                        </div>

                        <div class="space-y-4">
                            @forelse($clases as $clase)
                                @php 
                                    $estaCompleto = $clase->capacidad_max <= 0;
                                    $yaReservado = Auth::check() && Auth::user()->clases && Auth::user()->clases->contains($clase->id);
                                @endphp

                                <div class="flex items-center justify-between p-5 rounded-2xl border {{ $estaCompleto ? 'border-red-200 bg-red-50/50' : 'border-white bg-white shadow-sm' }} hover:shadow-md transition-all">
                                    <div class="flex-1 text-left">
                                        <p class="font-black text-gray-900 text-lg">
                                            {{ substr($clase->hora_inicio, 0, 5) }}h - {{ \Carbon\Carbon::parse($clase->hora_inicio)->addHour()->format('H:i') }}h
                                        </p>
                                        <p class="{{ $estaCompleto ? 'text-red-600' : 'text-[#1A3878]' }} font-bold text-xl uppercase tracking-tight">
                                            {{ $clase->nombre }} {{ $estaCompleto ? '(COMPLETO)' : '' }}
                                        </p>
                                        <p class="text-sm font-medium {{ $estaCompleto ? 'text-red-400' : 'text-gray-500' }}">
                                            {{ $clase->sala }} | Aforo: {{ $estaCompleto ? 'Lleno' : $clase->capacidad_max . ' plazas' }}
                                        </p>
                                    </div>

                                    @if($yaReservado)
                                        <button class="bg-[#00AEEF] text-white text-xs font-bold px-4 py-3 rounded-xl cursor-default" style="min-width: 140px;">
                                            Reservado
                                        </button>
                                    @elseif($estaCompleto)
                                        <button class="bg-red-300 text-white text-sm font-bold px-6 py-3 rounded-xl cursor-not-allowed opacity-80" disabled>
                                            Agotado
                                        </button>
                                    @else
                                        <form action="{{ route('clase.reservar', $clase->id) }}" method="POST" class="form-reserva">
                                            @csrf
                                            <button type="button" class="btn-reserva-confirmar bg-[#1A3878] text-white text-sm font-bold px-6 py-3 rounded-xl hover:bg-[#00AEEF] transition-all" style="min-width: 120px;">
                                                Reservar
                                            </button>
                                        </form>
                                    @endif
                                </div>
                            @empty
                                <div class="text-center py-10">
                                    <p class="text-gray-400 font-bold">No hay clases para este día.</p>
                                </div>
                            @endforelse
                        </div>
                    </div>
                </section>

                {{-- SECCIÓN ENTRENADOR PERSONAL --}}
                <section id="entrenador" class="grid grid-cols-1 lg:grid-cols-2 gap-12 p-8 rounded-xl bg-[#F4F4F4] border border-gray-200 shadow-lg">
                    <div class="rounded-xl overflow-hidden shadow-lg h-full min-h-[300px] bg-gray-300"
                        style="background-image: url('{{ asset('imagenes/imagenEntrenador.jpg') }}'); background-size: cover;">
                    </div>
                    <div class="flex flex-col gap-4 text-left">
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
                    <button class="mt-8 min-w-[250px] h-12 px-6 bg-[#1A3878] text-white font-bold rounded-lg" onclick="window.location.href='{{ url('/tarifas') }}'">
                        Ver Planes y Precios de Membresía
                    </button>
                </section>
            </div>
        </main>
    </div>

    <script>
        document.querySelectorAll('.btn-reserva-confirmar').forEach(button => {
            button.addEventListener('click', function() {
                if (this.textContent.trim() === 'Reservar') {
                    this.textContent = 'Confirmar Reserva';
                    this.classList.replace('bg-[#1A3878]', 'bg-[#E11D48]'); 
                } else {
                    this.closest('form').submit();
                }
            });
        });
    </script>
@endsection