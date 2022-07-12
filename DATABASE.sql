CREATE TABLE usuarios (
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    username VARCHAR(50) NOT NULL UNIQUE,
    email VARCHAR(100) NOT NULL,
    password VARCHAR(255) NOT NULL,
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP
);
CREATE TABLE pessoal_info (
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    username VARCHAR(50) NOT NULL UNIQUE,
    name VARCHAR(50) NOT NULL,
    sobrenome VARCHAR(100) NOT NULL,
    contato1 VARCHAR(50) NOT NULL,
    contato2 VARCHAR(50) NOT NULL,
    birthday VARCHAR(50) NOT NULL,
    pais VARCHAR(50) NOT NULL,
    estado VARCHAR(50) NOT NULL,
    cidade VARCHAR(50) NOT NULL,
    profilepic TEXT NOT NULL,
    bio VARCHAR(255) NOT NULL
);
CREATE TABLE profissional_info (
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    username VARCHAR(50) NOT NULL UNIQUE,
    servico1 VARCHAR(50) NOT NULL,
    servico2 VARCHAR(50) NOT NULL,
    nome_do_cargo VARCHAR(50) NOT NULL,
    work_bio VARCHAR(255) NOT NULL,
    desde VARCHAR(50) NOT NULL,
    ate VARCHAR(50) NOT NULL
);
CREATE TABLE escolaridade_info (
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    username VARCHAR(50) NOT NULL UNIQUE,
    escolaridade VARCHAR(50) NOT NULL,
    area_de_estudo VARCHAR(50) NOT NULL,
    instituicao VARCHAR(50) NOT NULL,
    matriculado VARCHAR(50) NOT NULL,
    desde VARCHAR(50) NOT NULL,
    ate VARCHAR(50) NOT NULL,
    habilidades VARCHAR(255) NOT NULL
);