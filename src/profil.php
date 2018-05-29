<?php session_start();
include_once('bin/user/User.php');
include_once('bin/course/CourseManager.php');
$user = unserialize($_SESSION['user']);
$db = new PDO('mysql:dbname=dbtme;host=127.0.0.1','root','');

printf('<p>'.$user->getUsr_name().'</p>');
printf('<p>'.$user->getUsr_firstname().'</p>');
printf('<p>'.$user->getUsr_birthdate().'</p>');
printf('<p>'.$user->getUsr_email().'</p>');
printf('<p>'.$user->getUsr_phone().'</p>');
printf('<p>'.$user->getUsr_password().'</p>');
?>
<a href="#">Ajouter une adresse</a>

<article class="">
  <?php $crsMgmt = new CourseManager($db); $crsMgmt->listCourse(); ?>
</article>
