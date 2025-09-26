set sql_safe_updates = 0;

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

INSERT INTO tb_pais(nm_pais, continente_pais, lingua_pais) VALUES 
('japão', 'ásia', 'japones'),
('brasil', 'sul-americano', 'portugues'),
('china', 'asia', 'chines'),
('chile', 'sul-americano', 'espanhol'),
('india', 'asia', 'hindi');

INSERT INTO tb_cidade(fk_pais, nm_cidade) VALUES
('japão', 'kyoto'),
('brasil', 'são paulo'),
('china', 'pequim'),
('chile', 'pucon'),
('india', 'nova delhi');
