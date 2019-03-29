<?php include ("../Connections/connect.php");?>
<?php include ("../controlloErrori.php");?>
<?php
    
    $query_RS_dettaglio="SELECT * FROM ricette WHERE id=".$_GET['codice'];
    $RS_dettaglio=mysqli_query($connessione, $query_RS_dettaglio);
    $row_RS_dettaglio=mysqli_fetch_assoc($RS_dettaglio);
    $totalRowsdettaglio=mysqli_num_rows($RS_dettaglio);
    
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
	<p>Sei sicuro di voler eliminare la seguente ricetta?</p><br>
    <img src="../images/<?php echo $row_RS_dettaglio['foto'; ?>" style="margin:auto; display:block; width:200px; height:auto;"> <br>
    <a href="elimina-definitivo.php?codice=<?php echo $row_RS_dettaglio['id']; ?>";>Si, cancella!</a>
    <a href="javascript:history.go(-1);">No, torna indietro</a>
</body>
</html>
