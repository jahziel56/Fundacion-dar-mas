<?php
/* manda a llamar a header.php */ 
	require"header.php";
?>
	
	<?php 
			if (isset($_GET['error'])) {
					if (($_GET['error']) == "emptyfields") {
						echo '<div class="error_box" id="error_box"><p>Error: LLenar ambos campos</p></div>';
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
			
	?>	


	<main>
		<div class="conten-alignt-center">
		<?php
		if (isset($_GET['signup'])) {
			if (($_GET['signup']) == "success") {
				//echo '<p class"signuperror">Perfil creado</p>';
			}
		}	
		if (isset($_SESSION['user_Id'])) {
			//echo '<p> You are logged in</p>';
			//echo $_SESSION['user_Username'];
		}
		else{
			//echo '<p> You are logged out!</p>';
		}  
		?>
										
		<br><br><br><br><br><br><br><br>
		<br><br><br><br><br><br><br><br>
		<br><br><br><br><br><br><br><br>
		<br><br><br><br><br><br><br><br>
		<br><br><br><br><br><br><br><br>
		</div>
	</main>


<?php
/* manda a llamar a footer.php */ 
	require"footer.php";

/* el   header.php / index.php / footer.php   son en esencia una sola pagina php, se hace de esta forma para reutilizar codigo de forma facil y rapida */
?>