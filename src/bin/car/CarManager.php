<?php
require_once 'Car.php';
/**
 *
 */
class CarManager
{
  $_db;

  function __construct(PDO $db)
  {
    $this->setDb($db);
  }

  function addCar(Car $car)
    $q = $this->_db->prepare('INSERT INTO car(car_immat, car_brand, car_model) VALUES (:immat, :brand, :model)');

    $q->bindvalue(':immat', $car->getCar_immat());
    $q->bindvalue(':brand', $car->getCar_brand());
    $q->bindvalue(':model', $car->getCar_model());

    $q->execute();
  }

  function getCarById($id){
    $q = $this->_db->prepare("SELECT car_id, car_immat, car_brand, car_model FROM car WHERE car_id = '$id'");
    $q->execute();
    $donnees = $q->fetch(PDO::FETCH_ASSOC);
    $car = new Car($donnees);
    return $car;
  }

  function carList(){
    $q = $this->_db->prepare("SELECT * FROM car");
    $q->execute();
    $carArray = $q->fetch(PDO::FETCH_ASSOC);
    return $carArray;
  }

  function attributeCar($driverID){
    // TODO:
  }


}

 ?>
