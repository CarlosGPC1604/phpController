CREATE DATABASE IF NOT EXISTS phpControllerEjemplo;
USE phpControllerEjemplo;

CREATE TABLE IF NOT EXISTS usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(50) NOT NULL,
    correo VARCHAR(100) NOT NULL UNIQUE,
    fecha_registro DATE NOT NULL
);

INSERT IGNORE INTO usuarios (nombre, correo, fecha_registro) VALUES
    ('Carlos Pérez', 'carlos.perez@email.com', '2023-01-15'),
    ('María Gómez', 'maria.gomez@email.com', '2023-02-20'),
    ('Luis Hernández', 'luis.hernandez@email.com', '2023-03-05'),
    ('Ana Martínez', 'ana.martinez@email.com', '2023-04-18'),
    ('Juan López', 'juan.lopez@email.com', '2023-05-22');