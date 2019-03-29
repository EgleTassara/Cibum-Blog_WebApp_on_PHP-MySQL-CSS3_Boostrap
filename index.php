<?php include ("Connections/connect.php");?>

<?php
session_start();
if(isset($_POST['login'])){
	$email=$_POST['email'];
	$password=$_POST['password'];
	
$selezionaUtente=mysqli_query($connessione,"SELECT * FROM utenti WHERE email='$email' AND password='$password' AND keycontrol=0");
$totalRows=mysqli_num_rows($selezionaUtente);
if($totalRows>0){
	$_SESSION['username']=$email;
}else{
	$errore="username o password errati.";
}
}

if($_SESSION['username']){
	$query_RS_utente="SELECT * FROM utenti WHERE email='".$_SESSION['username']."'";
	$RS_utente=mysqli_query($connessione,$query_RS_utente);
	$utente=mysqli_fetch_assoc($RS_utente);
}

if($utente['sesso']=="m"){
	$lettera_sesso="o";
}else{
	$lettera_sesso="a";
}

$query_RS_ricette="SELECT * FROM ricette WHERE id = 16";
$RS_ricette=mysqli_query($connessione, $query_RS_ricette);
$row_RS_ricette=mysqli_fetch_assoc($RS_ricette);
$totalRowsRicette=mysqli_num_rows($RS_ricette);


?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Chef Mario Presenta!</title>
<link rel="stylesheet" type="text/css" href="//cdnjs.cloudflare.com/ajax/libs/cookieconsent2/3.0.3/cookieconsent.min.css" />
<script src="//cdnjs.cloudflare.com/ajax/libs/cookieconsent2/3.0.3/cookieconsent.min.js"></script>
<script>
window.addEventListener("load", function(){
window.cookieconsent.initialise({
  "palette": {
    "popup": {
      "background": "#752500"
    },
    "button": {
      "background": "#cea35e"
    }
  },
  "showLink": false,
  "position": "bottom-right",
  "content": {
    "message": "Questo sito usa cookie di terze parti, proseguendo nella navigazione accetterete alla registrazione e all'utilizzo degli stessi",
    "dismiss": "ACCETTA!"
  }
})});
</script>

<link href="css/bootstrap.css" rel="stylesheet" type="text/css">
<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<script src="../js/modernizr-custom.js"></script>
<![endif]-->
<link href="https://fonts.googleapis.com/css?family=Marvel|Pacifico" rel="stylesheet">
<!--The following script tag downloads a font from the Adobe Edge Web Fonts server for use within the web page. We recommend that you do not modify it.-->
</head>

<body>

<!-- Load font awesome icons -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<!-- The social media icon bar -->
<div class="icon-bar">
  <a href="https://www.facebook.com/?stype=lo&jlou=Afc4T01-ubj_rojfjBX6BzSlNHoePw7TQ6jYK0HLKTfHnmWI6VX_XNIQkju6t0Oj90YoUib5t_qA119P3Ye5M6TD&smuh=12536&lh=Ac8vrCWVao9k8UYN" class="facebook"><i class="fa fa-facebook"></i></a> 
  <a href="https://twitter.com/login?lang=it" class="twitter"><i class="fa fa-twitter"></i></a> 
  <a href="https://accounts.google.com/ServiceLogin/signinchooser?elo=1&flowName=GlifWebSignIn&flowEntry=ServiceLogin" class="google"><i class="fa fa-google"></i></a> 
  <a href="https://www.youtube.com" class="youtube"><i class="fa fa-youtube"></i></a> 
</div>

<header>

<nav class="navbar navbar-default">
<div class="container-fluid">
<!-- Brand and toggle get grouped for better mobile display -->
<div class="navbar-header">
<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#defaultNavbar1"><span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button>
<a class="navbar-brand" href="index.php">
<img src="img/logo-01.png" alt="Placeholder image" width="169" height="76" class="img-responsive"> </a></div>
<!-- Collect the nav links, forms, and other content for toggling -->
<div class="collapse navbar-collapse" id="defaultNavbar1">
      
