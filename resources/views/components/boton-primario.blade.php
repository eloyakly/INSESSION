@props([
    'tipo' => 'button'
])

<button type="{{ $tipo }}" {{ $attributes->merge(['class' => 'boton-primario']) }}>
    {{ $slot }}
</button>

<style>
.boton-primario {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    padding: 0.75rem 1.5rem;
    background-color: var(--color-primario);
    color: #FFFFFF;
    font-weight: 500;
    font-size: 0.9375rem;
    border: none;
    border-radius: var(--border-radius);
    transition: background-color 0.2s ease, transform 0.1s ease;
}

.boton-primario:hover {
    background-color: var(--color-primario-hover);
}

.boton-primario:active {
    transform: translateY(1px);
}

.boton-primario:focus {
    outline: none;
    box-shadow: 0 0 0 3px rgba(80, 200, 120, 0.3); /* Anillo esmeralda translúcido */
}

/* En modo oscuro también mantenemos el texto blanco en este botón para el contraste */
@media (prefers-color-scheme: dark) {
    .boton-primario {
        color: #FFFFFF;
    }
}
</style>
