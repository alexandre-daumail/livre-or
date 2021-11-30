
<?php
$pageTitle= 'Livre d\'or';
include'../assets/styles/header.php';
require'../assets/styles/config.php';

/********************************************************************************************************** */
//Affichage des messages du livre d'or//

$req = mysqli_query($conn,"SELECT commentaires.date, commentaires.commentaire, utilisateurs.login FROM commentaires INNER JOIN utilisateurs ON commentaires.id_utilisateur = utilisateurs.id ORDER BY commentaires.date DESC");
$nbLignes = mysqli_num_rows($req);

if ($nbLignes > 0){
    while ( $row = mysqli_fetch_assoc($req)){
        $nom = $row['login'];
        $comm = $row['commentaire'];
        $date = $row['date'];

        $comm = nl2br($comm);

        echo'<div class="comm"> Posté le ' . 
            $date . ' par ' .  $nom . ':<br>' .
            $comm . '</div><hr>';
    }
}
else{
    echo"Aucun message n'a été publié pour le moment";
}
/********************************************************************************************************** */



/********************************************************************************************************** */



/********************************************************************************************************** */
?>
</body>

</html>