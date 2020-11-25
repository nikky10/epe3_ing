create database prueba;
use prueba;

create table Perfiles(
codigo_perfil int not null auto_increment,
nombre_perfil varchar(20) not null,
primary key(codigo_perfil));

create table Usuarios(
codigo_usuario int not null auto_increment,
rut_usuario varchar(12) not null,
nombre_usuario varchar(50) not null,
apellido_usuario varchar(50) not null,
direccion_usuario varchar(200) not null,
email_usuario varchar(200) not null,
clave_usuario varchar(20) not null,
codigo_perfil int not null,
primary key(codigo_usuario),
foreign key(codigo_perfil) references Perfiles(codigo_perfil));

insert into Perfiles (codigo_perfil, nombre_perfil) values (1, 'profesor'), (2, 'alumno');
insert into Usuarios(codigo_usuario, rut_usuario, nombre_usuario, apellido_usuario, direccion_usuario, email_usuario, clave_usuario, codigo_perfil)
values(1, '20.238.507-9', 'nicolas', 'mella', 'januario espinoza', 'nicolas@gmail.com', '123', 1), (2, '18.456.801-2' , 'carolina', 'aravena', 'ohhiggins 678', 'carolina@gmail.com', '123', 2); 