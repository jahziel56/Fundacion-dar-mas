<?php
	spl_autoload_register('AutoLoader');

	function AutoLoader($className){
		$path = "classes/";
		$extension = ".php";
		$fullPath = $path . $className . $extension;

		if (file_exists($fullPath)) {
			return false;
			echo "error";
		}

		include_once $fullPath;
	}

	/* require"includes/autoloader.inc.php"; */	