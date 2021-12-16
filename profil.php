</head>
<?php
$title = 'Page de profil';
include_once 'header.php';
include_once 'assets/includes/dbh.inc.php';
// récupérer les infos utilisateur:
$id = $_SESSION["id"];
$query = "SELECT * FROM `utilisateurs` WHERE id='$id'";
$result = mysqli_query($conn, $query);
$user = mysqli_fetch_assoc($result);


/* if (isset($_REQUEST['login'], $_REQUEST['password'])) {
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
 */?>

    <body>
        <main>
            <div class="content-area">
                <form action="assets/includes/modification.inc.php" method="post">
                    <div class="imgcontainer">
                        <img src="assets/images/login.png" alt="Avatar" class="avatar">
                    </div>

                    <div class="container2">
                        <h1 class="box-title">Vous etes connectés en tant que : </h1>
                        <h2><?php echo $user["login"]; ?></h2>
                        <hr>

                        <input type="password" class="box-input" name="pwd" placeholder="Ancien mot de passe" required />

                        <input type="password" class="box-input" name="new-pwd" placeholder="Nouveau mot de passe" required />

                        <input type="password" class="box-input" name="conf_mdp" placeholder="Confirmation nouveau mot de passe" required />

                        <button type="submit" class="registerbtn" name="submit">Modification</button>
                        <button class="logoutbtn"><a href="assets/includes/logout.inc.php">Déconnexion</a></button>

                        <div class="container2 bottom">
                            <p>Laisser un commentaire dans notre <a href="commentaire.php">livre d'or</a>?</p>
                        </div>

                    </div>
                </form>
            </div>
        </main>
    <?php 
    if (isset($_GET["error"])) {
        if ($_GET["error"] == "champsrequis") {
          echo "<p>Remplissez tous les champs!</p>";
        }
        else if ($_GET["error"] == "pseudoincorrect") {
          echo "<p>Choisissez un pseudo correct!</p>";
        }
        else if ($_GET["error"] == "mdpincorrect") {
          echo "<p>Les mots de passe ne sont pas identiques!</p>";
        }
        else if ($_GET["error"] == "echecstmt") {
          echo "<p>Problème de connexion avec la base de donnée, veuillez contacter un admin.</p>";
        }
        else if ($_GET["error"] == "aucune") {
          echo "<p>Modification de profil réussie!</p>";
        }
      }
include_once 'footer.php'; ?>