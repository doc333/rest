<?php

use Ipf\Rest\Result;
use Ipf\Rest\Result\NotFound;
use Todo\Api;
ini_set('display_errors', 1);

require_once '../app/conf/init.php';


$api = new Api();
$api->serve();













/*
 
 $req = new Ipf\Http\Request('/todo/task/6/t');
$res = new Ipf\Http\Response();

 $router = new Router();
$router->setRequest($req);
 $routes = array(
		"/todo/tasks/{id}" => "test",
		"/todo/test/{id}/{test}" => "test",
);

$router->setRoutes($routes);
$router->route();

function test($id, $test) {
	echo $test.'<br/>';
	echo $id
}


 echo $r->getUri();
 echo '<br/>';
 echo $req->getMethod();
 var_dump($req->isGet());
 var_dump($_SERVER);
 var_dump($req->getRawBody());
 $res->setBody(json_encode(array('hello' => 'world')));
 $res->setHeader('Content-Type', 'application/json')->setStatusCode(404);
 $res->output();
 $email = "toto@gmail.com";
 $mail = '/^[a-zA-Z0-9\-_]+@[a-zA-Z0-9\-_]+\.[a-zA-Z]{2,18}$/';
 $tel = '/^0[1-9][0-9]{8}|0[1-9][0-9.-]{12}|\+[0-9]{2}[1-9][0-9]{8}$/';*/
