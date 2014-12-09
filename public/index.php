<?php

use Ipf\Test\Test;
ini_set('display_errors', 1);

require_once '../app/conf/init.php';

$req = new Ipf\Http\Request('/todo/tasks');
$res = new Ipf\Http\Response();

/*echo $r->getUri();
echo '<br/>';
echo $req->getMethod();
var_dump($req->isGet());
var_dump($_SERVER);
var_dump($req->getRawBody());
$res->setBody(json_encode(array('hello' => 'world')));
$res->setHeader('Content-Type', 'application/json')->setStatusCode(404);
$res->output();*/

$route = array("/todo/tasks" => "test");

if (isset($route[$req->getUri()]) && function_exists($route[$req->getUri()])) {
	$route[$req->getUri()]();
}

function test() {
	echo 'test';
}