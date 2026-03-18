@extends('layouts.guest')

@section('content')
    <form id="registerForm" method="POST" action="{{ route('register') ?? '#' }}">
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
            <div style="position: relative;">
                <input id="password" class="input-control" type="password" name="password" required autocomplete="new-password" style="padding-right: 2.5rem; width: 100%; box-sizing: border-box;" />
                <button type="button" onclick="togglePasswordVisibility('password', this)" style="position: absolute; right: 0.75rem; top: 50%; transform: translateY(-50%); background: none; border: none; cursor: pointer; color: var(--color-texto-secundario); display: flex; align-items: center; justify-content: center; padding: 0;">
                    <svg class="eye-icon" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M2 12s3-7 10-7 10 7 10 7-3 7-10 7-10-7-10-7Z"></path>
                        <circle cx="12" cy="12" r="3"></circle>
                    </svg>
                    <svg class="eye-off-icon" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="display: none;">
                        <path d="M9.88 9.88a3 3 0 1 0 4.24 4.24"></path>
                        <path d="M10.73 5.08A10.43 10.43 0 0 1 12 5c7 0 10 7 10 7a13.16 13.16 0 0 1-1.67 2.68"></path>
                        <path d="M6.61 6.61A13.526 13.526 0 0 0 2 12s3 7 10 7a9.74 9.74 0 0 0 5.39-1.61"></path>
                        <line x1="2" y1="2" x2="22" y2="22"></line>
                    </svg>
                </button>
            </div>
        </div>

        <div class="form-group">
            <label for="password_confirmation" class="form-label">Confirmar Contraseña</label>
            <div style="position: relative;">
                <input id="password_confirmation" class="input-control" type="password" name="password_confirmation" required autocomplete="new-password" style="padding-right: 2.5rem; width: 100%; box-sizing: border-box;" />
                <button type="button" onclick="togglePasswordVisibility('password_confirmation', this)" style="position: absolute; right: 0.75rem; top: 50%; transform: translateY(-50%); background: none; border: none; cursor: pointer; color: var(--color-texto-secundario); display: flex; align-items: center; justify-content: center; padding: 0;">
                    <svg class="eye-icon" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M2 12s3-7 10-7 10 7 10 7-3 7-10 7-10-7-10-7Z"></path>
                        <circle cx="12" cy="12" r="3"></circle>
                    </svg>
                    <svg class="eye-off-icon" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="display: none;">
                        <path d="M9.88 9.88a3 3 0 1 0 4.24 4.24"></path>
                        <path d="M10.73 5.08A10.43 10.43 0 0 1 12 5c7 0 10 7 10 7a13.16 13.16 0 0 1-1.67 2.68"></path>
                        <path d="M6.61 6.61A13.526 13.526 0 0 0 2 12s3 7 10 7a9.74 9.74 0 0 0 5.39-1.61"></path>
                        <line x1="2" y1="2" x2="22" y2="22"></line>
                    </svg>
                </button>
            </div>
        </div>

        <div style="display: flex; flex-direction: column; gap: 1rem; margin-top: 2rem;">
            <x-boton-primario tipo="submit" style="width: 100%;">
                Registrarse
            </x-boton-primario>
            
            <div style="text-align: center; font-size: 0.875rem; color: var(--color-texto-secundario);">
                ¿Ya tienes cuenta? <a href="{{ route('login') ?? '/login' }}">Inicia sesión</a>
            </div>
        </div>
        </div>
    </form>

    <script>
        function togglePasswordVisibility(inputId, btn) {
            const input = document.getElementById(inputId);
            const eyeIcon = btn.querySelector('.eye-icon');
            const eyeOffIcon = btn.querySelector('.eye-off-icon');
            
            if (input.type === 'password') {
                input.type = 'text';
                eyeIcon.style.display = 'none';
                eyeOffIcon.style.display = 'block';
            } else {
                input.type = 'password';
                eyeIcon.style.display = 'block';
                eyeOffIcon.style.display = 'none';
            }
        }
    </script>
@endsection
