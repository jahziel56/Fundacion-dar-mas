<?php
	require"classes/header.php";  
	require 'includes/dbh.inc.php';
	require 'no_login.php';

//echo $_SESSION['user_Id'];
$Tipo = $_SESSION['Type_User'];


switch ($Tipo){
	case 1:
		header("Location: index.php");	
		break; 
	case 3:
		//header("Location: /Panel_Informacion.php");	
		break; 
}


date_default_timezone_set('America/Hermosillo');
$date_year = date("Y-m-");
$date_dia = date("j");


$date = $date_year . $date_dia;

	$sql = "SELECT * FROM revisando WHERE Fecha < ?;";
	$stmt = mysqli_stmt_init($conn);
	if (!mysqli_stmt_prepare($stmt, $sql)) {
		//header("Location: ../login.php?error=sqlerror");
		echo 'error';
		exit();		
	}else{
		mysqli_stmt_bind_param($stmt, "s", $date);
		mysqli_stmt_execute($stmt);
		$result = mysqli_stmt_get_result($stmt);

		while ($row = mysqli_fetch_assoc($result)) {
			Update_registro('No Revisado', $row['FK_Registro'], $conn);
			Delete_correcciones($row['ID_Revisando'], $conn);
		}		
	}



function Update_registro($Estado,$ID_Registro, $conn){

	$sql = "UPDATE registro SET Estado = ? WHERE ID_Registro=?;";        
	$stmt = mysqli_stmt_init($conn);
	if (!mysqli_stmt_prepare($stmt, $sql)) {
		//header("Location: ../../index.php?SQL=Error_Update");
		exit();
	}else{
		mysqli_stmt_bind_param($stmt, "si", $Estado,$ID_Registro);
		if(!mysqli_stmt_execute($stmt)){
			throw new Exception('error!');
		}
	}
}

function Delete_correcciones($Registro_ID, $conn){

	$sql = "DELETE FROM revisando WHERE ID_Revisando=?";
	$stmt = mysqli_stmt_init($conn);
	if (!mysqli_stmt_prepare($stmt, $sql)) {
		//header("Location: ../../index.php?SQL=Error_Update");
		exit();
	}else{
		mysqli_stmt_bind_param($stmt, "i",$Registro_ID);
		if(!mysqli_stmt_execute($stmt)){
			throw new Exception('error!');
		}
	}
}


	$statment = $conn->prepare("SELECT * FROM registro INNER JOIN datos_generales on registro.ID_Registro = datos_generales.FK_Registro where registro.Estado = 'No Revisado' || registro.Estado = 'Corregido'");
	$statment->execute();
	$resultados = $statment->get_result();
	$row = mysqli_fetch_assoc($resultados);


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
<main class="hide" >
	<div class="Bar_change" style="">
		<div>
			<i class="fa fa-caret-left" aria-hidden="true"></i>
			Registros
		</div>
		<div>
			Convocatorias
			<i class="fa fa-caret-right" aria-hidden="true"></i>
		</div>
	</div>
</main>
<main>

	<h2 style="float: left;">Registros</h2><br>

	<button id="myBtn" class="Info_button tooltip">
		<i class='fa fa-info fa-2x'></i>
		<span class="tooltiptext">Estados de las convocatorias</span>		
	</button>




<div style="height: 390px;  overflow: auto; width: 100%" >
	<table>
	  <tr>
	    <th>Nombre Organizacional</th>
	    <th>RFC Organizacional</th>
	    <th>Fecha</th>
	   	<th>Estado</th>
	   	<th style="width: 12%">Número de revisiones</th>
	    <th>Revisar</th>
	  </tr>

		<?php if(empty($row)){ ?>
			</table>
			<table>  		
				<th style="text-align: center;">No hay convocatorias en proceso..</th>
			</table>	
		<?php }else{ ?>	

			<?php foreach($resultados as $a) {?>				  		
				<tr>
					<td><?php echo $a['nombreOSC']?></td>
					<td><?php echo $a['RFC_Organizacional']?></td>
					<td><?php echo $a['Fecha_Registro']?></td>
					<td><?php echo $a['Estado']?></td>
					<td><?php echo $a['Num_Reviciones']?></td>
					<td><?php echo "<a class='Hoverr' href='Registro_Revisar.php?id=".$a['ID_Registro']."'><i class='fa fa-eye fa-2x'></a>";?></td>
                    

				</tr>				  	   
			<?php } ?>
			</table><br>
		<?php } ?>
	</div>
	<br>
</main>

<!-- The Modal -->
<div id="myModal" class="modal">

  <!-- Modal content -->
  <div class="modal-content">
    <div class="modal-header dontselect">
      <span class="close">&times;</span>
		<h2>Estados de las convocatorias</h2><br>
    </div>
    <div class="modal-body dontselect">
    	<table style="text-align: initial;">
    		<td><h4>Aceptado</h4><p>La convocatoria se a revisado y fue aceptada</p></td>
    	</table>
    	<table style="text-align: initial;">
			<td><h4>Rechazado</h4><p>La convocatoria se a revisado mas de 3 veces y fue rechazada</p></td>
		</table>
    	<table style="text-align: initial;">
			<td><h4>Revision</h4><p>Se esta revisando por un empleado</p></td>
		</table>
    	<table style="text-align: initial;">
			<td><h4>Revisado con Observaciones</h4><p>El emplado a revisado la solicitud pero a habido observaciones con esta y se a mandado a correcion</p></td>
		</table>
    	<table style="text-align: initial;">
			<td><h4>Corregido</h4><p>La convocatoria a tenido observaciones, estos se "corrigieron" y se a enviado nueva mente para su revision</p></td>
		</table>
    	<table style="text-align: initial;">
			<td><h4>No Revisado</h4><p>La convocatoria se envio, No se a revisado</p></td>
		</table>
    </div>
    <div class="modal-footer">
    	<br>
    </div>
  </div>

</div>

<script>
// Get the modal
var modal = document.getElementById("myModal");

// Get the button that opens the modal
var btn = document.getElementById("myBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal 
btn.onclick = function() {
  modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}
</script>
