<!DOCTYPE html>
<html>

<head>
    <?php
    if ($title === "Accueil") {
        echo '<link rel="stylesheet" href="assets/styles/style.css">';
    } elseif ($title === 'Traitement commentaire') {
        echo '<link rel="stylesheet" href="../styles/style.css">';
    } else {
        echo '<link rel="stylesheet" href="../assets/styles/style.css">';
    }
    ?>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> Hôtel d'Hozier - <?php echo $title ?> </title>
</head>

<body>
            <header>
                <div class="wrapper">
                    <nav>
                        <a href="http://localhost/livre-or/index.php">Accueil</a>
                        <a href="http://localhost/livre-or/php/livre-or.php">Livre d'or</a>
                        <a href="#">Contact</a>
                        <a href="http://localhost/livre-or/php/connexion.php">Connexion</a>
                        <a href="http://localhost/livre-or/php/inscription.php">Inscription</a>
                    </nav>
                </div>
            </header>


       