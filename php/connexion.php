<?php
$title = 'Page Connexion';

include '../assets/require/header.php';
require '../assets/require/config.php';

if (isset($_POST['login'])) {
    $login = stripslashes($_REQUEST['login']);
    $login = mysqli_real_escape_string($conn, $login);

    $password = stripslashes($_REQUEST['password']);
    $password = mysqli_real_escape_string($conn, $password);

    $query = "SELECT * FROM `utilisateurs` WHERE login='$login' AND password='$password'";
    $result = mysqli_query($conn, $query);

    if (isset($result)) {
        $user = mysqli_fetch_assoc($result);
        session_start();
        $_SESSION['id'] = $user['id'];
        header('location: profil.php');
    }
} else {
    $message = "Le nom d'utilisateur ou le mot de passe est incorrect.";
}

?>
<main class="container">
    <form action="" method="post">
        <div class="imgcontainer">
            <img src="../assets/images/login.png" alt="Avatar" class="avatar">
        </div>

        <div class="container">
            <h1 class="box-title">Connexion</h1>

            <input type="text" class="box-input" name="login" placeholder="Nom d'utilisateur">

            <input type="password" class="box-input" name="password" placeholder="Mot de passe">

            <button type="submit" class="registerbtn">Connexion</button>
            <div class="container2 bottom">
            <p>Vous êtes nouveau ici? <a href="inscription.php">S'inscrire</a></p>
            <?php if (!empty($message)) { ?>
                <p class="errorMessage"><?php echo $message; ?></p></div>
        </div>
    </form>
</main>

<?php }
            include '../assets/require/footer.php'; ?>