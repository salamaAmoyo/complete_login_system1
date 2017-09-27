/*(function(){
	var app=angular.module("app")
	app.controller("actor",function($http,$routeParams){
	var vm=this;
	//console.log($routeParams)	
	//vm.title="actor page"	
	 var promise=$http.get("app/database/photo.json")
	   promise.then(function(response){
		  currentId=$routeParams.actorId; 
	     var actors=response.data; 
		   for(var i=0;i<actors.length;i++){
			   if(actors[i].id==currentId){
				 vm.currentActor=actors[i];
				   break;
			   }
		   }
	  })
	})
})();*/

(function () {
	var app = angular.module("app")
	app.controller("actor", function ($http, $routeParams) {
		var vm = this;
		//console.log($routeParams)
		vm.title = "Actor Page"
		/*var promise = $http.get("app/database/photo.json")*/
		var promise = $http.get("app/database/select.php")
		promise.then(function (response) {
			currentId = $routeParams.actorId;
			var actors = response.data;
			for (var i = 0; i < actors.length; i++) {
				if (actors[i].id == currentId) {
					vm.currentActor = actors[i];
					break;
				}
			}
		})
	})
})();