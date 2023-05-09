-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 09-05-2023 a las 05:19:35
-- Versión del servidor: 10.4.11-MariaDB
-- Versión de PHP: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `alarm`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alarm`
--

CREATE TABLE `alarm` (
  `id` int(11) NOT NULL,
  `host` varchar(5) DEFAULT NULL,
  `z1` varchar(3) DEFAULT NULL,
  `st1` varchar(4) DEFAULT NULL,
  `fecha` datetime DEFAULT NULL,
  `id_avant` int(11) DEFAULT NULL,
  `msg` varchar(200) DEFAULT NULL,
  `z2` varchar(3) DEFAULT NULL,
  `st2` varchar(3) DEFAULT NULL,
  `z3` varchar(3) DEFAULT NULL,
  `st3` varchar(3) DEFAULT NULL,
  `z4` varchar(3) DEFAULT NULL,
  `st4` varchar(3) DEFAULT NULL,
  `status` varchar(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `alarm`
--

INSERT INTO `alarm` (`id`, `host`, `z1`, `st1`, `fecha`, `id_avant`, `msg`, `z2`, `st2`, `z3`, `st3`, `z4`, `st4`, `status`) VALUES
(3581, '0001', NULL, NULL, '2023-05-09 05:08:07', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0'),
(3582, '0001', '1', '1', '2023-05-09 05:08:08', NULL, NULL, '0', '0', '0', '0', '0', '0', '1'),
(3583, '0001', '1', '0', '2023-05-09 05:08:09', NULL, NULL, '1', '1', '0', '0', '0', '0', '1'),
(3584, '0001', '1', '0', '2023-05-09 05:08:10', NULL, NULL, '1', '0', '1', '1', '0', '0', '1'),
(3585, '0001', '1', '0', '2023-05-09 05:08:11', NULL, NULL, '1', '0', '1', '0', '1', '1', '1'),
(3586, '0001', '0', '1', '2023-05-09 05:08:14', NULL, NULL, '1', '0', '1', '0', '1', '0', '1'),
(3587, '0001', '0', '0', '2023-05-09 05:08:15', NULL, NULL, '0', '1', '1', '0', '1', '0', '1'),
(3588, '0001', '0', '0', '2023-05-09 05:08:16', NULL, NULL, '0', '0', '0', '1', '1', '0', '1'),
(3589, '0001', '0', '0', '2023-05-09 05:08:17', NULL, NULL, '0', '0', '0', '0', '0', '1', '1'),
(3590, '0001', '1', '1', '2023-05-09 05:08:23', NULL, NULL, '0', '0', '0', '0', '0', '0', '1'),
(3591, '0001', '0', '1', '2023-05-09 05:08:26', NULL, NULL, '0', '0', '0', '0', '0', '0', '1'),
(3592, '0001', '0', '0', '2023-05-09 05:08:27', NULL, NULL, '0', '0', '1', '1', '0', '0', '1'),
(3593, '0001', '0', '0', '2023-05-09 05:08:27', NULL, NULL, '1', '1', '1', '0', '0', '0', '1'),
(3594, '0001', '0', '0', '2023-05-09 05:08:28', NULL, NULL, '0', '1', '1', '0', '0', '0', '1'),
(3595, '0001', '0', '0', '2023-05-09 05:08:29', NULL, NULL, '0', '0', '0', '1', '0', '0', '1'),
(3596, '0001', NULL, NULL, '2023-05-09 05:09:11', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0'),
(3597, '0001', NULL, NULL, '2023-05-09 05:09:14', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '3'),
(3598, '0001', NULL, NULL, '2023-05-09 05:12:44', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0'),
(3599, '0001', '0', '1', '2023-05-09 05:12:59', NULL, NULL, '0', '0', '0', '0', '1', '0', '1'),
(3600, '0001', '1', '1', '2023-05-09 05:13:03', NULL, NULL, '0', '0', '0', '0', '1', '0', '1'),
(3601, '0001', '1', '0', '2023-05-09 05:13:09', NULL, NULL, '1', '1', '0', '0', '1', '0', '1'),
(3602, '0001', '1', '0', '2023-05-09 05:13:09', NULL, NULL, '1', '0', '1', '1', '1', '0', '1'),
(3603, '0001', '1', '0', '2023-05-09 05:13:09', NULL, NULL, '1', '0', '1', '0', '1', '1', '1'),
(3604, '0001', '1', '0', '2023-05-09 05:13:09', NULL, NULL, '0', '1', '1', '0', '1', '0', '1'),
(3605, '0001', '1', '0', '2023-05-09 05:13:09', NULL, NULL, '0', '0', '0', '1', '1', '0', '1'),
(3606, '0001', '1', '0', '2023-05-09 05:13:10', NULL, NULL, '0', '0', '0', '0', '0', '1', '1'),
(3607, '0001', '0', '1', '2023-05-09 05:13:20', NULL, NULL, '0', '0', '0', '0', '0', '0', '1'),
(3608, '0001', '1', '1', '2023-05-09 05:13:21', NULL, NULL, '0', '0', '0', '0', '0', '0', '1'),
(3609, '0001', '0', '1', '2023-05-09 05:13:26', NULL, NULL, '0', '0', '0', '0', '0', '0', '1'),
(3610, '0001', '0', '0', '2023-05-09 05:13:32', NULL, NULL, '0', '0', '1', '1', '0', '0', '1'),
(3611, '0001', '0', '0', '2023-05-09 05:13:32', NULL, NULL, '1', '1', '1', '0', '0', '0', '1'),
(3612, '0001', '0', '0', '2023-05-09 05:13:33', NULL, NULL, '0', '1', '1', '0', '0', '0', '1'),
(3613, '0001', '0', '0', '2023-05-09 05:13:39', NULL, NULL, '0', '0', '0', '1', '0', '0', '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `host`
--

CREATE TABLE `host` (
  `id` int(11) NOT NULL,
  `name` varchar(5) DEFAULT NULL,
  `psw` varchar(10) DEFAULT NULL,
  `msg` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `host`
--

INSERT INTO `host` (`id`, `name`, `psw`, `msg`) VALUES
(1, '0001', '1234', NULL),
(2, '0002', '1234', NULL);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `alarm`
--
ALTER TABLE `alarm`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `host`
--
ALTER TABLE `host`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `alarm`
--
ALTER TABLE `alarm`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3614;

--
-- AUTO_INCREMENT de la tabla `host`
--
ALTER TABLE `host`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
