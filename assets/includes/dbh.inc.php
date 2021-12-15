<?php

$serverName = "localhost";
$dBUsername = "root";
$dBPassword = "";
$dBname = "livreor";

$conn = mysqli_connect($serverName, $dBUsername, $dBPassword, $dBname);

if(!$conn) {
  die("La connexion a échoué" . mysqli_connect_error());
}
