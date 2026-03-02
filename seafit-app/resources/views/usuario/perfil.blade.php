@extends('moldes.inicio')

@section('titulo', 'Panel de Socio - SeaFit')

@section('contenido')
<div class="main-container-perfil">
    {{-- BARRA LATERAL --}}
    <aside class="sidebar-perfil">
        <h2 class="sidebar-titulo">Panel de Socio</h2>
        <nav class="sidebar-nav">
            <a href="#" class="nav-item active">
                <span class="material-symbols-outlined">person</span> Mi Perfil
            </a>
            <a href="#" class="nav-item">
                <span class="material-symbols-outlined">calendar_month</span> Mis Reservas
            </a>
            <a href="#" class="nav-item">
                <span class="material-symbols-outlined">payments</span> Gestión de Pago
            </a>
            <a href="#" class="nav-item">
                <span class="material-symbols-outlined">settings</span> Configuración
            </a>
        </nav>
    </aside>

    {{-- CONTENIDO PRINCIPAL --}}
    <main class="content-perfil">
        <header class="header-bienvenida">
            <h1>¡Hola, {{ Auth::user()->nombre }}! 👋</h1>
            <p>Bienvenida a tu panel personal. Aquí puedes gestionar tu cuenta y revisar tu progreso.</p>
        </header>

        {{-- TARJETA DE MEMBRESÍA --}}
        <section class="tarjeta-membresia">
            <div class="membresia-info">
                <p class="label-membresia">Membresía Actual</p>
                <h2 class="tipo-membresia">Acceso Total {{ ucfirst(Auth::user()->tarifa) }}</h2>
                <p class="validez-membresia">Válido hasta: 24/12/2025</p>
            </div>
            <button class="btn-cambiar-plan">
                <span class="material-symbols-outlined">upgrade</span> Cambiar Plan
            </button>
        </section>

        {{-- DATOS DE CUENTA --}}
        <section class="seccion-blanca">
            <div class="seccion-header">
                <h3>Datos de Cuenta</h3>
            </div>
            <div class="grid-datos">
                <div class="dato-item">
                    <p class="dato-label">Nombre:</p>
                    <p class="dato-valor">{{ Auth::user()->nombre }} {{ Auth::user()->apellidos }}</p>
                </div>
                <div class="dato-item">
                    <p class="dato-label">Email:</p>
                    <p class="dato-valor">{{ Auth::user()->email }}</p>
                </div>
                <div class="dato-item">
                    <p class="dato-label">DNI:</p>
                    <p class="dato-valor">{{ Auth::user()->dni }}</p>
                </div>
                <div class="dato-item">
                    <p class="dato-label">Teléfono:</p>
                    <p class="dato-valor">{{ Auth::user()->telefono }}</p>
                </div>
                <div class="dato-item full-width">
                    <p class="dato-label">Domicilio:</p>
                    <p class="dato-valor">{{ Auth::user()->domicilio }}</p>
                </div>
            </div>
            <a href="#" class="enlace-editar">Editar información</a>
        </section>

        {{-- PRÓXIMAS RESERVAS --}}
        <section class="seccion-blanca">
            <div class="seccion-header">
                <h3>Próximas Reservas</h3>
            </div>
            <div class="lista-reservas">
                <div class="reserva-card">
                    <div class="reserva-info">
                        <h4>Yoga (Sala 1)</h4>
                        <p>Miércoles, 26 Nov | 18:30 h</p>
                    </div>
                    <span class="status-badge confirmado">✓ Confirmada</span>
                </div>
                <div class="reserva-card">
                    <div class="reserva-info">
                        <h4>Sesión con Entrenador Personal</h4>
                        <p>Viernes, 28 Nov | 10:00 h</p>
                    </div>
                    <span class="status-badge pendiente">🕒 Pendiente</span>
                </div>
            </div>
            <a href="#" class="enlace-ver-mas">Ver todas mis reservas</a>
        </section>
    </main>
</div>
@endsection