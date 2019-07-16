-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 10, 2019 at 09:24 AM
-- Server version: 10.3.15-MariaDB
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fundacion`
--

-- --------------------------------------------------------

--
-- Table structure for table `cuenta`
--

CREATE TABLE `cuenta` (
  `Id_Cuenta` int(11) NOT NULL,
  `Username` tinytext CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `Password` tinytext CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `Email` longtext CHARACTER SET utf8 COLLATE utf8_swedish_ci NOT NULL,
  `Type` smallint(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cuenta`
--

INSERT INTO `cuenta` (`Id_Cuenta`, `Username`, `Password`, `Email`, `Type`) VALUES
(1, '123', '$2y$10$RkvdNvc3eY3tyjn1f5i.uuqlpzEwgaNwRUkQ96iuarFykKhjbtNWq', 'jahziel56@hotmail.com', 2),
(2, 'jahziel', '$2y$10$/zpfJxfxwfu6Usrm.Ke.Ce/3MpAhdPf9wYz5FFxPVvpirbce9fIOy', 'jahziel56@hotmail.com', 2),
(3, '111', '$2y$10$9LzSWanAJmDf8KkX/T9bw.HzYYc1sWE8Mlv67NlxEarLT/zIfaoYG', 'q1@gmail.com', 3),
(4, 'hola', '$2y$10$/44.DGHHGWeZdwf2insteeBMUdXQ7OJVD8br4zAMclypFhOJ8kkUy', 'hola@gmail.com', 2),
(5, 'empleado1', '$2y$10$ZLIH3N5.FtvZkoSk.573iOKe.malJ.Eh/xSOqcCsKs8svf2SsKqFW', 'empleado@gmail.com', 2);

-- --------------------------------------------------------

--
-- Table structure for table `domicilios`
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
-- Table structure for table `donatariaautorizada`
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
-- Table structure for table `empleado`
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
-- Table structure for table `formularioarchivos`
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
-- Table structure for table `historialorganizacion`
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
-- Table structure for table `notificacion`
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
-- Table structure for table `persona`
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
-- Dumping data for table `persona`
--

INSERT INTO `persona` (`Id_Persona`, `Nombres`, `Apellido_P`, `Apellido_M`, `Telefono`, `Id_Cuenta_P`) VALUES
(1, 'jose jahziel', 'lopez', 'mendoza', 6221477894, 1),
(6, 'jahziel', 'Lopez', 'Mendoza', 622, 2);

-- --------------------------------------------------------

--
-- Table structure for table `preregistro`
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
-- Table structure for table `recursoscomplementarios`
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
-- Table structure for table `registroactaconstitutiva`
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
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `Id_Rol` int(11) NOT NULL,
  `Nombre` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `Descripcion` varchar(255) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`Id_Rol`, `Nombre`, `Descripcion`) VALUES
(1, 'Abogado', 'Abogado que realiza acciones para la fundación.'),
(2, 'Psicologo', 'Psicologo que realiza acciones para la fundación.'),
(3, 'Administrador', 'Administrador que realiza acciones para la fundación.'),
(4, 'Contador', 'Contador que realiza acciones para la fundación.');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cuenta`
--
ALTER TABLE `cuenta`
  ADD PRIMARY KEY (`Id_Cuenta`);

--
-- Indexes for table `domicilios`
--
ALTER TABLE `domicilios`
  ADD PRIMARY KEY (`DomicilioID`),
  ADD KEY `FK_RegistroID` (`FK_RegistroID`);

--
-- Indexes for table `donatariaautorizada`
--
ALTER TABLE `donatariaautorizada`
  ADD PRIMARY KEY (`DonatariaID`),
  ADD KEY `FK_RegistroID` (`FK_RegistroID`);

--
-- Indexes for table `empleado`
--
ALTER TABLE `empleado`
  ADD PRIMARY KEY (`Id_Empleado`),
  ADD KEY `FK_Rol` (`FK_Rol`),
  ADD KEY `FK_Cuenta` (`FK_Cuenta`);

--
-- Indexes for table `formularioarchivos`
--
ALTER TABLE `formularioarchivos`
  ADD PRIMARY KEY (`FArchivosID`),
  ADD KEY `FK_RegistroID` (`FK_RegistroID`);

--
-- Indexes for table `historialorganizacion`
--
ALTER TABLE `historialorganizacion`
  ADD PRIMARY KEY (`HistorialID`),
  ADD KEY `FK_RegistroID` (`FK_RegistroID`);

--
-- Indexes for table `notificacion`
--
ALTER TABLE `notificacion`
  ADD PRIMARY KEY (`Id_Noti`),
  ADD KEY `Id_Cuenta` (`Id_Cuenta`),
  ADD KEY `Id_Persona` (`Id_Persona`);

--
-- Indexes for table `persona`
--
ALTER TABLE `persona`
  ADD PRIMARY KEY (`Id_Persona`),
  ADD UNIQUE KEY `cuenta` (`Id_Cuenta_P`),
  ADD KEY `Id_Cuenta_P` (`Id_Cuenta_P`);

--
-- Indexes for table `preregistro`
--
ALTER TABLE `preregistro`
  ADD PRIMARY KEY (`RegistroID`);

--
-- Indexes for table `recursoscomplementarios`
--
ALTER TABLE `recursoscomplementarios`
  ADD PRIMARY KEY (`RecursosID`),
  ADD KEY `FK_RegistroID` (`FK_RegistroID`);

--
-- Indexes for table `registroactaconstitutiva`
--
ALTER TABLE `registroactaconstitutiva`
  ADD PRIMARY KEY (`ActaID`),
  ADD KEY `FK_RegistroID` (`FK_RegistroID`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`Id_Rol`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cuenta`
