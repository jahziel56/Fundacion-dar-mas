<?php
/* manda a llamar a header.php */ 
	require"header.php";
?>
<!-- /* Pagina de registro */ -->
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
				<form action="includes/personal.inc.php" method="post" class="Signup">
					<input class="common" type="text" name="Nombre" placeholder="Nombre" required>
					<input class="common" type="text" name="ApellidoP" placeholder="Apellido Paterno" required>
					<input class="common" type="text" name="ApellidoM" placeholder="Apellido Materno" required>				
					<input class="common" type="text" name="Telefono" placeholder="Telefono" required>
					<button class="common" type="submit" name="personal-submit">Signup</button>
				</form>


			<div class="Pre-Registro">
			<form>

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
			          value="" required>

			        <label>Instagram</label>
					<input type="text" class="common" id="organizacionInsta" name="organizacionInsta"
			          placeholder="Instagram de la organización:"
			          value="" required>
		        </div>

		        <button class="accordion">HISTORIAL DE LA ORGANIZACION</button>
				<div class="panel">
			        <label class="common">Fecha de constitución de la OSC</label>

			        <input type="date" class="common" id="fechaConstitucionOSC" name="fechaConstitucionOSC"
			          value="" required>

			        <input type="text" class="common" id="nombreNotario" name="nombreNotario"
			          placeholder="Nombre del notario público:"
			          value="" required>

			        <input type="text" class="common" id="numeroNotario" name="numeroNotario"
			          placeholder="Número del notario público:"
			          value="" required>

			        <label class="common">Municipio de la notaría pública</label>

			        <select class="common" name="municipioNotaria"
			          value="" required>
			          <?php foreach($municipiosDeSonora as $municipio) {?>
			  							<option><?php echo $municipio?></option>
			  				<?php } ?>
			        </select>

			        <input type="text" class="common" id="noEstrituraPublica" name="noEstrituraPublica"
			          placeholder="Número de estritura pública:"
			          value="" required>

			        <input type="text" class="common" id="volumenEstrituraPublica" name="volumenEstrituraPublica"
			          placeholder="Volumen de estritura pública:"
			          value="" required>

			        <label class="common">Fecha de estritura pública</label>

			        <input type="date" class="common" id="fechaEstritura" name="fechaEstritura"
			          value="" required>

			        <label class="common">Acta constitutiva</label>

			        <input type="file" class="common" name="files[]" required>

			        <label class="common">Acta protocolizada donde conste la representación legal vigente</label>

			        <input type="file" class="common" name="files[]" required>

			        <label class="common">Municipio donde se registró la OSC</label>

			        <select class="common" name="municipioRegistroOSC"
			          value="" required>
			          <?php foreach($municipiosDeSonora as $municipio) {?>
			  							<option><?php echo $municipio?></option>
			  				<?php } ?>
			        </select>

			        <input type="text" class="common" id="estaResideOSC" name="estaResideOSC"
			          placeholder="Nombre del estado donde reside la OSC:"
			          value="" required>

			        <input type="text" class="common" id="muniResideOSC" name="muniResideOSC"
			          placeholder="Nombre del municipio donde reside la OSC:"
			          value="" required>

			        <input type="text" class="common" id="principalesLogros" name="principalesLogros"
			          placeholder="Principales logros en el último año (2018):"
			          value="" required>

			        <input type="text" class="common" id="metasOrganización" name="metasOrganización"
			          placeholder="Metas de la organización para el presente año (2019):"
			          value="" required>

			        <label class="common">¿Está autorizada para recibir donativos deducibles de impuestos?</label><br>
			        <div style="font-size: 20px; margin-left:20px;">
			    		<input type="radio" class="common" name="autorizadaDeducible" value="Sí" checked> Sí
			        	<input type="radio" class="common" name="autorizadaDeducible" value="No"> No <br><br>	
			        </div>

			        <label class="common">Su organización se rige o es dirigida por: </label>
			        <div style="font-size: 20px; margin-left:20px;">
			       		<input type="radio" class="common" name="digiridaPor" value="Patronato" checked> Patronato <br>
			        	<input type="radio" class="common" name="digiridaPor" value="Consejo Directivo"> Consejo directivo <br>
			        	<input type="radio" class="common" name="digiridaPor" value="Otro"> Patronato <br><br> 	
			        </div>

			        <input type="text" class="common" id="nombreRepresentante" name="nombreRepresentante"
			          placeholder="Nombre del representante legal vigente:"
			          value="" required>

			        <input type="text" class="common" id="idRepresentante" name="idRepresentante"
			          placeholder="Número de identificación oficial del representante legal vigente:"
			          value="" required>

			        <label class="common">INE del representante legal vigente</label>

			        <input type="file" class="common" name="files[]" required>

			        <input type="text" class="common" id="nombrePresi" name="nombrePresi"
			          placeholder="Nombre del presidente y/o director general:"
			          value="" required>

			        <input type="text" class="common" id="nombreCoordi" name="nombreCoordi"
			          placeholder="Nombre del coordinador que somete a la convocatoria:"
			          value="" required>

			        <label class="common">INE del coordinador del proyecto</label>

			        <input type="file" class="common" name="files[]" required>

			        <input type="email" class="common" id="correoCoordinador" name="correoCoordinador"
			          placeholder="Correo electrónico personal del coordinador del proyecto"
			          value="" required>

			        <input type="text" class="common" id="cargoCoordinador" name="cargoCoordinador"
			          placeholder="Cargo o puesto del coordinador del proyecto"
			          value="" required>

			        <input type="text" class="common" id="numeroEmpleados" name="numeroEmpleados"
			          placeholder="Número de empleados de la organización"
			          value="" required>

			        <input type="text" class="common" id="numeroVoluntarios" name="numeroVoluntarios"
			          placeholder="Número de voluntarios de la organización"
			          value="" required>

			        <input type="text" class="common" id="principalesAlianzas" name="principalesAlianzas"
			          placeholder="Mencione las principales alianzas con las que cuenta"
			          value="" required>

			        <input type="text" class="common" id="numeroBeneficiados" name="numeroBeneficiados"
			          placeholder="Número de personas que benefició el año pasado"
			          value="" required>

			        <label class="titulos-form">¿Tiene observaciones en su 32 D?</label>

			        <input type="radio" class="common" name="observaciones32D" value="Sí" checked> Sí
			        <input type="radio" class="common" name="observaciones32D" value="No"> No <br><br>

			        <label class="common">32D en positivio y con 30 días de expedición como máximo</label>

			        <input type="file" class="common" name="files[]" required>

			        <label class="titulos-form">¿Ha presentado en tiempo y forma la declaración por ejercicio, de impuestos federales?</label>

			        <input type="radio" class="common" name="tiempoYforma" value="Sí" checked> Sí
			        <input type="radio" class="common" name="tiempoYforma" value="No"> No <br><br>

			        <label class="titulos-form">¿Tiene adeudos fiscales a cargo, por impuestos federales?</label>

			        <input type="radio" class="common" name="tieneAdeudos" value="Sí" checked> Sí
			        <input type="radio" class="common" name="tieneAdeudos" value="No"> No <br><br>

			        <label class="common">F21, preferentemente 2018 o más reciente</label>

			        <input type="file" class="common" name="files[]" required>

			        <label class="common">Constancia de Situación Fiscal</label>

			        <input type="file" class="common" name="files[]" required>

			        <label class="common">Comprobante de cuenta bancaria</label>

			        <input type="file" class="common" name="files[]" required>

			        <label class="common">Factura cancelada</label>

			        <input type="file" class="common" name="files[]" required>

			        <label class="titulos-form">¿Está inscrita en el Directorio Nacional de Instituciones de Asistencia Social?</label>

			        <input type="radio" class="common" name="inscritaDNIAS" value="Sí" checked> Sí
			        <input type="radio" class="common" name="inscritaDNIAS" value="No"> No <br><br>

			        <label class="common">DNIAS</label>

			        <input type="file" class="common" name="files[]" required>

				</div>

				<button class="accordion">Section 3</button>
				<div class="panel">
				  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
				</div>



			</form>
		</div>
	</main>

<script>
var acc = document.getElementsByClassName("accordion");
var i;

for (i = 0; i < acc.length; i++) {
  acc[i].addEventListener("click", function() {
    this.classList.toggle("active");
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