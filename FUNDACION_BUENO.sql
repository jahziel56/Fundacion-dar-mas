-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 16-07-2019 a las 09:19:21
-- Versión del servidor: 10.3.15-MariaDB
-- Versión de PHP: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `fundacion`
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
(1, '123', '$2y$10$RkvdNvc3eY3tyjn1f5i.uuqlpzEwgaNwRUkQ96iuarFykKhjbtNWq', 'jahziel56@hotmail.com', 2),
(2, 'jahziel', '$2y$10$/zpfJxfxwfu6Usrm.Ke.Ce/3MpAhdPf9wYz5FFxPVvpirbce9fIOy', 'jahziel56@hotmail.com', 2),
(3, '111', '$2y$10$9LzSWanAJmDf8KkX/T9bw.HzYYc1sWE8Mlv67NlxEarLT/zIfaoYG', 'q1@gmail.com', 3),
(13, 'empleado1', '$2y$10$jtQ.E09mSVCtlhYanz8Pi.UzTucButoJ3qm7RN8j/5q1o5Clb10iS', 'empleado1@gmail.com', 2),
(14, 'empleado2', '$2y$10$5BVy4O.Gef12fsvesOHZZu7D38zAwmaApTk5T/KO.8Sbcu3whQxGq', 'empleado2@gmail.com', 2),
(15, 'empleado99', '$2y$10$fJ6HwZgdWbUv5aM74/I.Cu8LVekAGHvQjwjAt72kNoxDyw4gBgrvy', 'empleado99@gmail.com', 2),
(16, 'empleado98', '$2y$10$q4FSABoZucMFa7NcF9Wv1O5VGB6MXZNOkiaxpZzqdYHCUe4Q5LnPC', 'empleado98@gmail.com', 2),
(17, 'empleado97', '$2y$10$oxSvaJcIMNHa//2U9YPq4.0QPE/kgrrIfY89A7LWf0xNKPEpdAO6G', 'empleado97@gmail.com', 2),
(18, 'empleado96', '$2y$10$usC7gjDe41Y180N9blCXU.9LYfAxtqYy8ehEzH.FHp9CL.3Xh0Zaa', 'empleado96@gmail.com', 2);

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
  `FK_RegistroID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

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
  `FK_RegistroID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleado`
--

CREATE TABLE `empleado` (
  `Id_Empleado` int(11) NOT NULL,
  `Nombre` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `Apellido_M` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `correoEmpleado` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `FK_Rol` int(11) NOT NULL,
  `FK_Cuenta` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

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
(1, 'Luis', 'Salcido', 'empleado99@gmail.com', 2, 15),
(2, 'Jahziel', 'Lopez', 'empleado98@gmail.com', 1, 16),
(3, 'Carlos', 'Acosta', 'empleado97@gmail.com', 4, 17),
(4, 'Francisco', 'Andrade', 'empleado96@gmail.com', 3, 18);

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
  `Fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `archivoAceptado` tinyint(1) NOT NULL,
  `FK_RegistroID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

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
  `FK_RegistroID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `notificacion`
--