<ul class="nav navbar-nav">

<li class="active">
<a href="index.php">HOME<span class="sr-only">(current)</span></a>
</li>
          
<li><a href="registrazione.php">REGISTRATI</a></li>
<li><a href="galleria-ricette.php">GALLERY</a></li>
<li><a href="chi-siamo.php">CHI SIAMO</a></li>
<li><a href="contatti.php">CONTATTI</a></li>


<li class="dropdown">
	<a href="ricette.php" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">RICETTE<span class="caret"></span></a>
<ul class="dropdown-menu" role="menu">
<li><a href="ricette.php">TUTTE LE RICETTE:</a></li>
<li class="divider"></li>	
	<li><ol><a href="categoria-carne.php">CARNE</a></ol></li>
<li class="divider"></li>
	<li><ol><a href="categoria-piattiunici.php">PIATTI UNICI</a></ol></li>
<li class="divider"></li>
	<li><ol><a href="categoria-dolci.php">DOLCI</a></ol></li>
</ul>
</li>

</ul>	        
<form class="navbar-form navbar-left" role="search">
<div class="form-group">
<input type="text" class="form-control" placeholder="Scrivi qui...">
</div>
<button type="submit" class="btn btn-default">CERCA</button>
</form>
        
<ul class="nav navbar-nav navbar-right">
<li class="dropdown">
<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">SOCIAL<span class="caret"></span></a>
<ul class="dropdown-menu" role="menu">
<li><a href="https://www.facebook.com/?stype=lo&jlou=Afc4T01-ubj_rojfjBX6BzSlNHoePw7TQ6jYK0HLKTfHnmWI6VX_XNIQkju6t0Oj90YoUib5t_qA119P3Ye5M6TD&smuh=12536&lh=Ac8vrCWVao9k8UYN">Facebook</a></li>
<li><a href="https://twitter.com/login?lang=it">Twitter</a></li>
<li><a href="https://www.instagram.com/accounts/login/?hl=it">Instagram</a></li>
<li><a href="https://it.pinterest.com/login/">Pinterest</a></li>
</ul>
</li>
</ul>

</div>
<!-- /.navbar-collapse -->
</div>
<!-- /.container-fluid -->
</nav>

</header>

<main>
<div class="container-fluid">
	
<div class="jumbotron">
<h1>Chef Mario presenta!</h1>
<p>Benvenuti sul blog di Chef Mario, dove potrete trovare, ricette, consigli, commenti, e tutto quello di cui avete bisogno per stupire i vostri ospiti con deliziosissime ricette!!! Tutte le ricette sono ideate e testate nelle nostre cucine, descritte in modo chiaro e completo, con foto passo passo e video di qualità. Con un click hai la certezza di trovare la ricetta che cercavi: la versione più autentica dei grandi classici regionali e dei piatti etnici e internazionali, le ultime tendenze della rete, gli abbinamenti più originali e gustosi.
</p>
<p><a class="pulsanti-form" href="../chi-siamo" role="button">LEGGI TUTTO</a></p>
</div>
	
<ol class="breadcrumb">
  <li class="active">Home</li>
</ol>
<div class="row">
  
  <div class="col-md-3">
<div class="list-group">
<a href="#" class="list-group-item">
<img src="img/chef.png" class="img-responsive center-block" alt="Placeholder image">
</a>
 
<?php if($_SESSION['username']){?>           
<a class="list-group-item active">
<h4 class="list-group-item-heading">Ciao <?php echo $utente['nome'];?>, bentornat<?php echo $lettera_sesso;?>!</h4>

<a href="#" class="list-group-item">
<button class="pulsanti-form center-block">VAI AL TUO PROFILO</button>
</a>

<a href="logout.php" class="list-group-item">
<button class="pulsanti-form center-block">LOGOUT</button>
</a>
</a>
<?php }else{ ?>
<a href="registrazione.php" class="list-group-item active">
<h4 class="list-group-item-heading">BENVENUTO VISITATORE!</h4>
<p class="list-group-item-text">Registrati e commenta le nostre ricette.</p>
</a>

<?php } ?>

