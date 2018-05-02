<?php //session_start();
//include_once '_config.php';
require_once 'user/User.php';
require_once 'user/UserManager.php';
//include_once 'class/driver.php';

$brandon = new User([
  'usr_name' => 'Mercan',
  'usr_firstname' => 'Brandon',
  'usr_birthdate' => '1997-02-02',
  'usr_phone' => '0768006602',
  'usr_email' => 'mercan.brandon@outlook.fr',
  'usr_password' => '22021997'
]);

var_dump($brandon);

$db = new PDO('mysql:dbname=dbtme;host=127.0.0.1','root','');

$manager = new UserManager($db);

$ex = $manager->getUser('mercan.brandon@outlook.fr','22021997');
// var_dump($ex);


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
