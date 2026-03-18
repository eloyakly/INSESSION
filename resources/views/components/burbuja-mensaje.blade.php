@props([
    'esPropio' => false,
    'mensaje',
    'hora'
])

<div class="burbuja-contenedor {{ $esPropio ? 'propio' : 'ajeno' }}">
    <div class="burbuja-mensaje">
        <p class="burbuja-texto">{{ $mensaje }}</p>
        <span class="burbuja-hora">{{ $hora }}</span>
    </div>
</div>

<style>
.burbuja-contenedor {
    display: flex;
    width: 100%;
    margin-bottom: 0.5rem;
}

.burbuja-contenedor.propio {
    justify-content: flex-end;
}

.burbuja-contenedor.ajeno {
    justify-content: flex-start;
}

.burbuja-mensaje {
    max-width: 75%;
    padding: 0.75rem 1rem;
    border-radius: var(--border-radius);
    position: relative;
    box-shadow: var(--shadow-sm);
}

/* Estilos de mensaje enviado por el usuario */
.burbuja-contenedor.propio .burbuja-mensaje {
    background-color: var(--color-burbuja-propia);
    color: var(--color-texto-burbuja-propia);
    border-bottom-right-radius: 0;
}

/* Estilos de mensaje recibido */
.burbuja-contenedor.ajeno .burbuja-mensaje {
    background-color: var(--color-burbuja-ajena);
    color: var(--color-texto-burbuja-ajena);
    border: 1px solid var(--color-borde);
    border-bottom-left-radius: 0;
}

.burbuja-texto {
    margin: 0;
    font-size: 0.9375rem;
    line-height: 1.4;
    word-break: break-word;
}

.burbuja-hora {
    display: block;
    font-size: 0.6875rem;
    margin-top: 0.25rem;
    text-align: right;
    opacity: 0.8;
}

.burbuja-contenedor.ajeno .burbuja-hora {
    color: var(--color-texto-secundario);
}
</style>
