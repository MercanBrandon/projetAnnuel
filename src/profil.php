<?php session_start();
require_once '_header.php';
require_once 'bin/user/User.php';
require_once 'bin/course/CourseManager.php';
require_once 'bin/adress/AdressManager.php';

$user = unserialize($_SESSION['user']);
$db = new PDO('mysql:dbname=dbtme;host=127.0.0.1','root','');
$crsMgmt = new CourseManager($db);
$adrMgmt = new AdressManager($db);
?>

<div class="container-fluid">
  <div class="">
    <?php
    printf('<p>'.$user->getUsr_name().'<br/>');
    printf($user->getUsr_firstname().'<br/>');
    printf($user->getUsr_birthdate().'<br/>');
    printf($user->getUsr_email().'<br/>');
    printf($user->getUsr_phone().'<br/>');
    printf($user->getUsr_password().'</p>');
    ?>
  </article>
  <article class="">
    <table>
      <thead><th>N° Course</th><th>Date Course</th>
      <?php
      $aCourse = $crsMgmt->listCourseByUserID($user->getUsr_id());
      foreach ($aCourse as $key => $value) {
        $objCourse = new Course($value);
        printf('<tr><td>'.$objCourse->getCrs_id().'</td><td>'.$objCourse->getCrs_date().'</td></tr>');
      }
      ?>
    </table>
  </article>
  <article class="">
    <?php
      $aAdress = $adrMgmt->adrLisByUsrID($user->getUsr_id());

      foreach ($aAdress as $key => $value) {
        $objAdress = new Adress($value);
        $adrMgmt->showAdress($objAdress);
      }

     ?>
  <a href="alterProfil.php">modifier mon profil</a>
  </article>
</div>
