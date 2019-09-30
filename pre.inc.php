<?php
/* METODO: evitar que el usuario ingrese a esta pagina php desde la barra de busqueda */
/* signup-submit es el boton del formulario que se encuentra en la signup.php */
?>
<style>.Error_php{background: #CB4335; padding-left: 10px;}</style>
<?php



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
                //header("Location: pre.inc.php");
                //exit();
                echo "Error: Ya existe un registro con ese rfc:$rfcHomoclave<br>";
                //exit();
            }else{
                echo "Creado Exitosamente<br>";
            }
        }

        $Clave = substr(md5(microtime()), 1, 8);

        echo "Clave:$Clave <br> RFC:$rfcHomoclave";

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



/* ------------------------------- domicilio ---------------------------------------------- */
    $calle = $_POST['calle'];
    $domicilio = $_POST['domicilio'];
    $colonia = $_POST['colonia'];
    $codigoPostal = $_POST['codigoPostal'];
    $localidad = $_POST['localidad'];
    $municipioRegistroOSC = $_POST['municipioRegistroOSC'];    

    $Latitud = $_POST['Latitud'];
    $Longitud = $_POST['Longitud'];

    /*$sql = "INSERT INTO domicilio (calle, domicilio, colonia, codigoPostal, localidad, municipioRegistroOSC, Latitud, Longitud, domicilio_social_legal,  FK_FormularioID) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";        
        $stmt = mysqli_stmt_init($conn);
        mysqli_stmt_prepare($stmt, $sql);
        mysqli_stmt_bind_param($stmt, "sssssssssi",$calle,$domicilio,$colonia,$codigoPostal,$localidad,$municipioRegistroOSC,$Latitud,$Longitud,$domicilio_social_legal,$ultimaID);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);*/

    if (!empty($_POST['domicilio_social_legal'])) {
        $domicilio_social_legal = $_POST['domicilio_social_legal'];       
        if ($domicilio_social_legal == "No"){
            $municipio_Dom = $_POST['municipio_Dom'];
            $domicilio_Dom = $_POST['domicilio_Dom'];
            $localidad_Dom = $_POST['localidad_Dom'];
            
            /* QUERY */
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

    if (empty($organizacionTW)){
        $organizacionTW = 'Sin Twitter';
    }

    if (empty($organizacionInsta)){
        $organizacionInsta = 'Sin Instagram';
    }
    
    /* QUERY */

/* ------------------------------- Historial_de_la_organización ---------------------------------------------- */

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

/* ------------------------------- Acta_Constitutiva ---------------------------------------------- */

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
    
    

    /* QUERY */

    if (!empty($_POST['existenModis'])) {
        $existenModis = $_POST['existenModis'];
       
        if ($existenModis == "Si"){
            $ultimaModi = $_POST['ultimaModi'];
            $numeroActaConsti = $_POST['numeroActaConsti'];
            $volumenActaConsti = $_POST['volumenActaConsti'];

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
            //echo "Nada";            
        } 
    }else{
        echo "<p class='Error_php'>Error: ha tenido modificaciones a su acta constitutiva no ingresado...<p>";
    }
    $Contador+=2;


    
    if (!empty($_POST['autorizadaDeducible'])) {
    $autorizadaDeducible = $_POST['autorizadaDeducible'];        
        if ($autorizadaDeducible == "Si"){
            $numeroDiario = $_POST['numeroDiario'];
            $fechaDiario = $_POST['fechaDiario'];
            
            $fechaAutorizada = $_POST['fechaAutorizada'];

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
            
            
            /* QUERY */


            if (!empty($_POST['detenidoAutorizado'])) {
                $detenidoAutorizado = $_POST['detenidoAutorizado'];
                if ($detenidoAutorizado == "Si"){
                    $razonDetenido = $_POST['razonDetenido'];

                    //echo "$razonDetenido";
                    
                    /* QUERY */
                }else{
                    $razonDetenido = "";
                    //echo "Nada";            
                } 
            }else{
                echo "<p class='Error_php'>Error: Campo donativos deducibles de impuestos no ingresado...<p>";                
            }

        }else{
            $numeroDiario = "";
            $fechaDiario = "";
            $detenidoAutorizado = "";
            $fechaAutorizada = "";
            //echo "Nada";            
        } 
    }else{
        echo "<p class='Error_php'>Error: Campo donativos deducibles de impuestos no ingresado...<p>";
    }
    $Contador++;      
   
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
    
    

    /* QUERY */

    if (!empty($_POST['inscritaDNIAS'])) {
    $inscritaDNIAS = $_POST['inscritaDNIAS'];        
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

            
            
            /* QUERY */
        }else{
            
            //echo "Nada";            
        } 
    }else{
        echo "<p class='Error_php'>Error: modificaciones a su acta constitutiva no ingresado...<p>";
    }

    if (!empty($_POST['esquemasRecursosComp'])) {
    $esquemasRecursosComp = $_POST['esquemasRecursosComp'];       
        if ($esquemasRecursosComp == "Si"){
            $organizacionManejoRecursos = $_POST['organizacionManejoRecursos'];

            //echo "$organizacionManejoRecursos";
            
            /* QUERY */
        }else{
            $organizacionManejoRecursos = "";
            //echo "Nada";            
        } 
    }else{
        echo "<p class='Error_php'>Error: Campo esquemasRecursosComp no ingresado...<p>";
    }



    require"Pre_Registro_New_Ver.php";

    echo "<br><br>Guardado...";
    //header("Location: ../index.php");
	//exit();
}
else{
	//header("Location: ../index.php");
	//exit();		
}