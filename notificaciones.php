<?php
/* manda a llamar a header.php */ 
	require"classes/header.php";
	require 'includes/dbh.inc.php';
	require 'no_login.php';

    if ( isset($_SESSION['ID_OSC'])) {
    	$ID_Selected = $_SESSION['ID_OSC'];
    }else{
		header("Location: OSC_acces.php?error=no_osc");
    }

	
	// -------------------------------------------- Querry -----------------------------------------------------------------------------------------------------
	$sql = "SELECT * FROM notificaciones WHERE FK_Registro=? ORDER BY ID_Notificacion DESC;";
	$stmt = mysqli_stmt_init($conn);
	if (!mysqli_stmt_prepare($stmt, $sql)) {
		echo 'Error: SQL Conection.';
		exit();		
	}else{
	    mysqli_stmt_bind_param($stmt, "i", $ID_Selected);
	    mysqli_stmt_execute($stmt);
	    $result = mysqli_stmt_get_result($stmt);
	    $noempty = mysqli_fetch_assoc($result);
	}

?>	
<main>
	<h1 style='background: pink; color: white; text-align:center'>Notificaciones</h1>
	<p style='background: lightpink; color: white; text-align:center;'>panel de notificaciones sobre su Organización</p><br>

<div style="height: 380px; overflow: auto;">
<?php
	
	if (empty($noempty)) {
		echo "<p style='text-align: center; color: #5A5A5A; margin-top:150px;'> Su Organización no tiene notificaciones</p><br>";
	}else{
		$i = 0;
		foreach ($result as $row) {
		$i++;

		switch ($row['Identificador']) {

			case '0':
				$sql = "SELECT * FROM revisado WHERE FK_Registro=? ORDER BY Fecha ASC LIMIT $i;";
				$stmt = mysqli_stmt_init($conn);
				if (!mysqli_stmt_prepare($stmt, $sql)) {
					echo 'Error: SQL Conection.';
					exit();		
				}else{
				    mysqli_stmt_bind_param($stmt, "i", $ID_Selected);
				    mysqli_stmt_execute($stmt);
				    $result1 = mysqli_stmt_get_result($stmt);
				    $row1 = mysqli_fetch_assoc($result1);

				    foreach ($result1 as $row1) {
				    	$fecha = $row1['Fecha'];
				    }

				}
				break;

			case '1':
				$sql = "SELECT * FROM correcciones_registro WHERE FK_Registro=? ORDER BY Fecha ASC LIMIT $i;";
				$stmt = mysqli_stmt_init($conn);
				if (!mysqli_stmt_prepare($stmt, $sql)) {
					echo 'Error: SQL Conection.';
					exit();		
				}else{
				    mysqli_stmt_bind_param($stmt, "i", $ID_Selected);
				    mysqli_stmt_execute($stmt);
				    $result1 = mysqli_stmt_get_result($stmt);
				    $row1 = mysqli_fetch_assoc($result1);

				    foreach ($result1 as $row1) {
				    	$fecha = $row1['Fecha'];
				    }

				}
				break;
			case '2':
				$sql = "SELECT * FROM rechazado WHERE FK_Registro=? ORDER BY Fecha ASC LIMIT $i;";
				$stmt = mysqli_stmt_init($conn);
				if (!mysqli_stmt_prepare($stmt, $sql)) {
					echo 'Error: SQL Conection.';
					exit();		
				}else{
				    mysqli_stmt_bind_param($stmt, "i", $ID_Selected);
				    mysqli_stmt_execute($stmt);
				    $result1 = mysqli_stmt_get_result($stmt);
				    $row1 = mysqli_fetch_assoc($result1);

				    $row['ID_Notificacion'] = $row1['FK_Registro'];

				    foreach ($result1 as $row1) {
				    	$fecha = $row1['Fecha'];
				    }

				}
				break;

			default:
				$Fecha = date("Y-m-d H:i");
				break;

		}	

    		Notificacion($row['Mensaje'],$row1['Fecha'],$row['Tipo'],$row['Vista'],$row['ID_Notificacion'],$row['Identificador'],$ID_Selected);


    	}	
	}


 
function Notificacion($Mensaje,$Fecha,$Tipo,$vista,$ID,$Identificador,$ID_Selected){
	$Fecha = date( "Y-m-d H:i", strtotime( $Fecha ) );
	if ($vista == 'si') {
		$colorvista = 'NoVisto';
	}else{
		$colorvista = 'vista';		
	}
?>

	<div class="Files_Container ">
		<div class="row " >
		   
		   <div class="cell -file notificacion <?php echo $colorvista ?>">
		      <i class="fa fa-address-card-o" aria-hidden="true"></i>
		      <div class="inner">
		      	<?php 
		      	switch ($Identificador) {
		      		case '1':
		      			echo "<a class='filename' href='Registro_Corregir.php?id=$ID'>".$Mensaje."</a>";
		      			break;
		      		case '0':
		      			echo "<a class='filename' href='Aceptado.php?id=$ID_Selected'>".$Mensaje."</a>";
		      			break;
		      		case '2':
		      			echo "<a class='filename' href='Rechazado.php?id=$ID'>".$Mensaje."</a>";
		      			break;
		      		
		      		default:
		      			echo "<a class='filename' href='#'>".$Mensaje."</a>";
		      			break;
		      	}
		      	?>
		         <small class="details">
		         	<span class="detail -filesize"><i class="fa fa-commenting-o" aria-hidden="true"></i><?php echo $Tipo; ?></span>
		            <span class="detail -updated"><i class="fa fa-clock-o" aria-hidden="true"></i><?php echo $Fecha;?></span>
		         </small>
		      </div>
		   </div>
		   
		   <?php if ($vista ==  'si') { 	?>
		   		<button class="cell -action  notificacion <?php echo $colorvista ?>">
		      		<i class="fa fa-eye-slash" aria-hidden="true"></i>
		      		<span class="label">Marcar como visto</span>
		   		</button>
		   	<?php 
		   } else { ?>
		   		<button class="cell -action -download notificacion <?php echo $colorvista ?>">
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

</div>
</main>
<div id="myModal" class="modal">


  <!-- Modal content -->
  <div class="modal-content">
    <div class="modal-header dontselect">
      <span class="close">&times;</span>
		<h2>Registro</h2><br>
    </div>
    <div class="modal-body">
    	<br><br>
    	<p style="font-size: 30px; text-align: center;">Su registro a sido aceptado.</p>
    	<br><br>
    </div>
    <div class="modal-footer">
    	<br>
    </div>
  </div>
</div>
<?php

/* manda a llamar a footer.php */ 
	require"footer.php";

/* el   header.php / index.php / footer.php   son en esencia una sola pagina php, se hace de esta forma para reutilizar codigo de forma facil y rapida */
?>