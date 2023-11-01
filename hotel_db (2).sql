-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 01-11-2023 a las 20:46:52
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
-- Estructura de tabla para la tabla `administrador`
--

CREATE TABLE `administrador` (
  `telefono` int(11) DEFAULT NULL,
  `contraseña` varchar(60) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_rol` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `administrador`
--

INSERT INTO `administrador` (`telefono`, `contraseña`, `id_user`, `id_rol`) VALUES
(777777, '$2y$10$GmRt4MDtf76JB6w/QNY.4ui5KIOTcl6MW9l2nBIu4C4as/aeOrz3W', 70, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE `cliente` (
  `id_cliente` int(11) NOT NULL,
  `tarjeta` varchar(25) DEFAULT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`id_cliente`, `tarjeta`, `id_user`) VALUES
(28, '2222222', 60),
(30, '123123123123', 63),
(32, '333333', 65),
(34, '123123123123', 73),
(37, '321321321', 76),
(38, '345345345345', 77),
(39, '4444444', 78);

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
(102, 'Estas habitaciones suelen ser funcionales y cómodas, pero no necesariamente incluyen lujos o características adicionales.', 4, 35000.00, 1, 'Ocupada'),
(103, 'Estas habitaciones suelen ser funcionales y cómodas, pero no necesariamente incluyen lujos o características adicionales.', 4, 35000.00, 1, 'Ocupada'),
(104, 'Estas habitaciones suelen ser funcionales y cómodas, pero no necesariamente incluyen lujos o características adicionales.', 4, 35000.00, 1, 'Libre'),
(105, 'Estas habitaciones suelen ser funcionales y cómodas, pero no necesariamente incluyen lujos o características adicionales.', 4, 35000.00, 1, 'Ocupada'),
(106, 'Las habitaciones premium son ideales para aquellos que buscan una estancia de mayor confort y elegancia durante su visita al hotel.', 4, 50000.00, 2, 'Ocupada'),
(107, 'Estas habitaciones suelen ser funcionales y cómodas, pero no necesariamente incluyen lujos o características adicionales.', 4, 35000.00, 1, 'Libre'),
(108, 'Estas habitaciones suelen ser funcionales y cómodas, pero no necesariamente incluyen lujos o características adicionales.', 4, 35000.00, 1, 'Libre'),
(109, 'Estas habitaciones suelen ser funcionales y cómodas, pero no necesariamente incluyen lujos o características adicionales.', 4, 35000.00, 1, 'Libre'),
(110, 'Estas habitaciones suelen ser funcionales y cómodas, pero no necesariamente incluyen lujos o características adicionales.', 4, 35000.00, 1, 'Libre'),
(111, 'Las habitaciones premium son ideales para aquellos que buscan una estancia de mayor confort y elegancia durante su visita al hotel.', 4, 50000.00, 2, 'Libre'),
(112, 'Estas habitaciones suelen ser funcionales y cómodas, pero no necesariamente incluyen lujos o características adicionales.', 4, 35000.00, 1, 'Libre'),
(113, 'Estas habitaciones suelen ser funcionales y cómodas, pero no necesariamente incluyen lujos o características adicionales.', 4, 35000.00, 1, 'Libre'),
(114, 'Estas habitaciones suelen ser funcionales y cómodas, pero no necesariamente incluyen lujos o características adicionales.', 4, 35000.00, 1, 'Libre'),
(115, 'Estas habitaciones suelen ser funcionales y cómodas, pero no necesariamente incluyen lujos o características adicionales.', 4, 35000.00, 1, 'Libre'),
(116, 'Las habitaciones premium son ideales para aquellos que buscan una estancia de mayor confort y elegancia durante su visita al hotel.', 4, 50000.00, 2, 'Libre'),
(201, 'Las habitaciones premium son ideales para aquellos que buscan una estancia de mayor confort y elegancia durante su visita al hotel.', 4, 50000.00, 2, 'Libre'),
(202, 'Estas habitaciones suelen ser funcionales y cómodas, pero no necesariamente incluyen lujos o características adicionales.', 4, 35000.00, 1, 'Libre'),
(203, 'Estas habitaciones suelen ser funcionales y cómodas, pero no necesariamente incluyen lujos o características adicionales.', 4, 35000.00, 1, 'Ocupada'),
(204, 'Estas habitaciones suelen ser funcionales y cómodas, pero no necesariamente incluyen lujos o características adicionales.', 4, 35000.00, 1, 'Libre'),
(205, 'Estas habitaciones suelen ser funcionales y cómodas, pero no necesariamente incluyen lujos o características adicionales.', 4, 35000.00, 1, 'Ocupada'),
(206, 'Las habitaciones premium son ideales para aquellos que buscan una estancia de mayor confort y elegancia durante su visita al hotel.', 4, 50000.00, 2, 'Ocupada'),
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
-- Estructura de tabla para la tabla `habitacion_premium`
--

CREATE TABLE `habitacion_premium` (
  `id_h_premium` int(11) NOT NULL,
  `valor` decimal(10,2) NOT NULL,
  `numero_habitacion` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

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
  `fecha_inicio` date NOT NULL,
  `fecha_fin` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `reserva`
--

INSERT INTO `reserva` (`id_reserva`, `id_cliente`, `numero_habitacion`, `fecha_inicio`, `fecha_fin`) VALUES
(22, 28, 106, '2023-10-29', '2023-11-01'),
(24, 30, 102, '2023-10-30', '2023-10-31'),
(26, 32, 105, '2023-10-29', '2023-10-31'),
(28, 34, 206, '2023-10-30', '2023-10-31'),
(31, 37, 205, '2023-10-31', '2023-11-01'),
(32, 38, 203, '2023-10-30', '2023-10-31'),
(33, 39, 103, '2023-10-31', '2023-11-01');

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
(1, 'cliente'),
(2, 'administrador');

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
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `nombre` varchar(15) NOT NULL,
  `apellido` varchar(15) NOT NULL,
  `correo` varchar(50) NOT NULL,
  `id_rol` int(11) NOT NULL,
  `identificacion` varchar(20) NOT NULL,
  `tipo_identificacion` enum('RUT','Pasaporte') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id_user`, `nombre`, `apellido`, `correo`, `id_rol`, `identificacion`, `tipo_identificacion`) VALUES
