<?php
/* METODO: evitar que el usuario ingrese a esta pagina php desde la barra de busqueda */
/* signup-submit es el boton del formulario que se encuentra en la signup.php */
if (isset($_POST['pre-submit'])) {
	/* manda a llamar a la pagina php donde se conecta a la base de datos de esta forma se ahorra codigo y se tiene todo en una funcion mas simple */
        require 'includes/dbh.inc.php'; 
	
    /* Contador  */	
	$Contador = 0;

    $rfcHomoclave = $_POST['rfcHomoclave'];
    if (!empty($rfcHomoclave)) {
        
        $sql ="SELECT RFC_Organizacional FROM registro WHERE RFC_Organizacional=?";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            echo "error: Sql<br>";     
            exit();
        }else{
            mysqli_stmt_bind_param($stmt, "s", $rfcHomoclave);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);
            $resultCheck = mysqli_stmt_num_rows($stmt);
            if ($resultCheck > 0) {               
                echo "Error: Ya existe un registro con ese rfc:$rfcHomoclave<br>";
                header("Location: index.php");
                exit();
            }else{
                //echo "Creado Exitosamente<br>";
            }
        }

        $Clave = substr(md5(microtime()), 1, 8);

        $sql = "INSERT INTO registro (RFC_Organizacional, Clave ) VALUES (?, ?)";        
        $stmt = mysqli_stmt_init($conn);
        mysqli_stmt_prepare($stmt, $sql);
        mysqli_stmt_bind_param($stmt, "ss",$rfcHomoclave ,$Clave);
        mysqli_stmt_execute($stmt);        
        $ultimaID = $conn->insert_id;
    }else{
        echo "<p class='Error_php''>Error: RFC no ingresado...<p>";
    }


/* ------------------------------- datos_generales ---------------------------------------------- */
    $Correos_1 = $_POST['Correos_1'];
    $Correo_Organizacion = $_POST['Correo_Organizacion']; 
    $Correo_Organizacion .='@';
    $Correo_Organizacion .=$Correos_1;

    /*Archivo+*/
    if (!empty($_FILES['files']['name'][$Contador])) {

        $Name_Archivo = 'file_rfc';
        $Contador++;

        $nameFile = $_FILES['files']['name'][$Contador];
        $tipoFile = $_FILES['files']['type'][$Contador];
        $file = file_get_contents($_FILES['files']['tmp_name'][$Contador]);

        $sql = "INSERT INTO registro_archivos (nombreSeccion, nombreArchivo, tipoArchivo, dataArchivo, FK_Registro) VALUES (?,?,?,?,?)";        
        $stmt = mysqli_stmt_init($conn);
        mysqli_stmt_prepare($stmt, $sql);
        mysqli_stmt_bind_param($stmt, "ssssi",$Name_Archivo,$nameFile,$tipoFile,$file,$ultimaID);
        mysqli_stmt_execute($stmt);
    }


    $CLUNI = $_POST['CLUNI'];

    /*Archivo+*/
    if (!empty($_FILES['files']['name'][$Contador])) {
        $nameFile = $_FILES['files']['name'][$Contador];
        $tipoFile = $_FILES['files']['type'][$Contador];
        $file = file_get_contents($_FILES['files']['tmp_name'][$Contador]);

        /* Nombre identificador del archivo */
        $Name_Archivo = 'file_cluni';
        $Contador++;

        $sql = "INSERT INTO registro_archivos (nombreSeccion, nombreArchivo, tipoArchivo, dataArchivo, FK_Registro) VALUES (?,?,?,?,?)";        
        $stmt = mysqli_stmt_init($conn);
        mysqli_stmt_prepare($stmt, $sql);
        mysqli_stmt_bind_param($stmt, "ssssi",$Name_Archivo,$nameFile,$tipoFile,$file,$ultimaID);
        mysqli_stmt_execute($stmt);
    }    

    $nombreOSC = $_POST['nombreOSC'];    
    $objetoSocialOrganizacion = $_POST['objetoSocialOrganizacion'];
    $mision = $_POST['mision'];
    $vision = $_POST['vision'];
    $areasAtencion = $_POST['areasAtencion'];
    $tema_de_Derecho_Social = $_POST['tema_de_Derecho_Social'];

    /* QUERY */
    $sql = "INSERT INTO datos_generales (FK_Registro, Correo_Organizacion, rfcHomoclave, CLUNI, nombreOSC, objetoSocialOrganizacion, mision, vision, areasAtencion,  tema_de_Derecho_Social) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";        
    $stmt = mysqli_stmt_init($conn);
    mysqli_stmt_prepare($stmt, $sql);
    mysqli_stmt_bind_param($stmt, "isssssssss",$ultimaID,$Correo_Organizacion,$rfcHomoclave,$CLUNI,$nombreOSC,$objetoSocialOrganizacion,$mision,$vision,$areasAtencion,$tema_de_Derecho_Social);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);



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

    $sql = "INSERT INTO domicilio (FK_Registro, calle, domicilio, colonia, codigoPostal, localidad, municipioRegistroOSC, Latitud, Longitud, domicilio_social_legal) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";        
    $stmt = mysqli_stmt_init($conn);
    mysqli_stmt_prepare($stmt, $sql);
    mysqli_stmt_bind_param($stmt, "isssssssss",$ultimaID,$calle,$domicilio,$colonia,$codigoPostal,$localidad,$municipioRegistroOSC,$Latitud,$Longitud,$domicilio_social_legal);
    mysqli_stmt_execute($stmt);
    $ID_Table = $conn->insert_id;

    if (!empty($_POST['domicilio_social_legal'])) {              
        if ($domicilio_social_legal == "No"){
            $municipio_Dom = $_POST['municipio_Dom'];
            $domicilio_Dom = $_POST['domicilio_Dom'];
            $localidad_Dom = $_POST['localidad_Dom'];
            
            $sql = "INSERT INTO domicilio_social_legal (FK_Domicilio, municipio_Dom, domicilio_Dom, localidad_Dom) VALUES (?, ?, ?, ?)";        
            $stmt = mysqli_stmt_init($conn);
            mysqli_stmt_prepare($stmt, $sql);
            mysqli_stmt_bind_param($stmt, "isss",$ID_Table,$municipio_Dom,$domicilio_Dom,$localidad_Dom);
            mysqli_stmt_execute($stmt);

        }else{            
            $municipio_Dom = "";
            $domicilio_Dom = "";
            $localidad_Dom = ""; 

        } 
    }else{
        echo "<p class='Error_php'>Error: Campo Domicilio social legal no selecionado...<p>";
    }

