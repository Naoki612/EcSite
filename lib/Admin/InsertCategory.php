<?php

class InsertCategory extends Admin {
	function run() {
		if ($_SERVER['REQUEST_METHOD'] == 'POST'){
			try{
				$categoryName = $_POST['category'];
				$sql = "INSERT INTO categoryTable(categoryName) VALUES (:categoryName)";
				$stmh = $this->db->prepare($sql);
				$stmh->bindParam(':categoryName', $categoryName, \PDO::PARAM_STR);
				$stmh->execute();
				echo 'カテゴリー' . $categoryName .'登録しました';
			} catch (RuntimeException $e) {
				http_response_code($e instanceof PDOException ? 500 : $e->getCode());
				$msgs[] = ['red', $e->getMessage()];
				var_dump($msgs);
			}
		}
	}
}