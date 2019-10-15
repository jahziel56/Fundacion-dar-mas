<?php  
    //Conexion ala base de datos
    require '../includes/dbh.inc.php';
    //Recupera la id de la imagen    
    $id = isset($_GET['id'])? $_GET['id'] : "";

    if (empty($id)) {
        echo "Error: archivo no selecionado";
    }else{
            //Consulta al formulario de archivos
            $sql = "SELECT * FROM registro_archivos WHERE Archivos_ID=?";
            $stmt = mysqli_stmt_init($conn);
            mysqli_stmt_prepare($stmt, $sql);
            mysqli_stmt_bind_param($stmt, "i", $id);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
            $row = mysqli_fetch_assoc($result);
        if (empty($row)) {
            echo "Error: archivo no encontrado";
        }else{
            //Le dice al navegador que tipo de archivo va a manejar.
            header('Content-Type:'.$row['tipoArchivo']);
            //Imprime la imagen
            echo $row['dataArchivo'].'</br>';
        }
    }
?>
