addEventListener('DOMContentLoaded', () => {
    const registerForm = document.getElementById('loginForm');

    if (!registerForm) return; // Seguridad por si el script carga en una página sin el form

    registerForm.addEventListener('submit', async (e) => {
        e.preventDefault();

        const formData = new FormData(registerForm);
        const data = Object.fromEntries(formData.entries());
        
        // Obtener el token del meta tag
        const token = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content');

        try {
            const response = await fetch(registerForm.action, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'Accept': 'application/json', // <--- Obliga a Laravel a responder JSON
                    'X-CSRF-TOKEN': token
                },
                body: JSON.stringify(data)
            });

            const result = await response.json();

            if (response.ok) {
                // Éxito (Status 200-299)
                new Notify({
                    status: 'success',
                    title: '¡Inicio de Sesión Exitoso!',
                    text: 'Has iniciado sesión correctamente.',
                    effect: 'fade',
                    speed: 300,
                    showIcon: true,
                    autoclose: true,
                    autotimeout: 3000,
                    gap: 20,
                    distance: 20,
                    type: 1,
                    position: 'right top'
                });
                setTimeout(() => window.location.href = '/chat', 3000);
            } else if (response.status === 422) {
                // Errores de validación de Laravel
                
                new Notify({    
                    status: 'error',
                    title: result.message,
                    text: "Datos invalidos verifique que no existan campos vacios o datos incorrectos",
                    effect: "fade",
                    speed: 300,
                    showIcon: true,
                    autoclose: true,
                    autotimeout: 6000,
                    gap: 20,
                    distance: 20,
                    type: 1,
                    position: 'right top'
                });
            } else {
                // Otros errores (500, 403, etc)
                new Notify({
                    status: 'error',
                    title: result.message,
                    text: result.message,
                    effect: "fade",
                    speed: 300,
                    showIcon: true,
                    autoclose: true,
                    autotimeout: 6000,
                    gap: 20,
                    distance: 20,
                    type: 1,
                    position: 'right top'
                });
            }

        } catch (error) {
            // Error de conexión o red
            console.error('Error de red:', error);
        }
    });
});

/**
 * Ejemplo sencillo para mostrar errores en los inputs
 */
function mostrarErrores(errors) {
    // Limpiar errores previos
    document.querySelectorAll('.text-danger').forEach(el => el.remove());

    for (const campo in errors) {
        const input = document.getElementsByName(campo)[0];
        if (input) {
            const errorMsg = document.createElement('small');
            errorMsg.className = 'text-danger';
            errorMsg.innerText = errors[campo][0];
            input.after(errorMsg);
        }
    }
}