<?php
/* manda a llamar a header.php */ 
	require"classes/header.php";
?>
	<main>

<?php 
if (empty($_GET["id"])){
	echo "<div style='background: #B22222; color: white; text-align:center'>";
	echo "Rol no selecionado<br></div><br>";
	echo "<a class='P_B' href='http:Panel_De_Control.php' style='text-decoration: none; display: block;'>Regresar</a>";
	exit();
}else{
	$Rol_id = $_GET["id"];
	require 'includes/dbh.inc.php';	


	$sql = "SELECT * FROM rol WHERE Id_Rol=?";
      
	$stmt = mysqli_stmt_init($conn);
	mysqli_stmt_prepare($stmt, $sql);
	mysqli_stmt_bind_param($stmt, "s",$Rol_id);
	mysqli_stmt_execute($stmt);
	$result = mysqli_stmt_get_result($stmt);
	$row = mysqli_fetch_assoc($result);
	
	echo "<h1 style='background: #5F9EA0; color: white; text-align:center'>".$row['Nombre_Rol']."</h1>";
	echo "<p style='background: #3E7D7F; color: white; text-align:center;'>
	Selecione los campos que desea que pueda ver ala hora de revisarlo</p><br>";


	$sql = "SELECT * FROM rol_detail WHERE Id_Rol=?";      
	$stmt = mysqli_stmt_init($conn);
	mysqli_stmt_prepare($stmt, $sql);
	mysqli_stmt_bind_param($stmt, "s",$Rol_id);
	mysqli_stmt_execute($stmt);
	$result = mysqli_stmt_get_result($stmt);
	$row = mysqli_fetch_assoc($result);



	$i = 0;
	foreach ($result as $row2) {
    	$i++;
	echo '<div class="" style="width: 100%;">';
		switch ($row2['Input']) {
		    case 0:

		        break;
		    case 1:
		        echo '<div style="background: lightblue">
						<label>Nombre de la OSC</label><br>					
				        <input type="text" class="common" id="nombreOSC" name="nombreOSC"
				          placeholder="Nombre de la OSC (tal cómo está escrita en su OSC):" disabled>
						</div><br>';
				break;
		    case 2:
		        echo '<div style="background: lightblue">
			        <label style="width: 100%">Objeto social</label><br>
			        <input type="text" class="common" id="objetoSocialOrganizacion" name="objetoSocialOrganizacion"
			          placeholder="Objeto social de la organización:" disabled>
					</div><br>';
		        break;
		    case 3:
		    	echo '<div style="background: lightblue">
			        <label>Misión</label><br>
			        <input type="text" class="common" placeholder="Misión:" disabled>
					</div><br>';
		    	break;
		    case 4:
		    	echo '<div style="background: lightblue">
			        <label>Visión</label><br>
			    	<input type="text" class="common" placeholder="Visión:" disabled>
					</div><br>';
		    	break;
		    case 5:
		    	echo '<div style="background: lightblue">
			        <label>Áreas de atención</label>
			    	<input type="text" class="common" placeholder="Áreas de atención de la OSC:" disabled>
					</div><br>';
		    	break;
		    case 6:
		    	echo '<div style="background: lightblue">
			        <label>RFC</label><br>
			        <input type="text" class="common" id="rfcHomoclave" name="rfcHomoclave"
			          placeholder="RFC con homoclave de la organización:" disabled>
					</div><br>';
		    	break;
		    case 7:
		    	echo '<div style="background: lightblue">
			        <label>RFC (PDF o JPG) </label><br>
			        <input type="file" class="common" name="files[]" disabled>
					</div><br>';
		    	break;
		    case 8:
		    	echo '<div style="background: lightblue">
			        <label>CLUNI</label><br>
			        <input type="text" class="common" id="CLUNI" name="CLUNI"
			          placeholder="CLUNI (Si no se tiene, ingresar PRE-FOLIO otorgado)" disabled>
					</div><br>';
		    	break;
		    case 9:
		    	echo '<div style="background: lightblue">
			        <label>(PDF o JPG) </label><br>
			        <input type="file" class="common" name="files[]" disabled>
					</div><br>';
		    	break;
		    case 10:
		    	echo '<div style="background: lightblue">
			        <label>Calle</label><br>
			        <input type="text" class="common" id="calle" name="calle"
			          placeholder="Calle del domicilio:" disabled>
					</div><br>';
		    	break;
		    case 11:
		    	echo '<div style="background: lightblue">
			        <label>Domicilio</label><br>
			        <input type="text" class="common" id="numero" name="numero"
			          placeholder="Número del domicilio:" disabled>
					</div><br>';
		    	break;
		    case 12:
		    	echo '<div style="background: lightblue">
			        <label>Colonia</label><br>
			        <input type="text" class="common" id="colonia" name="colonia"
			          placeholder="Colonia del domicilio:" disabled>
					</div><br>';
		    	break;
		    case 13:
		    	echo '<div style="background: lightblue">
			        <label>Codigo postal</label><br>
			        <input type="text" class="common" id="codigoPostal" name="codigoPostal"
			          placeholder="Codigo postal del domicilio:" disabled>
					</div><br>';
		    	break;
		    case 14:
		    	echo '<div style="background: lightblue">
			        <label>Localidad</label><br>
			        <input type="text" class="common" id="localidad" name="localidad"
			          placeholder="Localidad del domicilio:" disabled>
					</div><br>';
		    	break;
		    case 15:
		    	echo '<div style="background: lightblue">
			        <label>Municipio</label><br>
			        <input type="text" class="common" id="municipio" name="municipio"
			          placeholder="Municipio del domicilio:" disabled>
					</div><br>';
		    	break;
		    case 16:
		    	echo '<div style="background: lightblue">
			        <label>Teléfono oficina</label>  
			        <input type="text" class="common" id="phoneOficina" name="phoneOficina"
			          placeholder="Teléfono de la oficina (con lada):" disabled>
					</div><br>';
		    	break;
		    case 17:
		    	echo '<div style="background: lightblue">
			        <label>Teléfono celular</label><br>
			        <input type="text" class="common" id="phoneCelular" name="phoneCelular"
			          placeholder="Teléfono celular (con lada):" disabled>
					</div><br>';
		    	break;
		    case 18:
		    	echo '<div style="background: lightblue">
			        <label>Correo de organización</label><br>
			        <input type="email" class="common" id="emailContacto" name="emailContacto"
			          placeholder="Correo de contacto de la organización: type EMAIL" disabled>
					</div><br>';
		    	break;
		    case 19:
		    	echo '<div style="background: lightblue">
			        <label>Página web</label><br>
			        <input type="url" class="common" id="paginaWeb" name="paginaWeb"
			          placeholder="Página web de la organización: TYPE URL" disabled>
					</div><br>';
		    	break;
		    case 20:
		    	echo '<div style="background: lightblue">
			        <label>Facebook</label><br>
			        <input type="text" class="common" id="organizacionFB" name="organizacionFB"
			          placeholder="Facebook de la organización:" disabled>
					</div><br>';
		    	break;
		    case 21:
		    	echo '<div style="background: lightblue">
			        <label>Twitter</label><br>
			        <input type="text" class="common" id="organizacionTW" name="organizacionTW"
			          placeholder="Twitter de la organización:" disabled>
					</div><br>';
		    	break;
		    case 22:
		    	echo '<div style="background: lightblue">
			        <label>Instagram</label><br>
					<input type="text" class="common" id="organizacionInsta" name="organizacionInsta"
			          placeholder="Instagram de la organización:" disabled>
					</div><br>';
		    	break;
		    case 23:
		    	echo '<div style="background: lightblue">				
			        <label class="common">Fecha de constitución de la OSC</label><br>
				    <input type="date" class="common" id="fechaConstitucionOSC" name="fechaConstitucionOSC" disabled>
					</div><br>';
		    	break;
		    case 24:
		    	echo '<div style="background: lightblue">
			        <label>Nombre del notario</label><br>
			        <input type="text" class="common" id="nombreNotario" name="nombreNotario"
			          placeholder="Nombre del notario público:" disabled>
					</div><br>';
		    	break;
		    case 25:
		    	echo '<div style="background: lightblue">
			        <label>Número del notario</label>
			        <input type="text" class="common" id="numeroNotario" name="numeroNotario"
			          placeholder="Número del notario público:" disabled>
					</div><br>';
		    	break;
		    case 26:
		    	echo '<div style="background: lightblue">
			        <label class="common">Municipio de la notaría pública</label><br>
				    <input type="text" class="common" placeholder="Municipio de la notaría pública" disabled>
					</div><br>';
		    	break;
		    case 27:
		    	echo '<div style="background: lightblue">
			        <label>Número de estritura</label>
			        <input type="text" class="common" id="noEstrituraPublica" name="noEstrituraPublica"
			          placeholder="Número de estritura pública:" disabled>
					</div><br>';
		    	break;
		    case 28:
		    	echo '<div style="background: lightblue">
			        <label>Volumen de estritura</label>
			        <input type="text" class="common" id="volumenEstrituraPublica" name="volumenEstrituraPublica"
			          placeholder="Volumen de estritura pública:" disabled>
					</div><br>';
		    	break;
		    case 29:
		    	echo '<div style="background: lightblue">
			        <label class="common">Fecha de estritura pública</label><br>
			        <input type="date" class="common" id="fechaEstritura" name="fechaEstritura" disabled>
					</div><br>';
		    	break;
		    case 30:
		    	echo '<div style="background: lightblue">
			        <label class="common">Acta constitutiva</label>
			        <input type="file" class="common" name="files[]" disabled>
					</div><br>';
		    	break;
		    case 31:
		    	echo '<div style="background: lightblue">
			        <label class="common">Acta protocolizada donde conste la representación legal vigente</label>
			        <input type="file" class="common" name="files[]" disabled>
					</div><br>';
		    	break;
		    case 32:
		    	echo '<div style="background: lightblue">
			        <label class="common">Municipio donde se registró la OSC</label><br>
			       	<input type="text" class="common" placeholder="Municipio de la notaría pública" disabled>
					</div><br>';
		    	break;
		    case 33:
		    	echo '<div style="background: lightblue">
			        <label>Nombre del estado</label>
			        <input type="text" class="common" id="estaResideOSC" name="estaResideOSC"
			          placeholder="Nombre del estado donde reside la OSC:" disabled>
					</div><br>';
		    	break;
		    case 34:
		    	echo '<div style="background: lightblue">
			        <label>Nombre del municipio</label>
			        <input type="text" class="common" id="muniResideOSC" name="muniResideOSC"
			          placeholder="Nombre del municipio donde reside la OSC:" disabled>
					</div><br>';
		    	break;
		    case 35:
		    	echo '<div style="background: lightblue">
			        <label>Principales logros</label>			        
			        <input type="text" class="common" id="principalesLogros" name="principalesLogros"
			          placeholder="Principales logros en el último año (2018):" disabled>
					</div><br>';
		    	break;
		    case 36:
		    	echo '<div style="background: lightblue">
			        <label>Metas de la organización</label>
			        <input type="text" class="common" id="metasOrganización" name="metasOrganización"
			          placeholder="Metas de la organización para el presente año (2019):" disabled>
					</div><br>';
		    	break;
		    case 37:
		    	echo '<div style="background: lightblue">
			        <label class="common">¿Está autorizada para recibir donativos deducibles de impuestos?</label>
					<br>
			        <div style="font-size: 20px; margin-left:20px;">
			    		<input type="radio" class="common" name="autorizadaDeducible" value="Si" checked> Si
			        	<input type="radio" class="common" name="autorizadaDeducible" value="No"> No <br><br>	
			        </div>
			        </div><br>';
		    	break;
		    case 38:
		    	echo '<div style="background: lightblue">
			        <label class="common">Su organización se rige o es dirigida por: </label>
					<br>
			        <div style="font-size: 20px; margin-left:20px;">
			    		<input type="radio" class="common" name="autorizadaDeducible" value="Si" checked> Si
			        	<input type="radio" class="common" name="autorizadaDeducible" value="No"> No <br><br>	
			        </div>
			        </div><br>';
		    	break;
		    case 39:
		    	echo '<div style="background: lightblue">
			        <label>Nombre del representante legal</label>
			        <input type="text" class="common" id="nombreRepresentante" name="nombreRepresentante"
			          placeholder="Nombre del representante legal vigente:" disabled>
					</div><br>';
		    	break;
		    case 40:
		    	echo '<div style="background: lightblue">
			        <label>Número de identificación oficial</label>
			        <input type="text" class="common" id="idRepresentante" name="idRepresentante"
			          placeholder="Número de identificación oficial del representante legal vigente:" disabled>
					</div><br>';
		    	break;
		    case 41:
		    	echo '<div style="background: lightblue">
			        <label class="common">INE del representante legal vigente</label>
			        <input type="file" class="common" name="files[]" disabled>
					</div><br>';
		    	break;
		    case 42:
		    	echo '<div style="background: lightblue">
			        <label>Nombre del presidente</label>
			        <input type="text" class="common" id="nombrePresi" name="nombrePresi"
			          placeholder="Nombre del presidente y/o director general:" disabled>
					</div><br>';
		    	break;
		    case 43:
		    	echo '<div style="background: lightblue">
			        <label>Nombre del coordinador</label>
			        <input type="text" class="common" id="nombreCoordi" name="nombreCoordi"
			          placeholder="Nombre del coordinador que somete a la convocatoria:" disabled>
					</div><br>';
		    	break;
		    case 44:
		    	echo '<div style="background: lightblue">
			        <label class="common">INE del coordinador del proyecto</label>
			        <input type="file" class="common" name="files[]" disabled>
					</div><br>';
		    	break;
		    case 45:
		    	echo '<div style="background: lightblue">
			        <label>Correo electrónico del coordinador</label>
			        <input type="email" class="common" id="correoCoordinador" name="correoCoordinador"
			          placeholder="Correo electrónico personal del coordinador del proyecto" disabled>
					</div><br>';
		    	break;
		    case 46:
		    	echo '<div style="background: lightblue">
			        <label>Cargo del coordinador</label>
			        <input type="text" class="common" id="cargoCoordinador" name="cargoCoordinador"
			          placeholder="Cargo o puesto del coordinador del proyecto" disabled>
					</div><br>';
		    	break;
		    case 47:
		    	echo '<div style="background: lightblue">
			        <label>Número de empleados</label>
			        <input type="text" class="common" id="numeroEmpleados" name="numeroEmpleados"
			          placeholder="Número de empleados de la organización" disabled>
					</div><br>';
		    	break;
		    case 48:
		    	echo '<div style="background: lightblue">
			        <label>Número de voluntarios</label>
			        <input type="text" class="common" id="numeroVoluntarios" name="numeroVoluntarios"
			          placeholder="Número de voluntarios de la organización" disabled>
					</div><br>';
		    	break;
		    case 49:
		    	echo '<div style="background: lightblue">
			        <label>Alianzas con las que cuenta</label>
			        <input type="text" class="common" id="principalesAlianzas" name="principalesAlianzas"
			          placeholder="Mencione las principales alianzas con las que cuenta" disabled>
					</div><br>';
		    	break;
		    case 50:
		    	echo '<div style="background: lightblue">
			        <label>Número de personas que benefició</label>
			        <input type="text" class="common" id="numeroBeneficiados" name="numeroBeneficiados"
			          placeholder="Número de personas que benefició el año pasado" disabled>
					</div><br>';
		    	break;
		    case 51:
		    	echo '<div style="background: lightblue">
			        <label class="titulos-form">¿Tiene observaciones en su 32 D?</label>
					<br>
			        <div style="font-size: 20px; margin-left:20px;">
			    		<input type="radio" class="common" name="autorizadaDeducible" value="Si" checked> Si
			        	<input type="radio" class="common" name="autorizadaDeducible" value="No"> No <br><br>	
			        </div>
			        </div><br>';
		    	break;
		    case 52:
		    	echo '<div style="background: lightblue">
			        <label class="common">32D en positivio y con 30 días de expedición como máximo</label>
			        <input type="file" class="common" name="files[]" disabled>
					</div><br>';
		    	break;
		    case 53:
		    	echo '<div style="background: lightblue">
			        <label class="titulos-form">¿Ha presentado en tiempo y forma la declaración por ejercicio, de impuestos federales?</label>
					<br>
			        <div style="font-size: 20px; margin-left:20px;">
			    		<input type="radio" class="common" name="autorizadaDeducible" value="Si" checked> Si
			        	<input type="radio" class="common" name="autorizadaDeducible" value="No"> No <br><br>	
			        </div>
			        </div><br>';
		    	break;
		    case 54:
		    	echo '<div style="background: lightblue">
			        <label class="titulos-form">¿Tiene adeudos fiscales a cargo, por impuestos federales?</label>
					<br>
			        <div style="font-size: 20px; margin-left:20px;">
			    		<input type="radio" class="common" name="autorizadaDeducible" value="Si" checked> Si
			        	<input type="radio" class="common" name="autorizadaDeducible" value="No"> No <br><br>	
			        </div>
			        </div><br>';
		    	break;
		    case 55:
		    	echo '<div style="background: lightblue">
			        <label class="common">F21, preferentemente 2018 o más reciente</label>
			        <input type="file" class="common" name="files[]" disabled>
					</div><br>';
		    	break;
		    case 56:
		    	echo '<div style="background: lightblue">
			        <label class="common">Constancia de Situación Fiscal</label>
			        <input type="file" class="common" name="files[]" disabled>
					</div><br>';
		    	break;
		    case 57:
		    	echo '<div style="background: lightblue">
			        <label class="common">Comprobante de cuenta bancaria</label>
			        <input type="file" class="common" name="files[]" disabled>
					</div><br>';
		    	break;
		    case 58:
		    	echo '<div style="background: lightblue">
			        <label class="common">Factura cancelada</label>
			        <input type="file" class="common" name="files[]" disabled>
					</div><br>';
		    	break;
		    case 59:
		    	echo '<div style="background: lightblue">
			        <label class="titulos-form">¿Está inscrita en el Directorio Nacional de Instituciones de Asistencia Social?</label>
					<br>
			        <div style="font-size: 20px; margin-left:20px;">
			    		<input type="radio" class="common" name="autorizadaDeducible" value="Si" checked> Si
			        	<input type="radio" class="common" name="autorizadaDeducible" value="No"> No <br><br>	
			        </div>
					</div><br>';
		    	break;
		    case 60:
		    	echo '<div style="background: lightblue">
			        <label class="common">DNIAS</label>
			        <input type="file" class="common" name="files[]" disabled>
					</div><br>';
		    	break;
		    case 61:
		    	echo '<div style="background: lightblue">				
					<label class="common">Número de libro</label><br>
			        <input type="text" class="common" id="numeroLibro" name="numeroLibro"
			          placeholder="Número de libro:" disabled>
					</div><br>';
		    	break;   
		    case 62:
		    	echo '<div style="background: lightblue">
			        <label>Número de inscrpción</label>
			        <input type="text" class="common" id="numeroInscripcion" name="numeroInscripcion"
			          placeholder="Número de inscrpción:" disabled>
					</div><br>';
		    	break;   
		    case 63:
		    	echo '<div style="background: lightblue">
			        <label>Volúmen ICRESON</label>
			        <input type="text" class="common" id="volumenICRESON" name="volumenICRESON"
			          placeholder="Volúmen ICRESON:" disabled>
					</div><br>';
		    	break;   
		    case 64:
		    	echo '<div style="background: lightblue">
			        <label class="titulos-form">RPP ICRESON</label><br/>
			        <input type="file" class="common" name="files[]" disabled>
					</div><br>';
		    	break;   
		    case 65:
		    	echo '<div style="background: lightblue">
			        <label class="titulos-form">¿Su organización ha tenido modificaciones a su acta constitutiva?</label>
					<br>
			        <div style="font-size: 20px; margin-left:20px;">
			    		<input type="radio" class="common" name="autorizadaDeducible" value="Si" checked> Si
			        	<input type="radio" class="common" name="autorizadaDeducible" value="No"> No <br><br>	
			        </div>
					</div><br>';
		    	break;   
		    case 66:
		    	echo '<div style="background: lightblue">
			        <label class="common">Fecha de la última modificación del acta constitutiva</label>
					<br>
			        <input type="date" class="common" id="ultimaModi" name="ultimaModi" disabled><br><br>
					</div><br>';
		    	break;   
		    case 67:
		    	echo '<div style="background: lightblue">
			        <label>Número de acta constitutiva</label>
			        <input type="text" class="common" id="numeroActaConsti" name="numeroActaConsti"
			          placeholder="Número de acta constitutiva:" disabled>
					</div><br>';
		    	break;   
		    case 68:
		    	echo '<div style="background: lightblue">
			        <label>Volúmen de acta constitutiva</label>
			        <input type="text" class="common" id="volumenActaConsti" name="volumenActaConsti"
			          placeholder="Volúmen de acta constitutiva:" disabled>
					</div><br>';
		    	break;   
		    case 69:
		    	echo '<div style="background: lightblue">
			        <label class="common">Ultima acta modificatoria protocolizada</label><br/>
			        <input type="file" class="common" name="files[]" disabled>
					</div><br>';
		    	break;   
		    case 70:
		    	echo '<div style="background: lightblue">
			        <label class="common">RPP ICRESON de la última acta modificatoria actualizada</label><br/>
			        <input type="file" class="common" name="files[]" disabled>
					</div><br>';
		    	break;   
		    case 71:
		    	echo '<div style="background: lightblue">				
			        <label class="common">Fecha de publicación en el Diario Oficial de la Federación</label>
					<br>
			        <input type="date" class="common" id="fechaDiario" name="fechaDiario" disabled><br><br>
					</div><br>';
		    	break;   
		    case 72:
		    	echo '<div style="background: lightblue">
			        <label>Número de página</label>
			        <input type="text" class="common" id="numeroDiario" name="numeroDiario"
			          placeholder="Número de página del Diario Oficial de la Federación" disabled>
					</div><br>';
		    	break;   
		    case 73:
		    	echo '<div style="background: lightblue">
			        <label class="common">Página del DOF donde se publicó su autorización</label><br>
			        <input type="file" class="common" name="files[]" disabled>
					</div><br>';
		    	break;   
		    case 74:
		    	echo '<div style="background: lightblue">
			        <label class="common">¿El SAT ha detenido su autorización como donataria en algún momento?</label>
					<br>
			        <div style="font-size: 20px; margin-left:20px;">
			    		<input type="radio" class="common" name="autorizadaDeducible" value="Si" checked> Si
			        	<input type="radio" class="common" name="autorizadaDeducible" value="No"> No <br><br>	
			        </div>
					</div><br>';
		    	break;   
		    case 75:
		    	echo '<div style="background: lightblue">
				    <label>Detuvo el SAT su autorización?</label>
			        <input type="text" class="common" id="razonDetenido" name="razonDetenido"
			          placeholder="¿Por qué detuvo el SAT su autorización?" disabled>
					</div><br>';
		    	break;   
		    case 76:
		    	echo '<div style="background: lightblue">
			        <label class="common">¿Desde que fecha está autorizada para recibir donativos deducibles de impuestos?</label><br>
			        <input type="date" class="common" id="fechaAutorizada" name="fechaAutorizada" disabled>
					</div><br>';
		    	break;   
		    case 77:
		    	echo '<div style="background: lightblue">
					<label class="common">Población que atiende la OSC</label><br>
			        <input type="text" class="common P6" id="poblacion_0_4" name="poblacion_0_4"
			          placeholder="0 a 4 años" disabled>
					</div><br>';
		    	break;   
		    case 78:
		    	echo '<div style="background: lightblue">
			        <label class="titulos-form">¿Ha manejado esquemas de recursos complementarios?</label>
					<br>
			        <div style="font-size: 20px; margin-left:20px;">
			    		<input type="radio" class="common" name="autorizadaDeducible" value="Si" checked> Si
			        	<input type="radio" class="common" name="autorizadaDeducible" value="No"> No <br><br>	
			        </div>
					</div><br>';
		    	break;   
		    case 79:
		    	echo '<div style="background: lightblue">
				    <label>Con qué organización ha manejado recursos complementarios</label>
			        <input type="text" class="common" id="organizacionManejoRecursos" name="organizacionManejoRecursos"
			          placeholder="¿Con qué organización ha manejado recursos complementarios?" disabled>
					</div><br>';
		    	break;   
		    
		}}}
echo '</div></main>';?>