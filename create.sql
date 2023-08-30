CREATE TABLE usuarios(
    cod_usuario int NOT NULL AUTO_INCREMENT,
    username varchar(10) NOT NULL,
    senha varchar(10) NOT NULL,
    nome varchar(30) NOT NULL,
    idade int NOT NULL,
    cpf varchar(14) NOT NULL,
    email varchar(30) NOT NULL,
    primary key(cod_usuario)
);


CREATE TABLE funcionarios (
    cod_funcionario int NOT NULL AUTO_INCREMENT,
    nome varchar(50) NOT NULL,
    cargo varchar(30) NOT NULL,
    cpf varchar(14) NOT NULL,
    salario decimal(10, 2) NOT NULL,
    data_contratacao date NOT NULL,
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



