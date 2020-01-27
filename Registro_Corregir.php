<?php
	require"classes/header.php";	
	require 'includes/dbh.inc.php';
	require 'no_login.php';

    $ID_Selected = isset($_GET['id'])? $_GET['id'] : "";


	$municipiosDeSonora = [
		'Aconchi', 'Agua Prieta', 'Alamos', 'Altar', 'Arivechi', 'Arizpe', 'Atil',
		'Bacadéhuachi', 'Bacanora', 'Bacerac', 'Bacoachi', 'Bácum', 'Banámichi', 'Baviácora',
		'Bavispe', 'Benito Juárez', 'Benjamín Hill', 'Caborca', 'Cajeme', 'Cananea', 'Carbó',
		'Cucurpe', 'Cumpas', 'Divisaderos', 'Empalme', 'Etchojoa', 'Fronteras', 'General Plutarco Elías Calles',
		'Granados', 'Guaymas', 'Hermosillo', 'Huachinera', 'Huásabas', 'Huatabampo', 'Huépac',
		'Imuris', 'La Colorada', 'Magdalena', 'Mazatán', 'Moctezuma', 'Naco', 'Nácori Chico',
		'Nacozari de García', 'Navojoa', 'Nogales', 'Onavas', 'Opodepe', 'Oquitoa', 'Pitiquito',
		'Puerto Peñasco', 'Quiriego', 'Rayón', 'Rosario', 'Sahuaripa', 'San Felipe de Jesús', 'San Ignacio Río Muerto',
		'San Javier', 'San Luis Río Colorado', 'San Miguel de Horcasitas', 'San Pedro de la Cueva', 'Santa Ana', 'Santa Cruz', 'Sáric',
		'Soyopa', 'Suaqui Grande', 'Tepache', 'Trincheras', 'Tubutama', 'Ures', 'Villa Hidalgo',
		'Villa Pesqueira', 'Yécora'
	];

// -------------------------------------------- Querry -----------------------------------------------------------------------------------------------------
	$sql = "SELECT * FROM correcciones_registro WHERE FK_Notificacion=?;";
    $stmt = mysqli_stmt_init($conn);
    mysqli_stmt_prepare($stmt, $sql);
    mysqli_stmt_bind_param($stmt, "i", $ID_Selected);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $row1 = mysqli_fetch_assoc($result);
    $ID_Selected = $row1['FK_Revisor'];




$sql = "SELECT * FROM datos_generales WHERE FK_Registro=?;";
    $stmt = mysqli_stmt_init($conn);
    mysqli_stmt_prepare($stmt, $sql);
    mysqli_stmt_bind_param($stmt, "i", $ID_Selected);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $row = mysqli_fetch_assoc($result);

    $nombreOSC = $row['nombreOSC'];


if (empty($row1)) {
	echo "<main>";
	echo "<div style='background: #B22222; color: white; text-align:center'>";
	echo "El Registro no tiene correciones<br></div><br>";
	echo "<a class='P_B' href='http:Notificaciones.php' style='text-decoration: none; display: block;'>Regresar</a>";
	echo "</main>";
	exit();
}

    $ID_Correcion_R = $row1['ID_Correcion_R'];
    $correciones = $row1['correciones'];

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





?>
	<main>
