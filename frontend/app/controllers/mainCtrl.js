(function(){
  var app=angular.module("app");
	app.controller("mainCtrl",myFunc)
	function myFunc(){
		var main=this;
		main.title="hello! angular is working"
	}
})();