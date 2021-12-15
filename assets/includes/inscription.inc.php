<?php
if(isset($_POST["submit"])) {
  
  $login =  $_POST["login"];
  $pwd =  $_POST["pwd"];
  $pwdRepeat =  $_POST["pwdrepeat"];

  require_once 'dbh.inc.php';
  require_once 'functions.inc.php';

if (emptyInputSignup($login, $pwd, $pwdRepeat) !== false) {
  header("location:../../inscription.php?error=champsrequis");
  exit();
}
if (invalidlogin($login) !== false) {
  header("location:../../inscription.php?error=pseudoincorrect");
  exit();
}
if (pwdMatch($pwd, $pwdRepeat) !== false) {
  header("location:../../inscription.php?error=mdpincorrect");
  exit();
}
if (loginExists($conn, $login) !== false) {
  header("location:../../inscription.php?error=pseudopris");
  exit();
}

createUser($conn, $login, $pwd);

}
else {
  header("location:../../inscription.php");
  exit();
}