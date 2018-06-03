<?php session_start();
require_once '_header.php';
require_once 'bin/user/UserManager.php';
$user = unserialize($_SESSION['user']);
 ?>
<div class="container-fluid"style="max-width:920px;">
  <form class="form-connect" action="bin/connexion.php" method="post">
    <h3>Modifier mon profil</h3>
    <p><input name="usr_email" class="form-control" type="mail" id="mail" value="<?php printf($user->getUsr_email());?>" /></p>

    <p><input name="usr_email_confirm" class="form-control" type="mail" id="mail_confirm" value="Confirmez votre e-mail" /></p>

    <p><input name="usr_name" class="form-control" type="text" id="nom" value="<?php printf($user->getUsr_name());?>"/></p>

    <p><input name="usr_firstname" class="form-control" type="text" id="prenom" value="<?php printf($user->getUsr_firstname());?>" /></p>

    <p><input name="usr_birthdate" class="form-control" type="date" id="naiss" value="<?php printf($user->getUsr_birthdate());?>" /></p>

    <p><input name="usr_phone" class="form-control bfh-phone" type="text" id="phone" value="<?php printf($user->getUsr_phone());?>" /></p>

    <p><input class="form-control" type="password" name="usr_password" id="password"  placeholder="Entrez votre Password" /></p>

    <p><input class="form-control" type="password" name="usr_password_confirm" id="password_confirm" placeholder="Confirmez votre Password"/></p>

    <input class="btn btn-success" type="submit" value="Confirmez"/>
    <input class="btn btn-danger" type="submit" value="Annuler"/>
  </form>
</div>
