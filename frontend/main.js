$(document).ready(function(){
  //alert('hello'); 
});

  var map;
      function initMap() {
        map = new google.maps.Map(document.getElementById('map'), {
          center: {lat: 31.0461, lng:  34.8516},
          zoom:7
        });
		  var markerOptions = {
    position: new google.maps.LatLng(31.0461, 34.8516),
    map: map
};
var marker = new google.maps.Marker(markerOptions);
marker.setMap(map);

var infoWindowOptions = {
    content: ' Hello israel is here!!!'
};

var infoWindow = new google.maps.InfoWindow(infoWindowOptions);
google.maps.event.addListener(marker,'click',function(e){
  
  infoWindow.open(map, marker);
  
});

      }


//
//  var map;
//      function initMap() {
//        map = new google.maps.Map(document.getElementById('map'), {
//          center: {lat: 31.0461, lng:  34.8516},
//          zoom:7
//        });
//		  var markerOptions = {
//    position: new google.maps.LatLng(31.0461, 34.8516),
//    map: map
//};
//var marker = new google.maps.Marker(markerOptions);
//marker.setMap(map);
//
//var infoWindowOptions = {
//    content: ' Hello israel is here!!!'
//};
//
//var infoWindow = new google.maps.InfoWindow(infoWindowOptions);
//google.maps.event.addListener(marker,'click',function(e){
//  
//  infoWindow.open(map, marker);
//  
//});
//
//      }