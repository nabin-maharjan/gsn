function myMap(){function e(e){i.geocode({latLng:e},function(e,t){t==google.maps.GeocoderStatus.OK?e[0]?(console.log(e),jQuery("#selected_location_label").html(e[0].formatted_address),o.value=e[0].formatted_address):console.log("No results"):(console.log(t),document.getElementById("address").value=t)})}var o=document.getElementById("storeFullAddress"),t=document.getElementById("latitute"),n=document.getElementById("lognitute"),l=document.getElementById("map"),a=new google.maps.LatLng(27.700769,85.30014),g={center:a,zoom:10},s=new google.maps.Map(l,g),d=new google.maps.Marker({position:a,map:s,title:"Hello World!"});google.maps.event.addListener(s,"click",function(o){var l=o.latLng.lat(),a=o.latLng.lng();t.value=l,n.value=a,d.setPosition(o.latLng),s.panTo(new google.maps.LatLng(l,a)),e(o.latLng)});var c=document.getElementById("pac-input"),r=new google.maps.places.SearchBox(c);s.controls[google.maps.ControlPosition.TOP_LEFT].push(c),s.addListener("bounds_changed",function(){r.setBounds(s.getBounds())}),r.addListener("places_changed",function(){var e=r.getPlaces();if(0!=e.length){var o=new google.maps.LatLngBounds;e.forEach(function(e){return e.geometry?(d.setPosition(e.geometry.location),void(e.geometry.viewport?o.union(e.geometry.viewport):o.extend(e.geometry.location))):void console.log("Returned place contains no geometry")}),s.fitBounds(o)}});var i=new google.maps.Geocoder}console.log("hi console");