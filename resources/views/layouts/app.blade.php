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
    <div class="app-container">
        <!-- Sidebar: Lista de Chats -->
        <aside class="sidebar-chats">
            @yield('sidebar')
        </aside>

        <!-- Área Principal: Ventana de Conversación -->
        <main class="chat-ventana">
            @yield('content')
        </main>
    </div>
</body>
</html>
