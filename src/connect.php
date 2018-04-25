<?php include_once '_header.php';
$title = 'TransportMe';
?>
    <div class="container">
      <article class="connect">
        <form class="form-connect" action="bin/connexion.php" method="post">
          <p><input type="text" name="mail" value="" placeholder="e-mail"></p>
          <p><input type="password" name="password" value="" placeholder="password"></p>
          <p><input type="submit" name="submit" value="Se Connecter"></p>
        </form>

      </article>
      <aside class="">

      </aside>
    </div>


<?php include_once '_footer.php' ?>
