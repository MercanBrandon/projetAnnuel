<?php
//
/**
 *
 */


class User
{
  private $id;
  private $name;
  private $firstname;
  private $birthdate;
  private $phonenumber;
  private $email;


  function __construct($email, $sPassword)
  {
    $dsn = 'mysql:dbname=dbtransportme;host=127.0.0.1';
    $user = 'root';
    $password = '';

    $dbh = new PDO($dsn, $user, $password);
    $stmt = $dbh->prepare("SELECT id_personne, nom_personne, prenom_personne, date_naissance, tel_personne, email_personne  FROM personne WHERE email_personne = '$email' AND password = '$sPassword'");
    $stmt ->execute();
    $object = $stmt->fetchObject();

    $this->id = $object->id_personne;
    $this->name = $object->nom_personne;
    $this->firstname = $object->prenom_personne;
    $this->birthdate = $object->date_naissance;
    $this->phonenumber = $object->tel_personne;
    $this->email = $object->email_personne;
  }

  public function getName(){
    return $this->name;
  }

  // function alter
}

 ?>