(60, 'Alexis', 'Sanchez', 'alexis@gmail.com', 1, '11111-1', 'RUT'),
(63, 'Charles', 'Aranguiz', 'charles@gmail.com', 1, '123-1', 'RUT'),
(65, 'Claudio', 'Bravo', 'Claudito@gmail.com', 1, '33333-3', 'RUT'),
(70, 'Admin', 'Admin', 'admin@gmail.com', 2, '11111-1', 'RUT'),
(73, 'Arturo', 'Vidal', 'kingarturo@gmail.com', 1, '22222-2', 'RUT'),
(76, 'Pepe', 'Tapia', 'peptapiaaaa@gmail.com', 1, '3333-3', 'RUT'),
(77, 'Adolf', 'Stalin', 'adolfito@gmail.com', 1, '999999-9', 'RUT'),
(78, 'Jovanii', 'Vasquez', 'esteesjovanii@gmail.com', 1, '8345-1', 'RUT');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `administrador`
--
ALTER TABLE `administrador`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `id_user_admin_fk` (`id_user`),
  ADD KEY `id_rol_fk` (`id_rol`);

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`id_cliente`),
  ADD KEY `id_user_fk` (`id_user`);

--
-- Indices de la tabla `habitacion`
--
ALTER TABLE `habitacion`
  ADD PRIMARY KEY (`numero_habitacion`),
  ADD KEY `tipo_habitacion_fk` (`id_tipo_habitacion`);

--
-- Indices de la tabla `habitacion_premium`
--
ALTER TABLE `habitacion_premium`
  ADD PRIMARY KEY (`id_h_premium`),
  ADD KEY `habitacion_premium_habitacion_fk` (`numero_habitacion`);

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
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `rol_id_fk` (`id_rol`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `cliente`
--
ALTER TABLE `cliente`
  MODIFY `id_cliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

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
  MODIFY `id_reserva` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `administrador`
--
ALTER TABLE `administrador`
  ADD CONSTRAINT `id_rol_fk` FOREIGN KEY (`id_rol`) REFERENCES `rol` (`id_rol`),
  ADD CONSTRAINT `id_user_admin_fk` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`);

--
-- Filtros para la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD CONSTRAINT `id_user_fk` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`);

--
-- Filtros para la tabla `habitacion`
--
ALTER TABLE `habitacion`
  ADD CONSTRAINT `tipo_habitacion_fk` FOREIGN KEY (`id_tipo_habitacion`) REFERENCES `tipo_habitacion` (`id_tipo_habitacion`);

--
-- Filtros para la tabla `habitacion_premium`
--
ALTER TABLE `habitacion_premium`
  ADD CONSTRAINT `habitacion_premium_habitacion_fk` FOREIGN KEY (`numero_habitacion`) REFERENCES `habitacion` (`numero_habitacion`);

--
-- Filtros para la tabla `reserva`
--
ALTER TABLE `reserva`
  ADD CONSTRAINT `id_cliente_fk` FOREIGN KEY (`id_cliente`) REFERENCES `cliente` (`id_cliente`),
  ADD CONSTRAINT `numero_habitacion_fk` FOREIGN KEY (`numero_habitacion`) REFERENCES `habitacion` (`numero_habitacion`);

--
-- Filtros para la tabla `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `rol_id_fk` FOREIGN KEY (`id_rol`) REFERENCES `rol` (`id_rol`);


--
-- Metadatos
--
USE `phpmyadmin`;

--
-- Metadatos para la tabla administrador
--

--
-- Metadatos para la tabla cliente
--

--
-- Metadatos para la tabla habitacion
--

--
-- Metadatos para la tabla habitacion_premium
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
-- Metadatos para la tabla users
--

--
-- Metadatos para la base de datos hotel_db
--
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
