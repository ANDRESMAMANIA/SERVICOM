-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 26-04-2023 a las 10:26:09
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `pos`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `id` int(11) NOT NULL,
  `ci` int(20) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `apellido` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `estado` tinyint(4) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`id`, `ci`, `nombre`, `apellido`, `email`, `estado`, `fecha`) VALUES
(15, 10905378, 'ANDRES PAULO', 'MAMANI ALARCON', 'andres@gmail.com', 0, '2023-04-26 06:57:48'),
(16, 10905379, 'GEOVANNY ANTONIO ', 'URRUTIA CÁRCAMO', 'geovanny.urrutia@gmail.com', 0, '2023-04-26 07:32:14'),
(17, 9849000, 'HÉCTOR ALFREDO', 'DÁVILA ROMERO', 'jimmy.chajon@gmail.com', 0, '2023-04-26 07:33:09'),
(18, 9452868, 'JOSE ESTUARDO', 'ROMERO ALVARADO', 'jose.alvarado@gmail.com', 0, '2023-04-26 07:34:58'),
(19, 10023596, 'JULIA ROSELIA', 'ABRIL BARRIOS', 'julia.barrios@gmail.com', 0, '2023-04-26 07:35:36'),
(20, 10101052, 'JULIO CESAR', 'ORANTES OSAETA', 'julio.orantes@gmail.com', 0, '2023-04-26 07:36:29'),
(21, 10894512, 'LADY ANGÉLICA', 'SOTO CONCUAN 1', 'lady.soto@enca.com', 0, '2023-04-26 08:08:30'),
(22, 9955678, 'LEIVI MARIBEL', 'HERNÁNDEZ GONZÁLEZ', 'leivi.hernandez@enca.com', 0, '2023-04-26 07:39:09'),
(23, 9457823, 'LILIA ANGÉLICA', 'VÁSQUEZ OVANDO', 'lilian.vasquez@enca.com', 0, '2023-04-26 07:39:49'),
(24, 9875263, 'MAXIMO ISMAEL', 'GODINEZ DOMINGUEZ', 'maximo.godinez@enca.com', 0, '2023-04-26 08:01:41'),
(25, 9234589, 'ROSA MIRIAM', 'GARCIA PEREZ', 'miriam.garcia@enca.com', 0, '2023-04-26 07:41:45'),
(26, 10892056, 'SILVIA ILIANA', 'ENRÍQUEZ DÍAZ', 'silvia.enriquez@gmail.com', 0, '2023-04-26 07:42:28');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `materiales`
--

CREATE TABLE `materiales` (
  `id` int(11) NOT NULL,
  `descripcion` varchar(200) NOT NULL,
  `cantidad` tinyint(4) NOT NULL,
  `precio` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `usuario` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `perfil` varchar(100) NOT NULL,
  `foto` text NOT NULL,
  `estado` tinyint(4) NOT NULL,
  `ultimo_login` datetime NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `usuario`, `password`, `perfil`, `foto`, `estado`, `ultimo_login`, `fecha`) VALUES
(98, 'Alejandro Mendez Mendez', 'Mendez', '$2a$07$asxx54ahjppf45sd87a5au4k7YA3SOmjH2NLs0fMKyJa42RMttrJq', 'Tecnico', 'vistas/img/usuarios/Mendez/185.jpg', 1, '0000-00-00 00:00:00', '2023-04-26 07:13:24'),
(99, 'Carlos Crispin', 'Carlos', '$2a$07$asxx54ahjppf45sd87a5auplkzz9Rfew1lxnyeP5taFjIwNpz8Q82', 'Tecnico', 'vistas/img/usuarios/Carlos/249.jpg', 1, '0000-00-00 00:00:00', '2023-04-26 07:13:24'),
(100, 'Cesar Augusto', 'Cesar', '$2a$07$asxx54ahjppf45sd87a5auLFUPYTP1QEQyNDSpnG5wxh.AjfdCPPG', 'Encargado', 'vistas/img/usuarios/Cesar/542.jpg', 1, '0000-00-00 00:00:00', '2023-04-26 07:13:24'),
(101, 'Marco Tulio', 'Marco', '$2a$07$asxx54ahjppf45sd87a5auyltLpjDEozuI3iL8GCe55EDQW5OIhBG', 'Limpiesa', 'vistas/img/usuarios/Marco/360.jpg', 0, '0000-00-00 00:00:00', '2023-04-26 07:14:00'),
(102, ' Noriega Morales', 'Noriega', '$2a$07$asxx54ahjppf45sd87a5au7DnRqn4t8/SRG.UmQ5GyRNnvtjSN1IO', 'Encargado', 'vistas/img/usuarios/Noriega/541.jpg', 0, '0000-00-00 00:00:00', '2023-04-26 07:16:40'),
(103, 'César Augusto', 'Augusto', '$2a$07$asxx54ahjppf45sd87a5au9fh.UhrU2EmLaUDSL44D7WalAhNIpPq', 'Limpiesa', 'vistas/img/usuarios/Augusto/787.jpg', 0, '0000-00-00 00:00:00', '2023-04-26 07:17:39'),
(104, 'Octaviano Camey Ramírez', 'Octaviano', '$2a$07$asxx54ahjppf45sd87a5audGr6PxySH2lTszlun4YfPpNmIrDixVC', 'Tecnico', 'vistas/img/usuarios/Octaviano/406.jpg', 0, '0000-00-00 00:00:00', '2023-04-26 07:19:40'),
(105, 'Osman Rosales Arias', 'Osman', '$2a$07$asxx54ahjppf45sd87a5au1d9bJwiBeFaiH8DidFJzV.WTNZ0RmWK', 'Tecnico', 'vistas/img/usuarios/Osman/117.jpg', 0, '0000-00-00 00:00:00', '2023-04-26 07:20:25'),
(106, 'Ana Francisca', 'Francisca', '$2a$07$asxx54ahjppf45sd87a5au6026.WHRapBeDeQD9EgtyoL3jL3dlO2', 'Secretaria', 'vistas/img/usuarios/Francisca/760.jpg', 0, '0000-00-00 00:00:00', '2023-04-26 07:20:58'),
(107, 'Ana Lucia', 'Ana', '$2a$07$asxx54ahjppf45sd87a5auDYEQn9FSFgFKqtulxg4A1kGWe2vSM0O', 'Limpiesa', 'vistas/img/usuarios/Ana/668.jpg', 0, '0000-00-00 00:00:00', '2023-04-26 07:22:20'),
(108, 'andres mamani', 'andres', '$2a$07$asxx54ahjppf45sd87a5auG6wzcvHQX0OYqZGMhIPic7EbdRk/KIC', 'Tecnico', 'vistas/img/usuarios/andres/553.jpg', 0, '0000-00-00 00:00:00', '2023-04-26 07:23:08'),
(109, 'Leiva García', 'Leiva', '$2a$07$asxx54ahjppf45sd87a5auiQNEo6O6MC2N3yU6rP/p2915.sCkwey', 'Secretaria', 'vistas/img/usuarios/Leiva/244.jpg', 0, '0000-00-00 00:00:00', '2023-04-26 07:24:10'),
(110, 'Dora Amanda', 'Amanda', '$2a$07$asxx54ahjppf45sd87a5auxNjzjqyKbG/yae36Qr.VjxWxxSG0Hgm', 'Limpiesa', 'vistas/img/usuarios/Amanda/864.jpg', 0, '0000-00-00 00:00:00', '2023-04-26 07:24:58');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `materiales`
--
ALTER TABLE `materiales`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT de la tabla `materiales`
--
ALTER TABLE `materiales`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=111;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
