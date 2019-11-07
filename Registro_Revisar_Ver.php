<?php 
if (isset($_POST['Enviar_Revisión'])) {
    require 'includes/dbh.inc.php';

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

	$Revisor = 'temporal';

	update_registro('Revisado', $Registro_ID, $conn);

	
    $sql = "INSERT INTO correcciones_registro (FK_Registro, Revisor ) VALUES (?,?)";        
    $stmt = mysqli_stmt_init($conn);
    mysqli_stmt_prepare($stmt, $sql);
    mysqli_stmt_bind_param($stmt, "is",$Registro_ID,$Revisor);
    mysqli_stmt_execute($stmt);

	$ultimaID = $conn->insert_id;


	echo "La revision tiene correciones<br><br>";

	    try{

		    if (!empty($_POST['44a'])) {
		    	$P_44a = $_POST['44a'];
		    	unset($_POST['44a']);

		    	echo "<BR> -- $P_44a --<BR><BR>";

		    }else{
		    	unset($_POST['44a']);
		    }

		    if (!empty($_POST['44b'])) {
		    	$P_44b = $_POST['44b'];
		    	unset($_POST['44b']);
		    	echo "<BR> -- $P_44b --<BR><BR>";
		    }else{
		    	unset($_POST['44b']);
		    }

		    if (!empty($_POST['44c'])) {
		    	$P_44c = $_POST['44c'];
		    	unset($_POST['44c']);
		    	echo "<BR> -- $P_44c --<BR><BR>";
		    }else{
		    	unset($_POST['44c']);
		    }

		    if (!empty($_POST['44d'])) {
		    	$P_44d = $_POST['44d'];
		    	unset($_POST['44d']);
		    	echo "<BR> -- $P_44d --<BR><BR>";
		    }else{
		    	unset($_POST['44d']);
		    }

		    if (!empty($_POST['44e'])) {
		    	$P_44e = $_POST['44e'];
		    	unset($_POST['44e']);
		    	echo "<BR> -- $P_44e --<BR><BR>";
		    }else{
		    	unset($_POST['44e']);
		    }

		    if (!empty($_POST['45a'])) {
		    	$P_45a = $_POST['45a'];
		    	unset($_POST['45a']);
		    	echo "<BR> -- $P_45a --<BR><BR>";
		    }else{
		    	unset($_POST['45a']);
		    }

		    if (!empty($_POST['45b'])) {
		    	$P_45b = $_POST['45b'];
		    	unset($_POST['45b']);
		    	echo "<BR> -- $P_45b --<BR><BR>";
		    }else{
		    	unset($_POST['45b']);
		    }

		    if (!empty($_POST['45c'])) {
		    	$P_45c = $_POST['45c'];
		    	unset($_POST['45c']);
		    	echo "<BR> -- $P_45c --<BR><BR>";
		    }else{
		    	unset($_POST['45c']);
		    }

		    if (!empty($_POST['45d'])) {
		    	$P_45d = $_POST['45d'];
		    	unset($_POST['45d']);
		    	echo "<BR> -- $P_45d --<BR><BR>";
		    }else{
		    	unset($_POST['45d']);
		    }

		    if (!empty($_POST['45e'])) {
		    	$P_45e = $_POST['45e'];
		    	unset($_POST['45e']);
		    	echo "<BR> -- $P_45e --<BR><BR>";
		    }else{
		    	unset($_POST['45e']);
		    }

		    if (!empty($_POST['45f'])) {
		    	$P_45f = $_POST['45f'];
		    	unset($_POST['45f']);
		    	echo "<BR> -- $P_45f --<BR><BR>";
		    }else{
		    	unset($_POST['45f']);
		    }

		    if (!empty($_POST['63a'])) {
		    	$P_63a = $_POST['63a'];
		    	unset($_POST['63a']);
		    	echo "<BR> -- $P_63a --<BR><BR>";
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



		    print_r($_POST);
			echo "<br><br>";
			$i = 1;
		    foreach ($_POST as $row) {
		    	if (!empty($row)) {
		    		detalle_correcciones($ultimaID,$row,$i, $conn);

		    		echo "Correcion[$i]: $row<br>";
		    	}
		    	$i++;
		    }


	    //Catch SQL error, rollback si hay alguna exepcion / commit si todas las transaciones fueron correctas
		}catch( Exception $e ){
		  $conn->rollback();
		  echo "<BR><BR>Error: SQL_Transacion.<BR><BR>";
		}
	    $conn->commit();

    }else{
		echo "Update: Registro Aceptado.";
		update_registro('Aceptado', $Registro_ID, $conn);

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