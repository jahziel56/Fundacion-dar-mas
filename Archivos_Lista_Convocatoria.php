<?php
/* METODO: evitar que el usuario ingrese a esta pagina php desde la barra de busqueda */
/* signup-submit es el boton del formulario que se encuentra en la signup.php */
	require 'includes/dbh.inc.php';	

    //-------------------- Obtener el id a ver
    $ID_Selected = isset($_GET['id'])? $_GET['id'] : "";


    //-------------------- Formulario

    $sql = "SELECT * FROM formularioarchivos INNER JOIN formularioprincipal ON formularioarchivos.FK_FormularioID = formularioprincipal.FormularioID WHERE formularioprincipal.FormularioID = ?;";
    $stmt = mysqli_stmt_init($conn);
    mysqli_stmt_prepare($stmt, $sql);
    mysqli_stmt_bind_param($stmt, "i", $ID_Selected);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $row = mysqli_fetch_assoc($result);

    $nombreOSC = $row['nombreOSC'];




    require"classes/Archivos_Convocatoria_Ver.php";


	exit();

