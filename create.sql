CREATE DATABASE IF NOT EXISTS CADASTRO;
USE CADASTRO;

DROP USER IF EXISTS 'cadastro'@'localhost';
CREATE USER IF NOT EXISTS 'cadastro'@'localhost' IDENTIFIED BY '123';
GRANT ALL PRIVILEGES ON CADASTRO.* TO 'cadastro'@'localhost';

DROP TABLE IF EXISTS clientes;

CREATE TABLE clientes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    senha VARCHAR(255) NOT NULL,
    data_nascimento DATE,
    cpf VARCHAR(14)
);

DROP TABLE IF EXISTS funcionarios;

CREATE TABLE funcionarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    senha VARCHAR(255) NOT NULL,
    cargo VARCHAR(255) NOT NULL,
    cpf VARCHAR(14)
);

