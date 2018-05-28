<?php
require_once 'User.php';
/**
 *
 */
class UserManager
{
  private $_db;

  function __construct($db)
  {
    $this->setDb($db);
  }

  public function addUser(User $user){
    $q = $this->_db->prepare('INSERT INTO user(usr_name, usr_firstname, usr_birthdate, usr_phone, usr_email, usr_password) VALUES (:name, :firstname, :birthdate, :phone, :email, :password)');

    $q->bindvalue(':name', $user->getUsr_name());
    $q->bindvalue(':firstname', $user->getUsr_firstname());
    $q->bindvalue(':birthdate', $user->getUsr_birthdate());
    $q->bindvalue(':phone', $user->getUsr_phone());
    $q->bindvalue(':email', $user->getUsr_email());
    $q->bindvalue(':password', $user->getUsr_password());

    $q->execute();
  }

  public function deleteUser(User $user){
    // TODO:
  }

  public function getUser($email, $password)
  {
  $q = $this->_db->prepare("SELECT usr_id, usr_name, usr_firstname, usr_birthdate, usr_phone, usr_email FROM user where usr_email = '$email' AND usr_password = '$password'");
  $q->execute();
  $donnees = $q->fetch(PDO::FETCH_ASSOC);
  if (empty($donnees)) {
    return NULL;
  }
  else {
    $user = new User($donnees);
    return $user;
  }
  }

  public function getUserList()
  {
    $q = $this->_db->prepare("SELECT * FROM user");
    $q->execute();
    $userArray = $q->fetch(PDO::FETCH_ASSOC);
    return $userArray;
  }

  public function updateUser(User $user)
  {
    // code...
  }

  public function setDb(PDO $db)
  {
    $this->_db = $db;
  }
}

?>
