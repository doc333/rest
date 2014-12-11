<?php
namespace Ipf\Db;

class Connection {
	private $resource = null;
	
	public function __construct($dsn, $username, $password, $opts = []) {
		try {
			$this->resource = new \PDO($dsn, $username, $password, $opts);
		} catch (\PDOException $e) {
			throw $e;
		}
	}
	
	/**
	 * @return \PDO
	 */
	public function getResource() {
		return $this->resource;
	}
}