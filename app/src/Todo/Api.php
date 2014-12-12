<?php
namespace Todo;

use Ipf\Rest\Api as RestApi;
use Ipf\Rest\Result;
use Todo\Model\Repository\Todo as RepoTodo;
use Todo\Model\Todo as ModTodo;

class Api extends RestApi {
	protected $todoRepo;
	
	public function __construct(RepoTodo $todoRepo) {
		parent::__construct();
		$this->todoRepo = $todoRepo;
			
		$this->get('/todos', function() {
			$todos = $this->todoRepo->findAll();
			$result = new Result();
			
			if (empty($todos)) {
				$result->statusCode = 204;
				$result->data[] = array();
			} else {
				foreach ($todos as $todo) {
					$result->data[] = array(
						'text' => $todo->getText(),
						'date' => $todo->getDate()	
					);
				}
			}
			
			return $result;
		});
		
		$this->post('/todo/add', function() {
			$todo = new RepoTodo($db);
			$result = new Result();
			
			$value = $this->getRequest()->getPost();
			
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