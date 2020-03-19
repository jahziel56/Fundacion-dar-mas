<?php  
	require 'includes/dbh.inc.php';
	require"classes/header.php";

		if (!isset ($_SESSION['Darmas_Empleado_Modificar'])) {
			$_SESSION['Darmas_Empleado_Modificar'] = $_POST['id'];
			$id = $_SESSION['Darmas_Empleado_Modificar'];
		}else{
			$id = $_SESSION['Darmas_Empleado_Modificar'];			
		}


		$sql = "SELECT * FROM empleados WHERE EmpleadoID=?;";
		$stmt = mysqli_stmt_init($conn);
		if (!mysqli_stmt_prepare($stmt, $sql)) {
			echo 'Error: SQL Conection.';
			exit();		
		}else{
			mysqli_stmt_bind_param($stmt, "i", $id);
			mysqli_stmt_execute($stmt);
			$result = mysqli_stmt_get_result($stmt);
			$row = mysqli_fetch_assoc($result);
		}

		$sql = "SELECT * FROM cuenta WHERE Id_Cuenta=?;";
		$stmt = mysqli_stmt_init($conn);
		if (!mysqli_stmt_prepare($stmt, $sql)) {
			echo 'Error: SQL Conection.';
			exit();		
		}else{
			mysqli_stmt_bind_param($stmt, "i", $row['FK_Cuenta']);
			mysqli_stmt_execute($stmt);
			$result = mysqli_stmt_get_result($stmt);
			$row_C = mysqli_fetch_assoc($result);
		}


$I = 1;
?>


	<main>
		<h1 style='background: #A04000; color: white; text-align:center'>Modificar cuenta de empleados</h1>
		<p style='background: #E67E22; color: white; text-align:center;'>Registros </p><br>


				<form action="includes/modificar_empleado.inc.php" method="post" class="Signup" style="padding: 8px 12px">
				<label>Información de acceso </label>
				<input class="common" type="text" name="usuario" placeholder="Nombre de usuario" value="<?php echo $row_C['Username']; ?>" required>
				<input class="common" type="email" name="mail" placeholder="Correo" value="<?php echo $row_C['Email']; ?>" required>


            <div style="margin: auto;">
            <div style="display: flex;">

				<div class="inputGroup inputGroup_F" style="width: 33%; margin: 10px 5px;">
					<input id="option1" type="radio" name="Set_Reset_Password" class="comentario" value="1" onClick="quitarComentario(this.id)"/>
					<label for="option1">Desea cambiar la antigua contraseña?</label>
				</div>

				<div class="inputGroup inputGroup_F" style="width: 43%; margin: 10px 5px;">
					<input id="option2" type="radio" name="Set_Reset_Password" class="comentario" value="2" onClick="quitarComentario(this.id)" checked="checked" required/>
					<label for="option2">Que el empleado cambie la contraseña mediante un link de correo</label>
				</div>

				<div class="inputGroup inputGroup_F" style="width: 22%; margin: 10px 5px; background: ; ">
					<input id="option3" type="radio" name="Set_Reset_Password" class="comentario" value="3" onClick="quitarComentario(this.id)"/>
					<label for="option3">Mantener Contraseña</label>
				</div>
			</div>
			<div id="divComment1" class="hide" >
                <input class="common" type="password" name="password" placeholder="Contraseña" value="">
			</div>
			</div>
			<br>

			<label>Información Personal </label>
			<input class="common" type="text" name="nombreEmpleado" placeholder="Nombre de empleado" value="<?php echo $row['nombreEmpleado']; ?>" required>
            <input class="common" type="text" name="apellidoEmpleado" placeholder="Apellido de empleado" value="<?php echo $row['apellidoEmpleado']; ?>" required>


			<button class="common" type="submit" name="modificar_empleado">Modificar</button>
			</form>
	</main>

<?php  
/* manda a llamar a footer.php */ 
	require"footer.php";
?>

<script>
	function quitarComentario(CheckID) {
	  console.log("El id que has recibido como parametro es: " + CheckID);

	  var numero = CheckID.replace("option", "");

	  //var idComentario = "divComment" + numero;
	  //var idTextarea = "textarea" + numero;

	  var radio = document.getElementById(CheckID);

	  var comentario = document.getElementById("divComment1");
	  //var textarea = document.getElementById(idTextarea);

	  if (numero == 1) {
	    comentario.classList.remove("hide");
	    comentario.hidden = false;
	  }

	  if (numero == 2) {
	    //var idComentario = "divComment1";
	    //var idTextarea = "textarea1";

	    //var comentario = document.getElementById("divComment1");
	    //var textarea = document.getElementById("textarea1");

	    comentario.classList.add("hide");
	    comentario.hidden = true;
	    //textarea.value = "";
	  }
	}
</script>