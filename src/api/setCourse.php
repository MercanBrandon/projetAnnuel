<?php
/**
 * Created by PhpStorm.
 * User: arino
 * Date: 08/10/2018
 * Time: 20:36
 */



require_once ('../bin/course/CourseManager.php');
require_once ('../bin/course/course.php');
require_once 'connect.php';

if(isset($_GET['crs_id'])&&isset($_GET['crs_date'])&&isset($_GET['drv_id'])&&isset($_GET['usr_id'])&&isset($_GET['start_adr_id'])&&isset($_GET['end_adr_id']))
{
    $course = new Course(array('crs_id'=>$_GET['crs_id'],'crs_date'=>$_GET['crs_date'],'drv_id'=>$_GET['drv_id'],'usr_id'=>$_GET['usr_id'],'start_adr_id'=>$_GET['start_adr_id'],'end_adr_id'=>$_GET['end_adr_id']));
    $courseM = new CourseManager($db);
    header("Content-Type: application/json");
    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Methods: POST, GET");
    $courseM->createCourse($course);
    echo json_encode(true);
}
else{
    header("Content-Type: application/json");
    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Methods: POST, GET");
    echo json_encode(false);
}
