-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 01-07-2022 a las 21:25:35
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `navarro_milagros`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `id` int(11) NOT NULL,
  `categoria` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id`, `categoria`) VALUES
(1, 'perro'),
(2, 'gato');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `consultas`
--

CREATE TABLE `consultas` (
  `id` int(10) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `mensaje` varchar(300) NOT NULL,
  `contestado` varchar(2) NOT NULL DEFAULT 'NO'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `consultas`
--

INSERT INTO `consultas` (`id`, `nombre`, `email`, `mensaje`, `contestado`) VALUES
(3, 'Milagros', 'correo4@algo.com', 'colsulta prueba', 'SI'),
(4, 'alea', 'correo8@algo.com', 'otra consulta prueba', 'SI'),
(5, 'efi', 'correo4@algo.com', 'consulta consulta', 'SI'),
(6, 'Milagros', 'correo2@algo.com', 'consultaa consul', 'SI'),
(7, 'Milagros', 'correo6@algo.com', 'jgjfjf', 'SI'),
(8, 'ef', 'milagrosnavarro1d@gmail.com', 'yjgjyg', 'SI'),
(9, 'Mirian Rut', 'correo4@algo.com', 'JVJHGJH', 'SI'),
(10, 'YANINA', 'YANY@GMAIL.COM', 'PRESUPUESTO', 'SI'),
(11, 'khk', 'correohdp@gmail.com', '', 'NO');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `perfiles`
--

CREATE TABLE `perfiles` (
  `id` int(11) NOT NULL,
  `descripcion` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `perfiles`
--

INSERT INTO `perfiles` (`id`, `descripcion`) VALUES
(1, 'admin'),
(2, 'usuario');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id` int(11) NOT NULL,
  `nombre_prod` varchar(50) NOT NULL,
  `categoria_id` int(11) NOT NULL DEFAULT 2,
  `precio` double(7,2) NOT NULL,
  `precio_vta` double(7,2) NOT NULL,
  `stock` int(11) NOT NULL,
  `stock_min` int(11) NOT NULL,
  `imagen` varchar(50) NOT NULL,
  `eliminado` varchar(2) NOT NULL DEFAULT 'NO'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `nombre_prod`, `categoria_id`, `precio`, `precio_vta`, `stock`, `stock_min`, `imagen`, `eliminado`) VALUES
(21, 'Cama grande', 1, 2000.00, 3780.00, 6, 1, 'D_NQ_NP_652498-MLA31353571618_072019-O.webp', 'SI'),
(22, 'Cama Catre', 1, 2000.00, 50000.00, 10, 1, '1656641623_3008dc7ec0486ac875ce.webp', 'SI'),
(26, 'Cama grande', 1, 2000.00, 3780.00, 2, 1, '1656622101_daca8a7e9e52f84d50a9.webp', 'NO'),
(27, 'Cama grande', 1, 50000.00, 45677.00, 2, 1, '1656641928_db5bb691b19016f32d4b.webp', 'SI'),
(28, 'Cama grande', 1, 2000.00, 3780.00, 6, 1, '1656622069_14021b618851a76c5b91.jpg', 'SI'),
(29, 'Cama grande', 1, 2000.00, 3780.00, 0, 3, '1656622083_fc63c5394c08336bbe70.webp', 'NO'),
(30, 'Cama', 1, 2000.00, 2.70, 4, 1, '1656623242_a7bddcf42855978a65d0.jpg', 'SI'),
(31, 'Cama', 1, 1000.00, 70000.00, 37, 1, '1656639687_e59dc02721236d450fd4.jpg', 'NO'),
(32, 'Cama grande', 2, 6890.00, 12357.00, 0, 1, '1656626264_53069926050e0bad9066.jpg', 'SI'),
(33, 'cama', 2, 2143.00, 17890.00, 62, 7, '1656698737_338af9510cb19f13d681.jpg', 'NO'),
(34, 'COOMODO', 2, 46457.00, 24653.00, 7, 2, '1656703272_21763886a9332d800da8.jpg', 'NO');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `apellido` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `usuario` varchar(20) NOT NULL,
  `password` varchar(150) NOT NULL,
  `perfil_id` int(11) NOT NULL DEFAULT 2,
  `baja` varchar(11) DEFAULT 'NO'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `apellido`, `email`, `usuario`, `password`, `perfil_id`, `baja`) VALUES
