<?php
namespace Todo\Model;

class Todo {
	private $text;
	private $date;
	
	public function getText(){
		return $this->text;
	}
	
	public function getDate() {
		return $this->date;
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