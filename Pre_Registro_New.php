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

	<h1 style='background: LIGHTSEAGREEN; color: white; text-align:center'>Pre-Registro de empresas</h1>
	<p style='background: TURQUOISE; color: white; text-align:center;'>Para proximas convocatorias</p><br>

	<div class="">
		<form action="includes/pre.inc.php" method="post" enctype="multipart/form-data">

		<h5 style="background: lightgray; margin: 20px 0; text-align: center;">Registro de la Organización</h5>

			<label>1.- Correo de organización</label>
				<div>
					<select name="Correos_1" class="float-right correo" style="padding: 11px 20px; border-radius: 0 30px 30px 0;">
						<option value="Hotmail.com">Hotmail.com</option>
						<option value="Gmail.com">Gmail.com</option>
						<option value="Outlook.com">Outlook.com</option>
					</select>
						<input type="text" name="correo" value="@" style="width: 14px;" class="float-right correo" disabled>
						<input type="text" class="float-right correo" style="border-radius: 30px 0 0 30px;" id="emailContacto" name="emailContacto" placeholder="Correo de contacto de la organización" value="" required>
				</div>

			<label>2.- RFC</label>
			<input type="text" class="common" id="rfcHomoclave" name="rfcHomoclave" placeholder="RFC con homoclave de la organización" value="" required>

			<label>3.- RFC (PDF o JPG) </label> <label style="color: dimgray; font-size: 18px;">(Mensaje)</label><br>
			<input type="file" class="common" name="files[]" required><br>

			<label>4.- CLUNI</label>
			<input type="text" class="common" id="CLUNI" name="CLUNI" placeholder="CLUNI (Si no se tiene, ingresar PRE-FOLIO otorgado)" value="" required>

			<label>5.- CLUNI (PDF o JPG)</label><br>
			<input type="file" class="common" name="files[]" required><br>

			<label>6.- Nombre de la OSC</label>					
			<input type="text" class="common" id="nombreOSC" name="nombreOSC" placeholder="Nombre de la OSC (tal cómo está escrita en su OSC)" value="" required>

			<label>7.- Objeto social</label>
			<input type="text" class="common" id="objetoSocialOrganizacion" name="objetoSocialOrganizacion" placeholder="Objeto social de la organización"value="" required>

			<label>8.- Misión</label>
			<textarea name="mision" class="common" id="mision" placeholder="Misión" required=""></textarea>
			<label>9.- Visión</label>
			<textarea name="vision" class="common" id="vision" placeholder="Visión" required=""></textarea>
			<label>10.- Áreas de atención</label>
			<textarea name="areasAtencion" class="common" id="areasAtencion" placeholder="Áreas de atención de la OSC" required></textarea>

			<label>11.-</label><br><br>


			<h2></h2>
			<label>12.- Calle</label>
			<input type="text" class="common" id="calle" name="calle" placeholder="Calle del domicilio" value="" required>

			<label>13.- Colonia</label>
			<input type="text" class="common" id="colonia" name="colonia" placeholder="Colonia del domicilio" value="" required>

			<label>14.- Codigo postal</label>
			<input type="text" class="common" id="codigoPostal" name="codigoPostal" placeholder="Codigo postal del domicilio" value="" required>

			<label>15.- Localidad</label>  
			<input type="text" class="common" id="localidad" name="localidad" placeholder="Localidad del domicilio" value="" required>		

			<label>16.- Domicilio</label>
			<input type="text" class="common" id="numero" name="numero" placeholder="Número del domicilio" value="" required>

			<label>17.- Municipio</label><label style="color: dimgray; font-size: 18px;">(Dom. Soc)</label><br>
			<select class="common" id="municipioRegistroOSC" name="municipioRegistroOSC" value="" required>
				<?php foreach($municipiosDeSonora as $municipio) {?>
				  	<option><?php echo $municipio?></option>
				<?php } ?>
			</select><br><br>

			<label>18.- Ubicación geográfica (Latitud)</label>
			<input type="text" class="common" id="" name="" placeholder="" value="" required>

			<label>19.- Ubicación geográfica (Longitud)</label>
			<input type="text" class="common" id="" name="" placeholder="" value="" required>

			<label>20.- Teléfono oficina</label>  
			<input type="text" class="common" id="phoneOficina" name="phoneOficina" placeholder="Teléfono de la oficina (con lada)" value="" required>

			<label>21.- Teléfono celular</label>
			<input type="text" class="common" id="phoneCelular" name="phoneCelular" placeholder="Teléfono celular (con lada)" value="" required>

			<label>22.- Correo de organización</label>
			<div>
				<select name="Correos_1" class="float-right correo" style="padding: 11px 20px; border-radius: 0 30px 30px 0;">
					<option value="Hotmail.com">Hotmail.com</option>
					<option value="Gmail.com">Gmail.com</option>
					<option value="Outlook.com">Outlook.com</option>
				</select>
				<input type="text" name="correo" value="@" style="width: 14px;" class="float-right correo" disabled>
				<input type="text" class="float-right correo" style="border-radius: 30px 0 0 30px;" id="emailContacto" name="emailContacto" placeholder="Correo de contacto de la organización" value="" required>
			</div>

			<label>23.- Página web</label>
			<input type="url" class="common" id="paginaWeb" name="paginaWeb" placeholder="Página web de la organización" value="" required>

			<label>24.- Facebook</label>
			<input type="text" class="common" id="organizacionFB" name="organizacionFB" placeholder="Facebook de la organización" value="" required>

			<label>25.- Twitter</label> <label style="color: dimgray; font-size: 18px;">(No Obligatorio)</label>
			<input type="text" class="common" id="organizacionTW" name="organizacionTW" placeholder="Twitter de la organización" value="">

			<label>26.- Instagram</label> <label style="color: dimgray; font-size: 18px;">(No Obligatorio)</label>
			<input type="text" class="common" id="organizacionInsta" name="organizacionInsta" placeholder="Instagram de la organización" value="">	

			<label>27.- ¿Su domicilio social es el mismo que el legal?</label>
			<div style="font-size: 20px; margin-left:20px;">
				<input type="radio" class="common" name="domicilio_social_legal" value="Si" checked> Si
				<input type="radio" class="common" name="domicilio_social_legal" value="No"> No <br><br>	
			</div>

			<label>28.- Domicilio Legal (registrado ante SAT)</label> <label style="color: dimgray; font-size: 14px;">(Calle, número, entre o esquina con, colonia,código postal, localidad y municipio)</label>
			<input type="text" class="common" id="" name="" placeholder="" value="">

			<label>29.- Localidad</label> <label style="color: dimgray; font-size: 14px;">(Dom. Legal)</label>
			<input type="text" class="common" id="" name="" placeholder="" value="">

			<label>30.- Municipio</label> <label style="color: dimgray; font-size: 14px;">(Dom. Legal)</label>
			<input type="text" class="common"  placeholder="Municipio del domicilio legal" value="" required>
			<select class="common" id="municipio_Dom" name="municipio_Dom" value="" required>
				<?php foreach($municipiosDeSonora as $municipio) {?>
				  	<option><?php echo $municipio?></option>
				<?php } ?>
			</select><br>

		<h5 style="background: lightgray; margin: 20px 0; text-align: center;">Historial de la organización (1)</h5>

			<label class="common">31.- Acta constitutiva</label>
			<label style="color: dimgray; font-size: 18px;">(No exceder los 8 MB)</label>
			<input type="file" class="common" name="files[]" required>

			<label class="common">32.- Acta protocolizada donde conste la representación legal vigente</label>
			<input type="file" class="common" name="files[]" required>        

			<label class="common">33.- INE del representante legal vigente</label>
			<input type="file" class="common" name="files[]" required>

			<label>34.- Nombre del representante legal</label>
			<input type="text" class="common" id="nombreRepresentante" name="nombreRepresentante" placeholder="Nombre del representante legal vigente" value="" required>

			<label>35.- Número de identificación oficial</label>
			<input type="text" class="common" id="idRepresentante" name="idRepresentante" placeholder="Número de identificación oficial del representante legal vigente" value="" required>

			<label class="common">36.- Fecha de constitución de la OSC</label><br>
			<input type="date" class="common" id="fechaConstitucionOSC" name="fechaConstitucionOSC" value="" required><br><br>

			<label>37.- Nombre del Notario Público donde registró su OSC</label>
			<input type="text" class="common" id="nombreNotario" name="nombreNotario" placeholder="Nombre del notario público" value="" required>

			<label>38.- Número del notario público</label>
			<input type="text" class="common" id="numeroNotario" name="numeroNotario" placeholder="Número del notario público" value="" required>

			<label class="common">39.- Municipio de la Notaría Pública</label><br>
				<select class="common" name="municipioNotaria" value="" required>
				    <?php foreach($municipiosDeSonora as $municipio) {?>
				  		<option><?php echo $municipio?></option>
				  	<?php } ?>
				</select><br><br>

			<label>40.- Número de escritura pública</label>
			<input type="text" class="common" id="noEstrituraPublica" name="noEstrituraPublica" placeholder="Número de estritura pública" value="" required>

			<label>41.- Volumen (escritura pública)</label>
			<input type="text" class="common" id="volumenEstrituraPublica" name="volumenEstrituraPublica" placeholder="Volumen de estritura pública" value="" required>

			<label class="common">42.- Fecha de estritura pública</label><br>
			<input type="date" class="common" id="fechaEstritura" name="fechaEstritura" value="" required><br><br>

		<h5 style="background: lightgray; margin: 20px 0; text-align: center;">Registro Público del Acta Constitutiva (ICRESON)</h5>

			<label class="titulos-form">43.- RPP ICRESON</label><br/>
			<input type="file" class="common" name="files[]" required><br>

			<label>44.- Número de inscrpción</label>
			<input type="text" class="common" id="numeroInscripcion" name="numeroInscripcion" placeholder="Número de inscrpción" value="" required>

			<label>45.- Volúmen ICRESON</label>
			<input type="text" class="common" id="volumenICRESON" name="volumenICRESON" placeholder="Volúmen ICRESON" value="" required>

		<h5 style="background: lightgray; margin: 20px 0; text-align: center;">Registro Público del Acta Constitutiva (ICRESON)</h5>

			<label class="titulos-form">46.- ¿Su organización ha tenido modificaciones a su acta constitutiva?</label><br>
			<div style="font-size: 20px; margin-left:20px;">
				<input type="radio" class="common" name="existenModis" value="Si" checked> Si
				<input type="radio" class="common" name="existenModis" value="No"> No 
			</div>


		<h5 style="background: lightcyan; margin: 10px 0; text-align: center;">Útima modificación de su acta constitutiva protocolizada</h5>

		<label class="common">47.- Ultima acta modificatoria protocolizada</label>
		<label style="color: dimgray; font-size: 18px;">(No exceder los 3 MB)</label><br/>
		<input type="file" class="common" name="files[]" required><br>

		<label class="common">48.- Fecha de la última modificación del acta constitutiva</label><br>
		<input type="date" class="common" id="ultimaModi" name="ultimaModi" value="" required><br><br>

		<label class="common">49.- RPP ICRESON de la última acta modificatoria actualizada</label>
		<label style="color: dimgray; font-size: 18px;">(No exceder los 3 MB)</label><br/>
		<input type="file" class="common" name="files[]" required><br>

		<label>50.- Número de acta constitutiva</label>
		<input type="text" class="common" id="numeroActaConsti" name="numeroActaConsti" placeholder="Número de acta constitutiva" value="" required>

		<label>51.- Volúmen de acta constitutiva</label>
		<input type="text" class="common" id="volumenActaConsti" name="volumenActaConsti" placeholder="Volúmen de acta constitutiva" value="" required>


		<h5 style="background: lightgray; margin: 20px 0; text-align: center;">Donataria autorizada</h5>

		<label class="common">52.- ¿Está autorizada para recibir donativos deducibles de impuestos?</label><br>
		<div style="font-size: 20px; margin-left:20px;">
			<input type="radio" class="common" name="autorizadaDeducible" value="Si" checked> Si
			<input type="radio" class="common" name="autorizadaDeducible" value="No"> No <br><br>	
		</div> 

		<h5 style="background: lightcyan; margin: 10px 0; text-align: center;">Donataria autorizada</h5>
		<div style="background: lightcyan;">
		<label class="form-control">53.- Página del DOF donde se publicó su autorización</label>
		<label style="color: dimgray; font-size: 18px;">(No exceder los 3 MB)</label><br/>
		<input type="file" class="common" name="files[]" required><br>

		<label>54.- número de página donde se identifica a su OSC</label> <label style="color: dimgray; font-size: 18px">(En caso de subir todo el DOF)</label>
		<input type="text" class="common" id="numeroDiario" name="numeroDiario"	placeholder="Número de página del Diario Oficial de la Federación" value="" required>

		<label class="common">55.- Fecha de publicación en el Diario Oficial de la Federación</label><br>
		<input type="date" class="common" id="fechaDiario" name="fechaDiario" value="" required><br>

		<div style="background: lightblue;">
		<label class="common">56.- ¿El SAT ha detenido su autorización como donataria en algún momento?</label><br>
		<div style="font-size: 20px; margin-left:20px;">
			<input type="radio" class="common" name="detenidoAutorizado" value="Si" checked> Si
			<input type="radio" class="common" name="detenidoAutorizado" value="No"> No <br>
		</div>
		<label>57.- ¿Por qué detuvo el SAT su aturización?</label>
		<input type="text" class="common" id="razonDetenido" name="razonDetenido" placeholder="¿Por qué detuvo el SAT su autorización?"	value="" required>
		</div>

		<label class="common">58.- ¿Desde que fecha está autorizada para recibir donativos deducibles de impuestos?</label><br>
		<input type="date" class="common" id="fechaAutorizada" name="fechaAutorizada" value="" required><br><br>
		</div>

		<h5 style="background: lightgray; margin: 20px 0; text-align: center;">Historial de la Organización (2)</h5>

		<label class="common">59.- Su organización se rige o es dirigida por:</label>
		<div style="font-size: 20px; margin-left:20px;">
			<input type="radio" class="common" name="digiridaPor" value="Patronato" checked> Patronato <br>
			<input type="radio" class="common" name="digiridaPor" value="Consejo Directivo"> Consejo directivo <br>
			<input type="radio" class="common" name="digiridaPor" value="Otro"> Otro <br><br> 	
		</div>

		<label>60.- Nombre del presidente</label>
		<input type="text" class="common" id="nombrePresi" name="nombrePresi" placeholder="Nombre del presidente y/o director general" value="" required>

		<label>61.- Número de empleados</label>
		<input type="text" class="common" id="numeroEmpleados" name="numeroEmpleados" placeholder="Número de empleados de la organización" value="" required>

		<label>62.- Número de voluntarios</label>
		<input type="text" class="common" id="numeroVoluntarios" name="numeroVoluntarios" placeholder="Número de voluntarios de la organización" value="" required>

		<label>63.- Principales logros</label>			        
		<input type="text" class="common" id="principalesLogros" name="principalesLogros" placeholder="Principales logros de su organización durante el último año" value="" required>

		<label>64.- Metas de la organización</label>
		<input type="text" class="common" id="metasOrganización" name="metasOrganización" placeholder="Metas de la organización para el presente año (2019)"value="" required>

		<label>65.- Alianzas con las que cuenta</label>
		<input type="text" class="common" id="principalesAlianzas" name="principalesAlianzas" placeholder="Mencione las principales alianzas con las que cuente convenio o realiza acciones conjuntas" value="" required>

		<label>66.- Número de personas que beneficio</label>
		<input type="text" class="common" id="numeroBeneficiados" name="numeroBeneficiados" placeholder="Número de pesonas que beneficio el año
