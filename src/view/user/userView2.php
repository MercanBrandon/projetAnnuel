<a class="btn btn-dark" href="carte.php">Carte</a>
<input type="text" id="pac-input" name="pac-input" value="">
 <div id="map"></div>
 <div class="map_from" id="map_from">
   <input type="text" id="start_position" value="" placeholder="Départ" style="width:80%;">
   <input type="text" id="destination_position" value="" placeholder="Arrivee" style="width:80%;">
   <input type="submit" name="btn_go" value="An nou !!!">
 </div>
<script>
   var map;
   var start_position;
   var destination;
   var txt_start = document.getElementById('start_position');
   var txt_destination = document.getElementById('destination_position');

   function initMap() {
     map = new google.maps.Map(document.getElementById('map'), {
       center: {lat: 15.2798157, lng: -61.3357894},
       zoom: 12,
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

     //Geolocation
     if (navigator.geolocation.getCurrentPosition(function(position){
       pos = {
         lat: position.coords.latitude,
         lng: position.coords.longitude
       };

       infowindow.setPosition(pos);
       infowindow.setContent('Mi Sé La Ou Yé');
       txt_start.placeholder = 'Position Actuelle';
     }, function(){
       handleLocationError(true, infowindow, map.getCenter());
     });
   }else {
     handleLocationError(false, infowindow, map.getcenter());
   })

   var marker_end = new google.maps.Marker({
     map:map,
     animation: google.maps.Animation.DROP,
     position: pos
   });
   }
 </script>
 <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBLrGhNstPMZTs-NK9IyqyE6DWUf2zJwnI&libraries=places&callback=initMap"></script>
</body>
</html>
