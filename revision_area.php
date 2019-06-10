<?php
/* manda a llamar a header.php */ 
	require"header.php";
?>
	<main>
		<div class="conten-alignt-center">
		<?php
		if (isset($_GET['signup'])) {
			if (($_GET['signup']) == "success") {
				//echo '<p class"signuperror">Perfil creado</p>';
			}
		}	
		if (isset($_SESSION['user_Id'])) {
			//echo '<p> You are logged in</p>';
			//echo $_SESSION['user_Username'];
		}
		else{
			//echo '<p> You are logged out!</p>';
		}  
		?>
										
		  <h2>Correciones</h2>

		  <div class="tab">
		    <button class="tablinks" onclick="openCity(event, 'Personales')" id="defaultOpen">Datos personales</button>
		    <button class="tablinks" onclick="openCity(event, 'Empresa')">Datos de empresa</button>
		    <button class="tablinks" onclick="openCity(event, 'Archivos')">Archivos</button>
		  </div>

		  <div id="Personales" class="tabcontent">
		    <span onclick="this.parentElement.style.display='none'" class="topright">&times</span>
		    <div>
		      <h3>Datos personales</h3>
		      <p>Datos personales del usuario</p>
		      <div class="input">

		<?php  
			if (isset($_SESSION['user_Id'])) {
			require 'includes/dbh.inc.php';

			$a = 1;

			$sql = "SELECT * FROM persona,cuenta WHERE Id_Cuenta_P=?;";
			$stmt = mysqli_stmt_init($conn);
			mysqli_stmt_prepare($stmt, $sql);
			mysqli_stmt_bind_param($stmt, "i", $a);
			mysqli_stmt_execute($stmt);
			$result = mysqli_stmt_get_result($stmt);
			$row = mysqli_fetch_assoc($result);

			echo "<label>Nombre</label>";
			echo "<input type='' name='' placeholder='{$row['Nombres']}' disabled>";
			echo "<label>Apellido_P</label>";
			echo "<input type='' name='' placeholder='{$row['Apellido_P']}' disabled>";
			echo "<label>Apellido_M</label>";
			echo "<input type='' name='' placeholder='{$row['Apellido_M']}' disabled>";
			echo "<label>Telefono</label>";	
			echo "<input type='' name='' placeholder='{$row['Telefono']}' disabled>";
			}
		?>
		      </div>
		    </div>
		    <hr style="margin: 14px auto">
		    <button>Observaciones</button>
		    <button style="float: right;">Revisar</button>
		    <button style="float: right;">Cancelar</button>
		    <textarea id="subject" name="subject" placeholder="Observaciones sobre la informacion Personal" style="height:200px; width: 99%; margin-top: 6px;"></textarea>
		  </div>

		  <div id="Empresa" class="tabcontent">
		    <span onclick="this.parentElement.style.display='none'" class="topright">&times</span>
		    <div>
		      <h3>Datos de la empresa</h3>
		      <p>Datos sobre la empresa</p>
		      <div class="input">

		      	<?php  
					if (isset($_SESSION['user_Id'])) {
					
					$servername = "localhost";
					$dbUser = "root";
					$dbPassword = "";
					$dbName = "sistema";

					/* Metodo de conexion a mysql: (nombre server, nombre usuario, contraseña, nombre de la base de datos) */
					$conn = mysqli_connect($servername, $dbUser, $dbPassword, $dbName);

					$a = 1;

					$sql = "SELECT * FROM persona,formularioprincipal WHERE Id_Cuenta_P=?;";
					$stmt = mysqli_stmt_init($conn);
					mysqli_stmt_prepare($stmt, $sql);
					mysqli_stmt_bind_param($stmt, "i", $a);
					mysqli_stmt_execute($stmt);
					$result = mysqli_stmt_get_result($stmt);
					$row = mysqli_fetch_assoc($result);

					echo "<label>Nombre de la OSC</label>";
					echo "<input type='' name='' placeholder='{$row['nombreOSC']}' disabled>";

					echo "<label>Objeto social de la organización</label>";
					echo "<input type='' name='' placeholder='{$row['objetoSocialOrganizacion']}' disabled>";

					echo "<label>Mision</label>";
					echo "<input type='' name='' placeholder='{$row['mision']}' disabled>";

					echo "<label>Vision</label>";	
					echo "<input type='' name='' placeholder='{$row['vision']}' disabled>";

					echo "<label>Áreas de atención de la OSC</label>";	
					echo "<input type='' name='' placeholder='{$row['areasAtencion']}' disabled>";

					echo "<label>RFC con homoclave de la organización</label>";	
					echo "<input type='' name='' placeholder='{$row['rfcHomoclave']}' disabled>";
					}
				?>

		      </div>
		    </div>
		    <hr style="margin: 14px 0">
		    <button>Observaciones</button>
		    <button style="float: right;">Revisar</button>
		    <button style="float: right;">Cancelar</button><br>
		    <textarea id="subject" name="subject" placeholder="Observaciones de la empresa" style="height:200px; width: 99%; margin-top: 6px;"></textarea>
		  </div>

		  <div id="Archivos" class="tabcontent">
		    <span onclick="this.parentElement.style.display='none'" class="topright">&times</span>
		    <h3>Archivos</h3>
		    <div class="input">

		    </div>
		    <hr style="margin: 14px auto">
		    <button>Observaciones</button>
		    <button style="float: right;">Revisar</button>
		    <button style="float: right;">Cancelar</button>
		    <textarea id="subject" name="subject" placeholder="Observaciones sobre la informacion Personal" style="height:200px; width: 99%; margin-top: 6px;"></textarea>
		  </div>

		</div>


		<script>
function openCity(evt, cityName) {
  var i, tabcontent, tablinks;
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablinks");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" active", "");
  }
  document.getElementById(cityName).style.display = "block";
  evt.currentTarget.className += " active";
}

// Get the element with id="defaultOpen" and click on it
document.getElementById("defaultOpen").click();
</script>

	</main>


<?php
/* manda a llamar a footer.php */ 
	require"footer.php";

/* el   header.php / index.php / footer.php   son en esencia una sola pagina php, se hace de esta forma para reutilizar codigo de forma facil y rapida */
?>