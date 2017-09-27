(function(){
    
   
	var app=angular.module("app");
	   app.controller("actorsCtrl",actorsFunc)
	   function actorsFunc($http,$location){
		 var ctrl=this;
		  ctrl.title="this is actors address processing controller" 
	   ctrl.goTo=function(id){
		   $location.path("/actor/"+id)
	   }
	   /*var promise=$http.get("app/database/photo.json")*/
	    var promise=$http.get("app/database/select.php")
	   promise.then(function(respose){
		   ctrl.actors=respose.data;
	   })
	   }
	
})()


 /*var app = angular.module("app");  
 app.controller("actorsCtrl", function( $http,$location){ 
     		 var ctrl=this;

       ctrl.goTo=function(id){
		   $location.path("/actor/"+id)
	   }
      $scope.displayData = function(){  
           $http.get("app/database/select.php")  
           .success(function(data){  
               ctrl.actors= data;  
           });  
      }  
 });*/


   /*   var app = angular.module("app"); 
 app.controller("actorsCtrl", function($scope, $http,$location){  
         $scope.goTo=function(id){
		   $location.path("/actor/"+id)
	   }
         
      $scope.displayData = function(){  
          $http.get("select.php")
     
           .success(function(data){  
                $scope.names =data;  
           });  
      }  
 });
     */