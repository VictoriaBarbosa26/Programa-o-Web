drop database Barbosa;
create database Barbosa;
use Barbosa;

create table produtos(
 idprod int(4) not null primary key auto_increment,
 nome char(40) not null,
 profissao char(40) not null,
 imagem char(80) not null) Engine = InnoDB;
 
 
 
 insert into produtos (nome, profissao, imagem) values ("Victória","Medica","v.jpg");
 insert into produtos (nome, profissao, imagem) values ("Maria","Programadora","m.jpg");
 insert into produtos (nome, profissao, imagem) values ("Nicolas","Engenheiro Civil","n.jpg");
 
 select * from produtos;