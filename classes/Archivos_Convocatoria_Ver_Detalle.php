<?php  
    #Página para visualizar los archivos de los comprobantes.
    $conn = new PDO("mysql:host=localhost;dbname=sistemadarmas", "root", "");
    $id = isset($_GET['id'])? $_GET['id'] : "";
    #Se selecciona todos los datos del comprobante seleccionado.
    $stat = $conn->prepare("SELECT * FROM formularioarchivos WHERE FArchivosID=?");
    $stat->bindParam(1, $id);
    $stat->execute();
    $row = $stat->fetch();
    #Le dice al navegador que tipo de archivo va a manejar.
    header('Content-Type:'.$row['tipoArchivo']);
    #Despliega el archivo en sí.
    echo $row['dataArchivo'].'</br>';
?>