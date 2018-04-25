<?php session_start();
include_once '_config.php';
include_once 'class/user.php';

$mail = $_POST['mail'];
$password = $_POST['password'];

$usr = new User($mail, $password);


var_dump($usr->getName());
// var_dump($mail);
// var_dump($password);


 ?>
