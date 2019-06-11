<?php 
if (isset($_POST['personal-submit'])) {
	require 'dbh.inc.php';
	session_start();

	if (isset($_SESSION['Type_User'])) {
		$nivel = $_SESSION['Type_User'];

		if ($nivel != 1) {
			header("Location: ../perfil.php?error=alreadycreated");
			exit();				
		}else{
			$Nombre = $_POST['Nombre'];
			$ApellidoP = $_POST['ApellidoP'];
			$ApellidoM = $_POST['ApellidoM'];
			$Telefono = $_POST['Telefono'];

			if (empty($Nombre) || empty($ApellidoP) || empty($ApellidoM) || empty($Telefono)) {
				header("Location: ../Pre-Registro.php?error=emptyfields");
				exit();
			}else{

				$id =$_SESSION['user_Id'];
				$sql ="SELECT Id_Cuenta_P FROM persona WHERE Id_Cuenta_P=?";
				$stmt = mysqli_stmt_init($conn);
				if (!mysqli_stmt_prepare($stmt, $sql)) {
					header("Location: ../Pre-Registro.php?error=sqlerror");
					exit();					
				}else{
					/* S string, B boolean, I integrer */
					mysqli_stmt_bind_param($stmt, "i", $id);
					mysqli_stmt_execute($stmt);
					mysqli_stmt_store_result($stmt);
					$resultCheck = mysqli_stmt_num_rows($stmt);
					if ($resultCheck > 0) {
						header("Location: ../Pre-Registro.php?error=alreadycreated");
						exit();	
					}else{
						$sql ="INSERT INTO persona (Nombres, Apellido_P, Apellido_M, Telefono, Id_Cuenta_P) VALUES (?, ?, ?, ?, ?)";
						$stmt = mysqli_stmt_init($conn);
						if (!mysqli_stmt_prepare($stmt, $sql)) {
							header("Location: ../Pre-Registro.php?error=sqlerror");
							exit();					
						}else{
							mysqli_stmt_bind_param($stmt, "sssii", $Nombre, $ApellidoP, $ApellidoM,$Telefono, $id);
							mysqli_stmt_execute($stmt);

							$sql ="UPDATE cuenta set Type = 2 where Id_Cuenta =?";
							$stmt = mysqli_stmt_init($conn);
							if (!mysqli_stmt_prepare($stmt, $sql)) {
								header("Location: ../Pre-Registro.php?error=updatetipo");
								exit();					
							}else{
								mysqli_stmt_bind_param($stmt, "i", $id);
								mysqli_stmt_execute($stmt);
								$_SESSION['Type_User'] = 2;
								header("Location: ../index.php?signup=success");
								exit();	
							}	
						}
					}
				}
			}				
		}

	}else{
		header("Location: ../login.php?error=No_login");
		exit();		
	}

}else{
	header("Location: ../index.php");
	exit();		
}
