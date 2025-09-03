-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: fdb1034.awardspace.net
-- Tiempo de generación: 01-09-2025 a las 04:06:09
-- Versión del servidor: 8.0.32
-- Versión de PHP: 8.1.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `4667280_torneo`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `correo` varchar(30) NOT NULL,
  `contrasena` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `correo`, `contrasena`) VALUES
(1, 'Alicia', 'alicia@gmail.com', '$2y$10$zgRiJ5TFgOkka'),
(2, 'Alfredo', 'alfredo1@gmail.com', '$2y$10$ar2RhwEGvWkzu'),
(3, 'Juan', 'Juanjuan@gmail.com', '$2y$10$O7wpmtfeygeaz'),
(4, 'Ana', 'anabanana@gmail.com', '$2y$10$QCCsMBJIutihx'),
(5, 'Jacinta', 'jacinta2020@gmail.com', '$2y$10$aDPTsolzVxmkI'),
(6, 'Flor', 'florecita31@gmail.com', '$2y$10$jmx29ZB3L7XhS'),
(7, 'Pancho', 'pancho@gmail.com', '$2y$10$x1aa0L.kEBylx'),
(8, 'Luis', 'luis@gmail.com', '$2y$10$G7Ci8Nw2iQMIR'),
(9, 'Fernando', 'fer@gmail.com', '$2y$10$Csh.br0/apITv'),
(10, 'Valeria', 'val@gmail.com', '$2y$10$UzlAo5CvDAu6QkemQzzmDeS6ooRhGvWSm6NSoFDqVQWNzB0L5wuSS'),
(11, 'Lupe', 'lupis@gmail.com', '$2y$10$QFoA6pxFqEpjx/5dGKlBcufr.pU3HW4LymsPerUDll2THWGRw38cG'),
(12, 'Arturo', 'art@gmail.com', '$2y$10$5KloStnAe1Z5NQoNsiwvy.Zqiht2rAOWgh7FufjNHyAktnvEqh8RC'),
(13, 'Flor', 'flor@gmail.com', '$2y$10$omlqvnQ9/f3fU7I3lG.7a.o6iJCm0YECKhh2k05l9HCKZwCzUZ7hO');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `votos`
--

CREATE TABLE `votos` (
  `id` int NOT NULL,
  `usuario_id` int NOT NULL,
  `candidato` varchar(100) NOT NULL,
  `fecha` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `votos`
--

INSERT INTO `votos` (`id`, `usuario_id`, `candidato`, `fecha`) VALUES
(1, 10, 'UACJ', '2025-09-01 02:35:51'),
(2, 11, 'UACH', '2025-09-01 03:44:40'),
(3, 12, 'URN', '2025-09-01 04:01:43'),
(4, 13, 'UACJ', '2025-09-01 04:04:22');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `correo` (`correo`);

--
-- Indices de la tabla `votos`
--
ALTER TABLE `votos`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `usuario_id` (`usuario_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `votos`
--
ALTER TABLE `votos`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `votos`
--
ALTER TABLE `votos`
  ADD CONSTRAINT `votos_ibfk_1` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
