<?php
/* manda a llamar a header.php */ 
	require"classes/header.php";
	require"includes/dbh.inc.php";

    $ID_Selected = isset($_GET['id'])? $_GET['id'] : "";

	$sql = "SELECT * FROM rechazado WHERE ID_Rechazo=?;";
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
        <?php echo $row['Razon']; ?>
    <br><br>
    </div>
    <br>
    <a class='P_B' href='Panel_Informacion.php' style='text-decoration: none; display: block;'>Regresar</a>

</main>
<?php
/* manda a llamar a footer.php */ 
	require"footer.php";
/* el   header.php / index.php / footer.php   son en esencia una sola pagina php, se hace de esta forma para reutilizar codigo de forma facil y rapida */
?>