<?php
/**
 *
 */
class Car
{
  private $car_id;
  private $car_immat;
  private $car_brand;
  private $car_model;

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

  public function getCar_id(){return $car_id;}
  public function getCar_immat(){return $car_immat;}
  public function getCar_brand(){return $car_brand;}
  public function getCar_model(){return $car_model;}

  public function setCar_id($car_id){$this->car_id = $car_id;}
  public function setCar_immat($car_immat){$this->car_immat = $car_immat;}
  public function setCar_brand($car_brand){$this->car_brand = $car_brand;}
  public function setCar_model($car_model){$this->car_model = $car_model;}

}

 ?>
