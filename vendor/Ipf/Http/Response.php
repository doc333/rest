<?php

namespace Ipf\Http;

class Response {
	private $status = 'OK';
	private $statusCode = 200;
	private $headers = array();
	private $body;
	
	public function getStatus() {
		return $this->status;
	}
	
	public function setStatus($status) {
		$this->status = (string) $status;
		return $this;
	}
	
	public function getStatusCode() {
		return $this->statusCode;
	}
	
	public function setStatusCode($statusCode) {
		$this->statusCode =  (int) $statusCode;
		return $this;
	}
	
	public function getHeaders() {
		return $this->headers;
	}
	
	public function getHeader($key) {
		if (isset($this->headers[$key])) {
			return $this->headers[$key];
		}
		
		return null;
	}
	
	public function setHeader($key, $value) {
		$this->headers[$key] = $value;
		return $this;
	}
	
	public function setHeaders($headers) {
		foreach ($headers as $key => $value) {
			$this->setHeader($key, $value);
		}
		
		return $this;
	}
	
	public function setBody($body) {
		$this->body = $body;
		return $this;
	}
	
	public function getBody() {
		return $this->body;
	}
	
	public function output() {
		http_response_code($this->getStatusCode());
		
		foreach ($this->headers as $key => $value) {
			header(sprintf("%s: %s", $key, $value));
		}
		
		echo $this->getBody();
	}
}