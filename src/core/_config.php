$dsn = 'mysql:dbname=dbtransportme;host=127.0.0.1';
$user = 'root';
$password = '';

try {
    $dbh = new PDO($dsn, $user, $password);
} catch (PDOException $e) {
    echo 'Connexion échouée : ' . $e->getMessage();
}

 if (!isset($_SESSION)) {
   if (empty($_SESSION)) {
     header('Location: http://127.0.0.1/edsa-TrandportMe/src/connect.php');
   }
 }
