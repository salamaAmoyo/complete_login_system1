<!doctype html>
<html ng-app="app">
<head>
    <meta charset="utf-8">
    <title></title>
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     
 
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	
		 <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>
        <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.18/jquery-ui.min.js"></script> 
       
        
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCccRrJDREK8lHwpJ-je5CZYV_XpX8M8ww" type="text/javascript"></script>
        
          <link rel="stylesheet" href="css/jquery-ui-1.8.18.custom.css"/>
          

	      
	      <link rel="stylesheet" href="css/bootstrap.css">
	      
	       <script src="mainjs/google_map_api.js"></script>
	       
	      
	      <link rel="stylesheet" href="mystyles.css">
          <link rel="stylesheet" href="gallery_styles.css">
          <script src="gallery_js.js"></script>
           
           
<!--      start     SIGNUP/login PAGE
--> 
     
       
      <script src="../Register_folder2/register_js/register.js"></script> 
           
       <link rel="stylesheet" href="../Register_folder2/register_css/signup.style.css" type="text/css"> 
         
        <link rel="stylesheet" href="../login_folder2/LogIn_css/Login.style.css"> 
<!--    end of   SIGNUP/login PAGE
-->	


<!--      start  of   files_upload_form
--> 
    <script src="../files_upload_form/upload_form.js/upload.js"></script>
         
      <link rel="stylesheet" href="../files_upload_form/upload_css/img_form.css">
      
      
<!--    end of   files_upload_form





-->	

<!--***********************responsivenave***********************-->




<!--***********************responsivenave***********************-->


	<!--	MY NEW GOOGLE MAP-->

	<!--<<<<<<< MAIN CSS>>>>>>>-->
    

	 
	<link rel="stylesheet" href="node_modules/font-awesome/css/font-awesome.css"/> <!--<<<< MOBILE MENU FONT AWESOME >>>>>-->
	
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
   
<!--    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>-->
	<!--main .js-->
   <script src="main.js"></script>
	<script src="mainjs/nav_mobile.js"></script> 
	<script src="mainjs/responsive_nav_js.js"></script>
  <script src="mainjs/setClass.js"></script>
	<!-- <<<MOBILE MENU JS >>>>>>-->
	 <!-- <<<MOBILE MENU JS  >>>>>>-->
<script type="text/javascript">
		var base_url ="../upload_folder/";
	</script>
<!--       <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> 
	      -->
</head>


<body onload="initialize();geocodeFinder();" >
   
  
   <!-- ***************responsive******************-->
 
   
   <!--***************responsive******************-->
   
    <div class="top_nav">
<!--		mobile menu-->
		<div id="wrp_nav-mobile">
		<nav class="nav-mobile">
			<i id="menuBtn" class="fa fa-bars" aria-hidden="true"></i>
			
			<ul id="nav-mobile2">
                <li><a href="?url=home"><span style="color:#5d85c6; background:white; border-bottom:4px solid cyan;" class="home_span"  onclick="removeClass();">Home</span></a></li>
				<li><a href="#top">Map</a></li>
				<li><a href="#!/gallery" onclick="openNav();">Gallery</a></li>
				 <li><a href ="?url=signup">Sign Up</a></li>
                 <li><a href ="?url=login">Log In</a></li>
			</ul>
		</nav>
		</div>
		<div class="logo"><a href="index.html" class="logo"><img src="img/logo3.png"></a></div>
		<div id="ul-seachbox-wrp">
           <!--    <<<<<<<<<<<<<<<<<<SEARCH BOX>>>>>>>>>>>>>>>>>>>>>-->

			<div id="nav_search_box_wrp1" class="searchbox-order">
        
     <form>
    <input type="text" name="search"    placeholder="search" id="Homepage_autocomplete" onkeyup="setclass()">     
  </form> 
    </div>
			
	<!--		<<<<<<<<<<<<<<<<<<<<<<SEARCH BOX WRP>>>>>>>>>>>>>>>>>>>>>-->
			
			
			   <!--    <<<<<<<<<<<<<<<<<<SEARCH BOX for mobile>>>>>>>>>>>>>>>>>>>>>-->
<!--
			<div id="nav_search_box_wrp2" class="searchbox-order">
       <form>
    <input type="text" name="search"    placeholder="search" id="autocomplete">     
  </form>    

    </div>-->
			
	<!--		<<<<<<<<<<<<<<<<<<<<<<SEARCH BOX WRP for moble>>>>>>>>>>>>>>>>>>>>>-->
			<div id="ul-wrper" class="ul-order">
				
		<!--a div for ul-->
        <ul>
			
            <li class="pc_menu" id="map-menu-li"><a href="#C4">MAP</a></li>  
           <li ><a href="?url=home" >Home</a></li> 
         <!--  <li><a href="?url=gallery">gallery</a></li>-->
                <li><a href="#!/gallery" onclick="openNav();">gallery</a></li>
               
              <li ><a href="?url=signup"  >Sign Up</a></li> 
              <li><a href="?url=login" >Log In</a></li>    
              <!-- <li><a href="?url=index.imgupload.form.php">Upload</a></li>  -->  

        </ul>
			</div>		
		</div>
		
    </div>
    
	<div id="map-gallery-wrp"><!-- map and gallery wrapper-->
	
	<div id="wrp">
	
  
<div id="gallery_overlay" class="overlay">
 <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
  <div class="overlay-content">
<ng-view></ng-view>
 
 
  </div>
</div>

<?php

    if(!empty($_GET['url'])){
      $route=$_GET['url'];
        switch($route){
        case'signup':
        $route="../Register_folder2/register.html";        
        break; 
          case'gallery':
        $route="app/pages/homes.html"; 
        break; 
          case'home':
        $route="/app/pages/homepage_gallery.php"; 
        break;
     
                case'index.imgupload.form.php':
        $route="../files_upload_form/index.imgupload.form.php"; 
            break;    
               
        case'login':
        $route="../login_folder2/index.php"; 
        break; 
         
        }
         include_once $route;   
        
    }else{
     /*include ('app/pages/flipBox_gallery.html');*/
    include ('app/pages/homepage_gallery.php');
     
    } 

    
?>
 
		
	</div>
	
	<div  class="mymap"  style="position:reletive"  id="top">
	<div id="map_canvass" style=" height:100%;width:100%;margin: 0;padding: 0;float:left">
        </div>	
        </div>	

	</div><!-- map and gallery wrapper-->
	<hr>
            <!--------------------------FOOTER START HER-------------------------->	
	<div><footer>
  <div class="footer-item"><ul>
  <li><a href="#">Hospitality</a></li>  
  </ul></div>
  <div class="footer-item"><ul><li><a href="#">site map</a></li></ul></div>
  <div class="footer-item"><ul><li><a href="#">social media</a></li></ul></div>  
		</footer></div>
		
	                <!--    <<<<<<<<<<<<<angular >>>>>>>>>>>>>>>>>>>>>>>>>>>>>-->

    <script src="node_modules/angular/angular.js"></script>
	<script src="node_modules/angular-route/angular-route.js"></script>
	<script src="app/config.js"></script>
	<script src="app/route.js"></script>
	<script src="app/controllers/actorsCtrl.js"></script>
	<script src="app/controllers/actor.js"></script>
	<script src="app/controllers/mainCtrl.js"></script>
	
  <!--  <script src="mainjs/setClass.js"></script>-->
    <!--
    	 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>-->
</body>
</html>
