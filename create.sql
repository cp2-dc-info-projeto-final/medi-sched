CREATE DATABASE IF NOT EXISTS CADASTRO;
USE CADASTRO;

DROP USER IF EXISTS 'cadastro'@'localhost';
CREATE USER IF NOT EXISTS 'cadastro'@'localhost' IDENTIFIED BY '123';
GRANT ALL PRIVILEGES ON CADASTRO.* TO 'cadastro'@'localhost';

DROP TABLE IF EXISTS Cliente;

CREATE TABLE IF NOT EXISTS Cliente (
    idCliente INT AUTO_INCREMENT PRIMARY KEY,
    nome_cliente VARCHAR(100) NOT NULL,
    sobrenome_cliente VARCHAR(100) NOT NULL,
    email VARCHAR(200) NOT NULL,
    cpf VARCHAR(14) NOT NULL,
    senha VARCHAR(200) NOT NULL,
    data_nascimento DATE NOT NULL,
    genero ENUM('Feminino', 'Masculino', 'Outros', 'Prefiro não dizer') NOT NULL
);

DROP TABLE IF EXISTS Funcionario;


CREATE TABLE Funcionario (
    idFuncionario int NOT NULL AUTO_INCREMENT,
    nome_funcionario varchar(100) NOT NULL,
    sobrenome_funcionario varchar(100) NOT NULL,
    email varchar(200) NOT NULL,
    senha varchar(200) NOT NULL,
    data_nascimento DATE NOT NULL,
    cpf varchar(14) NOT NULL,
    cargo varchar(50) NOT NULL,
    genero ENUM('Feminino', 'Masculino', 'Outros', 'Prefiro não dizer') NOT NULL

    primary key(idFuncionario)
);

DROP TABLE IF EXISTS Agendamento;

CREATE TABLE Agendamento (
    idAgendamento int NOT NULL AUTO_INCREMENT,
    nome_servico varchar(200) NOT NULL FOREIGN KEY REFERENCES Servico(nome_servico),
    nome_funcionario varchar(100) NOT NULL FOREIGN KEY REFERENCES Funcionario(nome_funcionario),
    sobrenome_funcionario varchar(100) NOT NULL FOREIGN KEY REFERENCES Funcionario(sobrenome_funcionario),
    nome_cliente varchar(100) NOT NULL FOREIGN KEY REFERENCES Cliente(nome_cliente),
    sobrenome_cliente varchar(100) NOT NULL FOREIGN KEY REFERENCES Cliente(sobrenome_cliente),
    data_consulta DATE NOT NULL,
    horario_consulta TIME NOT NULL,

    primary key(idAgendamento)
);

DROP TABLE IF EXISTS Servico;

CREATE TABLE Servico (
    idServico int NOT NULL AUTO INCREMENT,
    nome_servico varchar(200) NOT NULL,
    descricao varchar(200) NOT NULL,

    primary key(idServico)
);
