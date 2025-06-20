-- Tema: Pets
-- Pets cadastrados: Theo, Leona, Laurinha e agregados
-- Pegar link da foto do drive -> se estiver público vai carregar a imagem

create database db_pet;
create table Pet(
    id AUTO_INCREMENT PRIMARY KEY,
    nome varchar(20) not null,
    raca varchar(20) not null,
    -- 'P'=preto, 'C'=caramelo, 
    -- 'M'=marro, 'L'=loiro, 
    -- 'B'=branco, 'r'=rajadinhop, 
    -- 'F'=marrom clarinho;
    cor VARCHAR(1) NOT NULL,
    -- 'F'=feminino, 'M'=masculino
    genero varchar(1) not null,
    -- G=grande, M=medio, P=pequeno
    porte VARCHAR(1) NOT NULL,
    foto varchar(500) NOT NULL,
    curiosidade VARCHAR(20) NOT NULL
);
