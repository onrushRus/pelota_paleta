-- phpMyAdmin SQL Dump
-- version 3.4.10.1deb1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 19-06-2012 a las 18:36:03
-- Versión del servidor: 5.5.22
-- Versión de PHP: 5.3.10-1ubuntu3.1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `pelota_paleta`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cuerpo_pedido`
--

CREATE TABLE IF NOT EXISTS `cuerpo_pedido` (
  `encabezado_pedido_id` int(10) unsigned NOT NULL,
  `producto_id` int(10) unsigned NOT NULL,
  `cantidad` int(10) unsigned NOT NULL,
  KEY `fk_CUERPO_PEDIDO_PRODUCTO1` (`producto_id`),
  KEY `fk_CUERPO_PEDIDO_ENCABEZADO_PEDIDO1` (`encabezado_pedido_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `direccion`
--

CREATE TABLE IF NOT EXISTS `direccion` (
  `persona_nro_doc` int(10) unsigned NOT NULL,
  `calle` varchar(45) NOT NULL DEFAULT 'Sin Nombre',
  `numero` int(10) unsigned NOT NULL DEFAULT '0',
  `monoblock_edif` varchar(5) DEFAULT 'S/N',
  `piso` varchar(3) DEFAULT 'S/N',
  `dpto` varchar(3) DEFAULT 'S/N',
  PRIMARY KEY (`persona_nro_doc`,`calle`,`numero`),
  KEY `fk_direccion_persona1` (`persona_nro_doc`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `encabezado_pedido`
--

CREATE TABLE IF NOT EXISTS `encabezado_pedido` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `proveedor_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_ENCABEZADO_PEDIDO_PROVEEDOR1` (`proveedor_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `localidad`
--

CREATE TABLE IF NOT EXISTS `localidad` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre_loc` varchar(40) NOT NULL,
  `cod_postal` varchar(10) NOT NULL,
  `provincia_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_LOCALIDAD_PROVINCIA` (`provincia_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `localidad`
--

INSERT INTO `localidad` (`id`, `nombre_loc`, `cod_postal`, `provincia_id`) VALUES
(1, 'Trelew', '9100', 1),
(2, 'Rawson', '9110', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `persona`
--

CREATE TABLE IF NOT EXISTS `persona` (
  `nro_doc` int(10) unsigned NOT NULL DEFAULT '0',
  `nom_apellido` varchar(45) NOT NULL,
  `fecha_nacimiento` date NOT NULL,
  `e_mail` varchar(30) NOT NULL,
  `localidad_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`nro_doc`),
  KEY `fk_PERS_LOCALIDAD` (`localidad_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `persona`
--

INSERT INTO `persona` (`nro_doc`, `nom_apellido`, `fecha_nacimiento`, `e_mail`, `localidad_id`) VALUES
(33060648, 'Javier Gosaine', '1988-04-27', 'ruso@gmail.com', 1),
(88888888, 'Senior Ocho', '2012-06-08', 'ocho@gmail.com', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE IF NOT EXISTS `producto` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `descripcion_prod` varchar(45) NOT NULL,
  `precio` decimal(6,2) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`id`, `descripcion_prod`, `precio`) VALUES
(1, 'tomates ', 20.00),
(2, 'peras', 15.00);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedor`
--

CREATE TABLE IF NOT EXISTS `proveedor` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre_proveedor` varchar(45) NOT NULL,
  `dom_calle` varchar(45) DEFAULT NULL,
  `dom_nro` varchar(10) DEFAULT NULL,
  `dom_piso` varchar(10) DEFAULT NULL,
  `dom_dpto` varchar(10) DEFAULT NULL,
  `telefono` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `provincia`
--

CREATE TABLE IF NOT EXISTS `provincia` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre_prov` varchar(40) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `provincia`
--

INSERT INTO `provincia` (`id`, `nombre_prov`) VALUES
(1, 'Chubut'),
(2, 'Neuquen');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reserva`
--

CREATE TABLE IF NOT EXISTS `reserva` (
  `socio_nro_doc` int(10) unsigned NOT NULL DEFAULT '0',
  `tipo_reserva_id` int(10) unsigned NOT NULL DEFAULT '0',
  `dia_comienzo_reserva` date NOT NULL DEFAULT '0000-00-00',
  `hora_comienzo_reserva` time NOT NULL DEFAULT '00:00:00',
  `dia_fin_reserva` date DEFAULT NULL,
  `hora_fin_reserva` time DEFAULT NULL,
  `cantidad_turnos` int(10) unsigned NOT NULL DEFAULT '1',
  PRIMARY KEY (`tipo_reserva_id`,`socio_nro_doc`,`dia_comienzo_reserva`,`hora_comienzo_reserva`),
  KEY `fk_reserva_socio` (`socio_nro_doc`),
  KEY `fk_reserva_tipo_reserva` (`tipo_reserva_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='cant_turnos verifica para el alquiler de cancha que siempre ';

--
-- Volcado de datos para la tabla `reserva`
--

INSERT INTO `reserva` (`socio_nro_doc`, `tipo_reserva_id`, `dia_comienzo_reserva`, `hora_comienzo_reserva`, `dia_fin_reserva`, `hora_fin_reserva`, `cantidad_turnos`) VALUES
(33060648, 1, '2012-06-18', '22:37:00', '2012-06-18', '00:00:00', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `socio`
--

CREATE TABLE IF NOT EXISTS `socio` (
  `persona_nro_doc` int(10) unsigned NOT NULL DEFAULT '0',
  `fecha_alta` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `vitalicio` tinyint(1) NOT NULL DEFAULT '0',
  `activo` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`persona_nro_doc`),
  KEY `fk_socio_persona` (`persona_nro_doc`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `socio`
--

INSERT INTO `socio` (`persona_nro_doc`, `fecha_alta`, `vitalicio`, `activo`) VALUES
(33060648, '2012-06-18 10:35:26', 1, 1),
(88888888, '2012-06-19 01:35:09', 0, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `stock`
--

CREATE TABLE IF NOT EXISTS `stock` (
  `producto_id` int(10) unsigned NOT NULL,
  `cantidad_actual` int(10) unsigned NOT NULL,
  `cantidad_minima` int(10) unsigned NOT NULL,
  PRIMARY KEY (`producto_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `stock`
--

INSERT INTO `stock` (`producto_id`, `cantidad_actual`, `cantidad_minima`) VALUES
(1, 10, 5),
(2, 15, 10);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `telefono`
--

CREATE TABLE IF NOT EXISTS `telefono` (
  `persona_nro_doc` int(10) unsigned NOT NULL,
  `telefono_nro` varchar(20) NOT NULL DEFAULT 'S/N',
  PRIMARY KEY (`persona_nro_doc`,`telefono_nro`),
  KEY `fk_telefono_persona1` (`persona_nro_doc`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_reserva`
--

CREATE TABLE IF NOT EXISTS `tipo_reserva` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `descirpcion_reserva` varchar(45) NOT NULL,
  `tiempo_reserva` decimal(10,0) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `tipo_reserva`
--

INSERT INTO `tipo_reserva` (`id`, `descirpcion_reserva`, `tiempo_reserva`) VALUES
(1, 'cancha', 90),
(2, 'quincho', 90);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `cuerpo_pedido`
--
ALTER TABLE `cuerpo_pedido`
  ADD CONSTRAINT `fk_CUERPO_PEDIDO_ENCABEZADO_PEDIDO1` FOREIGN KEY (`encabezado_pedido_id`) REFERENCES `encabezado_pedido` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_CUERPO_PEDIDO_PRODUCTO1` FOREIGN KEY (`producto_id`) REFERENCES `producto` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `direccion`
--
ALTER TABLE `direccion`
  ADD CONSTRAINT `fk_direccion_persona1` FOREIGN KEY (`persona_nro_doc`) REFERENCES `persona` (`nro_doc`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `encabezado_pedido`
--
ALTER TABLE `encabezado_pedido`
  ADD CONSTRAINT `fk_ENCABEZADO_PEDIDO_PROVEEDOR1` FOREIGN KEY (`proveedor_id`) REFERENCES `proveedor` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `localidad`
--
ALTER TABLE `localidad`
  ADD CONSTRAINT `fk_LOCALIDAD_PROVINCIA` FOREIGN KEY (`provincia_id`) REFERENCES `provincia` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `persona`
--
ALTER TABLE `persona`
  ADD CONSTRAINT `fk_SOCIO_LOCALIDAD1` FOREIGN KEY (`localidad_id`) REFERENCES `localidad` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `reserva`
--
ALTER TABLE `reserva`
  ADD CONSTRAINT `fk_reserva_socio` FOREIGN KEY (`socio_nro_doc`) REFERENCES `socio` (`persona_nro_doc`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_reserva_tipo_reserva` FOREIGN KEY (`tipo_reserva_id`) REFERENCES `tipo_reserva` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `socio`
--
ALTER TABLE `socio`
  ADD CONSTRAINT `fk_socio_persona` FOREIGN KEY (`persona_nro_doc`) REFERENCES `persona` (`nro_doc`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `stock`
--
ALTER TABLE `stock`
  ADD CONSTRAINT `fk_stock_producto1` FOREIGN KEY (`producto_id`) REFERENCES `producto` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `telefono`
--
ALTER TABLE `telefono`
  ADD CONSTRAINT `fk_telefono_persona1` FOREIGN KEY (`persona_nro_doc`) REFERENCES `persona` (`nro_doc`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
