<?php
require_once 'UserManager.php';
  /**
   *
   */
  class DriverManager extends UserManager
  {

    function __construct(PDO $db)
    {
      parent::__construct($db);
    }

    public function atributeCar($car_id){
      // TODO: attribue une voiture au chauffeur courant
      $q= $this->_db->prepare("INSERT INTO assign(assign_start_date, id_vehicule, drv_id) VALUES (date(now()),'$car_id','$this->usr_id')");
      $q->execute();
    }
  }

 ?>
