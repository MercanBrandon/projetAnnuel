<?php include_once '_header.php';
$title = 'TransportMe';
?>

<div class="container">
  <article class="connect">
  <center><h2 style="color:white;">Inscription</h2></center>
  <form class="form-connect" action="bin/connexion.php" method="post">
    <p><input name="usr_email" class="form-control" type="mail" id="mail" placeholder="Entrez votre Email" /></p>

    <p><input name="usr_email_confirm" class="form-control" type="mail" id="mail_confirm" placeholder="Confirmez votre e-mail" /></p>

    <p><input name="usr_name" class="form-control" type="text" id="nom" placeholder="Entrez votre Nom"/></p>

    <p><input name="usr_firstname" class="form-control" type="text" id="prenom" placeholder="Entrez votre Prenom" /></p>

    <p><input name="usr_birthdate" class="form-control" type="date" id="naiss" placeholder="Entrez votre Age" /></p>

    <p><input name="usr_phone" class="form-control bfh-phone" type="text" id="phone" placeholder="phone number" /></p>

    <p><input class="form-control" type="password" name="usr_password" id="password"  placeholder="Entrez votre Password" /></p>

    <p><input class="form-control" type="password" name="usr_password_confirm" id="password_confirm" placeholder="Confirmez votre Password"/></p>

    <input class="btn btn-dark" type="submit" value="Confirmez"/>
  </form>
</article>
</div>
