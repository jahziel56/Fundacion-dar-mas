<?php
/* manda a llamar a header.php */ 
	require"classes/header.php";
?>
	

	<main>
		<label>Roles</label><br><br>

		<button class="P_B Btn_C_B"><a href='detalle_notificacion.php'><i class='fa fa-eye fa-2x'></i><br> Ver</a></button>

		<button class="P_B Btn_C_G"><a href='detalle_notificacion.php'><i class='fa fa-plus-circle fa-2x'></i><br>Crear</a></button>
		<button class="P_B Btn_C_Y"><a href='Campos_Rol.php'><i class='fa fa-pencil fa-2x'></i><br>Modificar</a></button>
		<button class="P_B Btn_C_R"><a href='detalle_notificacion.php'><i class='fa fa-trash fa-2x'></i><br>Eliminar</a></button>
		<br><br><br>
		<button class="P_B">Primary</button></br><br>
		<a href='creacion_empleados.php'>Crear empleado</a><br><br>
		<a href='asignar_registro.php'>Asignar pre-registro a empleado</a><br><br>

		<svg xmlns="http://www.w3.org/2000/svg" style="display: none">
		  <symbol id="checkmark" viewBox="0 0 24 24">
		    <path stroke-linecap="round" stroke-miterlimit="10" fill="none"  d="M22.9 3.7l-15.2 16.6-6.6-7.1">
		    </path>
		  </symbol>
		</svg>

		<div class="form-container">
		  <div class="promoted-checkbox">
		    <input id="tmp" type="checkbox" class="promoted-input-checkbox"/>
		    <label for="tmp">
		      <svg><use xlink:href="#checkmark" /></svg>      
		      Save   
		    </label>
		  </div>
		</div>

		<div class="conten-alignt-center">

										
		<br><br><br><br><br><br><br><br>
		<br><br><br><br><br><br><br><br>
		<br><br><br><br><br><br><br><br>
		<br><br><br><br><br><br><br><br>
		<br><br><br><br><br><br><br><br>
		</div>

	</main>


<?php
/* manda a llamar a footer.php */ 
	require"footer.php";

/* el   header.php / index.php / footer.php   son en esencia una sola pagina php, se hace de esta forma para reutilizar codigo de forma facil y rapida */
?>