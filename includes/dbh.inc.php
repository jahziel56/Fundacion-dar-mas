<?php 

$servername = "localhost";
$dbUser = "root";
$dbPassword = "";
$dbName = "paginacion";

/* Metodo de conexion a mysql: (nombre server, nombre usuario, contraseña, nombre de la base de datos) */
$conn = mysqli_connect($servername, $dbUser, $dbPassword, $dbName);

/* comprueva la conexion al servidor, si la conexion falla manda un mensaje y muestra el error que se produjo en la pagina / servidor / base de datos  */
if (!$conn) {
	die("Connection failed: ".mysqli_connect_error());
}