<?php
$title = 'Création de profil';
include_once 'header.php';
?>

    <main class="container">
        <form action="assets/includes/inscription.inc.php" method="post">
            <div class="imgcontainer">
                <img src="assets/images/login.png" alt="Avatar" class="avatar">
            </div>

            <div class="container2">
                <h1>Création d'un compte utilisateur</h1>
                <hr>

                <label for="login">
                    <h3>Nom d'utilisateur</h3>
                </label>
                <input type="text" class="box-input" name="login" id="login" placeholder="Nom d'utilisateur" required />

                <label for="pwd">
                    <h3>Mot de passe</h3>
                </label>
                <input type="password" placeholder="Mot de passe" name="pwd" id="pwd" required>

                <label for="psw-repeat">
                    <h3>Confirmation du mot de passe</h3>
                </label>
                <input type="password" placeholder="Confirmer" name="pwdrepeat" id="psw-repeat" required>

                <hr>

                <button class="registerbtn" type="submit" name="submit">Inscription</button>
            </div>
            <div class="container2 bottom">
                <p class="box-register">Déjà inscrit? <a href="connexion.php">Connectez-vous ici</a></p>
            </div>
        </form>
    </main>
<?php 

if (isset($_GET["error"])) {
    if ($_GET["error"] == "champsrequis") {
        echo "<p>Remplissez tous les champs!</p>";
    } else if ($_GET["error"] == "pseudoincorrect") {
        echo "<p>Choisissez un pseudo correct!</p>";
    } else if ($_GET["error"] == "mdpincorrect") {
        echo "<p>Les mots de passe ne sont pas identiques!</p>";
    } else if ($_GET["error"] == "pseudopris") {
        echo "<p>Ce pseudo est déjà pris!</p>";
    } else if ($_GET["error"] == "echecstmt") {
        echo "<p>Problème de connexion avec la base de donnée, veuillez contacter un admin.</p>";
    } else if ($_GET["error"] == "aucune") {
        echo "<p>Vous vous êtes inscrit avec succès! Bienvenue parmis nous :)</p>";
    }
}
include_once 'footer.php';
?>