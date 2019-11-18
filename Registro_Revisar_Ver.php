<?php 
if (isset($_POST['Enviar_Revisión'])) {
    require 'includes/dbh.inc.php';
    session_start();

   	$Revisor = Revisor($_SESSION['user_Id'],$conn);

	$Registro_ID = $_POST['Registro'];
	unset($_POST['Registro']);

	$Correcto = true;

    foreach ($_POST as $row) {
    	if (!empty($row)) {
    		$Correcto = false;
    		break;
    	}
    }



// Set Que registro fue el que se reviso y Quien fue el que lo reviso
if ($Correcto == false) {

	//Comienza transacion
	mysqli_begin_transaction($conn);
	$conn->autocommit(FALSE);


	update_registro('Revisado', $Registro_ID, $conn);


	correcciones_registro($Registro_ID,$Revisor,'Si', $conn);
	$ultimaID = $conn->insert_id;

	    try{
		    if (!empty($_POST['27a'])) {
		    	$P_27a = $_POST['27a'];
		    	unset($_POST['27a']);

		    	$Pregunta = '27a';
		    	$Detalle = $P_27a;

				detalle_correcciones($ultimaID,$Detalle,$Pregunta, $conn);

			}else{
		    	unset($_POST['27a']);
		    }

		    if (!empty($_POST['27b'])) {
		    	$P_27b = $_POST['27b'];
		    	unset($_POST['27b']);

		    	$Pregunta = '27b';
		    	$Detalle = $P_27b;

				detalle_correcciones($ultimaID,$Detalle,$Pregunta, $conn);

			}else{
		    	unset($_POST['27b']);
		    }

		    if (!empty($_POST['27c'])) {
		    	$P_27c = $_POST['27c'];
		    	unset($_POST['27c']);

		    	$Pregunta = '27c';
		    	$Detalle = $P_27c;

				detalle_correcciones($ultimaID,$Detalle,$Pregunta, $conn);

			}else{
		    	unset($_POST['27c']);
		    }

		    if (!empty($_POST['44a'])) {
		    	$P_44a = $_POST['44a'];
		    	unset($_POST['44a']);

		    	$Pregunta = '44a';
		    	$Detalle = $P_44a;

				detalle_correcciones($ultimaID,$Detalle,$Pregunta, $conn);

			}else{
		    	unset($_POST['44a']);
		    }

		    if (!empty($_POST['44b'])) {
		    	$P_44b = $_POST['44b'];
		    	unset($_POST['44b']);

		    	$Pregunta = '44b';
		    	$Detalle = $P_44b;

				detalle_correcciones($ultimaID,$Detalle,$Pregunta, $conn);
		
		    }else{
		    	unset($_POST['44b']);
		    }

		    if (!empty($_POST['44c'])) {
		    	$P_44c = $_POST['44c'];
		    	unset($_POST['44c']);

		    	$Pregunta = '44c';
		    	$Detalle = $P_44c;

				detalle_correcciones($ultimaID,$Detalle,$Pregunta, $conn);
		
		    }else{
		    	unset($_POST['44c']);
		    }

		    if (!empty($_POST['44d'])) {
		    	$P_44d = $_POST['44d'];
		    	unset($_POST['44d']);

		    	$Pregunta = '44d';
		    	$Detalle = $P_44d;

				detalle_correcciones($ultimaID,$Detalle,$Pregunta, $conn);
		
		    }else{
		    	unset($_POST['44d']);
		    }

		    if (!empty($_POST['44e'])) {
		    	$P_44e = $_POST['44e'];
		    	unset($_POST['44e']);

		    	$Pregunta = '44e';
		    	$Detalle = $P_44e;

				detalle_correcciones($ultimaID,$Detalle,$Pregunta, $conn);
		
		    }else{
		    	unset($_POST['44e']);
		    }

		    if (!empty($_POST['45a'])) {
		    	$P_45a = $_POST['45a'];
		    	unset($_POST['45a']);

		    	$Pregunta = '45a';
		    	$Detalle = $P_45a;

				detalle_correcciones($ultimaID,$Detalle,$Pregunta, $conn);
		
		    }else{
		    	unset($_POST['45a']);
		    }

		    if (!empty($_POST['45b'])) {
		    	$P_45b = $_POST['45b'];
		    	unset($_POST['45b']);

		    	$Pregunta = '45b';
		    	$Detalle = $P_45b;

				detalle_correcciones($ultimaID,$Detalle,$Pregunta, $conn);
		
		    }else{
		    	unset($_POST['45b']);
		    }

		    if (!empty($_POST['45c'])) {
		    	$P_45c = $_POST['45c'];
		    	unset($_POST['45c']);

		    	$Pregunta = '45c';
		    	$Detalle = $P_45c;

				detalle_correcciones($ultimaID,$Detalle,$Pregunta, $conn);
		
		    }else{
		    	unset($_POST['45c']);
		    }

		    if (!empty($_POST['45d'])) {
		    	$P_45d = $_POST['45d'];
		    	unset($_POST['45d']);

		    	$Pregunta = '45d';
		    	$Detalle = $P_45d;

				detalle_correcciones($ultimaID,$Detalle,$Pregunta, $conn);
		
		    }else{
		    	unset($_POST['45d']);
		    }

		    if (!empty($_POST['45e'])) {
		    	$P_45e = $_POST['45e'];
		    	unset($_POST['45e']);

		    	$Pregunta = '45e';
		    	$Detalle = $P_45e;

				detalle_correcciones($ultimaID,$Detalle,$Pregunta, $conn);
		
		    }else{
		    	unset($_POST['45e']);
		    }

		    if (!empty($_POST['45f'])) {
		    	$P_45f = $_POST['45f'];
		    	unset($_POST['45f']);

		    	$Pregunta = '45f';
		    	$Detalle = $P_45f;

				detalle_correcciones($ultimaID,$Detalle,$Pregunta, $conn);
		
		    }else{
		    	unset($_POST['45f']);
		    }

		    if (!empty($_POST['63a'])) {
		    	$P_63a = $_POST['63a'];
		    	unset($_POST['63a']);

		    	$Pregunta = '63a';
		    	$Detalle = $P_63a;

				detalle_correcciones($ultimaID,$Detalle,$Pregunta, $conn);
		    			
		    }else{
		    	unset($_POST['63a']);
		    }

		    if (!empty($_POST['64a'])) {
		    	$P_64a = $_POST['64a'];
		    	unset($_POST['64a']);

		    	$Pregunta = '64a';
		    	$Detalle = $P_64a;

				detalle_correcciones($ultimaID,$Detalle,$Pregunta, $conn);
		    			
		    }else{
		    	unset($_POST['64a']);
		    }



			$i = 1;
		    foreach ($_POST as $row) {
		    	if (!empty($row)) {
		    		detalle_correcciones($ultimaID,$row,$i, $conn);
		    	}
		    	$i++;
		    }


	    //Catch SQL error, rollback si hay alguna exepcion / commit si todas las transaciones fueron correctas
		}catch( Exception $e ){
		  $conn->rollback();
		  echo "<BR><BR>Error: SQL_Transacion.<BR><BR>";
		}

		Delete_revisando($Registro_ID, $conn);


		$Identificador = 0;
	    $Tipo = 'Correccion: Registro';
	    $Mensaje = 'Hubieron correciones en su registro.';
	    
	    $sql = "INSERT INTO notificaciones (Identificador,Tipo,Mensaje,FK_registro) VALUES (?, ?, ?, ?)";  
	    $stmt = mysqli_stmt_init($conn);
	    mysqli_stmt_prepare($stmt, $sql);
	    mysqli_stmt_bind_param($stmt, "sssi",$Identificador,$Tipo,$Mensaje,$Registro_ID);
	    mysqli_stmt_execute($stmt);

	    $conn->commit();
	    header("Location: Registro_Lista.php?succes=correciones");
    }else{
		echo "Update: Registro Aceptado.";
		correcciones_registro($Registro_ID,$Revisor,'No', $conn);
		update_registro('Aceptado', $Registro_ID, $conn);
		Delete_revisando($Registro_ID, $conn);

		header("Location: Registro_Lista.php?succes=revisando");
	}
}


