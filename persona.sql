-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 27-02-2018 a las 19:06:04
-- Versión del servidor: 10.1.28-MariaDB
-- Versión de PHP: 7.1.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `persona`
--
CREATE DATABASE IF NOT EXISTS `persona` DEFAULT CHARACTER SET utf8 COLLATE utf8_spanish_ci;
USE `persona`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `persona`
--

CREATE TABLE `persona` (
  `nom` varchar(15) COLLATE utf8_spanish_ci NOT NULL,
  `cognom` varchar(15) COLLATE utf8_spanish_ci NOT NULL,
  `dob` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `id` int(3) NOT NULL,
  `sexe` varchar(12) COLLATE utf8_spanish_ci NOT NULL,
  `altura` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `persona`
--

INSERT INTO `persona` (`nom`, `cognom`, `dob`, `id`, `sexe`, `altura`) VALUES
('dfd', 'hola', '23/11/1994', 1, '', 0),
('Xavier', 'BaÃ±os', '23/11/1994', 2, '', 0),
('Manolo', 'blani', '23/11/1994', 3, '', 0),
('Manolo', 'blani', '23/11/1994', 4, '', 0),
('Montse', 'Madridejos', '20/11/1980', 9, '', 0),
('Montse', 'Madridejos', '20/11/1980', 10, '', 0);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `persona`
--
ALTER TABLE `persona`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `persona`
--
ALTER TABLE `persona`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
