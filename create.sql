CREATE DATABASE IF NOT EXISTS CADASTRO;
USE CADASTRO;

DROP USER IF EXISTS 'cadastro'@'localhost';
CREATE USER IF NOT EXISTS 'cadastro'@'localhost' IDENTIFIED BY '123';
GRANT ALL PRIVILEGES ON CADASTRO.* TO 'cadastro'@'localhost';

DROP TABLE IF EXISTS cadastrados;

CREATE TABLE cadastrados (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    senha VARCHAR(255) NOT NULL,
    data_nascimento DATE,
    cpf VARCHAR(11)
);


CREATE TABLE funcionarios (
    cod_funcionario int NOT NULL AUTO_INCREMENT,
    nome varchar(50) NOT NULL,
    cargo varchar(30) NOT NULL,
    cpf varchar(14) NOT NULL,
    email varchar(50) NOT NULL,
    senha varchar(20) NOT NULL,
    primary key(cod_funcionario)
);

CREATE TABLE agendamento_consulta (
    cod_agendamento int NOT NULL AUTO_INCREMENT,
    paciente_nome varchar(50) NOT NULL,
    medico_nome varchar(50) NOT NULL,
    data_consulta date NOT NULL,
    horario_consulta time NOT NULL,
    descricao varchar(200),
    primary key(cod_agendamento)
);



