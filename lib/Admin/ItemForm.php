<?php

class ItemForm extends Admin {

	public function run() {
		if ($_SERVER['REQUEST_METHOD'] === 'POST') {
			$this->cheackInput();
			var_dump($_SESSION);
// 			header('Location: ' . SITE_URL . '/Admin/checkItem.php');
// 			exit;
		}
	}

	function getColor() {
		$this->db;
		$sql = "SELECT colorNo, colorName, colorCode FROM colorTable";
		$stmh = $this->db->prepare($sql);
		$stmh->execute();
		return $stmh;
	}
	function getBrandName() {
		$sql = "SELECT brandNo, brandName FROM brandNo";
		$stmh = $this->db->prepare($sql);
		$stmh->execute();
		return $stmh;
	}
	function getContory() {
		$sql = "SELECT madeinNo, countryCode, countryName FROM madeinTable";
		$stmh = $this->db->prepare($sql);
		$stmh->execute();
		return $stmh;
	}
	function getCategory() {
		$sql = "SELECT categoryNo, categoryName FROM categoryTable";
		$stmh = $this->db->prepare($sql);
		$stmh->execute();
		return $stmh;
	}

	//入力チェック
	function cheackInput() {
		if (!($_POST['brand'] === '')) {
			$brand = $_SESSION['brand'] = $_POST['brand'];
		}
		if (!($_POST['category'] === '')) {
			$category = $_SESSION['category'] = $_POST['category'];
		}
		if (!($_POST['color'] === '')) {
			$color = $_SESSION['color'] = $_POST['color'];
		}
		if (!($_POST['itemName'] === '')) {
			$itemName = $_SESSION['itemName'] = $_POST['itemName'];
		}
		if (!($_POST['madein'] === '')) {
			$madein = $_SESSION['madein'] = $_POST['madein'];
		}
		if (!($_POST['value'] === '')){
			$value = $_SESSION['value'] = $_POST['value'];
		}
		if (!($_POST['info'] === '')) {
			$info = $_SESSION['info'] = $_POST['info'];
		}
		if (!($_FILES['uploadfile'] === '')) {
			$uploadfile = $_SESSION['uploadfile'] = $_FILES['uploadfile'];
		}
	}
}
