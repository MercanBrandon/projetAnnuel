<?php session_start();
include_once '_config.php';
include_once 'class/user.php';
include_once 'class/driver.php';


$mail = $_POST['mail'];
$password = $_POST['password'];



$usr = new User($dbh, $mail, $password);
$driver = new Driver($dbh, $mail, $password);


//$usr->addUser('Louison','Laurence', '1997-10-05','0647371613','louison.laurence@gmail.com','123456');
//$usr->addAdress('Rouen', '63 rue Moïse', '', '76000', 'Rouen');



//var_dump($usr->getName());
//var_dump($driver);
// var_dump($password);


 ?>
