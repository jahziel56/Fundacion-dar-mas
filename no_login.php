<?php  
if (!isset($_SESSION['user_Id'])) {
	header("Location: index.php?error=no_login");
}