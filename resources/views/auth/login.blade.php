@extends('layouts.guest')

@section('content')
    <form method="POST" action="{{ route('login') ?? '#' }}">
        @csrf

        <div class="form-group">
            <label for="email" class="form-label">Correo Electrónico</label>
            <input id="email" class="input-control" type="email" name="email" value="{{ old('email') }}" required autofocus autocomplete="username" />
        </div>

        <div class="form-group">
            <label for="password" class="form-label">Contraseña</label>
            <input id="password" class="input-control" type="password" name="password" required autocomplete="current-password" />
        </div>

        <div class="form-group" style="display: flex; align-items: center; justify-content: space-between;">
            <label style="display: flex; align-items: center; cursor: pointer;">
                <input id="remember_me" type="checkbox" name="remember" style="margin-right: 0.5rem;">
                <span style="font-size: 0.875rem; color: var(--color-texto-secundario);">Recordarme</span>
            </label>

            @if (Route::has('password.request'))
                <a style="font-size: 0.875rem;" href="{{ route('password.request') }}">
                    ¿Olvidaste tu contraseña?
                </a>
            @endif
        </div>

        <div style="display: flex; flex-direction: column; gap: 1rem; margin-top: 2rem;">
            <x-boton-primario tipo="submit" style="width: 100%;">
                Iniciar Sesión
            </x-boton-primario>
            
            <div style="text-align: center; font-size: 0.875rem; color: var(--color-texto-secundario);">
                ¿No tienes cuenta? <a href="{{ route('register') ?? '/register' }}">Regístrate</a>
            </div>
        </div>
    </form>
@endsection
