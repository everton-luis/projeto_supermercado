CREATE DATABASE softexpertdev;

CREATE TABLE tipo_produto (
	id SERIAL,
	nome_tipo_produto varchar(45) NOT NULL,
	porcentagem_imposto decimal NOT NULL,
	PRIMARY KEY (id)
);

CREATE TABLE produto (
	id SERIAL,
	nome_produto varchar(45) NOT NULL,
	id_tipo_produto int NOT NULL,
	marca varchar(45) NOT NULL,
	preco decimal NOT NULL,
	descricao varchar(45),	
	PRIMARY KEY (id),
	FOREIGN KEY (id_tipo_produto) REFERENCES tipo_produto (id)
);


CREATE TABLE historico_vendas (
	id serial,
	id_produto int NOT NULL,
	quantidade int NOT NULL,
	data_pedido date,
	PRIMARY KEY (id),
	FOREIGN KEY (id_produto) REFERENCES produto (id)
);