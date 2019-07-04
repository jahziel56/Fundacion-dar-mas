<?php
/* manda a llamar a header.php */ 
	require"classes/header.php";
?>

	<?php 
			if (isset($_GET['error'])) {
					if (($_GET['error']) == "emptyfields") {
						echo '<div class="error_box_login" id="error_box"><p>Error: LLenar ambos campos</p></div>';
					}
					else if (($_GET['error']) == "invalidmailuid") {
						echo '<p class"signuperror">Fill correctly mail and Username!</p>';					
					}
					else if (($_GET['error']) == "invalidmail") {
						echo '<p class"signuperror">Fill correctly mail!</p>';					
					}
					else if (($_GET['error']) == "invaliduid") {
						echo '<p class"error_box">Fill correctly Username!</p>';					
					}
					else if (($_GET['error']) == "passwordcheck") {
						echo '<p class"signuperror">Repet correctly the password!</p>';
					}
					else if (($_GET['error']) == "usertaken") {
						echo '<p class"signuperror">Username is already taken!</p>';
					}
				}				
	?>	
<!-- /* Pagina de registro */ -->
		<main>		
			<section class="login">	
			<h1>Login</h1>
			<?php 
				if (isset($_GET['error'])) {
					if (($_GET['error']) == "emptyfields") {
						echo '<p class"signuperror">Fill in all fields!</p>';
					}
					else if (($_GET['error']) == "invalidmailuid") {
						echo '<p class"signuperror">Fill correctly mail and Username!</p>';					
					}
					else if (($_GET['error']) == "invalidmail") {
						echo '<p class"signuperror">Fill correctly mail!</p>';					
					}
					else if (($_GET['error']) == "invaliduid") {
						echo '<p class"signuperror">Fill correctly Username!</p>';					
					}
					else if (($_GET['error']) == "passwordcheck") {
						echo '<p class"signuperror">Repet correctly the password!</p>';
					}
					else if (($_GET['error']) == "usertaken") {
						echo '<p class"signuperror">Username is already taken!</p>';
					}
				}
				if (isset($_GET['signup'])) {
					if (($_GET['signup']) == "success") {
						echo '<p class"signuperror">Se a creado la cuenta exitosamente!</p>';
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