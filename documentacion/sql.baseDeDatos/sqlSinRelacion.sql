-- Eliminar la base de datos servicom si existe
DROP DATABASE IF EXISTS servicom;

-- Crear la base de datos servicom
CREATE DATABASE servicom;

-- Usar la base de datos servicom
USE servicom;

-- Crear la tabla razon_social
CREATE TABLE razon_social (
  id_razon INT AUTO_INCREMENT PRIMARY KEY,
  nit VARCHAR(50),
  nombrenit VARCHAR(100)
);

-- Crear la tabla marca
CREATE TABLE marca (
  codigo_marca INT AUTO_INCREMENT PRIMARY KEY,
  nombre_marca VARCHAR(50)
);

-- Crear la tabla tipo_equipo
CREATE TABLE tipo_equipo (
  codigo_equipo INT AUTO_INCREMENT PRIMARY KEY,
  nombre_equipo VARCHAR(50)
);

-- Crear la tabla cliente
CREATE TABLE cliente (
  id_cliente INT AUTO_INCREMENT PRIMARY KEY,
  ci VARCHAR(20),
  nombre VARCHAR(50),
  apellido VARCHAR(50),
  telefono VARCHAR(20),
  email VARCHAR(100),
  fecha_nacimiento DATE,
  fecha_registro DATETIME,
  fecha_modificacion DATETIME,
  estado VARCHAR(20)
);
-- Crear la tabla usuarios
 CREATE TABLE usuarios (
   id_usuario INT AUTO_INCREMENT PRIMARY KEY,
   usuario VARCHAR(50),
   password VARCHAR(50),
   nombre VARCHAR(50),
   apellido VARCHAR(50),
   perfil VARCHAR(50),
   foto VARCHAR(100),
   telefono VARCHAR(8),
   ultimo_login DATETIME,
   fecha_registro DATETIME,
   estado VARCHAR(20)
 );
-- Crear la tabla ingreso_equipos
CREATE TABLE ingreso_equipos (
  id_ingreso INT AUTO_INCREMENT PRIMARY KEY,
  foto VARCHAR(100),
  garantia VARCHAR(50),
  modelo_equipo VARCHAR(50),
  fecha_ingreso DATE,
  fecha_salida DATE,
  estado VARCHAR(20),
  estado_equipo TEXT
);
CREATE TABLE detalle_equipo (
  serial VARCHAR(50),
  procesador VARCHAR(50),
  ram VARCHAR(50),
  almacenamiento VARCHAR(50),
  motherboard VARCHAR(50),
  tarjeta_grafica VARCHAR(50),
  tarjeta_red VARCHAR(50),
  id_ingreso INT,
  FOREIGN KEY (id_ingreso) REFERENCES ingreso_equipos(id_ingreso)
);

-- Crear la tabla repuesto
CREATE TABLE repuesto (
  id_producto INT AUTO_INCREMENT PRIMARY KEY,
  descripcion VARCHAR(100),
  cantidad INT,
  precio DECIMAL(10, 2),
  fecha_ingreso DATE
);

-- Crear la tabla servicio
CREATE TABLE servicio (
  id_servicio INT AUTO_INCREMENT PRIMARY KEY,
  nombre_servicio VARCHAR(50),
  total_detalle_servicio DECIMAL(10, 2)
);

-- Crear la tabla pago_repuesto
CREATE TABLE pago_repuesto (
  id_pago_repuesto INT AUTO_INCREMENT PRIMARY KEY,
  fecha_venta DATE,
  total_monto DECIMAL(10, 2)
);

-- Crear la tabla pago_servicio
CREATE TABLE pago_servicio (
  id_pago_servicio INT PRIMARY KEY,
  fecha_registro DATE,
  totalPago DECIMAL(10, 2)
);

