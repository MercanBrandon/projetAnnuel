<?php
require_once '_header.php';
 ?>
  <body>
    <div id="map"></div>
    <script>
      function initMap() {
        var chicago = {lat: 41.85, lng: -87.65};
        var indianapolis = {lat: 39.79, lng: -86.14};
        var depart = {lat: 48.8534, lng: 2.3488};
        var arrive = {lat: 49.443232, lng:1.099971};

        var map = new google.maps.Map(document.getElementById('map'), {
          center: depart,
          zoom: 7,
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
        var directionsDisplay = new google.maps.DirectionsRenderer({
          map: map
        });

        // Set destination, origin and travel mode.
        var request = {
          destination: arrive,
          origin: depart,
          travelMode: 'DRIVING'
        };

        // Pass the directions request to the directions service.
        var directionsService = new google.maps.DirectionsService();
        directionsService.route(request, function(response, status) {
          if (status == 'OK') {
            // Display the route on the map.
            directionsDisplay.setDirections(response);
          }
        });
      }

    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBLrGhNstPMZTs-NK9IyqyE6DWUf2zJwnI&callback=initMap"
        async defer></script>
  </body>
</html>
