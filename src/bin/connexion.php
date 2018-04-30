<?php //session_start();
//include_once '_config.php';
require_once 'user/User.php';
require_once 'user/UserManager.php';
//include_once 'class/driver.php';

$laurence = new User([
  'usr_name' => 'Louison',
  'usr_firstname' => 'Laurence',
  'usr_birthdate' => '1997-10-05',
  'usr_phone' => '0690364616',
  'usr_email' => 'laurence.louison@gmail.com',
  'usr_password' => '123456'
]);

var_dump($laurence);
$db = new PDO('mysql:dbname=dbtme;host=127.0.0.1','root','');

$manager = new UserManager($db);

$manager->addUser($laurence);


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
