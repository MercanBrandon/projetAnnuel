<?php
/**
 * Created by PhpStorm.
 * User: arino
 * Date: 20/10/2018
 * Time: 18:02
 */


require_once ('../bin/temp/TempManager.php');
require_once 'connect.php';


if($_GET['temp1_id'])
{
    $tm = new  TempManager($db);
    header("Content-Type: application/json");
    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Methods: POST, GET");
    $response = $tm->checkReponseDriver($_GET['temp1_id']);
    echo json_encode($response);
}
else{
    header("Content-Type: application/json");
    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Methods: POST, GET");
    echo json_encode(false);
}
