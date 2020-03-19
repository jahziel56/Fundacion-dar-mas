<?php  
	require 'includes/dbh.inc.php';
	require"classes/header.php";

	/*$statment = $conn->prepare("SELECT * FROM empleados INNER JOIN rol on empleados.FK_Roles = rol.Id_Rol");
	$statment->execute();
	$resultados = $statment->get_result();*/

	$sql = "SELECT * FROM empleados;";
	$stmt = mysqli_stmt_init($conn);
	if (!mysqli_stmt_prepare($stmt, $sql)) {
		echo 'Error: SQL Conection.';
		exit();		
	}else{
		mysqli_stmt_execute($stmt);
		$resultados = mysqli_stmt_get_result($stmt);
		$row = mysqli_fetch_assoc($resultados);

	}

	$sql = "SELECT * FROM cuenta WHERE Id_Cuenta=?;";
	$stmt = mysqli_stmt_init($conn);
	if (!mysqli_stmt_prepare($stmt, $sql)) {
		echo 'Error: SQL Conection.';
		exit();		
	}else{
		mysqli_stmt_bind_param($stmt, "i", $row['FK_Cuenta']);
		mysqli_stmt_execute($stmt);
		$result = mysqli_stmt_get_result($stmt);
		$row_C = mysqli_fetch_assoc($result);
	}

	if (isset($_SESSION['Darmas_Empleado_Modificar'])) {
		unset($_SESSION['Darmas_Empleado_Modificar']);
	}

?>
	
<main>
	<label style="font-size: 26px; color: #2471A3; #2471A3"></label>
	<h1 style='background: #A04000; color: white; text-align:center'>Empleados</h1>
	<p style='background: #E67E22; color: white; text-align:center;'>Registros </p><br>

	<a href='Empleados_Crear.php'class="A_P_B Agregar_Empleado">
		Agregar un nuevo empleado <i style="color: white" class='fa fa-plus'></i>
	</a>

	<table>
	  <tr>
	    <th>Nombre</th>
	    <th>Apellido</th>
	    <th>Correo</th>
	    <th>Opciones</th>
	  </tr>

		<?php if(empty($resultados)){ ?>
			</table><br>
				  		
			<label>No hay empleados..</label>
		<?php }else{ ?>	

			<?php foreach($resultados as $a) {?>				  		
				<tr>
					<td><?php echo $a['nombreEmpleado']?></td>
					<td><?php echo $a['apellidoEmpleado']?></td>
					<td><?php echo $a['correoEmpleado']?></td>
					<td style="display: flex; justify-content:center;">
					<form action="Empleado_Modificar_Detalle.php" method="post">
						<button class="b" name="submit_Modifi" style="padding: 1px; margin: 1px 12px;" ><i class='fa fa-pencil-square-o fa-2x'></i></button>
						<input type="" class="hiden" name="id" value="<?php echo $a['EmpleadoID']; ?>">
					</form>
					<form action="Empleado_Eliminar.php" method="post">
						<button class="r" name="id" value='<?php echo $a['EmpleadoID']?>'><i class='fa fa-trash fa-2x'></i></button>
					</form>
					</td>


				</tr>				  	   
			<?php } ?>
			</table><br>
		<?php } ?>	
</main>