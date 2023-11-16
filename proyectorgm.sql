-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 27-10-2023 a las 09:54:00
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `proyectorgm`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE `categoria` (
  `id` int(11) NOT NULL,
  `nombre` text DEFAULT NULL,
  `fecha_crea` datetime DEFAULT NULL,
  `estado` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`id`, `nombre`, `fecha_crea`, `estado`) VALUES
(1, 'minuto de Dios', '2023-06-01 18:25:17', 1),
(2, 'basicas', '2023-06-01 17:06:21', 1),
(3, 'profesional', '2023-06-01 18:25:17', 1),
(4, 'electiva ', '2023-06-01 17:06:21', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cursos`
--

CREATE TABLE `cursos` (
  `cur_id` int(11) NOT NULL,
  `id_categoria` int(11) DEFAULT NULL,
  `curso` text DEFAULT NULL,
  `descripcion` text DEFAULT NULL,
  `fecha_ini` date DEFAULT NULL,
  `fecha_fin` date DEFAULT NULL,
  `profesor` int(11) DEFAULT NULL,
  `fecha_crea` datetime DEFAULT NULL,
  `estado` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `cursos`
--

INSERT INTO `cursos` (`cur_id`, `id_categoria`, `curso`, `descripcion`, `fecha_ini`, `fecha_fin`, `profesor`, `fecha_crea`, `estado`) VALUES
(1, 2, 'ingles-1', 'Aprenda ingles y complementaria.', '2023-06-01', '2023-11-24', 1, '2023-05-01 10:34:48', 1),
(2, 2, 'Ingles-2', 'Aprenda ingles-2 y complementaria.', '2023-06-01', '2023-11-24', 2, '2023-05-01 17:06:21', 1),
(3, 1, 'Proyecto de vida', 'Aprenda como convivir y pensar a futuro.', '2023-06-01', '2023-11-24', 3, '2023-05-01 10:40:13', 1),
(4, 1, 'Emprendimiento', 'Aprenda para vida diaria.', '2023-06-01', '2023-11-24', 4, '2023-05-01 10:40:13', 1),
(5, 3, 'Programación básica', 'Aprenda los fundamentos básicos de programación.', '2023-06-01', '2023-11-24', 5, '2023-05-01 10:40:13', 1),
(6, 3, 'Programación orientada a objetos', 'Aprenda a programar objetos.', '2023-06-01', '2023-11-24', 6, '2023-05-01 10:40:13', 1),
(7, 4, 'Electiva cmd', 'Elija un curso.', '2023-05-01', '2023-11-24', 7, '2023-05-01 10:40:13', 1),
(8, 4, 'Electiva cpc', 'Elegie tu electiva a gusto.', '2023-06-01', '2023-11-24', 8, '2023-05-01 10:40:13', 1),
(9, 3, 'Programación orientada a objetos', 'afwagfawa', '2023-08-01', '2023-11-30', 1, '2023-08-31 19:17:11', 1),
(10, 3, 'Programación orientada a objetos', 'wafawfawf', '2023-08-01', '2023-11-30', 1, '2023-08-31 19:17:11', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `curso_usuario`
--

CREATE TABLE `curso_usuario` (
  `curusu_id` int(11) NOT NULL,
  `id_curso` int(11) DEFAULT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  `fecha_crea` datetime DEFAULT NULL,
  `estado` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `curso_usuario`
--

INSERT INTO `curso_usuario` (`curusu_id`, `id_curso`, `id_usuario`, `fecha_crea`, `estado`) VALUES
(1, 8, 771498, '2023-06-01 18:25:17', 1),
(2, 2, 771499, '2023-06-01 18:25:17', 1),
(3, 3, 771499, '2023-06-01 18:25:17', 1),
(4, 2, 771498, '2023-06-01 18:25:17', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `instructor`
--

CREATE TABLE `instructor` (
  `inst_id` int(11) NOT NULL,
  `nombrei` text DEFAULT NULL,
  `ape_paternoi` text DEFAULT NULL,
  `ape_maternoi` text DEFAULT NULL,
  `correo` text DEFAULT NULL,
  `sexo` char(1) DEFAULT NULL,
  `telefono` text DEFAULT NULL,
  `fecha_crea` datetime DEFAULT NULL,
  `estado` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `instructor`
--

INSERT INTO `instructor` (`inst_id`, `nombrei`, `ape_paternoi`, `ape_maternoi`, `correo`, `sexo`, `telefono`, `fecha_crea`, `estado`) VALUES
(1, 'Marco Tulio', 'Sanchez', 'Espinoza', 'marco.espinoza@uniminuto.edu.co', 'M', '3210093323', '2023-06-01 18:25:17', 1),
(2, 'Juan Pablo', 'Gomez', 'Olivero', 'pablo.gomez@uniminuto.edu.co', 'M', '3118500582', '2023-06-01 17:06:21', 1),
(3, 'Mónica ', 'Olivero', 'Martinez', 'monica.martinez@uniminuto.edu.co', 'F', '3108997654', '2023-06-01 10:19:41', 1),
(4, 'Pablo', 'Hernandes', 'Ruiz', 'Pablo.hernandes@uniminuto.edu.co', 'M', '3114568777', '2023-06-01 10:19:41', 1),
(5, 'Johan Danilo', 'Mendoza', 'Triana', 'Johan.mendoza@uniminuto.edu.co', 'M', '3215446754', '2023-06-01 10:19:41', 1),
(6, 'Andrea', 'Gutiérrez', 'Jaramillo', 'Andrea.jaramillo1@uniminuto.edu.co', 'F', '3209754466', '2023-06-01 10:19:41', 1),
(7, 'Nicolás ', 'Velázquez', 'Mantillo', 'nicolas.mantillo@uniminuto.edu.co', 'M', '3227895532', '2023-06-01 10:19:41', 1),
(8, 'Lina Maria', 'Manrique', 'Mondes', 'lina.mondes@uniminuto.edu.co', 'F', '312457788', '2023-06-01 10:19:41', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `usu_id` int(11) NOT NULL,
  `nombre` text DEFAULT NULL,
  `ape_paterno` text DEFAULT NULL,
  `ape_materno` text DEFAULT NULL,
  `usu_correo` text DEFAULT NULL,
  `usu_pass` text DEFAULT NULL,
  `sexo` char(1) DEFAULT NULL,
  `telefono` text DEFAULT NULL,
  `rol_id` int(11) NOT NULL,
  `fecha_crea` datetime DEFAULT NULL,
  `estado` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`usu_id`, `nombre`, `ape_paterno`, `ape_materno`, `usu_correo`, `usu_pass`, `sexo`, `telefono`, `rol_id`, `fecha_crea`, `estado`) VALUES
(771498, 'Andres', 'Gonzaléz ', 'Martínez', 'andres868@hotmail.com', 'andres123', 'M', '6e46436343', 2, '2023-08-22 18:25:17', 1),
(771499, 'Rafael', 'Gonzaléz', 'Martínez', 'rafael@gmail.com', 'rafael123', 'M', '88875433', 1, '2023-06-01 18:25:17', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `cursos`
--
ALTER TABLE `cursos`
  ADD PRIMARY KEY (`cur_id`),
  ADD KEY `id_categoria` (`id_categoria`),
  ADD KEY `profesor` (`profesor`);

--
-- Indices de la tabla `curso_usuario`
--
ALTER TABLE `curso_usuario`
  ADD PRIMARY KEY (`curusu_id`),
  ADD KEY `id_curso` (`id_curso`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indices de la tabla `instructor`
--
ALTER TABLE `instructor`
  ADD PRIMARY KEY (`inst_id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`usu_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categoria`
--
ALTER TABLE `categoria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `cursos`
--
ALTER TABLE `cursos`
  MODIFY `cur_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `curso_usuario`
--
ALTER TABLE `curso_usuario`
  MODIFY `curusu_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `instructor`
--
ALTER TABLE `instructor`
  MODIFY `inst_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `usu_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=771501;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `cursos`
--
ALTER TABLE `cursos`
  ADD CONSTRAINT `cursos_ibfk_1` FOREIGN KEY (`id_categoria`) REFERENCES `categoria` (`id`),
  ADD CONSTRAINT `cursos_ibfk_2` FOREIGN KEY (`profesor`) REFERENCES `instructor` (`inst_id`);

--
-- Filtros para la tabla `curso_usuario`
--
ALTER TABLE `curso_usuario`
  ADD CONSTRAINT `curso_usuario_ibfk_1` FOREIGN KEY (`id_curso`) REFERENCES `cursos` (`cur_id`),
  ADD CONSTRAINT `curso_usuario_ibfk_2` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`usu_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
