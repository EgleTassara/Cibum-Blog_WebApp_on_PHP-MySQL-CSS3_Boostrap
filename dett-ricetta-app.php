<?php include ("Connections/connect.php");?>

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
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Dettaglio ricetta App</title>
<link href="http://otakusisland.altervista.org/cibumApp/css/index.css" rel="stylesheet" type="text/css">	
</head>

<body>
	<div id="dettaglio">
			<div onClick="tornaIndietro(<?php echo $_GET['scroll'];?>)" style="background-color: #AD0002;">
				<img src="http://otakusisland.altervista.org/cibum/images/<?php echo $row_RS_pagricette['foto'];?>" class="img-responsive center-block" class="ricetta">
		        <p><?php echo $row_RS_pagricette['nome'];?>:</p>
    			<?php echo $row_RS_dettaglio['categoria'];?>: <span class="pacifico"><?php echo $row_RS_dettaglio['nome'];?></span></h1>
				<hr>
				<h2>Elenco Ingredienti:</h2>
				<?php echo $row_RS_dettaglio['ingredienti'];?>
				
				<div class="panel panel-default text-center center-block">
					<div class="panel-heading">
						<h3 class="panel-title">PREPARAZIONE:</h3><?php echo $row_RS_dettaglio['tempoPreparazione'];?> minuti
					</div>
					<div class="panel-body"> 
						<h3 class="panel-title">COTTURA:</h3><?php echo $row_RS_dettaglio['cottura'];?> minuti
					</div>
					<div class="panel-heading">
						<h3 class="panel-title">PRONTO IN:</h3><?php echo $row_RS_dettaglio['tempoPreparazione']+$row_RS_dettaglio['cottura'];?> minuti
					</div>
					<div class="panel-body"> 
						<h3 class="panel-title">DIFFICOLT&Agrave;:</h3><?php echo $row_RS_dettaglio['difficoltà'];?>
					</div>
					<div class="panel-heading">
						<h3 class="panel-title">COSTO:</h3><?php echo $row_RS_dettaglio['costo'];?>
					</div>
					<div class="panel-body"> 
						<h3 class="panel-title">DOSI:</h3><?php echo $row_RS_dettaglio['dosi'];?> person<?php if($row_RS_dettaglio['dosi']==1){echo "a";}else{echo "e";}?>
					</div>
				</div>
				<hr>
				<h2>Procedimento:</h2>
				<?php echo $row_RS_dettaglio['procedimento'];?>
				<hr>
				<div class="embed-responsive embed-responsive-16by9">
				  <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/2AcX0RzTC3g"></iframe>
			  	</div>
			</div>
			<hr>
	</div>

</body>

</html>

</body>

</html>
