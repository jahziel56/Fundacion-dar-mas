<?php
	require"classes/header.php";	
	require 'includes/dbh.inc.php';
	require 'no_login.php';

    $ID_Selected = isset($_GET['id'])? $_GET['id'] : "";
    $ID_Cuenta = $_SESSION['user_Id'];
    date_default_timezone_set('America/Hermosillo');

	mysqli_begin_transaction($conn);
	$conn->autocommit(FALSE);

	if ($_SESSION['Type_User'] == 2) {

	 	if (empty(Query_select("SELECT * FROM revisando WHERE FK_Registro=?;",$ID_Selected,$conn))) {

	 		 $sql = "SELECT * FROM revisando INNER JOIN empleados ON revisando.FK_Empleado = empleados.EmpleadoID WHERE empleados.FK_Cuenta=?;";

	 		/* Si existe un empleado en la tabla solo updatea los datos, si no existe agrega los datos a la tabla */
	 		if (!empty ($Row=Query_select($sql,$ID_Cuenta,$conn))) {

	    		//echo "ya estabas revisando una convocatoria<br>";
	    		Query_update_registro('No Revisado',$Row['FK_Registro'],$conn);
	    			
	    		//echo "esta es tu nueva convocatoria";
	    		Query_update($ID_Selected,$Row['FK_Registro'],$conn);

	    	}else{
	    		//echo "No tenias convocatoria";
	    		Query_insert($ID_Selected,$ID_Cuenta,$conn);	
	    	}

	    		Query_update_registro('Revision',$ID_Selected,$conn);
	    		
	 	}else{
	 		$sql = "SELECT * FROM revisando INNER JOIN empleados ON revisando.FK_Empleado = empleados.EmpleadoID WHERE empleados.FK_Cuenta=?;";
	 		if (!empty (Query_select($sql,$ID_Cuenta,$conn))) {
	 			//echo "tu estas revisando este registro";
	 		}else{
	 			//echo "Error: Alguien se encuentra revisando este registro.";
	 			header("Location: Registro_Lista.php?error=revisando");	
	 		}
	 	}

	} else {
        echo '<br><p style="color: gray; text-align: center;">Solo lectura</p>';
	}


	function Query_select($sql,$D,$conn){	
		$stmt = mysqli_stmt_init($conn);
		if (!mysqli_stmt_prepare($stmt, $sql)) {
			echo 'Error: SQL Conection.';
			exit();		
		}else{
			mysqli_stmt_bind_param($stmt, "i" , $D);
			mysqli_stmt_execute($stmt);
			$result = mysqli_stmt_get_result($stmt);
			$row = mysqli_fetch_assoc($result);
			return $row;
		}
	}

	function Query_insert($FK_Registro,$FK_Usuario,$conn){
 		$sql = "SELECT * FROM empleados WHERE FK_Cuenta=?;";
		$stmt = mysqli_stmt_init($conn);
		if (!mysqli_stmt_prepare($stmt, $sql)) {
			echo 'Error: SQL Conection.';
			exit();		
		}else{
			mysqli_stmt_bind_param($stmt, "i" , $FK_Usuario);
			mysqli_stmt_execute($stmt);
			$result = mysqli_stmt_get_result($stmt);
			$row = mysqli_fetch_assoc($result);
		}

		$sql = "INSERT INTO revisando (FK_Registro, FK_Empleado) VALUES (?, ?)";	
		$stmt = mysqli_stmt_init($conn);
		if (!mysqli_stmt_prepare($stmt, $sql)) {
			echo 'Error: SQL Conection.';
			exit();		
		}else{
			mysqli_stmt_bind_param($stmt, "ii" , $FK_Registro,$row['EmpleadoID']);
			mysqli_stmt_execute($stmt);
		}
	}



	function Query_update($Nuevo,$Viejo,$conn){
		$sql = "UPDATE revisando SET FK_Registro=?,Fecha=? WHERE FK_Registro=?;";
		$stmt = mysqli_stmt_init($conn);
		if (!mysqli_stmt_prepare($stmt, $sql)) {
			echo 'Error: SQL Conection.';
			exit();		
		}else{
			mysqli_stmt_bind_param($stmt, "isi" , $Nuevo,$Fecha,$Viejo);
			mysqli_stmt_execute($stmt);
		}
	}

	function Query_update_registro($Estado,$ID_Registro,$conn){
		$sql = "UPDATE registro SET Estado=? WHERE ID_Registro=?;";
		$stmt = mysqli_stmt_init($conn);
		if (!mysqli_stmt_prepare($stmt, $sql)) {
			echo 'Error: SQL Conection.';
			exit();		
		}else{
			mysqli_stmt_bind_param($stmt, "si" , $Estado,$ID_Registro);
			mysqli_stmt_execute($stmt);
		}
	}



	$sql = "SELECT * FROM registro INNER JOIN datos_generales on registro.ID_Registro = datos_generales.FK_Registro WHERE registro.ID_Registro=?;";
	$stmt = mysqli_stmt_init($conn);
	if (!mysqli_stmt_prepare($stmt, $sql)) {
		//header("Location: ../login.php?error=sqlerror");
		echo 'error';
		exit();		
	}else{
		mysqli_stmt_bind_param($stmt, "i", $ID_Selected);
		mysqli_stmt_execute($stmt);
		$result = mysqli_stmt_get_result($stmt);
		$row = mysqli_fetch_assoc($result);

		$Num_Reviciones = $row['Num_Reviciones'];
	}

	$conn->commit();








	if ($Num_Reviciones > 3) {	

		if ($_SESSION['Type_User'] == 2) {
			$_SESSION['Rechazado_Datos'] = $ID_Selected;
		    header("Location: Justificar_Rechazo.php?id=$ID_Selected");
		}else{
			header("Location: Registro_Lista.php?error=justificar");           
		}

	}
