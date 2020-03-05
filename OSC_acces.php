<?php
/* manda a llamar a header.php */ 
	require"classes/header.php";

	if (!isset ($_SESSION['user_Id'])) {
		header("Location: login.php?error=nouser");
	}else if (isset ($_SESSION['ID_OSC'])) {
		header("Location: OSC_panel.php");
	}else{

	if ($_SESSION['Type_User'] != 1) {
		header("Location: index.php");
	}	

			if (isset($_GET['error'])) {
			echo "<main>";	
				if (($_GET['error']) == "clave_incorrecta") {
					echo '<p style="color: red;">Error la clave no coincide</p>';
				}
				else if (($_GET['error']) == "rfc_incorrecta") {
					echo '<p style="color: red;">Error el rfc no coincide</p>';
				}
				else if (($_GET['error']) == "no_osc") {
					echo '<p style="color: red;">No a ingresado correctamente al panel de organisacion</p>';
				}
			echo "</main>";
			}
			if (isset($_GET['access'])) {
			echo "<main>";
				if (($_GET['access']) == "success") {
					echo '<p class"signuperror">Se a ingresado exitosamente</p>';
				}
			echo "</main>";
			}
		?>
	
	
<main>
	<h1 style='background: DARKGOLDENROD; color: white; text-align:center'>Acceder al panel institucional</h1>
	<p style='background: TAN; color: white; text-align:center;'>panel de informacion sobre su organisacion</p><br>

	<form action="includes/OSC_acces.inc.php" method="post" class="login">
		<input class="common" type="text" name="RFC" placeholder="RFC Institucional" required>
		<input class="common" type="password" name="Clave" placeholder="Clave" required>
		<button class="common" type="submit" name="OSC_acces-submit">Acceder</button>		
		<a style="text-decoration:;" href="" class="Link_Nonstyle">Olvido la Clave de su organisacion?</a>
	</form>
</main>



<?php
}
/* manda a llamar a footer.php */ 
	require"footer.php";

/* el   header.php / index.php / footer.php   son en esencia una sola pagina php, se hace de esta forma para reutilizar codigo de forma facil y rapida */
?>

