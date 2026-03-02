@extends('moldes.inicio')

@section('titulo', 'Inicia Sesión - SeaFit')

@section('contenido')
<div class="contenedor-autenticacion">
    <div class="tarjeta-login">
        <h1>Inicia Sesión</h1>
        <p class="subtitulo-login">Accede a tu cuenta SeaFit.</p>

        {{-- Alertas de error si el login falla --}}
        @if ($errors->any())
            <div style="background: #fee2e2; color: #b91c1c; padding: 10px; border-radius: 8px; margin-bottom: 20px; font-size: 14px;">
                @foreach ($errors->all() as $error)
                    <p>{{ $error }}</p>
                @endforeach
            </div>
        @endif

        {{-- Formulario corregido: Action apunta a /login --}}
        <form action="{{ url('/login') }}" method="POST" class="formulario-login">
            @csrf
            
            <div class="grupo-campo">
                <label>Email</label>
                <input type="email" name="email" placeholder="tu@email.com" value="{{ old('email') }}" required>
            </div>

            <div class="grupo-campo">
                <label>Contraseña</label>
                <div class="envoltura-password" style="position: relative; display: flex; align-items: center;">
                    <input type="password" name="password" id="passInput" placeholder="••••••" required style="width: 100%;">
                    <span onclick="togglePass()" style="position: absolute; right: 10px; cursor: pointer;">👁️</span>
                </div>
                <a href="#" class="enlace-olvido">¿Olvidaste tu contraseña?</a>
            </div>

            <button type="submit" class="boton-enviar-login">Iniciar Sesión</button>
        </form>

        <p class="pie-tarjeta-login">¿Aún no tienes cuenta? <a href="{{ url('/registro') }}">Regístrate aquí</a></p>
    </div>
</div>

<script>
    function togglePass() {
        const x = document.getElementById("passInput");
        x.type = (x.type === "password") ? "text" : "password";
    }
</script>
@endsection