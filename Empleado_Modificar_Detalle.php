<?php  
	require 'includes/dbh.inc.php';
	require"classes/header.php";

		//$id_Eliminar = $_GET['id'];


		/*$sql = "SELECT * FROM empleados INNER JOIN rol on empleados.FK_Roles = rol.Id_Rol WHERE EmpleadoID=?;";
		$stmt = mysqli_stmt_init($conn);
		if (!mysqli_stmt_prepare($stmt, $sql)) {
			header("Location: ../login.php?error=sqlerror");
			exit();		
		}else{
			mysqli_stmt_bind_param($stmt, "i", $id_Eliminar);
			mysqli_stmt_execute($stmt);
			$result = mysqli_stmt_get_result($stmt);
			if ($row = mysqli_fetch_assoc($result)){
			}
		}*/	
?>


	<main>
		<div class="signup">				
			<h1>Modificar cuenta de empleado</h1>
			<?php 
			require 'includes/dbh.inc.php';

			/*$statment = $conn->prepare("SELECT * FROM rol");
			$statment->execute();
			$resultados = $statment->get_result();*/
			?>			
				<form action="includes/signup.inc.empleado.php" method="post" class="Signup">
				<input class="common" type="text" name="nombreEmpleado" placeholder="Nombre de empleado" value="<?php echo $row['nombreEmpleado']; ?>" required>
                <input class="common" type="text" name="apellidoEmpleado" placeholder="Apellido de empleado" value="<?php echo $row['apellidoEmpleado']; ?>" required>
                <input class="common" type="email" name="mail" placeholder="Correo" value="<?php echo $row['correoEmpleado']; ?>" required>
                <input class="common" type="email" name="mail" placeholder="Correo" value="<?php echo $row['Nombre_Rol']; ?>" disabled>



                <p>Seleccione el nuevo rol de la cuenta</p>
                	<div class="selectdiv">
	                    <select name="tipoCuenta" required> 
	                    	<option value=""></option>
				            <?php foreach($resultados as $a) {?>
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