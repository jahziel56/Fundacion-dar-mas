<?php
/* METODO: evitar que el usuario ingrese a esta pagina php desde la barra de busqueda */
/* signup-submit es el boton del formulario que se encuentra en la signup.php */
if (isset($_POST['submit'])) {
	/* manda a llamar a la pagina php donde se conecta a la base de datos de esta forma se ahorra codigo y se tiene todo en una funcion mas simple */
        require 'includes/dbh.inc.php'; 
	

        echo "<pre>";
        print_r($_POST);
        echo "</pre>";





    //header("Location: ../index.php");
	//exit();
}
else{
	header("Location: index.php");
	exit();		
}