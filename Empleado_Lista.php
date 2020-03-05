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
	}


?>
	
<main>
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
					<td>
						<a class='' href='Empleado_Modificar_Detalle.php?id=<?php echo $a['EmpleadoID']?>'><i class='fa fa-pencil-square-o fa-2x'></i></a>
						<a class='' href='Empleado_Lista.php?id=<?php echo $a['EmpleadoID']?>'><i class='fa fa-trash fa-2x'></i></a>

					</td>


				</tr>				  	   
			<?php } ?>
			</table><br>
		<?php } ?>	
</main>