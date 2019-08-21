<?php 

$servername = "sql108.byethost.com";
$dbUser = "b7_22991001";
$dbPassword = "jose123";
$dbName = "b7_22991001_Fundacion_Dar_Mas";

/* Metodo de conexion a mysql: (nombre server, nombre usuario, contraseña, nombre de la base de datos) */
$conn = mysqli_connect($servername, $dbUser, $dbPassword, $dbName);

/* comprueva la conexion al servidor, si la conexion falla manda un mensaje y muestra el error que se produjo en la pagina / servidor / base de datos  */
if (!$conn) {
	die("Connection failed: ".mysqli_connect_error());
}

/* 
ALTER TABLE `rol_detail` ADD CONSTRAINT `rol_detail_ibfk_1` FOREIGN KEY (`Id_Rol`) REFERENCES `rol` (`Id_Rol`); 
*/