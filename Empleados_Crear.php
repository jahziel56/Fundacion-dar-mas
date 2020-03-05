<?php
/* manda a llamar a header.php */ 
	require"classes/header.php";
?>
<!-- /* Pagina de registro */ -->
	<main>
		<h1 style='background: #A04000; color: white; text-align:center'>Empleados</h1>
		<p style='background: #E67E22; color: white; text-align:center;'>Registros </p>
		
		<form action="includes/signup.inc.empleado.php" method="post" class="Signup" style="padding: 8px 12px">
			<input class="common" type="text" name="uid" placeholder="Nombre de usuario" required>
			<input class="common" type="email" name="mail" placeholder="Correo" required>
			<input class="common" type="password" name="pwd" placeholder="Contraseña" id="myInput" required>
			<input class="common" type="password" name="pwd-repeat" placeholder="Repita la Contraseña" id="myInput">
			<br><br>
            <input class="common" type="text" name="nombreEmpleado" placeholder="Nombre de empleado" required>
            <input class="common" type="text" name="apellidoEmpleado" placeholder="Apellido de empleado" required>
			<br>
			<button class="common" type="submit" name="signup-submit">Crear</button>
		</form>
	</main>

<?php  
/* manda a llamar a footer.php */ 
	require"footer.php";
?>