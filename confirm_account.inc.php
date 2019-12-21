<?php

if (empty($_GET["selector"]) || empty($_GET["validator"])){
	header("Location: ../login.php?error=confirmaccount");
	exit();
}else{
	$selector = $_GET["selector"];
	$validator = $_GET["validator"];

	require 'dbh.inc.php';

	$sql = "SELECT * FROM confirmar_cuenta WHERE Selector=?";
	$stmt = mysqli_stmt_init($conn);
	if (!mysqli_stmt_prepare($stmt, $sql)) {
		echo "error";
		exit();
	}else{
		mysqli_stmt_bind_param($stmt, "s", $selector);
		mysqli_stmt_execute($stmt);

		$result = mysqli_stmt_get_result($stmt);
		if (!$row = mysqli_fetch_assoc($result)) {
			header("Location: ../login.php?error=confirmaccount");
			exit();		
		}else{

			$tokenBin = hex2bin($validator);
			$tokenCheck = password_verify($tokenBin, $row["Token"]);

			if ($tokenCheck === false) {
				header("Location: ../login.php?error=confirmaccount");
				exit();	
			}elseif ($tokenCheck === true) {			
				$sql = "DELETE FROM confirmar_cuenta WHERE Selector=?";
				$stmt = mysqli_stmt_init($conn);
				if (!mysqli_stmt_prepare($stmt, $sql)) {
					echo "error";
					exit();
				}else{
					mysqli_stmt_bind_param($stmt, "s", $selector);
					mysqli_stmt_execute($stmt);

					header("Location: ../login.php?signup=success");
					exit();						
				}
			}
		}
	}
}


