<?php
/* manda a llamar a header.php */ 
	require"classes/header.php";
	require 'includes/dbh.inc.php';
	require 'includes/Panel_Informacion.inc.php';

	if ($_SESSION['Type_User'] != 3) {
		header("Location: index.php");
	}	

?>

<main class="div_95">
<h1 style='background: MEDIUMSEAGREEN; color: white; text-align:center'>Panel de Informacion</h1>
<p style='background: SEAGREEN; color: white; text-align:center;'>Registros </p><br>


  <label>Buscar</label>		
    <div class="selectdiv">
      <select name="tipoCuenta" id="singleSelectValueDDJS" onchange="singleSelectChangeValue()" required> 
		    	<option value="0">Por Folio</option>
				<option value="1">Por Solicitante</option>
				<option value="2">Por Revisor</option>
				<option value="3">Por Fecha</option>
				<option value="4">Por Numero de reviciones</option>
				<option value="5">Por Estado</option>
			</select>
		</div>
		<input type="text" class="common" id="myInput" onkeyup="ymFunction()" placeholder="Search for names.." title="Type in a name">


<div id="myTable">
<table>
	<tr>
		<th>Folio</th>
	    <th>Solicitante</th>
	    <th>Fecha Enviada<br> Año/Mes/Dia</th>
	    <th style="min-width: 170px;">Revisor</th>
	   	<th>Fecha Revisado<br> Año/Mes/Dia</th>
	   	<th style="width: 10%">Número de revisiones</th>
	   	<th>Estado</th>
	   	<th style="min-width: 210px">Opciones</th>
	</tr>
<?php 


foreach ($result as $row) {
	Tr_Solicitante($row); 
}



?>
</table>
</div>
</main>

<?php
/* manda a llamar a footer.php */ 
	require"footer.php";

function Tr_Solicitante($row){?>

	<tr>
		<td><?php echo $row['ID_Registro']; ?></td>
		<td><?php echo $row['nombreOSC']; ?></td>
		<td>
			<label class="tooltip">
			<?php echo date( "Y/m/d", strtotime( $row['Fecha_Registro'] ) );?>
			<span class="tooltiptext_panel"><?php echo date( "Y/m/d", strtotime( $row['Fecha_Registro'] ) ); echo "  ".date( "G:i:s", strtotime( $row['Fecha_Registro'] ) );  ?></span>		
			</label>
		</td>

		<td><?php revisado($row['ID_Registro']);  ?></td>


		<td><?php 
		switch ($row['Estado']) {
			case 'Aceptado':
				$sql = "SELECT * FROM revisado WHERE FK_Registro = ?";
				fecha($sql,$row['ID_Registro']);
				break;

			case 'Rechazado':
				$sql = "SELECT * FROM rechazado WHERE FK_Registro = ?";
				fecha($sql,$row['ID_Registro']);
				break;
			default:
				echo 'Sin revisar';
				break;
		}
		?></td>

		<td><?php echo $row['Num_Reviciones']; ?></td>
		<td><?php echo $row['Estado']; ?></td>
		<td>
			<form action="Pre_Registro_New_Ver.php" method="post">
				<button class="Panel_Boton" name="Registro" style="background: #388e3c;" value="<?php echo $row['ID_Registro']; ?>"><span>Informacion Registro</span></button>
			</form>
		<?php 
		switch ($row['Estado']) {
			case 'Revisado con Observaciones':
				?><button class="Panel_Boton" style="background: #fbc02d;" ><a class='filename' href='Registro_Corregir.php?id=<?php Correciones($row['ID_Registro']); ?>'>Correciones</a></button><?php 
				break;

			case 'Rechazado':
				?><button class="Panel_Boton" style="background: #d32f2f;" ><a href='Rechazado.php?id=<?php echo $row['ID_Registro']; ?>'>Rechazado</a></button><?php 
				break;
		}		
		?>
			<button class="Panel_Boton" style="background: #0288d1 ;" ><a href="Archivos_Lista_Convocatoria.php?id=<?php echo $row['ID_Registro']; ?>">Documentos</a></button>
		</td>
	</tr>


<script>
document.addEventListener('DOMContentLoaded', function() {
	select = 0;
    //alert("Ready!");
    //window.alert(select);    
}, false);


    function singleSelectChangeValue() {
    	//window.alert(select);
        //Getting Value
        //var select = document.getElementById("singleSelectDD").value;
        var selObj = document.getElementById("singleSelectValueDDJS");
        select = selObj.options[selObj.selectedIndex].value;
        //Setting Value
        //document.getElementById("textFieldValueJS").value = select;

        ymFunction();
    }

function ymFunction() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[select];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }       
  }
}
</script>
<?php 
}

