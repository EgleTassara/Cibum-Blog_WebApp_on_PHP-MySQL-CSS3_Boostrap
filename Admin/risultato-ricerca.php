<?php include ("../controlloErrori.php");?>
<?php include ("../Connections/connect.php");?>

<?php
    
    $ricerca=$_GET['search'];
    
    $query_RS_ricette="SELECT *, MATCH(nome, procedimento) AGAINST('*$ricerca*' IN BOOLEAN MODE) AS attinenza FROM ricette WHERE MATCH(nome, procedimento) AGAINST('*$ricerca*' IN BOOLEAN MODE) ORDER BY attinenza DESC";
    $RS_ricette=mysqli_query($connessione, $query_RS_ricette);
    $row_RS_ricette=mysqli_fetch_assoc($RS_ricette);
    $totalRowsRicette=mysqli_num_rows($RS_ricette);
    
    $ricettePerPagina=10;
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
    $query_RS_pagricette="SELECT *, MATCH(nome, procedimento) AGAINST('*$ricerca*' IN BOOLEAN MODE) AS attinenza FROM ricette WHERE MATCH(nome, procedimento) AGAINST('*$ricerca*' IN BOOLEAN MODE) ORDER BY attinenza DESC";
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
                <a href="index.php" target="_self" data-icon="home" data-iconpos="top" data-role="button">HOME</a>
				<a href="logout.php" target="_self" data-icon="power" data-iconpos="top" data-role="button">LOGOUT</a>
			</div>
            <nav>
                <!-- Add class .pagination-lg for larger blocks or .pagination-sm for smaller blocks-->
                <ul class="pagination">
                    <?php if($pagenum>1){?>
                        <li><a href="<?php echo $_SERVER['PHP_SELF']."?pag=1";?>" aria-label="Previous">
                        <span aria-hidden="true">&laquo;</span></a></li>
                    <?php } ?>
                    <?php if($pagenum>1){
                            $n=$pagenum-4;
                            if($n<1){$n=1;
                        }while($n<$pagenum){?>
                        <li><a href="<?php echo $_SERVER['PHP_SELF']."?pag=$n";?>"><?php echo $n?></a></li>
                        <?php $n++;}}?>
                        <li class="active disabled"><a href="#"><?php echo $pagenum;?></a></li>
                        <?php if($pagenum<$pagineTotali){
                                            $n=$pagenum+1;
                            while($n<$pagenum+5 && $n<=$pagineTotali){?>
                        <li><a href="<?php echo $_SERVER['PHP_SELF']."?pag=$n";?>"><?php echo $n?></a></li>
                        <?php $n++;}}?>
                        <?php if($pagenum<$pagineTotali){?>
                        <li><a href="<?php echo $_SERVER['PHP_SELF']."?pag=$pagineTotali";?>" aria-label="Next">
                        <span aria-hidden="true">&raquo;</span></a></li>
                <?php } ?>
            </ul>
        </nav>
        <ul data-role="listview" data-inset="true">
            <?php if($totalRows_pagricette>0){ do{ ?>
                <li><a href="#">
                <p><img src="../images/<?php echo $row_RS_pagricette['foto'];?>" width="200" height="200" alt=""></p>
                <h3><?php echo $row_RS_pagricette['nome'];?></h3>
                <p><?php echo $row_RS_pagricette['ingredienti'];?></p>
                <p><?php echo $row_RS_pagricette['procedimento'];?></p>
                <div data-role="controlgroup" data-type="horizontal" class="center">
                    <button>Difficolt&agrave;:<?php echo $row_RS_pagricette['difficolta'];?></button>
                    <button>Dosi:<?php echo $row_RS_pagricette['dosi'];?></button>
                    <button>Tempo di preparazione:<?php echo $row_RS_pagricette['tempoPreparazione'];?></button>
                    <button>Tempi di cottura:<?php echo $row_RS_pagricette['cottura'];?></button>
                    <button>Costo:<?php echo $row_RS_pagricette['costo'];?></button>
                </div>
                <span class="ui-li-count">Data inserimento: <?php echo $row_RS_pagricette['data'];?></span>
                    <p class="ui-li-aside">Categoria: <?php echo $row_RS_pagricette['categoria'];?></p>
                    <p>
                        <a href="mod-ricetta.php?codice=<?php echo $row_RS_pagricette['id'];?>&pag=<?php echo $_GET['pag'];?>" target="_self">MODIFICA</a>
                        <a href="elimina-ricetta.php?codice=<?php echo $row_RS_pagricette['id'];?>" target="_self">CANCELLA</a>
                    </p>
                </a>
                <a href="mod-ricetta.php?codice=<?php echo $row_RS_pagricette['id'];?>" target="_self"></a></li>
                <?php }while($row_RS_pagricette=mysqli_fetch_assoc($RS_pagricette));} ?>
            </ul>
        <nav>
            <!-- Add class .pagination-lg for larger blocks or .pagination-sm for smaller blocks-->
            <ul class="pagination">
            <?php if($pagenum>1){?>
                <li><a href="<?php echo $_SERVER['PHP_SELF']."?pag=1";?>" aria-label="Previous">
                <span aria-hidden="true">&laquo;</span></a></li>
            <?php } ?>
            <?php if($pagenum>1){
                    $n=$pagenum-4;
                    if($n<1){$n=1;
                    }while($n<$pagenum){?>
                <li><a href="<?php echo $_SERVER['PHP_SELF']."?pag=$n";?>"><?php echo $n?></a></li>
                <?php $n++;}}?>
                <li class="active disabled"><a href="#"><?php echo $pagenum;?></a></li>
                <?php if($pagenum<$pagineTotali){
                                $n=$pagenum+1;
                        while($n<$pagenum+5 && $n<=$pagineTotali){?>
                <li><a href="<?php echo $_SERVER['PHP_SELF']."?pag=$n";?>"><?php echo $n?></a></li>
                <?php $n++;}}?>
                <?php if($pagenum<$pagineTotali){?>
                <li><a href="<?php echo $_SERVER['PHP_SELF']."?pag=$pagineTotali";?>" aria-label="Next">
                <span aria-hidden="true">&raquo;</span></a></li>
            <?php } ?>
        </ul>
    </nav>
		</div>
	</div>
</body>
</html>
