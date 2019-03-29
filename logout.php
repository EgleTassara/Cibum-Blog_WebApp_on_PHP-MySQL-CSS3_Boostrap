<?php
session_start();
$_SESSION['username']=NULL;
unset($_SESSION['username']);
header("Location:index.php");
exit;
?>