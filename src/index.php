<?php
// if (!isset($_SESSION)) {
//   if (empty($_SESSION)) {
//     header('Location: http://127.0.0.1/edsa-TrandportMe/src/connect.php');
//   }
// }
include '_header.php';
$title = 'Simple Map';

 ?>
<body>
 <div id="map"></div>
 <script>
   var map;
   function initMap() {
     map = new google.maps.Map(document.getElementById('map'), {
       center: {lat: 15.2798157, lng: -61.3357894},
       zoom: 8
     });
   }
 </script>
 <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBLrGhNstPMZTs-NK9IyqyE6DWUf2zJwnI&callback=initMap"
 async defer></script>
</body>
</html>
