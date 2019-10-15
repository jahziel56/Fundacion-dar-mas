<?php  
	require 'includes/dbh.inc.php';
	require"classes/header.php";

	$statment = $conn->prepare("SELECT * FROM registro INNER JOIN datos_generales on registro.ID_Registro = datos_generales.FK_Registro");
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
					<td><?php echo $a['ID_Registro']?></td>
					<td><?php echo $a['nombreOSC']?></td>
					<td><?php echo $a['RFC_Organizacional']?></td>
					<td><?php echo $a['Fecha_Registro']?></td>
					<td><?php echo $a['Estado']?></td>
					<td><?php echo "<a class='Hoverr' href='Archivos_Lista_Convocatoria.php?id=".$a['ID_Registro']."'><i class='fa fa-eye fa-2x'></a>";?></td>

				</tr>				  	   
			<?php } ?>
			</table><br>

		<?php } ?>	

</main>