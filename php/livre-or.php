
<?php
$title = 'Livre d\'or';
include '../assets/require/header.php';
require '../assets/require/config.php';

// Initialiser la session
session_start();
// Vérifiez si l'utilisateur est connecté, sinon redirigez-le vers la page de connexion

?>

<main>
<h1>Livre d'or</h1>
<h3>Voici les commentaires de nos clients:</h3>


<?php
/***********************************************************************************************************/
//Affichage des messages du livre d'or//
$req = mysqli_query($conn, "SELECT commentaires.date, commentaires.commentaire, utilisateurs.login FROM commentaires INNER JOIN utilisateurs ON commentaires.id_utilisateur = utilisateurs.id ORDER BY commentaires.date DESC");
$nbLignes = mysqli_num_rows($req);

if ($nbLignes > 0) {
    while ($row = mysqli_fetch_assoc($req)) {
        $nom = $row['login'];
        $comm = $row['commentaire'];
        $date = date_create($row['date']);
        $comm = nl2br($comm);

        echo '<div class="comm"> <h5>Posté le ' .
            date_format($date, 'd/m/Y \à H:i:s') . ' par ' .  '<span class="user">' . $nom . '</span>:</h5><br>' .
            $comm . '</div><hr>';
    }
} else {
    echo "Aucun message n'a été publié pour le moment";
}
?>
</main>
<?php include '../assets/require/footer.php'; ?>