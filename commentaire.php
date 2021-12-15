<?php
$title = 'Ajouter un commentaire';
include_once 'header.php';

// Vérifiez si l'utilisateur est connecté, sinon redirigez-le vers la page de connexion
if (!isset($_SESSION["login"])) {
    header("Location: connexion.php");
    exit();
}
?>

<main>
    <h1>Bienvenue dans l'espace commentaire</h1>
    <fieldset>
        <legend>Ajouter un commentaire au livre d'or</legend>
        <form action="assets/includes/commentaire.inc.php" method="post">
            <label for="text">Votre commentaire : </label>
            <textarea id="text" type="text" name="comm"></textarea>
            <input type="submit" name="submit" value="Envoyer">
        </form>
    </fieldset>
</main>
<?php include 'footer.php'; ?>