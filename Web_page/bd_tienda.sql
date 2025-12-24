create database ldst006;

use ldst006;

create table usuarios
(
	correo char(50) not null primary key,
	nombre char(100) not null,
	apellido char(100) not null,
	contrasena char(50) not null,
 	ciudad char(100) not null,
	fechnac date not null,
	privilegio tinyint
);


create table pedidos
(
	id_pedido int unsigned not null auto_increment primary key,
	correo char(50) not null,
	coste_total float(8,2),
	fecha_hora datetime not null
);

create table vinilos
(
	id_vinilo int unsigned not null auto_increment primary key,
	nombre char(20) not null,
	tipo char(100) not null,
	imagen char(255) not null,
	precio float(6,2)
);



create table pedido_vinilos
(
	id_pedido int unsigned not null,
	id_vinilo int unsigned not null,
	cantidad smallint unsigned,
	
	primary key (id_pedido, id_vinilo)
);

insert into vinilos values 
(null, 'GUTS', 'Vinilo', 'guts.jpg', 46.00),
(null, 'GUTS (spilled)', 'Vinilo', 'guts_spilled.jpg', 46.00),
(null, 'SOUR', 'Vinilo', 'sour.jpg', 46.00),
(null, 'GUTS exclusivo', 'Vinilo', 'exclusivo1.jpg', 54.00),
(null, 'SOUR CD', 'cd', 'cd_sourb.jpg', 14.00),
(null, 'GUTS CD', 'cd', 'cd_gutsb.jpg', 14.00),
(null, 'GUTS TOUR', 'poster', 'poster1.jpg', 10.00),
(null, 'CONSTELLATIONS', 'poster', 'poster2.jpg', 10.00),
(null, 'SOUR', 'poster', 'poster3.jpg', 10.00),
(null, 'BRUTAL', 'poster', 'poster4.jpg', 11.00);

insert into usuarios values 
('juan@tel.uva.es', 'Juan','Rodriguez Santos', '12dfsn2df', 'Palencia', '2000-10-02',1),
('carlos@tel.uva.es', 'Carlos','Lopez Perez', '8fab3ne92', 'Soria', '1966-03-15',2),
('rocio@tel.uva.es', 'Rocio','Alvarez Dominguez', '93bbsjk2', 'Palencia', '2000-10-02',1),
('elena@tel.uva.es', 'Elena', 'Garcia Martin', 'k92ls01a', 'Valladolid', '1995-05-20', 2),
('david@tel.uva.es', 'David', 'Fernandez Ruiz', 'm43xk82p', 'Segovia', '1988-11-12', 2),
('lucia@tel.uva.es', 'Lucia', 'Gomez Sanchez', 'b71nq49z', 'Zamora', '2001-01-30', 2),
('pablo@tel.uva.es', 'Pablo', 'Torres Gil', 'v55jd02w', 'Leon', '1975-08-14', 2);
