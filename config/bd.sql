-- Active: 1756803505701@@127.0.0.1@3310@tienda_web
drop database if exists tienda_web ; -- peligro

create database if not exists  tienda_web 
character set latin1 
   collate latin1_spanish_ci;

use tienda_web;

create user admin_tienda 
identified by 'P100cpbvepatv!';

grant all PRIVILEGES on tienda_web.* to admin_tienda;

create table usuarios (
    id int unsigned AUTO_INcreMENT primary key,
    nombre_usuario varchar(25) not null,
    email varchar(80) not null unique,
    contrasena varchar(255) not null 
);


