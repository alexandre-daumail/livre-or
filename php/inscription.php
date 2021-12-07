<?php

$title = 'Création de profil';
include '../assets/require/header.php';
require '../assets/require/config.php';

if (isset($_REQUEST['login'], $_REQUEST['psw'])) {

    if ($_REQUEST['psw'] === $_REQUEST['conf_mdp']) {
        // récupérer le nom d'utilisateur et supprimer les antislashes ajoutés par le formulaire
        $login = stripslashes($_REQUEST['login']);
        $login = mysqli_real_escape_string($conn, $login);
        // récupérer le mot de passe et supprimer les antislashes ajoutés par le formulaire
        $password = stripslashes($_REQUEST['psw']);
        $password = mysqli_real_escape_string($conn, $password);

        $query = "INSERT into `utilisateurs` (login,  password)
				VALUES ('$login', '$password')";
        $res = mysqli_query($conn, $query);

        if (isset($res)) {
            echo "<h3 class='sucess'>Vous êtes inscrit avec succès.</h3>";
            header("refresh:2; url=livre-or.php");
        }
    } else {
        echo 'Confirmation de mot de passe échouée, revenir à l\'<a href=inscription.php>inscription</a>';
    }
} else {
?>
    <main class="container">
        <form action="" method="post">
            <div class="imgcontainer">
                <img src="../assets/images/login.png" alt="Avatar" class="avatar">
            </div>

            <div class="container2">
                <h1>Création d'un compte utilisateur</h1>
                <hr>

                <label for="login"><h3>Nom d'utilisateur</h3></label>
                <input type="text" class="box-input" name="login" id="login" placeholder="Nom d'utilisateur" required />

                <label for="psw"><h3>Mot de passe</h3></label>
                <input type="password" placeholder="Mot de passe" name="psw" id="psw" required>

                <label for="psw-repeat"><h3>Confirmation du mot de passe</h3></label>
                <input type="password" placeholder="Confirmer" name="conf_mdp" id="psw-repeat" required>

                <hr>

                <button type="submit" class="registerbtn">Inscription</button>
            </div>
            <div class="container2 bottom">
                <p class="box-register">Déjà inscrit? <a href="connexion.php">Connectez-vous ici</a></p>
            </div>
        </form>
    </main>
<?php } ?>
<?php include '../assets/require/footer.php'; ?>