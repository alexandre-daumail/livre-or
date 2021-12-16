<?php
session_start();


require_once 'dbh.inc.php';
require_once 'functions.inc.php';

if (isset($_POST["submit"])) {

    $pwd = $_POST["new-pwd"];
    $pwdRepeat =  $_POST["conf_mdp"];


    if (emptyInputSignup($pwd, $pwd, $pwdRepeat) !== false) {
        header("location:../../profil.php?error=champsrequis");
        exit();
    }
    if (pwdMatch($pwd, $pwdRepeat) !== false) {
        header("location:../../profil.php?error=mdpincorrect");
        exit();
    }

    modifyUser($conn, $login, $pwd);
} else {
    header("location: ../../profil.php");
    exit();
}
