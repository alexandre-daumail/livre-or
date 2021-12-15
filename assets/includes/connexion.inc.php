<?php

if(isset($_POST["submit"])) {

    $login = $_POST["login"];
    $pwd = $_POST["pwd"];

    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';

    if (emptyInputlogin($login, $pwd) !== false) {
        header("location:../../connexion.php?error=champsrequis");
        exit();
    }
    
    loginUser ($conn, $login, $pwd);
}
else {
    header("location: ../../index.php");
    exit();
}