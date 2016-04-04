<?php
abstract class DbManager {
	protected $db;

	public function __construct() {
		try {
			$this->db = new \PDO(DNS, DB_USER, DB_PASS);
		} catch (\PDOException $e) {
			echo $e->getMessage();
			exit;
		}
	}

	public function execute($sql, $params = array()) {
		$stmt = $this->db->prepare($sql);
		$stmt->execute($params);
		return $stmt;
	}

	public function fetch($sql, $params = array()) {
		return $this->execute($sql, $params)->fetch(PDO::FETCH_ASSOC);
	}

	public function fetchAll($sql, $params = array()) {
		return $this->execute($sql, $params)->fetchAll(PDO::FETCH_ASSOC);
	}

	public function getLastAuto($id) {
		$lastId = $this->db->lastInsertId($id);
		return $lastId;
	}
}