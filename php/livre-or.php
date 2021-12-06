
<?php
$title = 'Livre d\'or';
include '../assets/require/header.php';
require '../assets/require/config.php';
?>
<div class="content-area">
<h1>Livre d'or</h1>
<p>Voici les commentaires de nos clients:</p>


<?php
/********************************************************************************************************** */
//Affichage des messages du livre d'or//
$req = mysqli_query($conn, "SELECT commentaires.date, commentaires.commentaire, utilisateurs.login FROM commentaires INNER JOIN utilisateurs ON commentaires.id_utilisateur = utilisateurs.id ORDER BY commentaires.date DESC");
$nbLignes = mysqli_num_rows($req);

if ($nbLignes > 0) {
    while ($row = mysqli_fetch_assoc($req)) {
        $nom = $row['login'];
        $comm = $row['commentaire'];
        $date = date_create($row['date']);
        $comm = nl2br($comm);

        echo '<div class="comm"> Posté le ' .
            date_format($date, 'd/m/Y H:i:s') . ' par ' .  $nom . ':<br>' .
            $comm . '</div><hr>';
    }
} else {
    echo "Aucun message n'a été publié pour le moment";
}
?>
</div>
<?php include '../assets/require/footer.php'; ?>