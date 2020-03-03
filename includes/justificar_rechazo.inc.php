<?php 
if (isset($_POST['justificar'])) {
	require"dbh.inc.php";
	session_start();

	//print_r($_POST);
	//echo $_POST['Texto_Justificado'];
	//echo $_POST['ID_Registro'];

	$ID_Registro = $_POST['ID_Registro'];
	$Estado = 'Rechazado';
	$Razon = $_POST['Texto_Justificado'];


   	$Revisor_ID = $_SESSION['user_Id'];


	mysqli_begin_transaction($conn);
	$conn->autocommit(FALSE);

	try{

		$sql = "SELECT * FROM empleados WHERE FK_Cuenta=?;";
	    $stmt = mysqli_stmt_init($conn);
		if (!mysqli_stmt_prepare($stmt, $sql)) {
				throw new Exception('Error: SQL CONECTION ERROR');
		}else{
	    	mysqli_stmt_bind_param($stmt, "i",$Revisor_ID);
			if(!mysqli_stmt_execute($stmt)){
				throw new Exception('Error: Select_Empleado');
			}else{
				$result = mysqli_stmt_get_result($stmt);
				$row = mysqli_fetch_assoc($result);
				$Revisor = $row['EmpleadoID'];
			}
		}

		$sql = "SELECT * FROM datos_generales WHERE FK_Registro=?;";
	    $stmt = mysqli_stmt_init($conn);
		if (!mysqli_stmt_prepare($stmt, $sql)) {
				throw new Exception('Error: SQL CONECTION ERROR');
		}else{
	    	mysqli_stmt_bind_param($stmt, "i",$ID_Registro);
			if(!mysqli_stmt_execute($stmt)){
				throw new Exception('Error: Select_DatosGenerales');
			}else{
				$result = mysqli_stmt_get_result($stmt);
				$row = mysqli_fetch_assoc($result);

				print_r($row);

				$RFC_Organizacional = $row['rfcHomoclave'];
				$Correo_Organizacion = $row['Correo_Organizacion'];				
				$Nombre_OSC = $row['nombreOSC'];
			}
		}

		$sql = "UPDATE registro SET Estado = 'Rechazado' WHERE ID_Registro=?;";        
		$stmt = mysqli_stmt_init($conn);
		if (!mysqli_stmt_prepare($stmt, $sql)) {
			//header("Location: ../index.php?SQL=Error_Update");
				throw new Exception('Error: SQL CONECTION ERROR');
		}else{
			mysqli_stmt_bind_param($stmt, "i", $ID_Registro);
			if(!mysqli_stmt_execute($stmt)){
				throw new Exception('Error: update_registro');
			}
		}


		$sql = "INSERT INTO rechazado (FK_Registro,FK_Empleado,Razon) VALUES (?, ?, ?)";  
		$stmt = mysqli_stmt_init($conn);
		if (!mysqli_stmt_prepare($stmt, $sql)) {
			//header("Location: ../index.php?SQL=Error_Update");
				throw new Exception('Error: SQL CONECTION ERROR');
		}else{
		    mysqli_stmt_bind_param($stmt, "iis",$ID_Registro,$Revisor,$Razon);
			if(!mysqli_stmt_execute($stmt)){
				throw new Exception('Error: Ya fue rechazada dicho registro');
			}
			$ID_Rechazado = $conn->insert_id;

			echo $ID_Rechazado;
			echo $Correo_Organizacion;
			echo $RFC_Organizacional;
			echo $Nombre_OSC;
		}


		$sql = "INSERT INTO detalle_rechazados (Correo_Organizacion,RFC_Organizacional,Nombre_OSC,FK_Rechazo) VALUES (?, ?, ?, ?)";  
		$stmt = mysqli_stmt_init($conn);
		if (!mysqli_stmt_prepare($stmt, $sql)) {
			//header("Location: ../index.php?SQL=Error_Update");
				throw new Exception('Error: SQL CONECTION ERROR');
		}else{
		    mysqli_stmt_bind_param($stmt, "sssi",$Correo_Organizacion,$RFC_Organizacional,$Nombre_OSC,$ID_Rechazado);
			if(!mysqli_stmt_execute($stmt)){
				throw new Exception('Error: Ya fue rechazada dicho registro (Detalles) ');
			}
		}

		$sql = "DELETE FROM revisando WHERE FK_Registro=?";
		$stmt = mysqli_stmt_init($conn);
		if (!mysqli_stmt_prepare($stmt, $sql)) {
			//header("Location: ../../index.php?SQL=Error_Update");
			exit();
		}else{
			mysqli_stmt_bind_param($stmt, "i",$ID_Registro);
			if(!mysqli_stmt_execute($stmt)){
				throw new Exception('Error: Delete Revisando');
			}
		}

		$Identificador = 2;
	    $Tipo = 'Rechazado: Registro';
	    $Mensaje = 'Su registro fue Rechazado';

		$sql = "INSERT INTO notificaciones (Identificador,Tipo,Mensaje,FK_registro) VALUES (?, ?, ?, ?)";  
		$stmt = mysqli_stmt_init($conn);
		if (!mysqli_stmt_prepare($stmt, $sql)) {
			//header("Location: ../../index.php?SQL=Error_Update");
			exit();
		}else{
			mysqli_stmt_bind_param($stmt, "sssi",$Identificador,$Tipo,$Mensaje,$ID_Registro);
			if(!mysqli_stmt_execute($stmt)){
				throw new Exception('Error: Insert Notificaciones');
			}
		}




	}catch( Exception $e ){
		$conn->rollback();
		echo "<BR>".$e;
		exit();
	}

	$conn->commit();

	header("Location: ../Registro_Lista.php");
}else{
	header("Location: ../index.php");
	exit();		
}