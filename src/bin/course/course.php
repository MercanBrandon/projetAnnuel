<?php
/**
 *
 */
class Course
{
  private $crs_id;
  private $crs_date;
  private $drv_id;
  private $usr_id;
  private $start_adr_id;
  private $end_adr_id;

  function __construct(array $donnees){
    $this->hydrate($donnees);
  }

  public function hydrate(array $donnees)
  {
    foreach ($donnees as $key => $value) {
      $method = 'set'.ucfirst($key);
      if(method_exists($this, $method)){
        $this->$method($value);
      }
    }
  }

  public function getCrs_id(){return $this->crs_id;}
  public function getCrs_date(){return $this->crs_date;}
  public function getDrv_id(){return $this->drv_id;}
  public function getUsr_id(){return $this->usr_id;}
  public function getStart_adr_id(){return $this->start_adr_id;}
  public function getEnd_adr_id(){return $this->end_adr_id;}

  public function setCrs_id($crs_id){$this->crs_id = $crs_id;}
  public function setCrs_date($crs_date){$this->crs_date = $crs_date;}
  public function setDrv_id($drv_id){$this->drv_id = $drv_id;}
  public function setUsr_id($usr_id){$this->usr_id = $usr_id;}
  public function setStart_adr_id($start_adr_id){$this->start_adr_id = $start_adr_id;}
  public function setEnd_adr_id($end_adr_id){$this->end_adr_id = $end_adr_id;}
}



 ?>
