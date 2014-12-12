'use strict';

var app = angular.module('myApp', ['ngRoute']);

app.config(function($routeProvider){
    
    $routeProvider.when('/', {
        templateUrl: 'vendor/myApp/views/home.html',
        controller: 'homeCtrl'
    })
    
    .when('/todo', {
        templateUrl: 'vendor/myApp/views/todo.html',
        controller: 'todoCtrl'
    })
    
    .otherwise({redictTo: "/"});
    
});
            