<?php
/*

Template Name: Google Map
*/
?>
<?php
get_header();?>

<div id="map" style="width: 500px; height: 400px;">

	
</div>




<?php
get_footer();
?>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCcldtJlaZ2nGXLR7OnH36zzZs1UEREDTU&libraries=places&sensor=false"></script>
 <script type="text/javascript">
 jQuery(document).ready(function(e) {
	 var markers = [
						[ -33.890542, 151.274856],
						[ -33.923036, 151.259052],
						[ -34.028249, 151.157507],
						[ -33.80010128657071, 151.28747820854187],
						[ -33.950198, 151.259302 ]
					];
    var geocode_api_base_url = "http://maps.googleapis.com/maps/api/geocode/json?";
var params = {
    adress : 05673,
    components : "country:us",
    sensor : false
}
// This is the result set of markers in area
var in_area = [];

//  http://maps.googleapis.com/maps/api/geocode/json?address=05673&components=country:US&sensor=false
$.getJSON( geocode_api_base_url + $.param(params), function(data) {

    var location, search_area, in_area = [];

    location = data['results'][0]['address_components']['geometry']['location'];

    // We create a circle to look within:
    search_area = {
        strokeColor: '#FF0000',
        strokeOpacity: 0.8,
        strokeWeight: 2,
        center : new google.maps.LatLng(location.lat, location.lon),
        radius : 500
    }

    search_area = new google.maps.Circle(search_area);

    $.each(markers, function(i,marker) {
       if (google.maps.geometry.poly.containsLocation(marker.getPosition(), search_area)) {
         in_area.push(marker);
       }
    });

    console.info(in_area);

});



/*
    var locations = [
      ['Bondi Beach', -33.890542, 151.274856, 4],
      ['Coogee Beach', -33.923036, 151.259052, 5],
      ['Cronulla Beach', -34.028249, 151.157507, 3],
      ['Manly Beach', -33.80010128657071, 151.28747820854187, 2],
      ['Maroubra Beach', -33.950198, 151.259302, 1]
    ];

    var map = new google.maps.Map(document.getElementById('map'), {
      zoom: 10,
      center: new google.maps.LatLng(-33.92, 151.25),
      mapTypeId: google.maps.MapTypeId.ROADMAP
    });

    var infowindow = new google.maps.InfoWindow();

    var marker, i;

    for (i = 0; i < locations.length; i++) {  
      marker = new google.maps.Marker({
        position: new google.maps.LatLng(locations[i][1], locations[i][2]),
        map: map
      });

      google.maps.event.addListener(marker, 'click', (function(marker, i) {
        return function() {
          infowindow.setContent(locations[i][0]);
          infowindow.open(map, marker);
        }
      })(marker, i));
    }
	*/
	});
  </script>