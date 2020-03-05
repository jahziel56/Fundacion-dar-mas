<?php  
	require"classes/header.php";

if (empty($_GET["id"])){
    echo "<main><div style='background: #B22222; color: white; text-align:center'>";
    echo "Rol no selecionado<br></div><br>";
    echo "<a class='P_B' href='http:Panel_De_Control.php' style='text-decoration: none; display: block;'>Regresar</a></main>";
    header("Location: Panel_De_Control.php");
    exit();
}else{	
		$id_Eliminar = $_GET['id'];
		require 'includes/dbh.inc.php';

		$sql = "SELECT * FROM rol WHERE Id_Rol=?;";
		$stmt = mysqli_stmt_init($conn);
		if (!mysqli_stmt_prepare($stmt, $sql)) {
			header("Location: ../login.php?error=sqlerror");
			exit();		
		}else{
			mysqli_stmt_bind_param($stmt, "i", $id_Eliminar);
			mysqli_stmt_execute($stmt);
			$result = mysqli_stmt_get_result($stmt);
			if ($row = mysqli_fetch_assoc($result)) {
?>

		<main class="div_40">
		<div style='background: #B22222; color: white; text-align:center'>
			Seguro que desea borrar el Rol de <?php echo $row['Nombre_Rol']; ?>?					
		</div>

<?php 
		$sql = "SELECT * FROM rol inner join empleados on rol.Id_Rol = empleados.FK_Roles  WHERE Id_Rol=?;";
		$stmt = mysqli_stmt_init($conn);
		if (!mysqli_stmt_prepare($stmt, $sql)) {
			header("Location: ../login.php?error=sqlerror");
			exit();		
		}else{
			mysqli_stmt_bind_param($stmt, "i", $id_Eliminar);
			mysqli_stmt_execute($stmt);
			$result = mysqli_stmt_get_result($stmt);
			if ($row = mysqli_fetch_assoc($result)){
?>

				<div style="background: #F4D03F; color: ">
					<div style="text-align: center">
						<i class="fa fa-exclamation-triangle" aria-hidden="true"></i>
							Hay Empleados con ese rol
						<i class="fa fa-exclamation-triangle" aria-hidden="true"></i>
					</div><br>

					Todos los empleados con este rol, pasaran al rol default
				</div>
				<button class="accordion">Ver Empleados Afectados</button> <div class="panel">

				<?php 					
				foreach ($result as $a) {
							echo $a['nombreEmpleado'].' '.$a['apellidoEmpleado'].'<br>';
				}
				echo '</div>';					
			}			
		}
 ?>




 				<br><br>
					<form action="includes/rol_eliminar.inc.php" method="post">
						<input type="hidden" name="id_Eliminar" value="<?php echo $id_Eliminar; ?>">
				    	<button class='P_B Btn_C_R float-right' style="width: 50%;" name="Rol_Eliminar_Borrar">Borrar</button>
				    </form>

				    <a class='P_B' href='Campos_Rol_Lista_Eliminar.php' style='text-decoration: none;'>Regresar</a>
				</main>

<script>
var acc = document.getElementsByClassName("accordion");
var i;

for (i = 0; i < acc.length; i++) {
  acc[i].addEventListener("click", function() {
    this.classList.toggle("activetoggle");
    var panel = this.nextElementSibling;
    if (panel.style.maxHeight){
      panel.style.maxHeight = null;
    } else {
      panel.style.maxHeight = panel.scrollHeight + "px";
    } 
  });
}
</script>
			    
			<?php 
			}else{
				echo "<main><div style='background: #B22222; color: white; text-align:center'>";
			    echo "No sea encontrado la convocatoria <label style='background: red; color: black;'> $id_Eliminar <label> <br></div><br>";
			    echo "<a class='P_B' href='http:Panel_De_Control.php' style='text-decoration: none; display: block;'>Regresar</a></main>";
			    exit();
				header("Location: ../Panel_De_Control..php?rol=no_rol");
				exit();	
			}
		}
	}


?>	