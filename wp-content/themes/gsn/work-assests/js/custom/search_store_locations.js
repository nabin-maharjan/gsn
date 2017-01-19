// JavaScript Document
$('#gridSystemModal').on('shown.bs.modal', function() {
    myMap();
});
function myMap() {
	var geocoder = new google.maps.Geocoder();
if(jQuery('#map').length){
  var storeLocation=document.getElementById("storeFullAddress");
  var latittude_cntr=document.getElementById("latitute");
  var lognitude_cntr=document.getElementById("lognitute");
  var mapCanvas = document.getElementById("map");
   var defaultLocation= new google.maps.LatLng(27.700769,85.300140);
   var zoomlevel=12;
  if(location_Lat!==0){
	 defaultLocation= new google.maps.LatLng(location_Lat,location_Lan);
	 zoomlevel=16;
  }

  var mapOptions = {
    center:defaultLocation, 
    zoom: zoomlevel
  };

  var map = new google.maps.Map(mapCanvas, mapOptions);
  //marker
  var marker = new google.maps.Marker({
          position: defaultLocation,
          map: map,
          title: 'Hello World!'
        });
   var markers = [];
  //Add listener
	google.maps.event.addListener(map, "click", function (event) {
		var latitude = event.latLng.lat();
		var longitude = event.latLng.lng();
		latittude_cntr.value = latitude;
		lognitude_cntr.value = longitude;
		 location_Lat=latitude;
   		location_Lan=longitude;
		
		
		// This event listener will call addMarker() when the map is clicked.
		marker.setPosition(event.latLng);
		// Center of map
		map.panTo(new google.maps.LatLng(latitude,longitude));
	
		getAddress(event.latLng);
	}); //end addListener
	
	  // Create the search box and link it to the UI element.
        var input = document.getElementById('pac-input');
        var searchBox = new google.maps.places.SearchBox(input);
        map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);
        // Bias the SearchBox results towards current map's viewport.
        map.addListener('bounds_changed', function() {
          searchBox.setBounds(map.getBounds());
        });
	  // Listen for the event fired when the user selects a prediction and retrieve
        // more details for that place.
        searchBox.addListener('places_changed', function() {
          var places = searchBox.getPlaces();
          if (places.length === 0) {
            return;
          }
          // For each place, get the icon, name and location.
          var bounds = new google.maps.LatLngBounds();
          places.forEach(function(place) {
            if (!place.geometry) {
              console.log("Returned place contains no geometry");
              return;
            }
			marker.setPosition(place.geometry.location);
            if (place.geometry.viewport) {
              // Only geocodes have viewport.
              bounds.union(place.geometry.viewport);
            } else {
              bounds.extend(place.geometry.location);
            }
          });
          map.fitBounds(bounds);
        });
	}
	 function getAddress(latLng) {
			geocoder.geocode( {'latLng': latLng},
			  function(results, status) {
				if(status == google.maps.GeocoderStatus.OK) {
				  if(results[0]) {
					  console.log(results);
					  jQuery('#selected_location_label').html(results[0].formatted_address);
					  jQuery('#change_location_btn .btn_location_text').html(results[0].formatted_address);
					  	storeLocation.value=results[0].formatted_address;
				  }
				  else {
					   console.log("No results");
					//document.getElementById("address").value = "No results";
				  }
				}
				else {
					 console.log(status);
				  document.getElementById("address").value = status;
				}
			  });
			}
}