<?php  
	require 'includes/dbh.inc.php';
	require"classes/header.php";

	$ID_Empleado = $_SESSION['user_Id'];

	$statment = $conn->prepare("SELECT * FROM registro");
	$statment->execute();
	$resultados = $statment->get_result();

    $consultarPreregistros = "SELECT * FROM registro inner join empleados on empleados.EmpleadoID = registroasignado.FK_Empleado inner join cuenta on empleados.FK_Cuenta = cuenta.Id_Cuenta WHERE Id_Cuenta = ?";
    $stmt = mysqli_stmt_init($conn);
    mysqli_stmt_prepare($stmt, $consultarPreregistros);
    mysqli_stmt_bind_param($stmt, "i", $ID_Empleado);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $row = mysqli_fetch_assoc($result);

	$Revision = false;
	$Enviado = false;

	foreach($resultados as $a) {
		switch ($a['Estado']) {
			case "Enviado":
				$Enviado = true;
				break;

			case "Revision":
				$Revision = true;
				break;
		}	
	}
?>
	
<main>
	<h2>Convocatoria</h2><br>
	<h5>Convocatorias Asignadas</h5>
	<?php 
		if(empty($row['AsignacionID'])){ ?>
			<p>No hay convocatorias Por Revisar..</p><br><br>
		<?php }else{ ?>
	<table>
	  <tr>
	    <th>FormularioID</th>
	    <th>Nombre Organización</th>
	    <th>rfcHomoclave</th>
	    <th>Asignado</th>
	    <th>Fecha</th>
	    <th>Estado</th>	    
	    <th>Visualizar</th>
	  </tr>
			<?php foreach($resultados as $a) {?>
				<?php foreach($result as $row) {?>
					<?php if ($a['FormularioID'] == $row['FK_Registro']) { ?>								  		
					<tr>
						<td><?php echo $a['FormularioID']?></td>
						<td><?php echo $a['nombreOSC']?></td>
						<td><?php echo $a['rfcHomoclave']?></td>	
						<td><?php echo $a['areasAtencion']?></td>
						<td><?php $date = date_create($a['Fecha_Creacion']); echo date_format($date, 'd/m/y');?></td>
						<td><?php echo $a['Estado']?></td>
						<td><?php echo "<a class='Hoverr' href='pre_ver.php?id=".$a['FormularioID']."'><i class='fa fa-eye fa-2x'></a>";?></td>

					</tr>
					<?php }?>
				<?php }?>			  	   
			<?php } ?>
			</table><br>
		<?php } ?>

	<h5>Convocatorias Enviadas</h5>
	<?php 
		if(empty($Enviado)){ ?>
			<p>No hay convocatorias Por Asignar..</p><br><br>
		<?php }else{ ?>
	<table>
	  <tr>
	    <th>FormularioID</th>
	    <th>Nombre Organización</th>
	    <th>rfcHomoclave</th>
	    <th>Fecha</th>
	    <th>Asignado</th>	
	    <th>Estado</th>	    
	    <th>Visualizar</th>
	  </tr>
			<?php foreach($resultados as $a) {?>
				<?php if ($a['Estado'] == 'Enviado') { ?>								  		
				<tr>
					<td><?php echo $a['FormularioID']?></td>
					<td><?php echo $a['nombreOSC']?></td>
					<td><?php echo $a['rfcHomoclave']?></td>	
					<td><?php $date = date_create($a['Fecha_Creacion']); echo date_format($date, 'd/m/y');?></td>
					<td><?php echo 'No asignado'?></td>							
					<td><?php echo $a['Estado']?></td>
					<td><?php echo "<a class='Hoverr' href='pre_ver.php?id=".$a['FormularioID']."'><i class='fa fa-eye fa-2x'></a>";?></td>

				</tr>
				<?php }?>				  	   
			<?php } ?>
			</table><br>
		<?php } ?>

		<h5>Convocatorias En Revision</h5>
		<?php 
		$statment = $conn->prepare("SELECT * FROM formularioprincipal inner join registroasignado on formularioprincipal.FormularioID =  registroasignado.FK_Registro inner join empleados on empleados.EmpleadoID = registroasignado.FK_Empleado ");
		$statment->execute();
		$resultados = $statment->get_result();



		if($Revision == false){ ?>				  		
			<p>No hay convocatorias En Revision..</p><br><br>
		<?php }else{ ?>
		<table>
			  <tr>
			    <th>FormularioID</th>
			    <th>Nombre Organización</th>
			    <th>rfcHomoclave</th>
			    <th>Fecha</th>
			    <th>Asignado</th>	
			    <th>Estado</th>	    
			    <th>Visualizar</th>
			  </tr>
		
			<?php foreach($resultados as $a) {?>
				<?php if ($a['Estado'] == 'Revision') { ?>
				<tr>
					<td><?php echo $a['FormularioID']?></td>
					<td><?php echo $a['nombreOSC']?></td>
					<td><?php echo $a['objetoSocialOrganizacion']?></td>	
					<td><?php echo $a['areasAtencion']?></td>
					<td><?php echo $a['nombreEmpleado']?></td>								
					<td><?php echo $a['Estado']?></td>
					<td><?php echo "<a class='Hoverr' href='pre_ver.php?id=".$a['FormularioID']."'><i class='fa fa-eye fa-2x'></a>";?></td>

				</tr>
				<?php }?>				  	   
			<?php } ?>
			</table><br>
		<?php } ?>		

</main>

<main class="div_40">
	<h5>Estados de las convocatorias</h5>
	<p>Enviado: La convocatoria se envio, No se a asignado El empleado que la revisara</p><br>
	<p>Revision: Se a asignado a un emplado</p><br>
	<p>Revisado: El emplado a revisado la solicitud pero a habido problemas con esta y se a mandado una correcion</p><br>
<p>Corregido:La convocatoria se a enviado con anterioridad pero a tenido errores, estos se "corrigieron" y se a enviado nueva mente para su revision</p><br>
	<p>Aceptado: La solicitud sea aceptado y aprobado</p><br>
</main>