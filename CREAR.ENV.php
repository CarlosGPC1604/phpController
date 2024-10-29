<?php

$green = "\033[32m";
$yellow = "\033[33m";
$reset = "\033[0m";

echo "{$green}Bienvenido al configurador de .env para tu proyecto PHP!{$reset}\n";
echo "{$yellow}Por favor, introduce los siguientes detalles:{$reset}\n\n";

// Definir campos
$fields = [
    'DB_HOST' => 'Host de la base de datos (e.g., localhost): ',
    'DB_NAME' => 'Nombre de la base de datos: ',
    'DB_USER' => 'Usuario de la base de datos: ',
    'DB_PASS' => 'Contraseña de la base de datos: ',
];

// Crear el contenido del archivo .env
$envContent = "";
foreach ($fields as $key => $question) {
    echo "{$green}$question{$reset}";
    $value = trim(fgets(STDIN));
    $envContent .= "{$key}={$value}\n";
}

// Guardar el archivo
file_put_contents(__DIR__ . '/.env', $envContent);

echo "\n{$green}El archivo .env ha sido creado exitosamente!{$reset}\n";
