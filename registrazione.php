<?php require_once('Connections/connect.php')?>

<?php
if(isset($_POST['invia'])){
	$nome=$_POST['nome'];
	$cognome=$_POST['cognome'];
	$bday=$_POST['bday'];
	$cf=$_POST['cf'];
	$email=$_POST['email'];
	$password=$_POST['password'];
	$sesso=$_POST['sesso'];
	$keycontrol=$_POST['keycontrol'];
	$autorizzo=$_POST['autorizzo'];
	$erroreUser=NULL;
	
	//Controllo username esistente
	$controlloUtente=mysqli_query($connessione, "SELECT * FROM utenti WHERE email='$email'");
	if(mysqli_num_rows($controlloUtente)>0){
		$erroreUser="email già esistente";
	}else{
		//Azione da compiere se l'utente non esiste
		$inserisci="INSERT INTO utenti(nome, cognome, bday, cf, email, password, sesso, keycontrol, autorizzo)VALUES('$nome','$cognome','$bday','$cf','$email','$password','$sesso','$keycontrol','$autorizzo')";
		$res=mysqli_query($connessione, $inserisci);
		if($res){
			$mail_to="$email";
			$mail_from="tassarae@gmail.com";
			$mail_subject="Grazie $nome, per esserti iscritto al nostro sito";
			$mail_body="Grazie $nome, per esserti iscritto al nostro sito<br>
			ecco i tuoi dati:<br>
			password: $password<br>
			username: $email
			<br><br><br>
			per confermare la procedura di registrazione, cliccare sul link di conferma:
			<br><a 'href=http://otakusisland.altervista.org/cibum/attivazione_utente.php?keycontrol=$keycontrol'>CONFERMA</a>
			<br>
			se non funziona, copiare su un browser a vostra scelta il seguente link:<br><br>
			href=http://otakusisland.altervista.org/cibum/attivazione_utente.php?keycontrol=$keycontrol";
			
			//Intestazione e codifica della mail in HTML (sempre uguale)
			$mail_in_html="MIME-Version: 1.0\r\n";
			$mail_in_html.="Content-type: text/html; charset=iso-8859-1\r\n";
			$mail_in_html.="From: <$mail_from>";
			
			//Processo di invio della mail
			mail($mail_to, $mail_subject, $mail_body, $mail_in_html);
			//Per far ricevere la mail all'amministratore del sito
			mail("tassarae@gmail.com","Contraluzioni hai un nuovo utente!","Flavia oggi si è iscritto un utente: $nome $cognome","tassarae@gmail.com");
			
			header("Location:registrazione-avvenuta.php");
		}
	
	}

}

function GetKey()

{
$car = "aAbBcCdDeEfFgGhHiIlLjJkKmMnNoOpPqQrRsStTuUvVwWxXyYzZ0123456789";

$dim = 40;

srand((double)microtime()*1000000);

$string = '' ;

for($inc=0; $inc<$dim; $inc++)

{

$rand = rand(0, strlen($car)-1);
$scar = substr($car, $rand, 1);
$string = $string . $scar;
}

return $string;

}

?>

<!doctype html>
<html><!-- InstanceBegin template="/Templates/modello.dwt.php" codeOutsideHTMLIsLocked="false" -->
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<!-- InstanceBeginEditable name="doctitle" -->
<title>Registrati</title>
<!-- InstanceEndEditable -->
<link href="css/bootstrap.css" rel="stylesheet" type="text/css">
<link href="css/prova.css" rel="stylesheet" type="text/css">
<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<script src="../js/modernizr-custom.js"></script>
<![endif]-->
<link href="https://fonts.googleapis.com/css?family=Marvel|Pacifico" rel="stylesheet">
<!-- InstanceBeginEditable name="head" -->

<script language="Javascript" type="text/javascript">

