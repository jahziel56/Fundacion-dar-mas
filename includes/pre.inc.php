<?php
/* METODO: evitar que el usuario ingrese a esta pagina php desde la barra de busqueda */
/* signup-submit es el boton del formulario que se encuentra en la signup.php */

if (isset($_POST['pre-submit'])) {
	/* manda a llamar a la pagina php donde se conecta a la base de datos de esta forma se ahorra codigo y se tiene todo en una funcion mas simple */
	require 'dbh.inc.php';	
	session_start();



    $nombreOSC = $_POST['nombreOSC'];
    $objetoSocialOrganizacion = $_POST['objetoSocialOrganizacion'];
    $mision = $_POST['mision'];
    $vision = $_POST['vision'];
    $areasAtencion = $_POST['areasAtencion'];
    $rfcHomoclave = $_POST['rfcHomoclave'];
    #fileRFC
    $CLUNI = $_POST['CLUNI'];
    #fileCLUNI
    $phoneOficina = $_POST['phoneOficina'];
    $phoneCelular = $_POST['phoneCelular'];
    $emailContacto = $_POST['emailContacto'];
    $paginaWeb = $_POST['paginaWeb'];
    $organizacionFB = $_POST['organizacionFB'];
    $organizacionTW = $_POST['organizacionTW'];
    $organizacionInsta = $_POST['organizacionInsta'];

    /* yyeee */

    $sql = "INSERT INTO FormularioPrincipal (nombreOSC, objetoSocialOrganizacion, mision, vision, areasAtencion, rfcHomoclave, CLUNI, telefonoOficina, telefonoCelular, email, paginaWeb, organizacionFB, twitter, instagram, Id_Cuenta) 
    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = mysqli_stmt_init($conn);
    mysqli_stmt_prepare($stmt, $sql);
    mysqli_stmt_bind_param($stmt, "ssssssssssssssi", $nombreOSC,$objetoSocialOrganizacion,$mision,$vision,$areasAtencion,$rfcHomoclave,$CLUNI,$phoneOficina,$phoneCelular,$emailContacto,$paginaWeb,$organizacionFB,$organizacionTW,$organizacionInsta,$_SESSION['user_Id']);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $ultimaID = mysqli_insert_id($conn);
    echo $ultimaID;



    $calle = $_POST['calle'];
    $numero = $_POST['numero'];
    $colonia = $_POST['colonia'];
    $codigoPostal = $_POST['codigoPostal'];
    $localidad = $_POST['localidad'];
    $municipio = $_POST['municipio'];
    
    /* yyeee */
        $sql = "INSERT INTO domicilios (calle, numero, colonia, codigoPostal, localidad, municipio, FK_FormularioID) 
        VALUES (?, ?, ?, ?, ?, ?, ?)";        
		$stmt = mysqli_stmt_init($conn);
		mysqli_stmt_prepare($stmt, $sql);
		mysqli_stmt_bind_param($stmt, "ssssssi",$calle,$numero,$colonia,$codigoPostal,$localidad,$municipio,$ultimaID);
		mysqli_stmt_execute($stmt);
		$result = mysqli_stmt_get_result($stmt);



    $fechaConstitucionOSC = $_POST['fechaConstitucionOSC'];
    $nombreNotario = $_POST['nombreNotario'];
    $numeroNotario = $_POST['numeroNotario'];
    $municipioNotaria = $_POST['municipioNotaria'];
    $noEstrituraPublica = $_POST['noEstrituraPublica'];
    $volumenEstrituraPublica = $_POST['volumenEstrituraPublica'];
    $fechaEstritura = $_POST['fechaEstritura'];
    #fileActaConst
    #fileActaProtoco
    $municipioRegistroOSC = $_POST['municipioRegistroOSC'];
    $estaResideOSC = $_POST['estaResideOSC'];
    $muniResideOSC = $_POST['muniResideOSC'];
    $principalesLogros = $_POST['principalesLogros'];
    $metasOrganización = $_POST['metasOrganización'];
    $autorizadaDeducible = $_POST['autorizadaDeducible'];
    $digiridaPor = $_POST['digiridaPor'];
    $nombreRepresentante = $_POST['nombreRepresentante'];
    $idRepresentante = $_POST['idRepresentante'];
    #fileINERepre
    $nombrePresi = $_POST['nombrePresi'];
    $nombreCoordi = $_POST['nombreCoordi'];
    #fileINECoordi
    $correoCoordinador = $_POST['correoCoordinador'];
    $cargoCoordinador = $_POST['cargoCoordinador'];
    $numeroEmpleados = $_POST['numeroEmpleados'];
    $numeroVoluntarios = $_POST['numeroVoluntarios'];
    $principalesAlianzas = $_POST['principalesAlianzas'];
    $numeroBeneficiados = $_POST['numeroBeneficiados'];
    $observaciones32D = $_POST['observaciones32D'];
    #file32D
    $tiempoYforma = $_POST['tiempoYforma'];
    $tieneAdeudos = $_POST['tieneAdeudos'];
    #fileF21
    #fileConstanciaFiscal
    #fileComprobanteBanco
    #fileFacturaCancelada
    $inscritaDNIAS = $_POST['inscritaDNIAS'];
    #fileDNIAS

        $sql = "INSERT INTO historialorganizacion (fechaConstitucionOSC,nombreNotario,numeroNotario,municipioNotaria,noEstrituraPublica,volumenEstrituraPublica,fechaEstritura,municipioRegistroOSC,  estaResideOSC,muniResideOSC,principalesLogros,metasOrganizacion,autorizadaDeducible,dirigidaPor,nombreRepresentante,idRepresentante,nombrePresi, nombreCoordi,correoCoordinador,cargoCoordinador,numeroEmpleados,numeroVoluntarios,principalesAlianzas,numeroBeneficiarios,observaciones32D,tiempoYforma, tieneAdeudos,inscritaDNIAS,FK_FormularioID) 
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
		$stmt = mysqli_stmt_init($conn);
		mysqli_stmt_prepare($stmt, $sql);
		mysqli_stmt_bind_param($stmt, "isssssisssssssssssssiisissssi", $fechaConstitucionOSC, $nombreNotario, $numeroNotario, $municipioNotaria, $noEstrituraPublica,$volumenEstrituraPublica, $fechaEstritura, $municipioRegistroOSC,  $estaResideOSC, $muniResideOSC, $principalesLogros, $metasOrganización,$autorizadaDeducible, $digiridaPor, $nombreRepresentante, $idRepresentante, $nombrePresi, $nombreCoordi, $correoCoordinador, $cargoCoordinador,$numeroEmpleados, $numeroVoluntarios, $principalesAlianzas, $numeroBeneficiados, $observaciones32D, $tiempoYforma, $tieneAdeudos, $inscritaDNIAS,$ultimaID);
		mysqli_stmt_execute($stmt);
		$result = mysqli_stmt_get_result($stmt);



    $numeroLibro = $_POST['numeroLibro'];
    $numeroInscripcion = $_POST['numeroInscripcion'];
    $volumenICRESON = $_POST['volumenICRESON'];
    #fileRPPIcreson
    $existenModis = $_POST['existenModis'];
    $ultimaModi = $_POST['ultimaModi'];
    $numeroActaConsti = $_POST['numeroActaConsti'];
    $volumenActaConsti = $_POST['volumenActaConsti'];
    #fileUltimaActa
    #fileRPPUltimaActa

    /* YEE */
        $sql = "INSERT INTO registroactaconstitutiva (numeroLibro, numeroInscripcion, volumenICRESON, existenModis, ultimaModi, numeroActaConsti, volumenActaConsti, FK_FormularioID) 
        VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
		$stmt = mysqli_stmt_init($conn);
		mysqli_stmt_prepare($stmt, $sql);
		mysqli_stmt_bind_param($stmt, "iiisiiii", $numeroLibro,$numeroInscripcion,$volumenICRESON,$existenModis,$ultimaModi,$numeroActaConsti,$volumenActaConsti,$ultimaID);
		mysqli_stmt_execute($stmt);
		$result = mysqli_stmt_get_result($stmt);



    $fechaDiario = $_POST['fechaDiario'];
    $numeroDiario = $_POST['numeroDiario'];
    #filePaginaDiario
    $detenidoAutorizado = $_POST['detenidoAutorizado'];
    $razonDetenido = $_POST['razonDetenido'];
    $fechaAutorizada = $_POST['fechaAutorizada'];

        $sql = "INSERT INTO DonatariaAutorizada (fechaDiario, numeroDiario, detenidoAutorizado, razonDetenido, fechaAutorizada, FK_FormularioID) 
        VALUES (?, ?, ?, ?, ?, ?)";
		$stmt = mysqli_stmt_init($conn);
		mysqli_stmt_prepare($stmt, $sql);
		mysqli_stmt_bind_param($stmt, "iissii",$fechaDiario,$numeroDiario,$detenidoAutorizado,$razonDetenido,$fechaAutorizada,$ultimaID);
		mysqli_stmt_execute($stmt);
		$result = mysqli_stmt_get_result($stmt);



    $poblacion_0_4 = $_POST['poblacion_0_4'];
    $poblacion_5_14 = $_POST['poblacion_5_14'];
    $poblacion_15_29 = $_POST['poblacion_15_29'];
    $poblacion_30_44 = $_POST['poblacion_30_44'];
    $poblacion_45_64 = $_POST['poblacion_45_64'];
    $poblacion_65_mas = $_POST['poblacion_65_mas'];
    $esquemasRecursosComp = $_POST['esquemasRecursosComp'];
    $organizacionManejoRecursos = $_POST['organizacionManejoRecursos'];


        $sql = "INSERT INTO RecursosComplementarios (poblacion_0_4, poblacion_5_14, poblacion_15_29, poblacion_30_44, poblacion_45_64, poblacion_65_mas, esquemasRecursosComp, organizacionManejoRecursos, FK_FormularioID) 
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
		$stmt = mysqli_stmt_init($conn);
		mysqli_stmt_prepare($stmt, $sql);
		mysqli_stmt_bind_param($stmt, "iiiiiissi",$poblacion_0_4,$poblacion_5_14,$poblacion_15_29,$poblacion_30_44,$poblacion_45_64,$poblacion_65_mas,$esquemasRecursosComp,$organizacionManejoRecursos,$ultimaID);
		mysqli_stmt_execute($stmt);
		$result = mysqli_stmt_get_result($stmt);


		$_SESSION['Type_User'] = 2;

	
	require '../Pre-Registro_Ver.php';
}
else{
	header("Location: ../index.php");
	exit();		
}