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
		      switch (strtoupper($row2['tipoArchivo'])) {
		    	case "PDF":
		    		echo "fa-file-pdf-o";
		    		break;     
		    	case "PNG":
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
		         <a href="#" class="filename"><?php echo $row2['nombreArchivo'];echo ".";echo $row2['tipoArchivo']; ?></a>
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
	<div class="Files_Container">
		<div class="row">
		   
		   <div class="cell -file">
		      <i class="fa fa-file-text" aria-hidden="true"></i>
		      <div class="inner">
		         <a href="#" class="filename">Filename.pdf</a>
		         <small class="details">
		            <span class="detail -filesize"><i class="fa fa-hdd-o" aria-hidden="true"></i> 128.6kb</span>
		            <span class="detail -updated"><i class="fa fa-clock-o" aria-hidden="true"></i> Updated 3 hours ago</span>
		         </small>
		      </div>
		   </div>
		   
		   <button class="cell -action -download">
		      <i class="fa fa-download" aria-hidden="true"></i>
		      <span class="label">Download</span>
		   </button>
		   
		   <button class="cell -action -share">
		      <i class="fa fa-share-square-o" aria-hidden="true"></i>
		      <span class="label">Share</span>
		   </button>
		   
		   <button class="cell -action -more">
		      <i class="fa fa-ellipsis-h" aria-hidden="true"></i>
		      <span class="label">More</span>
		   </button>
		   
		</div>
	</div>
			
	

		</div>
	</main>

<script>
var acc = document.getElementsByClassName("accordion");
var i;

for (i = 0; i < acc.length; i++) {
  acc[i].addEventListener("click", function() {
    this.classList.toggle("active");
    var panel = this.nextElementSibling;
    if (panel.style.maxHeight){
      panel.style.maxHeight = null;
    } else {
      panel.style.maxHeight = panel.scrollHeight + "px";
    } 
  });
}
</script>	