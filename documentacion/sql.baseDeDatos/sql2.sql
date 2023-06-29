-- Eliminar la base de datos servicom si existe
DROP DATABASE IF EXISTS servicom;

-- Crear la base de datos servicom
CREATE DATABASE servicom CHARACTER SET utf8 COLLATE utf8_spanish_ci;

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
  id_marca INT AUTO_INCREMENT PRIMARY KEY,
  nombre_marca VARCHAR(50)
);

-- Crear la tabla tipo_equipo
CREATE TABLE tipo_equipo (
  id_tipo_equipo INT AUTO_INCREMENT PRIMARY KEY,
  nombre_equipo VARCHAR(50)
);

-- Crear la tabla cliente
CREATE TABLE clientes (
  id_cliente INT AUTO_INCREMENT PRIMARY KEY,
  ci VARCHAR(20),
  nombre VARCHAR(50),
  apellido VARCHAR(50),
  telefono VARCHAR(20),
  email VARCHAR(100),
  fecha_nacimiento DATE,
  fecha_registro DATETIME,
  fecha_modificacion DATETIME,
  estado int(20)
);

-- Crear la tabla usuarios
CREATE TABLE usuarios (
  id_usuario INT AUTO_INCREMENT PRIMARY KEY,
  usuario VARCHAR(100),
  password VARCHAR(200),
  nombre VARCHAR(100),
  apellido VARCHAR(100),
  perfil VARCHAR(50),
  foto VARCHAR(100),
  telefono VARCHAR(8),
  ultimo_login DATETIME,
  fecha_registro DATETIME,
  estado int(20)
);

-- Crear la tabla ingreso_equipos
CREATE TABLE ingreso_equipos (
  id_ingreso INT AUTO_INCREMENT PRIMARY KEY,
  foto VARCHAR(100),
  descripcion TEXT,
  garantia VARCHAR(50),
  modelo_equipo VARCHAR(50),
  fecha_ingreso DATETIME,
  fecha_salida DATETIME,
  estado VARCHAR(20),
  estado_equipo TEXT,
  id_cliente INT,
  id_usuario INT,
  id_marca INT,
  id_tipo_equipo INT,
  FOREIGN KEY (id_cliente) REFERENCES clientes(id_cliente),
  FOREIGN KEY (id_usuario) REFERENCES usuarios(id_usuario),
  FOREIGN KEY (id_marca) REFERENCES marca(id_marca),
  FOREIGN KEY (id_tipo_equipo) REFERENCES tipo_equipo(id_tipo_equipo)
);



-- Crear la tabla pago_repuesto
CREATE TABLE pago_repuesto (
  id_pago_repuesto INT AUTO_INCREMENT PRIMARY KEY,
  fecha_venta DATE,
  total_monto DECIMAL(10, 2),
  id_razon INT,
  id_ingreso INT,
  FOREIGN KEY (id_razon) REFERENCES razon_social(id_razon),
  FOREIGN KEY (id_ingreso) REFERENCES ingreso_equipos(id_ingreso)
);

-- Crear la tabla repuesto
CREATE TABLE repuesto (
  id_producto INT AUTO_INCREMENT PRIMARY KEY,
  foto VARCHAR(100),
  descripcion VARCHAR(100),
  cantidad INT,
  precio DECIMAL(10, 2),
  fecha_ingreso DATE
);

-- Crear la tabla de unión detallePago_repuesto
CREATE TABLE detallePago_repuesto (
  id_detalle_pago_repuesto INT AUTO_INCREMENT PRIMARY KEY,
  cantidad_producto INT,
  detalle_repuesto TEXT,
  id_repuesto INT,
  id_pago_repuesto INT,
  FOREIGN KEY (id_repuesto) REFERENCES repuesto(id_producto),
  FOREIGN KEY (id_pago_repuesto) REFERENCES pago_repuesto(id_pago_repuesto)
);

-- Crear la tabla pago_servicio
CREATE TABLE pago_servicio (
  id_pago_servicio INT AUTO_INCREMENT PRIMARY KEY,
  fecha_registro DATE,
  totalPago DECIMAL(10, 2),
  id_ingreso INT,
  id_razon INT,
  FOREIGN KEY (id_ingreso) REFERENCES ingreso_equipos(id_ingreso),
  FOREIGN KEY (id_razon) REFERENCES razon_social(id_razon)
);

-- Crear la tabla servicio
CREATE TABLE servicio (
  id_servicio INT AUTO_INCREMENT PRIMARY KEY,
  nombre_servicio VARCHAR(50),
  precio_servicio DECIMAL(10, 2)
);

