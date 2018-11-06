<?php
/* recupere tous les drivers a partir d'un point*/
require_once ('../bin/driver/DriverManager.php');
require_once 'connect.php';

if(isset($_GET['geoPoint']))
{
	$driver = new DriverManager($db);
	header("Content-Type: application/json");
    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Methods: POST, GET");
    echo json_encode($driver->getDriverPoints($_GET['lat'],$_GET['lng']));
}
else
{
	$driver = new DriverManager($db);
	header("Content-Type: application/json");
    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Methods: POST, GET");
    $driver->getAllDriver();
		//echo $drivers;
		//var_dump($driver->getAllDriver());// QUESTION: a
}





?>
