<?php
/**
 *
 */
class Adress
{
  private $adr_id;
  private $adr_libelle;
  private $adr_ligne1;
  private $adr_ligne2;
  private $adr_PC;
  private $adr_city_lib;

function __construct(array $donnees){
    $this->hydrate($donnees);
  }

  public function hydrate(array $donnees){
    foreach ($donnees as $key => $value) {
      $method = 'set'.ucfirst($key);
      if (method_exists($this, $method)) {
        $this->$method($value);
      }
    }
  }

  public function getAdr_id(){return $this->adr_id;}
  public function getAdr_libelle(){return $this->adr_libelle;}
  public function getAdr_ligne1(){return $this->adr_ligne1;}
  public function getAdr_ligne2(){return $this->adr_ligne2;}
  public function getAdr_PC(){return $this->adr_PC;}
  public function getAdr_city_lib(){return $this->adr_city_lib;}

  public function setAdr_id($id){$this->adr_id = $id;}
  public function setAdr_libelle($lib){$this->adr_libelle = $lib;}
  public function setAdr_ligne1($ligne1){$this->adr_ligne1 = $ligne1;}
  public function setAdr_ligne2($ligne2){$this->adr_ligne2 = $ligne2;}
  public function setAdr_PC($PC){$this->adr_PC = $PC;}
  public function setAdr_city_lib($city){$this->adr_city_lib = $city;}

}

 ?>
