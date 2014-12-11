<?php
namespace Todo;

use Ipf\Rest\Api as RestApi;
use Ipf\Rest\Result;

class Api extends RestApi {
	public function __construct() {
		parent::__construct();
		
		$this->get('/todos', function() {
			$result = new Result();
			$result->data = array('message' => 'ok all todos');
			return $result;
		});
		
		$this->post('/todo/add', function() {
			$value = $this->getRequest()->getPost();
			
			$result = new Result();
			$result->data = array('message' => 'ok add', 'values' => $value);
			$result->code = 201;
			return $result;
		});
		
		$this->put('/todo/update', function() {
			$result = new Result();
			$result->data = array('message' => 'ok update');
			return $result;
		});
		
		$this->delete('/todo/delete/([0-9]+)', function($id) {
			$result = new Result();
			$result->data = array('message' => 'ok delete');
			return $result;
		});
	}
}