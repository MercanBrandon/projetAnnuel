<?php session_start();
//include_once '_config.php';
//require_once 'user/User.php';
require_once 'user/UserManager.php';
//include_once 'class/driver.php';


$db = new PDO('mysql:dbname=dbtme;host=127.0.0.1','root','');

$manager = new UserManager($db);

$user = $manager->getUser($_POST['mail'],$_POST['password']);

//$_SESSION['user'] = $user;

if ($user != NULL) {
  $_SESSION['mail'] = $_POST['mail'];
  $_SESSION['password'] = $_POST['password'];

  header('Location: http://127.0.0.1:8080/edsa-TME/index.php');
}

// $mail = $_POST['mail'];
// $password = $_POST['password'];
//
//
//
// $usr = new User($mail, $password);
// $driver = new Driver($dbh, $mail, $password);
//
// $susr = serialize($usr);
// $_SESSION['usr'] = serialize($usr);
//
// header('location: http://127.0.0.1/edsa-TME/src/index.php');
//$usr->addUser('Louison','Laurence', '1997-10-05','0647371613','louison.laurence@gmail.com','123456');
//$usr->addAdress('Rouen', '63 rue Moïse', '', '76000', 'Rouen');



//var_dump($usr->getName());
//var_dump($driver);
// var_dump($password);

 ?>