(12, 'Milagros', 'Navarro ', 'correo6@algo.com', 'maria', '$2y$10$7LnIs7mADqQIv8EZa2Xxbe3x0YgflVEw3kQvhDedpBjstgY27lQQi', 1, 'NO'),
(13, 'efi', 'dos', 'correo8@algo.com', 'jasmin', '$2y$10$OdWu8cPksy13BDfMYVkGH.sw386GfX3ojDWTX7R3V0LL7oTK0ocEm', 2, 'NO'),
(14, 'efo', 'gomez', 'correo4@algo.com', 'luii', '$2y$10$kZEapoXm2/YsTde.agdsludHyE7y9i41IrUv9VhdKCwRKHAXyXfBC', 2, 'NO'),
(15, 'caro', 'pe', 'correo2@algo.com', 'la', '$2y$10$ygHS2DFl7ac8JsNKF.kap.zhp3IaPlO.V7dgJBpYApew0b8JuQuhW', 2, 'SI'),
(22, 'PGSFG', 'QEGRG', 'correohdp@gmail.com', 'rfgf', '$2y$10$xrRvR2BFBWVTjpw35.btdO4l8X9VDKUmHqrfRbwQvc4G.BDrOKXzC', 2, 'SI'),
(23, 'Milagros', 'Navarro ', 'correoa@algo.com', 'dgdfg', '$2y$10$QVkoKHuccAO0BcelNi5Xhuflt9pM9CtpH6R6o/enVnIoda3Tj.lDa', 2, 'SI'),
(24, 'Mirian Rut', 'gom', 'csjgfs@gmail.com', 'namii', '$2y$10$AS215F4yJeUmgETTcNnCfe5iP/hYU379bV/5RHIkPIcnXzeUIkoYW', 2, 'NO'),
(25, 'efi', 'Navarro ', 'correop@gmail.com', 'gjjhg', '$2y$10$BcJRYpDlDAXtkG5khaez8.kKh.upW2cC6X00/CTSC2zB38h0bcKLW', 2, 'NO'),
(26, 'fgffg', 'fsgf', 'correoh@gmail.com', 'fgdfg', '$2y$10$LTet5drKo/OETHE5dCpUJeurPX7MhhoeUG2Cryu./YiQYhyr6aqFC', 2, 'NO'),
(27, 'jfjfj', 'gomez', 'correopr@gmail.com', 'usuarioa', '$2y$10$TTz1K47BPN0LCrMJzIg/rOju7gSM/0KV70SR6ueU1WrrGiOT1DRnm', 2, 'NO');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventas_cabecera`
--

CREATE TABLE `ventas_cabecera` (
  `id_cabeza` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `usuario_id` int(11) NOT NULL,
  `total_venta` double(7,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `ventas_cabecera`
--

INSERT INTO `ventas_cabecera` (`id_cabeza`, `fecha`, `usuario_id`, `total_venta`) VALUES
(150, '2022-06-30', 12, 82357.00),
(151, '2022-06-30', 12, 70000.00),
(152, '2022-06-30', 12, 70000.00),
(153, '2022-06-30', 12, 45677.00),
(154, '2022-06-30', 12, 3780.00),
(155, '2022-07-01', 12, 70000.00),
(156, '2022-07-01', 12, 73780.00),
(157, '2022-07-01', 12, 73780.00),
(158, '2022-07-01', 12, 73780.00),
(159, '2022-07-01', 12, 73780.00),
(160, '2022-07-01', 27, 70000.00),
(161, '2022-07-01', 27, 70000.00),
(162, '2022-07-01', 27, 49457.00),
(163, '2022-07-01', 27, 70000.00),
(164, '2022-07-01', 27, 74171.00),
(165, '2022-07-01', 12, 99999.99),
(166, '2022-07-01', 27, 79675.00),
(167, '2022-07-01', 27, 97565.00),
(168, '2022-07-01', 27, 79675.00),
(169, '2022-07-01', 27, 61785.00),
(170, '2022-07-01', 27, 61785.00),
(171, '2022-07-01', 27, 61785.00),
(172, '2022-07-01', 27, 79675.00),
(173, '2022-07-01', 27, 61785.00),
(174, '2022-07-01', 27, 49428.00),
(175, '2022-07-01', 14, 35780.00);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventas_detalle`
--

