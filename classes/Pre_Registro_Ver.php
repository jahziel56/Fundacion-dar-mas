<?php
/* manda a llamar a header.php */ 
	require"header.php";
?>
	<main>
			<h1>Pre-Registro de la empresa</h1>
			<h5></h5>

			<div class="">
									
					<label>Nombre de la OSC</label>					
			        <input type="text" class="common" id="nombreOSC" name="nombreOSC"
			          placeholder="Nombre de la OSC (tal cómo está escrita en su OSC):" value="<?php echo $nombreOSC ?>" disabled>

			        <label>Objeto social</label>
			        <input type="text" class="common" id="objetoSocialOrganizacion" name="objetoSocialOrganizacion"
			          placeholder="Objeto social de la organización:"
			          value="<?php echo $objetoSocialOrganizacion ?>" disabled>

			        <label>Misión</label>
			        <input type="text" class="common" value="<?php echo $mision ?>" disabled>
			        <label>Visión</label>
			    	<input type="text" class="common" value="<?php echo $vision ?>" disabled>
			        <label>Áreas de atención</label>
			    	<input type="text" class="common" value="<?php echo $areasAtencion ?>" disabled>
			        

			        <label>RFC</label>
			        <input type="text" class="common" id="rfcHomoclave" name="rfcHomoclave"
			          placeholder="RFC con homoclave de la organización:"
			          value="<?php echo $rfcHomoclave ?>" disabled>

			        <label>RFC (PDF o JPG) </label><br>
			        <input type="file" class="common" name="files[]" disabled><br><br>

			        <label>CLUNI</label>
			        <input type="text" class="common" id="CLUNI" name="CLUNI"
			          placeholder="CLUNI (Si no se tiene, ingresar PRE-FOLIO otorgado)"
			          value="<?php echo $CLUNI ?>" disabled>

			        <label>(PDF o JPG) </label><br>
			        <input type="file" class="common" name="files[]" disabled><br><br>

			        <label>Calle</label>
			        <input type="text" class="common" id="calle" name="calle"
			          placeholder="Calle del domicilio:"
			          value="<?php echo $calle ?>" disabled>

			        <label>Domicilio</label>
			        <input type="text" class="common" id="numero" name="numero"
			          placeholder="Número del domicilio:"
			          value="<?php echo $numero ?>" disabled>

			        <label>Colonia</label>
			        <input type="text" class="common" id="colonia" name="colonia"
			          placeholder="Colonia del domicilio:"
			          value="<?php echo $colonia ?>" disabled>

			        <label>Codigo postal</label>
			        <input type="text" class="common" id="codigoPostal" name="codigoPostal"
			          placeholder="Codigo postal del domicilio:"
			          value="<?php echo $codigoPostal ?>" disabled>

			        <label>Localidad</label>  
			        <input type="text" class="common" id="localidad" name="localidad"
			          placeholder="Localidad del domicilio:"
			          value="<?php echo $localidad ?>" disabled>

			        <label>Municipio</label>  
			        <input type="text" class="common" id="municipio" name="municipio"
			          placeholder="Municipio del domicilio:"
			          value="<?php echo $municipio ?>" disabled>

			        <label>Teléfono oficina</label>  
			        <input type="text" class="common" id="phoneOficina" name="phoneOficina"
			          placeholder="Teléfono de la oficina (con lada):"
			          value="<?php echo $phoneOficina ?>" disabled>

			        <label>Teléfono celular</label>
			        <input type="text" class="common" id="phoneCelular" name="phoneCelular"
			          placeholder="Teléfono celular (con lada):"
			          value="<?php echo $phoneCelular ?>" disabled>

			        <label>Correo de organización</label>
			        <input type="email" class="common" id="emailContacto" name="emailContacto"
			          placeholder="Correo de contacto de la organización: type EMAIL"
			          value="<?php echo $emailContacto ?>" disabled>

			        <label>Página web</label>
			        <input type="url" class="common" id="paginaWeb" name="paginaWeb"
			          placeholder="Página web de la organización: TYPE URL"
			          value="<?php echo $paginaWeb ?>" disabled>

			        <label>Facebook</label>
			        <input type="text" class="common" id="organizacionFB" name="organizacionFB"
			          placeholder="Facebook de la organización:"
			          value="<?php echo $organizacionFB ?>" disabled>

			        <label>Twitter</label>
			        <input type="text" class="common" id="organizacionTW" name="organizacionTW"
			          placeholder="Twitter de la organización:"
			          value="<?php echo $organizacionTW ?>" disabled>

			        <label>Instagram</label>
					<input type="text" class="common" id="organizacionInsta" name="organizacionInsta"
			          placeholder="Instagram de la organización:"
			          value="<?php echo $organizacionInsta ?>" disabled>
		        

				
			        <label class="common">Fecha de constitución de la OSC</label><br>
				    <input type="date" class="common" id="fechaConstitucionOSC" name="fechaConstitucionOSC"
				          value="<?php echo $fechaConstitucionOSC ?>" disabled><br><br>

			        <label>Nombre del notario</label>
			        <input type="text" class="common" id="nombreNotario" name="nombreNotario"
			          placeholder="Nombre del notario público:"
			          value="<?php echo $nombreNotario ?>" disabled>

			        <label>Número del notario</label>
			        <input type="text" class="common" id="numeroNotario" name="numeroNotario"
			          placeholder="Número del notario público:"
			          value="<?php echo $numeroNotario ?>" disabled>

			        <label class="common">Municipio de la notaría pública</label><br>
				    <input type="text" class="common" value="<?php echo $municipioNotaria ?>" disabled>

			        <label>Número de estritura</label>
			        <input type="text" class="common" id="noEstrituraPublica" name="noEstrituraPublica"
			          placeholder="Número de estritura pública:"
			          value="<?php echo $noEstrituraPublica ?>" disabled>

			        <label>Volumen de estritura</label>
			        <input type="text" class="common" id="volumenEstrituraPublica" name="volumenEstrituraPublica"
			          placeholder="Volumen de estritura pública:"
			          value="<?php echo $volumenEstrituraPublica ?>" disabled>

			        <label class="common">Fecha de estritura pública</label><br>
			        <input type="date" class="common" id="fechaEstritura" name="fechaEstritura"
			          value="<?php echo $fechaEstritura ?>" disabled><br><br>

			        <label class="common">Acta constitutiva</label>
			        <input type="file" class="common" name="files[]" disabled>

			        <label class="common">Acta protocolizada donde conste la representación legal vigente</label>
			        <input type="file" class="common" name="files[]" disabled>

			        <label class="common">Municipio donde se registró la OSC</label><br>
			       	<input type="text" class="common" value="<?php echo $municipioRegistroOSC ?>" disabled>


			        <label>Nombre del estado</label>
			        <input type="text" class="common" id="estaResideOSC" name="estaResideOSC"
			          placeholder="Nombre del estado donde reside la OSC:"
			          value="<?php echo $estaResideOSC ?>" disabled>

			        <label>Nombre del municipio</label>
			        <input type="text" class="common" id="muniResideOSC" name="muniResideOSC"
			          placeholder="Nombre del municipio donde reside la OSC:"
			          value="<?php echo $muniResideOSC ?>" disabled>

			        <label>Principales logros</label>			        
			        <input type="text" class="common" id="principalesLogros" name="principalesLogros"
			          placeholder="Principales logros en el último año (2018):"
			          value="<?php echo $principalesLogros ?>" disabled>

			        <label>Metas de la organización</label>
			        <input type="text" class="common" id="metasOrganización" name="metasOrganización"
			          placeholder="Metas de la organización para el presente año (2019):"
			          value="<?php echo $metasOrganización ?>" disabled>


			        <label class="common">¿Está autorizada para recibir donativos deducibles de impuestos?</label><br>
			        <div style="font-size: 20px; margin-left:20px;">
			        	<input type="radio" class="common" name="autorizadaDeducible" checked> <?php echo $autorizadaDeducible ?> 
			        	<br><br>	
			        </div>

			        <label class="common">Su organización se rige o es dirigida por: </label>
			        <div style="font-size: 20px; margin-left:20px;">
			        	<input type="radio" class="common" name="digiridaPor" checked> <?php echo $digiridaPor ?> <br><br> 	
			        </div>

			        <label>Nombre del representante legal</label>
			        <input type="text" class="common" id="nombreRepresentante" name="nombreRepresentante"
			          placeholder="Nombre del representante legal vigente:"
			          value="<?php echo $nombreRepresentante ?>" disabled>

			        <label>Número de identificación oficial</label>
			        <input type="text" class="common" id="idRepresentante" name="idRepresentante"
			          placeholder="Número de identificación oficial del representante legal vigente:"
			          value="<?php echo $idRepresentante ?>" disabled>

			        <label class="common">INE del representante legal vigente</label>
			        <input type="file" class="common" name="files[]" disabled>

			        <label>Nombre del presidente</label>
			        <input type="text" class="common" id="nombrePresi" name="nombrePresi"
			          placeholder="Nombre del presidente y/o director general:"
			          value="<?php echo $nombrePresi ?>" disabled>

			        <label>Nombre del coordinador</label>
			        <input type="text" class="common" id="nombreCoordi" name="nombreCoordi"
			          placeholder="Nombre del coordinador que somete a la convocatoria:"
			          value="<?php echo $nombreCoordi ?>" disabled>

			        <label class="common">INE del coordinador del proyecto</label>
			        <input type="file" class="common" name="files[]" disabled>

			        <label>Correo electrónico del coordinador</label>
			        <input type="email" class="common" id="correoCoordinador" name="correoCoordinador"
			          placeholder="Correo electrónico personal del coordinador del proyecto"
			          value="<?php echo $correoCoordinador ?>" disabled>

			        <label>Cargo del coordinador</label>
			        <input type="text" class="common" id="cargoCoordinador" name="cargoCoordinador"
			          placeholder="Cargo o puesto del coordinador del proyecto"
			          value="<?php echo $cargoCoordinador ?>" disabled>

			        <label>Número de empleados</label>
			        <input type="text" class="common" id="numeroEmpleados" name="numeroEmpleados"
			          placeholder="Número de empleados de la organización"
			          value="<?php echo $numeroEmpleados ?>" disabled>

			        <label>Número de voluntarios</label>
			        <input type="text" class="common" id="numeroVoluntarios" name="numeroVoluntarios"
			          placeholder="Número de voluntarios de la organización"
			          value="<?php echo $numeroVoluntarios ?>" disabled>

			        <label>Alianzas con las que cuenta</label>
			        <input type="text" class="common" id="principalesAlianzas" name="principalesAlianzas"
			          placeholder="Mencione las principales alianzas con las que cuenta"
			          value="<?php echo $principalesAlianzas ?>" disabled>

			        <label>Número de personas que benefició</label>
			        <input type="text" class="common" id="numeroBeneficiados" name="numeroBeneficiados"
			          placeholder="Número de personas que benefició el año pasado"
			          value="<?php echo $numeroBeneficiados ?>" disabled>

			        <label class="titulos-form">¿Tiene observaciones en su 32 D?</label>
			        <div style="font-size: 20px; margin-left:20px;">
			        	<input type="radio" class="common" name="observaciones32D" checked> <?php echo $observaciones32D ?>
			        	<br><br>
			    	</div>

			        <label class="common">32D en positivio y con 30 días de expedición como máximo</label>
			        <input type="file" class="common" name="files[]" disabled>

			        <label class="titulos-form">¿Ha presentado en tiempo y forma la declaración por ejercicio, de impuestos federales?</label>
			        <div style="font-size: 20px; margin-left:20px;">
				        <input type="radio" class="common" name="tiempoYforma" checked> <?php echo $tiempoYforma ?><br><br>
				    </div>

			        <label class="titulos-form">¿Tiene adeudos fiscales a cargo, por impuestos federales?</label>
			        <div style="font-size: 20px; margin-left:20px;">
			        	<input type="radio" class="common" name="tieneAdeudos" checked> <?php echo $tieneAdeudos ?><br><br>
			        </div>


			        <label class="common">F21, preferentemente 2018 o más reciente</label>
			        <input type="file" class="common" name="files[]" disabled>

			        <label class="common">Constancia de Situación Fiscal</label>
			        <input type="file" class="common" name="files[]" disabled>

			        <label class="common">Comprobante de cuenta bancaria</label>
			        <input type="file" class="common" name="files[]" disabled>

			        <label class="common">Factura cancelada</label>
			        <input type="file" class="common" name="files[]" disabled>

			        <label class="titulos-form">¿Está inscrita en el Directorio Nacional de Instituciones de Asistencia Social?</label>
			        <div style="font-size: 20px; margin-left:20px;">
			        	<input type="radio" class="common" name="inscritaDNIAS" checked> <?php echo $inscritaDNIAS ?><br><br>
			        </div>

			        <label class="common">DNIAS</label>
			        <input type="file" class="common" name="files[]" disabled>
				

				
					<label class="common">Número de libro</label><br>
			        <input type="text" class="common" id="numeroLibro" name="numeroLibro"
			          placeholder="Número de libro:"
			          value="<?php echo $numeroLibro ?>" disabled>

			        <label>Número de inscrpción</label>
			        <input type="text" class="common" id="numeroInscripcion" name="numeroInscripcion"
			          placeholder="Número de inscrpción:"
			          value="<?php echo $numeroInscripcion ?>" disabled>

			        <label>Volúmen ICRESON</label>
			        <input type="text" class="common" id="volumenICRESON" name="volumenICRESON"
			          placeholder="Volúmen ICRESON:"
			          value="<?php echo $volumenICRESON ?>" disabled>

			        <label class="titulos-form">RPP ICRESON</label><br/>
			        <input type="file" class="common" name="files[]" disabled><br>

			        <label class="titulos-form">¿Su organización ha tenido modificaciones a su acta constitutiva?</label><br>
			        <div style="font-size: 20px; margin-left:20px;">
				        <input type="radio" class="common" name="existenModis" checked> <?php echo $existenModis ?>
				    </div>

			        <label class="common">Fecha de la última modificación del acta constitutiva</label><br>
			        <input type="date" class="common" id="ultimaModi" name="ultimaModi"
			          value="<?php echo $ultimaModi ?>" disabled><br><br>

			        <label>Número de acta constitutiva</label>
			        <input type="text" class="common" id="numeroActaConsti" name="numeroActaConsti"
			          placeholder="Número de acta constitutiva:"
			          value="<?php echo $numeroActaConsti ?>" disabled>

			        <label>Volúmen de acta constitutiva</label>
			        <input type="text" class="common" id="volumenActaConsti" name="volumenActaConsti"
			          placeholder="Volúmen de acta constitutiva:"
			          value="<?php echo $volumenActaConsti ?>" disabled>

			        <label class="common">Ultima acta modificatoria protocolizada</label><br/>
			        <input type="file" class="common" name="files[]" disabled><br>

			        <label class="common">RPP ICRESON de la última acta modificatoria actualizada</label><br/>
			        <input type="file" class="common" name="files[]" disabled><br>
				

				
			        <label class="common">Fecha de publicación en el Diario Oficial de la Federación</label><br>
			        <input type="date" class="common" id="fechaDiario" name="fechaDiario" value="<?php echo $fechaDiario ?>" disabled><br>

			        <label>Número de página</label>
			        <input type="text" class="common" id="numeroDiario" name="numeroDiario"
			          placeholder="Número de página del Diario Oficial de la Federación" value="<?php echo $numeroDiario ?>" disabled>

			        <label class="common">Página del DOF donde se publicó su autorización</label><br>
			        <input type="file" class="common" name="files[]" disabled><br>

			        <label class="common">¿El SAT ha detenido su autorización como donataria en algún momento?</label><br>
			        <div style="font-size: 20px; margin-left:20px;">
				        <input type="radio" class="common" name="detenidoAutorizado" checked> <?php echo $detenidoAutorizado ?><br>
				    </div>

				    <label>Detuvo el SAT su autorización?</label>
			        <input type="text" class="common" id="razonDetenido" name="razonDetenido"
			          placeholder="¿Por qué detuvo el SAT su autorización?"
			          value="<?php echo $razonDetenido ?>" disabled>

			        <label class="common">¿Desde que fecha está autorizada para recibir donativos deducibles de impuestos?</label><br>
			        <input type="date" class="common" id="fechaAutorizada" name="fechaAutorizada"
			          value="<?php echo $fechaAutorizada ?>" disabled><br>
				

				

					<label class="common">Población que atiende la OSC</label><br>
			        <input type="text" class="common P6" id="poblacion_0_4" name="poblacion_0_4"
			          placeholder="0 a 4 años"
			          value="<?php echo $poblacion_0_4 ?>" disabled>

			        <input type="text" class="common P6" id="poblacion_5_14" name="poblacion_5_14"
			          placeholder="5 a 14 años"
			          value="<?php echo $poblacion_5_14 ?>" disabled>

			        <input type="text" class="common P6" id="poblacion_15_29" name="poblacion_15_29"
			          placeholder="15 a 29 años"
			          value="<?php echo $poblacion_15_29 ?>" disabled>

			        <input type="text" class="common P6" id="poblacion_30_44" name="poblacion_30_44"
			          placeholder="30 a 44 años"
			          value="<?php echo $poblacion_30_44 ?>"  disabled>

			        <input type="text" class="common P6" id="poblacion_45_64" name="poblacion_45_64"
			          placeholder="45 a 64 años"
			          value="<?php echo $poblacion_45_64 ?>" disabled>

			        <input type="text" class="common P6" id="poblacion_65_mas" name="poblacion_65_mas"
			          placeholder="45 a 64 años"
			          value="<?php echo $poblacion_65_mas ?>" disabled>

			        <label class="titulos-form">¿Ha manejado esquemas de recursos complementarios?</label><br>
			        <div style="font-size: 20px; margin-left:20px;">
				        <input type="radio" class="common" name="esquemasRecursosComp" checked> <?php echo $esquemasRecursosComp ?>
				    </div><br>


				    <label>Con qué organización ha manejado recursos complementarios</label>
			        <input type="text" class="common" id="organizacionManejoRecursos" name="organizacionManejoRecursos"
			          placeholder="¿Con qué organización ha manejado recursos complementarios?"
			          value="<?php echo $organizacionManejoRecursos ?>" disabled>
				

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