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

        if ($user['type'] == 'admin') {
            session_start();
            $_SESSION['id'] = $user['id'];
            header('location: admin.php');
        } else {
            session_start();
            $_SESSION['id'] = $user['id'];
            header('location: commentaire.php');
        }
    } else {
        $message = "Le nom d'utilisateur ou le mot de passe est incorrect.";
    }
}
?>
<div class="content-area">
    <form action="" method="post">
        <h1 class="box-title">Connexion</h1>

        <input type="text" class="box-input" name="login" placeholder="Nom d'utilisateur">

        <input type="password" class="box-input" name="password" placeholder="Mot de passe">

        <input type="submit" value="Connexion " name="submit" class="box-button">

        <p class="box-register">Vous êtes nouveau ici? <a href="inscription.php">S'inscrire</a></p>

        <?php if (!empty($message)) { ?>
            <p class="errorMessage"><?php echo $message; ?></p>

    </form>
</div>
<?php }
        include '../assets/require/footer.php'; ?>