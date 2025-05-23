CREATE TABLE livros (
    id INT NOT NULL AUTO_INCREMENT,
    titulo VARCHAR(50) NOT NULL,
    /* D=drama, F=ficção, R=romance e O=outro*/
    genero VARCHAR(1) NOT NULL,
    qtd_paginas INT NOT NULL,
    CONSTRAINT pk_livros PRIMARY KEY (id)
);

ALTER TABLE livros ADD COLUMN autor VARCHAR(30);
UPDATE `livros` SET `autor`='LELE' WHERE NULL;

DELETE FROM livros WHERE id = ?;