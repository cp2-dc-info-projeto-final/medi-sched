CREATE DATABASE IF NOT EXISTS AGENDASAUDE;
USE AGENDASAUDE;

DROP USER IF EXISTS 'agendasaude'@'localhost';
CREATE USER IF NOT EXISTS 'agendasaude'@'localhost' IDENTIFIED BY '123';
GRANT ALL PRIVILEGES ON AGENDASAUDE.* TO 'agendasaude'@'localhost';

DROP TABLE IF EXISTS Cliente;

CREATE TABLE IF NOT EXISTS Cliente (
    idCliente INT AUTO_INCREMENT PRIMARY KEY,
    nome_cliente VARCHAR(100) NOT NULL,
    sobrenome_cliente VARCHAR(100) NOT NULL,
    email VARCHAR(200) NOT NULL,
    senha VARCHAR(200) NOT NULL,
    cpf VARCHAR(14) NOT NULL,
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
    genero ENUM('Feminino', 'Masculino', 'Outros', 'Prefiro não dizer') NOT NULL,

    primary key(idFuncionario)
);

DROP TABLE IF EXISTS Agendamento;

CREATE TABLE IF NOT EXISTS Agendamento (
    idAgendamento INT AUTO_INCREMENT PRIMARY KEY,
    idServico INT NOT NULL,
    idFuncionario INT NOT NULL,
    nomeCliente VARCHAR(100) NOT NULL,
    sobrenomeCliente VARCHAR(100) NOT NULL,
    data_consulta DATE NOT NULL,
    horario_consulta TIME NOT NULL,
    FOREIGN KEY (idServico) REFERENCES Servico(idServico),
    FOREIGN KEY (idFuncionario) REFERENCES Funcionario(idFuncionario)
);


DROP TABLE IF EXISTS Servico;

CREATE TABLE Servico (
    idServico int NOT NULL AUTO_INCREMENT,
    nome_servico varchar(200) NOT NULL,
    descricao varchar(200) NOT NULL,
    PRIMARY KEY (idServico)
);
