<?php
/* manda a llamar a header.php */ 
	require"classes/header.php";

			$array = array(
			    "0" => array(
			    	"Mensaje" => "Total de registros",
			    	"Valor" => " 12"			        
			    ),
			    "1" => array(
			    	"Mensaje" => "Total de personas",
			    	"Valor" => " 223"			        
			    ),
			    "2" => array(
			    	"Mensaje" => "Total de empresas",
			    	"Valor" => " 4"			        
			    )
			);

			$array2 = array(
			    "0" => array(
			    	"Mensaje" => "Total de putas",
			    	"Valor" => " 52353"			        
			    ),
			    "1" => array(
			    	"Mensaje" => "Total de penes",
			    	"Valor" => " 324"			        
			    ),
			    "2" => array(
			    	"Mensaje" => "Total de anos",
			    	"Valor" => " 5235"			        
			    )
			);

			$array3 = array(
			    "0" => array(
			    	"Mensaje" => "Total de chips fuego",
			    	"Valor" => " 4124"			        
			    ),
			    "1" => array(
			    	"Mensaje" => "Total de chips verdes",
			    	"Valor" => " 53"			        
			    ),
			    "2" => array(
			    	"Mensaje" => "Total de chips amarillas",
			    	"Valor" => " 4"			        
			    )
			);
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
			<label>Convocatorias 2</label>

		</div>

		<button class="accordion">Revisores</button>
		<div class="panel">
			<label>Carlos Ruiz</label>
			<label>Pancho Lopez</label>
			<label>Maria Flores</label>
		</div>

	</div>
<div class="Bar_Panel_Info Bar_Panel_Display" id="Registros_este_año_detalle">
	este años:
	nada...
</div>

		<div class="Bar_Panel_Info Bar_Panel_Display" id="Registros_totales_detalle">

		<?php 
		table($array);
		?>	


		<?php 
		table($array2);
		?>	

		<?php 
		table($array3);
		?>	
	</div>

	<div class="Bar_Panel_Info Bar_Panel_Display" id="Registros_general_detalle">		
		<table class="lola">
			<tr></tr>

			<?php 
			imprimir_tr('Total de registros','12');
			imprimir_tr('Total de registros en el año','12');
			imprimir_tr('Total de registros no revisados','12');

			imprimir_tr('pepe el toro','34534552');
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

/* el   header.php / index.php / footer.php   son en esencia una sola pagina php, se hace de esta forma para reutilizar codigo de forma facil y rapida */

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