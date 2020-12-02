-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 23-11-2020 a las 11:38:02
-- Versión del servidor: 5.7.19
-- Versión de PHP: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `automotora`
--
CREATE DATABASE IF NOT EXISTS `automotora` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `automotora`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `arriendos`
--

CREATE TABLE IF NOT EXISTS `arriendos` (
  `numero_arr` int(5) NOT NULL AUTO_INCREMENT,
  `rut_arr` varchar(12) NOT NULL,
  `nombre_arr` varchar(30) NOT NULL,
  `patente_arr` varchar(12) NOT NULL,
  `costo_arr` int(7) NOT NULL,
  `dias_arr` int(5) NOT NULL,
  `observacion_arr` text NOT NULL,
  `formapago_arr` varchar(15) NOT NULL,
  `fecha_arr` date NOT NULL,
  `total_arr` int(7) NOT NULL,
  PRIMARY KEY (`numero_arr`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `arriendos`
--

INSERT INTO `arriendos` (`numero_arr`, `rut_arr`, `nombre_arr`, `patente_arr`, `costo_arr`, `dias_arr`, `observacion_arr`, `formapago_arr`, `fecha_arr`, `total_arr`) VALUES
(1, '11.111.111-1', 'Juan Perez', 'BBBB11', 12000, 3, 'Auto full equipo', 'Cheque', '2011-06-12', 36000),
(2, '22.222.222-2', 'Maria Soto', 'CCCC22', 10000, 2, 'Auto con ABS', 'Efectivo', '2011-10-05', 20000);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `automovil`
--

CREATE TABLE IF NOT EXISTS `automovil` (
  `patente` varchar(8) NOT NULL,
  `marca` varchar(30) NOT NULL,
  `modelo` varchar(12) NOT NULL,
  PRIMARY KEY (`patente`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `automovil`
--

INSERT INTO `automovil` (`patente`, `marca`, `modelo`) VALUES
('BBBB11', 'Hyundai', 'Santa Fe'),
('CCCC22', 'Nissan', 'Xtrail');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
