<?php

    require "classes/header.php";
    require 'includes/dbh.inc.php';

    $usuarioID = $_SESSION['user_Id'];
    $nombreUsuario = $_SESSION['user_Username'];
    $tipoUsuario = $_SESSION['Type_User'];

    $consultarEmpleado = "SELECT * FROM empleados WHERE FK_Cuenta = ?";

    $stmt = mysqli_stmt_init($conn);
    mysqli_stmt_prepare($stmt, $consultarEmpleado);
    mysqli_stmt_bind_param($stmt, "i", $usuarioID);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $row = mysqli_fetch_assoc($result);

    $empleadoID = $row['EmpleadoID'];
    $nombreEmpleado = $row['nombreEmpleado'];

    $consultarAsignaciones = "SELECT * FROM registroasignado WHERE FK_Empleado = ?";

    $stmt2 = mysqli_stmt_init($conn);
    mysqli_stmt_prepare($stmt2, $consultarAsignaciones);
    mysqli_stmt_bind_param($stmt2, "i", $empleadoID);
    mysqli_stmt_execute($stmt2);
    $result2 = mysqli_stmt_get_result($stmt2);
    $row2 = mysqli_fetch_assoc($result2);

?>

<main>
	<div class="conten-alignt-center">
    <?php
        echo "<h3>¡Bienvenido, $nombreEmpleado!</h3><br>";
        echo "<h5>Estas son las convocatorias que tienes que revisar hoy:</h5><br>";
        
        foreach($result2 as $convocatoria){
            $convocatoriaID = $convocatoria['FK_Registro'];

            $consultarPreregistros = "SELECT * FROM preregistro WHERE RegistroID = ?";
            $stmt3 = mysqli_stmt_init($conn);
            mysqli_stmt_prepare($stmt3, $consultarPreregistros);
            mysqli_stmt_bind_param($stmt3, "i", $convocatoriaID);
            mysqli_stmt_execute($stmt3);
            $result3 = mysqli_stmt_get_result($stmt3);
            $row3 = mysqli_fetch_assoc($result3);
        }

        foreach($row3 as $preregistro){
            echo "<h6>Nombre de OSC: " . $preregistro['nombreOSC'] . "</h6>";
        }
        
    ?>					
	<br><br><br><br><br><br><br><br>
	<br><br><br><br><br><br><br><br>
	<br><br><br><br><br><br><br><br>
	<br><br><br><br><br><br><br><br>
	<br><br><br><br><br><br><br><br>
	</div>
</main>
<?php
/* manda a llamar a footer.php */ 
	require"footer.php";
/* el   header.php / index.php / footer.php   son en esencia una sola pagina php, se hace de esta forma para reutilizar codigo de forma facil y rapida */
?>