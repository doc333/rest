<?php
namespace Todo\Model\Repository;

use Ipf\Db\Connection;
use Todo\Model\Todo as ModTodo;

class Todo{
	private $resource;
	
	public function __construct(Connection $c){
		$this->resource = $c->getResource();
	}
	
	public function findAll() {
		$sql = 'SELECT * FROM todo';
		$query = $this->resource->query($sql);
		$todos = [];		
		
		foreach ($query as $row) {
			$todos[] = $this->rowToObject($row);
		}
		
		return $todos;
	}
	
	public function insert(Todo $t) {
		$sql = 'INSERT INTO todo VALUES (NULL, ?, ?)';
		$stmt = $this->resource->prepare($sql);
		return $stmt->execute(array(
			$t->getText(), 
			$t->getDate()	
		));
	}
		
	public function rowToObject(array $row) {
		$todo = new ModTodo();
		$todo->setId($row['id']);
		$todo->setText($row['text']);
		$todo->setDate($row['date']);
		return $todo;
	}
}