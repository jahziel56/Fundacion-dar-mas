<?php  
	require 'includes/dbh.inc.php';
	require"classes/header.php";

	$statment = $conn->prepare("SELECT * FROM formularioprincipal");
	$statment->execute();
	$resultados = $statment->get_result();

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
	    <th>Asignado</th>
	    <th>Fecha</th>
	    <th>Estado</th>	    
	    <th>Visualizar</th>
	  </tr>
			<?php foreach($resultados as $a) {?>
				<?php if ($a['Estado'] == 'Enviado') { ?>								  		
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
			<?php } ?>
			</table><br>
		<?php } ?>

		<h5>Convocatorias En Revision</h5>
		<?php 
		if($Revision == false){ ?>				  		
			<p>No hay convocatorias En Revision..</p><br><br>
		<?php }else{ ?>
		<table>
			  <tr>
			    <th>FormularioID</th>
			    <th>nombreOSC</th>
			    <th>objetoSocialOrganizacion</th>
			    <th>areasAtencion</th>
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