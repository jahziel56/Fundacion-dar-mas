<?php
	require"classes/header.php";  
	require 'includes/dbh.inc.php';

	$statment = $conn->prepare("SELECT * FROM registro INNER JOIN datos_generales on registro.ID_Registro = datos_generales.FK_Registro");
	$statment->execute();
	$resultados = $statment->get_result();
?>
<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-type" content="text/html; charset=utf-8">
	<meta name="description" content="This is an example of a meta description. this will often whow up in search results.">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Login</title>
	<link rel="stylesheet" type="text/css" href="../css/estilos.css">
  	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
  	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>
<main>
	<div class="Bar_change">

		<div>
			<i class="fa fa-caret-left" aria-hidden="true"></i>
			Convocatorias (Enero)			
		</div>
		<div>
			Registros
		</div>
		<div>
			Convocatorias (Diciembre)
			<i class="fa fa-caret-right" aria-hidden="true"></i>
		</div>
	</div>
</main>
<main>

	<h2>Registros</h2><br>
<div style="height: 300px;  overflow: auto;">
	<table>
	  <tr>
	    <th>Nombre Organizacional</th>
	    <th>RFC Organizacional</th>
	    <th>Fecha</th>
	   	<th>Estado</th>
	    <th>Revisar</th>
	  </tr>

		<?php if(empty($resultados)){ ?>
			</table><br>
				  		
			<label>No hay convocatorias en proceso..</label>
		<?php }else{ ?>	

			<?php foreach($resultados as $a) {?>				  		
				<tr>
					<td><?php echo $a['nombreOSC']?></td>
					<td><?php echo $a['RFC_Organizacional']?></td>
					<td><?php echo $a['Fecha_Registro']?></td>
					<td><?php echo $a['Estado']?></td>
					<td><?php echo "<a class='Hoverr' href='Registro_Revisar.php?id=".$a['ID_Registro']."'><i class='fa fa-eye fa-2x'></a>";?></td>

				</tr>				  	   
			<?php } ?>
			</table><br>
		<?php } ?>
	</div>
	<br>
</main>

<main>
	<h2>Estados de las convocatorias</h2><br>
	<h4>Enviado</h4>
	<p>La convocatoria se envio, No se a revisado</p><br>

	<h4>Revision</h4>
	<p>Se esta revisando por un empleado</p><br>

	<h4>Revisado</h4>
	<p>El emplado a revisado la solicitud pero a habido problemas con esta y se a mandado a correcion</p><br>

	<h4>Corregido</h4>
	<p>La convocatoria se a enviado con anterioridad pero a tenido errores, estos se "corrigieron" y se a enviado nueva mente para su revision</p><br>

	<h4>Aceptado</h4>
	<p>La solicitud sea aceptado y aprobado</p><br>
</main>