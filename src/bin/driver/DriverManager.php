<?php
require_once ('driver.php');
  /**
   *
   */
  class DriverManager extends UserManager
  {
    private $_db;
    function __construct(PDO $db)
    {
      $this->_db = $db;
    }

    public function getDriver($Usr_id)
    {
      $q = $this->_db->prepare("SELECT u.usr_id, u.usr_name, u.usr_firstname, u.usr_firstname, u.usr_birthdate, u.usr_phone, u.usr_email, d.drv_id, d.drv_hiring_date, d.drv_licence_date FROM driver d INNER JOIN user u ON d.usr_id = u.usr_id WHERE d.usr_id = '$Usr_id'");
      $q->execute();
      $aData = $q->fetch(PDO::FETCH_ASSOC);
      if (empty($aData)) {
        return NULL;
      }else {
        $driver = new Driver($aData);
        return $driver;
      }
    }

    public function atributeCar($car_id){
      // TODO: attribue une voiture au chauffeur courant
      $q= $this->_db->prepare("INSERT INTO assign(assign_start_date, id_vehicule, drv_id) VALUES (date(now()),'$car_id','$this->usr_id')");
      $q->execute();
    }

    public function getCourses($Driver_id){
      $q = $this->_db->prepare("SELECT c.crs_id, c.crs_date, u.usr_name, u.usr_firstname, adr1.adr_city_lib depart, adr2.adr_city_lib arrivee FROM course c INNER JOIN driver d ON c.drv_id = d.drv_id INNER JOIN user u ON c.usr_id = u.usr_id LEFT JOIN adress adr1 on c.start_adr_id = adr1.adr_id LEFT JOIN adress adr2 ON c.end_adr_id = adr2.adr_id WHERE c.drv_id = '$Driver_id'");
      $q->execute();
      $courseArray = $q->fetchAll(PDO::FETCH_ASSOC);
      return $courseArray;
    }

    public function getVehicules($Driver_id)
    {
      $q = $this->_db->prepare("SELECT v.id_vehicule, v.immatriculation, v.marque, v.modele, a.assign_start_date, a.assign_end_date FROM assign a INNER JOIN vehicule v ON a.id_vehicule = v.id_vehicule JOIN driver d on a.drv_id = d.drv_id WHERE d.drv_id = '$Driver_id' ");
      $q->execute();
      $aVehicule = $q->fetchAll(PDO::FETCH_ASSOC);
      return $aVehicule;
    }

    public function getClients($Driver_id)
    {
      $q = $this->_db->prepare("SELECT u.usr_name, u.usr_firstname, c.crs_date FROM user u INNER JOIN course c ON u.usr_id = c.usr_id WHERE c.drv_id = '$Driver_id' ORDER BY c.crs_date ");
      $q->execute();
      $aCourses = $q->fetchAll(PDO::FETCH_ASSOC);
      return $aCourses;
    }
  }

 ?>
