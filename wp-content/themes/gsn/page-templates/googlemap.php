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
  var map, infoWindow,pos, radius_circle,geocoder;
  var markers_on_map = [];
  var radius_km = 4;
  function initMap() {
    geocoder = new google.maps.Geocoder();
     pos = {
              lat: 27.704222,
              lng: 85.306513
            };
    geocoder = new google.maps.Geocoder();
            
        map = new google.maps.Map(document.getElementById('map'), {
          center: new google.maps.LatLng(pos.lat, pos.lng),
          zoom: 12,
          mapTypeId: google.maps.MapTypeId.ROADMAP
        });
        infoWindow = new google.maps.InfoWindow;
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
             showCloseLocations(pos);
          }, function() {
            showCloseLocations(pos);
           // handleLocationError(true, infoWindow, map.getCenter());
          });
        } else {
          showCloseLocations(pos);
          // Browser doesn't support Geolocation
        //  handleLocationError(false, infoWindow, map.getCenter());
        }
      
    function showCloseLocations(pos) {
        var i;
        var latlng = {lat: parseFloat(pos.lat), lng: parseFloat(pos.lng)};

        //remove all radii and markers from map before displaying new ones
        if (radius_circle) {
            radius_circle.setMap(null);
            radius_circle = null;
        }
        for (i = 0; i < markers_on_map.length; i++) {
            if (markers_on_map[i]) {
                markers_on_map[i].setMap(null);
                markers_on_map[i] = null;
            }
        }

        if (geocoder) {
            geocoder.geocode({
                'location': pos
            }, function(results, status) {
                if (status == google.maps.GeocoderStatus.OK) {
                    if (status != google.maps.GeocoderStatus.ZERO_RESULTS) {
                        var address_lat_lng = results[0].geometry.location;
                        radius_circle = new google.maps.Circle({
                            center: address_lat_lng,
                            radius: radius_km * 1000,
                            clickable: false,
                            map: map
                        });
                        if (radius_circle) map.fitBounds(radius_circle.getBounds());
                        for (var j = 0; j < locations.length; j++) {
                            (function(location) {
                              console.log(location);
                                var marker_lat_lng = new google.maps.LatLng(location[1], location[2]);
                                var distance_from_location = google.maps.geometry.spherical.computeDistanceBetween(address_lat_lng, marker_lat_lng); //distance in meters between your location and the marker
                                if (distance_from_location <= radius_km * 1000) {
                                    var new_marker = new google.maps.Marker({
                                        position: marker_lat_lng,
                                        map: map,
                                        title: location[0]
                                    });
                                    google.maps.event.addListener(new_marker, 'click', function() {

                                        let user_id=location[3];
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
                                            infoWindow.open(map, new_marker);
                                          },
                                          complete: function(response) {

                                          }
                                        }); 
                                    });
                                    markers_on_map.push(new_marker);
                                }
                            })(locations[j]);
                        }
                    } else {
                        alert("No results found while geocoding!");
                    }
                } else {
                    alert("Geocode was not successful: " + status);
                }
            });
        }
    }
  </script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCcldtJlaZ2nGXLR7OnH36zzZs1UEREDTU&libraries=geometry&callback=initMap" async defer></script>