// -------------------------------------------- Querry -----------------------------------------------------------------------------------------------------
$sql = "SELECT * FROM datos_generales WHERE FK_Registro=?;";
    $stmt = mysqli_stmt_init($conn);
    mysqli_stmt_prepare($stmt, $sql);
    mysqli_stmt_bind_param($stmt, "i", $ID_Selected);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $row = mysqli_fetch_assoc($result);

    $Correo_Organizacion = $row['Correo_Organizacion'];
    $rfcHomoclave = $row['rfcHomoclave'];
    $CLUNI = $row['CLUNI'];
    $nombreOSC = $row['nombreOSC'];
    $objetoSocialOrganizacion = $row['objetoSocialOrganizacion'];
    $mision = $row['mision'];
    $vision = $row['vision'];
    $areasAtencion = $row['areasAtencion'];
    $tema_de_Derecho_Social = $row['tema_de_Derecho_Social'];


    //-------------------  -------------------------- 
    $sql = "SELECT * FROM contacto WHERE FK_Registro=?;";
    $stmt = mysqli_stmt_init($conn);
    mysqli_stmt_prepare($stmt, $sql);
    mysqli_stmt_bind_param($stmt, "i", $ID_Selected);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $row = mysqli_fetch_assoc($result);


    $phoneOficina = $row['phoneOficina'];
    $phoneCelular = $row['phoneCelular'];
    $emailContacto = $row['emailContacto'];
    $paginaWeb = $row['paginaWeb'];
    $organizacionFB = $row['organizacionFB'];
    $organizacionTW = $row['organizacionTW'];
    $organizacionInsta = $row['organizacionInsta'];

    //------------------  ---------------------------- 
    $sql = "SELECT * FROM domicilio WHERE FK_Registro=?;";
    $stmt = mysqli_stmt_init($conn);
    mysqli_stmt_prepare($stmt, $sql);
    mysqli_stmt_bind_param($stmt, "i", $ID_Selected);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $row = mysqli_fetch_assoc($result);

    $calle = $row['calle'];
    $colonia = $row['colonia'];
    $codigoPostal = $row['codigoPostal'];
    $localidad = $row['localidad'];
    $municipioRegistroOSC = $row['municipioRegistroOSC'];
    $domicilio = $row['domicilio'];
    $Latitud =  $row['Latitud'];
    $Longitud =  $row['Longitud'];



    // Corregir inputs
    $domicilio_social_legal = $row ['domicilio_social_legal'];

    if ($domicilio_social_legal == 'No') {
    	$ID_Domicilio =  $row['ID_Domicilio'];

    	$sql = "SELECT * FROM domicilio_social_legal WHERE FK_Domicilio=?;";
	    $stmt = mysqli_stmt_init($conn);
	    mysqli_stmt_prepare($stmt, $sql);
	    mysqli_stmt_bind_param($stmt, "i", $ID_Domicilio);
	    mysqli_stmt_execute($stmt);
	    $result = mysqli_stmt_get_result($stmt);
	    $row = mysqli_fetch_assoc($result);

	    $domicilio_Dom =  $row['domicilio_Dom'];
		$localidad_Dom =  $row['localidad_Dom'];
		$municipio_Dom =  $row['municipio_Dom'];
    	
    }

    //------------------  ---------------------------- 


    $sql = "SELECT * FROM historial_de_la_organizacion WHERE FK_Registro=?;";
    $stmt = mysqli_stmt_init($conn);
    mysqli_stmt_prepare($stmt, $sql);
    mysqli_stmt_bind_param($stmt, "i", $ID_Selected);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $row = mysqli_fetch_assoc($result);

    $nombreRepresentante = $row['nombreRepresentante'];
    $idRepresentante = $row['idRepresentante'];
    $fechaConstitucionOSC = $row['fechaConstitucionOSC'];
    $nombreNotario = $row['nombreNotario'];
    $numeroNotario = $row['numeroNotario'];
    $municipioNotaria = $row['municipioNotaria'];
    $noEstrituraPublica = $row['noEstrituraPublica'];
    $volumenEstrituraPublica = $row['volumenEstrituraPublica'];
    $fechaEstritura = $row['fechaEstritura'];


    //------------------  ---------------------------- 

    $sql = "SELECT * FROM acta_constitutiva WHERE FK_Registro=?;";
    $stmt = mysqli_stmt_init($conn);
    mysqli_stmt_prepare($stmt, $sql);
    mysqli_stmt_bind_param($stmt, "i", $ID_Selected);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $row = mysqli_fetch_assoc($result);

    $numeroLibro = $row['numeroLibro'];
    $numeroInscripcion = $row['numeroInscripcion'];    
    $volumenICRESON = $row['volumenICRESON'];
    $existenModis = $row['existenModis'];
    $autorizadaDeducible = $row['autorizadaDeducible']; 

    $a = $row['ID_acta_constitutiva'];

    if ($existenModis == 'Si') {

    	

    	$sql = "SELECT * FROM existenmodis WHERE FK_acta_constitutiva=?;";
	    $stmt = mysqli_stmt_init($conn);
	    mysqli_stmt_prepare($stmt, $sql);
	    mysqli_stmt_bind_param($stmt, "i", $a);
	    mysqli_stmt_execute($stmt);
	    $result = mysqli_stmt_get_result($stmt);
	    $row = mysqli_fetch_assoc($result);

    	$ultimaModi = $row['ultimaModi'];
        $numeroActaConsti = $row['numeroActaConsti'];
        $volumenActaConsti = $row['volumenActaConsti'];
    }

    if ($autorizadaDeducible == 'Si') {

    	$sql = "SELECT * FROM autorizadadeducible WHERE FK_acta_constitutiva=?;";
	    $stmt = mysqli_stmt_init($conn);
	    mysqli_stmt_prepare($stmt, $sql);
	    mysqli_stmt_bind_param($stmt, "i", $a);
	    mysqli_stmt_execute($stmt);
	    $result = mysqli_stmt_get_result($stmt);
	    $row = mysqli_fetch_assoc($result);

        $numeroDiario = $row['numeroDiario'];
        $fechaDiario = $row['fechaDiario'];
        $detenidoAutorizado = $row['detenidoAutorizado'];
        $fechaAutorizada = $row['fechaAutorizada'];
        $a = $row['ID_autorizadaDeducible'];


        if ($detenidoAutorizado == 'Si') {        	
        	
    		$sql = "SELECT * FROM detenidoautorizado WHERE FK_autorizadaDeducible=?;";
		    $stmt = mysqli_stmt_init($conn);
		    mysqli_stmt_prepare($stmt, $sql);
		    mysqli_stmt_bind_param($stmt, "i", $a);
		    mysqli_stmt_execute($stmt);
		    $result = mysqli_stmt_get_result($stmt);
		    $row = mysqli_fetch_assoc($result);


            $razonDetenido = $row['razonDetenido'];
        }

    }

    //------------------  ---------------------------- 

    $sql = "SELECT * FROM historial_de_la_organizacion_2 WHERE FK_Registro=?;";
	$stmt = mysqli_stmt_init($conn);
	mysqli_stmt_prepare($stmt, $sql);
    mysqli_stmt_bind_param($stmt, "i", $ID_Selected);
	mysqli_stmt_execute($stmt);
	$result = mysqli_stmt_get_result($stmt);
	$row = mysqli_fetch_assoc($result);

    $digiridaPor = $row['digiridaPor'];
    $nombrePresi = $row['nombrePresi'];
    $numeroEmpleados = $row['numeroEmpleados'];
    $numeroVoluntarios = $row['numeroVoluntarios'];
    $principalesLogros = $row['principalesLogros'];
    $metasOrganizacion = $row['metasOrganizacion'];
    $principalesAlianzas = $row['principalesAlianzas'];
    $numeroBeneficiados = $row['numeroBeneficiados'];

    //------------------  ---------------------------- 

    $sql = "SELECT * FROM poblacion_beneficiada WHERE FK_Registro=?;";
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

    //------------------  ---------------------------- 

    $sql = "SELECT * FROM historial_de_la_organizacion_3 WHERE FK_Registro=?;";
	$stmt = mysqli_stmt_init($conn);
	mysqli_stmt_prepare($stmt, $sql);
    mysqli_stmt_bind_param($stmt, "i", $ID_Selected);
	mysqli_stmt_execute($stmt);
	$result = mysqli_stmt_get_result($stmt);
	$row = mysqli_fetch_assoc($result);

    $observaciones32D = $row['observaciones32D'];
    $tiempoYforma = $row['tiempoYforma'];
    $tieneAdeudos = $row['tieneAdeudos'];
    $inscritaDNIAS = $row['inscritaDNIAS'];        
    $esquemasRecursosComp = $row['esquemasRecursosComp']; 
    $a = $row['ID_Historial_3'];
	
    if ($esquemasRecursosComp == 'Si') {

    	$sql = "SELECT * FROM esquemasrecursoscomp WHERE FK_Historial_3=?;";
		$stmt = mysqli_stmt_init($conn);
		mysqli_stmt_prepare($stmt, $sql);
		mysqli_stmt_bind_param($stmt, "i", $a);
		mysqli_stmt_execute($stmt);
		$result = mysqli_stmt_get_result($stmt);
		$row = mysqli_fetch_assoc($result);

        $organizacionManejoRecursos = $row['organizacionManejoRecursos'];

    }        	

