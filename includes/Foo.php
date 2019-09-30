<?php 
        class Foo{

                function Archivo($Name_Archivo,$Contador){
                    $Name_Archivo = 'file_rfc';

                    $nameFileRFC = $_FILES['files']['name'][$Contador];
                    $tipoFileRFC = $_FILES['files']['type'][$Contador];
                    $fileRFC = file_get_contents($_FILES['files']['tmp_name'][$Contador]);

                    $sql = "INSERT INTO registro_archivos (nombreSeccion, nombreArchivo, tipoArchivo, dataArchivo, FK_Registro) VALUES (?,?,?,?,?)";        
                    $stmt = mysqli_stmt_init($conn);
                    mysqli_stmt_prepare($stmt, $sql);
                    mysqli_stmt_bind_param($stmt, "ssssi",$Name_Archivo,$nameFileRFC,$tipoFileRFC,$fileRFC,$ultimaID);
                    mysqli_stmt_execute($stmt);
                }
        }