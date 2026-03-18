<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Insesion - Mensajería Profesional</title>
    <link rel="icon" href="{{ asset('logo.png') }}" type="image/png">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script>
        if (localStorage.getItem('color-theme') === 'dark' || (!('color-theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
            document.documentElement.classList.add('dark');
        } else {
            document.documentElement.classList.remove('dark');
        }
    </script>
    <style>
        .landing-container {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
            background-color: var(--color-fondo);
            color: var(--color-texto);
        }

        .landing-nav {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 1.5rem 2rem;
            background-color: transparent;
        }

        .landing-logo {
            font-size: 1.5rem;
            font-weight: 700;
            color: var(--color-primario);
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .landing-nav-links {
            display: flex;
            gap: 1rem;
            align-items: center;
        }

        .landing-nav-link {
            color: var(--color-texto);
            font-weight: 500;
            text-decoration: none;
            transition: color 0.2s;
        }

        .landing-nav-link:hover {
            color: var(--color-primario);
        }

        .hero-section {
            flex: 1;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            text-align: center;
            padding: 4rem 2rem;
            max-width: 800px;
            margin: 0 auto;
        }

        .hero-title {
            font-size: 3.5rem;
            font-weight: 800;
            line-height: 1.2;
            margin-bottom: 1.5rem;
            color: var(--color-texto);
        }

        .hero-title span {
            color: var(--color-primario);
        }

        .hero-subtitle {
            font-size: 1.25rem;
            color: var(--color-texto-secundario);
            margin-bottom: 2.5rem;
            max-width: 600px;
        }

        .hero-actions {
            display: flex;
            gap: 1rem;
            justify-content: center;
        }
        
        .boton-secundario {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            padding: 0.75rem 1.5rem;
            background-color: transparent;
            color: var(--color-texto);
            font-weight: 500;
            font-size: 0.9375rem;
            border: 1px solid var(--color-borde);
            border-radius: var(--border-radius);
            transition: all 0.2s ease;
            text-decoration: none;
        }

        .boton-secundario:hover {
            background-color: var(--color-fondo-panel);
            border-color: var(--color-texto-secundario);
        }

        /* Enlaces usando el componente primario */
        .boton-enlace {
            text-decoration: none;
        }
        
        @media (max-width: 768px) {
            .hero-title {
                font-size: 2.5rem;
            }
            .hero-actions {
                flex-direction: column;
                width: 100%;
                max-width: 300px;
            }
            .landing-nav {
                flex-direction: column;
                gap: 1rem;
                padding-bottom: 2rem;
            }
            .landing-nav-links {
                flex-wrap: wrap;
                justify-content: center;
                gap: 0.5rem;
            }
        }

        /* Estilos del Carrusel de Fondo animado con CSS puro */
        .carrusel-fondo {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: 1;
        }

        .carrusel-fondo .slide {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-size: cover;
            background-position: center;
            opacity: 0;
            animation: sliderAnimacion 15s infinite; /* 3 slides x 5s cada uno */
        }

        /* Animación para superposición e infinidad */
        @keyframes sliderAnimacion {
            0% { opacity: 0; transform: scale(1); }
            10% { opacity: 1; transform: scale(1.02); }
            33% { opacity: 1; transform: scale(1.05); }
            43% { opacity: 0; transform: scale(1.07); }
            100% { opacity: 0; transform: scale(1); }
        }

        /* Tiempos (Delays) para cada slide (15s total / 3 = 5s cada uno) */
        .slide-1 {
            background-image: url('https://images.unsplash.com/photo-1573164713988-8665fc963095?auto=format&fit=crop&q=80&w=2069&ixlib=rb-4.0.3');
            animation-delay: 0s;
        }
        .slide-2 {
            background-image: url('https://images.unsplash.com/photo-1600880292203-757bb62b4baf?auto=format&fit=crop&q=80&w=2070&ixlib=rb-4.0.3');
            animation-delay: 5s;
        }
        .slide-3 {
            background-image: url('https://images.unsplash.com/photo-1522071820081-009f0129c71c?auto=format&fit=crop&q=80&w=2070&ixlib=rb-4.0.3');
            animation-delay: 10s;
        }

        /* Capa superpuesta para garantizar legibilidad del texto */
        .carrusel-overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(135deg, rgba(18, 18, 18, 0.9) 0%, rgba(18, 18, 18, 0.6) 100%);
            z-index: 5;
        }

        /* Ajuste de color del encabezado cuando estamos en el Hero */
        .landing-nav {
            position: relative;
            z-index: 20; 
        }
        .landing-logo {
            text-shadow: 0 1px 3px rgba(0,0,0,0.5);
        }
        .landing-nav-link {
            color: rgba(255,255,255,0.9);
            text-shadow: 0 1px 2px rgba(0,0,0,0.5);
        }
    </style>
</head>
<body>
    <div class="landing-container">
        <!-- Navegación Superior -->
        <nav class="landing-nav" style="padding: 1.5rem 5%;">
            <div class="landing-logo">
                <span style="font-size: 1.8rem;">💬</span> Insesion
            </div>
            <div class="landing-nav-links">
                <x-theme-toggle style="margin-right: 1rem;" />

                @if (Route::has('login'))
                    @auth
                        <a href="{{ url('/chat') }}" class="landing-nav-link">Ir a mis chats</a>
                    @else
                        <a href="{{ route('login') }}" class="landing-nav-link">Iniciar sesión</a>
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="boton-enlace">
                                <x-boton-primario type="button">Comenzar</x-boton-primario>
                            </a>
                        @endif
                    @endauth
                @endif
            </div>
        </nav>

        <!-- Hero Section con Carrusel de Fondo (Ancho completo debajo del header) -->
        <main class="hero-section" style="position: relative; overflow: hidden; padding: 0; width: 100%; min-height: calc(100vh - 86px); display: flex; align-items: center; justify-content: center; max-width: 100%;">
            <!-- Carrusel de imágenes (backgrounds) -->
            <div class="carrusel-fondo">
                <div class="slide slide-1"></div>
                <div class="slide slide-2"></div>
                <div class="slide slide-3"></div>
            </div>
            
            <!-- Overlay oscuro/claro para legibilidad -->
            <div class="carrusel-overlay"></div>

            <!-- Contenido del hero (encima del carrusel) -->
            <div class="hero-content" style="position: relative; z-index: 10; padding: 4rem 2rem; width: 100%; max-width: 1200px; margin: 0 auto; display: flex; flex-direction: column; align-items: center; text-align: center;">
                <h1 class="hero-title" style="color: #ffffff; font-size: clamp(2.5rem, 5vw, 4.5rem); max-width: 900px;">
                    Comunicación <span style="color: var(--color-primario); text-shadow: 0 2px 4px rgba(0,0,0,0.5);">clara</span> y <span style="color: var(--color-primario); text-shadow: 0 2px 4px rgba(0,0,0,0.5);">segura</span> para tu equipo
                </h1>
                <p class="hero-subtitle" style="color: rgba(255, 255, 255, 0.9); font-weight: 500; text-shadow: 0 1px 3px rgba(0,0,0,0.6); font-size: 1.25rem; max-width: 800px; margin-bottom: 3rem;">
                    Insesion es la plataforma de mensajería diseñada para profesionales. Conecta, colabora y mantén tus conversaciones organizadas con un diseño simple, elegante y soporte nativo para modo oscuro.
                </p>
                <div class="hero-actions">
                    <a href="{{ route('register') }}" class="boton-enlace" style="width: auto;">
                        <x-boton-primario type="button" style="min-width: 200px; font-size: 1.1rem; padding: 1rem 2rem; box-shadow: 0 4px 15px rgba(106, 13, 173, 0.4);">
                            Crear una cuenta
                        </x-boton-primario>
                    </a>
                    <a href="{{ route('chat.index') }}" class="boton-secundario" style="min-width: 200px; font-size: 1.1rem; padding: 1rem 2rem; color: #ffffff; border-color: rgba(255,255,255,0.5); background-color: rgba(0,0,0,0.3);">
                        Ver demostración
                    </a>
                </div>
            </div>
        </main>

        <!-- Sección: ¿Qué es InSession? -->
        <section style="padding: 4rem 2rem; background-color: var(--color-fondo-panel);">
            <div style="max-width: 800px; margin: 0 auto; text-align: center;">
                <h2 style="font-size: 2.5rem; font-weight: 700; color: var(--color-texto); margin-bottom: 1.5rem;">¿Qué es InSession?</h2>
                <p style="font-size: 1.125rem; color: var(--color-texto-secundario); line-height: 1.8;">
                    InSession es una plataforma revolucionaria que combina mensajería instantánea y herramientas de entretenimiento. Diseñada para aquellos que buscan comunicarse de manera efectiva, escuchar y descargar música con su bot musical. InSession es un espacio seguro e innovador para conectarse con amigos, familiares y colegas. Prioriza la privacidad, la seguridad y la interacción intuitiva.
                </p>
            </div>
        </section>

        <!-- Sección: ¿Por qué InSession? -->
        <section style="padding: 4rem 2rem; background-color: var(--color-fondo);">
            <div style="max-width: 1000px; margin: 0 auto;">
                <div style="text-align: center; margin-bottom: 3rem;">
                    <h2 style="font-size: 2.5rem; font-weight: 700; color: var(--color-texto); margin-bottom: 1rem;">¿Por qué InSession?</h2>
                    <p style="font-size: 1.125rem; color: var(--color-texto-secundario); max-width: 700px; margin: 0 auto; line-height: 1.8;">
                        InSession busca proporcionar una comunicación libre y sin problemas donde los usuarios puedan abiertamente hablar sin problemas en cualquier momento. La plataforma busca ser una herramienta eficaz para la comunicación entre los usuarios.
                    </p>
                </div>
                
                <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 2rem;">
                    <!-- Card 1 -->
                    <div style="background-color: var(--color-fondo-panel); padding: 2rem; border-radius: var(--border-radius); border: 1px solid var(--color-borde); text-align: center; box-shadow: var(--shadow-sm);">
                        <div style="font-size: 2.5rem; margin-bottom: 1rem;">⚡</div>
                        <h3 style="font-size: 1.25rem; font-weight: 600; color: var(--color-texto); margin-bottom: 1rem;">Mensajería en tiempo real</h3>
                        <p style="color: var(--color-texto-secundario);">Comunicación instantánea entre usuarios.</p>
                    </div>

                    <!-- Card 2 -->
                    <div style="background-color: var(--color-fondo-panel); padding: 2rem; border-radius: var(--border-radius); border: 1px solid var(--color-borde); text-align: center; box-shadow: var(--shadow-sm);">
                        <div style="font-size: 2.5rem; margin-bottom: 1rem;">🔒</div>
                        <h3 style="font-size: 1.25rem; font-weight: 600; color: var(--color-texto); margin-bottom: 1rem;">Seguridad garantizada</h3>
                        <p style="color: var(--color-texto-secundario);">Mensajes encriptados de extremo a extremo para mantener la privacidad de las conversaciones.</p>
                    </div>

                    <!-- Card 3 -->
                    <div style="background-color: var(--color-fondo-panel); padding: 2rem; border-radius: var(--border-radius); border: 1px solid var(--color-borde); text-align: center; box-shadow: var(--shadow-sm);">
                        <div style="font-size: 2.5rem; margin-bottom: 1rem;">🎵</div>
                        <h3 style="font-size: 1.25rem; font-weight: 600; color: var(--color-texto); margin-bottom: 1rem;">¡Bot Musical!</h3>
                        <p style="color: var(--color-texto-secundario);">Bot que busca contenido musical y lo reproduce.</p>
                    </div>

                    <!-- Card 4 -->
                    <div style="background-color: var(--color-fondo-panel); padding: 2rem; border-radius: var(--border-radius); border: 1px solid var(--color-borde); text-align: center; box-shadow: var(--shadow-sm);">
                        <div style="font-size: 2.5rem; margin-bottom: 1rem;">🛠️</div>
                        <h3 style="font-size: 1.25rem; font-weight: 600; color: var(--color-texto); margin-bottom: 1rem;">Soporte constante</h3>
                        <p style="color: var(--color-texto-secundario);">Los desarrolladores junto la comunidad están en actualización constante y sustento de la plataforma.</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Sección: ¿Quiénes somos? -->
        <section style="padding: 4rem 2rem; background-color: var(--color-fondo-panel);">
            <div style="max-width: 800px; margin: 0 auto; text-align: center;">
                <h2 style="font-size: 2.5rem; font-weight: 700; color: var(--color-texto); margin-bottom: 1.5rem;">¿Quiénes somos?</h2>
                <div style="display: flex; justify-content: center; margin-bottom: 1.5rem;">
                    <span style="font-size: 3rem; color: var(--color-primario);">🎓</span>
                </div>
                <p style="font-size: 1.125rem; color: var(--color-texto-secundario); line-height: 1.8;">
                    Somos un grupo de estudiantes del <strong>Instituto Universitario Politécnico Santiago Mariño</strong>, apasionados por la programación y comprometidos con el desarrollo de soluciones tecnológicas innovadoras. Nuestro objetivo es crear plataformas que simplifiquen la vida de las personas y fomenten la conectividad. Buscamos llevar la creatividad y la funcionalidad a un nuevo nivel en el mundo digital.
                </p>
            </div>
        </section>        <!-- Footer sencillo -->
        <footer style="text-align: center; padding: 2rem; color: var(--color-texto-secundario); font-size: 0.875rem; border-top: 1px solid var(--color-borde);">
            <p>&copy; 2024 InSession RIF: J-406204889. Todos los derechos reservados.</p>
        </footer>
    </div>
</body>
</html>
