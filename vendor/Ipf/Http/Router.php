<?php
namespace Ipf\Http;

class Router {
	private $routes = array();
	private $request;
	
	public function setRoute($key, $value) {
		$this->routes[$key] = $value;
		
		return  $this;
	}
	
	public function setRoutes($routes) {
		foreach ($routes as $key => $value) {
			$this->setRoute($key, $value);
		}
		
		return $this;
	}
	
	public function getRoute($key) {
		if (isset($this->routes[$key])){
			return $this->routes[$key];
		}
		
		return null;
	}
	
	public function getRoutes() {
		return $this->routes;
	}
	
	public function setRequest(Request $request) {
		$this->request = $request;
		return $this;
	}
	
	public function getRequest() {
		if ($this->request === null) {
			$this->request = new Request();
		}
		
		return $this->request;
	}
	
	public function route() {
		foreach ($this->routes as $route => $func) {
			$args = array();
			$arguments = array();
			$path = '';
		
			foreach (explode('/', $route) as $p) {
				if (!preg_match('/^{([\w\d]+)}$/', $p, $params)) {
					$path .= $p != '' ? '/'.$p : '';
				}
				else {
					$args[] = $params[1];
				}
			}
			$para = explode('/', substr($this->request->getUri(), strlen($path)));
			$path = str_replace('/', '\/', $path);
			$pattern = '/^'.$path.'$/';
			
			if (!empty($args)) {
				$pattern = '/^'.$path.'(?:\/[\d\w]*){'.sizeof($args).'}$/';
			}
			
			$i = 1;
			foreach ($args as $arg) {
				$arguments[$arg] = $para[$i];
				$i++;
			}
			
			if (preg_match($pattern, $this->request->getUri())) {
				call_user_func_array($func, $arguments);
			}
		}
	}
	
/*-----------------------------------------------------------------------------*/
	
	public function addRoute($method, $route, callable $callback) {
		$route = '#^'.$route.'$#';
		$this->routes[$route] = array(
				'method' => $method,
				'callback' => $callback,
		);
	
		return $this;
	}
	
	public function addRoutes(array $routes) {
		foreach ($routes as $route) {
			$this->addRoute(
					$route['method'],
					$route['route'],
					$route['callback']
			);
		}
	}
	
	public function execute(){
		$params = [];
		$req = $this->getRequest();
		$uri = $req->getUri();
		
		foreach ($this->routes as $route => $opts) {
			if ($opts['method'] === $req->getMethod() && preg_match($route, $uri, $params)) {
				
				array_shift($params);
				return call_user_func_array(
						$opts['callback'], 
						$params
				);
			}
		}
	}
}