--
ALTER TABLE `cuenta`
  MODIFY `Id_Cuenta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `domicilios`
--
ALTER TABLE `domicilios`
  MODIFY `DomicilioID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `donatariaautorizada`
--
ALTER TABLE `donatariaautorizada`
  MODIFY `DonatariaID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `empleado`
--
ALTER TABLE `empleado`
  MODIFY `Id_Empleado` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `formularioarchivos`
--
ALTER TABLE `formularioarchivos`
  MODIFY `FArchivosID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `historialorganizacion`
--
ALTER TABLE `historialorganizacion`
  MODIFY `HistorialID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `notificacion`
--
ALTER TABLE `notificacion`
  MODIFY `Id_Noti` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `persona`
--
ALTER TABLE `persona`
  MODIFY `Id_Persona` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `preregistro`
--
ALTER TABLE `preregistro`
  MODIFY `RegistroID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `recursoscomplementarios`
--
ALTER TABLE `recursoscomplementarios`
  MODIFY `RecursosID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `registroactaconstitutiva`
--
ALTER TABLE `registroactaconstitutiva`
  MODIFY `ActaID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `Id_Rol` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `domicilios`
--
ALTER TABLE `domicilios`
  ADD CONSTRAINT `domicilios_ibfk_1` FOREIGN KEY (`FK_RegistroID`) REFERENCES `preregistro` (`RegistroID`);

--
-- Constraints for table `donatariaautorizada`
--
ALTER TABLE `donatariaautorizada`
  ADD CONSTRAINT `donatariaautorizada_ibfk_1` FOREIGN KEY (`FK_RegistroID`) REFERENCES `preregistro` (`RegistroID`);

--
-- Constraints for table `empleado`
--
ALTER TABLE `empleado`
  ADD CONSTRAINT `empleado_ibfk_1` FOREIGN KEY (`FK_Rol`) REFERENCES `preregistro` (`RegistroID`),
  ADD CONSTRAINT `empleado_ibfk_2` FOREIGN KEY (`FK_Cuenta`) REFERENCES `cuenta` (`Id_Cuenta`);

--
-- Constraints for table `formularioarchivos`
--
ALTER TABLE `formularioarchivos`
  ADD CONSTRAINT `formularioarchivos_ibfk_1` FOREIGN KEY (`FK_RegistroID`) REFERENCES `preregistro` (`RegistroID`);

--
-- Constraints for table `historialorganizacion`
--
ALTER TABLE `historialorganizacion`
  ADD CONSTRAINT `historialorganizacion_ibfk_1` FOREIGN KEY (`FK_RegistroID`) REFERENCES `preregistro` (`RegistroID`);

--
-- Constraints for table `notificacion`
--
ALTER TABLE `notificacion`
  ADD CONSTRAINT `notificacion_ibfk_1` FOREIGN KEY (`Id_Cuenta`) REFERENCES `cuenta` (`Id_Cuenta`),
  ADD CONSTRAINT `notificacion_ibfk_2` FOREIGN KEY (`Id_Persona`) REFERENCES `persona` (`Id_Persona`);

--
-- Constraints for table `persona`
--
ALTER TABLE `persona`
  ADD CONSTRAINT `persona_ibfk_1` FOREIGN KEY (`Id_Cuenta_P`) REFERENCES `cuenta` (`Id_Cuenta`);

--
-- Constraints for table `recursoscomplementarios`
--
ALTER TABLE `recursoscomplementarios`
  ADD CONSTRAINT `recursoscomplementarios_ibfk_1` FOREIGN KEY (`FK_RegistroID`) REFERENCES `preregistro` (`RegistroID`);

--
-- Constraints for table `registroactaconstitutiva`
--
ALTER TABLE `registroactaconstitutiva`
  ADD CONSTRAINT `registroactaconstitutiva_ibfk_1` FOREIGN KEY (`FK_RegistroID`) REFERENCES `preregistro` (`RegistroID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
