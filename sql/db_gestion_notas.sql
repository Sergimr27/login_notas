-- Crear la base de datos
CREATE DATABASE db_gestion_notas;

-- Usar la base de datos
USE db_gestion_notas;

-- Tabla para usuarios (profesores, estudiantes, administradores, etc.)
CREATE TABLE usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR (50) NOT NULL,
    passwd VARCHAR(64) NOT NULL,
    rol ENUM('profesor', 'estudiante', 'admin') NOT NULL
);

-- Insertar un usuario con contraseña encriptada (utilizando SHA-256)
INSERT INTO usuarios (username, passwd, rol)
VALUES ('Ian', SHA2('asdASD123', 256), 'profesor');

-- Insertar un usuario con contraseña encriptada (utilizando SHA-256)
INSERT INTO usuarios (username, passwd, rol)
VALUES ('Alberto', SHA2('asdASD123', 256), 'estudiante');

-- Insertar un usuario con contraseña encriptada (utilizando SHA-256)
INSERT INTO usuarios (username, passwd, rol)
VALUES ('Hugo', SHA2('asdASD123', 256), 'admin');