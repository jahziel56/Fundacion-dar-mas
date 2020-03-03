<?php
/* METODO: evitar que el usuario ingrese a esta pagina php desde la barra de busqueda */
/* signup-submit es el boton del formulario que se encuentra en la signup.php */
if (isset($_POST['submit'])) {
	unset($_POST['submit']);
	/* manda a llamar a la pagina php donde se conecta a la base de datos de esta forma se ahorra codigo y se tiene todo en una funcion mas simple */
    require 'includes/dbh.inc.php'; 
	
	//correcciones_registro (ID_Correcion_R) (FK_Correcion_R)
	$ID_Correcion = $_POST['ID_Registro'];
	unset($_POST['ID_Registro']);

    echo "<pre>";
    //print_r($_POST);
    echo "</pre>";

    $sql = "SELECT * FROM correcciones_registro WHERE ID_Correcion_R=?;";
    $stmt = mysqli_stmt_init($conn);
    mysqli_stmt_prepare($stmt, $sql);
    mysqli_stmt_bind_param($stmt, "i", $ID_Correcion);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
	$row = mysqli_fetch_assoc($result);
	$ID_Registro = $row['FK_Registro'];


	$sql = "SELECT * FROM detalle_correcciones_registro WHERE FK_Correcion_R=?;";
    $stmt = mysqli_stmt_init($conn);
    mysqli_stmt_prepare($stmt, $sql);
    mysqli_stmt_bind_param($stmt, "i", $ID_Correcion);
    mysqli_stmt_execute($stmt);
    $a = mysqli_stmt_get_result($stmt);

    if (empty($a)) {
    	echo "Fatal Error: Resultado Detalle Empty";
    	exit;
    }

	$Contador = 0;
	date_default_timezone_set('America/Hermosillo');
	$CurrentDate = date("Y-m-j H:i:s");

	//$Table = 'registro';
	//$Update = 'Estado';
	//$Estado = 'No revisado';


	foreach ($a as $row) {


		switch ($row['Pregunta']) {

		    //---- datos_generales
		    case '1':

		    	$Correos_1 = $_POST['Correos_1'];
			    $Correo_Organizacion = $_POST['Correo_Organizacion']; 
			    $Correo_Organizacion .='@';
			    $Correo_Organizacion .=$Correos_1;

			    $Table = 'datos_generales';
			    $Update = 'Correo_Organizacion';

				Update_registro($Table,$Update,$Correo_Organizacion,$ID_Registro,$conn);
		    	break;

		    case '2':
		    	$rfcHomoclave = $_POST['rfcHomoclave'];

		    	$Table = 'datos_generales';
			    $Update = 'rfcHomoclave';

				Update_registro($Table,$Update,$rfcHomoclave,$ID_Registro,$conn);
		    	break;

		    case '3':

		    	//--- ARCHIVO ---//
		        $Name_Archivo = 'file_rfc';
				Archivo_get($CurrentDate, $ID_Registro, $Name_Archivo, $conn, $Contador);
		        $Contador++;
		    	break;

		   	case '4':
    			$CLUNI = $_POST['CLUNI'];

    			$Table = 'datos_generales';
			    $Update = 'CLUNI';

			   	Update_registro($Table,$Update,$CLUNI,$ID_Registro,$conn); 
		    	break;
		    case '5':

		    	//--- ARCHIVO ---//
        		$Name_Archivo = 'file_cluni';
				Archivo_get($CurrentDate, $ID_Registro, $Name_Archivo, $conn, $Contador);
		        $Contador++;
		    	break;

		    case '6':
		    	$nombreOSC = $_POST['nombreOSC'];    
			    $Table = 'datos_generales';
			    $Update = 'nombreOSC';
			   	Update_registro($Table,$Update,$nombreOSC,$ID_Registro,$conn); 

		    	break;
		    case '7':
		        $objetoSocialOrganizacion = $_POST['objetoSocialOrganizacion'];
			    $Table = 'datos_generales';
			    $Update = 'objetoSocialOrganizacion';
			   	Update_registro($Table,$Update,$objetoSocialOrganizacion,$ID_Registro,$conn); 

		    	break;
		    case '8':
		        $mision = $_POST['mision'];
			    $Table = 'datos_generales';
			    $Update = 'mision';
			   	Update_registro($Table,$Update,$mision,$ID_Registro,$conn); 

		    	break;
		    case '9':
		        $vision = $_POST['vision'];
			    $Table = 'datos_generales';
			    $Update = 'vision';
			   	Update_registro($Table,$Update,$vision,$ID_Registro,$conn); 

		    	break;
		    case '10':
		   	    $areasAtencion = $_POST['areasAtencion'];
			    $Table = 'datos_generales';
			    $Update = 'areasAtencion';
			   	Update_registro($Table,$Update,$areasAtencion,$ID_Registro,$conn); 

		    	break;
		    case '11':
		        $tema_de_Derecho_Social = $_POST['tema_de_Derecho_Social'];
			    $Table = 'datos_generales';
			    $Update = 'tema_de_Derecho_Social';
			   	Update_registro($Table,$Update,$tema_de_Derecho_Social,$ID_Registro,$conn); 

		    	break;

		    //---- domicilio
		    case '12':
		        $calle = $_POST['calle'];
		    	$Table = 'domicilio';
		    	$Update = 'calle';
		    	Update_registro($Table,$Update,$calle,$ID_Registro,$conn); 

		    	break;
		    case '13':
		        $domicilio = $_POST['colonia'];
		    	$Table = 'domicilio';
		    	$Update = 'domicilio';
		    	Update_registro($Table,$Update,$domicilio,$ID_Registro,$conn); 

		    	break;
		    case '14':
		        $colonia = $_POST['codigoPostal'];
		    	$Table = 'domicilio';
		    	$Update = 'colonia';
		    	Update_registro($Table,$Update,$colonia,$ID_Registro,$conn); 

		    	break;
		    case '15':
		        $codigoPostal = $_POST['localidad'];
		    	$Table = 'domicilio';
		    	$Update = 'codigoPostal';
		    	Update_registro($Table,$Update,$codigoPostal,$ID_Registro,$conn); 

		    	break;
		    case '16':
		        $localidad = $_POST['domicilio'];
		    	$Table = 'domicilio';
		    	$Update = 'localidad';
		    	Update_registro($Table,$Update,$localidad,$ID_Registro,$conn); 

		    	break;
		    case '17':
		        $municipioRegistroOSC = $_POST['municipioRegistroOSC'];    
		    	$Table = 'domicilio';
		    	$Update = 'municipioRegistroOSC';
		    	Update_registro($Table,$Update,$municipioRegistroOSC,$ID_Registro,$conn); 

		    	break;
		    //---- contacto
		    case '20':
    			$phoneOficina = $_POST['phoneOficina'];
		    	$Table = 'contacto';
		    	$Update = 'phoneOficina';
		    	Update_registro($Table,$Update,$phoneOficina,$ID_Registro,$conn); 

		    	break;
		    case '21':
    			$phoneCelular = $_POST['phoneCelular'];
		    	$Table = 'contacto';
		    	$Update = 'phoneCelular';
		    	Update_registro($Table,$Update,$phoneCelular,$ID_Registro,$conn); 

		    	break;
		    case '22':
    			$emailContacto = $_POST['emailContacto'];
		    	$Table = 'contacto';
		    	$Update = 'emailContacto';
		    	Update_registro($Table,$Update,$emailContacto,$ID_Registro,$conn); 

		    	break;
		    case '23':
    			$paginaWeb = $_POST['paginaWeb'];
		    	$Table = 'contacto';
		    	$Update = 'paginaWeb';
		    	Update_registro($Table,$Update,$paginaWeb,$ID_Registro,$conn); 

		    	break;
		    case '24':
    			$organizacionFB = $_POST['organizacionFB'];
		    	$Table = 'contacto';
		    	$Update = 'organizacionFB';
		    	Update_registro($Table,$Update,$organizacionFB,$ID_Registro,$conn); 

		    	break;
		    case '25':
    			$organizacionTW = $_POST['organizacionTW'];
		    	$Table = 'contacto';
		    	$Update = 'organizacionTW';
		    	Update_registro($Table,$Update,$organizacionTW,$ID_Registro,$conn); 

		    	break;
		    case '26':
    			$organizacionInsta = $_POST['organizacionInsta'];
		    	$Table = 'contacto';
		    	$Update = 'organizacionInsta';
		    	Update_registro($Table,$Update,$organizacionInsta,$ID_Registro,$conn); 

		    	break;
		    //---- domicilio_social_legal
		    case '27':
    			$domicilio_social_legal = $_POST['domicilio_social_legal']; 
		    	$Table = 'domicilio';
		    	$Update = 'domicilio_social_legal';
		    	Update_registro($Table,$Update,$domicilio_social_legal,$ID_Registro,$conn); 

		    	break;
		    case '27a':
            	$municipio_Dom = $_POST['municipio_Dom'];
		    	$Table = 'domicilio_social_legal';
		    	$Update = 'municipio_Dom';
		    	Update_registro($Table,$Update,$municipio_Dom,$ID_Registro,$conn); 

		    	break;
		    case '27b':
            	$domicilio_Dom = $_POST['domicilio_Dom'];
		    	$Table = 'domicilio_social_legal';
		    	$Update = 'domicilio_Dom';
		    	Update_registro($Table,$Update,$domicilio_Dom,$ID_Registro,$conn); 

		    	break;
		    case '27c':
            	$localidad_Dom = $_POST['localidad_Dom'];
		    	$Table = 'domicilio_social_legal';
		    	$Update = 'localidad_Dom';
		    	Update_registro($Table,$Update,$localidad_Dom,$ID_Registro,$conn); 

		    	break;
		    //---- historial_de_la_organizacion		    	
		    case '28':

		    	//--- ARCHIVO ---//
        		$Name_Archivo = 'file_acta_const';
				Archivo_get($CurrentDate, $ID_Registro, $Name_Archivo, $conn, $Contador);
		        $Contador++;
		    	break;

		    case '29':

		    	//--- ARCHIVO ---//
        		$Name_Archivo = 'file_acta_protoco';
				Archivo_get($CurrentDate, $ID_Registro, $Name_Archivo, $conn, $Contador);
		        $Contador++;
		    	break;

		    case '30':

		    	//--- ARCHIVO ---//
		        $Name_Archivo = 'file_ine_repre';
				Archivo_get($CurrentDate, $ID_Registro, $Name_Archivo, $conn, $Contador);
		        $Contador++;
		    	break;

		    case '31':
    			$nombreRepresentante = $_POST['nombreRepresentante'];
		    	$Table = 'historial_de_la_organizacion';
		    	$Update = 'nombreRepresentante';
		    	Update_registro($Table,$Update,$nombreRepresentante,$ID_Registro,$conn); 

		    	break;
		    case '32':
    			$idRepresentante = $_POST['idRepresentante'];
		    	$Table = 'historial_de_la_organizacion';
		    	$Update = 'idRepresentante';
		    	Update_registro($Table,$Update,$idRepresentante,$ID_Registro,$conn); 

		    	break;
		    case '33':
    			$fechaConstitucionOSC = $_POST['fechaConstitucionOSC'];
		    	$Table = 'historial_de_la_organizacion';
		    	$Update = 'fechaConstitucionOSC';
		    	Update_registro($Table,$Update,$fechaConstitucionOSC,$ID_Registro,$conn); 

		    	break;
		    case '34':
    			$nombreNotario = $_POST['nombreNotario'];
		    	$Table = 'historial_de_la_organizacion';
		    	$Update = 'nombreNotario';
		    	Update_registro($Table,$Update,$nombreNotario,$ID_Registro,$conn); 

		    	break;
		    case '35':
    			$numeroNotario = $_POST['numeroNotario'];
		    	$Table = 'historial_de_la_organizacion';
		    	$Update = 'numeroNotario';
		    	Update_registro($Table,$Update,$numeroNotario,$ID_Registro,$conn); 

		    	break;
		    case '36':
    			$municipioNotaria = $_POST['municipioNotaria'];
		    	$Table = 'historial_de_la_organizacion';
		    	$Update = 'municipioNotaria';
		    	Update_registro($Table,$Update,$municipioNotaria,$ID_Registro,$conn); 

		    	break;
		    case '37':
    			$noEstrituraPublica = $_POST['noEstrituraPublica'];
		    	$Table = 'historial_de_la_organizacion';
		    	$Update = 'noEstrituraPublica';
		    	Update_registro($Table,$Update,$noEstrituraPublica,$ID_Registro,$conn); 

		    	break;
		    case '38':
    			$volumenEstrituraPublica = $_POST['volumenEstrituraPublica'];
		    	$Table = 'historial_de_la_organizacion';
		    	$Update = 'volumenEstrituraPublica';
		    	Update_registro($Table,$Update,$volumenEstrituraPublica,$ID_Registro,$conn); 

		    	break;
		    case '39':
    			$fechaEstritura = $_POST['fechaEstritura'];
		    	$Table = 'historial_de_la_organizacion';
		    	$Update = 'fechaEstritura';
		    	Update_registro($Table,$Update,$fechaEstritura,$ID_Registro,$conn); 

		    	break;

		    //---- acta_constitutiva		    	
		    case '40':

		    	//--- ARCHIVO ---//
		        $Name_Archivo = 'file_rpp_icreson';
				Archivo_get($CurrentDate, $ID_Registro, $Name_Archivo, $conn, $Contador);
		        $Contador++;
		    	break;

		    case '41':
    			$numeroLibro = $_POST['numeroLibro'];
		    	$Table = 'acta_constitutiva';
		    	$Update = 'numeroLibro';
		    	Update_registro($Table,$Update,$numeroLibro,$ID_Registro,$conn); 

		    	break;
		    case '42':
    			$numeroInscripcion = $_POST['numeroInscripcion'];    
		    	$Table = 'acta_constitutiva';
		    	$Update = 'numeroInscripcion';
		    	Update_registro($Table,$Update,$numeroInscripcion,$ID_Registro,$conn); 

		    	break;
		    case '43':
    			$volumenICRESON = $_POST['volumenICRESON'];
		    	$Table = 'acta_constitutiva';
		    	$Update = 'volumenICRESON';
		    	Update_registro($Table,$Update,$volumenICRESON,$ID_Registro,$conn); 

		    	break;
		    case '44':
    			$existenModis = $_POST['existenModis'];
		    	$Table = 'acta_constitutiva';
		    	$Update = 'existenModis';
		    	Update_registro($Table,$Update,$existenModis,$ID_Registro,$conn); 

		    	break;
		    case '44a':

		    	//--- ARCHIVO ---//
		        $Name_Archivo = 'file_ultima_acta';
				Archivo_get($CurrentDate, $ID_Registro, $Name_Archivo, $conn, $Contador);
		        $Contador++;
		    	break;

		    case '44b':
            	$ultimaModi = $_POST['ultimaModi'];
		    	$Table = 'existenmodis';
		    	$Update = 'ultimaModi';
		    	Update_registro($Table,$Update,$ultimaModi,$ID_Registro,$conn); 

		    	break;
		    case '44c':

		    	//--- ARCHIVO ---//
		        $Name_Archivo = 'file_rpp_ultima_acta';
				Archivo_get($CurrentDate, $ID_Registro, $Name_Archivo, $conn, $Contador);
		        $Contador++;
		    	break;

		    case '44d':
            	$numeroActaConsti = $_POST['numeroActaConsti'];
		    	$Table = 'existenmodis';
		    	$Update = 'numeroActaConsti';
		    	Update_registro($Table,$Update,$numeroActaConsti,$ID_Registro,$conn); 

		    	break;
		    case '44e':
            	$volumenActaConsti = $_POST['volumenActaConsti'];
		    	$Table = 'existenmodis';
		    	$Update = 'volumenActaConsti';
		    	Update_registro($Table,$Update,$volumenActaConsti,$ID_Registro,$conn); 

		    	break;	
		    case '45':
    			$autorizadaDeducible = $_POST['autorizadaDeducible'];        
		    	$Table = 'acta_constitutiva';
		    	$Update = 'autorizadaDeducible';
		    	Update_registro($Table,$Update,$municipioRegistroOSC,$ID_Registro,$conn); 

		    	break;
		    case '45a':

		    	//--- ARCHIVO ---//
		        $Name_Archivo = 'file_pagina_diario_Oficial';
				Archivo_get($CurrentDate, $ID_Registro, $Name_Archivo, $conn, $Contador);
		        $Contador++;
		    	break;

		    case '45b':
            	$numeroDiario = $_POST['numeroDiario'];
		    	$Table = 'autorizadadeducible';
		    	$Update = 'numeroDiario';
		    	Update_registro($Table,$Update,$numeroDiario,$ID_Registro,$conn); 

		    	break;
		    case '45c':
            	$fechaDiario = $_POST['fechaDiario'];
		    	$Table = 'autorizadadeducible';
		    	$Update = 'fechaDiario';
		    	Update_registro($Table,$Update,$fechaDiario,$ID_Registro,$conn); 

		    	break;
		    case '45d':
            	$detenidoAutorizado = $_POST['detenidoAutorizado'];
		    	$Table = 'autorizadadeducible';
		    	$Update = 'detenidoAutorizado';
		    	Update_registro($Table,$Update,$detenidoAutorizado,$ID_Registro,$conn); 

		    	break;
		    case '45e':
                $razonDetenido = $_POST['razonDetenido'];
		    	$Table = 'detenidoautorizado';
		    	$Update = 'razonDetenido';
		    	Update_registro($Table,$Update,$razonDetenido,$ID_Registro,$conn); 

		    	break;	
		    case '45f':
            	$fechaAutorizada = $_POST['fechaAutorizada'];
		    	$Table = 'autorizadadeducible';
		    	$Update = 'fechaAutorizada';
		    	Update_registro($Table,$Update,$fechaAutorizada,$ID_Registro,$conn); 

		    	break;
		    //---- historial_de_la_organizacion_2		    	
		    case '46':
    			$digiridaPor = $_POST['digiridaPor'];
		    	$Table = 'historial_de_la_organizacion_2';
		    	$Update = 'digiridaPor';
		    	Update_registro($Table,$Update,$digiridaPor,$ID_Registro,$conn); 

		    	break;
		    case '47':
    			$nombrePresi = $_POST['nombrePresi'];
		    	$Table = 'historial_de_la_organizacion_2';
		    	$Update = 'nombrePresi';
		    	Update_registro($Table,$Update,$nombrePresi,$ID_Registro,$conn); 

		    	break;
		    case '48':
    			$numeroEmpleados = $_POST['numeroEmpleados'];
		    	$Table = 'historial_de_la_organizacion_2';
		    	$Update = 'numeroEmpleados';
		    	Update_registro($Table,$Update,$numeroEmpleados,$ID_Registro,$conn); 

		    	break;
		    case '49':
    			$numeroVoluntarios = $_POST['numeroVoluntarios'];
		    	$Table = 'historial_de_la_organizacion_2';
		    	$Update = 'numeroVoluntarios';
		    	Update_registro($Table,$Update,$numeroVoluntarios,$ID_Registro,$conn); 

		    	break;		    
		    case '50':
    			$principalesLogros = $_POST['principalesLogros'];
		    	$Table = 'historial_de_la_organizacion_2';
		    	$Update = 'principalesLogros';
		    	Update_registro($Table,$Update,$principalesLogros,$ID_Registro,$conn); 

		    	break;
		    case '51':
    			$metasOrganizacion = $_POST['metasOrganización'];
		    	$Table = 'historial_de_la_organizacion_2';
		    	$Update = 'metasOrganizacion';
		    	Update_registro($Table,$Update,$metasOrganizacion,$ID_Registro,$conn); 

		    	break;
		    case '52':
    			$principalesAlianzas = $_POST['principalesAlianzas'];
		    	$Table = 'historial_de_la_organizacion_2';
		    	$Update = 'principalesAlianzas';
		    	Update_registro($Table,$Update,$principalesAlianzas,$ID_Registro,$conn); 

		    	break;
		    case '53':
    			$numeroBeneficiados = $_POST['numeroBeneficiados'];
		    	$Table = 'historial_de_la_organizacion_2';
		    	$Update = 'numeroBeneficiados';
		    	Update_registro($Table,$Update,$numeroBeneficiados,$ID_Registro,$conn); 

		    	break;
		    //---- poblacion_beneficiada
		    case '54':
		    	$poblacion_0_4 = $_POST['poblacion_0_4'];
			    $poblacion_5_14 = $_POST['poblacion_5_14'];
			    $poblacion_15_29 = $_POST['poblacion_15_29'];
			    $poblacion_30_44 = $_POST['poblacion_30_44'];
			    $poblacion_45_64 = $_POST['poblacion_45_64'];
			    $poblacion_65_mas = $_POST['poblacion_65_mas'];

				$sql = "UPDATE poblacion_beneficiada SET poblacion_0_4  = ?,poblacion_5_14  = ?,poblacion_15_29  = ?, poblacion_30_44  = ?,poblacion_45_64  = ?,poblacion_65_mas  = ? WHERE FK_Registro=?;";        
				$stmt = mysqli_stmt_init($conn);
				if (!mysqli_stmt_prepare($stmt, $sql)) {
					//header("Location: ../../index.php?SQL=Error_Update");
					exit();
				}else{
    				mysqli_stmt_bind_param($stmt, "iiiiiii", $poblacion_0_4,$poblacion_5_14,$poblacion_15_29,$poblacion_30_44,$poblacion_45_64, $poblacion_65_mas, $ID_Registro);
					if(!mysqli_stmt_execute($stmt)){
						throw new Exception('error!');
					}
				}

		    	break;
		    case '55':
    			$observaciones32D = $_POST['observaciones32D'];
		    	$Table = 'historial_de_la_organizacion_3';
		    	$Update = 'observaciones32D';
		    	Update_registro($Table,$Update,$observaciones32D,$ID_Registro,$conn); 

		    	break;
		    case '56':

		    	//--- ARCHIVO ---//
		        $Name_Archivo = 'file_32_d';
				Archivo_get($CurrentDate, $ID_Registro, $Name_Archivo, $conn, $Contador);
		        $Contador++;
		    	break;

		    case '57':
    			$tiempoYforma = $_POST['tiempoYforma'];
		    	$Table = 'historial_de_la_organizacion_3';
		    	$Update = 'tiempoYforma';
		    	Update_registro($Table,$Update,$tiempoYforma,$ID_Registro,$conn); 

		    	break;
		    case '58':
    			$tieneAdeudos = $_POST['tieneAdeudos'];
		    	$Table = 'historial_de_la_organizacion_3';
		    	$Update = 'tieneAdeudos';
		    	Update_registro($Table,$Update,$tieneAdeudos,$ID_Registro,$conn); 

		    	break;
		    case '59':

		    	//--- ARCHIVO ---//
		        $Name_Archivo = 'file_f_21';
				Archivo_get($CurrentDate, $ID_Registro, $Name_Archivo, $conn, $Contador);
		        $Contador++;
		    	break;

		    case '60':

		    	//--- ARCHIVO ---//
		        $Name_Archivo = 'file_constancia_fiscal';
				Archivo_get($CurrentDate, $ID_Registro, $Name_Archivo, $conn, $Contador);
		        $Contador++;
		    	break;

		    case '61':

		    	//--- ARCHIVO ---//
		        $Name_Archivo = 'file_comprobante_banco';
				Archivo_get($CurrentDate, $ID_Registro, $Name_Archivo, $conn, $Contador);
		        $Contador++;
		    	break;

		    case '62':

		    	//--- ARCHIVO ---//
		        $Name_Archivo = 'file_factura_cancelada';
				Archivo_get($CurrentDate, $ID_Registro, $Name_Archivo, $conn, $Contador);
		        $Contador++;
		    	break;

		    case '63':
    			$inscritaDNIAS = $_POST['inscritaDNIAS'];        
		    	$Table = 'historial_de_la_organizacion_3';
		    	$Update = 'inscritaDNIAS';
		    	Update_registro($Table,$Update,$inscritaDNIAS,$ID_Registro,$conn); 

		    	break;
		    case '63a':

		    	//--- ARCHIVO ---//
		        $Name_Archivo = 'file_dnias';
				Archivo_get($CurrentDate, $ID_Registro, $Name_Archivo, $conn, $Contador);
		        $Contador++;
		    	break;

		    case '64':
    			$esquemasRecursosComp = $_POST['esquemasRecursosComp'];       
		    	$Table = 'historial_de_la_organizacion_3';
		    	$Update = 'esquemasRecursosComp';
		    	Update_registro($Table,$Update,$esquemasRecursosComp,$ID_Registro,$conn); 

		    	break;
		    case '64a':
            	$organizacionManejoRecursos = $_POST['organizacionManejoRecursos'];
		    	$Table = 'esquemasrecursoscomp';
		    	$Update = 'organizacionManejoRecursos';
		    	Update_registro($Table,$Update,$organizacionManejoRecursos,$ID_Registro,$conn);

		    	break;
		}
	}

	Update_registro('correcciones_registro','correciones','No',$ID_Registro,$conn);

	$Dato = 'Corregido';
	$sql = "UPDATE registro SET Estado = ? WHERE ID_Registro=?;";        
	$stmt = mysqli_stmt_init($conn);
	if (!mysqli_stmt_prepare($stmt, $sql)) {
		//header("Location: ../../index.php?SQL=Error_Update");
		exit();
	}else{
		mysqli_stmt_bind_param($stmt, "si", $Dato,$ID_Registro);
		if(!mysqli_stmt_execute($stmt)){
			throw new Exception('error!');
		}
	}



    header("Location: Notificaciones.php");
	exit();
}else{
	header("Location: index.php");
	exit();		
}






