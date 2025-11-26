-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 02-11-2025 a las 21:03:56
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `escuela_digital`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias_documentos`
--

CREATE TABLE `categorias_documentos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `categorias_documentos`
--

INSERT INTO `categorias_documentos` (`id`, `nombre`) VALUES
(1, 'Docentes'),
(2, 'Estudiantes'),
(3, 'Instructivos'),
(4, 'Cartas'),
(5, 'PDFs'),
(6, 'Fotos y Videos'),
(7, 'Rude/Boletines');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `documentos`
--

CREATE TABLE `documentos` (
  `id` int(11) NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `descripcion` text DEFAULT NULL,
  `fecha_subida` datetime DEFAULT current_timestamp(),
  `archivo_path` varchar(255) NOT NULL,
  `tipo_archivo` varchar(20) DEFAULT NULL,
  `categoria_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `documentos`
--

INSERT INTO `documentos` (`id`, `titulo`, `descripcion`, `fecha_subida`, `archivo_path`, `tipo_archivo`, `categoria_id`) VALUES
(1, 'Nuevo', 'Libro', '2025-10-25 15:40:56', 'documentos/Documento de prueba.pdf', 'pdf', 1),
(2, 'Nuevo Libro 2', 'Libro de matematicas', '2025-10-25 15:46:09', 'documentos/Doc de prueba 2.pdf', 'pdf', 1),
(3, 'Kardex', 'Notas finales', '2025-10-25 15:47:00', 'documentos/Doc de prueba 3.pdf', 'pdf', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categorias_documentos`
--
ALTER TABLE `categorias_documentos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `documentos`
--
ALTER TABLE `documentos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categorias_documentos`
--
ALTER TABLE `categorias_documentos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `documentos`
--
ALTER TABLE `documentos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
