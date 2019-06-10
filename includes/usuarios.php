<?php
error_reporting(0);
header('Content-type: application/json; charset=utf-8');

require '../php/dbh.inc.php';

if ($conn->connect_errno) {
	$respuesta = [
		'error' => true
	];
}else{
	$conn->set_charset("utf8");
	$statment = $conn->prepare("SELECT * FROM usuario");
	$statment->execute();
	$resultados = $statment->get_result();

	$respuesta = [];

	while ($fila = $resultados->fetch_assoc()) {
		$usuario =[
			'id' 		=> $fila['id'],
			'nombre' 	=> $fila['nombre'],
			'edad' 		=> $fila['edad'],
			'pais' 		=> $fila['pais'],
			'correo' 	=> $fila['correo']
		];
		array_push($respuesta, $usuario);
	}	
}


echo json_encode($respuesta);
