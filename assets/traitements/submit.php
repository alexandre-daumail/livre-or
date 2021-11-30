<?php
$pageTitle = 'Traitement commentaire';
include '../require/header.php';
require '../require/config.php';


session_start();

if (isset($_POST["envoyer"])) {

$id = $_SESSION["id"];
// récupérer le message et supprimer les antislashes ajoutés par le formulaire
$comm = strip_tags($_REQUEST['comm']); // j'utilise la fonction strip_tags pour qu'on ne puisse pas utiliser de balises html dans l'input
$time = date("Y-m-d H:i:s");
$query = "INSERT INTO commentaires (commentaire, id_utilisateur, date)
            VALUES ('$comm', '$id', '$time')";
$res = mysqli_query($conn, $query);

if (isset($res)) {
    echo "<div class='sucess'>
         <h3>Vous avez envoyé le commentaire avec succès.</h3>
         <p>Vous allez être redirigés vers le livre d'or.</p>
         </div>";
    header("refresh:5; url=../../php/livre-or.php");
} else {
    echo "L'envoi du commentaire a échoué";
}
}
