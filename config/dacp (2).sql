-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 26-11-2020 a las 19:44:56
-- Versión del servidor: 10.4.14-MariaDB
-- Versión de PHP: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `dacp`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `activo`
--

CREATE TABLE `activo` (
  `id` int(4) NOT NULL,
  `detalle` varchar(40) NOT NULL,
  `valor` double NOT NULL,
  `fecha` date NOT NULL DEFAULT current_timestamp(),
  `estado` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `activo`
--

INSERT INTO `activo` (`id`, `detalle`, `valor`, `fecha`, `estado`) VALUES
(1, 'venta', 3, '2020-11-23', 3),
(2, 'venta', 12, '2020-11-23', 3),
(3, 'venta', 12, '2020-11-23', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bodega`
--

CREATE TABLE `bodega` (
  `id_bodega` int(2) NOT NULL,
  `can_dispo` int(10) NOT NULL,
  `can_calle` int(10) NOT NULL,
  `id_producto` int(2) NOT NULL,
  `costo_produc` double DEFAULT NULL,
  `valor_produc` double DEFAULT NULL,
  `can_egresa` int(20) DEFAULT NULL,
  `can_devo` int(20) DEFAULT NULL,
  `fecha_ingreso` date DEFAULT NULL,
  `id_estado` int(2) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `bodega`
--

INSERT INTO `bodega` (`id_bodega`, `can_dispo`, `can_calle`, `id_producto`, `costo_produc`, `valor_produc`, `can_egresa`, `can_devo`, `fecha_ingreso`, `id_estado`) VALUES
(1, 315, 0, 1, 0, 0, NULL, NULL, '2020-11-12', 1),
(2, 65, 0, 2, 0, 0, NULL, NULL, '2020-11-12', 1),
(3, 40, 0, 3, 0, 0, NULL, NULL, '2020-11-12', 1),
(4, 36, 0, 4, 0, 0, NULL, NULL, '2020-11-12', 1),
(5, 10, 0, 5, 0, 0, NULL, NULL, '2020-11-12', 1),
(6, 876, 0, 6, 0, 0, NULL, NULL, '2020-11-12', 1),
(7, 180, 0, 7, 0, 0, NULL, NULL, '2020-11-12', 1),
(8, 110, 0, 8, 0, 0, NULL, NULL, '2020-11-12', 1),
(9, 25, 0, 9, 0, 0, NULL, NULL, '2020-11-12', 1),
(10, 96, 0, 10, 0, 0, NULL, NULL, '2020-11-12', 1),
(11, 316, 0, 11, 0, 0, NULL, NULL, '2020-11-12', 1),
(12, 15, 0, 12, 0, 0, NULL, NULL, '2020-11-12', 1),
(13, 59, 0, 13, 0, 0, NULL, NULL, '2020-11-12', 1),
(14, 2, 0, 14, 0, 0, NULL, NULL, '2020-11-12', 1),
(15, 63, 0, 15, 0, 0, NULL, NULL, '2020-11-12', 1),
(16, 66, 0, 16, 0, 0, NULL, NULL, '2020-11-12', 1),
(17, 1632, 0, 17, 0, 0, NULL, NULL, '2020-11-12', 1),
(18, 30, 0, 18, 0, 0, NULL, NULL, '2020-11-12', 1),
(19, 53, 0, 19, 0, 0, NULL, NULL, '2020-11-12', 1),
(20, 104, 0, 20, 0, 0, NULL, NULL, '2020-11-12', 1),
(21, 1310, 0, 21, 0, 0, NULL, NULL, '2020-11-12', 1),
(22, 13, 0, 22, 0, 0, NULL, NULL, '2020-11-12', 1),
(23, 1026, 0, 23, 0, 0, NULL, NULL, '2020-11-12', 1),
(24, 34, 0, 24, 0, 0, NULL, NULL, '2020-11-12', 1),
(25, 533, 0, 25, 0, 0, NULL, NULL, '2020-11-12', 1),
(26, 109, 0, 26, 0, 0, NULL, NULL, '2020-11-12', 1),
(27, 106, 0, 27, 0, 0, NULL, NULL, '2020-11-12', 1),
(28, 78, 0, 28, 0, 0, NULL, NULL, '2020-11-12', 1),
(29, 130, 0, 29, 0, 0, NULL, NULL, '2020-11-12', 1),
(30, 1, 0, 30, 0, 0, NULL, NULL, '2020-11-12', 1),
(31, 112, 0, 31, 0, 0, NULL, NULL, '2020-11-12', 1),
(32, 1, 0, 32, 0, 0, NULL, NULL, '2020-11-12', 1),
(33, 122, 0, 33, 0, 0, NULL, NULL, '2020-11-12', 1),
(34, 1392, 0, 34, 0, 0, NULL, NULL, '2020-11-12', 1),
(35, 4, 0, 35, 0, 0, NULL, NULL, '2020-11-12', 1),
(36, 3, 0, 36, 0, 0, NULL, NULL, '2020-11-12', 1),
(37, 5, 0, 37, 0, 0, NULL, NULL, '2020-11-12', 1),
(38, 1, 0, 38, 0, 0, NULL, NULL, '2020-11-12', 1),
(39, 3, 0, 39, 0, 0, NULL, NULL, '2020-11-12', 1),
(40, 1, 0, 40, 0, 0, NULL, NULL, '2020-11-12', 1),
(41, 19, 0, 41, 0, 0, NULL, NULL, '2020-11-12', 1),
(42, 1, 0, 42, 0, 0, NULL, NULL, '2020-11-12', 1),
(43, 1, 0, 43, 0, 0, NULL, NULL, '2020-11-12', 1),
(44, 9, 0, 44, 0, 0, NULL, NULL, '2020-11-12', 1),
(45, 4, 0, 45, 0, 0, NULL, NULL, '2020-11-12', 1),
(46, 12, 0, 46, 0, 0, NULL, NULL, '2020-11-12', 1),
(47, 124, 0, 47, 0, 0, NULL, NULL, '2020-11-12', 1),
(48, 29, 0, 48, 0, 0, NULL, NULL, '2020-11-12', 1),
(49, 28, 0, 49, 0, 0, NULL, NULL, '2020-11-12', 1),
(50, 5, 0, 50, 0, 0, NULL, NULL, '2020-11-12', 1),
(51, 1, 0, 51, 0, 0, NULL, NULL, '2020-11-12', 1),
(52, 3, 0, 52, 0, 0, NULL, NULL, '2020-11-12', 1),
(53, 3, 0, 53, 0, 0, NULL, NULL, '2020-11-12', 1),
(54, 1, 0, 54, 0, 0, NULL, NULL, '2020-11-12', 1),
(55, 27, 0, 55, 0, 0, NULL, NULL, '2020-11-12', 1),
(56, 29, 0, 56, 0, 0, NULL, NULL, '2020-11-12', 1),
(57, 23, 0, 57, 0, 0, NULL, NULL, '2020-11-12', 1),
(58, 9, 0, 58, 0, 0, NULL, NULL, '2020-11-12', 1),
(59, 8, 0, 59, 0, 0, NULL, NULL, '2020-11-12', 1),
(60, 17, 0, 60, 0, 0, NULL, NULL, '2020-11-12', 1),
(61, 44, 0, 61, 0, 0, NULL, NULL, '2020-11-12', 1),
(62, 27, 0, 62, 0, 0, NULL, NULL, '2020-11-12', 1),
(63, 23, 0, 63, 0, 0, NULL, NULL, '2020-11-12', 1),
(64, 9, 0, 64, 0, 0, NULL, NULL, '2020-11-12', 1),
(65, 1, 0, 65, 0, 0, NULL, NULL, '2020-11-12', 1),
(66, 13, 0, 66, 0, 0, NULL, NULL, '2020-11-12', 1),
(67, 3, 0, 67, 0, 0, NULL, NULL, '2020-11-12', 1),
(68, 1, 0, 68, 0, 0, NULL, NULL, '2020-11-12', 1),
(69, 1, 0, 69, 0, 0, NULL, NULL, '2020-11-12', 1),
(70, 20, 0, 70, 0, 0, NULL, NULL, '2020-11-12', 1),
(71, 9, 0, 71, 0, 0, NULL, NULL, '2020-11-12', 1),
(72, 5, 0, 72, 0, 0, NULL, NULL, '2020-11-12', 1),
(73, 8, 0, 73, 0, 0, NULL, NULL, '2020-11-12', 1),
(74, 5, 0, 74, 0, 0, NULL, NULL, '2020-11-12', 1),
(75, 41, 0, 75, 0, 0, NULL, NULL, '2020-11-12', 1),
(76, 1, 0, 76, 0, 0, NULL, NULL, '2020-11-12', 1),
(77, 350, 0, 77, 0, 0, NULL, NULL, '2020-11-12', 1),
(78, 90, 0, 78, 0, 0, NULL, NULL, '2020-11-12', 1),
(79, 120, 0, 79, 0, 0, NULL, NULL, '2020-11-12', 1),
(80, 110, 0, 80, 0, 0, NULL, NULL, '2020-11-12', 1),
(81, 60, 0, 81, 0, 0, NULL, NULL, '2020-11-12', 1),
(82, 110, 0, 82, 0, 0, NULL, NULL, '2020-11-12', 1),
(83, 70, 0, 83, 0, 0, NULL, NULL, '2020-11-12', 1),
(84, 70, 0, 84, 0, 0, NULL, NULL, '2020-11-12', 1),
(85, 10, 0, 85, 0, 0, NULL, NULL, '2020-11-12', 1),
(86, 30, 0, 86, 0, 0, NULL, NULL, '2020-11-12', 1),
(87, 60, 0, 87, 0, 0, NULL, NULL, '2020-11-12', 1),
(88, 60, 0, 88, 0, 0, NULL, NULL, '2020-11-12', 1),
(89, 64, 0, 89, 0, 0, NULL, NULL, '2020-11-12', 1),
(90, 33, 0, 90, 0, 0, NULL, NULL, '2020-11-12', 1),
(91, 2, 0, 91, 0, 0, NULL, NULL, '2020-11-12', 1),
(92, 1484, 0, 92, 0, 0, NULL, NULL, '2020-11-12', 1),
(93, 1249, 0, 93, 0, 0, NULL, NULL, '2020-11-12', 1),
(94, 9, 0, 94, 0, 0, NULL, NULL, '2020-11-12', 1),
(95, 2, 0, 95, 0, 0, NULL, NULL, '2020-11-12', 1),
(96, 37, 0, 96, 0, 0, NULL, NULL, '2020-11-12', 1),
(97, 12, 0, 97, 0, 0, NULL, NULL, '2020-11-12', 1),
(98, 11, 0, 98, 0, 0, NULL, NULL, '2020-11-12', 1),
(99, 37, 0, 99, 0, 0, NULL, NULL, '2020-11-12', 1),
(100, 300, 0, 100, 0, 0, NULL, NULL, '2020-11-25', 1),
(101, 30, 0, 101, 0, 0, NULL, NULL, '2020-11-25', 1),
(102, 60, 0, 102, 0, 0, NULL, NULL, '2020-11-25', 1),
(103, 2, 0, 103, 0, 0, NULL, NULL, '2020-11-25', 1),
(104, 10, 0, 104, 0, 0, NULL, NULL, '2020-11-25', 1),
(105, 600, 0, 105, 0, 0, NULL, NULL, '2020-11-25', 1),
(106, 21, 0, 106, 0, 0, NULL, NULL, '2020-11-25', 1),
(107, 180, 0, 101, 0, 0, NULL, NULL, '2020-11-26', 1),
(108, 420, 0, 100, 0, 0, NULL, NULL, '2020-11-26', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estado`
--

CREATE TABLE `estado` (
  `id_estado` int(2) NOT NULL DEFAULT 1,
  `estad` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `estado`
--

INSERT INTO `estado` (`id_estado`, `estad`) VALUES
(1, 'activo'),
(2, 'inactivo'),
(3, 'pago'),
(4, 'debe'),
(5, 'por pagar'),
(6, 'pagado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `factura1`
--

CREATE TABLE `factura1` (
  `id_venta` int(4) NOT NULL,
  `id_producto` int(2) NOT NULL,
  `costo_Producto` double NOT NULL,
  `can_producto` int(10) NOT NULL,
  `subtotal_producto` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `factura1`
--

INSERT INTO `factura1` (`id_venta`, `id_producto`, `costo_Producto`, `can_producto`, `subtotal_producto`) VALUES
(1, 99, 12, 1, 12);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `login`
--

CREATE TABLE `login` (
  `id_user` int(11) NOT NULL,
  `id_vendedor` int(15) NOT NULL,
  `user_correo` varchar(100) NOT NULL,
  `user_password` varchar(40) NOT NULL,
  `user_roll` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `login`
--

INSERT INTO `login` (`id_user`, `id_vendedor`, `user_correo`, `user_password`, `user_roll`) VALUES
(1, 1143876379, 'chinitokonfu@hotmail.com', 'jhon123', 2),
(2, 1111111111, 'ruth@hotmail.com', 'ruth123', 2),
(3, 27281794, '90carlosrojas90@gmail.com', '2662', 2),
(4, 98989898, 'CHACON@ADMIN.COM', 'mauricio123', 1),
(5, 72284137, 'jmmt1408@gmail.com', 'juan1408', 2),
(6, 8917072, 'armandogabriel03@gmail.com', 'hector8917', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `no_ventas`
--

CREATE TABLE `no_ventas` (
  `id_venta` int(4) NOT NULL,
  `total_venta` double NOT NULL,
  `transporte` varchar(20) NOT NULL,
  `fecha_venta` date NOT NULL,
  `pagado_pendiente` varchar(20) NOT NULL,
  `fecha_pago` date NOT NULL,
  `id_vendedor` int(15) DEFAULT NULL,
  `cliente` varchar(20) DEFAULT NULL,
  `id_estado` int(2) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `no_ventas`
--

INSERT INTO `no_ventas` (`id_venta`, `total_venta`, `transporte`, `fecha_venta`, `pagado_pendiente`, `fecha_pago`, `id_vendedor`, `cliente`, `id_estado`) VALUES
(1, 12, 'no', '2020-11-23', 'Pago', '2020-11-23', 8917072, 'alicia', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pasivo`
--

CREATE TABLE `pasivo` (
  `id` int(4) NOT NULL,
  `fecha` date NOT NULL DEFAULT current_timestamp(),
  `id_estado` int(2) NOT NULL,
  `valor` double NOT NULL,
  `descripcion` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `pasivo`
--

INSERT INTO `pasivo` (`id`, `fecha`, `id_estado`, `valor`, `descripcion`) VALUES
(1, '2020-11-12', 6, 0, 'Costo Producto'),
(2, '2020-11-12', 6, 0, 'Costo Producto'),
(3, '2020-11-12', 6, 0, 'Costo Producto'),
(4, '2020-11-12', 6, 0, 'Costo Producto'),
(5, '2020-11-12', 6, 0, 'Costo Producto'),
(6, '2020-11-12', 6, 0, 'Costo Producto'),
(7, '2020-11-12', 6, 0, 'Costo Producto'),
(8, '2020-11-12', 6, 0, 'Costo Producto'),
(9, '2020-11-12', 6, 0, 'Costo Producto'),
(10, '2020-11-12', 6, 0, 'Costo Producto'),
(11, '2020-11-12', 6, 0, 'Costo Producto'),
(12, '2020-11-12', 6, 0, 'Costo Producto'),
(13, '2020-11-12', 6, 0, 'Costo Producto'),
(14, '2020-11-12', 6, 0, 'Costo Producto'),
(15, '2020-11-12', 6, 0, 'Costo Producto'),
(16, '2020-11-12', 6, 0, 'Costo Producto'),
(17, '2020-11-12', 6, 0, 'Costo Producto'),
(18, '2020-11-12', 6, 0, 'Costo Producto'),
(19, '2020-11-12', 6, 0, 'Costo Producto'),
(20, '2020-11-12', 6, 0, 'Costo Producto'),
(21, '2020-11-12', 6, 0, 'Costo Producto'),
(22, '2020-11-12', 6, 0, 'Costo Producto'),
(23, '2020-11-12', 6, 0, 'Costo Producto'),
(24, '2020-11-12', 6, 0, 'Costo Producto'),
(25, '2020-11-12', 6, 0, 'Costo Producto'),
(26, '2020-11-12', 6, 0, 'Costo Producto'),
(27, '2020-11-12', 6, 0, 'Costo Producto'),
(28, '2020-11-12', 6, 0, 'Costo Producto'),
(29, '2020-11-12', 6, 0, 'Costo Producto'),
(30, '2020-11-12', 6, 0, 'Costo Producto'),
(31, '2020-11-12', 6, 0, 'Costo Producto'),
(32, '2020-11-12', 6, 0, 'Costo Producto'),
(33, '2020-11-12', 6, 0, 'Costo Producto'),
(34, '2020-11-12', 6, 0, 'Costo Producto'),
(35, '2020-11-12', 6, 0, 'Costo Producto'),
(36, '2020-11-12', 6, 0, 'Costo Producto'),
(37, '2020-11-12', 6, 0, 'Costo Producto'),
(38, '2020-11-12', 6, 0, 'Costo Producto'),
(39, '2020-11-12', 6, 0, 'Costo Producto'),
(40, '2020-11-12', 6, 0, 'Costo Producto'),
(41, '2020-11-12', 6, 0, 'Costo Producto'),
(42, '2020-11-12', 6, 0, 'Costo Producto'),
(43, '2020-11-12', 6, 0, 'Costo Producto'),
(44, '2020-11-12', 6, 0, 'Costo Producto'),
(45, '2020-11-12', 6, 0, 'Costo Producto'),
(46, '2020-11-12', 6, 0, 'Costo Producto'),
(47, '2020-11-12', 6, 0, 'Costo Producto'),
(48, '2020-11-12', 6, 0, 'Costo Producto'),
(49, '2020-11-12', 6, 0, 'Costo Producto'),
(50, '2020-11-12', 6, 0, 'Costo Producto'),
(51, '2020-11-12', 6, 0, 'Costo Producto'),
(52, '2020-11-12', 6, 0, 'Costo Producto'),
(53, '2020-11-12', 6, 0, 'Costo Producto'),
(54, '2020-11-12', 6, 0, 'Costo Producto'),
(55, '2020-11-12', 6, 0, 'Costo Producto'),
(56, '2020-11-12', 6, 0, 'Costo Producto'),
(57, '2020-11-12', 6, 0, 'Costo Producto'),
(58, '2020-11-12', 6, 0, 'Costo Producto'),
(59, '2020-11-12', 6, 0, 'Costo Producto'),
(60, '2020-11-12', 6, 0, 'Costo Producto'),
(61, '2020-11-12', 6, 0, 'Costo Producto'),
(62, '2020-11-12', 6, 0, 'Costo Producto'),
(63, '2020-11-12', 6, 0, 'Costo Producto'),
(64, '2020-11-12', 6, 0, 'Costo Producto'),
(65, '2020-11-12', 6, 0, 'Costo Producto'),
(66, '2020-11-12', 6, 0, 'Costo Producto'),
(67, '2020-11-12', 6, 0, 'Costo Producto'),
(68, '2020-11-12', 6, 0, 'Costo Producto'),
(69, '2020-11-12', 6, 0, 'Costo Producto'),
(70, '2020-11-12', 6, 0, 'Costo Producto'),
(71, '2020-11-12', 6, 0, 'Costo Producto'),
(72, '2020-11-12', 6, 0, 'Costo Producto'),
(73, '2020-11-12', 6, 0, 'Costo Producto'),
(74, '2020-11-12', 6, 0, 'Costo Producto'),
(75, '2020-11-12', 6, 0, 'Costo Producto'),
(76, '2020-11-12', 6, 0, 'Costo Producto'),
(77, '2020-11-12', 6, 0, 'Costo Producto'),
(78, '2020-11-12', 6, 0, 'Costo Producto'),
(79, '2020-11-12', 6, 0, 'Costo Producto'),
(80, '2020-11-12', 6, 0, 'Costo Producto'),
(81, '2020-11-12', 6, 0, 'Costo Producto'),
(82, '2020-11-12', 6, 0, 'Costo Producto'),
(83, '2020-11-12', 6, 0, 'Costo Producto'),
(84, '2020-11-12', 6, 0, 'Costo Producto'),
(85, '2020-11-12', 6, 0, 'Costo Producto'),
(86, '2020-11-12', 6, 0, 'Costo Producto'),
(87, '2020-11-12', 6, 0, 'Costo Producto'),
(88, '2020-11-12', 6, 0, 'Costo Producto'),
(89, '2020-11-12', 6, 0, 'Costo Producto'),
(90, '2020-11-12', 6, 0, 'Costo Producto'),
(91, '2020-11-12', 6, 0, 'Costo Producto'),
(92, '2020-11-12', 6, 0, 'Costo Producto'),
(93, '2020-11-12', 6, 0, 'Costo Producto'),
(94, '2020-11-12', 6, 0, 'Costo Producto'),
(95, '2020-11-12', 6, 0, 'Costo Producto'),
(96, '2020-11-12', 6, 0, 'Costo Producto'),
(97, '2020-11-12', 6, 0, 'Costo Producto'),
(98, '2020-11-12', 6, 0, 'Costo Producto'),
(99, '2020-11-12', 6, 0, 'Costo Producto'),
(100, '2020-11-25', 6, 0, 'Costo Producto'),
(101, '2020-11-25', 6, 0, 'Costo Producto'),
(102, '2020-11-25', 6, 0, 'Costo Producto'),
(103, '2020-11-25', 6, 0, 'Costo Producto'),
(104, '2020-11-25', 6, 0, 'Costo Producto'),
(105, '2020-11-25', 6, 0, 'Costo Producto'),
(106, '2020-11-25', 6, 0, 'Costo Producto'),
(107, '2020-11-26', 6, 0, 'Costo Producto'),
(108, '2020-11-26', 6, 0, 'Costo Producto');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `id_producto` int(2) NOT NULL,
  `nom_produc` longtext NOT NULL,
  `des_produc` varchar(100) NOT NULL,
  `valor_produc` double DEFAULT NULL,
  `costo_produc` double DEFAULT NULL,
  `valor_mayorista` double NOT NULL,
  `can_min_bod` int(10) NOT NULL,
  `id_estado` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`id_producto`, `nom_produc`, `des_produc`, `valor_produc`, `costo_produc`, `valor_mayorista`, `can_min_bod`, `id_estado`) VALUES
(1, 'mascarilla celeste vendedores', 'caja de mascarilla celeste de alta calidad , 50 unidades  ', NULL, NULL, 0, 500, 1),
(2, 'mascarilla celeste boneros', 'caja de mascarilla color celeste , 50 unidades , para boneros ', NULL, NULL, 0, 1000, 1),
(3, 'mascarilla caja rosa ', 'mascarilla de caja color rosa , de colores  50 unidades', NULL, NULL, 0, 500, 1),
(4, 'alcohol ', 'alcohol estilizado de 24 onzas ', NULL, NULL, 0, 50, 1),
(5, 'guantes M', 'guantes talla M , ley gloves 100 unidades ', NULL, NULL, 0, 10, 1),
(6, 'kn95 con filtro ', 'kn95 con filtro   ', NULL, NULL, 0, 200, 1),
(7, 'kn95 sin valvula', 'biomask frind kn95 sin valvula  color blanco', NULL, NULL, 0, 200, 1),
(8, 'mascarilla celeste paquetes de 10', 'mascarillas empaquetadas de  a 10 unidades sueltas  color celeste', NULL, NULL, 0, 300, 1),
(9, 'mascarilla quirúrgica  sin caja 50 unidades celeste', 'mascarilla quirúrgica  sin caja 50 unidades celeste ', NULL, NULL, 0, 100, 1),
(10, 'lente infantil sin pantalla ', 'careta  con lente infantil (solo lente)', NULL, NULL, 0, 300, 1),
(11, 'lentes negros', 'lente transparente con borde negro ', NULL, NULL, 0, 300, 1),
(12, 'traje corporal blanco ', 'traje protector  corporal completo de color blanco ', NULL, NULL, 0, 10, 1),
(13, 'mascarilla rosa medicada ', 'mascarilla de color rosa medicada ', NULL, NULL, 0, 200, 1),
(14, 'lente protector grande ', 'lente grande de color  negro   ', NULL, NULL, 0, 10, 1),
(15, 'careta de niño ', 'careta mas lente infantil ', NULL, NULL, 0, 50, 1),
(16, 'careta con lente adulto  ', 'careta de adulto completa ', NULL, NULL, 0, 50, 1),
(17, 'careta de niño con lente   (SOLO CARETA)', 'careta infantil  con lente (solo careta   mixtos) ', NULL, NULL, 0, 40, 1),
(18, 'deportiva azul ', 'mascarilla deportiva de  color azul', NULL, NULL, 0, 30, 1),
(19, 'mascarilla color  negro', 'caja de mascarilla color negro , de 50 unidades', NULL, NULL, 0, 400, 1),
(20, 'paquete de mascarilla rosa y negra ', 'paquetes armados de color rosa y negra paquetes de 10 ', NULL, NULL, 0, 300, 1),
(21, 'careta con lente de adulto (solo pantalla) ', 'careta con lente (solo pantalla)', NULL, NULL, 0, 200, 1),
(22, 'paquete de 10 mascarilla negra', 'mascarilla color negra , paquetes de 10 ', NULL, NULL, 0, 300, 1),
(23, 'filtros deportivas', 'filtro extraíble para mascarillas deportivas ', NULL, NULL, 0, 300, 1),
(24, 'mascarilla mix color ', 'caja de mascarilla 50 unidades mix color', NULL, NULL, 0, 200, 1),
(25, 'liga negra', 'ligas color negro', NULL, NULL, 0, 100, 1),
(26, 'ligas  amarillas', 'ligas color amarilla', NULL, NULL, 0, 300, 1),
(27, 'ligas celestes', 'ligas de color celestes', NULL, NULL, 0, 300, 1),
(28, 'ligas blancas', 'ligas color blanco ', NULL, NULL, 0, 300, 1),
(29, 'ligas rosas ', 'ligas color rosas ', NULL, NULL, 0, 200, 1),
(30, 'perfume spray', 'perfume spray ', NULL, NULL, 0, 1, 1),
(31, 'ligas verdes ', 'ligas de color verde ', NULL, NULL, 0, 200, 1),
(32, 'corn flakes ', 'caja de corn flakes ', NULL, NULL, 0, 1, 1),
(33, 'humificador', 'nanahumificador', NULL, NULL, 0, 100, 1),
(34, 'careta con lente adulto  (solo lente)', 'careta con lente adulto (solo lente)', NULL, NULL, 0, 200, 1),
(35, 'alcohol gel xtraker  ', 'alcohol gel xtraker 60 ml ', NULL, NULL, 0, 50, 1),
(36, 'alcohol gel xtraker  ', 'alcohol gel xtraker 90 ml ', NULL, NULL, 0, 10, 1),
(37, 'toallas  humedas hombre araña ', 'toallas humedas del hombre araña ', NULL, NULL, 0, 3, 1),
(38, 'isopos ', 'isopos del hombre araña 150 unidades', NULL, NULL, 0, 3, 1),
(39, 'perfumitos loval', 'regalias perfumitos  35 ml marca loval', NULL, NULL, 0, 3, 1),
(40, 'refrescante de boca ', 'fresh maindy 30 ml ', NULL, NULL, 0, 1, 1),
(41, 'alcohol 40 ml', 'alcohol 40 ml dippin dots', NULL, NULL, 0, 4, 1),
(42, 'alcohol  dobble bobble', 'alcohol marca dobble bobble 40 ml ', NULL, NULL, 0, 2, 1),
(43, 'alcohol gel  meng yu ', 'alcohol gel 60 ml ', NULL, NULL, 0, 2, 1),
(44, 'trapos de cocina ', 'regalias trapos de cocina', NULL, NULL, 0, 3, 1),
(45, 'sarten antiaderente ', 'sarten de teflon antiadherente  + espatula de plastico ', NULL, NULL, 0, 2, 1),
(46, 'toalla de baño', 'toallas de baño ', NULL, NULL, 0, 3, 1),
(47, 'careta de niño mixta sin lenta ', 'careta de niño sin lente diferentes modelos', NULL, NULL, 0, 30, 1),
(48, 'mascarilla deportiva  verde fosforecente', 'mascarilla deportiva verde fosforecente', NULL, NULL, 0, 20, 1),
(49, 'faceshield', 'faceshield azul con espuma', NULL, NULL, 0, 40, 1),
(50, 'faceshield en mal estado azul', 'faceshield dañadas de color azul ', NULL, NULL, 0, 0, 1),
(51, 'alcohol gel xtra  en mal estado ', 'alcohol gel en mal estado', NULL, NULL, 0, 0, 1),
(52, 'alcohol gel genesis mal estado ', 'producto dañado', NULL, NULL, 0, 0, 1),
(53, 'alcohol atomizador mal estado ', 'producto dañado', NULL, NULL, 0, 0, 1),
(54, 'alcohol atomizador marca index  mal estado  ', 'producto dañado', NULL, NULL, 0, 0, 1),
(55, 'suavitel completo ', 'suavitel jabon liquido ', NULL, NULL, 0, 2, 1),
(56, 'jabon de baño ruby ', 'jabon de baño ruby', NULL, NULL, 0, 2, 1),
(57, 'jabon de baño dex', 'jabon de baño ', NULL, NULL, 0, 2, 1),
(58, 'detergente khlove', 'jabon en polvo', NULL, NULL, 0, 1, 1),
(59, 'jabon adc', 'jabon blanco en polvo', NULL, NULL, 0, 1, 1),
(60, 'papel higienico sofia', 'rollo de papel higienico sofia', NULL, NULL, 0, 1, 1),
(61, 'tazas ', 'tazas de porcelana de te ', NULL, NULL, 0, 10, 1),
(62, 'dispensador touch soap', 'caja azul , dispensador manual para jabon ', NULL, NULL, 0, 4, 1),
(63, 'vasos plasticos con carriso', 'vasos plasticos para niño con carriso', NULL, NULL, 0, 4, 1),
(64, 'oximetro', 'pulse oximetro shen zhen ', NULL, NULL, 0, 2, 1),
(65, 'oximetro modelo A2', 'oximetro model A2', NULL, NULL, 0, 2, 1),
(66, 'lysol  ', 'lysol 12 onzas', NULL, NULL, 0, 10, 1),
(67, 'lysol  wipes', 'lysol wipes ', NULL, NULL, 0, 2, 1),
(68, 'auto brigth windows', 'limpiador de ventanas de auto', NULL, NULL, 0, 1, 1),
(69, 'mr musculo ', 'mr musculo de 1200 ml ', NULL, NULL, 0, 1, 1),
(70, 'detergente ace ', 'jabon liquido de 2 L', NULL, NULL, 0, 1, 1),
(71, 'dispensador saco  pequeño', 'transparente pequeño', NULL, NULL, 0, 2, 1),
(72, 'dispensador saco pequeño ', 'dispensador pequeño ', NULL, NULL, 0, 3, 1),
(73, 'dispensador saco largo', 'dispensador manual , largo', NULL, NULL, 0, 2, 1),
(74, 'hibigel mediano ', 'hibigel mediano ', NULL, NULL, 0, 1, 1),
(75, 'paquete combinados rosa y negra 40 unidades', 'mascarillas  de color rosa y negra combinados , de 40 unidades', NULL, NULL, 0, 10, 1),
(76, 'liquido para nebulizar ', 'liquido para nebulizar de 4 onzas', NULL, NULL, 0, 1, 1),
(77, 'faceshield de niño vaca', 'facheshield de niño de modelo con vaca  ', NULL, NULL, 0, 100, 1),
(78, 'facheshield de niño  modelo con tigre', 'facheshield de niño  modelo tigre', NULL, NULL, 0, 100, 1),
(79, 'facheshield de niño  modelo  pollo', 'facheshield de niño  modelo pollo', NULL, NULL, 0, 100, 1),
(80, 'facheshield de niño  modelo oveja', 'facheshield de niño  modelo oveja', NULL, NULL, 0, 100, 1),
(81, 'facheshield de niño  modelo perro', 'facheshield de niño  modelo perro', NULL, NULL, 0, 100, 1),
(82, 'facheshield de niño  modelo oso', 'facheshield de niño  modelo oso', NULL, NULL, 0, 100, 1),
(83, 'facheshield de niño  modelo mono', 'facheshield de niño  modelo mono', NULL, NULL, 0, 100, 1),
(84, 'facheshield de niño  modelo cabra', 'facheshield de niño  modelo  cabra', NULL, NULL, 0, 50, 1),
(85, 'facheshield de niño  modelo serpiente', 'facheshield de niño  modelo serpiente', NULL, NULL, 0, 10, 1),
(86, 'facheshield de niño  modelo gato', 'facheshield de niño  modelo gato', NULL, NULL, 0, 100, 1),
(87, 'facheshield sn esponja mixta', 'faceshiel modelo mixtos sin esponja', NULL, NULL, 0, 10, 1),
(88, 'faceshield armada con esponja', 'faceshield  armada en bolsa con su respectiva espuma  modelos mixtas', NULL, NULL, 0, 10, 1),
(89, 'mascarilla rosa no medicada', 'caja de mascarilla color rosa , 50 unidades no medicada', NULL, NULL, 0, 300, 1),
(90, 'cervezas', 'cervezas en lata', NULL, NULL, 0, 10, 1),
(91, 'maquina nebulizadora', 'maquina para nebulizar ', NULL, NULL, 0, 1, 1),
(92, 'lentes transparentes', 'lentes transparentes', NULL, NULL, 0, 100, 1),
(93, 'valvula  para deportiva', 'valvula extraible para deportiva', NULL, NULL, 0, 100, 1),
(94, 'termometro', 'termometro laser ', NULL, NULL, 0, 20, 1),
(95, 'mascarilla deportiva gris', 'mascarilla deportiva color gris ', NULL, NULL, 0, 20, 1),
(96, 'mascarilla deportiva negra', 'mascarilla deportiva color negra ', NULL, NULL, 0, 20, 1),
(97, 'mascarilla deportiva color rosada', 'mascarilla deportiva color rosa  ', NULL, NULL, 0, 20, 1),
(98, 'cubrezapatos desechables', 'cubrezapatos desechables', NULL, NULL, 0, 10, 1),
(99, 'cubrezapatos quirurgicos ', 'cubre zapatos quirurgicos ', NULL, NULL, 0, 10, 1),
(100, 'mascarilla quirúrgica navideña de  niño', 'mascarilla de modelo de navidad con tamaño  ideal para niño ', NULL, NULL, 0, 10, 1),
(101, 'mascarilla quirúrgica navideña de adulto', 'mascarilla de estilo navideño con tamaño ideal para adulto', NULL, NULL, 0, 10, 1),
(102, 'mascarilla quirurgica camuflada mariposa', 'caja mascarilla estilo mariposa  con 50 unidades', NULL, NULL, 0, 10, 1),
(103, 'mascarilla quirúrgica de color  rojo vino', 'caja de mascarilla de color rojo vino ', NULL, NULL, 0, 10, 1),
(104, 'mascarilla  quirurgica camuflada de niño ', 'caja de mascarilla de 50 unidades  de estilo camuflada ideal para niños', NULL, NULL, 0, 10, 1),
(105, 'mascarilla mix color nueva', 'mascarilla de diferentes colores ', NULL, NULL, 0, 10, 1),
(106, 'mascarilla quirurgica niño ', 'mascarilla quirurgica de 50 unidades ideal para niños', NULL, NULL, 0, 10, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `report_entrega_vendedor`
--

CREATE TABLE `report_entrega_vendedor` (
  `id_vendedor` int(15) NOT NULL,
  `id_producto` int(2) NOT NULL,
  `can_produc` int(11) NOT NULL,
  `costo_produc` double NOT NULL,
  `comision_produc` double NOT NULL,
  `id_report_entrega` int(3) NOT NULL,
  `fecha_entrega` date NOT NULL DEFAULT current_timestamp(),
  `devolucion` int(20) DEFAULT NULL,
  `vendido` int(20) NOT NULL,
  `comisionxproduc` double NOT NULL,
  `valorxproducto` double NOT NULL,
  `comision_total` int(11) NOT NULL,
  `valor_total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `report_entrega_vendedor`
--

INSERT INTO `report_entrega_vendedor` (`id_vendedor`, `id_producto`, `can_produc`, `costo_produc`, `comision_produc`, `id_report_entrega`, `fecha_entrega`, `devolucion`, `vendido`, `comisionxproduc`, `valorxproducto`, `comision_total`, `valor_total`) VALUES
(72284137, 1, 1, 3, 1, 43, '2020-11-23', 0, 1, 1, 3, 1, 3),
(72284137, 2, 0, 0, 0, 44, '2020-11-23', 0, 0, 0, 0, 1, 3),
(72284137, 3, 0, 0, 0, 45, '2020-11-23', 0, 0, 0, 0, 1, 3),
(72284137, 8, 0, 0, 0, 46, '2020-11-23', 0, 0, 0, 0, 1, 3),
(72284137, 9, 0, 0, 0, 47, '2020-11-23', 0, 0, 0, 0, 1, 3),
(72284137, 13, 0, 0, 0, 48, '2020-11-23', 0, 0, 0, 0, 1, 3),
(72284137, 15, 0, 0, 0, 49, '2020-11-23', 0, 0, 0, 0, 1, 3),
(72284137, 16, 0, 0, 0, 50, '2020-11-23', 0, 0, 0, 0, 1, 3),
(72284137, 17, 0, 0, 0, 51, '2020-11-23', 0, 0, 0, 0, 1, 3),
(72284137, 19, 0, 0, 0, 52, '2020-11-23', 0, 0, 0, 0, 1, 3),
(72284137, 20, 0, 0, 0, 53, '2020-11-23', 0, 0, 0, 0, 1, 3),
(72284137, 21, 0, 0, 0, 54, '2020-11-23', 0, 0, 0, 0, 1, 3),
(72284137, 22, 0, 0, 0, 55, '2020-11-23', 0, 0, 0, 0, 1, 3),
(72284137, 24, 0, 0, 0, 56, '2020-11-23', 0, 0, 0, 0, 1, 3),
(72284137, 34, 0, 0, 0, 57, '2020-11-23', 0, 0, 0, 0, 1, 3),
(72284137, 47, 0, 0, 0, 58, '2020-11-23', 0, 0, 0, 0, 1, 3),
(72284137, 48, 0, 0, 0, 59, '2020-11-23', 0, 0, 0, 0, 1, 3),
(72284137, 89, 0, 0, 0, 60, '2020-11-23', 0, 0, 0, 0, 1, 3),
(72284137, 95, 0, 0, 0, 61, '2020-11-23', 0, 0, 0, 0, 1, 3),
(72284137, 96, 0, 0, 0, 62, '2020-11-23', 0, 0, 0, 0, 1, 3),
(72284137, 97, 0, 0, 0, 63, '2020-11-23', 0, 0, 0, 0, 1, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roll_user`
--

CREATE TABLE `roll_user` (
  `id_roll` int(2) NOT NULL,
  `roll` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `roll_user`
--

INSERT INTO `roll_user` (`id_roll`, `roll`) VALUES
(1, 'admin'),
(2, 'vendedor');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vendedor`
--

CREATE TABLE `vendedor` (
  `id_vendedor` int(15) NOT NULL,
  `nom_vendedor` varchar(40) NOT NULL,
  `apelli_vendedor` varchar(40) NOT NULL,
  `tel_vendedor` int(12) NOT NULL,
  `dire_vendedor` varchar(100) NOT NULL,
  `correo_vendedor` varchar(100) NOT NULL,
  `causa_retiro` varchar(1000) DEFAULT NULL,
  `user_roll` int(2) NOT NULL,
  `id_estado` int(2) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `vendedor`
--

INSERT INTO `vendedor` (`id_vendedor`, `nom_vendedor`, `apelli_vendedor`, `tel_vendedor`, `dire_vendedor`, `correo_vendedor`, `causa_retiro`, `user_roll`, `id_estado`) VALUES
(8917072, 'hector armando', 'moreno caraquito', 60455741, 'mano de piedra', 'armandogabriel03@gmail.com', NULL, 2, 1),
(27281794, 'carlos javier', 'rojas rodriguez', 69688680, 'villa grecia', '90carlosrojas90@gmail.com', NULL, 2, 1),
(72284137, 'juan carlos', 'cera bolaños ', 62232577, 'santa Ana', 'jmmt1408@gmail.com', NULL, 2, 1),
(98989898, 'MAURICIO ', 'CHACON', 66087474, 'CHORRILO', 'CHACON@ADMIN.COM', NULL, 1, 1),
(1111111111, 'RUTH ', 'ORDOÑEZ', 62242901, 'san miguelito ', 'ruth@hotmail.com', NULL, 1, 1),
(1143876379, 'jhon steven', 'agudelo murillo', 67071768, 'tumba muerto-condado del rey', 'chinitokonfu@hotmail.com', NULL, 2, 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `activo`
--
ALTER TABLE `activo`
  ADD PRIMARY KEY (`id`),
  ADD KEY `estado` (`estado`);

--
-- Indices de la tabla `bodega`
--
ALTER TABLE `bodega`
  ADD PRIMARY KEY (`id_bodega`),
  ADD KEY `id_producto` (`id_producto`),
  ADD KEY `id_estado` (`id_estado`);

--
-- Indices de la tabla `estado`
--
ALTER TABLE `estado`
  ADD PRIMARY KEY (`id_estado`);

--
-- Indices de la tabla `factura1`
--
ALTER TABLE `factura1`
  ADD KEY `id_producto` (`id_producto`),
  ADD KEY `id_venta` (`id_venta`);

--
-- Indices de la tabla `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `id_vendedor` (`id_vendedor`),
  ADD KEY `user_roll` (`user_roll`);

--
-- Indices de la tabla `no_ventas`
--
ALTER TABLE `no_ventas`
  ADD PRIMARY KEY (`id_venta`),
  ADD KEY `id_vendedor` (`id_vendedor`),
  ADD KEY `id_estado` (`id_estado`);

--
-- Indices de la tabla `pasivo`
--
ALTER TABLE `pasivo`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_estado` (`id_estado`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`id_producto`),
  ADD KEY `id_estado` (`id_estado`);

--
-- Indices de la tabla `report_entrega_vendedor`
--
ALTER TABLE `report_entrega_vendedor`
  ADD PRIMARY KEY (`id_report_entrega`),
  ADD KEY `id_vendedor` (`id_vendedor`),
  ADD KEY `id_producto` (`id_producto`);

--
-- Indices de la tabla `roll_user`
--
ALTER TABLE `roll_user`
  ADD PRIMARY KEY (`id_roll`);

--
-- Indices de la tabla `vendedor`
--
ALTER TABLE `vendedor`
  ADD PRIMARY KEY (`id_vendedor`),
  ADD KEY `user_roll` (`user_roll`),
  ADD KEY `id_estado` (`id_estado`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `activo`
--
ALTER TABLE `activo`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `pasivo`
--
ALTER TABLE `pasivo`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=109;

--
-- AUTO_INCREMENT de la tabla `report_entrega_vendedor`
--
ALTER TABLE `report_entrega_vendedor`
  MODIFY `id_report_entrega` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `activo`
--
ALTER TABLE `activo`
  ADD CONSTRAINT `activo_ibfk_1` FOREIGN KEY (`estado`) REFERENCES `estado` (`id_estado`);

--
-- Filtros para la tabla `bodega`
--
ALTER TABLE `bodega`
  ADD CONSTRAINT `bodega_ibfk_1` FOREIGN KEY (`id_producto`) REFERENCES `producto` (`id_producto`),
  ADD CONSTRAINT `bodega_ibfk_2` FOREIGN KEY (`id_estado`) REFERENCES `estado` (`id_estado`);

--
-- Filtros para la tabla `factura1`
--
ALTER TABLE `factura1`
  ADD CONSTRAINT `factura1_ibfk_1` FOREIGN KEY (`id_producto`) REFERENCES `producto` (`id_producto`),
  ADD CONSTRAINT `factura1_ibfk_2` FOREIGN KEY (`id_venta`) REFERENCES `no_ventas` (`id_venta`),
  ADD CONSTRAINT `factura1_ibfk_3` FOREIGN KEY (`id_venta`) REFERENCES `no_ventas` (`id_venta`);

--
-- Filtros para la tabla `login`
--
ALTER TABLE `login`
  ADD CONSTRAINT `login_ibfk_1` FOREIGN KEY (`id_vendedor`) REFERENCES `vendedor` (`id_vendedor`),
  ADD CONSTRAINT `login_ibfk_2` FOREIGN KEY (`user_roll`) REFERENCES `roll_user` (`id_roll`);

--
-- Filtros para la tabla `no_ventas`
--
ALTER TABLE `no_ventas`
  ADD CONSTRAINT `no_ventas_ibfk_1` FOREIGN KEY (`id_vendedor`) REFERENCES `vendedor` (`id_vendedor`),
  ADD CONSTRAINT `no_ventas_ibfk_2` FOREIGN KEY (`id_estado`) REFERENCES `estado` (`id_estado`);

--
-- Filtros para la tabla `pasivo`
--
ALTER TABLE `pasivo`
  ADD CONSTRAINT `pasivo_ibfk_1` FOREIGN KEY (`id_estado`) REFERENCES `estado` (`id_estado`);

--
-- Filtros para la tabla `producto`
--
ALTER TABLE `producto`
  ADD CONSTRAINT `producto_ibfk_1` FOREIGN KEY (`id_estado`) REFERENCES `estado` (`id_estado`);

--
-- Filtros para la tabla `report_entrega_vendedor`
--
ALTER TABLE `report_entrega_vendedor`
  ADD CONSTRAINT `report_entrega_vendedor_ibfk_1` FOREIGN KEY (`id_vendedor`) REFERENCES `vendedor` (`id_vendedor`),
  ADD CONSTRAINT `report_entrega_vendedor_ibfk_2` FOREIGN KEY (`id_producto`) REFERENCES `producto` (`id_producto`);

--
-- Filtros para la tabla `vendedor`
--
ALTER TABLE `vendedor`
  ADD CONSTRAINT `vendedor_ibfk_1` FOREIGN KEY (`user_roll`) REFERENCES `roll_user` (`id_roll`),
  ADD CONSTRAINT `vendedor_ibfk_2` FOREIGN KEY (`id_estado`) REFERENCES `estado` (`id_estado`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
