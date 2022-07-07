-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 07-07-2022 a las 16:29:07
-- Versión del servidor: 5.7.36
-- Versión de PHP: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `employee_task`
--
CREATE DATABASE IF NOT EXISTS `employee_task` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `employee_task`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `books`
--

DROP TABLE IF EXISTS `books`;
CREATE TABLE IF NOT EXISTS `books` (
  `id` int(11) NOT NULL,
  `title` varchar(500) NOT NULL,
  `owner_id` int(11) NOT NULL,
  `author_id` int(11) NOT NULL,
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `books`
--

INSERT INTO `books` (`id`, `title`, `owner_id`, `author_id`) VALUES
(1, 'El viejo y el Mar', 7, 1),
(2, 'Por quien doblan las Campanas', 7, 1),
(3, 'La Edad de Oro', 8, 2),
(8, '20 Leguas de viaje submarino', 7, 4),
(9, 'De la Tierra a la Luna', 7, 4),
(10, 'La estrella del sur', 6, 4),
(11, 'La vuelta al mundo en 80 días', 6, 4),
(21, 'Crimen en el expreso oriente', 7, 5),
(22, 'Hércules Poirot', 8, 5),
(23, 'El perro azul', 1, 7),
(24, 'La casa vieja', 4, 7),
(25, 'El hombre al que le ladraban los perros', 4, 8),
(26, 'La noche de venecia', 2, 7),
(35, 'La hojarasca', 7, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `people`
--

DROP TABLE IF EXISTS `people`;
CREATE TABLE IF NOT EXISTS `people` (
  `id` int(11) NOT NULL,
  `name` varchar(500) NOT NULL,
  `age` int(11) NOT NULL,
  `boss_id` int(11) NOT NULL,
  `favorite_author_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `people`
--

INSERT INTO `people` (`id`, `name`, `age`, `boss_id`, `favorite_author_id`) VALUES
(1, 'Ernes Hemigway', 67, 0, 0),
(2, 'José Martí', 42, 0, 0),
(4, 'Julio Verne', 46, 0, 0),
(5, 'Agatha Christie', 56, 0, 0),
(6, 'Marcos Perez', 23, 0, 0),
(7, 'Carlos Tellez', 34, 0, 0),
(8, 'Camila Cabello', 21, 0, 0),
(9, 'Martha Diaz', 67, 0, 0);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