function controllapassword(registrazione) {

if (registrazione.nome.value == "") {
alert("Errore: inserire un nome!");
registrazione.nome.focus();
return false;
}

if (registrazione.cognome.value == "") {
alert("Errore: inserire il cognome!");
registrazione.cognome.focus();
return false;
}

if (registrazione.email.value == "") {

alert("Errore: inserire la mail!");

registrazione.email.focus();

return false;

}

if (registrazione.password.value == "") {

alert("Errore: inserire una password!");

registrazione.password.focus();

return false;

}

if (registrazione.password.value != registrazione.password_convalida.value) {
alert("La password inserita non coincide con la prima!")
registrazione.password.focus();
registrazione.password.select();
return false

}

if (registrazione.bday.value == "") {

alert("Errore: inserire la data di nascita!");

registrazione.bday.focus();

return false;

}

if (registrazione.sesso[0].checked == false && registrazione.sesso[1].checked == false)

{

alert("scegliere il sesso");

return false;

}

var cap = document.registrazione.cap.value;

var codice_avviamento = /^[0-9]{5,5}$/;

if (!codice_avviamento.test(cap) || (cap == "")){

alert("Errore: inserire il cap!");

document.registrazione.cap.select();

return false;

}

if (registrazione.autorizzo.checked == false)

{

alert ('Per proseguire occorre accettare le clausole');

return false;

}

return true

}

function ControllaCF(cf) {

var validi, i, s, set1, set2, setpari, setdisp;

if( cf == '' ) return '';

cf = cf.toUpperCase();

if( cf.length != 16 ) return "La lunghezza del codice fiscale non è\n" +"corretta: il codice fiscale dovrebbe essere lungo\n" +"esattamente 16 caratteri.\n";

validi = "ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";

for( i = 0; i < 16; i++ ){ if( validi.indexOf( cf.charAt(i) ) == -1 ) return "Il codice fiscale contiene un carattere non valido `" + cf.charAt(i) + "'.\nI caratteri validi sono le lettere e le cifre.\n";

}

set1 = "0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ";

set2 = "ABCDEFGHIJABCDEFGHIJKLMNOPQRSTUVWXYZ";

setpari = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";

setdisp = "BAKPLCQDREVOSFTGUHMINJWZYX";

s = 0;

for( i = 1;

i <= 13; i += 2 ) s += setpari.indexOf( set2.charAt( set1.indexOf( cf.charAt(i) )));

for( i = 0;

i <= 14;

i += 2 ) s += setdisp.indexOf( set2.charAt( set1.indexOf( cf.charAt(i) )));

if( s%26 != cf.charCodeAt(15)-'A'.charCodeAt(0) ) return "Il codice fiscale non è corretto:\n"+ "il codice di controllo non corrisponde.\n";

return "";

}

function ControllaPIVA(pi) {

if( pi == '' ) return '';

if( pi.length != 11 ) return "La lunghezza della partita IVA non è\n" + "corretta: la partita IVA dovrebbe essere lunga\n" + "esattamente 11 caratteri.\n";

validi = "0123456789";

for( i = 0; i < 11; i++ ){

if( validi.indexOf( pi.charAt(i) ) == -1 ) return "La partita IVA contiene un carattere non valido `" + pi.charAt(i) + "'.\nI caratteri validi sono le cifre.\n";

}

s = 0; for( i = 0; i <= 9; i += 2 ) s += pi.charCodeAt(i) - '0'.charCodeAt(0);

for( i = 1; i <= 9; i += 2 ){ c = 2*( pi.charCodeAt(i) - '0'.charCodeAt(0) );

if( c > 9 ) c = c - 9; s += c;

}

if( ( 10 - s%10 )%10 != pi.charCodeAt(10) - '0'.charCodeAt(0) ) return "La partita IVA non è valida:\n" + "il codice di controllo non corrisponde.\n"; return '';

}

function verifica() {

cod = document.registrazione.cf.value;

if( cod == '' ) err = "hai lasciato in bianco il campo!\n";

else if( cod.length == 16 ) err = ControllaCF(cod);

else if( cod.length == 11 ) err = ControllaPIVA(cod);

else err = "Il codice introdotto non è valido:\n\n" + " - un codice fiscale deve essere lungo 16 caratteri;\n\n" + " - una partita IVA deve essere lunga 11 caratteri.\n";

if( err > '' ) alert("VALORE ERRATO\n\n" + err + "\nCorreggi e riprova!");

}

