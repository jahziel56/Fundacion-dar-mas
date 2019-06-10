<?php
/* manda a llamar a header.php */ 
	require"header.php";
?>
<!-- /* Pagina de registro */ -->
	<main>
		<div class="signup">				
			<h1>Crear Cuenta</h1>
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
						echo '<p class"signuperror">Signup successful!</p>';
					}
				}

			?>			
				<form action="includes/signup.inc.php" method="post" class="Signup">
					<input class="common" type="text" name="uid" placeholder="Username" required>
					<input class="common" type="text" name="mail" placeholder="E-mail" required>
					<input class="common" type="password" name="pwd" placeholder="Password" id="myInput" required>
					<input class="common" type="password" name="pwd-repeat" placeholder="Repeat Password" id="myInput">			
					<button class="common" type="submit" name="signup-submit">Signup</button>
				</form>
		</div>
	</main>

<?php  
/* manda a llamar a footer.php */ 
	require"footer.php";
?>