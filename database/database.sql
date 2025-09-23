CREATE DATABASE db_mundo;
USE db_mundo;

CREATE TABLE tb_pais(
nm_pais VARCHAR(90) PRIMARY KEY,
continente_pais VARCHAR(45) NOT NULL,
lingua_pais VARCHAR(45) NOT NULL
);

CREATE TABLE tb_cidade(
id_cidade INT AUTO_INCREMENT PRIMARY KEY,
fk_pais VARCHAR(90) NOT NULL,
nm_cidade VARCHAR(90) NOT NULL,
FOREIGN KEY (fk_pais) references tb_pais(nm_pais)
);

