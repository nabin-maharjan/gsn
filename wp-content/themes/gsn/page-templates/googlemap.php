<?php
/*

Template Name: Google Map

Google key : AIzaSyCcldtJlaZ2nGXLR7OnH36zzZs1UEREDTU

*/
get_header();
global $store;
$stores=$store->get_all_stores_locations();
?>
<div id="map" style="width: 100%; height: 50vh;"></div>
<script type="text/javascript">
  var locations =<?php echo json_encode($stores);?>;
var map, infoWindow,pos,radius, cityCircle;
radius=3;// miles

  function initMap() {
     pos = {
              lat: 27.704222,
              lng: 85.306513
            };
        map = new google.maps.Map(document.getElementById('map'), {
          center: new google.maps.LatLng(pos.lat, pos.lng),
          zoom: 12,
          mapTypeId: google.maps.MapTypeId.ROADMAP
        });
        infoWindow = new google.maps.InfoWindow;
        load_marker(pos);
        }
        function load_marker(pos){
          var marker, i;
          for (i = 0; i < locations.length; i++) { 
            dist = sqrt(pow(locations[i][1]-pos.lat, 2) + cos(pos.lat)*pow(locations[i][2]-pos.lng, 2)); //distances(pos.lat, pos.lng, locations[i][1], locations[i][2]);
                  if(dist<radius){
                    marker = new google.maps.Marker({
                    position: new google.maps.LatLng(locations[i][1], locations[i][2]),
                    map: map
                  });

                  google.maps.event.addListener(marker, 'click', (function(marker, i) {
                    return function() {
                    // call_shop_data(locations[i]);
                    // infoWindow.setContent(locations[i][0]);
                    // infoWindow.open(map, marker);
                    let user_id=locations[i][3];
                      var data= {action: "gsn_get_store_data", user_id : user_id};
                      var xhr = jQuery.ajax({
                        type: "post",
                        dataType: "json",
                        url: ajaxUrl,
                        data: data,
                        success: function(response) {
                          console.log(response);
                          var html = "<table><tr><td><img src='"+response.logo+"' width='100'></td><td width='150'>" + locations[i][0]+"</td></tr></table>";
                          infoWindow.setContent(html);
                          infoWindow.open(map, marker);
                        },
                        complete: function(response) {

                        }
                      });
                    }
                  })(marker, i));
             } 
          }
        }
        function distances(lat1, lon1, lat2, lon2) {
            // ACOS(SIN(lat1)*SIN(lat2)+COS(lat1)*COS(lat2)*COS(lon2-lon1))*6371
            // Convert lattitude/longitude (degrees) to radians for calculations
            var R = 3963.189; // meters
            // Find the deltas
            delta_lon = deg2rad(lon2) - deg2rad(lon1);
            // Find the Great Circle distance
            distance = Math.acos(Math.sin(deg2rad(lat1)) * Math.sin(deg2rad(lat2)) + Math.cos(deg2rad(lat1)) * Math.cos(deg2rad(lat2)) *
            Math.cos(delta_lon)) * 3963.189;
            return distance;
        }

        function deg2rad(val) {
          var pi = Math.PI;
          var de_ra = ((eval(val))*(pi/180));
          return de_ra;
        }
    // Try HTML5 geolocation.
    if (navigator.geolocation) {
          navigator.geolocation.getCurrentPosition(function(position) {
            pos = {
              lat: position.coords.latitude,
              lng: position.coords.longitude
            };
            // infoWindow.setPosition(pos);
            // infoWindow.setContent('Location found.');
            // infoWindow.open(map);
            map.setCenter(pos);
            cityCircle = new google.maps.Circle({
                      strokeColor: '#FF0000',
                      strokeOpacity: 0.3,
                      strokeWeight: 2,
                      fillColor: '#FF0000',
                      fillOpacity: 0.1,
                      map: map,
                      center:  pos,
                      radius: radius  * 1609.34
                    });
            load_marker(pos);
          }, function() {
           // handleLocationError(true, infoWindow, map.getCenter());
           cityCircle = new google.maps.Circle({
              strokeColor: '#FF0000',
              strokeOpacity: 0.3,
                      strokeWeight: 2,
                      fillColor: '#FF0000',
                      fillOpacity: 0.1,
              map: map,
              center:  pos,
              radius: radius * 1609.34
            });
          });
        } else {
          // Browser doesn't support Geolocation
        //  handleLocationError(false, infoWindow, map.getCenter());
        }


      function handleLocationError(browserHasGeolocation, infoWindow, pos) {
        infoWindow.setPosition(pos);
        infoWindow.setContent(browserHasGeolocation ?
                              'Error: The Geolocation service failed.' :
                              'Error: Your browser doesn\'t support geolocation.');
        infoWindow.open(map);
      }
  </script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCcldtJlaZ2nGXLR7OnH36zzZs1UEREDTU&libraries=places&callback=initMap" async defer></script>