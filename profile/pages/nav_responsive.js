
  $(window).scroll(function() {
    if($(this).scrollTop() > 50) 
    {
        $('.opaque-navbar').addClass('opaque');
    } else {
        $('.opaque-navbar').removeClass('opaque');
    }
});


function addclass(){
         
     document.getElementById("map_wrapper").className = "mymap";
     document.getElementById("slider_wrapper1").className = "slider_outer_wrp";
    
  
}