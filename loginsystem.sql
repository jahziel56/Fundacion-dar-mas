CREATE TABLE `cuenta` (
  `Id_Cuenta` int(11) NOT NULL,
  `Username` tinytext CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `Password` tinytext CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `Email` longtext CHARACTER SET utf8 COLLATE utf8_swedish_ci NOT NULL,
  `Type` smallint(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `cuenta` (`Id_Cuenta`, `Username`, `Password`, `Email`, `Type`) VALUES
(1, '123', '$2y$10$RkvdNvc3eY3tyjn1f5i.uuqlpzEwgaNwRUkQ96iuarFykKhjbtNWq', 'jahziel56@hotmail.com', 2),
(2, 'jahziel', '$2y$10$/zpfJxfxwfu6Usrm.Ke.Ce/3MpAhdPf9wYz5FFxPVvpirbce9fIOy', 'jahziel56@hotmail.com', 2),
(3, '111', '$2y$10$9LzSWanAJmDf8KkX/T9bw.HzYYc1sWE8Mlv67NlxEarLT/zIfaoYG', 'q1@gmail.com', 3);

CREATE TABLE `notificacion` (
  `Id_Noti` int(11) NOT NULL,
  `Id_Cuenta` int(11) NOT NULL,
  `Id_Persona` int(11) NOT NULL,
  `Status` varchar(20) NOT NULL,
  `Fecha` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Tipo` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `persona` (
  `Id_Persona` int(11) NOT NULL,
  `Nombres` text NOT NULL,
  `Apellido_P` text NOT NULL,
  `Apellido_M` text NOT NULL,
  `Telefono` bigint(20) NOT NULL,
  `Id_Cuenta_P` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `persona` (`Id_Persona`, `Nombres`, `Apellido_P`, `Apellido_M`, `Telefono`, `Id_Cuenta_P`) VALUES
(1, 'jose jahziel', 'lopez', 'mendoza', 6221477894, 1),
(6, 'jahziel', 'Lopez', 'Mendoza', 622, 2);

ALTER TABLE `cuenta`
  ADD PRIMARY KEY (`Id_Cuenta`);

ALTER TABLE `notificacion`
  ADD PRIMARY KEY (`Id_Noti`),
  ADD KEY `Id_Cuenta` (`Id_Cuenta`),
  ADD KEY `Id_Persona` (`Id_Persona`);

ALTER TABLE `persona`
  ADD PRIMARY KEY (`Id_Persona`),
  ADD UNIQUE KEY `cuenta` (`Id_Cuenta_P`),
  ADD KEY `Id_Cuenta_P` (`Id_Cuenta_P`);

ALTER TABLE `cuenta`
  MODIFY `Id_Cuenta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

ALTER TABLE `notificacion`
  MODIFY `Id_Noti` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `persona`
  MODIFY `Id_Persona` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

ALTER TABLE `notificacion`
  ADD CONSTRAINT `notificacion_ibfk_1` FOREIGN KEY (`Id_Cuenta`) REFERENCES `cuenta` (`Id_Cuenta`),
  ADD CONSTRAINT `notificacion_ibfk_2` FOREIGN KEY (`Id_Persona`) REFERENCES `persona` (`Id_Persona`);

ALTER TABLE `persona`
  ADD CONSTRAINT `persona_ibfk_1` FOREIGN KEY (`Id_Cuenta_P`) REFERENCES `cuenta` (`Id_Cuenta`);

ALTER TABLE convocatoria ADD FOREIGN KEY (`id_Persona`) REFERENCES persona(id_Persona);
ALTER TABLE convocatoria ADD FOREIGN KEY (`id_Formulario`) REFERENCES formularioprincipal(FormularioID);

CREATE TABLE PreRegistro (
	RegistroID 				      		INT 				NOT NULL AUTO_INCREMENT,
	nombreOSC 					      	VARCHAR(50) 		NOT NULL,
	objetoSocialOrganizacion 			VARCHAR(50)			NOT NULL,
	mision 						        VARCHAR(300) 		NOT NULL,
	vision 						        VARCHAR(300) 		NOT NULL,
	areasAtencion 				    	VARCHAR(300) 		NOT NULL,
	rfcHomoclave 				      	VARCHAR(20) 		NOT NULL,
	#RFC_ARCHIVO
	CLUNI 						        VARCHAR(20) 		NOT NULL,
	#CLUNI_ARCHIVO
	#Domicilio
	telefonoOficina 			   		VARCHAR(10) 		NOT NULL,
	telefonoCelular 			    	VARCHAR(10) 		NOT NULL,
	email 						        VARCHAR(50) 		NOT NULL,
	paginaWeb 					      	VARCHAR(50) 		NOT NULL,
	organizacionFB 				    	VARCHAR(35) 		NOT NULL,
	twitter 					        VARCHAR(35),
	instagram 					      	VARCHAR(35),
	estadoActual						VARCHAR(50)			NOT NULL,
	ultimaEdicion						CURRENT_TIMESTAMP	NOT NULL,
	PRIMARY KEY (RegistroID)
);

CREATE TABLE FormularioArchivos (
	FArchivosID 			int 				NOT NULL AUTO_INCREMENT,
	nombreSeccion			VARCHAR(255)		NOT NULL,
	nombreArchivo			VARCHAR(255)		NOT NULL,
	tipoArchivo				VARCHAR(255)		NOT NULL,
	dataArchivo				MEDIUMBLOB			NOT NULL,
	Fecha					CURRENT_TIMESTAMP	NOT NULL,
	archivoAceptado			BOOLEAN				NOT NULL,
	FK_RegistroID			INT 				NOT NULL,

	PRIMARY KEY (FArchivosID),
	FOREIGN KEY (FK_RegistroID) REFERENCES PreRegistro(RegistroID)
);

/*CREATE TABLE Metas (
	MetasID						    INT 			    NOT NULL AUTO_INCREMENT,
	primerMeta					  VARCHAR(150)	NOT NULL,
	tipoProductoUno				VARCHAR(50)		NOT NULL,
	segundaMeta					  VARCHAR(150)	NOT NULL,
	tipoProductoDos				VARCHAR(150) 	NOT NULL,
	terceraMeta					  VARCHAR(150)	NOT NULL,
	tipoProductoTres			VARCHAR(150) 	NOT NULL,
	FK_RegistroID				INT 			    NOT NULL,
	PRIMARY KEY (MetasID),
	FOREIGN KEY (FK_RegistroID) REFERENCES PreRegistro(RegistroID)
);

CREATE TABLE Proyecto(
	ProyectoID 					    INT 			    NOT NULL AUTO_INCREMENT,
	nombreProyecto				  VARCHAR(30)		NOT NULL,
	carenciaSocial				  VARCHAR(30)		NOT NULL,
	objetivoDesarrolloSus		VARCHAR(50)		NOT NULL,
	temaConvocatoria			  VARCHAR(150)	NOT NULL,
	temaDerechoSocial 			VARCHAR(50)		NOT NULL,
	problemaSocial				  VARCHAR(300)	NOT NULL,
	objetivoGeneral				  VARCHAR(150)	NOT NULL,
	descripcionProyecto			VARCHAR(500)	NOT NULL,
	criteriosIdentificar		VARCHAR(300)	NOT NULL,
	FK_FormularioID				  INT 			    NOT NULL,
	PRIMARY KEY (ProyectoID),
	FOREIGN KEY (FK_FormularioID) REFERENCES FormularioPrincipal(FormularioID)
);*/

CREATE TABLE RecursosComplementarios (
	RecursosID 					      INT 			    NOT NULL AUTO_INCREMENT,
	poblacion_0_4				      INT 			    NOT NULL,
	poblacion_5_14				      INT 			    NOT NULL,
	poblacion_15_29 			      INT 			    NOT NULL,
	poblacion_30_44 			      INT 			    NOT NULL,
	poblacion_45_64				      INT 			    NOT NULL,
	poblacion_65_mas			      INT 			    NOT NULL,
	esquemasRecursosComp			VARCHAR(2)			NOT NULL,
	organizacionManejoRecursos		VARCHAR(100)		NOT NULL,
	FK_RegistroID 			      	INT 			    NOT NULL,
	PRIMARY KEY (RecursosID),
	FOREIGN KEY (FK_RegistroID) REFERENCES PreRegistro(RegistroID)
);

CREATE TABLE DonatariaAutorizada (
	DonatariaID 			    INT 			    NOT NULL AUTO_INCREMENT,
	fechaDiario				    DATE 			    NOT NULL,
	numeroDiario			    INT 			    NOT NULL,
	#FILE_PAGINA_DIARIO
	detenidoAutorizado 			VARCHAR(2)		NOT NULL,
	razonDetenido 			  	VARCHAR(100)	NOT NULL,
	fechaAutorizada 		  	DATE 			    NOT NULL,
	FK_RegistroID 		  		INT 			    NOT NULL,
	PRIMARY KEY (DonatariaID),
	FOREIGN KEY (FK_RegistroID) REFERENCES PreRegistro(RegistroID)
);

CREATE TABLE RegistroActaConstitutiva (
	ActaID 					      	INT 		    NOT NULL AUTO_INCREMENT,
	numeroLibro				    	INT 		    NOT NULL,
	numeroInscripcion 				INT 		    NOT NULL,
	volumenICRESON 			  		INT 		    NOT NULL,
	#FILE_RPP_ICRESON
	existenModis 			    	VARCHAR(2)	NOT NULL,
	ultimaModi				    	DATE 		    NOT NULL,
	numeroActaConsti		  		INT 		    NOT NULL,
	volumenActaConsti 				INT 		    NOT NULL,
	#FILE_ULTIMA_ACTA
	#FILE_RPP_ULTIMA_ACTA
	FK_RegistroID			  		INT 		    NOT NULL,
	PRIMARY KEY (ActaID),
	FOREIGN KEY (FK_RegistroID) REFERENCES PreRegistro(RegistroID)
);

CREATE TABLE HistorialOrganizacion (
	HistorialID				      	INT 			NOT NULL AUTO_INCREMENT,
	fechaConstitucionOSC	      	DATE 			NOT NULL,
	nombreNotario			      	VARCHAR(50)		NOT NULL,
	numeroNotario			      	VARCHAR(10)		NOT NULL,
	municipioNotaria		      	VARCHAR(30)		NOT NULL,
	noEstrituraPublica		      	VARCHAR(10) 	NOT NULL,
	volumenEstrituraPublica	    	VARCHAR(30)		NOT NULL,
	fechaEstritura			        DATE 			NOT NULL,
	#FILE_ACTA_CONSTITUTIVA
	#FILE_ACTA_PROTOCOLIZADA
	municipioRegistroOSC	      	VARCHAR(30)		NOT NULL,
	estaResideOSC			       	VARCHAR(30)		NOT NULL,
	muniResideOSC			        VARCHAR(30) 	NOT NULL,
	principalesLogros		        VARCHAR(300)	NOT NULL,
	metasOrganizacion		        VARCHAR(300)	NOT NULL,
	autorizadaDeducible		      	VARCHAR(2)		NOT NULL,
	dirigidaPor				        VARCHAR(20)		NOT NULL,
	nombreRepresentante		      	VARCHAR(50)		NOT NULL,
	idRepresentante			        VARCHAR(10)		NOT NULL,
	#FILE_INE_REPRESENTANTE
	nombrePresi				        VARCHAR(50)		NOT NULL,
	nombreCoordi			        VARCHAR(50)		NOT NULL,
	#FILE_INE_COORDINADOR
	correoCoordinador		        VARCHAR(30)		NOT NULL,
	cargoCoordinador		        VARCHAR(30)		NOT NULL,
	numeroEmpleados			        INT 			NOT NULL,
	numeroVoluntarios 		      	INT 			NOT NULL,
	principalesAlianzas		      	VARCHAR(300)	NOT NULL,
	numeroBeneficiarios		      	INT 			NOT NULL,
	observaciones32D		        VARCHAR(2)		NOT NULL,
	#FILE_32D
	tiempoYforma		          	VARCHAR(2)		NOT NULL,
	tieneAdeudos 			        VARCHAR(2)		NOT NULL,
	#FILE_F21
	#FILE_CONSTANCIA_FISCAL
	#FILE_COMPROBANTE_BANCO
	#FILE_FACTURA_CANCELADA
	inscritaDNIAS			        VARCHAR(2)		NOT NULL,
	#FILE_DNIAS
	FK_RegistroID			        INT 			NOT NULL,
	PRIMARY KEY (HistorialID),
	FOREIGN KEY (FK_RegistroID) REFERENCES PreRegistro(RegistroID)
);

CREATE TABLE Domicilios (
	DomicilioID 		    INT 			    NOT NULL AUTO_INCREMENT,
	calle				        VARCHAR(50)		NOT NULL,
	numero 				      VARCHAR(10) 	NOT NULL,
	colonia 			      VARCHAR(30) 	NOT NULL,
	codigoPostal 		    VARCHAR(10) 	NOT NULL,
	localidad 			    VARCHAR(50) 	NOT NULL,
	municipio 			    VARCHAR(50) 	NOT NULL,
	FK_RegistroID 	  INT 			    NOT NULL,
	PRIMARY KEY (DomicilioID),
	FOREIGN KEY (FK_RegistroID) REFERENCES PreRegistro(RegistroID)
);

CREATE TABLE Roles (
	Id_Rol 				INT				NOT NULL AUTO_INCREMENT,
	Nombre				VARCHAR(50)		NOT NULL,
	Descripcion 		VARCHAR(255)	NOT NULL,
	PRIMARY KEY (Id_Rol)
);

CREATE TABLE Empleado (
	Id_Empleado			INT				NOT NULL AUTO_INCREMENT,
	Nombre				VARCHAR(100) 	NOT NULL,
	Apellido_M			VARCHAR(100)	NOT NULL,
	correoEmpleado		VARCHAR(255)	NOT NULL,
	FK_Rol 				INT				NOT NULL,
	FK_Cuenta			INT				NOT NULL,
	PRIMARY KEY (Id_Empleado),
	FOREIGN KEY (FK_Rol) REFERENCES PreRegistro(RegistroID),
	FOREIGN KEY (FK_Cuenta) REFERENCES Cuenta(Id_Cuenta)
);

COMMIT;

