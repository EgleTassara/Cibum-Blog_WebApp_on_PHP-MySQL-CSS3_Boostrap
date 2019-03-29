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
?>

<!doctype html>
<html><!-- InstanceBegin template="/Templates/modello.dwt.php" codeOutsideHTMLIsLocked="false" -->
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<!-- InstanceBeginEditable name="doctitle" -->
<title>Chi Siamo</title>
<!-- InstanceEndEditable -->
<link href="css/bootstrap.css" rel="stylesheet" type="text/css">
<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<script src="../js/modernizr-custom.js"></script>
<![endif]-->
<link href="https://fonts.googleapis.com/css?family=Marvel|Pacifico" rel="stylesheet">
<!-- InstanceBeginEditable name="head" -->
<!-- InstanceEndEditable -->
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

<li>
<a href="index.php">HOME</a>
</li>
          
<li><a href="registrazione.php">REGISTRATI</a></li>
<li><a href="galleria-ricette.php">GALLERY</a></li>
<li class="active"><a href="chi-siamo.php">CHI SIAMO<span class="sr-only">(current)</span></a></li>
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
<input type="text" class="form-control" style="border-color: #ab301f; background-color: #F1F1F1; " placeholder="Scrivi qui...">
    </div>
    <button type="submit" class="btn btn-default" style="background-color: #AB301F; color: #FFFFFF">CERCA</button>
</form>
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

<!-- InstanceBeginEditable name="tag-line" -->
<div class="jumbotron">
<h1>Da oltre nove mesi, il blog del gusto di Chef Mario!</h1>
<p>Progetto puramente scolastico supervisionato dall'accademia Anja di Roma, il progetto mira a far creare ai propri studenti un sito completo in tutte le sue parti di HTML5 - CSS3 - Php - MySQL e Javascript....</p>
</div>
<!-- InstanceEndEditable -->
    
<!-- InstanceBeginEditable name="briciole" -->
<ol class="breadcrumb">
<li><a href="#">Home</a></li>
<li class="active">Chi siamo!</li>
</ol>
<!-- InstanceEndEditable -->
    
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
      
<!-- InstanceBeginEditable name="contenuti" -->
<div class="col-md-9">
	<div class="well">
		<h1><span class="pacifico">Chi siamo!</span></h1>
	<div class="row margine-alto center-block">
<div class="col-md-6 border-destro">
<p class="text-justify">Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. Aenean ultricies mi vitae est. Mauris placerat eleifend leo. Quisque sit amet est et sapien ullamcorper pharetra. Vestibulum erat wisi, condimentum sed, commodo vitae, ornare sit amet, wisi. Aenean fermentum, elit eget tincidunt condimentum, eros ipsum rutrum orci, sagittis tempus lacus enim ac dui. Donec non enim in turpis pulvinar facilisis. Ut felis. Praesent dapibus, neque id cursus faucibus, tortor neque egestas augue, eu vulputate magna eros eu erat. Aliquam erat volutpat. Nam dui mi, tincidunt quis, accumsan porttitor, facilisis luctus, metus. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. Aenean ultricies mi vitae est. Mauris placerat eleifend leo. Quisque sit amet est et sapien ullamcorper pharetra. Vestibulum erat wisi, condimentum sed, commodo vitae, ornare sit amet, wisi. Aenean fermentum, elit eget tincidunt condimentum, eros ipsum rutrum orci, sagittis tempus lacus enim ac dui. Donec non enim in turpis pulvinar facilisis. Ut felis. Praesent dapibus, neque id cursus faucibus, tortor neque egestas augue, eu vulputate magna eros eu erat. Aliquam erat volutpat. Nam dui mi, tincidunt quis, accumsan porttitor, facilisis luctus, metus.</p>
</div>
<div class="col-md-6">
<p class="text-justify">Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. Aenean ultricies mi vitae est. Mauris placerat eleifend leo. Quisque sit amet est et sapien ullamcorper pharetra. Vestibulum erat wisi, condimentum sed, commodo vitae, ornare sit amet, wisi. Aenean fermentum, elit eget tincidunt condimentum, eros ipsum rutrum orci, sagittis tempus lacus enim ac dui. Donec non enim in turpis pulvinar facilisis. Ut felis. Praesent dapibus, neque id cursus faucibus, tortor neque egestas augue, eu vulputate magna eros eu erat. Aliquam erat volutpat. Nam dui mi, tincidunt quis, accumsan porttitor, facilisis luctus, metus. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. Aenean ultricies mi vitae est. Mauris placerat eleifend leo. Quisque sit amet est et sapien ullamcorper pharetra. Vestibulum erat wisi, condimentum sed, commodo vitae, ornare sit amet, wisi. Aenean fermentum, elit eget tincidunt condimentum, eros ipsum rutrum orci, sagittis tempus lacus enim ac dui. Donec non enim in turpis pulvinar facilisis. Ut felis. Praesent dapibus, neque id cursus faucibus, tortor neque egestas augue, eu vulputate magna eros eu erat. Aliquam erat volutpat. Nam dui mi, tincidunt quis, accumsan porttitor, facilisis luctus, metus.</p>
</div>
<img src="img/cifre.png" class="img-responsive center-block margine-alto" alt="Placeholder image">
<img src="img/chi-siamo.png" class="img-responsive center-block" alt="Placeholder image">
<div class="row center-block margine-alto">
<div class="col-md-4 border-destro">
<p class="text-justify">Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. Aenean ultricies mi vitae est. Mauris placerat eleifend leo. Quisque sit amet est et sapien ullamcorper pharetra. Vestibulum erat wisi, condimentum sed, commodo vitae, ornare sit amet, wisi. Aenean fermentum, elit eget tincidunt condimentum, eros ipsum rutrum orci, sagittis tempus lacus enim ac dui. Donec non enim in turpis pulvinar facilisis. Ut felis. Praesent dapibus, neque id cursus faucibus, tortor neque egestas augue, eu vulputate magna eros eu erat. Aliquam erat volutpat. Nam dui mi, tincidunt quis, accumsan porttitor, facilisis luctus, metus</p>
</div>
<div class="col-md-4 border-destro">
<p class="text-justify">Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. Aenean ultricies mi vitae est. Mauris placerat eleifend leo. Quisque sit amet est et sapien ullamcorper pharetra. Vestibulum erat wisi, condimentum sed, commodo vitae, ornare sit amet, wisi. Aenean fermentum, elit eget tincidunt condimentum, eros ipsum rutrum orci, sagittis tempus lacus enim ac dui. Donec non enim in turpis pulvinar facilisis. Ut felis. Praesent dapibus, neque id cursus faucibus, tortor neque egestas augue, eu vulputate magna eros eu erat. Aliquam erat volutpat. Nam dui mi, tincidunt quis, accumsan porttitor, facilisis luctus, metus</p>
</div>
<div class="col-md-4">
<p class="text-justify">Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. Aenean ultricies mi vitae est. Mauris placerat eleifend leo. Quisque sit amet est et sapien ullamcorper pharetra. Vestibulum erat wisi, condimentum sed, commodo vitae, ornare sit amet, wisi. Aenean fermentum, elit eget tincidunt condimentum, eros ipsum rutrum orci, sagittis tempus lacus enim ac dui. Donec non enim in turpis pulvinar facilisis. Ut felis. Praesent dapibus, neque id cursus faucibus, tortor neque egestas augue, eu vulputate magna eros eu erat. Aliquam erat volutpat. Nam dui mi, tincidunt quis, accumsan porttitor, facilisis luctus, metus</p>
</div>
</div>
<img src="img/cifre.png" class="img-responsive center-block margine-alto" alt="Placeholder image">
</div>
</div>
</div>
<!-- InstanceEndEditable -->
      

