<?php
// if (!isset($_SESSION)) {
//   if (empty($_SESSION)) {
//     header('Location: http://127.0.0.1/edsa-TrandportMe/src/connect.php');
//   }
// }
include '_header.php';
$title = 'Simple Map';

 ?>

<body id="index">
 <header class="main">
   <img src="img/LogoWhite.png" alt="Logo">
   <nav>
     <!-- <h1>L'application socialement responsable</h1> -->
   </nav>
 </header>
 <div id="map"></div>
 <script>
   var map;
   function initMap() {
     map = new google.maps.Map(document.getElementById('map'), {
       center: {lat: 15.2798157, lng: -61.3357894},
       zoom: 8,
       styles:[
           {
               "featureType": "administrative.country",
               "elementType": "geometry",
               "stylers": [
                   {
                       "visibility": "on"
                   }
               ]
           },
           {
               "featureType": "administrative.land_parcel",
               "elementType": "all",
               "stylers": [
                   {
                       "color": "#787878"
                   }
               ]
           },
           {
               "featureType": "landscape",
               "elementType": "all",
               "stylers": [
                   {
                       "saturation": "-100"
                   },
                   {
                       "gamma": "1.00"
                   },
                   {
                       "lightness": "20"
                   }
               ]
           },
           {
               "featureType": "landscape",
               "elementType": "geometry",
               "stylers": [
                   {
                       "color": "#b8b8b8"
                   }
               ]
           },
           {
               "featureType": "landscape.natural",
               "elementType": "geometry",
               "stylers": [
                   {
                       "color": "#8b8888"
                   }
               ]
           },
           {
               "featureType": "landscape.natural",
               "elementType": "geometry.stroke",
               "stylers": [
                   {
                       "color": "#ffffff"
                   }
               ]
           },
           {
               "featureType": "landscape.natural.landcover",
               "elementType": "geometry.fill",
               "stylers": [
                   {
                       "color": "#868686"
                   }
               ]
           },
           {
               "featureType": "landscape.natural.terrain",
               "elementType": "all",
               "stylers": [
                   {
                       "visibility": "on"
                   }
               ]
           },
           {
               "featureType": "landscape.natural.terrain",
               "elementType": "geometry",
               "stylers": [
                   {
                       "color": "#8a8a8a"
                   }
               ]
           },
           {
               "featureType": "landscape.natural.terrain",
               "elementType": "geometry.fill",
               "stylers": [
                   {
                       "color": "#626060"
                   }
               ]
           },
           {
               "featureType": "landscape.natural.terrain",
               "elementType": "geometry.stroke",
               "stylers": [
                   {
                       "color": "#000000"
                   }
               ]
           },
           {
               "featureType": "poi.park",
               "elementType": "geometry",
               "stylers": [
                   {
                       "color": "#768b74"
                   }
               ]
           },
           {
               "featureType": "road.highway",
               "elementType": "geometry.fill",
               "stylers": [
                   {
                       "color": "#fd9ab4"
                   }
               ]
           },
           {
               "featureType": "road.highway.controlled_access",
               "elementType": "geometry.fill",
               "stylers": [
                   {
                       "color": "#a20089"
                   }
               ]
           },
           {
               "featureType": "road.arterial",
               "elementType": "geometry",
               "stylers": [
                   {
                       "color": "#f4f4f4"
                   }
               ]
           },
           {
               "featureType": "road.local",
               "elementType": "geometry.fill",
               "stylers": [
                   {
                       "color": "#c2c1c1"
                   }
               ]
           },
           {
               "featureType": "water",
               "elementType": "all",
               "stylers": [
                   {
                       "color": "#009db0"
                   }
               ]
           }
       ]
     });
   }
 </script>
 <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBLrGhNstPMZTs-NK9IyqyE6DWUf2zJwnI&callback=initMap"
 async defer></script>
</body>
</html>
