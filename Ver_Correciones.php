<?php
/* manda a llamar a header.php */ 
	require"classes/header.php";
	require"includes/dbh.inc.php";

if (isset($_SESSION['Rechazado_Datos'])) {    
    $ID_Registro = $_SESSION['Rechazado_Datos'];
}else{
    header("Location: Registro_Lista.php");
}

    $sql = "SELECT * FROM registro WHERE ID_Registro=? and Estado = 'Rechazado';";        
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        throw new Exception('Error: SQL CONECTION ERROR');
    }else{
        mysqli_stmt_bind_param($stmt, "i",$ID_Registro);
        if(!mysqli_stmt_execute($stmt)){
            throw new Exception('Error: Select Registro');
        }
        $result = mysqli_stmt_get_result($stmt);
        if ($row = mysqli_fetch_assoc($result)) {
            header("Location: Registro_Lista.php");
            echo 'No deberias de estar aqui..';
        }
    }

    $sql = "SELECT * FROM datos_generales WHERE FK_Registro=?";        
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        throw new Exception('Error: SQL CONECTION ERROR');
    }else{
        mysqli_stmt_bind_param($stmt, "i",$ID_Registro);
        if(!mysqli_stmt_execute($stmt)){
            throw new Exception('Error: Select Registro');
        }
        $result = mysqli_stmt_get_result($stmt);
        $row = mysqli_fetch_assoc($result);        

        $Nombre_ORG = $row['nombreOSC'];
    }


    $sql = "SELECT * FROM correcciones_registro WHERE FK_registro = ? ";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        echo 'Error: SQL Conection.';
        exit();     
    }else{
        mysqli_stmt_bind_param($stmt, "i" , $ID_Registro);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
    }
   
    		
?>
<main>
<h1 style='background: SALMON ; color: white; text-align:center'>Historial de Correciones</h1>
<p style='background: LIGHTSALMON ; color: white; text-align:center;'>Registro: <?php echo $Nombre_ORG; ?> </p>


<div style="overflow: auto; background: #BFBFBF; padding: 10px">	

    <div style="width: 90%; margin: auto; height: 400px;">
        <?php foreach ($result as $raw) { 

            $correcion = $raw['ID_Correcion_R'];
            $revisor_ID = $raw['FK_Revisor'];  

            $sql = "SELECT * FROM empleados WHERE EmpleadoID = ? ";
            $stmt = mysqli_stmt_init($conn);
            if (!mysqli_stmt_prepare($stmt, $sql)) {
                echo 'Error: SQL Conection.';
                exit();     
            }else{
                mysqli_stmt_bind_param($stmt, "i" , $revisor_ID);
                mysqli_stmt_execute($stmt);
                $result = mysqli_stmt_get_result($stmt);
                $riw = mysqli_fetch_assoc($result);

                $revisor_nombre = $riw['nombreEmpleado'];
            }


            ?>

        <div class="Files_Container ">
        <div class="row">           
           <div class="cell -file Correciones_Color_File">
              <i class="fa fa-address-card-o" aria-hidden="true"></i>
              <div class="inner">

                <a href='Registro_Corregir.php?id=<?php echo $correcion; ?>' target="_blank">Ver correciones</a>

                 <small class="details">
                    <span class="detail -updated" style="float: left;"><i class="fa fa-clock-o" aria-hidden="true"></i> <?php echo $raw['Fecha']; ?></span>
                    <span class="detail -updated" style="float: left;"><i class="fa fa-user" aria-hidden="true"></i> <?php echo $revisor_nombre; ?></span>
                 </small>
              </div>
           </div>                  
        </div>
        </div>

        <?php  } ?>
    </div>

</div>

</main>
<?php
/* manda a llamar a footer.php */ 
	require"footer.php";
/* el   header.php / index.php / footer.php   son en esencia una sola pagina php, se hace de esta forma para reutilizar codigo de forma facil y rapida */
?>