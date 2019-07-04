<?php
/* manda a llamar a header.php */ 
	require"classes/header.php";
?>

<!-- /* Pagina de registro */ -->
		<main>		
			<section class="login">	
			<h1>Cambiar La Contraseña</h1>
			
				<form action="includes/login.inc.php" method="post" class="login">
					<input class="common" type="text" name="New_reset_password" placeholder="Nueva contraseña" required>
					<input class="common" type="text" name="Repit_reset_password" placeholder="Repita Nueva contraseña" required>
					<button class="Reset" type="submit" name="save_reset_password_submit">Guardar nueva contraseña</button>
				</form>

			</section>

		</main>	

<?php  
/* manda a llamar a footer.php */ 
	require"footer.php";
?>