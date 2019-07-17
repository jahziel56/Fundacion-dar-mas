<?php
	$conn1 = new PDO("mysql:host=localhost;dbname=sistemadarmas", "root", "");
/* METODO: evitar que el usuario ingrese a esta pagina php desde la barra de busqueda */
/* signup-submit es el boton del formulario que se encuentra en la signup.php */
	if (isset($_POST['signup-submit'])) {
		$username = $_POST['uid'];
		$email = $_POST['mail'];
		$password = $_POST['pwd'];
		$passwordRepeat = $_POST['pwd-repeat'];
		$tipo = 2;
		$nombreEmpleado = $_POST['nombreEmpleado'];
		$apellidoEmpleado = $_POST['apellidoEmpleado'];
		$tipoCuenta = $_POST['tipoCuenta'];
		
		$hashedpassword = password_hash($password, PASSWORD_DEFAULT);

		$stmt1 = $conn1->prepare("INSERT INTO cuenta VALUES (NULL,?,?,?,?)");
		$stmt1->bindParam(1,$username);
		$stmt1->bindParam(2,$hashedpassword);
		$stmt1->bindParam(3,$email);
		$stmt1->bindParam(4,$tipo);
		$stmt1->execute();

		$ultimaID= $conn1->lastInsertId();

		$stmt2 = $conn1->prepare("INSERT INTO empleados VALUES (NULL,'$nombreEmpleado', '$apellidoEmpleado', '$email', '$tipoCuenta', '$ultimaID')");
		/*$stmt2->bindParam(1,$nombreEmpleado);
		$stmt2->bindParam(2,$apellidoEmpleado);
		$stmt2->bindParam(3,$email);
		$stmt2->bindParam(4,$tipoCuenta);
		$stmt2->bindParam(5,$ultimaID);*/
		$stmt2->execute();

		header("Location: ../Panel_De_Control.php?signup=success");
	}

?>