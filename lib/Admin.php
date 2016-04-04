<?php


class Admin {
	protected $db;

	public function __construct() {
		try {
			$this->db = new \PDO(DNS, DB_USER, DB_PASS);
		} catch (\PDOException $e) {
			echo $e->getMessage();
			exit;
		}
	}
}