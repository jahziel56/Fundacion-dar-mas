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

	<main>
			<h1>Pre-Registro de la empresa</h1>
			<h5>Para la proxima convocatoria</h5>
			<?php 
				if (isset($_GET['error'])) {
					if (($_GET['error']) == "emptyfields") {
						echo '<p class"signuperror">Fill in all fields!</p>';
					}
					else if (($_GET['error']) == "invalidmailuid") {
						echo '<p class"signuperror">Fill correctly mail and Username!</p>';					
					}
					else if (($_GET['error']) == "invalidmail") {
						echo '<p class"signuperror">Fill correctly mail!</p>';					
					}
					else if (($_GET['error']) == "invaliduid") {
						echo '<p class"signuperror">Fill correctly Username!</p>';					
					}
					else if (($_GET['error']) == "passwordcheck") {
						echo '<p class"signuperror">Repet correctly the password!</p>';
					}
					else if (($_GET['error']) == "usertaken") {
						echo '<p class"signuperror">Username is already taken!</p>';
					}
					else if (($_GET['error']) == "Telefononum") {
						echo '<p class"signuperror">Favor de colocar numeros en el campo telefono</p>';
					}
					else if (($_GET['error']) == "alreadycreated") {
						echo '<p class"signuperror">Ya existe su pagina de usuario</p>';
					}
				}
				if (isset($_GET['signup'])) {
					if (($_GET['signup']) == "success") {
						echo '<p class"signuperror">Perfil creado</p>';
					}
				}

			?>	

			<div class="">
			<form action="includes/pre.inc.php" method="post">

				<button class="accordion">FORMULARIO PRINCIPAL</button>
				<div class="panel">					
					<label>Nombre de la OSC</label>					
			        <input type="text" class="common" id="nombreOSC" name="nombreOSC"
			          placeholder="Nombre de la OSC (tal cómo está escrita en su OSC):" value="" required>

			        <label>Objeto social</label>
			        <input type="text" class="common" id="objetoSocialOrganizacion" name="objetoSocialOrganizacion"
			          placeholder="Objeto social de la organización:"
			          value="" required>

			        <label>Misión</label>
			        <textarea name="mision" class="common" id="mision" placeholder="Misión:" required=""></textarea>
			        <label>Visión</label>
			        <textarea name="vision" class="common" id="vision" placeholder="Visión:" required=""></textarea>
			        <label>Áreas de atención</label>
			        <textarea name="areasAtencion" class="common" id="areasAtencion" placeholder="Áreas de atención de la OSC:" required></textarea>

			        <label>RFC</label>
			        <input type="text" class="common" id="rfcHomoclave" name="rfcHomoclave"
			          placeholder="RFC con homoclave de la organización:"
			          value="" required>

			        <label>RFC (PDF o JPG) </label><br>
			        <input type="file" class="common" name="files[]" required><br><br>

			        <label>CLUNI</label>
			        <input type="text" class="common" id="CLUNI" name="CLUNI"
			          placeholder="CLUNI (Si no se tiene, ingresar PRE-FOLIO otorgado)"
			          value="" required>

			        <label>(PDF o JPG) </label><br>
			        <input type="file" class="common" name="files[]" required><br><br>

			        <label>Calle</label>
			        <input type="text" class="common" id="calle" name="calle"
			          placeholder="Calle del domicilio:"
			          value="" required>

			        <label>Domicilio</label>
			        <input type="text" class="common" id="numero" name="numero"
			          placeholder="Número del domicilio:"
			          value="" required>

			        <label>Colonia</label>
			        <input type="text" class="common" id="colonia" name="colonia"
			          placeholder="Colonia del domicilio:"
			          value="" required>

			        <label>Codigo postal</label>
			        <input type="text" class="common" id="codigoPostal" name="codigoPostal"
			          placeholder="Codigo postal del domicilio:"
			          value="" required>

			        <label>Localidad</label>  
			        <input type="text" class="common" id="localidad" name="localidad"
			          placeholder="Localidad del domicilio:"
			          value="" required>

			        <label>Municipio</label>  
			        <input type="text" class="common" id="municipio" name="municipio"
			          placeholder="Municipio del domicilio:"
			          value="" required>

			        <label>Teléfono oficina</label>  
			        <input type="text" class="common" id="phoneOficina" name="phoneOficina"
			          placeholder="Teléfono de la oficina (con lada):"
			          value="" required>

			        <label>Teléfono celular</label>
			        <input type="text" class="common" id="phoneCelular" name="phoneCelular"
			          placeholder="Teléfono celular (con lada):"
			          value="" required>

			        <label>Correo de organización</label>
			        <input type="email" class="common" id="emailContacto" name="emailContacto"
			          placeholder="Correo de contacto de la organización: type EMAIL"
			          value="" required>

			        <label>Página web</label>
			        <input type="url" class="common" id="paginaWeb" name="paginaWeb"
			          placeholder="Página web de la organización: TYPE URL"
			          value="" required>

			        <label>Facebook</label>
			        <input type="text" class="common" id="organizacionFB" name="organizacionFB"
			          placeholder="Facebook de la organización:"
			          value="" required>

			        <label>Twitter</label>
			        <input type="text" class="common" id="organizacionTW" name="organizacionTW"
			          placeholder="Twitter de la organización:"
			          value="">

			        <label>Instagram</label>
					<input type="text" class="common" id="organizacionInsta" name="organizacionInsta"
			          placeholder="Instagram de la organización:"
			          value="">
		        </div>

		        <button class="accordion">HISTORIAL DE LA ORGANIZACION</button>
				<div class="panel">
			        <label class="common">Fecha de constitución de la OSC</label><br>
				        <input type="date" class="common" id="fechaConstitucionOSC" name="fechaConstitucionOSC"
				          value="" required><br><br>

			        <label>Nombre del notario</label>
			        <input type="text" class="common" id="nombreNotario" name="nombreNotario"
			          placeholder="Nombre del notario público:"
			          value="" required>

			        <label>Número del notario</label>
			        <input type="text" class="common" id="numeroNotario" name="numeroNotario"
			          placeholder="Número del notario público:"
			          value="" required>

			        <label class="common">Municipio de la notaría pública</label><br>
				        <select class="common" name="municipioNotaria"
				          value="" required>
				          <?php foreach($municipiosDeSonora as $municipio) {?>
				  							<option><?php echo $municipio?></option>
				  				<?php } ?>
				        </select><br><br>

			        <label>Número de estritura</label>
			        <input type="text" class="common" id="noEstrituraPublica" name="noEstrituraPublica"
			          placeholder="Número de estritura pública:"
			          value="" required>

			        <label>Volumen de estritura</label>
			        <input type="text" class="common" id="volumenEstrituraPublica" name="volumenEstrituraPublica"
			          placeholder="Volumen de estritura pública:"
			          value="" required>

			        <label class="common">Fecha de estritura pública</label><br>
			        <input type="date" class="common" id="fechaEstritura" name="fechaEstritura"
			          value="" required><br><br>

			        <label class="common">Acta constitutiva</label>
			        <input type="file" class="common" name="files[]" required>

			        <label class="common">Acta protocolizada donde conste la representación legal vigente</label>
			        <input type="file" class="common" name="files[]" required>

			        <label class="common">Municipio donde se registró la OSC</label><br>
			        <select class="common" name="municipioRegistroOSC"
			          value="" required>
			          <?php foreach($municipiosDeSonora as $municipio) {?>
			  							<option><?php echo $municipio?></option>
			  				<?php } ?>
			        </select><br><br>

			        <label>Nombre del estado</label>
			        <input type="text" class="common" id="estaResideOSC" name="estaResideOSC"
			          placeholder="Nombre del estado donde reside la OSC:"
			          value="" required>

			        <label>Nombre del municipio</label>
			        <input type="text" class="common" id="muniResideOSC" name="muniResideOSC"
			          placeholder="Nombre del municipio donde reside la OSC:"
			          value="" required>

			        <label>Principales logros</label>			        
			        <input type="text" class="common" id="principalesLogros" name="principalesLogros"
			          placeholder="Principales logros en el último año (2018):"
			          value="" required>

			        <label>Metas de la organización</label>
			        <input type="text" class="common" id="metasOrganización" name="metasOrganización"
			          placeholder="Metas de la organización para el presente año (2019):"
			          value="" required>


			        <label class="common">¿Está autorizada para recibir donativos deducibles de impuestos?</label><br>
			        <div style="font-size: 20px; margin-left:20px;">
			    		<input type="radio" class="common" name="autorizadaDeducible" value="Si" checked> Si
			        	<input type="radio" class="common" name="autorizadaDeducible" value="No"> No <br><br>	
			        </div>

			        <label class="common">Su organización se rige o es dirigida por: </label>
			        <div style="font-size: 20px; margin-left:20px;">
			       		<input type="radio" class="common" name="digiridaPor" value="Patronato" checked> Patronato <br>
			        	<input type="radio" class="common" name="digiridaPor" value="Consejo Directivo"> Consejo directivo <br>
			        	<input type="radio" class="common" name="digiridaPor" value="Otro"> Otro <br><br> 	
			        </div>

			        <label>Nombre del representante legal</label>
			        <input type="text" class="common" id="nombreRepresentante" name="nombreRepresentante"
			          placeholder="Nombre del representante legal vigente:"
			          value="" required>

			        <label>Número de identificación oficial</label>
			        <input type="text" class="common" id="idRepresentante" name="idRepresentante"
			          placeholder="Número de identificación oficial del representante legal vigente:"
			          value="" required>

			        <label class="common">INE del representante legal vigente</label>
			        <input type="file" class="common" name="files[]" required>

			        <label>Nombre del presidente</label>
			        <input type="text" class="common" id="nombrePresi" name="nombrePresi"
			          placeholder="Nombre del presidente y/o director general:"
			          value="" required>

			        <label>Nombre del coordinador</label>
			        <input type="text" class="common" id="nombreCoordi" name="nombreCoordi"
			          placeholder="Nombre del coordinador que somete a la convocatoria:"
			          value="" required>

			        <label class="common">INE del coordinador del proyecto</label>
			        <input type="file" class="common" name="files[]" required>

			        <label>Correo electrónico del coordinador</label>
			        <input type="email" class="common" id="correoCoordinador" name="correoCoordinador"
			          placeholder="Correo electrónico personal del coordinador del proyecto"
			          value="" required>

			        <label>Cargo del coordinador</label>
			        <input type="text" class="common" id="cargoCoordinador" name="cargoCoordinador"
			          placeholder="Cargo o puesto del coordinador del proyecto"
			          value="" required>

			        <label>Número de empleados</label>
			        <input type="text" class="common" id="numeroEmpleados" name="numeroEmpleados"
			          placeholder="Número de empleados de la organización"
			          value="" required>

			        <label>Número de voluntarios</label>
			        <input type="text" class="common" id="numeroVoluntarios" name="numeroVoluntarios"
			          placeholder="Número de voluntarios de la organización"
			          value="" required>

			        <label>Alianzas con las que cuenta</label>
			        <input type="text" class="common" id="principalesAlianzas" name="principalesAlianzas"
			          placeholder="Mencione las principales alianzas con las que cuenta"
			          value="" required>

			        <label>Número de personas que benefició</label>
			        <input type="text" class="common" id="numeroBeneficiados" name="numeroBeneficiados"
			          placeholder="Número de personas que benefició el año pasado"
			          value="" required>

			        <label class="titulos-form">¿Tiene observaciones en su 32 D?</label>
			        <div style="font-size: 20px; margin-left:20px;">
			        	<input type="radio" class="common" name="observaciones32D" value="Si" checked> Si
			        	<input type="radio" class="common" name="observaciones32D" value="No"> No <br><br>
			    	</div>

			        <label class="common">32D en positivio y con 30 días de expedición como máximo</label>
			        <input type="file" class="common" name="files[]" required>

			        <label class="titulos-form">¿Ha presentado en tiempo y forma la declaración por ejercicio, de impuestos federales?</label>
			        <div style="font-size: 20px; margin-left:20px;">
				        <input type="radio" class="common" name="tiempoYforma" value="Si" checked> Si
				        <input type="radio" class="common" name="tiempoYforma" value="No"> No <br><br>
				    </div>

			        <label class="titulos-form">¿Tiene adeudos fiscales a cargo, por impuestos federales?</label>
			        <div style="font-size: 20px; margin-left:20px;">
			        	<input type="radio" class="common" name="tieneAdeudos" value="Si" checked> Si
			        	<input type="radio" class="common" name="tieneAdeudos" value="No"> No <br><br>
			        </div>


			        <label class="common">F21, preferentemente 2018 o más reciente</label>
			        <input type="file" class="common" name="files[]" required>

			        <label class="common">Constancia de Situación Fiscal</label>
			        <input type="file" class="common" name="files[]" required>

			        <label class="common">Comprobante de cuenta bancaria</label>
			        <input type="file" class="common" name="files[]" required>

			        <label class="common">Factura cancelada</label>
			        <input type="file" class="common" name="files[]" required>

			        <label class="titulos-form">¿Está inscrita en el Directorio Nacional de Instituciones de Asistencia Social?</label>
			        <div style="font-size: 20px; margin-left:20px;">
			        	<input type="radio" class="common" name="inscritaDNIAS" value="Si" checked> Si
			        	<input type="radio" class="common" name="inscritaDNIAS" value="No"> No <br><br>
			        </div>

			        <label class="common">DNIAS</label>
			        <input type="file" class="common" name="files[]" required>
				</div>

				<button class="accordion">ACTA CONSTITUTIVA</button>
				<div class="panel">
					<label class="common">Número de libro</label><br>
			        <input type="text" class="common" id="numeroLibro" name="numeroLibro"
			          placeholder="Número de libro:"
			          value="" required>

			        <label>Número de inscrpción</label>
			        <input type="text" class="common" id="numeroInscripcion" name="numeroInscripcion"
			          placeholder="Número de inscrpción:"
			          value="" required>

			        <label>Volúmen ICRESON</label>
			        <input type="text" class="common" id="volumenICRESON" name="volumenICRESON"
			          placeholder="Volúmen ICRESON:"
			          value="" required>

			        <label class="titulos-form">RPP ICRESON</label><br/>
			        <input type="file" class="common" name="files[]" required><br>

			        <label class="titulos-form">¿Su organización ha tenido modificaciones a su acta constitutiva?</label><br>
			        <div style="font-size: 20px; margin-left:20px;">
				        <input type="radio" class="common" name="existenModis" value="Si" checked> Si
				        <input type="radio" class="common" name="existenModis" value="No"> No 
				    </div>

			        <label class="common">Fecha de la última modificación del acta constitutiva</label><br>
			        <input type="date" class="common" id="ultimaModi" name="ultimaModi"
			          value="" required><br><br>

			        <label>Número de acta constitutiva</label>
			        <input type="text" class="common" id="numeroActaConsti" name="numeroActaConsti"
			          placeholder="Número de acta constitutiva:"
			          value="" required>

			        <label>Volúmen de acta constitutiva</label>
			        <input type="text" class="common" id="volumenActaConsti" name="volumenActaConsti"
			          placeholder="Volúmen de acta constitutiva:"
			          value="" required>

			        <label class="common">Ultima acta modificatoria protocolizada</label><br/>
			        <input type="file" class="common" name="files[]" required><br>

			        <label class="common">RPP ICRESON de la última acta modificatoria actualizada</label><br/>
			        <input type="file" class="common" name="files[]" required><br>
				</div>

				<button class="accordion">DONATARIA AUTORIZADA</button>
				<div class="panel">
					<label class="common">Fecha de publicación en el Diario Oficial de la Federación</label><br>
					<input type="date" class="common" id="fechaDiario" name="fechaDiario" value="" required><br>

					<label>Número de página</label>
					<input type="text" class="common" id="numeroDiario" name="numeroDiario"
						placeholder="Número de página del Diario Oficial de la Federación" value="" required>

				        <label class="titulos-form">¿Ha manejado esquemas de recursos complementarios?</label><br>
				        <div style="font-size: 20px; margin-left:20px;">
					        <input type="radio" class="common" name="esquemasRecursosComp" value="Si" checked> Si
					        <input type="radio" class="common" name="esquemasRecursosComp" value="No"> No
					    </div><br>

					<label class="common">¿El SAT ha detenido su autorización como donataria en algún momento?</label><br>
					<div style="font-size: 20px; margin-left:20px;">
						<input type="radio" class="common" name="detenidoAutorizado" value="Sí"> Sí
						<input type="radio" class="common" name="detenidoAutorizado" value="No"> No <br>
					</div>

					<label>Detuvo el SAT su autorización?</label>
					<input type="text" class="common" id="razonDetenido" name="razonDetenido"
						placeholder="¿Por qué detuvo el SAT su autorización?"
						value="" required>

					<label class="common">¿Desde que fecha está autorizada para recibir donativos deducibles de impuestos?</label><br>
					<input type="date" class="common" id="fechaAutorizada" name="fechaAutorizada"
						value="" required><br><br>
				</div>

				<button class="accordion">RECURSOS COMPLEMENTARIOS</button>
				<div class="panel">

				<label class="common">Población que atiende la OSC</label><br>
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

				<label class="titulos-form">¿Ha manejado esquemas de recursos complementarios?</label><br>
				<div style="font-size: 20px; margin-left:20px;">
					<input type="radio" class="common" name="esquemasRecursosComp" value="Sí"> Sí
					<input type="radio" class="common" name="esquemasRecursosComp" value="No"> No
				</div><br>

				<label>Con qué organización ha manejado recursos complementarios</label>
				<input type="text" class="common" id="organizacionManejoRecursos" name="organizacionManejoRecursos"
					placeholder="¿Con qué organización ha manejado recursos complementarios?"
					value="" required>
				</div>

			<button class="common" type="submit" name="pre-submit">Registrar</button>
		</form>
	</div>
</main>

<script>
var acc = document.getElementsByClassName("accordion");
var i;

for (i = 0; i < acc.length; i++) {
  acc[i].addEventListener("click", function() {
    this.classList.toggle("activetoggle");
    var panel = this.nextElementSibling;
    if (panel.style.maxHeight){
      panel.style.maxHeight = null;
    } else {
      panel.style.maxHeight = panel.scrollHeight + "px";
    } 
  });
}
</script>	

<?php  
/* manda a llamar a footer.php */ 
	require"footer.php";
?>