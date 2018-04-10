<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="asset/css/style.css">
    <link href="https://fonts.googleapis.com/css?family=Lato|Roboto|Roboto+Condensed" rel="stylesheet">
<title>TransportMe</title>
</head>
<body id="index"> 
<?php require('header.php'); ?>
<div class="bloc-co">
        <form class="formCo" action="index.html" method="post">
            <h2>Connexion</h2>
            <p><input type="text" name="mail" value="" placeholder="e-mail"></p>
            <p><input type="password" name="password" value="" placeholder="password"></p>
            <p><input type="submit" name="submit" value="Se Connecter"></p>
        </form>
</div>
<?php require('bloc-chauffeur.php'); ?>
<?php require('bloc-client.php'); ?>
<?php require('footer.php'); ?>
</body>
</html>           
