-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 26-02-2024 a las 23:02:01
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

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alumnos`
--

CREATE TABLE `alumnos` (
  `id` int(11) NOT NULL,
  `alumno` varchar(255) COLLATE utf8_spanish_ci DEFAULT NULL,
  `apellido` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `nombre` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `foto_perfil` longblob NOT NULL,
  `fecha_nac` date DEFAULT current_timestamp(),
  `edad` int(11) NOT NULL,
  `nacionalidad` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `documento` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `domicilio` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `localidad` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `tel_fijo` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `tel_movil` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `mail` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `actividad` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `notas` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `salud` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `baja` int(11) NOT NULL DEFAULT 0,
  `debemes` int(11) NOT NULL DEFAULT 0,
  `info_deuda` varchar(255) COLLATE utf8_spanish_ci NOT NULL DEFAULT '',
  `observaciones` varchar(255) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `familiar`
--

CREATE TABLE `familiar` (
  `id` int(11) NOT NULL,
  `id_alumno` int(11) NOT NULL,
  `nombre_apellido` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `telefono` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `vinculo` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `observacion` varchar(255) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vinculos`
--

CREATE TABLE `vinculos` (
  `id` int(11) NOT NULL,
  `id_alumno` int(11) NOT NULL,
  `vinculo` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `debemes` int(11) NOT NULL DEFAULT 0,
  `info_deuda` varchar(255) COLLATE utf8_spanish_ci NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `actividades_valores`
--
ALTER TABLE `actividades_valores`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `alumnos`
--
ALTER TABLE `alumnos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `familiar`
--
ALTER TABLE `familiar`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `vinculos`
--
ALTER TABLE `vinculos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `actividades_valores`
--
ALTER TABLE `actividades_valores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `alumnos`
--
ALTER TABLE `alumnos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `familiar`
--
ALTER TABLE `familiar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `vinculos`
--
ALTER TABLE `vinculos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
