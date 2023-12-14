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
    idAgendamento INT AUTO_INCREMENT PRIMARY KEY,
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

-- Inserir cliente 1
INSERT INTO Cliente (nome_cliente, sobrenome_cliente, email, senha, cpf, data_nascimento, genero)
VALUES ('Maria', 'Silva', 'maria.silva@gmail.com', '$2y$10$VmyDO8OvY5BpsnMdRXi4q.CV4KCJ.zhXZkpgJjuTHJzmQAOtjoxG2', '123.456.789-01', '1990-05-15', 'Feminino');

-- Inserir cliente 2
INSERT INTO Cliente (nome_cliente, sobrenome_cliente, email, senha, cpf, data_nascimento, genero)
VALUES ('João', 'Pereira', 'joao.pereira@gmail.com', '$2y$10$VmyDO8OvY5BpsnMdRXi4q.CV4KCJ.zhXZkpgJjuTHJzmQAOtjoxG2', '987.654.321-02', '1985-08-22', 'Masculino');

-- Inserir cliente 3
INSERT INTO Cliente (nome_cliente, sobrenome_cliente, email, senha, cpf, data_nascimento, genero)
VALUES ('Ana', 'Santos', 'ana.santos@gmail.com', '$2y$10$VmyDO8OvY5BpsnMdRXi4q.CV4KCJ.zhXZkpgJjuTHJzmQAOtjoxG2', '234.567.890-03', '1998-03-10', 'Feminino');

-- Inserir cliente 4
INSERT INTO Cliente (nome_cliente, sobrenome_cliente, email, senha, cpf, data_nascimento, genero)
VALUES ('Carlos', 'Oliveira', 'carlos.oliveira@gmail.com', '$2y$10$VmyDO8OvY5BpsnMdRXi4q.CV4KCJ.zhXZkpgJjuTHJzmQAOtjoxG2', '345.678.901-04', '1977-11-05', 'Masculino');

-- Inserir cliente 5
INSERT INTO Cliente (nome_cliente, sobrenome_cliente, email, senha, cpf, data_nascimento, genero)
VALUES ('Mariana', 'Costa', 'mariana.costa@gmail.com', '$2y$10$VmyDO8OvY5BpsnMdRXi4q.CV4KCJ.zhXZkpgJjuTHJzmQAOtjoxG2', '456.789.012-05', '1989-07-18', 'Feminino');

-- Inserir funcionário 1 (Área: Ortopedia)
INSERT INTO Funcionario (nome_funcionario, sobrenome_funcionario, email, senha, data_nascimento, cpf, area, genero)
VALUES ('Carlos', 'Silva', 'carlos.silva@gmail.com', '$2y$10$VmyDO8OvY5BpsnMdRXi4q.CV4KCJ.zhXZkpgJjuTHJzmQAOtjoxG2', '1980-08-10', '789.012.345-01', 'Ortopedia', 'Masculino');

-- Inserir funcionário 2 (Área: Oftalmologia)
INSERT INTO Funcionario (nome_funcionario, sobrenome_funcionario, email, senha, data_nascimento, cpf, area, genero)
VALUES ('Ana', 'Pereira', 'ana.pereira@gmail.com', '$2y$10$VmyDO8OvY5BpsnMdRXi4q.CV4KCJ.zhXZkpgJjuTHJzmQAOtjoxG2', '1992-05-22', '456.789.012-02', 'Oftalmologia', 'Feminino');

-- Inserir funcionário 3 (Área: Odontologia)
INSERT INTO Funcionario (nome_funcionario, sobrenome_funcionario, email, senha, data_nascimento, cpf, area, genero)
VALUES ('João', 'Oliveira', 'joao.oliveira@gmail.com', '$2y$10$VmyDO8OvY5BpsnMdRXi4q.CV4KCJ.zhXZkpgJjuTHJzmQAOtjoxG2', '1985-11-15', '123.456.789-03', 'Odontologia', 'Masculino');

-- Inserir funcionário 4 (Área: Psicologia)
INSERT INTO Funcionario (nome_funcionario, sobrenome_funcionario, email, senha, data_nascimento, cpf, area, genero)
VALUES ('Mariana', 'Santos', 'mariana.santos@gmail.com', '$2y$10$VmyDO8OvY5BpsnMdRXi4q.CV4KCJ.zhXZkpgJjuTHJzmQAOtjoxG2', '1990-02-28', '234.567.890-04', 'Psicologia', 'Feminino');

-- Inserir funcionário 5 (Área: Ginecologia)
INSERT INTO Funcionario (nome_funcionario, sobrenome_funcionario, email, senha, data_nascimento, cpf, area, genero)
VALUES ('Pedro', 'Costa', 'pedro.costa@gmail.com', '$2y$10$VmyDO8OvY5BpsnMdRXi4q.CV4KCJ.zhXZkpgJjuTHJzmQAOtjoxG2', '1988-07-10', '345.678.901-05', 'Ginecologia', 'Masculino');

