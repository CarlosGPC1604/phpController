# Proyecto PHPController

Bienvenido a **PHPController**, un proyecto de ejemplo en PHP que ilustra el uso de controladores con PDO y variables de entorno para conectarse a bases de datos. Esta guía cubre cómo configurar el proyecto, instalar las dependencias y poblar la base de datos de prueba.

## Características

- **Controladores en PHP**: Separación de lógica y presentación.
- **Gestión de base de datos**: Conexión segura usando PDO.
- **Configuración rápida de entorno**: Script de inicialización que crea el archivo `.env`, instala dependencias y ejecuta el *seed* de la base de datos.

## Instalación

1. **Clonar el repositorio**:
   ```bash
   git clone https://github.com/tuusuario/phpController.git
   cd phpController
   ```

2. **Ejecutar el Script de Inicialización**:
   El archivo `INICIALIZAR.php` configurará el entorno, instalará dependencias y creará la base de datos de prueba.
   ```bash
   php INICIALIZAR.php
   ```
   > Este script guiará la configuración del archivo `.env`, ejecutará `composer install` y poblará la base de datos automáticamente.

## Uso del Proyecto

- **Ver la lista de usuarios**: Una vez configurado, puedes acceder a `views/users.php` para ver la lista de usuarios de ejemplo.

## Requisitos

- **PHP** 7.4 o superior
- **Composer** instalado
- **Servidor MySQL**

## Estructura de Archivos

- **User.php**: Modelo que maneja la conexión a la base de datos y consultas.
- **UserController.php**: Controlador principal que gestiona la vista de usuarios.
- **views/users.php**: Vista con diseño de TailwindCSS para mostrar usuarios.
- **INICIALIZAR.php**: Script que configura el entorno e inicializa la base de datos.

## Scripts SQL

El archivo `seedDB.sql` contiene el script SQL para crear la base de datos y la tabla de `usuarios`, además de insertar registros de prueba. Este script se ejecuta automáticamente al iniciar `INICIALIZAR.php`.