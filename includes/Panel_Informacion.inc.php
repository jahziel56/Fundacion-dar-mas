<?php 
	require 'dbh.inc.php';

	$sql = "SELECT * FROM registro inner join datos_generales on registro.ID_Registro = datos_generales.FK_Registro"; //WHERE registro.Estado = ?
	$stmt = mysqli_stmt_init($conn);
	if (!mysqli_stmt_prepare($stmt, $sql)) {
		//header("Location: ../login.php?error=sqlerror");
		echo 'error';
		exit();		
	}else{
		mysqli_stmt_execute($stmt);
		$result = mysqli_stmt_get_result($stmt);

		while ($row = mysqli_fetch_assoc($result)) {
			echo "<pre>";
			//print_r($row);
			echo "</pre>";
		}		
	}
