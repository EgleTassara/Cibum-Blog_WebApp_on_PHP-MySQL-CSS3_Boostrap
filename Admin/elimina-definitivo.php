<?php include ("../Connections/connect.php");?>
<?php include ("../controlloErrori.php");?>
<?php
    mysqli_query($connessione, "DELETE FROM ricette WHERE id=".$_GET['codice']."");
    header("Location:ricette.php");
    ?>
