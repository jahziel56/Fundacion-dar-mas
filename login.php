<?php
/* manda a llamar a header.php */ 
	require"classes/header.php";
?>

		<main>		
			<section class="login">	
			<h1>Login</h1>
			<?php 
				if (isset($_GET['error'])) {
					if (($_GET['error']) == "novery") {
						echo '<p style="color: red;">Cuenta no verificada</p> Se envio un correo de verificacion<br>Este podria encontrarse en correos no deseados.';
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
				if (isset($_GET['signup'])) {
					if (($_GET['signup']) == "success") {
						echo '<p class"signuperror">Se a creado la cuenta exitosamente!</p>';
					}
				}
				if (isset($_GET['reset'])) {
					if (($_GET['reset']) == "success") {
						echo '<p class"signuperror">Se a cambiado la contraseña exitosamente!</p>';
					}
				}

			?>			
				<form action="includes/login.inc.php" method="post" class="login">
					<input class="common" type="text" name="mailuid" placeholder="Nombre de usuario" required>
					<input class="common" type="password" name="pwd" placeholder="Contraseña" id="myInput" required>
					<button class="common" type="submit" name="login-submit">Login</button>
				</form>

					<a href="reset_password.php" class="Link_Nonstyle">Olvidaste tu Contraseña?</a>

			</section>

		</main>	

<?php  
/* manda a llamar a footer.php */ 
	require"footer.php";
?>