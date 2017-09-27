<!DOCTYPE html>
<html>
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBg3IMOwh_N9lYLlSzWT9xIy30MCngvhtU&callback=initMap"
  type="text/javascript"></script>
  
 <script src="nav_responsive.js" ></script>  
 <link rel="stylesheet" href="css/profile-page.css">
</head>
<body onload="myMap();">





<?php 
$servername = "localhost";
$username = "root";
$password = "";
$mydb="imguplaod2";
// Create connection
//profile_pages
$conn = new mysqli($servername, $username, $password,$mydb);
//check if the form has been submitted
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} else{
echo "Connected successfully";  
}

//$upload_dir="images/";
 if(isset($_GET['url'])){
 $userid= $_GET['url'];  
 $upload_dir="/complete_login_system1/upload_folder/";
  
 $sql = "SELECT * FROM profile_pages WHERE id='$userid'";
 $result = $conn->query($sql);
    if ($result->num_rows > 0){
        while($row = $result->fetch_assoc()) {
    $firstname=$row['Fname'];
    $lastname=$row['Lname'];
    $email=$row['email'];
    $telprefix=$row['telprefix'];
     $tel=$row['tel'];        
    $mobileprefix=$row['mobileprefix'];
    $mobile=$row['mobile'];
    $age=$row['age'];
    $city=$row['city'];
    $neighborhood=$row['neighborhood'];
    $street=$row['street'];
    $homeNo=$row['homeNo'];
 
} 
    }else{
        
    die( "that user could`t be found !"); 
    }
    
      //photo here...........
    $sql = "SELECT * FROM properties WHERE id='$userid'";
$result = $conn->query($sql);
    if ($result->num_rows > 0){
        while($row = $result->fetch_assoc()) {
    $name=$row['name'];
    $img=$row['image'];
    $discription=$row['description'];
    $price=$row['price'];
    
} 
    }else{
        
//    die( "that properties could`t be found !"); 
    } 
 }
    ?>
    
    
<!--  class="container-fluid"   class="navbar navbar-inverse
-->    
    
    
    
    
      <div class="mains">
       
    <div class="navbar navbar-inverse navbar-fixed-top opaque-navbar" id='nav-bg-ground'>
   
  <div class="container">
    
    <div class="navbar-header">
      
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navMain">
  <span class="glyphicon glyphicon-chevron-right" style="color:white;"></span>
    
  </button>
       
    </div>
    
    <div class="collapse navbar-collapse" id="navMain">
    
      <ul class="nav navbar-nav pull-right" id='dropDown-ul'>
          <li ><a href="/complete_login_system1/frontend/index.php">Home</a></li>
           <li><a href="/complete_login_system1/frontend/index.php">Sign Up</a></li>
      <li><a href="/complete_login_system1/frontend/index.php">Log In</a></li> 
      </ul>
    </div>
     <h3 style="color:#59f78b; text-align:center; z-index:-99999;  position: absolute;
    left: 500px;
    top: 0px;"> <marquee >	&nbsp;	&nbsp;	&nbsp;Welcome! <img src="bg_img/ok.png">&nbsp;	&nbsp;	&nbsp;	&nbsp;	&nbsp;	&nbsp;	&nbsp;	&nbsp;&nbsp;	&nbsp;	&nbsp;</marquee></h3>
  </div>
</div>
   
       
        
          
 <div class="wrp_info_msg">  
 <div class="info_msg">        
<table  class="table table-sm">
     <thead>
     <tr><th>Full Name</th><th>Email Address</th><th>Telephone1</th><th>Telephone2</th></tr>
    </thead>
      <tbody>
     <tr><td><?php echo $firstname." ".$lastname; ?></td><td><p><?php echo "<a href='https://mail.google.com/mail/'> $email</a>"; ?></p></td><td style="color:#4d72af"><?php echo $telprefix.$tel; ?></td><td style="color:#4d72af"><?php echo $mobileprefix.$mobile; ?></td></tr>
    </tbody>            
                 
 </table>
     </div>
     
     <div class="info_msg"> 
  <table class="table table-sm">
     <thead>
     <tr><th>City</th><th>neighborhood:</th><th>Street</th><th>Home No</th></tr>
      </thead>
       <tbody>
     <tr><td><?php echo $city; ?></td><td><?php echo  $neighborhood; ?></td><td><?php echo $street; ?></td><td><?php echo $homeNo; ?></td></tr>
       </tbody>            
 </table>
     </div> 
     
        
          </div>
          
<!--    --------------mobile phone--------------------- 
-->    
         
  <div class="wrp_info_msg2">  
 <div class="info_msg2">        