-- Crear la tabla detallePago_servicio
CREATE TABLE detallePago_servicio (
  id_pago_servicio INT,
  id_servicio INT,
  costo_servicio DECIMAL(10, 2),
  detalle_servicio TEXT,
  FOREIGN KEY (id_pago_servicio) REFERENCES pago_servicio(id_pago_servicio),
  FOREIGN KEY (id_servicio) REFERENCES servicio(id_servicio)
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


INSERT INTO clientes ( ci, nombre, apellido, telefono, email, fecha_nacimiento, fecha_registro, fecha_modificacion, estado)
VALUES
  ('10905378', 'ANDRES PAULO', 'MAMANI ALARCON', '71234567', 'andres@gmail.com', '2000-01-01', '2023-04-26 06:57:48', '2023-05-26 06:57:48', 1),
  ('10905379', 'GEOVANNY ANTONIO', 'URRUTIA CÁRCAMO', '75678901', 'geovanny.urrutia@gmail.com', '2002-06-30', '2023-04-26 06:57:48', '2023-05-26 07:57:48',0 ),
  ('9849000', 'HÉCTOR ALFREDO', 'DÁVILA ROMERO', '71234567', 'jimmy.chajon@gmail.com', '2003-05-15', '2023-04-26 07:33:09', '2023-04-28 07:33:09', 0),
  ('9452868', 'JOSE ESTUARDO', 'ROMERO ALVARADO', '75678901', 'jose.alvarado@gmail.com', '2001-11-20', '2023-04-26 07:34:58', '2023-05-26 07:34:58', 1),
  ('10023596', 'JULIA ROSELIA', 'ABRIL BARRIOS', '71234567', 'julia.barrios@gmail.com', '1999-03-25', '2023-04-26 07:35:36', '2023-06-26 07:35:36', 1),
  ('10101052', 'JULIO CESAR', 'ORANTES OSAETA', '75678901', 'julio.orantes@gmail.com', '1998-12-31', '2023-04-26 07:36:29', '2023-07-26 07:36:29', 1),
  ('10894512', 'LADY ANGÉLICA', 'SOTO CONCUAN 1', '71234567', 'lady.soto@enca.com', '2004-09-10', '2023-04-26 08:08:30', '2023-05-10 08:08:30', 1),
  ('9955678', 'LEIVI MARIBEL', 'HERNÁNDEZ GONZÁLEZ', '75678901', 'leivi.hernandez@enca.com', '2002-02-14', '2023-04-26 07:39:09', '2023-05-15 07:39:09', 0),
  ('9457823', 'LILIA ANGÉLICA', 'VÁSQUEZ OVANDO', '71234567', 'lilian.vasquez@enca.com', '2003-08-01', '2023-04-26 07:39:49', '2023-06-01 07:39:49', 0),
  ('9875263', 'MAXIMO ISMAEL', 'GODINEZ DOMINGUEZ', '75678901', 'maximo.godinez@enca.com', '2002-11-22', '2023-04-26 08:01:41', '2023-06-05 08:01:41', 0),
  ('9234589', 'ROSA MIRIAM', 'GARCIA PEREZ', '71234567', 'miriam.garcia@enca.com', '1998-10-05', '2023-04-26 07:41:00', '2023-07-09 07:41:00', 1);

  INSERT INTO repuesto (foto,descripcion,cantidad,precio,fecha_ingreso) 
  VALUES 
  ('','Procesador Intel Core i5-12600K',10,250.00,'2023-03-08'),
  ('','Procesador AMD Ryzen 7 5800X',5,300.00,'2023-03-08'),
  ('','Procesador Intel Core i7-12700K',1,350.00,'2023-03-08'),
  ('','Procesador AMD Ryzen 9 5900X',1,400.00,'2023-03-08'),
  ('','Procesador Intel Core i9-12900K',1,500.00,'2023-03-08'),
  ('','Monitor LCD de 24 pulgadas marca Samsung',10,100.00,'2023-03-08'),
  ('','Monitor LED de 27 pulgadas marca LG',5,150.00,'2023-03-08'),
  ('','Monitor OLED de 32 pulgadas marca Apple',1,200.00,'2023-03-08'),
  ('','Impresora láser monocromática marca HP',10,100.00,'2023-03-08'),
  ('','Impresora láser color marca Canon',5,150.00,'2023-03-08'),
  ('','Impresora de inyección de tinta marca Epson',1,200.00,'2023-03-08'),
  ('','Impresora láser monocromática marca HP',10,100.00,'2023-03-08'),
  ('','Impresora láser color marca Canon',5,150.00,'2023-03-08');

INSERT INTO marca (nombre_marca) VALUES
('Acer'),
('Alienware'),
('AOC'),
('Apple'),
('Asus'),
('BenQ'),
('Brother'),
('Canon'),
('Dell'),
('EIZO'),
('Epson'),
('Fujitsu'),
('Gestetner'),
('Gigabyte'),
('HP'),
('Huawei'),
('Kodak'),
('Konica Minolta'),
('Kyocera'),
('LG'),
('Lenovo'),
('Lexmark'),
('MSI'),
('Microsoft'),
('NEC'),
('OKI'),
('Océ'),
('Panasonic'),
('Philips'),
('Razer'),
('Ricoh'),
('Samsung'),
('Sharp'),
('Sony'),
('Toshiba'),
('ViewSonic'),
('Xerox'),
('Zebra Technologies');


  INSERT INTO tipo_equipo (nombre_equipo) VALUES
  ('Impresora'),
  ('Monitor'),
  ('PC'),
  ('Laptop'),
  ('Router'),
  ('Modem');
  

  INSERT INTO servicio (nombre_servicio, precio_servicio) VALUES
  ('Mantenimiento de impresora', 100),
  ('Reparación de impresora', 200),
  ('Mantenimiento de monitor', 50),
  ('Reparación de monitor', 100),
  ('Mantenimiento de PC', 150),
  ('Reparación de PC', 250),
  ('Mantenimiento de laptop', 200),
  ('Reparación de laptop', 300),
  ('Mantenimiento de tablet', 100),
  ('Reparación de tablet', 150);

INSERT INTO `ingreso_equipos` ( `foto`, `descripcion`, `garantia`, `modelo_equipo`, `fecha_ingreso`, `fecha_salida`, `estado`, `estado_equipo`, `id_cliente`, `id_usuario`, `id_marca`, `id_tipo_equipo`) VALUES
( NULL, 'Procesador: AMD Ryzen 7 4700U\r\nMemoria RAM: 16 GB DDR4\r\nAlmacenamiento: 1 TB PCIe NVMe SSD\r\nPantalla: 13.3 pulgadas Full HD táctil\r\nTarjeta gráfica: AMD Radeon Graphics\r\nSistema operativo: Windows 11 Home\r\nNúmero de serie: LPT-LENOVO-X1C-2468-IJKL', '3 meses', 'Lenovo ThinkPad X1 Carbon', '2022-01-02 09:30:00', '2022-01-04 15:45:00', '0', 'Lentitud extrema: La laptop presenta un rendimiento muy lento en todas las tareas.\r\nSobrecalentamiento: La laptop se calienta en exceso y puede apagarse automáticamente.\r\n', 1, 13, 21, 4),
( NULL, 'Procesador: Intel Core i7-1165G7\r\nMemoria RAM: 16 GB LPDDR4X\r\nAlmacenamiento: 512 GB PCIe NVMe SSD\r\nPantalla: 14 pulgadas WQHD\r\nTarjeta gráfica: Intel Iris Xe Graphics\r\nSistema operativo: Windows 10 Pro\r\nNúmero de serie: LPT-DELL-XPS15-9876-MNOP\r\n', '1 mes', 'Dell XPS 15', '2022-01-15 10:30:00', '2022-01-17 16:45:00', '1', 'Problemas de compatibilidad de software: La laptop no puede ejecutar ciertos programas o aplicaciones.\r\nPantalla dividida o distorsionada: La pantalla de la laptop muestra divisiones o distorsiones en la imagen.\r\nError en la unidad de CD/DVD: La laptop no expulsa los discos de la unidad o no los reconoce correctamente.\r\n', 2, 7, 9, 4),
(NULL, 'Procesador: Intel Core i7-11800H\r\nMemoria RAM: 32 GB DDR4\r\nAlmacenamiento: 1 TB PCIe NVMe SSD\r\nPantalla: 15.6 pulgadas 4K UHD+\r\nTarjeta gráfica: NVIDIA GeForce RTX 3060\r\nSistema operativo: Windows 10 Pro\r\nNúmero de serie: LPT-MACBOOKPRO13-3456-QRST\r\n', '3 meses', 'Apple MacBook Pro 13', '2022-02-07 13:15:00', '2022-02-09 09:30:00', '1', 'Errores de impresión: La laptop no puede imprimir o muestra errores al enviar trabajos de impresión.\r\nProblemas de reconocimiento de huellas dactilares: El lector de huellas dactilares de la laptop no funciona adecuadamente.\r\n', 10, 2, 4, 4),
(NULL, 'Procesador: Apple M1 Chip con CPU de 8 núcleos\r\nMemoria RAM: 16 GB unificada\r\nAlmacenamiento: 512 GB SSD\r\nPantalla: 13.3 pulgadas Retina\r\nTarjeta gráfica: Apple 8-core GPU\r\nSistema operativo: macOS Monterey\r\nNúmero de serie: LPT-ASUS-G15-7890-UVWX\r\n', '15 dias', 'ASUS ROG Strix G15', '2022-02-19 14:15:00', '2022-02-21 20:30:00', '0', 'Sobrecalentamiento: La laptop se calienta en exceso y puede apagarse automáticamente.\r\nTeclado defectuoso: Algunas teclas del teclado no funcionan correctamente o están atascadas.\r\nProblemas de carga: La laptop no se carga correctamente o no reconoce el cargador.\r\n', 2, 4, 5, 4),
(NULL, 'Procesador: AMD Ryzen 9 5900HX\r\nMemoria RAM: 32 GB DDR4\r\nAlmacenamiento: 1 TB PCIe NVMe SSD\r\nPantalla: 15.6 pulgadas Full HD 144Hz\r\nTarjeta gráfica: NVIDIA GeForce RTX 3070\r\nSistema operativo: Windows 10 Home\r\nNúmero de serie: LPT-MSI-STEALTH15M-2345-YZAB\r\n', '15 dias', 'MSI Stealth 15M', '2022-03-12 17:00:00', '2022-03-14 20:00:00', '1', 'Sobrecalentamiento: La laptop se calienta en exceso y puede apagarse automáticamente.\r\nBatería agotada: La batería de la laptop no carga o se agota rápidamente.\r\nProblemas de inicio de sesión: La laptop no permite iniciar sesión correctamente en el sistema operativo.\r\n', 6, 8, 23, 4),
(NULL, 'Procesador: Intel Core i7-1185G7\r\nMemoria RAM: 16 GB DDR4\r\nAlmacenamiento: 1 TB PCIe NVMe SSD\r\nPantalla: 15.6 pulgadas Full HD 144Hz\r\nTarjeta gráfica: NVIDIA GeForce GTX 1660 Ti\r\nSistema operativo: Windows 10 Pro\r\nNúmero de serie: LPT-HP-SPECTREX360-5678-CDEF\r\n', '60 dias', 'HP Spectre x360', '2022-03-27 08:00:00', '2022-03-28 14:15:00', '1', 'Fallas en la unidad óptica: La unidad de CD/DVD de la laptop no lee o graba correctamente.\r\nBloqueo del sistema: La laptop se bloquea y no responde a ninguna acción del usuario.\r\nErrores de impresión: La laptop no puede imprimir o muestra errores al enviar trabajos de impresión.\r\n', 7, 2, 15, 4),
(NULL, 'Procesador: Intel Core i7-1165G7\r\nMemoria RAM: 16 GB DDR4\r\nAlmacenamiento: 512 GB PCIe NVMe SSD\r\nPantalla: 13.3 pulgadas 4K UHD táctil\r\nTarjeta gráfica: Intel Iris Xe Graphics\r\nSistema operativo: Windows 11 Home\r\n\r\nNúmero de serie: LPT-LENOVO-LEGION5-9012-GHIJ\r\n', '30 dias', 'Lenovo Legion 5', '2022-04-17 08:00:00', '2022-04-19 14:15:00', '1', 'Pantalla táctil no responde: La pantalla táctil de la laptop no reconoce toques o gestos.\r\nVirus o malware: La laptop está infectada por programas maliciosos que afectan su funcionamiento.\r\n', 5, 7, 21, 4),
(NULL, 'Procesador: AMD Ryzen 7 5800H\r\nMemoria RAM: 16 GB DDR4\r\nAlmacenamiento: 1 TB PCIe NVMe SSD\r\nPantalla: 15.6 pulgadas Full HD 120Hz\r\nTarjeta gráfica: NVIDIA GeForce RTX 3060\r\nSistema operativo: Windows 10 Home\r\nNúmero de serie: LPT-DELL-INSPIRON14-3456-KLMN\r\n', '15 dias', 'Dell Inspiron 14', '2022-04-30 08:00:00', '2022-05-25 14:15:00', '0', 'Virus o malware: La laptop está infectada por programas maliciosos que afectan su funcionamiento.\r\n', 8, 6, 9, 4),
(NULL, 'Procesador: Intel Core i5-11300H\r\nMemoria RAM: 8 GB DDR4\r\nAlmacenamiento: 256 GB PCIe NVMe SSD\r\nPantalla: 14 pulgadas Full HD\r\nTarjeta gráfica: Intel Iris Xe Graphics\r\nSistema operativo: Windows 10 Home', '60 dias', 'Dell Inspiron 15', '2022-06-05 08:00:00', '2022-06-07 14:15:00', '1', 'Error de sistema operativo: La laptop muestra mensajes de error o no arranca el sistema operativo.\r\n', 1, 2, 15, 4),
(NULL, 'Tecnología de impresión: Inyección de tinta\r\nVelocidad de impresión: Hasta 24 ppm (páginas por minuto)\r\nResolución de impresión: 1200 x 1200 ppp (puntos por pulgada)\r\nConectividad: USB, Ethernet, Wi-Fi\r\nBandeja de papel: Capacidad para 250 hojas\r\nFunciones adicionales: Impresión dúplex, escaneo, copiado\r\nNúmero de serie: PRN-HP9025-5678-ABCD', '45 dias', 'HP OfficeJet Pro 9025', '2022-06-28 08:00:00', '2022-06-30 14:15:00', '0', 'Lentitud extrema: La impresora tarda mucho tiempo en imprimir las páginas.\r\nImpresiones con líneas o rayas: Las páginas impresas tienen líneas o rayas en el texto o las imágenes.\r\n', 4, 5, 15, 1),
(NULL, 'Tecnología de impresión: Inyección de tinta\r\nVelocidad de impresión: Hasta 10 ppm (páginas por minuto)\r\nResolución de impresión: 5760 x 1440 ppp (puntos por pulgada)\r\nConectividad: USB, Wi-Fi, Ethernet\r\nBandeja de papel: Capacidad para 150 hojas\r\nFunciones adicionales: Impresión dúplex, escaneo, copiado\r\nNúmero de serie: PRN-EPSONET2750-9012-EFGH', '30 dias', 'Epson EcoTank ET-2750', '2022-07-11 08:00:00', '2022-08-04 14:15:00', '0', 'Error de falta de papel: La impresora muestra un error indicando que no hay papel, aunque esté cargado.\r\nError de falta de tinta: La impresora muestra un error indicando que falta tinta, aunque los cartuchos estén instalados.\r\n', 4, 3, 11, 1),
(NULL, 'Tecnología de impresión: Inyección de tinta\r\nVelocidad de impresión: Hasta 15 ppm (páginas por minuto)\r\nResolución de impresión: 4800 x 1200 ppp (puntos por pulgada)\r\nConectividad: USB, Wi-Fi\r\nBandeja de papel: Capacidad para 100 hojas\r\nFunciones adicionales: Impresión dúplex, escaneo, copiado\r\nNúmero de serie: PRN-CANONTS6320-2345-IJKL', '30 dias', 'Canon PIXMA TS6320', '2022-08-15 08:00:00', '2022-08-17 14:15:00', '1', 'Problemas de conectividad USB: La impresora no se conecta correctamente al ordenador mediante un cable USB.\r\nProblemas de reconocimiento de tarjetas de memoria: La impresora no reconoce o no lee tarjetas de memoria insertadas.\r\n', 6, 10, 8, 1),
(NULL, 'Tecnología de impresión: Láser monocromático\r\nVelocidad de impresión: Hasta 32 ppm (páginas por minuto)\r\nResolución de impresión: 2400 x 600 ppp (puntos por pulgada)\r\nConectividad: USB, Wi-Fi, Ethernet\r\nBandeja de papel: Capacidad para 250 hojas\r\nFunciones adicionales: Impresión dúplex, escaneo, copiado\r\nNúmero de serie: PRN-BROTHER2390DW-7890-MNOP', '30 dias', 'Brother HL-L2390DW', '2022-09-06 08:00:00', '2022-09-08 14:15:00', '0', 'Impresiones con líneas o rayas: Las páginas impresas tienen líneas o rayas en el texto o las imágenes.\r\nProblemas de conexión: La impresora no se conecta correctamente al ordenador o a la red.\r\n', 11, 5, 7, 1),
(NULL, 'Tecnología de impresión: Láser monocromático\r\nVelocidad de impresión: Hasta 21 ppm (páginas por minuto)\r\nResolución de impresión: 1200 x 1200 ppp (puntos por pulgada)\r\nConectividad: USB, Wi-Fi\r\nBandeja de papel: Capacidad para 150 hojas\r\nFunciones adicionales: Impresión dúplex\r\nNúmero de serie: PRN-SAMSUNG2020W-1234-QRST', '30 dias', 'Samsung Xpress M2020W', '2022-09-19 08:00:00', '2022-09-21 14:15:00', '1', 'Problemas de reconocimiento de códigos de barras: La impresora no reconoce o no imprime correctamente códigos de barras.\r\nProblemas de reconocimiento de cartuchos de tóner: La impresora no reconoce los cartuchos de tóner instalados.\r\n', 10, 9, 32, 1),
(NULL, 'Tamaño de pantalla: 27 pulgadas\r\nResolución: 2560 x 1440 píxeles\r\nTipo de panel: IPS\r\nFrecuencia de actualización: 144 Hz\r\nConectividad: DisplayPort, HDMI, USB\r\nCaracterísticas adicionales: AMD FreeSync, HDR10, tiempo de respuesta de 1 ms\r\nNúmero de serie: MON-LG27GL850-5678-ABCD', '45 dias', 'LG UltraGear 27GL850-B', '2022-10-12 08:00:00', '2022-10-14 14:15:00', '1', 'Se apaga y enciende intermitentemente: El monitor se apaga y se enciende de manera repetida sin una acción por parte del usuario.\r\n', 1, 1, 20, 2),
(NULL, 'Tamaño de pantalla: 27 pulgadas\r\nResolución: 2560 x 1440 píxeles\r\nTipo de panel: IPS\r\nFrecuencia de actualización: 165 Hz\r\nConectividad: DisplayPort, HDMI\r\nCaracterísticas adicionales: NVIDIA G-SYNC, HDR10, tiempo de respuesta de 1 ms\r\nNúmero de serie: MON-ASUSVG27AQ-9012-EFGH', '30 dias', 'ASUS TUF Gaming VG27AQ', '2022-11-16 08:00:00', '2022-12-24 14:15:00', '0', 'No muestra la resolución correcta: El monitor no muestra la resolución nativa o la resolución deseada correctamente.\r\n', 8, 2, 5, 2),
(NULL, 'Tamaño de pantalla: 27 pulgadas\r\nResolución: 2560 x 1440 píxeles\r\nTipo de panel: IPS\r\nFrecuencia de actualización: 60 Hz\r\nConectividad: DisplayPort, HDMI, USB\r\nCaracterísticas adicionales: Calibración de color de fábrica, tiempo de respuesta de 5 ms\r\nNúmero de serie: MON-DELLU2719D-2345-IJKL', '90 dias', 'Dell UltraSharp U2719D', '2022-12-31 08:00:00', '2023-01-02 14:15:00', '1', 'Ruido o interferencia en la imagen: Aparecen ruidos, interferencias o patrones no deseados en la imagen en pantalla.\r\n', 2, 12, 9, 2),
(NULL, 'Tamaño de pantalla: 21.5 pulgadas\r\nResolución: 1920 x 1080 píxeles\r\nTipo de panel: IPS\r\nFrecuencia de actualización: 60 Hz\r\nConectividad: HDMI, VGA\r\nCaracterísticas adicionales: Bisel delgado, ángulos de visión amplios, tiempo de respuesta de 7 ms\r\nNúmero de serie: MON-HP22CWA-7890-MNOP', '90 dias', 'HP Pavilion 22cwa', '2023-01-02 08:00:00', '2023-01-04 14:15:00', '1', 'No enciende: El monitor no muestra ninguna señal de vida cuando se intenta encender.', 3, 1, 15, 2),
(NULL, 'Tamaño de pantalla: 32 pulgadas\r\nResolución: 2560 x 1440 píxeles\r\nTipo de panel: VA\r\nFrecuencia de actualización: 240 Hz\r\nConectividad: DisplayPort, HDMI, USB\r\nCaracterísticas adicionales: NVIDIA G-SYNC, HDR1000, tiempo de respuesta de 1 ms\r\nNúmero de serie: MON-SAMSUNGG7-1234-QRST', '90 dias', 'Samsung Odyssey G7', '2023-01-15 08:00:00', '2023-01-17 14:15:00', '0', '25. Parpadeo o destellos al iniciar o apagar: El monitor presenta parpadeos o destellos al encender o apagar el dispositivo.\r\n', 2, 7, 32, 2);
