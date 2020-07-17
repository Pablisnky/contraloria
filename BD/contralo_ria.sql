-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 17-07-2020 a las 03:24:31
-- Versión del servidor: 10.1.36-MariaDB
-- Versión de PHP: 7.3.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `contralo_ria`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `afiliado`
--

CREATE TABLE `afiliado` (
  `ID_Afiliado` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `cedula` int(8) NOT NULL,
  `telefono` int(15) NOT NULL,
  `correo` varchar(100) NOT NULL,
  `fecha_afiliacion` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `afiliado`
--

INSERT INTO `afiliado` (`ID_Afiliado`, `nombre`, `cedula`, `telefono`, `correo`, `fecha_afiliacion`) VALUES
(1, 'Pablo', 12728036, 2147483647, 'pcabeza7@gmail.com', '2020-06-08 14:41:18'),
(10, 'Ñaño', 2354312, 4956423, 'ñañito@gmail.com', '2020-06-17 16:54:29'),
(23, 'Silvia Veronica', 14325496, 143542394, 'veronica@gmail.com', '2020-06-24 20:40:16');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fallos`
--

CREATE TABLE `fallos` (
  `ID_Fallo` int(11) NOT NULL,
  `ID_Ubicacion` int(11) NOT NULL,
  `ID_Afiliado` int(11) NOT NULL,
  `aleatorio` int(11) NOT NULL,
  `sector` varchar(100) NOT NULL,
  `servicio` varchar(30) NOT NULL,
  `codigoFallo` int(11) NOT NULL,
  `abierto` int(20) NOT NULL,
  `fechaDenuncia` date NOT NULL,
  `horaDenuncia` time NOT NULL,
  `fechaCaducidad` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `fallos`
--

INSERT INTO `fallos` (`ID_Fallo`, `ID_Ubicacion`, `ID_Afiliado`, `aleatorio`, `sector`, `servicio`, `codigoFallo`, `abierto`, `fechaDenuncia`, `horaDenuncia`, `fechaCaducidad`) VALUES
(76, 109, 1, 386943764, 'comunidad', 'aguapotable', 100, 1, '2020-06-16', '11:13:00', '2020-07-06'),
(85, 170, 23, 101593279, 'comunidad', 'aguapotable', 101, 1, '2020-06-25', '22:07:00', '2020-07-15'),
(86, 171, 23, 528960630, 'comunidad', 'aguapotable', 102, 1, '2020-06-25', '05:34:00', '2020-07-15'),
(87, 172, 23, 44608879, 'comunidad', 'aguapotable', 100, 1, '2020-06-25', '21:03:00', '2020-07-15'),
(88, 173, 1, 758435983, 'comunidad', 'aguapotable', 101, 1, '2020-06-25', '18:49:00', '2020-07-15'),
(89, 174, 1, 607675475, 'comunidad', 'aguapotable', 102, 1, '2020-06-26', '10:22:00', '2020-07-16'),
(94, 179, 1, 258574692, 'comunidad', 'aguaservida', 200, 1, '2020-06-26', '16:54:00', '2020-07-16'),
(95, 180, 1, 781643949, 'comunidad', 'aguaservida', 201, 1, '2020-07-02', '15:35:00', '2020-07-22'),
(96, 181, 1, 261189228, 'comunidad', 'aguaservida', 202, 1, '2020-07-03', '06:11:00', '2020-07-23'),
(97, 182, 1, 431681639, 'comunidad', 'aguaservida', 2000, 1, '2020-07-03', '15:41:00', '2020-07-23'),
(100, 185, 1, 716426270, 'comunidad', 'aguapotable', 101, 1, '2020-07-09', '10:33:00', '2020-07-29'),
(101, 186, 1, 50233600, 'comunidad', 'aguapotable', 100, 1, '2020-07-09', '09:52:00', '2020-07-29'),
(102, 187, 1, 66221553, 'comunidad', 'aguapotable', 102, 1, '2020-07-09', '14:05:00', '2020-07-29'),
(103, 193, 1, 436045396, 'comunidad', 'aguapotable', 101, 1, '2020-07-09', '06:47:00', '2020-07-29'),
(104, 195, 1, 719725066, 'comunidad', 'aguapotable', 102, 1, '2020-07-09', '10:10:00', '2020-07-29'),
(105, 196, 1, 955850774, 'comunidad', 'aguaservida', 202, 1, '2020-07-09', '01:13:00', '2020-07-29'),
(106, 197, 1, 265847822, 'comunidad', 'aguaservida', 202, 1, '2020-07-11', '11:11:00', '2020-07-31'),
(108, 199, 1, 239355590, 'comunidad', 'aguaservida', 200, 1, '2020-07-12', '12:12:00', '2020-08-01'),
(109, 200, 1, 155074604, 'comunidad', 'aguaservida', 2000, 1, '2020-07-12', '12:12:00', '2020-08-01'),
(110, 201, 1, 4286019, 'comunidad', 'aguaservida', 2000, 1, '2020-07-12', '12:12:00', '2020-08-01');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ubicacion`
--

CREATE TABLE `ubicacion` (
  `ID_Ubicacion` int(11) NOT NULL,
  `estado` varchar(50) CHARACTER SET latin1 NOT NULL,
  `municipio` varchar(30) CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT NULL,
  `parroquia` varchar(50) CHARACTER SET latin1 NOT NULL,
  `zona` varchar(50) NOT NULL,
  `direccion` varchar(250) CHARACTER SET latin1 NOT NULL,
  `aleatorio` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `ubicacion`
--

INSERT INTO `ubicacion` (`ID_Ubicacion`, `estado`, `municipio`, `parroquia`, `zona`, `direccion`, `aleatorio`) VALUES
(109, 'Yaracuy', 'San Felipe', 'San Felipe', 'Caja de Agua', 'calle8', 386943764),
(170, 'Cojedes', 'Pao de San Juan Bautista', 'El Pao', 'Caja de Agua', 'asdfzxcv dfghvbnb', 101593279),
(171, 'Cojedes', 'Pao de San Juan Bautista', 'El Pao', 'Caja de Agua', 'asdfzxcv dfghvbnb', 528960630),
(172, 'Cojedes', 'Pao de San Juan Bautista', 'El Pao', 'Caja de Agua', 'asdfzxcv dfghvbnb', 44608879),
(173, 'Aragua', 'JosÃ© Ãngel Lamas', 'Santa Cruz', 'Caja de Agua', 'vfrcde xsw asas', 758435983),
(174, 'Yaracuy', 'San Felipe', 'San Felipe', 'Caja de Agua', 'calle 45', 607675475),
(179, 'Yaracuy', 'San Felipe', 'San Felipe', 'Caja de Agua', 'calle 3', 258574692),
(180, 'yaracuy', 'San Felipe', 'San Felipe', 'Caja de Agua', 'carrera 4', 781643949),
(181, 'yaracuy', 'san felipe', 'san felipe', 'Caja de Agua', 'sdfds', 261189228),
(182, 'yaracuy', 'san felipe', 'san felipe', 'Caja de Agua', 'asdf', 431681639),
(185, 'yaracuy', 'san felipe', 'san felipe', 'zumuco', 'Calle 4 con Av. 6', 716426270),
(186, 'yaracuy', 'san felipe', 'san felipe', 'zumuco', 'Avenida la Paz frente al IpasME', 50233600),
(187, 'yaracuy', 'san felipe', 'san felipe', 'zumuco', 'Av. 2 con calle 4', 66221553),
(193, 'yaracuy', 'san felipe', 'san felipe', 'caja de agua', 'asdf', 436045396),
(195, 'yaracuy', 'san felipe', 'san felipe', 'bella vista', 'xcc', 719725066),
(196, 'yaracuy', 'san felipe', 'san felipe', 'la asención', 'cdefr', 955850774),
(197, 'yaracuy', 'san felipe', 'san felipe', 'zumuco', 'av 1 entre calles 9 y 10', 265847822),
(199, 'yaracuy', 'san felipe', 'san felipe', 'zumuco', 'zzzzzzzzzzzzzzz', 239355590),
(200, 'yaracuy', 'san felipe', 'san felipe', 'caja de agua', 'ccccccccccc cccccccccccccc', 155074604),
(201, 'yaracuy', 'san felipe', 'san felipe', 'bella vista', 'bbbbbb bbbbbb', 4286019);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `ID_Usuario` int(11) NOT NULL,
  `ID_Afiliado` int(11) NOT NULL,
  `clave` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`ID_Usuario`, `ID_Afiliado`, `clave`) VALUES
(1, 1, '$2y$10$KZTPLA0lzVNH.U76iHBAIus2SM1UORC9a1cMTILBKX4gDysPkD4Z2'),
(10, 10, '$2y$10$Z/Bv9gClr/1lmAdrz0k1qe1/yjGT6xnFLwVvt0HyA/Ry0nmaU2Ziu'),
(12, 23, '$2y$10$s41TiQ/Ki7.BU1IIvGdUFORJtdhxYRMzXmc7t4GPy5HCoPce.4k96');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `afiliado`
--
ALTER TABLE `afiliado`
  ADD PRIMARY KEY (`ID_Afiliado`);

--
-- Indices de la tabla `fallos`
--
ALTER TABLE `fallos`
  ADD PRIMARY KEY (`ID_Fallo`),
  ADD KEY `QuitarFallo` (`ID_Ubicacion`);

--
-- Indices de la tabla `ubicacion`
--
ALTER TABLE `ubicacion`
  ADD PRIMARY KEY (`ID_Ubicacion`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`ID_Usuario`),
  ADD KEY `ForaneaConAfiliado` (`ID_Afiliado`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `afiliado`
--
ALTER TABLE `afiliado`
  MODIFY `ID_Afiliado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT de la tabla `fallos`
--
ALTER TABLE `fallos`
  MODIFY `ID_Fallo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=111;

--
-- AUTO_INCREMENT de la tabla `ubicacion`
--
ALTER TABLE `ubicacion`
  MODIFY `ID_Ubicacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=202;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `ID_Usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `fallos`
--
ALTER TABLE `fallos`
  ADD CONSTRAINT `QuitarFallo` FOREIGN KEY (`ID_Ubicacion`) REFERENCES `ubicacion` (`ID_Ubicacion`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `ForaneaConAfiliado` FOREIGN KEY (`ID_Afiliado`) REFERENCES `afiliado` (`ID_Afiliado`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
