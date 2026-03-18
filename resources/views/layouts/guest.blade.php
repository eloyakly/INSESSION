<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Insesion') }}</title>
    <link rel="icon" href="{{ asset('logo.png') }}" type="image/png">
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
