<?php
namespace Ipf\Rest;

use Ipf\Http\Request;
use Ipf\Http\Response;
use Ipf\Http\Router;
use Ipf\Rest\Result;
use Ipf\Rest\Result\NotFound;

class Api {
	private $router;
	private $response;
	
	public function __construct() {
		$this->router = new Router();
		$this->response = new Response();
	}	
	
	protected function getRequest() {
		return $this->router->getRequest();
	}
	
	/*public function getRouter(){
		return $this->router;
	}*/
	
	public function get($route, callable $callback) {
		$this->router->addRoute('GET', $route, $callback);
		return $this;
	}
	
	public function post($route, callable $callback) {
		$this->router->addRoute('POST', $route, $callback);
		return $this;
	}
	
	public function put($route, callable $callback) {
		$this->router->addRoute('PUT', $route, $callback);
		return $this;
	}
	
	public function delete($route, callable $callback) {
		$this->router->addRoute('DELETE', $route, $callback);
		return $this;
	}
	
	public function serve() {
		$result = $this->router->execute();
		
		
		if (!$result instanceof Result) {
			$result = new NotFound();
		}
		
		$this->output($result);
	}
	
	protected function output(Result $result) {
		$this->response->setHeader('Content-Type', 'application/json');
		$this->response->setStatusCode($result->code);
		$this->response->setBody(json_encode($result));
		$this->response->output();
	}
}