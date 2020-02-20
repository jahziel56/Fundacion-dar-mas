<?php
/* manda a llamar a header.php */ 
	require"classes/header.php";		
?>
<main style="height: 510px">
	<div class="conten-alignt-center">
	<?php
		if (isset($_GET['signup'])) {
			if (($_GET['signup']) == "success") {
				//echo '<p class"signuperror">Perfil creado</p>';
			}
		}

		if (isset($_GET['login'])) {
			if (($_GET['login']) == "error") {
				echo '<div class="error_box" id="error_box"><p>Error: LLenar ambos campos</p></div>';
			}
			else if (($_GET['login']) == "success") {
				echo '<label class="Saludo" style="background: #FAFAFA;">Bienvenido</label>';					
			}
		}	

		if (isset($_SESSION['user_Id'])) {
			//echo '<p> You are logged in</p>';
			//echo $_SESSION['user_Username'];
			$usuarioID = $_SESSION['user_Id'];
			$nombreUsuario = $_SESSION['user_Username'];
			$tipoUsuario = $_SESSION['Type_User'];
			echo "<label class='Saludo'>Fundación Dar Más para Sonora A.C.</label><br><br>";
			if($tipoUsuario == 3){
			//Admin
			?>
				<div>
					<a href="Panel_De_Control.php"><button class="Go div_100 Btn_C_B"><span>Panel de control <i class="fa fa-cogs"></i> </i></span></button></a>
					<a href="Panel_Informacion.php"><button class="Go div_100 Btn_C_B"><span>Panel de Informacion <i class="fa fa-cogs" aria-hidden="true"> </i></span></button></a>
				</div>
			<?php 
			}else if($tipoUsuario == 2){
			//Empleado
			?>
				<div>
					<a href="Registro_Lista.php"><button class="Go div_100 Btn_C_B"><span>Revisar convocatorias / Registros <i class="fa fa-check-square-o fa-1x"></i></span></button></a>
				</div>
			<?php 
			} else if($tipoUsuario == 1){
			//Solicitante
			?>
				<div>
					<a href="OSC_acces.php"><button class="Go div_50 Btn_C_Gold"><span>Panel Organizacional <i class="fa fa-address-card-o fa-1x"></i> </span></button></a>
					<a href="Pre_Registro_New.php"><button class="Go div_50 Btn_C_LightSeaG"><span>Registrar una Organizacion <i class="fa fa-pencil-square-o"> </i></span></button></a>
				</div>
			<?php
			}
			
		}
		else{
		?>
			<div>
				<a href="signup.php"><button class="Go div_50 Btn_C_P" style="padding: 20px;"><span>Crear Cuenta <i class="fa fa-user-plus fa-1x"></i> </span></button></a>
				<a href="login.php"><button class="Go div_50 Btn_C_B" style="padding: 20px;"><span>Conectarse <i class="fa fa-sign-in" aria-hidden="true"> </i></span></button></a>
			</div>
		<?php			
		}		 
	?>
	</div>						

</main>
<?php
/* manda a llamar a footer.php */ 
	require"footer.php";
/* el   header.php / index.php / footer.php   son en esencia una sola pagina php, se hace de esta forma para reutilizar codigo de forma facil y rapida */
?>