<?php
/* manda a llamar a header.php */ 
	require"classes/header.php";
?>	
	
<main>
	<h1 style='background: DARKGOLDENROD; color: white; text-align:center'>Se a registrado Exitosamente</h1>
	<p style='background: TAN; color: white; text-align:center;'>Se a enviado la informacion de su registro a su correo orgacional</p><br><br><br>



	<h4 style="text-align: center;">Con esta informacion podra acceder al panel de organización y revisar la informacion de este</h4>
	<div style="font-size: 39px; color: white; background: purple; padding: 20px;">
		<p style="margin: 0 22%;">RFC:<?php echo "$rfcHomoclave"; ?></p>
		<p style="margin: 0 22%;">CLAVE:<?php echo "$Clave"; ?></p>
	</div>
	<br>

	<button class="common" type="submit" onclick="location.href='OSC_acces.php';">Ir al panel organizacional</button>

</main>



<?php
/* manda a llamar a footer.php */ 
	require"footer.php";

/* el   header.php / index.php / footer.php   son en esencia una sola pagina php, se hace de esta forma para reutilizar codigo de forma facil y rapida */
?>

