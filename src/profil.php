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
  <div class="page-header">
    <a class="btn btn-dark" href="index.php">Home</a>
    <?php
    printf('<p>'.$user->getUsr_name().'<br/>');
    printf($user->getUsr_firstname().'<br/>');
    printf($user->getUsr_birthdate().'<br/>');
    printf($user->getUsr_email().'<br/>');
    printf($user->getUsr_phone().'<br/>');
    printf($user->getUsr_password().'</p>');
    ?>
  </div>
  <article class="">
    <table class="table table-dark">
      <thead><th>N° Course</th><th>Date Course</th><th>Start Adress</th><th>End Adress</th>
      <?php
      $aCourse = $crsMgmt->listCourseByUserID($user->getUsr_id());
      for ($i=0; $i < sizeof($aCourse) ; $i++) {
        $objCourse = new Course($aCourse[$i]);
        var_dump($objCourse);
        printf('<tr><td><a href="course.php">'.$objCourse->getCrs_id().'</a></td><td>'.$objCourse->getCrs_date()/*.'</td><td>'.$adrMgmt->showAdressByID($objCourse->getStart_adr_id())*/.'</td></tr>');
      }
      // foreach ($aCourse as $key => $value) {
      //   $objCourse = new Course($value);
      //   var_dump($objCourse);
      //   printf('<tr><td><a href="course.php">'.$objCourse->getCrs_id().'</a></td><td>'.$objCourse->getCrs_date().'</td><td>'/*.$adrMgmt->showAdressByID($objCourse->getStart_adr_id())*/.'</td></tr>');
      //   // printf($adrMgmt->showAdressByID($objCourse->getStart_adr_id()));
      // }
      ?>

    </table>
  </article>
  <article class="">
    <?php
      $aAdress = $adrMgmt->adrLisByUsrID($user->getUsr_id());
      printf('<ul class="list-group">');
      foreach ($aAdress as $key => $value) {
        $objAdress = new Adress($value);
          printf('<li class="list-group-item">');
          $adrMgmt->showAdress($objAdress);
          printf('</li>');
      }
      printf('</ul>');


     ?>
  <a href="alterProfil.php">modifier mon profil</a>
  </article>

  <script src="_map.js"></script>
</div>
