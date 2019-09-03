<?php
/* METODO: evitar que el usuario ingrese a esta pagina php desde la barra de busqueda */
/* signup-submit es el boton del formulario que se encuentra en la signup.php */

if (isset($_POST['pre-submit'])) {
	/* manda a llamar a la pagina php donde se conecta a la base de datos de esta forma se ahorra codigo y se tiene todo en una funcion mas simple */
	require 'includes/dbh.inc.php';	
	//session_start();

/* ------------------------------- datos_generales ---------------------------------------------- */
    $Correos_1 = $_POST['Correos_1'];
    $Correo_Organizacion = $_POST['Correo_Organizacion']; 
    $Correo_Organizacion .='@';
    $Correo_Organizacion .=$Correos_1;

    /*Archivo*/
    $nameFileRFC = $_FILES['files']['name'][0];
    $tipoFileRFC = $_FILES['files']['type'][0];
    $fileRFC = file_get_contents($_FILES['files']['tmp_name'][0]);  

    $rfcHomoclave = $_POST['rfcHomoclave'];
    $CLUNI = $_POST['CLUNI'];

    /*Archivo*/
    $nameFileCLUNI = $_FILES['files']['name'][1];
    $tipoFileCLUNI = $_FILES['files']['type'][1];
    $fileCLUNI = file_get_contents($_FILES['files']['tmp_name'][1]);

    $nombreOSC = $_POST['nombreOSC'];    
    $objetoSocialOrganizacion = $_POST['objetoSocialOrganizacion'];
    $mision = $_POST['mision'];
    $vision = $_POST['vision'];
    $areasAtencion = $_POST['areasAtencion'];
    $tema_de_Derecho_Social = $_POST['tema_de_Derecho_Social'];

    /* QUERY */



/* ------------------------------- domicilio ---------------------------------------------- */
    $calle = $_POST['calle'];
    $domicilio = $_POST['domicilio'];
    $colonia = $_POST['colonia'];
    $codigoPostal = $_POST['codigoPostal'];
    $localidad = $_POST['localidad'];
    $municipioRegistroOSC = $_POST['municipioRegistroOSC'];    

    $Latitud = $_POST['Latitud'];
    $Longitud = $_POST['Longitud'];

    $domicilio_social_legal = $_POST['domicilio_social_legal'];

    $sql = "INSERT INTO domicilio (calle, domicilio, colonia, codigoPostal, localidad, municipioRegistroOSC, Latitud, Longitud, domicilio_social_legal,  FK_FormularioID) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";        
        $stmt = mysqli_stmt_init($conn);
        mysqli_stmt_prepare($stmt, $sql);
        mysqli_stmt_bind_param($stmt, "sssssssssi",$calle,$domicilio,$colonia,$codigoPostal,$localidad,$municipioRegistroOSC,$Latitud,$Longitud,$domicilio_social_legal,$ultimaID);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

    if (!empty($domicilio_social_legal)) {
    //echo "$domicilio_social_legal <br>";        
        if ($domicilio_social_legal == "No"){
            $municipio_Dom = $_POST['municipio_Dom'];
            $domicilio_Dom = $_POST['domicilio_Dom'];
            $localidad_Dom = $_POST['localidad_Dom'];
           // echo "$municipio_Dom";
            
            /* QUERY */
        }else{
            $municipio_Dom = "";
            $domicilio_Dom = "";
            $localidad_Dom = "";
            //echo "Nada";            
        } 
    }else{
        echo "Campo Domicilio social legal no selecionado";
    }

/* ------------------------------- contacto ---------------------------------------------- */

    $phoneOficina = $_POST['phoneOficina'];
    $phoneCelular = $_POST['phoneCelular'];
    $emailContacto = $_POST['emailContacto']; 
    $paginaWeb = $_POST['paginaWeb'];
    $organizacionFB = $_POST['organizacionFB'];
    $organizacionTW = $_POST['organizacionTW'];
    $organizacionInsta = $_POST['organizacionInsta'];
    
    /* QUERY */

/* ------------------------------- Historial_de_la_organización ---------------------------------------------- */

    /*Archivo*/
    $nameFileActaConst = $_FILES['files']['name'][2];
    $tipoFileActaConst = $_FILES['files']['type'][2];
    $fileActaConst = file_get_contents($_FILES['files']['tmp_name'][2]);
    /*Archivo*/
    $nameFileActaProtoco= $_FILES['files']['name'][3];
    $tipoFileActaProtoco = $_FILES['files']['type'][3];
    $fileActaProtoco = file_get_contents($_FILES['files']['tmp_name'][3]);
    /*Archivo*/
    $nameFileINERepre = $_FILES['files']['name'][4];
    $tipoFileINERepre = $_FILES['files']['type'][4];
    $fileINERepre = file_get_contents($_FILES['files']['tmp_name'][4]);

    $nombreRepresentante = $_POST['nombreRepresentante'];
    $idRepresentante = $_POST['idRepresentante'];
    $fechaConstitucionOSC = $_POST['fechaConstitucionOSC'];
    $nombreNotario = $_POST['nombreNotario'];
    $numeroNotario = $_POST['numeroNotario'];
    $municipioNotaria = $_POST['municipioNotaria'];
    $noEstrituraPublica = $_POST['noEstrituraPublica'];
    $volumenEstrituraPublica = $_POST['volumenEstrituraPublica'];
    $fechaEstritura = $_POST['fechaEstritura'];

    /* QUERY */

/* ------------------------------- Acta_Constitutiva ---------------------------------------------- */

    /*Archivo*/
    $nameFileRPPIcreson= $_FILES['files']['name'][5];
    $tipoFileRPPIcreson = $_FILES['files']['type'][5];
    $fileRPPIcreson = file_get_contents($_FILES['files']['tmp_name'][5]);

    $numeroLibro = $_POST['numeroLibro'];
    $numeroInscripcion = $_POST['numeroInscripcion'];    
    $volumenICRESON = $_POST['volumenICRESON'];    
    $existenModis = $_POST['existenModis'];
    $autorizadaDeducible = $_POST['autorizadaDeducible'];

    /* QUERY */

    if (!empty($existenModis)) {
    //echo "<br>$existenModis <br>";        
        if ($existenModis == "Si"){
            $ultimaModi = $_POST['ultimaModi'];
            $numeroActaConsti = $_POST['numeroActaConsti'];
            $volumenActaConsti = $_POST['volumenActaConsti'];

            /*Archivo*/
            $nameFileUltimaActa= $_FILES['files']['name'][6];
            $tipoFileUltimaActa = $_FILES['files']['type'][6];
            $fileUltimaActa = file_get_contents($_FILES['files']['tmp_name'][6]);
            /*Archivo*/
            $nameFileRPPUltimaActa= $_FILES['files']['name'][7];
            $tipoFileRPPUltimaActa = $_FILES['files']['type'][7];
            $fileRPPUltimaActa = file_get_contents($_FILES['files']['tmp_name'][7]);

            //echo "$ultimaModi";
            
            /* QUERY */
        }else{
            $ultimaModi = "";
            $numeroActaConsti = "";
            $volumenActaConsti = "";
            //echo "Nada";            
        } 
    }else{
        echo "Campo ha tenido modificaciones a su acta constitutiva no selecionado";
    }  
    
    if (!empty($autorizadaDeducible)) {
    //echo "<br>$autorizadaDeducible <br>";        
        if ($autorizadaDeducible == "Si"){
            $numeroDiario = $_POST['numeroDiario'];
            $fechaDiario = $_POST['fechaDiario'];
            $detenidoAutorizado = $_POST['detenidoAutorizado'];
            $fechaAutorizada = $_POST['fechaAutorizada'];

            /*Archivo*/
            $nameFileDOF = $_FILES['files']['name'][8];
            $tipoFileDOF = $_FILES['files']['type'][8];
            $fileDOF = file_get_contents($_FILES['files']['tmp_name'][8]);
            
            /* QUERY */


            if (!empty($detenidoAutorizado)) {
                if ($detenidoAutorizado == "Si"){
                    $razonDetenido = $_POST['razonDetenido'];

                    //echo "$razonDetenido";
                    
                    /* QUERY */
                }else{
                    $razonDetenido = "";
                    //echo "Nada";            
                } 
            }else{
                echo "Campo detenidoAutorizado";
            }

        }else{
            $numeroDiario = "";
            $fechaDiario = "";
            $detenidoAutorizado = "";
            $fechaAutorizada = "";
            //echo "Nada";            
        } 
    }else{
        echo "Campo autorizadaDeducible";
    }      
   
/* ------------------------------- historial_de_la_organización_2 ---------------------------------------------- */
    
    $digiridaPor = $_POST['digiridaPor'];
    $nombrePresi = $_POST['nombrePresi'];
    $numeroEmpleados = $_POST['numeroEmpleados'];
    $numeroVoluntarios = $_POST['numeroVoluntarios'];
    $principalesLogros = $_POST['principalesLogros'];
    $metasOrganización = $_POST['metasOrganización'];
    $principalesAlianzas = $_POST['principalesAlianzas'];
    $numeroBeneficiados = $_POST['numeroBeneficiados'];

    /* QUERY */

/* ------------------------------- Población beneficiada en el úlitmo año ---------------------------------------------- */

    $poblacion_0_4 = $_POST['poblacion_0_4'];
    $poblacion_5_14 = $_POST['poblacion_5_14'];
    $poblacion_15_29 = $_POST['poblacion_15_29'];
    $poblacion_30_44 = $_POST['poblacion_30_44'];
    $poblacion_45_64 = $_POST['poblacion_45_64'];
    $poblacion_65_mas = $_POST['poblacion_65_mas'];

    /* QUERY */

/* -------------------------------  aaaa  ---------------------------------------------- */

    /*Archivo*/
    $nameFile32D = $_FILES['files']['name'][9];
    $tipoFile32D = $_FILES['files']['type'][9];
    $file32D = file_get_contents($_FILES['files']['tmp_name'][9]);
    /*Archivo*/
    $nameFileF21 = $_FILES['files']['name'][10];
    $tipoFileF21 = $_FILES['files']['type'][10];
    $fileF21 = file_get_contents($_FILES['files']['tmp_name'][10]);
    /*Archivo*/
    $nameFileConstanciaFiscal = $_FILES['files']['name'][11];
    $tipoFileConstanciaFiscal = $_FILES['files']['type'][11];
    $fileConstanciaFiscal = file_get_contents($_FILES['files']['tmp_name'][11]);
    /*Archivo*/
    $nameFileComprobanteBanco = $_FILES['files']['name'][12];
    $tipoFileComprobanteBanco = $_FILES['files']['type'][12];
    $fileComprobanteBanco = file_get_contents($_FILES['files']['tmp_name'][12]);
    /*Archivo*/
    $nameFileFacturaCancelada = $_FILES['files']['name'][13];
    $tipoFileFacturaCancelada = $_FILES['files']['type'][13];
    $fileFacturaCancelada = file_get_contents($_FILES['files']['tmp_name'][13]);
    

    $observaciones32D = $_POST['observaciones32D'];
    $tiempoYforma = $_POST['tiempoYforma'];
    $tieneAdeudos = $_POST['tieneAdeudos'];
    $inscritaDNIAS = $_POST['inscritaDNIAS'];
    $esquemasRecursosComp = $_POST['esquemasRecursosComp'];

    /* QUERY */

    if (!empty($inscritaDNIAS)) {
    //echo "<br>$inscritaDNIAS <br>";        
        if ($inscritaDNIAS == "Si"){
            
            /*Archivo*/
            $nameFileDNIAS= $_FILES['files']['name'][14];
            $tipoFileDNIAS = $_FILES['files']['type'][14];
            $fileDNIAS = file_get_contents($_FILES['files']['tmp_name'][14]);

            
            
            /* QUERY */
        }else{
            
            //echo "Nada";            
        } 
    }else{
        echo "Campo ha tenido modificaciones a su acta constitutiva no selecionado";
    }

    if (!empty($esquemasRecursosComp)) {
    //echo "<br>$esquemasRecursosComp <br>";        
        if ($esquemasRecursosComp == "Si"){
            $organizacionManejoRecursos = $_POST['organizacionManejoRecursos'];

            //echo "$organizacionManejoRecursos";
            
            /* QUERY */
        }else{
            $organizacionManejoRecursos = "";
            //echo "Nada";            
        } 
    }else{
        echo "Campo esquemasRecursosComp";
    }

/* ------------------------------- Hasta aqui ---------------------------------------------- */
    
    
    
    
    



    require"Pre_Registro_New_Ver.php";

    echo "<br><br>Guardado...";
    //header("Location: ../index.php");
	//exit();
}
else{
	//header("Location: ../index.php");
	//exit();		
}