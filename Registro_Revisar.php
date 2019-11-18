<?php
	require"classes/header.php";	
	require 'includes/dbh.inc.php';

    $ID_Selected = isset($_GET['id'])? $_GET['id'] : "";
    $ID_Cuenta = $_SESSION['user_Id'];
    date_default_timezone_set('America/Hermosillo');


 	if (empty(Query_select("SELECT * FROM revisando WHERE FK_Registro=?;",$ID_Selected,$conn))) {

 		 $sql = "SELECT * FROM revisando INNER JOIN empleados ON revisando.FK_Empleado = empleados.EmpleadoID WHERE empleados.FK_Cuenta=?;";

 		/* Si existe un empleado en la tabla solo updatea los datos, si no existe agrega los datos a la tabla */
 		if (!empty ($Row=Query_select($sql,$ID_Cuenta,$conn))) {

    		echo "ya estabas revisando una convocatoria<br>";
    		Query_update_registro('Enviado',$Row['FK_Registro'],$conn);
    			
    		echo "esta es tu nueva convocatoria";
    		Query_update($ID_Selected,$Row['FK_Registro'],$conn);

    	}else{
    		echo "No tenias convocatoria";
    		Query_insert($ID_Selected,$ID_Cuenta,$conn);	
    	}
    		Query_update_registro('Revision',$ID_Selected,$conn);
    		
 	}else{
 		$sql = "SELECT * FROM revisando INNER JOIN empleados ON revisando.FK_Empleado = empleados.EmpleadoID WHERE empleados.FK_Cuenta=?;";
 		if (!empty (Query_select($sql,$ID_Cuenta,$conn))) {
 			echo "tu estas revisando este registro";
 		}else{
 			echo "Error: Alguien se encuentra revisando este registro.";
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

		<div>
			<form action="Registro_Revisar_Ver.php" method="post" enctype="multipart/form-data">

			<?php 
			$I =0;
			//echo "$I <br>";

			$R = 'Respuesta';

			$AR = 'Archivos';

//--------------------------------- Datos Generales
			revisar('1.- Correo de organización',$Correo_Organizacion,$I++);
			revisar('2.- RFC',$rfcHomoclave,$I++);

			revisar_Archivo('3.- RFC (PDF o JPG)',$ID_Selected,'file_rfc',$I++);

			revisar('4.- CLUNI',$CLUNI,$I++);

			revisar_Archivo('5.- CLUNI (PDF o JPG)',$ID_Selected,'file_cluni',$I++);

			revisar('6.- Nombre de la Organizacion de Sociedad Civil',$nombreOSC,$I++);
			revisar('7.- Objeto social de la organización',$objetoSocialOrganizacion,$I++);
			revisar('8.- Misión',$mision,$I++);
			revisar('9.- Visión',$vision,$I++);
			revisar('10.- Áreas de atención',$areasAtencion,$I++);
			revisar('11.- ¿En qué tema de Derecho Social se desarrolla principalmente su organización?',$tema_de_Derecho_Social,$I++);

//--------------------------------- Datos Generales
			revisar('12.- Calle',$calle,$I++);			
			revisar('13.- Colonia',$colonia,$I++);
			revisar('14.- Codigo postal',$codigoPostal,$I++);
			revisar('15.- Localidad',$localidad,$I++);
			revisar('16.- Domicilio',$domicilio,$I++);
			revisar('17.- Municipio',$municipioRegistroOSC,$I++);

			revisar('18 mapa (Desactivado)','(Desactivado)',$I++);
			revisar('19 mapa (Desactivado)','(Desactivado)',$I++);


//--------------------------------- contacto
			revisar('20.- Teléfono oficina',$phoneOficina,$I++);
			revisar('21.- Teléfono celular',$phoneCelular,$I++);
			revisar('22.- Correo de organización',$emailContacto,$I++);
			revisar('23.- Página web',$paginaWeb,$I++);
			revisar('24.- Facebook',$organizacionFB,$I++);
			revisar('25.- Twitter',$organizacionTW,$I++);
			revisar('26.- Instagram',$organizacionInsta,$I++);

			revisar('27.- ¿Su domicilio social es el mismo que el legal?',$domicilio_social_legal,$I++);

			//27 R

			if ($domicilio_social_legal == 'No') {
				revisar('27a.- Domicilio Legal (registrado ante SAT)',$domicilio_Dom,'27a');
				revisar('27b.- Localidad',$localidad_Dom,'27b');
				revisar('27c.- Municipio',$municipio_Dom,'27c');
			}
			
//------------------ historial_de_la_organizacion ---------------------------- 
			revisar_Archivo('28.- Acta constitutiva',$ID_Selected,'file_acta_const',$I++);
			revisar_Archivo('29.- Acta protocolizada donde conste la representación legal vigente',$ID_Selected,'file_acta_protoco',$I++);
			revisar_Archivo('30.- INE del representante legal vigente',$ID_Selected,'file_ine_repre',$I++);

			revisar('31.- Nombre del representante legal',$nombreRepresentante,$I++);
			revisar('32.- Número de identificación oficial',$idRepresentante,$I++);
			revisar('33.- Fecha de constitución de la Organización de Sociedad Civil',$fechaConstitucionOSC,$I++);
			revisar('34.- Nombre del Notario Público donde registró su Organización de Sociedad Civil',$nombreNotario,$I++);
			revisar('35.- Número del notario público',$numeroNotario,$I++);
			revisar('36.- Municipio de la Notaría Pública',$municipioNotaria,$I++);
			revisar('37.- Número de escritura pública',$noEstrituraPublica,$I++);
			revisar('38.- Volumen (escritura pública)',$volumenEstrituraPublica,$I++);
			revisar('39.- Fecha de estritura pública',$fechaEstritura,$I++);

			revisar_Archivo('40.- RPP ICRESON',$ID_Selected,'file_rpp_icreson',$I++);


			revisar('41. Número de libro',$numeroLibro,$I++);
			revisar('42.- Número de inscrpción',$numeroInscripcion,$I++);
			revisar('43.- Volúmen ICRESON',$volumenICRESON,$I++);

			revisar('44.- ¿Su organización ha tenido modificaciones a su acta constitutiva?',$existenModis,$I++);

			//44 R
			if ($existenModis == 'Si') {
				revisar_Archivo('44a.- Ultima acta modificatoria protocolizada',$ID_Selected,'file_ultima_acta','44a');				
				revisar('44b.- Fecha de la última modificación del acta constitutiva',$ultimaModi,'44b');

				revisar_Archivo('44c.- RPP ICRESON de la última acta modificatoria actualizada',$ID_Selected,'file_rpp_ultima_acta','44c');

				revisar('44d.- Número de acta constitutiva',$numeroActaConsti,'44d');
				revisar('44e.- Volúmen de acta constitutiva',$volumenActaConsti,'44e');
			}		


			revisar('45.- ¿Está autorizada para recibir donativos deducibles de impuestos?',$autorizadaDeducible,$I++);

			// 45 R
			if ($autorizadaDeducible == 'Si') {
				revisar('45a.- Página del Diario Oficial de la Federación donde se publicó su autorización',$R,'45a');
				revisar('45b.- número de página donde se identifica a su Organizaciones de Sociedad Civil',$numeroDiario,'45b');
				revisar('45c.- Fecha de publicación en el Diario Oficial de la Federación',$fechaDiario,'45c');
				revisar('45d.- ¿El SAT ha detenido su autorización como donataria en algún momento?',$detenidoAutorizado,'45d');

				// 45D R
				if ($detenidoAutorizado == 'Si') {
					revisar('45e.- ¿Por qué detuvo el SAT su aturización?',$razonDetenido,'45e');
				}

				revisar('45f.- ¿Desde que fecha está autorizada para recibir donativos deducibles de impuestos?',$fechaAutorizada,'45f');				
			}



			revisar('46.- Su organización se rige o es dirigida por',$digiridaPor,$I++);
			revisar('47.- Nombre del presidente',$nombrePresi,$I++);
			revisar('48.- Número de empleados',$numeroEmpleados,$I++);
			revisar('49.- Número de voluntarios',$numeroVoluntarios,$I++);
			revisar('50.- Principales logros',$principalesLogros,$I++);
			revisar('51.- Metas de la organización',$metasOrganizacion,$I++);
			revisar('52.- Alianzas con las que cuenta',$principalesAlianzas,$I++);
			revisar('53.- Número de personas que benefició el año anterior',$numeroBeneficiados,$I++);


			$poblacion_beneficiada = "poblacion de<br> 0 a 4: " . $poblacion_0_4 . "<br> 5 a 14: " . $poblacion_5_14 . "<br>15 a 29: " . $poblacion_15_29 . "<br>30 a 44: " . $poblacion_30_44 . "<br>45 a 64: " . $poblacion_45_64 . "<br>65 a mas: " . $poblacion_65_mas . "<br>";

			revisar('54.- Numero de personas que veneficio en el úlitmo año',$poblacion_beneficiada,$I++);


			revisar('55.- ¿Tiene observaciones en su 32 D?',$observaciones32D,$I++);

			revisar_Archivo('56.- 32D en positivo y con 30 días de expedición como máximo',$ID_Selected,'file_32_d',$I++);

			revisar('57.- ¿Ha presentado en tiempo y forma la declaración por ejercicio, de impuestos federales?',$tiempoYforma,$I++);
			revisar('58.- ¿Tiene adeudos fiscales a cargo, por impuestos federales?',$tieneAdeudos,$I++);

			revisar_Archivo('59.- F21, del presente año',$ID_Selected,'file_f_21',$I++);
			revisar_Archivo('60.- Constancia de Situación Fiscal',$ID_Selected,'file_constancia_fiscal',$I++);
			revisar_Archivo('61.- Comprobante de cuenta bancaria',$ID_Selected,'file_comprobante_banco',$I++);
			revisar_Archivo('62.- Factura cancelada',$ID_Selected,'file_factura_cancelada',$I++);

			revisar('63.- ¿Está inscrita en el Directorio Nacional de Instituciones de Asistencia Social?',$inscritaDNIAS,$I++);

			//63 R
			if ($inscritaDNIAS == 'Si') {
				revisar_Archivo('63a.- DNIAS',$ID_Selected,'file_dnias','63a');
			}


			revisar('64.- ¿Ha manejado esquemas de recursos complementarios?',$esquemasRecursosComp,$I++);		

			//64 R
			if ($esquemasRecursosComp == 'Si') {	
				revisar('64a.- Con qué organización ha manejado recursos complementarios',$organizacionManejoRecursos,'64a');
			}



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

			<input class="hide" placeholder="ID_Registro" name="Registro" value="<?php echo $ID_Selected; ?>" >

			<?php 
				//Querry Select cuenta inner join Empleado on Id_Cuenta = FK_Cuenta WHERE Id_Cuenta = SESSION['user_Id']; 
				$EmpleadoID = ''; 
			?>
			<input class="hide" placeholder="EmpleadoID" name="EmpleadoID" value="<?php echo $EmpleadoID; ?>" >


			<button class="common" type="submit" name="Enviar_Revisión">Enviar Revisión</button>		
		</form>
		</div>
	</main>

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
