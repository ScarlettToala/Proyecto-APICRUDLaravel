# Proyecto API CRUD con Laravel

## Descripción General

Este proyecto consiste en el desarrollo de una **aplicación web basada en Laravel** que implementa una **API RESTful** para la gestión de productos en una tienda en línea.  
El sistema permite realizar operaciones CRUD (**Crear, Leer, Actualizar y Eliminar**) sobre los productos, integrando una interfaz de usuario clara y estructurada que facilita la interacción con la API.

La aplicación sigue buenas prácticas de desarrollo web, separando responsabilidades entre frontend y backend, e incorporando mecanismos de validación y autenticación de usuarios.

---

## Objetivos del Proyecto

### Objetivo General
Desarrollar una API RESTful utilizando el framework Laravel que permita la gestión eficiente de productos dentro de una tienda en línea.

### Objetivos Específicos
- Implementar operaciones CRUD para la administración de productos.
- Aplicar autenticación de usuarios para proteger rutas sensibles.
- Validar la información enviada desde el frontend antes de su procesamiento.
- Diseñar una interfaz de usuario intuitiva para la visualización y gestión de productos.
- Integrar una cesta de compras asociada a usuarios autenticados.

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

## Características del Sistema

- **API RESTful**  
  Implementación de los métodos HTTP **GET, POST, PUT y DELETE** para la gestión de recursos.

- **Gestión de Productos**  
  Permite crear, consultar, actualizar y eliminar productos desde la interfaz web.

- **Autenticación de Usuarios**  
  Sistema de registro e inicio de sesión para controlar el acceso a funcionalidades protegidas.

- **Validación de Datos**  
  Control de integridad y consistencia de los datos antes de ser almacenados en la base de datos.

- **Cesta de Compras**  
  Gestión de productos seleccionados por el usuario autenticado.

---

## Requisitos del Sistema

- PHP >= 8.0  
- Composer  
- Node.js y npm  
- MySQL  
- Servidor local (XAMPP, WAMP o Laravel Herd)

---

## Instalación y Configuración

Para ejecutar el proyecto en un entorno local, siga los siguientes pasos:

1. Clonar el repositorio:
   ```bash
   git clone https://github.com/ScarlettToala/Proyecto-APICRUDLaravel

2.Acceder al directorio del proyecto:
   ```bash
   cd Proyecto-APICRUDLaravel
   ```

3. Instalar las dependencias de PHP:
   ```bash
    composer install
    ```
4. Instalar las dependencias de JavaScript:
   ```bash
   npm install
   ```  
5. Configurar el archivo `.env`:
   - Copiar el archivo `.env.example` y renombrarlo a `.env`.

6. Generar la clave de la aplicación:
   ```bash
   php artisan key:generate
   ```
7. Ejecutar las migraciones::
   ``
   php artisan migrate
```
8. Iniciar el servidor de desarrollo:
   ```bash
   php artisan serve
   ```
9. Acceder a la aplicación desde el navegador:
   ```
    http://localhost:8000
    ```
Usuario registrado para pruebas:
- Email: scarlett@gmail.org
- Password: 1234
---
### EndPoints de la API:
--
#### Productos(Acceso Público):
| Método | Endpoint          | Descripción                     |
| ------ | ----------------- | ------------------------------- |
| GET    | `/productos`      | Obtiene el listado de productos |
| GET    | `/productos/{id}` | Obtiene un producto por su ID   |
| GET    | `/`               | Vista principal del sistema     |
| GET    | `/buscar?q=`      | Búsqueda de productos           |

####Autenticación

| Método | Endpoint  | Descripción                    |
| ------ | --------- | ------------------------------ |
| GET    | `/login`  | Formulario de inicio de sesión |
| POST   | `/login`  | Autenticación de usuario       |
| POST   | `/logout` | Cierre de sesión               |

#### Cesta de Compras (Rutas Protegidas)
| Método | Endpoint         | Descripción                          |
| ------ | ---------------- | ------------------------------------ |
| GET    | `/cesta`         | Visualiza la cesta del usuario       |
| POST   | `/cesta/add`     | Agrega un producto a la cesta        |
| PUT    | `/cesta/{cesta}` | Actualiza la cantidad de un producto |
| DELETE | `/cesta/{cesta}` | Elimina un producto de la cesta      |

-----
## Estado del Proyecto

El proyecto se encuentra en fase de desarrollo activo.
Se contempla la implementación futura de las siguientes funcionalidades:

* Confirmación de correo electrónico

* Registro de usuarios

* Recuperación de contraseña

* Mejora de seguridad y control de permisos

* Optimización del rendimiento del sistema