-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 13-11-2019 a las 02:57:56
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
-- Estructura de tabla para la tabla `acta_constitutiva`
--

CREATE TABLE `acta_constitutiva` (
  `ID_acta_constitutiva` int(11) NOT NULL,
  `FK_Registro` int(11) NOT NULL,
  `numeroLibro` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `numeroInscripcion` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `volumenICRESON` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `existenModis` varchar(4) COLLATE utf8_spanish_ci NOT NULL,
  `autorizadaDeducible` varchar(4) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `acta_constitutiva`
--

INSERT INTO `acta_constitutiva` (`ID_acta_constitutiva`, `FK_Registro`, `numeroLibro`, `numeroInscripcion`, `volumenICRESON`, `existenModis`, `autorizadaDeducible`) VALUES
(1, 1, '52351', '5151235', '5123515', 'No', 'No'),
(2, 2, '2346', '2345', '123', 'Si', 'Si');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `autorizadadeducible`
--

CREATE TABLE `autorizadadeducible` (
  `ID_autorizadaDeducible` int(11) NOT NULL,
  `FK_acta_constitutiva` int(11) NOT NULL,
  `numeroDiario` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `fechaDiario` date NOT NULL,
  `detenidoAutorizado` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `fechaAutorizada` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `autorizadadeducible`
--

INSERT INTO `autorizadadeducible` (`ID_autorizadaDeducible`, `FK_acta_constitutiva`, `numeroDiario`, `fechaDiario`, `detenidoAutorizado`, `fechaAutorizada`) VALUES
(1, 2, '123', '2019-10-15', 'Si', '2019-10-09');

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
-- Estructura de tabla para la tabla `contacto`
--

CREATE TABLE `contacto` (
  `ID_contacto` int(11) NOT NULL,
  `FK_Registro` int(11) NOT NULL,
  `phoneOficina` int(20) NOT NULL,
  `phoneCelular` int(20) NOT NULL,
  `emailContacto` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `paginaWeb` varchar(80) COLLATE utf8_spanish_ci NOT NULL,
  `organizacionFB` varchar(80) COLLATE utf8_spanish_ci NOT NULL,
  `organizacionTW` varchar(80) COLLATE utf8_spanish_ci NOT NULL,
  `organizacionInsta` varchar(80) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `contacto`
--

INSERT INTO `contacto` (`ID_contacto`, `FK_Registro`, `phoneOficina`, `phoneCelular`, `emailContacto`, `paginaWeb`, `organizacionFB`, `organizacionTW`, `organizacionInsta`) VALUES
(1, 1, 2147483647, 2147483647, 'jahziel56@hotmail.com', 'Sin pagina Web', 'https://www.facebook.com/?ref=tn_tnmn', 'Sin Twitter', 'Sin Instagram'),
(2, 2, 2147483647, 2147483647, 'jahziel56@hotmail.com', 'https://www.youtube.com/index?feature=signin', 'https://www.facebook.com/?ref=tn_tnmn', 'Sin Twitter', 'https://www.facebook.com/?ref=tn_tnmn');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `correcciones_registro`
--

CREATE TABLE `correcciones_registro` (
  `ID_Correcion_R` int(11) NOT NULL,
  `FK_Registro` int(11) NOT NULL,
  `Fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Revisor` varchar(35) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `correcciones_registro`
--

INSERT INTO `correcciones_registro` (`ID_Correcion_R`, `FK_Registro`, `Fecha`, `Revisor`) VALUES
(18, 2, '2019-10-28 04:54:44', 'temporal'),
(19, 2, '2019-10-28 04:55:02', 'temporal'),
(20, 1, '2019-11-03 23:36:05', 'temporal'),
(21, 1, '2019-11-04 04:33:32', 'temporal'),
(22, 1, '2019-11-04 04:47:14', 'temporal');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cuenta`
--

CREATE TABLE `cuenta` (
  `Id_Cuenta` int(11) NOT NULL,
  `Username` varchar(30) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `Password` varchar(30) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `Email` varchar(30) CHARACTER SET utf8 COLLATE utf8_swedish_ci NOT NULL,
  `Type` smallint(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `cuenta`
--

INSERT INTO `cuenta` (`Id_Cuenta`, `Username`, `Password`, `Email`, `Type`) VALUES
(1, '123', '$2y$10$MlGAbUn0agV1Nev2Lhs2.uN', '1jahziel56@hotmail.com', 1),
(2, '222', '$2y$10$MlGAbUn0agV1Nev2Lhs2.uN', '1jahziel56@hotmail.com', 2),
(3, '111', '$2y$10$9LzSWanAJmDf8KkX/T9bw.H', 'q1@gmail.com', 3),
(4, 'admin', '$2y$10$MlGAbUn0agV1Nev2Lhs2.uN', '4jahziel56@hotmail.com', 3),
(9, 'carlos', '$2y$10$p36w.cJOu18qoSz4bzuu8.B', 'ccarloshum@hotmail.com', 1),
(10, 'empleado', '$2y$10$MLJIEYXp5WGcwS7LZw.Ph.4', 'empleado_institucional@gmail.c', 2),
(11, '696969', '$2y$10$8.7I.xpiPUb97lKpkEeBVuN', '69Lord.@Hotmail.com', 2),
(12, 'pancho', '$2y$10$l3qeceIFJp6v3DFNKFzF3.B', 'pancho@gmail.com', 2),
(14, 'jahziel', '$2y$10$plWy1a6SitooxiWoTZmIY.d', 'jahziel56@hotmail.com', 1),
(15, '123', '$2y$10$P3e2GOXDAt8pjWilsiStA.k', 'jahziel56@hotmail.com', 2),
(16, '123', '$2y$10$qxaPilVO7QoDag1p22Hi9.g', '111@yahoo.com', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `datos_generales`
--

CREATE TABLE `datos_generales` (
  `Id_Datos_G` int(11) NOT NULL,
  `FK_Registro` int(11) NOT NULL,
  `Correo_Organizacion` varchar(40) COLLATE utf8_spanish_ci NOT NULL,
  `rfcHomoclave` varchar(40) COLLATE utf8_spanish_ci NOT NULL,
  `CLUNI` varchar(40) COLLATE utf8_spanish_ci NOT NULL,
  `nombreOSC` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `objetoSocialOrganizacion` varchar(60) COLLATE utf8_spanish_ci NOT NULL,
  `mision` varchar(60) COLLATE utf8_spanish_ci NOT NULL,
  `vision` varchar(60) COLLATE utf8_spanish_ci NOT NULL,
  `areasAtencion` varchar(60) COLLATE utf8_spanish_ci NOT NULL,
  `tema_de_Derecho_Social` varchar(120) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `datos_generales`
--

INSERT INTO `datos_generales` (`Id_Datos_G`, `FK_Registro`, `Correo_Organizacion`, `rfcHomoclave`, `CLUNI`, `nombreOSC`, `objetoSocialOrganizacion`, `mision`, `vision`, `areasAtencion`, `tema_de_Derecho_Social`) VALUES
(1, 1, 'jahziel56@hotmail.com', 'RFCINSTITUCIONAL52', 'Inucl', 'Sociedad Organizada', 'Objetivizar Social mente la or asdas', 'Misionar', 'Visionar', 'atendidas', 'Adultos mayores (servicios o proyectos distintos a lo asistencial, es Adultos mayores (servicios o proyectos distintos a'),
(2, 2, 'correo@hotmail.com', 'rfce', 'pepe el toro', 'maria zuares', 'fernando salazar', 'msiionar ', 'visionar', 'Viejitos y viejitas', 'Desarrollo regional sustentable');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_correcciones_registro`
--

CREATE TABLE `detalle_correcciones_registro` (
  `ID_Detalle` int(11) NOT NULL,
  `FK_Correcion_R` int(11) NOT NULL,
  `Detalle` varchar(120) COLLATE utf8_spanish_ci NOT NULL,
  `Pregunta` varchar(10) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `detalle_correcciones_registro`
--

INSERT INTO `detalle_correcciones_registro` (`ID_Detalle`, `FK_Correcion_R`, `Detalle`, `Pregunta`) VALUES
(10, 18, '123', '64a'),
(11, 19, '76574mgh', '64a'),
(12, 20, '3423', '64'),
(13, 21, '123', '63'),
(14, 22, '123', '64');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detenidoautorizado`
--

CREATE TABLE `detenidoautorizado` (
  `ID_detenidoAutorizado` int(11) NOT NULL,
  `FK_autorizadaDeducible` int(11) NOT NULL,
  `razonDetenido` varchar(40) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `detenidoautorizado`
--

INSERT INTO `detenidoautorizado` (`ID_detenidoAutorizado`, `FK_autorizadaDeducible`, `razonDetenido`) VALUES
(1, 1, '456456dfgdfg345');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `domicilio`
--

CREATE TABLE `domicilio` (
  `ID_Domicilio` int(11) NOT NULL,
  `FK_Registro` int(11) NOT NULL,
  `calle` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `domicilio` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `colonia` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `codigoPostal` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `localidad` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `municipioRegistroOSC` varchar(40) COLLATE utf8_spanish_ci NOT NULL,
  `Latitud` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `Longitud` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `domicilio_social_legal` varchar(8) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `domicilio`
--

INSERT INTO `domicilio` (`ID_Domicilio`, `FK_Registro`, `calle`, `domicilio`, `colonia`, `codigoPostal`, `localidad`, `municipioRegistroOSC`, `Latitud`, `Longitud`, `domicilio_social_legal`) VALUES
(1, 1, 'calle numero 18', 'calle numero 18, Gil samaniego', 'Gil samaniego', '85476', 'Guaymas', 'Guaymas', '123123', '123123', 'Si'),
(2, 2, 'calle 12', 'Domiciliar', 'GIL samaniego', '68293', 'localidad', 'BaviÃ¡cora', '123123', '123123', 'No');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `domicilio_social_legal`
--

CREATE TABLE `domicilio_social_legal` (
  `ID_D_S_L` int(11) NOT NULL,
  `FK_Domicilio` int(11) NOT NULL,
  `municipio_Dom` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `domicilio_Dom` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `localidad_Dom` varchar(30) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `domicilio_social_legal`
--

INSERT INTO `domicilio_social_legal` (`ID_D_S_L`, `FK_Domicilio`, `municipio_Dom`, `domicilio_Dom`, `localidad_Dom`) VALUES
(1, 2, 'Bavispe', 'Guaymas', 'GUAYMAS');

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
(1, 'Carlos alberto', 'Empleado Dominguez', 'empleado523@gmail.com', 2, 10),
(2, 'sdfsdfsd', 'sdfsdf', 'sdfsdf', 123, 12);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `esquemasrecursoscomp`
--

CREATE TABLE `esquemasrecursoscomp` (
  `ID_esquemasRecursosComp` int(11) NOT NULL,
  `FK_Historial_3` int(11) NOT NULL,
  `organizacionManejoRecursos` varchar(40) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `esquemasrecursoscomp`
--

INSERT INTO `esquemasrecursoscomp` (`ID_esquemasRecursosComp`, `FK_Historial_3`, `organizacionManejoRecursos`) VALUES
(1, 2, 'dasd2q34ji2j3c');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `existenmodis`
--

CREATE TABLE `existenmodis` (
  `ID_existenModis` int(11) NOT NULL,
  `FK_acta_constitutiva` int(11) NOT NULL,
  `ultimaModi` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `numeroActaConsti` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `volumenActaConsti` varchar(20) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `existenmodis`
--

INSERT INTO `existenmodis` (`ID_existenModis`, `FK_acta_constitutiva`, `ultimaModi`, `numeroActaConsti`, `volumenActaConsti`) VALUES
(1, 2, '2019-10-16', '5235', '123');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `historial_de_la_organizacion`
--

CREATE TABLE `historial_de_la_organizacion` (
  `ID_Historial` int(11) NOT NULL,
  `FK_Registro` int(11) NOT NULL,
  `nombreRepresentante` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `idRepresentante` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `fechaConstitucionOSC` date NOT NULL,
  `nombreNotario` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `numeroNotario` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `municipioNotaria` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `noEstrituraPublica` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `volumenEstrituraPublica` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `fechaEstritura` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `historial_de_la_organizacion`
--

INSERT INTO `historial_de_la_organizacion` (`ID_Historial`, `FK_Registro`, `nombreRepresentante`, `idRepresentante`, `fechaConstitucionOSC`, `nombreNotario`, `numeroNotario`, `municipioNotaria`, `noEstrituraPublica`, `volumenEstrituraPublica`, `fechaEstritura`) VALUES
(1, 1, 'jose jahziel', '1126623', '2019-10-16', 'notario osc', '772', 'Soyopa', '232362', '15125125', '2019-10-24'),
(2, 2, 'Jahziel lopez', '6692234', '2019-10-09', 'nombrado', '3523', 'BÃ¡cum', 'escriturar', 'Volumetrar', '2019-10-17');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `historial_de_la_organizacion_2`
--

CREATE TABLE `historial_de_la_organizacion_2` (
  `ID_Historial_2` int(11) NOT NULL,
  `FK_Registro` int(11) NOT NULL,
  `digiridaPor` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `nombrePresi` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `numeroEmpleados` varchar(8) COLLATE utf8_spanish_ci NOT NULL,
  `numeroVoluntarios` varchar(8) COLLATE utf8_spanish_ci NOT NULL,
  `principalesLogros` varchar(40) COLLATE utf8_spanish_ci NOT NULL,
  `metasOrganizacion` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `principalesAlianzas` varchar(40) COLLATE utf8_spanish_ci NOT NULL,
  `numeroBeneficiados` varchar(8) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `historial_de_la_organizacion_2`
--

INSERT INTO `historial_de_la_organizacion_2` (`ID_Historial_2`, `FK_Registro`, `digiridaPor`, `nombrePresi`, `numeroEmpleados`, `numeroVoluntarios`, `principalesLogros`, `metasOrganizacion`, `principalesAlianzas`, `numeroBeneficiados`) VALUES
(1, 1, 'Consejo Directivo', 'Jahziel', '16', '2', 'Logros logrados', 'Metasdelaorganizacionorganizac', 'con diosito y jesusito', '1124'),
(2, 2, 'Consejo Directivo', 'nombrqado', '66234', '66', 'lograr cosas', 'Metar organizacion', 'alidado', '6290239');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `historial_de_la_organizacion_3`
--

CREATE TABLE `historial_de_la_organizacion_3` (
  `ID_Historial_3` int(11) NOT NULL,
  `FK_Registro` int(11) NOT NULL,
  `observaciones32D` varchar(4) COLLATE utf8_spanish_ci NOT NULL,
  `tiempoYforma` varchar(4) COLLATE utf8_spanish_ci NOT NULL,
  `tieneAdeudos` varchar(4) COLLATE utf8_spanish_ci NOT NULL,
  `inscritaDNIAS` varchar(4) COLLATE utf8_spanish_ci NOT NULL,
  `esquemasRecursosComp` varchar(4) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `historial_de_la_organizacion_3`
--

INSERT INTO `historial_de_la_organizacion_3` (`ID_Historial_3`, `FK_Registro`, `observaciones32D`, `tiempoYforma`, `tieneAdeudos`, `inscritaDNIAS`, `esquemasRecursosComp`) VALUES
(1, 1, 'No', 'No', 'Si', 'No', 'No'),
(2, 2, 'No', 'No', 'Si', 'Si', 'Si');

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
-- Estructura de tabla para la tabla `poblacion_beneficiada`
--

CREATE TABLE `poblacion_beneficiada` (
  `ID_Poblacion` int(11) NOT NULL,
  `FK_Registro` int(11) NOT NULL,
  `poblacion_0_4` int(11) NOT NULL,
  `poblacion_5_14` int(11) NOT NULL,
  `poblacion_15_29` int(11) NOT NULL,
  `poblacion_30_44` int(11) NOT NULL,
  `poblacion_45_64` int(11) NOT NULL,
  `poblacion_65_mas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `poblacion_beneficiada`
--

INSERT INTO `poblacion_beneficiada` (`ID_Poblacion`, `FK_Registro`, `poblacion_0_4`, `poblacion_5_14`, `poblacion_15_29`, `poblacion_30_44`, `poblacion_45_64`, `poblacion_65_mas`) VALUES
(1, 1, 22, 33, 123, 6, 55, 66),
(2, 2, 123, 29352, 23402, 2342, 123, 52);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `registro`
--

CREATE TABLE `registro` (
  `ID_Registro` int(11) NOT NULL,
  `Fecha_Registro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `RFC_Organizacional` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `Clave` varchar(14) COLLATE utf8_spanish_ci NOT NULL,
  `Estado` varchar(22) COLLATE utf8_spanish_ci NOT NULL DEFAULT 'Enviado'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `registro`
--

INSERT INTO `registro` (`ID_Registro`, `Fecha_Registro`, `RFC_Organizacional`, `Clave`, `Estado`) VALUES
(1, '2019-10-12 21:11:58', '123', '123', 'Enviado'),
(2, '2019-10-22 04:23:03', 'rfce', '4d0e147a', 'Enviado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `registro_archivos`
--

CREATE TABLE `registro_archivos` (
  `Archivos_ID` int(11) NOT NULL,
  `nombreSeccion` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `nombreArchivo` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `tipoArchivo` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `dataArchivo` mediumblob NOT NULL,
  `FK_Registro` int(11) NOT NULL,
  `Fecha` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Estructura de tabla para la tabla `revisando`
--

CREATE TABLE `revisando` (
  `ID_Revisando` int(11) NOT NULL,
  `FK_Registro` int(11) NOT NULL,
  `FK_Empleado` int(11) NOT NULL,
  `Fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `revisando`
--

INSERT INTO `revisando` (`ID_Revisando`, `FK_Registro`, `FK_Empleado`, `Fecha`) VALUES
(1, 1, 1, '2019-11-05 03:14:56');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `acta_constitutiva`
--
ALTER TABLE `acta_constitutiva`
  ADD PRIMARY KEY (`ID_acta_constitutiva`),
  ADD KEY `acta_constitutiva_ibfk_1` (`FK_Registro`);

--
-- Indices de la tabla `autorizadadeducible`
--
ALTER TABLE `autorizadadeducible`
  ADD PRIMARY KEY (`ID_autorizadaDeducible`),
  ADD KEY `autorizadadeducible_ibfk_1` (`FK_acta_constitutiva`);

--
-- Indices de la tabla `confirmar_cuenta`
--
ALTER TABLE `confirmar_cuenta`
  ADD PRIMARY KEY (`confirmar_cuenta_Id`),
  ADD KEY `confirmar_cuenta_ibfk_1` (`cuenta_Id`);

--
-- Indices de la tabla `contacto`
--
ALTER TABLE `contacto`
  ADD PRIMARY KEY (`ID_contacto`),
  ADD KEY `contacto_ibfk_1` (`FK_Registro`);

--
-- Indices de la tabla `correcciones_registro`
--
ALTER TABLE `correcciones_registro`
  ADD PRIMARY KEY (`ID_Correcion_R`),
  ADD KEY `correcciones_registro_ibfk_1` (`FK_Registro`);

--
-- Indices de la tabla `cuenta`
--
ALTER TABLE `cuenta`
  ADD PRIMARY KEY (`Id_Cuenta`);

--
-- Indices de la tabla `datos_generales`
--
ALTER TABLE `datos_generales`
  ADD PRIMARY KEY (`Id_Datos_G`),
  ADD KEY `datos_generales_ibfk_1` (`FK_Registro`);

--
-- Indices de la tabla `detalle_correcciones_registro`
--
ALTER TABLE `detalle_correcciones_registro`
  ADD PRIMARY KEY (`ID_Detalle`),
  ADD KEY `detalle_correcciones_registro_ibfk_1` (`FK_Correcion_R`);

--
-- Indices de la tabla `detenidoautorizado`
--
ALTER TABLE `detenidoautorizado`
  ADD PRIMARY KEY (`ID_detenidoAutorizado`),
  ADD KEY `detenidoautorizado_ibfk_1` (`FK_autorizadaDeducible`);

--
-- Indices de la tabla `domicilio`
--
ALTER TABLE `domicilio`
  ADD PRIMARY KEY (`ID_Domicilio`),
  ADD KEY `domicilio_ibfk_1` (`FK_Registro`);

--
-- Indices de la tabla `domicilio_social_legal`
--
ALTER TABLE `domicilio_social_legal`
  ADD PRIMARY KEY (`ID_D_S_L`),
  ADD KEY `domicilio_social_legal_ibfk_1` (`FK_Domicilio`);

--
-- Indices de la tabla `empleados`
--
ALTER TABLE `empleados`
  ADD PRIMARY KEY (`EmpleadoID`),
  ADD KEY `empleados_ibfk_1` (`FK_Roles`),
  ADD KEY `empleados_ibfk_2` (`FK_Cuenta`);

--
-- Indices de la tabla `esquemasrecursoscomp`
--
ALTER TABLE `esquemasrecursoscomp`
  ADD PRIMARY KEY (`ID_esquemasRecursosComp`),
  ADD KEY `esquemasrecursoscomp_ibfk_1` (`FK_Historial_3`);

--
-- Indices de la tabla `existenmodis`
--
ALTER TABLE `existenmodis`
  ADD PRIMARY KEY (`ID_existenModis`),
  ADD KEY `existenmodis_ibfk_1` (`FK_acta_constitutiva`);

--
-- Indices de la tabla `historial_de_la_organizacion`
--
ALTER TABLE `historial_de_la_organizacion`
  ADD PRIMARY KEY (`ID_Historial`),
  ADD KEY `historial_de_la_organización_ibfk_1` (`FK_Registro`);

--
-- Indices de la tabla `historial_de_la_organizacion_2`
--
ALTER TABLE `historial_de_la_organizacion_2`
  ADD PRIMARY KEY (`ID_Historial_2`),
  ADD KEY `historial_de_la_organización_2_ibfk_1` (`FK_Registro`);

--
-- Indices de la tabla `historial_de_la_organizacion_3`
--
ALTER TABLE `historial_de_la_organizacion_3`
  ADD PRIMARY KEY (`ID_Historial_3`),
  ADD KEY `historial_de_la_organización_3_ibfk_1` (`FK_Registro`);

--
-- Indices de la tabla `password_reset`
--
ALTER TABLE `password_reset`
  ADD PRIMARY KEY (`Password_Reset_Id`);

--
-- Indices de la tabla `poblacion_beneficiada`
--
ALTER TABLE `poblacion_beneficiada`
  ADD PRIMARY KEY (`ID_Poblacion`),
  ADD KEY `poblacion_beneficiada_ibfk_1` (`FK_Registro`);

--
-- Indices de la tabla `registro`
--
ALTER TABLE `registro`
  ADD PRIMARY KEY (`ID_Registro`),
  ADD UNIQUE KEY `RFC_Organizacional` (`RFC_Organizacional`);

--
-- Indices de la tabla `registro_archivos`
--
ALTER TABLE `registro_archivos`
  ADD PRIMARY KEY (`Archivos_ID`),
  ADD KEY `FK_Registro` (`FK_Registro`);

--
-- Indices de la tabla `revisando`
--
ALTER TABLE `revisando`
  ADD PRIMARY KEY (`ID_Revisando`),
  ADD KEY `revisando_ibfk_1` (`FK_Registro`),
  ADD KEY `revisando_ibfk_2` (`FK_Empleado`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `acta_constitutiva`
--
ALTER TABLE `acta_constitutiva`
  MODIFY `ID_acta_constitutiva` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `autorizadadeducible`
--
ALTER TABLE `autorizadadeducible`
  MODIFY `ID_autorizadaDeducible` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `confirmar_cuenta`
--
ALTER TABLE `confirmar_cuenta`
  MODIFY `confirmar_cuenta_Id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `contacto`
--
ALTER TABLE `contacto`
  MODIFY `ID_contacto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `correcciones_registro`
--
ALTER TABLE `correcciones_registro`
  MODIFY `ID_Correcion_R` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT de la tabla `cuenta`
--
ALTER TABLE `cuenta`
  MODIFY `Id_Cuenta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `datos_generales`
--
ALTER TABLE `datos_generales`
  MODIFY `Id_Datos_G` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `detalle_correcciones_registro`
--
ALTER TABLE `detalle_correcciones_registro`
  MODIFY `ID_Detalle` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `detenidoautorizado`
--
ALTER TABLE `detenidoautorizado`
  MODIFY `ID_detenidoAutorizado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `domicilio`
--
ALTER TABLE `domicilio`
  MODIFY `ID_Domicilio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `domicilio_social_legal`
--
ALTER TABLE `domicilio_social_legal`
  MODIFY `ID_D_S_L` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `empleados`
--
ALTER TABLE `empleados`
  MODIFY `EmpleadoID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `esquemasrecursoscomp`
--
ALTER TABLE `esquemasrecursoscomp`
  MODIFY `ID_esquemasRecursosComp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `existenmodis`
--
ALTER TABLE `existenmodis`
  MODIFY `ID_existenModis` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `historial_de_la_organizacion`
--
ALTER TABLE `historial_de_la_organizacion`
  MODIFY `ID_Historial` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `historial_de_la_organizacion_2`
--
ALTER TABLE `historial_de_la_organizacion_2`
  MODIFY `ID_Historial_2` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `historial_de_la_organizacion_3`
--
ALTER TABLE `historial_de_la_organizacion_3`
  MODIFY `ID_Historial_3` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `password_reset`
--
ALTER TABLE `password_reset`
  MODIFY `Password_Reset_Id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `poblacion_beneficiada`
--
ALTER TABLE `poblacion_beneficiada`
  MODIFY `ID_Poblacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `registro`
--
ALTER TABLE `registro`
  MODIFY `ID_Registro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `registro_archivos`
--
ALTER TABLE `registro_archivos`
  MODIFY `Archivos_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT de la tabla `revisando`
--
ALTER TABLE `revisando`
  MODIFY `ID_Revisando` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `acta_constitutiva`
--
ALTER TABLE `acta_constitutiva`
  ADD CONSTRAINT `acta_constitutiva_ibfk_1` FOREIGN KEY (`FK_Registro`) REFERENCES `registro` (`ID_Registro`);

--
-- Filtros para la tabla `autorizadadeducible`
--
ALTER TABLE `autorizadadeducible`
  ADD CONSTRAINT `autorizadadeducible_ibfk_1` FOREIGN KEY (`FK_acta_constitutiva`) REFERENCES `acta_constitutiva` (`ID_acta_constitutiva`);

--
-- Filtros para la tabla `confirmar_cuenta`
--
ALTER TABLE `confirmar_cuenta`
  ADD CONSTRAINT `confirmar_cuenta_ibfk_1` FOREIGN KEY (`cuenta_Id`) REFERENCES `cuenta` (`Id_Cuenta`);

--
-- Filtros para la tabla `contacto`
--
ALTER TABLE `contacto`
  ADD CONSTRAINT `contacto_ibfk_1` FOREIGN KEY (`FK_Registro`) REFERENCES `registro` (`ID_Registro`);

--
-- Filtros para la tabla `correcciones_registro`
--
ALTER TABLE `correcciones_registro`
  ADD CONSTRAINT `correcciones_registro_ibfk_1` FOREIGN KEY (`FK_Registro`) REFERENCES `registro` (`ID_Registro`);

--
-- Filtros para la tabla `datos_generales`
--
ALTER TABLE `datos_generales`
  ADD CONSTRAINT `datos_generales_ibfk_1` FOREIGN KEY (`FK_Registro`) REFERENCES `registro` (`ID_Registro`);

--
-- Filtros para la tabla `detalle_correcciones_registro`
--
ALTER TABLE `detalle_correcciones_registro`
  ADD CONSTRAINT `detalle_correcciones_registro_ibfk_1` FOREIGN KEY (`FK_Correcion_R`) REFERENCES `correcciones_registro` (`ID_Correcion_R`);

--
-- Filtros para la tabla `detenidoautorizado`
--
ALTER TABLE `detenidoautorizado`
  ADD CONSTRAINT `detenidoautorizado_ibfk_1` FOREIGN KEY (`FK_autorizadaDeducible`) REFERENCES `autorizadadeducible` (`ID_autorizadaDeducible`);

--
-- Filtros para la tabla `domicilio`
--
ALTER TABLE `domicilio`
  ADD CONSTRAINT `domicilio_ibfk_1` FOREIGN KEY (`FK_Registro`) REFERENCES `registro` (`ID_Registro`);

--
-- Filtros para la tabla `domicilio_social_legal`
--
ALTER TABLE `domicilio_social_legal`
  ADD CONSTRAINT `domicilio_social_legal_ibfk_1` FOREIGN KEY (`FK_Domicilio`) REFERENCES `domicilio` (`ID_Domicilio`);

--
-- Filtros para la tabla `empleados`
--
ALTER TABLE `empleados`
  ADD CONSTRAINT `empleados_ibfk_1` FOREIGN KEY (`FK_Cuenta`) REFERENCES `cuenta` (`Id_Cuenta`);

--
-- Filtros para la tabla `existenmodis`
--
ALTER TABLE `existenmodis`
  ADD CONSTRAINT `existenmodis_ibfk_1` FOREIGN KEY (`FK_acta_constitutiva`) REFERENCES `acta_constitutiva` (`ID_acta_constitutiva`);

--
-- Filtros para la tabla `historial_de_la_organizacion`
--
ALTER TABLE `historial_de_la_organizacion`
  ADD CONSTRAINT `historial_de_la_organizacion_ibfk_1` FOREIGN KEY (`FK_Registro`) REFERENCES `registro` (`ID_Registro`);

--
-- Filtros para la tabla `historial_de_la_organizacion_2`
--
ALTER TABLE `historial_de_la_organizacion_2`
  ADD CONSTRAINT `historial_de_la_organizacion_2_ibfk_1` FOREIGN KEY (`FK_Registro`) REFERENCES `registro` (`ID_Registro`);

--
-- Filtros para la tabla `historial_de_la_organizacion_3`
--
ALTER TABLE `historial_de_la_organizacion_3`
  ADD CONSTRAINT `historial_de_la_organizacion_3_ibfk_1` FOREIGN KEY (`FK_Registro`) REFERENCES `registro` (`ID_Registro`);

--
-- Filtros para la tabla `poblacion_beneficiada`
--
ALTER TABLE `poblacion_beneficiada`
  ADD CONSTRAINT `poblacion_beneficiada_ibfk_1` FOREIGN KEY (`FK_Registro`) REFERENCES `registro` (`ID_Registro`);

--
-- Filtros para la tabla `registro_archivos`
--
ALTER TABLE `registro_archivos`
  ADD CONSTRAINT `registro_archivos_ibfk_1` FOREIGN KEY (`FK_Registro`) REFERENCES `registro` (`ID_Registro`);

--
-- Filtros para la tabla `revisando`
--
ALTER TABLE `revisando`
  ADD CONSTRAINT `revisando_ibfk_1` FOREIGN KEY (`FK_Registro`) REFERENCES `registro` (`ID_Registro`),
  ADD CONSTRAINT `revisando_ibfk_2` FOREIGN KEY (`FK_Empleado`) REFERENCES `empleados` (`EmpleadoID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
