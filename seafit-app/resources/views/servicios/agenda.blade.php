@extends('moldes.inicio')

@section('titulo', 'Agenda Semanal de Clases - SeaFit')

@section('contenido')
<script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
<link href="https://fonts.googleapis.com/css2?family=Lexend:wght@400;500;700;900&display=swap" rel="stylesheet" />
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet" />

<div class="bg-[#F8F8F8] min-h-screen py-16 font-display">
    <div class="container mx-auto max-w-5xl px-4 text-center">
        {{-- TÍTULO PRINCIPAL --}}
        <h1 class="text-gray-900 text-5xl font-black mb-4 tracking-tighter">
            Agenda Semanal de Clases
        </h1>
        <p class="text-gray-600 text-lg mb-12 max-w-2xl mx-auto">
            Consulta los horarios. Para reservar, haz clic en el botón y gestiona tu plaza al instante.
        </p>

        {{-- SELECTOR DE DÍAS (Navegación Real) --}}
        <div class="flex justify-center gap-3 mb-12 overflow-x-auto pb-4">
            @php 
                $dias = ['Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado', 'Domingo'];
                $diaActual = request('dia', 'Lunes'); 
            @endphp
            
            @foreach($dias as $dia)
                <a href="{{ route('agenda', ['dia' => $dia]) }}" 
                   class="px-6 py-2 rounded-full font-bold text-sm transition-all shadow-sm
                    {{ $diaActual == $dia 
                        ? 'bg-[#1A3878] text-white shadow-[#1A3878]/30' 
                        : 'bg-white text-gray-500 border border-gray-200 hover:bg-gray-50' }}">
                    {{ $dia }}
                </a>
            @endforeach
        </div>

        {{-- CONTENEDOR DE LA AGENDA --}}
        <div class="bg-white rounded-[2.5rem] shadow-2xl border border-gray-100 p-10">
            <div class="flex items-center justify-between mb-10 pb-4 border-b border-gray-100">
                {{-- Título dinámico que cambia al pulsar los botones --}}
                <h3 class="text-gray-900 font-black text-3xl">Clases del {{ $diaActual }}</h3>
                <span class="bg-[#1A3878]/10 text-[#1A3878] px-4 py-1 rounded-full text-sm font-bold">Semana Actual</span>
            </div>
            
            <div class="space-y-6">
                @forelse($clases as $clase)
                    @php 
                        $yaReservado = Auth::check() && Auth::user()->clases && Auth::user()->clases->contains($clase->id);
                        $estaCompleto = $clase->capacidad_max <= 0;
                    @endphp

                    <div class="flex flex-col md:flex-row items-center justify-between p-7 border border-gray-100 rounded-[1.8rem] hover:bg-gray-50/50 transition-all hover:border-[#1A3878]/20 group">
                        <div class="text-left mb-4 md:mb-0">
                            <div class="flex items-center gap-3 mb-1">
                                <span class="text-gray-900 font-black text-xl">
                                    {{ substr($clase->hora_inicio, 0, 5) }} - {{ \Carbon\Carbon::parse($clase->hora_inicio)->addHour()->format('H:i') }}
                                </span>
                                <span class="h-1.5 w-1.5 rounded-full bg-gray-300"></span>
                                <span class="text-[#1A3878] font-extrabold text-xl uppercase tracking-tight">{{ $clase->nombre }}</span>
                            </div>
                            <p class="text-gray-500 font-medium flex items-center gap-2">
                                <span class="material-symbols-outlined text-sm">person</span> Instructor: {{ $clase->instructor }} 
                                <span class="mx-1">|</span> 
                                <span class="material-symbols-outlined text-sm">location_on</span> {{ $clase->sala }}
                            </p>
                        </div>

                        {{-- LÓGICA DE BOTONES DE RESERVA --}}
                        <div class="flex items-center gap-4">
                            @if($yaReservado)
                                <button class="bg-[#00AEEF] text-white text-sm font-bold px-8 py-3 rounded-2xl cursor-default shadow-lg shadow-[#00AEEF]/20" style="min-width: 160px;">
                                    Reservado
                                </button>
                            @elseif($estaCompleto)
                                <button class="bg-red-200 text-red-500 text-sm font-bold px-8 py-3 rounded-2xl cursor-not-allowed" disabled>
                                    Agotado
                                </button>
                            @else
                                <form action="{{ route('clase.reservar', $clase->id) }}" method="POST" class="form-reserva">
                                    @csrf
                                    <button type="button" 
                                        class="btn-agenda-confirmar border-2 border-[#1A3878] text-[#1A3878] font-black px-10 py-3 rounded-2xl transition-all hover:bg-[#1A3878] hover:text-white"
                                        style="min-width: 160px;">
                                        Reservar
                                    </button>
                                </form>
                            @endif
                        </div>
                    </div>
                @empty
                    {{-- ESTADO VACÍO --}}
                    <div class="py-20 text-center">
                        <span class="material-symbols-outlined text-6xl text-gray-200 mb-4">calendar_today</span>
                        <p class="text-gray-400 font-bold">No hay clases programadas para el {{ $diaActual }}.</p>
                    </div>
                @endforelse
            </div>
        </div>

        {{-- BOTÓN INFERIOR --}}
        <button onclick="window.location.href='{{ route('servicios') }}'" 
            class="mt-14 bg-[#1A3878] text-white font-black px-12 py-5 rounded-2xl shadow-2xl shadow-[#1A3878]/40 hover:scale-105 active:scale-95 transition-all text-lg">
            Volver a Servicios
        </button>
    </div>
</div>

{{-- SCRIPT PARA LA DOBLE CONFIRMACIÓN DEL BOTÓN --}}
<script>
    document.querySelectorAll('.btn-agenda-confirmar').forEach(button => {
        button.addEventListener('click', function() {
            if (this.textContent.trim() === 'Reservar') {
                // Primer clic: Pasa a estado de confirmación
                this.textContent = 'Confirmar Reserva';
                this.classList.remove('border-[#1A3878]', 'text-[#1A3878]', 'hover:bg-[#1A3878]');
                this.classList.add('bg-[#E11D48]', 'text-white', 'border-[#E11D48]', 'shadow-lg', 'shadow-red-200'); 
            } else {
                // Segundo clic: Envía el formulario
                this.closest('form').submit();
            }
        });
    });
</script>

<style>
    .font-display { font-family: 'Lexend', sans-serif; }
    /* Suavizar scroll horizontal en móviles para los días */
    .overflow-x-auto { scrollbar-width: none; -ms-overflow-style: none; }
    .overflow-x-auto::-webkit-scrollbar { display: none; }
</style>
@endsection