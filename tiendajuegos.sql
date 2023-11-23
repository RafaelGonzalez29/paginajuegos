-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 23-11-2023 a las 23:07:24
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
-- Base de datos: `tiendajuegos`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `id` int(10) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `estado` int(10) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id`, `nombre`, `estado`) VALUES
(1, 'Accion', 1),
(2, 'Aventuras', 1),
(3, 'FPS', 1),
(4, 'RPG', 1),
(5, 'Indie', 1),
(6, 'Estrategia', 1),
(7, 'Carreras', 1),
(8, 'Lucha', 1),
(9, 'Deporte', 1),
(10, 'MMO', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `apellidos` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `telefono` varchar(15) NOT NULL,
  `comentario` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalles_pedidos`
--

CREATE TABLE `detalles_pedidos` (
  `id` int(11) NOT NULL,
  `pedido_id` int(11) NOT NULL,
  `juego_id` int(11) DEFAULT NULL,
  `titulo` varchar(255) DEFAULT NULL,
  `precio` decimal(10,2) DEFAULT NULL,
  `cantidad` int(11) DEFAULT NULL,
  `estado` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `detalles_pedidos`
--

INSERT INTO `detalles_pedidos` (`id`, `pedido_id`, `juego_id`, `titulo`, `precio`, `cantidad`, `estado`) VALUES
(57, 66, 10, 'MONSTER HUNTER RISE ', 23.00, 1, 1),
(58, 66, 9, 'HOLLOW KNIGHT', 14.00, 1, 1),
(59, 66, 13, 'NEED FOR SPEED RIVALS', 13.00, 1, 1),
(60, 66, 13, 'NEED FOR SPEED RIVALS', 13.00, 1, 1),
(61, 67, 4, 'FIFA 24', 25.44, 1, 1),
(62, 67, 4, 'FIFA 24', 25.44, 1, 1),
(63, 68, 7, 'DRAGON BALL: XENOVERSE ', 3.00, 1, 1),
(64, 68, 10, 'MONSTER HUNTER RISE ', 23.00, 1, 1),
(65, 68, 6, 'MORTAL KOMBAT 11 ', 22.00, 1, 1),
(66, 68, 6, 'MORTAL KOMBAT 11 ', 22.00, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `juegos`
--

CREATE TABLE `juegos` (
  `id_juego` int(11) NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `descripcion` varchar(255) NOT NULL,
  `id_categoria` int(11) NOT NULL,
  `foto` varchar(200) NOT NULL,
  `precio` decimal(10,2) NOT NULL,
  `fecha` date NOT NULL,
  `estado` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `juegos`
--

INSERT INTO `juegos` (`id_juego`, `titulo`, `descripcion`, `id_categoria`, `foto`, `precio`, `fecha`, `estado`) VALUES
(1, 'GEARS 5', 'gears 5 ultimate edition ', 1, 'lzpLWGhogdx5UPfbbnYbh3HSNciTg12ZXBetbBcv3yY_350x200_1x-0.jpeg', 35.00, '2023-11-06', 1),
(4, 'FIFA 24', 'fifa 24', 9, 'iQnKhzUFz_oq1G-fm0rAJO_0dYd_g29ESxMyrGkNDa4_350x200_1x-0.jpg', 25.44, '2023-11-10', 1),
(5, 'HORIZON ZERO DAWN ', 'Horizon Zero Dawn: Edición Completa se destaca entre los juegos contemporáneos por su entorno único y original que combina elementos de ciencia ficción, post-apocalipsis y explora los temas del tribalismo', 1, 'cfp1c3QENHakdjuf424Yt6hVn_mmFbOV-M8rITUoVj8_350x200_1x-0.jpeg', 19.00, '2023-11-23', 0),
(6, 'MORTAL KOMBAT 11 ', 'La franquicia MK es conocida por su modo historia, que se encuentra en cada juego. Por supuesto, Mortal Kombat 11 no es diferente, ya que proporciona un seguimiento de la historia de dicho juego. ', 8, '94BY1T7noGspA1q8TkGtsy8TJ6shJ2pYFx9crJ1gPNg_350x200_1x-0.jpeg', 22.00, '2023-11-23', 1),
(7, 'DRAGON BALL: XENOVERSE ', 'Sumérgete en el universo de Dragon Ball una vez más, esta vez creando tu propio personaje y haciendo todo lo posible para que se mezcle entre los ya conocidos héroes y villanos de la seire en Dragon Ball: Xenoverse.', 8, 'pXaaVZb_350x200_1x-0.jpg', 3.00, '2023-11-23', 1),
(8, 'RESIDENT EVIL 2', 'The genre-defining masterpiece Resident Evil 2 returns, completely rebuilt from the ground up for a deeper narrative experience. Using Capcom’s proprietary RE Engine', 1, 'd-0A667uqH9bqF2450s0mMfPWBJCWipL8UOKVPPogvc_350x200_1x-0.jpg', 27.00, '2023-11-23', 0),
(9, 'HOLLOW KNIGHT', 'Buy Hollow Knight key and uncover a massive world!! Unlike a lot of Indie games, this one won’t be finished in a few hours, as only exploring the whole world is bound to take you days! ', 2, 'q7i-msiKJw8A73IeLKtYuwpr0ilw62NWSVQIFD0GbB0_350x200_1x-0.jpeg', 14.00, '2023-11-23', 1),
(10, 'MONSTER HUNTER RISE ', '¡Prepárate para los retos y la caza! Monster Hunter Rise PC Código de Steam es la nueva entrega de la premiada serie clásica del estudio \"Capcom\"', 2, 'IX3zvbjl5zO5UJF8ENS_XMe0V7a7JjF_UubfCkeD2oA_350x200_1x-0.jpeg', 23.00, '2023-11-23', 1),
(11, 'CALL OF DUTY: MW3', '\r\nCall of Duty: Ghosts ofrece muchos modos multijugador ya conocidos, ¡así como nuevos retos a los que plantar cara! Nuevos mapas, nuevas armas, nuevos niveles de destrucción, y una intensa y excitante formación de pelotón están disponibles.', 1, 'hEBD9J8_350x200_1x-0.webp', 58.00, '2023-11-23', 1),
(12, 'NEED FOR SPEED™ UNBOUND PALACE ', 'Compra* Need for Speed™ Unbound Palace Edition y consigue contenido de Palace exclusivo que incluye 4 coches personalizados impresionantemente intensos, efectos de conducción, artículos estéticos, pack de ropa... y eso es solo el principio.', 7, 'cqpk87UWTEi8jDlPHc1AViq7ptilu7lcSUfH0TY2bXg_350x200_1x-0.webp', 32.00, '2023-11-23', 0),
(13, 'NEED FOR SPEED RIVALS', 'Buy Need for Speed: Most Wanted Origin key today and start your journey!', 7, '4TL8Lsr_350x200_1x-0.jpg', 13.00, '2023-11-23', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedidos`
--

CREATE TABLE `pedidos` (
  `id` int(11) NOT NULL,
  `cliente_nombre` varchar(255) NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `fecha` datetime NOT NULL,
  `estado` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `pedidos`
--

INSERT INTO `pedidos` (`id`, `cliente_nombre`, `total`, `fecha`, `estado`) VALUES
(66, 'sebbita.z', 50.00, '2023-11-23 10:53:14', 1),
(67, 'r9luiss', 25.44, '2023-11-23 10:56:37', 1),
(68, 'dannaban25', 48.00, '2023-11-23 10:58:23', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nombre_usuario` varchar(100) NOT NULL,
  `clave` varchar(255) NOT NULL,
  `imagen` varchar(255) NOT NULL DEFAULT 'enebian.png',
  `rol_id` int(11) NOT NULL DEFAULT 1,
  `estado` int(11) NOT NULL DEFAULT 1,
  `carrito` varchar(255) DEFAULT NULL,
  `indice` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre_usuario`, `clave`, `imagen`, `rol_id`, `estado`, `carrito`, `indice`) VALUES
(11, 'Admin', '1234', 'enebian.png', 2, 1, NULL, NULL),
(12, 'rafael', 'ECSAN', 'enebian.png', 2, 1, NULL, NULL),
(15, 'r9luiss', 'generica393', 'enebian.png', 1, 1, NULL, NULL),
(16, 'matiii_okks', 'matiiiios', 'enebian.png', 1, 1, NULL, NULL),
(17, 'sebbita.z', 'assadasd', 'enebian.png', 1, 1, NULL, NULL),
(18, 'dannaban25', 'clave123', 'enebian.png', 1, 1, NULL, NULL),
(19, 'yung_marieeee', 'clavevalida', 'enebian.png', 1, 1, NULL, NULL);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `detalles_pedidos`
--
ALTER TABLE `detalles_pedidos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pedido_id` (`pedido_id`);

--
-- Indices de la tabla `juegos`
--
ALTER TABLE `juegos`
  ADD PRIMARY KEY (`id_juego`),
  ADD KEY `id_categoria` (`id_categoria`);

--
-- Indices de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `detalles_pedidos`
--
ALTER TABLE `detalles_pedidos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT de la tabla `juegos`
--
ALTER TABLE `juegos`
  MODIFY `id_juego` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `detalles_pedidos`
--
ALTER TABLE `detalles_pedidos`
  ADD CONSTRAINT `detalles_pedidos_ibfk_1` FOREIGN KEY (`pedido_id`) REFERENCES `pedidos` (`id`);

--
-- Filtros para la tabla `juegos`
--
ALTER TABLE `juegos`
  ADD CONSTRAINT `juegos_ibfk_1` FOREIGN KEY (`id_categoria`) REFERENCES `categorias` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
