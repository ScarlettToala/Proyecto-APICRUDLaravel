# Proyecto API CRUD con Laravel

Este proyecto es una aplicación web que simula una tienda en línea, permitiendo a los usuarios interactuar con un catálogo de productos mediante una **API RESTful**. La aplicación utiliza Laravel y tecnologías modernas para ofrecer una experiencia fluida, segura y eficiente.

---

## Tecnologías Utilizadas

### Frontend
![PHP](https://img.shields.io/badge/PHP-777BB4?style=for-the-badge&logo=php&logoColor=white)
![Blade](https://img.shields.io/badge/Blade-Laravel-red?style=for-the-badge)
![HTML](https://img.shields.io/badge/HTML5-E34F26?style=for-the-badge&logo=html5&logoColor=white)
![CSS](https://img.shields.io/badge/CSS3-1572B6?style=for-the-badge&logo=css3&logoColor=white)
![JavaScript](https://img.shields.io/badge/JavaScript-F7DF1E?style=for-the-badge&logo=javascript&logoColor=black)

### Backend
![PHP](https://img.shields.io/badge/PHP-777BB4?style=for-the-badge&logo=php&logoColor=white)
![Laravel](https://img.shields.io/badge/Laravel-FF2D20?style=for-the-badge&logo=laravel&logoColor=white)

### Base de Datos
![MySQL](https://img.shields.io/badge/MySQL-4479A1?style=for-the-badge&logo=mysql&logoColor=white)
---

## Características Principales

- **API RESTful**  
  Implementa los métodos **GET, POST, PUT y DELETE** para la gestión de productos.

- **Gestión de Productos**  
  Permite agregar, editar y eliminar productos desde el frontend.

- **Interfaz de Usuario**  
  Muestra los productos de forma clara y atractiva, facilitando la navegación y búsqueda.

- **Validación de Datos**  
  Verifica que los datos ingresados sean correctos antes de ser procesados por la API.

- **Autenticación de Usuarios**  
  Los usuarios deben registrarse e iniciar sesión para realizar acciones dentro de la tienda.

---

## Instalación

> Para ejecutar este proyecto puedes usar un servidor local como **XAMPP**, **WAMP** o **Laravel Herd**.  
> El proyecto requiere **PHP**, **Composer** y **Node.js (npm)**.

Sigue estos pasos para ejecutar el proyecto en tu máquina local:

1. Clona el repositorio:
   ```bash
   git clone https://github.com/ScarlettToala/Proyecto-APICRUDLaravel

2. Accede al directorio del proyecto:
    ```bash
    cd Proyecto-APICRUDLaravel
    ```

3. Instala las dependencias de PHP usando Composer:
    ```bash
    composer install
    ```

4. Instala las dependencias de JavaScript usando npm:
    ```bash
    npm install
    ```

5. Configura el archivo `.env`:
    - Copia el archivo `.env.example` y renómbralo a `.env`.

Ejemplo:
    ```bash
    cp .env.example .env
    ```
    - Configura las variables de entorno, especialmente las relacionadas con la base de datos.

6. Genera la clave de la aplicación:
    ```bash
    php artisan key:generate
    ```

7. Ejecuta las migraciones para crear las tablas en la base de datos:
    ```bash
    php artisan migrate
    ```

8. Compila los activos de frontend:
    ```bash
    php artisan serve
    ```
9. Abrir el navegador
    - Accede a `http://localhost:8000` para ver la aplicación en funcionamiento.

---

## Endpoints de la API

### Productos (Públicos)

#### Obtener todos los productos
- **Método:** GET  
- **URL:** `/productos`  
- **Descripción:** Devuelve la lista completa de productos disponibles.

---

#### Obtener un producto por ID
- **Método:** GET  
- **URL:** `/productos/{id}`  
- **Parámetros de ruta:**
  - `id` (integer) — ID del producto
- **Descripción:** Devuelve la información detallada de un producto específico.

---

#### Vista principal (Home)
- **Método:** GET  
- **URL:** `/`  
- **Descripción:** Muestra la página principal con productos destacados.

---

#### Buscar productos
- **Método:** GET  
- **URL:** `/buscar`  
- **Parámetros de consulta (query):**
  - `q` (string) — Término de búsqueda
- **Descripción:** Permite buscar productos por nombre o categoría.

---

### Autenticación

#### Mostrar formulario de login
- **Método:** GET  
- **URL:** `/login`  
- **Descripción:** Muestra el formulario de inicio de sesión.

---

#### Iniciar sesión
- **Método:** POST  
- **URL:** `/login`  
- **Body (form-data):**
  - `email` (string)
  - `password` (string)
- **Descripción:** Autentica al usuario y crea una sesión.

---

#### Cerrar sesión
- **Método:** POST  
- **URL:** `/logout`  
- **Autenticación:** Requiere sesión activa  
- **Descripción:** Cierra la sesión del usuario autenticado.


### Cesta de Compras (Rutas Protegidas)

> Estas rutas requieren que el usuario esté autenticado.

#### Ver cesta de compras
- **Método:** GET  
- **URL:** `/cesta`  
- **Descripción:** Muestra los productos añadidos a la cesta del usuario.


---

#### Agregar producto a la cesta
- **Método:** POST  
- **URL:** `/cesta/add`  
- **Body (form-data o JSON):**
  - `product_id` (integer)
  - `quantity` (integer)
- **Descripción:** Agrega un producto a la cesta de compras.

---

#### Actualizar producto de la cesta
- **Método:** PUT  
- **URL:** `/cesta/{cesta}`  
- **Parámetros de ruta:**
  - `cesta` (integer) — ID del registro en la cesta
- **Body:**
  - `quantity` (integer)
- **Descripción:** Actualiza la cantidad de un producto en la cesta.

---

#### Eliminar producto de la cesta
- **Método:** DELETE  
- **URL:** `/cesta/{cesta}`  
- **Parámetros de ruta:**
  - `cesta` (integer)
- **Descripción:** Elimina un producto de la cesta de compras.

---
## Estado del Proyecto
El proyecto se encuentra en desarrollo activo. Próximamente se implementarán funcionalidades adicionales como confirmación de correo electrónico y recuperación de contraseña.
