<?php 
//commande pour débuger

function debug($var){
    echo'<pre>';
    var_dump($var);
    echo'</pre>';
}

// Informations d'identification
define('DB_SERVER', 'localhost');
define('DB_LOGIN', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'livreor');
 
// Connexion à la base de données MySQL 
$conn = mysqli_connect(DB_SERVER, DB_LOGIN, DB_PASSWORD, DB_NAME);
 
// Vérifier la connexion
if($conn === false){
    die("ERREUR : Impossible de se connecter. " . mysqli_connect_error());
}


?>