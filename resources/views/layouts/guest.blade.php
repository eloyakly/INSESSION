<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <meta name="csrf-token" content="{{ csrf_token() }}">

   
     <x-logo-y-titulo />
    <!-- Estilos de la aplicación -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    <!-- Evitar parpadeo (FOUC) aplicando el tema antes de renderizar -->
    <script>
        if (localStorage.getItem('color-theme') === 'dark' || (!('color-theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
            document.documentElement.classList.add('dark');
        } else {
            document.documentElement.classList.remove('dark');
        }
    </script>
</head>
<body>
    <div style="position: absolute; top: 1rem; left: 1rem;">
        <a href="/" style="
            display: inline-flex; align-items: center; gap: 0.4rem;
            color: var(--color-texto-secundario);
            text-decoration: none;
            font-size: 0.875rem;
            padding: 0.4rem 0.75rem;
            border-radius: 8px;
            transition: background 0.2s, color 0.2s;
        " onmouseover="this.style.background='var(--color-fondo)'; this.style.color='var(--color-primario)'" onmouseout="this.style.background='transparent'; this.style.color='var(--color-texto-secundario)'">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="M19 12H5"></path>
                <path d="M12 19l-7-7 7-7"></path>
            </svg>
            Volver al inicio
        </a>
    </div>
    <div style="position: absolute; top: 1rem; right: 1rem;">
        <x-theme-toggle />
    </div>

    <div class="auth-container">
        <div class="auth-card">
            <div style="text-align: center; margin-bottom: 2rem;">
                <h1 style="color: var(--color-primario); font-size: 2rem; margin-bottom: 0.5rem;">Insesion</h1>
                <p style="color: var(--color-texto-secundario);">Mensajería instantánea profesional</p>
            </div>
            
            @yield('content')
        </div>
    </div>
</body>
</html>
