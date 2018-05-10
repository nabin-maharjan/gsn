<?php
/**
 * Template Name: Home Page
 * 
 * Class Convention with BEM
 * l~ => landing > ~
 * lmain => landing > main
 * lmcta => landing > main > cta
 * lmfind => landing > main > find
 * lmslist => landing > main > store list
 * clist => card list
 * 
 * @package GSN
 * @since GSN 1.0
 */
get_header();

global $store;
$stores=$store->get_all_stores_locations();
?>

<div class="gsn-lmain__wrapper">
  <section class="ta-c gsn-section gsn-lmain__cta__wrapper gsn-lmcta">
    <div class="container">
      <div class="gsn-lmcta__heading">
        <h1 class="gsn-section__title">Want to create your own <br> <span>Ecommerce Website?</span></h1>

        <h5 class="gsn-section__subtitle">By the way, it's free!!</h5>
      </div>

      <div class="gsn-lmcta__btns">
        <ul class="gsn-lmcta__bitems">
          <li class="gsn-lmcta__bitem">
            <a href="#" class="gsn-cta__btn gsn-cta__btn--green">
              Register
            </a>
          </li>
          <li class="gsn-lmcta__bitem">
            <a href="#" class="gsn-cta__btn gsn-cta__btn--white">
              View Docs
            </a>
          </li>
        </ul>
      </div>
    </div>
  </section>

  <section class="ta-c gsn-section gsn-lmain__slist__wrapper gsn-lmain__slist--featured" style="background: #f3f3f3">
    <div class="container">
      <div class="gsn-lmslist__heading">
        <h1 class="gsn-section__title">Featured Shops</h1>
      </div>

      <div class="gsn-clist__wrapper gsn-lmslist__wrap">
        <ul class="gsn-clist__items gsn-lmslist__items">
          <li class="gsn-clist__item gsn-lmslist__item">
            <a href="#" class="gsn-lmslist__link gsn-clist__link">
              <div class="gsn-card__wrapper">
                <div class="gsn-card__img">
                  <img src="<?php echo get_template_directory_uri(); ?>/assets/images/main-logo.svg" alt="Store Logo" class="gsn-card__logo">
                </div>
                <div class="gsn-card__info">
                  <h3 class="gsn-card__name">Shop name</h3>
                  <h4 class="gsn-card__category">Shop category</h4>
                  <h5 class="gsn-card__location">Shop location</h5>
                  <span class="gsn-card__view">
                    View Shop
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 93 75.925"><path d="M0 30.37a1.5 1.5 0 0 1 1.5-1.5h86.31l-27-26.29a1.5 1.5 0 0 1 0-2.12 1.49 1.49 0 0 1 2.12 0l29.62 28.83a1.5 1.5 0 0 1 0 2.13L62.88 60.31a1.5 1.5 0 0 1-2.09-2.15l27-26.29H1.5a1.5 1.5 0 0 1-1.5-1.5z"/>
                  </span>
                </div>
              </div>
            </a>
          </li>

          <li class="gsn-clist__item gsn-lmslist__item">
            <a href="#" class="gsn-lmslist__link gsn-clist__link">
              <div class="gsn-card__wrapper">
                <div class="gsn-card__img">
                  <img src="<?php echo get_template_directory_uri(); ?>/assets/images/main-logo.svg" alt="Store Logo" class="gsn-card__logo">
                </div>
                <div class="gsn-card__info">
                  <h3 class="gsn-card__name">Shop name</h3>
                  <h4 class="gsn-card__category">Shop category</h4>
                  <h5 class="gsn-card__location">Shop location</h5>
                  <span class="gsn-card__view">
                    View Shop
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 93 75.925"><path d="M0 30.37a1.5 1.5 0 0 1 1.5-1.5h86.31l-27-26.29a1.5 1.5 0 0 1 0-2.12 1.49 1.49 0 0 1 2.12 0l29.62 28.83a1.5 1.5 0 0 1 0 2.13L62.88 60.31a1.5 1.5 0 0 1-2.09-2.15l27-26.29H1.5a1.5 1.5 0 0 1-1.5-1.5z"/>
                  </span>
                </div>
              </div>
            </a>
          </li>

          <li class="gsn-clist__item gsn-lmslist__item">
            <a href="#" class="gsn-lmslist__link gsn-clist__link">
              <div class="gsn-card__wrapper">
                <div class="gsn-card__img">
                  <img src="<?php echo get_template_directory_uri(); ?>/assets/images/main-logo.svg" alt="Store Logo" class="gsn-card__logo">
                </div>
                <div class="gsn-card__info">
                  <h3 class="gsn-card__name">Shop name</h3>
                  <h4 class="gsn-card__category">Shop category</h4>
                  <h5 class="gsn-card__location">Shop location</h5>
                  <span class="gsn-card__view">
                    View Shop
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 93 75.925"><path d="M0 30.37a1.5 1.5 0 0 1 1.5-1.5h86.31l-27-26.29a1.5 1.5 0 0 1 0-2.12 1.49 1.49 0 0 1 2.12 0l29.62 28.83a1.5 1.5 0 0 1 0 2.13L62.88 60.31a1.5 1.5 0 0 1-2.09-2.15l27-26.29H1.5a1.5 1.5 0 0 1-1.5-1.5z"/>
                  </span>
                </div>
              </div>
            </a>
          </li>

          <li class="gsn-clist__item gsn-lmslist__item">
            <a href="#" class="gsn-lmslist__link gsn-clist__link">
              <div class="gsn-card__wrapper">
                <div class="gsn-card__img">
                  <img src="<?php echo get_template_directory_uri(); ?>/assets/images/main-logo.svg" alt="Store Logo" class="gsn-card__logo">
                </div>
                <div class="gsn-card__info">
                  <h3 class="gsn-card__name">Shop name</h3>
                  <h4 class="gsn-card__category">Shop category</h4>
                  <h5 class="gsn-card__location">Shop location</h5>
                  <span class="gsn-card__view">
                    View Shop
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 93 75.925"><path d="M0 30.37a1.5 1.5 0 0 1 1.5-1.5h86.31l-27-26.29a1.5 1.5 0 0 1 0-2.12 1.49 1.49 0 0 1 2.12 0l29.62 28.83a1.5 1.5 0 0 1 0 2.13L62.88 60.31a1.5 1.5 0 0 1-2.09-2.15l27-26.29H1.5a1.5 1.5 0 0 1-1.5-1.5z"/>
                  </span>
                </div>
              </div>
            </a>
          </li>

          <li class="gsn-clist__item gsn-lmslist__item">
            <a href="#" class="gsn-lmslist__link gsn-clist__link">
              <div class="gsn-card__wrapper">
                <div class="gsn-card__img">
                  <img src="<?php echo get_template_directory_uri(); ?>/assets/images/main-logo.svg" alt="Store Logo" class="gsn-card__logo">
                </div>
                <div class="gsn-card__info">
                  <h3 class="gsn-card__name">Shop name</h3>
                  <h4 class="gsn-card__category">Shop category</h4>
                  <h5 class="gsn-card__location">Shop location</h5>
                  <span class="gsn-card__view">
                    View Shop
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 93 75.925"><path d="M0 30.37a1.5 1.5 0 0 1 1.5-1.5h86.31l-27-26.29a1.5 1.5 0 0 1 0-2.12 1.49 1.49 0 0 1 2.12 0l29.62 28.83a1.5 1.5 0 0 1 0 2.13L62.88 60.31a1.5 1.5 0 0 1-2.09-2.15l27-26.29H1.5a1.5 1.5 0 0 1-1.5-1.5z"/>
                  </span>
                </div>
              </div>
            </a>
          </li>

          <li class="gsn-clist__item gsn-lmslist__item">
            <a href="#" class="gsn-lmslist__link gsn-clist__link">
              <div class="gsn-card__wrapper">
                <div class="gsn-card__img">
                  <img src="<?php echo get_template_directory_uri(); ?>/assets/images/main-logo.svg" alt="Store Logo" class="gsn-card__logo">
                </div>
                <div class="gsn-card__info">
                  <h3 class="gsn-card__name">Shop name</h3>
                  <h4 class="gsn-card__category">Shop category</h4>
                  <h5 class="gsn-card__location">Shop location</h5>
                  <span class="gsn-card__view">
                    View Shop
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 93 75.925"><path d="M0 30.37a1.5 1.5 0 0 1 1.5-1.5h86.31l-27-26.29a1.5 1.5 0 0 1 0-2.12 1.49 1.49 0 0 1 2.12 0l29.62 28.83a1.5 1.5 0 0 1 0 2.13L62.88 60.31a1.5 1.5 0 0 1-2.09-2.15l27-26.29H1.5a1.5 1.5 0 0 1-1.5-1.5z"/>
                  </span>
                </div>
              </div>
            </a>
          </li>
        </ul>
      </div>
    </div>
  </section>

  <section class="ta-c gsn-section gsn-lmain__find__wrapper gsn-lmfind">
    <div class="container">
      <div class="gsn-lmfind__heading">
        <h1 class="gsn-section__title">Find a shop</h1>
      </div>
      <div class="gsn-lmfind__filter__wrapper">        
        <div class="gsn-custom__select__wrap gsn-lmfind__filter gsn-lmfind__filter--select">
          <span>Category:</span>
          <div class="js-custom-select gsn-custom__select gsn-lmfind__select">
            <select id="shop-type" class="js-default-select visible-hidden">
              <option value="all" selected>All</option>
              <option value="food">Food</option>
              <option value="beverage">Beverage</option>
              <option value="clothing">Clothing</option>
              <option value="electronics">Electronics</option>
              <option value="handicraft">Handicraft</option>
              <option value="books">Books</option>
              <option value="retail">Retail</option>
            </select>

            <div class="js-custom-select-toggle gsn-custom__stoggle">
              <span class="js-custom-select-text gsn-custom__stotext"></span>
              <i class="js-gsn-custom-select-arrow gsn-custom__sarrow">
                <svg xmlns="http://www.w3.org/2000/svg" class="gsn-custom__saicon" viewBox="0 0 57.31 38.638"><path d="M28.66 30.91a1.51 1.51 0 0 1-1.08-.46L.42 2.55A1.52 1.52 0 0 1 .45.42a1.51 1.51 0 0 1 2.12 0l26.09 26.84L54.74.45a1.5 1.5 0 1 1 2.15 2.1l-27.16 27.9a1.5 1.5 0 0 1-1.07.46z"/></svg>
              </i>
            </div>

            <div class="js-custom-select-dropdown js-hidden gsn-custom__sdropdown">
              
            </div>
          </div>
        </div>

        <div class="gsn-custom__input__wrap gsn-lmfind__filter gsn-lmfind__filter--input">
          <span>Location:</span>
          <input type="text" class="gsn-custom__input" placeholder="Store location" name="findStore">
        </div>

        <div class="gsn-custom__select__wrap gsn-lmfind__filter gsn-lmfind__filter--select">
          <span>Range (KM):</span>
          <div class="js-custom-select gsn-custom__select gsn-custom__select--small gsn-lmfind__select">
            <select id="shop-type-range" class="js-default-select visible-hidden">
              <option value="all">1</option>
              <option value="food">2</option>
              <option value="beverage">3</option>
              <option value="clothing" selected>4</option>
              <option value="electronics">5</option>
              <option value="handicraft">6</option>
            </select>

            <div class="js-custom-select-toggle gsn-custom__stoggle">
              <span class="js-custom-select-text gsn-custom__stotext"></span>
              <i class="js-gsn-custom-select-arrow gsn-custom__sarrow">
                <svg xmlns="http://www.w3.org/2000/svg" class="gsn-custom__saicon" viewBox="0 0 57.31 38.638"><path d="M28.66 30.91a1.51 1.51 0 0 1-1.08-.46L.42 2.55A1.52 1.52 0 0 1 .45.42a1.51 1.51 0 0 1 2.12 0l26.09 26.84L54.74.45a1.5 1.5 0 1 1 2.15 2.1l-27.16 27.9a1.5 1.5 0 0 1-1.07.46z"/></svg>
              </i>
            </div>

            <div class="js-custom-select-dropdown js-hidden gsn-custom__sdropdown">
              
            </div>
          </div>
        </div>

        <div class="gsn-custom__btn__wrap gsn-lmfind__filter gsn-lmfind__filter--btn">
          <button type="button" class="gsn-custom__btn gsn-custom__btn--green">Filter</button>
        </div>
      </div>
    </div>

    <div class="gsn-lmain__map__wrapper">
      <div class="js-gsn-lmain-map gsn-lmain__map">
        <div id="map_home" style="width: 100%; height: 500px;"></div>
      </div>
    </div>
  </section>
</div>

<script type="text/javascript">
  var locations =<?php echo json_encode($stores);?>;
  var map, infoWindow, pos, radius_circle, geocoder;
  var markers_on_map = [];
  var radius_km = 4;
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
  }

  // Try HTML5 geolocation.
  if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(
      function(position) {
        pos = {
          lat: position.coords.latitude,
          lng: position.coords.longitude
        };
        // infoWindow.setPosition(pos);
        // infoWindow.setContent('Location found.');
        // infoWindow.open(map);
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
                        var data = {
                          action: "gsn_get_store_data",
                          user_id: user_id
                        };
                        var xhr = jQuery.ajax({
                          type: "post",
                          dataType: "json",
                          url: ajaxUrl,
                          data: data,
                          success: function(response) {
                            var html =
                              "<table><tr><td><img src='" +
                              response.svg +
                              "' width='100'></td><td width='150'>" +
                              locations[i][0] +
                              "</td></tr></table>";
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
</script> 
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCcldtJlaZ2nGXLR7OnH36zzZs1UEREDTU&libraries=geometry&callback=initMap" async defer></script>
<?php get_footer();?>