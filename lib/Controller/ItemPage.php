<?php

class ItemPage extends Controller {


	private $itemRepository;

	public function __construct() {
		parent::__construct();
		$this->itemRepository = new ItemRepository();
	}
	public function run() {
		$row = array();
		try{
			$row['itemInfo'] = $this->itemRepository->getItemInfo($_GET['itemNo']);
			$row['itemIMG'] = $this->itemRepository->getItemImage($_GET['itemNo'], $_GET['color']);
			$row['itemFirstIMG'] = $this->itemRepository->getFirstImage($_GET['itemNo'], $_GET['color']);
			$row['itemCategory'] = $this->itemRepository->getItemCategory($row['itemInfo']['itemCate']);
			$row['anotherItem'] = $this->itemRepository->getAthorItem($_GET['itemNo']);
			// 			if (!$row = $stmh->fetch()) {
			// 			}
		} catch (RuntimeException $e) {
			http_response_code($e instanceof PDOException ? 500 : $e->getCode());
			$msgs[] = ['red', $e->getMessage()];
		}
		return $row;
	}

	public function userRecommend($item) {
		$itemRank = $this->itemRepository->userRecommend($item);
		return $itemRank;
	}


	function getAthorItem($itemNo) {
		$stmh = $this->itemRepository->getAthorItem($itemNo);
		return $stmh;
	}
	public function viewDiscoutn($itemNo, $regularValue) {
		if($row = $this->itemRepository->getDiscountValue($itemNo)) {
			echo '<span class="orgPrice">¥'. $regularValue .'円</span>→<span class="valueTag">   特別特価</span>　'.$row['DiscountValue'].'円';
			return;
		}
		echo $regularValue.'円';
		return;
	}
	function viewDiscoutnItems($itemNo, $regularValue) {
		if($row = $this->itemRepository->getDiscountValue($itemNo)) {
			echo '<span class="inValue">'. $regularValue .'円</span>→<span class="sValue">'.$row['DiscountValue'].'円</span>';
			return ;
		}
		echo '<span class="sValue">'.$regularValue.'円</span>';
		return;
	}
}