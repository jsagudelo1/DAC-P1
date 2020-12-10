-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 10-11-2020 a las 04:56:51
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
-- Base de datos: `dac&p1`
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
(1, 'venta', 22, '0000-00-00', 3),
(2, 'inyeccion', 40, '0000-00-00', 3);

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
(2, 6, 0, 1, NULL, NULL, 100, NULL, '2020-07-02', 1),
(21, 8820, 1000, 2, 0.5, 2, 100, 10, '2020-04-06', 1),
(23, 2, 20, 1, 2, 5, 20, 30, '2020-02-13', 2),
(31, 9904, 0, 2, NULL, NULL, 100, NULL, '2020-06-02', 2);

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
(12, 2, 3, 2, 6),
(13, 1, 3, 2, 6),
(13, 3, 5, 2, 10),
(3, 2, 3, 64, 192),
(222, 1, 2, 400000, 800000),
(12222, 2, 2, 30, 60),
(1334, 2, 3, 10000, 30000),
(13334, 2, 3, 10000, 30000),
(123, 2, 3, 10000, 30000),
(121, 1, 2, 10000, 20000),
(9, 2, 23, 10000, 230000),
(22, 1, 4, 235, 940),
(1222, 1, 4, 235, 940),
(44, 1, 4, 235, 940),
(33, 1, 4, 235, 940),
(122, 1, 4, 235, 940),
(2222, 1, 4, 235, 940),
(134, 1, 4, 235, 940),
(3444, 1, 4, 235, 940),
(167, 1, 22, 30, 660),
(432, 1, 10, 20, 200),
(432, 2, 2, 34, 68),
(432, 3, 22, 3322, 73084),
(1, 2, 2, 80, 160),
(1, 1, 2, 200, 400),
(56, 1, 23, 62, 1426),
(56, 2, 45, 66, 2970);

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
(1, 1143876379, 'jhon.agudelo@hotmail.com', 'jhon123', 1),
(2, 129873839, 'admin@hotmail.com', '123', 2);

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
(1, 560, 'eliecer', '2020-10-19', 'Pago', '2020-10-19', 89952057, 'michel dayeimis', 1),
(3, 192, 'elicer ', '2020-10-14', 'Pago', '2020-10-14', 890890, 'sandro', 1),
(9, 230000, 'ELIEVER', '2020-10-18', 'Pago', '2020-10-17', 21321, 'ADOLFO', 1),
(12, 6, 'eliecer', '2020-10-14', 'Pago', '2020-10-15', 21321, 'maria', 1),
(13, 16, 'eliecer', '2020-10-14', 'Debe', '2020-12-31', 1143876379, 'yealim', 1),
(22, 984, '21', '2020-10-18', 'Pago', '2020-10-19', 21321, '222', 1),
(31, 0, 'eliecer', '2020-10-09', 'pagado', '0000-00-00', 1143876379, NULL, 1),
(33, 984, '333', '2020-10-18', 'Pago', '2020-10-12', 21321, 'eee', 1),
(44, 984, 'rrr', '2020-10-18', 'Pago', '2020-10-18', 890890, 'rrrrr', 1),
(56, 4396, 'eliecer', '2020-10-20', 'Pago', '2020-10-20', 89952057, 'lilil', 1),
(121, 20000, 'eliecer', '2020-10-18', 'Pago', '2020-10-17', 890890, 'adolfo', 1),
(122, 984, 'www', '2020-10-18', 'Debe', '2020-10-19', 890890, 'www', 1),
(123, 30000, 'u', '2020-10-17', 'Pago', '0001-01-01', 890890, 'jajaja', 1),
(134, 984, 'eliecer', '2020-10-19', 'Pago', '2020-10-19', 21321, 'olAAA', 1),
(167, 660, 'ELIECER', '2020-10-19', 'Pago', '2020-10-19', 129873839, 'ALICIA', 1),
(222, 800000, 'ekkeeke', '2020-10-17', 'Pago', '2020-10-17', 21321, 'kskkss', 1),
(432, 73352, 'ELIECER', '2020-10-19', 'Pago', '2020-10-19', 890890, 'FERNANDO', 1),
(1222, 984, 'cliente', '2020-10-18', 'Pago', '2020-10-20', 21321, 'isdoiis', 1),
(1334, 30000, 'eliecer', '2020-10-17', 'Pago', '2020-10-17', 890890, 'ksksks', 1),
(2222, 984, '3333', '2020-10-18', 'Pago', '2020-10-11', 21321, 'eeee', 1),
(3444, 984, 'ELIECER', '2020-10-19', 'Pago', '2020-10-19', 21321, 'esto es una prueba', 1),
(12222, 60, 'skksks', '2020-10-17', 'Pago', '2020-10-17', 21321, 'lalal', 1),
(13334, 30000, 'wjkwjwk', '2020-10-17', 'Debe', '2020-10-17', 21321, 'wjjwj', 1);

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
(1, 'mascarilla quirurgica', 'mascarilla quirurgica , color azul , triple capa , anti fluidos , anti polen ', 0, 1.9, 2.5, 10, 2),
(2, 'careta con lentes ', 'lentes con gomas azules , mas pantalla de protección ', NULL, NULL, 0, 100, 2),
(3, 'faceshield', ' careta transparente con cinta posterior de color  azul , ideal para adultos ', NULL, NULL, 1.25, 10, 1),
(4, 'alcohol', 'botella alcohol con atomizador , de 94 onzas', NULL, NULL, 2, 10, 1),
(5, 'termometro', 'termometro laser , baterias AA', NULL, NULL, 12, 10, 1);

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
(129873839, 1, 33, 3, 3, 39, '2020-11-01', NULL, 0, 0, 0, 0, 0),
(129873839, 2, 4, 4, 4, 40, '2020-11-01', NULL, 0, 0, 0, 0, 0),
(129873839, 3, 4, 4, 4, 41, '2020-11-01', NULL, 0, 0, 0, 0, 0),
(129873839, 4, 4, 4, 4, 42, '2020-11-01', NULL, 0, 0, 0, 0, 0),
(129873839, 5, 4, 4, 4, 43, '2020-11-01', NULL, 0, 0, 0, 0, 0),
(21321, 1, 2, 6, 6, 44, '2020-11-01', 1, 1, 6, 6, 168, 168),
(21321, 2, 7, 7, 7, 45, '2020-11-01', 3, 4, 28, 28, 168, 168),
(21321, 3, 8, 8, 8, 46, '2020-11-01', 3, 5, 40, 40, 168, 168),
(21321, 4, 9, 9, 9, 47, '2020-11-01', 3, 6, 54, 54, 168, 168),
(21321, 5, 8, 8, 8, 48, '2020-11-01', 3, 5, 40, 40, 168, 168),
(129873839, 1, 12, 3.5, 1, 49, '2020-11-04', 0, 4, 4, 14, 11, 42),
(129873839, 2, 2, 1.5, 0.5, 50, '2020-11-04', 0, 0, 0, 0, 11, 42),
(129873839, 3, 3, 2, 0.5, 51, '2020-11-04', 0, 2, 1, 4, 11, 42),
(129873839, 4, 2, 3, 0.5, 52, '2020-11-04', 0, 2, 1, 6, 11, 42),
(129873839, 5, 1, 18, 5, 53, '2020-11-04', 0, 1, 5, 18, 11, 42);

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
(1, 'vendedor'),
(2, 'admin');

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
(21321, 'JESUS', 'de la  cruz', 2312, 'sjsjsjss', 'hasjhasdjh@gakas.com', 'bajo rendimiento', 2, 2),
(890890, 'jhon', 'agudelo', 98898, '', 'hasjhasdjh@gakas.com', NULL, 1, 2),
(89952057, 'daniela michel', 'bastista castillo', 67081431, '', '', NULL, 1, 1),
(129873839, 'mauricio ', 'chacon chacon', 0, '', '', NULL, 2, 1),
(1143876379, 'jhon steven ', 'agudelo murillo', 0, '', '', NULL, 1, 1);

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
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `pasivo`
--
ALTER TABLE `pasivo`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `report_entrega_vendedor`
--
ALTER TABLE `report_entrega_vendedor`
  MODIFY `id_report_entrega` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

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
