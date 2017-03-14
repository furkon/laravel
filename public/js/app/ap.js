var app = angular.module('myApp', ['angularUtils.directives.dirPagination'], function($interpolateProvider) {

	$interpolateProvider.startSymbol('<%');
    $interpolateProvider.endSymbol('%>');
});


app.controller('myController',function($scope, $http){
	$scope.index_data = []; //declare an empty array
	$http.get("products-list").success(function(response){ 
		// console.log(response);
		$scope.index_data = response;  //ajax request to fetch data into $scope.data
	});
	
	$scope.sort = function(keyname){
		$scope.sortKey = keyname;   //set the sortKey to the param passed
		$scope.reverse = !$scope.reverse; //if true make it false and vice versa
	}
});
