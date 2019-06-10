CREATE TABLE FormularioPrincipal (
	FormularioID 				INT 			NOT NULL AUTO_INCREMENT,
	nombreOSC 					VARCHAR(50) 	NOT NULL,
	objetoSocialOrganizacion 	VARCHAR(50)		NOT NULL,
	mision 						VARCHAR(300) 	NOT NULL,
	vision 						VARCHAR(300) 	NOT NULL,
	areasAtencion 				VARCHAR(300) 	NOT NULL,
	rfcHomoclave 				VARCHAR(20) 	NOT NULL,
	CLUNI 						VARCHAR(20) 	NOT NULL,
	telefonoOficina 			VARCHAR(10) 	NOT NULL,
	telefonoCelular 			VARCHAR(10) 	NOT NULL,
	email 						VARCHAR(50) 	NOT NULL,
	paginaWeb 					VARCHAR(50) 	NOT NULL,
	organizacionFB 				VARCHAR(35) 	NOT NULL,
	twitter 					VARCHAR(35) 	NOT NULL,
	instagram 					VARCHAR(35) 	NOT NULL,
	PRIMARY KEY (FormularioID)
);


CREATE TABLE ArchivoFormulario (
	ArchivosID 				int 			NOT NULL AUTO_INCREMENT,
	nombreArchivo			VARCHAR(255)	NOT NULL,
	tipoArchivo				VARCHAR(255)	NOT NULL,
	dataArchivo				MEDIUMBLOB		NOT NULL,
	FK_FormularioID			INT 			NOT NULL,

	PRIMARY KEY (ArchivosID),
	FOREIGN KEY (FK_FormularioID) REFERENCES FormularioPrincipal(FormularioID)
);

CREATE TABLE Metas (
	MetasID						INT 			NOT NULL AUTO_INCREMENT,
	primerMeta					VARCHAR(150)	NOT NULL,
	tipoProductoUno				VARCHAR(50)		NOT NULL,
	segundaMeta					VARCHAR(150)	NOT NULL,
	tipoProductoDos				VARCHAR(150) 	NOT NULL,
	terceraMeta					VARCHAR(150)	NOT NULL,
	tipoProductoTres			VARCHAR(150) 	NOT NULL,
	FK_FormularioID				INT 			NOT NULL,
	PRIMARY KEY (MetasID),
	FOREIGN KEY (FK_FormularioID) REFERENCES FormularioPrincipal(FormularioID)
);

CREATE TABLE Proyecto(
	ProyectoID 					INT 			NOT NULL AUTO_INCREMENT,
	nombreProyecto				VARCHAR(30)		NOT NULL,
	carenciaSocial				VARCHAR(30)		NOT NULL,
	objetivoDesarrolloSus		VARCHAR(50)		NOT NULL,
	temaConvocatoria			VARCHAR(150)	NOT NULL,
	temaDerechoSocial 			VARCHAR(50)		NOT NULL,
	problemaSocial				VARCHAR(300)	NOT NULL,
	objetivoGeneral				VARCHAR(150)	NOT NULL,
	descripcionProyecto			VARCHAR(500)	NOT NULL,
	criteriosIdentificar		VARCHAR(300)	NOT NULL,
	FK_FormularioID				INT 			NOT NULL,
	PRIMARY KEY (ProyectoID),
	FOREIGN KEY (FK_FormularioID) REFERENCES FormularioPrincipal(FormularioID)
);

CREATE TABLE RecursosComplementarios (
	RecursosID 					INT 			NOT NULL AUTO_INCREMENT,
	poblacion_0_4				INT 			NOT NULL,
	poblacion_5_14				INT 			NOT NULL,
	poblacion_15_29 			INT 			NOT NULL,
	poblacion_30_44 			INT 			NOT NULL,
	poblacion_45_64				INT 			NOT NULL,
	poblacion_65_mas			INT 			NOT NULL,
	esquemasRecursosComp		VARCHAR(2)		NOT NULL,
	organizacionManejoRecursos	VARCHAR(100)	NOT NULL,
	FK_FormularioID 			INT 			NOT NULL,
	PRIMARY KEY (RecursosID),
	FOREIGN KEY (FK_FormularioID) REFERENCES FormularioPrincipal(FormularioID)
);

