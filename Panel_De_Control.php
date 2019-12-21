<?php
/* manda a llamar a header.php */ 
	require"classes/header.php";
?>
	
	
			<?php 
			if (isset($_GET['error'])) {
			echo "<main>";	
				if (($_GET['error']) == "novery") {
				echo '<p style="color: red;">Cuenta no verificada</p> Se envio un correo de verificacion<br>Este podria encontrarse en correos no deseados.';
				}
				else if (($_GET['error']) == "invalidmailuid") {
					echo '<p class"signuperror">LLene Correctamente el correo y El nombre de usuario!</p>';					
				}
			echo "</main>";
			}
			if (isset($_GET['rol'])) {
			echo "<main>";
				if (($_GET['rol']) == "success") {
					echo '<p class"signuperror">Se a creado el rol exitosamente</p>';
				}
				else if (($_GET['rol']) == "error") {
					echo '<p class"signuperror">A habido un error</p>';					
				}
				else if (($_GET['rol']) == "alreadycreated") {
					echo '<p class"signuperror">El nombre de dicho rol ya existe</p>';					
				}
				else if (($_GET['rol']) == "no_rol") {
					echo '<p class"signuperror">El rol selecionado ya no existe</p>';					
				}
				else if (($_GET['rol']) == "delete") {
					echo '<p class"signuperror">El rol se a eliminado</p>';					
				}
				echo "</main>";
			}
			if (isset($_GET['signup'])) {
			echo "<main>";
				if (($_GET['signup']) == "success") {
					echo '<p class"signuperror">Se a creado el empleado exitosamente</p>';
				}
			echo "</main>";
			}
		?>
	
	
		<main>
		<label>Empleado</label><br><br>
		<button class="P_B Btn_C_B float-left"><a href='Empleado_Lista.php'><i class='fa fa-eye fa-2x'></i><br> Ver</a></button>
		<button class="P_B Btn_C_G float-left"><a href='Empleados_Crear.php'><i class='fa fa-plus-circle fa-2x'></i><br>Crear</a></button>
		<button class="P_B Btn_C_Y float-left"><a href='Empleado_Modificar_Lista.php'><i class='fa fa-pencil fa-2x'></i><br>Modificar</a></button>
		<button class="P_B Btn_C_R float-left" style="border-radius: 0px 4px 4px 0px;"><a href='Campos_Rol_Lista_Eliminar.php'><i class='fa fa-trash fa-2x'></i><br>Eliminar</a></button>
		<br><br><br>
		</main>

		<main>
		<label>Roles</label><br><br>
		<button class="P_B Btn_C_B float-left"><a href='Campos_Rol_Lista.php'><i class='fa fa-eye fa-2x'></i><br> Ver</a></button>
		<button class="P_B Btn_C_G float-left"><a href='Campos_Rol_Nombre.php'><i class='fa fa-plus-circle fa-2x'></i><br>Crear</a></button>
		<button class="P_B Btn_C_Y float-left"><a href='Campos_Rol_Modificar_Lista.php'><i class='fa fa-pencil fa-2x'></i><br>Modificar</a></button>
		<button class="P_B Btn_C_R float-left" style="border-radius: 0px 4px 4px 0px;"><a href='Campos_Rol_Lista_Eliminar.php'><i class='fa fa-trash fa-2x'></i><br>Eliminar</a></button>
		<br><br><br>
		</main>

		<main>
		<label>Asignar</label><br><br>
		<button class="P_B Btn_C_B float-left"><a href='Asignar_Lista.php'><i class='fa fa-eye fa-2x'></i><br> Ver</a></button>
		<button class="P_B Btn_C_G float-left"><a href='asignar_registro.php'><i class='fa fa-plus-circle fa-2x'></i><br>Crear</a></button>
		<button class="P_B Btn_C_Y float-left"><a href='Campos_Rol.php'><i class='fa fa-pencil fa-2x'></i><br>Modificar</a></button>
		<button class="P_B Btn_C_R float-left" style="border-radius: 0px 4px 4px 0px;"><a href='Campos_Rol_Lista_Eliminar.php'><i class='fa fa-trash fa-2x'></i><br>Eliminar</a></button>
		<br><br><br>
		</main>

		<main>
		<label>Archivos</label><br><br>
		<a href='Archivos_Archivos.php'class="A_P_B">Ver Archivos</a>
		<a href='Panel_Informacion.php'class="A_P_B">Panel de Informacion</a>
		<hr>

<div id="myModal" class="modal">
  <!-- Modal content -->
  <div class="modal-content">
    <div class="modal-header">
      <span class="close">&times;</span>
      <h2>Ayuda</h2>
    </div>
    <div class="modal-body">
      <p>Por favor llene todos los campos</p><br><hr>
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
	</main>


	<script>
		
// Get the modal
var modal = document.getElementById("myModal");

// Get the button that opens the modal
var btn = document.getElementById("myBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal
/*btn.onclick = function() {
  modal.style.display = "block";
}
<button id="myBtn">Open Modal</button>
*/
// Onload
/*window.onload = function() {
  modal.style.display = "block";
}*/

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


<?php
/* manda a llamar a footer.php */ 
	require"footer.php";

/* el   header.php / index.php / footer.php   son en esencia una sola pagina php, se hace de esta forma para reutilizar codigo de forma facil y rapida */
?>

