<?php
	$DB_NAME='my_otakusisland';
	$DB_HOST='localhost';
	$DB_USER='otakusisland';
	$DB_PASS='';
	
$connessione=mysqli_connect($DB_HOST,$DB_USER,$DB_PASS)or die('Connessione al db non riusciuta!');
mysqli_select_db($connessione,$DB_NAME)or die('Nome db errato!');
mysqli_set_charset($connessione,'utf8');
?>
