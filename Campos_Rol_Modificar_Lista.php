<?php  
	require 'includes/dbh.inc.php';
	require"classes/header.php";

	$statment = $conn->prepare("SELECT * FROM rol");
	$statment->execute();
	$resultados = $statment->get_result();
?>
	
<main>
	<h2>Roles</h2><br>

	<table>
	  <tr>
	    <th>Nombre_Rol</th>
	    <th>Descripcion_Rol</th>
	    <th>Visualizar</th>
	  </tr>



		<?php if(empty($resultados)){ ?>
			</table><br>
				  		
			<label>No hay convocatorias en proceso..</label>
		<?php }else{ ?>	

		<?php foreach($resultados as $a) {?>
				<?php if ($a['Id_Rol'] == 1){?>								  			
				<?php }else{ ?>				  		
				<tr>
					<td><?php echo $a['Nombre_Rol']?></td>
					<td><?php echo $a['Descripcion_Rol']?></td>
					<td><?php echo "<a class='Hoverr' href='Campos_Rol_Modificar.php?id=".$a['Id_Rol']."'><i class='fa fa-eye fa-2x'></a>";?></td>

				</tr>
				<?php } ?>				  	   
			<?php } ?>
			</table><br>

		<?php } ?>	

</main>