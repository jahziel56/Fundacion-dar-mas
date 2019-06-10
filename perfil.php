<?php
/* manda a llamar a header.php */ 
	require"header.php";
?>
	<main>
		<div class="conten-alignt-center ">
		<label>Datos personales</label><br>
		<?php  
			if (isset($_SESSION['user_Id'])) {
			require 'includes/dbh.inc.php';


			$sql = "SELECT * FROM persona,cuenta WHERE Id_Cuenta_P=?;";
			$stmt = mysqli_stmt_init($conn);
			mysqli_stmt_prepare($stmt, $sql);
			mysqli_stmt_bind_param($stmt, "i", $_SESSION['user_Id']);
			mysqli_stmt_execute($stmt);
			$result = mysqli_stmt_get_result($stmt);
			$row = mysqli_fetch_assoc($result);

			echo "<input type='' name='' placeholder='{$row['Nombres']}' disabled>";
			echo "<input type='' name='' placeholder='{$row['Apellido_P']}' disabled>";
			echo "<input type='' name='' placeholder='{$row['Apellido_M']}' disabled><br>";
			echo "<input type='' name='' placeholder='{$row['Email']}' disabled><br>";	
			echo "<input type='' name='' placeholder='{$row['Telefono']}' disabled><br>";
			}
		?>
		</div>
	</main>

<?php
/* manda a llamar a footer.php */ 
	require"footer.php";

/* el   header.php / index.php / footer.php   son en esencia una sola pagina php, se hace de esta forma para reutilizar codigo de forma facil y rapida */
?>