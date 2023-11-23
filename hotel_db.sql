-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 05-11-2023 a las 19:53:24
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
-- Base de datos: `hotel_db`
--
CREATE DATABASE IF NOT EXISTS `hotel_db` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `hotel_db`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE `cliente` (
  `id_cliente` int(11) NOT NULL,
  `tarjeta` varchar(25) DEFAULT NULL,
  `nombre` varchar(25) NOT NULL,
  `apellido` varchar(25) NOT NULL,
  `tipo_identificacion` enum('RUT','Pasaporte') NOT NULL,
  `identificacion` varchar(25) NOT NULL,
  `correo` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`id_cliente`, `tarjeta`, `nombre`, `apellido`, `tipo_identificacion`, `identificacion`, `correo`) VALUES
(58, '123', 'Mauro', 'Contreras', 'Pasaporte', '123', 'mauro@gmail.com'),
(60, '123', 'Cristobal', 'Ribertt', 'RUT', '123', 'bandasserver@gmail.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleado`
--

CREATE TABLE `empleado` (
  `id_empleado` int(11) NOT NULL,
  `nombre` varchar(15) NOT NULL,
  `apepat` varchar(15) NOT NULL,
  `apemat` varchar(25) NOT NULL,
  `telefono` int(11) NOT NULL,
  `id_rol` int(11) NOT NULL,
  `identificacion` varchar(20) NOT NULL,
  `tipo_identificacion` enum('RUT','Pasaporte') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `empleado`
--

INSERT INTO `empleado` (`id_empleado`, `nombre`, `apepat`, `apemat`, `telefono`, `id_rol`, `identificacion`, `tipo_identificacion`) VALUES
(70, 'Arturo', 'Pratt', 'Chacón', 131, 2, '11111-1', 'RUT'),
(81, 'Daniel', 'Garrido', 'Mendoza', 66666, 1, '20016586-1', 'RUT'),
(84, 'Miguel', 'Gomez', 'Gomez', 444444, 2, '44444-4', 'RUT');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleado_usuario`
--

CREATE TABLE `empleado_usuario` (
  `id_empleado` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `empleado_usuario`
--

INSERT INTO `empleado_usuario` (`id_empleado`, `id_usuario`) VALUES
(70, 1),
(81, 5),
(84, 8);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `extra`
--

CREATE TABLE `extra` (
  `id_extra` int(11) NOT NULL,
  `nombre` varchar(25) DEFAULT NULL,
  `valor` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `extra`
--

INSERT INTO `extra` (`id_extra`, `nombre`, `valor`) VALUES
(1, 'desayuno', 5000),
(2, 'lavanderia', 5000);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `habitacion`
--

CREATE TABLE `habitacion` (
  `numero_habitacion` int(11) NOT NULL,
  `descripcion` varchar(255) DEFAULT NULL,
  `capacidad` int(2) NOT NULL,
  `precio_por_noche` decimal(10,2) NOT NULL,
  `id_tipo_habitacion` int(11) NOT NULL,
  `estado` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `habitacion`
--

INSERT INTO `habitacion` (`numero_habitacion`, `descripcion`, `capacidad`, `precio_por_noche`, `id_tipo_habitacion`, `estado`) VALUES
(101, 'Las habitaciones premium son ideales para aquellos que buscan una estancia de mayor confort y elegancia durante su visita al hotel.', 4, 50000.00, 2, 'Libre'),
(102, 'Estas habitaciones suelen ser funcionales y cómodas, pero no necesariamente incluyen lujos o características adicionales.', 4, 35000.00, 1, 'Libre'),
(103, 'Estas habitaciones suelen ser funcionales y cómodas, pero no necesariamente incluyen lujos o características adicionales.', 4, 35000.00, 1, 'Libre'),
(104, 'Estas habitaciones suelen ser funcionales y cómodas, pero no necesariamente incluyen lujos o características adicionales.', 4, 35000.00, 1, 'Libre'),
(105, 'Estas habitaciones suelen ser funcionales y cómodas, pero no necesariamente incluyen lujos o características adicionales.', 4, 35000.00, 1, 'Libre'),
(106, 'Las habitaciones premium son ideales para aquellos que buscan una estancia de mayor confort y elegancia durante su visita al hotel.', 4, 50000.00, 2, 'Libre'),
(107, 'Estas habitaciones suelen ser funcionales y cómodas, pero no necesariamente incluyen lujos o características adicionales.', 4, 35000.00, 1, 'Ocupada'),
(108, 'Estas habitaciones suelen ser funcionales y cómodas, pero no necesariamente incluyen lujos o características adicionales.', 4, 35000.00, 1, 'Libre'),
(109, 'Estas habitaciones suelen ser funcionales y cómodas, pero no necesariamente incluyen lujos o características adicionales.', 4, 35000.00, 1, 'Libre'),
(110, 'Estas habitaciones suelen ser funcionales y cómodas, pero no necesariamente incluyen lujos o características adicionales.', 4, 35000.00, 1, 'Libre'),
(111, 'Las habitaciones premium son ideales para aquellos que buscan una estancia de mayor confort y elegancia durante su visita al hotel.', 4, 50000.00, 2, 'Libre'),
(112, 'Estas habitaciones suelen ser funcionales y cómodas, pero no necesariamente incluyen lujos o características adicionales.', 4, 35000.00, 1, 'Libre'),
(113, 'Estas habitaciones suelen ser funcionales y cómodas, pero no necesariamente incluyen lujos o características adicionales.', 4, 35000.00, 1, 'Libre'),
(114, 'Estas habitaciones suelen ser funcionales y cómodas, pero no necesariamente incluyen lujos o características adicionales.', 4, 35000.00, 1, 'Ocupada'),
(115, 'Estas habitaciones suelen ser funcionales y cómodas, pero no necesariamente incluyen lujos o características adicionales.', 4, 35000.00, 1, 'Libre'),
(116, 'Las habitaciones premium son ideales para aquellos que buscan una estancia de mayor confort y elegancia durante su visita al hotel.', 4, 50000.00, 2, 'Libre'),
(201, 'Las habitaciones premium son ideales para aquellos que buscan una estancia de mayor confort y elegancia durante su visita al hotel.', 4, 50000.00, 2, 'Libre'),
(202, 'Estas habitaciones suelen ser funcionales y cómodas, pero no necesariamente incluyen lujos o características adicionales.', 4, 35000.00, 1, 'Libre'),
(203, 'Estas habitaciones suelen ser funcionales y cómodas, pero no necesariamente incluyen lujos o características adicionales.', 4, 35000.00, 1, 'Libre'),
(204, 'Estas habitaciones suelen ser funcionales y cómodas, pero no necesariamente incluyen lujos o características adicionales.', 4, 35000.00, 1, 'Libre'),
(205, 'Estas habitaciones suelen ser funcionales y cómodas, pero no necesariamente incluyen lujos o características adicionales.', 4, 35000.00, 1, 'Libre'),
(206, 'Las habitaciones premium son ideales para aquellos que buscan una estancia de mayor confort y elegancia durante su visita al hotel.', 4, 50000.00, 2, 'Libre'),
(207, 'Estas habitaciones suelen ser funcionales y cómodas, pero no necesariamente incluyen lujos o características adicionales.', 4, 35000.00, 1, 'Libre'),
(208, 'Estas habitaciones suelen ser funcionales y cómodas, pero no necesariamente incluyen lujos o características adicionales.', 4, 35000.00, 1, 'Libre'),
(209, 'Estas habitaciones suelen ser funcionales y cómodas, pero no necesariamente incluyen lujos o características adicionales.', 4, 35000.00, 1, 'Libre'),
(210, 'Estas habitaciones suelen ser funcionales y cómodas, pero no necesariamente incluyen lujos o características adicionales.', 4, 35000.00, 1, 'Libre'),
(211, 'Las habitaciones premium son ideales para aquellos que buscan una estancia de mayor confort y elegancia durante su visita al hotel.', 4, 50000.00, 2, 'Libre'),
(212, 'Estas habitaciones suelen ser funcionales y cómodas, pero no necesariamente incluyen lujos o características adicionales.', 4, 35000.00, 1, 'Libre'),
(213, 'Estas habitaciones suelen ser funcionales y cómodas, pero no necesariamente incluyen lujos o características adicionales.', 4, 35000.00, 1, 'Libre'),
(214, 'Estas habitaciones suelen ser funcionales y cómodas, pero no necesariamente incluyen lujos o características adicionales.', 4, 35000.00, 1, 'Libre'),
(215, 'Estas habitaciones suelen ser funcionales y cómodas, pero no necesariamente incluyen lujos o características adicionales.', 4, 35000.00, 1, 'Libre'),
(216, 'Las habitaciones premium son ideales para aquellos que buscan una estancia de mayor confort y elegancia durante su visita al hotel.', 4, 50000.00, 2, 'Libre');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `habitacion_extra`
--

CREATE TABLE `habitacion_extra` (
  `numero_habitacion` int(11) NOT NULL,
  `id_extra` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `habitacion_extra`
--

INSERT INTO `habitacion_extra` (`numero_habitacion`, `id_extra`) VALUES
(211, 1),
(211, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2019_12_14_000001_create_personal_access_tokens_table', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reserva`
--

CREATE TABLE `reserva` (
  `id_reserva` int(11) NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `numero_habitacion` int(11) NOT NULL,
  `cantidad_adultos` int(11) NOT NULL,
  `cantidad_menores` int(11) NOT NULL,
  `fecha_inicio` date NOT NULL,
  `fecha_fin` date NOT NULL,
  `check_in` enum('PENDIENTE','CHECKED') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `reserva`
--

INSERT INTO `reserva` (`id_reserva`, `id_cliente`, `numero_habitacion`, `cantidad_adultos`, `cantidad_menores`, `fecha_inicio`, `fecha_fin`, `check_in`) VALUES
(49, 58, 107, 2, 2, '2023-11-14', '2023-11-12', 'PENDIENTE'),
(51, 60, 114, 2, 0, '2023-11-17', '2023-11-15', 'PENDIENTE');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol`
--

CREATE TABLE `rol` (
  `id_rol` int(11) NOT NULL,
  `nombre_rol` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `rol`
--

INSERT INTO `rol` (`id_rol`, `nombre_rol`) VALUES
(1, 'Gerente'),
(2, 'Empleado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_habitacion`
--

CREATE TABLE `tipo_habitacion` (
  `id_tipo_habitacion` int(11) NOT NULL,
  `nombre_habitacion` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `tipo_habitacion`
--

INSERT INTO `tipo_habitacion` (`id_tipo_habitacion`, `nombre_habitacion`) VALUES
(1, 'normal'),
(2, 'premium');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id_usuario` int(11) NOT NULL,
  `username` varchar(25) NOT NULL,
  `correo` varchar(50) NOT NULL,
  `contraseña` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `username`, `correo`, `contraseña`) VALUES
(1, 'admin', 'admin@gmail.com', '$2y$10$GmRt4MDtf76JB6w/QNY.4ui5KIOTcl6MW9l2nBIu4C4as/aeOrz3W'),
(5, 'daniel.98', 'daniel@gmail.com', '$2y$10$P/Lq6i5ksHLF6ESqEcLi4OOVA6fMgWu0X1Kb4d5cgEtZArCJ1jFFG'),
(8, 'harakiri', 'miguel@gmail.com', '$2y$10$Gdngy5hldRoYjxUOlqRzh.IEtO6QjT8eaZl16iIs0Av6w8f4v.Qoq');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`id_cliente`);

--
-- Indices de la tabla `empleado`
--
ALTER TABLE `empleado`
  ADD PRIMARY KEY (`id_empleado`),
  ADD KEY `rol_id_fk` (`id_rol`);

--
-- Indices de la tabla `empleado_usuario`
--
ALTER TABLE `empleado_usuario`
  ADD KEY `fk_empleado` (`id_empleado`),
  ADD KEY `fk_usuario` (`id_usuario`);

--
-- Indices de la tabla `extra`
--
ALTER TABLE `extra`
  ADD PRIMARY KEY (`id_extra`);

--
-- Indices de la tabla `habitacion`
--
ALTER TABLE `habitacion`
  ADD PRIMARY KEY (`numero_habitacion`),
  ADD KEY `tipo_habitacion_fk` (`id_tipo_habitacion`);

--
-- Indices de la tabla `habitacion_extra`
--
ALTER TABLE `habitacion_extra`
  ADD KEY `habitacion_premium_habitacion_fk` (`numero_habitacion`),
  ADD KEY `fk_id_extra` (`id_extra`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indices de la tabla `reserva`
--
ALTER TABLE `reserva`
  ADD PRIMARY KEY (`id_reserva`),
  ADD KEY `id_cliente_fk` (`id_cliente`),
  ADD KEY `numero_habitacion_fk` (`numero_habitacion`);

--
-- Indices de la tabla `rol`
--
ALTER TABLE `rol`
  ADD PRIMARY KEY (`id_rol`);

--
-- Indices de la tabla `tipo_habitacion`
--
ALTER TABLE `tipo_habitacion`
  ADD PRIMARY KEY (`id_tipo_habitacion`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `cliente`
--
ALTER TABLE `cliente`
  MODIFY `id_cliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT de la tabla `empleado`
--
ALTER TABLE `empleado`
  MODIFY `id_empleado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;

--
-- AUTO_INCREMENT de la tabla `extra`
--
ALTER TABLE `extra`
  MODIFY `id_extra` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `habitacion`
--
ALTER TABLE `habitacion`
  MODIFY `id_tipo_habitacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `reserva`
--
ALTER TABLE `reserva`
  MODIFY `id_reserva` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `empleado`
--
ALTER TABLE `empleado`
  ADD CONSTRAINT `rol_id_fk` FOREIGN KEY (`id_rol`) REFERENCES `rol` (`id_rol`);

--
-- Filtros para la tabla `empleado_usuario`
--
ALTER TABLE `empleado_usuario`
  ADD CONSTRAINT `fk_empleado` FOREIGN KEY (`id_empleado`) REFERENCES `empleado` (`id_empleado`),
  ADD CONSTRAINT `fk_usuario` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`);

--
-- Filtros para la tabla `habitacion`
--
ALTER TABLE `habitacion`
  ADD CONSTRAINT `tipo_habitacion_fk` FOREIGN KEY (`id_tipo_habitacion`) REFERENCES `tipo_habitacion` (`id_tipo_habitacion`);

--
-- Filtros para la tabla `habitacion_extra`
--
ALTER TABLE `habitacion_extra`
  ADD CONSTRAINT `fk_id_extra` FOREIGN KEY (`id_extra`) REFERENCES `extra` (`id_extra`),
  ADD CONSTRAINT `habitacion_premium_habitacion_fk` FOREIGN KEY (`numero_habitacion`) REFERENCES `habitacion` (`numero_habitacion`);

--
-- Filtros para la tabla `reserva`
--
ALTER TABLE `reserva`
  ADD CONSTRAINT `id_cliente_fk` FOREIGN KEY (`id_cliente`) REFERENCES `cliente` (`id_cliente`),
  ADD CONSTRAINT `numero_habitacion_fk` FOREIGN KEY (`numero_habitacion`) REFERENCES `habitacion` (`numero_habitacion`);


--
-- Metadatos
--
USE `phpmyadmin`;

--
-- Metadatos para la tabla cliente
--

--
-- Metadatos para la tabla empleado
--

--
-- Metadatos para la tabla empleado_usuario
--

--
-- Metadatos para la tabla extra
--

--
-- Metadatos para la tabla habitacion
--

--
-- Metadatos para la tabla habitacion_extra
--

--
-- Metadatos para la tabla migrations
--

--
-- Metadatos para la tabla personal_access_tokens
--

--
-- Metadatos para la tabla reserva
--

--
-- Metadatos para la tabla rol
--

--
-- Metadatos para la tabla tipo_habitacion
--

--
-- Metadatos para la tabla usuario
--

--
-- Metadatos para la base de datos hotel_db
--
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
