-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 03-08-2014 a las 20:21:35
-- Versión del servidor: 5.5.38-0ubuntu0.14.04.1
-- Versión de PHP: 5.5.9-1ubuntu4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `frisby_dev`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fb_encuesta`
--

CREATE TABLE IF NOT EXISTS `fb_encuesta` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `nombre_encuestador` varchar(255) DEFAULT NULL,
  `cedula_encuestador` varchar(255) DEFAULT NULL,
  `genero` varchar(255) DEFAULT NULL,
  `edad` varchar(255) DEFAULT NULL,
  `telefono` varchar(255) DEFAULT NULL,
  `Folio` varchar(255) DEFAULT NULL,
  `ciudad` varchar(255) DEFAULT NULL,
  `punto` varchar(255) DEFAULT NULL,
  `grabacion` varchar(255) NOT NULL,
  `fecha_aplicacion` varchar(255) NOT NULL,
  `dia` varchar(255) DEFAULT NULL,
  `mes` varchar(255) DEFAULT NULL,
  `anio` varchar(255) DEFAULT NULL,
  `rol` varchar(255) DEFAULT NULL,
  `actitud` varchar(255) DEFAULT NULL,
  `p1` varchar(255) DEFAULT NULL,
  `p2` varchar(255) DEFAULT NULL,
  `p3` varchar(255) DEFAULT NULL,
  `p4` varchar(255) DEFAULT NULL,
  `p5` varchar(255) DEFAULT NULL,
  `p6` varchar(255) DEFAULT NULL,
  `p7` varchar(255) DEFAULT NULL,
  `observacion_fila` varchar(255) DEFAULT NULL,
  `caja` varchar(255) DEFAULT NULL,
  `p8` varchar(255) DEFAULT NULL,
  `p9` varchar(255) DEFAULT NULL,
  `p10` varchar(255) DEFAULT NULL,
  `p11` varchar(255) DEFAULT NULL,
  `p12` varchar(255) DEFAULT NULL,
  `p13` varchar(255) DEFAULT NULL,
  `p14` varchar(255) DEFAULT NULL,
  `p15` varchar(255) DEFAULT NULL,
  `p16` varchar(255) DEFAULT NULL,
  `observacion_pedido` varchar(255) DEFAULT NULL,
  `p17` varchar(255) DEFAULT NULL,
  `p18` varchar(255) DEFAULT NULL,
  `p19` varchar(255) DEFAULT NULL,
  `p20` varchar(255) DEFAULT NULL,
  `p21` varchar(255) DEFAULT NULL,
  `p22` varchar(255) DEFAULT NULL,
  `p23` varchar(255) DEFAULT NULL,
  `observacion_complementario` varchar(255) DEFAULT NULL,
  `sugerencias` varchar(255) DEFAULT NULL,
  `supervisor` varchar(255) DEFAULT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `fb_encuesta`
--

INSERT INTO `fb_encuesta` (`id`, `nombre_encuestador`, `cedula_encuestador`, `genero`, `edad`, `telefono`, `Folio`, `ciudad`, `punto`, `grabacion`, `fecha_aplicacion`, `dia`, `mes`, `anio`, `rol`, `actitud`, `p1`, `p2`, `p3`, `p4`, `p5`, `p6`, `p7`, `observacion_fila`, `caja`, `p8`, `p9`, `p10`, `p11`, `p12`, `p13`, `p14`, `p15`, `p16`, `observacion_pedido`, `p17`, `p18`, `p19`, `p20`, `p21`, `p22`, `p23`, `observacion_complementario`, `sugerencias`, `supervisor`, `timestamp`) VALUES
(1, NULL, NULL, NULL, NULL, NULL, '234', 'BOGOTA', 'PUNTO1', '1', '2014-6-5 9:45:52', '2014', '6', '5', '1', '1', '', '1', '1', '1', '1', '1', '1', '', '1', '1', '1', '8', '8', '8', '8', '1', '1', '1', '', '1', '1', '1', '1', '1', '1', '1', '', '', '', '2014-07-18 14:46:41'),
(2, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2014-07-18 14:52:16'),
(3, 'asd', 'asd', 'M', 'asd', 'asd', 'asd', 'BOGOTA', 'PUNTO1', '1', '2014-6-5 9:52:51', '2014', '6', '5', '1', '1', '', '1', '1', '1', '1', '1', '1', '', '1', '1', '1', '8', '8', '8', '8', '1', '1', '1', '', '1', '1', '1', '1', '1', '1', '1', '', '', '', '2014-07-18 14:52:53');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