/* ------------------------------- contacto ---------------------------------------------- */

    $phoneOficina = $_POST['phoneOficina'];
    $phoneCelular = $_POST['phoneCelular'];
    $emailContacto = $_POST['emailContacto'];
    $paginaWeb = $_POST['paginaWeb'];
    $organizacionFB = $_POST['organizacionFB'];
    $organizacionTW = $_POST['organizacionTW'];
    $organizacionInsta = $_POST['organizacionInsta'];

    if (empty($paginaWeb)) {
        $paginaWeb = 'Sin pagina Web'; 
    }

    if (empty($organizacionTW)){
        $organizacionTW = 'Sin Twitter';
    }

    if (empty($organizacionInsta)){
        $organizacionInsta = 'Sin Instagram';
    }
    
    /* QUERY */
    $sql = "INSERT INTO contacto (FK_Registro, phoneOficina, phoneCelular, emailContacto, paginaWeb, organizacionFB, organizacionTW, organizacionInsta) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";  
    $stmt = mysqli_stmt_init($conn);
    mysqli_stmt_prepare($stmt, $sql);
    mysqli_stmt_bind_param($stmt, "isssssss",$ultimaID,$phoneOficina,$phoneCelular,$emailContacto,$paginaWeb,$organizacionFB,$organizacionTW,$organizacionInsta);
    mysqli_stmt_execute($stmt);