INSERT INTO usuarios (`usuario`, `password`, `nombre`, `apellido`, `perfil`, `foto`, `telefono`, `fecha_registro`, `ultimo_login`, `estado`) VALUES 
('Mendez', '$2a$07$asxx54ahjppf45sd87a5au4k7YA3SOmjH2NLs0fMKyJa42RMttrJq', 'Alejandro', 'Mendez Mendez', 'Tecnico', 'vistas/img/usuarios/Mendez/185.jpg', '71234567', '0000-00-00 00:00:00', '2023-04-26 07:13:24', 1),
('Cesar', '$2a$07$asxx54ahjppf45sd87a5auLFUPYTP1QEQyNDSpnG5wxh.AjfdCPPG', 'Cesar', 'Augusto', 'Encargado', 'vistas/img/usuarios/Cesar/542.jpg', '72123456', '0000-00-00 00:00:00', '2023-04-26 07:13:24', 1),
('Carlos', '$2a$07$asxx54ahjppf45sd87a5auplkzz9Rfew1lxnyeP5taFjIwNpz8Q82', 'Carlos', 'Crispin', 'Tecnico', 'vistas/img/usuarios/Carlos/249.jpg', '73234567', '0000-00-00 00:00:00', '2023-04-26 07:13:24', 1),
('Marco', '$2a$07$asxx54ahjppf45sd87a5auyltLpjDEozuI3iL8GCe55EDQW5OIhBG', 'Marco', 'Tulio', 'Limpiesa', 'vistas/img/usuarios/Marco/360.jpg', '74345678', '0000-00-00 00:00:00', '2023-04-26 07:14:00', 1),
('Noriega', '$2a$07$asxx54ahjppf45sd87a5au7DnRqn4t8/SRG.UmQ5GyRNnvtjSN1IO', 'Noriega', 'Morales', 'Encargado', 'vistas/img/usuarios/Noriega/541.jpg', '75456789', '0000-00-00 00:00:00', '2023-04-26 07:16:40', 0),
('Augusto', '$2a$07$asxx54ahjppf45sd87a5au9fh.UhrU2EmLaUDSL44D7WalAhNIpPq', 'César', 'Augusto', 'Tecnico', 'vistas/img/usuarios/Octaviano/406.jpg', '76567890', '0000-00-00 00:00:00', '2023-04-26 07:19:40', 1),
('Octaviano', '$2a$07$asxx54ahjppf45sd87a5audGr6PxySH2lTszlun4YfPpNmIrDixVC', 'Octaviano', 'Camey Ramírez', 'Tecnico', 'vistas/img/usuarios/Octaviano/406.jpg', '77678901', '0000-00-00 00:00:00', '2023-04-26 07:19:40', 1),
('Osman', '$2a$07$asxx54ahjppf45sd87a5au1d9bJwiBeFaiH8DidFJzV.WTNZ0RmWK', 'Osman', 'Rosales Arias', 'Tecnico', 'vistas/img/usuarios/Osman/117.jpg', '78789012', '0000-00-00 00:00:00', '2023-04-26 07:20:25', 1),
('Francisca', '$2a$07$asxx54ahjppf45sd87a5au6026.WHRapBeDeQD9EgtyoL3jL3dlO2', 'Ana', 'Francisca', 'Secretaria', 'vistas/img/usuarios/Francisca/760.jpg', '65456789', '0000-00-00 00:00:00', '2023-04-26 07:20:58', 0),
('Ana', '$2a$07$asxx54ahjppf45sd87a5auDYEQn9FSFgFKqtulxg4A1kGWe2vSM0O', 'Lucia','Quiroga', 'Limpiesa', 'vistas/img/usuarios/Ana/668.jpg', '66567890', '0000-00-00 00:00:00', '2023-04-26 07:22:20', 0),
('andres', '$2a$07$asxx54ahjppf45sd87a5auG6wzcvHQX0OYqZGMhIPic7EbdRk/KIC', 'ANDRES', 'MAMANI', 'Limpiesa', 'vistas/img/usuarios/Ana/668.jpg', '67678901', '0000-00-00 00:00:00', '2023-04-26 07:22:20', 1),
('Leiva', '$2a$07$asxx54ahjppf45sd87a5auiQNEo6O6MC2N3yU6rP/p2915.sCkwey', 'Leiva', 'García', 'Secretaria', 'vistas/img/usuarios/Leiva/244.jpg', '68789012', '0000-00-00 00:00:00', '2023-04-26 07:24:10', 0),
('Amanda', '$2a$07$asxx54ahjppf45sd87a5auxNjzjqyKbG/yae36Qr.VjxWxxSG0Hgm', 'Dora Amanda', 'Quispe', 'Limpiesa', 'vistas/img/usuarios/Amanda/864.jpg', '69890123', '0000-00-00 00:00:00', '2023-04-26 07:24:58', 1);


INSERT INTO cliente (id_cliente, ci, nombre, apellido, telefono, email, fecha_nacimiento, fecha_registro, fecha_modificacion, estado)
VALUES
  (15, '10905378', 'ANDRES PAULO', 'MAMANI ALARCON', '71234567', 'andres@gmail.com', '2000-01-01', '2023-04-26 06:57:48', '2023-05-26 06:57:48', 1),
  (16, '10905379', 'GEOVANNY ANTONIO', 'URRUTIA CÁRCAMO', '75678901', 'geovanny.urrutia@gmail.com', '2002-06-30', '2023-04-26 06:57:48', '2023-05-26 07:57:48',0 ),
  (17, '9849000', 'HÉCTOR ALFREDO', 'DÁVILA ROMERO', '71234567', 'jimmy.chajon@gmail.com', '2003-05-15', '2023-04-26 07:33:09', '2023-04-28 07:33:09', 0),
  (18, '9452868', 'JOSE ESTUARDO', 'ROMERO ALVARADO', '75678901', 'jose.alvarado@gmail.com', '2001-11-20', '2023-04-26 07:34:58', '2023-05-26 07:34:58', 1),
  (19, '10023596', 'JULIA ROSELIA', 'ABRIL BARRIOS', '71234567', 'julia.barrios@gmail.com', '1999-03-25', '2023-04-26 07:35:36', '2023-06-26 07:35:36', 1),
  (20, '10101052', 'JULIO CESAR', 'ORANTES OSAETA', '75678901', 'julio.orantes@gmail.com', '1998-12-31', '2023-04-26 07:36:29', '2023-07-26 07:36:29', 1),
  (21, '10894512', 'LADY ANGÉLICA', 'SOTO CONCUAN 1', '71234567', 'lady.soto@enca.com', '2004-09-10', '2023-04-26 08:08:30', '2023-05-10 08:08:30', 1),
  (22, '9955678', 'LEIVI MARIBEL', 'HERNÁNDEZ GONZÁLEZ', '75678901', 'leivi.hernandez@enca.com', '2002-02-14', '2023-04-26 07:39:09', '2023-05-15 07:39:09', 0),
  (23, '9457823', 'LILIA ANGÉLICA', 'VÁSQUEZ OVANDO', '71234567', 'lilian.vasquez@enca.com', '2003-08-01', '2023-04-26 07:39:49', '2023-06-01 07:39:49', 0),
  (24, '9875263', 'MAXIMO ISMAEL', 'GODINEZ DOMINGUEZ', '75678901', 'maximo.godinez@enca.com', '2002-11-22', '2023-04-26 08:01:41', '2023-06-05 08:01:41', 0),
  (25, '9234589', 'ROSA MIRIAM', 'GARCIA PEREZ', '71234567', 'miriam.garcia@enca.com', '1998-10-05', '2023-04-26 07:41:00', '2023-07-09 07:41:00', 1);