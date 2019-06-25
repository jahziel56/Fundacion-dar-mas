<?php
/* manda a llamar a header.php */ 
	require"header.php";
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