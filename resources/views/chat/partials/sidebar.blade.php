<div class="sidebar-header">
    <div style="display: flex; align-items: center; justify-content: space-between; margin-bottom: 1rem;">
        <h2 style="font-size: 1.25rem; font-weight: 600; color: var(--color-texto);">Mensajes</h2>
        <div style="display: flex; gap: 0.5rem; align-items: center;">
            <x-theme-toggle />
            <!-- Dropdown de opciones de usuario -->
            <div class="dropdown-menu-usuario" style="position: relative;">
                <button id="btn-menu-usuario" style="background: none; border: none; cursor: pointer; padding: 0; border-radius: 50%; transition: opacity 0.2s;" title="Opciones de usuario">
                    @auth
                    <div class="tarjeta-avatar" style="width: 34px; height: 34px; margin: 0;">
                        @if(Auth::user()->foto)
                            <img src="{{ Auth::user()->foto }}" alt="Foto de perfil" style="width: 100%; height: 100%; border-radius: 50%; object-fit: cover;">
                        @else
                            <div class="avatar-placeholder" style="font-size: 0.9rem; width: 100%; height: 100%;">
                                {{ strtoupper(substr(Auth::user()->nombre ?? Auth::user()->name ?? 'U', 0, 1)) }}
                            </div>
                        @endif
                    </div>
                    @endauth
                </button>
                <div id="dropdown-usuario" class="dropdown-panel" style="
                    display: none;
                    position: absolute;
                    top: calc(100% + 0.5rem);
                    right: 0;
                    min-width: 210px;
                    background-color: var(--color-fondo-panel);
                    border: 1px solid var(--color-borde);
                    border-radius: var(--border-radius);
                    box-shadow: var(--shadow);
                    z-index: 1000;
                    overflow: hidden;
                    animation: dropdown-aparecer 0.18s ease-out;
                ">
                    {{-- Info del usuario --}}
                    @auth
                    <div style="padding: 0.75rem 1rem; border-bottom: 1px solid var(--color-borde);">
                        <p style="font-weight: 600; font-size: 0.9rem; color: var(--color-texto); margin: 0;">{{ Auth::user()->nombre ?? Auth::user()->name ?? 'Usuario' }}</p>
                        <p style="font-size: 0.75rem; color: var(--color-texto-secundario); margin: 0.15rem 0 0;">{{ Auth::user()->correo ?? Auth::user()->email ?? '' }}</p>
                    </div>
                    @endauth

                    {{-- Opciones --}}
                    <div style="padding: 0.35rem 0;">
                        <a href="/perfil" class="dropdown-item" style="
                            display: flex; align-items: center; gap: 0.65rem;
                            padding: 0.6rem 1rem;
                            color: var(--color-texto);
                            text-decoration: none;
                            font-size: 0.875rem;
                            transition: background 0.15s;
                        ">
                            <span style="font-size: 1.1rem;">👤</span>
                            Mi Perfil
                        </a>
                        <a href="#" onclick="cerrarSesion(event)" class="dropdown-item dropdown-item-peligro" style="
                            display: flex; align-items: center; gap: 0.65rem;
                            padding: 0.6rem 1rem;
                            color: #DC3545;
                            text-decoration: none;
                            font-size: 0.875rem;
                            transition: background 0.15s;
                        ">
                            <span style="font-size: 1.1rem;">🚪</span>
                            Cerrar Sesión
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="form-group" style="margin-bottom: 0;">
        <input type="text" class="input-control" placeholder="Buscar contactos o mensajes..." style="border-radius: 20px;">
    </div>
</div>

<div class="sidebar-lista">
    <!-- Lista de chats estática como demo -->
    <x-tarjeta-chat 
        nombre="Ana Martínez" 
        ultimo-mensaje="¡Claro! Nos vemos a las 5." 
        hora="10:30 AM" 
        :en-linea="true"
        class="{{ request()->is('chat/1') ? 'activo' : '' }}" />

    <x-tarjeta-chat 
        nombre="Carlos Ruiz" 
        ultimo-mensaje="Envié el informe que pediste." 
        hora="Ayer" 
        :en-linea="false"
        class="{{ request()->is('chat/2') ? 'activo' : '' }}" />

    <x-tarjeta-chat 
        nombre="Equipo de Diseño" 
        ultimo-mensaje="Laura: He subido los nuevos mockups" 
        hora="Marte" 
        :en-linea="true" />
</div>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const btn = document.getElementById('btn-menu-usuario');
    const dropdown = document.getElementById('dropdown-usuario');

    if (btn && dropdown) {
        btn.addEventListener('click', function (e) {
            e.stopPropagation();
            const abierto = dropdown.style.display === 'block';
            dropdown.style.display = abierto ? 'none' : 'block';
        });

        document.addEventListener('click', function (e) {
            if (!dropdown.contains(e.target) && !btn.contains(e.target)) {
                dropdown.style.display = 'none';
            }
        });
    }
});

function cerrarSesion(e) {
    e.preventDefault();

    // Limpiar almacenamiento del navegador
    localStorage.clear();
    sessionStorage.clear();

    // Limpiar Cache API (si está disponible)
    if ('caches' in window) {
        caches.keys().then(function (names) {
            names.forEach(function (name) {
                caches.delete(name);
            });
        });
    }

    // Redirigir al logout del servidor
    window.location.href = '/logout';
}
</script>
