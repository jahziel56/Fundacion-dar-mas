<?php
	/* manda a llamar a header.php */ 
	require"classes/header.php";

	require 'includes/dbh.inc.php';	

    //-------------------- Obtener el id a ver
	if (isset($_POST['Registro'])) {	

    $ID_Selected = $_POST['Registro'];

    //--------------------- datos_generales -------------------------
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

    //------------------ domicilio ---------------------------- 
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

    //------------------- contacto -------------------------- 
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



    //------------------ historial_de_la_organizacion ---------------------------- 
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

    if ($inscritaDNIAS == 'Si') {
    	/* Archivo */
    }        	
	
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


    //------------------  ---------------------------- 



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
			    
	<div class="Files_Container" style="margin: 12px 0;">
		<div class="row">
		   
		   <div class="cell -file">
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
		   
		   <button class="cell -action -download">
		      <i class="fa fa-download" aria-hidden="true"></i>
		      <span class="label">Download</span>
		   </button>		   
		   <button class="cell -action -more">
		      <i class="fa fa-ellipsis-h" aria-hidden="true"></i>
		      <span class="label">More</span>
		   </button>
		   
		</div>
	</div>

	<?php  }




	//Error('Error: Sql_Conect_Lost');
    //exit();    	
function Error($P){?>
	<main>
		<p><?php echo $P; ?></p>
	</main>
<?php }


?>

<main>

