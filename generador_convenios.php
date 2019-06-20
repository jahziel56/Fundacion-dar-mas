<?php 

    

?>

<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-type" content="text/html; charset=utf-8">
    <title>Lista de Solicitudes</title>
    <!--<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel="stylesheet" href="style.css">-->
</head>
<body>
	<div class="wrap">
		<form method="post" enctype="multipart/form-data">
			<h2>Lista de Solicitudes</h2>
			<br>
			<br>
			<?php			 
				$conexion = new PDO("mysql:host=localhost;dbname=paginacion", "root", "");
				$stat = $conexion->prepare("SELECT * FROM preregistro");
				$stat->execute();
				while ($row = $stat->fetch()) {
					echo "<li><a target='_blank' href='pdf_crear.php?id=".$row['RegistroID']."'>".$row['nombreOSC']."</a></li>";
				}
			?>
		</form>
	</div>
</body>
</html>