function update_registro($Estado,$ID_Registro, $conn){

	$sql = "UPDATE registro SET Estado = ? WHERE ID_Registro=?;";        
	$stmt = mysqli_stmt_init($conn);
	if (!mysqli_stmt_prepare($stmt, $sql)) {
		//header("Location: ../../index.php?SQL=Error_Update");
		exit();
	}else{
		mysqli_stmt_bind_param($stmt, "si", $Estado,$ID_Registro);
		if(!mysqli_stmt_execute($stmt)){
			throw new Exception('error!');
		}
	}
}

function detalle_correcciones($ultimaID,$Detalle,$Pregunta, $conn){

	$sql = "INSERT INTO detalle_correcciones_registro (FK_Correcion_R, Detalle, Pregunta) VALUES (?, ?, ?)";        
	$stmt = mysqli_stmt_init($conn);
	if (!mysqli_stmt_prepare($stmt, $sql)) {
		//header("Location: ../../index.php?SQL=Error_Update");
		exit();
	}else{
		mysqli_stmt_bind_param($stmt, "iss",$ultimaID ,$Detalle, $Pregunta);
		if(!mysqli_stmt_execute($stmt)){
			throw new Exception('error!');
		}
	}
}


function Delete_revisando($Registro_ID, $conn){

	$sql = "DELETE FROM revisando WHERE FK_Registro=?";
	$stmt = mysqli_stmt_init($conn);
	if (!mysqli_stmt_prepare($stmt, $sql)) {
		//header("Location: ../../index.php?SQL=Error_Update");
		exit();
	}else{
		mysqli_stmt_bind_param($stmt, "i",$Registro_ID);
		if(!mysqli_stmt_execute($stmt)){
			throw new Exception('error!');
		}
	}
}

function correcciones_registro($Registro_ID,$Revisor,$correciones, $conn){

    $sql = "INSERT INTO correcciones_registro (FK_Registro, FK_Revisor, correciones) VALUES (?,?,?)";        
    $stmt = mysqli_stmt_init($conn);
	if (!mysqli_stmt_prepare($stmt, $sql)) {
		//header("Location: ../../index.php?SQL=Error_Update");
		exit();
	}else{
    	mysqli_stmt_bind_param($stmt, "iss",$Registro_ID,$Revisor,$correciones);
		if(!mysqli_stmt_execute($stmt)){
			throw new Exception('error!');
		}
	}
}

function Revisor($Revisor_ID,$conn){

	$sql = "SELECT * FROM empleados WHERE FK_Cuenta=?;";
    $stmt = mysqli_stmt_init($conn);
	if (!mysqli_stmt_prepare($stmt, $sql)) {
		//header("Location: ../../index.php?SQL=Error_Update");
		exit();
	}else{
    	mysqli_stmt_bind_param($stmt, "i",$Revisor_ID);
		if(!mysqli_stmt_execute($stmt)){
			throw new Exception('error!');
		}else{
			$result = mysqli_stmt_get_result($stmt);
			$row = mysqli_fetch_assoc($result);
			return $row['EmpleadoID'];
		}
	}
}
