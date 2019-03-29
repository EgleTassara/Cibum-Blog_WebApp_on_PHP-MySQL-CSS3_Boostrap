<?php include ("Connections/connect.php");?>

<?php
// Domanda al database
$query_RS_utente="SELECT * FROM utenti WHERE keycontrol='".$_GET['keycontrol']."'";
// Invio della richiesta al database
$RS_utente=mysqli_query($connessione,$query_RS_utente);
// Ritorno dei dati richiesti
$utente=mysqli_fetch_assoc($RS_utente);

// Domanda di modificare il campo keycontrol e portarlo a 0, mediante la chiave id(primaria)
$aggiorna="UPDATE utenti SET keycontrol='0' WHERE id=".$utente['id']."";
$inviaQuery=mysqli_query($connessione,$aggiorna);

session_start();
$_SESSION['username']=$utente['email'];
echo "<script>window.location.replace('index.php')</script>";
?>