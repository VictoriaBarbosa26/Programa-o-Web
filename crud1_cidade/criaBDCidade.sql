drop database Victoria_Barbosa; /*Meu nome no codigo MySql*/
create database Victoria_Barbosa;
use Victoria_Barbosa;

create table produtos(
 idprod int(4) not null primary key auto_increment,
 nome char(40) not null,
 cidade char(100) not null,/*Adicionei o campo cidade*/
 imagem char(80) not null) Engine = InnoDB;
 
 
 insert into produtos (nome, imagem, cidade) values ("produto 1","produto1.jpg","São José dos Campos");
 insert into produtos (nome, imagem, cidade) values ("produto 2","produto2.jpg","São Paulo");
 insert into produtos (nome, imagem, cidade) values ("produto 3","produto3.jpg","Atibaia");
 
 select * from produtos;