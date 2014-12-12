<?php
namespace Todo\Model;

class Todo {
	private $id;
	private $text;
	private $date;
	
	public function getId() {
		return $this->id;
	}
	
	public function getText(){
		return $this->text;
	}
	
	public function getDate() {
		return $this->date;
	}
	
	public function setId($id) {
		$this->id = (int) $id;
		return $this;
	}
	
	public function setText($text) {
		$this->text = (string) $text;
		return $this;
	}
	
	public function setDate($date) {
		$this->date = (string) $date;
		return $date;
	}
}