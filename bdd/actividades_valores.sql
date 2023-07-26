-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 26-07-2023 a las 20:21:11
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
-- Base de datos: `estudio`
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
(1, 'Urbano Infantil (9 a 11 años) - Miércoles', 10000, 8000, 15000, 12000),
(2, 'Canto Adolescente 2 (12 a 17 años) - Miércoles', 5000, 3000, 7000, 6000);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
