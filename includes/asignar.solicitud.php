<?php
	$conn1 = new PDO("mysql:host=localhost;dbname=fundacion", "root", "");
/* METODO: evitar que el usuario ingrese a esta pagina php desde la barra de busqueda */
/* signup-submit es el boton del formulario que se encuentra en la signup.php */
	if (isset($_POST['asignar-submit'])) {
		$empleadoSeleccionado = $_POST['empleadoSeleccionado'];
		$solicitudSeleccionada = $_POST['solicitudSeleccionada'];

		$stmt1 = $conn1->prepare("INSERT INTO registroasignado VALUES (NULL,?,?)");
		$stmt1->bindParam(1,$solicitudSeleccionada);
		$stmt1->bindParam(2,$empleadoSeleccionado);
		$stmt1->execute();

		header("Location: ../asignar_registro.php");
	}

?>