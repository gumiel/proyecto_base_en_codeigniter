-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 27-12-2019 a las 17:39:06
-- Versión del servidor: 10.4.6-MariaDB
-- Versión de PHP: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `proyecto_base_en_codeigniter`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cobrado_mensual`
--

CREATE TABLE `cobrado_mensual` (
  `id_cobrado_mensual` int(11) NOT NULL,
  `monto_mensual` float NOT NULL,
  `id_factura` int(11) NOT NULL,
  `id_cobrado_total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cobrado_total`
--

CREATE TABLE `cobrado_total` (
  `id_cobrado_total` int(11) NOT NULL,
  `monto_total` float NOT NULL,
  `fecha_cobro` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `consumidor`
--

CREATE TABLE `consumidor` (
  `id_consumidor` int(11) NOT NULL,
  `nombres` varchar(100) NOT NULL,
  `paterno` varchar(100) NOT NULL,
  `materno` varchar(100) NOT NULL,
  `doc_identidad` int(11) NOT NULL,
  `direccion` varchar(200) NOT NULL,
  `genero` varchar(10) NOT NULL,
  `codigo` int(11) NOT NULL,
  `nro_medidor` int(11) NOT NULL,
  `estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `factura`
--

CREATE TABLE `factura` (
  `id_factura` int(11) NOT NULL,
  `fecha_emision` date NOT NULL,
  `fecha_vencimiento` date NOT NULL,
  `monto_deuda` float NOT NULL,
  `nro_factura` int(11) NOT NULL,
  `id_consumidor` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `logs`
--

CREATE TABLE `logs` (
  `id` int(11) NOT NULL,
  `errno` int(2) NOT NULL,
  `errtype` varchar(32) NOT NULL,
  `errstr` text NOT NULL,
  `errfile` varchar(255) NOT NULL,
  `errline` int(4) NOT NULL,
  `user_agent` varchar(120) NOT NULL,
  `ip_address` varchar(45) NOT NULL DEFAULT '0',
  `time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permiso`
--

CREATE TABLE `permiso` (
  `id_permiso` int(11) NOT NULL,
  `nombre_permiso` varchar(200) NOT NULL,
  `estado` int(11) NOT NULL,
  `id_ruta` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol`
--

CREATE TABLE `rol` (
  `id_rol` int(11) NOT NULL,
  `denominacion` varchar(20) NOT NULL,
  `descripcion` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `rol`
--

INSERT INTO `rol` (`id_rol`, `denominacion`, `descripcion`) VALUES
(1, 'admin', 'administrador'),
(2, 'invitado', 'usuario que solo es invitado y ve lo basico');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol_asignado`
--

CREATE TABLE `rol_asignado` (
  `id_rol_asignado` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `id_rol` int(11) NOT NULL,
  `fecha_asignacion` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ruta`
--

CREATE TABLE `ruta` (
  `id_ruta` int(11) NOT NULL,
  `denominacion` varchar(30) NOT NULL,
  `descripcion` varchar(300) NOT NULL,
  `id_rol` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ruta_asignado`
--

CREATE TABLE `ruta_asignado` (
  `id_ruta_asignado` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `id_ruta` int(11) NOT NULL,
  `fecha_asignacion` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id_usuario` int(11) NOT NULL,
  `email` varchar(20) NOT NULL,
  `cuenta` varchar(20) NOT NULL,
  `clave` varchar(500) NOT NULL,
  `fecha_creacion` datetime NOT NULL,
  `fecha_modificacion` datetime DEFAULT NULL,
  `id_usuario_creacion` int(11) NOT NULL,
  `id_usuario_modificacion` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `email`, `cuenta`, `clave`, `fecha_creacion`, `fecha_modificacion`, `id_usuario_creacion`, `id_usuario_modificacion`) VALUES
(14, 'admin@gmail.com', 'admin', 'e30493eb2e6264065df10b128e6aded536a74d77a6fae40799db22dc809cee2473a84c6cc21fa70bf5bdc79e2063a97da2eea8c27262528ca38cf14ffb82d2fdiXRFemRaeERVMCwbThJ3JB+xUhmf0cgmxkELY/MiKsY=', '2019-12-27 06:12:00', NULL, 1, NULL),
(16, 'henry@gmail.com', 'henry', 'e30493eb2e6264065df10b128e6aded536a74d77a6fae40799db22dc809cee2473a84c6cc21fa70bf5bdc79e2063a97da2eea8c27262528ca38cf14ffb82d2fdiXRFemRaeERVMCwbThJ3JB+xUhmf0cgmxkELY/MiKsY=', '2019-12-27 00:00:00', NULL, 1, NULL),
(17, 'jojo@asd.com', 'jojo', '21add872ffe4eb3aa44da991f5489a0535656de1652c32eec5b439c7bd1116a4947f7b206fa708edc981ff2abaf1be40a2f3bce6a762adac204031de5c2bc4faDZIN0Aq56JFBY0DI+CYeEbPapN8jq1yNOcvxn9lkx7c=', '0000-00-00 00:00:00', NULL, 0, NULL);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cobrado_mensual`
--
ALTER TABLE `cobrado_mensual`
  ADD PRIMARY KEY (`id_cobrado_mensual`);

--
-- Indices de la tabla `cobrado_total`
--
ALTER TABLE `cobrado_total`
  ADD PRIMARY KEY (`id_cobrado_total`);

--
-- Indices de la tabla `factura`
--
ALTER TABLE `factura`
  ADD UNIQUE KEY `id_factura_2` (`id_factura`),
  ADD KEY `id_factura` (`id_factura`);

--
-- Indices de la tabla `logs`
--
ALTER TABLE `logs`
  ADD PRIMARY KEY (`id`,`ip_address`,`user_agent`);

--
-- Indices de la tabla `permiso`
--
ALTER TABLE `permiso`
  ADD PRIMARY KEY (`id_permiso`);

--
-- Indices de la tabla `rol`
--
ALTER TABLE `rol`
  ADD PRIMARY KEY (`id_rol`);

--
-- Indices de la tabla `rol_asignado`
--
ALTER TABLE `rol_asignado`
  ADD PRIMARY KEY (`id_rol_asignado`);

--
-- Indices de la tabla `ruta`
--
ALTER TABLE `ruta`
  ADD PRIMARY KEY (`id_ruta`);

--
-- Indices de la tabla `ruta_asignado`
--
ALTER TABLE `ruta_asignado`
  ADD PRIMARY KEY (`id_ruta_asignado`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `cobrado_mensual`
--
ALTER TABLE `cobrado_mensual`
  MODIFY `id_cobrado_mensual` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `cobrado_total`
--
ALTER TABLE `cobrado_total`
  MODIFY `id_cobrado_total` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `factura`
--
ALTER TABLE `factura`
  MODIFY `id_factura` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `logs`
--
ALTER TABLE `logs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `permiso`
--
ALTER TABLE `permiso`
  MODIFY `id_permiso` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `rol`
--
ALTER TABLE `rol`
  MODIFY `id_rol` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `rol_asignado`
--
ALTER TABLE `rol_asignado`
  MODIFY `id_rol_asignado` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `ruta`
--
ALTER TABLE `ruta`
  MODIFY `id_ruta` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `ruta_asignado`
--
ALTER TABLE `ruta_asignado`
  MODIFY `id_ruta_asignado` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
