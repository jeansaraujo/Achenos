    DROP DATABASE senac;
CREATE DATABASE senac;
USE senac;
CREATE TABLE usuarios (
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    username VARCHAR(50) UNIQUE NOT NULL,
    nome VARCHAR(200) NOT NULL,
    email VARCHAR(100) UNIQUE NOT NULL,
    password VARCHAR(255) NOT NULL,
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP
);
CREATE TABLE pessoal_info (
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    sobrenome VARCHAR(200) NOT NULL,        
    contato1 VARCHAR(50) NOT NULL,
    tpcontato1 VARCHAR(50) NOT NULL,
    contato2 VARCHAR(50) NOT NULL,
    birthday DATE NOT NULL,
    pais VARCHAR(50) NOT NULL,
    estado VARCHAR(50) NOT NULL,
    cidade VARCHAR(50) NOT NULL,    
    profilepic VARCHAR(250) NOT NULL,
    bio TEXT NOT NULL,
    usuario_id INT,
    FOREIGN KEY(usuario_id) REFERENCES usuarios(id)
    );
CREATE TABLE profissional_info (
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,    
    servico1 VARCHAR(50) NOT NULL,
    servico2 VARCHAR(50) NOT NULL,
    nome_do_cargo VARCHAR(50) NOT NULL,
    work_bio VARCHAR(255) NOT NULL,
    desde DATE NOT NULL,
    ate DATE NOT NULL,
    usuario_id INT,
    FOREIGN KEY(usuario_id) REFERENCES usuarios(id)
);
CREATE TABLE escolaridade_info (
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,    
    escolaridade VARCHAR(50) NOT NULL,
    area_de_estudo VARCHAR(50) NOT NULL,
    instituicao VARCHAR(50) NOT NULL,
    matriculado VARCHAR(50) NOT NULL,
    desde DATE NOT NULL,
    ate DATE NOT NULL,
    habilidades VARCHAR(255) NOT NULL,
    usuario_id INT,
    FOREIGN KEY(usuario_id) REFERENCES usuarios(id)
);