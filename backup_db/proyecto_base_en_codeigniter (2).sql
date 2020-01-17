-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 17-01-2020 a las 18:05:21
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

--
-- Volcado de datos para la tabla `logs`
--

INSERT INTO `logs` (`id`, `errno`, `errtype`, `errstr`, `errfile`, `errline`, `user_agent`, `ip_address`, `time`) VALUES
(8, 256, 'User Error', 'Error: Division by zero.', 'C:\\xampp\\htdocs\\proyecto_base_en_codeigniter\\application\\controllers\\administracion\\Usuario.php', 136, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.88 Safari/537.36', '::1', '2020-01-03 16:52:08'),
(9, 8, 'Notice', 'Undefined variable: data', 'C:\\xampp\\htdocs\\proyecto_base_en_codeigniter\\application\\controllers\\administracion\\Usuario.php', 139, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.88 Safari/537.36', '::1', '2020-01-03 16:52:45'),
(10, 8, 'Notice', 'Undefined variable: dataqqqq', 'C:\\xampp\\htdocs\\proyecto_base_en_codeigniter\\application\\controllers\\administracion\\Usuario.php', 139, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.88 Safari/537.36', '::1', '2020-01-03 16:52:49'),
(11, 8, 'Notice', 'Undefined variable: dataqqqq', 'C:\\xampp\\htdocs\\proyecto_base_en_codeigniter\\application\\controllers\\administracion\\Usuario.php', 139, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.88 Safari/537.36', '::1', '2020-01-03 16:52:50'),
(12, 8, 'Notice', 'Undefined variable: dataqqqq', 'C:\\xampp\\htdocs\\proyecto_base_en_codeigniter\\application\\controllers\\administracion\\Usuario.php', 139, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.88 Safari/537.36', '::1', '2020-01-03 16:52:50'),
(13, 8, 'Notice', 'Undefined variable: dataqqqq', 'C:\\xampp\\htdocs\\proyecto_base_en_codeigniter\\application\\controllers\\administracion\\Usuario.php', 139, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.88 Safari/537.36', '::1', '2020-01-03 16:52:51'),
(14, 8, 'Notice', 'Undefined variable: dataqqqq', 'C:\\xampp\\htdocs\\proyecto_base_en_codeigniter\\application\\controllers\\administracion\\Usuario.php', 139, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.88 Safari/537.36', '::1', '2020-01-03 16:52:57'),
(15, 8, 'Notice', 'Undefined variable: dataqqqq', 'C:\\xampp\\htdocs\\proyecto_base_en_codeigniter\\application\\controllers\\administracion\\Usuario.php', 139, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.88 Safari/537.36', '::1', '2020-01-03 16:52:58'),
(16, 8, 'Notice', 'Undefined variable: dataqqqq', 'C:\\xampp\\htdocs\\proyecto_base_en_codeigniter\\application\\controllers\\administracion\\Usuario.php', 139, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.88 Safari/537.36', '::1', '2020-01-03 16:52:58'),
(17, 8, 'Notice', 'Undefined variable: dataqqqq', 'C:\\xampp\\htdocs\\proyecto_base_en_codeigniter\\application\\controllers\\administracion\\Usuario.php', 139, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.88 Safari/537.36', '::1', '2020-01-03 16:52:58'),
(18, 8, 'Notice', 'Undefined variable: dataqqqq', 'C:\\xampp\\htdocs\\proyecto_base_en_codeigniter\\application\\controllers\\administracion\\Usuario.php', 139, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.88 Safari/537.36', '::1', '2020-01-03 16:52:59'),
(19, 8, 'Notice', 'Undefined variable: dataqqqq', 'C:\\xampp\\htdocs\\proyecto_base_en_codeigniter\\application\\controllers\\administracion\\Usuario.php', 139, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.88 Safari/537.36', '::1', '2020-01-03 16:52:59'),
(20, 8, 'Notice', 'Undefined variable: dataqqqq', 'C:\\xampp\\htdocs\\proyecto_base_en_codeigniter\\application\\controllers\\administracion\\Usuario.php', 139, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.88 Safari/537.36', '::1', '2020-01-03 16:52:59'),
(21, 8, 'Notice', 'Undefined variable: dataqqqq', 'C:\\xampp\\htdocs\\proyecto_base_en_codeigniter\\application\\controllers\\administracion\\Usuario.php', 139, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.88 Safari/537.36', '::1', '2020-01-03 16:52:59'),
(22, 8, 'Notice', 'Undefined variable: dataqqqq', 'C:\\xampp\\htdocs\\proyecto_base_en_codeigniter\\application\\controllers\\administracion\\Usuario.php', 139, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.88 Safari/537.36', '::1', '2020-01-03 16:52:59'),
(23, 0, '0', 'Call to undefined method Usuario_model::listUsuarssio()', 'C:\\xampp\\htdocs\\proyecto_base_en_codeigniter\\application\\controllers\\administracion\\Usuario.php', 138, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.88 Safari/537.36', '::1', '2020-01-03 16:53:19'),
(24, 8, 'Notice', 'Undefined variable: dataqqqq', 'C:\\xampp\\htdocs\\proyecto_base_en_codeigniter\\application\\controllers\\administracion\\Usuario.php', 139, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.88 Safari/537.36', '::1', '2020-01-03 16:53:30'),
(25, 8, 'Notice', 'Undefined variable: dataqqqq', 'C:\\xampp\\htdocs\\proyecto_base_en_codeigniter\\application\\controllers\\administracion\\Usuario.php', 139, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.88 Safari/537.36', '::1', '2020-01-03 16:54:21'),
(26, 0, '0', 'Call to undefined function form_open_multipart_ci()', 'C:\\xampp\\htdocs\\proyecto_base_en_codeigniter\\application\\views\\administracion\\usuario\\index.php', 31, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.88 Safari/537.36', '::1', '2020-01-08 17:30:47');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `menu`
--

CREATE TABLE `menu` (
  `id_menu` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `descripcion` varchar(500) NOT NULL,
  `ruta` varchar(200) NOT NULL,
  `tipo` varchar(20) NOT NULL DEFAULT '' COMMENT 'Los tipos son "administracion, sistema"',
  `icono` varchar(500) NOT NULL,
  `id_menu_padre` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `menu`
--

INSERT INTO `menu` (`id_menu`, `nombre`, `descripcion`, `ruta`, `tipo`, `icono`, `id_menu_padre`) VALUES
(1, 'Administracion', 'Administracion del sistema', '', 'administracion', '', 0),
(2, 'Menus', 'Menus principal', '', 'administracion', '', 1),
(3, 'Administracion de menu', 'Administracion de menus', '/Menu/lista', '', '', 2),
(6, 'Gestión de usuarios', 'Gestión de usuarios', '', 'administracion', '', 0),
(7, 'Usuarios', 'Administracion de usuarios', '/usuario/lista', '', '', 6);

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
-- Estructura de tabla para la tabla `ruta_asignado`
--

CREATE TABLE `ruta_asignado` (
  `id_ruta_asignado` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `id_ruta` int(11) NOT NULL,
  `fecha_asignacion` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
-- Indices de la tabla `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id_menu`);

--
-- Indices de la tabla `nuc_permiso`
--
ALTER TABLE `nuc_permiso`
  ADD PRIMARY KEY (`id_permiso`);

--
-- Indices de la tabla `nuc_permiso_ruta`
--
ALTER TABLE `nuc_permiso_ruta`
  ADD PRIMARY KEY (`id_permiso_ruta`);

--
-- Indices de la tabla `nuc_rol`
--
ALTER TABLE `nuc_rol`
  ADD PRIMARY KEY (`id_rol`);

--
-- Indices de la tabla `nuc_rol_permiso`
--
ALTER TABLE `nuc_rol_permiso`
  ADD PRIMARY KEY (`id_rol_permiso`);

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
  ADD PRIMARY KEY (`id_usuario_rol`);

--
-- Indices de la tabla `rol_asignado`
--
ALTER TABLE `rol_asignado`
  ADD PRIMARY KEY (`id_rol_asignado`);

--
-- Indices de la tabla `ruta_asignado`
--
ALTER TABLE `ruta_asignado`
  ADD PRIMARY KEY (`id_ruta_asignado`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT de la tabla `menu`
--
ALTER TABLE `menu`
  MODIFY `id_menu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `nuc_permiso`
--
ALTER TABLE `nuc_permiso`
  MODIFY `id_permiso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `nuc_permiso_ruta`
--
ALTER TABLE `nuc_permiso_ruta`
  MODIFY `id_permiso_ruta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

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
  MODIFY `id_ruta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

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
-- AUTO_INCREMENT de la tabla `rol_asignado`
--
ALTER TABLE `rol_asignado`
  MODIFY `id_rol_asignado` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `ruta_asignado`
--
ALTER TABLE `ruta_asignado`
  MODIFY `id_ruta_asignado` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
