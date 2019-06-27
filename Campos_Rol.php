<?php
/* manda a llamar a header.php */ 
	require"classes/header.php";
?>
	<main>

				<svg xmlns="http://www.w3.org/2000/svg" style="display: none">
		  <symbol id="checkmark" viewBox="0 0 24 24">
		    <path stroke-linecap="round" stroke-miterlimit="10" fill="none"  d="M22.9 3.7l-15.2 16.6-6.6-7.1">
		    </path>
		  </symbol>
		</svg>

			<h1>Pre-Registro de la empresa</h1>
			<h5></h5>

			<div class="Pre-Registro" style="width: 100%;">
									
					<label>Nombre de la OSC</label><br>					
			        <input type="text" class="common" id="nombreOSC" name="nombreOSC"
			          placeholder="Nombre de la OSC (tal cómo está escrita en su OSC):" disabled>
					<div class="form-container">
					  <div class="promoted-checkbox">
					    <input id="1" type="checkbox" class="promoted-input-checkbox" checked/>
					    <label for="1">
					      <svg><use xlink:href="#checkmark" /></svg>    
					    </label>
					  </div>
					</div><br>

			        <label style="width: 100%">Objeto social</label><br>
			        <input type="text" class="common" id="objetoSocialOrganizacion" name="objetoSocialOrganizacion"
			          placeholder="Objeto social de la organización:" disabled>
					<div class="form-container">
					  <div class="promoted-checkbox">
					    <input id="2" type="checkbox" class="promoted-input-checkbox" checked/>
					    <label for="2">
					      <svg><use xlink:href="#checkmark" /></svg>    
					    </label>
					  </div>
					</div><br>


			        <label>Misión</label><br>
			        <input type="text" class="common" placeholder="Misión:" disabled>
			        <div class="form-container">
					  <div class="promoted-checkbox">
					    <input id="2" type="checkbox" class="promoted-input-checkbox" checked/>
					    <label for="2">
					      <svg><use xlink:href="#checkmark" /></svg>    
					    </label>
					  </div>
					</div><br>

			        <label>Visión</label><br>
			    	<input type="text" class="common" placeholder="Visión:" disabled>
			    	<div class="form-container">
					  <div class="promoted-checkbox">
					    <input id="2" type="checkbox" class="promoted-input-checkbox" checked/>
					    <label for="2">
					      <svg><use xlink:href="#checkmark" /></svg>    
					    </label>
					  </div>
					</div><br>

			        <label>Áreas de atención</label>
			    	<input type="text" class="common" placeholder="Áreas de atención de la OSC:" disabled>
			    	<div class="form-container">
					  <div class="promoted-checkbox">
					    <input id="2" type="checkbox" class="promoted-input-checkbox" checked/>
					    <label for="2">
					      <svg><use xlink:href="#checkmark" /></svg>    
					    </label>
					  </div>
					</div><br>

			        <label>RFC</label><br>
			        <input type="text" class="common" id="rfcHomoclave" name="rfcHomoclave"
			          placeholder="RFC con homoclave de la organización:" disabled>
			          <div class="form-container">
					  <div class="promoted-checkbox">
					    <input id="2" type="checkbox" class="promoted-input-checkbox" checked/>
					    <label for="2">
					      <svg><use xlink:href="#checkmark" /></svg>    
					    </label>
					  </div>
					</div><br>

			        <label>RFC (PDF o JPG) </label><br>
			        <input type="file" class="common" name="files[]" disabled>
			        <div class="form-container">
					  <div class="promoted-checkbox">
					    <input id="2" type="checkbox" class="promoted-input-checkbox" checked/>
					    <label for="2">
					      <svg><use xlink:href="#checkmark" /></svg>    
					    </label>
					  </div>
					</div><br><br>

			        <label>CLUNI</label><br>
			        <input type="text" class="common" id="CLUNI" name="CLUNI"
			          placeholder="CLUNI (Si no se tiene, ingresar PRE-FOLIO otorgado)" disabled>
			          <div class="form-container">
					  <div class="promoted-checkbox">
					    <input id="2" type="checkbox" class="promoted-input-checkbox" checked/>
					    <label for="2">
					      <svg><use xlink:href="#checkmark" /></svg>    
					    </label>
					  </div>
					</div><br>

			        <label>(PDF o JPG) </label><br>
			        <input type="file" class="common" name="files[]" disabled>
			        <div class="form-container">
					  <div class="promoted-checkbox">
					    <input id="2" type="checkbox" class="promoted-input-checkbox" checked/>
					    <label for="2">
					      <svg><use xlink:href="#checkmark" /></svg>    
					    </label>
					  </div>
					</div><br><br>

			        <label>Calle</label><br>
			        <input type="text" class="common" id="calle" name="calle"
			          placeholder="Calle del domicilio:" disabled>
			          <div class="form-container">
					  <div class="promoted-checkbox">
					    <input id="2" type="checkbox" class="promoted-input-checkbox" checked/>
					    <label for="2">
					      <svg><use xlink:href="#checkmark" /></svg>    
					    </label>
					  </div>
					</div><br>

			        <label>Domicilio</label><br>
			        <input type="text" class="common" id="numero" name="numero"
			          placeholder="Número del domicilio:" disabled>
			          <div class="form-container">
					  <div class="promoted-checkbox">
					    <input id="2" type="checkbox" class="promoted-input-checkbox" checked/>
					    <label for="2">
					      <svg><use xlink:href="#checkmark" /></svg>    
					    </label>
					  </div>
					</div><br>

			        <label>Colonia</label><br>
			        <input type="text" class="common" id="colonia" name="colonia"
			          placeholder="Colonia del domicilio:" disabled>
			          <div class="form-container">
					  <div class="promoted-checkbox">
					    <input id="2" type="checkbox" class="promoted-input-checkbox" checked/>
					    <label for="2">
					      <svg><use xlink:href="#checkmark" /></svg>    
					    </label>
					  </div>
					</div><br>

			        <label>Codigo postal</label><br>
			        <input type="text" class="common" id="codigoPostal" name="codigoPostal"
			          placeholder="Codigo postal del domicilio:" disabled>
			          <div class="form-container">
					  <div class="promoted-checkbox">
					    <input id="2" type="checkbox" class="promoted-input-checkbox" checked/>
					    <label for="2">
					      <svg><use xlink:href="#checkmark" /></svg>    
					    </label>
					  </div>
					</div><br>

			        <label>Localidad</label><br>
			        <input type="text" class="common" id="localidad" name="localidad"
			          placeholder="Localidad del domicilio:" disabled>
			          <div class="form-container">
					  <div class="promoted-checkbox">
					    <input id="2" type="checkbox" class="promoted-input-checkbox" checked/>
					    <label for="2">
					      <svg><use xlink:href="#checkmark" /></svg>    
					    </label>
					  </div>
					</div><br>

			        <label>Municipio</label><br>
			        <input type="text" class="common" id="municipio" name="municipio"
			          placeholder="Municipio del domicilio:" disabled>
			          <div class="form-container">
					  <div class="promoted-checkbox">
					    <input id="2" type="checkbox" class="promoted-input-checkbox" checked/>
					    <label for="2">
					      <svg><use xlink:href="#checkmark" /></svg>    
					    </label>
					  </div>
					</div><br>

			        <label>Teléfono oficina</label>  
			        <input type="text" class="common" id="phoneOficina" name="phoneOficina"
			          placeholder="Teléfono de la oficina (con lada):" disabled>
			          <div class="form-container">
					  <div class="promoted-checkbox">
					    <input id="2" type="checkbox" class="promoted-input-checkbox" checked/>
					    <label for="2">
					      <svg><use xlink:href="#checkmark" /></svg>    
					    </label>
					  </div>
					</div><br>

			        <label>Teléfono celular</label><br>
			        <input type="text" class="common" id="phoneCelular" name="phoneCelular"
			          placeholder="Teléfono celular (con lada):" disabled>
			          <div class="form-container">
					  <div class="promoted-checkbox">
					    <input id="2" type="checkbox" class="promoted-input-checkbox" checked/>
					    <label for="2">
					      <svg><use xlink:href="#checkmark" /></svg>    
					    </label>
					  </div>
					</div><br>

			        <label>Correo de organización</label><br>
			        <input type="email" class="common" id="emailContacto" name="emailContacto"
			          placeholder="Correo de contacto de la organización: type EMAIL" disabled>
			          <div class="form-container">
					  <div class="promoted-checkbox">
					    <input id="2" type="checkbox" class="promoted-input-checkbox" checked/>
					    <label for="2">
					      <svg><use xlink:href="#checkmark" /></svg>    
					    </label>
					  </div>
					</div><br>

			        <label>Página web</label><br>
			        <input type="url" class="common" id="paginaWeb" name="paginaWeb"
			          placeholder="Página web de la organización: TYPE URL" disabled>
			          <div class="form-container">
					  <div class="promoted-checkbox">
					    <input id="2" type="checkbox" class="promoted-input-checkbox" checked/>
					    <label for="2">
					      <svg><use xlink:href="#checkmark" /></svg>    
					    </label>
					  </div>
					</div><br>

			        <label>Facebook</label><br>
			        <input type="text" class="common" id="organizacionFB" name="organizacionFB"
			          placeholder="Facebook de la organización:" disabled>
			          <div class="form-container">
					  <div class="promoted-checkbox">
					    <input id="2" type="checkbox" class="promoted-input-checkbox" checked/>
					    <label for="2">
					      <svg><use xlink:href="#checkmark" /></svg>    
					    </label>
					  </div>
					</div><br>

			        <label>Twitter</label><br>
			        <input type="text" class="common" id="organizacionTW" name="organizacionTW"
			          placeholder="Twitter de la organización:" disabled>
			          <div class="form-container">
					  <div class="promoted-checkbox">
					    <input id="2" type="checkbox" class="promoted-input-checkbox" checked/>
					    <label for="2">
					      <svg><use xlink:href="#checkmark" /></svg>    
					    </label>
					  </div>
					</div><br>

			        <label>Instagram</label><br>
					<input type="text" class="common" id="organizacionInsta" name="organizacionInsta"
			          placeholder="Instagram de la organización:" disabled>
			          <div class="form-container">
					  <div class="promoted-checkbox">
					    <input id="2" type="checkbox" class="promoted-input-checkbox" checked/>
					    <label for="2">
					      <svg><use xlink:href="#checkmark" /></svg>    
					    </label>
					  </div>
					</div><br>
		        

				
			        <label class="common">Fecha de constitución de la OSC</label><br>
				    <input type="date" class="common" id="fechaConstitucionOSC" name="fechaConstitucionOSC" disabled>
				    <div class="form-container">
					  <div class="promoted-checkbox">
					    <input id="2" type="checkbox" class="promoted-input-checkbox" checked/>
					    <label for="2">
					      <svg><use xlink:href="#checkmark" /></svg>    
					    </label>
					  </div>
					</div><br><br>

			        <label>Nombre del notario</label><br>
			        <input type="text" class="common" id="nombreNotario" name="nombreNotario"
			          placeholder="Nombre del notario público:" disabled>
			          <div class="form-container">
					  <div class="promoted-checkbox">
					    <input id="2" type="checkbox" class="promoted-input-checkbox" checked/>
					    <label for="2">
					      <svg><use xlink:href="#checkmark" /></svg>    
					    </label>
					  </div>
					</div><br>

			        <label>Número del notario</label>
			        <input type="text" class="common" id="numeroNotario" name="numeroNotario"
			          placeholder="Número del notario público:" disabled>
			          <div class="form-container">
					  <div class="promoted-checkbox">
					    <input id="2" type="checkbox" class="promoted-input-checkbox" checked/>
					    <label for="2">
					      <svg><use xlink:href="#checkmark" /></svg>    
					    </label>
					  </div>
					</div><br>

			        <label class="common">Municipio de la notaría pública</label><br>
				    <input type="text" class="common" placeholder="Municipio de la notaría pública" disabled>
				    <div class="form-container">
					  <div class="promoted-checkbox">
					    <input id="2" type="checkbox" class="promoted-input-checkbox" checked/>
					    <label for="2">
					      <svg><use xlink:href="#checkmark" /></svg>    
					    </label>
					  </div>
					</div><br>

			        <label>Número de estritura</label>
			        <input type="text" class="common" id="noEstrituraPublica" name="noEstrituraPublica"
			          placeholder="Número de estritura pública:" disabled>
			          <div class="form-container">
					  <div class="promoted-checkbox">
					    <input id="2" type="checkbox" class="promoted-input-checkbox" checked/>
					    <label for="2">
					      <svg><use xlink:href="#checkmark" /></svg>    
					    </label>
					  </div>
					</div><br>

			        <label>Volumen de estritura</label>
			        <input type="text" class="common" id="volumenEstrituraPublica" name="volumenEstrituraPublica"
			          placeholder="Volumen de estritura pública:" disabled>
			          <div class="form-container">
					  <div class="promoted-checkbox">
					    <input id="2" type="checkbox" class="promoted-input-checkbox" checked/>
					    <label for="2">
					      <svg><use xlink:href="#checkmark" /></svg>    
					    </label>
					  </div>
					</div><br>

			        <label class="common">Fecha de estritura pública</label><br>
			        <input type="date" class="common" id="fechaEstritura" name="fechaEstritura" disabled>
			        <div class="form-container">
					  <div class="promoted-checkbox">
					    <input id="2" type="checkbox" class="promoted-input-checkbox" checked/>
					    <label for="2">
					      <svg><use xlink:href="#checkmark" /></svg>    
					    </label>
					  </div>
					</div><br><br>

			        <label class="common">Acta constitutiva</label>
			        <input type="file" class="common" name="files[]" disabled>
			        <div class="form-container">
					  <div class="promoted-checkbox">
					    <input id="2" type="checkbox" class="promoted-input-checkbox" checked/>
					    <label for="2">
					      <svg><use xlink:href="#checkmark" /></svg>    
					    </label>
					  </div>
					</div><br>

			        <label class="common">Acta protocolizada donde conste la representación legal vigente</label>
			        <input type="file" class="common" name="files[]" disabled>
			        <div class="form-container">
					  <div class="promoted-checkbox">
					    <input id="2" type="checkbox" class="promoted-input-checkbox" checked/>
					    <label for="2">
					      <svg><use xlink:href="#checkmark" /></svg>    
					    </label>
					  </div>
					</div><br>

			        <label class="common">Municipio donde se registró la OSC</label><br>
			       	<input type="text" class="common" placeholder="Municipio de la notaría pública" disabled>
			       	<div class="form-container">
					  <div class="promoted-checkbox">
					    <input id="2" type="checkbox" class="promoted-input-checkbox" checked/>
					    <label for="2">
					      <svg><use xlink:href="#checkmark" /></svg>    
					    </label>
					  </div>
					</div><br>


			        <label>Nombre del estado</label>
			        <input type="text" class="common" id="estaResideOSC" name="estaResideOSC"
			          placeholder="Nombre del estado donde reside la OSC:" disabled>
			          <div class="form-container">
					  <div class="promoted-checkbox">
					    <input id="2" type="checkbox" class="promoted-input-checkbox" checked/>
					    <label for="2">
					      <svg><use xlink:href="#checkmark" /></svg>    
					    </label>
					  </div>
					</div><br>

			        <label>Nombre del municipio</label>
			        <input type="text" class="common" id="muniResideOSC" name="muniResideOSC"
			          placeholder="Nombre del municipio donde reside la OSC:" disabled>
			          <div class="form-container">
					  <div class="promoted-checkbox">
					    <input id="2" type="checkbox" class="promoted-input-checkbox" checked/>
					    <label for="2">
					      <svg><use xlink:href="#checkmark" /></svg>    
					    </label>
					  </div>
					</div><br>

			        <label>Principales logros</label>			        
			        <input type="text" class="common" id="principalesLogros" name="principalesLogros"
			          placeholder="Principales logros en el último año (2018):" disabled>
			          <div class="form-container">
					  <div class="promoted-checkbox">
					    <input id="2" type="checkbox" class="promoted-input-checkbox" checked/>
					    <label for="2">
					      <svg><use xlink:href="#checkmark" /></svg>    
					    </label>
					  </div>
					</div><br>

			        <label>Metas de la organización</label>
			        <input type="text" class="common" id="metasOrganización" name="metasOrganización"
			          placeholder="Metas de la organización para el presente año (2019):" disabled>
			          <div class="form-container">
					  <div class="promoted-checkbox">
					    <input id="2" type="checkbox" class="promoted-input-checkbox" checked/>
					    <label for="2">
					      <svg><use xlink:href="#checkmark" /></svg>    
					    </label>
					  </div>
					</div><br>


			        <label class="common">¿Está autorizada para recibir donativos deducibles de impuestos?</label>
			        <div class="form-container">
					  <div class="promoted-checkbox">
					    <input id="2" type="checkbox" class="promoted-input-checkbox" checked/>
					    <label for="2">
					      <svg><use xlink:href="#checkmark" /></svg>    
					    </label>
					  </div>
					</div><br>
			        <div style="font-size: 20px; margin-left:20px;">
			    		<input type="radio" class="common" name="autorizadaDeducible" value="Si" checked> Si
			        	<input type="radio" class="common" name="autorizadaDeducible" value="No"> No <br><br>	
			        </div>

			        <label class="common">Su organización se rige o es dirigida por: </label>
			        <div class="form-container">
					  <div class="promoted-checkbox">
					    <input id="2" type="checkbox" class="promoted-input-checkbox" checked/>
					    <label for="2">
					      <svg><use xlink:href="#checkmark" /></svg>    
					    </label>
					  </div>
					</div><br>
			        <div style="font-size: 20px; margin-left:20px;">
			    		<input type="radio" class="common" name="autorizadaDeducible" value="Si" checked> Si
			        	<input type="radio" class="common" name="autorizadaDeducible" value="No"> No <br><br>	
			        </div>

			        <label>Nombre del representante legal</label>
			        <input type="text" class="common" id="nombreRepresentante" name="nombreRepresentante"
			          placeholder="Nombre del representante legal vigente:" disabled>
			          <div class="form-container">
					  <div class="promoted-checkbox">
					    <input id="2" type="checkbox" class="promoted-input-checkbox" checked/>
					    <label for="2">
					      <svg><use xlink:href="#checkmark" /></svg>    
					    </label>
					  </div>
					</div><br>

			        <label>Número de identificación oficial</label>
			        <input type="text" class="common" id="idRepresentante" name="idRepresentante"
			          placeholder="Número de identificación oficial del representante legal vigente:" disabled>
			          <div class="form-container">
					  <div class="promoted-checkbox">
					    <input id="2" type="checkbox" class="promoted-input-checkbox" checked/>
					    <label for="2">
					      <svg><use xlink:href="#checkmark" /></svg>    
					    </label>
					  </div>
					</div><br>

			        <label class="common">INE del representante legal vigente</label>
			        <input type="file" class="common" name="files[]" disabled>
			        <div class="form-container">
					  <div class="promoted-checkbox">
					    <input id="2" type="checkbox" class="promoted-input-checkbox" checked/>
					    <label for="2">
					      <svg><use xlink:href="#checkmark" /></svg>    
					    </label>
					  </div>
					</div><br>

			        <label>Nombre del presidente</label>
			        <input type="text" class="common" id="nombrePresi" name="nombrePresi"
			          placeholder="Nombre del presidente y/o director general:" disabled>
			          <div class="form-container">
					  <div class="promoted-checkbox">
					    <input id="2" type="checkbox" class="promoted-input-checkbox" checked/>
					    <label for="2">
					      <svg><use xlink:href="#checkmark" /></svg>    
					    </label>
					  </div>
					</div><br>

			        <label>Nombre del coordinador</label>
			        <input type="text" class="common" id="nombreCoordi" name="nombreCoordi"
			          placeholder="Nombre del coordinador que somete a la convocatoria:" disabled>
			          <div class="form-container">
					  <div class="promoted-checkbox">
					    <input id="2" type="checkbox" class="promoted-input-checkbox" checked/>
					    <label for="2">
					      <svg><use xlink:href="#checkmark" /></svg>    
					    </label>
					  </div>
					</div><br>

			        <label class="common">INE del coordinador del proyecto</label>
			        <input type="file" class="common" name="files[]" disabled>
			        <div class="form-container">
					  <div class="promoted-checkbox">
					    <input id="2" type="checkbox" class="promoted-input-checkbox" checked/>
					    <label for="2">
					      <svg><use xlink:href="#checkmark" /></svg>    
					    </label>
					  </div>
					</div><br>

			        <label>Correo electrónico del coordinador</label>
			        <input type="email" class="common" id="correoCoordinador" name="correoCoordinador"
			          placeholder="Correo electrónico personal del coordinador del proyecto" disabled>
			          <div class="form-container">
					  <div class="promoted-checkbox">
					    <input id="2" type="checkbox" class="promoted-input-checkbox" checked/>
					    <label for="2">
					      <svg><use xlink:href="#checkmark" /></svg>    
					    </label>
					  </div>
					</div><br>

			        <label>Cargo del coordinador</label>
			        <input type="text" class="common" id="cargoCoordinador" name="cargoCoordinador"
			          placeholder="Cargo o puesto del coordinador del proyecto" disabled>
			          <div class="form-container">
					  <div class="promoted-checkbox">
					    <input id="2" type="checkbox" class="promoted-input-checkbox" checked/>
					    <label for="2">
					      <svg><use xlink:href="#checkmark" /></svg>    
					    </label>
					  </div>
					</div><br>

			        <label>Número de empleados</label>
			        <input type="text" class="common" id="numeroEmpleados" name="numeroEmpleados"
			          placeholder="Número de empleados de la organización" disabled>
			          <div class="form-container">
					  <div class="promoted-checkbox">
					    <input id="2" type="checkbox" class="promoted-input-checkbox" checked/>
					    <label for="2">
					      <svg><use xlink:href="#checkmark" /></svg>    
					    </label>
					  </div>
					</div><br>

			        <label>Número de voluntarios</label>
			        <input type="text" class="common" id="numeroVoluntarios" name="numeroVoluntarios"
			          placeholder="Número de voluntarios de la organización" disabled>
			          <div class="form-container">
					  <div class="promoted-checkbox">
					    <input id="2" type="checkbox" class="promoted-input-checkbox" checked/>
					    <label for="2">
					      <svg><use xlink:href="#checkmark" /></svg>    
					    </label>
					  </div>
					</div><br>

			        <label>Alianzas con las que cuenta</label>
			        <input type="text" class="common" id="principalesAlianzas" name="principalesAlianzas"
			          placeholder="Mencione las principales alianzas con las que cuenta" disabled>
			          <div class="form-container">
					  <div class="promoted-checkbox">
					    <input id="2" type="checkbox" class="promoted-input-checkbox" checked/>
					    <label for="2">
					      <svg><use xlink:href="#checkmark" /></svg>    
					    </label>
					  </div>
					</div><br>

			        <label>Número de personas que benefició</label>
			        <input type="text" class="common" id="numeroBeneficiados" name="numeroBeneficiados"
			          placeholder="Número de personas que benefició el año pasado" disabled>
			          <div class="form-container">
					  <div class="promoted-checkbox">
					    <input id="2" type="checkbox" class="promoted-input-checkbox" checked/>
					    <label for="2">
					      <svg><use xlink:href="#checkmark" /></svg>    
					    </label>
					  </div>
					</div><br>

			        <label class="titulos-form">¿Tiene observaciones en su 32 D?</label>
			        <div class="form-container">
					  <div class="promoted-checkbox">
					    <input id="2" type="checkbox" class="promoted-input-checkbox" checked/>
					    <label for="2">
					      <svg><use xlink:href="#checkmark" /></svg>    
					    </label>
					  </div>
					</div><br>
			        <div style="font-size: 20px; margin-left:20px;">
			    		<input type="radio" class="common" name="autorizadaDeducible" value="Si" checked> Si
			        	<input type="radio" class="common" name="autorizadaDeducible" value="No"> No <br><br>	
			        </div>


			        <label class="common">32D en positivio y con 30 días de expedición como máximo</label>
			        <input type="file" class="common" name="files[]" disabled>
			        <div class="form-container">
					  <div class="promoted-checkbox">
					    <input id="2" type="checkbox" class="promoted-input-checkbox" checked/>
					    <label for="2">
					      <svg><use xlink:href="#checkmark" /></svg>    
					    </label>
					  </div>
					</div><br>

			        <label class="titulos-form">¿Ha presentado en tiempo y forma la declaración por ejercicio, de impuestos federales?</label>
			        <div class="form-container">
					  <div class="promoted-checkbox">
					    <input id="2" type="checkbox" class="promoted-input-checkbox" checked/>
					    <label for="2">
					      <svg><use xlink:href="#checkmark" /></svg>    
					    </label>
					  </div>
					</div><br>
			        <div style="font-size: 20px; margin-left:20px;">
			    		<input type="radio" class="common" name="autorizadaDeducible" value="Si" checked> Si
			        	<input type="radio" class="common" name="autorizadaDeducible" value="No"> No <br><br>	
			        </div>

			        <label class="titulos-form">¿Tiene adeudos fiscales a cargo, por impuestos federales?</label>
			        <div class="form-container">
					  <div class="promoted-checkbox">
					    <input id="2" type="checkbox" class="promoted-input-checkbox" checked/>
					    <label for="2">
					      <svg><use xlink:href="#checkmark" /></svg>    
					    </label>
					  </div>
					</div><br>
			        <div style="font-size: 20px; margin-left:20px;">
			    		<input type="radio" class="common" name="autorizadaDeducible" value="Si" checked> Si
			        	<input type="radio" class="common" name="autorizadaDeducible" value="No"> No <br><br>	
			        </div>


			        <label class="common">F21, preferentemente 2018 o más reciente</label>
			        <input type="file" class="common" name="files[]" disabled>
			        <div class="form-container">
					  <div class="promoted-checkbox">
					    <input id="2" type="checkbox" class="promoted-input-checkbox" checked/>
					    <label for="2">
					      <svg><use xlink:href="#checkmark" /></svg>    
					    </label>
					  </div>
					</div><br>

			        <label class="common">Constancia de Situación Fiscal</label>
			        <input type="file" class="common" name="files[]" disabled>
			        <div class="form-container">
					  <div class="promoted-checkbox">
					    <input id="2" type="checkbox" class="promoted-input-checkbox" checked/>
					    <label for="2">
					      <svg><use xlink:href="#checkmark" /></svg>    
					    </label>
					  </div>
					</div><br>

			        <label class="common">Comprobante de cuenta bancaria</label>
			        <input type="file" class="common" name="files[]" disabled>
			        <div class="form-container">
					  <div class="promoted-checkbox">
					    <input id="2" type="checkbox" class="promoted-input-checkbox" checked/>
					    <label for="2">
					      <svg><use xlink:href="#checkmark" /></svg>    
					    </label>
					  </div>
					</div><br>

			        <label class="common">Factura cancelada</label>
			        <input type="file" class="common" name="files[]" disabled>
			        <div class="form-container">
					  <div class="promoted-checkbox">
					    <input id="2" type="checkbox" class="promoted-input-checkbox" checked/>
					    <label for="2">
					      <svg><use xlink:href="#checkmark" /></svg>    
					    </label>
					  </div>
					</div><br>

			        <label class="titulos-form">¿Está inscrita en el Directorio Nacional de Instituciones de Asistencia Social?</label>
			        <div class="form-container">
					  <div class="promoted-checkbox">
					    <input id="2" type="checkbox" class="promoted-input-checkbox" checked/>
					    <label for="2">
					      <svg><use xlink:href="#checkmark" /></svg>    
					    </label>
					  </div>
					</div><br>
			        <div style="font-size: 20px; margin-left:20px;">
			    		<input type="radio" class="common" name="autorizadaDeducible" value="Si" checked> Si
			        	<input type="radio" class="common" name="autorizadaDeducible" value="No"> No <br><br>	
			        </div>

			        <label class="common">DNIAS</label>
			        <input type="file" class="common" name="files[]" disabled>
			        <div class="form-container">
					  <div class="promoted-checkbox">
					    <input id="2" type="checkbox" class="promoted-input-checkbox" checked/>
					    <label for="2">
					      <svg><use xlink:href="#checkmark" /></svg>    
					    </label>
					  </div>
					</div><br>	
				
					<label class="common">Número de libro</label><br>
			        <input type="text" class="common" id="numeroLibro" name="numeroLibro"
			          placeholder="Número de libro:" disabled>
			          <div class="form-container">
					  <div class="promoted-checkbox">
					    <input id="2" type="checkbox" class="promoted-input-checkbox" checked/>
					    <label for="2">
					      <svg><use xlink:href="#checkmark" /></svg>    
					    </label>
					  </div>
					</div><br>

			        <label>Número de inscrpción</label>
			        <input type="text" class="common" id="numeroInscripcion" name="numeroInscripcion"
			          placeholder="Número de inscrpción:" disabled>
			          <div class="form-container">
					  <div class="promoted-checkbox">
					    <input id="2" type="checkbox" class="promoted-input-checkbox" checked/>
					    <label for="2">
					      <svg><use xlink:href="#checkmark" /></svg>    
					    </label>
					  </div>
					</div><br>

			        <label>Volúmen ICRESON</label>
			        <input type="text" class="common" id="volumenICRESON" name="volumenICRESON"
			          placeholder="Volúmen ICRESON:" disabled>
			          <div class="form-container">
					  <div class="promoted-checkbox">
					    <input id="2" type="checkbox" class="promoted-input-checkbox" checked/>
					    <label for="2">
					      <svg><use xlink:href="#checkmark" /></svg>    
					    </label>
					  </div>
					</div><br>

			        <label class="titulos-form">RPP ICRESON</label><br/>
			        <input type="file" class="common" name="files[]" disabled>
			        <div class="form-container">
					  <div class="promoted-checkbox">
					    <input id="2" type="checkbox" class="promoted-input-checkbox" checked/>
					    <label for="2">
					      <svg><use xlink:href="#checkmark" /></svg>    
					    </label>
					  </div>
					</div><br>

			        <label class="titulos-form">¿Su organización ha tenido modificaciones a su acta constitutiva?</label>
			        <div class="form-container">
					  <div class="promoted-checkbox">
					    <input id="2" type="checkbox" class="promoted-input-checkbox" checked/>
					    <label for="2">
					      <svg><use xlink:href="#checkmark" /></svg>    
					    </label>
					  </div>
					</div><br>
			        <div style="font-size: 20px; margin-left:20px;">
			    		<input type="radio" class="common" name="autorizadaDeducible" value="Si" checked> Si
			        	<input type="radio" class="common" name="autorizadaDeducible" value="No"> No <br><br>	
			        </div>

			        <label class="common">Fecha de la última modificación del acta constitutiva</label>
			        <div class="form-container">
					  <div class="promoted-checkbox">
					    <input id="2" type="checkbox" class="promoted-input-checkbox" checked/>
					    <label for="2">
					      <svg><use xlink:href="#checkmark" /></svg>    
					    </label>
					  </div>
					</div><br>
			        <input type="date" class="common" id="ultimaModi" name="ultimaModi" disabled><br><br>

			        <label>Número de acta constitutiva</label>
			        <input type="text" class="common" id="numeroActaConsti" name="numeroActaConsti"
			          placeholder="Número de acta constitutiva:" disabled>
			          <div class="form-container">
					  <div class="promoted-checkbox">
					    <input id="2" type="checkbox" class="promoted-input-checkbox" checked/>
					    <label for="2">
					      <svg><use xlink:href="#checkmark" /></svg>    
					    </label>
					  </div>
					</div><br>

			        <label>Volúmen de acta constitutiva</label>
			        <input type="text" class="common" id="volumenActaConsti" name="volumenActaConsti"
			          placeholder="Volúmen de acta constitutiva:" disabled>
			          <div class="form-container">
					  <div class="promoted-checkbox">
					    <input id="2" type="checkbox" class="promoted-input-checkbox" checked/>
					    <label for="2">
					      <svg><use xlink:href="#checkmark" /></svg>    
					    </label>
					  </div>
					</div><br>

			        <label class="common">Ultima acta modificatoria protocolizada</label><br/>
			        <input type="file" class="common" name="files[]" disabled>
			        <div class="form-container">
					  <div class="promoted-checkbox">
					    <input id="2" type="checkbox" class="promoted-input-checkbox" checked/>
					    <label for="2">
					      <svg><use xlink:href="#checkmark" /></svg>    
					    </label>
					  </div>
					</div><br>

			        <label class="common">RPP ICRESON de la última acta modificatoria actualizada</label><br/>
			        <input type="file" class="common" name="files[]" disabled>
			        <div class="form-container">
					  <div class="promoted-checkbox">
					    <input id="2" type="checkbox" class="promoted-input-checkbox" checked/>
					    <label for="2">
					      <svg><use xlink:href="#checkmark" /></svg>    
					    </label>
					  </div>
					</div><br>
				

				
			        <label class="common">Fecha de publicación en el Diario Oficial de la Federación</label>
			        <div class="form-container">
					  <div class="promoted-checkbox">
					    <input id="2" type="checkbox" class="promoted-input-checkbox" checked/>
					    <label for="2">
					      <svg><use xlink:href="#checkmark" /></svg>    
					    </label>
					  </div>
					</div><br>
			        <input type="date" class="common" id="fechaDiario" name="fechaDiario" disabled><br><br>

			        <label>Número de página</label>
			        <input type="text" class="common" id="numeroDiario" name="numeroDiario"
			          placeholder="Número de página del Diario Oficial de la Federación" disabled>
			          <div class="form-container">
					  <div class="promoted-checkbox">
					    <input id="2" type="checkbox" class="promoted-input-checkbox" checked/>
					    <label for="2">
					      <svg><use xlink:href="#checkmark" /></svg>    
					    </label>
					  </div>
					</div><br>

			        <label class="common">Página del DOF donde se publicó su autorización</label><br>
			        <input type="file" class="common" name="files[]" disabled>
			        <div class="form-container">
					  <div class="promoted-checkbox">
					    <input id="2" type="checkbox" class="promoted-input-checkbox" checked/>
					    <label for="2">
					      <svg><use xlink:href="#checkmark" /></svg>    
					    </label>
					  </div>
					</div><br>

			        <label class="common">¿El SAT ha detenido su autorización como donataria en algún momento?</label>
			        <div class="form-container">
					  <div class="promoted-checkbox">
					    <input id="2" type="checkbox" class="promoted-input-checkbox" checked/>
					    <label for="2">
					      <svg><use xlink:href="#checkmark" /></svg>    
					    </label>
					  </div>
					</div><br>
			        <div style="font-size: 20px; margin-left:20px;">
			    		<input type="radio" class="common" name="autorizadaDeducible" value="Si" checked> Si
			        	<input type="radio" class="common" name="autorizadaDeducible" value="No"> No <br><br>	
			        </div>

				    <label>Detuvo el SAT su autorización?</label>
			        <input type="text" class="common" id="razonDetenido" name="razonDetenido"
			          placeholder="¿Por qué detuvo el SAT su autorización?" disabled>
			          <div class="form-container">
					  <div class="promoted-checkbox">
					    <input id="2" type="checkbox" class="promoted-input-checkbox" checked/>
					    <label for="2">
					      <svg><use xlink:href="#checkmark" /></svg>    
					    </label>
					  </div>
					</div><br>

			        <label class="common">¿Desde que fecha está autorizada para recibir donativos deducibles de impuestos?</label><br>
			        <input type="date" class="common" id="fechaAutorizada" name="fechaAutorizada" disabled>
			        <div class="form-container">
					  <div class="promoted-checkbox">
					    <input id="2" type="checkbox" class="promoted-input-checkbox" checked/>
					    <label for="2">
					      <svg><use xlink:href="#checkmark" /></svg>    
					    </label>
					  </div>
					</div><br><br>
				

				

					<label class="common">Población que atiende la OSC</label><br>
			        <input type="text" class="common P6" id="poblacion_0_4" name="poblacion_0_4"
			          placeholder="0 a 4 años" disabled>
			          <div class="form-container">
					  <div class="promoted-checkbox">
					    <input id="2" type="checkbox" class="promoted-input-checkbox" checked/>
					    <label for="2">
					      <svg><use xlink:href="#checkmark" /></svg>    
					    </label>
					  </div>
					</div><br>

			        <label class="titulos-form">¿Ha manejado esquemas de recursos complementarios?</label>
			        <div class="form-container">
					  <div class="promoted-checkbox">
					    <input id="2" type="checkbox" class="promoted-input-checkbox" checked/>
					    <label for="2">
					      <svg><use xlink:href="#checkmark" /></svg>    
					    </label>
					  </div>
					</div><br>
			        <div style="font-size: 20px; margin-left:20px;">
			    		<input type="radio" class="common" name="autorizadaDeducible" value="Si" checked> Si
			        	<input type="radio" class="common" name="autorizadaDeducible" value="No"> No <br><br>	
			        </div>


				    <label>Con qué organización ha manejado recursos complementarios</label>
			        <input type="text" class="common" id="organizacionManejoRecursos" name="organizacionManejoRecursos"
			          placeholder="¿Con qué organización ha manejado recursos complementarios?" disabled>
			          <div class="form-container">
					  <div class="promoted-checkbox">
					    <input id="2" type="checkbox" class="promoted-input-checkbox" checked/>
					    <label for="2">
					      <svg><use xlink:href="#checkmark" /></svg>    
					    </label>
					  </div>
					</div><br>			

		</div>
		<button>Guardar</button>
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