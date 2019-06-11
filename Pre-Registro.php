<?php
/* manda a llamar a header.php */ 
	require"header.php";
?>
<!-- /* Pagina de registro */ -->
	<main>
		<div class="signup">				
			<h1>Pre-Registro de la empresa</h1>
			<h5>Para la proxima convocatoria</h5>
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
					else if (($_GET['error']) == "Telefononum") {
						echo '<p class"signuperror">Favor de colocar numeros en el campo telefono</p>';
					}
					else if (($_GET['error']) == "alreadycreated") {
						echo '<p class"signuperror">Ya existe su pagina de usuario</p>';
					}
				}
				if (isset($_GET['signup'])) {
					if (($_GET['signup']) == "success") {
						echo '<p class"signuperror">Perfil creado</p>';
					}
				}

			?>			
				<form action="includes/personal.inc.php" method="post" class="Signup">
					<input class="common" type="text" name="Nombre" placeholder="Nombre" required>
					<input class="common" type="text" name="ApellidoP" placeholder="Apellido Paterno" required>
					<input class="common" type="text" name="ApellidoM" placeholder="Apellido Materno" required>				
					<input class="common" type="text" name="Telefono" placeholder="Telefono" required>
					<button class="common" type="submit" name="personal-submit">Signup</button>
				</form>
		</div>
	</main>

<?php  
/* manda a llamar a footer.php */ 
	require"footer.php";
?>