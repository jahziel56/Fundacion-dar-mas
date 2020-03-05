<?php
/* manda a llamar a header.php */ 
	require"classes/header.php";
?>
	<main>
<?php 
if (empty($_GET["Rol_Name"]) || empty($_GET["Rol_Descripcion"])){
	echo "<div style='background: #B22222; color: white; text-align:center'>";
	echo "Rol no selecionado<br></div><br>";
	echo "<a class='P_B' href='http:Panel_De_Control.php' style='text-decoration: none; display: block;'>Regresar</a>";
	exit();
}else{
	$Rol_Name = strtoupper($_GET["Rol_Name"]);
	$Rol_Descripcion = $_GET["Rol_Descripcion"];
	echo "<h1 style='background: #5F9EA0; color: white; text-align:center'>$Rol_Name</h1>";
	echo "<p style='background: #3E7D7F; color: white; text-align:center;'>
	Selecione los campos que desea que $Rol_Name pueda ver ala hora de revisarlo</p><br>";
}
?>

		<div>
		<form action="includes/rol_crear.inc.php" method="post">
			<input type="hidden" name="Rol_Name" value="<?php echo $Rol_Name; ?>">
			<input type="hidden" name="Rol_Descripcion" value="<?php echo $Rol_Descripcion; ?>">  
			<div class="Pre-Registro" style="width: 100%;">
				
					<div class="checkbox">
						<input id="1" name="checker[]" type="checkbox" class="promoted-input-checkbox" value="1"/>
						<label for="1">
						<div class="fake-label">
							<i class="fa fa-check"></i>
						</div>
							<p>Nombre de la OSC</p>
						</label>
					</div><br>


					<div style="background: lightblue">
			        <label style="width: 100%">Objeto social</label><br>
			        <input type="text" class="common" id="objetoSocialOrganizacion" name="objetoSocialOrganizacion"
			          placeholder="Objeto social de la organización:" disabled>
					<input name="checker[]" type="checkbox" class="promoted-input-checkbox" value="2" checked/>
					</div><br>


					<div style="background: lightblue">
			        <label>Misión</label><br>
			        <input type="text" class="common" placeholder="Misión:" disabled>
			        <input name="checker[]" type="checkbox" class="promoted-input-checkbox" value="3" checked/>
					</div><br>

					<div style="background: lightblue">
			        <label>Visión</label><br>
			    	<input type="text" class="common" placeholder="Visión:" disabled>
			    	<input name="checker[]" value="4" type="checkbox" class="promoted-input-checkbox" checked/>
					</div><br>

					<div style="background: lightblue">
			        <label>Áreas de atención</label>
			    	<input type="text" class="common" placeholder="Áreas de atención de la OSC:" disabled>
			    	<input name="checker[]" value="5" type="checkbox" class="promoted-input-checkbox" checked/>
					</div><br>

					<div style="background: lightblue">
			        <label>RFC</label><br>
			        <input type="text" class="common" id="rfcHomoclave" name="rfcHomoclave"
			          placeholder="RFC con homoclave de la organización:" disabled>
			          <input name="checker[]" value="6" type="checkbox" class="promoted-input-checkbox" checked/>
					</div><br>

					<div style="background: lightblue">
			        <label>RFC (PDF o JPG) </label><br>
			        <input type="file" class="common" name="files[]" disabled>
			        <input name="checker[]" value="7" type="checkbox" class="promoted-input-checkbox" checked/>
					</div><br>

					<div style="background: lightblue">
			        <label>CLUNI</label><br>
			        <input type="text" class="common" id="CLUNI" name="CLUNI"
			          placeholder="CLUNI (Si no se tiene, ingresar PRE-FOLIO otorgado)" disabled>
			          <input name="checker[]" value="8" type="checkbox" class="promoted-input-checkbox" checked/>
					</div><br>

					<div style="background: lightblue">
			        <label>(PDF o JPG) </label><br>
			        <input type="file" class="common" name="files[]" disabled>
			        <input name="checker[]" value="9" type="checkbox" class="promoted-input-checkbox" checked/>
					</div><br>

					<div style="background: lightblue">
			        <label>Calle</label><br>
			        <input type="text" class="common" id="calle" name="calle"
			          placeholder="Calle del domicilio:" disabled>
			          <input name="checker[]" value="10" type="checkbox" class="promoted-input-checkbox" checked/>
					</div><br>

					<div style="background: lightblue">
			        <label>Domicilio</label><br>
			        <input type="text" class="common" id="numero" name="numero"
			          placeholder="Número del domicilio:" disabled>
			          <input name="checker[]" value="11" type="checkbox" class="promoted-input-checkbox" checked/>
					</div><br>

					<div style="background: lightblue">
			        <label>Colonia</label><br>
			        <input type="text" class="common" id="colonia" name="colonia"
			          placeholder="Colonia del domicilio:" disabled>
			          <input name="checker[]" value="12" type="checkbox" class="promoted-input-checkbox" checked/>
					</div><br>

					<div style="background: lightblue">
			        <label>Codigo postal</label><br>
			        <input type="text" class="common" id="codigoPostal" name="codigoPostal"
			          placeholder="Codigo postal del domicilio:" disabled>
			          <input name="checker[]" value="13" type="checkbox" class="promoted-input-checkbox" checked/>
					</div><br>

					<div style="background: lightblue">
			        <label>Localidad</label><br>
			        <input type="text" class="common" id="localidad" name="localidad"
			          placeholder="Localidad del domicilio:" disabled>
			          <input name="checker[]" value="14" type="checkbox" class="promoted-input-checkbox" checked/>
					</div><br>

					<div style="background: lightblue">
			        <label>Municipio</label><br>
			        <input type="text" class="common" id="municipio" name="municipio"
			          placeholder="Municipio del domicilio:" disabled>
			          <input name="checker[]" value="15" type="checkbox" class="promoted-input-checkbox" checked/>
					</div><br>

					<div style="background: lightblue">
			        <label>Teléfono oficina</label>  
			        <input type="text" class="common" id="phoneOficina" name="phoneOficina"
			          placeholder="Teléfono de la oficina (con lada):" disabled>
			          <input name="checker[]" value="16" type="checkbox" class="promoted-input-checkbox" checked/>
					</div><br>

					<div style="background: lightblue">
			        <label>Teléfono celular</label><br>
			        <input type="text" class="common" id="phoneCelular" name="phoneCelular"
			          placeholder="Teléfono celular (con lada):" disabled>
			          <input name="checker[]" value="17" type="checkbox" class="promoted-input-checkbox" checked/>
					</div><br>

					<div style="background: lightblue">
			        <label>Correo de organización</label><br>
			        <input type="email" class="common" id="emailContacto" name="emailContacto"
			          placeholder="Correo de contacto de la organización: type EMAIL" disabled>
			          <input name="checker[]" value="18" type="checkbox" class="promoted-input-checkbox" checked/>
					</div><br>

					<div style="background: lightblue">
			        <label>Página web</label><br>
			        <input type="url" class="common" id="paginaWeb" name="paginaWeb"
			          placeholder="Página web de la organización: TYPE URL" disabled>
			          <input name="checker[]" value="19" type="checkbox" class="promoted-input-checkbox" checked/>
					</div><br>

					<div style="background: lightblue">
			        <label>Facebook</label><br>
			        <input type="text" class="common" id="organizacionFB" name="organizacionFB"
			          placeholder="Facebook de la organización:" disabled>
			          <input name="checker[]" value="20" type="checkbox" class="promoted-input-checkbox" checked/>
					</div><br>

					<div style="background: lightblue">
			        <label>Twitter</label><br>
			        <input type="text" class="common" id="organizacionTW" name="organizacionTW"
			          placeholder="Twitter de la organización:" disabled>
			          <input name="checker[]" value="21" type="checkbox" class="promoted-input-checkbox" checked/>
					</div><br>

					<div style="background: lightblue">
			        <label>Instagram</label><br>
					<input type="text" class="common" id="organizacionInsta" name="organizacionInsta"
			          placeholder="Instagram de la organización:" disabled>
			          <input name="checker[]" value="22" type="checkbox" class="promoted-input-checkbox" checked/>
					</div><br>
		        

					<div style="background: lightblue">				
			        <label class="common">Fecha de constitución de la OSC</label><br>
				    <input type="date" class="common" id="fechaConstitucionOSC" name="fechaConstitucionOSC" disabled>
				    <input name="checker[]" value="23" type="checkbox" class="promoted-input-checkbox" checked/>
					</div><br>

					<div style="background: lightblue">
			        <label>Nombre del notario</label><br>
			        <input type="text" class="common" id="nombreNotario" name="nombreNotario"
			          placeholder="Nombre del notario público:" disabled>
			          <input name="checker[]" value="24" type="checkbox" class="promoted-input-checkbox" checked/>
					</div><br>

					<div style="background: lightblue">
			        <label>Número del notario</label>
			        <input type="text" class="common" id="numeroNotario" name="numeroNotario"
			          placeholder="Número del notario público:" disabled>
			          <input name="checker[]" value="25" type="checkbox" class="promoted-input-checkbox" checked/>
					</div><br>

					<div style="background: lightblue">
			        <label class="common">Municipio de la notaría pública</label><br>
				    <input type="text" class="common" placeholder="Municipio de la notaría pública" disabled>
				    <input name="checker[]" value="26" type="checkbox" class="promoted-input-checkbox" checked/>
					</div><br>

					<div style="background: lightblue">
			        <label>Número de estritura</label>
			        <input type="text" class="common" id="noEstrituraPublica" name="noEstrituraPublica"
			          placeholder="Número de estritura pública:" disabled>
			          <input name="checker[]" value="27" type="checkbox" class="promoted-input-checkbox" checked/>
					</div><br>

					<div style="background: lightblue">
			        <label>Volumen de estritura</label>
			        <input type="text" class="common" id="volumenEstrituraPublica" name="volumenEstrituraPublica"
			          placeholder="Volumen de estritura pública:" disabled>
			          <input name="checker[]" value="28" type="checkbox" class="promoted-input-checkbox" checked/>
					</div><br>

					<div style="background: lightblue">
			        <label class="common">Fecha de estritura pública</label><br>
			        <input type="date" class="common" id="fechaEstritura" name="fechaEstritura" disabled>
			        <input name="checker[]" value="29" type="checkbox" class="promoted-input-checkbox" checked/>
					</div><br>

					<div style="background: lightblue">
			        <label class="common">Acta constitutiva</label>
			        <input type="file" class="common" name="files[]" disabled>
			        <input name="checker[]" value="30" type="checkbox" class="promoted-input-checkbox" checked/>
					</div><br>

					<div style="background: lightblue">
			        <label class="common">Acta protocolizada donde conste la representación legal vigente</label>
			        <input type="file" class="common" name="files[]" disabled>
			        <input name="checker[]" value="31" type="checkbox" class="promoted-input-checkbox" checked/>
					</div><br>

					<div style="background: lightblue">
			        <label class="common">Municipio donde se registró la OSC</label><br>
			       	<input type="text" class="common" placeholder="Municipio de la notaría pública" disabled>
			       	<input name="checker[]" value="32" type="checkbox" class="promoted-input-checkbox" checked/>
					</div><br>


					<div style="background: lightblue">
			        <label>Nombre del estado</label>
			        <input type="text" class="common" id="estaResideOSC" name="estaResideOSC"
			          placeholder="Nombre del estado donde reside la OSC:" disabled>
			          <input name="checker[]" value="33" type="checkbox" class="promoted-input-checkbox" checked/>
					</div><br>

					<div style="background: lightblue">
			        <label>Nombre del municipio</label>
			        <input type="text" class="common" id="muniResideOSC" name="muniResideOSC"
			          placeholder="Nombre del municipio donde reside la OSC:" disabled>
			          <input name="checker[]" value="34" type="checkbox" class="promoted-input-checkbox" checked/>
					</div><br>

					<div style="background: lightblue">
			        <label>Principales logros</label>			        
			        <input type="text" class="common" id="principalesLogros" name="principalesLogros"
			          placeholder="Principales logros en el último año (2018):" disabled>
			          <input name="checker[]" value="35" type="checkbox" class="promoted-input-checkbox" checked/>
					</div><br>

					<div style="background: lightblue">
			        <label>Metas de la organización</label>
			        <input type="text" class="common" id="metasOrganización" name="metasOrganización"
			          placeholder="Metas de la organización para el presente año (2019):" disabled>
			          <input name="checker[]" value="36" type="checkbox" class="promoted-input-checkbox" checked/>
					</div><br>

					<div style="background: lightblue">
			        <label class="common">¿Está autorizada para recibir donativos deducibles de impuestos?</label>
			        <input name="checker[]" value="37" type="checkbox" class="promoted-input-checkbox" checked/>
					<br>
			        <div style="font-size: 20px; margin-left:20px;">
			    		<input type="radio" class="common" name="autorizadaDeducible" value="Si" checked> Si
			        	<input type="radio" class="common" name="autorizadaDeducible" value="No"> No <br><br>	
			        </div>
			        </div><br>


					<div style="background: lightblue">
			        <label class="common">Su organización se rige o es dirigida por: </label>
			        <input name="checker[]" value="38" type="checkbox" class="promoted-input-checkbox" checked/>
					<br>
			        <div style="font-size: 20px; margin-left:20px;">
			    		<input type="radio" class="common" name="autorizadaDeducible" value="Si" checked> Si
			        	<input type="radio" class="common" name="autorizadaDeducible" value="No"> No <br><br>	
			        </div>
			        </div><br>


					<div style="background: lightblue">
			        <label>Nombre del representante legal</label>
			        <input type="text" class="common" id="nombreRepresentante" name="nombreRepresentante"
			          placeholder="Nombre del representante legal vigente:" disabled>
			          <input name="checker[]" value="39" type="checkbox" class="promoted-input-checkbox" checked/>
					</div><br>

					<div style="background: lightblue">
			        <label>Número de identificación oficial</label>
			        <input type="text" class="common" id="idRepresentante" name="idRepresentante"
			          placeholder="Número de identificación oficial del representante legal vigente:" disabled>
			          <input name="checker[]" value="40" type="checkbox" class="promoted-input-checkbox" checked/>
					</div><br>

					<div style="background: lightblue">
			        <label class="common">INE del representante legal vigente</label>
			        <input type="file" class="common" name="files[]" disabled>
			        <input name="checker[]" value="41" type="checkbox" class="promoted-input-checkbox" checked/>
					</div><br>

					<div style="background: lightblue">
			        <label>Nombre del presidente</label>
			        <input type="text" class="common" id="nombrePresi" name="nombrePresi"
			          placeholder="Nombre del presidente y/o director general:" disabled>
			          <input name="checker[]" value="42" type="checkbox" class="promoted-input-checkbox" checked/>
					</div><br>

					<div style="background: lightblue">
			        <label>Nombre del coordinador</label>
			        <input type="text" class="common" id="nombreCoordi" name="nombreCoordi"
			          placeholder="Nombre del coordinador que somete a la convocatoria:" disabled>
			          <input name="checker[]" value="43" type="checkbox" class="promoted-input-checkbox" checked/>
					</div><br>

					<div style="background: lightblue">
			        <label class="common">INE del coordinador del proyecto</label>
			        <input type="file" class="common" name="files[]" disabled>
			        <input name="checker[]" value="44" type="checkbox" class="promoted-input-checkbox" checked/>
					</div><br>

					<div style="background: lightblue">
			        <label>Correo electrónico del coordinador</label>
			        <input type="email" class="common" id="correoCoordinador" name="correoCoordinador"
			          placeholder="Correo electrónico personal del coordinador del proyecto" disabled>
			          <input name="checker[]" value="45" type="checkbox" class="promoted-input-checkbox" checked/>
					</div><br>

					<div style="background: lightblue">
			        <label>Cargo del coordinador</label>
			        <input type="text" class="common" id="cargoCoordinador" name="cargoCoordinador"
			          placeholder="Cargo o puesto del coordinador del proyecto" disabled>
			          <input name="checker[]" value="46" type="checkbox" class="promoted-input-checkbox" checked/>
					</div><br>

					<div style="background: lightblue">
			        <label>Número de empleados</label>
			        <input type="text" class="common" id="numeroEmpleados" name="numeroEmpleados"
			          placeholder="Número de empleados de la organización" disabled>
			          <input name="checker[]" value="47" type="checkbox" class="promoted-input-checkbox" checked/>
					</div><br>

					<div style="background: lightblue">
			        <label>Número de voluntarios</label>
			        <input type="text" class="common" id="numeroVoluntarios" name="numeroVoluntarios"
			          placeholder="Número de voluntarios de la organización" disabled>
			          <input name="checker[]" value="48" type="checkbox" class="promoted-input-checkbox" checked/>
					</div><br>

					<div style="background: lightblue">
			        <label>Alianzas con las que cuenta</label>
			        <input type="text" class="common" id="principalesAlianzas" name="principalesAlianzas"
			          placeholder="Mencione las principales alianzas con las que cuenta" disabled>
			          <input name="checker[]" value="49" type="checkbox" class="promoted-input-checkbox" checked/>
					</div><br>

					<div style="background: lightblue">
			        <label>Número de personas que benefició</label>
			        <input type="text" class="common" id="numeroBeneficiados" name="numeroBeneficiados"
			          placeholder="Número de personas que benefició el año pasado" disabled>
			          <input name="checker[]" value="50" type="checkbox" class="promoted-input-checkbox" checked/>
					</div><br>

					<div style="background: lightblue">
			        <label class="titulos-form">¿Tiene observaciones en su 32 D?</label>
			        <input name="checker[]" value="51" type="checkbox" class="promoted-input-checkbox" checked/>
					<br>
			        <div style="font-size: 20px; margin-left:20px;">
			    		<input type="radio" class="common" name="autorizadaDeducible" value="Si" checked> Si
			        	<input type="radio" class="common" name="autorizadaDeducible" value="No"> No <br><br>	
			        </div>
			        </div><br>


					<div style="background: lightblue">
			        <label class="common">32D en positivio y con 30 días de expedición como máximo</label>
			        <input type="file" class="common" name="files[]" disabled>
			        <input name="checker[]" value="52" type="checkbox" class="promoted-input-checkbox" checked/>
					</div><br>

					<div style="background: lightblue">
			        <label class="titulos-form">¿Ha presentado en tiempo y forma la declaración por ejercicio, de impuestos federales?</label>
			        <input name="checker[]" value="53" type="checkbox" class="promoted-input-checkbox" checked/>
					<br>
			        <div style="font-size: 20px; margin-left:20px;">
			    		<input type="radio" class="common" name="autorizadaDeducible" value="Si" checked> Si
			        	<input type="radio" class="common" name="autorizadaDeducible" value="No"> No <br><br>	
			        </div>
			        </div><br>


					<div style="background: lightblue">
			        <label class="titulos-form">¿Tiene adeudos fiscales a cargo, por impuestos federales?</label>
			        <input name="checker[]" value="54" type="checkbox" class="promoted-input-checkbox" checked/>
					<br>
			        <div style="font-size: 20px; margin-left:20px;">
			    		<input type="radio" class="common" name="autorizadaDeducible" value="Si" checked> Si
			        	<input type="radio" class="common" name="autorizadaDeducible" value="No"> No <br><br>	
			        </div>
			        </div><br>



					<div style="background: lightblue">
			        <label class="common">F21, preferentemente 2018 o más reciente</label>
			        <input type="file" class="common" name="files[]" disabled>
			        <input name="checker[]" value="55" type="checkbox" class="promoted-input-checkbox" checked/>
					</div><br>

					<div style="background: lightblue">
			        <label class="common">Constancia de Situación Fiscal</label>
			        <input type="file" class="common" name="files[]" disabled>
			        <input name="checker[]" value="56" type="checkbox" class="promoted-input-checkbox" checked/>
					</div><br>

					<div style="background: lightblue">
			        <label class="common">Comprobante de cuenta bancaria</label>
			        <input type="file" class="common" name="files[]" disabled>
			        <input name="checker[]" value="57" type="checkbox" class="promoted-input-checkbox" checked/>
					</div><br>

					<div style="background: lightblue">
			        <label class="common">Factura cancelada</label>
			        <input type="file" class="common" name="files[]" disabled>
			        <input name="checker[]" value="58" type="checkbox" class="promoted-input-checkbox" checked/>
					</div><br>

					<div style="background: lightblue">
			        <label class="titulos-form">¿Está inscrita en el Directorio Nacional de Instituciones de Asistencia Social?</label>
			        <input name="checker[]" value="59" type="checkbox" class="promoted-input-checkbox" checked/>
					<br>
			        <div style="font-size: 20px; margin-left:20px;">
			    		<input type="radio" class="common" name="autorizadaDeducible" value="Si" checked> Si
			        	<input type="radio" class="common" name="autorizadaDeducible" value="No"> No <br><br>	
			        </div>
					</div><br>

					<div style="background: lightblue">
			        <label class="common">DNIAS</label>
			        <input type="file" class="common" name="files[]" disabled>
			        <input name="checker[]" value="60" type="checkbox" class="promoted-input-checkbox" checked/>
					</div><br>

					<div style="background: lightblue">				
					<label class="common">Número de libro</label><br>
			        <input type="text" class="common" id="numeroLibro" name="numeroLibro"
			          placeholder="Número de libro:" disabled>
			          <input name="checker[]" value="61" type="checkbox" class="promoted-input-checkbox" checked/>
					</div><br>

					<div style="background: lightblue">
			        <label>Número de inscrpción</label>
			        <input type="text" class="common" id="numeroInscripcion" name="numeroInscripcion"
			          placeholder="Número de inscrpción:" disabled>
			          <input name="checker[]" value="62" type="checkbox" class="promoted-input-checkbox" checked/>
					</div><br>

					<div style="background: lightblue">
			        <label>Volúmen ICRESON</label>
			        <input type="text" class="common" id="volumenICRESON" name="volumenICRESON"
			          placeholder="Volúmen ICRESON:" disabled>
			          <input name="checker[]" value="63" type="checkbox" class="promoted-input-checkbox" checked/>
					</div><br>

					<div style="background: lightblue">
			        <label class="titulos-form">RPP ICRESON</label><br/>
			        <input type="file" class="common" name="files[]" disabled>
			        <input name="checker[]" value="64" type="checkbox" class="promoted-input-checkbox" checked/>
					</div><br>

					<div style="background: lightblue">
			        <label class="titulos-form">¿Su organización ha tenido modificaciones a su acta constitutiva?</label>
			        <input name="checker[]" value="65" type="checkbox" class="promoted-input-checkbox" checked/>
					<br>
			        <div style="font-size: 20px; margin-left:20px;">
			    		<input type="radio" class="common" name="autorizadaDeducible" value="Si" checked> Si
			        	<input type="radio" class="common" name="autorizadaDeducible" value="No"> No <br><br>	
			        </div>
					</div><br>

					<div style="background: lightblue">
			        <label class="common">Fecha de la última modificación del acta constitutiva</label>
			        <input name="checker[]" value="66" type="checkbox" class="promoted-input-checkbox" checked/>
					<br>
			        <input type="date" class="common" id="ultimaModi" name="ultimaModi" disabled><br><br>
					</div><br>

					<div style="background: lightblue">
			        <label>Número de acta constitutiva</label>
			        <input type="text" class="common" id="numeroActaConsti" name="numeroActaConsti"
			          placeholder="Número de acta constitutiva:" disabled>
			          <input name="checker[]" value="67" type="checkbox" class="promoted-input-checkbox" checked/>
					</div><br>

					<div style="background: lightblue">
			        <label>Volúmen de acta constitutiva</label>
			        <input type="text" class="common" id="volumenActaConsti" name="volumenActaConsti"
			          placeholder="Volúmen de acta constitutiva:" disabled>
			          <input name="checker[]" value="68" type="checkbox" class="promoted-input-checkbox" checked/>
					</div><br>

					<div style="background: lightblue">
			        <label class="common">Ultima acta modificatoria protocolizada</label><br/>
			        <input type="file" class="common" name="files[]" disabled>
			        <input name="checker[]" value="69" type="checkbox" class="promoted-input-checkbox" checked/>
					</div><br>

					<div style="background: lightblue">
			        <label class="common">RPP ICRESON de la última acta modificatoria actualizada</label><br/>
			        <input type="file" class="common" name="files[]" disabled>
			        <input name="checker[]" value="70" type="checkbox" class="promoted-input-checkbox" checked/>
					</div><br>
				


					<div style="background: lightblue">				
			        <label class="common">Fecha de publicación en el Diario Oficial de la Federación</label>
			        <input name="checker[]" value="71" type="checkbox" class="promoted-input-checkbox" checked/>
					<br>
			        <input type="date" class="common" id="fechaDiario" name="fechaDiario" disabled><br><br>
					</div><br>

					<div style="background: lightblue">
			        <label>Número de página</label>
			        <input type="text" class="common" id="numeroDiario" name="numeroDiario"
			          placeholder="Número de página del Diario Oficial de la Federación" disabled>
			          <input name="checker[]" value="72" type="checkbox" class="promoted-input-checkbox" checked/>
					</div><br>

					<div style="background: lightblue">
			        <label class="common">Página del DOF donde se publicó su autorización</label><br>
			        <input type="file" class="common" name="files[]" disabled>
			        <input name="checker[]" value="73" type="checkbox" class="promoted-input-checkbox" checked/>
					</div><br>

					<div style="background: lightblue">
			        <label class="common">¿El SAT ha detenido su autorización como donataria en algún momento?</label>
			        <input name="checker[]" value="74" type="checkbox" class="promoted-input-checkbox" checked/>
					<br>
			        <div style="font-size: 20px; margin-left:20px;">
			    		<input type="radio" class="common" name="autorizadaDeducible" value="Si" checked> Si
			        	<input type="radio" class="common" name="autorizadaDeducible" value="No"> No <br><br>	
			        </div>
					</div><br>

					<div style="background: lightblue">
				    <label>Detuvo el SAT su autorización?</label>
			        <input type="text" class="common" id="razonDetenido" name="razonDetenido"
			          placeholder="¿Por qué detuvo el SAT su autorización?" disabled>
			          <input name="checker[]" value="75" type="checkbox" class="promoted-input-checkbox" checked/>
					</div><br>

					<div style="background: lightblue">
			        <label class="common">¿Desde que fecha está autorizada para recibir donativos deducibles de impuestos?</label><br>
			        <input type="date" class="common" id="fechaAutorizada" name="fechaAutorizada" disabled>
			        <input name="checker[]" value="76" type="checkbox" class="promoted-input-checkbox" checked/>
					</div><br>
				

				
					<div style="background: lightblue">
					<label class="common">Población que atiende la OSC</label><br>
			        <input type="text" class="common P6" id="poblacion_0_4" name="poblacion_0_4"
			          placeholder="0 a 4 años" disabled>
			          <input name="checker[]" value="77" type="checkbox" class="promoted-input-checkbox" checked/>
					</div><br>

					<div style="background: lightblue">
			        <label class="titulos-form">¿Ha manejado esquemas de recursos complementarios?</label>
			        <input name="checker[]" value="78" type="checkbox" class="promoted-input-checkbox" checked/>
					<br>
			        <div style="font-size: 20px; margin-left:20px;">
			    		<input type="radio" class="common" name="autorizadaDeducible" value="Si" checked> Si
			        	<input type="radio" class="common" name="autorizadaDeducible" value="No"> No <br><br>	
			        </div>
					</div><br>

					<div style="background: lightblue">
				    <label>Con qué organización ha manejado recursos complementarios</label>
			        <input type="text" class="common" id="organizacionManejoRecursos" name="organizacionManejoRecursos"
			          placeholder="¿Con qué organización ha manejado recursos complementarios?" disabled>
			        <input name="checker[]" value="79" type="checkbox" class="promoted-input-checkbox" checked/>
					</div><br>

			</div>
			<button type="submit" class="common" name="Crear_Rol">Crear Rol</button>
		
	</form>
		</div>
	</main>
