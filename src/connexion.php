<?php require('_header.php'); ?>
<div class="container">
  <article class="connect">
        <form class="form-connect" action="index.html" method="post">
            <h2>Connexion</h2>
            <p><input type="text" name="mail" value="" placeholder="e-mail"></p>
            <p><input type="password" name="password" value="" placeholder="password"></p>
            <p> <a href="#" onclick="inscription()">Creer son compte</a> <input type="submit" name="submit" value="Se Connecter"></p>
        </form>
        <div id="form-inscription">
          <form class="form-connect" action="index.html" method="post">
            <h2>Inscription</h2>
            <!-- <p>
              <select name="types" id="type">
                <option value="votre-type">Choisissez votre status</option>
                <option value="Chauffeur">Chauffeur</option>
                <option value="Consomateur">Consomateur</option>
              </select>
            </p> -->
            <p><input name="mail" type="text" id="mail" placeholder="Entrez votre Email" /></p>

            <p><input name="nom" type="text" id="nom" placeholder="Entrez votre Nom"/></p>

            <p><input name="prenom" type="text" id="prenom" placeholder="Entrez votre Prenom" /></p>

            <p><input name="age" type="text" id="age" placeholder="Entrez votre Age" /></p>

            <p><input type="password" name="password" id="password"  placeholder="Entrez votre Password" /></p>

            <p><input type="password" name="Cpassword" id="Cpassword" placeholder="Confirmez votre Password"/></p>

            <input type="submit" value="Confirmez"/>
          </form>
        </div>

        </article>
</div>


<!-- <?php require('bloc-chauffeur.php'); ?>
<?php require('bloc-client.php'); ?>
<?php require('footer.php'); ?> -->
</body>
</html>

<script type="text/javascript">
function inscription() {
  var div = document.getElementById('form-inscription');
  div.style.display = div.style.display === 'none' ? '' : 'none';
}
</script>
