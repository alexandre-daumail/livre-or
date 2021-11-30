<?php
$pageTitle = 'Ajouter un commentaire';
include '../assets/styles/header.php';
require '../assets/styles/config.php';

?>
<h1>Bienvenue dans l'espace commentaire</h1>
<fieldset>
    <legend>Ajouter un commentaire au livre d'or</legend>
    <form action="livre-or.php" method="post">
        <label for="text">Votre commentaire : </label>
        <input id="text" type="text" name="comm"></textarea>
        <input type="submit" value="Envoyer">
    </form>
</fieldset>