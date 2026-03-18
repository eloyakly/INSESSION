# 🚀 InSession - Mensajería e Interacción Inteligente

![InSession Logo](public/img/logo_insession.png)

**InSession** es una plataforma revolucionaria que redefine la comunicación digital al combinar mensajería instantánea de alta fidelidad con herramientas de entretenimiento integradas. Diseñada para ofrecer una experiencia fluida, segura e innovadora, InSession no es solo una app de chat; es un ecosistema donde la música y la conexión social convergen.

---

## ✨ Características Principales

- **💬 Mensajería Instantánea:** Chats privados y grupales (Comunidades) con actualización en tiempo real.
- **🎵 Bot Musical Integrado:** Escucha y descarga tu música favorita directamente desde la plataforma.
- **🛡️ Privacidad Primero:** Arquitectura diseñada para garantizar la seguridad de tus datos y conversaciones.
- **🎨 Interfaz Moderna:** Diseño minimalista y profesional utilizando colores **Gris Carbón**, **Blanco** y **Verde Esmeralda/Morado (#6a0dad)**.
- **📂 Gestión de Archivos:** Soporte para envío de imágenes, audios y documentos optimizados en formato WebP y SVG.

---

## 🛠️ Stack Tecnológico

El proyecto está construido con las mejores tecnologías de desarrollo web moderno:

- **Backend:** [Laravel 10+](https://laravel.com/) (PHP)
- **Frontend:** [Blade Templates](https://laravel.com/docs/blade) & [Tailwind CSS](https://tailwindcss.com/)
- **Interactividad:** JavaScript (ES6+)
- **Compilación:** [Vite](https://vitejs.dev/)
- **Base de Datos:** MySQL / MariaDB (Estructura normalizada)

---

## 🚀 Instalación y Configuración

Sigue estos pasos para correr el proyecto en tu entorno local:

1. **Clonar el repositorio:**
    ```Terminal
    git clone https://github.com/eloyakly/INSESSION.git
    cd INSESSION
    ```

**Instalar dependencias de PHP:**
`Terminal
    composer install
    `

**Instalar dependencias de JavaScript:**
`Terminal
    npm install
    `

**Configurar variables de entorno:**
`Terminal
    cp .env.example .env
    # Editar .env con tus credenciales de base de datos y API keys
    `

**Ejecutar migraciones y seeders:**
`Terminal
    php artisan migrate --seed
    `

**Iniciar el servidor de desarrollo:**
`Terminal
    php artisan serve
    `

**Iniciar el servidor de Vite:**
`Terminal
    npm run dev
    `
