-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 12-07-2014 a las 21:27:14
-- Versión del servidor: 5.6.16
-- Versión de PHP: 5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `clinica`
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cita`
--

CREATE TABLE IF NOT EXISTS `cita` (
  `ID_CITA` int(11) NOT NULL AUTO_INCREMENT,
  `ID_PACIENTE` int(11) NOT NULL,
  `ID_ESPECIALIDAD` int(11) NOT NULL,
  `FECHA_INICIO` datetime NOT NULL,
  `FECHA_FIN` datetime NOT NULL,
  `MOTIVO` varchar(55) DEFAULT NULL,
  `ESTADO` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`ID_CITA`,`ID_PACIENTE`,`ID_ESPECIALIDAD`),
  KEY `fk_CITA_PACIENTE1_idx` (`ID_PACIENTE`),
  KEY `fk_CITA_ESPECIALIDAD1_idx` (`ID_ESPECIALIDAD`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `consulta`
--

CREATE TABLE IF NOT EXISTS `consulta` (
  `ID_CONSULTA` int(11) NOT NULL,
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_resultado_analisis`
--

CREATE TABLE IF NOT EXISTS `detalle_resultado_analisis` (
  `ID_DETALLE_RESULTADO_ANALISIS` int(11) NOT NULL,
  `ID_DETALLE_ANALISIS` int(11) NOT NULL,
  `RESULTADO` varchar(45) NOT NULL,
  PRIMARY KEY (`ID_DETALLE_RESULTADO_ANALISIS`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleado`
--

CREATE TABLE IF NOT EXISTS `empleado` (
  `ID_EMPLEADO` int(11) NOT NULL,
  `ID_ESPECIALIDAD` int(11) NOT NULL,
  `TITULO` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`ID_EMPLEADO`,`ID_ESPECIALIDAD`),
  KEY `fk_EMPLEADO_PERSONA1_idx` (`ID_EMPLEADO`),
  KEY `fk_EMPLEADO_ESPECIALIDAD1_idx` (`ID_ESPECIALIDAD`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `especialidad`
--

CREATE TABLE IF NOT EXISTS `especialidad` (
  `ID_ESPECIALIDAD` int(11) NOT NULL AUTO_INCREMENT,
  `NOMBRE` varchar(45) NOT NULL,
  `CODIGO` varchar(45) NOT NULL,
  PRIMARY KEY (`ID_ESPECIALIDAD`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `especialidad`
--

INSERT INTO `especialidad` (`ID_ESPECIALIDAD`, `NOMBRE`, `CODIGO`) VALUES
(1, 'General', 'G001'),
(2, 'Odontologia', 'O001');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `expediente`
--

CREATE TABLE IF NOT EXISTS `expediente` (
  `ID_EXPEDIENTE` int(11) NOT NULL AUTO_INCREMENT,
  `ID_PACIENTE` int(11) NOT NULL,
  `FECHA_CREACION` datetime NOT NULL,
  PRIMARY KEY (`ID_EXPEDIENTE`,`ID_PACIENTE`),
  KEY `fk_EXPEDIENTE_PACIENTE1_idx` (`ID_PACIENTE`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inventario_medicamento`
--

CREATE TABLE IF NOT EXISTS `inventario_medicamento` (
  `ID_INVENTARIO` int(11) NOT NULL AUTO_INCREMENT,
  `FECHA_ENTREGA` datetime NOT NULL,
  `DONADO_POR` varchar(55) NOT NULL,
  PRIMARY KEY (`ID_INVENTARIO`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `medicamento`
--

CREATE TABLE IF NOT EXISTS `medicamento` (
  `ID_MEDICAMENTO` int(11) NOT NULL,
  `NOMBRE` varchar(45) NOT NULL,
  `CASA_FARMACEUTICA` varchar(45) NOT NULL,
  `CODIGO` varchar(55) NOT NULL,
  `DESCRIPCION` varchar(45) DEFAULT NULL,
  `PRESENTACION` varchar(45) DEFAULT NULL,
  `CANTIDAD_ACTUAL` decimal(10,2) NOT NULL,
  PRIMARY KEY (`ID_MEDICAMENTO`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `paciente`
--

CREATE TABLE IF NOT EXISTS `paciente` (
  `ID_PACIENTE` int(11) NOT NULL,
  `CODIGO` varchar(45) DEFAULT NULL,
  `FECHA_NACIMIENTO` date NOT NULL,
  `SEXO` varchar(45) NOT NULL,
  `DIRECCION` varchar(105) NOT NULL,
  `NOMBRE_PADRE` varchar(45) DEFAULT NULL,
  `RELIGION_PERTENECE` varchar(45) DEFAULT NULL,
  `OCUPACION` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`ID_PACIENTE`),
  KEY `fk_PACIENTE_PERSONA1_idx` (`ID_PACIENTE`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `paciente`
--

INSERT INTO `paciente` (`ID_PACIENTE`, `CODIGO`, `FECHA_NACIMIENTO`, `SEXO`, `DIRECCION`, `NOMBRE_PADRE`, `RELIGION_PERTENECE`, `OCUPACION`) VALUES
(1, '0001', '1980-01-07', 'Femenino', 'hh', '', '', 'Estudiante'),
(6, NULL, '1980-01-07', 'Masculino', 'Calle nueva', '', '', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pago`
--

CREATE TABLE IF NOT EXISTS `pago` (
  `ID_PAGO` int(11) NOT NULL AUTO_INCREMENT,
  `ID_CONSULTA` int(11) NOT NULL,
  `ID_EMPLEADO` int(11) NOT NULL,
  `PRECIO` decimal(10,2) NOT NULL,
  `EXONERADO` varchar(45) NOT NULL DEFAULT '0',
  PRIMARY KEY (`ID_PAGO`,`ID_CONSULTA`,`ID_EMPLEADO`),
  KEY `fk_PAGOS_CONSULTAS1_idx` (`ID_CONSULTA`),
  KEY `fk_PAGO_EMPLEADO1_idx` (`ID_EMPLEADO`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `persona`
--

CREATE TABLE IF NOT EXISTS `persona` (
  `ID_PERSONA` int(11) NOT NULL AUTO_INCREMENT,
  `NOMBRE` varchar(55) NOT NULL,
  `APELLIDO` varchar(55) NOT NULL,
  `CORREO_ELECTRONICO` varchar(55) DEFAULT NULL,
  `TELEFONO` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`ID_PERSONA`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Volcado de datos para la tabla `persona`
--

INSERT INTO `persona` (`ID_PERSONA`, `NOMBRE`, `APELLIDO`, `CORREO_ELECTRONICO`, `TELEFONO`) VALUES
(1, 'paciente 2', 'paciente 2', 'paciente2@gamil.com', '22222222'),
(2, 'asd', 'asd', '', ''),
(3, 'paciente 2', 'paciente 2', '', ''),
(4, 'paciente 1 1', 'paciente 1', '', '77777777'),
(5, 'paciente 11', 'paciente 1', '', '77777777'),
(6, 'paciente 1', 'paciente 1', 'paciente1@gamil.com', '77777777');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `receta`
--

CREATE TABLE IF NOT EXISTS `receta` (
  `ID_RECETA` int(11) NOT NULL,
  `ID_CONSULTA` int(11) NOT NULL,
  PRIMARY KEY (`ID_RECETA`,`ID_CONSULTA`),
  KEY `fk_RECETAS_CONSULTAS1_idx` (`ID_CONSULTA`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol`
--

CREATE TABLE IF NOT EXISTS `rol` (
  `ID_ROL` int(11) NOT NULL AUTO_INCREMENT,
  `NOMBRE` varchar(45) NOT NULL,
  `DESCRIPCION` varchar(45) NOT NULL,
  PRIMARY KEY (`ID_ROL`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
  ADD CONSTRAINT `fk_CITA_ESPECIALIDAD1` FOREIGN KEY (`ID_ESPECIALIDAD`) REFERENCES `especialidad` (`ID_ESPECIALIDAD`) ON DELETE NO ACTION ON UPDATE NO ACTION;

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
