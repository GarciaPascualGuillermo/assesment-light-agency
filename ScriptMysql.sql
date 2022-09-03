create database assesment;

use assesment;

/*Basico creacion de las tablas*/
create table clasificacion(
	id_clasificacion int not null primary key auto_increment,
    nombre varchar(50),
    clase_hija int
);

create table producto (
	id_producto int not null primary key auto_increment,
	modelo varchar(30),
    especificaciones varchar(70),
    precio double,
    id_clasificacion int,
	foreign key(id_clasificacion) references clasificacion(id_clasificacion)
);

create table comentario(
	id_comentario int not null primary key auto_increment,
    texto varchar(100),
    nombre varchar(50),
    calificacion int,
    id_producto int ,
    foreign key(id_producto) references producto(id_producto),
    constraint ChkCalificacion check (calificacion>0 AND calificacion<=100)
);

/*Intermedio*/
/*1. */
create or replace view vista_productos  as
select comentario.id_producto, comentario.texto , comentario.calificacion from comentario 
order by comentario.calificacion DESC;

/*2. Agrega indices, llaves foraneas y contrains, se agregaron en las tablas que se crearon anteriormente*/
/*3. Crear una tabla de accesorios */
create table accesorio(
	id_accesorio int not null primary key auto_increment,
    nombre varchar(50),
    descripcion varchar(70),
    id_producto int ,
    foreign key(id_producto) references producto(id_producto)
);
 /*4.Agregando nueva columna a la tabla productos*/
alter table producto add column cantidad_vistas int;

/*Avanzado*/
/*1. Agrega tabla de meta informacion*/
create table metainfo(
	id_metainfo int not null primary key auto_increment,
    fecha_registro datetime,
    fecha_modificacion datetime,
    cantidad_vista int,
    cantidad_like int,    
    id_producto int,
    foreign key(id_producto) references producto(id_producto)
);

/*Cuando se actualiza un producto se actualiza su metainfo */
/*Cuando se inserta un producto se genera su tabla de metadato correspondiente*/
DELIMITER //
create trigger INSERTPRODUCT after insert on producto
for each row begin
	insert into metainfo (fecha_registro, fecha_modificacion, cantidad_vista, cantidad_like, id_producto) values (current_timestamp(), current_timestamp(), 0, 0, new.id_producto);
end//
delimiter ;

/*Cuando se actualiza un producto se actualiza la columna de fecha_modificacion del metainfo */
DELIMITER //
CREATE TRIGGER UPDATEPRODUCTO AFTER UPDATE ON producto
for each row begin
	update metainfo set fecha_modificacion = current_timestamp(), cantidad_like=10 where metainfo.id_producto=new.id_producto;
end//
DELIMITER ;

/*2. Crear procedimiento que muestre una mensualidad de 6 y 12 meses de 10% de interes anual*/
/*Procedimiento para calcular a 6 y 12 meses de interes*/
delimiter //
create procedure mensualidades(IN idProducto int, IN meses int)
begin
	select id_producto, ((precio*0.1)+precio)/meses as mensualidad
    from producto where id_producto=idProducto;
end//
delimiter ;
/*Llamada al procedimiento*/
call mensualidades(1,6);

/*3.  Vista para 10 productos en base aleatorio */
create or replace view vista_clasificacion  as
select id_producto as 'ID Producto', clasificacion.nombre as 'Nombre de clasificacion', modelo as 'Modelo' , precio as 'Precio',round(((precio*0.1)+precio)/6,2) as '6 meses', round(((precio*0.1)+precio)/12) as '12 meses'  from producto inner join clasificacion
where producto.id_clasificacion = clasificacion.id_clasificacion
order by  rand() limit 10;

/*Datos de prueba*/
insert into clasificacion (nombre, clase_hija) values ('Myrwyn', 1);
insert into clasificacion ( nombre, clase_hija) values ( 'Adair', 2);
insert into clasificacion ( nombre, clase_hija) values ( 'Frederico', 3);
insert into clasificacion ( nombre, clase_hija) values ( 'Lois', 4);
insert into clasificacion ( nombre, clase_hija) values ('York', 5);
insert into clasificacion ( nombre, clase_hija) values ( 'Gretel', 6);
insert into clasificacion ( nombre, clase_hija) values ( 'Kathy', 7);
insert into clasificacion ( nombre, clase_hija) values ( 'Danita', 8);
insert into clasificacion ( nombre, clase_hija) values ( 'Nanni', 9);
insert into clasificacion ( nombre, clase_hija) values ( 'Denver', 10);


insert into producto ( modelo, especificaciones, precio, id_clasificacion) values ('Accord', 'Orange', 14971, 6);
insert into producto ( modelo, especificaciones, precio, id_clasificacion) values ('Camry', 'Aquamarine', 12523, 7);
insert into producto ( modelo, especificaciones, precio, id_clasificacion) values ('Cobalt', 'Aquamarine', 15813, 7);
insert into producto ( modelo, especificaciones, precio, id_clasificacion) values ('Exige', 'Maroon', 11149, 10);
insert into producto ( modelo, especificaciones, precio, id_clasificacion) values ('Genesis', 'Mauv', 12344, 1);
insert into producto ( modelo, especificaciones, precio, id_clasificacion) values ('tC', 'Purple', 14092, 10);
insert into producto ( modelo, especificaciones, precio, id_clasificacion) values ('GT', 'Crimson', 18597, 5);
insert into producto ( modelo, especificaciones, precio, id_clasificacion) values ('M5', 'Pink', 10934, 6);
insert into producto ( modelo, especificaciones, precio, id_clasificacion) values ('TundraMax', 'Goldenrod', 17951, 8);
insert into producto ( modelo, especificaciones, precio, id_clasificacion) values ('DB9', 'Mauv', 11391, 9);

insert into comentario ( texto, nombre, calificacion, id_producto) values ( 'Gendr identity dis-child', 'Giffard', 62, 8);
insert into comentario ( texto, nombre, calificacion, id_producto) values ( 'Mult gest 2+ monoamn NEC', 'Falito', 57, 8);
insert into comentario ( texto, nombre, calificacion, id_producto) values ( '60-69% bdy brn/3 deg NOS', 'Lyn', 96, 5);
insert into comentario ( texto, nombre, calificacion, id_producto) values ( 'Anaplastic lymph inguin', 'Caleb', 100, 8);
insert into comentario ( texto, nombre, calificacion, id_producto) values ( 'Blister trunk-infected', 'Devonne', 84, 9);
insert into comentario ( texto, nombre, calificacion, id_producto) values ( 'Old bucket tear med men', 'Georgianna', 82, 9);
insert into comentario ( texto, nombre, calificacion, id_producto) values ( 'Rheumatic heart failure', 'Morgan', 86, 6);
insert into comentario ( texto, nombre, calificacion, id_producto) values ( 'Exud cyst iris/ant chamb', 'Gabi', 70, 3);
insert into comentario ( texto, nombre, calificacion, id_producto) values ( 'Meth susc Staph carrier', 'Roana', 62, 6);
insert into comentario ( texto, nombre, calificacion, id_producto) values ( 'One eye-mod/oth-nr norm', 'Kelsey', 94, 2);
