#
# TABLE STRUCTURE FOR: cobrado_mensual
#

DROP TABLE IF EXISTS `cobrado_mensual`;

CREATE TABLE `cobrado_mensual` (
  `id_cobrado_mensual` int(11) NOT NULL AUTO_INCREMENT,
  `monto_mensual` float NOT NULL,
  `id_factura` int(11) NOT NULL,
  `id_cobrado_total` int(11) NOT NULL,
  PRIMARY KEY (`id_cobrado_mensual`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# TABLE STRUCTURE FOR: cobrado_total
#

DROP TABLE IF EXISTS `cobrado_total`;

CREATE TABLE `cobrado_total` (
  `id_cobrado_total` int(11) NOT NULL AUTO_INCREMENT,
  `monto_total` float NOT NULL,
  `fecha_cobro` date NOT NULL,
  PRIMARY KEY (`id_cobrado_total`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# TABLE STRUCTURE FOR: consumidor
#

DROP TABLE IF EXISTS `consumidor`;

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

#
# TABLE STRUCTURE FOR: factura
#

DROP TABLE IF EXISTS `factura`;

CREATE TABLE `factura` (
  `id_factura` int(11) NOT NULL AUTO_INCREMENT,
  `fecha_emision` date NOT NULL,
  `fecha_vencimiento` date NOT NULL,
  `monto_deuda` float NOT NULL,
  `nro_factura` int(11) NOT NULL,
  `id_consumidor` int(11) NOT NULL,
  UNIQUE KEY `id_factura_2` (`id_factura`),
  KEY `id_factura` (`id_factura`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# TABLE STRUCTURE FOR: logs
#

DROP TABLE IF EXISTS `logs`;

CREATE TABLE `logs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `errno` int(2) NOT NULL,
  `errtype` varchar(32) NOT NULL,
  `errstr` text NOT NULL,
  `errfile` varchar(255) NOT NULL,
  `errline` int(4) NOT NULL,
  `user_agent` varchar(120) NOT NULL,
  `ip_address` varchar(45) NOT NULL DEFAULT '0',
  `time` datetime NOT NULL,
  PRIMARY KEY (`id`,`ip_address`,`user_agent`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# TABLE STRUCTURE FOR: permiso
#

DROP TABLE IF EXISTS `permiso`;

CREATE TABLE `permiso` (
  `id_permiso` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_permiso` varchar(200) NOT NULL,
  `estado` int(11) NOT NULL,
  `id_ruta` int(11) NOT NULL,
  PRIMARY KEY (`id_permiso`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# TABLE STRUCTURE FOR: rol
#

DROP TABLE IF EXISTS `rol`;

CREATE TABLE `rol` (
  `id_rol` int(11) NOT NULL AUTO_INCREMENT,
  `denominacion` varchar(20) NOT NULL,
  `descripcion` varchar(300) NOT NULL,
  PRIMARY KEY (`id_rol`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# TABLE STRUCTURE FOR: rol_asignado
#

DROP TABLE IF EXISTS `rol_asignado`;

CREATE TABLE `rol_asignado` (
  `id_rol_asignado` int(11) NOT NULL AUTO_INCREMENT,
  `id_usuario` int(11) NOT NULL,
  `id_rol` int(11) NOT NULL,
  `fecha_asignacion` datetime NOT NULL,
  PRIMARY KEY (`id_rol_asignado`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# TABLE STRUCTURE FOR: ruta
#

DROP TABLE IF EXISTS `ruta`;

CREATE TABLE `ruta` (
  `id_ruta` int(11) NOT NULL AUTO_INCREMENT,
  `denominacion` varchar(30) NOT NULL,
  `descripcion` varchar(300) NOT NULL,
  `id_rol` int(11) NOT NULL,
  PRIMARY KEY (`id_ruta`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# TABLE STRUCTURE FOR: ruta_asignado
#

DROP TABLE IF EXISTS `ruta_asignado`;

CREATE TABLE `ruta_asignado` (
  `id_ruta_asignado` int(11) NOT NULL AUTO_INCREMENT,
  `id_usuario` int(11) NOT NULL,
  `id_ruta` int(11) NOT NULL,
  `fecha_asignacion` datetime NOT NULL,
  PRIMARY KEY (`id_ruta_asignado`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# TABLE STRUCTURE FOR: usuario
#

DROP TABLE IF EXISTS `usuario`;

CREATE TABLE `usuario` (
  `id_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(20) NOT NULL,
  `cuenta` varchar(20) NOT NULL,
  `password` varchar(100) NOT NULL,
  `ci` int(11) NOT NULL,
  `nombres` varchar(50) NOT NULL,
  `paterno` varchar(50) NOT NULL,
  `materno` varchar(50) NOT NULL,
  PRIMARY KEY (`id_usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

INSERT INTO `usuario` (`id_usuario`, `email`, `cuenta`, `password`, `ci`, `nombres`, `paterno`, `materno`) VALUES (11, admi@gmail.com, smith, a66e44736e753d4533746ced572ca821, 200093, smith, amber, christalle);
INSERT INTO `usuario` (`id_usuario`, `email`, `cuenta`, `password`, `ci`, `nombres`, `paterno`, `materno`) VALUES (13, amilkar@gmail.com, amilkar, 74ddea29f66c36e026cf0e5b056b9e6b, 2147483647, amilkar, estrada, suarez);


