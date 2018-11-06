<?php session_start();
// if (!isset($_SESSION)) {
//   if (empty($_SESSION)) {
//     header('Location: http://127.0.0.1/edsa-TrandportMe/src/connect.php');
//   }
// }
include_once('_header.php');
$title = 'Simple Map';
include_once('_header.php');
require_once 'bin/user/UserManager.php';
require_once 'bin/driver/DriverManager.php';
   $user = unserialize($_SESSION['user']);
   if ($user == NULL) {
     header('Location: /edsa-TME/connect.php');
   }
$title = 'Simple Map';
//$db = new PDO('mysql:dbname=dbtme;host=127.0.0.1','root','');
$userManager = new UserManager($db);
$driverManager = new DriverManager($db);
$driver = $driverManager->getAllDriver();

echo '<h1>Salut '.$user->getUsr_firstname().'</h1>';
echo '<a class="btn btn-dark" href="profil.php">Mon Profil</a><a class="btn btn-secondary"href="deconnexion.php">Se deconnecter</a>';
if ($userManager->driverTest($user->getUsr_id()) !=  NULL) {
    include_once('view/driver/driverView.php');
}else {
    include_once('view/user/userView.php');
}


?>
