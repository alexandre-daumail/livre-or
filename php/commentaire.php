<?php
$title = 'Ajouter un commentaire';
include'../assets/require/header.php';
require'../assets/require/config.php';

session_start();

// Vérifiez si l'utilisateur est connecté, sinon redirigez-le vers la page de connexion
if (!isset($_SESSION["id"])) {
    header("Location: connexion.php");
    exit();
}
?>

<main>
    <h1>Bienvenue dans l'espace commentaire</h1>
    <fieldset>
        <legend>Ajouter un commentaire au livre d'or</legend>
        <form action="../assets/traitements/submit.php" method="post">
            <label for="text">Votre commentaire : </label>
            <textarea id="text" type="text" name="comm"></textarea>
            <input type="submit" name="envoyer" value="Envoyer">
        </form>
    </fieldset>
</main>
<?php include '../assets/require/footer.php'; ?>