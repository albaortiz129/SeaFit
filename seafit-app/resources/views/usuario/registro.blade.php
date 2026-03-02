@extends('moldes.inicio')

@section('titulo', 'Crea tu cuenta - SeaFit')

@section('contenido')
<div class="contenedor-autenticacion">
    {{-- React tomará el control de este DIV --}}
    {{-- He quitado estilos internos para que el diseño lo maneje el componente React --}}
    <div id="react-root"></div>
</div>

<style>
    /* Estilos para la validación visual de React */
    .input-error {
        border: 2px solid #00a8e8 !important;
        background-color: #f0faff !important;
    }
    
    .mensaje-error-react {
        color: #00a8e8;
        font-size: 12px;
        font-weight: 600;
        margin-top: 5px;
    }
    
    .envoltura-input-react {
        position: relative;
    }
    
    .icono-error-v {
        position: absolute;
        right: 12px;
        top: 50%;
        transform: translateY(-50%);
        background: #00a8e8;
        color: white;
        width: 18px;
        height: 18px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 12px;
    }

    /* Limpieza de iconos nativos del navegador */
    input::-ms-reveal,
    input::-ms-clear {
        display: none;
    }

    /* Ajuste para que el contenedor de autenticación no tape el formulario */
    .contenedor-autenticacion {
        min-height: 80vh;
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 20px;
    }
</style>
@endsection