<h1 style='background: LIGHTSEAGREEN; color: white; text-align:center; font-size:50px;'>Informacion Registrada de la Organizacion</h1>
<p style='background: DARKCYAN; color: white; text-align:center;'> <?php echo $nombreOSC ;?> </p><br>

		<h5 style="background: lightgray; margin: 20px 0; text-align: center;">Datos Generales</h5>

			<label>1.- Correo de organización</label>
			<input type="text" class="common" id="Correo_Organizacion" name="Correo_Organizacion" value="<?php echo $Correo_Organizacion; ?>" disabled>

			<label style="display: block;">2.- RFC</label>
			<input type="text" class="common" id="rfcHomoclave" name="rfcHomoclave" value="<?php echo $rfcHomoclave; ?>" disabled>

			<label>3.- RFC (PDF o JPG) </label><br>
			<?php Archivo($ID_Selected,'file_rfc'); ?>


			<label>4.- CLUNI</label>
			<input type="text" class="common" id="CLUNI" name="CLUNI" value="<?php echo $CLUNI;?>" disabled>

			<label>5.- CLUNI (PDF o JPG)</label><br>
			<?php Archivo($ID_Selected,'file_cluni'); ?>

			<label>6.- Nombre de la OSC</label>					
			<input type="text" class="common" id="nombreOSC" name="nombreOSC" value="<?php echo $nombreOSC ;?>" disabled>

			<label>7.- Objeto social de la organización</label>
			<input type="text" class="common" name="objetoSocialOrganizacion"  value="<?php echo $objetoSocialOrganizacion;?>" disabled>

			<label>8.- Misión</label>
			<input type="text" name="mision" class="common" id="mision" placeholder="Misión" value="<?php echo $mision;?>" disabled></input>
			<label>9.- Visión</label>
			<input type="text" name="vision" class="common" id="vision" placeholder="Visión" value="<?php echo $vision;?>" disabled></input>
			<label>10.- Áreas de atención</label>
			<input type="text" name="areasAtencion" class="common" id="areasAtencion" value="<?php echo $areasAtencion;?>" disabled></input>

			
			<label class="common">11.- ¿En qué tema de Derecho Social se desarrolla principalmente su organización?</label><br>
			<input type="text" name="tema_de_Derecho_Social" class="common" value="<?php echo $tema_de_Derecho_Social ;?>" disabled></input>

			<h5 style="background: lightgray; margin: 20px 0; text-align: center;">Domicilio</h5>

			<label>12.- Calle</label>
			<input type="text" class="common" id="calle" name="calle" value="<?php echo $calle;?>" disabled>

			<label>13.- Colonia</label>
			<input type="text" class="common" id="colonia" name="colonia" value="<?php echo $colonia;?>" disabled>

			<label>14.- Codigo postal</label>
			<input type="text" class="common" id="codigoPostal" name="codigoPostal" value="<?php echo $codigoPostal;?>" disabled>

			<label>15.- Localidad</label>  
			<input type="text" class="common" id="localidad" name="localidad" value="<?php echo $localidad;?>" disabled>		

			<label>16.- Domicilio</label>
			<input type="text" class="common" id="domicilio" name="domicilio" value="<?php echo $domicilio;?>" disabled>

			<label>17.- Municipio</label><br>
			<input type="text" class="common" name="municipioRegistroOSC" value="<?php echo $municipioRegistroOSC;?>" disabled>

			<label>18.- Ubicación geográfica (Latitud)</label>
			<input type="text" class="common" id="Latitud" name="Latitud" value="<?php echo $Latitud;?>" disabled>

			<label>19.- Ubicación geográfica (Longitud)</label>
			<input type="text" class="common" id="Longitud" name="Longitud" value="<?php echo $Longitud;?>" disabled>

			<label>20.- Teléfono oficina</label>  
			<input type="text" class="common" id="phoneOficina" name="phoneOficina" value="<?php echo $phoneOficina;?>" disabled>

			<label>21.- Teléfono celular</label>
			<input type="text" class="common" id="phoneCelular" name="phoneCelular" value="<?php echo $phoneCelular;?>" disabled>

			<label>22.- Correo de organización</label>
			<input type="text" class="common" id="emailContacto" name="emailContacto" value="<?php echo $emailContacto;?>" disabled>


			<label>23.- Página web</label>
			<input type="url" class="common" id="paginaWeb" name="paginaWeb" value="<?php echo $paginaWeb;?>" disabled>

			<label>24.- Facebook</label>
			<input type="text" class="common" id="organizacionFB" name="organizacionFB" value="<?php echo $organizacionFB;?>" disabled>

			<label>25.- Twitter</label>
			<input type="text" class="common" id="organizacionTW" name="organizacionTW" value="<?php echo $organizacionTW;?>" disabled>

			<label>26.- Instagram</label>
			<input type="text" class="common" name="organizacionInsta" value="<?php echo $organizacionInsta;?>" disabled>	

			<label>27.- ¿Su domicilio social es el mismo que el legal?</label>
			<div style="font-size: 20px; margin-left:20px;">
				<input type="radio" class="common" name="domicilio_social_legal" value="Si" checked disabled> <?php echo $domicilio_social_legal; ?><br><br>
			</div>

			<?php if ($domicilio_social_legal == "No") { ?>
				
			<label>27a.- Domicilio Legal (registrado ante SAT)</label>
			<input type="text" class="common" id="domicilio_Dom" name="domicilio_Dom" value="<?php echo $domicilio_Dom;?>" disabled>

			<label>27b.- Localidad</label>
			<input type="text" class="common" id="localidad_Dom" name="localidad_Dom" value="<?php echo $localidad_Dom;?>" disabled>

			<label>27c.- Municipio</label><br>
			<input type="text" class="common" id="municipio_Dom" name="municipio_Dom" value="<?php echo $municipio_Dom;?>" disabled>

			<?php } ?>

		<h5 style="background: lightgray; margin: 20px 0; text-align: center;">Órgano del gobierno</h5>

			<label class="common">28.- Acta constitutiva</label>
			<?php Archivo($ID_Selected,'file_acta_const'); ?>

			<label class="common">29.- Acta protocolizada donde conste la representación legal vigente</label>
			<?php Archivo($ID_Selected,'file_acta_protoco'); ?>
       

			<label class="common">30.- INE del representante legal vigente</label>
			<?php Archivo($ID_Selected,'file_ine_repre'); ?>


			<label>31.- Nombre del representante legal</label>
			<input type="text" class="common" name="nombreRepresentante" value="<?php echo $nombreRepresentante;?>" disabled>

			<label>32.- Número de identificación oficial</label>
			<input type="text" class="common" name="idRepresentante"  value="<?php echo $idRepresentante;?>" disabled>

			<label class="common">33.- Fecha de constitución de la OSC</label><br>
			<input type="text" class="common" name="fechaConstitucionOSC"  value="<?php echo $fechaConstitucionOSC;?>" disabled>


			<label>34.- Nombre del Notario Público donde registró su OSC</label>
			<input type="text" class="common" id="nombreNotario" name="nombreNotario" value="<?php echo $nombreNotario;?>" disabled>

			<label>35.- Número del notario público</label>
			<input type="text" class="common" id="numeroNotario" name="numeroNotario" value="<?php echo $numeroNotario;?>" disabled>

			<label class="common">36.- Municipio de la Notaría Pública</label><br>
			<input type="text" class="common" name="municipioNotaria" value="<?php echo $municipioNotaria;?>" disabled>

			<label>37.- Número de escritura pública</label>
			<input type="text" class="common" name="noEstrituraPublica" value="<?php echo $noEstrituraPublica;?>" disabled>

			<label>38.- Volumen (escritura pública)</label>
			<input type="text" class="common" name="volumenEstrituraPublica"  value="<?php echo $volumenEstrituraPublica;?>" disabled>

			<label class="common">39.- Fecha de estritura pública</label><br>
			<input type="text" class="common" id="fechaEstritura" name="fechaEstritura" value="<?php echo $fechaEstritura;?>" disabled>

			<label class="titulos-form">40.- RPP ICRESON</label><br/>
			<?php Archivo($ID_Selected,'file_rpp_icreson'); ?>

			<label>41. Número de libro</label>
			<input type="text" class="common" id="numeroLibro" name="numeroLibro" value="<?php echo $numeroLibro;?>" disabled>

			<label>42.- Número de inscrpción</label>
			<input type="text" class="common" name="numeroInscripcion" value="<?php echo $numeroInscripcion;?>" disabled>

			<label>43.- Volúmen ICRESON</label>
			<input type="text" class="common" id="volumenICRESON" name="volumenICRESON" value="<?php echo $volumenICRESON;?>" disabled>

			<label class="titulos-form">44.- ¿Su organización ha tenido modificaciones a su acta constitutiva?</label><br>
			<div style="font-size: 20px; margin-left:20px;">
				<input type="radio" class="common" name="existenModis" value="Si" checked disabled> <?php echo $existenModis; ?><br><br>
			</div>

			<?php if ($existenModis == "Si") { ?>

			<label class="common">44a.- Ultima acta modificatoria protocolizada</label>
			<?php Archivo($ID_Selected,'none'); ?>

			<label class="common">44b.- Fecha de la última modificación del acta constitutiva</label><br>
			<input type="text" class="common" id="ultimaModi" name="ultimaModi" value="<?php echo $ultimaModi;?>" disabled><br><br>

			<label class="common">44c.- RPP ICRESON de la última acta modificatoria actualizada</label>
			<?php Archivo($ID_Selected,'none'); ?>

			<label>44d.- Número de acta constitutiva</label>
			<input type="text" class="common" id="numeroActaConsti" name="numeroActaConsti" value="<?php echo $numeroActaConsti;?>" disabled>

			<label>44e.- Volúmen de acta constitutiva</label>
			<input type="text" class="common" id="volumenActaConsti" name="volumenActaConsti" value="<?php echo $volumenActaConsti;?>" disabled>

			<?php } ?>


		
		<label class="common">45.- ¿Está autorizada para recibir donativos deducibles de impuestos?</label><br>
		<div style="font-size: 20px; margin-left:20px;">
			<input type="radio" class="common" name="autorizadaDeducible" value="Si" checked disabled> <?php echo $autorizadaDeducible; ?><br><br>	
		</div> 

		
		<?php if ($autorizadaDeducible == "Si") { ?>

		<label class="form-control">45a.- Página del DOF donde se publicó su autorización</label>
		<?php Archivo($ID_Selected,'none'); ?>

		<label>45b.- número de página donde se identifica a su OSC</label>
		<input type="text" class="common" id="numeroDiario" name="numeroDiario"	value="<?php echo $numeroDiario;?>" disabled>

		<label class="common">45c.- Fecha de publicación en el Diario Oficial de la Federación</label><br>
		<input type="text" class="common" id="fechaDiario" name="fechaDiario" value="<?php echo $fechaDiario;?>" disabled><br>

		<label class="common">45d.- ¿El SAT ha detenido su autorización como donataria en algún momento?</label><br>
		<input type="radio" class="common" name="detenidoAutorizado" value="Si" checked disabled> <?php echo $detenidoAutorizado; ?><br><br>

		<?php if ($detenidoAutorizado == "Si") { ?>

		<label>45e.- ¿Por qué detuvo el SAT su aturización?</label>
		<input type="text" class="common" id="razonDetenido" name="razonDetenido" value="<?php echo $razonDetenido;?>" disabled>

		<?php } ?>

		<label class="common">45f.- ¿Desde que fecha está autorizada para recibir donativos deducibles de impuestos?</label><br>
		<input type="text" class="common" id="fechaAutorizada" name="fechaAutorizada" value="<?php echo $fechaAutorizada;?>" disabled>

		<?php } ?>


		<label class="common">46.- Su organización se rige o es dirigida por:</label>
		<div style="font-size: 20px; margin-left:20px;">
			<input type="radio" class="common" name="digiridaPor" checked disabled> <?php echo $digiridaPor; ?><br><br>
		</div>

		<label>47.- Nombre del presidente</label>
		<input type="text" class="common" id="nombrePresi" name="nombrePresi" value="<?php echo $nombrePresi;?>" disabled>

		<label>48.- Número de empleados</label>
		<input type="text" class="common" id="numeroEmpleados" name="numeroEmpleados" value="<?php echo $numeroEmpleados;?>" disabled>

		<label>49.- Número de voluntarios</label>
		<input type="text" class="common" name="numeroVoluntarios" value="<?php echo $numeroVoluntarios;?>" disabled>

		<label>50.- Principales logros</label>			        
		<input type="text" class="common" id="principalesLogros" name="principalesLogros" value="<?php echo $principalesLogros;?>" disabled>

		<label>51.- Metas de la organización</label>
		<input type="text" class="common" id="metasOrganización" name="metasOrganización" value="<?php echo $metasOrganizacion;?>" disabled>

		<label>52.- Alianzas con las que cuenta</label>
		<input type="text" class="common" name="principalesAlianzas"  value="<?php echo $principalesAlianzas;?>" disabled>

		<label>53.- Número de personas que benefició el año anterior</label>
		<input type="text" class="common" name="numeroBeneficiados"  value="<?php echo $numeroBeneficiados;?>" disabled>

		<label class="common">54.- Población que atiende la OSC</label><br> 
				<input type="number" class="common P6" name="poblacion_0_4"	value="<?php echo $poblacion_0_4;?>" disabled>

				<input type="number" class="common P6" name="poblacion_5_14" value="<?php echo $poblacion_5_14;?>" disabled>

				<input type="number" class="common P6" name="poblacion_15_29"	value="<?php echo $poblacion_15_29;?>" disabled>

				<input type="number" class="common P6" name="poblacion_30_44"	value="<?php echo $poblacion_30_44;?>"  disabled>

				<input type="number" class="common P6" name="poblacion_45_64"	value="<?php echo $poblacion_45_64;?>" disabled>

				<input type="number" class="common P6" name="poblacion_65_mas" value="<?php echo $poblacion_65_mas;?>" disabled>

		<label class="titulos-form">55.- ¿Tiene observaciones en su 32 D?</label>
		<div style="font-size: 20px; margin-left:20px;">
			<input type="radio" class="common" name="observaciones32D" value="Si" checked disabled> <?php echo $observaciones32D; ?><br><br>
		</div>

		<label class="common">56.- 32D en positivo y con 30 días de expedición como máximo</label>  
		<?php Archivo($ID_Selected,'file_32_d'); ?>

		<label class="titulos-form">57.- ¿Ha presentado en tiempo y forma la declaración por ejercicio, de impuestos federales?</label>
		<div style="font-size: 20px; margin-left:20px;">
			<input type="radio" class="common" name="tiempoYforma" value="No"checked disabled> <?php echo $tiempoYforma; ?><br><br>
		</div>

		<label class="titulos-form">58.- ¿Tiene adeudos fiscales a cargo, por impuestos federales?</label>
		<div style="font-size: 20px; margin-left:20px;">
			<input type="radio" class="common" name="tieneAdeudos" value="Si" checked disabled> <?php echo $tieneAdeudos; ?><br><br>
		</div>

		<label class="common">59.- F21, del presente año (PDF)</label>
		<?php Archivo($ID_Selected,'file_f_21'); ?>

		<label class="common">60.- Constancia de Situación Fiscal</label>
		<?php Archivo($ID_Selected,'file_constancia_fiscal'); ?>

		<label class="common">61.- Comprobante de cuenta bancaria</label>
		<?php Archivo($ID_Selected,'file_comprobante_banco'); ?>

		<label class="common">62.- Factura cancelada</label>
		<?php Archivo($ID_Selected,'file_factura_cancelada'); ?>

		<label class="titulos-form">63.- ¿Está inscrita en el Directorio Nacional de Instituciones de Asistencia Social?</label>
		<div style="font-size: 20px; margin-left:20px;">
			<input type="radio" class="common" name="inscritaDNIAS" value="No" checked disabled> <?php echo $inscritaDNIAS; ?><br><br>
		</div>

		<?php if ($inscritaDNIAS == "Si") { ?>

		<label class="common">63a.- DNIAS</label>
		<?php Archivo($ID_Selected,'none'); ?>

		<?php } ?>
		

		<label class="titulos-form">64.- ¿Ha manejado esquemas de recursos complementarios?</label><br>
		<div style="font-size: 20px; margin-left:20px;">
		<input type="radio" class="common" name="esquemasRecursosComp" value="Si" checked disabled> <?php echo $esquemasRecursosComp; ?><br><br>
		</div>


		<?php if ($esquemasRecursosComp == "Si") { ?>

		<label>64a.- Con qué organización ha manejado recursos complementarios</label>
		<input type="text" class="common" name="organizacionManejoRecursos"  value="<?php echo $organizacionManejoRecursos;?>" disabled>

		<?php } ?>
</main>

<?php } ?>
