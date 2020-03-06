<?php  
	require 'includes/dbh.inc.php';
	require"classes/header.php";

		$id_Eliminar = $_GET['id'];

		$sql = "SELECT * FROM empleados WHERE EmpleadoID=?;";
		$stmt = mysqli_stmt_init($conn);
		if (!mysqli_stmt_prepare($stmt, $sql)) {
			echo 'Error: SQL Conection.';
			exit();		
		}else{
			mysqli_stmt_bind_param($stmt, "i", $id_Eliminar);
			mysqli_stmt_execute($stmt);
			$result = mysqli_stmt_get_result($stmt);
			$row = mysqli_fetch_assoc($result);
		}


$I = 1;
?>


	<main>
		<h1 style='background: #b71c1c  ; color: white; text-align:center'>Eliminar cuenta de empleado</h1>
		<p style='background: #e53935 ; color: white; text-align:center;'>Seguro Que desea Eliminar esta cuenta? </p><br>


				<form action="includes/Eliminar_empleado.php" method="post" class="Signup" style="padding: 8px 12px">

				<input class="common" type="text" name="nombreEmpleado" placeholder="Nombre de empleado" value="<?php echo $row['nombreEmpleado']; ?>" disabled>
                <input class="common" type="text" name="apellidoEmpleado" placeholder="Apellido de empleado" value="<?php echo $row['apellidoEmpleado']; ?>" disabled>
                <input class="common" type="email" name="mail" placeholder="Correo" value="<?php echo $row['correoEmpleado']; ?>" disabled>


			<button class="common" type="submit" name="Eliminar_empleado" style="background: #d50000  ">Eliminar Cuenta</button>
			</form>
	</main>

<?php  
/* manda a llamar a footer.php */ 
	require"footer.php";
?>