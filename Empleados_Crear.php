<?php
/* manda a llamar a header.php */ 
	require"classes/header.php";
?>
<!-- /* Pagina de registro */ -->
	<main>
		<div class="signup">				
			<h1>Crear cuenta de empleado</h1>
			<?php 
			require 'includes/dbh.inc.php';

			$statment = $conn->prepare("SELECT * FROM rol");
			$statment->execute();
			$resultados = $statment->get_result();
			?>			
				<form action="includes/signup.inc.empleado.php" method="post" class="Signup">
					<input class="common" type="text" name="uid" placeholder="Nombre de usuario" required>
					<input class="common" type="email" name="mail" placeholder="Correo" required>
					<input class="common" type="password" name="pwd" placeholder="Contraseña" id="myInput" required>
					<input class="common" type="password" name="pwd-repeat" placeholder="Repita la Contraseña" id="myInput">
                    <input class="common" type="text" name="nombreEmpleado" placeholder="Nombre de empleado" required>
                    <input class="common" type="text" name="apellidoEmpleado" placeholder="Apellido de empleado" required>
                    <p>Seleccione el rol de la cuenta</p>
                    <div class="selectdiv">
	                    <select name="tipoCuenta" required> 
				            <?php 	foreach($resultados as $a) {?>
				                <option value="<?php echo $a['Id_Rol']; ?>"><?php echo $a['Nombre_Rol'];?></option>
				            <?php } ?>
						</select>
					</div>
					<br>
					<button class="common" type="submit" name="signup-submit">Signup</button>
				</form>
		</div>
	</main>

<?php  
/* manda a llamar a footer.php */ 
	require"footer.php";
?>