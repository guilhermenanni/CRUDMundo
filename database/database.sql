set sql_safe_updates = 0;

DROP DATABASE IF EXISTS db_mundo;

CREATE DATABASE db_mundo;
USE db_mundo;

CREATE TABLE tb_pais(
id_pais INT AUTO_INCREMENT PRIMARY KEY,
nm_pais VARCHAR(90),
continente_pais VARCHAR(45) NOT NULL,
lingua_pais VARCHAR(45) NOT NULL
);

CREATE TABLE tb_cidade(
id_cidade INT AUTO_INCREMENT PRIMARY KEY,
id_pais INT NOT NULL,
nm_cidade VARCHAR(90) NOT NULL,
FOREIGN KEY (id_pais) references tb_pais(id_pais)
);

INSERT INTO tb_pais(nm_pais, continente_pais, lingua_pais) VALUES 
('japao', 'asia', 'japones'),
('brasil', 'sul-americano', 'portugues'),
('china', 'asia', 'chines'),
('chile', 'sul-americano', 'espanhol'),
('india', 'asia', 'hindi');

INSERT INTO tb_cidade(id_pais, nm_cidade) VALUES
(1, 'kyoto'),
(2, 'sao paulo'),
(3, 'pequim'),
(4, 'pucon'),
(5, 'nova delhi');