CREATE TABLE `ventas_detalle` (
  `id_detalle` int(11) NOT NULL,
  `venta_id` int(11) NOT NULL,
  `producto_id` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `precio` double(7,2) NOT NULL,
  `total` double(7,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `ventas_detalle`
--

INSERT INTO `ventas_detalle` (`id_detalle`, `venta_id`, `producto_id`, `cantidad`, `precio`, `total`) VALUES
(12, 150, 31, 1, 70000.00, 82357.00),
(13, 150, 32, 1, 12357.00, 82357.00),
(14, 151, 31, 1, 70000.00, 70000.00),
(15, 152, 31, 1, 70000.00, 70000.00),
(16, 153, 27, 1, 45677.00, 45677.00),
(17, 154, 29, 1, 3780.00, 3780.00),
(18, 155, 31, 1, 70000.00, 70000.00),
(19, 156, 26, 1, 3780.00, 73780.00),
(20, 156, 31, 1, 70000.00, 73780.00),
(21, 157, 29, 1, 3780.00, 73780.00),
(22, 158, 29, 1, 3780.00, 73780.00),
(23, 159, 29, 1, 3780.00, 73780.00),
(24, 160, 31, 1, 70000.00, 70000.00),
(25, 161, 31, 1, 70000.00, 70000.00),
(26, 162, 27, 1, 45677.00, 49457.00),
(27, 162, 26, 1, 3780.00, 49457.00),
(28, 163, 31, 1, 70000.00, 70000.00),
(29, 164, 32, 2, 12357.00, 74171.00),
(30, 164, 27, 1, 45677.00, 74171.00),
(31, 164, 26, 1, 3780.00, 74171.00),
(32, 165, 32, 1, 12357.00, 99999.99),
(33, 165, 31, 1, 70000.00, 99999.99),
(34, 165, 27, 1, 45677.00, 99999.99),
(35, 165, 26, 1, 3780.00, 99999.99),
(36, 165, 33, 1, 17890.00, 99999.99),
(37, 166, 33, 1, 17890.00, 79675.00),
(38, 167, 33, 2, 17890.00, 97565.00),
(39, 168, 33, 1, 17890.00, 79675.00),
(40, 172, 33, 1, 17890.00, 79675.00),
(41, 174, 32, 4, 12357.00, 49428.00),
(42, 175, 33, 2, 17890.00, 35780.00);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `consultas`
--
ALTER TABLE `consultas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `perfiles`
--
ALTER TABLE `perfiles`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `productos` (`categoria_id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD KEY `perfil_id` (`perfil_id`);

--
-- Indices de la tabla `ventas_cabecera`
--
ALTER TABLE `ventas_cabecera`
  ADD PRIMARY KEY (`id_cabeza`),
  ADD KEY `ventas` (`usuario_id`);

--
-- Indices de la tabla `ventas_detalle`
--
ALTER TABLE `ventas_detalle`
  ADD PRIMARY KEY (`id_detalle`),
  ADD KEY `ventas_detalle` (`venta_id`),
  ADD KEY `pro` (`producto_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `consultas`
--
ALTER TABLE `consultas`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `perfiles`
--
ALTER TABLE `perfiles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT de la tabla `ventas_cabecera`
--
ALTER TABLE `ventas_cabecera`
  MODIFY `id_cabeza` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=176;

--
-- AUTO_INCREMENT de la tabla `ventas_detalle`
--
ALTER TABLE `ventas_detalle`
  MODIFY `id_detalle` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `productos`
--
ALTER TABLE `productos`
  ADD CONSTRAINT `productos` FOREIGN KEY (`categoria_id`) REFERENCES `categorias` (`id`);

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `usuarios` FOREIGN KEY (`perfil_id`) REFERENCES `perfiles` (`id`);

--
-- Filtros para la tabla `ventas_cabecera`
--
ALTER TABLE `ventas_cabecera`
  ADD CONSTRAINT `ventas` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`id`);

--
-- Filtros para la tabla `ventas_detalle`
--
ALTER TABLE `ventas_detalle`
  ADD CONSTRAINT `pro` FOREIGN KEY (`producto_id`) REFERENCES `productos` (`id`),
  ADD CONSTRAINT `ventas_detalle` FOREIGN KEY (`venta_id`) REFERENCES `ventas_cabecera` (`id_cabeza`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
