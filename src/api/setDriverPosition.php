<?php
header("Content-Type: application/json");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST, GET");
require_once 'connect.php';
// var_dump($_GET);

if (isset($_GET['lng']) && isset($_GET['lat']) && isset($_GET['id'])) {
  $sql = $db->prepare("UPDATE driver SET drv_lat = :lat , drv_lng = :lng WHERE drv_id = :drv_id");
  $sql->execute([
    'lat' => $_GET['lat'],
    'lng' => $_GET['lng'],
    'drv_id' => $_GET['id']
  ]);
  
}
 ?>
