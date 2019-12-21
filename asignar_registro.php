<?php 
require"classes/header.php";
require 'includes/dbh.inc.php';

    $statment = $conn->prepare("SELECT * FROM empleados");
    $statment->execute();
    $empleados = $statment->get_result();

    $statment = $conn->prepare("SELECT * FROM formularioprincipal");
    $statment->execute();
    $solicitud = $statment->get_result();
?>

    <main>
		<h2>Asignar solicitudes a empleado</h2><br><br>

		<form action="includes/asignar.solicitud.php" method="post" class="Signup">
            <h6>Seleccione el empleado que revisará: </h6>
            <div class="selectdiv">
                <select name="empleadoSeleccionado" required>
                    <?php foreach ($empleados as $row) {?>
                        <option value="<?php echo $row['EmpleadoID']; ?>"><?php echo $row['nombreEmpleado'];?></option>
                    <?php } ?>
                </select>
            </div>
            <br><br>
            <h6>Seleccione la solicitud a registrar: </h6>

                    
            <div class="selectdiv">
                <select name="solicitudSeleccionada" required>            
                <?php foreach ($solicitud as $row) {?>
                    <option value="<?php echo $row['FormularioID']; ?>"><?php echo $row['nombreOSC'];?></option>
                <?php } ?>
                </select>
            </div>	
            <button class="common" type="submit" name="asignar-submit">Asignar</button>
        </form>

		<div class='conten-alignt-center'>
		</div>

	</main>;
    
<?php   
/* manda a llamar a footer.php */ 
	require"footer.php";
?>