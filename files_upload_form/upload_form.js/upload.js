     var map;
        var geocoder;
              function geocodeFinder()
            {
         
            geocoder  = new  google.maps.Geocoder();   
            }
        $(document).ready(function(){
          $("#autocomplete").autocomplete({
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
               document.getElementById("latitude").value =ui.item.latitude;
               document.getElementById("Longitude").value =ui.item.longitude;
        
          } 
          }) 
    
    });
   
      

 
        
   
        
        
        
        function check() {
		var testThis = jQuery.trim(jQuery("#autocomplete").val());
		var latitude = jQuery.trim(jQuery("#latitude").val());
		
		
		var checkIcons = "form-img/check_icon.png";
		var crossIcons = "form-img/cross-icon.png";
		var importantIcon = "form-img/important-icon.png";

	
		if (!testThis=="") {
			jQuery("#location-tooltip-img").attr("src", checkIcons);
		} else {
			jQuery("#location-tooltip-img").attr("src", crossIcons);
		}

        if (jQuery("#latitude").val().length == 0) {
			jQuery("#location-tooltip-img1").attr("src",importantIcon);
		} else {
			jQuery("#location-tooltip-img1").attr("src", checkIcons);
			
		}
 /***************END OF TOOLTIPS FOR valid password condition information **********************/ 
    
 
  
 /***************START OF PASSWORD  STRENGTH ANIMATION**********************/
	
	}
       
		function tooltip_popUp() {
		if ( jQuery("#autocomplete").val().length == 0) 
		{
			jQuery(".varified").hide();
			jQuery(".notvarified").fadeIn(1000);
			
			return false;
		} else {
			jQuery(".varified").fadeIn(300);
			
			jQuery(".notvarified").hide();
			return true;
		}
	} 
    
 
     
    /*submit checke for property location*/
            
  function validateUpload()             
 {
    

    var str="";
   
     
     /****************************/
     /*    CHECK IF latLng is ready   */
     /****************************/
    
    var latitude =document.forms["upload_form"]["latitude"].value;
    var location =document.forms["upload_form"]["location"].value;
      if (latitude=="" && !location=="")
      {
     
           str= "<b>Error!:&nbsp;</b>enter location and select a match from the dropdawn list !";
    
          document.getElementById("error_location").innerHTML=str;
    
    }

    else if (location=="")
    {
     
        str="<b>Error!:&nbsp;</b>property location is required !";
      document.getElementById("error_location").innerHTML=str; 
    
    }
    if(!str==""){
        return false;
    } 
    
 }
         
      