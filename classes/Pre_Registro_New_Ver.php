<?php
	/* manda a llamar a header.php */ 
	require"classes/header.php";

	$municipiosDeSonora = [
		'Aconchi', 'Agua Prieta', 'Alamos', 'Altar', 'Arivechi', 'Arizpe', 'Atil',
		'Bacadéhuachi', 'Bacanora', 'Bacerac', 'Bacoachi', 'Bácum', 'Banámichi', 'Baviácora',
		'Bavispe', 'Benito Juárez', 'Benjamín Hill', 'Caborca', 'Cajeme', 'Cananea', 'Carbó',
		'Cucurpe', 'Cumpas', 'Divisaderos', 'Empalme', 'Etchojoa', 'Fronteras', 'General Plutarco Elías Calles',
		'Granados', 'Guaymas', 'Hermosillo', 'Huachinera', 'Huásabas', 'Huatabampo', 'Huépac',
		'Imuris', 'La Colorada', 'Magdalena', 'Mazatán', 'Moctezuma', 'Naco', 'Nácori Chico',
		'Nacozari de García', 'Navojoa', 'Nogales', 'Onavas', 'Opodepe', 'Oquitoa', 'Pitiquito',
		'Puerto Peñasco', 'Quiriego', 'Rayón', 'Rosario', 'Sahuaripa', 'San Felipe de Jesús', 'San Ignacio Río Muerto',
		'San Javier', 'San Luis Río Colorado', 'San Miguel de Horcasitas', 'San Pedro de la Cueva', 'Santa Ana', 'Santa Cruz', 'Sáric',
		'Soyopa', 'Suaqui Grande', 'Tepache', 'Trincheras', 'Tubutama', 'Ures', 'Villa Hidalgo',
		'Villa Pesqueira', 'Yécora'
	];

	$Desarollo_Proyecto = [
		'Salud', 'Asistencia y seguridad social (incluye asilo de ancianos, casas de día, etc)', 'Educación', 'Desarrollo urbano y vivienda', 'Deporte', 'Cultura', 'Desarrollo regional sustentable', 'Financiamiento para el desarrollo', 'Equidad género', 'Atención a pueblos indígenas', 'Juventud', 'Adultos mayores (servicios o proyectos distintos a lo asistencial, es decir, no asilos, no albergues o casas hogar)'
	];
		if (isset($_SESSION['user_Id'])) {
		require 'includes/dbh.inc.php';

		$sql = "SELECT * FROM formularioprincipal inner join cuenta on formularioprincipal.Id_Cuenta = cuenta.Id_Cuenta WHERE cuenta.Id_Cuenta=?;";
		$stmt = mysqli_stmt_init($conn);
		mysqli_stmt_prepare($stmt, $sql);				
		mysqli_stmt_bind_param($stmt, "i", $_SESSION['user_Id']);
		mysqli_stmt_execute($stmt);
		$result = mysqli_stmt_get_result($stmt);
		$row = mysqli_fetch_assoc($result);

		if(empty($row)){
			
		}else{
			header("Location: pre_ver.php?id=".$row['FormularioID']."");
		}
		
			
	}else{
		echo "No Sesion loged";
	}
?>

<div id="myModal" class="modal">
  <!-- Modal content -->
  <div class="modal-content">
    <div class="modal-header">
      <span class="close">&times;</span>
      <h2>Registro de la Organización</h2>
    </div>
    <div class="modal-body">
	<p style="font-size: 24px;">El presente apartado es para conformar un expediente digital de su organización es necesario que responda todas las preguntas como se solicitan a continuación. Se le requerirán subir archivos pdf o jpg, cuyo peso máximo de cada uno no deberá ser mayor a los 10 MB. Los documentos a subir deben cumplir con los requisitos establecidos en la convocatoria.</p><br><hr>
      <p>Forma adecuada de llenar el correo</p>
      <img src="assets/Ejemplo_Correo.PNG" alt="Trulli" width="90%"><br><br><hr>
      <p>Respetar las indicaciones que se dan</p>
      <img src="assets/Ejemplo_Archivos.PNG" alt="Trulli" width="90%"><br><br>
    </div>

    <div class="modal-footer">
      <h3>Gracias por su atencion</h3>
    </div>
  </div>
</div>

<script>		
// Get the modal
var modal = document.getElementById("myModal");