pasado, en su totalidad, como organización" value="" required>

	
		<h5 style="background: lightgray; margin: 20px 0; text-align: center;">Población beneficiada en el úlitmo año</h5>

		<label class="common">67.- Población que atiende la OSC</label><br> 
				<input type="text" class="common P6" id="poblacion_0_4" name="poblacion_0_4"
					placeholder="0 a 4 años"
					value="" required>

				<input type="text" class="common P6" id="poblacion_5_14" name="poblacion_5_14"
					placeholder="5 a 14 años"
					value="" required>

				<input type="text" class="common P6" id="poblacion_15_29" name="poblacion_15_29"
					placeholder="15 a 29 años"
					value="" required>

				<input type="text" class="common P6" id="poblacion_30_44" name="poblacion_30_44"
					placeholder="30 a 44 años"
					value=""  >

				<input type="text" class="common P6" id="poblacion_45_64" name="poblacion_45_64"
					placeholder="45 a 64 años"
					value="" required>

				<input type="text" class="common P6" id="poblacion_65_mas" name="poblacion_65_mas"
					placeholder="45 a 64 años"
					value="" required>

		<h5 style="background: lightgray; margin: 20px 0; text-align: center;">Historial de la organización (3)</h5>

		<label class="titulos-form">68.- ¿Tiene observaciones en su 32 D?</label>
		<div style="font-size: 20px; margin-left:20px;">
			<input type="radio" class="common" name="observaciones32D" value="Si" checked> Si
			<input type="radio" class="common" name="observaciones32D" value="No"> No <br><br>
		</div>

		<label class="common">69.- 32D en positivo y con 30 días de expedición como máximo</label>  
		<label style="color: dimgray; font-size: 18px;">(No exceder los 300 KB)</label>
		<input type="file" class="common" name="files[]" required>

		<label class="titulos-form">70.- ¿Ha presentado en tiempo y forma la declaración por ejercicio, de impuestos federales?</label>
		<div style="font-size: 20px; margin-left:20px;">
			<input type="radio" class="common" name="tiempoYforma" value="Si" checked> Si
			<input type="radio" class="common" name="tiempoYforma" value="No"> No <br><br>
		</div>

		<label class="titulos-form">71.- ¿Tiene adeudos fiscales a cargo, por impuestos federales?</label>
		<div style="font-size: 20px; margin-left:20px;">
			<input type="radio" class="common" name="tieneAdeudos" value="Si" checked> Si
			<input type="radio" class="common" name="tieneAdeudos" value="No"> No <br><br>
		</div>

		<label class="common">72.- F21, del presente año (PDF)</label>
		<label style="color: dimgray; font-size: 18px;">(No exceder los 800 KB)</label>
		<input type="file" class="common" name="files[]" required>   

		<label class="common">73.- Constancia de Situación Fiscal</label>
		<input type="file" class="common" name="files[]" required>

		<label class="common">74.- Comprobante de cuenta bancaria</label>
		<input type="file" class="common" name="files[]" required>

		<label class="common">75.- Factura cancelada</label>
		<input type="file" class="common" name="files[]" required>

		<label class="titulos-form">76.- ¿Está inscrita en el Directorio Nacional de Instituciones de Asistencia Social?</label>
		<div style="font-size: 20px; margin-left:20px;">
			<input type="radio" class="common" name="inscritaDNIAS" value="Si" checked> Si
			<input type="radio" class="common" name="inscritaDNIAS" value="No"> No <br><br>
		</div>

		<label class="common">77.- DNIAS</label>
		<input type="file" class="common" name="files[]" required>
<div style="background: lightcyan;">

		<label class="titulos-form">78.- ¿Ha manejado esquemas de recursos complementarios?</label><br>
		<div style="font-size: 20px; margin-left:20px;">
			<input type="radio" class="common" name="esquemasRecursosComp" value="Si" checked> Sí
			<input type="radio" class="common" name="esquemasRecursosComp" value="No"> No
		</div><br>

		<div style="background: lightblue;">
		<label>79.- Con qué organización ha manejado recursos complementarios</label>
		<input type="text" class="common" id="organizacionManejoRecursos" name="organizacionManejoRecursos" placeholder="¿Con qué organización ha manejado recursos complementarios?" value="" required>
		</div>

</div>

		 <button class="common" type="submit" name="pre-submit">Registrar</button>
		</form>
	</div>
</main>


<?php  
/* manda a llamar a footer.php */ 
	require"footer.php";
?>