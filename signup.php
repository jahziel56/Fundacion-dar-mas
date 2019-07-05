<?php
/* manda a llamar a header.php */ 
	require"classes/header.php";
?>
<!-- /* Pagina de registro */ -->
	<main>
		<div class="signup">				
			<h1>Crear Cuenta</h1>
			<?php 
				if (isset($_GET['error'])) {
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
				if (isset($_GET['signup'])) {
					if (($_GET['signup']) == "success") {
						echo '<p class"signuperror">Signup successful!</p>';
					}
				}

			?>			
				<form action="includes/signup.inc.php" method="post" class="Signup">
					<input class="common" type="text" name="uid" placeholder="Nombre de usuario" required>
					<input class="common" type="email" name="mail" placeholder="Correo Institucional" required>
					<input class="common" type="password" name="pwd" placeholder="Contraseña" id="myInput" required>
					<input class="common" type="password" name="pwd-repeat" placeholder="Repita la Contraseña" id="myInput">			
					<button class="common" type="submit" name="signup-submit">Signup</button>
				</form>
		</div>
	</main>

<?php  
/* manda a llamar a footer.php */ 
	require"footer.php";
?>