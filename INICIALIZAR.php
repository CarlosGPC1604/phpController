<?php

$green = "\033[32m";
$yellow = "\033[33m";
$red = "\033[31m";
$reset = "\033[0m";

echo "{$green}Bienvenido al configurador de .env para tu proyecto PHP!{$reset}\n";

echo "Instalando dependencias de Composer...\n";
$output = shell_exec('composer install 2>&1'); // Captura el output
echo $output;
echo "Instalación completada.\n";

echo "{$yellow}Por favor, introduce los siguientes detalles:{$reset}\n\n";

$fields = [
    'DB_HOST' => 'Host de la base de datos (e.g., localhost): ',
    'DB_NAME' => 'Nombre de la base de datos: ',
    'DB_USER' => 'Usuario de la base de datos: ',
    'DB_PASS' => 'Contraseña de la base de datos: ',
];

// Crear el archivo .env
$envContent = "";
foreach ($fields as $key => $question) {
    echo "{$green}$question{$reset}";
    $value = trim(fgets(STDIN));
    $envContent .= "{$key}={$value}\n";
}
file_put_contents(__DIR__ . '/.env', $envContent);
echo "{$green}¡El archivo .env ha sido creado exitosamente!{$reset}\n";

// Cargar las variables de entorno
require 'vendor/autoload.php';
Dotenv\Dotenv::createImmutable(__DIR__)->load();

// Conectar a la base de datos usando PDO
try {
    $pdo = new PDO(
        "mysql:host={$_ENV['DB_HOST']};dbname={$_ENV['DB_NAME']}",
        $_ENV['DB_USER'],
        $_ENV['DB_PASS']
    );
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "{$green}¡Conexión exitosa a la base de datos!{$reset}\n";

    // Leer y ejecutar seedDB.sql
    $sql = file_get_contents(__DIR__ . '/seedDB.sql');
    $pdo->exec($sql);
    echo "{$green}¡La base de datos ha sido poblada exitosamente!{$reset}\n";

} catch (PDOException $e) {
    echo "{$red}Error de conexión o ejecución: {$e->getMessage()}{$reset}\n";
}
