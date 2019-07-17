<?php  
	require 'includes/dbh.inc.php';
	require"classes/header.php";

	$statment = $conn->prepare("SELECT * FROM empleados");
	$statment->execute();
	$resultados = $statment->get_result();
?>
	
<main>
	<h2>Empleados</h2><br>

	<table>
	  <tr>
	    <th>Nombre</th>
	    <th>Apellido</th>
	    <th>Correo</th>
	   	<th>Rol</th>
	    <th>Ver</th>

	  </tr>



		<?php if(empty($resultados)){ ?>
			</table><br>
				  		
			<label>No hay convocatorias en proceso..</label>
		<?php }else{ ?>	

			<?php foreach($resultados as $a) {?>				  		
				<tr>
					<td><?php echo $a['nombreEmpleado']?></td>
					<td><?php echo $a['apellidoEmpleado']?></td>
					<td><?php echo $a['correoEmpleado']?></td>
					<td><?php echo $a['FK_Roles']?></td>
					<td><?php echo "<a class='Hoverr' href='Campos_Rol_ver.php?id=".$a['EmpleadoID']."'><i class='fa fa-eye fa-2x'></a>";?></td>

				</tr>				  	   
			<?php } ?>
			</table><br>

		<?php } ?>	

</main>