CREATE DATABASE IF NOT EXISTS CADASTRO;
USE CADASTRO;

DROP USER IF EXISTS 'cadastro'@'localhost';
CREATE USER IF NOT EXISTS 'cadastro'@'localhost' IDENTIFIED BY '123';
GRANT ALL PRIVILEGES ON CADASTRO.* TO 'cadastro'@'localhost';

DROP TABLE IF EXISTS Cliente;

CREATE TABLE Cliente (
    idCliente INT AUTO_INCREMENT,
    nome VARCHAR(200) NOT NULL,
    email VARCHAR(200) NOT NULL,
    senha VARCHAR(200) NOT NULL,
    data_nascimento DATE,
    cpf VARCHAR(14)

    primary key(idCliente)
);


CREATE TABLE Funcionario (
    idFuncionario int NOT NULL AUTO_INCREMENT,
    nome varchar(200) NOT NULL,
    email varchar(200) NOT NULL,
    senha varchar(200) NOT NULL,
    data_nascimento DATE NOT NULL,
    cpf varchar(11) NOT NULL,
    cargo varchar(50) NOT NULL,

    primary key(idFuncionario)
);

CREATE TABLE Agendamento (
    idAgendamento int NOT NULL AUTO_INCREMENT,
    cliente_nome varchar(200) NOT NULL,
    funcionario_nome varchar(200) NOT NULL,
    data_consulta DATE NOT NULL,
    horario_consulta TIME NOT NULL,

    primary key(idAgendamento)
);

CREATE TABLE Servico (
    idServico int NOT NULL AUTO INCREMENT,
    nome varchar(200) NOT NULL,
    descricao varchar(200) NOT NULL,

    primary key(idServico)
);
