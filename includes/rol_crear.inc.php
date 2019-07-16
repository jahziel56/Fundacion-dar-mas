<?php
require 'dbh.inc.php';  

if (isset($_POST['Crear_Rol'])) {

    $Rol_Name = utf8_decode($_POST['Rol_Name']);
    $Rol_Descripcion = utf8_decode($_POST['Rol_Descripcion']);

    $sql = "SELECT * FROM rol WHERE Nombre_Rol=?;";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("Location: ../Panel_De_Control.php?error=sqlerror");
        exit();     
    }else{
        mysqli_stmt_bind_param($stmt, "s", $Rol_Name);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        if ($row2 = mysqli_fetch_assoc($result)) {
            header("Location: ../Panel_De_Control.php?rol=alreadycreated");
            exit();
        }else{
            $sql ="INSERT INTO rol (Nombre_Rol, Descripcion_Rol) VALUES (?, ?)";
            $stmt = mysqli_stmt_init($conn);
            if (!mysqli_stmt_prepare($stmt, $sql)) {
                header("Location: ../Panel_De_Control.php?error=sqlerror");
                exit();                 
            }else{
                mysqli_stmt_bind_param($stmt, "ss",$Rol_Name, $Rol_Descripcion);
                mysqli_stmt_execute($stmt);
                $ultimaID = $conn->insert_id;
            
     
                if (!empty($_POST['checker'])) {
                    $checker = $_POST['checker'];

                    foreach ($checker as $key => $value) {
                        $sql ="INSERT INTO rol_detail (Input, Id_Rol) VALUES (?, ?)";
                        $stmt = mysqli_stmt_init($conn);
                        if (!mysqli_stmt_prepare($stmt, $sql)) {
                            header("Location: ../Panel_De_Control.php?error=sqlerror");
                            exit();                 
                        }else{
                            mysqli_stmt_bind_param($stmt, "ii", $value, $ultimaID);
                            mysqli_stmt_execute($stmt);


                        }
                    }
                }
                header("Location: ../Panel_De_Control.php?rol=success");
                exit(); 
            } 
        }
    }

}else{
	header("Location: ../Panel_De_Control.php");
	exit();		
}