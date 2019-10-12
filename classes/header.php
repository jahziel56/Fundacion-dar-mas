<?php 
session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-type" content="text/html; charset=utf-8">
	<meta name="description" content="This is an example of a meta description. this will often whow up in search results.">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Login</title>
	<link rel="stylesheet" type="text/css" href="css/estilos.css">
  	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
  	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>
<body>

	<header>
		<div class="topnav" id="myTopnav">
                <a href="index.php" class="active_nav">Inicio</a>
            <?php if (!isset($_SESSION['Type_User'])) {

                    echo '<div class="dropdown">
                        <button class="dropbtn">quienes somos 
                        <i class="fa fa-caret-down"></i>
                        </button>
                        <div class="dropdown-content">
                                <a href="index.html">nosotros </a>
                                <a href="web/mision.html">mision y vision</a>
                                <a href="web/consejo.html">consejo</a>
                                <a href="web/estructura.html">estructura organica</a>
                        </div>
                    </div>';

                    echo '<div class="dropdown">
                        <button class="dropbtn">convocatorias 
                        <i class="fa fa-caret-down"></i>
                        </button>
                        <div class="dropdown-content">
                                <a href="web/registro.html">registro </a>
                                <a href="web/peso.html">peso x peso </a>
                                <a href="web/contigo.html">contigo</a>
                        </div>
                    </div>';

                echo '<div class="dropdown">
                        <button class="dropbtn">transparencia 
                        <i class="fa fa-caret-down"></i>
                        </button>
                        <div class="dropdown-content">
                                <a href="web/marco.html">marco legal</a>
                                <a href="web/resultados.html">resultados</a>
                                <a href="#">lo que hacen </a>
                        </div>
                </div>';

                echo '<a href="#">preguntas frecuentes</a>
                <a href="#">promocionales</a>';  


              echo '<a href="signup.php">Crear Cuenta <i class="fa fa-user-plus fa-1x"></i> </a>';
                    echo '<a id="login_right" href="login.php" >Login</a>';
            }elseif (isset($_SESSION['Type_User'])) {				
				$nivel = $_SESSION['Type_User'];

                //Tipo de usuario: Usuario                                             
		  		if ($nivel == 1) {?>                    
		  			<a id='perfil_right2' class='perfil' href='Pre_Registro_New.php'>Registro</a>
                    <a id='perfil_right2' class='perfil' href='OSC_acces.php'>Organizacion</a>  
  

		  			<form action="includes/logout.inc.php" method="post">
						<button id="log" class="" type="submit" name="logout-submit"><i class="fa fa-power-off" aria-hidden="true"> Salir</i></button>
					</form>

		  			<a id='perfil_right1' class='perfil' href='Pre_Registro_New.php'>Registro</a>
                    <a id='perfil_right1' class='perfil' href='OSC_acces.php'>Organizacion</a>	
            <?php
                //Tipo de usuario: Empleado  							
		  		}elseif ($nivel == 2) { ?>
                    <a id='perfil_right2' class='' href='Convocatorias.php'>Convocatorias</a>

					<form action="includes/logout.inc.php" method="post">
						<button id="log" class="" type="submit" name="logout-submit"><i class="fa fa-power-off" aria-hidden="true"> Salir</i></button>
					</form>

                    <a id='perfil_right1' class='' href='Convocatorias.php'>Convocatorias</a> 

            <?php  
                //Tipo de usuario: Admin
				}elseif ($nivel == 3) {?>
                    <a id='perfil_right2' class='' href='Panel_De_Control.php'>Panel De Control</a>
                    <a id='perfil_right2' class='' href='a.php'>Convocatorias</a>

                    <form action="includes/logout.inc.php" method="post">
                        <button id="log" class="" type="submit" name="logout-submit"><i class="fa fa-power-off" aria-hidden="true"> Salir</i></button>
                    </form>

                    <a id='perfil_right1' class='' href='Panel_De_Control.php'>Panel De Control</a>
                    <a id='perfil_right1' class='' href='a.php'>Convocatorias</a>
            <?php  
                }
			}
            ?>
            <a href="javascript:void(0);" class="icon" onclick="myFunction()">
            <i class="fa fa-bars"></i>
            </a>


		</div>
</header>

<script>
function myFunction() {
  var x = document.getElementById("myTopnav");
  if (x.className === "topnav") {
    x.className += " responsive";
    log.classList.add('active');
  } else {
    x.className = "topnav";
    log.classList.remove('active');
  }
}
</script>