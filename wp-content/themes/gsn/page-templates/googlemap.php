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
var map, infoWindow;
  function initMap() {
        map = new google.maps.Map(document.getElementById('map'), {
          center: new google.maps.LatLng(27.704222, 85.306513),
          zoom: 13,
          mapTypeId: google.maps.MapTypeId.ROADMAP
        });
        infoWindow = new google.maps.InfoWindow;
        var marker, i;
          for (i = 0; i < locations.length; i++) { 
        
            marker = new google.maps.Marker({
              position: new google.maps.LatLng(locations[i][1], locations[i][2]),
              map: map
            });

            google.maps.event.addListener(marker, 'click', (function(marker, i) {
              return function() {
                call_shop_data(locations[i][3]);
               // infoWindow.setContent(locations[i][0]);
               // infoWindow.open(map, marker);
              }
            })(marker, i));
          }

        }

    // Try HTML5 geolocation.
    if (navigator.geolocation) {
          navigator.geolocation.getCurrentPosition(function(position) {
            var pos = {
              lat: position.coords.latitude,
              lng: position.coords.longitude
            };
            // infoWindow.setPosition(pos);
            // infoWindow.setContent('Location found.');
            // infoWindow.open(map);
            map.setCenter(pos);
          }, function() {
           // handleLocationError(true, infoWindow, map.getCenter());
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
      function call_shop_data(id){
        let user_id=id;
        var data= {action: "gsn_get_store_data", user_id : user_id};
        var xhr = $.ajax({
          type: "post",
          dataType: "json",
          url: ajaxUrl,
          data: data,
          success: function(response) {
            console.log(response);
          },
          complete: function(response) {

          }
        });
      }
  </script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCcldtJlaZ2nGXLR7OnH36zzZs1UEREDTU&libraries=places&callback=initMap" async defer></script>