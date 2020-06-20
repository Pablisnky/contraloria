-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 20-06-2020 a las 11:41:51
-- Versión del servidor: 10.1.36-MariaDB
-- Versión de PHP: 7.2.31

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
(10, 'Ñaño', 2354312, 4956423, 'ñañito@gmail.com', '2020-06-17 16:54:29');

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
  `descripcionFallo` varchar(250) NOT NULL DEFAULT 'No Aplica',
  `abierto` int(20) NOT NULL,
  `fechaDenuncia` datetime NOT NULL,
  `fechaCaducidad` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `fallos`
--

INSERT INTO `fallos` (`ID_Fallo`, `ID_Ubicacion`, `ID_Afiliado`, `aleatorio`, `sector`, `servicio`, `codigoFallo`, `descripcionFallo`, `abierto`, `fechaDenuncia`, `fechaCaducidad`) VALUES
(76, 109, 1, 386943764, 'comunidad', 'aguapotable', 100, '', 1, '2020-06-16 17:07:29', '2020-07-06'),
(77, 110, 1, 175509447, 'comunidad', 'aguapotable', 200, '', 1, '2020-06-16 17:09:30', '2020-07-06'),
(78, 111, 1, 239938795, 'comunidad', 'aguapotable', 300, '', 1, '2020-06-16 17:17:42', '2020-07-06'),
(79, 112, 1, 204797534, 'comunidad', 'aguapotable', 100, '', 1, '2020-06-18 15:26:15', '2020-07-08'),
(80, 113, 1, 152455256, 'comunidad', 'aguapotable', 300, '', 1, '2020-06-18 16:52:47', '2020-07-08'),
(81, 114, 1, 717011712, 'comunidad', 'aguapotable', 200, '', 1, '2020-06-18 19:09:51', '2020-07-09'),
(82, 115, 1, 647506069, 'comunidad', 'aguaservida', 500, '', 1, '2020-06-18 20:00:53', '2020-07-09'),
(83, 116, 1, 207925031, 'comunidad', 'aguaservida', 600, '', 1, '2020-06-18 20:45:27', '2020-07-09'),
(84, 117, 1, 451905973, 'comunidad', 'aguaservida', 1000, '', 1, '2020-06-18 20:54:27', '2020-07-09'),
(85, 118, 1, 445709930, 'comunidad', 'aguaservida', 600, '', 1, '2020-06-19 10:55:24', '2020-07-09'),
(86, 119, 1, 511964383, 'comunidad', 'aguaservida', 400, '', 1, '2020-06-19 12:35:06', '2020-07-09'),
(87, 120, 1, 255005567, 'comunidad', 'aguaservida', 500, '', 1, '2020-06-19 20:36:39', '2020-07-10'),
(88, 121, 1, 721789926, 'comunidad', 'aguaservida', 600, '', 1, '2020-06-19 22:01:30', '2020-07-10');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ubicacion`
--

CREATE TABLE `ubicacion` (
  `ID_Ubicacion` int(11) NOT NULL,
  `estado` varchar(50) CHARACTER SET latin1 NOT NULL,
  `municipio` varchar(30) CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT NULL,
  `parroquia` varchar(50) CHARACTER SET latin1 NOT NULL,
  `direccion` varchar(250) CHARACTER SET latin1 NOT NULL,
  `aleatorio` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `ubicacion`
--

INSERT INTO `ubicacion` (`ID_Ubicacion`, `estado`, `municipio`, `parroquia`, `direccion`, `aleatorio`) VALUES
(109, 'yaracuy', 'san felipe', 'san felipe', 'calle8', 386943764),
(110, 'yaracuy', 'san felipe', 'san felipe', 'calle3', 175509447),
(111, 'yaracuy', 'san felipe', 'san felipe', 'calle9', 239938795),
(112, 'yaracuy', 'san felipe', 'san felipe', 'calle 15', 204797534),
(113, 'yaracuy', 'san felipe', 'san felipe', 'calle 3', 152455256),
(114, 'yaracuy', 'san felipe', 'san felipe', 'calle r', 717011712),
(115, 'yaracuy', 'san felipe', 'san felipe', 'zxcv', 647506069),
(116, 'yaracuy', 'san felipe', 'san felipe', 'sdf', 207925031),
(117, 'yaracuy', 'san felipe', 'san felipe', 'asdcxz', 451905973),
(118, 'falcon', 'cacique manaure', 'cacique manaure', 'cdes', 445709930),
(119, 'yaracuy', 'san felipe', 'san felipe', 'ertfdfd', 511964383),
(120, 'barinas', 'alberto arvelo torrealba', 'sabaneta', 'sdfsd', 255005567),
(121, 'aragua', 'josé ángel lamas', 'santa cruz', 'calle 4', 721789926);

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
(10, 10, '$2y$10$Z/Bv9gClr/1lmAdrz0k1qe1/yjGT6xnFLwVvt0HyA/Ry0nmaU2Ziu');

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
  MODIFY `ID_Afiliado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `fallos`
--
ALTER TABLE `fallos`
  MODIFY `ID_Fallo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89;

--
-- AUTO_INCREMENT de la tabla `ubicacion`
--
ALTER TABLE `ubicacion`
  MODIFY `ID_Ubicacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=122;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `ID_Usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

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