CREATE TABLE DonatariaAutorizada (
	DonatariaID 			INT 			NOT NULL AUTO_INCREMENT,
	fechaDiario				DATE 			NOT NULL,
	numeroDiario			INT 			NOT NULL,
	detenidoAutorizado 		VARCHAR(2)		NOT NULL,
	razonDetenido 			VARCHAR(100)	NOT NULL,
	fechaAutorizada 		DATE 			NOT NULL,
	FK_FormularioID 		INT 			NOT NULL,
	PRIMARY KEY (DonatariaID),
	FOREIGN KEY (FK_FormularioID) REFERENCES FormularioPrincipal(FormularioID)
);

CREATE TABLE RegistroActaConstitutiva (
	ActaID 					INT 		NOT NULL AUTO_INCREMENT,
	numeroLibro				INT 		NOT NULL,
	numeroInscripcion 		INT 		NOT NULL,
	volumenICRESON 			INT 		NOT NULL,
	existenModis 			VARCHAR(2)	NOT NULL,
	ultimaModi				DATE 		NOT NULL,
	numeroActaConsti		INT 		NOT NULL,
	volumenActaConsti 		INT 		NOT NULL,
	FK_FormularioID			INT 		NOT NULL,
	PRIMARY KEY (ActaID),
	FOREIGN KEY (FK_FormularioID) REFERENCES FormularioPrincipal(FormularioID)
);

CREATE TABLE HistorialOrganizacion (
	HistorialID				int 			NOT NULL AUTO_INCREMENT,
	fechaConstitucionOSC	DATE 			NOT NULL,
	nombreNotario			VARCHAR(50)		NOT NULL,
	numeroNotario			VARCHAR(10)		NOT NULL,
	municipioNotaria		VARCHAR(30)		NOT NULL,
	noEstrituraPublica		VARCHAR(10) 	NOT NULL,
	volumenEstrituraPublica	VARCHAR(30)		NOT NULL,
	fechaEstritura			DATE 			NOT NULL,
	municipioRegistroOSC	VARCHAR(30)		NOT NULL,
	estaResideOSC			VARCHAR(30)		NOT NULL,
	muniResideOSC			VARCHAR(30) 	NOT NULL,
	principalesLogros		VARCHAR(300)	NOT NULL,
	metasOrganizacion		VARCHAR(300)	NOT NULL,
	autorizadaDeducible		VARCHAR(2)		NOT NULL,
	dirigidaPor				VARCHAR(20)		NOT NULL,
	nombreRepresentante		VARCHAR(50)		NOT NULL,
	idRepresentante			VARCHAR(10)		NOT NULL,
	nombrePresi				VARCHAR(50)		NOT NULL,
	nombreCoordi			VARCHAR(50)		NOT NULL,
	correoCoordinador		VARCHAR(30)		NOT NULL,
	cargoCoordinador		VARCHAR(30)		NOT NULL,
	numeroEmpleados			INT 			NOT NULL,
	numeroVoluntarios 		INT 			NOT NULL,
	principalesAlianzas		VARCHAR(300)	NOT NULL,
	numeroBeneficiarios		INT 			NOT NULL,
	observaciones32D		VARCHAR(2)		NOT NULL,
	tiempoYforma			VARCHAR(2)		NOT NULL,
	tieneAdeudos 			VARCHAR(2)		NOT NULL,
	inscritaDNIAS			VARCHAR(2)		NOT NULL,
	FK_FormularioID			INT 			NOT NULL,
	PRIMARY KEY (HistorialID),
	FOREIGN KEY (FK_FormularioID) REFERENCES FormularioPrincipal(FormularioID)
);

CREATE TABLE Domicilios (
	DomicilioID 		int 			NOT NULL AUTO_INCREMENT,
	calle				VARCHAR(50)		NOT NULL,
	numero 				VARCHAR(10) 	NOT NULL,
	colonia 			VARCHAR(30) 	NOT NULL,
	codigoPostal 		VARCHAR(10) 	NOT NULL,
	localidad 			VARCHAR(50) 	NOT NULL,
	municipio 			VARCHAR(50) 	NOT NULL,
	FK_FormularioID 	INT 			NOT NULL,
	PRIMARY KEY (DomicilioID),
	FOREIGN KEY (FK_FormularioID) REFERENCES FormularioPrincipal(FormularioID)
);