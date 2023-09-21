CREATE DATABASE IF NOT EXISTS CADASTRO;
USE CADASTRO;

DROP USER IF EXISTS 'cadastro'@'localhost';
CREATE USER IF NOT EXISTS 'cadastro'@'localhost' IDENTIFIED BY '123';
GRANT ALL PRIVILEGES ON CADASTRO.* TO 'cadastro'@'localhost';

DROP TABLE IF EXISTS clientes;

CREATE TABLE clientes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(200) NOT NULL,
    email VARCHAR(200) NOT NULL,
    senha VARCHAR(200) NOT NULL,
    data_nascimento DATE,
    cpf VARCHAR(11)
);


CREATE TABLE funcionarios (
    cod_funcionario int NOT NULL AUTO_INCREMENT,
    nome varchar(200) NOT NULL,
    email varchar(200) NOT NULL,
    senha varchar(200) NOT NULL,
    data_nascimento DATE NOT NULL,
    cpf varchar(11) NOT NULL,
    cargo varchar(50) NOT NULL,
    

    primary key(cod_funcionario)
);

CREATE TABLE agendamento_consulta (
    cod_agendamento int NOT NULL AUTO_INCREMENT,
    paciente_nome varchar(200) NOT NULL,
    medico_nome varchar(200) NOT NULL,
    data_consulta date NOT NULL,
    horario_consulta time NOT NULL,
    descricao varchar(200),
    primary key(cod_agendamento)
);


