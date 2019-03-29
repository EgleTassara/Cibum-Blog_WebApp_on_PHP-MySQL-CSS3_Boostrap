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
			<ul data-role="listview" data-inset="true">
				<li><a href="#">
					<h3>INSERISCI</h3>
					<p style="color: #FFFFFF">Inserisci una nuova ricetta</p></a>
					<a href="nuova-ricetta.php" target="_self" data-icon="plus">Predefinito</a>
				</li>

				<li><a href="#">
					<h3>MODIFICA</h3>
					<p style="color: #FFFFFF">Modifica una ricetta esistente</p></a>
					<a href="ricette.php" target="_self" data-icon="edit">Predefinito</a>
				</li>

				<li>
					<form action="risultato-ricerca.php" method="get" name="ricerca" target="_self" id="ricerca">
						<div data-role="fieldcontain">
							<label for="search">RICERCA</label>
							<input name="search" type="search" id="search" placeholder="" value=""  />
							<input type="submit" value="Invia" data-icon="search" data-iconpos="right" style="padding-left: 20%;"/>
						</div>
					</form>
				</li>
			</ul>
		</div>
	</div>
</body>
</html>