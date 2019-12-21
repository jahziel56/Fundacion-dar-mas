<?php
/* METODO: evitar que el usuario ingrese a esta pagina php desde la barra de busqueda */
/* signup-submit es el boton del formulario que se encuentra en la signup.php */
if (isset($_POST['submit'])) {
	unset($_POST['submit']);
	/* manda a llamar a la pagina php donde se conecta a la base de datos de esta forma se ahorra codigo y se tiene todo en una funcion mas simple */
    require 'includes/dbh.inc.php'; 
	
	$ID_Registro = $_POST['ID_Registro'];
	unset($_POST['ID_Registro']);

    echo "<pre>";
    print_r($_POST);
    echo "</pre>";

	$sql = "SELECT * FROM detalle_correcciones_registro WHERE FK_Correcion_R=?;";
    $stmt = mysqli_stmt_init($conn);
    mysqli_stmt_prepare($stmt, $sql);
    mysqli_stmt_bind_param($stmt, "i", $ID_Correcion_R);
    mysqli_stmt_execute($stmt);
    $result_detalle_correcciones_registro = mysqli_stmt_get_result($stmt);

    if (empty($result_detalle_correcciones_registro)) {
    	echo "Fatal Error: Resultado Detalle Empty";
    	exit;
    }


	//$Table = 'registro';
	//$Update = 'Estado';
	//$Estado = 'No revisado';



	foreach ($result_detalle_correcciones_registro as $row2) {

		switch ($row2['Pregunta']) {
		    case '1':

		    	$Correos_1 = $_POST['Correos_1'];
			    $Correo_Organizacion = $_POST['Correo_Organizacion']; 
			    $Correo_Organizacion .='@';
			    $Correo_Organizacion .=$Correos_1;

			    $Table = 'datos_generales';
			    $Update = 'Correo_Organizacion';
			    $Dato = $Correo_Organizacion;

				Update_registro($Table,$Update,$Dato,$ID_Registro,$conn);
		    	break;

		    case '2':
		    	$rfcHomoclave = $_POST['rfcHomoclave'];

		    	$Table = 'datos_generales';
			    $Update = 'rfcHomoclave';
			    $Dato = $rfcHomoclave;

				Update_registro($Table,$Update,$Dato,$ID_Registro,$conn);
		    	break;

		    case '3':

		    	//--- ARCHIVO ---//

		    	break;
		   	case '4':
		   		echo 'entro';
    			$CLUNI = $_POST['CLUNI'];

    			$Table = 'datos_generales';
			    $Update = 'CLUNI';
			    $Dato = $CLUNI;


			    $sql = "UPDATE datos_generales SET CLUNI = ? WHERE ID_Registro=?;";        
				$stmt = mysqli_stmt_init($conn);
				if (!mysqli_stmt_prepare($stmt, $sql)) {
					//header("Location: ../../index.php?SQL=Error_Update");
					exit();
				}else{
					mysqli_stmt_bind_param($stmt, "si", $Dato,$ID_Registro);
					if(!mysqli_stmt_execute($stmt)){
						throw new Exception('error!');
					}
				}


			   	Update_registro($Table,$Update,$Dato,$ID_Registro,$conn); 
		    	break;
		    case '5':

		    	//--- ARCHIVO ---//

		    	break;
		    case '6':
		    	pregunta_6($row2['Detalle']);
		    	break;
		    case '7':
		    	pregunta_7($row2['Detalle']);
		    	break;
		    case '8':
		    	pregunta_8($row2['Detalle']);
		    	break;
		    case '9':
		    	pregunta_9($row2['Detalle']);
		    	break;
		    case '10':
		    	pregunta_10($row2['Detalle']);
		    	break;
		    case '11':
		    	pregunta_11($row2['Detalle']);
		    	break;
		    case '12':
		    	pregunta_12($row2['Detalle']);
		    	break;
		    case '13':
		    	pregunta_13($row2['Detalle']);
		    	break;
		    case '14':
		    	pregunta_14($row2['Detalle']);
		    	break;
		    case '15':
		    	pregunta_15($row2['Detalle']);
		    	break;
		    case '16':
		    	pregunta_16($row2['Detalle']);
		    	break;
		    case '17':
		    	pregunta_17($row2['Detalle']);
		    	break;
		    case '20':
		    	pregunta_20($row2['Detalle']);
		    	break;
		    case '21':
		    	pregunta_21($row2['Detalle']);
		    	break;
		    case '22':
		    	pregunta_22($row2['Detalle']);
		    	break;
		    case '23':
		    	pregunta_23($row2['Detalle']);
		    	break;
		    case '24':
		    	pregunta_24($row2['Detalle']);
		    	break;
		    case '25':
		    	pregunta_25($row2['Detalle']);
		    	break;
		    case '26':
		    	pregunta_26($row2['Detalle']);
		    	break;
		    case '27':
		    	pregunta_27($row2['Detalle']);
		    	break;
		    case '27a':
		    	pregunta_27a($row2['Detalle']);
		    	break;
		    case '27b':
		    	pregunta_27b($row2['Detalle']);
		    	break;
		    case '27c':
		    	pregunta_27c($row2['Detalle'], $municipiosDeSonora);
		    	break;		    	
		    case '28':
		    	pregunta_28($row2['Detalle']);
		    	break;
		    case '29':
		    	pregunta_29($row2['Detalle']);
		    	break;
		    case '30':
		    	pregunta_30($row2['Detalle']);
		    	break;
		    case '31':
		    	pregunta_31($row2['Detalle']);
		    	break;
		    case '32':
		    	pregunta_32($row2['Detalle']);
		    	break;
		    case '33':
		    	pregunta_33($row2['Detalle']);
		    	break;
		    case '34':
		    	pregunta_34($row2['Detalle']);
		    	break;
		    case '35':
		    	pregunta_35($row2['Detalle']);
		    	break;
		    case '36':
		    	pregunta_36($row2['Detalle'], $municipiosDeSonora);
		    	break;
		    case '37':
		    	pregunta_37($row2['Detalle']);
		    	break;
		    case '38':
		    	pregunta_38($row2['Detalle']);
		    	break;
		    case '39':
		    	pregunta_39($row2['Detalle']);
		    	break;
		    case '40':
		    	pregunta_40($row2['Detalle']);
		    	break;
		    case '41':
		    	pregunta_41($row2['Detalle']);
		    	break;
		    case '42':
		    	pregunta_42($row2['Detalle']);
		    	break;
		    case '43':
		    	pregunta_43($row2['Detalle']);
		    	break;
		    case '44':
		    	pregunta_44($row2['Detalle']);
		    	break;
		    case '44a':
		    	pregunta_44a($row2['Detalle']);
		    	break;
		    case '44b':
		    	pregunta_44b($row2['Detalle']);
		    	break;
		    case '44c':
		    	pregunta_44c($row2['Detalle']);
		    	break;
		    case '44d':
		    	pregunta_44d($row2['Detalle']);
		    	break;
		    case '44e':
		    	pregunta_44e($row2['Detalle']);
		    	break;	
		    case '45':
		    	pregunta_45($row2['Detalle']);
		    	break;
		    case '45a':
		    	pregunta_45a($row2['Detalle']);
		    	break;
		    case '45b':
		    	pregunta_45b($row2['Detalle']);
		    	break;
		    case '45c':
		    	pregunta_45c($row2['Detalle']);
		    	break;
		    case '45d':
		    	pregunta_45d($row2['Detalle']);
		    	break;
		    case '45e':
		    	pregunta_45e($row2['Detalle']);
		    	break;	
		    case '45f':
		    	pregunta_45f($row2['Detalle']);
		    	break;		    	
		    case '46':
		    	pregunta_46($row2['Detalle']);
		    	break;
		    case '47':
		    	pregunta_47($row2['Detalle']);
		    	break;
		    case '48':
		    	pregunta_48($row2['Detalle']);
		    	break;
		    case '49':
		    	pregunta_49($row2['Detalle']);
		    	break;		    
		    case '50':
		    	pregunta_50($row2['Detalle']);
		    	break;
		    case '51':
		    	pregunta_51($row2['Detalle']);
		    	break;
		    case '52':
		    	pregunta_52($row2['Detalle']);
		    	break;
		    case '53':
		    	pregunta_53($row2['Detalle']);
		    	break;
		    case '54':
		    	pregunta_54($row2['Detalle']);
		    	break;
		    case '55':
		    	pregunta_55($row2['Detalle']);
		    	break;
		    case '56':
		    	pregunta_56($row2['Detalle']);
		    	break;
		    case '57':
		    	pregunta_57($row2['Detalle']);
		    	break;
		    case '58':
		    	pregunta_58($row2['Detalle']);
		    	break;
		    case '59':
		    	pregunta_59($row2['Detalle']);
		    	break;
		    case '60':
		    	pregunta_60($row2['Detalle']);
		    	break;
		    case '61':
		    	pregunta_61($row2['Detalle']);
		    	break;
		    case '62':
		    	pregunta_62($row2['Detalle']);
		    	break;
		    case '63':
		    	pregunta_63($row2['Detalle']);
		    	break;
		    case '63a':
		    	pregunta_63a($row2['Detalle']);
		    	break;
		    case '64':
		    	pregunta_64($row2['Detalle']);
		    	break;
		    case '64a':
		    	pregunta_64a($row2['Detalle']);
		    	break;
		}
	}





    //header("Location: ../index.php");
	//exit();
}else{
	header("Location: index.php");
	exit();		
}






function Update_registro($Table,$Update,$Dato,$ID_Registro,$conn){

	$sql = "UPDATE $Table SET $Update = ? WHERE ID_Registro=?;";        
	$stmt = mysqli_stmt_init($conn);
	if (!mysqli_stmt_prepare($stmt, $sql)) {
		//header("Location: ../../index.php?SQL=Error_Update");
		exit();
	}else{
		mysqli_stmt_bind_param($stmt, "si", $Dato,$ID_Registro);
		if(!mysqli_stmt_execute($stmt)){
			throw new Exception('error!');
		}
	}
}