<?php if(!$_SESSION['username']){?>         
<a class="list-group-item">
<h4 class="list-group-item-heading">Sei già registrato?</h4>
<p class="list-group-item-text">Effettua il login:</p>
</a>
            
<a class="list-group-item">           
<form method="post" action="">
                
<div>
<div class="input-group input-group-sm">
<span class="input-group-addon">@</span>
<input type="email" class="form-control" placeholder="Inserisci la tua email." name="email">
</div>
                    
<div class="input-group input-group-sm">
<span class="input-group-addon">***</span>
<input type="password" class="form-control" placeholder="Inserisci la tua password." name="password">
</div>                   
<p class="text-danger"><?php echo $errore;?></p>
</div>
                  
<input type="submit" class="pulsanti-form center-block" name="login">
                  
</form>
</a>

<a href="recupero-password-step1.php" class="list-group-item">
<h4 class="list-group-item-heading">HAI DIMENTICATO LA PASSWORD?</h4>
<p class="list-group-item-text">Recupera la password.</p>
</a>
<?php } ?>  
                   
</div>
</div>
<div class="col-md-9">
  <div class="row">
  <div class="col-md-4">
  <div class="thumbnail"><img src="img/box-01.png" alt="carne">
  <div class="caption">
  <h3>CARNE:</h3>
  <h4>Le ricette per chi ama incondizionatamente le proteine.</h4>
  <p>In questa sezione potrete trovare spunti, consigli e indicazioni per creare appetitose ricette secondi con carne.
    Scoprite subito come realizzare ricette secondi con carne gustose e sane, perfette per le vostre cene in compagnia o i vostri pranzi in ufficio, che siano ricette dietetiche o gustuse. Il blog di Chef Mario vi offre tante idee originali, facili e veloci da realizzare con i vostri ingredienti preferiti, ovunque voi siate.
    Con le semplici proposte di Chef Mario potrete creare ottimi piatti di gran successo.
  </p>
  <br>	
  <p><a href="../categoria-carne.php" class="pulsanti-form" role="button">Leggi tutto</a></p>
  </div>
  </div>
  </div>
    
  <div class="col-md-4">
  <div class="thumbnail"><img src="img/box-03.png" alt="piatti unici">
  <div class="caption">
  <h3>PIATTI UNICI:</h3>
    <h4>Tutto il gusto racchiuso il un singolo meraviglioso piatto.</h4>
  <p>In questa sezione potrete trovare spunti, consigli e indicazioni per creare appetitose ricette piatti unici con Cereali e Farine, Pasta, Carne.
    Scoprite subito come realizzare ricette piatti unici gustose e sane, perfette per le vostre cene in compagnia o i vostri pranzi in ufficio. Il blog di Chef Mario vi offre tante idee originali, facili e veloci da realizzare con i vostri ingredienti preferiti, ovunque voi siate.
    Con le semplici proposte di Chef Mario potrete creare ottimi piatti di gran successo.</p>
  <br>
  <p><a href="../categoria-piattiunici.php" class="pulsanti-form" role="button">Leggi tutto</a></p>
  </div>
  </div>
  </div>
    
  <div class="col-md-4">
  <div class="thumbnail"><img src="img/box-02.png" alt="dolci">
  <div class="caption">
  <h3>DOLCI:</h3>
  <h4>Per chi non può mai fare a meno della dolcezza.</h4>
  <p>In questa sezione potrete trovare spunti, consigli e indicazioni per creare appetitose ricette dolci con Cereali e Farine, Pasta, Formaggi e Latticini, Verdure.
    Scoprite subito come realizzare ricette dolci gustose e sane, perfette per le vostre cene in compagnia o i vostri pranzi in ufficio. Il blog di Chef Mario vi offre tante idee originali, facili e veloci da realizzare con i vostri ingredienti preferiti, ovunque voi siate.
    Con le semplici proposte di Chef Mario potrete creare ottimi piatti di gran successo.
  </p>
  <br>	
  <p><a href="../categoria-dolci" class="pulsanti-form" role="button">Leggi tutto</a></p>
  </div>
  </div>
  </div>
  </div>
  
  <div class="row">
  <div class="col-md-12">
  <div class="well">
  <h1 class="text-center center-block pacifico"><?php echo $row_RS_ricette['nome'];?>
    <span class="center-block marvel">Gli ingredienti del miglior panino che la rete abbia mai visto.</span></h1>
    
  <div class="row">
  <div class="col-md-5">
    
  <div class="media-object-default">
    
  <div class="media">
    
  <div class="media-left">
  <a href="#"><img src="img/ingrediente-01.png" alt="placeholder image" width="100" class="media-object"></a>
  </div>
    
  <div class="media-body">
  <h4 class="media-heading">Petto di pollo Bio</h4>
    Dalla straordinaria tradizione gastronomica italiana nasce un mondo di prodotti buoni e semplici, realizzati all’insegna del buon senso, della consapevolezza e di scelte naturali e sane.
  </div>
    
  </div>
    
  <div class="media">
    
  <div class="media-left">
  <a href="#"><img src="img/ingrediente-02.png" alt="placeholder image" width="100" class="media-object"></a>
  </div>
    
  <div class="media-body">
  <h4 class="media-heading">Uova freschissime</h4>
    La freschezza delle uova è sicuramente un fattore importante sia dal punto di vista del potere nutritivo che da quello organolettico.
  </div>
    
  </div>
    
  <div class="media">
    
  <div class="media-left">
  <a href="#"><img src="img/ingrediente-03.png" alt="placeholder image" width="100" class="media-object"></a>
  </div>
    
  <div class="media-body">
  <h4 class="media-heading">Pancetta distesa</h4>
    La pancetta tesa è una varietà di pancetta che prende il nome dal fatto che il pezzo di carne da cui viene ricavata, cioè la parte magra del ventre del maiale. 
  </div>
  </div>
    
  </div>
    
  <br>	
    
  <a href="dettaglio-ricetta.php?codice=<?php echo $row_RS_ricette['id'];?>" class="pulsanti-form">LEGGI TUTTO</a>
  </div>
    
  <div class="col-md-4">
  <img src="img/benedict.png" class="img-responsive center-block" alt="Placeholder image">
  </div>
    
  <div class="col-md-3">
  <div class="panel panel-default text-center center-block">
  <div class="panel-heading">
  <h3 class="panel-title">PREPARAZIONE:</h3><?php echo $row_RS_ricette['tempoPreparazione'];?> minuti
  </div>
  <div class="panel-body"> 
  <h3 class="panel-title">COTTURA:</h3><?php echo $row_RS_ricette['cottura'];?> minuti
  </div>
  <div class="panel-heading">
  <h3 class="panel-title">PRONTO IN:</h3><?php echo $row_RS_ricette['tempoPreparazione']+ $row_RS_ricette['cottura'];?> minuti
  </div>
  <div class="panel-body"> 
  <h3 class="panel-title">DIFFICOLT&Agrave;:</h3><?php echo $row_RS_ricette['difficolta'];?> 
  </div>
  <div class="panel-heading">
  <h3 class="panel-title">COSTO:</h3><?php echo $row_RS_ricette['costo'];?> 
  </div>
  <div class="panel-body"> 
  <h3 class="panel-title">DOSI:</h3><?php echo $row_RS_ricette['dosi'];?> person<?php if($row_RS_ricette['dosi']==1){echo "a";}else{echo "e";}?>
  </div>
  </div>
  </div>
    
  </div>
  </div>
  </div>
  </div>
