<?php

class InsertDiscount extends Admin {
	public function run() {
		if ($_SERVER['REQUEST_METHOD'] == 'POST'){
			$startDate = $_POST['sYear'] .'/'. $_POST['sMonth'] .'/'. $_POST['sDay'];
			$finishDate = $_POST['fYear'] .'/'. $_POST['fMonth'] .'/'. $_POST['fDay'];
			$value = $_POST['value'];
			$itemNo = $_POST['itemNo'];
			try{
				$categoryName = $_POST['category'];
				$sql = "INSERT INTO `Discount`(`DiscountValue`, `itemNo`, `StartDate`, `FinishDate`) VALUES (:DiscountValue,:itemNo, :StartDate,:FinishDate)";
				$stmh = $this->db->prepare($sql);
				$stmh->bindParam(':DiscountValue', $value, \PDO::PARAM_STR);
				$stmh->bindParam(':itemNo', $itemNo, \PDO::PARAM_STR);
				$stmh->bindParam(':StartDate', $startDate, \PDO::PARAM_STR);
				$stmh->bindParam(':FinishDate', $finishDate, \PDO::PARAM_STR);
				$stmh->execute();
				echo '値下げ' . $categoryName .'登録しました';
			} catch (RuntimeException $e) {
				http_response_code($e instanceof PDOException ? 500 : $e->getCode());
				$msgs[] = ['red', $e->getMessage()];
				var_dump($msgs);
			}
		}
	}
}