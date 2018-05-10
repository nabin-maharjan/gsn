<section class="ta-c gsn-section pb-0 gsn-lmain__find__wrapper gsn-lmfind">
    <div class="container">
      <div class="gsn-lmfind__heading">
        <h1 class="gsn-section__title">Find a shop</h1>
      </div>
      <div class="gsn-lmfind__filter__wrapper">        
        <div class="gsn-custom__select__wrap gsn-lmfind__filter gsn-lmfind__filter--select">
          <span>Category:</span>
          <div class="js-custom-select gsn-custom__select gsn-lmfind__select">
            	<?php global $store;
				    $shop_types = $store->shop_types();
				?>
                <select id="shop-type" class="js-default-select visible-hidden">
                    <option value="all" selected>All</option>
                    <?php foreach ($shop_types as $type) {?>
                        <option value="<?php echo $type->term_id; ?>"><?php echo $type->name; ?></option>
                    <?php }?>
                </select>
            <div class="js-custom-select-toggle gsn-custom__stoggle">
              <span class="js-custom-select-text gsn-custom__stotext"></span>
              <i class="js-gsn-custom-select-arrow gsn-custom__sarrow">
                <svg xmlns="http://www.w3.org/2000/svg" class="gsn-custom__saicon" viewBox="0 0 57.31 38.638"><path d="M28.66 30.91a1.51 1.51 0 0 1-1.08-.46L.42 2.55A1.52 1.52 0 0 1 .45.42a1.51 1.51 0 0 1 2.12 0l26.09 26.84L54.74.45a1.5 1.5 0 1 1 2.15 2.1l-27.16 27.9a1.5 1.5 0 0 1-1.07.46z"/></svg>
              </i>
            </div>
            <div class="js-custom-select-dropdown js-hidden gsn-custom__sdropdown"></div>
          </div>
        </div>

        <div class="gsn-custom__input__wrap gsn-lmfind__filter gsn-lmfind__filter--input">
          <span>Location:</span>
          <input type="text" class="gsn-custom__input" placeholder="Store location" name="findStore" id="gsn_user_location">
        </div>

        <div class="gsn-custom__select__wrap gsn-lmfind__filter gsn-lmfind__filter--select">
          <span>Range (KM):</span>
          <div class="js-custom-select gsn-custom__select gsn-custom__select--small gsn-lmfind__select">
            <select id="shop-type-range" class="js-default-select visible-hidden">
              <option value="1">1</option>
              <option value="2">2</option>
              <option value="5" selected>5</option>
              <option value="10">10</option>
              <option value="15">15</option>
            </select>
            <div class="js-custom-select-toggle gsn-custom__stoggle">
              <span class="js-custom-select-text gsn-custom__stotext"></span>
              <i class="js-gsn-custom-select-arrow gsn-custom__sarrow">
                <svg xmlns="http://www.w3.org/2000/svg" class="gsn-custom__saicon" viewBox="0 0 57.31 38.638"><path d="M28.66 30.91a1.51 1.51 0 0 1-1.08-.46L.42 2.55A1.52 1.52 0 0 1 .45.42a1.51 1.51 0 0 1 2.12 0l26.09 26.84L54.74.45a1.5 1.5 0 1 1 2.15 2.1l-27.16 27.9a1.5 1.5 0 0 1-1.07.46z"/></svg>
              </i>
            </div>
            <div class="js-custom-select-dropdown js-hidden gsn-custom__sdropdown"></div>
          </div>
        </div>
        <div class="gsn-custom__btn__wrap gsn-lmfind__filter gsn-lmfind__filter--btn">
          <button type="button" class="gsn-custom__btn gsn-custom__btn--green" id="gsn_shop_filter">Filter</button>
        </div>
      </div>
    </div>

    <div class="gsn-lmain__map__wrapper">
      <div class="js-gsn-lmain-map gsn-lmain__map">
        <div id="map_home" style="width: 100%; height: 500px;"></div>
      </div>
    </div>
  </section>
  <?php 
    $stores=$store->get_all_stores_locations();
  ?>
  <script type="text/javascript">
  var locations =<?php echo json_encode($stores);?>;
  var map, infoWindow, pos, radius_circle, geocoder;
  var markers_on_map = [];
  var radius_km = 5;
  function initMap() {
    geocoder = new google.maps.Geocoder();
    pos = {
      lat: 27.704222,
      lng: 85.306513
    };
    geocoder = new google.maps.Geocoder();

    map = new google.maps.Map(document.getElementById("map_home"), {
      center: new google.maps.LatLng(pos.lat, pos.lng),
      zoom: 12,
      mapTypeId: google.maps.MapTypeId.ROADMAP,
      styles: [
        {
          featureType: "administrative",
          elementType: "all",
          stylers: [
            {
              saturation: "-100"
            }
          ]
        },
        {
          featureType: "administrative.province",
          elementType: "all",
          stylers: [
            {
              visibility: "off"
            }
          ]
        },
        {
          featureType: "landscape",
          elementType: "all",
          stylers: [
            {
              saturation: -100
            },
            {
              lightness: 65
            },
            {
              visibility: "on"
            }
          ]
        },
        {
          featureType: "poi",
          elementType: "all",
          stylers: [
            {
              saturation: -100
            },
            {
              lightness: "50"
            },
            {
              visibility: "simplified"
            }
          ]
        },
        {
          featureType: "road",
          elementType: "all",
          stylers: [
            {
              saturation: "-100"
            }
          ]
        },
        {
          featureType: "road.highway",
          elementType: "all",
          stylers: [
            {
              visibility: "simplified"
            }
          ]
        },
        {
          featureType: "road.arterial",
          elementType: "all",
          stylers: [
            {
              lightness: "30"
            }
          ]
        },
        {
          featureType: "road.local",
          elementType: "all",
          stylers: [
            {
              lightness: "40"
            }
          ]
        },
        {
          featureType: "transit",
          elementType: "all",
          stylers: [
            {
              saturation: -100
            },
            {
              visibility: "simplified"
            }
          ]
        },
        {
          featureType: "water",
          elementType: "geometry",
          stylers: [
            {
              hue: "#ffff00"
            },
            {
              lightness: -25
            },
            {
              saturation: -97
            }
          ]
        },
        {
          featureType: "water",
          elementType: "labels",
          stylers: [
            {
              lightness: -25
            },
            {
              saturation: -100
            }
          ]
        }
      ]
    });
    infoWindow = new google.maps.InfoWindow();

    // Create the search box and link it to the UI element.
    var input = document.getElementById("gsn_user_location");
        var searchBox = new google.maps.places.SearchBox(input);
       // map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);
        // Bias the SearchBox results towards current map's viewport.
        map.addListener("bounds_changed", function() {
          searchBox.setBounds(map.getBounds());
        });
        // Listen for the event fired when the user selects a prediction and retrieve
        // more details for that place.
        searchBox.addListener("places_changed", function() {
          var places = searchBox.getPlaces();
          if (places.length === 0) {
            return;
          }
          // For each place, get the icon, name and location.
          places.forEach(function(place) {
            if (!place.geometry) {
              return;
            }
            pos = {
                lat: place.geometry.location.lat(),
                lng: place.geometry.location.lng()
            };
          });
        });
  }

  // Try HTML5 geolocation.
  if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(
      function(position) {
        pos = {
          lat: position.coords.latitude,
          lng: position.coords.longitude
        };
        map.setCenter(pos);
        showCloseLocations(pos);
      },
      function() {
        showCloseLocations(pos);
        // handleLocationError(true, infoWindow, map.getCenter());
      }
    );
  } else {
    showCloseLocations(pos);
    // Browser doesn't support Geolocation
    //  handleLocationError(false, infoWindow, map.getCenter());
  }

  function showCloseLocations(pos) {
    var i;
    var latlng = { lat: parseFloat(pos.lat), lng: parseFloat(pos.lng) };
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
      geocoder.geocode(
        {
          location: pos
        },
        function(results, status) {
          if (status == google.maps.GeocoderStatus.OK) {
            if (status != google.maps.GeocoderStatus.ZERO_RESULTS) {
                var address_lat_lng = results[0].geometry.location;
                jQuery('#gsn_user_location').val(results[0].formatted_address)
              radius_circle = new google.maps.Circle({
                center: address_lat_lng,
                radius: radius_km * 1000,
                clickable: false,
                map: map,
                strokeColor: "#68bd74",
                strokeOpacity: 0.8,
                strokeWeight: 1,
                fillColor: "#68bd74",
                fillOpacity: 0.35
              });
              if (radius_circle) map.fitBounds(radius_circle.getBounds());
              for (var j = 0; j < locations.length; j++) {
                (function(location) {
                  var marker_lat_lng = new google.maps.LatLng(
                    location[1],
                    location[2]
                  );
                  var distance_from_location = google.maps.geometry.spherical.computeDistanceBetween(
                    address_lat_lng,
                    marker_lat_lng
                  ); //distance in meters between your location and the marker
                  if (distance_from_location <= radius_km * 1000) {
                    var new_marker = new google.maps.Marker({
                      position: marker_lat_lng,
                      map: map,
                      title: location[0]
                    });
                    google.maps.event.addListener(
                      new_marker,
                      "click",
                      function() {
                        let user_id = location[3];
                        console.log(location);
                        var data = {
                          action: "gsn_get_store_data",
                          user_id: user_id,
                          shopType:location[5],
                        };
                        var xhr = jQuery.ajax({
                          type: "post",
                          dataType: "json",
                          url: ajaxUrl,
                          data: data,
                          success: function(response) {
                              console.log(response);
                              console.log(location);
                            var html =
                              "<table><tr><td><img src='" +
                              response.logo +
                              "' width='100'></td><td width='150'>" +
                              "<h4>"+location[0] +"</h4>"+
                              "<p>"+response.shop_type+"</p>";
                              if(location[4]){
                                html +="<a target='_blank' href='http://"+location[4] +".goshopnepal.com' class='gsn-store-link'>Visit Site</a>";
                              }
                              html +="</td></tr></table>";
                            infoWindow.setContent(html);
                            infoWindow.open(map, new_marker);
                          },
                          complete: function(response) {}
                        });
                      }
                    );
                    markers_on_map.push(new_marker);
                  }
                })(locations[j]);
              }
            } else {
              console.log("No results found while geocoding!");
            }
          } else {
            console.log("Geocode was not successful: " + status);
          }
        }
      );
    }
  }
    jQuery('#gsn_shop_filter').on('click',function(){
        showCloseLocations(pos);
    })
    jQuery('#shop-type-range').on('change',function(){
        radius_km=jQuery(this).val();
    });

    jQuery('#shop-type').on('change',function(){
         var data = {
            action: "gsn_filtered_locations",
            shop_type: jQuery(this).val()
        };
        var xhr = jQuery.ajax({
            type: "post",
            dataType: "json",
            url: ajaxUrl,
            data: data,
            success: function(response) {
                locations=response;
            },
            complete: function(response) {}
        });
    })
</script> 
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCcldtJlaZ2nGXLR7OnH36zzZs1UEREDTU&libraries=geometry,places&callback=initMap" async defer></script>