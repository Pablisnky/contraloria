-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 16-06-2020 a las 22:30:22
-- Versión del servidor: 10.1.36-MariaDB
-- Versión de PHP: 7.1.23

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
(2, 'PAblo Cabeza', 1, 0, 'pablocabeza@gmail.com', '2020-06-14 10:22:56'),
(3, 'Sdasd', 1, 1, 'asdfaf', '2020-06-14 10:53:30'),
(4, 'Asdf', 1, 1, 'asf', '2020-06-14 11:00:14');

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

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ubicacion`
--

CREATE TABLE `ubicacion` (
  `ID_Ubicacion` int(11) NOT NULL,
  `estado` varchar(50) NOT NULL,
  `municipio` varchar(50) NOT NULL,
  `parroquia` varchar(50) NOT NULL,
  `direccion` varchar(250) NOT NULL,
  `aleatorio` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(2, 2, '$2y$10$LsPUcVTEc087Pvh/2kecCOgKNf8brVKyu.oNS3nz9kUs9ii2ufGf2'),
(3, 2, '$2y$10$ccXXPw3KtyrBGq00ZEdRy.xhnJ2uc.CBSy4f1mbQC5TpKtalaX.C.'),
(4, 2, '$2y$10$2I2jVsCadnKPKW3VIghVAu5cDDxGVuMvfzXwM/8q6scQHj6MCLK5m');

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
  ADD PRIMARY KEY (`ID_Usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `afiliado`
--
ALTER TABLE `afiliado`
  MODIFY `ID_Afiliado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `fallos`
--
ALTER TABLE `fallos`
  MODIFY `ID_Fallo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- AUTO_INCREMENT de la tabla `ubicacion`
--
ALTER TABLE `ubicacion`
  MODIFY `ID_Ubicacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=109;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `ID_Usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `fallos`
--
ALTER TABLE `fallos`
  ADD CONSTRAINT `QuitarFallo` FOREIGN KEY (`ID_Ubicacion`) REFERENCES `ubicacion` (`ID_Ubicacion`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