/* ------------------------------- Historial_de_la_organizacion (Órgano del gobierno) ---------------------------------------------- */

    /*Archivo+*/
    if (!empty($_FILES['files']['name'][$Contador])) {
        /* Nombre identificador del archivo */
        $nameFile = $_FILES['files']['name'][$Contador];
        $tipoFile = $_FILES['files']['type'][$Contador];
        $file = file_get_contents($_FILES['files']['tmp_name'][$Contador]);

        /* Nombre identificador del archivo */
        $Name_Archivo = 'file_acta_const';
        $Contador++;

        $sql = "INSERT INTO registro_archivos (nombreSeccion, nombreArchivo, tipoArchivo, dataArchivo, FK_Registro) VALUES (?,?,?,?,?)";        
        $stmt = mysqli_stmt_init($conn);
        mysqli_stmt_prepare($stmt, $sql);
        mysqli_stmt_bind_param($stmt, "ssssi",$Name_Archivo,$nameFile,$tipoFile,$file,$ultimaID);
        mysqli_stmt_execute($stmt);
    }

    /*Archivo+*/
    if (!empty($_FILES['files']['name'][$Contador])) {
        $nameFile= $_FILES['files']['name'][$Contador];
        $tipoFile = $_FILES['files']['type'][$Contador];
        $file = file_get_contents($_FILES['files']['tmp_name'][$Contador]);

        /* Nombre identificador del archivo */
        $Name_Archivo = 'file_acta_protoco';
        $Contador++;

        $sql = "INSERT INTO registro_archivos (nombreSeccion, nombreArchivo, tipoArchivo, dataArchivo, FK_Registro) VALUES (?,?,?,?,?)";        
        $stmt = mysqli_stmt_init($conn);
        mysqli_stmt_prepare($stmt, $sql);
        mysqli_stmt_bind_param($stmt, "ssssi",$Name_Archivo,$nameFile,$tipoFile,$file,$ultimaID);
        mysqli_stmt_execute($stmt);
    }

    /*Archivo+*/
    if (!empty($_FILES['files']['name'][$Contador])) {
        $nameFile = $_FILES['files']['name'][$Contador];
        $tipoFile = $_FILES['files']['type'][$Contador];
        $file = file_get_contents($_FILES['files']['tmp_name'][$Contador]);

        /* Nombre identificador del archivo */
        $Name_Archivo = 'file_ine_repre';
        $Contador++;

        $sql = "INSERT INTO registro_archivos (nombreSeccion, nombreArchivo, tipoArchivo, dataArchivo, FK_Registro) VALUES (?,?,?,?,?)";        
        $stmt = mysqli_stmt_init($conn);
        mysqli_stmt_prepare($stmt, $sql);
        mysqli_stmt_bind_param($stmt, "ssssi",$Name_Archivo,$nameFile,$tipoFile,$file,$ultimaID);
        mysqli_stmt_execute($stmt);
    }


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
    $sql = "INSERT INTO historial_de_la_organizacion (FK_Registro, nombreRepresentante, idRepresentante, fechaConstitucionOSC, nombreNotario, numeroNotario, municipioNotaria, noEstrituraPublica, volumenEstrituraPublica, fechaEstritura) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";  
    $stmt = mysqli_stmt_init($conn);
    mysqli_stmt_prepare($stmt, $sql);
    mysqli_stmt_bind_param($stmt, "isssssssss",$ultimaID,$nombreRepresentante,$idRepresentante,$fechaConstitucionOSC,$nombreNotario,$numeroNotario,$municipioNotaria,$noEstrituraPublica,$volumenEstrituraPublica,$fechaEstritura);
    mysqli_stmt_execute($stmt);

