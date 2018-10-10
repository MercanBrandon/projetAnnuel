<a class="btn btn-dark" href="carte.php">Carte</a>
<input type="text" id="pac-input" name="pac-input" value="">
 <div id="map"></div>
 <div class="map_from" id="map_from">
   <input type="text" name="start_position" value="" placeholder="Départ">
   <input type="text" name="destination_position" value="" placeholder="Arrivee">
   <input type="submit" name="btn_go" value="An nou !!!">
 </div>
<script>
   var map;
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
     var infoWindow = new google.maps.InfoWindow({map: map});

     var txt_start = document.getElementsByName('start_position');
     var txt_destination = document.getElementsByName('destination_position');
     map.controls[google.maps.ControlPosition.TOP].push(map_from);

     var auto_txt_start = new google.maps.places.Autocomplete(txt_start);
     var auto_txt_destination = new google.maps.places.Autocomplete(txt_destination);

     auto_txt_start.bindTo('bounds', map);

     auto_txt_start.addListener('place_changed', function() {
       infowindow.close();
       marker.setVisible(false);
       var place = autocomplete.getPlace();
       if (!place.geometry) {
         // User entered the name of a Place that was not suggested and
         // pressed the Enter key, or the Place Details request failed.
         window.alert("No details available for input: '" + place.name + "'");
         return;
       }


       // If the place has a geometry, then present it on a map.
       if (place.geometry.viewport) {
         map.fitBounds(place.geometry.viewport);
       } else {
         map.setCenter(place.geometry.location);
         map.setZoom(17);  // Why 17? Because it looks good.
       }
       marker.setPosition(place.geometry.location);
       marker.setVisible(true);

       var lat = place.geometry.location.lat();
       var lng = place.geometry.location.lng();

       document.getElementById("GoTo").onclick = function(){
         location.href = `https://waze.com/ul?ll=${lat},${lng}&navigate=yes`;
       }
       console.log(place.geometry.location);

       console.log(`https://waze.com/ul?ll=${lat},${lng}&navigate=yes`);

       var address = '';
       if (place.address_components) {
         address = [
           (place.address_components[0] && place.address_components[0].short_name || ''),
           (place.address_components[1] && place.address_components[1].short_name || ''),
           (place.address_components[2] && place.address_components[2].short_name || '')
         ].join(' ');
       }

       infowindowContent.children['place-icon'].src = place.icon;
       infowindowContent.children['place-name'].textContent = place.name;
       infowindowContent.children['place-address'].textContent = address;
       infowindow.open(map, marker);
     });

     // Try HTML5 geolocation.
     if (navigator.geolocation) {
       navigator.geolocation.getCurrentPosition(function(position) {
         var pos = {
           lat: position.coords.latitude,
           lng: position.coords.longitude
         };

         infoWindow.setPosition(pos);
         infoWindow.setContent('Location found.');
         map.setCenter(pos);
       }, function() {
         handleLocationError(true, infoWindow, map.getCenter());
       });
     } else {
       // Browser doesn't support Geolocation
       handleLocationError(false, infoWindow, map.getCenter());
     }
   }

   function handleLocationError(browserHasGeolocation, infoWindow, pos) {
     infoWindow.setPosition(pos);
     infoWindow.setContent(browserHasGeolocation ?
                           'Error: The Geolocation service failed.' :
                           'Error: Your browser doesn\'t support geolocation.');
   }

/*Google place*/
  //  function initialize() {
  //   var mapOptions = {
  //     center: {lat: -33.8688, lng: 151.2195},
  //     zoom: 13,
  //     scrollwheel: false
  //   };
  //   var map = new google.maps.Map(document.getElementById('map'),
  //     mapOptions);
  //
  //   var input = /** @type {HTMLInputElement} */(
  //       document.getElementById('pac-input'));
  //
  //   // Create the autocomplete helper, and associate it with
  //   // an HTML text input box.
  //   var autocomplete = new google.maps.places.Autocomplete(input);
  //   autocomplete.bindTo('bounds', map);
  //
  //   map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);
  //
  //   var infowindow = new google.maps.InfoWindow();
  //   var marker = new google.maps.Marker({
  //     map: map
  //   });
  //   google.maps.event.addListener(marker, 'click', function() {
  //     infowindow.open(map, marker);
  //   });
  //
  //   // Get the full place details when the user selects a place from the
  //   // list of suggestions.
  //   google.maps.event.addListener(autocomplete, 'place_changed', function() {
  //     infowindow.close();
  //     var place = autocomplete.getPlace();
  //     if (!place.geometry) {
  //       return;
  //     }
  //
  //     if (place.geometry.viewport) {
  //       map.fitBounds(place.geometry.viewport);
  //     } else {
  //       map.setCenter(place.geometry.location);
  //       map.setZoom(17);
  //     }
  //
  //     // Set the position of the marker using the place ID and location.
  //     marker.setPlace(/** @type {!google.maps.Place} */ ({
  //       placeId: place.place_id,
  //       location: place.geometry.location
  //     }));
  //     marker.setVisible(true);
  //
  //     infowindow.setContent('<div><strong>' + place.name + '</strong><br>' +
  //         'Place ID: ' + place.place_id + '<br>' +
  //         place.formatted_address + '</div>');
  //     infowindow.open(map, marker);
  //   });
  // }

 </script>
 <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBLrGhNstPMZTs-NK9IyqyE6DWUf2zJwnI&libraries=places&callback=initMap"></script>
</body>
</html>
