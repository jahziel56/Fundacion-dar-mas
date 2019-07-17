<?php 

require"classes/header.php";

    $conn1 = new PDO("mysql:host=localhost;dbname=sistemadarmas", "root", "");

    $stmt1 = $conn1->prepare("SELECT * FROM empleados");
    $stmt1->execute();

    $stmt2 = $conn1->prepare("SELECT * FROM formularioprincipal");
    $stmt2->execute();
?>

    <main>
		<h2>Asignar solicitudes a empleado</h2><br><br>

		<form action="includes/asignar.solicitud.php" method="post" class="Signup">
            <h6>Seleccione el empleado que revisará: </h6>
            <select name="empleadoSeleccionado" required>
                <?php while($row1 = $stmt1->fetch()) {?>
                    <option value="<?php echo $row1['EmpleadoID']; ?>"><?php echo $row1['nombreEmpleado'];?></option>
                <?php } ?>
            </select>
            <br><br>
            <h6>Seleccione la solicitud a registrar: </h6>
            <select name="solicitudSeleccionada" required>            
            <?php while($row2 = $stmt2->fetch()) {?>
                <option value="<?php echo $row2['FormularioID']; ?>"><?php echo $row2['nombreOSC'];?></option>
            <?php } ?>
            </select>		
            <button class="common" type="submit" name="asignar-submit">Asignar</button>
        </form>

		<div class='conten-alignt-center'>
		</div>

	</main>;
    
<?php   
/* manda a llamar a footer.php */ 
	require"footer.php";

/* el   header.php / index.php / footer.php   son en esencia una sola pagina php, se hace de esta forma para reutilizar codigo de forma facil y rapida */
?>