// -------------------------------------------- Archivos ------------------------------------------------------------------------------------------------------
	function Archivo($ID_Selected,$nombreSeccion){
	require 'includes/dbh.inc.php';	

    $sql = "SELECT *, LENGTH(dataArchivo) FROM registro_archivos INNER JOIN registro on registro.ID_Registro = registro_archivos.FK_Registro INNER JOIN  datos_generales on registro.ID_Registro = datos_generales.FK_Registro  WHERE registro.ID_Registro = ? && registro_archivos.nombreSeccion = ? ;";

    $stmt = mysqli_stmt_init($conn);
    mysqli_stmt_prepare($stmt, $sql);
    mysqli_stmt_bind_param($stmt, "is", $ID_Selected, $nombreSeccion);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $row = mysqli_fetch_assoc($result);

    $nombreOSC = $row['nombreOSC'];
    $LENGTH = $row['LENGTH(dataArchivo)'];

	?>
			    
	<div class="Files_Container" style="margin: 0 16px;">
		<div class="row">
		   
		   <div class="cell -file" >
		      <i class="fa 
		      <?php
		      switch ($row['tipoArchivo']) {
		    	case "application/pdf":
		    		echo "fa-file-pdf-o";
		    		break;     
		    	case "image/jpeg":
		    		echo "fa-file-image-o";
		    		break;
		    	case "image/png":
		    		echo "fa-file-image-o";
		    		break;
		    	case "text/plain":
		    		echo "fa-file-text-o";
		    		break;
		    	default:
		    		echo "fa-file"; 	
		      }

		    $nombre_fichero = $row['LENGTH(dataArchivo)']/1024;
			$nombre_fichero = bcdiv($nombre_fichero, '1', 1);
			

		      ?>" aria-hidden="true"></i>
		      <div class="inner">
		      	<?php echo "<a class='filename' href='classes/Archivos_Convocatoria_Ver_Detalle.php?id=".$row['Archivos_ID']."' target=»_blank»>".$row['nombreSeccion']."</a>";?>
		         <small class="details">
		            <span class="detail -filesize"><i class="fa fa-hdd-o" aria-hidden="true"></i><?php echo ' '.($nombre_fichero).' KB'; ?></span>
		            <span class="detail -updated"><i class="fa fa-clock-o" aria-hidden="true"></i><?php echo $row['Fecha'];?></span>
		         </small>
		      </div>
		   </div>
		</div>
	</div>
	<?php  }


	$sql = "SELECT * FROM correcciones_registro WHERE FK_Registro=? ORDER BY Fecha DESC LIMIT 1;";
    $stmt = mysqli_stmt_init($conn);
    mysqli_stmt_prepare($stmt, $sql);
    mysqli_stmt_bind_param($stmt, "i", $ID_Selected);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $row1 = mysqli_fetch_assoc($result);
    $ID_Correcion_R = $row1['ID_Correcion_R'];


	$sql = "SELECT * FROM detalle_correcciones_registro WHERE FK_Correcion_R=?;";
    $stmt = mysqli_stmt_init($conn);
    mysqli_stmt_prepare($stmt, $sql);
    mysqli_stmt_bind_param($stmt, "i", $ID_Correcion_R);
    mysqli_stmt_execute($stmt);
    $result_detalle_correcciones_registro = mysqli_stmt_get_result($stmt);


    if (empty($result_detalle_correcciones_registro)) {
    	echo "Fatal Error: Resultado Detalle Empty";
    	exit;
    }
