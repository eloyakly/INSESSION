@extends('layouts.guest')

@section('content')
    <form method="POST" action="{{ route('register') ?? '#' }}">
        @csrf

        <div class="form-group">
            <label for="name" class="form-label">Nombre Completo</label>
            <input id="name" class="input-control" type="text" name="name" value="{{ old('name') }}" required autofocus autocomplete="name" />
        </div>

        <div class="form-group">
            <label for="email" class="form-label">Correo Electrónico</label>
            <input id="email" class="input-control" type="email" name="email" value="{{ old('email') }}" required autocomplete="username" />
        </div>

        <div class="form-group">
            <label for="password" class="form-label">Contraseña</label>
            <input id="password" class="input-control" type="password" name="password" required autocomplete="new-password" />
        </div>

        <div class="form-group">
            <label for="password_confirmation" class="form-label">Confirmar Contraseña</label>
            <input id="password_confirmation" class="input-control" type="password" name="password_confirmation" required autocomplete="new-password" />
        </div>

        <div style="display: flex; flex-direction: column; gap: 1rem; margin-top: 2rem;">
            <x-boton-primario tipo="submit" style="width: 100%;">
                Registrarse
            </x-boton-primario>
            
            <div style="text-align: center; font-size: 0.875rem; color: var(--color-texto-secundario);">
                ¿Ya tienes cuenta? <a href="{{ route('login') ?? '/login' }}">Inicia sesión</a>
            </div>
        </div>
    </form>
@endsection
