
<div id="map"></div>

<div class="map_form" id="map_form">
    <input type="text" class="form-control" id="start_position" value="" placeholder="Départ">
    <input type="text" class="form-control" id="destination_position" value="" placeholder="Arrivee">
    <input type="submit" class="btn btn-primary envoi" id="btn_go" value="C'est parti!">
</div>

<script>

  function getXMLHttpRequest() {
	var xhr = null;
	if (window.XMLHttpRequest || window.ActiveXObject) {
		if (window.ActiveXObject) {
			try {
				xhr = new ActiveXObject("Msxml2.XMLHTTP");
			} catch(e) {
				xhr = new ActiveXObject("Microsoft.XMLHTTP");
			}
		} else {
			xhr = new XMLHttpRequest();
		}
	} else {
		alert("Votre navigateur ne supporte pas l'objet XMLHTTPRequest...");
		return null;
	}
	return xhr;
}


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
     let init_position = {};
     // Try HTML5 geolocation.
     if (navigator.geolocation) {
       navigator.geolocation.getCurrentPosition(function(position) {
         init_position = {
           lat: position.coords.latitude,
           lng: position.coords.longitude
         };


         infoWindow.setPosition(init_position);
         infoWindow.setContent('Mi vou ... ');
         map.setCenter(init_position);
         txt_start.placeholder = 'Position Actuelle';
         //console.log(txt_start);
       }, function() {
         handleLocationError(true, infoWindow, map.getCenter());
       });
     } else {
       // Browser doesn't support Geolocation
       handleLocationError(false, infoWindow, map.getCenter());
     }

     //console.log(init_position);
     //recuperation et
     map.controls[google.maps.ControlPosition.TOP].push(map_form);
     var txt_start = document.getElementById('start_position');
     //var start_position;

     var txt_destination = document.getElementById('destination_position');
     var end_position;

     var infoWindow = new google.maps.InfoWindow({map: map});
     var marker_origin = new google.maps.Marker({
       map:map,
       animation: google.maps.Animation.DROP
     })
     var marker_end = new google.maps.Marker({
       map:map,
       animation: google.maps.Animation.DROP
     });

     var auto_txt_start = new google.maps.places.Autocomplete(txt_start);
     var auto_txt_destination = new google.maps.places.Autocomplete(txt_destination);
     //console.log(auto_txt_destination);

     let origin;

     auto_txt_start.addListener('place_changed', function () {
       origin = auto_txt_start.getPlace();
       if (!origin.geometry) {
         window.alert("Nou pa kònèt "+origin.name);
         return;
       }
       if (origin.geometry.viewport) {
         map.fitBounds(origin.geometry.viewport);
       }else {
         map.setCenter(origin.geometry.viewport);
         map.setZoom(15);
       }
       //console.log(origin.geometry.location);
       marker_origin.setPosition(origin.geometry.location);
       var Ajax = new getXMLHttpRequest();
       Ajax.open("GET", "api/getdrivers.php?&lat="+origin.geometry.location.lat()+"&lng="+origin.geometry.location.lng(), true);
       Ajax.send();
       //console.log("api/getdrivers.php?&lat="+origin.geometry.location.lat()+"&lng="+origin.geometry.location.lng());
     })


     let destination;
     auto_txt_destination.addListener('place_changed', function() {
       //infowindow.close();
       //marker.setVisible(false);
       destination = auto_txt_destination.getPlace();

       if (!destination.geometry) {
         // User entered the name of a Place that was not suggested and
         // pressed the Enter key, or the Place Details request failed.
         window.alert("No details available for input: '" + destination.name + "'");
         return;
       }

       // If the place has a geometry, then present it on a map.
       if (destination.geometry.viewport) {
         map.fitBounds(destination.geometry.viewport);
       } else {
         map.setCenter(destination.geometry.location);
         map.setZoom(15);
       }
       marker_end.setPosition(destination.geometry.location);
       marker_end.setVisible(true);

       /*var lat = destination.geometry.location.lat();
       var lng = destination.geometry.location.lng();*/


       //console.log(`https://waze.com/ul?ll=${lat},${lng}&navigate=yes`);

       /*var address = '';
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
       infowindow.open(map, marker);*/
     });

     document.getElementById("btn_go").onclick = function(){
       //location.href = `https://waze.com/ul?ll=${lat},${lng}&navigate=yes`;

       if (txt_start.value = '') {
         origin = init_position;
         //console.log(init_position);
       }
       let directionsDisplay = '';
         //console.log(destination.geometry);
         //console.log(origin);
         directionsDisplay = new google.maps.DirectionsRenderer({
            map: map
          });
         var request = {
          destination: destination.geometry.location,
          origin: origin.geometry.location,
          travelMode: 'DRIVING'
        };
        var directionsService = new google.maps.DirectionsService();
        directionsService.route(request, function(response, status) {
          if (status == 'OK') {
            // Display the route on the map.
            directionsDisplay.setDirections(response);
          }
        });
        //console.log(origin);
        //console.log(origin.place_id);
        //console.log(origin.geometry);
        let course = {
          depart : {
            id : origin.place_id,
            lat : origin.geometry.location.lat(),
            lng : origin.geometry.location.lng()
          },
          arrivee : {
            id : destination.place_id,
            lat : destination.geometry.location.lat(),
            lng : destination.geometry.location.lng()
          }
        }

        console.log(JSON.stringify(course));
        var xmlhttp = new XMLHttpRequest();   // new HttpRequest instance
        xmlhttp.open("POST", "api/newcourse.php");
        xmlhttp.setRequestHeader("Content-Type", "application/json");
        xmlhttp.send("course="+JSON.stringify(course));
     }
   }

   function handleLocationError(browserHasGeolocation, infoWindow, pos) {
     infoWindow.setPosition(pos);
     infoWindow.setContent(browserHasGeolocation ?
                           'Error: The Geolocation service failed.' :
                           'Error: Your browser doesn\'t support geolocation.');
   }

  function createMarkers(lat, long){
      let i = 0 ;
   // console.log("j'ai acces");
    let url = `api/getdrivers.php?lat=${lat}&lng=${long}`;

    let request = new Request(url, {
      method: 'GET'
    });
    var result;

    fetch(request)
      .then( data => {
        result = data;

        for (var i = 0; i < result.length; i++) {
            drv = result[i]

          console.log(drv);

            var marker_drv = new google.maps.Marker({
                map:map,
                animation: google.maps.Animation.DROP
              })
              let pos = new google.maps.LatLng(drv.drv_lat, drv.drv_lng);
            marker_drv.setPosition(pos);
            
          ;
        }
      });

  }
  createMarkers(48.843569, 2.622365);

 </script>
 <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBLrGhNstPMZTs-NK9IyqyE6DWUf2zJwnI&libraries=places&callback=initMap"></script>
</body>
</html>
