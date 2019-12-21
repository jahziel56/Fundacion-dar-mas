<?php
/* manda a llamar a header.php */ 
	require"classes/header.php";

	if (!isset($_SESSION['ID_OSC'])) {
		header("Location: OSC_acces.php");
	}

?>
	
	
			<?php 
			if (isset($_GET['error'])) {
			echo "<main>";	
				if (($_GET['error']) == "clave_incorrecta") {
					echo '<p style="color: red;">Error la clave no coincide</p>';
				}
				else if (($_GET['error']) == "rfc_incorrecta") {
					echo '<p style="color: red;">Error el rfc no coincide</p>';
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
	<h1 style='background: DARKGOLDENROD; color: white; text-align:center'>Acceder al registro institucional</h1>
	<p style='background: TAN; color: white; text-align:center;'>panel de informacion sobre su organisacion</p><br>

	<div style="display: flex;">		

		<div style="width: 62%; margin: 10px;">
			<h3>Informacion institucional</h3>
			<h5>Nombre institucion</h5>
			<hr>
		</div>


		<div style="width: 35%; background: lightgray; font-size: 16;" class="Bar_Panel_Info" >
			<a href="Notificaciones.php"><button class="Ga Go div_100 Btn_C_B"><span>Notificaciones</span></button></a>
			<form action="Pre_Registro_New_Ver.php" method="post">
				<button class="Ga Go div_100 Btn_C_B" name="Registro" value="<?php echo $_SESSION['ID_OSC']; ?>"><span>Informacion Registro</span></button>
			</form>
			<a href="#"><button class="Ga Go div_100 Btn_C_B"><span>Informacion Convocatorias</span></button></a>
		</div>
	</div>
</main>




<?php
/* manda a llamar a footer.php */ 
	require"footer.php";
/* el   header.php / index.php / footer.php   son en esencia una sola pagina php, se hace de esta forma para reutilizar codigo de forma facil y rapida */
?>

