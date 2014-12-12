'use strict';

app.controller('homeCtrl', function ($scope) {
    
});

app.controller('todoCtrl', function ($scope, $http) {
     $scope.todos = [];    
     
     getTodo();
     
     $scope.addTask = function (event) {
         if(event.keyCode == 13 && $scope.task) {
            $scope.todos.push({text: $scope.task});
            $scope.task = "";
         }
     };
     
     $scope.deleteTask = function (index) {
         $scope.todos.splice(index, 1);
     };
     
     function getTodo() {
        $http.get('http://api.ipf.com/todos').success(
            function (response) {
                $scope.todos = response.data;
            }
        );
     }
});