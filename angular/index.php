<!DOCTYPE html>
<html>
    <head>
        <title>TODO supply a title</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body ng-app="myApp" ng-init="obj={title: 'Angularjs'}">
        
        <nav>
            <ul>
                <li><a href="#">Home</a></li>
                <li><a href="#/todo">Todo</a></li>
            </ul>
        </nav>
        
        
        <ng-view></ng-view>
        
        
        <script src="vendor/angular.min.js"></script>
        <script src="vendor/angular-route.min.js"></script>
        <script src="vendor/myApp/myApp.js"></script>
        <script src="vendor/myApp/controllers.js"></script>
    </body>
</html>
