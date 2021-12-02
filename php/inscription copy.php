<?php

$title = 'Création de profil';
include '../assets/require/header.php';
require '../assets/require/config.php';

if (isset($_REQUEST['login'], $_REQUEST['password'])) {

    if ($_REQUEST['password'] === $_REQUEST['conf_mdp']) {
        // récupérer le nom d'utilisateur et supprimer les antislashes ajoutés par le formulaire
        $login = stripslashes($_REQUEST['login']);
        $login = mysqli_real_escape_string($conn, $login);
        // récupérer le mot de passe et supprimer les antislashes ajoutés par le formulaire
        $password = stripslashes($_REQUEST['password']);
        $password = mysqli_real_escape_string($conn, $password);

        $query = "INSERT into `utilisateurs` (login,  password)
				VALUES ('$login', '$password')";
        $res = mysqli_query($conn, $query);

        if (isset($res)) {
            echo "<h3 class='sucess'>Vous êtes inscrit avec succès.</h3>";
            header("refresh:2; url=../../php/livre-or.php");
        }
    } else {
        echo 'Confirmation de mot de passe échouée, revenir à l\'<a href=inscription.php>inscription</a>';
    }
} else {
?>
    <div class="form">
        <form action="" method="post" autocomplete="off">
            <div class="container">
                <h1>Création d'un compte utilisateur</h1>
                <hr>

                <label for="login">Nom d'utilisateur</label>
                <input type="text" class="box-input" name="login" id="login" placeholder="Nom d'utilisateur" required />

                <label for="psw"><b>Mot de passe</b></label>
                <input type="password" placeholder="Enter Password" name="psw" id="psw" required>

                <label for="psw-repeat"><b>Confirmation du mot de passe</b></label>
                <input type="password" placeholder="Confirmer" name="psw-repeat" id="psw-repeat" required>
                <hr>

                <button type="submit" class="registerbtn">Inscription</button>
            </div>
            <div class="container signin">
                <p class="box-register">Déjà inscrit? <a href="connexion.php">Connectez-vous ici</a></p>
            </div>
        </form>
    </div>
<?php }
include '../assets/require/footer.php'; ?>