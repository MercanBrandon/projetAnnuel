<?php
require_once 'user.php';
/**
 *
 */
class Driver extends User
{
  private $hiringDate;

  function __construct($dbh, $mail, $password)
  {
    parent::__construct($dbh, $mail, $password);
  }

  public function HiringDate(){
    // TODO: si la date d'embauche n'est pas définie, la définir, sinon, modifier 
  }

  public function atributeCar(){
    // TODO: attribue une voiture au chauffeur courant
  }

  public function selectCourses(){
    // TODO: recuperer la liste de course attribuer au chauffeur en cours
  }




}

 ?>
