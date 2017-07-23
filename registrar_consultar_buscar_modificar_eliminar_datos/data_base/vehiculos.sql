-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 27-05-2013 a las 14:28:58
-- Versión del servidor: 5.5.8
-- Versión de PHP: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `prueba_aytweb`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vehiculos`
--

CREATE TABLE IF NOT EXISTS `vehiculos` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `modelo` varchar(20) NOT NULL,
  `nombre` varchar(150) NOT NULL,
  `marca` varchar(150) NOT NULL,
  `placa` varchar(15) NOT NULL,
  `color` varchar(50) NOT NULL,
  `ciudad` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Volcar la base de datos para la tabla `vehiculos`
--

INSERT INTO `vehiculos` (`id`, `modelo`, `nombre`, `marca`, `placa`, `color`, `ciudad`) VALUES
(1, '1999', 'Spark', 'Chevrolet', '987NJG', 'Yellow', 'Cali'),
(4, '2011', 'Sentra', 'Nissan', '987HJI', 'Blanco', 'Popayan');
