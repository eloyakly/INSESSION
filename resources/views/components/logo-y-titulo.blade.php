 <title>InSesion</title>
<link rel="icon" href="{{ asset('logo.png') }}" type="image/png">
@vite(['resources/css/app.css', 'resources/js/app.js'])
<script>
    if (localStorage.getItem('color-theme') === 'dark' || (!('color-theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
        document.documentElement.classList.add('dark');
    } else {
        document.documentElement.classList.remove('dark');
    }
</script>