/* ------------------------------- Acta_Constitutiva (RPP ICRESON) ---------------------------------------------- */

    /*Archivo+*/
    if (!empty($_FILES['files']['name'][$Contador])) {
        $nameFile= $_FILES['files']['name'][$Contador];
        $tipoFile = $_FILES['files']['type'][$Contador];
        $file = file_get_contents($_FILES['files']['tmp_name'][$Contador]);

        /* Nombre identificador del archivo */
        $Name_Archivo = 'file_rpp_icreson';
        $Contador++;

        $sql = "INSERT INTO registro_archivos (nombreSeccion, nombreArchivo, tipoArchivo, dataArchivo, FK_Registro) VALUES (?,?,?,?,?)";        
        $stmt = mysqli_stmt_init($conn);
        mysqli_stmt_prepare($stmt, $sql);
        mysqli_stmt_bind_param($stmt, "ssssi",$Name_Archivo,$nameFile,$tipoFile,$file,$ultimaID);
        mysqli_stmt_execute($stmt);
    }
    

    $numeroLibro = $_POST['numeroLibro'];
    $numeroInscripcion = $_POST['numeroInscripcion'];    
    $volumenICRESON = $_POST['volumenICRESON'];
    $existenModis = $_POST['existenModis'];
    $autorizadaDeducible = $_POST['autorizadaDeducible'];        
    

    /* QUERY */
    $sql = "INSERT INTO acta_constitutiva (FK_Registro, numeroLibro, numeroInscripcion, volumenICRESON, existenModis ,autorizadaDeducible) VALUES (?, ?, ?, ?, ?, ?)";  
    $stmt = mysqli_stmt_init($conn);
    mysqli_stmt_prepare($stmt, $sql);
    mysqli_stmt_bind_param($stmt, "isssss",$ultimaID,$numeroLibro,$numeroInscripcion,$volumenICRESON,$existenModis,$autorizadaDeducible);
    mysqli_stmt_execute($stmt);
    $ID_Table = $conn->insert_id;

    

    if (!empty($_POST['existenModis'])) {
       
        if ($existenModis == "Si"){
            $ultimaModi = $_POST['ultimaModi'];
            $numeroActaConsti = $_POST['numeroActaConsti'];
            $volumenActaConsti = $_POST['volumenActaConsti'];

            $sql = "INSERT INTO existenmodis (FK_acta_constitutiva, ultimaModi, numeroActaConsti, volumenActaConsti) VALUES (?, ?, ?, ?)";  
            $stmt = mysqli_stmt_init($conn);
            mysqli_stmt_prepare($stmt, $sql);
            mysqli_stmt_bind_param($stmt, "isss",$ID_Table,$ultimaModi,$numeroActaConsti,$volumenActaConsti);
            mysqli_stmt_execute($stmt);

            /*Archivo+*/
            if (!empty($_FILES['files']['name'][$Contador])) {
                $nameFile= $_FILES['files']['name'][$Contador];
                $tipoFile = $_FILES['files']['type'][$Contador];
                $file = file_get_contents($_FILES['files']['tmp_name'][$Contador]);

                /* Nombre identificador del archivo */
                $Name_Archivo = 'file_ultima_acta';                

                $sql = "INSERT INTO registro_archivos (nombreSeccion, nombreArchivo, tipoArchivo, dataArchivo, FK_Registro) VALUES (?,?,?,?,?)";        
                $stmt = mysqli_stmt_init($conn);
                mysqli_stmt_prepare($stmt, $sql);
                mysqli_stmt_bind_param($stmt, "ssssi",$Name_Archivo,$nameFile,$tipoFile,$file,$ultimaID);
                mysqli_stmt_execute($stmt);
            } 
            
            /*Archivo+*/
            if (!empty($_FILES['files']['name'][$Contador])) {
                $nameFile= $_FILES['files']['name'][$Contador];
                $tipoFile = $_FILES['files']['type'][$Contador];
                $file = file_get_contents($_FILES['files']['tmp_name'][$Contador]);

                /* Nombre identificador del archivo */
                $Name_Archivo = 'file_rpp_ultima_acta';

                $sql = "INSERT INTO registro_archivos (nombreSeccion, nombreArchivo, tipoArchivo, dataArchivo, FK_Registro) VALUES (?,?,?,?,?)";        
                $stmt = mysqli_stmt_init($conn);
                mysqli_stmt_prepare($stmt, $sql);
                mysqli_stmt_bind_param($stmt, "ssssi",$Name_Archivo,$nameFile,$tipoFile,$file,$ultimaID);
                mysqli_stmt_execute($stmt);
            } 
            
            /* QUERY */
        }else{
            $ultimaModi = "";
            $numeroActaConsti = "";
            $volumenActaConsti = "";
        } 
    }else{
        echo "<p class='Error_php'>Error: ha tenido modificaciones a su acta constitutiva no ingresado...<p>";
    }
    $Contador+=2;


    
    if (!empty($_POST['autorizadaDeducible'])) {
        if ($autorizadaDeducible == "Si"){
            $numeroDiario = $_POST['numeroDiario'];
            $fechaDiario = $_POST['fechaDiario'];
            $detenidoAutorizado = $_POST['detenidoAutorizado'];
            $fechaAutorizada = $_POST['fechaAutorizada'];

            $sql = "INSERT INTO autorizadadeducible (FK_acta_constitutiva, numeroDiario, fechaDiario, detenidoAutorizado, fechaAutorizada) VALUES (?, ?, ?, ?, ?)";  
            $stmt = mysqli_stmt_init($conn);
            mysqli_stmt_prepare($stmt, $sql);
            mysqli_stmt_bind_param($stmt, "issss",$ID_Table,$numeroDiario,$fechaDiario,$detenidoAutorizado, $fechaAutorizada );
            mysqli_stmt_execute($stmt);
            $ID_Table = $conn->insert_id;

            /*Archivo+*/
            if (!empty($_FILES['files']['name'][$Contador])) {
                $nameFile = $_FILES['files']['name'][$Contador];
                $tipoFile = $_FILES['files']['type'][$Contador];
                $file = file_get_contents($_FILES['files']['tmp_name'][$Contador]);
                /* Nombre identificador del archivo */

                $Name_Archivo = 'file_pagina_diario_Oficial';                

                $sql = "INSERT INTO registro_archivos (nombreSeccion, nombreArchivo, tipoArchivo, dataArchivo, FK_Registro) VALUES (?,?,?,?,?)";        
                $stmt = mysqli_stmt_init($conn);
                mysqli_stmt_prepare($stmt, $sql);
                mysqli_stmt_bind_param($stmt, "ssssi",$Name_Archivo,$nameFile,$tipoFile,$file,$ultimaID);
                mysqli_stmt_execute($stmt);
            }             
        

            if (!empty($_POST['detenidoAutorizado'])) {
                if ($detenidoAutorizado == "Si"){
                    $razonDetenido = $_POST['razonDetenido'];

                    $sql = "INSERT INTO detenidoautorizado (FK_autorizadaDeducible, razonDetenido) VALUES (?, ?)";  
                    $stmt = mysqli_stmt_init($conn);
                    mysqli_stmt_prepare($stmt, $sql);
                    mysqli_stmt_bind_param($stmt, "is",$ID_Table,$razonDetenido);
                    mysqli_stmt_execute($stmt);

                }else{
                    $razonDetenido = "";
                } 
            }else{
                echo "<p class='Error_php'>Error: Campo donativos deducibles de impuestos no ingresado...<p>";                
            }

        }else{
            $numeroDiario = "";
            $fechaDiario = "";
            $detenidoAutorizado = "";
            $fechaAutorizada = "";
        } 
    }else{
        echo "<p class='Error_php'>Error: Campo donativos deducibles de impuestos no ingresado...<p>";
    }
    $Contador++;      
   
