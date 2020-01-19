create database lanchonetedojoao;
use lanchonetedojoao;
create table bebida(
	id int primary key auto_increment,
    nome varchar(50) not null,
    preco decimal not null
);

create table lanche(
	id int primary key auto_increment,
    nome varchar(50) not null,
    preco decimal not null
);

create table usuario(
	id int primary key auto_increment,
    nome varchar(50) not null,
    senha varchar(10)
);

insert into usuario(nome,senha) values ('admin','admin');

