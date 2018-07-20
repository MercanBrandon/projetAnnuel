<?php
require_once 'User.php';
/**
 *
 */
class Driver extends User
{
  private $drv_id;
  private $drv_hiring_date;
  private $drv_licence_date;
  private $usr_id;


  function __construct(array $donnees)
  {
    $this->hydrate($donnees);
    parent::__construct($donnees);
  }

  function getDrv_id(){return $this->drv_id;}
  function getDrv_hiring_date(){return $this->drv_hiring_date;}
  function getDrv_licence_date(){return $this->drv_licence_date;}
  function getUsr_id(){return $this->usr_id;}

  function setDrv_id($Drv_id){$this->Drv_id = $Drv_id;}
  function setDrv_hiring_date($Drv_hiring_date){$this->Drv_hiring_date = $Drv_hiring_date;}
  function setDrv_licence_date($Drv_licence_date){$this->Drv_licence_date = $Drv_licence_date;}
  function setUsr_id($Usr_id){$this->Usr_id = $Usr_id;}


  public function getHiringDate(){
    // TODO: si la date d'embauche n'est pas définie, la définir, sinon, modifier
  }
}

 ?>
