USE crud_php;

DROP TABLE IF EXISTS usuarios;
CREATE TABLE usuarios (
	id INT(5) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    nome varchar(50) NOT NULL,
    telefone varchar(11) NOT NULL UNIQUE,
    email varchar(50) NOT NULL,
    data_nascimento DATE NOT NULL,
    salario float NOT NULL,
    cidade varchar(50) NOT NULL
);

INSERT INTO usuarios (nome, telefone, email, data_nascimento, salario, cidade) 
 VALUES('Leonardo', '51997032547', 'leo@email.com', "1999-09-17", 1000.50, 'Guaíba');
 
 INSERT INTO usuarios (nome, telefone, email, data_nascimento, salario, cidade) 
 VALUES('Maria', '51999555781', 'maria@email.com', "1990-05-17", 1094.58, 'Porto Alegre');