-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 09-07-2019 a las 10:09:10
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
(1, '123', '$2y$10$MlGAbUn0agV1Nev2Lhs2.uN212AASF.G7u2BastzwRClgSwx8pE.C', 'jahziel56@hotmail.com', 1),
(2, '222', '$2y$10$MlGAbUn0agV1Nev2Lhs2.uN212AASF.G7u2BastzwRClgSwx8pE.C', 'jahziel56@hotmail.com', 1),
(3, '111', '$2y$10$9LzSWanAJmDf8KkX/T9bw.HzYYc1sWE8Mlv67NlxEarLT/zIfaoYG', 'q1@gmail.com', 3),
(4, 'admin', '$2y$10$MlGAbUn0agV1Nev2Lhs2.uN212AASF.G7u2BastzwRClgSwx8pE.C', 'jahziel56@hotmail.com', 3);

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
(10, 'entre 2 y 3', 'Jerundia', 'GIL samaniego', '848293', 'Mexico', 'Mexicali', 21),
(11, 'entre 2 y 3', 'Jerundia', 'GIL samaniego', '848293', 'Mexico', 'Mexicali', 22);

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
(9, '2019-06-05', 12412, 'Si', 'no', '2019-06-26', 21),
(10, '2019-06-05', 12412, 'Si', 'no', '2019-06-26', 22);

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
  `FK_FormularioID` int(11) NOT NULL
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
  `Id_Cuenta` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `formularioprincipal`
--

INSERT INTO `formularioprincipal` (`FormularioID`, `nombreOSC`, `objetoSocialOrganizacion`, `mision`, `vision`, `areasAtencion`, `rfcHomoclave`, `CLUNI`, `telefonoOficina`, `telefonoCelular`, `email`, `paginaWeb`, `organizacionFB`, `twitter`, `instagram`, `Id_Cuenta`) VALUES
(21, 'Algeria', 'Objetivo', 'Misiones', 'Visionar', 'atender', '55IAJSDK24A', 'CCCSF3S', '6221477894', '6221477894', 'jahziel56@hotmail.com', 'http://tacosalpastor.cf/Formulario/', 'http://tacosalpastor.cf/Formulario/', 'http://tacosalpastor.cf/Formulario/', 'http://tacosalpastor.cf/Formulario/', 1),
(22, 'Algeria', 'Objetivo', 'Misiones', 'Visionar', 'atender', '55IAJSDK24A', 'CCCSF3S', '6221477894', '6221477894', 'jahziel56@hotmail.com', 'http://tacosalpastor.cf/Formulario/', 'http://tacosalpastor.cf/Formulario/', 'http://tacosalpastor.cf/Formulario/', 'http://tacosalpastor.cf/Formulario/', 1);

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

--
-- Volcado de datos para la tabla `historialorganizacion`
--

INSERT INTO `historialorganizacion` (`HistorialID`, `fechaConstitucionOSC`, `nombreNotario`, `numeroNotario`, `municipioNotaria`, `noEstrituraPublica`, `volumenEstrituraPublica`, `fechaEstritura`, `municipioRegistroOSC`, `estaResideOSC`, `muniResideOSC`, `principalesLogros`, `metasOrganizacion`, `autorizadaDeducible`, `dirigidaPor`, `nombreRepresentante`, `idRepresentante`, `nombrePresi`, `nombreCoordi`, `correoCoordinador`, `cargoCoordinador`, `numeroEmpleados`, `numeroVoluntarios`, `principalesAlianzas`, `numeroBeneficiarios`, `observaciones32D`, `tiempoYforma`, `tieneAdeudos`, `inscritaDNIAS`, `FK_FormularioID`) VALUES
(9, '2019-06-21', 'jahziel', '6', 'CarbÃ³', '23423', '54', '2019-06-12', 'Cajeme', 'Sonora', 'hermosillo', 'Logros logrados', 'Metasdelaorganizacionorganizacional', 'Si', 'Consejo Directivo', 'jose jahziel', '123', 'Pancho perez', 'Perez Pancho', 'jahziel56@hotmail.com', 'albaÃ±il', 621123, 23, '3', 9929, 'Si', 'No', 'Si', 'Si', 21),
(10, '2019-06-21', 'jahziel', '6', 'CarbÃ³', '23423', '54', '2019-06-12', 'Cajeme', 'Sonora', 'hermosillo', 'Logros logrados', 'Metasdelaorganizacionorganizacional', 'Si', 'Consejo Directivo', 'jose jahziel', '123', 'Pancho perez', 'Perez Pancho', 'jahziel56@hotmail.com', 'albaÃ±il', 621123, 23, '3', 9929, 'Si', 'No', 'Si', 'Si', 22);

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
(9, 22, 33, 11, 44, 55, 66, 'Si', '1231235sd', 21),
(10, 22, 33, 11, 44, 55, 66, 'Si', '1231235sd', 22);

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

--
-- Volcado de datos para la tabla `registroactaconstitutiva`
--

INSERT INTO `registroactaconstitutiva` (`ActaID`, `numeroLibro`, `numeroInscripcion`, `volumenICRESON`, `existenModis`, `ultimaModi`, `numeroActaConsti`, `volumenActaConsti`, `FK_FormularioID`) VALUES
(10, 662, 125, 512, 'Si', '2019-06-05', 12512, 1, 21),
(11, 662, 125, 512, 'Si', '2019-06-05', 12512, 1, 22);

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
(1, ' Default', 'Rol por defecto, puede ver todos los campos');

--
-- Índices para tablas volcadas
--

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
-- Indices de la tabla `rol`
--
ALTER TABLE `rol`
  ADD PRIMARY KEY (`Id_Rol`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `cuenta`
--
ALTER TABLE `cuenta`
  MODIFY `Id_Cuenta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `domicilios`
--
ALTER TABLE `domicilios`
  MODIFY `DomicilioID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `donatariaautorizada`
--
ALTER TABLE `donatariaautorizada`
  MODIFY `DonatariaID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `formularioarchivos`
--
ALTER TABLE `formularioarchivos`
  MODIFY `FArchivosID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `formularioprincipal`
--
ALTER TABLE `formularioprincipal`
  MODIFY `FormularioID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT de la tabla `historialorganizacion`
--
ALTER TABLE `historialorganizacion`
  MODIFY `HistorialID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

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
  MODIFY `RecursosID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `registroactaconstitutiva`
--
ALTER TABLE `registroactaconstitutiva`
  MODIFY `ActaID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Restricciones para tablas volcadas
--

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
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
