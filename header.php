<?php
session_start();
?>

<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="assets/styles/style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> Hôtel d'Hozier - <?php echo $title ?> </title>
</head>

<body>
    <header>
        <div class="wrapper">
            <nav>
                <a href="index.php">Accueil</a>
                <a href="livre-or.php">Livre d'or</a>
                <a href="#">Contact</a>
                <?php
                if (isset($_SESSION["login"])) {
                    echo "<a href='profil.php'>Page de profil</a>";
                    echo "<a href='commentaire.php'>Commentaire</a>";
                    echo "<a href='assets/includes/logout.inc.php'>Déconnexion</a>";
                } else {
                    echo    '<a href="inscription.php">Inscription</a>';
                    echo    '<a href="connexion.php">Connexion</a>';
                }
                ?>
            </nav>
        </div>
    </header>