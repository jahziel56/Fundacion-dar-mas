<?php 
if (isset($_POST['Enviar_Revisión'])) {
    require 'dbh.inc.php';
    require 'send_mail.inc.php';
    session_start();

   	$Revisor = Revisor($_SESSION['user_Id'],$conn);

	$Registro_ID = $_POST['Registro'];
	unset($_POST['Registro']);
	unset($_POST['Enviar_Revisión']);
	print_r($_POST);


	$sql = "SELECT * FROM registro where ID_Registro=?;";
	$stmt = mysqli_stmt_init($conn);
	if (!mysqli_stmt_prepare($stmt, $sql)) {
		////header("Location: ../login.php?error=sqlerror");
		echo 'error';
		exit();		
	}else{
		mysqli_stmt_bind_param($stmt, "i", $Registro_ID);
		mysqli_stmt_execute($stmt);
		$result = mysqli_stmt_get_result($stmt);
		$row = mysqli_fetch_assoc($result);

		$Num_Reviciones = $row['Num_Reviciones'];
	}

	unset($_POST['Enviar_Revisión']);

	$Correcto = true;

    foreach ($_POST as $row) {
    	if (!empty($row)) {
    		$Correcto = false;
    		break;
    	}
    }

	mysqli_begin_transaction($conn);
	$conn->autocommit(FALSE);

// Set Que registro fue el que se reviso y Quien fue el que lo reviso
if ($Correcto == false) {
	//Comienza transacion

	if ($Num_Reviciones == 3) {
		update_registro('No Revisado', $Registro_ID,$Num_Reviciones, $conn);
	} else {		
		update_registro('Revisado con Observaciones', $Registro_ID,$Num_Reviciones, $conn);
	}


	$Identificador = 1;
	$Tipo = 'Correccion: Registro';
	$Mensaje = 'Hubieron correciones en su registro.';
	    
	notificaciones($Identificador,$Tipo,$Mensaje,$Registro_ID,$conn);
	$FK_notificaciones = $conn->insert_id;

	correcciones_registro($Registro_ID,$Revisor,$FK_notificaciones,'Si', $conn);
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


			if ($Num_Reviciones == 0) {

				$i = 1;
			    foreach ($_POST as $row) {
			    	if (!empty($row)) {
			    		detalle_correcciones($ultimaID,$row,$i, $conn);
			    	}
			    	$i++;
			    }

			}else{

				for ($i=1; $i <= 64 ; $i++) { 
					if (!empty($_POST[$i])) {
						$Lala[$i] = $_POST[$i];

						unset($_POST[$i]);
						detalle_correcciones($ultimaID,$Lala[$i],$i, $conn);
						echo $i ." ". $Lala[$i] ."<br>";						
					}
				}
				print_r ($Lala);
			}

	    //Catch SQL error, rollback si hay alguna exepcion / commit si todas las transaciones fueron correctas
		}catch( Exception $e ){
		  $conn->rollback();
		  echo "<BR><BR>Error: SQL_Transacion.<BR><BR>";
		}

		Delete_revisando($Registro_ID, $conn);

		$Mensaje_email = "Su registro ha producido una serie de correcciones que deben ser atendidas";
		Mandar_Notificacion($Mensaje_email,$Registro_ID,$conn);


	    $conn->commit();

	    if ($Num_Reviciones == 3) {

			$_SESSION['Rechazado_Datos'] = $Registro_ID;

	    	header("Location: ../Justificar_Rechazo.php?id=$Registro_ID");
		}else{
			header("Location: ../Registro_Lista.php?succes=correciones");
		}
    }else{
		echo "Update: Registro Aceptado.";

		$Identificador = 0;
	    $Tipo = 'Aceptado: Registro';
	    $Mensaje = 'Su registro fue aceptado';

		notificaciones($Identificador,$Tipo,$Mensaje,$Registro_ID,$conn);
		$FK_notificaciones = $conn->insert_id;

		correcciones_registro($Registro_ID,$Revisor,$FK_notificaciones,'No', $conn);
		update_registro('Aceptado', $Registro_ID,$Num_Reviciones,$conn);
		Delete_revisando($Registro_ID, $conn);
		Revisado($Registro_ID,$Revisor,$conn);

	    $Mensaje_email = 'Su registro fue aceptado satisfactoriamente';
		Mandar_Notificacion($Mensaje_email,$Registro_ID,$conn);


		$conn->commit();
		header("Location: ../Registro_Lista.php?succes=revisando");
	}
}else{
	header("Location: ../Registro_Lista.php");	
}


function update_registro($Estado,$ID_Registro,$Num_Reviciones, $conn){


	$sql = "UPDATE registro SET Estado = ?, Num_Reviciones = Num_Reviciones + 1 WHERE ID_Registro=?;";        
	$stmt = mysqli_stmt_init($conn);
	if (!mysqli_stmt_prepare($stmt, $sql)) {
			throw new Exception('Error: SQL');
		exit();
	}else{
		mysqli_stmt_bind_param($stmt, "si", $Estado,$ID_Registro);
		if(!mysqli_stmt_execute($stmt)){
			throw new Exception('Error: update_registro');
		}
	}




}

