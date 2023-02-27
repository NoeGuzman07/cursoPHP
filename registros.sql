-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 27-02-2023 a las 06:49:16
-- Versión del servidor: 10.4.27-MariaDB
-- Versión de PHP: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `curso-php`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `registros`
--

CREATE TABLE `registros` (
  `id` int(11) NOT NULL,
  `token` text NOT NULL,
  `nombre` text NOT NULL,
  `email` text NOT NULL,
  `password` varchar(100) NOT NULL,
  `intentos_fallidos` int(11) DEFAULT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `registros`
--

INSERT INTO `registros` (`id`, `token`, `nombre`, `email`, `password`, `intentos_fallidos`, `fecha`) VALUES
(98, '6c30bf8170ba1493f867186a5a542697', 'Noe Norberto Guzmán López', 'noe.guzman@uabc.edu.mx', '$2a$07$usesomesillystringforeIah6sMQ1u/CeUclVwt1f3DcHqrTK/Qu', 0, '2023-02-27 05:30:57'),
(99, '4faa4ee593307e09034e4c79dab2b1ff', 'Richelle Ann Gerónimo Apan', 'richelle.geronimo@uabc.edu.mx', '$2a$07$usesomesillystringforeMMyaXrLmqFRHLIaGw1b7rgmreUL0Skq', NULL, '2023-02-27 05:31:39'),
(100, '0dda8036911975c184c52cc702cd7b74', 'Kevin Olmos', 'kevin.olmos@uabc.edu.mx', '$2a$07$usesomesillystringforeAvHlJW5m75k7XXG7vYfxSGJDFF.v8g6', NULL, '2023-02-27 05:32:17'),
(101, '4f548888b048c05442a209c815c7379e', 'Jocelyne Beltrán', 'joce.beltran@uabc.edu.mx', '$2a$07$usesomesillystringforehGqZabQCKrdnhC8gfmtnrDwLYMFipW.', NULL, '2023-02-27 05:32:59');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `registros`
--
ALTER TABLE `registros`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `registros`
--
ALTER TABLE `registros`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
