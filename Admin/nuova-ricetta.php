<?php include ("../controlloErrori.php");?>
<?php include ("../Connections/connect.php");?>
<?php
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
        
        $inserisci="INSERT INTO ricette (foto,categoria,procedimento,nome,ingredienti,cottura,costo,dosi,tempoPreparazione,difficolta) VALUES('$foto','$categoria','$procedimento','$nome','$ingredienti','$cottura','$costo','$dosi','$tempoPreparazione','$difficolta')";
        $res=mysqli_query($connessione,$inserisci) or die (mysqli_error($connessione));
        if($res){
            header("Location:ricetta-inserita.php");
        }else{echo "errore";}
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
            <div data-role="collapsible-set">
                <div data-role="collapsible" data-collapsed="false">
                    <h3>STEP 1 - INSERISCI IMMAGINE</h3>
                    <p>
                        <form action="../upload.php" method="post" enctype="multipart/form-data" name="upload_foto" target="_top">
                            <input type="file" id="foto[]" name="foto[]">
                            <input type="submit" value="CARICA IMMAGINE" data-icon="camera" data-iconpos="right" />
                        </form>
                        <?php if($_GET['foto']<>NULL){ ?>
                        <div class="center-block text-center">
                            <img src="../images/<?php echo $_GET['foto'];?>" width="80" height="80" alt="">
                            <span class="center-block text-center">Foto inserita correttamente.<br>Questa è l'immagine che hai selezionato.</span>
                        </div>
                    </p>
                </div>
                <div data-role="collapsible" data-collapsed="false">
                    <h3>STEP 2 - INSERISCI DESCRIZIONE</h3>
                    <p>
                        <form action="" method="post" name="inserisci_ricetta" target="_top">
                            <div data-role="fieldcontain">
                            <label for="nome">Titolo Ricetta:</label>
                            <input type="text" name="nome" id="nome" value="" />
                            </div>
                            <div data-role="fieldcontain">
                                <label for="selectmenu" class="select">Scegli la Categoria:</label>
                                    <select name="selectmenu" id="selectmenu">
                                    <option value="CARNE">CARNE</option>
                                    <option value="PIATTI UNICI">PIATTI UNICI</option>
                                    <option value="DOLCI">DOLCI</option>
                                </select>
                            </div>
                            <div data-role="fieldcontain">
                                <label for="textarea">Elenco ingredienti:</label>
                                    <textarea cols="40" rows="8" name="ingredienti" id="ingredienti">
                                    </textarea>
                                <script>CKEDITOR.replace('ingredienti');</script>
                            </div>
                            <div data-role="fieldcontain">
                                <label for="textarea">Procedimento:</label>
                                    <textarea cols="40" rows="8" name="procedimento" id="procedimento">
                                    </textarea>
                                <script>CKEDITOR.replace('procedimento');</script>
                            </div>
                            <div data-role="fieldcontain">
                                <fieldset data-role="controlgroup">
                                    <legend style="color: #fff;">Costo</legend>
                                    <input type="radio" name="costo" id="costo_0" value="Molto basso" />
                                    <label for="costo_0">Molto basso</label>
                                    <input type="radio" name="costo" id="costo_1" value="Basso" />
                                    <label for="costo_1">Basso</label>
                                    <input type="radio" name="costo" id="costo_2" value="Medio" />
                                    <label for="costo_2">Medio</label>
                                    <input type="radio" name="costo" id="costo_3" value="Alto" />
                                    <label for="costo_3">Alto</label>
                                    <input type="radio" name="costo" id="costo_4" value="Molto alto" />
                                    <label for="costo_4">Molto alto</label>
                            </fieldset>
                        </div>
                        <div data-role="fieldcontain">
                            <label for="cottura">Dosi per persona:</label>
                                <input name="dosi" type="range" id="dosi" max="12" min="2" step="2" value="2" />
                        </div>
                        <div data-role="fieldcontain">
                            <label for="cottura">Minuti di cottura:</label>
                                <input name="cottura" type="range" id="cottura" max="120" min="1" step="1" value="1" />
                        </div>
                        <div data-role="fieldcontain">
                            <label for="cottura">Minuti di preparazione:</label>
                            <input name="tempoPreparazione" type="range" id="tempoPreparazione" max="180" min="1" step="1" value="1" />
                        </div>
                        <div data-role="fieldcontain">
                            <label for="difficolta" class="select">Difficolt&agrave;:</label>
                                <select name="difficolta" id="selectmenu2">
                                <option value="Facile">Facile</option>
                                <option value="Media">Media</option>
                                <option value="Difficile">Difficile</option>
                            </select>
                        </div>
                        <input type="submit" value="INVIA RICETTA" data-icon="check" data-iconpos="right" name="aggiungi" />
                    </form>
                </p>
            </div>
                <?php } ?>
            </div>
        </div>
    </div>
</body>
</html>
