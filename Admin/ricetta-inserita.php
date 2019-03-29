<?php
session_start();
if($_SESSION['userAdmin']==NULL){
	header("Location:login.php");
}
?>

<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Amministrazione Cibum</title>
	<link rel="stylesheet" href="themes/cibum.min.css" />
	<link rel="stylesheet" href="themes/jquery.mobile.icons.min.css" />
	<link rel="stylesheet" href="http://code.jquery.com/mobile/1.4.5/jquery.mobile.structure-1.4.5.min.css" />
	<link href="../css/bootstrap.css" rel="stylesheet" type="text/css">
	<script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
	<script src="http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.js"></script>
	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
</head>
<body>
	<div data-role="page" data-theme="a">
		<div data-role="header" data-position="inline">
			<img src="../img/logo-02.png" class="img-responsive center-block" alt="Placeholder image">
			<h1>PANNELLO ADMIN!</h1>
		</div>
		<div data-role="content" data-theme="a">
			<div data-role="controlgroup">
				<div class="text-center">Benvenuto Amministratore,<br>cosa vuoi fare oggi?</div>
				<a href="logout.php" target="_self" data-icon="power" data-iconpos="top" data-role="button">LOGOUT</a>
			</div>
		</div>
	</div>
</body>
</html>