-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 31-01-2020 a las 17:57:12
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
-- Estructura de tabla para la tabla `com_atributo_producto`
--

CREATE TABLE `com_atributo_producto` (
  `id_atributo_producto` int(11) NOT NULL,
  `nombre_atributo` varchar(200) NOT NULL,
  `id_usuario_creacion` int(11) NOT NULL,
  `id_usuario_modificacion` int(11) DEFAULT NULL,
  `fecha_creacion` datetime NOT NULL DEFAULT current_timestamp(),
  `fecha_modificacion` datetime DEFAULT NULL,
  `estado_registro` varchar(20) NOT NULL DEFAULT 'activo'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `com_atributo_producto`
--

INSERT INTO `com_atributo_producto` (`id_atributo_producto`, `nombre_atributo`, `id_usuario_creacion`, `id_usuario_modificacion`, `fecha_creacion`, `fecha_modificacion`, `estado_registro`) VALUES
(1, 'Color', 0, NULL, '2020-01-21 18:20:03', NULL, 'activo'),
(2, 'Modelo', 0, NULL, '2020-01-21 18:20:03', NULL, 'activo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `com_compra`
--

CREATE TABLE `com_compra` (
  `id_compra` int(11) NOT NULL,
  `codigo` varchar(20) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `medicion` varchar(20) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `id_usuario_creacion` int(11) NOT NULL,
  `id_usuario_modificacion` int(11) DEFAULT NULL,
  `fecha_creacion` datetime NOT NULL DEFAULT current_timestamp(),
  `fecha_modificacion` datetime DEFAULT NULL,
  `estado_registro` varchar(20) NOT NULL DEFAULT 'activo'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `com_producto`
--

CREATE TABLE `com_producto` (
  `id_producto` int(11) NOT NULL,
  `codigo` varchar(20) NOT NULL,
  `nombre` varchar(200) NOT NULL,
  `descripcion` varchar(2000) NOT NULL,
  `id_usuario_creacion` int(11) NOT NULL,
  `id_usuario_modificacion` int(11) DEFAULT NULL,
  `fecha_creacion` datetime NOT NULL DEFAULT current_timestamp(),
  `fecha_modificacion` datetime DEFAULT NULL,
  `estado_registro` varchar(20) NOT NULL DEFAULT 'activo'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `com_producto`
--

INSERT INTO `com_producto` (`id_producto`, `codigo`, `nombre`, `descripcion`, `id_usuario_creacion`, `id_usuario_modificacion`, `fecha_creacion`, `fecha_modificacion`, `estado_registro`) VALUES
(5, 'XX', 'AA', 'AAA', 14, NULL, '2020-01-23 20:17:33', NULL, 'activo'),
(6, 'XX', 'AA', 'AAA', 14, NULL, '2020-01-23 20:18:43', NULL, 'activo'),
(7, 'XX', 'AA', 'AAA', 14, NULL, '2020-01-23 20:19:42', NULL, 'activo'),
(8, 'XX', 'AA', 'AAA', 14, NULL, '2020-01-23 20:35:18', NULL, 'activo'),
(9, '', '', '', 14, NULL, '2020-01-27 17:05:06', NULL, 'activo'),
(10, '', '', '', 14, NULL, '2020-01-27 17:05:11', NULL, 'activo'),
(11, '', '', '', 14, NULL, '2020-01-27 17:05:11', NULL, 'activo'),
(12, '', '', '', 14, NULL, '2020-01-27 17:05:11', NULL, 'activo'),
(13, '', '', '', 14, NULL, '2020-01-27 17:05:11', NULL, 'activo'),
(14, '', '', '', 14, NULL, '2020-01-27 17:05:11', NULL, 'activo'),
(15, '', '', '', 14, NULL, '2020-01-27 17:05:44', NULL, 'activo'),
(16, '', '', '', 14, NULL, '2020-01-27 17:06:44', NULL, 'activo'),
(17, 'r', 'sdf', 'sdf', 14, NULL, '2020-01-27 17:06:48', NULL, 'activo'),
(18, 'r', 'sdf', 'sdf', 14, NULL, '2020-01-27 17:06:51', NULL, 'activo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `com_valor_producto`
--

CREATE TABLE `com_valor_producto` (
  `id_valor_producto` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `id_atributo_producto` int(11) NOT NULL,
  `valor` varchar(500) NOT NULL,
  `id_usuario_creacion` int(11) NOT NULL,
  `id_usuario_modificacion` int(11) DEFAULT NULL,
  `fecha_creacion` datetime NOT NULL DEFAULT current_timestamp(),
  `fecha_modificacion` datetime DEFAULT NULL,
  `estado_registro` varchar(20) NOT NULL DEFAULT 'activo'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `com_valor_producto`
--

INSERT INTO `com_valor_producto` (`id_valor_producto`, `id_producto`, `id_atributo_producto`, `valor`, `id_usuario_creacion`, `id_usuario_modificacion`, `fecha_creacion`, `fecha_modificacion`, `estado_registro`) VALUES
(11, 1, 1, 'asda', 14, NULL, '2020-01-23 20:17:33', NULL, 'activo'),
(12, 1, 2, 'zxczxc', 14, NULL, '2020-01-23 20:17:33', NULL, 'activo'),
(13, 6, 1, 'asda', 14, NULL, '2020-01-23 20:18:43', NULL, 'activo'),
(14, 6, 2, 'zxczxc', 14, NULL, '2020-01-23 20:18:43', NULL, 'activo'),
(15, 7, 1, 'asda', 14, NULL, '2020-01-23 20:19:42', NULL, 'activo'),
(16, 7, 2, 'zxczxc', 14, NULL, '2020-01-23 20:19:42', NULL, 'activo'),
(17, 8, 1, 'asda', 14, NULL, '2020-01-23 20:35:18', NULL, 'activo'),
(18, 8, 2, 'zxczxc', 14, NULL, '2020-01-23 20:35:18', NULL, 'activo'),
(19, 18, 1, '', 14, NULL, '2020-01-27 17:06:51', NULL, 'activo');

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
-- Estructura de tabla para la tabla `nuc_menu`
--

CREATE TABLE `nuc_menu` (
  `id_menu` int(11) NOT NULL,
  `codigo` varchar(20) NOT NULL,
  `nombre` varchar(200) NOT NULL,
  `descripcion` varchar(2000) NOT NULL,
  `icono` varchar(500) NOT NULL,
  `id_menu_padre` int(11) NOT NULL,
  `id_usuario_creacion` int(11) NOT NULL,
  `id_usuario_modificacion` int(11) DEFAULT NULL,
  `fecha_creacion` datetime NOT NULL DEFAULT current_timestamp(),
  `fecha_modificacion` datetime DEFAULT NULL,
  `estado_registro` varchar(20) NOT NULL DEFAULT 'activo'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `nuc_menu`
--

INSERT INTO `nuc_menu` (`id_menu`, `codigo`, `nombre`, `descripcion`, `icono`, `id_menu_padre`, `id_usuario_creacion`, `id_usuario_modificacion`, `fecha_creacion`, `fecha_modificacion`, `estado_registro`) VALUES
(1, 'PRI', 'Principal', 'Menu Principal', '', 0, 0, NULL, '2020-01-20 15:08:42', NULL, 'activo'),
(3, 'ADM-USU', 'Administracion de Usuarios', 'Administracion de Usuarios', '', 1, 0, NULL, '2020-01-20 15:08:42', NULL, 'activo'),
(4, 'ADM-ROL', 'Administracion de Rol', 'Administracion de Rol', '', 1, 0, NULL, '2020-01-20 15:08:42', NULL, 'activo'),
(5, 'crear usuario', 'crear usuario', 'crear usuario', '', 3, 0, NULL, '2020-01-21 11:04:49', NULL, 'activo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nuc_permiso`
--

CREATE TABLE `nuc_permiso` (
  `id_permiso` int(11) NOT NULL,
  `denominacion` varchar(200) NOT NULL,
  `descripcion` varchar(500) NOT NULL,
  `id_usuario_creacion` int(11) NOT NULL,
  `id_usuario_modificacion` int(11) NOT NULL,
  `fecha_creacion` datetime NOT NULL,
  `fecha_modificacion` datetime NOT NULL,
  `estado_registro` varchar(20) NOT NULL DEFAULT 'activo'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `nuc_permiso`
--

INSERT INTO `nuc_permiso` (`id_permiso`, `denominacion`, `descripcion`, `id_usuario_creacion`, `id_usuario_modificacion`, `fecha_creacion`, `fecha_modificacion`, `estado_registro`) VALUES
(8, 'Administración de Usuarios', 'Administra todos los usuarios', 14, 0, '2020-01-16 20:52:07', '0000-00-00 00:00:00', 'activo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nuc_permiso_menu`
--

CREATE TABLE `nuc_permiso_menu` (
  `id_permiso_menu` int(11) NOT NULL,
  `id_permiso` int(11) NOT NULL,
  `id_menu` int(11) NOT NULL,
  `id_usuario_creacion` int(11) NOT NULL,
  `id_usuario_modificacion` int(11) DEFAULT NULL,
  `fecha_creacion` datetime NOT NULL DEFAULT current_timestamp(),
  `fecha_modificacion` datetime DEFAULT NULL,
  `estado_registro` varchar(20) NOT NULL DEFAULT 'activo'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nuc_permiso_ruta`
--

CREATE TABLE `nuc_permiso_ruta` (
  `id_permiso_ruta` int(11) NOT NULL,
  `id_permiso` int(11) NOT NULL,
  `id_ruta` int(11) NOT NULL,
  `id_usuario_creacion` int(11) NOT NULL,
  `id_usuario_modificacion` int(11) DEFAULT NULL,
  `fecha_creacion` datetime NOT NULL DEFAULT current_timestamp(),
  `fecha_modificacion` datetime DEFAULT NULL,
  `estado_registro` varchar(20) NOT NULL DEFAULT 'activo'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `nuc_permiso_ruta`
--

INSERT INTO `nuc_permiso_ruta` (`id_permiso_ruta`, `id_permiso`, `id_ruta`, `id_usuario_creacion`, `id_usuario_modificacion`, `fecha_creacion`, `fecha_modificacion`, `estado_registro`) VALUES
(31, 8, 7, 14, NULL, '2020-01-16 20:55:38', NULL, 'activo'),
(32, 8, 6, 14, NULL, '2020-01-16 20:55:39', NULL, 'activo'),
(33, 8, 10, 14, NULL, '2020-01-16 20:55:40', NULL, 'activo'),
(34, 8, 9, 14, NULL, '2020-01-16 20:55:41', NULL, 'activo'),
(35, 8, 8, 14, NULL, '2020-01-16 20:55:41', NULL, 'activo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nuc_rol`
--

CREATE TABLE `nuc_rol` (
  `id_rol` int(11) NOT NULL,
  `denominacion` varchar(20) NOT NULL,
  `descripcion` varchar(300) NOT NULL,
  `id_usuario_creacion` int(11) NOT NULL,
  `id_usuario_modificacion` int(11) DEFAULT NULL,
  `fecha_creacion` datetime NOT NULL,
  `fecha_modificacion` datetime DEFAULT NULL,
  `estado_registro` varchar(20) NOT NULL DEFAULT 'activo'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `nuc_rol`
--

INSERT INTO `nuc_rol` (`id_rol`, `denominacion`, `descripcion`, `id_usuario_creacion`, `id_usuario_modificacion`, `fecha_creacion`, `fecha_modificacion`, `estado_registro`) VALUES
(21, 'Administrador', 'Es el usuario que puede ver todas las interfaces en producción', 14, NULL, '2020-01-16 20:51:26', NULL, 'activo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nuc_rol_permiso`
--

CREATE TABLE `nuc_rol_permiso` (
  `id_rol_permiso` int(11) NOT NULL,
  `id_rol` int(11) NOT NULL,
  `id_permiso` int(11) NOT NULL,
  `id_usuario_creacion` int(11) NOT NULL,
  `id_usuario_modificacion` int(11) DEFAULT NULL,
  `fecha_creacion` datetime NOT NULL DEFAULT current_timestamp(),
  `fecha_modificacion` datetime DEFAULT NULL,
  `estado_registro` varchar(20) NOT NULL DEFAULT 'activo'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `nuc_rol_permiso`
--

INSERT INTO `nuc_rol_permiso` (`id_rol_permiso`, `id_rol`, `id_permiso`, `id_usuario_creacion`, `id_usuario_modificacion`, `fecha_creacion`, `fecha_modificacion`, `estado_registro`) VALUES
(14, 21, 8, 14, NULL, '2020-01-16 20:56:02', NULL, 'activo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nuc_ruta`
--

CREATE TABLE `nuc_ruta` (
  `id_ruta` int(11) NOT NULL,
  `denominacion` varchar(200) NOT NULL,
  `url` varchar(1000) NOT NULL,
  `descripcion` varchar(500) NOT NULL,
  `id_tipo_ruta` int(11) NOT NULL,
  `id_usuario_creacion` int(11) NOT NULL,
  `id_usuario_modificacion` int(11) DEFAULT NULL,
  `fecha_creacion` datetime NOT NULL,
  `fecha_modificacion` datetime DEFAULT NULL,
  `estado_registro` varchar(20) NOT NULL DEFAULT 'activo'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `nuc_ruta`
--

INSERT INTO `nuc_ruta` (`id_ruta`, `denominacion`, `url`, `descripcion`, `id_tipo_ruta`, `id_usuario_creacion`, `id_usuario_modificacion`, `fecha_creacion`, `fecha_modificacion`, `estado_registro`) VALUES
(6, 'Vista Usuario', '/nucleo/nuc_usuario/index', 'Vista Usuario', 0, 14, NULL, '2020-01-16 20:52:51', NULL, 'activo'),
(7, 'Listar Usuario ajax', '/nucleo/nuc_usuario/listaAjax', 'Listar Usuario ajax', 0, 14, NULL, '2020-01-16 20:53:25', NULL, 'activo'),
(8, 'Crear Usuario por ajax', '/nucleo/nuc_usuario/createAjax', 'Crear Usuario por ajax', 0, 14, NULL, '2020-01-16 20:54:15', NULL, 'activo'),
(9, 'Editar usuario por ajax', '/nucleo/nuc_usuario/createAjax', 'Editar usuario por ajax', 0, 14, NULL, '2020-01-16 20:54:48', NULL, 'activo'),
(10, 'Eliminar usuario por ajax', '/nucleo/nuc_usuario/deleteUsuarioAjax', 'Eliminar usuario por ajax', 0, 14, NULL, '2020-01-16 20:55:18', NULL, 'activo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nuc_tipo_ruta`
--

CREATE TABLE `nuc_tipo_ruta` (
  `id_tipo_ruta` int(11) NOT NULL,
  `denominacion` varchar(200) NOT NULL,
  `descripcion` varchar(2000) NOT NULL,
  `id_usuario_creacion` int(11) NOT NULL,
  `id_usuario_modificacion` int(11) DEFAULT NULL,
  `fecha_creacion` datetime NOT NULL DEFAULT current_timestamp(),
  `fecha_modificacion` datetime DEFAULT NULL,
  `estado_registro` varchar(20) NOT NULL DEFAULT 'activo'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `nuc_tipo_ruta`
--

INSERT INTO `nuc_tipo_ruta` (`id_tipo_ruta`, `denominacion`, `descripcion`, `id_usuario_creacion`, `id_usuario_modificacion`, `fecha_creacion`, `fecha_modificacion`, `estado_registro`) VALUES
(1, 'vista', 'Son rutas que pertenecen a las vistas del sistema', 1, NULL, '2020-01-16 09:16:35', NULL, 'activo'),
(2, 'consulta', 'Son rutas que devuelven consultas únicamente', 1, NULL, '2020-01-16 09:16:35', NULL, 'activo'),
(3, 'transaccional', 'Son rutas que generan transacciones en el sistema', 1, NULL, '2020-01-16 09:16:58', NULL, 'activo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nuc_tipo_usuario`
--

CREATE TABLE `nuc_tipo_usuario` (
  `id_tipo_usuario` int(11) NOT NULL,
  `denominacion` varchar(200) NOT NULL,
  `descripcion` varchar(2000) NOT NULL,
  `id_usuario_creacion` int(11) NOT NULL,
  `id_usuario_modificacion` int(11) DEFAULT NULL,
  `fecha_creacion` datetime NOT NULL DEFAULT current_timestamp(),
  `fecha_modificacion` datetime DEFAULT NULL,
  `estado_registro` varchar(20) NOT NULL DEFAULT 'activo'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `nuc_tipo_usuario`
--

INSERT INTO `nuc_tipo_usuario` (`id_tipo_usuario`, `denominacion`, `descripcion`, `id_usuario_creacion`, `id_usuario_modificacion`, `fecha_creacion`, `fecha_modificacion`, `estado_registro`) VALUES
(1, 'SuperAdmin', 'Es el super administrador', 1, NULL, '2020-01-16 09:12:00', NULL, 'activo'),
(2, 'Admin', 'Es el administrador', 1, NULL, '2020-01-16 09:12:00', NULL, 'activo'),
(3, 'Usuario', 'Es el usuario normal', 1, NULL, '2020-01-16 09:12:13', NULL, 'activo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nuc_usuario`
--

CREATE TABLE `nuc_usuario` (
  `id_usuario` int(11) NOT NULL,
  `email` varchar(20) NOT NULL,
  `cuenta` varchar(20) NOT NULL,
  `clave` varchar(500) NOT NULL,
  `fecha_creacion` datetime NOT NULL,
  `fecha_modificacion` datetime DEFAULT NULL,
  `id_usuario_creacion` int(11) NOT NULL,
  `id_usuario_modificacion` int(11) DEFAULT NULL,
  `estado_registro` varchar(20) NOT NULL,
  `id_tipo_usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `nuc_usuario`
--

INSERT INTO `nuc_usuario` (`id_usuario`, `email`, `cuenta`, `clave`, `fecha_creacion`, `fecha_modificacion`, `id_usuario_creacion`, `id_usuario_modificacion`, `estado_registro`, `id_tipo_usuario`) VALUES
(14, 'admin@gmail.com', 'admin', 'e30493eb2e6264065df10b128e6aded536a74d77a6fae40799db22dc809cee2473a84c6cc21fa70bf5bdc79e2063a97da2eea8c27262528ca38cf14ffb82d2fdiXRFemRaeERVMCwbThJ3JB+xUhmf0cgmxkELY/MiKsY=', '2019-12-27 06:12:00', NULL, 1, NULL, 'activo', 1),
(16, 'henry@gmail.com', 'henry', 'e30493eb2e6264065df10b128e6aded536a74d77a6fae40799db22dc809cee2473a84c6cc21fa70bf5bdc79e2063a97da2eea8c27262528ca38cf14ffb82d2fdiXRFemRaeERVMCwbThJ3JB+xUhmf0cgmxkELY/MiKsY=', '2019-12-27 00:00:00', NULL, 1, NULL, 'activo', 2),
(20, 'elisa@gmail.com', 'elisa', '7da3c66d83aa47af1e7f22f4f0838d01c54e560db78fa4fc04ac78f0501455ea06ec6f6a7584e983fdb176c769cb78c25f5f3e7e413d18b45780635d7a833374crBbqMD08rko76dY0cQ5fA/Irazfqtx42WpfC80ZFEo=', '0000-00-00 00:00:00', NULL, 1, NULL, 'activo', 2),
(22, 'jose_mita@gmail.com', 'jose_mita', '8f1901e5fe8c562783ebe9e86a6454c8f57f3ac30ddea7b62e64ea304a2b1a487a7220e8fae8ff2ae7c60e0cf6fcf16e9d9a73b0087e71dc0d6da0553aedc099buYsNeUbn/T5Wn7BOFqnxuKw1G039ZG1EHk6JKlwsjY=', '0000-00-00 00:00:00', NULL, 1, NULL, 'activo', 2),
(24, 'carlos@gmail.com', 'carlos', '8bbb114406b52977472ad1d70aaea66b0e8a7d759630c572fc0a0f101e853907cecb9b833bc6531f5f1671429ddddd29e2ec6b738c810fc7ad1976c9263294eeaobh/Jr9gMHZva340elWlceemcijseKvi+edDM/CSJo=', '0000-00-00 00:00:00', NULL, 1, NULL, 'activo', 2),
(32, 'ana@gmail.com', 'ana', '28a93c9a422b0588251f5de606f6d17e3b7ca08be775c5902cf5a6b8c30fdd9e8618d0ccdf3040646e8be1a4f35297c07eae7edbc7066e83fcb3624a628c5b12dbjVk3V0g66FF3G/ju0GrZ30RrxVQIIKQ0SnLpDIVSc=', '2020-01-09 14:24:48', NULL, 16, NULL, 'activo', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nuc_usuario_rol`
--

CREATE TABLE `nuc_usuario_rol` (
  `id_usuario_rol` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `id_rol` int(11) NOT NULL,
  `id_usuario_creacion` int(11) NOT NULL,
  `id_usuario_modificacion` int(11) DEFAULT NULL,
  `fecha_creacion` datetime NOT NULL DEFAULT current_timestamp(),
  `fecha_modificacion` datetime DEFAULT NULL,
  `estado_registro` varchar(20) NOT NULL DEFAULT 'activo'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `nuc_usuario_rol`
--

INSERT INTO `nuc_usuario_rol` (`id_usuario_rol`, `id_usuario`, `id_rol`, `id_usuario_creacion`, `id_usuario_modificacion`, `fecha_creacion`, `fecha_modificacion`, `estado_registro`) VALUES
(25, 16, 21, 14, NULL, '2020-01-16 20:56:14', NULL, 'activo');

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
-- Indices de la tabla `com_atributo_producto`
--
ALTER TABLE `com_atributo_producto`
  ADD PRIMARY KEY (`id_atributo_producto`);

--
-- Indices de la tabla `com_compra`
--
ALTER TABLE `com_compra`
  ADD PRIMARY KEY (`id_compra`);

--
-- Indices de la tabla `com_producto`
--
ALTER TABLE `com_producto`
  ADD PRIMARY KEY (`id_producto`);

--
-- Indices de la tabla `com_valor_producto`
--
ALTER TABLE `com_valor_producto`
  ADD PRIMARY KEY (`id_valor_producto`);

--
-- Indices de la tabla `factura`
--
ALTER TABLE `factura`
  ADD UNIQUE KEY `id_factura_2` (`id_factura`),
  ADD KEY `id_factura` (`id_factura`);

--
-- Indices de la tabla `nuc_menu`
--
ALTER TABLE `nuc_menu`
  ADD PRIMARY KEY (`id_menu`);

--
-- Indices de la tabla `nuc_permiso`
--
ALTER TABLE `nuc_permiso`
  ADD PRIMARY KEY (`id_permiso`);

--
-- Indices de la tabla `nuc_permiso_menu`
--
ALTER TABLE `nuc_permiso_menu`
  ADD PRIMARY KEY (`id_permiso_menu`);

--
-- Indices de la tabla `nuc_permiso_ruta`
--
ALTER TABLE `nuc_permiso_ruta`
  ADD PRIMARY KEY (`id_permiso_ruta`),
  ADD KEY `id_ruta` (`id_ruta`),
  ADD KEY `id_permiso` (`id_permiso`);

--
-- Indices de la tabla `nuc_rol`
--
ALTER TABLE `nuc_rol`
  ADD PRIMARY KEY (`id_rol`);

--
-- Indices de la tabla `nuc_rol_permiso`
--
ALTER TABLE `nuc_rol_permiso`
  ADD PRIMARY KEY (`id_rol_permiso`),
  ADD KEY `id_permiso` (`id_permiso`),
  ADD KEY `id_rol` (`id_rol`);

--
-- Indices de la tabla `nuc_ruta`
--
ALTER TABLE `nuc_ruta`
  ADD PRIMARY KEY (`id_ruta`);

--
-- Indices de la tabla `nuc_tipo_ruta`
--
ALTER TABLE `nuc_tipo_ruta`
  ADD PRIMARY KEY (`id_tipo_ruta`);

--
-- Indices de la tabla `nuc_tipo_usuario`
--
ALTER TABLE `nuc_tipo_usuario`
  ADD PRIMARY KEY (`id_tipo_usuario`);

--
-- Indices de la tabla `nuc_usuario`
--
ALTER TABLE `nuc_usuario`
  ADD PRIMARY KEY (`id_usuario`);

--
-- Indices de la tabla `nuc_usuario_rol`
--
ALTER TABLE `nuc_usuario_rol`
  ADD PRIMARY KEY (`id_usuario_rol`),
  ADD KEY `id_usuario` (`id_usuario`),
  ADD KEY `id_rol` (`id_rol`);

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
-- AUTO_INCREMENT de la tabla `com_atributo_producto`
--
ALTER TABLE `com_atributo_producto`
  MODIFY `id_atributo_producto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `com_compra`
--
ALTER TABLE `com_compra`
  MODIFY `id_compra` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `com_producto`
--
ALTER TABLE `com_producto`
  MODIFY `id_producto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `com_valor_producto`
--
ALTER TABLE `com_valor_producto`
  MODIFY `id_valor_producto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de la tabla `factura`
--
ALTER TABLE `factura`
  MODIFY `id_factura` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `nuc_menu`
--
ALTER TABLE `nuc_menu`
  MODIFY `id_menu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `nuc_permiso`
--
ALTER TABLE `nuc_permiso`
  MODIFY `id_permiso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `nuc_permiso_menu`
--
ALTER TABLE `nuc_permiso_menu`
  MODIFY `id_permiso_menu` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `nuc_permiso_ruta`
--
ALTER TABLE `nuc_permiso_ruta`
  MODIFY `id_permiso_ruta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT de la tabla `nuc_rol`
--
ALTER TABLE `nuc_rol`
  MODIFY `id_rol` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de la tabla `nuc_rol_permiso`
--
ALTER TABLE `nuc_rol_permiso`
  MODIFY `id_rol_permiso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `nuc_ruta`
--
ALTER TABLE `nuc_ruta`
  MODIFY `id_ruta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `nuc_tipo_ruta`
--
ALTER TABLE `nuc_tipo_ruta`
  MODIFY `id_tipo_ruta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `nuc_tipo_usuario`
--
ALTER TABLE `nuc_tipo_usuario`
  MODIFY `id_tipo_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `nuc_usuario`
--
ALTER TABLE `nuc_usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT de la tabla `nuc_usuario_rol`
--
ALTER TABLE `nuc_usuario_rol`
  MODIFY `id_usuario_rol` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `nuc_permiso_ruta`
--
ALTER TABLE `nuc_permiso_ruta`
  ADD CONSTRAINT `nuc_permiso_ruta_ibfk_1` FOREIGN KEY (`id_ruta`) REFERENCES `nuc_ruta` (`id_ruta`),
  ADD CONSTRAINT `nuc_permiso_ruta_ibfk_2` FOREIGN KEY (`id_permiso`) REFERENCES `nuc_permiso` (`id_permiso`);

--
-- Filtros para la tabla `nuc_rol_permiso`
--
ALTER TABLE `nuc_rol_permiso`
  ADD CONSTRAINT `nuc_rol_permiso_ibfk_1` FOREIGN KEY (`id_permiso`) REFERENCES `nuc_permiso` (`id_permiso`),
  ADD CONSTRAINT `nuc_rol_permiso_ibfk_2` FOREIGN KEY (`id_rol`) REFERENCES `nuc_rol` (`id_rol`);

--
-- Filtros para la tabla `nuc_usuario_rol`
--
ALTER TABLE `nuc_usuario_rol`
  ADD CONSTRAINT `nuc_usuario_rol_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `nuc_usuario` (`id_usuario`),
  ADD CONSTRAINT `nuc_usuario_rol_ibfk_2` FOREIGN KEY (`id_rol`) REFERENCES `nuc_rol` (`id_rol`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
