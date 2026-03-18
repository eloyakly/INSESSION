@extends('layouts.app')

@section('sidebar')
    @include('chat.partials.sidebar')
@endsection

@section('content')
    <!-- Cabecera del Chat Activo -->
    <div class="chat-header">
        <div style="display: flex; align-items: center; gap: 1rem;">
            <!-- Botón volver (Visible solo en responsive, usaremos clase CSS) -->
            <a href="{{ route('chat.index') }}" class="btn-volver" style="text-decoration: none; font-size: 1.25rem; color: var(--color-texto-secundario); margin-right: 0.5rem; display: none;">
                ←
            </a>
            <div style="width: 40px; height: 40px; border-radius: 50%; background-color: var(--color-primario); color: white; display: flex; align-items: center; justify-content: center; font-weight: bold;">
                A
            </div>
            <div>
                <h3 style="margin: 0; font-size: 1.125rem; color: var(--color-texto);">Ana Martínez</h3>
                <span style="font-size: 0.8125rem; color: var(--color-primario);">En línea</span>
            </div>
        </div>
        
        <div style="display: flex; gap: 1rem;">
            <button style="background: none; border: none; font-size: 1.25rem; color: var(--color-texto-secundario); cursor: pointer;">🔍</button>
            <button style="background: none; border: none; font-size: 1.25rem; color: var(--color-texto-secundario); cursor: pointer;">⋮</button>
        </div>
    </div>

    <!-- Área de Mensajes -->
    <div class="chat-mensajes" id="chat-zona-scroll">
        <div style="text-align: center; margin: 1rem 0;">
            <span style="background-color: var(--color-fondo-panel); padding: 0.25rem 0.75rem; border-radius: 12px; font-size: 0.75rem; color: var(--color-texto-secundario); border: 1px solid var(--color-borde);">Hoy</span>
        </div>

        <x-burbuja-mensaje 
            :es-propio="false"
            mensaje="Hola! ¿Ya terminaste de revisar el diseño de las nuevas vistas?"
            hora="10:15 AM" />

        <x-burbuja-mensaje 
            :es-propio="true"
            mensaje="¡Hola Ana! Sí, justo acabo de enviar la versión final de los componentes de Blade."
            hora="10:20 AM" />
            
        <x-burbuja-mensaje 
            :es-propio="false"
            mensaje="¡Genial! Déjame echarles un vistazo. ¿Incluiste el soporte para el tema claro y oscuro como acordamos?"
            hora="10:22 AM" />

        <x-burbuja-mensaje 
            :es-propio="true"
            mensaje="¡Claro! Nos vemos a las 5."
            hora="10:30 AM" />
    </div>

    <!-- Input de Mensaje -->
    <div class="chat-footer">
        <button style="background: none; border: none; font-size: 1.5rem; color: var(--color-texto-secundario); cursor: pointer; display: flex; align-items: center;" title="Adjuntar archivo">
            📎
        </button>
        
        <input type="text" class="input-control" placeholder="Escribe un mensaje..." style="border-radius: 20px; flex: 1;" />
        
        <button style="background-color: var(--color-primario); color: white; border: none; width: 40px; height: 40px; border-radius: 50%; display: flex; align-items: center; justify-content: center; cursor: pointer; box-shadow: var(--shadow-sm);" title="Enviar mensaje">
            ➤
        </button>
    </div>

    <script>
        // Auto-scroll al fondo al cargar y activar chat en móviles
        document.addEventListener("DOMContentLoaded", function() {
            var appContainer = document.querySelector('.app-container');
            if(appContainer) {
                appContainer.classList.add('chat-activo');
            }

            var scrollZone = document.getElementById('chat-zona-scroll');
            if(scrollZone) {
                scrollZone.scrollTop = scrollZone.scrollHeight;
            }
        });
    </script>
@endsection
