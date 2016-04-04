<?php

class YourItem extends Controller {


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



	function getAthorItem($itemNo) {
		$stmh = $this->itemRepository->getAthorItem($itemNo);
		return $stmh;
	}
}