</script>

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
<!-- Collect the nav links, forms, and other content for toggling --><!-- InstanceBeginEditable name="nav-bar" -->
<div class="collapse navbar-collapse" id="defaultNavbar1">
  <ul class="nav navbar-nav">
    <li> <a href="index.php">HOME</a> </li>
    <li class="active"><a href="registrazione.php">REGISTRATI<span class="sr-only">(current)</span></a></li>
    <li><a href="galleria-ricette.php">GALLERY</a></li>
    <li><a href="chi-siamo.php">CHI SIAMO</a></li>
    <li><a href="contatti.php">CONTATTI</a></li>
    <li class="dropdown"> <a href="ricette.php" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">RICETTE<span class="caret"></span></a>
      <ul class="dropdown-menu" role="menu">
        <li><a href="ricette.php">TUTTE LE RICETTE:</a></li>
        <li class="divider"></li>
        <li>
          <ol>
            <a href="categoria-carne.php">CARNE</a>
          </ol>
        </li>
        <li class="divider"></li>
        <li>
          <ol>
            <a href="categoria-piattiunici.php">PIATTI UNICI</a>
          </ol>
        </li>
        <li class="divider"></li>
        <li>
          <ol>
            <a href="categoria-dolci.php">DOLCI</a>
          </ol>
        </li>
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
    <li class="dropdown"> <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">SOCIAL<span class="caret"></span></a>
      <ul class="dropdown-menu" role="menu">
        <li><a href="https://www.facebook.com/?stype=lo&jlou=Afc4T01-ubj_rojfjBX6BzSlNHoePw7TQ6jYK0HLKTfHnmWI6VX_XNIQkju6t0Oj90YoUib5t_qA119P3Ye5M6TD&smuh=12536&lh=Ac8vrCWVao9k8UYN">Facebook</a></li>
        <li><a href="https://twitter.com/login?lang=it">Twitter</a></li>
        <li><a href="https://www.instagram.com/accounts/login/?hl=it">Instagram</a></li>
        <li><a href="https://it.pinterest.com/login/">Pinterest</a></li>
      </ul>
    </li>
  </ul>
</div>
<!-- InstanceEndEditable --><!-- /.navbar-collapse -->
</div>
<!-- /.container-fluid -->
</nav>

</header>

<main>
<div class="container-fluid">

<!-- InstanceBeginEditable name="tag-line" -->
<div class="jumbotron">
<h1>Registrati!</h1>
<p>Registrati per rimanere aggiornato sulle novità di Chef Mario e le sue gustosissime ricette, potrai commentare, interagire con Chef Mario, e contattare lo staff per ogni esigenza.</p>
<p><a class="pulsanti-form" href="contatti.php" role="button">Leggi Tutto</a></p>
</div>
<!-- InstanceEndEditable -->
    
<!-- InstanceBeginEditable name="briciole" -->
<ol class="breadcrumb">
<li><a href="index.php">Home</a></li>
<li class="active">Registrati</li>
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

<h2>Modulo di registrazione:</h2>
<form id="registrazione" name="registrazione" method="post" onSubmit="return controllapassword(this);">

<div>

<!--inizio input-->
<div class="input-group input-group-lg">
<input name="nome" type="text" required class="form-control" id="nome" placeholder="Nome" autocomplete="on">
</div>
<!--fine input-->

<!--inizio input-->
<div class="input-group input-group-lg">
<input name="cognome" type="text" required class="form-control" id="cognome" placeholder="Cognome" autocomplete="on">
</div>
<!--fine input-->

<!--inizio input-->
<div class="input-group input-group-lg">
<input name="email" type="email" required class="form-control" id="email" placeholder="Email" autocomplete="on">
	<span class="text-danger"><?php echo $erroreUser;?></span>
</div>
<!--fine input-->

<!--inizio input-->
<div class="input-group input-group-lg">
<input name="cf" type="text" required class="form-control" id="cf" placeholder="Codice Fiscale" autocomplete="on">
</div>
<!--fine input-->

