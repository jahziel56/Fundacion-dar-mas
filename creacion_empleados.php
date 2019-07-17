<?php
/* manda a llamar a header.php */ 
	require"classes/header.php";
?>
<!-- /* Pagina de registro */ -->
	<main>
		<div class="signup">				
			<h1>Crear cuenta de empleado</h1>
			<?php 
				if (isset($_GET['error'])) {
					if (($_GET['error']) == "emptyfields") {
						echo '<p class"signuperror">LLene todos los campos!</p>';
					}
					else if (($_GET['error']) == "invalidmailuid") {
						echo '<p class"signuperror">LLene Correctamente el correo y El nombre de usuario!</p>';					
					}
					else if (($_GET['error']) == "invalidmail") {
						echo '<p class"signuperror">LLene Correctamente el correo!</p>';					
					}
					else if (($_GET['error']) == "invaliduid") {
						echo '<p class"signuperror">LLene Correctamente El nombre de usuario!</p>';					
					}
					else if (($_GET['error']) == "passwordcheck") {
						echo '<p class"signuperror">Repita Correctamente La contraseña!</p>';
					}
					else if (($_GET['error']) == "usertaken") {
						echo '<p class"signuperror">El nombre de usuario ya existe!</p>';
					}
					else if (($_GET['error']) == "usermail") {
						echo '<p class"signuperror">Ya existe una cuenta con ese correo</p>';
					}
				}
				if (isset($_GET['signup'])) {
					if (($_GET['signup']) == "success") {
						echo '<p class"signuperror">Signup successful!</p>';
					}
				}

			$conn1 = new PDO("mysql:host=localhost;dbname=sistemadarmas", "root", "");
		    $stmt2 = $conn1->prepare("SELECT * FROM rol");
		    $stmt2->execute();

			?>			
				<form action="includes/signup.inc.empleado.php" method="post" class="Signup">
					<input class="common" type="text" name="uid" placeholder="Nombre de usuario" required>
					<input class="common" type="email" name="mail" placeholder="Correo Institucional" required>
					<input class="common" type="password" name="pwd" placeholder="Contraseña" id="myInput" required>
					<input class="common" type="password" name="pwd-repeat" placeholder="Repita la Contraseña" id="myInput">
                    <input class="common" type="text" name="nombreEmpleado" placeholder="Nombre de empleado" required>
                    <input class="common" type="text" name="apellidoEmpleado" placeholder="Apellido de empleado" required>
                    <label>Seleccione el tipo de cuenta: </label>
                    <select name="tipoCuenta" required>                   	

		            <?php while($row2 = $stmt2->fetch()) {?>
		                <option value="<?php echo $row2['Id_Rol']; ?>"><?php echo $row2['Nombre_Rol'];?></option>
		            <?php } ?>

					</select>
					<button class="common" type="submit" name="signup-submit">Signup</button>
				</form>
		</div>
	</main>

<?php  
/* manda a llamar a footer.php */ 
	require"footer.php";
?>