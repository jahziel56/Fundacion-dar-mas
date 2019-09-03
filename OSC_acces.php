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
	<h1 style='background: DARKGOLDENROD; color: white; text-align:center'>Acceder al registro institucional</h1>
	<p style='background: TAN; color: white; text-align:center;'>bla bla bla</p><br>

	<form action="includes/login.inc.php" method="post" class="login">
		<input class="common" type="text" name="" placeholder="RFC Institucional" required>
		<input class="common" type="password" name="" placeholder="Clave" required>
		<button class="common" type="submit" name="">Acceder</button>		
		<a href="reset_password.php" class="Link_Nonstyle">Olvido la Clave de su organisacion?</a>
	</form>
</main>



<?php
/* manda a llamar a footer.php */ 
	require"footer.php";

/* el   header.php / index.php / footer.php   son en esencia una sola pagina php, se hace de esta forma para reutilizar codigo de forma facil y rapida */
?>

