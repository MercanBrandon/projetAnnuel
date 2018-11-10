<?php
/**
 *
 */
require_once __DIR__.'/../user/UserManager.php';
require_once __DIR__.'/../../api/connect.php';

class Driver extends User
{
  protected $drv_id;
  protected $drv_hiring_date;
  protected $drv_licence_date;
  protected $drv_status;
  protected $usr_id;
  protected $drv_lat;
  protected $drv_lng;

  function __construct(array $donnees){
    foreach ($donnees as $property => $value) {
      if (property_exists(__CLASS__, $property)) {
        $this->$property = $value;
      }
    }
  }

  function getDrv_id(){return $this->drv_id;}
  function getDrv_hiring_date(){return $this->drv_hiring_date;}
  function getDrv_licence_date(){return $this->drv_licence_date;}
  function getDrv_status(){return $this->drv_status;}
  function getDrv_lat(){return $this->drv_lat;}
  function getDrv_lng(){return $this->drv_lng;}


  function setDrv_id($Drv_id){$this->Drv_id = $Drv_id;}
  function setDrv_hiring_date($Drv_hiring_date){$this->Drv_hiring_date = $Drv_hiring_date;}
  function setDrv_licence_date($Drv_licence_date){$this->Drv_licence_date = $Drv_licence_date;}
  function setDrv_status($drv_status){$this->drv_status = $drv_status;}
  function setUsr_id($Usr_id){$this->Usr_id = $Usr_id;}
  function setDrv_lat($drv_lat){$this->drv_lat = $drv_lat;}
  function setDrv_lng($drv_lng){$this->drv_lng = $drv_lng;}


  public function getUsr_id()
  {
    $usr_id = parent::getUsr_id();
    return $usr_id;
  }

}

 ?>
