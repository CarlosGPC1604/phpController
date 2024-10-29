<?php

require 'vendor/autoload.php';
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
        include __DIR__ . '/views/users.php';
    }
}

$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->load();

try {
    $pdo = new PDO(
        "mysql:host={$_ENV['DB_HOST']};dbname={$_ENV['DB_NAME']}",
        $_ENV['DB_USER'],
        $_ENV['DB_PASS']
    );
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $controller = new UserController($pdo);
    $controller->showUsers();
} catch (PDOException $e) {
    echo "Error de conexión: " . $e->getMessage();
}
