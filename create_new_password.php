<?php
/* manda a llamar a header.php */ 
	require"classes/header.php";
?>

		<main>		
			<section class="login">	
			<h1>Cambiar La Contraseña</h1>
			
			<?php 
			$selector = $_GET["selector"];
			$validator = $_GET["validator"];

			if (empty($selector) || empty($validator)) {
				echo "Cambio de contraseña no valido.";
			}else{
				if (ctype_xdigit($selector) !== false && ctype_xdigit($validator) !== false) {
					?>

					<form action="includes/reset_password.inc.php" method="post">
						<input type="hidden" name="selector" value="<?php echo $selector; ?>">
						<input type="hidden" name="validator" value="<?php echo $validator; ?>">
						<input type="password" name="password" placeholder="Nueva contraseña">
						<input type="password" name="repeat_password" placeholder="Repita la nueva contraseña">

						<button class="Reset" type="submit" name="save_reset_password_submit">Guardar nueva contraseña</button>
					</form>

					<?php 
				}
			}
			?>
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