<?php 
if (empty($_GET["id"])){
	echo "<div style='background: #B22222; color: white; text-align:center'>";
	echo "Registro no selecionado<br></div><br>";
	echo "<a class='P_B' href='http:Registro_Lista.php' style='text-decoration: none; display: block;'>Regresar</a>";
	exit();
}else{?>
		<h1 style='background: MEDIUMSEAGREEN; color: white; text-align:center'>Correcion Registro</h1>
		<p style='background: SEAGREEN; color: white; text-align:center;'>Organizacion: <?php echo $nombreOSC; ?></p><br>

		<form action="corregido.php" method="post" enctype="multipart/form-data">
<?php	
	$i = 0;
	foreach ($result_detalle_correcciones_registro as $row2) {
    $i++;
	echo '<div class="" style="width: 100%;">';
		switch ($row2['Pregunta']) {
		    case '1':
		    	pregunta_1($row2['Detalle']);
		    	break;

		    case '2':
		    	pregunta_2($row2['Detalle']);
		    	break;

		    case '3':
		    	pregunta_3($row2['Detalle']);
		    	break;
		   	case '4':
		    	pregunta_4($row2['Detalle']);
		    	break;
		    case '5':
		    	pregunta_5($row2['Detalle']);
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

}

if (isset($_SESSION['Type_User'])) {
	if ($_SESSION['Type_User'] == 1 ) {

		if ($correciones == 'Si') {?>


		    <button class="common" type="submit" name="submit">Mandar correciones</button>

		<?php 
		}else {
			echo '<br><label style="display: block; text-align:center;">Correciones enviadas</label>';
		} 
	} 
}?>
         
	<input type="text" class="hide" name="ID_Registro" value="<?php echo $ID_Correcion_R; ?>">    		



	</form>
</main>
<?php 

	$Desarollo_Proyecto = [
		'Salud', 'Asistencia y seguridad social (incluye asilo de ancianos, casas de día, etc)', 'Educación', 'Desarrollo urbano y vivienda', 'Deporte', 'Cultura', 'Desarrollo regional sustentable', 'Financiamiento para el desarrollo', 'Equidad género', 'Atención a pueblos indígenas', 'Juventud', 'Adultos mayores (servicios o proyectos distintos a lo asistencial, es decir, no asilos, no albergues o casas hogar)'
	];

	function _head($detalle){?>
		<div class="div_main div_main_R"><?php echo $detalle; ?></div>
		<div class="div_container">
	<?php } ?>


		<?php function pregunta_1($detalle){ 			
			_head($detalle);
		?>	

			<label>1.- Correo de organización</label>
				<div style="display: block; text-align:center;">
				<input type="text" class="correo Input_Correo" id="Correo_Organizacion" name="Correo_Organizacion" placeholder="Correo de contacto de la organización" value="" required>
					<input type="text" value="@" class="correo Arroba_Correo" disabled>
					<select name="Correos_1" class="correo Mail_Correo" >
						<option value="hotmail.com">hotmail.com</option>
						<option value="gmail.com">gmail.com</option>
						<option value="outlook.com">outlook.com</option>
					</select>						
				</div><br><br>

				</div>
		<?php } ?>


		<?php function pregunta_2($detalle){  			
			_head($detalle);
		?>	

			<label>2.- RFC</label>
			<input type="text" class="common" id="rfcHomoclave" name="rfcHomoclave" placeholder="RFC con homoclave de la organización" value="" required>

			</div>
		<?php } ?>


		<?php function pregunta_3($detalle){  			
			_head($detalle);
		?>	
			<label>3.- RFC (PDF o JPG) </label> <label style="color: dimgray; font-size: 18px;">(No exceder los 3 MB)</label><br>
			<input type="file" class="common" name="files[]" required><br>

			</div>
		<?php } ?>


		<?php function pregunta_4($detalle){  			
			_head($detalle);
		?>	

			<label>4.- CLUNI</label>
			<input type="text" class="common" id="CLUNI" name="CLUNI" placeholder="CLUNI (Si no se tiene, ingresar PRE-FOLIO otorgado)" value="" required>

			</div>
		<?php } ?>


		<?php function pregunta_5($detalle){  			
			_head($detalle);
		?>	

			<label>5.- CLUNI (PDF o JPG)</label> <label style="color: dimgray; font-size: 18px;">(No exceder los 3 MB)</label><br>
			<input type="file" class="common" name="files[]" required><br>
			
			</div>
		<?php } ?>

		<?php function pregunta_6($detalle){  			
			_head($detalle);
		?>	

			<label>6.- Nombre de la Organizaciones de Sociedad Civil</label>					
			<input type="text" class="common" id="nombreOSC" name="nombreOSC" placeholder="Nombre de la OSC (tal cómo está escrita en su OSC)" value="" required>

			</div>
		<?php } ?>

		
		<?php function pregunta_7($detalle){  			
			_head($detalle);
		?>	
 
			<label>7.- Objeto social de la organización</label>
			<input type="text" class="common" id="objetoSocialOrganizacion" name="objetoSocialOrganizacion" placeholder="Objeto social de la organización"value="" required>


			</div>
		<?php } ?>


		
		<?php function pregunta_8($detalle){  			
			_head($detalle);
		?>	
 
			<label>8.- Misión</label>
			<textarea name="mision" class="common" id="mision" placeholder="Misión" required></textarea>


			</div>
		<?php } ?>

		
		<?php function pregunta_9($detalle){  			
			_head($detalle);
		?>	
 
			<label>9.- Visión</label>
			<textarea name="vision" class="common" id="vision" placeholder="Visión" required></textarea>


			</div>
		<?php } ?>


		
		<?php function pregunta_10($detalle){  			
			_head($detalle);
		?>	
 
			<label>10.- Áreas de atención</label>
			<textarea name="areasAtencion" class="common" id="areasAtencion" placeholder="Áreas de atención de la OSC" required></textarea>

			</div>
		<?php } ?>


		
		<?php function pregunta_11($detalle){  			
			_head($detalle);
		?>	
 			
<?php 	$Desarollo_Proyecto = [
		'Salud', 'Asistencia y seguridad social (incluye asilo de ancianos, casas de día, etc)', 'Educación', 'Desarrollo urbano y vivienda', 'Deporte', 'Cultura', 'Desarrollo regional sustentable', 'Financiamiento para el desarrollo', 'Equidad género', 'Atención a pueblos indígenas', 'Juventud', 'Adultos mayores (servicios o proyectos distintos a lo asistencial, es decir, no asilos, no albergues o casas hogar)'
	]; ?>


			<label class="common">11.- ¿En qué tema de Derecho Social se desarrolla principalmente su organización?</label><br>
				<select class="common" name="tema_de_Derecho_Social" value="" required>
				    <?php foreach($Desarollo_Proyecto as $proyecto) {?>
				  		<option><?php echo $proyecto?></option>
				  	<?php } ?>
				</select><br><br>

			</div>
		<?php } ?>


		
		<?php function pregunta_12($detalle){  			
			_head($detalle);
		?>	
 
			<label>12.- Calle</label>
			<input type="text" class="common" id="calle" name="calle" placeholder="Calle del domicilio" value="" required>

			</div>
		<?php } ?>

		
		<?php function pregunta_13($detalle){  			
			_head($detalle);
		?>	
 
			<label>13.- Colonia</label>
			<input type="text" class="common" id="colonia" name="colonia" placeholder="Colonia del domicilio" value="" required>

			</div>
		<?php } ?>

		
		<?php function pregunta_14($detalle){  			
			_head($detalle);
		?>	
 
			<label>14.- Codigo postal</label>
			<input type="text" class="common" id="codigoPostal" name="codigoPostal" placeholder="Codigo postal del domicilio" value="" required>

			</div>
		<?php } ?>

		
		<?php function pregunta_15($detalle){  			
			_head($detalle);
		?>	
 
			<label>15.- Localidad</label>  
			<input type="text" class="common" id="localidad" name="localidad" placeholder="Localidad del domicilio" value="" required>		

			</div>
		<?php } ?>

		
		<?php function pregunta_16($detalle){  			
			_head($detalle);
		?>	
 
			<label>16.- Domicilio</label>
			<input type="text" class="common" id="domicilio" name="domicilio" placeholder="Número del domicilio" value="" required>

			</div>
		<?php } ?>

		
		<?php function pregunta_17($detalle){  			
			_head($detalle);
		?>	
 	

				<?php 	$municipiosDeSonora = [
		'Aconchi', 'Agua Prieta', 'Alamos', 'Altar', 'Arivechi', 'Arizpe', 'Atil',
		'Bacadéhuachi', 'Bacanora', 'Bacerac', 'Bacoachi', 'Bácum', 'Banámichi', 'Baviácora',
		'Bavispe', 'Benito Juárez', 'Benjamín Hill', 'Caborca', 'Cajeme', 'Cananea', 'Carbó',
		'Cucurpe', 'Cumpas', 'Divisaderos', 'Empalme', 'Etchojoa', 'Fronteras', 'General Plutarco Elías Calles',
		'Granados', 'Guaymas', 'Hermosillo', 'Huachinera', 'Huásabas', 'Huatabampo', 'Huépac',
		'Imuris', 'La Colorada', 'Magdalena', 'Mazatán', 'Moctezuma', 'Naco', 'Nácori Chico',
		'Nacozari de García', 'Navojoa', 'Nogales', 'Onavas', 'Opodepe', 'Oquitoa', 'Pitiquito',
		'Puerto Peñasco', 'Quiriego', 'Rayón', 'Rosario', 'Sahuaripa', 'San Felipe de Jesús', 'San Ignacio Río Muerto',
		'San Javier', 'San Luis Río Colorado', 'San Miguel de Horcasitas', 'San Pedro de la Cueva', 'Santa Ana', 'Santa Cruz', 'Sáric',
		'Soyopa', 'Suaqui Grande', 'Tepache', 'Trincheras', 'Tubutama', 'Ures', 'Villa Hidalgo',
		'Villa Pesqueira', 'Yécora'
	]; ?>

			<label>17.- Municipio</label><label style="color: dimgray; font-size: 18px;">(Dom. Soc)</label><br>
			<select class="common" id="municipioRegistroOSC" name="municipioRegistroOSC" value="" required>
				<?php foreach($municipiosDeSonora as $municipio) {?>
				  	<option><?php echo $municipio?></option>
				<?php } ?>
			</select><br><br>

			</div>
		<?php } ?>

		
		<?php function pregunta_20($detalle){  			
			_head($detalle);
		?>	
 
			<label>20.- Teléfono oficina</label>  
			<input type="number" class="common" id="phoneOficina" name="phoneOficina" placeholder="Teléfono de la oficina (con lada)" value="" required>

			</div>
		<?php } ?>

		
		<?php function pregunta_21($detalle){  			
			_head($detalle);
		?>	
 
			<label>21.- Teléfono celular</label>
			<input type="number" class="common" id="phoneCelular" name="phoneCelular" placeholder="Teléfono celular (con lada)" value="" required>

			</div>
		<?php } ?>

		
		<?php function pregunta_22($detalle){  			
			_head($detalle);
		?>	
 
			<label>22.- Correo de organización</label>
			<input type="text" class="common" id="emailContacto" name="emailContacto" placeholder="Correo de contacto de la organización" value="" required>


			</div>
		<?php } ?>

		
		<?php function pregunta_23($detalle){  			
			_head($detalle);
		?>	
 
			<label>23.- Página web</label>
			<input type="url" class="common" id="paginaWeb" name="paginaWeb" placeholder="Página web de la organización" value="" >

			</div>
		<?php } ?>

		
		<?php function pregunta_24($detalle){  			
			_head($detalle);
		?>	
			<label>24.- Facebook</label>
			<input type="text" class="common" id="organizacionFB" name="organizacionFB" placeholder="Facebook de la organización" value="" required>

			</div>
		<?php } ?>

		
		<?php function pregunta_25($detalle){  			
			_head($detalle);
		?>	
 
			<label>25.- Twitter</label>
			<input type="text" class="common" id="organizacionTW" name="organizacionTW" placeholder="Twitter de la organización" value="" >

			</div>
		<?php } ?>

		
		<?php function pregunta_26($detalle){  			
			_head($detalle);
		?>	
 
			<label>26.- Instagram</label>
			<input type="text" class="common" id="organizacionInsta" name="organizacionInsta" placeholder="Instagram de la organización" value="" >	

			</div>
		<?php } ?>

		
		<?php function pregunta_27($detalle){  			
			_head($detalle);
		?>	
 
			<label>27.- ¿Su domicilio social es el mismo que el legal?</label>
			<div style="font-size: 20px; margin-left:20px;" >
				<input type="radio" class="common" name="domicilio_social_legal" value="Si" onclick="Domicilio_Social_S();" required> Si
				<input type="radio" class="common" name="domicilio_social_legal" value="No" onclick="Domicilio_Social_N();"> No <br><br>	
			</div>

			</div>
		<?php } ?>

		
		<?php function pregunta_27a($detalle){  			
			_head($detalle);
		?>	
 
			<label>27a.- Domicilio Legal (registrado ante SAT)</label> <label style="color: dimgray; font-size: 14px;">(Calle, número, entre o esquina con, colonia,código postal, localidad y municipio)</label>
			<input type="text" class="common" id="domicilio_Dom" name="domicilio_Dom" placeholder="Domicilio Legal" value="" >

			</div>
		<?php } ?>

		
		<?php function pregunta_27b($detalle){  			
			_head($detalle);
		?>	
 
			<label>27b.- Localidad</label> <label style="color: dimgray; font-size: 14px;">(Dom. Legal)</label>
			<input type="text" class="common" id="localidad_Dom" name="localidad_Dom" placeholder="Localidad" value="" >

			</div>
		<?php } ?>

		
		<?php function pregunta_27c($detalle, $municipiosDeSonora){  			
			_head($detalle);	
		?>

			<label>27c.- Municipio</label> <label style="color: dimgray; font-size: 14px;">(Dom. Legal)</label><br>
			<select class="common" id="municipio_Dom" name="municipio_Dom" value="" >
				<?php foreach($municipiosDeSonora as $municipio) {?>
				  	<option><?php echo $municipio; ?></option>
				<?php } ?>
			</select><br>

			</div>
		<?php } ?>


		
		<?php function pregunta_28($detalle){ _head($detalle); ?>
 
			<label class="common">28.- Acta constitutiva</label>
			<label style="color: dimgray; font-size: 18px;">(No exceder los 8 MB)</label>
			<input type="file" class="common" name="files[]" required>

			</div>
		<?php } ?>

		
		<?php function pregunta_29($detalle){  _head($detalle);	?>
			<label class="common">29.- Acta protocolizada donde conste la representación legal vigente</label>
			<input type="file" class="common" name="files[]" required>        

			</div>
		<?php } ?>

		
		<?php function pregunta_30($detalle){   			
			_head($detalle);	
		?>
 
			<label class="common">30.- INE del representante legal vigente</label>
			<input type="file" class="common" name="files[]" required>

			</div>
		<?php } ?>

		
		<?php function pregunta_31($detalle){   			
			_head($detalle);	
		?>
 
			<label>31.- Nombre del representante legal</label>
			<input type="text" class="common" id="nombreRepresentante" name="nombreRepresentante" placeholder="Nombre del representante legal vigente" value="" required>

			</div>
		<?php } ?>

		
		<?php function pregunta_32($detalle){   			
			_head($detalle);	
		?>
 
			<label>32.- Número de identificación oficial</label>
			<input type="text" class="common" id="idRepresentante" name="idRepresentante" placeholder="Número de identificación oficial del representante legal vigente" value="" required>

			</div>
		<?php } ?>

		
		<?php function pregunta_33($detalle){   			
			_head($detalle);	
		?>
 
			<label class="common">33.- Fecha de constitución de la Organización de Sociedad Civil</label><br>
			<input type="date" class="common" id="fechaConstitucionOSC" name="fechaConstitucionOSC" value="" required><br><br>

			</div>
		<?php } ?>

		
		<?php function pregunta_34($detalle){   			
			_head($detalle);	
		?>
 
			<label>34.- Nombre del Notario Público donde registró su Organización de Sociedad Civil</label>
			<input type="text" class="common" id="nombreNotario" name="nombreNotario" placeholder="Nombre del notario público" value="" required>

			</div>
		<?php } ?>

		
		<?php function pregunta_35($detalle){   			
			_head($detalle);	
		?>
 
			<label>35.- Número del notario público</label>
			<input type="text" class="common" id="numeroNotario" name="numeroNotario" placeholder="Número del notario público" value="" required>

			</div>
		<?php } ?>

		
		<?php function pregunta_36($detalle, $municipiosDeSonora){   			
			_head($detalle);	
		?>
			<label class="common">36.- Municipio de la Notaría Pública</label><br>
				<select class="common" name="municipioNotaria" value="" required>
				    <?php foreach($municipiosDeSonora as $municipio) {?>
				  		<option><?php echo $municipio?></option>
				  	<?php } ?>
				</select><br><br>

			</div>
		<?php } ?>

		
		<?php function pregunta_37($detalle){   			
			_head($detalle);	
		?>
			<label>37.- Número de escritura pública</label>
			<input type="text" class="common" id="noEstrituraPublica" name="noEstrituraPublica" placeholder="Número de estritura pública" value="" required>

			</div>
		<?php } ?>

		
		<?php function pregunta_38($detalle){ 
			_head($detalle);
		?>			
 			<label>38.- Volumen (escritura pública)</label>
			<input type="text" class="common" id="volumenEstrituraPublica" name="volumenEstrituraPublica" placeholder="Volumen de estritura pública" value="" required>

			</div>
		<?php } ?>

		
		<?php function pregunta_39($detalle){   			
			_head($detalle);	
		?>
 
			<label class="common">39.- Fecha de estritura pública</label><br>
			<input type="date" class="common" id="fechaEstritura" name="fechaEstritura" value="" required><br><br>

			</div>
		<?php } ?>

		
		<?php function pregunta_40($detalle){   			
			_head($detalle);	
		?>
 
			<label class="titulos-form">40.- RPP ICRESON</label><br/>
			<input type="file" class="common" name="files[]" required><br>

			</div>
		<?php } ?>

		
		<?php function pregunta_41($detalle){   			
			_head($detalle);	
		?>
 
			<label>41. Número de libro</label>
			<input type="text" class="common" id="numeroLibro" name="numeroLibro" placeholder="Número de libro" value="" required>

			</div>
		<?php } ?>

		
		<?php function pregunta_42($detalle){   			
			_head($detalle);	
		?>
 
			<label>42.- Número de inscrpción</label>
			<input type="text" class="common" id="numeroInscripcion" name="numeroInscripcion" placeholder="Número de inscrpción" value="" required>

			</div>
		<?php } ?>

		
		<?php function pregunta_43($detalle){  			
			_head($detalle);	
		?>
 
			<label>43.- Volúmen ICRESON</label>
			<input type="text" class="common" id="volumenICRESON" name="volumenICRESON" placeholder="Volúmen ICRESON" value="" required>

			</div>
		<?php } ?>

		
		<?php function pregunta_44($detalle){   			
			_head($detalle);	
		?>
 
			<label class="titulos-form">44.- ¿Su organización ha tenido modificaciones a su acta constitutiva?</label><br>
			<div style="font-size: 20px; margin-left:20px;">
				<input type="radio" class="common" name="existenModis" value="Si" onclick="Oculto_Acta_Costitutiva_S();" required> Si
				<input type="radio" class="common" name="existenModis" value="No" onclick="Oculto_Acta_Costitutiva_N();"> No 
			</div>

			</div>
		<?php } ?>

		
		<?php function pregunta_44a($detalle){   			
			_head($detalle);	
		?>
 
			<label class="common">44a.- Ultima acta modificatoria protocolizada</label>
			<label style="color: dimgray; font-size: 18px;">(No exceder los 3 MB)</label><br/>
			<input type="file" class="common" name="files[]" ><br>

			</div>
		<?php } ?>

		
		<?php function pregunta_44b($detalle){   			
			_head($detalle);	
		?>
 
			<label class="common">44b.- Fecha de la última modificación del acta constitutiva</label><br>
			<input type="date" class="common" id="ultimaModi" name="ultimaModi" value="" ><br><br>

			</div>
		<?php } ?>

		
		<?php function pregunta_44c($detalle){   			
			_head($detalle);	
		?>
 
			<label class="common">44c.- RPP ICRESON de la última acta modificatoria actualizada</label>
			<label style="color: dimgray; font-size: 18px;">(No exceder los 3 MB)</label><br/>
			<input type="file" class="common" name="files[]" ><br>

			</div>
		<?php } ?>

		
		<?php function pregunta_44d($detalle){   			
			_head($detalle);	
		?>
 
			<label>44d.- Número de acta constitutiva</label>
			<input type="text" class="common" id="numeroActaConsti" name="numeroActaConsti" placeholder="Número de acta constitutiva" value="" >

			</div>
		<?php } ?>

		
		<?php function pregunta_44e($detalle){   			
			_head($detalle);	
		?>
 
			<label>44e.- Volúmen de acta constitutiva</label>
			<input type="text" class="common" id="volumenActaConsti" name="volumenActaConsti" placeholder="Volúmen de acta constitutiva" value="" >

			</div>
		<?php } ?>

		
		<?php function pregunta_45($detalle){   			
			_head($detalle);	
		?>
 
			<label class="common">45.- ¿Está autorizada para recibir donativos deducibles de impuestos?</label><br>
			<div style="font-size: 20px; margin-left:20px;">
				<input type="radio" class="common" name="autorizadaDeducible" value="Si" onclick="Oculto_Donataria_S();" required> Si
				<input type="radio" class="common" name="autorizadaDeducible" value="No" onclick="Oculto_Donataria_N();"> No <br><br>	
			</div> 

			</div>
		<?php } ?>

		
		<?php function pregunta_45a($detalle){   			
			_head($detalle);	
		?>
 
			<label class="form-control">45a.- Página del Diario Oficial de la Federación donde se publicó su autorización</label>
			<label style="color: dimgray; font-size: 18px;">(No exceder los 3 MB)</label><br/>
			<input type="file" class="common" name="files[]" ><br>


			</div>
		<?php } ?>

		
		<?php function pregunta_45b($detalle){   			
			_head($detalle);	
		?>
 
			<label>45b.- número de página donde se identifica a su Organizaciones de Sociedad Civil</label> <label style="color: dimgray; font-size: 18px">(En caso de subir todo el DOF)</label>
			<input type="text" class="common" id="numeroDiario" name="numeroDiario"	placeholder="Número de página del Diario Oficial de la Federación" value="" >


			</div>
		<?php } ?>

		
		<?php function pregunta_45c($detalle){   			
			_head($detalle);	
		?>
 
			<label class="common">45c.- Fecha de publicación en el Diario Oficial de la Federación</label><br>
			<input type="date" class="common" id="fechaDiario" name="fechaDiario" value="" ><br>


			</div>
		<?php } ?>

		
		<?php function pregunta_45d($detalle){   			
			_head($detalle);	
		?>
 
			<label class="common">45d.- ¿El SAT ha detenido su autorización como donataria en algún momento?</label><br>
			<input type="radio" class="common" name="detenidoAutorizado" value="Si" onclick="Oculto_57_S();" > Si
			<input type="radio" class="common" name="detenidoAutorizado" value="No" onclick="Oculto_57_N();"> No <br>


			</div>
		<?php } ?>

		
		<?php function pregunta_45e($detalle){   			
			_head($detalle);	
		?>
 
			<label>45e.- ¿Por qué detuvo el SAT su aturización?</label>
			<input type="text" class="common" id="razonDetenido" name="razonDetenido" placeholder="¿Por qué detuvo el SAT su autorización?"	value="" >


			</div>
		<?php } ?>

		
		<?php function pregunta_45f($detalle){   			
			_head($detalle);	
		?>
 
			<label class="common">45f.- ¿Desde que fecha está autorizada para recibir donativos deducibles de impuestos?</label><br>
			<input type="date" class="common" id="fechaAutorizada" name="fechaAutorizada" value="" ><br><br>


			</div>
		<?php } ?>

		
		<?php function pregunta_46($detalle){   			
			_head($detalle);	
		?>
 
			<label class="common">46.- Su organización se rige o es dirigida por:</label>
			<div style="font-size: 20px; margin-left:20px;">
				<input type="radio" class="common" name="digiridaPor" value="Patronato" checked> Patronato <br>
				<input type="radio" class="common" name="digiridaPor" value="Consejo Directivo"> Consejo directivo <br>
				<input type="radio" class="common" name="digiridaPor" value="Otro"> Otro <br><br> 	
			</div>

			</div>
		<?php } ?>

		
		<?php function pregunta_47($detalle){   			
			_head($detalle);	
		?>
 
			<label>47.- Nombre del presidente</label>
			<input type="text" class="common" id="nombrePresi" name="nombrePresi" placeholder="Nombre del presidente y/o director general" value="" required>

			</div>
		<?php } ?>

		
		<?php function pregunta_48($detalle){   			
			_head($detalle);	
		?>
 
			<label>48.- Número de empleados</label>
			<input type="number" class="common" id="numeroEmpleados" name="numeroEmpleados" placeholder="Número de empleados de la organización" value="" required>

			</div>
		<?php } ?>

		
		<?php function pregunta_49($detalle){   			
			_head($detalle);	
		?>
 
			<label>49.- Número de voluntarios</label>
			<input type="number" class="common" id="numeroVoluntarios" name="numeroVoluntarios" placeholder="Número de voluntarios de la organización" value="" required>

			</div>
		<?php } ?>

		
		<?php function pregunta_50($detalle){   			
			_head($detalle);	
		?>
 
			<label>50.- Principales logros</label>			        
			<input type="text" class="common" id="principalesLogros" name="principalesLogros" placeholder="Principales logros de su organización durante el último año" value="" required>

			</div>
		<?php } ?>

		
		<?php function pregunta_51($detalle){   			
			_head($detalle);	
		?>
 
			<label>51.- Metas de la organización</label>
			<input type="text" class="common" id="metasOrganización" name="metasOrganización" placeholder="Metas de la organización para el presente año (2019)"value="" >

			</div>
		<?php } ?>

		
		<?php function pregunta_52($detalle){   			
			_head($detalle);	
		?>
 
			<label>52.- Alianzas con las que cuenta</label>
			<input type="text" class="common" id="principalesAlianzas" name="principalesAlianzas" placeholder="Mencione las principales alianzas con las que cuente convenio o realiza acciones conjuntas" value="" required>

			</div>
		<?php } ?>
		
		<?php function pregunta_53($detalle){   			
			_head($detalle);	
		?>

		<label>53.- Número de personas que benefició el año anterior</label>
		<input type="number" class="common" id="numeroBeneficiados" name="numeroBeneficiados" placeholder="Número de pesonas que beneficio el año pasado, en su totalidad, como organización" value="" required>

			</div>
		<?php } ?>	
		
		<?php function pregunta_54($detalle){   			
			_head($detalle);	
		?>

		<label class="common">54.- Numero de personas que veneficio en el úlitmo año</label><br> 
				<input type="number" class="common P6" id="poblacion_0_4" name="poblacion_0_4"
					placeholder="0 a 4 años"
					value="" required>

				<input type="number" class="common P6" id="poblacion_5_14" name="poblacion_5_14"
					placeholder="5 a 14 años"
					value="" required>

				<input type="number" class="common P6" id="poblacion_15_29" name="poblacion_15_29"
					placeholder="15 a 29 años"
					value="" required>

				<input type="number" class="common P6" id="poblacion_30_44" name="poblacion_30_44"
					placeholder="30 a 44 años"
					value=""  required>

				<input type="number" class="common P6" id="poblacion_45_64" name="poblacion_45_64"
					placeholder="45 a 64 años"
					value="" required>

				<input type="number" class="common P6" id="poblacion_65_mas" name="poblacion_65_mas"
					placeholder="65 años o mas"
					value="" required>


			</div>
		<?php } ?>	
			
		<?php function pregunta_55($detalle){   			
			_head($detalle);	
		?>
 
		<label class="titulos-form">55.- ¿Tiene observaciones en su 32 D?</label>
		<div style="font-size: 20px; margin-left:20px;">
			<input type="radio" class="common" name="observaciones32D" value="Si" checked> Si
			<input type="radio" class="common" name="observaciones32D" value="No"> No <br><br>
		</div>


			</div>
		<?php } ?>	
			
		<?php function pregunta_56($detalle){   			
			_head($detalle);	
		?>
 
		<label class="common">56.- 32D en positivo y con 30 días de expedición como máximo</label>  
		<label style="color: dimgray; font-size: 18px;">(No exceder los 300 KB)</label>
		<input type="file" class="common" name="files[]" required>

			</div>
		<?php } ?>	
	
		
		<?php function pregunta_57($detalle){   			
			_head($detalle);	
		?>
 
		<label class="titulos-form">57.- ¿Ha presentado en tiempo y forma la declaración por ejercicio, de impuestos federales?</label>
		<div style="font-size: 20px; margin-left:20px;">
			<input type="radio" class="common" name="tiempoYforma" value="Si" checked> Si
			<input type="radio" class="common" name="tiempoYforma" value="No"> No <br><br>
		</div>


			</div>
		<?php } ?>	
			
		<?php function pregunta_58($detalle){   			
			_head($detalle);	
		?>
 
		<label class="titulos-form">58.- ¿Tiene adeudos fiscales a cargo, por impuestos federales?</label>
		<div style="font-size: 20px; margin-left:20px;">
			<input type="radio" class="common" name="tieneAdeudos" value="Si" checked> Si
			<input type="radio" class="common" name="tieneAdeudos" value="No"> No <br><br>
		</div>


			</div>
		<?php } ?>	
			
		<?php function pregunta_59($detalle){   			
			_head($detalle);	
		?>
 
		<label class="common">59.- F21, del presente año (PDF)</label>
		<label style="color: dimgray; font-size: 18px;">(No exceder los 800 KB)</label>
		<input type="file" class="common" name="files[]" required>  


			</div>
		<?php } ?>	
			
		<?php function pregunta_60($detalle){   			
			_head($detalle);	
		?>
 
		<label class="common">60.- Constancia de Situación Fiscal</label>
		<input type="file" class="common" name="files[]" required>


			</div>
		<?php } ?>	
			
		<?php function pregunta_61($detalle){   			
			_head($detalle);	
		?>
 
		<label class="common">61.- Comprobante de cuenta bancaria</label>
		<input type="file" class="common" name="files[]" required>


			</div>
		<?php } ?>	
			
		<?php function pregunta_62($detalle){   			
			_head($detalle);	
		?>
 
		<label class="common">62.- Factura cancelada</label>
		<input type="file" class="common" name="files[]" required>


			</div>
		<?php } ?>	
			
		<?php function pregunta_63($detalle){   			
			_head($detalle);	
		?>
 
		<label class="titulos-form">63.- ¿Está inscrita en el Directorio Nacional de Instituciones de Asistencia Social?</label>
		<div style="font-size: 20px; margin-left:20px;">
			<input type="radio" class="common" name="inscritaDNIAS" value="Si" onclick="Oculto_77_S();" required> Si
			<input type="radio" class="common" name="inscritaDNIAS" value="No" onclick="Oculto_77_N();"> No somos una organización de asistencia social <br><br>
		</div>

			</div>
		<?php } ?>	
			
		<?php function pregunta_63a($detalle){   			
			_head($detalle);	
		?>
 
		<label class="common">63a.- DNIAS</label>
		<input type="file" class="common" name="files[]" >
		</div>


			</div>
		<?php } ?>	
			
		<?php function pregunta_64($detalle){   			
			_head($detalle);	
		?>
 
		<label class="titulos-form">64.- ¿Ha manejado esquemas de recursos complementarios?</label><br>
		<div style="font-size: 20px; margin-left:20px;">
			<input type="radio" class="common" name="esquemasRecursosComp" value="Si" onclick="Oculto_79_S();" required> Sí
			<input type="radio" class="common" name="esquemasRecursosComp" value="No" onclick="Oculto_79_N();"> No
		</div><br>


			</div>
		<?php } ?>	
			
		<?php function pregunta_64a($detalle){  			
			_head($detalle);	
		?>
 
		<label>64a.- Con qué organización ha manejado recursos complementarios</label>
		<input type="text" class="common" id="organizacionManejoRecursos" name="organizacionManejoRecursos" placeholder="¿Con qué organización ha manejado recursos complementarios?" value="" >

			</div>
		<?php } ?>