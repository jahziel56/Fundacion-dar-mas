<?php
/* manda a llamar a header.php */ 
	require"classes/header.php";
?>
	<main>
<?php 
/*if (empty($_GET["Rol_Name"]) || empty($_GET["Rol_Descripcion"])){
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
}*/
?>

		<div>
		<form action="" method="post">
			<input type="hidden" name="Rol_Name" value="<?php echo $Rol_Name; ?>">
			<input type="hidden" name="Rol_Descripcion" value="<?php echo $Rol_Descripcion; ?>">

		<h1 style='background: MEDIUMSEAGREEN; color: white; text-align:center'>Revision Registro</h1>
		<p style='background: SEAGREEN; color: white; text-align:center;'>Organizacion: Instituto sonorense de la mujer</p><br>

  


			<?php 
			$I =0;
			//echo "$I <br>";

			$R = 'Respuesta';

			revisar('1.- Correo de organización',$R,$I++);
			revisar('2.- RFC',$R,$I++);
			revisar('3.- RFC (PDF o JPG)',$R,$I++);
			revisar('4.- CLUNI',$R,$I++);
			revisar('5.- CLUNI (PDF o JPG)',$R,$I++);
			revisar('6.- Nombre de la Organizaciones de Sociedad Civil',$R,$I++);
			revisar('7.- Objeto social de la organización',$R,$I++);
			revisar('8.- Misión',$R,$I++);
			revisar('9.- Visión',$R,$I++);
			revisar('10.- Áreas de atención',$R,$I++);
			revisar('11.- ¿En qué tema de Derecho Social se desarrolla principalmente su organización?',$R,$I++);
			revisar('12.- Calle',$R,$I++);			
			revisar('13.- Colonia',$R,$I++);

			revisar('14.- Codigo postal',$R,$I++);
			revisar('15.- Localidad',$R,$I++);
			revisar('16.- Domicilio',$R,$I++);
			revisar('17.- Municipio',$R,$I++);

			revisar('18 / 19 mapa (Desactivado)',$R,$I++);

			revisar('20.- Teléfono oficina',$R,$I++);
			revisar('21.- Teléfono celular',$R,$I++);
			revisar('22.- Correo de organización',$R,$I++);
			revisar('23.- Página web',$R,$I++);
			revisar('24.- Facebook',$R,$I++);
			revisar('25.- Twitter',$R,$I++);
			revisar('26.- Instagram',$R,$I++);

			revisar('27.- ¿Su domicilio social es el mismo que el legal?',$R,$I++);

			//27 R

			if ($R == 'No') {
				revisar('27a.- Domicilio Legal (registrado ante SAT)',$R,$I++);
				revisar('27b.- Localidad',$R,$I++);
				revisar('27c.- Municipio',$R,$I++);
			}
			

			revisar('28.- Acta constitutiva',$R,$I++);
			revisar('29.- Acta protocolizada donde conste la representación legal vigente',$R,$I++);
			revisar('30.- INE del representante legal vigente',$R,$I++);
			revisar('31.- Nombre del representante legal',$R,$I++);
			revisar('32.- Número de identificación oficial',$R,$I++);
			revisar('33.- Fecha de constitución de la Organización de Sociedad Civil',$R,$I++);
			revisar('34.- Nombre del Notario Público donde registró su Organización de Sociedad Civil',$R,$I++);
			revisar('35.- Número del notario público',$R,$I++);
			revisar('36.- Municipio de la Notaría Pública',$R,$I++);
			revisar('37.- Número de escritura pública',$R,$I++);
			revisar('38.- Volumen (escritura pública)',$R,$I++);
			revisar('39.- Fecha de estritura pública',$R,$I++);
			revisar('40.- RPP ICRESON',$R,$I++);
			revisar('41. Número de libro',$R,$I++);
			revisar('42.- Número de inscrpción',$R,$I++);
			revisar('43.- Volúmen ICRESON',$R,$I++);

			revisar('44.- ¿Su organización ha tenido modificaciones a su acta constitutiva?',$R,$I++);

			//44 R
			if ($R == 'Si') {
				revisar('44a.- Ultima acta modificatoria protocolizada',$R,$I++);
				revisar('44b.- Fecha de la última modificación del acta constitutiva',$R,$I++);
				revisar('44c.- RPP ICRESON de la última acta modificatoria actualizada',$R,$I++);
				revisar('44d.- Número de acta constitutiva',$R,$I++);
				revisar('44e.- Volúmen de acta constitutiva',$R,$I++);
			}		


			revisar('45.- ¿Está autorizada para recibir donativos deducibles de impuestos?',$R,$I++);

			// 45 R
			if ($R == 'Si') {
				revisar('45a.- Página del Diario Oficial de la Federación donde se publicó su autorización',$R,$I++);
				revisar('45b.- número de página donde se identifica a su Organizaciones de Sociedad Civil',$R,$I++);
				revisar('45c.- Fecha de publicación en el Diario Oficial de la Federación',$R,$I++);
				revisar('45d.- ¿El SAT ha detenido su autorización como donataria en algún momento?',$R,$I++);

				// 45D R
				if ($R == 'Si') {
					revisar('45e.- ¿Por qué detuvo el SAT su aturización?',$R,$I++);
				}

				revisar('45f.- ¿Desde que fecha está autorizada para recibir donativos deducibles de impuestos?',$R,$I++);				
			}



			revisar('46.- Su organización se rige o es dirigida por',$R,$I++);
			revisar('47.- Nombre del presidente',$R,$I++);
			revisar('48.- Número de empleados',$R,$I++);
			revisar('49.- Número de voluntarios',$R,$I++);
			revisar('50.- Principales logros',$R,$I++);
			revisar('51.- Metas de la organización',$R,$I++);
			revisar('52.- Alianzas con las que cuenta',$R,$I++);
			revisar('53.- Número de personas que benefició el año anterior',$R,$I++);

			$R = '|0 a 4: 2| 
			|5 a 14: 2|  
			|15 a 29: 2|  
			|30 a 44: 2|  
			|45 a 64: 2|  
			|65 o mas: 2|';
			revisar('54.- Numero de personas que veneficio en el úlitmo año',$R,$I++);

			$R = 'Respuesta';
			revisar('55.- ¿Tiene observaciones en su 32 D?',$R,$I++);
			revisar('56.- 32D en positivo y con 30 días de expedición como máximo',$R,$I++);
			revisar('57.- ¿Ha presentado en tiempo y forma la declaración por ejercicio, de impuestos federales?',$R,$I++);
			revisar('58.- ¿Tiene adeudos fiscales a cargo, por impuestos federales?',$R,$I++);
			revisar('59.- F21, del presente año',$R,$I++);
			revisar('60.- Constancia de Situación Fiscal',$R,$I++);
			revisar('61.- Comprobante de cuenta bancaria',$R,$I++);
			revisar('62.- Factura cancelada',$R,$I++);

			revisar('63.- ¿Está inscrita en el Directorio Nacional de Instituciones de Asistencia Social?',$R,$I++);

			//63 R
			if ($R == 'Si') {
				revisar('63a.- DNIAS',$R,$I++);
			}


			revisar('64.- ¿Ha manejado esquemas de recursos complementarios?',$R,$I++);		

			//64 R
			if ($R == 'Si') {	
				revisar('64a.- Con qué organización ha manejado recursos complementarios',$R,$I++);
			}




			function revisar($P,$R,$I){?>
			    
				<div class="inputGroup" style="margin-bottom: 0;">
					<input id="option<?php echo $I; ?>" name="option1" type="checkbox" class="comentario" onClick="quitarComentario(this.id)"/>
					<label for="option<?php echo $I; ?>"><?php echo $P; ?></label>
					<div class="explication">(Respuesta)</div>
					<p><?php echo $R; ?></p>
					<div id="divComment<?php echo $I; ?>" class="hide" >
					    <textarea class="text_area_low" placeholder="Comentario/Revisión"></textarea>
					</div>
				</div>
				<br>

			<?php  }	?>
					

			<button type="submit" class="common" name="">Enviar Revisión</button>		
	</form>
		</div>
	</main>

	<script>
		// var acc = document.getElementsByClassName("comentario");
		// var i;

		// for (i = 0; i < acc.length; i++) {
		//   acc[i].addEventListener("click", function() {
		//     this.classList.toggle("active");
		//     var panel = this.nextElementSibling;
		//     if (panel.style.display === "block") {
		//       panel.style.display = "none";
		//     } else {
		//       panel.style.display = "block";
		//     }
		//   });
		// }
		function quitarComentario(CheckID){
			console.log("El id que has recibido como parametro es: " + CheckID);

			var numero = CheckID.replace("option","");

			var idComentario = 'divComment' + numero;

			var checkbox = document.getElementById(CheckID);

			var comentario = document.getElementById(idComentario);

			if(checkbox.checked){
				comentario.classList.remove("hide");
			}else{
				comentario.classList.add("hide");
			}

		}
	</script>
