<footer class="pie-pagina">
    <div class="footer">
        {{-- Logo y Texto --}}
        <div class="logo-texto">
            <img src="{{ asset('imagenes/Logo transparente.png') }}" class="footer-logo" alt="Sea Fit Logo">
            <p class="texto">Tu centro deportivo de confianza. Encuentra tu pasión y supérate cada día con nosotros.</p>
        </div>

        {{-- Soporte --}}
        <div class="soporte">
            <h3>Soporte</h3>
            <ul class="soporte-lista">
                <li><a href="#">Atención al Cliente</a></li>
                <li><a href="#">Preguntas Frecuentes (FAQ)</a></li>
                <li><a href="#">Contacto</a></li>
            </ul>
        </div>

        {{-- Empresa --}}
        <div class="empresa">
            <h3>Empresa</h3>
            <ul class="empresa-lista">
                <li><a href="#">Sobre Nosotros</a></li>
                <li><a href="#">Trabaja con Nosotros</a></li>
                <li><a href="#">Blog</a></li>
            </ul>
        </div>

        {{-- Redes --}}
        <div class="redes">
            <h3 class="redes-texto">Redes Sociales</h3>
            <div class="redes-lista">
                <p class="texto">Síguenos para estar al día de todas las novedades y eventos.</p>
                <div class="redes-iconos">
                    <a href="https://www.instagram.com" target="_blank">
                        <img src="{{ asset('imagenes/instagram-logo.png') }}" alt="Instagram">
                    </a>
                    <a href="https://www.facebook.com/" target="_blank">
                        <img src="{{ asset('imagenes/facebook-logo.png') }}" alt="Facebook">
                    </a>
                    <a href="https://www.x.com/" target="_blank">
                        <img src="{{ asset('imagenes/twitter-logo.png') }}" alt="X">
                    </a>
                </div>
            </div>
        </div>
    </div>
</footer>