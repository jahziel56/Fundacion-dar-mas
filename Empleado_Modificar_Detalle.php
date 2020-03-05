<?php  
	require 'includes/dbh.inc.php';
	require"classes/header.php";

		$id_Eliminar = $_GET['id'];


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

		$sql = "SELECT * FROM empleados WHERE EmpleadoID=?;";
		$stmt = mysqli_stmt_init($conn);
		if (!mysqli_stmt_prepare($stmt, $sql)) {
			echo 'Error: SQL Conection.';
			exit();		
		}else{
			mysqli_stmt_bind_param($stmt, "i", $id_Eliminar);
			mysqli_stmt_execute($stmt);
			$result = mysqli_stmt_get_result($stmt);
			$row = mysqli_fetch_assoc($result);
		}


$I = 1;
?>


	<main>
		<h1 style='background: #A04000; color: white; text-align:center'>Modificar cuenta de empleados</h1>
		<p style='background: #E67E22; color: white; text-align:center;'>Registros </p><br>


				<form action="includes/signup.inc.empleado.php" method="post" class="Signup" style="padding: 8px 12px">

				<input class="common" type="text" name="nombreEmpleado" placeholder="Nombre de empleado" value="<?php echo $row['nombreEmpleado']; ?>" required>
                <input class="common" type="text" name="apellidoEmpleado" placeholder="Apellido de empleado" value="<?php echo $row['apellidoEmpleado']; ?>" required>
                <input class="common" type="email" name="mail" placeholder="Correo" value="<?php echo $row['correoEmpleado']; ?>" required>

            <div style="margin: auto;">
            <div style="display: flex;">

				<div class="inputGroup inputGroup_F" style="width: 33%; margin: 10px 5px;">
					<input id="option1" type="radio" name="Set_Reset_User" class="comentario" value="1" onClick="quitarComentario(this.id)"/>
					<label for="option1">Desea cambiar la antigua contraseña?</label>
				</div>

				<div class="inputGroup inputGroup_F" style="width: 43%; margin: 10px 5px;">
					<input id="option2" type="radio" name="Set_Reset_User" class="comentario" value="2" onClick="quitarComentario(this.id)" checked="checked" required/>
					<label for="option2">Que el empleado cambie la contraseña mediante un link de correo</label>
				</div>

				<div class="inputGroup inputGroup_F" style="width: 22%; margin: 10px 5px; background: ; ">
					<input id="option3" type="radio" name="Set_Reset_User" class="comentario" value="3" onClick="quitarComentario(this.id)"/>
					<label for="option3">Mantener Contraseña</label>
				</div>
			</div>
			<div id="divComment1" class="hide" >
                <input class="common" type="password" name="password" placeholder="Contraseña" value="">
			</div>
			</div>
			<br>

			<button class="common" type="submit" name="signup-submit">Modificar</button>
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