function fecha($sql,$Registro){

	require 'includes/dbh.inc.php';

	$stmt = mysqli_stmt_init($conn);
	if (!mysqli_stmt_prepare($stmt, $sql)) {
		//header("Location: ../login.php?error=sqlerror");
		echo 'error';
		exit();		
	}else{
		mysqli_stmt_bind_param($stmt, "i", $Registro);
		mysqli_stmt_execute($stmt);
		$result = mysqli_stmt_get_result($stmt);
		$row1 = mysqli_fetch_assoc($result);
	}
	$fecha_Revisado = $row1['Fecha'];

	?>
		<label class="tooltip">
			<?php 	echo date( "Y/m/d", strtotime( $fecha_Revisado ) );?>
			<span class="tooltiptext_panel"><?php echo date( "Y/m/d", strtotime( $fecha_Revisado ) ); echo "  ".date( "G:i:s", strtotime( $fecha_Revisado ) );  ?></span>		
		</label>
	<?php 
}

function revisado($Registro){

	require 'includes/dbh.inc.php';

	$sql = "SELECT * FROM revisado WHERE FK_Registro = ?";
	$stmt = mysqli_stmt_init($conn);
	if (!mysqli_stmt_prepare($stmt, $sql)) {
		//header("Location: ../login.php?error=sqlerror");
		echo 'error';
		exit();		
	}else{
		mysqli_stmt_bind_param($stmt, "i", $Registro);
		mysqli_stmt_execute($stmt);
		$result = mysqli_stmt_get_result($stmt);
		$row1 = mysqli_fetch_assoc($result);
	}

	$sql = "SELECT * FROM registro WHERE ID_Registro = ?";
	$stmt = mysqli_stmt_init($conn);
	if (!mysqli_stmt_prepare($stmt, $sql)) {
		//header("Location: ../login.php?error=sqlerror");
		echo 'error';
		exit();		
	}else{
		mysqli_stmt_bind_param($stmt, "i", $Registro);
		mysqli_stmt_execute($stmt);
		$result = mysqli_stmt_get_result($stmt);
		$row2 = mysqli_fetch_assoc($result);
	}

		switch ($row2['Estado']) {
			case 'Aceptado':
				Empleado_nombre($row1['FK_Empleado'], $conn);
				break;

			case 'Revisado con Observaciones':
				$sql = "SELECT * FROM correcciones_registro WHERE FK_Registro = ?";
				$stmt = mysqli_stmt_init($conn);
				if (!mysqli_stmt_prepare($stmt, $sql)) {
					//header("Location: ../login.php?error=sqlerror");
					echo 'error';
					exit();		
				}else{
					mysqli_stmt_bind_param($stmt, "i", $Registro);
					mysqli_stmt_execute($stmt);
					$result = mysqli_stmt_get_result($stmt);
					$row = mysqli_fetch_assoc($result);
				}

				Empleado_nombre($row['FK_Revisor'], $conn);
				break;

			case 'Rechazado':
				$sql = "SELECT * FROM rechazado WHERE FK_Registro = ?";
				$stmt = mysqli_stmt_init($conn);
				if (!mysqli_stmt_prepare($stmt, $sql)) {
					//header("Location: ../login.php?error=sqlerror");
					echo 'error';
					exit();		
				}else{
					mysqli_stmt_bind_param($stmt, "i", $Registro);
					mysqli_stmt_execute($stmt);
					$result = mysqli_stmt_get_result($stmt);
					$row = mysqli_fetch_assoc($result);
				}

				Empleado_nombre($row['FK_Empleado'], $conn);
				break;
			
			default:
				echo 'Sin revisar';
				break;
		}


}


function Empleado_nombre($ID_EMPLADO, $conn){

	$sql = "SELECT * FROM empleados WHERE EmpleadoID = ?";
	$stmt = mysqli_stmt_init($conn);
	if (!mysqli_stmt_prepare($stmt, $sql)) {
		//header("Location: ../login.php?error=sqlerror");
		echo 'error';
		exit();		
	}else{
		mysqli_stmt_bind_param($stmt, "i", $ID_EMPLADO);
		mysqli_stmt_execute($stmt);
		$result = mysqli_stmt_get_result($stmt);
		$row = mysqli_fetch_assoc($result);
		if (isset($row['nombreEmpleado'])) {

			?>
			<label class="tooltip">
			<?php echo $row['nombreEmpleado'];?>
			<span class="tooltiptext_panel" style="width: 280px; left: -40%;"><?php echo $row['nombreEmpleado']; echo " ".$row['apellidoEmpleado'];  ?></span>		
			</label>
			<?php 
			
		}else{
			echo 'Revisor desconocido';
		}

	}

}

function Correciones($ID_Registro){

	require 'includes/dbh.inc.php';


	$sql = "SELECT * FROM notificaciones WHERE FK_registro = ? and Identificador = 1  ORDER BY ID_Notificacion DESC LIMIT 1";
	$stmt = mysqli_stmt_init($conn);
	if (!mysqli_stmt_prepare($stmt, $sql)) {
		//header("Location: ../login.php?error=sqlerror");
		echo 'error';
		exit();		
	}else{
		mysqli_stmt_bind_param($stmt, "i", $ID_Registro);
		mysqli_stmt_execute($stmt);
		$result = mysqli_stmt_get_result($stmt);
		$row = mysqli_fetch_assoc($result);
		echo $row['ID_Notificacion'];		
	}

}
?>
