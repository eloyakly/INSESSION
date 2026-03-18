<div class="sidebar-header">
    <div style="display: flex; align-items: center; justify-content: space-between; margin-bottom: 1rem;">
        <h2 style="font-size: 1.25rem; font-weight: 600; color: var(--color-texto);">Mensajes</h2>
        <div style="display: flex; gap: 0.5rem; align-items: center;">
            <x-theme-toggle />
            <!-- Aquí podría ir un dropdown de opciones de usuario -->
            <button style="background: none; border: none; font-size: 1.25rem; color: var(--color-texto-secundario); cursor: pointer;">
                ⋮
            </button>
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