CREATE TABLE `notificacion` (
  `Id_Noti` int(11) NOT NULL,
  `Id_Cuenta` int(11) NOT NULL,
  `Id_Persona` int(11) NOT NULL,
  `Status` varchar(20) NOT NULL,
  `Fecha` datetime NOT NULL DEFAULT current_timestamp(),
  `Tipo` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `persona`
--

CREATE TABLE `persona` (
  `Id_Persona` int(11) NOT NULL,
  `Nombres` text NOT NULL,
  `Apellido_P` text NOT NULL,
  `Apellido_M` text NOT NULL,
  `Telefono` bigint(20) NOT NULL,
  `Id_Cuenta_P` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `persona`
--

INSERT INTO `persona` (`Id_Persona`, `Nombres`, `Apellido_P`, `Apellido_M`, `Telefono`, `Id_Cuenta_P`) VALUES
(1, 'jose jahziel', 'lopez', 'mendoza', 6221477894, 1),
(6, 'jahziel', 'Lopez', 'Mendoza', 622, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `preregistro`
--

CREATE TABLE `preregistro` (
  `RegistroID` int(11) NOT NULL,
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
  `twitter` varchar(35) COLLATE utf8_spanish_ci DEFAULT NULL,
  `instagram` varchar(35) COLLATE utf8_spanish_ci DEFAULT NULL,
  `estadoActual` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `ultimaEdicion` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
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
  `FK_RegistroID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

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
  `FK_RegistroID` int(11) NOT NULL
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

--
-- Volcado de datos para la tabla `registroasignado`
--

INSERT INTO `registroasignado` (`AsignacionID`, `FK_Registro`, `FK_Empleado`) VALUES
(1, 3, 2),
(2, 3, 2),
(3, 4, 3),
(4, 1, 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `Id_Rol` int(11) NOT NULL,
  `Nombre` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `Descripcion` varchar(255) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`Id_Rol`, `Nombre`, `Descripcion`) VALUES
(1, 'Abogado', 'Abogado que realiza acciones para la fundación.'),
(2, 'Psicologo', 'Psicologo que realiza acciones para la fundación.'),
(3, 'Administrador', 'Administrador que realiza acciones para la fundación.'),
(4, 'Contador', 'Contador que realiza acciones para la fundación.');

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
  ADD KEY `FK_RegistroID` (`FK_RegistroID`);

--
-- Indices de la tabla `donatariaautorizada`
--
ALTER TABLE `donatariaautorizada`
  ADD PRIMARY KEY (`DonatariaID`),
  ADD KEY `FK_RegistroID` (`FK_RegistroID`);

--
-- Indices de la tabla `empleado`
--
ALTER TABLE `empleado`
  ADD PRIMARY KEY (`Id_Empleado`),
  ADD KEY `FK_Rol` (`FK_Rol`),
  ADD KEY `FK_Cuenta` (`FK_Cuenta`);

--
-- Indices de la tabla `empleados`
--
ALTER TABLE `empleados`
  ADD PRIMARY KEY (`EmpleadoID`);

--
-- Indices de la tabla `formularioarchivos`
--
ALTER TABLE `formularioarchivos`
  ADD PRIMARY KEY (`FArchivosID`),
  ADD KEY `FK_RegistroID` (`FK_RegistroID`);

--
-- Indices de la tabla `historialorganizacion`
--
ALTER TABLE `historialorganizacion`
  ADD PRIMARY KEY (`HistorialID`),
  ADD KEY `FK_RegistroID` (`FK_RegistroID`);

--
-- Indices de la tabla `notificacion`
--
ALTER TABLE `notificacion`
  ADD PRIMARY KEY (`Id_Noti`),
  ADD KEY `Id_Cuenta` (`Id_Cuenta`),
  ADD KEY `Id_Persona` (`Id_Persona`);

--
-- Indices de la tabla `persona`
--
ALTER TABLE `persona`
  ADD PRIMARY KEY (`Id_Persona`),
  ADD UNIQUE KEY `cuenta` (`Id_Cuenta_P`),
  ADD KEY `Id_Cuenta_P` (`Id_Cuenta_P`);

--
-- Indices de la tabla `preregistro`
--
ALTER TABLE `preregistro`
  ADD PRIMARY KEY (`RegistroID`);

--
-- Indices de la tabla `recursoscomplementarios`
--
ALTER TABLE `recursoscomplementarios`
  ADD PRIMARY KEY (`RecursosID`),
  ADD KEY `FK_RegistroID` (`FK_RegistroID`);

--
-- Indices de la tabla `registroactaconstitutiva`
--
ALTER TABLE `registroactaconstitutiva`
  ADD PRIMARY KEY (`ActaID`),
  ADD KEY `FK_RegistroID` (`FK_RegistroID`);

--
-- Indices de la tabla `registroasignado`
--
ALTER TABLE `registroasignado`
  ADD PRIMARY KEY (`AsignacionID`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`Id_Rol`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `cuenta`
--
ALTER TABLE `cuenta`
  MODIFY `Id_Cuenta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `domicilios`
--
ALTER TABLE `domicilios`
  MODIFY `DomicilioID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `donatariaautorizada`
--
ALTER TABLE `donatariaautorizada`
  MODIFY `DonatariaID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `empleado`
--
ALTER TABLE `empleado`
  MODIFY `Id_Empleado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `empleados`
--
ALTER TABLE `empleados`
  MODIFY `EmpleadoID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `formularioarchivos`
--
ALTER TABLE `formularioarchivos`
  MODIFY `FArchivosID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `historialorganizacion`
--
ALTER TABLE `historialorganizacion`
  MODIFY `HistorialID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `notificacion`
--
ALTER TABLE `notificacion`
  MODIFY `Id_Noti` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `persona`
--
ALTER TABLE `persona`
  MODIFY `Id_Persona` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `preregistro`
--
ALTER TABLE `preregistro`
  MODIFY `RegistroID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `recursoscomplementarios`
--
ALTER TABLE `recursoscomplementarios`
  MODIFY `RecursosID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `registroactaconstitutiva`
--
ALTER TABLE `registroactaconstitutiva`
  MODIFY `ActaID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `registroasignado`
--
ALTER TABLE `registroasignado`
  MODIFY `AsignacionID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `Id_Rol` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `domicilios`
--
ALTER TABLE `domicilios`
  ADD CONSTRAINT `domicilios_ibfk_1` FOREIGN KEY (`FK_RegistroID`) REFERENCES `preregistro` (`RegistroID`);

--
-- Filtros para la tabla `donatariaautorizada`
--
ALTER TABLE `donatariaautorizada`
  ADD CONSTRAINT `donatariaautorizada_ibfk_1` FOREIGN KEY (`FK_RegistroID`) REFERENCES `preregistro` (`RegistroID`);

--
-- Filtros para la tabla `empleado`
--
ALTER TABLE `empleado`
  ADD CONSTRAINT `empleado_ibfk_1` FOREIGN KEY (`FK_Rol`) REFERENCES `preregistro` (`RegistroID`),
  ADD CONSTRAINT `empleado_ibfk_2` FOREIGN KEY (`FK_Cuenta`) REFERENCES `cuenta` (`Id_Cuenta`);

--
-- Filtros para la tabla `formularioarchivos`
--
ALTER TABLE `formularioarchivos`
  ADD CONSTRAINT `formularioarchivos_ibfk_1` FOREIGN KEY (`FK_RegistroID`) REFERENCES `preregistro` (`RegistroID`);

--
-- Filtros para la tabla `historialorganizacion`
--
ALTER TABLE `historialorganizacion`
  ADD CONSTRAINT `historialorganizacion_ibfk_1` FOREIGN KEY (`FK_RegistroID`) REFERENCES `preregistro` (`RegistroID`);

--
-- Filtros para la tabla `notificacion`
--
ALTER TABLE `notificacion`
  ADD CONSTRAINT `notificacion_ibfk_1` FOREIGN KEY (`Id_Cuenta`) REFERENCES `cuenta` (`Id_Cuenta`),
  ADD CONSTRAINT `notificacion_ibfk_2` FOREIGN KEY (`Id_Persona`) REFERENCES `persona` (`Id_Persona`);

--
-- Filtros para la tabla `persona`
--
ALTER TABLE `persona`
  ADD CONSTRAINT `persona_ibfk_1` FOREIGN KEY (`Id_Cuenta_P`) REFERENCES `cuenta` (`Id_Cuenta`);

--
-- Filtros para la tabla `recursoscomplementarios`
--
ALTER TABLE `recursoscomplementarios`
  ADD CONSTRAINT `recursoscomplementarios_ibfk_1` FOREIGN KEY (`FK_RegistroID`) REFERENCES `preregistro` (`RegistroID`);

--
-- Filtros para la tabla `registroactaconstitutiva`
--
ALTER TABLE `registroactaconstitutiva`
  ADD CONSTRAINT `registroactaconstitutiva_ibfk_1` FOREIGN KEY (`FK_RegistroID`) REFERENCES `preregistro` (`RegistroID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
