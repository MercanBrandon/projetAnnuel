<?php
/**
 *
 */
 require_once '../_config.php';

class Test
{
  //public $dsn = 'mysql:dbname=dbtme;host=127.0.0.1';
  //public $user = 'root';
  //public $password = '';
  //$dbh = new PDO($dsn, $user, $password);

  public $id;
  public $AttrA;
  public $AttrB;
  public $AttrC;

  function __construct()
  {
    // code...
  }

  public static function getTest($dbh){
    $stmt = $dbh->prepare("SELECT * FROM Test");
    $stmt->execute();

    $r = $stmt->fetchAll(PDO::FETCH_CLASS, __CLASS__);
    return json_encode($r);
  }
}


$test = new Test;
$a = $test->getTest($dbh);
echo $a;

 ?>
