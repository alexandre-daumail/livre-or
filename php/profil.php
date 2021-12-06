</head>
<?php
$pageTitle = 'Page de profil';
include '../assets/require/header.php';
require '../assets/require/config.php';

// Initialiser la session
session_start();
// Vérifiez si l'utilisateur est connecté, sinon redirigez-le vers la page de connexion
if (!isset($_SESSION["id"])) {
	header("Location: login.php");
	exit();
}
require('config.php');
// récupérer les infos utilisateur:
$id = $_SESSION["id"];
$query = "SELECT * FROM `utilisateurs` WHERE id='$id'";
$result = mysqli_query($conn, $query);
$user = mysqli_fetch_assoc($result);


if (isset($_REQUEST['login'], $_REQUEST['prenom'], $_REQUEST['nom'], $_REQUEST['password'])){
	if($_REQUEST['newpassword'] == $_REQUEST['conf_mdp']){
		// récupérer le nom d'utilisateur et supprimer les antislashes ajoutés par le formulaire
		$login = stripslashes($_REQUEST['login']);
		$login = mysqli_real_escape_string($conn, $login); 
		// récupérer l'prenom et supprimer les antislashes ajoutés par le formulaire
		$prenom = stripslashes($_REQUEST['prenom']);
		$prenom = mysqli_real_escape_string($conn, $prenom);
		// récupérer l'prenom et supprimer les antislashes ajoutés par le formulaire
		$nom = stripslashes($_REQUEST['nom']);
		$nom = mysqli_real_escape_string($conn, $nom);
		// récupérer le mot de passe et supprimer les antislashes ajoutés par le formulaire
		$password = stripslashes($_REQUEST['newpassword']);
		$password = mysqli_real_escape_string($conn, $password);
		
		$query = "UPDATE `utilisateurs` SET `login` = '$login',`prenom` = '$prenom', `nom` = '$nom', `password` = '$password' 
		 WHERE `utilisateurs`.`id` = $id";
		$res = mysqli_query($conn, $query);

		if(isset($res)){
			echo "<div class='sucess'>
				  <h3>Vous avez modifié votre profil avec succès. Vous allez être redirigés sur votre profil.</h3>
				  </div>";
				  header("refresh:5; url=profil.php");

		 }
		 }else{
			 echo'Confirmation de mot de passe échouée';		
		 }
		}else{
?>

<body>
	<main>
		<form class="box" action="" method="post">
			<h1 class="box-title">Modification du profil de l'utilisateur : <?php echo $user["login"]; ?></h1>
			
			<label for="login">Nom d'utilisateur</label>
			<input type="text" class="box-input" id="login" name="login" value="<?php echo $user["login"]; ?>" required/>

			<label for="prenom">Prénom</label>
			<input type="text" class="box-input" id="prenom" name="prenom" value="<?php echo $user["prenom"]; ?>" required/>

			<label for="nom">Nom</label>
			<input type="text" class="box-input" id="nom" name="nom" value="<?php echo $user["nom"]; ?>" />
			
			<input type="password" class="box-input" name="password" placeholder="Ancien mot de passe" required />

			<input type="password" class="box-input" name="newpassword" placeholder="Nouveau mot de passe" required/>

			<input type="password" class="box-input" name="conf_mdp" placeholder="Confirmation nouveau mot de passe" required/>

			<input type="submit" name="submit" value="Modifier" class="box-button" />

			<a href="logout.php">Déconnexion</a>
		</form>


	</main>
</body>
<?php } ?>
</html>