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
				
					<div class="checkbox">
						<input id="checkbox_1" name="checker[]" type="checkbox" class="" value="1" checked/>
						<label for="checkbox_1">
						<div class="fake-label">
							<i class="fa fa-check"></i>
						</div>
							<p>1.- Correo de organización</p>
						</label>
					</div>
					<input type="text" class="common" name="" disabled value="Organizacion@Gmail.com"><br>
					<input type="button" style="border: 1px solid #ccc; font-size: 20px; width: 100%" 
					class="fa fa-input comentario" value="Hacer un comentario &#xf040">
					<div style="background: lightblue; padding-left: 10px;" class="hide">
						<textarea class="common"></textarea>
					</div>
					<br>

					<div class="inputGroup" style="margin-bottom: 0;">
						<input id="option1" name="option1" type="checkbox" class="comentario" onClick="quitarComentario(this.id)"/>
					    <label for="option1">11.- ¿En qué tema de Derecho Social se desarrolla principalmente su organización?</label>
					    <div class="explication">(Respuesta)</div>
					    <p>RESPUESTA, RESPONDIDO</p>
					    <div id="divComment1" class="hide">
					    	<textarea class="text_area_low" placeholder="Comentario/Revisión"></textarea>
					    </div>
					</div>
					<br>
					<div class="inputGroup" style="margin-bottom: 0;">
						<input id="option2" name="option1" type="checkbox" class="comentario" onClick="quitarComentario(this.id)"/>
					    <label for="option2">11.- ¿En qué tema de Derecho Social se desarrolla principalmente su organización?</label>
					    <div class="explication">(Respuesta)</div>
					    <p>RESPUESTA, RESPONDIDO</p>
					    <div id="divComment2" class="hide">
					    	<textarea class="text_area_low" placeholder="Comentario/Revisión"></textarea>
					    </div>
					</div>
					<br>
					<div class="inputGroup" style="margin-bottom: 0;">
						<input id="option3" name="option1" type="checkbox" class="comentario" onClick="quitarComentario(this.id)"/>
					    <label for="option3">11.- ¿En qué tema de Derecho Social se desarrolla principalmente su organización?</label>
					    <div class="explication">(Respuesta)</div>
					    <p>RESPUESTA, RESPONDIDO</p>
					    <div id="divComment3" class="hide">
					    	<textarea class="text_area_low" placeholder="Comentario/Revisión"></textarea>
					    </div>
					</div>
					<br>
					
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
			var idComentario = 'divComment' + CheckID.slice(-1);
			var checkbox = document.getElementById(CheckID);
			var comentario = document.getElementById(idComentario);
			checkbox.addEventListener('change', function(){
				if(checkbox.checked){
					comentario.classList.remove("hide");
				}else{
					comentario.classList.add("hide");
				}
			});
		}
		
		
		//element.classList.add("otherclass");
		

	</script>
