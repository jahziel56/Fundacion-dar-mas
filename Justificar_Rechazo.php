<?php
/* manda a llamar a header.php */ 
	require"classes/header.php";
	require"includes/dbh.inc.php";

if (isset($_SESSION['Rechazado_Datos'])) {
    
    $Registro_ID = $_SESSION['Rechazado_Datos'];
    unset ($_SESSION["Rechazado_Datos"]);

}else{
    //header("Location: Registro_Lista.php");
}

    $Registro_ID = 1;

    $sql = "SELECT * FROM empleados WHERE FK_Cuenta=?;";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        echo 'Error: SQL Conection.';
        exit();     
    }else{
        mysqli_stmt_bind_param($stmt, "i" , $FK_Usuario);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        $row = mysqli_fetch_assoc($result);
    }

    
    		
?>
<main>
<h1 style='background: #e53935 ; color: white; text-align:center'>La convocatoria se a mandado a revisión mas de 3 veces</h1>
<p style='background: #b71c1c ; color: white; text-align:center;'>Registros </p><br>


<div style="text-align: center;">
	
</div>

</main>
<?php
/* manda a llamar a footer.php */ 
	require"footer.php";
/* el   header.php / index.php / footer.php   son en esencia una sola pagina php, se hace de esta forma para reutilizar codigo de forma facil y rapida */
?>