<?php
/* manda a llamar a header.php */ 
	require"classes/header.php";
?>

<!-- /* Pagina de registro */ -->
		<main>		
			<section class="login">	
			<h1>Olvidó su clave del panel de su organizacion?</h1>
			<p>Ingrese el RFC de su organizacion y se enviara la clave al correo de la organizacion	con la clave de acceso</p><br>
			<?php 
				if (isset($_GET['error'])) {
					if (($_GET['error']) == "novery") {
						echo '<p style="color: red;">Cuenta no verificada</p> Se envio un correo de verificacion<br>Este podria encontrarse en correos no deseados.';
					}
					else if (($_GET['error']) == "invalidmailuid") {
						echo '<p> class"signuperror">Fill correctly mail and Username!</p>';					
					}
				}
				if (isset($_GET['reset'])) {
					if (($_GET['reset']) == "success") {
						echo '<p class"signuperror">Se a enviado los pasos a seguir a su correo</p><p class"signuperror">(El correo podria estar en la badeja de correos no deseados)</p>';
					}
				}

			?>	
			
				<form action="includes/reset_request_OSC.inc.php" method="post" class="">
					<input class="common" type="text" name="RFC" placeholder="RFC" required>
					<button class="Reset" type="submit" name="reset_password_submit">Enviar Clave</button>
				</form>

			</section>

		</main>	

<?php  
/* manda a llamar a footer.php */ 
	require"footer.php";
?>