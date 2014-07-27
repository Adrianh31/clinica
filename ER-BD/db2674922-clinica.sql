-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 22-07-2014 a las 04:43:10
-- Versión del servidor: 5.6.16
-- Versión de PHP: 5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `db2674922-clinica`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `analisis`
--

CREATE TABLE IF NOT EXISTS `analisis` (
  `ID_ANALISIS` int(11) NOT NULL AUTO_INCREMENT,
  `ID_CONSULTA` int(11) NOT NULL,
  `FECHA_A_REALIZAR` datetime DEFAULT NULL,
  PRIMARY KEY (`ID_ANALISIS`,`ID_CONSULTA`),
  KEY `fk_ANALISIS_CONSULTAS1_idx` (`ID_CONSULTA`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cita`
--

CREATE TABLE IF NOT EXISTS `cita` (
  `ID_CITA` int(11) NOT NULL AUTO_INCREMENT,
  `ID_PACIENTE` int(11) NOT NULL,
  `ID_ESPECIALIDAD` int(11) NOT NULL,
  `ID_ESTADO_CITA` int(11) NOT NULL,
  `FECHA_INICIO` datetime NOT NULL,
  `FECHA_FIN` datetime NOT NULL,
  `MOTIVO` varchar(55) DEFAULT NULL,
  PRIMARY KEY (`ID_CITA`,`ID_PACIENTE`,`ID_ESPECIALIDAD`,`ID_ESTADO_CITA`),
  KEY `fk_CITA_PACIENTE1_idx` (`ID_PACIENTE`),
  KEY `fk_CITA_ESPECIALIDAD1_idx` (`ID_ESPECIALIDAD`),
  KEY `fk_CITA_TIPO_CONSULTA1_idx` (`ID_ESTADO_CITA`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `consulta`
--

CREATE TABLE IF NOT EXISTS `consulta` (
  `ID_CONSULTA` int(11) NOT NULL AUTO_INCREMENT,
  `ID_EMPLEADO` int(11) NOT NULL,
  `ID_EXPEDIENTE` int(11) NOT NULL,
  `OBSERVACIONES` text NOT NULL,
  `DIAGNOSTICO` text NOT NULL,
  `FECHA_INICIO` datetime NOT NULL,
  `FECHA_FIN` datetime NOT NULL,
  `TEMPERATURA` decimal(10,2) DEFAULT NULL,
  `PESO` decimal(10,2) DEFAULT NULL,
  `PULSO` varchar(45) DEFAULT NULL,
  `TALLA` varchar(45) DEFAULT NULL,
  `TA` varchar(45) DEFAULT NULL,
  `ESTADO` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`ID_CONSULTA`,`ID_EMPLEADO`,`ID_EXPEDIENTE`),
  KEY `fk_CONSULTAS_EXPEDIENTES1_idx` (`ID_EXPEDIENTE`),
  KEY `fk_CONSULTA_EMPLEADO1_idx` (`ID_EMPLEADO`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_analisis`
--

CREATE TABLE IF NOT EXISTS `detalle_analisis` (
  `ID_DETALLE_ANALISIS` int(11) NOT NULL AUTO_INCREMENT,
  `ID_ANALISIS` int(11) NOT NULL,
  `ID_EXAMEN` int(11) NOT NULL,
  `DESCRIPCION` varchar(55) DEFAULT NULL,
  PRIMARY KEY (`ID_DETALLE_ANALISIS`,`ID_ANALISIS`,`ID_EXAMEN`),
  KEY `fk_DETALLE_ANALISIS_ANALISIS1_idx` (`ID_ANALISIS`),
  KEY `fk_DETALLE_ANALISIS_EXAMENES1_idx` (`ID_EXAMEN`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_inventario_medicamento`
--

CREATE TABLE IF NOT EXISTS `detalle_inventario_medicamento` (
  `ID_DETALLE_INVENTARIO` int(11) NOT NULL AUTO_INCREMENT,
  `ID_MEDICAMENTO` int(11) NOT NULL,
  `ID_INVENTARIO` int(11) NOT NULL,
  `CANTIDAD_UNIDAD` decimal(10,2) NOT NULL,
  `FECHA_VENCIMIENTO` datetime NOT NULL,
  PRIMARY KEY (`ID_DETALLE_INVENTARIO`,`ID_MEDICAMENTO`,`ID_INVENTARIO`),
  KEY `fk_DETALLE_INVENTARIO_MEDICAMENTO_MEDICAMENTOS1_idx` (`ID_MEDICAMENTO`),
  KEY `fk_DETALLE_INVENTARIO_MEDICAMENTO_INVENTARIO_MEDICAMENTOS1_idx` (`ID_INVENTARIO`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_receta`
--

CREATE TABLE IF NOT EXISTS `detalle_receta` (
  `ID_DETALLE_RECETA` int(11) NOT NULL AUTO_INCREMENT,
  `ID_RECETA` int(11) NOT NULL,
  `ID_MEDICAMENTO` int(11) NOT NULL,
  `CANTIDAD` decimal(10,2) NOT NULL,
  `DOSIS` varchar(55) NOT NULL,
  PRIMARY KEY (`ID_DETALLE_RECETA`,`ID_RECETA`,`ID_MEDICAMENTO`),
  KEY `fk_DETALLE_RECETAS_RECETAS1_idx` (`ID_RECETA`),
  KEY `fk_DETALLE_RECETAS_MEDICAMENTOS1_idx` (`ID_MEDICAMENTO`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_resultado_analisis`
--

CREATE TABLE IF NOT EXISTS `detalle_resultado_analisis` (
  `ID_DETALLE_RESULTADO_ANALISIS` int(11) NOT NULL,
  `ID_DETALLE_ANALISIS` int(11) NOT NULL,
  `RESULTADO` varchar(45) NOT NULL,
  PRIMARY KEY (`ID_DETALLE_RESULTADO_ANALISIS`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_rol`
--

CREATE TABLE IF NOT EXISTS `detalle_rol` (
  `ID_DETALLE_ROL` int(11) NOT NULL AUTO_INCREMENT,
  `ID_EMPLEADO` int(11) NOT NULL,
  `ID_ROL` int(11) NOT NULL,
  PRIMARY KEY (`ID_DETALLE_ROL`,`ID_EMPLEADO`,`ID_ROL`),
  KEY `fk_DETALLE_ROL_EMPLEADO1_idx` (`ID_EMPLEADO`),
  KEY `fk_DETALLE_ROL_ROL1_idx` (`ID_ROL`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `detalle_rol`
--

INSERT INTO `detalle_rol` (`ID_DETALLE_ROL`, `ID_EMPLEADO`, `ID_ROL`) VALUES
(1, 1, 1),
(2, 2, 1),
(3, 3, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `documento`
--

CREATE TABLE IF NOT EXISTS `documento` (
  `ID_DOCUMENTO` int(11) NOT NULL AUTO_INCREMENT,
  `ID_PERSONA` int(11) NOT NULL,
  `DOCUMENTO` varchar(55) NOT NULL,
  `NUMERO` varchar(55) NOT NULL,
  PRIMARY KEY (`ID_DOCUMENTO`,`ID_PERSONA`),
  KEY `fk_DOCUMENTO_PERSONA1_idx` (`ID_PERSONA`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleado`
--

CREATE TABLE IF NOT EXISTS `empleado` (
  `ID_EMPLEADO` int(11) NOT NULL,
  `ID_ESPECIALIDAD` int(11) DEFAULT NULL,
  `TITULO` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`ID_EMPLEADO`),
  KEY `fk_EMPLEADO_PERSONA1_idx` (`ID_EMPLEADO`),
  KEY `fk_EMPLEADO_ESPECIALIDAD1_idx` (`ID_ESPECIALIDAD`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `empleado`
--

INSERT INTO `empleado` (`ID_EMPLEADO`, `ID_ESPECIALIDAD`, `TITULO`) VALUES
(1, 1, NULL),
(2, 2, NULL),
(3, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `especialidad`
--

CREATE TABLE IF NOT EXISTS `especialidad` (
  `ID_ESPECIALIDAD` int(11) NOT NULL AUTO_INCREMENT,
  `NOMBRE` varchar(45) NOT NULL,
  `NJM` varchar(45) NOT NULL,
  PRIMARY KEY (`ID_ESPECIALIDAD`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `especialidad`
--

INSERT INTO `especialidad` (`ID_ESPECIALIDAD`, `NOMBRE`, `NJM`) VALUES
(1, 'General', 'G001'),
(2, 'Odontologico', 'O001');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estado_cita`
--

CREATE TABLE IF NOT EXISTS `estado_cita` (
  `ID_ESTADO_CITA` int(11) NOT NULL AUTO_INCREMENT,
  `ESTADO` varchar(25) NOT NULL,
  PRIMARY KEY (`ID_ESTADO_CITA`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Volcado de datos para la tabla `estado_cita`
--

INSERT INTO `estado_cita` (`ID_ESTADO_CITA`, `ESTADO`) VALUES
(1, 'Sin Validar'),
(2, 'Validada'),
(3, 'Iniciada'),
(4, 'Terminada'),
(5, 'Cancelada');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `examen`
--

CREATE TABLE IF NOT EXISTS `examen` (
  `ID_EXAMEN` int(11) NOT NULL AUTO_INCREMENT,
  `NOMBRE` varchar(45) NOT NULL,
  `DESCRIPCION` varchar(45) DEFAULT NULL,
  `VALOR_NORMAL` varchar(45) DEFAULT NULL,
  `VALOR_MENOR` varchar(45) DEFAULT NULL,
  `VALOR_SUPERIOR` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`ID_EXAMEN`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `expediente`
--

CREATE TABLE IF NOT EXISTS `expediente` (
  `ID_EXPEDIENTE` int(11) NOT NULL AUTO_INCREMENT,
  `ID_PACIENTE` int(11) NOT NULL,
  `CODIGO` varchar(45) DEFAULT NULL,
  `FECHA_CREACION` datetime NOT NULL,
  `EXONERADO` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`ID_EXPEDIENTE`,`ID_PACIENTE`),
  KEY `fk_EXPEDIENTE_PACIENTE1_idx` (`ID_PACIENTE`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `expediente`
--

INSERT INTO `expediente` (`ID_EXPEDIENTE`, `ID_PACIENTE`, `CODIGO`, `FECHA_CREACION`, `EXONERADO`) VALUES
(1, 4, '004', '2014-07-07 00:00:00', 0),
(2, 5, '005', '2014-07-07 00:00:00', 0),
(3, 6, '006', '2014-07-07 00:00:00', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inventario_medicamento`
--

CREATE TABLE IF NOT EXISTS `inventario_medicamento` (
  `ID_INVENTARIO` int(11) NOT NULL AUTO_INCREMENT,
  `FECHA_ENTREGA` datetime NOT NULL,
  `DONADO_POR` varchar(55) NOT NULL,
  PRIMARY KEY (`ID_INVENTARIO`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `medicamento`
--

CREATE TABLE IF NOT EXISTS `medicamento` (
  `ID_MEDICAMENTO` int(11) NOT NULL AUTO_INCREMENT,
  `NOMBRE` varchar(45) NOT NULL,
  `CASA_FARMACEUTICA` varchar(45) NOT NULL,
  `CODIGO` varchar(55) NOT NULL,
  `DESCRIPCION` varchar(45) DEFAULT NULL,
  `PRESENTACION` varchar(45) DEFAULT NULL,
  `CANTIDAD_ACTUAL` decimal(10,2) NOT NULL,
  PRIMARY KEY (`ID_MEDICAMENTO`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `medicamento`
--

INSERT INTO `medicamento` (`ID_MEDICAMENTO`, `NOMBRE`, `CASA_FARMACEUTICA`, `CODIGO`, `DESCRIPCION`, `PRESENTACION`, `CANTIDAD_ACTUAL`) VALUES
(1, 'Aspirina', 'bayer', '002', 'aspririna', 'pastilla', '15.00'),
(2, 'Dolofin', 'Lopez', '003', 'dolofin', 'pastilla', '25.00'),
(3, 'Ibuprofeno', 'Lestr', '004', 'Ibuprofena', 'pastilla', '25.00'),
(4, 'Zorritone', 'Lopez', '005', 'Jarabe', 'jarabe', '15.00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `paciente`
--

CREATE TABLE IF NOT EXISTS `paciente` (
  `ID_PACIENTE` int(11) NOT NULL,
  `FECHA_NACIMIENTO` date NOT NULL,
  `SEXO` varchar(45) NOT NULL,
  `DIRECCION` varchar(105) NOT NULL,
  `NOMBRE_PADRE` varchar(45) DEFAULT NULL,
  `RELIGION_PERTENECE` varchar(45) DEFAULT NULL,
  `OCUPACION` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`ID_PACIENTE`),
  KEY `fk_PACIENTE_PERSONA1_idx` (`ID_PACIENTE`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `paciente`
--

INSERT INTO `paciente` (`ID_PACIENTE`, `FECHA_NACIMIENTO`, `SEXO`, `DIRECCION`, `NOMBRE_PADRE`, `RELIGION_PERTENECE`, `OCUPACION`) VALUES
(4, '1980-01-01', 'Masculino', 'calle  nueva', NULL, NULL, NULL),
(5, '1980-01-01', 'Masculino', 'calle nueva', NULL, NULL, NULL),
(6, '1980-01-01', 'Femenino', 'calle nueva', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pago`
--

CREATE TABLE IF NOT EXISTS `pago` (
  `ID_PAGO` int(11) NOT NULL AUTO_INCREMENT,
  `ID_CONSULTA` int(11) NOT NULL,
  `ID_EMPLEADO` int(11) NOT NULL,
  `PRECIO` decimal(10,2) NOT NULL,
  `EXONERADO` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`ID_PAGO`,`ID_CONSULTA`,`ID_EMPLEADO`),
  KEY `fk_PAGOS_CONSULTAS1_idx` (`ID_CONSULTA`),
  KEY `fk_PAGO_EMPLEADO1_idx` (`ID_EMPLEADO`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `persona`
--

CREATE TABLE IF NOT EXISTS `persona` (
  `ID_PERSONA` int(11) NOT NULL AUTO_INCREMENT,
  `NOMBRE` varchar(55) NOT NULL,
  `APELLIDO` varchar(55) NOT NULL,
  `CORREO_ELECTRONICO` varchar(55) DEFAULT NULL,
  `TELEFONO` int(11) DEFAULT NULL,
  `ESTADO` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`ID_PERSONA`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Volcado de datos para la tabla `persona`
--

INSERT INTO `persona` (`ID_PERSONA`, `NOMBRE`, `APELLIDO`, `CORREO_ELECTRONICO`, `TELEFONO`, `ESTADO`) VALUES
(1, 'Medico 1', 'Medico 1', NULL, NULL, 1),
(2, 'Medico 2', 'Medico 2', NULL, NULL, 1),
(3, 'Secretaria 1', 'Secreataria 1', NULL, NULL, 1),
(4, 'Paciente 1', 'Paciente 1', 'paciente1@gmail.com', NULL, 1),
(5, 'Paciente 2', 'Paciente 2', 'paciente2@gmail.com', NULL, 1),
(6, 'Pacienet 3 ', 'Paciente 3', 'paciente3@gmail.com', NULL, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pre_consulta`
--

CREATE TABLE IF NOT EXISTS `pre_consulta` (
  `ID_PRE_CONSULTA` int(11) NOT NULL AUTO_INCREMENT,
  `ID_EMPLEADO` int(11) NOT NULL,
  `ID_CITA` int(11) NOT NULL,
  PRIMARY KEY (`ID_PRE_CONSULTA`,`ID_EMPLEADO`,`ID_CITA`),
  KEY `fk_PRE_CONSULTA_EMPLEADO1_idx` (`ID_EMPLEADO`),
  KEY `fk_PRE_CONSULTA_CITA1_idx` (`ID_CITA`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `receta`
--

CREATE TABLE IF NOT EXISTS `receta` (
  `ID_RECETA` int(11) NOT NULL AUTO_INCREMENT,
  `ID_CONSULTA` int(11) NOT NULL,
  PRIMARY KEY (`ID_RECETA`,`ID_CONSULTA`),
  KEY `fk_RECETAS_CONSULTAS1_idx` (`ID_CONSULTA`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `resultado_analisis`
--

CREATE TABLE IF NOT EXISTS `resultado_analisis` (
  `ID_RESULTADO_ANALISIS` int(11) NOT NULL,
  `ID_EMPLEADO` int(11) NOT NULL,
  `ID_DETALLE_ANALISIS` int(11) NOT NULL,
  `FECHA_CREACION` datetime NOT NULL,
  `RESULTADO` varchar(45) NOT NULL,
  PRIMARY KEY (`ID_RESULTADO_ANALISIS`,`ID_EMPLEADO`,`ID_DETALLE_ANALISIS`),
  KEY `fk_RESULTADO_ANALISIS_DETALLE_ANALISIS1_idx` (`ID_DETALLE_ANALISIS`),
  KEY `fk_RESULTADO_ANALISIS_EMPLEADO1_idx` (`ID_EMPLEADO`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol`
--

CREATE TABLE IF NOT EXISTS `rol` (
  `ID_ROL` int(11) NOT NULL AUTO_INCREMENT,
  `NOMBRE` varchar(45) NOT NULL,
  `DESCRIPCION` varchar(45) NOT NULL,
  PRIMARY KEY (`ID_ROL`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `rol`
--

INSERT INTO `rol` (`ID_ROL`, `NOMBRE`, `DESCRIPCION`) VALUES
(1, 'Medico', 'Usuario Operativo'),
(2, 'Secretaria', 'Usuario Operativo'),
(3, 'Administrador', 'Usuario Administrador');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
  `ID_PERSONA` int(11) NOT NULL,
  `USUARIO` varchar(45) NOT NULL,
  `PASSWORD` text NOT NULL,
  `ESTADO` int(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`ID_PERSONA`),
  KEY `fk_USUARIO_PERSONA1_idx` (`ID_PERSONA`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`ID_PERSONA`, `USUARIO`, `PASSWORD`, `ESTADO`) VALUES
(1, 'medico1', 'e10adc3949ba59abbe56e057f20f883e', 1),
(2, 'medico2', 'e10adc3949ba59abbe56e057f20f883e', 1),
(3, 'secretaria1', 'e10adc3949ba59abbe56e057f20f883e', 1);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `analisis`
--
ALTER TABLE `analisis`
  ADD CONSTRAINT `fk_ANALISIS_CONSULTAS1` FOREIGN KEY (`ID_CONSULTA`) REFERENCES `consulta` (`ID_CONSULTA`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `cita`
--
ALTER TABLE `cita`
  ADD CONSTRAINT `fk_CITA_PACIENTE1` FOREIGN KEY (`ID_PACIENTE`) REFERENCES `paciente` (`ID_PACIENTE`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_CITA_ESPECIALIDAD1` FOREIGN KEY (`ID_ESPECIALIDAD`) REFERENCES `especialidad` (`ID_ESPECIALIDAD`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_CITA_TIPO_CONSULTA1` FOREIGN KEY (`ID_ESTADO_CITA`) REFERENCES `estado_cita` (`ID_ESTADO_CITA`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `consulta`
--
ALTER TABLE `consulta`
  ADD CONSTRAINT `fk_CONSULTAS_EXPEDIENTES1` FOREIGN KEY (`ID_EXPEDIENTE`) REFERENCES `expediente` (`ID_EXPEDIENTE`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_CONSULTA_EMPLEADO1` FOREIGN KEY (`ID_EMPLEADO`) REFERENCES `empleado` (`ID_EMPLEADO`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `detalle_analisis`
--
ALTER TABLE `detalle_analisis`
  ADD CONSTRAINT `fk_DETALLE_ANALISIS_ANALISIS1` FOREIGN KEY (`ID_ANALISIS`) REFERENCES `analisis` (`ID_ANALISIS`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_DETALLE_ANALISIS_EXAMENES1` FOREIGN KEY (`ID_EXAMEN`) REFERENCES `examen` (`ID_EXAMEN`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `detalle_inventario_medicamento`
--
ALTER TABLE `detalle_inventario_medicamento`
  ADD CONSTRAINT `fk_DETALLE_INVENTARIO_MEDICAMENTO_MEDICAMENTOS1` FOREIGN KEY (`ID_MEDICAMENTO`) REFERENCES `medicamento` (`ID_MEDICAMENTO`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_DETALLE_INVENTARIO_MEDICAMENTO_INVENTARIO_MEDICAMENTOS1` FOREIGN KEY (`ID_INVENTARIO`) REFERENCES `inventario_medicamento` (`ID_INVENTARIO`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `detalle_receta`
--
ALTER TABLE `detalle_receta`
  ADD CONSTRAINT `fk_DETALLE_RECETAS_RECETAS1` FOREIGN KEY (`ID_RECETA`) REFERENCES `receta` (`ID_RECETA`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_DETALLE_RECETAS_MEDICAMENTOS1` FOREIGN KEY (`ID_MEDICAMENTO`) REFERENCES `medicamento` (`ID_MEDICAMENTO`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `detalle_rol`
--
ALTER TABLE `detalle_rol`
  ADD CONSTRAINT `fk_DETALLE_ROL_EMPLEADO1` FOREIGN KEY (`ID_EMPLEADO`) REFERENCES `empleado` (`ID_EMPLEADO`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_DETALLE_ROL_ROL1` FOREIGN KEY (`ID_ROL`) REFERENCES `rol` (`ID_ROL`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `documento`
--
ALTER TABLE `documento`
  ADD CONSTRAINT `fk_DOCUMENTO_PERSONA1` FOREIGN KEY (`ID_PERSONA`) REFERENCES `persona` (`ID_PERSONA`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `empleado`
--
ALTER TABLE `empleado`
  ADD CONSTRAINT `fk_EMPLEADO_PERSONA1` FOREIGN KEY (`ID_EMPLEADO`) REFERENCES `persona` (`ID_PERSONA`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_EMPLEADO_ESPECIALIDAD1` FOREIGN KEY (`ID_ESPECIALIDAD`) REFERENCES `especialidad` (`ID_ESPECIALIDAD`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `expediente`
--
ALTER TABLE `expediente`
  ADD CONSTRAINT `fk_EXPEDIENTE_PACIENTE1` FOREIGN KEY (`ID_PACIENTE`) REFERENCES `paciente` (`ID_PACIENTE`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `paciente`
--
ALTER TABLE `paciente`
  ADD CONSTRAINT `fk_PACIENTE_PERSONA1` FOREIGN KEY (`ID_PACIENTE`) REFERENCES `persona` (`ID_PERSONA`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `pago`
--
ALTER TABLE `pago`
  ADD CONSTRAINT `fk_PAGOS_CONSULTAS1` FOREIGN KEY (`ID_CONSULTA`) REFERENCES `consulta` (`ID_CONSULTA`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_PAGO_EMPLEADO1` FOREIGN KEY (`ID_EMPLEADO`) REFERENCES `empleado` (`ID_EMPLEADO`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `pre_consulta`
--
ALTER TABLE `pre_consulta`
  ADD CONSTRAINT `fk_PRE_CONSULTA_EMPLEADO1` FOREIGN KEY (`ID_EMPLEADO`) REFERENCES `empleado` (`ID_EMPLEADO`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_PRE_CONSULTA_CITA1` FOREIGN KEY (`ID_CITA`) REFERENCES `cita` (`ID_CITA`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `receta`
--
ALTER TABLE `receta`
  ADD CONSTRAINT `fk_RECETAS_CONSULTAS1` FOREIGN KEY (`ID_CONSULTA`) REFERENCES `consulta` (`ID_CONSULTA`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `resultado_analisis`
--
ALTER TABLE `resultado_analisis`
  ADD CONSTRAINT `fk_RESULTADO_ANALISIS_DETALLE_ANALISIS1` FOREIGN KEY (`ID_DETALLE_ANALISIS`) REFERENCES `detalle_analisis` (`ID_DETALLE_ANALISIS`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_RESULTADO_ANALISIS_EMPLEADO1` FOREIGN KEY (`ID_EMPLEADO`) REFERENCES `empleado` (`ID_EMPLEADO`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `fk_USUARIO_PERSONA1` FOREIGN KEY (`ID_PERSONA`) REFERENCES `persona` (`ID_PERSONA`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
