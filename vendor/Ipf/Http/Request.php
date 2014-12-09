<?php

namespace Ipf\Http;

class Request {
	// URI
	// Récupérer la méthode GET, POST ...
	// Les paramètres
	// rawBody
	private $uri;
	private $params = [];
	private $rawBody = [];
	
	public function __construct($uri = null) {
		$this->setUri($uri);
	}

	public function setUri($uri) {
		if (null === $uri) {
			$uri = $this->getServer('REQUEST_URI');
		}
		
		$this->uri = (string) $uri;
		return $this;
	}
	
	public function getUri(){
		return $this->uri;
	}
	
	public function setParam($key, $value) {
		$this->params[$key] = $value;
		return $this;
	}
	
	public function setParams(array $params) {
		foreach ($params as $key => $value) {
			$this->setParam($key, $value);
		}
		return $this;
	}
	
	public function getParam($key) {
		if (!isset($this->params[$key])){
			return null;
		}
		
		return $this->params[$key];
	}
	
	public function getParams() {
		return $this->params;
	}
	
	
	public function getRawBody() {
		if (empty($this->rawBody)) {
			$body = file_get_contents('php://input');
			
			if (strlen(trim($body)) > 0) {
				parse_str($body, $this->rawBody);
			}
		}
		return $this->rawBody;
	}
	
	public function getServer($key = null){
		if ($key === null){
			return $_SERVER;
		}
		
		$key = strtoupper($key);
		
		if (isset($_SERVER[$key])){
			return $_SERVER[$key];
		}
		
		return null;
	}
	
	public function getMethod() {
		return $this->getServer('REQUEST_METHOD');
	}
	
	public function getGet($key = null) {
		if ($key === null){
			return $_GET;
		}
		
		if (isset($_GET[$key])){
			return $_GET[$key];
		}
		
		return null;
	}
	
	public function getPost($key = null) {
		if ($key === null){
			return $_POST;
		}
		
		if (isset($_POST[$key])){
			return $_POST[$key];
		}
		
		return null;
	}
	
	public function getPut() {
		
	}
	
	public function getDelete() {
		
	}
	
	public function isGet() {
		return 'GET' === $this->getMethod();
	}
	
	public function isPost() {
		return 'POST' === $this->getMethod();
	}
	
	public function isPut() {
		return 'PUT' === $this->getMethod();
	}
	
	public function isDelete() {
		return 'DELETE' === $this->getMethod();
	}
}