function Update_registro($Table,$Update,$Dato,$ID_Registro,$conn){

	$sql = "UPDATE $Table SET $Update = ? WHERE FK_Registro=?;";        
	$stmt = mysqli_stmt_init($conn);
	if (!mysqli_stmt_prepare($stmt, $sql)) {
		//header("Location: ../../index.php?SQL=Error_Update");
		exit();
	}else{
		mysqli_stmt_bind_param($stmt, "si", $Dato,$ID_Registro);
		if(!mysqli_stmt_execute($stmt)){
			throw new Exception('error!');
		}
	}
}

function Update_archivos($nameFile,$tipoFile,$file,$CurrentDate,$ID_Registro,$Name_Archivo,$conn){

	$sql = "UPDATE registro_archivos SET nombreArchivo=?,tipoArchivo=?,dataArchivo=? WHERE FK_Registro=? && nombreSeccion=? ;";
    $stmt = mysqli_stmt_init($conn);
    mysqli_stmt_prepare($stmt, $sql);
    mysqli_stmt_bind_param($stmt, "sssis",$nameFile,$tipoFile,$file,$ID_Registro,$Name_Archivo);
    mysqli_stmt_execute($stmt);

}

function Archivo_get($CurrentDate, $ID_Registro, $Name_Archivo, $conn, $Contador){
	$nameFile = $_FILES['files']['name'][$Contador];
	$tipoFile = $_FILES['files']['type'][$Contador];
	$file = file_get_contents($_FILES['files']['tmp_name'][$Contador]);

	Update_archivos($nameFile,$tipoFile,$file,$CurrentDate,$ID_Registro,$Name_Archivo,$conn);
}
