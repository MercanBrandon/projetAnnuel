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
      $q = $this->_db->prepare("SELECT d.drv_id, d.drv_hiring_date, d.drv_licence_date, d.usr_id, u.usr_name, u.usr_firstname, u.usr_birthdate, u.usr_phone, u.usr_email FROM driver d JOIN user u on d.usr_id = u.usr_id WHERE d.usr_id = '$Usr_id'");
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

    
    public function selectCoursesByDriver($Driver_id){
      $q = $this->_db->prepare("SELECT * FROM course c WHERE c.drv_id = '1'");
      $q->execute();
      $courseArray = $q->fetchAll(PDO::FETCH_ASSOC);
      return $courseArray;
    }

  }

 ?>
