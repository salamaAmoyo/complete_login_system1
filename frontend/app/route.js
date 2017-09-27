(function(){
  angular.module("app").config(function( $routeProvider){
	   $routeProvider.when("/",{
			
			templateUrl:"app/pages/homepage_gallery.php"
		}).when("/gallery",{
			templateUrl:"app/pages/homes.html"
		})
		   .when("/signup",{templateUrl:"../Register_folder2/register.html"})
      
           .when("/login",{templateUrl:"../login_folder2/index.php"})
      
	            .when("/contact",{
			templateUrl:"app/pages/contact.html"})
	   .when("/actor/:actorId",{templateUrl:"app/pages/actor.html",
			 controller:"actor",
			 controllerAs:"vm"})
	  
  })	
	
	
})();

