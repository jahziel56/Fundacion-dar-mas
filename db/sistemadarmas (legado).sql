-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 01-10-2019 a las 06:17:10
-- Versión del servidor: 10.1.32-MariaDB
-- Versión de PHP: 7.2.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `sistemadarmas`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `confirmar_cuenta`
--

CREATE TABLE `confirmar_cuenta` (
  `confirmar_cuenta_Id` int(11) NOT NULL,
  `cuenta_Id` int(11) NOT NULL,
  `Selector` text COLLATE utf8_spanish_ci NOT NULL,
  `Token` longtext COLLATE utf8_spanish_ci NOT NULL,
  `Token_Date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cuenta`
--

CREATE TABLE `cuenta` (
  `Id_Cuenta` int(11) NOT NULL,
  `Username` tinytext CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `Password` tinytext CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `Email` longtext CHARACTER SET utf8 COLLATE utf8_swedish_ci NOT NULL,
  `Type` smallint(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `cuenta`
--

INSERT INTO `cuenta` (`Id_Cuenta`, `Username`, `Password`, `Email`, `Type`) VALUES
(1, '123', '$2y$10$MlGAbUn0agV1Nev2Lhs2.uN212AASF.G7u2BastzwRClgSwx8pE.C', '1jahziel56@hotmail.com', 1),
(2, '222', '$2y$10$MlGAbUn0agV1Nev2Lhs2.uN212AASF.G7u2BastzwRClgSwx8pE.C', '1jahziel56@hotmail.com', 1),
(3, '111', '$2y$10$9LzSWanAJmDf8KkX/T9bw.HzYYc1sWE8Mlv67NlxEarLT/zIfaoYG', 'q1@gmail.com', 3),
(4, 'admin', '$2y$10$MlGAbUn0agV1Nev2Lhs2.uN212AASF.G7u2BastzwRClgSwx8pE.C', '4jahziel56@hotmail.com', 3),
(9, 'carlos', '$2y$10$p36w.cJOu18qoSz4bzuu8.BmtX3HhiTq2Of/qoMPDXQISeq5biHaW', 'ccarloshum@hotmail.com', 1),
(10, 'empleado', '$2y$10$MLJIEYXp5WGcwS7LZw.Ph.4METKYag4nRPTY6q8BE8UkDf1SFgeWC', 'empleado_institucional@gmail.com', 2),
(11, '696969', '$2y$10$8.7I.xpiPUb97lKpkEeBVuNxDdzi9EkKfG.FeA75vCJi1Q4SJ7eAm', '69Lord.@Hotmail.com', 2),
(12, 'pancho', '$2y$10$l3qeceIFJp6v3DFNKFzF3.B2bgZNwqdhXf8kdgQDnJgy.4jNiLXgi', 'pancho@gmail.com', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `domicilios`
--

CREATE TABLE `domicilios` (
  `DomicilioID` int(11) NOT NULL,
  `calle` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `numero` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `colonia` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `codigoPostal` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `localidad` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `municipio` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `FK_FormularioID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `domicilios`
--

INSERT INTO `domicilios` (`DomicilioID`, `calle`, `numero`, `colonia`, `codigoPostal`, `localidad`, `municipio`, `FK_FormularioID`) VALUES
(36, '1', '1', '123', '1', '1', '1', 47),
(37, '123', '123', '123', '123', '123', 'BacadÃ©huachi', 48);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `donatariaautorizada`
--

CREATE TABLE `donatariaautorizada` (
  `DonatariaID` int(11) NOT NULL,
  `fechaDiario` date NOT NULL,
  `numeroDiario` int(11) NOT NULL,
  `detenidoAutorizado` varchar(2) COLLATE utf8_spanish_ci NOT NULL,
  `razonDetenido` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `fechaAutorizada` date NOT NULL,
  `FK_FormularioID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `donatariaautorizada`
--

INSERT INTO `donatariaautorizada` (`DonatariaID`, `fechaDiario`, `numeroDiario`, `detenidoAutorizado`, `razonDetenido`, `fechaAutorizada`, `FK_FormularioID`) VALUES
(35, '0001-01-01', 1, 'Si', '1', '0001-01-01', 47),
(36, '2019-08-07', 123, 'No', '123', '2019-08-09', 48);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleados`
--

CREATE TABLE `empleados` (
  `EmpleadoID` int(11) NOT NULL,
  `nombreEmpleado` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `apellidoEmpleado` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `correoEmpleado` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `FK_Roles` int(11) NOT NULL,
  `FK_Cuenta` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `empleados`
--

INSERT INTO `empleados` (`EmpleadoID`, `nombreEmpleado`, `apellidoEmpleado`, `correoEmpleado`, `FK_Roles`, `FK_Cuenta`) VALUES
(1, 'Juan', 'Carlos', 'empleado_institucional@gmail.com', 1, 10),
(2, 'Lord', 'Draftk', '69Lord.@Hotmail.com', 1, 11),
(3, 'Pancho', 'Loco', 'pancho@gmail.com', 6, 12);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `formularioarchivos`
--

CREATE TABLE `formularioarchivos` (
  `FArchivosID` int(11) NOT NULL,
  `nombreSeccion` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `nombreArchivo` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `tipoArchivo` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `dataArchivo` mediumblob NOT NULL,
  `FK_FormularioID` int(11) NOT NULL,
  `Fecha` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `formularioprincipal`
--

CREATE TABLE `formularioprincipal` (
  `FormularioID` int(11) NOT NULL,
  `nombreOSC` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `objetoSocialOrganizacion` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `mision` varchar(300) COLLATE utf8_spanish_ci NOT NULL,
  `vision` varchar(300) COLLATE utf8_spanish_ci NOT NULL,
  `areasAtencion` varchar(300) COLLATE utf8_spanish_ci NOT NULL,
  `rfcHomoclave` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `CLUNI` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `telefonoOficina` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `telefonoCelular` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `paginaWeb` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `organizacionFB` varchar(35) COLLATE utf8_spanish_ci NOT NULL,
  `twitter` varchar(35) COLLATE utf8_spanish_ci NOT NULL,
  `instagram` varchar(35) COLLATE utf8_spanish_ci NOT NULL,
  `Id_Cuenta` int(11) NOT NULL,
  `Fecha_Creacion` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Estado` varchar(30) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `formularioprincipal`
--

INSERT INTO `formularioprincipal` (`FormularioID`, `nombreOSC`, `objetoSocialOrganizacion`, `mision`, `vision`, `areasAtencion`, `rfcHomoclave`, `CLUNI`, `telefonoOficina`, `telefonoCelular`, `email`, `paginaWeb`, `organizacionFB`, `twitter`, `instagram`, `Id_Cuenta`, `Fecha_Creacion`, `Estado`) VALUES
(47, '1', '1', '1', '1', '1', '1', '1', '1', '0162214778', '1@Hotmail.com', 'https://www.youtube.com/watch?v=XfHqKWk9laY', 'https://www.youtube.com/watch?v=XfH', 'https://www.youtube.com/watch?v=XfH', 'https://www.youtube.com/watch?v=XfH', 1, '2019-08-09 05:00:41', 'Enviado'),
(48, '123', '123', '123', '123', '123', '123123', 'asd', '123', '123', '123@Hotmail.com', 'http://tacosalpastor.cf/Formulario/', 'http://tacosalpastor.cf/Formulario/', 'http://tacosalpastor.cf/Formulario/', 'Sin Instagram', 2, '2019-08-09 05:18:59', 'Enviado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `historialorganizacion`
--

CREATE TABLE `historialorganizacion` (
  `HistorialID` int(11) NOT NULL,
  `fechaConstitucionOSC` date NOT NULL,
  `nombreNotario` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `numeroNotario` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `municipioNotaria` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `noEstrituraPublica` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `volumenEstrituraPublica` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `fechaEstritura` date NOT NULL,
  `municipioRegistroOSC` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `estaResideOSC` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `muniResideOSC` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `principalesLogros` varchar(300) COLLATE utf8_spanish_ci NOT NULL,
  `metasOrganizacion` varchar(300) COLLATE utf8_spanish_ci NOT NULL,
  `autorizadaDeducible` varchar(2) COLLATE utf8_spanish_ci NOT NULL,
  `dirigidaPor` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `nombreRepresentante` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `idRepresentante` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `nombrePresi` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `nombreCoordi` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `correoCoordinador` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `cargoCoordinador` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `numeroEmpleados` int(11) NOT NULL,
  `numeroVoluntarios` int(11) NOT NULL,
  `principalesAlianzas` varchar(300) COLLATE utf8_spanish_ci NOT NULL,
  `numeroBeneficiarios` int(11) NOT NULL,
  `observaciones32D` varchar(2) COLLATE utf8_spanish_ci NOT NULL,
  `tiempoYforma` varchar(2) COLLATE utf8_spanish_ci NOT NULL,
  `tieneAdeudos` varchar(2) COLLATE utf8_spanish_ci NOT NULL,
  `inscritaDNIAS` varchar(2) COLLATE utf8_spanish_ci NOT NULL,
  `FK_FormularioID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `metas`
--

CREATE TABLE `metas` (
  `MetasID` int(11) NOT NULL,
  `primerMeta` varchar(150) COLLATE utf8_spanish_ci NOT NULL,
  `tipoProductoUno` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `segundaMeta` varchar(150) COLLATE utf8_spanish_ci NOT NULL,
  `tipoProductoDos` varchar(150) COLLATE utf8_spanish_ci NOT NULL,
  `terceraMeta` varchar(150) COLLATE utf8_spanish_ci NOT NULL,
  `tipoProductoTres` varchar(150) COLLATE utf8_spanish_ci NOT NULL,
  `FK_FormularioID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_reset`
--

CREATE TABLE `password_reset` (
  `Password_Reset_Id` int(11) NOT NULL,
  `Password_Reset_Email` text COLLATE utf8_spanish_ci NOT NULL,
  `Password_Reset_Selector` text COLLATE utf8_spanish_ci NOT NULL,
  `Password_Reset_Token` longtext COLLATE utf8_spanish_ci NOT NULL,
  `Password_Reset_Expires` text COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proyecto`
--

CREATE TABLE `proyecto` (
  `ProyectoID` int(11) NOT NULL,
  `nombreProyecto` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `carenciaSocial` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `objetivoDesarrolloSus` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `temaConvocatoria` varchar(150) COLLATE utf8_spanish_ci NOT NULL,
  `temaDerechoSocial` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `problemaSocial` varchar(300) COLLATE utf8_spanish_ci NOT NULL,
  `objetivoGeneral` varchar(150) COLLATE utf8_spanish_ci NOT NULL,
  `descripcionProyecto` varchar(500) COLLATE utf8_spanish_ci NOT NULL,
  `criteriosIdentificar` varchar(300) COLLATE utf8_spanish_ci NOT NULL,
  `FK_FormularioID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `recursoscomplementarios`
--

CREATE TABLE `recursoscomplementarios` (
  `RecursosID` int(11) NOT NULL,
  `poblacion_0_4` int(11) NOT NULL,
  `poblacion_5_14` int(11) NOT NULL,
  `poblacion_15_29` int(11) NOT NULL,
  `poblacion_30_44` int(11) NOT NULL,
  `poblacion_45_64` int(11) NOT NULL,
  `poblacion_65_mas` int(11) NOT NULL,
  `esquemasRecursosComp` varchar(2) COLLATE utf8_spanish_ci NOT NULL,
  `organizacionManejoRecursos` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `FK_FormularioID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `recursoscomplementarios`
--

INSERT INTO `recursoscomplementarios` (`RecursosID`, `poblacion_0_4`, `poblacion_5_14`, `poblacion_15_29`, `poblacion_30_44`, `poblacion_45_64`, `poblacion_65_mas`, `esquemasRecursosComp`, `organizacionManejoRecursos`, `FK_FormularioID`) VALUES
(35, 1, 1, 1, 1, 1, 1, 'Si', '1', 47),
(36, 123, 123, 123, 123, 123, 123, 'No', '123', 48);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `registroactaconstitutiva`
--

CREATE TABLE `registroactaconstitutiva` (
  `ActaID` int(11) NOT NULL,
  `numeroLibro` int(11) NOT NULL,
  `numeroInscripcion` int(11) NOT NULL,
  `volumenICRESON` int(11) NOT NULL,
  `existenModis` varchar(2) COLLATE utf8_spanish_ci NOT NULL,
  `ultimaModi` date NOT NULL,
  `numeroActaConsti` int(11) NOT NULL,
  `volumenActaConsti` int(11) NOT NULL,
  `FK_FormularioID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `registroasignado`
--

CREATE TABLE `registroasignado` (
  `AsignacionID` int(11) NOT NULL,
  `FK_Registro` int(11) NOT NULL,
  `FK_Empleado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol`
--

CREATE TABLE `rol` (
  `Id_Rol` int(11) NOT NULL,
  `Nombre_Rol` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `Descripcion_Rol` varchar(50) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `rol`
--

INSERT INTO `rol` (`Id_Rol`, `Nombre_Rol`, `Descripcion_Rol`) VALUES
(1, 'DEFAULT', 'Rol por defecto, puede ver todos los campos'),
(6, 'ABOGADO', 'El rol de cualquier asunto legal');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol_detail`
--

CREATE TABLE `rol_detail` (
  `Id_Rol_Detail` int(11) NOT NULL,
  `Input` int(11) NOT NULL,
  `Id_Rol` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `rol_detail`
--

INSERT INTO `rol_detail` (`Id_Rol_Detail`, `Input`, `Id_Rol`) VALUES
(249, 1, 1),
(250, 2, 1),
(251, 3, 1),
(252, 4, 1),
(253, 5, 1),
(254, 6, 1),
(255, 7, 1),
(256, 8, 1),
(257, 9, 1),
(258, 10, 1),
(259, 11, 1),
(260, 12, 1),
(261, 13, 1),
(262, 14, 1),
(263, 15, 1),
(264, 16, 1),
(265, 17, 1),
(266, 18, 1),
(267, 19, 1),
(268, 20, 1),
(269, 21, 1),
(270, 22, 1),
(271, 23, 1),
(272, 24, 1),
(273, 25, 1),
(274, 26, 1),
(275, 27, 1),
(276, 28, 1),
(277, 29, 1),
(278, 30, 1),
(279, 31, 1),
(280, 32, 1),
(281, 33, 1),
(282, 34, 1),
(283, 35, 1),
(284, 36, 1),
(285, 37, 1),
(286, 38, 1),
(287, 39, 1),
(288, 40, 1),
(289, 41, 1),
(290, 42, 1),
(291, 43, 1),
(292, 44, 1),
(293, 45, 1),
(294, 46, 1),
(295, 47, 1),
(296, 48, 1),
(297, 49, 1),
(298, 50, 1),
(299, 51, 1),
(300, 52, 1),
(301, 53, 1),
(302, 54, 1),
(303, 55, 1),
(304, 56, 1),
(305, 57, 1),
(306, 58, 1),
(307, 59, 1),
(308, 60, 1),
(309, 61, 1),
(310, 62, 1),
(311, 63, 1),
(312, 64, 1),
(313, 65, 1),
(314, 66, 1),
(315, 67, 1),
(316, 68, 1),
(317, 69, 1),
(318, 70, 1),
(319, 71, 1),
(320, 72, 1),
(321, 73, 1),
(322, 74, 1),
(323, 75, 1),
(324, 76, 1),
(325, 77, 1),
(326, 78, 1),
(327, 79, 1),
(643, 1, 6),
(644, 2, 6),
(645, 3, 6),
(646, 4, 6),
(647, 5, 6),
(648, 6, 6),
(649, 7, 6),
(650, 8, 6),
(651, 9, 6),
(652, 10, 6),
(653, 11, 6),
(654, 12, 6),
(655, 13, 6),
(656, 14, 6),
(657, 15, 6),
(658, 16, 6),
(659, 17, 6),
(660, 18, 6),
(661, 19, 6),
(662, 20, 6),
(663, 21, 6),
(664, 22, 6),
(665, 23, 6),
(666, 24, 6),
(667, 25, 6),
(668, 26, 6),
(669, 27, 6),
(670, 28, 6),
(671, 29, 6),
(672, 30, 6),
(673, 31, 6),
(674, 32, 6),
(675, 33, 6),
(676, 34, 6),
(677, 35, 6),
(678, 36, 6),
(679, 37, 6),
(680, 38, 6),
(681, 39, 6),
(682, 40, 6),
(683, 41, 6),
(684, 42, 6),
(685, 43, 6),
(686, 44, 6),
(687, 45, 6),
(688, 46, 6),
(689, 47, 6),
(690, 48, 6),
(691, 49, 6),
(692, 50, 6),
(693, 51, 6),
(694, 52, 6),
(695, 53, 6),
(696, 54, 6),
(697, 55, 6),
(698, 56, 6),
(699, 57, 6),
(700, 58, 6),
(701, 59, 6),
(702, 60, 6),
(703, 61, 6),
(704, 62, 6),
(705, 63, 6),
(706, 64, 6),
(707, 65, 6),
(708, 66, 6),
(709, 67, 6),
(710, 68, 6),
(711, 69, 6),
(712, 70, 6),
(713, 71, 6),
(714, 72, 6),
(715, 73, 6),
(716, 74, 6),
(717, 75, 6),
(718, 76, 6),
(719, 77, 6),
(720, 78, 6),
(721, 79, 6),
(722, 1, 7),
(723, 1, 8),
(724, 1, 9);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_seguimiento`
--

CREATE TABLE `t_seguimiento` (
  `idSolicitud` int(11) NOT NULL,
  `etapaProceso` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `fechaActualizacion` datetime NOT NULL,
  `usuarioRegistro` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `estado` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `observaciones` text COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `confirmar_cuenta`
--
ALTER TABLE `confirmar_cuenta`
  ADD PRIMARY KEY (`confirmar_cuenta_Id`),
  ADD KEY `confirmar_cuenta_ibfk_1` (`cuenta_Id`);

--
-- Indices de la tabla `cuenta`
--
ALTER TABLE `cuenta`
  ADD PRIMARY KEY (`Id_Cuenta`);

--
-- Indices de la tabla `domicilios`
--
ALTER TABLE `domicilios`
  ADD PRIMARY KEY (`DomicilioID`),
  ADD KEY `FK_FormularioID` (`FK_FormularioID`);

--
-- Indices de la tabla `donatariaautorizada`
--
ALTER TABLE `donatariaautorizada`
  ADD PRIMARY KEY (`DonatariaID`),
  ADD KEY `FK_FormularioID` (`FK_FormularioID`);

--
-- Indices de la tabla `empleados`
--
ALTER TABLE `empleados`
  ADD PRIMARY KEY (`EmpleadoID`),
  ADD KEY `empleados_ibfk_1` (`FK_Roles`),
  ADD KEY `empleados_ibfk_2` (`FK_Cuenta`);

--
-- Indices de la tabla `formularioarchivos`
--
ALTER TABLE `formularioarchivos`
  ADD PRIMARY KEY (`FArchivosID`),
  ADD KEY `FK_FormularioID` (`FK_FormularioID`);

--
-- Indices de la tabla `formularioprincipal`
--
ALTER TABLE `formularioprincipal`
  ADD PRIMARY KEY (`FormularioID`),
  ADD KEY `Id_Cuenta` (`Id_Cuenta`);

--
-- Indices de la tabla `historialorganizacion`
--
ALTER TABLE `historialorganizacion`
  ADD PRIMARY KEY (`HistorialID`),
  ADD KEY `FK_FormularioID` (`FK_FormularioID`);

--
-- Indices de la tabla `metas`
--
ALTER TABLE `metas`
  ADD PRIMARY KEY (`MetasID`),
  ADD KEY `FK_FormularioID` (`FK_FormularioID`);

--
-- Indices de la tabla `password_reset`
--
ALTER TABLE `password_reset`
  ADD PRIMARY KEY (`Password_Reset_Id`);

--
-- Indices de la tabla `proyecto`
--
ALTER TABLE `proyecto`
  ADD PRIMARY KEY (`ProyectoID`),
  ADD KEY `FK_FormularioID` (`FK_FormularioID`);

--
-- Indices de la tabla `recursoscomplementarios`
--
ALTER TABLE `recursoscomplementarios`
  ADD PRIMARY KEY (`RecursosID`),
  ADD KEY `FK_FormularioID` (`FK_FormularioID`);

--
-- Indices de la tabla `registroactaconstitutiva`
--
ALTER TABLE `registroactaconstitutiva`
  ADD PRIMARY KEY (`ActaID`),
  ADD KEY `FK_FormularioID` (`FK_FormularioID`);

--
-- Indices de la tabla `registroasignado`
--
ALTER TABLE `registroasignado`
  ADD PRIMARY KEY (`AsignacionID`),
  ADD KEY `registroasignado_ibfk_1` (`FK_Empleado`),
  ADD KEY `registroasignado_ibfk_2` (`FK_Registro`);

--
-- Indices de la tabla `rol`
--
ALTER TABLE `rol`
  ADD PRIMARY KEY (`Id_Rol`);

--
-- Indices de la tabla `rol_detail`
--
ALTER TABLE `rol_detail`
  ADD PRIMARY KEY (`Id_Rol_Detail`),
  ADD KEY `rol_detail_ibfk_1` (`Id_Rol`);

--
-- Indices de la tabla `t_seguimiento`
--
ALTER TABLE `t_seguimiento`
  ADD PRIMARY KEY (`idSolicitud`,`etapaProceso`,`fechaActualizacion`,`usuarioRegistro`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `confirmar_cuenta`
--
ALTER TABLE `confirmar_cuenta`
  MODIFY `confirmar_cuenta_Id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `cuenta`
--
ALTER TABLE `cuenta`
  MODIFY `Id_Cuenta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `domicilios`
--
ALTER TABLE `domicilios`
  MODIFY `DomicilioID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT de la tabla `donatariaautorizada`
--
ALTER TABLE `donatariaautorizada`
  MODIFY `DonatariaID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT de la tabla `empleados`
--
ALTER TABLE `empleados`
  MODIFY `EmpleadoID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `formularioarchivos`
--
ALTER TABLE `formularioarchivos`
  MODIFY `FArchivosID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `formularioprincipal`
--
ALTER TABLE `formularioprincipal`
  MODIFY `FormularioID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT de la tabla `historialorganizacion`
--
ALTER TABLE `historialorganizacion`
  MODIFY `HistorialID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `metas`
--
ALTER TABLE `metas`
  MODIFY `MetasID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `password_reset`
--
ALTER TABLE `password_reset`
  MODIFY `Password_Reset_Id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `proyecto`
--
ALTER TABLE `proyecto`
  MODIFY `ProyectoID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `recursoscomplementarios`
--
ALTER TABLE `recursoscomplementarios`
  MODIFY `RecursosID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT de la tabla `registroactaconstitutiva`
--
ALTER TABLE `registroactaconstitutiva`
  MODIFY `ActaID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `registroasignado`
--
ALTER TABLE `registroasignado`
  MODIFY `AsignacionID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `rol`
--
ALTER TABLE `rol`
  MODIFY `Id_Rol` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `rol_detail`
--
ALTER TABLE `rol_detail`
  MODIFY `Id_Rol_Detail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=725;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `confirmar_cuenta`
--
ALTER TABLE `confirmar_cuenta`
  ADD CONSTRAINT `confirmar_cuenta_ibfk_1` FOREIGN KEY (`cuenta_Id`) REFERENCES `cuenta` (`Id_Cuenta`);

--
-- Filtros para la tabla `domicilios`
--
ALTER TABLE `domicilios`
  ADD CONSTRAINT `domicilios_ibfk_1` FOREIGN KEY (`FK_FormularioID`) REFERENCES `formularioprincipal` (`FormularioID`);

--
-- Filtros para la tabla `donatariaautorizada`
--
ALTER TABLE `donatariaautorizada`
  ADD CONSTRAINT `donatariaautorizada_ibfk_1` FOREIGN KEY (`FK_FormularioID`) REFERENCES `formularioprincipal` (`FormularioID`);

--
-- Filtros para la tabla `empleados`
--
ALTER TABLE `empleados`
  ADD CONSTRAINT `empleados_ibfk_1` FOREIGN KEY (`FK_Roles`) REFERENCES `rol` (`Id_Rol`),
  ADD CONSTRAINT `empleados_ibfk_2` FOREIGN KEY (`FK_Cuenta`) REFERENCES `cuenta` (`Id_Cuenta`);

--
-- Filtros para la tabla `formularioarchivos`
--
ALTER TABLE `formularioarchivos`
  ADD CONSTRAINT `formularioarchivos_ibfk_1` FOREIGN KEY (`FK_FormularioID`) REFERENCES `formularioprincipal` (`FormularioID`);

--
-- Filtros para la tabla `formularioprincipal`
--
ALTER TABLE `formularioprincipal`
  ADD CONSTRAINT `formularioprincipal_ibfk_1` FOREIGN KEY (`Id_Cuenta`) REFERENCES `cuenta` (`Id_Cuenta`);

--
-- Filtros para la tabla `historialorganizacion`
--
ALTER TABLE `historialorganizacion`
  ADD CONSTRAINT `historialorganizacion_ibfk_1` FOREIGN KEY (`FK_FormularioID`) REFERENCES `formularioprincipal` (`FormularioID`);

--
-- Filtros para la tabla `metas`
--
ALTER TABLE `metas`
  ADD CONSTRAINT `metas_ibfk_1` FOREIGN KEY (`FK_FormularioID`) REFERENCES `formularioprincipal` (`FormularioID`);

--
-- Filtros para la tabla `proyecto`
--
ALTER TABLE `proyecto`
  ADD CONSTRAINT `proyecto_ibfk_1` FOREIGN KEY (`FK_FormularioID`) REFERENCES `formularioprincipal` (`FormularioID`);

--
-- Filtros para la tabla `recursoscomplementarios`
--
ALTER TABLE `recursoscomplementarios`
  ADD CONSTRAINT `recursoscomplementarios_ibfk_1` FOREIGN KEY (`FK_FormularioID`) REFERENCES `formularioprincipal` (`FormularioID`);

--
-- Filtros para la tabla `registroactaconstitutiva`
--
ALTER TABLE `registroactaconstitutiva`
  ADD CONSTRAINT `registroactaconstitutiva_ibfk_1` FOREIGN KEY (`FK_FormularioID`) REFERENCES `formularioprincipal` (`FormularioID`);

--
-- Filtros para la tabla `registroasignado`
--
ALTER TABLE `registroasignado`
  ADD CONSTRAINT `registroasignado_ibfk_1` FOREIGN KEY (`FK_Empleado`) REFERENCES `empleados` (`EmpleadoID`),
  ADD CONSTRAINT `registroasignado_ibfk_2` FOREIGN KEY (`FK_Registro`) REFERENCES `formularioprincipal` (`FormularioID`);

--
-- Filtros para la tabla `rol_detail`
--
ALTER TABLE `rol_detail`
  ADD CONSTRAINT `rol_detail_ibfk_1` FOREIGN KEY (`Id_Rol`) REFERENCES `rol` (`Id_Rol`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
