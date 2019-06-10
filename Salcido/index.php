<?php

#Se inicializan las variables de error y éxito
$errores = '';
$enviado = '';

#Si se envió submit
if(isset($_POST['submit'])) {
    #Se extrae el valor de submit y se agrega a variables
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

    $calle = $_POST['calle'];
    $numero = $_POST['numero'];
    $colonia = $_POST['colonia'];
    $codigoPostal = $_POST['codigoPostal'];
    $localidad = $_POST['localidad'];
    $municipio = $_POST['municipio'];

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

    $fechaDiario = $_POST['fechaDiario'];
    $numeroDiario = $_POST['numeroDiario'];
    #filePaginaDiario
    $detenidoAutorizado = $_POST['detenidoAutorizado'];
    $razonDetenido = $_POST['razonDetenido'];
    $fechaAutorizada = $_POST['fechaAutorizada'];

    $poblacion_0_4 = $_POST['poblacion_0_4'];
    $poblacion_5_14 = $_POST['poblacion_5_14'];
    $poblacion_15_29 = $_POST['poblacion_15_29'];
    $poblacion_30_44 = $_POST['poblacion_30_44'];
    $poblacion_45_64 = $_POST['poblacion_45_64'];
    $poblacion_65_mas = $_POST['poblacion_65_mas'];
    $esquemasRecursosComp = $_POST['esquemasRecursosComp'];
    $organizacionManejoRecursos = $_POST['organizacionManejoRecursos'];

    $nombreProyecto = $_POST['nombreProyecto'];
    $carenciaSocial = $_POST['carenciaSocial'];
    $objetivoDesarrolloSus = $_POST['objetivoDesarrolloSus'];
    $temaConvocatoria = $_POST['temaConvocatoria'];
    $temaDerechoSocial = $_POST['temaDerechoSocial'];
    $problemaSocial = $_POST['problemaSocial'];
    $objetivoGeneral = $_POST['objetivoGeneral'];
    $descripcionProyecto = $_POST['descripcionProyecto'];
    $criteriosIdentificar = $_POST['criteriosIdentificar'];

    $primerMeta = $_POST['primerMeta'];
    $tipoProductoUno = $_POST['tipoProductoUno'];
    $segundaMeta = $_POST['segundaMeta'];
    $tipoProductoDos = $_POST['tipoProductoDos'];
    $terceraMeta = $_POST['terceraMeta'];
    $tipoProductoDos = $_POST['tipoProductoDos'];

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

    try {
        $conexion = new PDO('mysql:host=localhost;dbname=SistemaDarMas', 'root', '');
        $setNames = $conexion->prepare("SET NAMES 'utf8'");
        $setNames->execute();

        #Se prepara la query para insertar los datos pertinentes a la tabla FormularioPrincipal
        $insertarFormularioPrincipal = $conexion->prepare("INSERT INTO FormularioPrincipal VALUES(null,'" . $nombreOSC . "','" . $objetoSocialOrganizacion . "','" . $mision . "','" . $vision . "','" . $areasAtencion . "','" . $rfcHomoclave . "','" . $CLUNI. "','" . $phoneOficina . "','" . $phoneCelular . "','" . $emailContacto . "','" . $paginaWeb . "','" . $organizacionFB . "','" . $organizacionTW . "','" . $organizacionInsta . "')");
        $insertarFormularioPrincipal->execute();
        
        #Se obtiene la última ID principal insertada
        $ultimaID= $conexion->lastInsertId();

        #Se prepara la query para insertar los datos pertinentes a la tabla Domicilios
        $insertarDomicilio = $conexion->prepare("INSERT INTO Domicilios VALUES (NULL,'". $calle ."','" . $numero . "','" . $colonia . "','" . $codigoPostal . "','" . $localidad . "','" . $municipio . "','" . $ultimaID ."')");
        $insertarDomicilio->execute();

        #Se prepara la query para insertar los datos pertinentes a la tabla HistorialOrganizacion
        $insertarHistorialOrganizacion = $conexion->prepare("INSERT INTO HistorialOrganizacion VALUES (NULL,'" .$fechaConstitucionOSC. "','" . $nombreNotario . "','" . $numeroNotario . "','" . $municipioNotaria . "','" . $noEstrituraPublica . "','" . $volumenEstrituraPublica . "','" . $fechaEstritura . "','". $municipioRegistroOSC . "','" . $estaResideOSC . "','" . $muniResideOSC . "','" . $principalesLogros . "','" . $metasOrganización . "','" . $autorizadaDeducible . "','" . $digiridaPor . "','" . $nombreRepresentante . "','" . $idRepresentante . "','" . $nombrePresi . "','" . $nombreCoordi . "','" . $correoCoordinador . "','" . $cargoCoordinador . "','" . $numeroEmpleados . "','" . $numeroVoluntarios . "','" . $principalesAlianzas . "','" . $numeroBeneficiados . "','" . $observaciones32D . "','" . $tiempoYforma . "','" . $tieneAdeudos . "','" . $inscritaDNIAS . "','" . $ultimaID . "')");
        $insertarHistorialOrganizacion->execute();

        #Se prepara la query para insertar los datos pertinentes a la tabla RegistroActaConsititutiva
        $insertarActa = $conexion->prepare("INSERT INTO registroactaconstitutiva VALUES (NULL, '" . $numeroLibro . "','" . $numeroInscripcion . "','" . $volumenICRESON . "','" . $existenModis . "','" . $ultimaModi . "','" . $numeroActaConsti . "','" . $volumenActaConsti . "','" . $ultimaID . "')");
        $insertarActa->execute();

        #Se prepara la query para insertar los datos pertinentes a la tabla DonatariaAutorizada
        $insertarDonataria = $conexion->prepare("INSERT INTO DonatariaAutorizada VALUES (NULL, '" . $fechaDiario . "','" . $numeroDiario . "','" . $detenidoAutorizado . "','" . $razonDetenido . "','" . $fechaAutorizada . "','" . $ultimaID . "')");
        $insertarDonataria->execute();

        #Se prepara la query para insertar los datos pertinentes a la tabla RecursosComplementarios
        $insertarRecursos = $conexion->prepare("INSERT INTO RecursosComplementarios VALUES (NULL, '" . $poblacion_0_4 . "','" . $poblacion_5_14 . "','" . $poblacion_15_29 . "','" . $poblacion_30_44 . "','" . $poblacion_45_64 . "','" . $poblacion_65_mas . "','" . $esquemasRecursosComp . "','" . $organizacionManejoRecursos . "','" . $ultimaID . "')");
        $insertarRecursos->execute();

        #Se prepara la query para insertar los datos pertinentes a la tabla Proyecto
        $insertarProyecto = $conexion->prepare("INSERT INTO Proyecto VALUES (NULL, '" . $nombreProyecto . "','" . $carenciaSocial . "','" . $objetivoDesarrolloSus . "','" . $temaConvocatoria . "','" . $temaDerechoSocial . "','" . $problemaSocial . "','" . $objetivoGeneral . "','" . $descripcionProyecto . "','" . $criteriosIdentificar . "','" . $ultimaID. "')");
        $insertarProyecto->execute();

        #Se prepara la query para insertar los datos pertinentes a la tabla Metas
        $insertarMetas = $conexion->prepare("INSERT INTO Metas VALUES (NULL, '" . $primerMeta . "','" . $tipoProductoUno . "','" . $segundaMeta . "','" . $tipoProductoDos . "','" . $terceraMeta . "','" . $tipoProductoDos . "','" . $ultimaID . "')");
        $insertarMetas->execute();

        #Se prepara la query para insertar los datos pertinentes a la tabla ArchivoFormulario
        $insertarFileRFC = $conexion->prepare("INSERT INTO FormularioArchivos VALUES ('','file_rfc',?,?,?,?)");
        $insertarFileRFC->bindParam(1,$nameFileRFC);
        $insertarFileRFC->bindParam(2,$tipoFileRFC);
        $insertarFileRFC->bindParam(3,$fileRFC);
        $insertarFileRFC->bindParam(4,$ultimaID);
        $insertarFileRFC->execute();

        $insertarFileCLUNI = $conexion->prepare("INSERT INTO FormularioArchivos VALUES ('','file_cluni',?,?,?,?)");
        $insertarFileCLUNI->bindParam(1,$nameFileCLUNI);
        $insertarFileCLUNI->bindParam(2,$tipoFileCLUNI);
        $insertarFileCLUNI->bindParam(3,$fileCLUNI);
        $insertarFileCLUNI->bindParam(4,$ultimaID);
        $insertarFileCLUNI->execute();

        $insertarFileActaConst = $conexion->prepare("INSERT INTO FormularioArchivos VALUES ('','file_acta_const',?,?,?,?)");
        $insertarFileActaConst->bindParam(1,$nameFileActaConst);
        $insertarFileActaConst->bindParam(2,$tipoFileActaConst);
        $insertarFileActaConst->bindParam(3,$fileActaConst);
        $insertarFileActaConst->bindParam(4,$ultimaID);
        $insertarFileActaConst->execute();

        $insertarFileActaProtoco = $conexion->prepare("INSERT INTO FormularioArchivos VALUES ('','file_acta_protoco',?,?,?,?)");
        $insertarFileActaProtoco->bindParam(1,$nameFileActaProtoco);
        $insertarFileActaProtoco->bindParam(2,$tipoFileActaProtoco);
        $insertarFileActaProtoco->bindParam(3,$fileActaProtoco);
        $insertarFileActaProtoco->bindParam(4,$ultimaID);
        $insertarFileActaProtoco->execute();

        $insertarFileINERepre = $conexion->prepare("INSERT INTO FormularioArchivos VALUES ('','file_ine_repre',?,?,?,?)");
        $insertarFileINERepre->bindParam(1,$nameFileINERepre);
        $insertarFileINERepre->bindParam(2,$tipoFileINERepre);
        $insertarFileINERepre->bindParam(3,$fileINERepre);
        $insertarFileINERepre->bindParam(4,$ultimaID);
        $insertarFileINERepre->execute();

        $insertarFileINECoordi = $conexion->prepare("INSERT INTO FormularioArchivos VALUES ('','file_ine_coordi',?,?,?,?)");
        $insertarFileINECoordi->bindParam(1,$nameFileINECoordi);
        $insertarFileINECoordi->bindParam(2,$tipoFileINECoordi);
        $insertarFileINECoordi->bindParam(3,$fileINECoordi);
        $insertarFileINECoordi->bindParam(4,$ultimaID);
        $insertarFileINECoordi->execute();

        $insertarFile32D = $conexion->prepare("INSERT INTO FormularioArchivos VALUES ('','file_32_d',?,?,?,?)");
        $insertarFile32D->bindParam(1,$nameFile32D);
        $insertarFile32D->bindParam(2,$tipoFile32D);
        $insertarFile32D->bindParam(3,$file32D);
        $insertarFile32D->bindParam(4,$ultimaID);
        $insertarFile32D->execute();

        $insertarFileF21 = $conexion->prepare("INSERT INTO FormularioArchivos VALUES ('','file_f_21',?,?,?,?)");
        $insertarFileF21->bindParam(1,$nameFileF21);
        $insertarFileF21->bindParam(2,$tipoFileF21);
        $insertarFileF21->bindParam(3,$fileF21);
        $insertarFileF21->bindParam(4,$ultimaID);
        $insertarFileF21->execute();

        $insertarFileConstanciaFiscal = $conexion->prepare("INSERT INTO FormularioArchivos VALUES ('','file_constancia_fiscal',?,?,?,?)");
        $insertarFileConstanciaFiscal->bindParam(1,$nameFileConstanciaFiscal);
        $insertarFileConstanciaFiscal->bindParam(2,$tipoFileConstanciaFiscal);
        $insertarFileConstanciaFiscal->bindParam(3,$fileConstanciaFiscal);
        $insertarFileConstanciaFiscal->bindParam(4,$ultimaID);
        $insertarFileConstanciaFiscal->execute();

        $insertarFileComprobanteBanco = $conexion->prepare("INSERT INTO FormularioArchivos VALUES ('','file_comprobante_banco',?,?,?,?)");
        $insertarFileComprobanteBanco->bindParam(1,$nameFileComprobanteBanco);
        $insertarFileComprobanteBanco->bindParam(2,$tipoFileComprobanteBanco);
        $insertarFileComprobanteBanco->bindParam(3,$fileComprobanteBanco);
        $insertarFileComprobanteBanco->bindParam(4,$ultimaID);
        $insertarFileComprobanteBanco->execute();

        $insertarFileFacturaCancelada = $conexion->prepare("INSERT INTO FormularioArchivos VALUES ('','file_factura_cancelada',?,?,?,?)");
        $insertarFileFacturaCancelada->bindParam(1,$nameFileFacturaCancelada);
        $insertarFileFacturaCancelada->bindParam(2,$tipoFileFacturaCancelada);
        $insertarFileFacturaCancelada->bindParam(3,$fileFacturaCancelada);
        $insertarFileFacturaCancelada->bindParam(4,$ultimaID);
        $insertarFileFacturaCancelada->execute();

        $insertarFileDNIAS = $conexion->prepare("INSERT INTO FormularioArchivos VALUES ('','file_dnias',?,?,?,?)");
        $insertarFileDNIAS->bindParam(1,$nameFileDNIAS);
        $insertarFileDNIAS->bindParam(2,$tipoFileDNIAS);
        $insertarFileDNIAS->bindParam(3,$fileDNIAS);
        $insertarFileDNIAS->bindParam(4,$ultimaID);
        $insertarFileDNIAS->execute();

        $insertarFileRPPIcreson = $conexion->prepare("INSERT INTO FormularioArchivos VALUES ('','file_rpp_icreson',?,?,?,?)");
        $insertarFileRPPIcreson->bindParam(1,$nameFileRPPIcreson);
        $insertarFileRPPIcreson->bindParam(2,$tipoFileRPPIcreson);
        $insertarFileRPPIcreson->bindParam(3,$fileRPPIcreson);
        $insertarFileRPPIcreson->bindParam(4,$ultimaID);
        $insertarFileRPPIcreson->execute();

        $insertarFileUltimaActa = $conexion->prepare("INSERT INTO FormularioArchivos VALUES ('','file_ultima_acta',?,?,?,?)");
        $insertarFileUltimaActa->bindParam(1,$nameFileUltimaActa);
        $insertarFileUltimaActa->bindParam(2,$tipoFileUltimaActa);
        $insertarFileUltimaActa->bindParam(3,$fileUltimaActa);
        $insertarFileUltimaActa->bindParam(4,$ultimaID);
        $insertarFileUltimaActa->execute();

        $insertarFileRPPUltimaActa = $conexion->prepare("INSERT INTO FormularioArchivos VALUES ('','file_rpp_ultima_acta',?,?,?,?)");
        $insertarFileRPPUltimaActa->bindParam(1,$nameFileRPPUltimaActa);
        $insertarFileRPPUltimaActa->bindParam(2,$tipoFileRPPUltimaActa);
        $insertarFileRPPUltimaActa->bindParam(3,$fileRPPUltimaActa);
        $insertarFileRPPUltimaActa->bindParam(4,$ultimaID);
        $insertarFileRPPUltimaActa->execute();

        $insertarFilePaginaDiario = $conexion->prepare("INSERT INTO FormularioArchivos VALUES ('','file_pagina_diario',?,?,?,?)");
        $insertarFilePaginaDiario->bindParam(1,$nameFilePaginaDiario);
        $insertarFilePaginaDiario->bindParam(2,$tipoFilePaginaDiario);
        $insertarFilePaginaDiario->bindParam(3,$filePaginaDiario);
        $insertarFilePaginaDiario->bindParam(4,$ultimaID);
        $insertarFilePaginaDiario->execute();

    } catch (PDOException $e) {

    }
}

require 'index.view.php';

?>
