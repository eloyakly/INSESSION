<button id="theme-toggle" type="button" class="theme-toggle-btn" title="Cambiar tema">
    <span id="theme-icon-light" style="display: none;">🌞</span>
    <span id="theme-icon-dark" style="display: none;">🌙</span>
</button>

<style>
.theme-toggle-btn {
    background: transparent;
    border: 1px solid var(--color-borde);
    color: var(--color-texto);
    border-radius: 50%;
    width: 36px;
    height: 36px;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
    font-size: 1.1rem;
    transition: all 0.2s ease;
    flex-shrink: 0;
}
.theme-toggle-btn:hover {
    background-color: var(--color-fondo-panel);
    border-color: var(--color-primario);
}
</style>

<script>
document.addEventListener('DOMContentLoaded', () => {
    const themeToggleBtn = document.getElementById('theme-toggle');
    const themeIconDark = document.getElementById('theme-icon-dark');
    const themeIconLight = document.getElementById('theme-icon-light');

    if (!themeToggleBtn) return;

    // Inicializar iconos según el tema actual
    if (document.documentElement.classList.contains('dark')) {
        themeIconLight.style.display = 'block'; // Mostrar sol si es oscuro
    } else {
        themeIconDark.style.display = 'block'; // Mostrar luna si es claro
    }

    themeToggleBtn.addEventListener('click', function() {
        // Toggle la clase dark en el elemento HTML
        document.documentElement.classList.toggle('dark');
        
        let theme = 'light';
        if (document.documentElement.classList.contains('dark')) {
            theme = 'dark';
            themeIconDark.style.display = 'none';
            themeIconLight.style.display = 'block';
        } else {
            themeIconLight.style.display = 'none';
            themeIconDark.style.display = 'block';
        }
        
        // Guardar la preferencia
        localStorage.setItem('color-theme', theme);
    });
});
</script>
