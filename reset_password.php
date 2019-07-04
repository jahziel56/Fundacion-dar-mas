<?php
/* manda a llamar a header.php */ 
	require"classes/header.php";
?>

<!-- /* Pagina de registro */ -->
		<main>		
			<section class="login">	
			<h1>Recuperar Contraseña</h1>

			<p>se enviar un correo con instrucciones para recuperar su contraseña</p><br>
			
				<form action="includes/login.inc.php" method="post" class="login">
					<input class="common" type="text" name="mail_reset_password" placeholder="Correo" required>
					<button class="Reset" type="submit" name="reset_password_submit">Enviar Instruciones</button>
				</form>

			</section>

		</main>	

<?php  
/* manda a llamar a footer.php */ 
	require"footer.php";
?>