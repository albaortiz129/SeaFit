@extends ('moldes.inicio')

@section('titulo', 'membresia y tarifas')

@section('contenido')
    <div class="tarifas-container">
        {{-- Banner Superior --}}
        <section class="tarifas-banner">
            <div>
                <nav>Inicio / Tarifas</nav>
                <h1>Tarifas de Acceso Total (Membresía)</h1>
            </div>
        </section>

        <div class="tarifa-main">
            {{-- Columna Izquierda: Información --}}
            <div class="tarifa-info">
                <section class="intro-seccion">
                    <h2>Acceso Ilimitado a todas nuestras instalaciones</h2>
                    <p>Con la Membresía Total, obtienes la llave de SeaFit para disfrutar de cada área: gimnasio, piscina,
                        pistas y clases. Sin límites de horario.</p>

                    <div class="servicios">
                        <div class="contenedor-gimnasio-cardio">
                            <img src="{{ asset('imagenes/gimnasio-cardio-logo.png') }}" alt="Icono gimnasio y cardio"
                                class="icono-personalizado">
                            <h3>Gimnasio y Cardio</h3>
                            <p>Maquinaria y zonas de entrenamiento libre.</p>
                        </div>
                        <div class="contenedor-clases">
                            <img src="{{ asset('imagenes/clases-logo.png') }}" alt="Icono clases"
                                class="icono-personalizado">
                            <h3>Clases Colectivas</h3>
                            <p>Acceso ilimitado al catálogo de más de 50 clases.</p>
                        </div>
                        <div class="contenedor-piscina">
                            <img src="{{ asset('imagenes/piscina-logo.png') }}" alt="Icono piscina"
                                class="icono-personalizado">
                            <h3>Piscina y Wellness</h3>
                            <p>Uso libre de piscina climatizada, sauna y baño turco.</p>
                        </div>
                    </div>
                </section>

                <section class="pasos-seccion">
                    <h2>¿Cómo funciona la Membresía?</h2>
                    <div class="timeline">
                        <div class="step">
                            <div class="dot"></div>
                            <strong>1. Elige tu Plan</strong>
                            <p>Selecciona tu modalidad (mensual, trimestral o anual) y regístrate en línea o en recepción.
                            </p>
                        </div>
                        <div class="step">
                            <div class="dot"></div>
                            <strong>2. Acceso Total</strong>
                            <p>Recibe tu tarjeta de socio. Desde el primer día tendrás acceso a todas las zonas...</p>
                        </div>
                        <div class="step" style="border-left: transparent;">
                            <div class="dot"></div>
                            <strong>3. Reserva de Clases</strong>
                            <p>Usa nuestra web para reservar tu plaza en cualquiera de nuestras clases.</p>
                        </div>
                    </div>
                </section>
            </div>

            {{-- Columna Derecha: Tarjeta de Precio (Sticky) --}}
            <aside class="columna-precio">
                <div class="precio">
                    <h3>Elige tu Plan</h3>
                    <div class="selector-membresia">
                        <button class="active">Mensual</button>
                        <button>Anual</button>
                    </div>
                    <div class="selector-precio">
                        <span class="monto">69€</span><span class="mes">/mes</span>
                    </div>
                    <a href="{{ url('/registro') }}" class="boton-unirse">¡Únete Ahora!</a>

                    <div class="incluye-lista">
                        <h4>ACCESO ILIMITADO INCLUYE:</h4>
                        <ul>
                            <li>Gimnasio, Piscina y Wellness</li>
                            <li>Reserva ilimitada de clases</li>
                            <li>Sin restricciones de horario</li>
                            <li>Sin permanencia obligatoria</li>
                        </ul>
                    </div>
                </div>
            </aside>
        </div>
    </div>

    <script>
        document.querySelectorAll('.selector-membresia button').forEach(button => {
            button.addEventListener('click', function () {
                // Quitar clase activa de todos
                document.querySelectorAll('.selector-membresia button').forEach(btn => btn.classList.remove('active'));
                // Añadir al pulsado
                this.classList.add('active');

                // Cambiar el precio (ejemplo básico)
                const monto = document.querySelector('.monto');
                if (this.innerText === 'Anual') {
                    monto.innerText = '200'; // Precio con descuento anual
                } else {
                    monto.innerText = '50';
                }
            });
        });
    </script>
@endsection