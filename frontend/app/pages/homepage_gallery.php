<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
<!--
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>-->
  
 <style>
.carousel .item {
  height: 150px;
}

.item img {
    position: absolute;
    top: 0;
    left: 0;
    min-height: 150px;
}  
</style>
</head>
<body>



 <div ng-controller="actorsCtrl as photo"  class="photo" id="wrp1" >


	<div ng-repeat="actor in photo.actors">
	
        <h3 style="text-align:center;"><a href="../profile/{{actor.url}}"> {{actor.location}}</a></h3>
       
 
<div class="container" style="width:300px;">


  
  <div id="myCarousel" class="carousel slide" data-ride="carousel">
  

    <div class="carousel-inner" >
    <div  div class="item active" > 
        <img   width="300px"  height="150px"  ng-src="../upload_folder/{{actor.image}}" />
        </div>

       <div class="item" >
          <img width="300px"  height="150px" ng-src="../upload_folder/{{actor.photo}}"  >
        </div>
    
    

    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
    
    <!--<a class="left carousel-control"  data-slide="prev">-->
      <span class="glyphicon glyphicon-chevron-left"></span>
      <span class="sr-only">Previous</span>
    </a>
  <a class="right carousel-control" href="#myCarousel" data-slide="next">
  <!--  <a class="right carousel-control"  data-slide="next">-->
      <span class="glyphicon glyphicon-chevron-right"></span>
      <span class="sr-only">Next</span>
    </a>
        
       </div>
     </div>
	
    </div>
        </div>

    </div>
</body>
</html>


    