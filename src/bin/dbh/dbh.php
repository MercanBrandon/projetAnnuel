<?php
/**
 *
 */
class dbh
{

  function __construct()
  {
    $dsn = 'mysql:dbname=dbtransportme;host=127.0.0.1';
    $user = 'root';
    $password = '';

    $dbh = new PDO($dsn, $user, $password);
    return $dbh ;
  }
}

 ?>
