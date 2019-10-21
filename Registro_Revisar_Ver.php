<?php 
if (isset($_POST['Enviar_Revisión'])) {
    require 'includes/dbh.inc.php'; 

    print_r($_POST);

    $P0 = $_POST['0'];

    echo "<BR>$P0 <BR>";

    if (!empty($_POST['64a'])) {
    	$P64a = $_POST['64a'];
    	unset($_POST['64a']);
    	echo "<BR> -- $P64a --<BR><BR>";
    }

   

    print_r($_POST);

     echo "<BR><BR> -------- <BR><BR>";
$i = 1;
    foreach ($_POST as $row) {
    	$concatenar= 'checkbox';
    	$concatenar .= $i;
    	if ($row == $concatenar) {
    		if ($concatenar == 'on') {
    			echo "$concatenar<br>";
    		}
    		
    	}else{
    		//echo "Correcion[$i]: $row<br>";
    	}
    	$i++;
    }


$i = 1;
    foreach ($_POST as $row) {
    	if (empty($row)) {
    		//echo "contestado correctamente<br>";
    	}else{
    		echo "Correcion[$i]: $row<br>";
    	}
    	$i++;
    }
}
