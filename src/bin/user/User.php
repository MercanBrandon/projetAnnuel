<?php
/**
 *
 */
 class User
{

  public function hydrate(array $donnees)
  {
    foreach ($donnees as $key => $value) {
      $method = 'set'.ucfirst($key);
        $this->$method($value);
      }
    }
  }

  public function getUsr_id(){return $this->usr_id;}
  public function getUsr_name(){return $this->usr_name;}
  public function getUsr_firstname(){return $this->usr_firstname;}
  public function getUsr_birthdate(){return $this->usr_birthdate;}
  public function getUsr_phone(){return $this->usr_phone;}
  public function getUsr_email(){return $this->usr_email;}
  public function getUsr_password(){return $this->usr_password;}


  public function setUsr_id($id){$this->usr_id = $id;}
  public function setUsr_name($name){$this->usr_name = $name;}
  public function setUsr_firstname($firstname){$this->usr_firstname = $firstname;}

  public function setUsr_birthdate($birthdate)
  {
    // TODO: vérification du format date
    $this->usr_birthdate = $birthdate;
  }

  public function setUsr_phone($phone)
  {
    // TODO: vérification du format (str de 10 caractères)
    $this->usr_phone = $phone;
  }

  public function setUsr_email($email)
  {
    // TODO: vérification du format email
    $this->usr_email = $email;
  }

  public function setUsr_password($password){$this->usr_password = $newPassword;}
}

 ?>
