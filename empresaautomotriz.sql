-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 20-03-2020 a las 06:50:08
-- Versión del servidor: 10.4.11-MariaDB
-- Versión de PHP: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `empresaautomotriz`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `activo`
--

CREATE TABLE `activo` (
  `idActivo` int(11) NOT NULL,
  `estado_cliente` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `activo`
--

INSERT INTO `activo` (`idActivo`, `estado_cliente`) VALUES
(1, 'Activo'),
(2, 'Inactivo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `idClientes` int(11) NOT NULL,
  `primer_nombre` varchar(100) NOT NULL,
  `segundo_nombre` varchar(100) NOT NULL,
  `primer_apellido` varchar(100) NOT NULL,
  `segundo_apellido` varchar(100) NOT NULL,
  `celular_cliente` varchar(20) NOT NULL,
  `ubicacion_cliente` varchar(264) NOT NULL,
  `cedula` varchar(30) NOT NULL,
  `idEmpresa` int(11) NOT NULL,
  `idActivo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`idClientes`, `primer_nombre`, `segundo_nombre`, `primer_apellido`, `segundo_apellido`, `celular_cliente`, `ubicacion_cliente`, `cedula`, `idEmpresa`, `idActivo`) VALUES
(31, 'Joel', 'Alexander', 'Guerrero', 'Navarro', '6303-3932', 'Panama', '8-925-575', 4, 1),
(44, 'Manuel', 'Jose', 'Perez', 'Lopez', '6509-3456', 'Pese', '2-345-2345', 7, 1),
(45, 'Jose', 'Alexander', 'Guerrero', 'Navarro', '6352-3748', 'Colon', '8-234-5643', 1, 1),
(46, 'Manolo', 'Moises', 'Guevara', 'Guerrero', '6102-3932', 'Panama', '3-42-2345', 14, 2),
(47, 'Mariana', 'Alexander', 'Guerrero', 'Navarro', '', '', '', 12, 1),
(48, 'Ruth', 'Nohemy', '', '', '', '', '', 12, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empresa`
--

CREATE TABLE `empresa` (
  `idEmpresa` int(11) NOT NULL,
  `nombre_empresa` varchar(264) NOT NULL,
  `ubicacion_empresa` varchar(264) NOT NULL,
  `telefono_empresa` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `empresa`
--

INSERT INTO `empresa` (`idEmpresa`, `nombre_empresa`, `ubicacion_empresa`, `telefono_empresa`) VALUES
(1, 'Petro auto', 'Transismica', 234567),
(2, 'Full Cars Inc', 'Tumba muerto', 3917004),
(3, 'Automarket | El Dorado', 'Vía Ricardo J. Alfaro ', 2792789),
(4, 'Grupo Sílaba', 'Grupo Silaba, Calle 50', 2087900),
(5, 'Ford Cincuentenario', 'Via Cincuentenario', 2700101),
(6, 'Taller Subaru', 'Av 8 A Nte', 3976279),
(7, 'Excel Automotriz', 'Vía Ricardo J. Alfaro', 3603800),
(8, 'Showroom Lincoln Panamá', 'Av. B, Costa del Este', 2150010),
(9, 'Nissan | Transístmica', 'Calle 65 Oeste', 8006477),
(10, '\r\nRicardo Perez, S.A.| Sucursal Tumba Muerto', 'Vía Ricardo J. Alfaro', 2799200),
(11, 'Distribuidora David Ford Company', 'Vía Transistmica y Vía Brasil, Edificio ford Transístmica', 3661300),
(12, 'Tu Auto Panamá', 'Vía Brasil', 68642593),
(13, 'Plaza Volkswagen', 'Vía Ricardo J. Alfaro, Panamá', 7744111),
(14, 'Car Sports International, S.A.', 'Vía Ricardo J. Alfaro, Panamá', 2369705),
(15, 'Bahía Motors | El Dorado', 'Villa De Las Fuentes No. 1, Panamá', 3001500);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `usuario` varchar(30) NOT NULL,
  `password` varchar(264) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `usuario`, `password`) VALUES
(82, 'admin', '$2y$12$Nr.1OVF2wBXPCKE2Q0Ewz.W9MAL3AcyJCz3z/d4Z5N2LRd18Wgx5C'),
(83, 'jguerrero', '$2y$12$/UejnnuGgzRtZOMpnk4QNeSDcJjyULNbXwvxYlh6y5ZFeIz.hwKCC'),
(84, 'admin1', '$2y$12$fkc5mcPTdFhHE5Bm57nuFu484GMDaZdt0GqXm3ovCZscBJ3AzoZmS'),
(85, 'kaka', '$2y$12$i9POZJx2BIGBoqdw90OEDeb8/OpCE6eoX8DvGsPeiJZmctOTEE10u');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `activo`
--
ALTER TABLE `activo`
  ADD PRIMARY KEY (`idActivo`);

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`idClientes`),
  ADD KEY `idEmpresa` (`idEmpresa`),
  ADD KEY `idActivo` (`idActivo`);

--
-- Indices de la tabla `empresa`
--
ALTER TABLE `empresa`
  ADD PRIMARY KEY (`idEmpresa`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `activo`
--
ALTER TABLE `activo`
  MODIFY `idActivo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `idClientes` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT de la tabla `empresa`
--
ALTER TABLE `empresa`
  MODIFY `idEmpresa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=86;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD CONSTRAINT `clientes_ibfk_1` FOREIGN KEY (`idEmpresa`) REFERENCES `empresa` (`idEmpresa`),
  ADD CONSTRAINT `clientes_ibfk_2` FOREIGN KEY (`idActivo`) REFERENCES `activo` (`idActivo`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
