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
		?>
	
	<main>			
		<label>Roles</label><br><br>
		<button class="P_B Btn_C_B float-left"><a href='Campos_Rol_Lista.php'><i class='fa fa-eye fa-2x'></i><br> Ver</a></button>
		<button class="P_B Btn_C_G float-left"><a href='Campos_Rol_Nombre.php'><i class='fa fa-plus-circle fa-2x'></i><br>Crear</a></button>
		<button class="P_B Btn_C_Y float-left"><a href='Campos_Rol.php'><i class='fa fa-pencil fa-2x'></i><br>Modificar</a></button>
		<button class="P_B Btn_C_R float-left" style="border-radius: 0px 4px 4px 0px;"><a href='Campos_Rol_Lista_Eliminar.php'><i class='fa fa-trash fa-2x'></i><br>Eliminar</a></button>
		<br><br><br>
		<button class="P_B">Primary</button></br><br>
		<a href='creacion_empleados.php'>Crear empleado</a><br><br>
		<a href='asignar_registro.php'>Asignar pre-registro a empleado</a><br><br>

		<button id="myBtn">Open Modal</button>


		<div>
			<select name="Correos_1" class="float-right correo" style="padding: 11px 20px; border-radius: 0 8px 8px 0;">
			  <option value="">Hotmail.com</option>
			  <option value="">Gmail.com</option>
			  <option value="">Outlook.com</option>
			</select>
			<input type="text" name="correo" value="@" style="width: 14px;" class="float-right correo" disabled>
			<input type="text" name="correo" class="float-right correo" style="border-radius: 8px 0 0 8px; ">
		</div>
		
		<div class="conten-alignt-center">										
		<br><br><br><br><br><br><br><br>
		</div>


		<div id="myModal" class="modal">

  <!-- Modal content -->
  <div class="modal-content">
    <div class="modal-header">
      <span class="close">&times;</span>
      <h2>Modal Header</h2>
    </div>
    <div class="modal-body">
      <p>Some text in the Modal Body</p>
      <p>Some other text...</p>
    </div>
    <div class="modal-footer">
      <h3>Modal Footer</h3>
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
btn.onclick = function() {
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


<?php
/* manda a llamar a footer.php */ 
	require"footer.php";

/* el   header.php / index.php / footer.php   son en esencia una sola pagina php, se hace de esta forma para reutilizar codigo de forma facil y rapida */
?>

