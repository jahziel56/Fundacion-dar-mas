<?php
/* manda a llamar a header.php */ 
	require"header.php";


if (empty($_GET["id"])){
    echo "<main><div style='background: #B22222; color: white; text-align:center'>";
    echo "Rol no selecionado<br></div><br>";
    echo "<a class='P_B' href='http:Convocatorias.php' style='text-decoration: none; display: block;'>Regresar</a></main>";
    header("Location: Convocatorias.php");
    exit();
}else{
	echo "<main>";

	    echo "<h1 style='background: steelblue; color: white; text-align:center'>".$nombreOSC."</h1>";
	    echo "<p style='background: LIGHTSKYBLUE; color: white; text-align:center;'>
	    Preciona sobre el archivo para verlo</p><br>";

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
		    	case "TXT":
		    		echo "fa-file-text-o";
		    		break;
		    	default:
		    		echo "fa-file-text"; 	
		      }  	
		      ?>" aria-hidden="true"></i>
		      <div class="inner">
		      	<?php echo "<a class='filename' href='classes/Archivos_Convocatoria_Ver_Detalle.php?id=".$row2['FArchivosID']."' target=»_blank»>".$row2['nombreArchivo']."</a>";?>
		         <small class="details">
		            <span class="detail -filesize"><i class="fa fa-hdd-o" aria-hidden="true"></i>128.6kb</span>
		            <span class="detail -updated"><i class="fa fa-clock-o" aria-hidden="true"></i><?php echo $row2['Fecha']; ?></span>
		         </small>
		      </div>
		   </div>
		   
		   <button class="cell -action -download">
		      <i class="fa fa-download" aria-hidden="true"></i>
		      <span class="label">Download</span>
		   </button>		   
		   <button class="cell -action -more">
		      <i class="fa fa-ellipsis-h" aria-hidden="true"></i>
		      <span class="label">More</span>
		   </button>
		   
		</div>
	</div>
	<?php }



}
?>
</main>	