<?php
// Disattiva il Display Error
//error_reporting(0);

// Visualizza solo gli errori semplici
error_reporting(E_ERROR | E_WARNING | E_PARSE);

//Aggiunge il NOTICE
//error_reporting(E_ERROR | E_WARNING | E_PARSE | E_NOTICE);

// Visualizza tutti gli errori eccetto E_NOTICE e E_DEPRECATED
//error_reporting(E_ALL ^ E_NOTICE ^ E_DEPRECATED);

// Visualizza tutti gli errori
//error_reporting(E_ALL);

ini_set("display_errors", 1);  
ini_set("html_errors", 1);
ini_set("display_startup_errors", 1); 
ini_set("track_errors", 1);   
ini_set("error_log", "/logz.txt");  
ini_set("log_errors", 1);  
ini_set("log_errors_max_len", 0);
?>