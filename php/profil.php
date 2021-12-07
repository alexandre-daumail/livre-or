</head>
<?php
$title = 'Page de profil';
include '../assets/require/header.php';
require '../assets/require/config.php';

// Initialiser la session
session_start();
// Vérifiez si l'utilisateur est connecté, sinon redirigez-le vers la page de connexion
if (!isset($_SESSION["id"])) {
    header("Location: connexion.php");
    exit();
}
// récupérer les infos utilisateur:
$id = $_SESSION["id"];
$query = "SELECT * FROM `utilisateurs` WHERE id='$id'";
$result = mysqli_query($conn, $query);
$user = mysqli_fetch_assoc($result);


if (isset($_REQUEST['login'], $_REQUEST['password'])) {
    if ($_REQUEST['newpassword'] == $_REQUEST['conf_mdp']) {
        // récupérer le nom d'utilisateur et supprimer les antislashes ajoutés par le formulaire
        $login = stripslashes($_REQUEST['login']);
        $login = mysqli_real_escape_string($conn, $login);
        // récupérer le mot de passe et supprimer les antislashes ajoutés par le formulaire
        $password = stripslashes($_REQUEST['newpassword']);
        $password = mysqli_real_escape_string($conn, $password);

        $query = "UPDATE `utilisateurs` SET `login` = '$login', `password` = '$password' 
		 WHERE `utilisateurs`.`id` = $id";
        $res = mysqli_query($conn, $query);

        if (isset($res)) {
            echo "<div class='sucess'>
				  <h3>Vous avez modifié votre profil avec succès. Vous allez être redirigés sur votre profil.</h3>
				  </div>";
            header("refresh:5; url=profil.php");
        }
    } else {
        echo 'Confirmation de mot de passe échouée';
        header("refresh:2; url=profil.php");
    }
} else {
?>

    <body>
        <main>
            <div class="content-area">
                <form action="" method="post">
                    <div class="imgcontainer">
                        <img src="../assets/images/login.png" alt="Avatar" class="avatar">
                    </div>

                    <div class="container2">
                        <h1 class="box-title">Vous etes connectés en tant que : </h1>
                        <h1><?php echo $user["login"]; ?></h1>

                        <input type="text" class="box-input" id="login" name="login" value="<?php echo $user["login"]; ?>" required />

                        <input type="password" class="box-input" name="password" placeholder="Ancien mot de passe" required />

                        <input type="password" class="box-input" name="newpassword" placeholder="Nouveau mot de passe" required />

                        <input type="password" class="box-input" name="conf_mdp" placeholder="Confirmation nouveau mot de passe" required />

                        <button type="submit" class="registerbtn">Modification</button>

                        <div class="container2 bottom">
                            <p><a href="connexion.php">Déconnexion</a></p>
                            <p>Voulez-vous laisser un commentaire dans notre livre d'or? <a href="commentaire.php">C'est ici</a></p>
                        </div>

                    </div>
                </form>
            </div>
        </main>
    <?php }
include '../assets/require/footer.php'; ?>