/* ------------------------------- historial_de_la_organizacion_2 (Su organización se rige o es dirigida por) ---------------------------------------------- */
    
    $digiridaPor = $_POST['digiridaPor'];
    $nombrePresi = $_POST['nombrePresi'];
    $numeroEmpleados = $_POST['numeroEmpleados'];
    $numeroVoluntarios = $_POST['numeroVoluntarios'];
    $principalesLogros = $_POST['principalesLogros'];
    $metasOrganizacion = $_POST['metasOrganización'];
    $principalesAlianzas = $_POST['principalesAlianzas'];
    $numeroBeneficiados = $_POST['numeroBeneficiados'];

    /* QUERY */
    $sql = "INSERT INTO historial_de_la_organizacion_2 (FK_Registro, digiridaPor, nombrePresi, numeroEmpleados, numeroVoluntarios ,principalesLogros, metasOrganizacion, principalesAlianzas, numeroBeneficiados) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";  
    $stmt = mysqli_stmt_init($conn);
    mysqli_stmt_prepare($stmt, $sql);
    mysqli_stmt_bind_param($stmt, "issssssss",$ultimaID,$digiridaPor,$nombrePresi,$numeroEmpleados,$numeroVoluntarios,$principalesLogros, $metasOrganizacion, $principalesAlianzas,$numeroBeneficiados);
    mysqli_stmt_execute($stmt);

