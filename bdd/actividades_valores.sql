-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 27-02-2024 a las 19:02:32
-- Versión del servidor: 10.4.25-MariaDB
-- Versión de PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `estudio2`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `actividades_valores`
--

CREATE TABLE `actividades_valores` (
  `id` int(11) NOT NULL,
  `actividad` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `una_vez` int(11) NOT NULL,
  `una_vez_efec` int(11) NOT NULL,
  `dos_veces` int(11) NOT NULL,
  `dos_veces_efec` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `actividades_valores`
--

INSERT INTO `actividades_valores` (`id`, `actividad`, `una_vez`, `una_vez_efec`, `dos_veces`, `dos_veces_efec`) VALUES
(1, 'Kids Dance I', 0, 0, 0, 0),
(2, 'Kids Dance II', 0, 0, 0, 0),
(3, 'Urbano Kids I', 0, 0, 0, 0),
(4, 'Urbano Kids II', 0, 0, 0, 0),
(5, 'Urbano Infantil I', 0, 0, 0, 0),
(6, 'Urbano Infantil II', 0, 0, 0, 0),
(7, 'Street Jazz', 0, 0, 0, 0),
(8, 'Coreo Teens Pricipiante', 0, 0, 0, 0),
(9, 'Coreo Teens Prin/Inter', 0, 0, 0, 0),
(10, 'Coreo Teens Intermedio', 0, 0, 0, 0),
(11, 'Coreo Adulto I', 0, 0, 0, 0),
(12, 'Coreo Adulto II', 0, 0, 0, 0),
(13, 'Coreo Adulto III', 0, 0, 0, 0),
(14, 'Teatro Infantil I', 0, 0, 0, 0),
(15, 'Teatro Infantil II', 0, 0, 0, 0),
(16, 'Teatro Adolescente I', 0, 0, 0, 0),
(17, 'Teatro Adolescente II', 0, 0, 0, 0),
(18, 'Teatro Adulto', 0, 0, 0, 0),
(19, 'Canto Infantil I', 0, 0, 0, 0),
(20, 'Canto Infantil II', 0, 0, 0, 0),
(21, 'Canto Adolescente I', 0, 0, 0, 0),
(22, 'Canto Adolescente II', 0, 0, 0, 0),
(23, 'Canto Adulto I', 0, 0, 0, 0),
(24, 'Canto Adulto II', 0, 0, 0, 0),
(25, 'Comedia Kids I', 0, 0, 0, 0),
(26, 'Comedia Kids II', 0, 0, 0, 0),
(27, 'Comedia Inf. Principiante', 0, 0, 0, 0),
(28, 'Comedia Inf. Avanzado', 0, 0, 0, 0),
(29, 'Comedia Adolescente', 0, 0, 0, 0),
(30, 'Comedia Adulto', 0, 0, 0, 0);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `actividades_valores`
--
ALTER TABLE `actividades_valores`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `actividades_valores`
--
ALTER TABLE `actividades_valores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
