<?php
//
/**
 *
 */


class User
{
  protected $id_usr;
  protected $name;
  protected $firstname;
  protected $birthdate;
  protected $phonenumber;
  protected $email;
  protected $dsn = 'mysql:dbname=dbtransportme;host=127.0.0.1';
  protected $dbuser = 'root';
  protected $dbpassword = '';
  protected $dbh;


  function __construct(PDO $dbh, $email, $sPassword)
  {
    $stmt = $dbh->prepare("SELECT id_personne, nom_personne, prenom_personne, date_naissance, tel_personne, email_personne  FROM personne WHERE email_personne = '$email' AND password = '$sPassword'");
    $stmt ->execute();
    $object = $stmt->fetchObject();

    $this->id_usr = $object->id_personne;
    $this->name = $object->nom_personne;
    $this->firstname = $object->prenom_personne;
    $this->birthdate = $object->date_naissance;
    $this->phonenumber = $object->tel_personne;
    $this->email = $object->email_personne;
    $this->dbh = $dbh;

    }

  public function getName(){
    return $this->name;
  }

  public function password($password, $newPassword){
    // TODO: si le $password est le bon, le remplacer par $newPassword
  }

  public function addUser($name, $firstname, $birthdate, $phonenumber, $email, $password){
      $sql = "INSERT INTO personne(nom_personne, prenom_personne, date_naissance, tel_personne, email_personne, password) VALUES ('$name', '$firstname', '$birthdate', '$phonenumber', '$email', '$password')";
      $this->dbh->query($sql);
  }

  public function addAdress($lib_adresse, $ligne1_adresse, $ligne2_adresse, $CP_adresse, $lib_ville){
    $sql = "INSERT INTO `adresse`(`id_personne`, `lib_adresse`, `ligne1_adresse`, `ligne2_adresse`, `CP_adresse`, `lib_ville`) VALUES ('$this->id_usr', '$lib_adresse','$ligne1_adresse','$ligne2_adresse','$CP_adresse','$lib_ville')";
    $this->dbh->query($sql);
  }

  // function alter
}

 ?>
