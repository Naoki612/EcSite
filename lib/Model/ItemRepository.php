<?php

class ItemRepository extends DbManager {

	function search() {
		$sql = $this->createSearchSQL();
		$stmh = $this->execute($sql);
		return $stmh;
	}
	function searchFit() {
		$sql = $this->SearchFitSQL();
		$stmh = $this->execute($sql);
		return $stmh;
	}

	private function SearchFitSQL() {
		$minWidth = $_POST['itemWidth'] - 10;
		$maxWidth = $_POST['itemWidth'] + 10;
		$minWeight = $_POST['itemWeight'] - 10;
		$maxWeight = $_POST['itemWeight'] + 10;
		$minHeight = $_POST['itemHeight'] - 10;
		$maxHeight = $_POST['itemHeight'] + 10;
		$SQL = "SELECT ItemIMGName, itemValue, colorNo, itemName, ItemSex, itemNoTable.itemNo, itemNoTable.itemWeight, itemNoTable.itemHeight, itemNoTable.itemWidth FROM imageTable
		INNER JOIN itemNoTable ON imageTable.itemNo = itemNoTable.itemNo where ItemIMGName LIKE '%_0.jpg'
		and (itemNoTable.itemWidth >= $minWidth and itemNoTable.itemWidth <= $maxWidth)
		and (itemNoTable.itemWeight >= $minWeight and itemNoTable.itemWeight <= $maxWidth)
		and (itemNoTable.itemHeight >= $minHeight and itemNoTable.itemHeight <= $maxHeight)
		";
		return $SQL;
	}

	private function createSearchSQL() {
		$SQL = "SELECT ItemIMGName,itemValue,colorNo, itemName, ItemSex, itemNoTable.itemNo,itemNoTable.itemWeight, itemNoTable.itemHeight, itemNoTable.itemWidth FROM imageTable INNER JOIN itemNoTable ON imageTable.itemNo = itemNoTable.itemNo where ItemIMGName LIKE '%_0.jpg' ";
			if ((!isset($_GET['category']) || $_GET['category'] == '') && filter_var($_GET['category'], FILTER_VALIDATE_INT)){
			$SQL = $SQL . ' AND itemCate =' . $_GET['category'];
		}
		if (!(!isset($_GET['width']) || $_GET['width'] == '')){
			$SQL = $SQL . ' AND (';
			foreach ($_GET['width'] as $key => $value) {
				if ($key == 0) {
					$SQL = $SQL . ' itemWidth =' . "$value";
				} else {
					$SQL = $SQL . ' OR itemWidth =' . "$value";
				}
			}
			$SQL = $SQL . ')';
		}
		if (!(!isset($_GET['weight']) || $_GET['weight'] == '')){
			$SQL = $SQL . ' AND (';
			foreach ($_GET['weight'] as $key => $value) {
				if ($key == 0) {
					$SQL = $SQL . '  itemWeight =' . $value;
				} else {
				$SQL = $SQL . ' OR itemWeight =' . $value;
				}
			}
			$SQL = $SQL . ')';
		}
		if (isset($_GET['brandNo']) || !($_GET['brandNo'] == '') && filter_var($_GET['ItemSex'], FILTER_VALIDATE_INT)){
			$SQL = $SQL . ' AND itemBrandNo =' . $_GET['brandNo'];
		}
		if (isset($_GET['ItemSex']) || !($_GET['ItemSex'] == '') && filter_var($_GET['ItemSex'], FILTER_VALIDATE_INT)){
			$SQL = $SQL . ' AND ItemSex =' . $_GET['ItemSex'];
		}
		if((!isset($_GET['PAGE']) || $_GET['PAGE'] == '') && filter_var($_GET['PAGE'], FILTER_VALIDATE_INT)){
			$limit = $_GET['PAGE'] * 20;
		} else {
			$limit = 0;
		}
		$SQL = $SQL . ' LIMIT '. $limit . ', 20';
		return $SQL;
	}
//色の名前の取得のため
	function getColor($colorNo) {
		try{
			$sql = "SELECT colorName FROM colorTable WHERE colorNo = :colorNo";
			$row = $this->fetch($sql, array(
					':colorNo' => $colorNo
			));
		} catch (RuntimeException $e) {
			http_response_code($e instanceof PDOException ? 500 : $e->getCode());
			$msgs[] = ['red', $e->getMessage()];
		}
		return $row['colorName'];
	}
//アイテムの細かい情報取得のため
	function getItemInfo($itemNo) {
		try{
			$sql = "SELECT itemName, itemValue, itemWidth, itemWeight,itemHeight, itemCate, itemNo, itemInfo FROM itemNoTable where itemNo = :itemNo";
			$row = $this->fetch($sql, array(
					':itemNo'=> $itemNo
			));
		} catch (RuntimeException $e) {
			http_response_code($e instanceof PDOException ? 500 : $e->getCode());
			$msgs[] = ['red', $e->getMessage()];
		}
		return $row;
	}
//検索結果の画像表示のため
	function getFirstImage($itemNo,$colorNo) {
		$sql = "SELECT ItemIMGName FROM imageTable WHERE itemNo = :itemNo AND colorNo = :colorNo";
		try{
			$row = $this->fetch($sql, array(
					':itemNo' => $itemNo,
					':colorNo' => $colorNo
			));
		} catch (RuntimeException $e) {
			http_response_code($e instanceof PDOException ? 500 : $e->getCode());
			$msgs[] = ['red', $e->getMessage()];
		}
		return $row['ItemIMGName'];
	}
//カテゴリー取得のため
	function getItemCategory($categoryNo) {
		$sql = "SELECT categoryName FROM categoryTable WHERE categoryNo = :categoryNo";
		try{
			$row = $this->fetch($sql, array(
					':categoryNo' => $categoryNo
			));
		} catch (RuntimeException $e) {
			http_response_code($e instanceof PDOException ? 500 : $e->getCode());
			$msgs[] = ['red', $e->getMessage()];
		}
		return $row['categoryName'];
	}
//アイテムのイメージ取得のため
	function getItemImage($itemNo,$colorNo) {
		$sql = "SELECT ItemIMGName FROM imageTable WHERE itemNo = :itemNo AND colorNo = :colorNo";
		try{
			$stmh = $this->execute($sql, array(
					':itemNo' => $itemNo,
					':colorNo' => $colorNo
			));
		} catch (RuntimeException $e) {
			http_response_code($e instanceof PDOException ? 500 : $e->getCode());
			$msgs[] = ['red', $e->getMessage()];
		}
		return $stmh;
	}
//他の色のアイテム取得のため
	function getAthorItem($itemNo) {
		$sql = "SELECT ItemIMGName, colorNo FROM imageTable WHERE itemNo = :itemNo AND ItemIMGName LIKE '%_0.jpg'";
		try{
			$stmh = $this->execute($sql, array(
					':itemNo' => $itemNo
			));
		} catch (RuntimeException $e) {
			http_response_code($e instanceof PDOException ? 500 : $e->getCode());
			$msgs[] = ['red', $e->getMessage()];
		}
		return $stmh;
	}
//ブランド名やブランド番号取得のため
	function getItemBrands() {
		$sql = "SELECT brandNo, brandName, brandImg FROM brandNo limit 6";
		$row = $this->fetchAll($sql);
		return $row;
	}
//ランキングの作成のため
	function getTopSales($sex) {
		$sql = "SELECT sal.itemNo, sal.colorNo, SUM(sal.itemStock) FROM salesDetail sal
						inner join itemNoTable item on item.itemNo = sal.itemNo
						where item.itemSex = $sex or item.itemSex = 3
						GROUP BY itemNo, colorNo
						ORDER BY COUNT(sal.itemStock) DESC LIMIT 5";
		$row = $this->fetchAll($sql);
		foreach ($row as $key =>$item) {
			$itemInfo[$key] = $this->getItemInfo($item['itemNo']);
			$itemIMG = $this->getFirstImage($item['itemNo'], $item['colorNo']);
			$itemInfo[$key]['img'] = $itemIMG;
			$itemInfo[$key]['colorNo'] = $item['colorNo'];
		}
		return $itemInfo;
	}
//値下げ価格の取得のため
	function getDiscountValue($itemNo) {
		$sql = "SELECT DiscountValue FROM Discount WHERE StartDate < now() AND now() < FinishDate AND itemNo = $itemNo";
		$row = $this->fetch($sql);
		return $row;
	}

