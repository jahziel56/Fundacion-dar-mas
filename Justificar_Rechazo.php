<?php
/* manda a llamar a header.php */ 
	require"classes/header.php";
	require"includes/dbh.inc.php";

if (isset($_SESSION['Rechazado_Datos'])) {
    $ID_Registro = $_SESSION['Rechazado_Datos'];
    //unset ($_SESSION["Rechazado_Datos"]);
}else{
    header("Location: Registro_Lista.php?error=no_select");
}
    $sql = "SELECT * FROM registro WHERE ID_Registro=? and Estado = 'Rechazado';";        
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        throw new Exception('Error: SQL CONECTION ERROR');
    }else{
        mysqli_stmt_bind_param($stmt, "i",$ID_Registro);
        if(!mysqli_stmt_execute($stmt)){
            throw new Exception('Error: update_registro');
        }
        $result = mysqli_stmt_get_result($stmt);
        if ($row = mysqli_fetch_assoc($result)) {
            header("Location: Registro_Lista.php");
            echo 'No deberias de estar aqui..';
        }
    }

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

    $sql = "SELECT * FROM correcciones_registro WHERE FK_registro = ? ORDER BY ID_Correcion_R DESC LIMIT 1";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        echo 'Error: SQL Conection.';
        exit();     
    }else{
        mysqli_stmt_bind_param($stmt, "i" , $ID_Registro);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        $row = mysqli_fetch_assoc($result);

        $correcion = $row['ID_Correcion_R'];
    }

    
    		
?>
<main>
<h1 style='background: #e53935 ; color: white; text-align:center'>El registro se a mandado a revisión mas de 3 veces</h1>
<p style='background: #b71c1c ; color: white; text-align:center;'>Justificacion del rechazo</p><br>


<div style="text-align: center;">
	
    <form action="includes/justificar_rechazo.inc.php" method="post">
        <textarea class="common" style="resize: none; height: 180px;" name="Texto_Justificado" placeholder="Justificacion.." ></textarea>

        <input type="text" class="hiden" name="ID_Registro" value="<?php echo $ID_Registro; ?>">

        <button class="Btn_CG A_P_B " name="justificar" style="float: right;" value="<?php echo $Registro_ID ?>"><span>Enviar Justificacion</span></button>
    </form>

    <div style="display: flex;">
    <a href='Ver_Correciones.php' target="_blank" class="A_P_B" style="margin-right: 2px">Ver correciones</a>
    <form action="Pre_Registro_New_Ver.php" target="_blank" method="post">
        <button class="A_P_B" name="Registro" value="<?php echo $ID_Registro ?>"><span>Informacion Registro</span></button>
    </form>
    </div>
</div>

</main>
<?php
/* manda a llamar a footer.php */ 
	require"footer.php";
/* el   header.php / index.php / footer.php   son en esencia una sola pagina php, se hace de esta forma para reutilizar codigo de forma facil y rapida */
?>