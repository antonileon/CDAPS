-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 28-11-2017 a las 04:53:26
-- Versión del servidor: 5.6.21
-- Versión de PHP: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `cdaps`
--
CREATE DATABASE IF NOT EXISTS `cdaps` DEFAULT CHARACTER SET utf8 COLLATE utf8_spanish_ci;
USE `cdaps`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asistencias`
--

CREATE TABLE IF NOT EXISTS `asistencias` (
`id_asistencia` int(11) NOT NULL,
  `id_personas` int(11) NOT NULL,
  `fecha` date NOT NULL COMMENT 'día de la asistencia',
  `hora` time NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `asistencias`
--

INSERT INTO `asistencias` (`id_asistencia`, `id_personas`, `fecha`, `hora`) VALUES
(1, 3, '2017-09-19', '09:21:23');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `auditoria`
--

CREATE TABLE IF NOT EXISTS `auditoria` (
`id` int(11) NOT NULL,
  `usuario` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `actividad` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `fecha` date NOT NULL,
  `hora` time NOT NULL,
  `status` enum('0','1') COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=71 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `auditoria`
--

INSERT INTO `auditoria` (`id`, `usuario`, `actividad`, `fecha`, `hora`, `status`) VALUES
(1, 'admin ', 'Ha iniciado sesi&oacute;n', '2017-11-24', '13:01:28', '0'),
(2, 'admin ', 'Ha iniciado sesi&oacute;n', '2017-11-24', '16:05:46', '0'),
(3, 'Admin ', 'Ha Inhabilitado a una persona', '2017-11-24', '16:11:11', '0'),
(4, 'Admin ', 'Ha Inhabilitado a una persona', '2017-11-24', '16:12:34', '0'),
(5, 'admin ', 'Ha iniciado sesi&oacute;n', '2017-11-26', '19:49:10', '0'),
(6, 'Admin ', 'Ha Censado a Centro de Alimentacion Pueblo Manzo', '2017-11-26', '19:51:37', '0'),
(7, 'admin ', 'Ha iniciado sesi&oacute;n', '2017-11-26', '21:26:13', '0'),
(8, 'Admin ', 'Ha Inhabilitado a una persona', '2017-11-26', '21:37:59', '0'),
(9, 'Admin ', 'Ha Inhabilitado a una persona', '2017-11-26', '21:38:10', '0'),
(10, 'Admin ', 'Ha Inhabilitado a una persona', '2017-11-26', '21:39:31', '0'),
(11, 'Admin ', 'Ha Inhabilitado a una persona', '2017-11-26', '21:39:45', '0'),
(12, 'Admin ', 'Ha Inhabilitado a una persona', '2017-11-26', '21:40:48', '0'),
(13, 'Admin ', 'Ha Inhabilitado a una persona', '2017-11-26', '21:43:23', '0'),
(14, 'Admin ', 'Ha Inhabilitado a una persona', '2017-11-26', '21:43:43', '0'),
(15, 'Admin ', 'Ha modificado los datos de Carla Stepha Natera', '2017-11-26', '21:46:24', '0'),
(16, 'Admin ', 'Ha Inhabilitado a una persona', '2017-11-26', '21:46:41', '0'),
(17, 'Admin ', 'Ha Inhabilitado a una persona', '2017-11-26', '21:48:09', '0'),
(18, 'Admin ', 'Ha Inhabilitado a una persona', '2017-11-26', '21:48:19', '0'),
(19, 'Admin ', 'Ha Inhabilitado a una persona', '2017-11-26', '21:49:19', '0'),
(20, 'Admin ', 'Ha Inhabilitado a una persona', '2017-11-26', '21:49:46', '0'),
(21, 'Admin ', 'Ha Inhabilitado a una persona', '2017-11-26', '21:50:29', '0'),
(22, 'Admin ', 'Ha Inhabilitado a una persona', '2017-11-26', '21:51:06', '0'),
(23, 'Admin ', 'Ha Inhabilitado a una persona', '2017-11-26', '21:52:00', '0'),
(24, 'Admin ', 'Ha Inhabilitado a una persona', '2017-11-26', '21:52:57', '0'),
(25, 'Admin ', 'Ha Inhabilitado a una persona', '2017-11-26', '21:55:44', '0'),
(26, 'Admin ', 'Ha Inhabilitado a una persona', '2017-11-26', '21:57:44', '0'),
(27, 'Admin ', 'Ha Inhabilitado a una persona', '2017-11-26', '21:58:40', '0'),
(28, 'Admin ', 'Ha Inhabilitado a una persona', '2017-11-26', '21:59:17', '0'),
(29, 'Admin ', 'Ha Inhabilitado a una persona', '2017-11-26', '21:59:45', '0'),
(30, 'Admin ', 'Ha Inhabilitado a una persona', '2017-11-26', '22:01:20', '0'),
(31, 'Admin ', 'Ha Inhabilitado a una persona', '2017-11-26', '22:01:39', '0'),
(32, 'Admin ', 'Ha Inhabilitado a una persona', '2017-11-26', '22:02:30', '0'),
(33, 'Admin ', 'Ha Inhabilitado a una persona', '2017-11-26', '22:02:38', '0'),
(34, 'Admin ', 'Ha Inhabilitado a una persona', '2017-11-26', '22:02:48', '0'),
(35, 'Admin ', 'Ha Inhabilitado a una persona', '2017-11-26', '22:03:48', '0'),
(36, 'Admin ', 'Ha Inhabilitado a una persona', '2017-11-26', '22:04:52', '0'),
(37, 'Admin ', 'Ha Inhabilitado a una persona', '2017-11-26', '22:05:42', '0'),
(38, 'Admin ', 'Ha Inhabilitado a una persona', '2017-11-26', '22:05:49', '0'),
(39, 'Admin ', 'Ha Inhabilitado a una persona', '2017-11-26', '22:07:48', '0'),
(40, 'Admin ', 'Ha Inhabilitado a una persona', '2017-11-26', '22:08:13', '0'),
(41, 'Admin ', 'Ha Inhabilitado a una persona', '2017-11-26', '22:08:41', '0'),
(42, 'Admin ', 'Ha modificado los datos de Centro de Alimentacion Pueblo Manzo', '2017-11-26', '22:10:50', '0'),
(43, 'Admin ', 'Ha Inhabilitado a una persona', '2017-11-26', '22:13:02', '0'),
(44, 'Admin ', 'Ha Inhabilitado a una persona', '2017-11-26', '22:14:30', '0'),
(45, 'Admin ', 'Ha Inhabilitado a una persona', '2017-11-26', '22:15:17', '0'),
(46, 'Admin ', 'Ha Inhabilitado a una persona', '2017-11-26', '22:15:38', '0'),
(47, 'Admin ', 'Ha Inhabilitado a una persona', '2017-11-26', '22:15:45', '0'),
(48, 'Admin ', 'Ha Inhabilitado a una persona', '2017-11-26', '22:16:24', '0'),
(49, 'Admin ', 'Ha Inhabilitado a una persona', '2017-11-26', '22:16:37', '0'),
(50, 'Admin ', 'Ha Inhabilitado a una persona', '2017-11-26', '22:16:45', '0'),
(51, 'Admin ', 'Ha Inhabilitado a una persona', '2017-11-26', '22:16:57', '0'),
(52, 'Admin ', 'Ha Inhabilitado a una persona', '2017-11-26', '22:17:17', '0'),
(53, 'Admin ', 'Ha Inhabilitado a una persona', '2017-11-26', '22:17:56', '0'),
(54, 'Admin ', 'Ha Inhabilitado a una persona', '2017-11-26', '22:18:25', '0'),
(55, 'admin ', 'Ha iniciado sesi&oacute;n', '2017-11-27', '07:28:24', '0'),
(56, 'Admin ', 'Ha Inhabilitado a una persona', '2017-11-27', '07:28:37', '0'),
(57, 'admin ', 'Ha iniciado sesi&oacute;n', '2017-11-27', '13:51:29', '0'),
(58, 'Admin ', 'Ha Inhabilitado a una persona', '2017-11-27', '13:53:01', '0'),
(59, 'Admin ', 'Ha Inhabilitado a una persona', '2017-11-27', '13:53:58', '0'),
(60, 'Admin ', 'Ha Inhabilitado a una persona', '2017-11-27', '13:58:40', '0'),
(61, 'Admin ', 'Ha Inhabilitado a una persona', '2017-11-27', '14:04:00', '0'),
(62, 'Admin ', 'Ha Inhabilitado a una persona', '2017-11-27', '14:04:49', '0'),
(63, 'Admin ', 'Ha Inhabilitado a una persona', '2017-11-27', '14:04:55', '0'),
(64, 'admin ', 'Ha iniciado sesi&oacute;n', '2017-11-27', '15:39:18', '0'),
(65, 'admin ', 'Ha iniciado sesi&oacute;n', '2017-11-27', '21:31:22', '0'),
(66, 'admin ', 'Ha iniciado sesi&oacute;n', '2017-11-27', '22:41:25', '0'),
(67, 'admin ', 'Ha iniciado sesi&oacute;n', '2017-11-27', '22:53:26', '0'),
(68, 'admin ', 'Ha iniciado sesi&oacute;n', '2017-11-27', '22:53:43', '0'),
(69, 'admin ', 'Ha iniciado sesi&oacute;n', '2017-11-27', '23:02:49', '0'),
(70, 'admin ', 'Ha iniciado sesi&oacute;n', '2017-11-27', '23:14:12', '0');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `configuracion`
--

CREATE TABLE IF NOT EXISTS `configuracion` (
`id_configuracion` int(11) NOT NULL,
  `nombre` varchar(60) NOT NULL,
  `siglas` varchar(60) NOT NULL,
  `sueldo` double(10,0) NOT NULL,
  `logo` varchar(60) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `configuracion`
--

INSERT INTO `configuracion` (`id_configuracion`, `nombre`, `siglas`, `sueldo`, `logo`) VALUES
(1, 'Centro de Alimentacion Pueblo Socialista', 'CDAPS', 234215, 'logo.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `datos_personas`
--

CREATE TABLE IF NOT EXISTS `datos_personas` (
`id_datos_personas` int(11) NOT NULL,
  `estado` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `ciudad` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `municipio` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `parroquia` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `direccion` text COLLATE utf8_spanish_ci NOT NULL,
  `tipo_vivienda` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `condicion_vivienda` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `terrenodom` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `trabaja` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `nombre_empresa` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `fecha_ingreso` varchar(25) COLLATE utf8_spanish_ci NOT NULL,
  `cargo_trabajo` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `empreproplab` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `actividad_economica` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT 'actividad economica, laboral ',
  `ingreso_fijo` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `otros_ingresos` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `gasto_total` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `datos_personas`
--

INSERT INTO `datos_personas` (`id_datos_personas`, `estado`, `ciudad`, `municipio`, `parroquia`, `direccion`, `tipo_vivienda`, `condicion_vivienda`, `terrenodom`, `trabaja`, `nombre_empresa`, `fecha_ingreso`, `cargo_trabajo`, `empreproplab`, `actividad_economica`, `ingreso_fijo`, `otros_ingresos`, `gasto_total`) VALUES
(1, 'Aragua', 'El Consejo', 'JosÃ© Rafael Revenga', 'Trapiche del Medio', 'S/N', 'Rancho', 'Propia Pagada', '', 'Si', '', '', '', '', '', '1111', '', '1110'),
(2, 'Aragua', 'El Consejo', 'JosÃ© Rafael Revenga', 'El Consejo', 'S/N', 'Quinta', 'Prestada', '', 'Si', '', '', '', '', '', '2536', '', '2537'),
(3, 'Aragua', 'El Consejo', 'JosÃ© Rafael Revenga', 'El Consejo', 'S/N', 'Rancho', 'Propia Pagada', '', 'No', '', '', '', '', '', '2500', '', ''),
(4, 'Aragua', 'El Consejo', 'JosÃ© Rafael Revenga', 'El Consejo', 's', 'Rancho', 'Propia Pagada', '', 'No', '', '', '', '', '', '0', '', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `insumos`
--

CREATE TABLE IF NOT EXISTS `insumos` (
`id_insumos` int(11) NOT NULL,
  `id_proveedores` int(11) NOT NULL,
  `codigo_insumo` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `tipo` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `nombre` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `marca` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `fecha_registro` date NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `insumos`
--

INSERT INTO `insumos` (`id_insumos`, `id_proveedores`, `codigo_insumo`, `tipo`, `nombre`, `marca`, `fecha_registro`) VALUES
(1, 1, 'CDAPS-1', 'Frutas', 'Manzanas', 'Importadas', '2017-11-24');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inventario`
--

