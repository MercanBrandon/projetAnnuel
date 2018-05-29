<?php
require_once 'Course.php';
/**
 *
 */
class CourseManager
{
  private $_db;

  function __construct($db)
  {
    $this->setDb($db);
  }

  public function createCourse(Course $course)
  {
    $q = $this->_db->prepare('INSERT INTO  course(drv_id, usr_id, start_adr_id, end_adr_id) VALUES (:drv_id, :usr_id, :start_adr_id, :end_adr_id)');

    $q->bindvalue('drv_id', $course->getDrv_id());
    $q->bindvalue('usr_id', $course->getUsr_id());
    $q->bindvalue('start_adr_id', $course->getStart_adr_id());
    $q->bindvalue('end_adr_id', $course->getEnd_adr_id());

    $q->execute();
  }

  public function getCourseById($crs_id)
  {
    $q = $this->_db->prepare("SELECT * FROM course where crs_id = '$crs_id'");
    $q->execute();
    $donnees = $q->fetch(PDO::FETCH_ASSOC);
    if (empty($donnees)) {
      return NULL;
    }
    else {
      $course = new Course($donnees);
      return $course;
    }
  }

  public function listCourse()
  {
    $q = $this->_db->prepare('SELECT * FROM course');
    $q->execute();
    $courseArray = $q->fetch(PDO::FETCH_ASSOC);
    return $courseArray;
  }

  public function update()
  {
    // code...
  }
  public function setDb(PDO $db)
  {
    $this->_db = $db;
  }
}

 ?>
