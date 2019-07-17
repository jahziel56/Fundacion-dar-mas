<?php
	$conn1 = new PDO("mysql:host=localhost;dbname=sistemadarmas", "root", "");
/* METODO: evitar que el usuario ingrese a esta pagina php desde la barra de busqueda */
/* signup-submit es el boton del formulario que se encuentra en la signup.php */
	if (isset($_POST['asignar-submit'])) {
		$empleadoSeleccionado = $_POST['empleadoSeleccionado'];
		$solicitudSeleccionada = $_POST['solicitudSeleccionada'];

		$stmt1 = $conn1->prepare("INSERT INTO registroasignado VALUES (NULL,?,?)");
		$stmt1->bindParam(1,$solicitudSeleccionada);
		$stmt1->bindParam(2,$empleadoSeleccionado);
		$stmt1->execute();


		/*$sql = "UPDATE cuenta SET Password=? WHERE Email=?";
		$stmt = mysqli_stmt_init($conn);
		if (!mysqli_stmt_prepare($stmt, $sql)) {
			echo "error";
			exit();
		}else{
			mysqli_stmt_bind_param($stmt, "ss", $Newhashedpassword, $tokenEmail);
			mysqli_stmt_execute($stmt);
		}*/

		$Estado = 'Revision';

		$stmt1 = $conn1->prepare("UPDATE formularioprincipal SET Estado=? WHERE FormularioID=?");
		$stmt1->bindParam(1,$Estado);
		$stmt1->bindParam(2,$solicitudSeleccionada);
		$stmt1->execute();

		

		header("Location: ../asignar_registro.php");
	}

?>