CREATE TABLE IF NOT EXISTS `inventario` (
`id_inventario` int(11) NOT NULL,
  `id_insumos` int(11) NOT NULL,
  `estado` enum('Aceptado','Rechazado','','') COLLATE utf8_spanish_ci NOT NULL,
  `observaciones` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `cantidad` int(11) NOT NULL,
  `fecha_entrega` date NOT NULL,
  `fecha_vencimiento` date NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `inventario`
--

INSERT INTO `inventario` (`id_inventario`, `id_insumos`, `estado`, `observaciones`, `cantidad`, `fecha_entrega`, `fecha_vencimiento`) VALUES
(1, 1, 'Aceptado', '1', 5, '2017-11-27', '2017-11-26');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `menu_comida`
--

CREATE TABLE IF NOT EXISTS `menu_comida` (
`id_menu` int(11) NOT NULL,
  `plato` varchar(50) NOT NULL,
  `jugo` varchar(50) NOT NULL,
  `merienda` varchar(50) NOT NULL,
  `fecha` date NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `menu_comida`
--

INSERT INTO `menu_comida` (`id_menu`, `plato`, `jugo`, `merienda`, `fecha`) VALUES
(1, 'Pasticho', 'Guanabana', 'Pan', '2017-11-26'),
(2, 'Pasticho', 'Guanabana', 'Pan', '2017-11-28'),
(3, 'Pasticho', 'Guanabana', 'Pan', '2017-11-27');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `observaciones`
--

CREATE TABLE IF NOT EXISTS `observaciones` (
`id_observaciones` int(11) NOT NULL,
  `id_personas` int(11) NOT NULL,
  `motivo_eliminar` text NOT NULL,
  `fecha_eliminar` date NOT NULL,
  `motivo_beneficiar` int(11) NOT NULL,
  `fecha_beneficiar` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personas`
--

CREATE TABLE IF NOT EXISTS `personas` (
`id_personas` int(11) NOT NULL,
  `id_datos_personas` int(11) NOT NULL,
  `cedula` varchar(9) COLLATE utf8_spanish_ci NOT NULL,
  `nombre` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `apellido` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `sexo` enum('Masculino','Femenino') CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `estado_civil` enum('Soltero(a)','Casado(a)','Viudo(a)','Divorciado(a)') CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `telefono` varchar(11) COLLATE utf8_spanish_ci NOT NULL,
  `fecha_nacimiento` date NOT NULL,
  `lugar_nacimiento` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `nivel_estudio` enum('Primaria no Completa','Primaria Completa','Secundaria no Completa','Secundaria Completa','Técnico Medio','T.S.U.','Universitario') CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `profesion` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `num_hijos` int(20) NOT NULL,
  `personas_cargo` int(20) NOT NULL,
  `discapacidad` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `fecha_registro` date NOT NULL,
  `motivo_eliminar` text COLLATE utf8_spanish_ci NOT NULL,
  `motivo_beneficiar` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `estatus` enum('Censado(a)','Beneficiado(a)','Inhabilitado(a)','') COLLATE utf8_spanish_ci NOT NULL COMMENT 'Estado'
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `personas`
--

INSERT INTO `personas` (`id_personas`, `id_datos_personas`, `cedula`, `nombre`, `apellido`, `sexo`, `estado_civil`, `telefono`, `fecha_nacimiento`, `lugar_nacimiento`, `nivel_estudio`, `profesion`, `num_hijos`, `personas_cargo`, `discapacidad`, `fecha_registro`, `motivo_eliminar`, `motivo_beneficiar`, `estatus`) VALUES
(1, 1, '12345678', 'Carla Stepha', 'Natera', 'Femenino', 'Casado(a)', '04121234569', '2015-07-01', 'La Victoria', 'Primaria Completa', 'Estudiante', 2, 2, '', '2017-08-10', '', '', 'Inhabilitado(a)'),
(2, 2, '87654321', 'Kathe', 'Manzo', 'Femenino', 'Divorciado(a)', '04141236548', '2015-07-07', 'La Victoria', 'T.S.U.', 'Trabajar', 5, 5, '', '2017-09-14', '', '', 'Inhabilitado(a)'),
(3, 3, '25364883', 'JosÃ©', 'LeÃ³n', 'Masculino', 'Soltero(a)', '04121234569', '2017-09-14', 'La Victoria', 'Primaria no Completa', 'Atleta', 0, 1, '', '2016-09-14', 'sda', 'Antoni Leon', 'Beneficiado(a)'),
(4, 4, '25364556', 'Centro de Alimentacion Pueblo', 'Manzo', 'Femenino', 'Soltero(a)', '04123654852', '2017-11-26', 'La Victoria', 'Primaria Completa', '', 1, 1, 's', '2017-11-26', '', '', 'Censado(a)');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedores`
--

CREATE TABLE IF NOT EXISTS `proveedores` (
`id_proveedores` int(11) NOT NULL,
  `tipo_rif` varchar(2) COLLATE utf8_spanish_ci NOT NULL,
  `rif` varchar(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `nombre_proveedor` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `telefono` varchar(15) COLLATE utf8_spanish_ci NOT NULL,
  `email` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `direccion_proveedores` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `tipo_insumos` varchar(25) COLLATE utf8_spanish_ci NOT NULL,
  `fecha_registro` date NOT NULL,
  `estatus` varchar(25) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `proveedores`
--

INSERT INTO `proveedores` (`id_proveedores`, `tipo_rif`, `rif`, `nombre_proveedor`, `telefono`, `email`, `direccion_proveedores`, `tipo_insumos`, `fecha_registro`, `estatus`) VALUES
(1, 'G', '253648836', 'Antoni', '04123654852', '', '4dsa', '', '2017-11-24', 'Activo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `seguimiento`
--

CREATE TABLE IF NOT EXISTS `seguimiento` (
`id` int(11) NOT NULL,
  `id_persona` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `accion` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `observacion` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_insumos`
--

CREATE TABLE IF NOT EXISTS `tipo_insumos` (
`id_tipo_insumos` int(11) NOT NULL,
  `tipo_insumos` varchar(25) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tipo_insumos`
--

INSERT INTO `tipo_insumos` (`id_tipo_insumos`, `tipo_insumos`) VALUES
(1, 'Secos'),
(2, 'Frutas'),
(3, 'Hortalizas'),
(4, 'Verduras'),
(5, 'Carne'),
(6, 'Pollo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
`id` int(11) NOT NULL,
  `tipocuenta` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `usuario` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(120) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `nombre` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `apellido` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `cedula` int(8) NOT NULL,
  `email` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `sexo` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `ocupacion` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `direccion` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `telefono` varchar(11) COLLATE utf8_spanish_ci NOT NULL,
  `pregunta` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `respuesta` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `profile` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `registro` date NOT NULL,
  `status` varchar(2) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id`, `tipocuenta`, `usuario`, `password`, `nombre`, `apellido`, `cedula`, `email`, `sexo`, `ocupacion`, `direccion`, `telefono`, `pregunta`, `respuesta`, `profile`, `registro`, `status`) VALUES
(1, 'Administrador(a)', 'Admin', '81dc9bdb52d04dc20036dbd8313ed055', 'Carla', 'Natera', 12345678, 'admin@gmail.com', 'M', 'Estudiante', 'El Consejo', '04120360852', '3', 'dios', 'Toni.jpg', '2017-09-03', '1'),
(3, 'Supervisor(a)', 'login', '81dc9bdb52d04dc20036dbd8313ed055', 'Supervisor', 'Supervisor', 12345687, 'root@gmail.com', 'M', 'Estudiantes', 'Caracas', '02443228569', '3', 'dios', 'male.png', '2017-09-20', '1');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `asistencias`
--
ALTER TABLE `asistencias`
 ADD PRIMARY KEY (`id_asistencia`), ADD KEY `id_persona` (`id_personas`);

--
-- Indices de la tabla `auditoria`
--
ALTER TABLE `auditoria`
 ADD PRIMARY KEY (`id`), ADD KEY `id_usuario` (`usuario`);

--
-- Indices de la tabla `configuracion`
--
ALTER TABLE `configuracion`
 ADD PRIMARY KEY (`id_configuracion`);

--
-- Indices de la tabla `datos_personas`
--
ALTER TABLE `datos_personas`
 ADD PRIMARY KEY (`id_datos_personas`);

--
-- Indices de la tabla `insumos`
--
ALTER TABLE `insumos`
 ADD PRIMARY KEY (`id_insumos`), ADD KEY `id_proveedores` (`id_proveedores`);

--
-- Indices de la tabla `inventario`
--
ALTER TABLE `inventario`
 ADD PRIMARY KEY (`id_inventario`), ADD KEY `id_insumos` (`id_insumos`);

--
-- Indices de la tabla `menu_comida`
--
ALTER TABLE `menu_comida`
 ADD PRIMARY KEY (`id_menu`);

--
-- Indices de la tabla `observaciones`
--
ALTER TABLE `observaciones`
 ADD PRIMARY KEY (`id_observaciones`);

--
-- Indices de la tabla `personas`
--
ALTER TABLE `personas`
 ADD PRIMARY KEY (`id_personas`);

--
-- Indices de la tabla `proveedores`
--
ALTER TABLE `proveedores`
 ADD PRIMARY KEY (`id_proveedores`);

--
-- Indices de la tabla `seguimiento`
--
ALTER TABLE `seguimiento`
 ADD PRIMARY KEY (`id`), ADD KEY `id_persona` (`id_persona`);

--
-- Indices de la tabla `tipo_insumos`
--
ALTER TABLE `tipo_insumos`
 ADD PRIMARY KEY (`id_tipo_insumos`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `cedula` (`cedula`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `asistencias`
--
ALTER TABLE `asistencias`
MODIFY `id_asistencia` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `auditoria`
--
ALTER TABLE `auditoria`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=71;
--
-- AUTO_INCREMENT de la tabla `configuracion`
--
ALTER TABLE `configuracion`
MODIFY `id_configuracion` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `datos_personas`
--
ALTER TABLE `datos_personas`
MODIFY `id_datos_personas` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `insumos`
--
ALTER TABLE `insumos`
MODIFY `id_insumos` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `inventario`
--
ALTER TABLE `inventario`
MODIFY `id_inventario` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `menu_comida`
--
ALTER TABLE `menu_comida`
MODIFY `id_menu` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `observaciones`
--
ALTER TABLE `observaciones`
MODIFY `id_observaciones` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `personas`
--
ALTER TABLE `personas`
MODIFY `id_personas` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `proveedores`
--
ALTER TABLE `proveedores`
MODIFY `id_proveedores` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `seguimiento`
--
ALTER TABLE `seguimiento`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `tipo_insumos`
--
ALTER TABLE `tipo_insumos`
MODIFY `id_tipo_insumos` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
