<?php
/* METODO: evitar que el usuario ingrese a esta pagina php desde la barra de busqueda */
/* signup-submit es el boton del formulario que se encuentra en la signup.php */
if (isset($_POST['signup-submit'])) {
	/* manda a llamar a la pagina php donde se conecta a la base de datos de esta forma se ahorra codigo y se tiene todo en una funcion mas simple */
	require 'dbh.inc.php';	

	/* lo que se encuentra dentro del metodo post es el name de cada input en signup.php */
	$username = $_POST['uid'];
	$email = $_POST['mail'];
	$password = $_POST['pwd'];
	$passwordRepeat = $_POST['pwd-repeat'];
    $Type = 2;
    $nombreEmpleado = $_POST['nombreEmpleado'];
    $apellidoEmpleado = $_POST['apellidoEmpleado'];
    $tipoCuenta = $_POST['tipoCuenta'];

	/* Verifica si hay campos vacios */
	if (empty($username) || empty($email) || empty($password) || empty($passwordRepeat)) {
		header("Location: ../signup.php?error=emptyfields&uid=".$username."&mail=".$email);
		exit();
	}
	else if (!filter_var($email, FILTER_VALIDATE_EMAIL) && !preg_match("/ˆ[a-zA-Z0-9]*$/", $username)) {
		header("Location: ../signup.php?error=invalidmailuid");
		exit();	
	}
	else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
		header("Location: ../signup.php?error=invalidmail&uid=".$username);
		exit();		
	}
	else if (!preg_match("/^[a-zA-Z0-9]*$/", $username)) {
		header("Location: ../signup.php?error=invaliduid&mail=".$email);
		exit();		
	}
	else if ($password !== $passwordRepeat) {
		header("Location: ../signup.php?error=passwordcheck&uid=".$username."&mail=".$email);
		exit();	
	}
	else{
		$sql ="SELECT Username FROM cuenta WHERE Username=?";
		$stmt = mysqli_stmt_init($conn);
		if (!mysqli_stmt_prepare($stmt, $sql)) {
			header("Location: ../signup.php?error=sqlerror");
			exit();					
		}
	
		else{
			/* S string, B boolean, I integrer */
			mysqli_stmt_bind_param($stmt, "s", $username);
			mysqli_stmt_execute($stmt);
			mysqli_stmt_store_result($stmt);
			$resultCheck = mysqli_stmt_num_rows($stmt);
			if ($resultCheck > 0) {
				header("Location: ../signup.php?error=usertaken&mail=".$email);
				exit();	
			}	
			else{
				$sql ="INSERT INTO cuenta (Username, Email, Password, Type) VALUES (?, ?, ?, ?)";
				$stmt = mysqli_stmt_init($conn);
				if (!mysqli_stmt_prepare($stmt, $sql)) {
					header("Location: ../signup.php?error=sqlerror");
					exit();					
				}
				else{
					$hashedpassword = password_hash($password, PASSWORD_DEFAULT);

					mysqli_stmt_bind_param($stmt, "sssi", $username, $email, $hashedpassword,$Type);
                    mysqli_stmt_execute($stmt);
                    
                    $idEmpleado = mysqli_insert_id($conn);
                    $sql2 = "INSERT INTO roles (Nombre, Apellido_M, correoEmpleado, FK_Rol, FK_Cuenta) VALUES (?, ?, ?, ?, ?)";

                    $stmt2 = mysqli_stmt_init($conn);
                    mysqli_stmt_prepare($stmt2, $sql2);
					mysqli_stmt_bind_param($stmt2, "sssii", $nombreEmpleado, $apellidoEmpleado, $email, $tipoCuenta, $idEmpleado);
                    mysqli_stmt_execute($stmt2);

					header("Location: ../login.php?signup=success");
					exit();	
				}
			}
		}
	}
	mysqli_stmt_close($stmt);
	mysql_close($conn);
}
else{
	header("Location: ../signup.php");
	exit();		
}