</div>
</div>
    
</div>
<div id="carousel1" class="carousel slide" data-ride="carousel">
  
  <ol class="carousel-indicators">
  <li data-target="#carousel1" data-slide-to="0" class="active"></li>
  <li data-target="#carousel1" data-slide-to="1"></li>
  <li data-target="#carousel1" data-slide-to="2"></li>
  <li data-target="#carousel1" data-slide-to="3"></li>
  <li data-target="#carousel1" data-slide-to="4"></li>
  <li data-target="#carousel1" data-slide-to="5"></li>
  <li data-target="#carousel1" data-slide-to="6"></li>
  </ol>
  
  <div class="carousel-inner" role="listbox">
    
  <div class="item active">
  <img src="img/img-carosello/01.jpg" alt="First slide image" class="center-block">
  <div class="carousel-caption">
  <h3>First slide Heading</h3>
  <p>First slide Caption</p>
  </div>
  </div>
    
  <div class="item">
  <img src="img/img-carosello/02.jpg" alt="Second slide image" class="center-block">
  <div class="carousel-caption">
  <h3>Second slide Heading</h3>
  <p>Second slide Caption</p>
  </div>
  </div>
    
  <div class="item">
  <img src="img/img-carosello/03.jpg" alt="Third slide image" class="center-block">
  <div class="carousel-caption">
  <h3>Third slide Heading</h3>
  <p>Third slide Caption</p>
  </div>
  </div>
    
  <div class="item">
  <img src="img/img-carosello/04.jpg" alt="Third slide image" class="center-block">
  <div class="carousel-caption">
  <h3>Third slide Heading</h3>
  <p>Third slide Caption</p>
  </div>
  </div>
    
  <div class="item">
  <img src="img/img-carosello/05.jpg" alt="Third slide image" class="center-block">
  <div class="carousel-caption">
  <h3>Third slide Heading</h3>
  <p>Third slide Caption</p>
  </div>
  </div>
    
  <div class="item">
  <img src="img/img-carosello/06.jpg" alt="Third slide image" class="center-block">
  <div class="carousel-caption">
  <h3>Third slide Heading</h3>
  <p>Third slide Caption</p>
  </div>
  </div>
    
  <div class="item">
  <img src="img/img-carosello/07.jpg" alt="Third slide image" class="center-block">
  <div class="carousel-caption">
  <h3>Third slide Heading</h3>
  <p>Third slide Caption</p>
  </div>
  </div>
    
  </div>
  
  <a class="left carousel-control" href="#carousel1" role="button" data-slide="prev">
  <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
  <span class="sr-only">Previous</span>
  </a>
  
  <a class="right carousel-control" href="#carousel1" role="button" data-slide="next">
  <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
  <span class="sr-only">Next</span>
  </a>
  
</div>

</main>

<footer>

<div class="container-fluid">
<div class="row">
<div class="col-md-6">
<img src="img/sponseasy.png" width="219" height="27" alt=""/><br>
Vuoi essere tra i nostri sponsor?<br>
Copyright 2016-18 &copy; Tutti i diritti riservati.<br>
P.IVA 5416547634344
</div>
      
<div class="col-md-3">
<a href="index.php">HOME</a><br>
<a href="chi-siamo.php">CHI SIAMO</a><br>
<a href="contatti.php">CONTATTI</a><br>
<a href="registrazione.php">REGISTRAZIONE</a><br>
<a href="ricette.php">RICETTE</a><br>
<a href="galleria-ricette.php">GALLERIA</a><br>
<a href="Admin/index.php">ADMIN</a>
</div>
      
<div class="col-md-3">
</div>

</div>
</div>
  
</footer>
<script src="js/jquery-1.11.2.min.js" type="text/javascript"></script>
<script src="js/bootstrap.js" type="text/javascript"></script>
</body>
</html>
