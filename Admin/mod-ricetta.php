<?php include ("../controlloErrori.php");?>
<?php include ("../Connections/connect.php");?>
<?php
    
    $query_RS_dettaglio="SELECT * FROM ricette WHERE id=".$_GET['codice'];
    $RS_dettaglio=mysqli_query($connessione, $query_RS_dettaglio);
    $row_RS_dettaglio=mysqli_fetch_assoc($RS_dettaglio);
    $totalRowsdettaglio=mysqli_num_rows($RS_dettaglio);
    
    //inserire una ricetta
    if(isset($_POST['aggiungi'])){
        $foto=$_GET['foto'];
        $categoria=$_POST['categoria'];
        $procedimento=$_POST['procedimento'];
        $nome=$_POST['nome'];
        $ingredienti=$_POST['ingredienti'];
        $cottura=$_POST['cottura'];
        $costo=$_POST['costo'];
        $dosi=$_POST['dosi'];
        $tempoPreparazione=$_POST['tempoPreparazione'];
        $difficolta=$_POST['difficolta'];
        
        $inserisci="UPDATE ricette SET categoria='$categoria',procedimento='$procedimento',nome='$nome',ingredienti='$ingredienti',cottura='$cottura',costo='$costo',dosi='$dosi',tempoPreparazione='$tempoPreparazione',difficolta='$difficolta' WHERE id=".$_GET['codice']."";
        
        $res=mysqli_query($connessione,$inserisci) or die (mysqli_error($connessione));
        if($res){
            echo "<script>window.location.replace('ricette.php?pag=$pag')</script>";
        }else{ echo "errore";}
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
                <a href="index.php" target="_self" data-icon="home" data-iconpos="top" data-role="button">HOME</a>
                <a href="login.php" target="_self" data-icon="power" data-iconpos="top" data-role="button">LOGOUT</a>
            </div>
			</div>
            <div data-role="collapsible-set">
                <div data-role="collapsible" data-collapsed="false">
                    <h3>MODIFICA LA RICETTA</h3>
                    <p>
                    <img src="../images/<?php echo $row_RS_dettaglio['foto']; ?>" style="margin:auto; display:block; width:200px; height:auto;"  >
                    <form action="" method="post" name="inserisci_ricetta" target="_top">
                        <div data-role="fieldcontain">
                            <label for="nome">Titolo Ricetta:</label>
                            <input type="text" name="nome" id="nome" placeholder="Dai un titolo alla ricetta" value="<?php echo $row_RS_dettaglio['nome'];?>"  />
                        </div>
                        <div data-role="fieldcontain">
                            <label for="selectmenu" class="select">Scegli la Categoria:</label>
                            <select name="selectmenu" id="selectmenu">
                                <option value="CARNE" <?php if($row_RS_dettaglio['categoria']=="CARNE"){ echo "selected=\"selected\"";} ?>>CARNE</option>
                                <option value="PIATTI UNICI" <?php if($row_RS_dettaglio['categoria']=="PIATTI UNICI"){ echo "selected=\"selected\"";} ?>>PIATTI UNICI</option>
                                <option value="DOLCI" <?php if($row_RS_dettaglio['categoria']=="DOLCI"){ echo "selected=\"selected\"";} ?>>DOLCI</option>
                            </select>
                        </div>
                        <div data-role="fieldcontain">
                            <label for="textarea">Elenco ingredienti:</label>
                            <textarea cols="40" rows="8" name="ingredienti" id="ingredienti">
                                <?php echo $row_RS_dettaglio['ingredienti'];?>
                            </textarea>
                            <script>CKEDITOR.replace('ingredienti');</script>
                        </div>
                        <div data-role="fieldcontain">
                            <label for="textarea">Procedimento:</label>
                                <textarea cols="40" rows="8" name="procedimento" id="procedimento">
                                    <?php echo $row_RS_dettaglio['procedimento'];?>
                                </textarea>
                                <script>CKEDITOR.replace('procedimento');</script>
                        </div>
                        <div data-role="fieldcontain">
                            <fieldset data-role="controlgroup">
                                <legend>Costo</legend>
                                <input type="radio" name="costo" id="costo_0" value="Molto basso" <?php if($row_RS_dettaglio['costo']=="Molto basso"){ echo "checked=\"checked\"";} ?>/>
                                    <label for="costo_0">Molto basso</label>
                                    <input type="radio" name="costo" id="costo_1" value="Basso" <?php if($row_RS_dettaglio['costo']=="Basso"){ echo "checked=\"checked\"";} ?> />
                                    <label for="costo_1">Basso</label>
                                    <input type="radio" name="costo" id="costo_2" value="Medio" <?php if($row_RS_dettaglio['medio']=="Medio"){ echo "checked=\"checked\"";} ?> />
                                    <label for="costo_2">Medio</label>
                                    <input type="radio" name="costo" id="costo_3" value="Alto" <?php if($row_RS_dettaglio['costo']=="Alto"){ echo "checked=\"checked\"";} ?>/>
                                    <label for="costo_3">Alto</label>
                                    <input type="radio" name="costo" id="costo_4" value="Molto alto" <?php if($row_RS_dettaglio['costo']=="Molto alto"){ echo "checked=\"checked\"";} ?>/>
                                    <label for="costo_4">Molto alto</label>
                            </fieldset>
                        </div>
                        <div data-role="fieldcontain">
                            <label for="cottura">Dosi per persona:</label>
                            <input name="dosi" type="range" id="dosi" max="12" min="2" step="2" value="<?php echo $row_RS_dettaglio['dosi'];?>" />
                            </div>
                            <div data-role="fieldcontain">
                                <label for="cottura">Minuti di cottura:</label>
                                <input name="cottura" type="range" id="cottura" max="120" min="1" step="1" value="<?php echo $row_RS_dettaglio['cottura'];?>" />
                            </div>
                            <div data-role="fieldcontain">
                                <label for="cottura">Minuti di preparazione:</label>
                                <input name="tempoPreparazione" type="range" id="tempoPreparazione" max="180" min="1" step="1" value="<?php echo $row_RS_dettaglio['tempoPreparazione'];?>" />
                            </div>
                            <div data-role="fieldcontain">
                                <label for="difficolta" class="select">Difficolt&agrave;:</label>
                                    <select name="difficolta" id="selectmenu2">
                                <option value="Facile" <?php if($row_RS_dettaglio['difficolta']=="Facile"){ echo "selected=\"selected\"";} ?>>Facile</option>
                                <option value="Media" <?php if($row_RS_dettaglio['difficolta']=="Media"){ echo "selected=\"selected\"";} ?>>Media</option>
                                <option value="Difficile" <?php if($row_RS_dettaglio['difficolta']=="Difficile"){ echo "selected=\"selected\"";} ?>>Difficile</option>
                                </select>
                            </div>
                            <input name="aggiungi" type="submit" value="MODIFICA RICETTA" data-icon="check" data-iconpos="right" />
                        </form>
                    </p>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
