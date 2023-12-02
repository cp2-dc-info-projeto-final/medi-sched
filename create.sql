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
    email VARCHAR(200) NOT NULL UNIQUE,
    senha VARCHAR(200) NOT NULL,
    cpf VARCHAR(14) NOT NULL UNIQUE,
    data_nascimento DATE NOT NULL,
    genero ENUM('Feminino', 'Masculino', 'Outros', 'Prefiro não dizer') NOT NULL
);

DROP TABLE IF EXISTS Funcionario;
CREATE TABLE Funcionario (
    idFuncionario INT NOT NULL AUTO_INCREMENT,
    nome_funcionario VARCHAR(100) NOT NULL,
    sobrenome_funcionario VARCHAR(100) NOT NULL,
    email VARCHAR(200) NOT NULL UNIQUE,
    senha VARCHAR(200) NOT NULL,
    data_nascimento DATE NOT NULL,
    cpf VARCHAR(14) NOT NULL UNIQUE,
    area VARCHAR(50) NOT NULL, 
    genero ENUM('Feminino', 'Masculino', 'Outros', 'Prefiro não dizer') NOT NULL,
    PRIMARY KEY(idFuncionario)
);

DROP TABLE IF EXISTS Agendamento;
CREATE TABLE IF NOT EXISTS Agendamento (
    idAgendamento INT AUTO_INCREMENT PRIMARY KEY
    idFuncionario INT NOT NULL,
    idCliente INT NOT NULL,
    data_consulta DATE NOT NULL,
    horario_consulta TIME NOT NULL,
    FOREIGN KEY (idFuncionario) REFERENCES Funcionario(idFuncionario),
    FOREIGN KEY (idCliente) REFERENCES Cliente(idCliente) 
);

DROP TABLE IF EXISTS Administrador;

CREATE TABLE IF NOT EXISTS Administrador (
    idAdministrador INT AUTO_INCREMENT PRIMARY KEY,
    nome_administrador VARCHAR(100) NOT NULL,
    sobrenome_administrador VARCHAR(100) NOT NULL,
    email VARCHAR(200) NOT NULL UNIQUE,
    senha VARCHAR(200) NOT NULL,
    cpf VARCHAR(14) NOT NULL UNIQUE,
    data_nascimento DATE NOT NULL,
    genero ENUM('Feminino', 'Masculino', 'Outros', 'Prefiro não dizer') NOT NULL
);
INSERT INTO Administrador (
    nome_administrador, 
    sobrenome_administrador, 
    email, 
    senha, 
    cpf, 
    data_nascimento, 
    genero
) VALUES (
    'Miguel', 
    'Sierra', 
    'miguelmesierra@gmail.com', 
    '$2y$10$VmyDO8OvY5BpsnMdRXi4q.CV4KCJ.zhXZkpgJjuTHJzmQAOtjoxG2',   
    '123.456.789-00', 
    '1985-01-01', 
    'Masculino'
);
