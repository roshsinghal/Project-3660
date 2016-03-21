<?php
	session_start();
	//$_SESSION['login_user'] = NULL;
	session_destroy();
	header('location: index.php');
	//exit();		
?>