<!--inizio input-->
<div class="input-group input-group-lg">
<input name="password" type="password" required class="form-control" id="password" placeholder="Scegli una password" autocomplete="on">
</div>
<!--fine input-->

<!--inizio input-->
<div class="input-group input-group-lg">
<input name="password_convalida" type="password" required class="form-control" id="password_convalida" placeholder="Ripeti la password" autocomplete="on" onClick="verifica()">
</div>
<!--fine input-->

<!--inizio input-->
<div class="input-group input-group-lg">
<input name="bday" type="text" required class="form-control" id="bday" placeholder="Data di nascita" autocomplete="on">
</div>
<!--fine input-->

<!--inizio input-->
<div class="input-group input-group-lg">
<span class="testo-registrazione">Sesso:</span> 
<label class="testo-registrazione">
<input type="radio" name="sesso" value="m" id="sesso_0">M</label>

<label class="testo-registrazione">
<input type="radio" name="sesso" value="f" id="sesso_1">F</label>
</div>
<!--fine input-->

<!--inizio input-->
<div class="input-group input-group-lg">
<input name="telefono" type="text" required class="form-control" id="telefono" placeholder="Telefono" autocomplete="on">
</div>
<!--fine input-->

<!--inizio input-->
<div class="input-group input-group-lg">
<input name="indirizzo" type="text" required class="form-control" id="indirizzo" placeholder="Indirizzo" autocomplete="on">
</div>
<!--fine input-->

<!--inizio input-->
<div class="input-group input-group-lg">
<input name="citta" type="text" required class="form-control" id="citta" placeholder="Città" autocomplete="on">
</div>
<!--fine input-->

<!--inizio input-->
<div class="input-group input-group-lg">
<input name="cap" type="text" required class="form-control" id="cap" placeholder="CAP" autocomplete="on">
</div>
<!--fine input-->

<!--inizio input-->
<div class="input-group input-group-lg">
<input name="autorizzo" type="checkbox" id="autorizzo" value="y"> Autorizzo il trattamento dei miei dati personali ai sensi degli artt. 13 e 23 del D.Lgs 30 Giugno 2003, n.196.
</div>
<!--fine input-->

<input name="invia" type="submit" id="invia" value="REGISTRATI" class="pulsanti-form">
<input name="keycontrol" type="hidden" value="<?php echo GetKey();?>">
</div>

</form>

</div>
</div>
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
<img src="img/sponseasy.png" width="219" height="27" alt=""/><br>
Vuoi essere tra i nostri sponsor?<br>
Copyright 2016-18 &copy; Tutti i diritti riservati.<br>
P.IVA 5416547634344
<br><a href="index.php">
<img src="img/logo-01.png"  style="padding-top: 5px; width: 50%; height: 50px; margin-left: auto; margin-right: auto;"> </a>	
</div>
      
<div class="col-md-3" style="border-left-color: #AB301F; border-left-style: solid;">
	<a href="index.php">HOME</a><br>
<a href="chi-siamo.php">CHI SIAMO</a><br>
<a href="contatti.php">CONTATTI</a><br>
<a href="registrazione.php">REGISTRAZIONE</a><br>
<a href="ricette.php">RICETTE</a><br>
<a href="galleria-ricette.php">GALLERIA</a><br>
<a href="Admin/index.php">ADMIN</a>
</div>

	<div class="col-md-3">
  <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d7034.3272357840115!2d12.501648227566763!3d41.90247882071467!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x132f61a155278919%3A0xcff7cfeedef9410c!2sMcDonald&#39;s+Termini!5e0!3m2!1sit!2sit!4v1531236202091" width="100%" height="176px" frameborder="0" style="border:0" allowfullscreen></iframe>
</div>
	
<div class="col-md-3" style="border-left-color: #AB301F; border-left-style: solid;">
	<h3 style="font: pacifico;">Contattaci:</h3>
	<p> Tel. 340 - 7921785<br>
		Tel. 352 - 9962439<br>
		email: info-cibum@gmail.com<br>
		<img src="img/cifre.png" style="width: 60px; height: 60px; padding-top: 5px;">
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
