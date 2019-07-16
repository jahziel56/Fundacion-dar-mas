<?php
/* manda a llamar a header.php */ 
	require"classes/header.php";
?>

		<main>		
			<section class="login">	
			<h1>Cambiar La Contraseña</h1>
			
			<?php 
			if (empty($_GET["selector"]) || empty($_GET["validator"])) {
				echo "<br><br><h3>Cambio de contraseña no valido.</h3><br><br>";
			}else{
				$selector = $_GET["selector"];
				$validator = $_GET["validator"];
				if (ctype_xdigit($selector) !== false && ctype_xdigit($validator) !== false) {
					?>

					<form action="includes/reset_password.inc.php" method="post">
						<input type="hidden" name="selector" value="<?php echo $selector; ?>">
						<input type="hidden" name="validator" value="<?php echo $validator; ?>">
						<input class="common" type="password" name="password" placeholder="Nueva contraseña">
						<input class="common" type="password" name="repeat_password" placeholder="Repita la nueva contraseña">

						<button class="Reset" type="submit" name="save_reset_password_submit">Guardar nueva contraseña</button>
					</form>

					<?php 
				}else{
					echo "<br><br><h3>Cambio de contraseña no valido.</h3><br><br>";	
				}
			}
			?>
			</section>

		</main>	

<?php  
/* manda a llamar a footer.php */ 
	require"footer.php";
?>