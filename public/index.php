<?php

use Ipf\Test\Test;
use Ipf\Http\Routeur;
ini_set('display_errors', 1);

require_once '../app/conf/init.php';

$req = new Ipf\Http\Request('/todo/test/9/test');
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

$routeur = new Routeur();

$routes = array(
		"/todo/tasks/{id}" => "test",
		"/todo/test/{id}/{test}" => "test",
);

$routeur->setRoutes($routes);

$routeur->route($req);

function test(array $params) {
	foreach ($params as $key => $param) {
		echo $key . '=>' . $param . '<br/>';
	}
}

/*$email = "toto@gmail.com";
$mail = '/^[a-zA-Z0-9\-_]+@[a-zA-Z0-9\-_]+\.[a-zA-Z]{2,18}$/';
$tel = '/^0[1-9][0-9]{8}|0[1-9][0-9.-]{12}|\+[0-9]{2}[1-9][0-9]{8}$/';


if (preg_match($pattern, $email)) {
	echo 'ok';
}
else {
	echo 'fail';
}*/