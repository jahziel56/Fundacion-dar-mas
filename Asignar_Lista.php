<?php  
	require 'includes/dbh.inc.php';
	require"classes/header.php";

	$statment = $conn->prepare("SELECT * FROM registroasignado inner join empleados on registroasignado.FK_Empleado =  empleados.EmpleadoID inner join formularioprincipal on registroasignado.FK_Registro = formularioprincipal.FormularioID inner join rol on empleados.FK_Roles = rol.Id_Rol");
	$statment->execute();
	$resultados = $statment->get_result();
?>
	
<main>
	<h2>Roles</h2><br>

	<table>
	  <tr>
	    <th>Empleado Asignado</th>
	    <th>Rol</th>
	    <th>Formulario numero</th>
	    <th>nombre OSC</th>
	   	<th>Estado</th>
	   	<th>Ver</th>
	  </tr>



		<?php if(empty($resultados)){ ?>
			</table><br>
				  		
			<label>No hay convocatorias en proceso..</label>
		<?php }else{ ?>	

			<?php foreach($resultados as $a) {?>				  		
				<tr>
					<td><?php echo $a['nombreEmpleado']." ".$a['apellidoEmpleado']?></td>
					<td><?php echo $a['Nombre_Rol']?></td>
					<td><?php echo $a['FormularioID']?></td>
					<td><?php echo $a['nombreOSC']?></td>
					<td><?php echo $a['Estado']?></td>
					<td><?php echo "<a class='Hoverr' href='Campos_Rol_ver.php?id=".$a['AsignacionID']."'><i class='fa fa-eye fa-2x'></a>";?></td>

				</tr>				  	   
			<?php } ?>
			</table><br>

		<?php } ?>	

</main>