<?php
/* manda a llamar a header.php */ 
	require"header.php";


if (empty($_GET["id"])){
	echo "<main><div style='background: #B22222; color: white; text-align:center'>";
    echo "Convocatoria no encontrada<br></div><br>";
    echo "<a class='P_B' href='Panel_Informacion.php' style='text-decoration: none; display: block;'>Regresar</a></main>";
    header("Location: Panel_Informacion.php?Error=ID");
    exit();
}else{
	if (!empty($nombreOSC)) {	
	echo "<main>";
	    echo "<h1 style='background: steelblue; color: white; text-align:center'>Documentos</h1>";
	   	echo "<p style='background: LIGHTSKYBLUE; color: white; text-align:center;'>".$nombreOSC."</p><br>";
	    /*echo "<p style='background: LIGHTSKYBLUE; color: white; text-align:center;'>
	    Haz click en el archivo para verlo o click en <i class='fa fa-download'></i>  para descargarlo</p><br>";*/

	foreach ($result as $row2) {?>
	<div class="Files_Container">
		<div class="row">
		   
		   <div class="cell -file">
		      <i class="fa 
		      <?php
		      switch ($row2['tipoArchivo']) {
		    	case "application/pdf":
		    		echo "fa-file-pdf-o";
		    		break;     
		    	case "image/jpeg":
		    		echo "fa-file-image-o";
		    		break;
		    	case "image/png":
		    		echo "fa-file-image-o";
		    		break;
		    	case "text/plain":
		    		echo "fa-file-text-o";
		    		break;
		    	default:
		    		echo "fa-file"; 	
		      }

		    $nombre_fichero = $row2['LENGTH(dataArchivo)']/1024;
			$nombre_fichero = bcdiv($nombre_fichero, '1', 1);
			

		      ?>" aria-hidden="true"></i>
		      <div class="inner">
		      	<?php echo "<a class='filename' href='classes/Archivos_Convocatoria_Ver_Detalle.php?id=".$row2['Archivos_ID']."' target=»_blank»>".$row2['nombreSeccion']."</a>";?>
		         <small class="details">
		            <span class="detail -filesize"><i class="fa fa-hdd-o" aria-hidden="true"></i><?php echo ' '.($nombre_fichero).' KB'; ?></span>
		            <span class="detail -updated"><i class="fa fa-clock-o" aria-hidden="true"></i><?php echo $row2['Fecha'];?></span>
		         </small>
		      </div>
		   </div>		   
		</div>
	</div>
	<?php }
	}else{
	echo "<main><div style='background: #B22222; color: white; text-align:center'>";
    echo "No se encontraron archivos de dicha convocatoria<br></div><br>";
    echo "<a class='P_B' href='Panel_Informacion.php' style='text-decoration: none; display: block;'>Regresar</a></main>";
    exit();
    }
}
?>
</main>	