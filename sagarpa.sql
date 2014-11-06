-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 05-11-2014 a las 21:25:08
-- Versión del servidor: 5.6.17
-- Versión de PHP: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `sagarpa`
--

DELIMITER $$
--
-- Procedimientos
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `GetAllAutos`()
BEGIN
SELECT * FROM vehiculo;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `GetAllUsers`()
BEGIN
   SELECT *  FROM usuarios;
   END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mantenimiento`
--

CREATE TABLE IF NOT EXISTS `mantenimiento` (
  `id_Mantenimiento` int(10) NOT NULL AUTO_INCREMENT,
  `tipo_Mantenimiento` varchar(20) NOT NULL,
  `costo` varchar(8) NOT NULL,
  `fecha` varchar(10) NOT NULL,
  `id_Vehiculo` int(10) NOT NULL,
  `id_Taller` int(10) NOT NULL,
  PRIMARY KEY (`id_Mantenimiento`,`id_Vehiculo`,`id_Taller`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=22 ;

--
-- Volcado de datos para la tabla `mantenimiento`
--

INSERT INTO `mantenimiento` (`id_Mantenimiento`, `tipo_Mantenimiento`, `costo`, `fecha`, `id_Vehiculo`, `id_Taller`) VALUES
(1, 'Preventivo', '2500', '2015-01-10', 0, 0),
(2, 'Correctivo', '800', '2014-15-10', 3, 2),
(3, 'Preventivo', '8500', '2014-18-10', 2, 3),
(4, 'Correctivo', '800', '2014-20-10', 3, 2),
(16, 'Correctivo', '700', '2014-25-10', 1, 7),
(17, 'Preventivo', '1230', '2014-22-10', 7, 1),
(18, '', '', '', 0, 0),
(19, '', '', '', 0, 0),
(20, '', '', '', 0, 0),
(21, '', '', '', 0, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `perfil`
--

CREATE TABLE IF NOT EXISTS `perfil` (
  `id_Perfil` int(11) NOT NULL AUTO_INCREMENT,
  `id_Usuario` int(10) NOT NULL,
  `foto` text,
  `nombres` varchar(40) DEFAULT NULL,
  `apellido_Paterno` varchar(40) DEFAULT NULL,
  `apellido_Materno` varchar(40) DEFAULT NULL,
  `puesto_Laboral` varchar(45) DEFAULT NULL,
  `cader` varchar(30) DEFAULT NULL,
  `ddr` varchar(30) DEFAULT NULL,
  `delegacion` varchar(20) DEFAULT NULL,
  `telefono_Ext` int(8) DEFAULT NULL,
  PRIMARY KEY (`id_Perfil`),
  UNIQUE KEY `usuario_id` (`id_Usuario`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=25 ;

--
-- Volcado de datos para la tabla `perfil`
--

INSERT INTO `perfil` (`id_Perfil`, `id_Usuario`, `foto`, `nombres`, `apellido_Paterno`, `apellido_Materno`, `puesto_Laboral`, `cader`, `ddr`, `delegacion`, `telefono_Ext`) VALUES
(23, 5, '', '', '', '', '', '', '', '', 0),
(24, 6, '', '', '', '', '', '', '', '', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `taller`
--

CREATE TABLE IF NOT EXISTS `taller` (
  `id_Taller` int(10) NOT NULL AUTO_INCREMENT,
  `nombre_Taller` varchar(20) NOT NULL,
  `direccion` varchar(50) NOT NULL,
  `codigo_Postal` varchar(5) NOT NULL,
  `telefono_Taller` varchar(15) NOT NULL,
  `estado` varchar(10) NOT NULL,
  PRIMARY KEY (`id_Taller`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `taller`
--

INSERT INTO `taller` (`id_Taller`, `nombre_Taller`, `direccion`, `codigo_Postal`, `telefono_Taller`, `estado`) VALUES
(1, 'El Genio', 'Calle Patoni, entre Av. 20 de Noviembre entre 5 de', '34000', '8-25-26-13', 'Durango');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `id_Usuario` int(10) NOT NULL AUTO_INCREMENT,
  `usuario` varchar(20) NOT NULL,
  `contrasenia` varchar(64) NOT NULL,
  `es_Admin` tinyint(1) NOT NULL,
  `correo_electronico` varchar(50) NOT NULL,
  PRIMARY KEY (`id_Usuario`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_Usuario`, `usuario`, `contrasenia`, `es_Admin`, `correo_electronico`) VALUES
(3, 'jesus', '894dadaac0c736dd8be2c44316a93726', 1, 'jesuz@sagarpa.gob.mx'),
(5, 'juan', 'e10adc3949ba59abbe56e057f20f883e', 0, 'e@fbi.gov.us'),
(6, 'elisa', 'e10adc3949ba59abbe56e057f20f883e', 1, 'elizita@sagarpa.gob.mx');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vehiculo`
--

CREATE TABLE IF NOT EXISTS `vehiculo` (
  `id_Vehiculo` int(10) NOT NULL AUTO_INCREMENT,
  `marca` varchar(20) NOT NULL,
  `tipo` varchar(20) NOT NULL,
  `modelo` varchar(4) NOT NULL,
  `placa` varchar(10) NOT NULL,
  `num_Serie` varchar(16) NOT NULL,
  `id_Usuario` int(10) NOT NULL,
  PRIMARY KEY (`id_Vehiculo`,`id_Usuario`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Volcado de datos para la tabla `vehiculo`
--

INSERT INTO `vehiculo` (`id_Vehiculo`, `marca`, `tipo`, `modelo`, `placa`, `num_Serie`, `id_Usuario`) VALUES
(12, 'Pontiac', 'GTO', '1968', 'ABC-54-56', '12345678', 3);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `perfil`
--
ALTER TABLE `perfil`
  ADD CONSTRAINT `perfil_ibfk_1` FOREIGN KEY (`id_Usuario`) REFERENCES `usuarios` (`id_Usuario`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
