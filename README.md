# Sistema de Administración de Productos
Este proyecto tiene como objetivo desarrollar un sistema completo de administración de productos que permita gestionar de manera eficiente la información de los productos disponibles en un inventario.

## Tecnologías Utilizadas
Laravel 11: Framework de desarrollo web para el backend del sistema.
PHP 8.2: Lenguaje de programación utilizado en el desarrollo del backend.
MYSQL 8: Gestor de base de datos.
Sanctum: Paquete de autenticación API para Laravel.
Spatie: Biblioteca de Laravel para la gestión de roles y permisos.
Vue.js 3: Framework progresivo para la construcción de interfaces de usuario en el frontend.

## Instalación y Configuración (Backend)
1. Clonar el Repositorio.
2. Instalar composer: composer install
3. Crear DB con el nombre: al_db (utf8mb4_spanish_ci)
4. Correr migraciones y seeders: php artisan migrate --seed
   
## Instalación y Configuración (Frontend)
1. Clonar el repositorio.
2. Instalar dependencias: npm i
   
## Uso
1. Iniciar el servidor Laravel para gestionar los productos y usuarios del sistema: php artisan serve
2. Acceder a la interfaz de administración de productos y usuarios mediante Vue.js: npm run dev
3. Utilizar los roles y permisos configurados para controlar el acceso a las funcionalidades del sistema de acuerdo con las políticas definidas.

Por defecto se crean 2 usuarios con distintos roles y permisos:
- admin@gmail.com (rol: admin)
- ventas@gmail.com (rol: seller)

La contraseña por defecto para ambos: 123456

