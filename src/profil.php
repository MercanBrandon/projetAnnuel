<?php session_start();
include_once('bin/user/User.php');
$user = unserialize($_SESSION['user']);

printf('<p>'.$user->getUsr_name().'</p>');
printf('<p>'.$user->getUsr_firstname().'</p>');
printf('<p>'.$user->getUsr_birthdate().'</p>');
printf('<p>'.$user->getUsr_email().'</p>');
printf('<p>'.$user->getUsr_phone().'</p>');
printf('<p>'.$user->getUsr_password().'</p>');
?>
<a href="#">Ajouter une adresse</a>