// ----------------------------------------------------------------------------------------------------------------------------------------------------------
?>
	<main>
<?php 
if (empty($_GET["id"])){
	echo "<div style='background: #B22222; color: white; text-align:center'>";
	echo "Registro no selecionado<br></div><br>";
	echo "<a class='P_B' href='http:Registro_Lista.php' style='text-decoration: none; display: block;'>Regresar</a>";
	exit();
}else{?>
		<h1 style='background: MEDIUMSEAGREEN; color: white; text-align:center'>Revision Registro</h1>
		<p style='background: SEAGREEN; color: white; text-align:center;'>Organizacion: <?php echo $nombreOSC; ?></p><br>
<?php
}
?>


	<form action="includes/Registro_Revisar.inc.php" method="post" enctype="multipart/form-data">

	<input class="hiden" placeholder="ID_Registro" name="Registro" value="<?php echo $ID_Selected; ?>" >
<?php	
	$I =0;
	foreach ($result_detalle_correcciones_registro as $row2) {
	echo '<div class="" style="width: 100%;">';
		switch ($row2['Pregunta']) {
		    case '1':
				revisar('1.- Correo de organización',$Correo_Organizacion,$row2['Pregunta']);
		    	break;

		    case '2':
				revisar('2.- RFC',$rfcHomoclave,$row2['Pregunta']);
		    	break;

		    case '3':
				revisar_Archivo('3.- RFC (PDF o JPG)',$ID_Selected,'file_rfc',$row2['Pregunta']);
		    	break;

		   	case '4':
				revisar('4.- CLUNI',$CLUNI,$row2['Pregunta']);
		    	break;

		    case '5':
				revisar_Archivo('5.- CLUNI (PDF o JPG)',$ID_Selected,'file_cluni',$row2['Pregunta']);
		    	break;

		    case '6':
				revisar('6.- Nombre de la Organizacion de Sociedad Civil',$nombreOSC,$row2['Pregunta']);
		    	break;

		    case '7':
				revisar('7.- Objeto social de la organización',$objetoSocialOrganizacion,$row2['Pregunta']);
		    	break;

		    case '8':
				revisar('8.- Misión',$mision,$row2['Pregunta']);
		    	break;

		    case '9':
				revisar('9.- Visión',$vision,$row2['Pregunta']);
		    	break;

		    case '10':
				revisar('10.- Áreas de atención',$areasAtencion,$row2['Pregunta']);
		    	break;

		    case '11':
				revisar('11.- ¿En qué tema de Derecho Social se desarrolla principalmente su organización?',$tema_de_Derecho_Social,$row2['Pregunta']);
		    	break;
		    	
		    case '12':
				revisar('12.- Calle',$calle,$row2['Pregunta']);
		    	break;
		    case '13':
				revisar('13.- Colonia',$colonia,$row2['Pregunta']);
		    	break;
		    case '14':
				revisar('14.- Codigo postal',$codigoPostal,$row2['Pregunta']);
		    	break;
		    case '15':
				revisar('15.- Localidad',$localidad,$row2['Pregunta']);
		    	break;
		    case '16':
				revisar('16.- Domicilio',$domicilio,$row2['Pregunta']);
		    	break;
		    case '17':
				revisar('17.- Municipio',$municipioRegistroOSC,$row2['Pregunta']);
		    	break;
		    case '18':
				revisar('18.- Ubicación geográfica (Latitud)',$Latitud,$row2['Pregunta']);
		    	break;
		    case '19':
				revisar('19.- Ubicación geográfica (Longitud)',$Longitud,$row2['Pregunta']);
		    	break;
		    case '20':
				revisar('20.- Teléfono oficina',$phoneOficina,$row2['Pregunta']);
		    	break;
		    case '21':
				revisar('21.- Teléfono celular',$phoneCelular,$row2['Pregunta']);
		    	break;
		    case '22':
				revisar('22.- Correo de organización',$emailContacto,$row2['Pregunta']);
		    	break;
		    case '23':
				revisar('23.- Página web',$paginaWeb,$row2['Pregunta']);
		    	break;
		    case '24':
				revisar('24.- Facebook',$organizacionFB,$row2['Pregunta']);
		    	break;
		    case '25':
				revisar('25.- Twitter',$organizacionTW,$row2['Pregunta']);
		    	break;
		    case '26':
				revisar('26.- Instagram',$organizacionInsta,$row2['Pregunta']);
		    	break;
		    case '27':
				revisar('27.- ¿Su domicilio social es el mismo que el legal?',$domicilio_social_legal,$row2['Pregunta']);
		    	break;
		    case '27a':
				revisar('27a.- Domicilio Legal (registrado ante SAT)',$domicilio_Dom,$row2['Pregunta']);
		    	break;
		    case '27b':
				revisar('27b.- Localidad',$localidad_Dom,$row2['Pregunta']);
		    	break;
		    case '27c':
				revisar('27c.- Municipio',$municipio_Dom,$row2['Pregunta']);
		    	break;		    	
		    case '28':
				revisar_Archivo('28.- Acta constitutiva',$ID_Selected,'file_acta_const',$row2['Pregunta']);
		    	break;
		    case '29':
				revisar_Archivo('29.- Acta protocolizada donde conste la representación legal vigente',$ID_Selected,'file_acta_protoco',$row2['Pregunta']);
		    	break;
		    case '30':
				revisar_Archivo('30.- INE del representante legal vigente',$ID_Selected,'file_ine_repre',$row2['Pregunta']);
		    	break;
		    case '31':
				revisar('31.- Nombre del representante legal',$nombreRepresentante,$row2['Pregunta']);
		    	break;
		    case '32':
				revisar('32.- Número de identificación oficial',$idRepresentante,$row2['Pregunta']);
		    	break;
		    case '33':
				revisar('33.- Fecha de constitución de la Organización de Sociedad Civil',$fechaConstitucionOSC,$row2['Pregunta']);
		    	break;
		    case '34':
				revisar('34.- Nombre del Notario Público donde registró su Organización de Sociedad Civil',$nombreNotario,$row2['Pregunta']);
		    	break;
		    case '35':
				revisar('35.- Número del notario público',$numeroNotario,$row2['Pregunta']);
		    	break;
		    case '36':
				revisar('36.- Municipio de la Notaría Pública',$municipioNotaria,$row2['Pregunta']);
		    	break;
		    case '37':
				revisar('37.- Número de escritura pública',$noEstrituraPublica,$row2['Pregunta']);
		    	break;
		    case '38':
				revisar('38.- Volumen (escritura pública)',$volumenEstrituraPublica,$row2['Pregunta']);
		    	break;
		    case '39':
				revisar('39.- Fecha de estritura pública',$fechaEstritura,$row2['Pregunta']);
		    	break;
		    case '40':
				revisar_Archivo('40.- RPP ICRESON',$ID_Selected,'file_rpp_icreson',$row2['Pregunta']);
		    	break;
		    case '41':
				revisar('41. Número de libro',$numeroLibro,$row2['Pregunta']);
		    	break;
		    case '42':
				revisar('42.- Número de inscrpción',$numeroInscripcion,$row2['Pregunta']);
		    	break;
		    case '43':
				revisar('43.- Volúmen ICRESON',$volumenICRESON,$row2['Pregunta']);
		    	break;
		    case '44':
				revisar('44.- ¿Su organización ha tenido modificaciones a su acta constitutiva?',$existenModis,$row2['Pregunta']);
		    	break;
		    case '44a':
				revisar_Archivo('44a.- Ultima acta modificatoria protocolizada',$ID_Selected,'file_ultima_acta',$row2['Pregunta']);
		    	break;
		    case '44b':
				revisar('44b.- Fecha de la última modificación del acta constitutiva',$ultimaModi,$row2['Pregunta']);
		    	break;
		    case '44c':
				revisar_Archivo('44c.- RPP ICRESON de la última acta modificatoria actualizada',$ID_Selected,'file_rpp_ultima_acta',$row2['Pregunta']);
		    	break;
		    case '44d':
				revisar('44d.- Número de acta constitutiva',$numeroActaConsti,$row2['Pregunta']);
		    	break;
		    case '44e':
				revisar('44e.- Volúmen de acta constitutiva',$volumenActaConsti,$row2['Pregunta']);
		    	break;	
		    case '45':
				revisar('45.- ¿Está autorizada para recibir donativos deducibles de impuestos?',$autorizadaDeducible,$row2['Pregunta']);
		    	break;
		    case '45a':
				revisar_Archivo('45a.- Página del Diario Oficial de la Federación donde se publicó su autorización',$ID_Selected,'file_pagina_diario_Oficial',$row2['Pregunta']);
		    	break;
		    case '45b':
				revisar('45b.- número de página donde se identifica a su Organizaciones de Sociedad Civil',$numeroDiario,$row2['Pregunta']);
		    	break;
		    case '45c':
				revisar('45c.- Fecha de publicación en el Diario Oficial de la Federación',$fechaDiario,$row2['Pregunta']);
		    	break;
		    case '45d':
				revisar('45d.- ¿El SAT ha detenido su autorización como donataria en algún momento?',$detenidoAutorizado,$row2['Pregunta']);
		    	break;
		    case '45e':
				revisar('45e.- ¿Por qué detuvo el SAT su aturización?',$razonDetenido,$row2['Pregunta']);
		    	break;	
		    case '45f':
				revisar('45f.- ¿Desde que fecha está autorizada para recibir donativos deducibles de impuestos?',$fechaAutorizada,$row2['Pregunta']);
		    	break;		    	
		    case '46':
				revisar('46.- Su organización se rige o es dirigida por',$digiridaPor,$row2['Pregunta']);
		    	break;
		    case '47':
				revisar('47.- Nombre del presidente',$nombrePresi,$row2['Pregunta']);
		    	break;
		    case '48':
				revisar('48.- Número de empleados',$numeroEmpleados,$row2['Pregunta']);
		    	break;
		    case '49':
				revisar('49.- Número de voluntarios',$numeroVoluntarios,$row2['Pregunta']);
		    	break;		    
		    case '50':
				revisar('50.- Principales logros',$principalesLogros,$row2['Pregunta']);
		    	break;
		    case '51':
				revisar('51.- Metas de la organización',$metasOrganizacion,$row2['Pregunta']);
		    	break;
		    case '52':
				revisar('52.- Alianzas con las que cuenta',$principalesAlianzas,$row2['Pregunta']);
		    	break;
		    case '53':
				revisar('53.- Número de personas que benefició el año anterior',$numeroBeneficiados,$row2['Pregunta']);
		    	break;
		    case '54':


				$poblacion_beneficiada = "poblacion de<br> 0 a 4: " . $poblacion_0_4 . "<br> 5 a 14: " . $poblacion_5_14 . "<br>15 a 29: " . $poblacion_15_29 . "<br>30 a 44: " . $poblacion_30_44 . "<br>45 a 64: " . $poblacion_45_64 . "<br>65 a mas: " . $poblacion_65_mas . "<br>";

				revisar('54.- Numero de personas que veneficio en el úlitmo año',$poblacion_beneficiada,$row2['Pregunta']);


		    	break;
		    case '55':
				revisar('55.- ¿Tiene observaciones en su 32 D?',$observaciones32D,$row2['Pregunta']);
		    	break;
		    case '56':
				revisar_Archivo('56.- 32D en positivo y con 30 días de expedición como máximo',$ID_Selected,'file_32_d',$row2['Pregunta']);
		    	break;
		    case '57':
				revisar('57.- ¿Ha presentado en tiempo y forma la declaración por ejercicio, de impuestos federales?',$tiempoYforma,$row2['Pregunta']);
		    	break;
		    case '58':
				revisar('58.- ¿Tiene adeudos fiscales a cargo, por impuestos federales?',$tieneAdeudos,$row2['Pregunta']);
		    	break;
		    case '59':
				revisar_Archivo('59.- F21, del presente año (PDF)',$ID_Selected,'file_f_21',$row2['Pregunta']);
		    	break;
		    case '60':
				revisar_Archivo('60.- Constancia de Situación Fiscal',$ID_Selected,'file_constancia_fiscal',$row2['Pregunta']);
		    	break;
		    case '61':
				revisar_Archivo('61.- Comprobante de cuenta bancaria',$ID_Selected,'file_comprobante_banco',$row2['Pregunta']);
		    	break;
		    case '62':
				revisar_Archivo('62.- Factura cancelada',$ID_Selected,'file_factura_cancelada',$row2['Pregunta']);
		    	break;
		    case '63':
				revisar('63.- ¿Está inscrita en el Directorio Nacional de Instituciones de Asistencia Social?',$inscritaDNIAS,$row2['Pregunta']);
		    	break;
		    case '63a':
				revisar_Archivo('63a.- DNIAS',$ID_Selected,'file_dnias',$row2['Pregunta']);
		    	break;
		    case '64':
				revisar('64.- ¿Ha manejado esquemas de recursos complementarios?',$esquemasRecursosComp,$row2['Pregunta']);		
		    	break;
		    case '64a':
				revisar('64a.- Con qué organización ha manejado recursos complementarios',$organizacionManejoRecursos,$row2['Pregunta']);
		    	break;		
		}
	}

	if ($_SESSION['Type_User'] == 2) { ?>

		<button class="common" type="submit" name="Enviar_Revisión">Enviar Revisión</button>

	<?php } else {
        echo '<p style="color: gray; text-align: center;">Usted no tiene permitido Mandar a correcion el registro</p>';
	} ?>	

		</form>
