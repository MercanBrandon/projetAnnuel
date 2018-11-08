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
  protected $drv_position_x;
  protected $drv_position_y;
  protected $usr_id;

  // protected $usr_id;
// function __construct(array $donnees){
//   $this->hydrate($donnees);
// }
  function getDrv_id(){return $this->drv_id;}
  function getDrv_hiring_date(){return $this->drv_hiring_date;}
  function getDrv_licence_date(){return $this->drv_licence_date;}
  function getDrv_status(){return $this->drv_status;}
  function getDrv_position_x(){return $this->drv_position_x;}
  function getDrv_position_y(){return $this->drv_position_y;}
  function getUsr_id(){return $this->usr_id;}


  function setDrv_id($Drv_id){$this->Drv_id = $Drv_id;}
  function setDrv_hiring_date($Drv_hiring_date){$this->Drv_hiring_date = $Drv_hiring_date;}
  function setDrv_licence_date($Drv_licence_date){$this->Drv_licence_date = $Drv_licence_date;}
  function setDrv_status($drv_status){$this->drv_status = $drv_status;}
  function setDrv_position_x($drv_position_x){$this->drv_position_x = $drv_position_x;}
  function setDrv_position_y($drv_position_y){$this->drv_position_y = $drv_position_y;}
  function setUsr_id($Usr_id){$this->Usr_id = $Usr_id;}

  /*function getHiringDate(){
    // TODO: si la date d'embauche n'est pas définie, la définir, sinon, modifier
  }*/

  /*public function getUsr_id()
  {
    $usr_id = parent::getUsr_id();
    return $usr_id;
  }*/

}

 ?>
