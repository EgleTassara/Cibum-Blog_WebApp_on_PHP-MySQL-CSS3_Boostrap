<?php include ("../Connections/connect.php");?>

<?php
mysqli_query($connessione, "DELETE FROM ricette WHERE id=".$_GET['codice']."");
header("Location:ricette.php");
?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Documento senza titolo</title>
</head>

<body>
</body>
</html>