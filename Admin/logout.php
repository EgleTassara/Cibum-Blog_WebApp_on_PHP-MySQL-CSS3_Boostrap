<?php
	session_start();
	$_SESSION['userAdmin']=NULL;
	unset($_SESSION['userAdmin']);
	header("Location:login.php");
	exit;
?>