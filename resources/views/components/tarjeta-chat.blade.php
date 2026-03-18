@props([
    'nombre',
    'ultimoMensaje',
    'hora',
    'foto' => null,
    'enLinea' => false,
    'activo' => false
])

<div {{ $attributes->merge(['class' => 'tarjeta-chat ' . ($activo ? 'activo' : '')]) }}>
    <div class="tarjeta-avatar">
        @if($foto)
            <img src="{{ $foto }}" alt="Foto de perfil de {{ $nombre }}">
        @else
            <div class="avatar-placeholder">
                {{ substr($nombre, 0, 1) }}
            </div>
        @endif
        
        @if($enLinea)
            <span class="indicador-en-linea"></span>
        @endif
    </div>
    
    <div class="tarjeta-info">
        <div class="tarjeta-header">
            <h4>{{ $nombre }}</h4>
            <span class="tarjeta-hora">{{ $hora }}</span>
        </div>
        <p class="tarjeta-mensaje">{{ $ultimoMensaje }}</p>
    </div>
</div>

<style>
/* Estilos específicos del componente. Podrían ir en app.css, pero los colocamos aquí para modularidad o en app.css posteriormente */
.tarjeta-chat {
    display: flex;
    align-items: center;
    padding: 1rem;
    cursor: pointer;
    border-bottom: 1px solid var(--color-borde);
    transition: background-color 0.2s ease;
}

.tarjeta-chat:hover, .tarjeta-chat.activo {
    background-color: var(--color-fondo);
}

.tarjeta-avatar {
    position: relative;
    width: 48px;
    height: 48px;
    border-radius: 50%;
    margin-right: 1rem;
    flex-shrink: 0;
}

.tarjeta-avatar img, .avatar-placeholder {
    width: 100%;
    height: 100%;
    border-radius: 50%;
    object-fit: cover;
}

.avatar-placeholder {
    background-color: var(--color-primario);
    color: white;
    display: flex;
    align-items: center;
    justify-content: center;
    font-weight: bold;
    font-size: 1.25rem;
}

.indicador-en-linea {
    position: absolute;
    bottom: 2px;
    right: 2px;
    width: 12px;
    height: 12px;
    background-color: green;
    border-radius: 50%;
    border: 2px solid var(--color-fondo-panel);
}

.tarjeta-info {
    flex: 1;
    min-width: 0; /* Para que el truncado de texto funcione en Flexbox */
}

.tarjeta-header {
    display: flex;
    justify-content: space-between;
    align-items: baseline;
    margin-bottom: 0.25rem;
}

.tarjeta-header h4 {
    margin: 0;
    font-size: 1rem;
    font-weight: 500;
    color: var(--color-texto);
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
}

.tarjeta-hora {
    font-size: 0.75rem;
    color: var(--color-texto-secundario);
    margin-left: 0.5rem;
    flex-shrink: 0;
}

.tarjeta-mensaje {
    margin: 0;
    font-size: 0.875rem;
    color: var(--color-texto-secundario);
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
}
</style>
