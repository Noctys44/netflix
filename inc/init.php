<?php
session_start();
// Connexion à notre BDD

$pdo = new PDO(
    "mysql:host=localhost;dbname=netflix","root","",
    array(
        PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING,
        PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'
    )
);



// Déclarer une variable qui va afficher le message

$content = '';


require_once 'function.php';


// Définir une constante où sera stockée l'URL RELATIVE
define('URL', 'http://localhost/php/netflix/');
define('RACINE', $_SERVER['DOCUMENT_ROOT']. '/php/netflix/');
?>