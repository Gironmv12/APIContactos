# API de Contactos

Este proyecto es una API de contactos construida con PHP y el framework Laravel. La API permite realizar operaciones CRUD (Create, Read, Update, Delete) sobre una colección de contactos. Cada contacto tiene los campos `nombre`, `email`, y `teléfono`.

## Requisitos

- PHP 7.4 o superior
- Composer
- Laravel 8.x o superior
- Servidor web (Apache, Nginx, etc.)
- Base de datos sqlite

## Instalación

1. Clona el repositorio:

    ```bash
    git clone https://github.com/tu-usuario/api-contactos.git
    cd api-contactos
    ```

2. Instala las dependencias de Composer:

    ```bash
    composer install
    ```

3. Copia el archivo de configuración de entorno y configura tus variables de entorno:

    ```bash
    cp .env.example .env
    ```

    Abre el archivo `.env` y configura los detalles de tu base de datos:

    ```dotenv
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=nombre_de_tu_base_de_datos
    DB_USERNAME=tu_usuario
    DB_PASSWORD=tu_contraseña
    ```

4. Genera la clave de la aplicación:

    ```bash
    php artisan key:generate
    ```

5. Ejecuta las migraciones para crear las tablas necesarias en la base de datos:

    ```bash
    php artisan migrate
    ```

## Uso

La API de contactos ofrece las siguientes rutas y métodos:

- **Crear un contacto**
    - **POST** `/api/contactos`
    - Datos requeridos: `nombre`, `email`, `telefono`

- **Obtener todos los contactos**
    - **GET** `/api/contactos`

- **Obtener un contacto por ID**
    - **GET** `/api/contactos/{id}`

- **Actualizar un contacto**
    - **PUT/PATCH** `/api/contactos/{id}`
    - Datos requeridos: `nombre`, `email`, `telefono`

- **Eliminar un contacto**
    - **DELETE** `/api/contactos/{id}`

## Ejemplos de Solicitudes

### Crear un contacto

```bash
curl -X POST http://localhost:8000/api/contactos \
-H "Content-Type: application/json" \
-d '{"nombre": "Juan Perez", "email": "juan.perez@example.com", "telefono": "123456789"}'
```
#### Obtener todos los contactos
```bash
    curl -X GET http://localhost:8000/api/contactos
```
#### Actualizar un contacto
```bash
    curl -X PUT http://localhost:8000/api/contactos/1 \
-H "Content-Type: application/json" \
-d '{"nombre": "Juan Perez Actualizado", "email": "juan.perez@example.com", "telefono": "987654321"}'
```

#### Actualizar un contacto
```bash
    curl -X DELETE http://localhost:8000/api/contactos/1
```


Este `README.md` proporciona una descripción clara del proyecto, los requisitos necesarios, los pasos de instalación, el uso de la API con ejemplos de solicitudes, y cómo contribuir al proyecto.
