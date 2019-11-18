<?php
/* manda a llamar a header.php */ 
	require"classes/header.php";
	require 'includes/dbh.inc.php';

    $ID_Selected = $_SESSION['ID_OSC'];

	$Fecha = "2019-11-14 07:21";
	// -------------------------------------------- Querry -----------------------------------------------------------------------------------------------------
	$sql = "SELECT * FROM notificaciones WHERE FK_Registro=?;";
    $stmt = mysqli_stmt_init($conn);
    mysqli_stmt_prepare($stmt, $sql);
    mysqli_stmt_bind_param($stmt, "i", $ID_Selected);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);


?>	
<main>
	<h1 style='background: pink; color: white; text-align:center'>Notificaciones</h1>
	<p style='background: lightpink; color: white; text-align:center;'>panel de notificaciones sobre su organisacion</p><br>
<?php

    foreach ($result as $row) {
    	Notificacion($row['Mensaje'],$Fecha,$row['Tipo'],'vista',$row['FK_registro']);
    }

    if (empty($result)) {

    $a = "hola";
	$Fecha = "2019-11-14 07:21";
	$Tipo = "Correcion: Registro";
	$ID = 1;
	Notificacion($a,$Fecha,$Tipo,'',$ID);
	Notificacion($a,$Fecha,$Tipo,'vista',$ID);
	Notificacion($a,$Fecha,$Tipo,'',$ID);

    }



	/*if (!isset($_SESSION['ID_OSC'])) {
		header("Location: OSC_acces.php");
	}*/

	$a = "hola";

 
function Notificacion($Mensaje,$Fecha,$Tipo,$vista,$ID){
?>

	<div class="Files_Container ">
		<div class="row " >
		   
		   <div class="cell -file notificacion <?php echo $vista ?>">
		      <i class="fa fa-address-card-o" aria-hidden="true"></i>
		      <div class="inner">
		      	<?php //echo "<a class='filename' href='Archivos_Convocatoria_Ver_Detalle.php?id=".$a."' target=»_blank»>".$a."</a>";?>
		      	<?php echo "<a class='filename' href='Registro_Corregir.php?id=$ID'>".$Mensaje."</a>";?>
		         <small class="details">
		         	<span class="detail -filesize"><i class="fa fa-commenting-o" aria-hidden="true"></i><?php echo $Tipo; ?></span>
		            <span class="detail -updated"><i class="fa fa-clock-o" aria-hidden="true"></i><?php echo $Fecha;?></span>
		         </small>
		      </div>
		   </div>
		   
		   <?php if ($vista ==  'vista') { 	?>
		   		<button class="cell -action  notificacion">
		      		<i class="fa fa-eye-slash" aria-hidden="true"></i>
		      		<span class="label">Marcar como visto</span>
		   		</button>
		   	<?php 
		   } else { ?>
		   		<button class="cell -action -download notificacion">
		      		<i class="fa fa-eye" aria-hidden="true"></i>
		      		<span class="label">Marcar como no visto</span>
		   		</button>
		   <?php
		   }
		   ?>
		   		   
		</div>

	</div>


<?php 	
}
?>


</main>

<?php

/* manda a llamar a footer.php */ 
	require"footer.php";

/* el   header.php / index.php / footer.php   son en esencia una sola pagina php, se hace de esta forma para reutilizar codigo de forma facil y rapida */
?>