	function viewDiscoutn($itemNo, $regularValue) {
		if($row = $this->getDiscountValue($itemNo)) {
			return '<span class="inValue">'. $regularValue .'円</span>→<span class="sValue">'.$row['DiscountValue'].'円</span>';
		}
		return '<span class="sValue">'.$regularValue.'円</span>';
	}
//ユーザーおすすめ
	function userRecommend($item) {
		$minWidth = $item['itemWidth'] - 10;
		$maxWidth = $item['itemWidth'] + 10;
		$minWeight = $item['itemWeight'] - 10;
		$maxWeight = $item['itemWeight'] + 10;
		$minHeight = $item['itemHeight'] - 10;
		$maxHeight = $item['itemHeight'] + 10;
		$SQL = "SELECT ItemIMGName, itemValue, colorNo, itemName, ItemSex, itemNoTable.itemNo, itemNoTable.itemWeight, itemNoTable.itemHeight, itemNoTable.itemWidth FROM imageTable
		INNER JOIN itemNoTable ON imageTable.itemNo = itemNoTable.itemNo where ItemIMGName LIKE '%_0.jpg' and itemNoTable.itemNo !=". $item['itemNo'] ."
		and (itemNoTable.itemWidth >= $minWidth and itemNoTable.itemWidth <= $maxWidth)
		and (itemNoTable.itemWeight >= $minWeight and itemNoTable.itemWeight <= $maxWidth)
		and (itemNoTable.itemHeight >= $minHeight and itemNoTable.itemHeight <= $maxHeight) LIMIT 5
		";
		$row = $this->fetchAll($SQL);
		return $row;
	}
}