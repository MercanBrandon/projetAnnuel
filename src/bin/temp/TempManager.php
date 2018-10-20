<?php
/**
 * Created by PhpStorm.
 * User: arino
 * Date: 20/10/2018
 * Time: 12:17
 */

require_once 'bin/temp/temp1.php';
require_once 'bin/temp/temp2.php';
require_once 'bin/course/Course.php';

class TempManager
{
    private $_db;

    function __construct($db)
    {
        $this->setDb($db);
    }

    public function setDb(PDO $db)
    {
        $this->_db = $db;
    }


    //setCourseTmp met en bdd dans table temp1 un json correspondant au log de la course pas encore cree et en temp2 tout les chaufeurs proposer pour la course avec un stut initial false correspondant a une absense de reponse
    //$driver est un tableaux des ids de chauffeurs qui sont eligible a pratiquer cette course.
    public function setCourseTmp(Course $course, $drivers)
    {
        $jsonCourse = null;
        $jsonCourse['id'] = $course->getCrs_id();
        $jsonCourse['date'] = $course->getCrs_date();
        $jsonCourse['user_id'] = $course->getUsr_id();
        $jsonCourse['end_adr_id'] = $course->getEnd_adr_id();
        $jsonCourse['start_adr_id'] = $course->getStart_adr_id();

        $tmp_course = json_encode($jsonCourse);


        $q = $this->_db->prepare('INSERT INTO  temp1(course) VALUES (:tmp_course)');

        $q->bindvalue('tmp_course', $tmp_course);

        $q->execute();
        $id = $this->_db->lastInsertId();
        foreach ($drivers as $driver)
        {
            $q=null;

            $q = $this->_db->prepare('INSERT INTO  temp2(temp1_id, driver_id, status ) VALUES (:tmp_id, :driver_id, :status)');

            $q->bindvalue('tmp_id', $course->getCrs_id());
            $q->bindvalue('driver_id', $driver);
            $q->bindvalue('status', false);

            $q->execute();

        }
        return $id;
    }

    public function getDriverCourseIfExist($driver_id)
    {
        $q = $this->_db->prepare("SELECT t1.*  FROM temp1 t1 INNER JOIN temp2 t2 on t2.temp1_id = t1.temp1_id WHERE t2.driver_id = '$driver_id'");
        $q->execute();
        $aData = $q->fetch(PDO::FETCH_ASSOC);
        if (empty($aData)) {
            return NULL;
        }else {

            return $aData;
        }
    }

    public function accepteCourse($driver_id, $temp1_id)
    {
        $q = $this->_db->prepare("SELECT * FROM t2 WHERE temp1_id='.$temp1_id.'");
        $q->execute();
        $d = $q->fetch(PDO::FETCH_ASSOC);
        if (empty($d)) {
            $q2 = $this->_db->prepare("UPDATE t2 SET status =:status WHERE temp1_id=:temp1_id AND driver_id =:driver_id");
            $q2->bindvalue('status', true);
            $q2->bindvalue('temp1_id', $temp1_id);
            $q2->bindvalue('driver_id', $driver_id);
            $q2->execute();
            return true;
        }else {

            return NULL;
        }
    }

    public function refusCourse($driver_id, $temp1_id)
    {
        $q2 = $this->_db->prepare("DELETE FROM t2  WHERE temp1_id=:temp1_id AND driver_id =:driver_id");
        $q2->bindvalue('temp1_id', $temp1_id);
        $q2->bindvalue('driver_id', $driver_id);
        $q2->execute();
        return true;
    }

    public function checkReponseDriver($temp1_id)
    {
        $q = $this->_db->prepare("SELECT * FROM t2 WHERE temp1_id=:temp1_id AND status=:status");
        $q->bindvalue('temp1_id', $temp1_id);
        $q->bindvalue('status', true);
        $q->execute();
        $d = $q->fetch(PDO::FETCH_ASSOC);
        if (empty($d)) {
            $q2 = $this->_db->prepare("SELECT * FROM t1 WHERE temp1_id=:temp1_id");
            $q2->bindvalue('temp1_id', $temp1_id);
            $q2->execute();
            $d3 = $q2->fetch(PDO::FETCH_ASSOC);
            if (empty($d3)) {
                return NULL;
            }
            else
            {
                return true;
            }
        }else {
            $data['driver'] = $d;
            $q2 = $this->_db->prepare("SELECT * FROM t1 WHERE temp1_id=:temp1_id");
            $q2->bindvalue('temp1_id', $temp1_id);
            $q2->execute();
            $d2 = $q2->fetch(PDO::FETCH_ASSOC);
            $data['course'] = $d2;
            $q3 = $this->_db->prepare("DELETE FROM t2  WHERE temp1_id=:temp1_id");
            $q3->bindvalue('temp1_id', $temp1_id);
            $q3->execute();
            $q4 = $this->_db->prepare("DELETE FROM t1  WHERE temp1_id=:temp1_id");
            $q4->bindvalue('temp1_id', $temp1_id);
            $q4->execute();
            return $data;
        }
    }

}