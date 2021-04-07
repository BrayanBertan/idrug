
CREATE TABLE farmacia(
	nome        VARCHAR(150) NOT NULL, 
	senha       VARCHAR(150) NOT NULL,
	descricao   VARCHAR(255) NOT NULL,
	endereco    VARCHAR(255) NOT NULL,
	telefone    CHAR(10),
	celular     CHAR(10),
    email       VARCHAR(150) NOT NULL,
	cnpj        CHAR(14) NOT NULL,
	
)

CREATE TABLE usuario(
	id          INT NOT NULL    AUTO_INCREMENT
	nome        VARCHAR(150) NOT NULL,
	senha       VARCHAR(150) NOT NULL,
	telefone    CHAR(10),
	celular     CHAR(10),
	cpf         CHAR(11) NOT NULL,
	endereco    VARCHAR(255) NOT NULL,
    PRIMARY KEY (id)
)

CREATE TABLE categoria(
	id       INT NOT NULL
	nome     VARCHAR(150) NOT NULL,	    
    PRIMARY KEY (id)
)

CREATE TABLE produto(
	id          INT NOT NULL    AUTO_INCREMENT
	nome        VARCHAR(150) NOT NULL,
	descricao   VARCHAR(255) NOT NULL,
	categoria   INT NOT NULL,
	preco       DECIMAL(5,2)  NOT NULL,
	receita     BOOLEAN NOT NULL
	volume      INT NOT NULL,
	unidade     VARCHAR(50) NOT NULL,
	estoque     INT NOT NULL,
    PRIMARY KEY (id),
    FOREIGN KEY (categoria) REFERENCES categoria(id)
)

CREATE TABLE avaliacao(
	id         INT NOT NULL    AUTO_INCREMENT
	produto    INT NOT NULL,
	usuario    INT NOT NULL,
	comentario VARCHAR(255) NOT NULL,
	nota       INT NOT NULL,
    PRIMARY KEY (id),
    FOREIGN KEY (produto) REFERENCES produto(id),
    FOREIGN KEY (usuario) REFERENCES usuario(id)
)

CREATE TABLE modos_pagamento(
	id      INT NOT NULL    AUTO_INCREMENT
	tipo    VARCHAR(100) NOT NULL,
    status  BOOLEAN NOT NULL, 
    PRIMARY KEY (id)
)

CREATE TABLE pedido(
	id              INT NOT NULL    AUTO_INCREMENT,
	status          CHAR(1) NOT NULL,
	usuario         INT NOT NULL,
	modo_pagamento  INT NOT NULL,
    endereco        VARCHAR(255) NOT NULL,
    PRIMARY KEY (id),
    FOREIGN KEY (usuario) REFERENCES usuario(id),
    FOREIGN KEY (modo_pagamento) REFERENCES modo_pagamento(id)
)

CREATE TABLE item(
	id          INT NOT NULL    AUTO_INCREMENT,
	pedido      INT NOT NULL,
	produto     INT NOT NULL,
	quantidade  INT NOT NULL,
	receita     VARCHAR(150) NOT NULL, 
    PRIMARY KEY (id),
    FOREIGN KEY (pedido) REFERENCES pedido(id),
    FOREIGN KEY (produto) REFERENCES produto(id)
)



