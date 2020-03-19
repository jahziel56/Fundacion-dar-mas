<?php
/* manda a llamar a header.php */ 
	require"classes/header.php";
?>
<!-- /* Pagina de registro */ -->
	<main>
		<h1 style='background: #A04000; color: white; text-align:center'>Empleados</h1>
		<p style='background: #E67E22; color: white; text-align:center;'>Registros </p>


			<?php 
				if (isset($_GET['error'])) {
					echo "<div style='text-align: center;' >";
					if (($_GET['error']) == "emptyfields") {
						echo '<p class"signuperror">LLene todos los campos!</p>';
					}
					else if (($_GET['error']) == "invalidmailuid") {
						echo '<p class"signuperror">LLene Correctamente el correo y El nombre de usuario!</p>';					
					}
					else if (($_GET['error']) == "invalidmail") {
						echo '<p class"signuperror">LLene Correctamente el correo!</p>';					
					}
					else if (($_GET['error']) == "invaliduid") {
						echo '<p class"signuperror">LLene Correctamente El nombre de usuario!</p>';					
					}
					else if (($_GET['error']) == "passwordcheck") {
						echo '<p class"signuperror">Repita Correctamente La contraseña!</p>';
					}
					else if (($_GET['error']) == "usertaken") {
						echo '<p class"signuperror">El nombre de usuario ya existe!</p>';
					}
					else if (($_GET['error']) == "usermail") {
						echo '<p class"signuperror">Ya existe una cuenta con ese correo</p>';
					}
				}
				echo "</div>";
				if (isset($_GET['signup'])) {
					if (($_GET['signup']) == "success") {
						echo '<p class"signuperror">Se a enviado una confirmacion a su correo!</p>';
					}
				}

			?>	


		
		<form action="includes/signup_Empleado.inc.php" method="post" class="Signup" style="padding: 8px 12px">
			<input class="common" type="text" name="uid" placeholder="Nombre de usuario" required>
			<input class="common" type="email" name="mail" placeholder="Correo" required>
			<input class="common" type="password" name="pwd" placeholder="Contraseña" id="myInput" required>
			<input class="common" type="password" name="pwd-repeat" placeholder="Repita la Contraseña" id="myInput">
			<br><br>
            <input class="common" type="text" name="nombreEmpleado" placeholder="Nombre de empleado" required>
            <input class="common" type="text" name="apellidoEmpleado" placeholder="Apellido de empleado" required>
			<br>
			<button class="common" type="submit" name="Empleados_Crear_submit">Crear</button>
		</form>
	</main>

<?php  
/* manda a llamar a footer.php */ 
	require"footer.php";
?>