/* ------------------------------- Población beneficiada en el úlitmo año ---------------------------------------------- */

    $poblacion_0_4 = $_POST['poblacion_0_4'];
    $poblacion_5_14 = $_POST['poblacion_5_14'];
    $poblacion_15_29 = $_POST['poblacion_15_29'];
    $poblacion_30_44 = $_POST['poblacion_30_44'];
    $poblacion_45_64 = $_POST['poblacion_45_64'];
    $poblacion_65_mas = $_POST['poblacion_65_mas'];

    /* QUERY */
    $sql = "INSERT INTO poblacion_beneficiada (FK_Registro, poblacion_0_4,poblacion_5_14,poblacion_15_29, poblacion_30_44,poblacion_45_64,poblacion_65_mas) VALUES (?, ?, ?, ?, ?, ?, ?)";  
    $stmt = mysqli_stmt_init($conn);
    mysqli_stmt_prepare($stmt, $sql);
    mysqli_stmt_bind_param($stmt, "iiiiiii",$ultimaID,$poblacion_0_4,$poblacion_5_14,$poblacion_15_29,$poblacion_30_44,$poblacion_45_64, $poblacion_65_mas);
    mysqli_stmt_execute($stmt);

/* -------------------------------  aaaa  ---------------------------------------------- */

    /*Archivo+*/
    if (!empty($_FILES['files']['name'][$Contador])) {
        $nameFile = $_FILES['files']['name'][$Contador];
        $tipoFile = $_FILES['files']['type'][$Contador];
        $file = file_get_contents($_FILES['files']['tmp_name'][$Contador]);

        /* Nombre identificador del archivo */
        $Name_Archivo = 'file_32_d';
        $Contador++;

        $sql = "INSERT INTO registro_archivos (nombreSeccion, nombreArchivo, tipoArchivo, dataArchivo, FK_Registro) VALUES (?,?,?,?,?)";        
        $stmt = mysqli_stmt_init($conn);
        mysqli_stmt_prepare($stmt, $sql);
        mysqli_stmt_bind_param($stmt, "ssssi",$Name_Archivo,$nameFile,$tipoFile,$file,$ultimaID);
        mysqli_stmt_execute($stmt);
    } 
    
    /*Archivo*/
    if (!empty($_FILES['files']['name'][$Contador])) {
        $nameFile = $_FILES['files']['name'][$Contador];
        $tipoFile = $_FILES['files']['type'][$Contador];
        $file = file_get_contents($_FILES['files']['tmp_name'][$Contador]);

        /* Nombre identificador del archivo */
        $Name_Archivo = 'file_f_21';
        $Contador++;

        $sql = "INSERT INTO registro_archivos (nombreSeccion, nombreArchivo, tipoArchivo, dataArchivo, FK_Registro) VALUES (?,?,?,?,?)";        
        $stmt = mysqli_stmt_init($conn);
        mysqli_stmt_prepare($stmt, $sql);
        mysqli_stmt_bind_param($stmt, "ssssi",$Name_Archivo,$nameFile,$tipoFile,$file,$ultimaID);
        mysqli_stmt_execute($stmt);
    } 

    /*Archivo*/
    if (!empty($_FILES['files']['name'][$Contador])) {
        $nameFile = $_FILES['files']['name'][$Contador];
        $tipoFile = $_FILES['files']['type'][$Contador];
        $file = file_get_contents($_FILES['files']['tmp_name'][$Contador]);

        /* Nombre identificador del archivo */
        $Name_Archivo = 'file_constancia_fiscal';
        $Contador++;

        $sql = "INSERT INTO registro_archivos (nombreSeccion, nombreArchivo, tipoArchivo, dataArchivo, FK_Registro) VALUES (?,?,?,?,?)";        
        $stmt = mysqli_stmt_init($conn);
        mysqli_stmt_prepare($stmt, $sql);
        mysqli_stmt_bind_param($stmt, "ssssi",$Name_Archivo,$nameFile,$tipoFile,$file,$ultimaID);
        mysqli_stmt_execute($stmt);
    }  
    
    /*Archivo*/
    if (!empty($_FILES['files']['name'][$Contador])) {
        $nameFile = $_FILES['files']['name'][$Contador];
        $tipoFile = $_FILES['files']['type'][$Contador];
        $file = file_get_contents($_FILES['files']['tmp_name'][$Contador]);

        /* Nombre identificador del archivo */
        $Name_Archivo = 'file_comprobante_banco';
        $Contador++;

        $sql = "INSERT INTO registro_archivos (nombreSeccion, nombreArchivo, tipoArchivo, dataArchivo, FK_Registro) VALUES (?,?,?,?,?)";        
        $stmt = mysqli_stmt_init($conn);
        mysqli_stmt_prepare($stmt, $sql);
        mysqli_stmt_bind_param($stmt, "ssssi",$Name_Archivo,$nameFile,$tipoFile,$file,$ultimaID);
        mysqli_stmt_execute($stmt);
    } 
    
    /*Archivo*/
    if (!empty($_FILES['files']['name'][$Contador])) {
        $nameFile = $_FILES['files']['name'][$Contador];
        $tipoFile = $_FILES['files']['type'][$Contador];
        $file = file_get_contents($_FILES['files']['tmp_name'][$Contador]);

        /* Nombre identificador del archivo */
        $Name_Archivo = 'file_factura_cancelada';
        $Contador++;

        $sql = "INSERT INTO registro_archivos (nombreSeccion, nombreArchivo, tipoArchivo, dataArchivo, FK_Registro) VALUES (?,?,?,?,?)";        
        $stmt = mysqli_stmt_init($conn);
        mysqli_stmt_prepare($stmt, $sql);
        mysqli_stmt_bind_param($stmt, "ssssi",$Name_Archivo,$nameFile,$tipoFile,$file,$ultimaID);
        mysqli_stmt_execute($stmt);
    } 
    
    

    $observaciones32D = $_POST['observaciones32D'];
    $tiempoYforma = $_POST['tiempoYforma'];
    $tieneAdeudos = $_POST['tieneAdeudos'];
    $inscritaDNIAS = $_POST['inscritaDNIAS'];        
    $esquemasRecursosComp = $_POST['esquemasRecursosComp'];       



    $sql = "INSERT INTO historial_de_la_organizacion_3 (FK_Registro,observaciones32D,tiempoYforma,tieneAdeudos,inscritaDNIAS,esquemasRecursosComp) VALUES (?, ?, ?, ?, ?, ?)";  
    $stmt = mysqli_stmt_init($conn);
    mysqli_stmt_prepare($stmt, $sql);
    mysqli_stmt_bind_param($stmt, "isssss",$ultimaID,$observaciones32D,$tiempoYforma,$tieneAdeudos,$inscritaDNIAS,$esquemasRecursosComp);
    mysqli_stmt_execute($stmt);
    $ID_Table = $conn->insert_id;
    
    

    /* QUERY */

    if (!empty($_POST['inscritaDNIAS'])) {
        if ($inscritaDNIAS == "Si"){

            /*Archivo*/
            if (!empty($_FILES['files']['name'][$Contador])) {
                $nameFile= $_FILES['files']['name'][$Contador];
                $tipoFile = $_FILES['files']['type'][$Contador];
                $file = file_get_contents($_FILES['files']['tmp_name'][$Contador]);

                /* Nombre identificador del archivo */
                $Name_Archivo = 'file_dnias';
                $Contador++;

                $sql = "INSERT INTO registro_archivos (nombreSeccion, nombreArchivo, tipoArchivo, dataArchivo, FK_Registro) VALUES (?,?,?,?,?)";        
                $stmt = mysqli_stmt_init($conn);
                mysqli_stmt_prepare($stmt, $sql);
                mysqli_stmt_bind_param($stmt, "ssssi",$Name_Archivo,$nameFile,$tipoFile,$file,$ultimaID);
                mysqli_stmt_execute($stmt);
            }          
            
        }         
    }else{
        echo "<p class='Error_php'>Error: modificaciones a su acta constitutiva no ingresado...<p>";
    }

    if (!empty($_POST['esquemasRecursosComp'])) {
        if ($esquemasRecursosComp == "Si"){
            $organizacionManejoRecursos = $_POST['organizacionManejoRecursos'];

                $sql = "INSERT INTO esquemasrecursoscomp (FK_Historial_3, organizacionManejoRecursos) VALUES (?, ?)";  
                $stmt = mysqli_stmt_init($conn);
                mysqli_stmt_prepare($stmt, $sql);
                mysqli_stmt_bind_param($stmt, "is",$ID_Table,$organizacionManejoRecursos);
                mysqli_stmt_execute($stmt);

        }else{
            $organizacionManejoRecursos = "";
        } 
    }else{
        echo "<p class='Error_php'>Error: Campo esquemasRecursosComp no ingresado...<p>";
    }



    require"Registro_Succes.php";

   //header("Location: ../index.php");
	//exit();
}
else{
	header("Location: index.php");
	exit();		
}