function detalle_correcciones($ultimaID,$Detalle,$Pregunta, $conn){

	$sql = "INSERT INTO detalle_correcciones_registro (FK_Correcion_R, Detalle, Pregunta) VALUES (?, ?, ?)";        
	$stmt = mysqli_stmt_init($conn);
	if (!mysqli_stmt_prepare($stmt, $sql)) {
			throw new Exception('Error: SQL');
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
			throw new Exception('Error: SQL');
		exit();
	}else{
		mysqli_stmt_bind_param($stmt, "i",$Registro_ID);
		if(!mysqli_stmt_execute($stmt)){
			throw new Exception('error!');
		}
	}
}

function correcciones_registro($Registro_ID,$Revisor,$FK_notificaciones,$correciones, $conn){

    $sql = "INSERT INTO correcciones_registro (FK_Registro, FK_Revisor, FK_Notificacion, correciones) VALUES (?,?,?,?)";        
    $stmt = mysqli_stmt_init($conn);
	if (!mysqli_stmt_prepare($stmt, $sql)) {
			throw new Exception('Error: SQL');
		exit();
	}else{
    	mysqli_stmt_bind_param($stmt, "isis",$Registro_ID,$Revisor,$FK_notificaciones,$correciones);
		if(!mysqli_stmt_execute($stmt)){
			throw new Exception('error!');
		}
	}
}

function Revisor($Revisor_ID,$conn){

	$sql = "SELECT * FROM empleados WHERE FK_Cuenta=?;";
    $stmt = mysqli_stmt_init($conn);
	if (!mysqli_stmt_prepare($stmt, $sql)) {
			throw new Exception('Error: SQL');
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

function Revisado($Registro_ID,$Revisor,$conn){

	$sql = "INSERT INTO revisado (FK_Registro,FK_Empleado) VALUES (?, ?)";  
	$stmt = mysqli_stmt_init($conn);
	if (!mysqli_stmt_prepare($stmt, $sql)) {
			throw new Exception('Error: SQL');
		exit();
	}else{
	    mysqli_stmt_bind_param($stmt, "ii",$Registro_ID,$Revisor);
		if(!mysqli_stmt_execute($stmt)){
			throw new Exception('Error: Ya existe se reviso dicha convocatoria');
		}
	}

}

function notificaciones($Identificador,$Tipo,$Mensaje,$Registro_ID,$conn){

	$sql = "INSERT INTO notificaciones (Identificador,Tipo,Mensaje,FK_registro) VALUES (?, ?, ?, ?)";  
	$stmt = mysqli_stmt_init($conn);
	if (!mysqli_stmt_prepare($stmt, $sql)) {
			throw new Exception('Error: SQL');
		exit();
	}else{
		mysqli_stmt_bind_param($stmt, "sssi",$Identificador,$Tipo,$Mensaje,$Registro_ID);
		if(!mysqli_stmt_execute($stmt)){
			throw new Exception('error!');
		}
	}
}

function Mandar_Notificacion($Mensaje_email,$Registro_ID,$conn){

	$sql = "SELECT * FROM datos_generales WHERE Id_Datos_G=?;";
	$stmt = mysqli_stmt_init($conn);
	if (!mysqli_stmt_prepare($stmt, $sql)) {
			throw new Exception('Error: SQL');
		exit();
	}else{
		mysqli_stmt_bind_param($stmt, "i",$Registro_ID);
		if(!mysqli_stmt_execute($stmt)){
			throw new Exception('error!');
		}
		$result = mysqli_stmt_get_result($stmt);
		$row = mysqli_fetch_assoc($result);
		$Email = $row['Correo_Organizacion'];
	}


	$subject = utf8_decode("Registro Fundacion dar mas");
	$message = utf8_decode("<h2>Registro en el sistema Fundacion dar mas</h2><br>");

	$message .= utf8_decode("<p>$Mensaje_email<p><br>");
	$server = $_SERVER['SERVER_NAME'];

	if ($server == "localhost") {
		$server.=':8080';
	}

	$url = "http://$server/Fundacion-dar-mas/Notificaciones.php";
	//$url = "http://tacosalpastor.cf/Fundacion-dar-mas/Notificaciones.php";

	$style = 'target="_blank" style="font-family:Segoe UI Semibold,Segoe UI Bold,Segoe UI,Helvetica Neue Medium,Arial,sans-serif; font-size:22px; text-align:center; text-decoration:none; font-weight:600; color:#fff; background: MEDIUMSEAGREEN; padding: 12px 50px; border-radius: 6px;"';

	$message .= '<a href="'. $url .'"  '.$style.'>Ingresar</a>';


	Enviar_Correo ($Email,$subject,$message);
}