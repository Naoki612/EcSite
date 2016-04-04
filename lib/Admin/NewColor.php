<?php


class NewColor extends Admin {

	public function run() {
		if ($_SERVER['REQUEST_METHOD'] === 'POST') {
			$this->cheackInput();
			$this->insertItem();
			// 			header('Location: ' . SITE_URL . '/Admin/checkItem.php');
			// 			exit;
		}
	}

	function getItem() {
		$sql = "SELECT itemNo, itemName, itemBrandNo, ItemSex FROM itemNoTable";
		$stmh = $this->db->prepare($sql);
		$stmh->execute();
		return $stmh;
	}
	function getImage($itemNo) {
		$sql = "SELECT ItemIMGName FROM imageTable WHERE itemNo =:itemNo AND ItemIMGName LIKE '%_0.jpg'";
		$stmh = $this->db->prepare($sql);
		$stmh->bindParam(':itemNo', $itemNo, \PDO::PARAM_INT);
		$stmh->execute();
		$IMG = $stmh->fetch(\PDO::FETCH_ASSOC);
		echo $IMG['ItemIMGName'];
	}
}