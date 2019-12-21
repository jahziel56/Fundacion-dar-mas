<?php 
if (isset($_POST['OSC_acces-submit'])) {
	require 'dbh.inc.php';
	session_start();

	$RFC = $_POST['RFC'];
	$Clave = $_POST['Clave'];

	if (empty($RFC) || empty($Clave)) {
		header("Location: ../OSC_acces.php?error=emptyfields");
		//exit();	
	}
	else{
		$sql = "SELECT * FROM registro WHERE RFC_Organizacional=?;";
		$stmt = mysqli_stmt_init($conn);
		if (!mysqli_stmt_prepare($stmt, $sql)) {
			header("Location: ../OSC_acces.php?error=sqlerror");
			//exit();		
		}else{
			mysqli_stmt_bind_param($stmt, "s", $RFC);
			mysqli_stmt_execute($stmt);
			$result = mysqli_stmt_get_result($stmt);
			if ($row = mysqli_fetch_assoc($result)) {
				


				if ($Clave == $row['Clave']) {
					$_SESSION['ID_OSC'] = $row['ID_Registro'];
					header("Location: ../OSC_panel.php");

				}else{
					header("Location: ../OSC_acces.php?error=clave_incorrecta");
					exit();
				}

			}else{
				header("Location: ../OSC_acces.php?error=rfc_incorrecta");
				//exit();	
			}
		}
	}



}else{
	header("Location: ../OSC_acces.php");
	exit();		
}