// Get the button that opens the modal
var btn = document.getElementById("myBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// Onload
/window.onload = function() {
  modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}
</script>

<main>

	<h1 style='background: LIGHTSEAGREEN; color: white; text-align:center; font-size:50px;'>Registro De Organizaciones De La Sociedad Civil</h1>

	<div class="">
		<form action="includes/pre.inc.php" method="post" enctype="multipart/form-data">

		<h5 style="background: lightgray; margin: 20px 0; text-align: center;">Datos Generales</h5>

			<label>1.- Correo de organización</label>
				<div style="display: block;">
					<input type="text" class="correo Input_Correo" id="Correo_Organizacion" name="Correo_Organizacion" placeholder="Correo de contacto de la organización" value="" >
					<input type="text" value="@" class="correo Arroba_Correo" disabled>
					<select name="Correos_1" class="correo Mail_Correo" >
						<option value="hotmail.com">hotmail.com</option>
						<option value="gmail.com">gmail.com</option>
						<option value="outlook.com">outlook.com</option>
					</select>						
				</div><br><br>

			<label style="display: block;">2.- RFC</label>
			<input type="text" class="common" id="rfcHomoclave" name="rfcHomoclave" placeholder="RFC con homoclave de la organización" value="" >

			<label>3.- RFC (PDF o JPG) </label> <label style="color: dimgray; font-size: 18px;">(No exceder los 3 MB)</label><br>
			<input type="file" class="common" name="files[]" ><br>


			<label>4.- CLUNI</label>
			<input type="text" class="common" id="CLUNI" name="CLUNI" placeholder="CLUNI (Si no se tiene, ingresar PRE-FOLIO otorgado)" value="" >

			<label>5.- CLUNI (PDF o JPG)</label> <label style="color: dimgray; font-size: 18px;">(No exceder los 3 MB)</label><br>
			<input type="file" class="common" name="files[]" ><br>

			<label>6.- Nombre de la OSC</label>					
			<input type="text" class="common" id="nombreOSC" name="nombreOSC" placeholder="Nombre de la OSC (tal cómo está escrita en su OSC)" value="" >

			<label>7.- Objeto social de la organización</label>
			<input type="text" class="common" id="objetoSocialOrganizacion" name="objetoSocialOrganizacion" placeholder="Objeto social de la organización"value="" >

			<label>8.- Misión</label>
			<textarea name="mision" class="common" id="mision" placeholder="Misión" =""></textarea>
			<label>9.- Visión</label>
			<textarea name="vision" class="common" id="vision" placeholder="Visión" =""></textarea>
			<label>10.- Áreas de atención</label>
			<textarea name="areasAtencion" class="common" id="areasAtencion" placeholder="Áreas de atención de la OSC" ></textarea>

			
			<label class="common">11.- ¿En qué tema de Derecho Social se desarrolla principalmente su organización?</label><br>
				<select class="common" name="tema_de_Derecho_Social" value="" >
				    <?php foreach($Desarollo_Proyecto as $proyecto) {?>
				  		<option><?php echo $proyecto?></option>
				  	<?php } ?>
				</select><br><br>

			<h5 style="background: lightgray; margin: 20px 0; text-align: center;">Domicilio</h5>

			<label>12.- Calle</label>
			<input type="text" class="common" id="calle" name="calle" placeholder="Calle del domicilio" value="" >

			<label>13.- Colonia</label>
			<input type="text" class="common" id="colonia" name="colonia" placeholder="Colonia del domicilio" value="" >

			<label>14.- Codigo postal</label>
			<input type="text" class="common" id="codigoPostal" name="codigoPostal" placeholder="Codigo postal del domicilio" value="" >

			<label>15.- Localidad</label>  
			<input type="text" class="common" id="localidad" name="localidad" placeholder="Localidad del domicilio" value="" >		

			<label>16.- Domicilio</label>
			<input type="text" class="common" id="domicilio" name="domicilio" placeholder="Número del domicilio" value="" >

			<label>17.- Municipio</label><label style="color: dimgray; font-size: 18px;">(Dom. Soc)</label><br>
			<select class="common" id="municipioRegistroOSC" name="municipioRegistroOSC" value="" >
				<?php foreach($municipiosDeSonora as $municipio) {?>
				  	<option><?php echo $municipio?></option>
				<?php } ?>
			</select><br><br>

			<label>18.- Ubicación geográfica (Latitud)</label>
			<input type="text" class="common" id="Latitud" name="Latitud" placeholder="Ingrese la Latitud" value="" >

			<label>19.- Ubicación geográfica (Longitud)</label>
			<input type="text" class="common" id="Longitud" name="Longitud" placeholder="Ingrese la Longitud" value="" >

			<label>20.- Teléfono oficina</label>  
			<input type="text" class="common" id="phoneOficina" name="phoneOficina" placeholder="Teléfono de la oficina (con lada)" value="" >

			<label>21.- Teléfono celular</label>
			<input type="text" class="common" id="phoneCelular" name="phoneCelular" placeholder="Teléfono celular (con lada)" value="" >

			<label>22.- Correo de organización</label>
			<input type="text" class="common" id="emailContacto" name="emailContacto" placeholder="Correo de contacto de la organización" value="" >


			<label>23.- Página web</label>
			<input type="url" class="common" id="paginaWeb" name="paginaWeb" placeholder="Página web de la organización" value="" >

			<label>24.- Facebook</label>
			<input type="text" class="common" id="organizacionFB" name="organizacionFB" placeholder="Facebook de la organización" value="" >

			<label>25.- Twitter</label>
			<input type="text" class="common" id="organizacionTW" name="organizacionTW" placeholder="Twitter de la organización" value="">

			<label>26.- Instagram</label>
			<input type="text" class="common" id="organizacionInsta" name="organizacionInsta" placeholder="Instagram de la organización" value="">	

			<label>27.- ¿Su domicilio social es el mismo que el legal?</label>
			<div style="font-size: 20px; margin-left:20px;">
				<input type="radio" class="common" name="domicilio_social_legal" value="Si" onclick="Domicilio_Social_S();"> Si
				<input type="radio" class="common" name="domicilio_social_legal" value="No" onclick="Domicilio_Social_N();"> No <br><br>	
			</div>

		<div style="background: lightblue;" class="hide" id="Oculto_Domicilio_Social">
			<label>28.- Domicilio Legal (registrado ante SAT)</label> <label style="color: dimgray; font-size: 14px;">(Calle, número, entre o esquina con, colonia,código postal, localidad y municipio)</label>
			<input type="text" class="common" id="domicilio_Dom" name="domicilio_Dom" placeholder="Domicilio Legal" value="">

			<label>29.- Localidad</label> <label style="color: dimgray; font-size: 14px;">(Dom. Legal)</label>
			<input type="text" class="common" id="localidad_Dom" name="localidad_Dom" placeholder="Localidad" value="">

			<label>30.- Municipio</label> <label style="color: dimgray; font-size: 14px;">(Dom. Legal)</label><br>
			<select class="common" id="municipio_Dom" name="municipio_Dom" value="" >
				<?php foreach($municipiosDeSonora as $municipio) {?>
				  	<option><?php echo $municipio?></option>
				<?php } ?>
			</select><br>
		</div>

		<h5 style="background: lightgray; margin: 20px 0; text-align: center;">Historial de la organización</h5>

			<label class="common">31.- Acta constitutiva</label>
			<label style="color: dimgray; font-size: 18px;">(No exceder los 8 MB)</label>
			<input type="file" class="common" name="files[]" >

			<label class="common">32.- Acta protocolizada donde conste la representación legal vigente</label>
			<input type="file" class="common" name="files[]" >        

			<label class="common">33.- INE del representante legal vigente</label>
			<input type="file" class="common" name="files[]" >

			<label>34.- Nombre del representante legal</label>
			<input type="text" class="common" id="nombreRepresentante" name="nombreRepresentante" placeholder="Nombre del representante legal vigente" value="" >

			<label>35.- Número de identificación oficial</label>
			<input type="text" class="common" id="idRepresentante" name="idRepresentante" placeholder="Número de identificación oficial del representante legal vigente" value="" >

			<label class="common">36.- Fecha de constitución de la OSC</label><br>
			<input type="date" class="common" id="fechaConstitucionOSC" name="fechaConstitucionOSC" value="" ><br><br>

			<label>37.- Nombre del Notario Público donde registró su OSC</label>
			<input type="text" class="common" id="nombreNotario" name="nombreNotario" placeholder="Nombre del notario público" value="" >

			<label>38.- Número del notario público</label>
			<input type="text" class="common" id="numeroNotario" name="numeroNotario" placeholder="Número del notario público" value="" >

			<label class="common">39.- Municipio de la Notaría Pública</label><br>
				<select class="common" name="municipioNotaria" value="" >
				    <?php foreach($municipiosDeSonora as $municipio) {?>
				  		<option><?php echo $municipio?></option>
				  	<?php } ?>
				</select><br><br>

			<label>40.- Número de escritura pública</label>
			<input type="text" class="common" id="noEstrituraPublica" name="noEstrituraPublica" placeholder="Número de estritura pública" value="" >

			<label>41.- Volumen (escritura pública)</label>
			<input type="text" class="common" id="volumenEstrituraPublica" name="volumenEstrituraPublica" placeholder="Volumen de estritura pública" value="" >

			<label class="common">42.- Fecha de estritura pública</label><br>
			<input type="date" class="common" id="fechaEstritura" name="fechaEstritura" value="" ><br><br>

		<h5 style="background: lightgray; margin: 20px 0; text-align: center;">Registro Público del Acta Constitutiva (ICRESON)</h5>

			<label class="titulos-form">43.- RPP ICRESON</label><br/>
			<input type="file" class="common" name="files[]" ><br>

			<label>44. Número de libro</label>
			<input type="text" class="common" id="numeroLibro" name="numeroLibro" placeholder="Número de libro" value="" >

			<label>45.- Número de inscrpción</label>
			<input type="text" class="common" id="numeroInscripcion" name="numeroInscripcion" placeholder="Número de inscrpción" value="" >

			<label>46.- Volúmen ICRESON</label>
			<input type="text" class="common" id="volumenICRESON" name="volumenICRESON" placeholder="Volúmen ICRESON" value="" >

		<h5 style="background: lightgray; margin: 20px 0; text-align: center;">Modificaciones del Acta Costitutiva</h5>

			<label class="titulos-form">47.- ¿Su organización ha tenido modificaciones a su acta constitutiva?</label><br>
			<div style="font-size: 20px; margin-left:20px;">
				<input type="radio" class="common" name="existenModis" value="Si" onclick="Oculto_Acta_Costitutiva_S();"> Si
				<input type="radio" class="common" name="existenModis" value="No" onclick="Oculto_Acta_Costitutiva_N();"> No 
			</div>

		<div style="background: lightblue;" class="hide" id="Oculto_Acta_Costitutiva">
		<h5 style="background: lightcyan; margin: 20px 0; text-align: center;">Útima modificación de su acta constitutiva protocolizada</h5>

		<label class="common">48.- Ultima acta modificatoria protocolizada</label>
		<label style="color: dimgray; font-size: 18px;">(No exceder los 3 MB)</label><br/>
		<input type="file" class="common" name="files[]" ><br>

		<label class="common">49.- Fecha de la última modificación del acta constitutiva</label><br>
		<input type="date" class="common" id="ultimaModi" name="ultimaModi" value="" ><br><br>

		<label class="common">50.- RPP ICRESON de la última acta modificatoria actualizada</label>
		<label style="color: dimgray; font-size: 18px;">(No exceder los 3 MB)</label><br/>
		<input type="file" class="common" name="files[]" ><br>

		<label>51.- Número de acta constitutiva</label>
		<input type="text" class="common" id="numeroActaConsti" name="numeroActaConsti" placeholder="Número de acta constitutiva" value="" >

		<label>52.- Volúmen de acta constitutiva</label>
		<input type="text" class="common" id="volumenActaConsti" name="volumenActaConsti" placeholder="Volúmen de acta constitutiva" value="" >
		</div>


		<h5 style="background: lightgray; margin: 20px 0; text-align: center;">Donataria autorizada</h5>

		<label class="common">53.- ¿Está autorizada para recibir donativos deducibles de impuestos?</label><br>
		<div style="font-size: 20px; margin-left:20px;">
			<input type="radio" class="common" name="autorizadaDeducible" value="Si" onclick="Oculto_Donataria_S();"> Si
			<input type="radio" class="common" name="autorizadaDeducible" value="No" onclick="Oculto_Donataria_N();"> No <br><br>	
		</div> 

		<div style="background: lightblue;" class="hide" id="Oculto_Donataria">

		<h5 style="background: lightcyan; margin: 20px 0; text-align: center;">Donataria autorizada (1)</h5>

		<label class="form-control">54.- Página del DOF donde se publicó su autorización</label>
		<label style="color: dimgray; font-size: 18px;">(No exceder los 3 MB)</label><br/>
		<input type="file" class="common" name="files[]" ><br>

		<label>55.- número de página donde se identifica a su OSC</label> <label style="color: dimgray; font-size: 18px">(En caso de subir todo el DOF)</label>
		<input type="text" class="common" id="numeroDiario" name="numeroDiario"	placeholder="Número de página del Diario Oficial de la Federación" value="" >

		<label class="common">56.- Fecha de publicación en el Diario Oficial de la Federación</label><br>
		<input type="date" class="common" id="fechaDiario" name="fechaDiario" value="" ><br>

		<label class="common">57.- ¿El SAT ha detenido su autorización como donataria en algún momento?</label><br>
			<input type="radio" class="common" name="detenidoAutorizado" value="Si" onclick="Oculto_57_S();"> Si
			<input type="radio" class="common" name="detenidoAutorizado" value="No" onclick="Oculto_57_N();"> No <br>

		<div style="background: lightblue;" class="hide" id="Oculto_57">
		<label>58.- ¿Por qué detuvo el SAT su aturización?</label>
		<input type="text" class="common" id="razonDetenido" name="razonDetenido" placeholder="¿Por qué detuvo el SAT su autorización?"	value="" >
		</div>

		<label class="common">59.- ¿Desde que fecha está autorizada para recibir donativos deducibles de impuestos?</label><br>
		<input type="date" class="common" id="fechaAutorizada" name="fechaAutorizada" value="" ><br><br>

		</div>

		<h5 style="background: lightgray; margin: 20px 0; text-align: center;">Historial de la Organización (2)</h5>

		<label class="common">60.- Su organización se rige o es dirigida por:</label>
		<div style="font-size: 20px; margin-left:20px;">
			<input type="radio" class="common" name="digiridaPor" value="Patronato" checked> Patronato <br>
			<input type="radio" class="common" name="digiridaPor" value="Consejo Directivo"> Consejo directivo <br>
			<input type="radio" class="common" name="digiridaPor" value="Otro"> Otro <br><br> 	
		</div>

		<label>61.- Nombre del presidente</label>
		<input type="text" class="common" id="nombrePresi" name="nombrePresi" placeholder="Nombre del presidente y/o director general" value="" >

		<label>62.- Número de empleados</label>
		<input type="text" class="common" id="numeroEmpleados" name="numeroEmpleados" placeholder="Número de empleados de la organización" value="" >

		<label>63.- Número de voluntarios</label>
		<input type="text" class="common" id="numeroVoluntarios" name="numeroVoluntarios" placeholder="Número de voluntarios de la organización" value="" >

		<label>64.- Principales logros</label>			        
		<input type="text" class="common" id="principalesLogros" name="principalesLogros" placeholder="Principales logros de su organización durante el último año" value="" >

		<label>65.- Metas de la organización</label>
		<input type="text" class="common" id="metasOrganización" name="metasOrganización" placeholder="Metas de la organización para el presente año (2019)"value="" >

		<label>66.- Alianzas con las que cuenta</label>
		<input type="text" class="common" id="principalesAlianzas" name="principalesAlianzas" placeholder="Mencione las principales alianzas con las que cuente convenio o realiza acciones conjuntas" value="" >

		<label>67.- Número de personas que benefició el año anterior</label>
		<input type="text" class="common" id="numeroBeneficiados" name="numeroBeneficiados" placeholder="Número de pesonas que beneficio el año
pasado, en su totalidad, como organización" value="" >

	
		<h5 style="background: lightgray; margin: 20px 0; text-align: center;">Población beneficiada en el úlitmo año</h5>

		<label class="common">68.- Población que atiende la OSC</label><br> 
				<input type="text" class="common P6" id="poblacion_0_4" name="poblacion_0_4"
					placeholder="0 a 4 años"
					value="" >

				<input type="text" class="common P6" id="poblacion_5_14" name="poblacion_5_14"
					placeholder="5 a 14 años"
					value="" >

				<input type="text" class="common P6" id="poblacion_15_29" name="poblacion_15_29"
					placeholder="15 a 29 años"
					value="" >

				<input type="text" class="common P6" id="poblacion_30_44" name="poblacion_30_44"
					placeholder="30 a 44 años"
					value=""  >

				<input type="text" class="common P6" id="poblacion_45_64" name="poblacion_45_64"
					placeholder="45 a 64 años"
					value="" >

				<input type="text" class="common P6" id="poblacion_65_mas" name="poblacion_65_mas"
					placeholder="45 a 64 años"
					value="" >

		<h5 style="background: lightgray; margin: 20px 0; text-align: center;">Historial de la organización (3)</h5>

		<label class="titulos-form">69.- ¿Tiene observaciones en su 32 D?</label>
		<div style="font-size: 20px; margin-left:20px;">
			<input type="radio" class="common" name="observaciones32D" value="Si" checked> Si
			<input type="radio" class="common" name="observaciones32D" value="No"> No <br><br>
		</div>

		<label class="common">70.- 32D en positivo y con 30 días de expedición como máximo</label>  
		<label style="color: dimgray; font-size: 18px;">(No exceder los 300 KB)</label>
		<input type="file" class="common" name="files[]" >

		<label class="titulos-form">71.- ¿Ha presentado en tiempo y forma la declaración por ejercicio, de impuestos federales?</label>
		<div style="font-size: 20px; margin-left:20px;">
			<input type="radio" class="common" name="tiempoYforma" value="Si" checked> Si
			<input type="radio" class="common" name="tiempoYforma" value="No"> No <br><br>
		</div>

		<label class="titulos-form">72.- ¿Tiene adeudos fiscales a cargo, por impuestos federales?</label>
		<div style="font-size: 20px; margin-left:20px;">
			<input type="radio" class="common" name="tieneAdeudos" value="Si" checked> Si
			<input type="radio" class="common" name="tieneAdeudos" value="No"> No <br><br>
		</div>

		<label class="common">73.- F21, del presente año (PDF)</label>
		<label style="color: dimgray; font-size: 18px;">(No exceder los 800 KB)</label>
		<input type="file" class="common" name="files[]" >   

		<label class="common">74.- Constancia de Situación Fiscal</label>
		<input type="file" class="common" name="files[]" >

		<label class="common">75.- Comprobante de cuenta bancaria</label>
		<input type="file" class="common" name="files[]" >

		<label class="common">76.- Factura cancelada</label>
		<input type="file" class="common" name="files[]" >

		<label class="titulos-form">77.- ¿Está inscrita en el Directorio Nacional de Instituciones de Asistencia Social?</label>
		<div style="font-size: 20px; margin-left:20px;">
			<input type="radio" class="common" name="inscritaDNIAS" value="Si" onclick="Oculto_77_S();"> Si
			<input type="radio" class="common" name="inscritaDNIAS" value="No" onclick="Oculto_77_N();"> No somos una organización de asistencia social <br><br>
		</div>

		<div style="background: lightblue;" class="hide" id="Oculto_77">
		<label class="common">78.- DNIAS</label>
		<input type="file" class="common" name="files[]" >
		</div>

		<label class="titulos-form">79.- ¿Ha manejado esquemas de recursos complementarios?</label><br>
		<div style="font-size: 20px; margin-left:20px;">
			<input type="radio" class="common" name="esquemasRecursosComp" value="Si" onclick="Oculto_79_S();"> Sí
			<input type="radio" class="common" name="esquemasRecursosComp" value="No" onclick="Oculto_79_N();"> No
		</div><br>

		<div style="background: lightblue;" class="hide" id="Oculto_79">
		<label>80.- Con qué organización ha manejado recursos complementarios</label>
		<input type="text" class="common" id="organizacionManejoRecursos" name="organizacionManejoRecursos" placeholder="¿Con qué organización ha manejado recursos complementarios?" value="" >
		</div>

		 <button class="common" type="submit" name="pre-submit">Registrar</button>
		</form>
	</div>
</main>

<script type="text/javascript">
function Domicilio_Social_N(){
	document.getElementById('Oculto_Domicilio_Social').classList.add('Yes_Ver');
}
function Domicilio_Social_S(){
  document.getElementById('Oculto_Domicilio_Social').classList.remove('Yes_Ver');
}

function Oculto_Acta_Costitutiva_N(){
  document.getElementById('Oculto_Acta_Costitutiva').classList.remove('Yes_Ver');
}
function Oculto_Acta_Costitutiva_S(){
  document.getElementById('Oculto_Acta_Costitutiva').classList.add('Yes_Ver');
}

function Oculto_Donataria_N(){
  document.getElementById('Oculto_Donataria').classList.remove('Yes_Ver');
}
function Oculto_Donataria_S(){
  document.getElementById('Oculto_Donataria').classList.add('Yes_Ver');
}

function Oculto_57_N(){
  document.getElementById('Oculto_57').classList.remove('Yes_Ver');
}
function Oculto_57_S(){
  document.getElementById('Oculto_57').classList.add('Yes_Ver');
}

function Oculto_77_N(){
  document.getElementById('Oculto_77').classList.remove('Yes_Ver');
}
function Oculto_77_S(){
  document.getElementById('Oculto_77').classList.add('Yes_Ver');
}

function Oculto_79_N(){
  document.getElementById('Oculto_79').classList.remove('Yes_Ver');
}
function Oculto_79_S(){
  document.getElementById('Oculto_79').classList.add('Yes_Ver');
}
</script>