</main>
<?php 

function revisar($P,$R,$I){?>
			    
	<div class="inputGroup" style="margin-bottom: 0;">
		<input id="option<?php echo $I; ?>" type="checkbox" class="comentario" onClick="quitarComentario(this.id)"/>
		<label for="option<?php echo $I; ?>"><?php echo $P; ?></label>
		<div class="explication">(Respuesta)</div>
		<p style="color: " ><?php echo $R; ?></p>
		<div id="divComment<?php echo $I; ?>" class="hide" >
			<textarea class="text_area_low" id="textarea<?php echo $I; ?>" placeholder="Comentario/Revisión" name="<?php echo $I; ?>"></textarea>
		</div>
	</div>
	<br>

<?php  } 

function revisar_Archivo($P,$ID_Selected,$R,$I){?>
    
	<div class="inputGroup" style="margin-bottom: 0;">
		<input id="option<?php echo $I; ?>" type="checkbox" class="comentario" onClick="quitarComentario(this.id)"/>
		<label for="option<?php echo $I; ?>"><?php echo $P; ?></label>
		<div class="explication">(Respuesta)</div>
		<p style="color: " ><?php Archivo($ID_Selected,$R); ?></p>
		<div id="divComment<?php echo $I; ?>" class="hide" >
		    <textarea class="text_area_low" id="textarea<?php echo $I; ?>" placeholder="Comentario/Revisión" name="<?php echo $I; ?>" ></textarea>
		</div>
	</div>
	<br>

<?php  }	?>




	<script>
		function quitarComentario(CheckID){
			console.log("El id que has recibido como parametro es: " + CheckID);

			var numero = CheckID.replace("option","");

			var idComentario = 'divComment' + numero;
            var idTextarea = 'textarea' + numero;

			var checkbox = document.getElementById(CheckID);

			var comentario = document.getElementById(idComentario);
            var textarea = document.getElementById(idTextarea);

			if(checkbox.checked){
				comentario.classList.remove("hide");
                comentario.hidden = false;
			}else{
				comentario.classList.add("hide");
                comentario.hidden = true;
                textarea.value = "";
			}

		}
	</script>
