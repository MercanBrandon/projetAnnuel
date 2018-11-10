<!DOCTYPE html>
<?php
require_once 'bin/user/UserManager.php';
require_once 'bin/driver/DriverManager.php';
if (!isset($_SESSION['user'])) {
  $_SESSION['user'] = NULL;
}
$user = unserialize($_SESSION['user']);
if ($user === NULL) {
header('Location: /edsa-TME/connect.php');
}
$userManager = new UserManager($db);
$driverManager = new DriverManager($db);
//$driver = $driverManager->getDriver($user->getUsr_id());

?>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.js"></script>

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>




    <link rel="stylesheet" href="public/css/style.css">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <link href="https://fonts.googleapis.com/css?family=Lato|Roboto|Roboto+Condensed" rel="stylesheet">

    <script type="text/javascript" src="public/js/recherche.js"> </script>

    <title>TransportMe</title>
  </head>
  <body id="index">
    <header class="main">
      <?php 
      if ($user) {
      ?>
      <div class="menu">
       <!-- <nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #030d0f;">
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
            <a class="navbar-brand" href="#">
              <?php echo '<h1>Salut '.$user->getUsr_firstname().'</h1>'; ?>
            </a>
            <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
              <li class="nav-item active">
                <a class="nav-link" href="profil.php">Mon profil<span class="sr-only">(current)</span></a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="deconnexion.php">Déconnexion</a>
              </li>
            </ul>

          </div>
      </nav>-->
      <nav class="menu-desk">
        <ul>
            <li> <?php echo '<span>Salut '.$user->getUsr_firstname().'</span>'; ?></li>
            <li><a href="profil.php">Mon profil</a></li>
            <li><a href="deconnexion.php">Déconnexion</a></li>
        </ul>
      </nav>
      </div>

      <?php 
      }
      ?>
      <img src="public/img/LogoWhite.png" alt="Logo" class= "logo">
      <!-- <h1>L'application socialement responsable</h1> -->
    </header>

  <?php
  include_once('api/connect.php');
  //$db = new PDO('mysql:dbname=dbtme;host=127.0.0.1','root','');
  //$db = new PDO('mysql:dbname=db643371261;host=db643371261.db.1and1.com','dbo643371261','Thom@s971');
  ?>
