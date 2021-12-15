<?php
//commande pour débuger

function debug($var){
  echo'<pre>';
  var_dump($var);
  echo'</pre>';
}
function emptyInputSignup($login, $pwd, $pwdRepeat)
{
  $result;
  if (empty($login) || empty($pwd) || empty($pwdRepeat)) {
    $result = true;
  } else {
    $result = false;
  }
  return $result;
}

function invalidlogin($login)
{
  $result;
  if (!preg_match("/^[a-zA-Z0-9]*$/", $login)) {
    $result = true;
  } else {
    $result = false;
  }
  return $result;
}

function pwdMatch($pwd, $pwdRepeat)
{
  $result;
  if ($pwd !== $pwdRepeat) {
    $result = true;
  } else {
    $result = false;
  }
  return $result;
}

function loginExists($conn, $login)
{
  $sql = "SELECT * FROM utilisateurs WHERE login = ? ;";
  $stmt = mysqli_stmt_init($conn);
  if (!mysqli_stmt_prepare($stmt, $sql)) {
    header("location:../../inscription.php?error=pseudoexiste");
    exit();
  }

  mysqli_stmt_bind_param($stmt, "s", $login);
  mysqli_stmt_execute($stmt);

  $resultData = mysqli_stmt_get_result($stmt);

  if ($row = mysqli_fetch_assoc($resultData)) {
    return $row;
  } else {
    $result = false;
    return $result;
  }

  mysqli_stmt_close($stmt);
}

function createUser($conn, $login, $pwd)
{
  $sql = "INSERT INTO utilisateurs (login, password) VALUES (?, ?);";
  $stmt = mysqli_stmt_init($conn);
  if (!mysqli_stmt_prepare($stmt, $sql)) {
    header("location:../../inscription.php?error=echecstmt");
    exit();
  }

  $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);
  mysqli_stmt_bind_param($stmt, "ss", $login, $hashedPwd);
  mysqli_stmt_execute($stmt);
  mysqli_stmt_close($stmt);
  header("location: ../../inscription.php?error=aucune");
  exit();
}

function emptyInputlogin($login, $pwd)
{
  $result;
  if (empty($login) || empty($pwd)) {
    $result = true;
  } else {
    $result = false;
  }
  return $result;
}

function loginUser ($conn, $login, $pwd){

  $loginExists = loginExists ($conn, $login);

  if ($loginExists === false) {
    header("location: ../../connexion.php?error=mauvaispseudo");
    exit();
  }

  $pwdHashed = $loginExists["password"];
  $checkPwd = password_verify($pwd, $pwdHashed);

  if ($checkPwd === false) {
    header("location: ../../connexion.php?error=mauvaismdp");
    exit();
  }
  else if ($checkPwd === true){
    session_start();
    $_SESSION["id"] = $loginExists["id"];
    $_SESSION["login"] = $loginExists["login"];
    header("location: ../../index.php");
    exit();

  }
}