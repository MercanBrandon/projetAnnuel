<?php
/**
 * Created by PhpStorm.
 * User: arino
 * Date: 20/10/2018
 * Time: 14:49
 */

/*
si tous se passe bien il va retourner un id qui va correspondre a l'id temporaire de la course 
on en a besoin pour la derneire api qui regarde si la reponse a ete valider

*/

require_once ('../bin/temp/TempManager.php');
require_once ('../bin/course/course.php');
require_once 'connect.php';


if(isset($_GET['crs_date'])&&isset($_GET['usr_id'])&&isset($_GET['start_adr_id'])&&isset($_GET['end_adr_id'])&&$_GET['drivers'])
{
    $course = new Course(array('crs_date'=>$_GET['crs_date'],'usr_id'=>$_GET['usr_id'],'start_adr_id'=>$_GET['start_adr_id'],'end_adr_id'=>$_GET['end_adr_id']));
    $tm = new  TempManager($db);
    header("Content-Type: application/json");
    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Methods: POST, GET");
    $result = $tm->setCourseTmp($course, $_GET['drivers']);
    echo json_encode($result);
}
else{
    header("Content-Type: application/json");
    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Methods: POST, GET");
    echo json_encode(false);
}