<table  class="table" >
    
    <tr ><th >Full Name</th><th style=" padding-left: 50px;">Email Address</th></tr>
   
         <tr> <td style=" padding-left:10px;"><?php echo $firstname." ".$lastname; ?></td><td style=" padding-left: 50px;"><p><?php echo "<a href='https://mail.google.com/mail/'> $email</a>"; ?></p></td></tr>
               
                 
 </table>
     </div>
     <div class="info_msg2"> 
  <table class="table">
     <thead bgcolor="gray">
         <tr><th >Telephone1</th><th>Telephone2</th></tr>
      </thead>
       <tbody>
           <tr><td style="color:#4d72af"><?php echo $telprefix.$tel; ?></td><td style="color:#4d72af"><?php echo $mobileprefix.$mobile; ?></td></tr>
       </tbody>            
 </table>
     </div> 
         
      <div class="info_msg2" > 
  <table class="table" >
     <thead>
         <tr><th style=" padding-left: 10px;">City</th><th style=" padding-left: 130px;">neighborhood:</th></tr>
      </thead>
       <tbody>
           <tr><td style=" padding-left: 10px;"><?php echo $city; ?></td><td style=" padding-left: 130px;"><?php echo  $neighborhood; ?></td></tr>
       </tbody>            
 </table>
     </div>  
     
         <div class="info_msg2" > 
  <table class="table">
     <thead>
         <tr><th>Street</th><th style=" padding-left: 70px;">Home No</th></tr>
      </thead>
       <tbody>
           <tr><td><?php echo $street; ?></td><td style=" padding-left: 90px;" ><?php echo $homeNo; ?></td></tr>
       </tbody>            
 </table>
     </div>              
          </div>             
                   
                        
                             
                                  
                                       
                                                 
<!--    --------------mobile phone--------------------- 
-->    
  
    </div>
    
    




<script>
             <?php
         if(isset($_GET['url'])){
        $userid= $_GET['url']; 
        $sql = "SELECT * FROM properties WHERE id='$userid'";
      $result = $conn->query($sql);
     if ($result->num_rows > 0){
        while($row = $result->fetch_assoc()) {
      
      $img=$row['image'];
      $lat=$row['latitude'];
      $lng=$row['longitude'];
      $price=$row['price'];
            
            
            
     
} 
    }else{
        
    die( "that properties could`t be found !"); 
    } 
 } 
        
        
        
      
     ?>
function myMap() {
  var amsterdam = new google.maps.LatLng(<?php echo $lat;?>,<?php echo $lng;?>);
 // var amsterdam = new google.maps.LatLng(52.395715,4.888916);

  var mapCanvas = document.getElementById("map_canvass");
  var mapOptions = {center: amsterdam, zoom: 7};
  var map = new google.maps.Map(mapCanvas,mapOptions);

  var myCity = new google.maps.Circle({
    center: amsterdam,
    radius: 70000,
    strokeColor: "#0000FF",
    strokeOpacity: 0.8,
    strokeWeight: 2,
    fillColor: "#0000FF",
    fillOpacity: 0.4
  });
  myCity.setMap(map);
}
</script>

 <div id="map-gallery-wrp">
 
 <div  class="mymap" id="map_wrapper">
<div id="map_canvass" style="width:100%;height:500px;"></div>
     </div>

	<div class="slider_outer_wrp" id="slider_wrapper1">
  
    <div class="slidder_wrp" class="container">
 
  <div id="myCarousel" class="carousel slide" data-ride="carousel">

  

    <!-- Wrapper for slides -->
    <div class="carousel-inner">
<!--     map photo
-->
             <?php
         if(isset($_GET['url'])){
        $userid= $_GET['url']; 
        $sql = "SELECT * FROM properties WHERE id='$userid'";
      $result = $conn->query($sql);
     if ($result->num_rows > 0){
        while($row = $result->fetch_assoc()) {
      
      $img=$row['image'];
      $lat=$row['latitude'];
      $lng=$row['longitude'];
      $price=$row['price'];
       echo "<div class='item active'>";
       echo"<img src='".$upload_dir.$img."'  style='width:100%; height:300px;' alt='image'>";
       echo"</div>";    
    
} 
    }else{
        
    die( "that properties could`t be found !"); 
    } 
 } 
        
        
        
      
     ?>
<?php 
        
        //photo here...........
         if(isset($_GET['url'])){
        $userid= $_GET['url']; 
       $sql = "SELECT * FROM addphoto WHERE propertyId='$userid'";
       $result = $conn->query($sql);
      if ($result->num_rows > 0){
        while($row = $result->fetch_assoc()) {
   
      $addedAmage=$row['photo'];
    echo"<div class='item'>";
    echo "<img src='".$upload_dir.$addedAmage."' alt='image' style='width:100%; height:300px;'>";
    echo "</div>";        
          
    
    
} 
        


    }else{
        
    die( "that properties could`t be found !!!!!"); 
    }   
      
         }
        ?>
     <!--looping-->
     
    
      
    </div>

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
 
 
</div>
     </div>
 
    </div>       
<hr>

<div><footer>
  <div class="footer-item"><ul>
  <li><a href="#">Hospitality</a></li>  
  </ul></div>
  <div class="footer-item"><ul><li><a href="#">site map</a></li></ul></div>
  <div class="footer-item"><ul><li><a href="#">social media</a></li></ul></div>  
		</footer></div>
     
</body>
</html>