<?php
namespace Todo\Repository;

use Ipf\Db\Connection;
use Todo\Model\Todo;

class Todo{
	private $resource;
	
	public function __construct(Connection $c){
		$this->resource = $c->getResource();
	}
	
	public function findAll() {
		$sql = 'SELECT * FROM todo';
		$query = $this->resource->query($sql);
		$todos[];		
		
		foreach ($query as $row) {
			$todos[] = $this->rowToObject($row);
		}
		
		return $todos;
	}
	
	public function rowToObject() {
		$todo = new Todo();
		$todo->setId($row['id']);
		$todo->setText($row['text']);
		$todo->setDate($row['date']);
		return $todo;
	}
}