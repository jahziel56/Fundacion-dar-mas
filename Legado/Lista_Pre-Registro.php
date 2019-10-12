<?php  
	require 'includes/dbh.inc.php';
	require"classes/header.php";

	$statment = $conn->prepare("SELECT * FROM formularioprincipal");
	$statment->execute();
	$resultados = $statment->get_result();
?>
	
<main>
	<h2>Pre-Registro</h2>
	<table>
	  <tr>
	    <th>FormularioID</th>
	    <th>nombreOSC</th>
	    <th>objetoSocialOrganizacion</th>
	    <th>areasAtencion</th>
	    <th>rfcHomoclave</th>
	    <th>Visualizar</th>
	  </tr>
		<?php foreach($resultados as $a) {?>				  		
		<tr>
			<td><?php echo $a['FormularioID']?></td>
			<td><?php echo $a['nombreOSC']?></td>
			<td><?php echo $a['objetoSocialOrganizacion']?></td>	
			<td><?php echo $a['areasAtencion']?></td>	
			<td><?php echo $a['rfcHomoclave']?></td>
			<td><a href="#">Link<br>(EN CONSTRUCION)</a></td>						
		</tr>				  	   
		<?php } ?>
	</table>
</main>