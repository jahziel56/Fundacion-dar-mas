<?php
/* manda a llamar a header.php */ 
	require"classes/header.php";
	require 'includes/dbh.inc.php';
	require 'no_login.php';

	if (!isset($_SESSION['ID_OSC'])) {
		header("Location: OSC_acces.php");
	}

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

	$sql = "SELECT * FROM datos_generales WHERE FK_Registro=?;";
	$stmt = mysqli_stmt_init($conn);
	if (!mysqli_stmt_prepare($stmt, $sql)) {
		echo 'Error: SQL Conection.';
		exit();		
	}else{
		mysqli_stmt_bind_param($stmt, "i", $_SESSION['ID_OSC']);
		mysqli_stmt_execute($stmt);
		$result = mysqli_stmt_get_result($stmt);
		$row = mysqli_fetch_assoc($result);		
	}

	$sql = "SELECT * FROM registro WHERE ID_Registro=?;";
	$stmt = mysqli_stmt_init($conn);
	if (!mysqli_stmt_prepare($stmt, $sql)) {
		echo 'Error: SQL Conection.';
		exit();		
	}else{
		mysqli_stmt_bind_param($stmt, "i", $_SESSION['ID_OSC']);
		mysqli_stmt_execute($stmt);
		$result = mysqli_stmt_get_result($stmt);
		$row2 = mysqli_fetch_assoc($result);		
	}

	$sql = "SELECT COUNT(ID_Notificacion) FROM notificaciones WHERE FK_Registro=? and Vista = 'no';";
	$stmt = mysqli_stmt_init($conn);
	if (!mysqli_stmt_prepare($stmt, $sql)) {
		echo 'Error: SQL Conection.';
		exit();		
	}else{
		mysqli_stmt_bind_param($stmt, "i", $_SESSION['ID_OSC']);
		mysqli_stmt_execute($stmt);
		$result = mysqli_stmt_get_result($stmt);
		$notificaciones = mysqli_fetch_assoc($result);

		$Count_N = "(".$notificaciones['COUNT(ID_Notificacion)'].")";

	}

?>
<main>
	<h1 style='background: DARKGOLDENROD; color: white; text-align:center'>Panel institucional</h1>
	<p style='background: TAN; color: white; text-align:center;'>panel de informacion sobre su organisacion</p><br>
	
	<div style="display: flex; margin-bottom: 6px; padding:2px">

		<div class="Informacion" style="width:100%;">
			<div style="width: 62%; float: left; height: 100%; ">
				<div style="background: PERU; color: white; padding: 7px ; border-radius: 6px 6px 0px 0px;">
				<h3 style="text-align: center;" >Informacion institucional</h3>
				<hr>
					<div style="display: flex;">
						<div style="margin: 8px; padding:7px;  width: 48%">
							<h5>Nombre Organizaciónal</h5>
							<h5>Correo Organizaciónal</h5>
							<h5>RFC Organizaciónal</h5>
						</div>
						<label style="border-right: 1px solid white;"></label>
						<div style="margin: 8px 8px 8px 8px; padding:7px;">
							<h5><?php echo $row['nombreOSC'];  ?></h5>
							<h5><?php echo $row['Correo_Organizacion']; ?></h5>
							<h5><?php echo $row2['RFC_Organizacional']; ?></h5>
						</div>
					</div>
				</div>

				<div style="background: SIENNA; color: white; padding:7px ; border-radius: 0px 0px 6px 6px ;">
					<h3 style="text-align: center;" >Estado De registro</h3>
					<hr>
					<div style="display: flex;">
						<div style="margin: 8px; padding:7px;  width: 48%">
							<h5>Estado </h5>
							<h5>Fecha de Registro</h5>
							<h5>RFC Organizaciónal</h5>
						</div>
						<label style="border-right: 1px solid white;"></label>
						<div style="margin: 8px 8px 8px 8px; padding:7px;">
							<h5><?php echo $row2['Estado'];  ?></h5>
							<h5><?php echo $row2['Fecha_Registro']; ?></h5>
							<h5><?php echo $row2['RFC_Organizacional']; ?></h5>
						</div>
					</div>
				</div>
			</div>
		

		<div class="Bar_Panel_Info" style="float: right;">

				<a href="Notificaciones.php"><button class="Ga Go div_100 Btn_C_B "><span>Notificaciones <?php echo $Count_N; ?></span></button></a>
				<form action="Pre_Registro_New_Ver.php" method="post">
					<button class="Ga Go div_100 Btn_C_B" name="Registro" value="<?php echo $_SESSION['ID_OSC']; ?>"><span>Informacion Registro</span></button>
				</form>
				<a href="#"><button class="Ga Go div_100 Btn_C_B"><span>Informacion Convocatorias</span></button></a>
			
		</div>

	</div>
	</div>
</main>




<?php
/* manda a llamar a footer.php */ 
	require"footer.php";
/* el   header.php / index.php / footer.php   son en esencia una sola pagina php, se hace de esta forma para reutilizar codigo de forma facil y rapida */
?>

