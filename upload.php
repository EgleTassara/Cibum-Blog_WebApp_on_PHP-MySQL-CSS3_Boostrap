<?php 

 // Recupero il file e lo sposto nella cartella da me indicata, in questo caso in "images"

 !move_uploaded_file($_FILES['foto']['tmp_name'][0], 'images/'.$_FILES['foto']['name'][0]);
 
 // Recupero l'estensione del file

$estensione = strtolower(substr('images/'.$_FILES['foto']['name'][0], -4));

// Imposta la dimensione massima della foto
$dimensione = 500;
$width = $dimensione;
$height = $dimensione;

// CREO LA FOTO SE LA FOTO E'UNA JPG

 if($estensione == ".jpg" || $estensione == "jpeg"){ 

    // Ottengo le informazioni sull'immagine originale per ridimensionarla

list($width1, $height1, $type, $attr) = getimagesize('images/'.$_FILES['foto']['name'][0]);


$ratio_orig = $width1/$height1;

if ($width/$height > $ratio_orig) {
   $width = $height*$ratio_orig;
} else {
   $height = $width/$ratio_orig;
}


$ridotta1 = imagecreatetruecolor($width, $height);

$source1 = imagecreatefromjpeg( 'images/'.$_FILES['foto']['name'][0]);

imagecopyresized($ridotta1, $source1, 0, 0, 0, 0, $width, $height, $width1, $height1);


// Salvo l'immagine ridimensionata

imagejpeg($ridotta1, 'images/'.$_FILES['foto']['name'][0], 75);


    } 

	

	// CREO LA FOTO SE LA FOTO E'UNA PNG

	if($estensione == ".png"){ 

    // Ottengo le informazioni sull'immagine originale per ridimensionarla

list($width1, $height1, $type, $attr) = getimagesize('images/'.$_FILES['foto']['name'][0]);

$ratio_orig = $width1/$height1;

if ($width/$height > $ratio_orig) {
   $width = $height*$ratio_orig;
} else {
   $height = $width/$ratio_orig;
}


$ridotta1 = imagecreatetruecolor($width, $height);

$source1 = imagecreatefrompng( 'images/'.$_FILES['foto']['name'][0]);

imagecopyresized($ridotta1, $source1, 0, 0, 0, 0, $width, $height, $width1, $height1);

// Salvo l'immagine ridimensionata

imagepng($ridotta1, 'images/'.$_FILES['foto']['name'][0]);



    } 

// creo delle variabile e gli assegno come contenuto il nome della foto con il percorso
	 $nome_foto=$_FILES['foto']['name'][0];

	 
// qui creo un redirect con la pagina step2.php passandogli come parametro la foto
	header ("Location: admin/nuova-ricetta.php?foto=$nome_foto");
  ?>