<?php
/* METODO: evitar que el usuario ingrese a esta pagina php desde la barra de busqueda */
/* signup-submit es el boton del formulario que se encuentra en la signup.php */
	require 'includes/dbh.inc.php';	

    //-------------------- Obtener el id a ver

    $ID_Selected = isset($_GET['id'])? $_GET['id'] : "";


    //-------------------- Formulario

    $sql = "SELECT * FROM formularioPrincipal WHERE FormularioID=?;";
    $stmt = mysqli_stmt_init($conn);
    mysqli_stmt_prepare($stmt, $sql);
    mysqli_stmt_bind_param($stmt, "i", $ID_Selected);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $row = mysqli_fetch_assoc($result);

    $nombreOSC = $row['nombreOSC'];
    $objetoSocialOrganizacion = $row['objetoSocialOrganizacion'];
    $mision = $row['mision'];
    $vision = $row['vision'];
    $areasAtencion = $row['areasAtencion'];
    $rfcHomoclave = $row['rfcHomoclave'];
    #fileRFC
    $CLUNI = $row['CLUNI'];
    #fileCLUNI
    $phoneOficina = $row['telefonoOficina'];
    $phoneCelular = $row['telefonoCelular'];
    $emailContacto = $row['email'];
    $paginaWeb = $row['paginaWeb'];
    $organizacionFB = $row['organizacionFB'];
    $organizacionTW = $row['twitter'];
    $organizacionInsta = $row['instagram'];

    //-------------------- DOMICILIOS

    $sql = "SELECT * FROM domicilios WHERE FK_FormularioID=?;";
    $stmt = mysqli_stmt_init($conn);
    mysqli_stmt_prepare($stmt, $sql);
    mysqli_stmt_bind_param($stmt, "i", $ID_Selected);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $row = mysqli_fetch_assoc($result);

    $calle = $row['calle'];
    $numero = $row['numero'];
    $colonia = $row['colonia'];
    $codigoPostal = $row['codigoPostal'];
    $localidad = $row['localidad'];
    $municipio = $row['municipio'];
    
    //-------------------- historialorganizacion

    $sql = "SELECT * FROM historialorganizacion WHERE FK_FormularioID=?;";
    $stmt = mysqli_stmt_init($conn);
    mysqli_stmt_prepare($stmt, $sql);
    mysqli_stmt_bind_param($stmt, "i", $ID_Selected);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $row = mysqli_fetch_assoc($result);

    $fechaConstitucionOSC = $row['fechaConstitucionOSC'];
    $nombreNotario = $row['nombreNotario'];
    $numeroNotario = $row['numeroNotario'];
    $municipioNotaria = $row['municipioNotaria'];
    $noEstrituraPublica = $row['noEstrituraPublica'];
    $volumenEstrituraPublica = $row['volumenEstrituraPublica'];
    $fechaEstritura = $row['fechaEstritura'];
    #fileActaConst
    #fileActaProtoco
    $municipioRegistroOSC = $row['municipioRegistroOSC'];
    $estaResideOSC = $row['estaResideOSC'];
    $muniResideOSC = $row['muniResideOSC'];
    $principalesLogros = $row['principalesLogros'];
    $metasOrganización = $row['metasOrganizacion'];
    $autorizadaDeducible = $row['autorizadaDeducible'];
    $digiridaPor = $row['dirigidaPor'];
    $nombreRepresentante = $row['nombreRepresentante'];
    $idRepresentante = $row['idRepresentante'];
    #fileINERepre
    $nombrePresi = $row['nombrePresi'];
    $nombreCoordi = $row['nombreCoordi'];
    #fileINECoordi
    $correoCoordinador = $row['correoCoordinador'];
    $cargoCoordinador = $row['cargoCoordinador'];
    $numeroEmpleados = $row['numeroEmpleados'];
    $numeroVoluntarios = $row['numeroVoluntarios'];
    $principalesAlianzas = $row['principalesAlianzas'];
    $numeroBeneficiados = $row['numeroBeneficiarios'];
    $observaciones32D = $row['observaciones32D'];
    #file32D
    $tiempoYforma = $row['tiempoYforma'];
    $tieneAdeudos = $row['tieneAdeudos'];
    #fileF21
    #fileConstanciaFiscal
    #fileComprobanteBanco
    #fileFacturaCancelada
    $inscritaDNIAS = $row['inscritaDNIAS'];
    #fileDNIAS

    //-------------------- registroactaconstitutiva

    $sql = "SELECT * FROM registroactaconstitutiva WHERE FK_FormularioID=?;";
    $stmt = mysqli_stmt_init($conn);
    mysqli_stmt_prepare($stmt, $sql);
    mysqli_stmt_bind_param($stmt, "i", $ID_Selected);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $row = mysqli_fetch_assoc($result);


    $numeroLibro = $row['numeroLibro'];
    $numeroInscripcion = $row['numeroInscripcion'];
    $volumenICRESON = $row['volumenICRESON'];
    #fileRPPIcreson
    $existenModis = $row['existenModis'];
    $ultimaModi = $row['ultimaModi'];
    $numeroActaConsti = $row['numeroActaConsti'];
    $volumenActaConsti = $row['volumenActaConsti'];
    #fileUltimaActa
    #fileRPPUltimaActa

    //-------------------- registroactaconstitutiva

    $sql = "SELECT * FROM donatariaAutorizada WHERE FK_FormularioID=?;";
    $stmt = mysqli_stmt_init($conn);
    mysqli_stmt_prepare($stmt, $sql);
    mysqli_stmt_bind_param($stmt, "i", $ID_Selected);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $row = mysqli_fetch_assoc($result);


    $fechaDiario = $row['fechaDiario'];
    $numeroDiario = $row['numeroDiario'];
    #filePaginaDiario
    $detenidoAutorizado = $row['detenidoAutorizado'];
    $razonDetenido = $row['razonDetenido'];
    $fechaAutorizada = $row['fechaAutorizada'];


    //-------------------- registroactaconstitutiva

    $sql = "SELECT * FROM recursosComplementarios WHERE FK_FormularioID=?;";
    $stmt = mysqli_stmt_init($conn);
    mysqli_stmt_prepare($stmt, $sql);
    mysqli_stmt_bind_param($stmt, "i", $ID_Selected);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $row = mysqli_fetch_assoc($result);

    $poblacion_0_4 = $row['poblacion_0_4'];
    $poblacion_5_14 = $row['poblacion_5_14'];
    $poblacion_15_29 = $row['poblacion_15_29'];
    $poblacion_30_44 = $row['poblacion_30_44'];
    $poblacion_45_64 = $row['poblacion_45_64'];
    $poblacion_65_mas = $row['poblacion_65_mas'];
    $esquemasRecursosComp = $row['esquemasRecursosComp'];
    $organizacionManejoRecursos = $row['organizacionManejoRecursos'];

    require"classes/Pre_Registro_Ver.php";


	exit();

