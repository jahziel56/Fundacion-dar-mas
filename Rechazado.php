<?php
/* manda a llamar a header.php */ 
	require"classes/header.php";
	require"includes/dbh.inc.php";

    if ($_SESSION['Type_User'] == 3) {
        $Regresar = 'Panel_Informacion.php';
    }elseif ($_SESSION['Type_User'] == 1) {
        $Regresar = 'Notificaciones.php';
    }else{
        $Regresar = 'index.php';
    }   

    $ID_Selected = isset($_GET['id'])? $_GET['id'] : "";


    $Dato = 'si';
    $sql = "UPDATE notificaciones SET Vista = ? WHERE ID_Notificacion=?;";        
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        //header("Location: ../../index.php?SQL=Error_Update");
        exit();
    }else{
        mysqli_stmt_bind_param($stmt, "si", $Dato,$ID_Selected);
        mysqli_stmt_execute($stmt);
    }


	$sql = "SELECT * FROM rechazado WHERE FK_Registro=?;";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        echo 'Error: SQL Conection.';
        exit();     
    }else{
        mysqli_stmt_bind_param($stmt, "i", $ID_Selected);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        $row = mysqli_fetch_assoc($result);
    }

    $sql = "SELECT * FROM detalle_rechazados WHERE FK_Rechazo=?;";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        echo 'Error: SQL Conection.';
        exit();     
    }else{
        mysqli_stmt_bind_param($stmt, "i" , $ID_Selected);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        $row2 = mysqli_fetch_assoc($result);
    }

    
    		
?>
<main>
<h1 style='background: #e53935 ; color: white; text-align:center'>La convocatoria de la organización </h1>
<p style='background: #b71c1c ; color: white; text-align:center;'><?php echo $row2['Nombre_OSC']; ?></p><br>

    <div class="div_main div_main_Red">La convocatoria a sido rechazada por</div>
    <div class="div_container">
        <?php 
        if (isset($row['Razon'])) {
            echo $row['Razon'];
        }else{
            echo '<br><p style="color: red; text-align: center;">Error: Justificacion del rechazo no encontrado.</p>';
        }
        ?>
    <br><br>
    </div> 
    <br>
    <a class='P_B' href='<?php echo $Regresar; ?>' style='text-decoration: none; display: block;'>Regresar</a>

</main>
<?php
/* manda a llamar a footer.php */ 
	require"footer.php";
/* el   header.php / index.php / footer.php   son en esencia una sola pagina php, se hace de esta forma para reutilizar codigo de forma facil y rapida */
?>