<?php

$pageTitle = 'Page d\'inscription';
include'../assets/require/header.php';
require'../assets/require/config.php';

if (isset($_REQUEST['login'], $_REQUEST['password'])) {

    if ($_REQUEST['password'] == $_REQUEST['conf_mdp']) {
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
            echo "<div class='sucess'>
             <h3>Vous êtes inscrit avec succès.</h3>
             <p>Cliquez ici pour vous <a href='login.php'>connecter</a></p>
			 </div>";
        }
    } else {
        echo 'Confirmation de mot de passe échouée, revenir à l\'<a href=register.php>inscription</a>';
    }
} else {
?>
    <form class="box" action="" method="post">
        <h1 class="box-title">S'inscrire</h1>
        <input type="text" class="box-input" name="login" placeholder="Nom d'utilisateur" required />
        <input type="password" class="box-input" name="password" placeholder="Mot de passe" required />
        <input type="password" class="box-input" name="conf_mdp" placeholder="Confirmation mot de passe" required />
        <input type="submit" name="submit" value="S'inscrire" class="box-button" />
        <p class="box-register">Déjà inscrit? <a href="connexion.php">Connectez-vous ici</a></p>
    </form>
<?php }
include '../assets/require/footer.php'; ?>