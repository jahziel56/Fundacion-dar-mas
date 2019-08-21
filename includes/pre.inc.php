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
    $CLUNI = $_POST['CLUNI'];
    $phoneOficina = $_POST['phoneOficina'];
    $phoneCelular = $_POST['phoneCelular'];



    $Correos_1 = $_POST['Correos_1'];
    $emailContacto = $_POST['emailContacto']; 
    $emailContacto .='@';
    $emailContacto .=$Correos_1;



    $paginaWeb = $_POST['paginaWeb'];
    $organizacionFB = $_POST['organizacionFB'];
    $organizacionTW = $_POST['organizacionTW'];
    $organizacionInsta = $_POST['organizacionInsta'];

    if (empty($organizacionTW)){
        $organizacionTW = 'Sin Twitter';
    }

    if (empty($organizacionInsta)){
        $organizacionInsta = 'Sin Instagram';
    }
    $Estado = 'Enviado';


        $sql = "INSERT INTO formularioprincipal (nombreOSC, objetoSocialOrganizacion, mision, vision, areasAtencion, rfcHomoclave, CLUNI, telefonoOficina, telefonoCelular, email, paginaWeb, organizacionFB, twitter, instagram, Id_Cuenta, Estado) 
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = mysqli_stmt_init($conn);
        mysqli_stmt_prepare($stmt, $sql);
        mysqli_stmt_bind_param($stmt, "ssssssssssssssis", $nombreOSC,$objetoSocialOrganizacion,$mision,$vision,$areasAtencion,$rfcHomoclave,$CLUNI,$phoneOficina,$phoneCelular,$emailContacto,$paginaWeb,$organizacionFB,$organizacionTW,$organizacionInsta,$_SESSION['user_Id'],$Estado);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        $ultimaID = mysqli_insert_id($conn);







    /* yyeee */

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
    $municipioRegistroOSC = $_POST['municipioRegistroOSC'];
    $estaResideOSC = $_POST['estaResideOSC']; /**/
    $muniResideOSC = $_POST['muniResideOSC']; /**/
    $principalesLogros = $_POST['principalesLogros'];
    $metasOrganización = $_POST['metasOrganización'];
    $autorizadaDeducible = $_POST['autorizadaDeducible'];
    $digiridaPor = $_POST['digiridaPor'];
    $nombreRepresentante = $_POST['nombreRepresentante'];
    $idRepresentante = $_POST['idRepresentante'];
    $nombrePresi = $_POST['nombrePresi'];
    $nombreCoordi = $_POST['nombreCoordi']; /**/
    
    $Correos_2 = $_POST['Correos_2']; /**/
    $correoCoordinador = $_POST['correoCoordinador']; 
    $correoCoordinador .='@';
    $correoCoordinador .=$Correos_2;

    $cargoCoordinador = $_POST['cargoCoordinador'];
    $numeroEmpleados = $_POST['numeroEmpleados'];
    $numeroVoluntarios = $_POST['numeroVoluntarios'];
    $principalesAlianzas = $_POST['principalesAlianzas'];
    $numeroBeneficiados = $_POST['numeroBeneficiados'];
    $observaciones32D = $_POST['observaciones32D'];
    $tiempoYforma = $_POST['tiempoYforma'];
    $tieneAdeudos = $_POST['tieneAdeudos'];
    $inscritaDNIAS = $_POST['inscritaDNIAS'];

        $sql = "INSERT INTO historialorganizacion (fechaConstitucionOSC,nombreNotario,numeroNotario,municipioNotaria,noEstrituraPublica,volumenEstrituraPublica,fechaEstritura,municipioRegistroOSC,  estaResideOSC,muniResideOSC,principalesLogros,metasOrganizacion,autorizadaDeducible,dirigidaPor,nombreRepresentante,idRepresentante,nombrePresi, nombreCoordi,correoCoordinador,cargoCoordinador,numeroEmpleados,numeroVoluntarios,principalesAlianzas,numeroBeneficiarios,observaciones32D,tiempoYforma, tieneAdeudos,inscritaDNIAS,FK_FormularioID) 
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
		$stmt = mysqli_stmt_init($conn);
		mysqli_stmt_prepare($stmt, $sql);
		mysqli_stmt_bind_param($stmt, "ssssssssssssssssssssiisissssi", $fechaConstitucionOSC, $nombreNotario, $numeroNotario, $municipioNotaria, $noEstrituraPublica,$volumenEstrituraPublica, $fechaEstritura, $municipioRegistroOSC,  $estaResideOSC, $muniResideOSC, $principalesLogros, $metasOrganización,$autorizadaDeducible, $digiridaPor, $nombreRepresentante, $idRepresentante, $nombrePresi, $nombreCoordi, $correoCoordinador, $cargoCoordinador,$numeroEmpleados, $numeroVoluntarios, $principalesAlianzas, $numeroBeneficiados, $observaciones32D, $tiempoYforma, $tieneAdeudos, $inscritaDNIAS,$ultimaID);
		mysqli_stmt_execute($stmt);
		$result = mysqli_stmt_get_result($stmt);



    $numeroLibro = $_POST['numeroLibro'];
    $numeroInscripcion = $_POST['numeroInscripcion'];
    $volumenICRESON = $_POST['volumenICRESON'];
    $existenModis = $_POST['existenModis'];
    $ultimaModi = $_POST['ultimaModi'];
    $numeroActaConsti = $_POST['numeroActaConsti'];
    $volumenActaConsti = $_POST['volumenActaConsti'];

    /* YEE */
        $sql = "INSERT INTO registroactaconstitutiva (numeroLibro, numeroInscripcion, volumenICRESON, existenModis, ultimaModi, numeroActaConsti, volumenActaConsti, FK_FormularioID) 
        VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
		$stmt = mysqli_stmt_init($conn);
		mysqli_stmt_prepare($stmt, $sql);
		mysqli_stmt_bind_param($stmt, "iiissiii", $numeroLibro,$numeroInscripcion,$volumenICRESON,$existenModis,$ultimaModi,$numeroActaConsti,$volumenActaConsti,$ultimaID);
		mysqli_stmt_execute($stmt);
		$result = mysqli_stmt_get_result($stmt);



    $fechaDiario = $_POST['fechaDiario'];
    $numeroDiario = $_POST['numeroDiario'];
    $detenidoAutorizado = $_POST['detenidoAutorizado'];
    $razonDetenido = $_POST['razonDetenido'];
    $fechaAutorizada = $_POST['fechaAutorizada'];

        $sql = "INSERT INTO donatariaAutorizada (fechaDiario, numeroDiario, detenidoAutorizado, razonDetenido, fechaAutorizada, FK_FormularioID) 
        VALUES (?, ?, ?, ?, ?, ?)";
		$stmt = mysqli_stmt_init($conn);
		mysqli_stmt_prepare($stmt, $sql);
		mysqli_stmt_bind_param($stmt, "sisssi",$fechaDiario,$numeroDiario,$detenidoAutorizado,$razonDetenido,$fechaAutorizada,$ultimaID);
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


        $sql = "INSERT INTO recursoscomplementarios (poblacion_0_4, poblacion_5_14, poblacion_15_29, poblacion_30_44, poblacion_45_64, poblacion_65_mas, esquemasRecursosComp, organizacionManejoRecursos, FK_FormularioID) 
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
		$stmt = mysqli_stmt_init($conn);
		mysqli_stmt_prepare($stmt, $sql);
		mysqli_stmt_bind_param($stmt, "iiiiiissi",$poblacion_0_4,$poblacion_5_14,$poblacion_15_29,$poblacion_30_44,$poblacion_45_64,$poblacion_65_mas,$esquemasRecursosComp,$organizacionManejoRecursos,$ultimaID);
		mysqli_stmt_execute($stmt);
		$result = mysqli_stmt_get_result($stmt);


    $nameFileRFC = $_FILES['files']['name'][0];
    $tipoFileRFC = $_FILES['files']['type'][0];
    $fileRFC = file_get_contents($_FILES['files']['tmp_name'][0]);    
    $nameFileCLUNI = $_FILES['files']['name'][1];
    $tipoFileCLUNI = $_FILES['files']['type'][1];
    $fileCLUNI = file_get_contents($_FILES['files']['tmp_name'][1]);
    $nameFileActaConst = $_FILES['files']['name'][2];
    $tipoFileActaConst = $_FILES['files']['type'][2];
    $fileActaConst = file_get_contents($_FILES['files']['tmp_name'][2]);
    $nameFileActaProtoco= $_FILES['files']['name'][3];
    $tipoFileActaProtoco = $_FILES['files']['type'][3];
    $fileActaProtoco = file_get_contents($_FILES['files']['tmp_name'][3]);
    $nameFileINERepre = $_FILES['files']['name'][4];
    $tipoFileINERepre = $_FILES['files']['type'][4];
    $fileINERepre = file_get_contents($_FILES['files']['tmp_name'][4]);
    $nameFileINECoordi = $_FILES['files']['name'][5];
    $tipoFileINECoordi = $_FILES['files']['type'][5];
    $fileINECoordi =  file_get_contents($_FILES['files']['tmp_name'][5]);
    $nameFile32D = $_FILES['files']['name'][6];
    $tipoFile32D = $_FILES['files']['type'][6];
    $file32D = file_get_contents($_FILES['files']['tmp_name'][6]);
    $nameFileF21 = $_FILES['files']['name'][7];
    $tipoFileF21 = $_FILES['files']['type'][7];
    $fileF21 = file_get_contents($_FILES['files']['tmp_name'][7]);
    $nameFileConstanciaFiscal = $_FILES['files']['name'][8];
    $tipoFileConstanciaFiscal = $_FILES['files']['type'][8];
    $fileConstanciaFiscal = file_get_contents($_FILES['files']['tmp_name'][8]);
    $nameFileComprobanteBanco = $_FILES['files']['name'][9];
    $tipoFileComprobanteBanco = $_FILES['files']['type'][9];
    $fileComprobanteBanco = file_get_contents($_FILES['files']['tmp_name'][9]);
    $nameFileFacturaCancelada = $_FILES['files']['name'][10];
    $tipoFileFacturaCancelada = $_FILES['files']['type'][10];
    $fileFacturaCancelada = file_get_contents($_FILES['files']['tmp_name'][10]);
    $nameFileDNIAS= $_FILES['files']['name'][11];
    $tipoFileDNIAS = $_FILES['files']['type'][11];
    $fileDNIAS = file_get_contents($_FILES['files']['tmp_name'][11]);
    $nameFileRPPIcreson= $_FILES['files']['name'][12];
    $tipoFileRPPIcreson = $_FILES['files']['type'][12];
    $fileRPPIcreson = file_get_contents($_FILES['files']['tmp_name'][12]);
    $nameFileUltimaActa= $_FILES['files']['name'][13];
    $tipoFileUltimaActa = $_FILES['files']['type'][13];
    $fileUltimaActa = file_get_contents($_FILES['files']['tmp_name'][13]);
    $nameFileRPPUltimaActa= $_FILES['files']['name'][14];
    $tipoFileRPPUltimaActa = $_FILES['files']['type'][14];
    $fileRPPUltimaActa = file_get_contents($_FILES['files']['tmp_name'][14]);
    $nameFilePaginaDiario = $_FILES['files']['name'][15];
    $tipoFilePaginaDiario = $_FILES['files']['type'][15];
    $filePaginaDiario = file_get_contents($_FILES['files']['tmp_name'][15]);

        $Name_Archivo = 'file_rfc';

        $sql = "INSERT INTO formularioarchivos (nombreSeccion, nombreArchivo, tipoArchivo, dataArchivo, FK_FormularioID) 
        VALUES (?, ?, ?, ?, ?)";
        $stmt = mysqli_stmt_init($conn);
        mysqli_stmt_prepare($stmt, $sql);
        mysqli_stmt_bind_param($stmt, "ssssi",$Name_Archivo,$nameFileRFC,$tipoFileRFC,$fileRFC,$ultimaID);
        mysqli_stmt_execute($stmt);

        $Name_Archivo = 'file_cluni';

        $sql = "INSERT INTO formularioarchivos (nombreSeccion, nombreArchivo, tipoArchivo, dataArchivo, FK_FormularioID) 
        VALUES (?, ?, ?, ?, ?)";
        $stmt = mysqli_stmt_init($conn);
        mysqli_stmt_prepare($stmt, $sql);
        mysqli_stmt_bind_param($stmt, "ssssi",$Name_Archivo,$nameFileCLUNI,$tipoFileCLUNI,$fileCLUNI,$ultimaID);
        mysqli_stmt_execute($stmt);

 
        $Name_Archivo = 'file_acta_const';

        $sql = "INSERT INTO formularioarchivos (nombreSeccion, nombreArchivo, tipoArchivo, dataArchivo, FK_FormularioID) 
        VALUES (?, ?, ?, ?, ?)";
        $stmt = mysqli_stmt_init($conn);
        mysqli_stmt_prepare($stmt, $sql);
        mysqli_stmt_bind_param($stmt, "ssssi",$Name_Archivo,$nameFileActaConst,$tipoFileActaConst,$fileActaConst,$ultimaID);
        mysqli_stmt_execute($stmt);

        $Name_Archivo = 'file_acta_protoco';

        $sql = "INSERT INTO formularioarchivos (nombreSeccion, nombreArchivo, tipoArchivo, dataArchivo, FK_FormularioID) 
        VALUES (?, ?, ?, ?, ?)";
        $stmt = mysqli_stmt_init($conn);
        mysqli_stmt_prepare($stmt, $sql);
        mysqli_stmt_bind_param($stmt, "ssssi",$Name_Archivo,$nameFileActaProtoco,$tipoFileActaProtoco,$fileActaProtoco,$ultimaID);
        mysqli_stmt_execute($stmt);

        $Name_Archivo = 'file_ine_repre';

        $sql = "INSERT INTO formularioarchivos (nombreSeccion, nombreArchivo, tipoArchivo, dataArchivo, FK_FormularioID) 
        VALUES (?, ?, ?, ?, ?)";
        $stmt = mysqli_stmt_init($conn);
        mysqli_stmt_prepare($stmt, $sql);
        mysqli_stmt_bind_param($stmt, "ssssi",$Name_Archivo,$nameFileINERepre,$tipoFileINERepre,$fileINERepre,$ultimaID);
        mysqli_stmt_execute($stmt);

        $Name_Archivo = 'file_ine_coordi';

        $sql = "INSERT INTO formularioarchivos (nombreSeccion, nombreArchivo, tipoArchivo, dataArchivo, FK_FormularioID) 
        VALUES (?, ?, ?, ?, ?)";
        $stmt = mysqli_stmt_init($conn);
        mysqli_stmt_prepare($stmt, $sql);
        mysqli_stmt_bind_param($stmt, "ssssi",$Name_Archivo,$nameFileINECoordi,$tipoFileINECoordi,$fileINECoordi,$ultimaID);
        mysqli_stmt_execute($stmt);

        $Name_Archivo = 'file_32_d';

        $sql = "INSERT INTO formularioarchivos (nombreSeccion, nombreArchivo, tipoArchivo, dataArchivo, FK_FormularioID) 
        VALUES (?, ?, ?, ?, ?)";
        $stmt = mysqli_stmt_init($conn);
        mysqli_stmt_prepare($stmt, $sql);
        mysqli_stmt_bind_param($stmt, "ssssi",$Name_Archivo,$nameFile32D,$tipoFile32D,$file32D,$ultimaID);
        mysqli_stmt_execute($stmt);

        $Name_Archivo = 'file_f_21';

        $sql = "INSERT INTO formularioarchivos (nombreSeccion, nombreArchivo, tipoArchivo, dataArchivo, FK_FormularioID) 
        VALUES (?, ?, ?, ?, ?)";
        $stmt = mysqli_stmt_init($conn);
        mysqli_stmt_prepare($stmt, $sql);
        mysqli_stmt_bind_param($stmt, "ssssi",$Name_Archivo,$nameFileF21,$tipoFileF21,$fileF21,$ultimaID);
        mysqli_stmt_execute($stmt);

        $Name_Archivo = 'file_constancia_fiscal';

        $sql = "INSERT INTO formularioarchivos (nombreSeccion, nombreArchivo, tipoArchivo, dataArchivo, FK_FormularioID) 
        VALUES (?, ?, ?, ?, ?)";
        $stmt = mysqli_stmt_init($conn);
        mysqli_stmt_prepare($stmt, $sql);
        mysqli_stmt_bind_param($stmt, "ssssi",$Name_Archivo,$nameFileConstanciaFiscal,$tipoFileConstanciaFiscal,$fileConstanciaFiscal,$ultimaID);
        mysqli_stmt_execute($stmt);

        $Name_Archivo = 'file_comprobante_banco';

        $sql = "INSERT INTO formularioarchivos (nombreSeccion, nombreArchivo, tipoArchivo, dataArchivo, FK_FormularioID) 
        VALUES (?, ?, ?, ?, ?)";
        $stmt = mysqli_stmt_init($conn);
        mysqli_stmt_prepare($stmt, $sql);
        mysqli_stmt_bind_param($stmt, "ssssi",$Name_Archivo,$nameFileComprobanteBanco,$tipoFileComprobanteBanco,$fileComprobanteBanco,$ultimaID);
        mysqli_stmt_execute($stmt);

        $Name_Archivo = 'file_factura_cancelada';

        $sql = "INSERT INTO formularioarchivos (nombreSeccion, nombreArchivo, tipoArchivo, dataArchivo, FK_FormularioID) 
        VALUES (?, ?, ?, ?, ?)";
        $stmt = mysqli_stmt_init($conn);
        mysqli_stmt_prepare($stmt, $sql);
        mysqli_stmt_bind_param($stmt, "ssssi",$Name_Archivo,$nameFileFacturaCancelada,$tipoFileFacturaCancelada,$fileFacturaCancelada,$ultimaID);
        mysqli_stmt_execute($stmt);

        $Name_Archivo = 'file_dnias';

        $sql = "INSERT INTO formularioarchivos (nombreSeccion, nombreArchivo, tipoArchivo, dataArchivo, FK_FormularioID) 
        VALUES (?, ?, ?, ?, ?)";
        $stmt = mysqli_stmt_init($conn);
        mysqli_stmt_prepare($stmt, $sql);
        mysqli_stmt_bind_param($stmt, "ssssi",$Name_Archivo,$nameFileDNIAS,$tipoFileDNIAS,$fileDNIAS,$ultimaID);
        mysqli_stmt_execute($stmt);

        $Name_Archivo = 'file_rpp_icreson';

        $sql = "INSERT INTO formularioarchivos (nombreSeccion, nombreArchivo, tipoArchivo, dataArchivo, FK_FormularioID) 
        VALUES (?, ?, ?, ?, ?)";
        $stmt = mysqli_stmt_init($conn);
        mysqli_stmt_prepare($stmt, $sql);
        mysqli_stmt_bind_param($stmt, "ssssi",$Name_Archivo,$nameFileRPPIcreson,$tipoFileRPPIcreson,$fileRPPIcreson,$ultimaID);
        mysqli_stmt_execute($stmt);

        $Name_Archivo = 'file_ultima_acta';

        $sql = "INSERT INTO formularioarchivos (nombreSeccion, nombreArchivo, tipoArchivo, dataArchivo, FK_FormularioID) 
        VALUES (?, ?, ?, ?, ?)";
        $stmt = mysqli_stmt_init($conn);
        mysqli_stmt_prepare($stmt, $sql);
        mysqli_stmt_bind_param($stmt, "ssssi",$Name_Archivo,$nameFileUltimaActa,$tipoFileUltimaActa,$fileUltimaActa,$ultimaID);
        mysqli_stmt_execute($stmt);

        $Name_Archivo = 'file_rpp_ultima_acta';

        $sql = "INSERT INTO formularioarchivos (nombreSeccion, nombreArchivo, tipoArchivo, dataArchivo, FK_FormularioID) 
        VALUES (?, ?, ?, ?, ?)";
        $stmt = mysqli_stmt_init($conn);
        mysqli_stmt_prepare($stmt, $sql);
        mysqli_stmt_bind_param($stmt, "ssssi",$Name_Archivo,$nameFileRPPUltimaActa,$tipoFileRPPUltimaActa,$fileRPPUltimaActa,$ultimaID);
        mysqli_stmt_execute($stmt);

        $Name_Archivo = 'file_pagina_diario';

        $sql = "INSERT INTO formularioarchivos (nombreSeccion, nombreArchivo, tipoArchivo, dataArchivo, FK_FormularioID) 
        VALUES (?, ?, ?, ?, ?)";
        $stmt = mysqli_stmt_init($conn);
        mysqli_stmt_prepare($stmt, $sql);
        mysqli_stmt_bind_param($stmt, "ssssi",$Name_Archivo,$nameFilePaginaDiario,$tipoFilePaginaDiario,$filePaginaDiario,$ultimaID);
        mysqli_stmt_execute($stmt);





    header("Location: ../index.php");
	exit();
}
else{
	header("Location: ../index.php");
	exit();		
}