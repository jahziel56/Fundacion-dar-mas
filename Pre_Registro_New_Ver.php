<?php
	/* manda a llamar a header.php */ 
	require"classes/header.php";

	require 'includes/dbh.inc.php';	

    //-------------------- Obtener el id a ver

    $ID_Selected = isset($_GET['id'])? $_GET['id'] : "";

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


    	




?>

<main>

	<h1 style='background: LIGHTSEAGREEN; color: white; text-align:center; font-size:50px;'>Registro De Organizaciones De La Sociedad Civil</h1>

	<div class="">
		<form action="includes/pre.inc.php" method="post" enctype="multipart/form-data">

		<h5 style="background: lightgray; margin: 20px 0; text-align: center;">Datos Generales</h5>

			<label>1.- Correo de organización</label>
			<input type="text" class="common" id="Correo_Organizacion" name="Correo_Organizacion" value="<?php echo $Correo_Organizacion; ?>" disabled>

			<label style="display: block;">2.- RFC</label>
			<input type="text" class="common" id="rfcHomoclave" name="rfcHomoclave" value="<?php echo $rfcHomoclave; ?>" disabled>

			<label>3.- RFC (PDF o JPG) </label><br>
			<input type="file" class="common" name="files[]" disabled><br>


			<label>4.- CLUNI</label>
			<input type="text" class="common" id="CLUNI" name="CLUNI" value="<?php echo $CLUNI;?>" disabled>

			<label>5.- CLUNI (PDF o JPG)</label><br>
			<input type="file" class="common" name="files[]" disabled><br>

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
				
			<label>28.- Domicilio Legal (registrado ante SAT)</label>
			<input type="text" class="common" id="domicilio_Dom" name="domicilio_Dom" value="<?php echo $domicilio_Dom;?>" disabled>

			<label>29.- Localidad</label>
			<input type="text" class="common" id="localidad_Dom" name="localidad_Dom" value="<?php echo $localidad_Dom;?>" disabled>

			<label>30.- Municipio</label><br>
			<input type="text" class="common" id="municipio_Dom" name="municipio_Dom" value="<?php echo $municipio_Dom;?>" disabled>

			<?php } ?>





		<h5 style="background: lightgray; margin: 20px 0; text-align: center;">Historial de la organización</h5>

			<label class="common">31.- Acta constitutiva</label>
			<input type="file" class="common" name="files[]" disabled>

			<label class="common">32.- Acta protocolizada donde conste la representación legal vigente</label>
			<input type="file" class="common" name="files[]" disabled>        

			<label class="common">33.- INE del representante legal vigente</label>
			<input type="file" class="common" name="files[]" disabled>

			<label>34.- Nombre del representante legal</label>
			<input type="text" class="common" name="nombreRepresentante" value="<?php echo $nombreRepresentante;?>" disabled>

			<label>35.- Número de identificación oficial</label>
			<input type="text" class="common" name="idRepresentante"  value="<?php echo $idRepresentante;?>" disabled>

			<label class="common">36.- Fecha de constitución de la OSC</label><br>
			<input type="text" class="common" name="fechaConstitucionOSC"  value="<?php echo $fechaConstitucionOSC;?>" disabled>


			<label>37.- Nombre del Notario Público donde registró su OSC</label>
			<input type="text" class="common" id="nombreNotario" name="nombreNotario" value="<?php echo $nombreNotario;?>" disabled>

			<label>38.- Número del notario público</label>
			<input type="text" class="common" id="numeroNotario" name="numeroNotario" value="<?php echo $numeroNotario;?>" disabled>

			<label class="common">39.- Municipio de la Notaría Pública</label><br>
			<input type="text" class="common" name="municipioNotaria" value="<?php echo $municipioNotaria;?>" disabled>

			<label>40.- Número de escritura pública</label>
			<input type="text" class="common" name="noEstrituraPublica" value="<?php echo $noEstrituraPublica;?>" disabled>

			<label>41.- Volumen (escritura pública)</label>
			<input type="text" class="common" name="volumenEstrituraPublica"  value="<?php echo $volumenEstrituraPublica;?>" disabled>

			<label class="common">42.- Fecha de estritura pública</label><br>
			<input type="text" class="common" id="fechaEstritura" name="fechaEstritura" value="<?php echo $fechaEstritura;?>" disabled>

		<h5 style="background: lightgray; margin: 20px 0; text-align: center;">Registro Público del Acta Constitutiva (ICRESON)</h5>

			<label class="titulos-form">43.- RPP ICRESON</label><br/>
			<input type="file" class="common" name="files[]" disabled><br>

			<label>44. Número de libro</label>
			<input type="text" class="common" id="numeroLibro" name="numeroLibro" value="<?php echo $numeroLibro;?>" disabled>

			<label>45.- Número de inscrpción</label>
			<input type="text" class="common" name="numeroInscripcion" value="<?php echo $numeroInscripcion;?>" disabled>

			<label>46.- Volúmen ICRESON</label>
			<input type="text" class="common" id="volumenICRESON" name="volumenICRESON" value="<?php echo $volumenICRESON;?>" disabled>

		<h5 style="background: lightgray; margin: 20px 0; text-align: center;">Modificaciones del Acta Costitutiva</h5>

			<label class="titulos-form">47.- ¿Su organización ha tenido modificaciones a su acta constitutiva?</label><br>
			<div style="font-size: 20px; margin-left:20px;">
				<input type="radio" class="common" name="existenModis" value="Si" checked disabled> <?php echo $existenModis; ?><br><br>
			</div>

			<?php if ($existenModis == "Si") { ?>

			<label class="common">48.- Ultima acta modificatoria protocolizada</label>
			<input type="file" class="common" name="files[]" disabled><br>

			<label class="common">49.- Fecha de la última modificación del acta constitutiva</label><br>
			<input type="text" class="common" id="ultimaModi" name="ultimaModi" value="<?php echo $ultimaModi;?>" disabled><br><br>

			<label class="common">50.- RPP ICRESON de la última acta modificatoria actualizada</label>
			<input type="file" class="common" name="files[]" disabled><br>

			<label>51.- Número de acta constitutiva</label>
			<input type="text" class="common" id="numeroActaConsti" name="numeroActaConsti" value="<?php echo $numeroActaConsti;?>" disabled>

			<label>52.- Volúmen de acta constitutiva</label>
			<input type="text" class="common" id="volumenActaConsti" name="volumenActaConsti" value="<?php echo $volumenActaConsti;?>" disabled>

			<?php } ?>


		

		<h5 style="background: lightgray; margin: 20px 0; text-align: center;">Donataria autorizada</h5>

		<label class="common">53.- ¿Está autorizada para recibir donativos deducibles de impuestos?</label><br>
		<div style="font-size: 20px; margin-left:20px;">
			<input type="radio" class="common" name="autorizadaDeducible" value="Si" checked disabled> <?php echo $autorizadaDeducible; ?><br><br>	
		</div> 

		
		<?php if ($autorizadaDeducible == "Si") { ?>

		<label class="form-control">54.- Página del DOF donde se publicó su autorización</label>
		<input type="file" class="common" name="files[]" disabled><br>

		<label>55.- número de página donde se identifica a su OSC</label>
		<input type="text" class="common" id="numeroDiario" name="numeroDiario"	value="<?php echo $numeroDiario;?>" disabled>

		<label class="common">56.- Fecha de publicación en el Diario Oficial de la Federación</label><br>
		<input type="text" class="common" id="fechaDiario" name="fechaDiario" value="<?php echo $fechaDiario;?>" disabled><br>

		<label class="common">57.- ¿El SAT ha detenido su autorización como donataria en algún momento?</label><br>
		<input type="radio" class="common" name="detenidoAutorizado" value="Si" checked disabled> <?php echo $detenidoAutorizado; ?><br><br>

		<label>58.- ¿Por qué detuvo el SAT su aturización?</label>
		<input type="text" class="common" id="razonDetenido" name="razonDetenido" value="<?php echo $razonDetenido;?>" disabled>

		<label class="common">59.- ¿Desde que fecha está autorizada para recibir donativos deducibles de impuestos?</label><br>
		<input type="text" class="common" id="fechaAutorizada" name="fechaAutorizada" value="<?php echo $fechaAutorizada;?>" disabled>

		<?php } ?>


		

		<h5 style="background: lightgray; margin: 20px 0; text-align: center;">Historial de la Organización (2)</h5>

		<label class="common">60.- Su organización se rige o es dirigida por:</label>
		<div style="font-size: 20px; margin-left:20px;">
			<input type="radio" class="common" name="digiridaPor" checked disabled> <?php echo $digiridaPor; ?><br><br>
		</div>

		<label>61.- Nombre del presidente</label>
		<input type="text" class="common" id="nombrePresi" name="nombrePresi" value="<?php echo $nombrePresi;?>" disabled>

		<label>62.- Número de empleados</label>
		<input type="text" class="common" id="numeroEmpleados" name="numeroEmpleados" value="<?php echo $numeroEmpleados;?>" disabled>

		<label>63.- Número de voluntarios</label>
		<input type="text" class="common" name="numeroVoluntarios" value="<?php echo $numeroVoluntarios;?>" disabled>

		<label>64.- Principales logros</label>			        
		<input type="text" class="common" id="principalesLogros" name="principalesLogros" value="<?php echo $principalesLogros;?>" disabled>

		<label>65.- Metas de la organización</label>
		<input type="text" class="common" id="metasOrganización" name="metasOrganización" value="<?php echo $metasOrganización;?>" disabled>

		<label>66.- Alianzas con las que cuenta</label>
		<input type="text" class="common" name="principalesAlianzas"  value="<?php echo $principalesAlianzas;?>" disabled>

		<label>67.- Número de personas que benefició el año anterior</label>
		<input type="text" class="common" name="numeroBeneficiados"  value="<?php echo $numeroBeneficiados;?>" disabled>

	
		<h5 style="background: lightgray; margin: 20px 0; text-align: center;">Población beneficiada en el úlitmo año</h5>

		<label class="common">68.- Población que atiende la OSC</label><br> 
				<input type="text" class="common P6" id="poblacion_0_4" name="poblacion_0_4"
					placeholder="0 a 4 años"
					value="<?php echo $poblacion_0_4;?>" disabled>

				<input type="text" class="common P6" name="poblacion_5_14" value="<?php echo $poblacion_5_14;?>" disabled>

				<input type="text" class="common P6" name="poblacion_15_29"	value="<?php echo $poblacion_15_29;?>" disabled>

				<input type="text" class="common P6" name="poblacion_30_44"	value="<?php echo $poblacion_30_44;?>"  disabled>

				<input type="text" class="common P6" name="poblacion_45_64"	value="<?php echo $poblacion_45_64;?>" disabled>

				<input type="text" class="common P6" name="poblacion_65_mas" value="<?php echo $poblacion_65_mas;?>" disabled>

		<h5 style="background: lightgray; margin: 20px 0; text-align: center;">Historial de la organización (3)</h5>

		<label class="titulos-form">69.- ¿Tiene observaciones en su 32 D?</label>
		<div style="font-size: 20px; margin-left:20px;">
			<input type="radio" class="common" name="observaciones32D" value="Si" checked disabled> <?php echo $observaciones32D; ?><br><br>
		</div>

		<label class="common">70.- 32D en positivo y con 30 días de expedición como máximo</label>  
		<input type="file" class="common" name="files[]" disabled>

		<label class="titulos-form">71.- ¿Ha presentado en tiempo y forma la declaración por ejercicio, de impuestos federales?</label>
		<div style="font-size: 20px; margin-left:20px;">
			<input type="radio" class="common" name="tiempoYforma" value="No"checked disabled> <?php echo $tiempoYforma; ?><br><br>
		</div>

		<label class="titulos-form">72.- ¿Tiene adeudos fiscales a cargo, por impuestos federales?</label>
		<div style="font-size: 20px; margin-left:20px;">
			<input type="radio" class="common" name="tieneAdeudos" value="Si" checked disabled> <?php echo $tieneAdeudos; ?><br><br>
		</div>

		<label class="common">73.- F21, del presente año (PDF)</label>
		<input type="file" class="common" name="files[]" disabled>   

		<label class="common">74.- Constancia de Situación Fiscal</label>
		<input type="file" class="common" name="files[]" disabled>

		<label class="common">75.- Comprobante de cuenta bancaria</label>
		<input type="file" class="common" name="files[]" disabled>

		<label class="common">76.- Factura cancelada</label>
		<input type="file" class="common" name="files[]" disabled>

		<label class="titulos-form">77.- ¿Está inscrita en el Directorio Nacional de Instituciones de Asistencia Social?</label>
		<div style="font-size: 20px; margin-left:20px;">
			<input type="radio" class="common" name="inscritaDNIAS" value="No" checked disabled> <?php echo $inscritaDNIAS; ?><br><br>
		</div>

		<?php if ($inscritaDNIAS == "Si") { ?>

		<label class="common">78.- DNIAS</label>
		<input type="file" class="common" name="files[]" disabled>

		<?php } ?>
		

		<label class="titulos-form">79.- ¿Ha manejado esquemas de recursos complementarios?</label><br>
		<div style="font-size: 20px; margin-left:20px;">
		<input type="radio" class="common" name="esquemasRecursosComp" value="Si" checked disabled> <?php echo $esquemasRecursosComp; ?><br><br>
		</div>


		<?php if ($esquemasRecursosComp == "Si") { ?>

		<label>80.- Con qué organización ha manejado recursos complementarios</label>
		<input type="text" class="common" name="organizacionManejoRecursos"  value="<?php echo $organizacionManejoRecursos;?>" disabled>

		<?php } ?>


		
		 <button class="common" type="submit" name="pre-submit">Registrar</button>
		</form>
	</div>
</main>
