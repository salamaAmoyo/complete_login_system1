           /*
           var map;
            var geocoder;
            function initialize()
            {
                var myLatlong   =   new google.maps.LatLng(31.046051,34.85161199999993);
                var myOptions   =   {
                                        zoom:8,
                                        center:myLatlong,
                                        mapTypeId:google.maps.MapTypeId.ROADMAP
                                    };
               map          =   new google.maps.Map(document.getElementById('map_canvass'),myOptions);
               geocoder      =   new google.maps.Geocoder();   
            }
            
          $(document).ready(function(){
              $("#Homepage_autocomplete").autocomplete({
                  source:function(request,response){
                      geocoder.geocode({'address':request.term},function(results){
                          response($.map(results,function(item){
                              return {
                                 label:item.formatted_address,
                                 value:item.formatted_address,
                                 latitude:item.geometry.location.lat(),
                                 longitude:item.geometry.location.lng(),
                              }
                              
                          }))
                      })
                 },
                  select:function(event,ui) {
                    var location    =   new google.maps.LatLng(ui.item.latitude,ui.item.longitude);
                    marker          =   new google.maps.Marker({
                        map:map,
                        draggable:true
                    })
                   var stringvalue     =   'latitude:<input type="text" value="'+ui.item.latitude+'" >Longitude:<input type="text" value="'+ui.item.longitude+'"><br/>';
                    $("#value").append(stringvalue);
                    marker.setPosition(location);
                    map.setCenter(location);
                    
                    
                }
                  
              })
          
            });
*/
       
        

//***********************************************




//hhhh
var i = 1,
    bounds,
    marker,
    geocoder,
    markersArray = Array();
 
/*$(window).ready(function(e){
        initialize();
});
*/
function initialize() {
        var mapOptions = {
			center: new google.maps.LatLng(31.0461, 34.8516),  
            //(31.0461, 34.8516), 
            mapTypeId: google.maps.MapTypeId.ROADMAP
        };
        map = new google.maps.Map(document.getElementById('map_canvass'), mapOptions);
        map.setZoom(10);
        getMapData();
        geocoder  = new  google.maps.Geocoder();   
}

/*AUTOCOMPLETE*/

 $(document).ready(function(){
          $("#Homepage_autocomplete").autocomplete({
              source:function(request,response){
                 geocoder.geocode({"address":request.term},function(result){
                  response($.map(result,function(item){
                      return{
                          label:item.formatted_address,
                          value:item.formatted_address,
                          latitude:item.geometry.location.lat(),
                          longitude:item.geometry.location.lng()
                      }
                  }))   
                 }) 
                
              },
          select:function(event,ui){
              var location =  new google.maps.LatLng(ui.item.latitude,ui.item.longitude);
              
             /* marker   =  new google.maps.Marker({
                  map:map,
                  draggable:true
              })*/
                  var stringvalue     =   'latitude:<input type="text" value="'+ui.item.latitude+'" >Longitude:<input type="text" value="'+ui.item.longitude+'"><br/>';
                    $("#value").append(stringvalue);
             // marker.setPosition(location);
             map.setCenter(location); 
          }      
          })  
            
        })
/*AUTOCOMPLETE*/



function getMapData() {
    $.getJSON('properties.php',function(data){
        if(data.success == true) {
            if(data.data.length > 0){
                $.each(data.data,function(index, value){
                    lat = data.data[index].latitude;
                    lng = data.data[index].longitude;
                    /*name = data.data[index].name;*/
                    name = data.data[index].location;
                    image = data.data[index].image;
                    price = data.data[index].price;
                    url = data.data[index].url;
                    addMarker(i, lat, lng,image, name, price,url);
                    i++;
                });
            }
        }
    });
}
function addMarker(i, lat, lng, img, name, price,url) {
    if (lat != null && lng != null) {
        myLatLng = new google.maps.LatLng(lat, lng);
        bounds = new google.maps.LatLngBounds();
     
   
var pinIcon = new google.maps.MarkerImage(
    //base_url+"apartment.png",
    base_url+"apartment.png",
    null, /* size is determined at runtime */
    null, /* origin is 0,0 */
    null, /* anchor is bottom center of the scaled image */
    new google.maps.Size(42, 68)
);  
        
        eval('var marker' + i + ' = new google.maps.Marker({ position: myLatLng,  map: map, icon: pinIcon, animation: google.maps.Animation.BOUNCE, zIndex: i});');
        var marker_obj = eval('marker' + i);
        bounds.extend(marker_obj.position);
        markersArray.push(eval('marker' + i));
        marker_obj.title = name;
        var li_obj = '.js-map-num' + i;
        var image = '';
        if(img != ''){
           //image = '<img src="images/'+img+'" class="img-responsive img-thumbnail"  width="300" height="300" />';
           image = '<img src="../upload_folder/'+img+'" class="img-responsive img-thumbnail"  width="300" height="300" />';
           
        }
        //var content = '<div class="" style="background-size: 100% 100%;">'+image+'<h4><a href="'+url+'">' + name + '</a></h4><h4><span class="label label-danger"> $'+ price +'</span></h4></div>';
        var content = '<div class=" " style="width 100px;">'+image+'<h4><a href="'+url+'">' + name + '</a></h4><h4><span class="label label-danger"> $'+ price +'</span></h4></div>';
        eval('var infowindow' + i + ' = new google.maps.InfoWindow({ content: content,  maxWidth: 370});');
        //eval('var infowindow' + i + ' = new google.maps.InfoWindow({ content: content});');
  
        var infowindow_obj = eval('infowindow' + i);
        var marker_obj = eval('marker' + i);
        google.maps.event.addListener(marker_obj, 'click', function () {
            infowindow_obj.open(map, marker_obj);
        });
    }
}






