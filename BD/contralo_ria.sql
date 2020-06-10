-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 10-06-2020 a las 12:43:35
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
(1, 'Pablo', 12728036, 2147483647, 'pcabeza7@gmail.com', '2020-06-08 14:41:18');

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
  `abierto` int(11) NOT NULL,
  `fechaDenuncia` datetime NOT NULL,
  `fechaCaducidad` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `fallos`
--

INSERT INTO `fallos` (`ID_Fallo`, `ID_Ubicacion`, `ID_Afiliado`, `aleatorio`, `sector`, `servicio`, `codigoFallo`, `abierto`, `fechaDenuncia`, `fechaCaducidad`) VALUES
(24, 59, 1, 897689926, 'comunidad', 'aguapotable', 200, 1, '2020-06-09 21:18:22', '2020-06-30'),
(25, 60, 1, 370525825, 'comunidad', 'aguapotable', 300, 1, '2020-06-09 21:19:51', '2020-06-29'),
(26, 61, 1, 319650621, 'comunidad', 'aguapotable', 100, 1, '2020-06-09 21:26:05', '2020-06-29');

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

--
-- Volcado de datos para la tabla `ubicacion`
--

INSERT INTO `ubicacion` (`ID_Ubicacion`, `estado`, `municipio`, `parroquia`, `direccion`, `aleatorio`) VALUES
(58, 'apure', 'muoz', 'bruzual', 'xxxxxxxxxxxxxx', 679132804),
(59, 'apure', 'muoz', 'bruzual', 'xxxxxxxxxxxxxx', 897689926),
(60, 'apure', 'muoz', 'bruzual', 'xxxxxxxxxxxxxx', 370525825),
(61, 'barinas', 'antoniojosedesucre', 'nicolspulido', 'rerdfd', 319650621);

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
(1, 1, '$2y$10$KZTPLA0lzVNH.U76iHBAIus2SM1UORC9a1cMTILBKX4gDysPkD4Z2');

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
  ADD PRIMARY KEY (`ID_Fallo`);

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
  MODIFY `ID_Afiliado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `fallos`
--
ALTER TABLE `fallos`
  MODIFY `ID_Fallo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT de la tabla `ubicacion`
--
ALTER TABLE `ubicacion`
  MODIFY `ID_Ubicacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `ID_Usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
