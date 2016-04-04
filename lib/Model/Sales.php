<?php

class Sales extends DbManager {

	function setSales(){
		try{
			/* トランザクションを開始する。オートコミットがオフになる */
			$this->db->beginTransaction();
			$now = date("Ymd");
			$sql = "INSERT INTO sales(userNo, salesDay) VALUES (:userNo, :salesDay)";
			$this->execute($sql, array(
					':userNo' => $_SESSION['me'],
					':salesDay' => $now
			));
			$salesNo = $this->getLastAuto(salesNo);
			$sql = "INSERT INTO salesDetail(salesNo, itemNo, colorNo, itemStock, itemSize)
				VALUES (:salesNo, :itemNo, :colorNo, :itemStock, :itemSize)";
			foreach ($_SESSION['items'] as $key => $item){
				$this->execute($sql, array(
						':salesNo' => $salesNo,
						':itemNo' => $item['itemNo'],
						':colorNo' => $item['colorNo'],
						':itemStock' => $item['itemStock'],
						':itemSize' => $item['size']
				));
			}
			return $this->db->commit();
		} catch (RuntimeException $e) {
			$this->db-rollBack();
			http_response_code($e instanceof PDOException ? 500 : $e->getCode());
			$msgs[] = ['red', $e->getMessage()];
			var_dump($msgs);
		}
	}

	function getSales() {
		try{
			/* トランザクションを開始する。オートコミットがオフになる */
			$this->db->beginTransaction();
			$now = date("Ymd");
			$sql = "SELECT salesNo, salesDay FROM sales WHERE userNo = :userNo";
			$sales = $this->fetchAll($sql, array(
					':userNo' => $_SESSION['me'],
			));
			$sql = "SELECT salesNo, itemNo, colorNo, itemStock, itemSize FROM salesDetail WHERE  salesNo = :salesNo";
			foreach ($sales as $key => $sale){
				$salesDetail[$sale['salesNo']] = $this->fetchAll($sql, array(
						':salesNo' => $sale['salesNo']
				));
			}
			return $salesDetail;
		} catch (RuntimeException $e) {
			$this->db-rollBack();
			http_response_code($e instanceof PDOException ? 500 : $e->getCode());
			$msgs[] = ['red', $e->getMessage()];
			var_dump($msgs);
		}
	}

}