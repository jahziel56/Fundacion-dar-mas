<?php
/* manda a llamar a header.php */ 
	require"classes/header.php";
?>
	<main>


<div style="text-align: center;">
	<h2>Nombre del Rol</h2>

	<form action="Campos_Rol.php" method="get">
		<input type="text" class="common" id="Rol_Name" name="Rol_Name" placeholder="Nombre del rol a crear">
		<input type="text" class="common" id="Rol_Descripcion" name="Rol_Descripcion" placeholder="Descripcion del rol a crear">
		<br>
		<button type="submit" class="P_B" style="width: 100%;">Crear Rol</button>
	</form>

</div>
	</main>	