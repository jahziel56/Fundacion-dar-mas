<?php
require 'dbh.inc.php';  

if (isset($_POST['Rol_Eliminar_Borrar'])) {

    $id_Eliminar = $_POST['id_Eliminar'];

    echo $id_Eliminar;
    if ($id_Eliminar == 1) {
        header("Location: ../Panel_De_Control.php?rol=error");
        exit();
    }else{
        $sql = "DELETE FROM rol_detail WHERE Id_Rol=?";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            echo "error";
            exit();
        }else{
            mysqli_stmt_bind_param($stmt, "i", $id_Eliminar);
            mysqli_stmt_execute($stmt);

            /* SELECT * FROM empleados INNER JOIN rol on empleados.FK_Roles = rol.Id_Rol WHERE rol.Id_Rol = 2; */


            $sql = "UPDATE empleados SET FK_Roles = '1'  WHERE FK_Roles = ?";
            $stmt = mysqli_stmt_init($conn);
            if (!mysqli_stmt_prepare($stmt, $sql)) {
                echo "error";
                exit();
            }else{
                mysqli_stmt_bind_param($stmt, "i", $id_Eliminar);
                mysqli_stmt_execute($stmt);


                $sql = "DELETE FROM rol WHERE Id_Rol=?";
                $stmt = mysqli_stmt_init($conn);
                if (!mysqli_stmt_prepare($stmt, $sql)) {
                    echo "error";
                    exit();
                }else{
                    mysqli_stmt_bind_param($stmt, "i", $id_Eliminar);
                    mysqli_stmt_execute($stmt);

                    header("Location: ../Panel_De_Control.php?rol=delete");
                    exit(); 

                }
            }
        }    
    }
}else{
	header("Location: ../Panel_De_Control.php");
	exit();		
}