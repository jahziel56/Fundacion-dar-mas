<?php  
	require 'includes/dbh.inc.php';
	require"header.php";

	$statment = $conn->prepare("SELECT * FROM formularioprincipal");
	$statment->execute();
	$resultados = $statment->get_result();
?>
	
<main>
	<h2>Convocatoria</h2><br>

	<table>
	  <tr>
	    <th>FormularioID</th>
	    <th>nombreOSC</th>
	    <th>objetoSocialOrganizacion</th>
	    <th>areasAtencion</th>
	    <th>rfcHomoclave</th>
	    <th>Visualizar</th>
	  </tr>



		<?php if(empty($resultados)){ ?>
			</table><br>
				  		
			<label>No hay convocatorias en proceso..</label>
		<?php }else{ ?>	

			<?php foreach($resultados as $a) {?>				  		
				<tr>
					<td><?php echo $a['FormularioID']?></td>
					<td><?php echo $a['nombreOSC']?></td>
					<td><?php echo $a['objetoSocialOrganizacion']?></td>	
					<td><?php echo $a['areasAtencion']?></td>	
					<td><?php echo $a['rfcHomoclave']?></td>
					<td><?php echo "<a class='Hoverr' href='pre_ver.inc.php?id=".$a['FormularioID']."'>Link</a>";?></td>

				</tr>				  	   
			<?php } ?>
			</table><br>

		<?php } ?>	

</main>