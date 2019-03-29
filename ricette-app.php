<?php include ("http://otakusisland.altervista.org/cibum/Connections/connect.php");?>



<?php

$query_RS_ricette="SELECT * FROM ricette";

$RS_ricette=mysqli_query($connessione, $query_RS_ricette);

$row_RS_ricette=mysqli_fetch_assoc($RS_ricette);

$totalRowsRicette=mysqli_num_rows($RS_ricette);



$ricettePerPagina=15;

$pagineTotali=ceil($totalRowsRicette/$ricettePerPagina);

if($pagineTotali<1){

	$pagineTotali=1;

}



$pagenum=1;

if(isset($_GET['pag'])){

	$pagenum=$_GET['pag'];

}



if($pagenum<1){

	$pagenum=1;

}else if($pagenum>$pagineTotali){

	$pagenum=$pagineTotali;

}



$limite='LIMIT '.($pagenum-1)*$ricettePerPagina.','.$ricettePerPagina;

$query_RS_pagricette="SELECT * FROM ricette ORDER BY id DESC $limite";

$RS_pagricette=mysqli_query($connessione,$query_RS_pagricette);

$row_RS_pagricette=mysqli_fetch_assoc($RS_pagricette);

$totalRows_pagricette=mysqli_num_rows($RS_pagricette);



$numDa=($ricettePerPagina*$pagenum)-$ricettePerPagina+1;

$numA=$ricettePerPagina*$pagenum;

?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Ricette App</title>
<link href="http://otakusisland.altervista.org/cibumApp/css/index.css" rel="stylesheet" type="text/css">
</head>


<body>
<div id="ricetteApp">

<?php if($totalRows_pagricette>0){ do{ ?>

	<div onClick="vaiadettaglio(<?php echo $row_RS_pagricette['codice'];?>)" style="background-color: #AD0002;">
		<img src="http://otakusisland.altervista.org/cibum/images/<?php echo $row_RS_pagricette['foto'];?>" 
         class="img-responsive" class="ricette">
         <h2 align="center"><?php echo $row_RS_pagricette['nome'];?>:</h2>
         <p><?php echo substr($row_RS_pagricette['procedimento'],0,100);?>...</p>
		<div class="btn-toolbar" role="toolbar">
  			<div class="btn-group" role="group">
    			<button type="button" class="btn btn-success">Difficoltà: <?php echo $row_RS_pagricette['difficolta'];?></button>
   				<button type="button" class="btn btn-warning">Costo: <?php echo $row_RS_pagricette['costo'];?></button>
    			<button type="button" class="btn btn-danger">Tempo: <?php echo $row_RS_pagricette['tempoPreparazione'];?></button>
  			</div>
		</div>	
	</div>
	<br><br>
   <?php }while($row_RS_pagricette=mysqli_fetch_assoc($RS_pagricette));} ?>  
	
</div>   
</body>

</html>