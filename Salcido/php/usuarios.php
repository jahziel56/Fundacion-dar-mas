<?php
error_reporting(0);
header('Content-type: application/json; charset=utf-8');

require 'dbh.inc.php';

if ($conn->connect_errno) {
	$respuesta = [
		'error' => true
	];
}else{
	$conn->set_charset("utf8");
	$statment = $conn->prepare("SELECT * FROM formularioprincipal");
	$statment->execute();
	$resultados = $statment->get_result();

	$respuesta = [];

	while ($fila = $resultados->fetch_assoc()) {
		$usuario =[
			'ID' 					=> $fila['FormularioID'],
			'nombreOSC' 					=> $fila['nombreOSC'],
			'objetoSocialOrganizacion' 		=> $fila['objetoSocialOrganizacion'],
			'mision' 						=> $fila['mision'],
			'vision' 						=> $fila['vision'],
			'areasAtencion' 				=> $fila['areasAtencion'],
			'rfcHomoclave' 					=> $fila['rfcHomoclave'],
			'CLUNI' 						=> $fila['CLUNI'],
			'telefonoOficina' 				=> $fila['telefonoOficina'],
			'telefonoCelular' 				=> $fila['telefonoCelular'],
			'email' 						=> $fila['email']
		];
		array_push($respuesta, $usuario);
	}	
}


echo json_encode($respuesta);
