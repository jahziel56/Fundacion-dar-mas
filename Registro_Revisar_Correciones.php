<?php
	require"classes/header.php";	
	require 'includes/dbh.inc.php';
	require 'no_login.php';

    $ID_Selected = isset($_GET['id'])? $_GET['id'] : "";
    $ID_Cuenta = $_SESSION['user_Id'];
    date_default_timezone_set('America/Hermosillo');


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

	if ($Num_Reviciones >= 3) {	

		$_SESSION['Rechazado_Datos'] = $ID_Selected;

	    header("Location: Justificar_Rechazo.php?id=$ID_Selected");

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
}?>


	<form action="includes/Registro_Revisar.inc.php" method="post" enctype="multipart/form-data">

		<input class="hide" placeholder="ID_Registro" name="Registro" value="<?php echo $ID_Selected; ?>" >

<?php	
	$I =0;
	foreach ($result_detalle_correcciones_registro as $row2) {
	echo '<div class="" style="width: 100%;">';
		switch ($row2['Pregunta']) {
		    case '1':
				revisar('1.- Correo de organización',$Correo_Organizacion,$I++);
		    	break;

		    case '2':
				revisar('2.- RFC',$rfcHomoclave,$I++);
		    	break;

		    case '3':
				revisar_Archivo('3.- RFC (PDF o JPG)',$ID_Selected,'file_rfc',$I++);
		    	break;

		   	case '4':
				revisar('4.- CLUNI',$CLUNI,$I++);
		    	break;

		    case '5':
				revisar_Archivo('5.- CLUNI (PDF o JPG)',$ID_Selected,'file_cluni',$I++);
		    	break;

		    case '6':
				revisar('6.- Nombre de la Organizacion de Sociedad Civil',$nombreOSC,$I++);
		    	break;

		    case '7':
				revisar('7.- Objeto social de la organización',$objetoSocialOrganizacion,$I++);
		    	break;

		    case '8':
				revisar('8.- Misión',$mision,$I++);
		    	break;

		    case '9':
				revisar('9.- Visión',$vision,$I++);
		    	break;

		    case '10':
				revisar('10.- Áreas de atención',$areasAtencion,$I++);
		    	break;

		    case '11':
				revisar('11.- ¿En qué tema de Derecho Social se desarrolla principalmente su organización?',$tema_de_Derecho_Social,$I++);
		    	break;
		    	
		    case '12':
		    	pregunta_12($row2['Detalle']);
		    	break;
		    case '13':
		    	pregunta_13($row2['Detalle']);
		    	break;
		    case '14':
		    	pregunta_14($row2['Detalle']);
		    	break;
		    case '15':
			revisar('15.- Localidad',$localidad,$I++);
		    	break;
		    case '16':
		    	pregunta_16($row2['Detalle']);
		    	break;
		    case '17':
		    	pregunta_17($row2['Detalle']);
		    	break;
		    case '20':
		    	pregunta_20($row2['Detalle']);
		    	break;
		    case '21':
		    	pregunta_21($row2['Detalle']);
		    	break;
		    case '22':
		    	pregunta_22($row2['Detalle']);
		    	break;
		    case '23':
		    	pregunta_23($row2['Detalle']);
		    	break;
		    case '24':
		    	pregunta_24($row2['Detalle']);
		    	break;
		    case '25':
		    	pregunta_25($row2['Detalle']);
		    	break;
		    case '26':
			revisar('26.- Instagram',$organizacionInsta,$I++);
		    	break;
		    case '27':
		    	pregunta_27($row2['Detalle']);
		    	break;
		    case '27a':
		    	pregunta_27a($row2['Detalle']);
		    	break;
		    case '27b':
		    	pregunta_27b($row2['Detalle']);
		    	break;
		    case '27c':
		    	pregunta_27c($row2['Detalle'], $municipiosDeSonora);
		    	break;		    	
		    case '28':
		    	pregunta_28($row2['Detalle']);
		    	break;
		    case '29':
		    	pregunta_29($row2['Detalle']);
		    	break;
		    case '30':
		    	pregunta_30($row2['Detalle']);
		    	break;
		    case '31':
		    	pregunta_31($row2['Detalle']);
		    	break;
		    case '32':
		    	pregunta_32($row2['Detalle']);
		    	break;
		    case '33':
		    	pregunta_33($row2['Detalle']);
		    	break;
		    case '34':
		    	pregunta_34($row2['Detalle']);
		    	break;
		    case '35':
		    	pregunta_35($row2['Detalle']);
		    	break;
		    case '36':
		    	pregunta_36($row2['Detalle'], $municipiosDeSonora);
		    	break;
		    case '37':
		    	pregunta_37($row2['Detalle']);
		    	break;
		    case '38':
		    	pregunta_38($row2['Detalle']);
		    	break;
		    case '39':
		    	pregunta_39($row2['Detalle']);
		    	break;
		    case '40':
		    	pregunta_40($row2['Detalle']);
		    	break;
		    case '41':
		    	pregunta_41($row2['Detalle']);
		    	break;
		    case '42':
		    	pregunta_42($row2['Detalle']);
		    	break;
		    case '43':
		    	pregunta_43($row2['Detalle']);
		    	break;
		    case '44':
			revisar('44.- ¿Su organización ha tenido modificaciones a su acta constitutiva?',$existenModis,$I++);
		    	break;
		    case '44a':
		    	pregunta_44a($row2['Detalle']);
		    	break;
		    case '44b':
		    	pregunta_44b($row2['Detalle']);
		    	break;
		    case '44c':
		    	pregunta_44c($row2['Detalle']);
		    	break;
		    case '44d':
		    	pregunta_44d($row2['Detalle']);
		    	break;
		    case '44e':
		    	pregunta_44e($row2['Detalle']);
		    	break;	
		    case '45':
		    	pregunta_45($row2['Detalle']);
		    	break;
		    case '45a':
		    	pregunta_45a($row2['Detalle']);
		    	break;
		    case '45b':
		    	pregunta_45b($row2['Detalle']);
		    	break;
		    case '45c':
		    	pregunta_45c($row2['Detalle']);
		    	break;
		    case '45d':
		    	pregunta_45d($row2['Detalle']);
		    	break;
		    case '45e':
		    	pregunta_45e($row2['Detalle']);
		    	break;	
		    case '45f':
		    	pregunta_45f($row2['Detalle']);
		    	break;		    	
		    case '46':
		    	pregunta_46($row2['Detalle']);
		    	break;
		    case '47':
		    	pregunta_47($row2['Detalle']);
		    	break;
		    case '48':
		    	pregunta_48($row2['Detalle']);
		    	break;
		    case '49':
		    	pregunta_49($row2['Detalle']);
		    	break;		    
		    case '50':
		    	pregunta_50($row2['Detalle']);
		    	break;
		    case '51':
		    	pregunta_51($row2['Detalle']);
		    	break;
		    case '52':
		    	pregunta_52($row2['Detalle']);
		    	break;
		    case '53':
		    	pregunta_53($row2['Detalle']);
		    	break;
		    case '54':
		    	pregunta_54($row2['Detalle']);
		    	break;
		    case '55':
		    	pregunta_55($row2['Detalle']);
		    	break;
		    case '56':
		    	pregunta_56($row2['Detalle']);
		    	break;
		    case '57':
		    	pregunta_57($row2['Detalle']);
		    	break;
		    case '58':
		    	pregunta_58($row2['Detalle']);
		    	break;
		    case '59':
		    	pregunta_59($row2['Detalle']);
		    	break;
		    case '60':
		    	pregunta_60($row2['Detalle']);
		    	break;
		    case '61':
		    	pregunta_61($row2['Detalle']);
		    	break;
		    case '62':
		    	pregunta_62($row2['Detalle']);
		    	break;
		    case '63':
		    	pregunta_63($row2['Detalle']);
		    	break;
		    case '63a':
		    	pregunta_63a($row2['Detalle']);
		    	break;
		    case '64':
				revisar('64.- ¿Ha manejado esquemas de recursos complementarios?',$esquemasRecursosComp,$I++);		
		    	break;
		    case '64a':
		    	pregunta_64a($row2['Detalle']);
		    	break;		
		}
	}

?>
         
		<button class="common" type="submit" name="Enviar_Revisión">Enviar Revisión</button>		
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
