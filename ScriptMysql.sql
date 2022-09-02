create database assesment;

use assesment;


create table clasificacion(
	id_clasificacion int not null primary key,
    nombre varchar(50),
    clasificacion int,
    clase_hija varchar(50)
);

create table producto (
	id_producto int not null primary key,
	modelo varchar(30),
    especificaciones varchar(70),
    precio double,
    id_clasificacion int not null,
	foreign key(id_clasificacion) references clasificacion(id_clasificacion)
);

create table accesorio(
	id_accesorio int not null primary key,
    nombre varchar(50),
    descripcion varchar(70),
    id_producto int not null,
    foreign key(id_producto) references producto(id_producto)
);


create table comentario(
	id_comentario int not null primary key,
    texto varchar(100),
    nombre varchar(50),
    calificacion int,
    id_producto int not null,
    foreign key(id_producto) references producto(id_producto),
    constraint ChkCalificacion check (calificacion>0 AND calificacion<=100)
);

create table metainfo(
	id_metainfo int not null,
    fecha_registro date,
    fecha_modificacion date,
    cantidad_vista int,
    cantidad_like int,    
    id_producto int not null,
    foreign key(id_producto) references producto(id_producto)
);

/*Vista*/
create or replace view vista_productos  as
select comentario.id_producto, comentario.texto , comentario.calificacion from comentario 
order by comentario.calificacion ASC;

/*Cuando se actualiza un producto  */
DELIMITER $$
CREATE TRIGGER 'UPDATEPRODUCTO'
AFTER UPDATE ON 'producto'
alter table producto add column cantidad_vistas int default;
update into metainfo set fecha_modificacion = CURDATE() 
DELIMITER ;


/*Cuando se actualiza un producto se actualiza su metadato */
DELIMITER //
create trigger INSERTPRODUCT after insert on producto
for each row begin
	insert into metainfo (id_metainfo, fecha_registro, fecha_modificacion, cantidad_vista, cantidad_like, id_producto) values (1, CURDATE(), CURDATE(), 0, 0, producto.id);
end//
delimiter ;
 



alter table producto add column cantidad_vistas int;

/*Avanzado 2 y 3.

*/



create or replace view mensualidades as
select producto.precio from producto



