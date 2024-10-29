<?php

require 'vendor/autoload.php'; // Asegúrate de que este archivo incluya autoload de Composer
require 'User.php';

use Dotenv\Dotenv;

class UserController
{
    private $userModel;

    public function __construct($pdo)
    {
        $this->userModel = new User($pdo);
    }

    public function showUsers()
    {
        $users = $this->userModel->getAllUsers();
        include 'views/users.php';
    }
}

// Cargar variables de entorno
$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->load();

// Conexión PDO usando variables de entorno
try {
    $pdo = new PDO(
        "mysql:host={$_ENV['DB_HOST']};dbname={$_ENV['DB_NAME']}", 
        $_ENV['DB_USER'], 
        $_ENV['DB_PASS']
    );
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Instancia del controlador
    $controller = new UserController($pdo);
    $controller->showUsers();

} catch (PDOException $e) {
    echo "Error de conexión: " . $e->getMessage();
}