<!-- InstanceBeginEditable name="carosello" -->


<!-- InstanceEndEditable -->


<!-- InstanceEndEditable -->
      
</div>
    
</div>
<!-- InstanceBeginEditable name="carosello" -->


<!-- InstanceEndEditable -->

</main>

<footer>

<div class="container-fluid">
<div class="row">
<div class="col-md-3">
<img src="../img/sponseasy.png" width="219" height="27" alt=""/><br>
Vuoi essere tra i nostri sponsor?<br>
Copyright 2016-18 &copy; Tutti i diritti riservati.<br>
P.IVA 5416547634344
<br><a href="../index.php">
<img src="../img/logo-01.png"  style="padding-top: 5px; width: 50%; height: 50px; margin-left: auto; margin-right: auto;"> </a>	
</div>
      
<div class="col-md-3" style="border-left-color: #AB301F; border-left-style: solid;">
	<a href="../index.php">HOME</a><br>
<a href="../chi-siamo.php">CHI SIAMO</a><br>
<a href="../contatti.php">CONTATTI</a><br>
<a href="../registrazione.php">REGISTRAZIONE</a><br>
<a href="../ricette.php">RICETTE</a><br>
<a href="../galleria-ricette.php">GALLERIA</a><br>
<a href="../Admin/index.php">ADMIN</a>
</div>

	<div class="col-md-3">
  <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d7034.3272357840115!2d12.501648227566763!3d41.90247882071467!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x132f61a155278919%3A0xcff7cfeedef9410c!2sMcDonald&#39;s+Termini!5e0!3m2!1sit!2sit!4v1531236202091" width="100%" height="176px" frameborder="0" style="border:0" allowfullscreen></iframe>
</div>
	
<div class="col-md-3" style="border-left-color: #AB301F; border-left-style: solid;">
	<h3 style="font: pacifico;">Contattaci:</h3>
	<p> Tel. 340 - 7921785<br>
		Tel. 352 - 9962439<br>
		email: info-cibum@gmail.com<br>
		<img src="../img/cifre.png" style="width: 60px; height: 60px; padding-top: 5px;">
	</p>
</div>	
	
</div>
</div>
  
</footer>

<script src="js/jquery-1.11.2.min.js" type="text/javascript"></script>
<script src="js/bootstrap.js" type="text/javascript"></script>
<!-- InstanceBeginEditable name="script-opzionali" -->

<!-- InstanceEndEditable --> 
</body>
<!-- InstanceEnd --></html>
