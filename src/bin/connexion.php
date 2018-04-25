<?php session_start();
include_once '_config.php';

$mail = $_POST['mail'];
$password = $_POST['password'];

$result = $dbh->exec("SELECT email_personne FROM personne WHERE email_personne = '$mail' AND password = '$password'");
// $_SESSION('email') =

var_dump($result);
var_dump($mail);
var_dump($password);


 ?>
