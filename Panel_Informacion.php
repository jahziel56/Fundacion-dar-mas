<?php
/* manda a llamar a header.php */ 
	require"classes/header.php";
	require 'includes/dbh.inc.php';


$empleados = Simple_Query($conn->prepare("SELECT * FROM empleados"), $conn);
$registros_totales = Simple_Query($conn->prepare("SELECT * FROM registro"), $conn);

			$array = array(
			    "0" => array(
			    	"Mensaje" => "Total de registros",
			    	"Valor" => "0"			        
			    ),
			    "1" => array(
			    	"Mensaje" => "Registros aceptados",
			    	"Valor" => "0"			        
			    ),
			    "2" => array(
			    	"Mensaje" => "Registros en proceso",
			    	"Valor" => "0"			        
			    )
			);

			foreach ($registros_totales as $row) {
				if ($row['Estado'] == 'Aceptado') {
					$array[1]['Valor']++;
				}else{
					$array[2]['Valor']++;
				}
				$array[0]['Valor']++;
			}



function Simple_Query($statment, $conn){
	$statment->execute();
	$resultado = $statment->get_result();
	return $resultado;
}	


	$sql = "SELECT * FROM correcciones_registro INNER JOIN registro ON correcciones_registro.FK_Registro = registro.ID_Registro	INNER JOIN empleados ON correcciones_registro.FK_Revisor = empleados.EmpleadoID";
	$stmt = mysqli_stmt_init($conn);
	if (!mysqli_stmt_prepare($stmt, $sql)) {
		//header("Location: ../login.php?error=sqlerror");
		echo 'error';
		exit();		
	}else{
		mysqli_stmt_execute($stmt);
		$result = mysqli_stmt_get_result($stmt);
		//$length = mysqli_num_rows($result);
		while ($row = mysqli_fetch_assoc($result)) {
			echo "<pre>";
			//print_r($row);
			echo "</pre>";
		}	
	}

	$arreglo[''] = '';
	foreach ($result as $row2) {
		echo $row2['EmpleadoID'];

		if (!isset($arreglo)) {
			$arreglo[$row2['EmpleadoID']][0] = $row2;
			continue;
		}

		if ($arreglo[$row2['EmpleadoID']] == $row2['EmpleadoID']) {
			$arreglo[$row2['EmpleadoID']++][1] == $row2;
		}else{
			$arreglo[$row2['EmpleadoID']][0] = $row2;	
		}
		

	}


	echo "<pre>";
	print_r($arreglo);
	echo "</pre>";































?>
<script src="js/Panel_Informacion.js"></script>

<main class="Bar_Panel">
	<div class="Bar_Panel_Info">
		<button class="accordion">Registros</button>
		<div class="panel">
			<label id="Registros_general" onclick="selectedPage(this.id)">Informacion general</label>
			<label id="Registros_totales" onclick="selectedPage(this.id)">Registros totales</label>
			<label id="Registros_Este_año" onclick="selectedPage(this.id)">Este año</label>
		</div>

		<button class="accordion">Convocatorias</button>
		<div class="panel">
			<label>Informacion general</label>
			<label>Este año</label>
			<label>Convocatorias 1</label>
		</div>

		<button class="accordion">Revisores</button>
		<div class="panel">
			<label id="Empleado" onclick="selectedPage(this.id)">Empleado</label>
			<?php 
			foreach($empleados as $a){
				echo "<label id='".$a['EmpleadoID']."' onclick='convocatoriasRevisor(this.id)'>".$a['apellidoEmpleado']." ".$a['nombreEmpleado']."</label>";		
			}
			?>
		</div>
	</div>


	<div class="Bar_Panel_Info Bar_Panel_Display" id="Registros_general_detalle">		
		<table class="lola">
			<tr></tr>

			<?php 
			imprimir_tr('Total de registros','12');
			imprimir_tr('Total de registros en el año','12');
			imprimir_tr('Total de registros no revisados','34534552');
						imprimir_tr('Total de registros','12');
			imprimir_tr('Total de registros en el año','12');
			imprimir_tr('Total de registros no revisados','34534552');
			?>	

		</table>

		<table class="lola">
			<tr></tr>

			<?php 
			imprimir_tr('Mensaje','12');
			?>	

		</table>

        <table class="lola">
			<tr></tr>

			<?php 
			imprimir_tr('Mensaje','8542');
			imprimir_tr('Mensaje','8553455');
			?>
				  	   
		</table>
	</div>



	<div class="Bar_Panel_Info Bar_Panel_Display" id="Registros_totales_detalle">
		<?php 
			table($array);			
		?>	
	</div>



	<div class="Bar_Panel_Info Bar_Panel_Display" id="Registros_este_año_detalle">
		<?php 
			table($array);
			table($array);
			table($array);

		?>	
	</div>

	<div class="Bar_Panel_Info Bar_Panel_Display hide" id="Empleado_detalle" style="display: none;">
		<?php 



		?>	
	</div>

</main>

<script>
var acc = document.getElementsByClassName("accordion");
var i;

for (i = 0; i < acc.length; i++) {
  acc[i].addEventListener("click", function() {
    this.classList.toggle("activetoggle");
    var panel = this.nextElementSibling;
    if (panel.style.maxHeight) {
      panel.style.maxHeight = null;
    } else {
      panel.style.maxHeight = panel.scrollHeight + "px";
    } 
  });
}
</script>
<?php
/* manda a llamar a footer.php */ 
	require"footer.php";

function imprimir_tr($Mensaje,$Resultado){ 
	if (strlen($Resultado) > 7  ) {
		$caracteres = 6;
		$NewResultado = substr($Resultado, 0, $caracteres).'...';

		?>
		<tr>
			<td><?php echo $Mensaje ?></td>
			<td class="tooltip"><?php echo $NewResultado ?>
				<span class="tooltiptext"><?php echo $Resultado ?></span>
			</td>		  
		</tr>
		<?php 	
	}else{
	?>
	<tr>
		<td><?php echo $Mensaje ?></td>
		<td><?php echo $Resultado ?></td>
	</tr>
	<?php
	}
}

function table($Array){ 
?>
	<table class="lola">
	<tr></tr>
	<?php 

	$largo = count($Array);

	for ($i=0; $i < $largo; $i++) {
		imprimir_tr($Array[$i]['Mensaje'],$Array[$i]['Valor']);
	}

	?>	
	</table>
	<?php
}

