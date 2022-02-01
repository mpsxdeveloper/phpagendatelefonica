CREATE DATABASE AGENDA;

USE agenda;

CREATE TABLE contatos (
    id INT NOT NULL AUTO_INCREMENT,
    foto VARCHAR(40) NOT NULL DEFAULT 'nopicture.jpg',
    nome VARCHAR(30) NOT NULL,
    telefone VARCHAR(14) NOT NULL,
    email VARCHAR(50),
    anotacoes VARCHAR(200),
    PRIMARY KEY(id),
    UNIQUE(nome)
);