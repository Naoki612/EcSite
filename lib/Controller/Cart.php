<?php

class Cart extends Controller {

	private $itemRepository;

	public function __construct() {
		parent::__construct();
		$this->itemRepository = new ItemRepository();
	}


	public function run() {
		if (isset($_SESSION['items'])){
			$items = $_SESSION['items'];
		} else {
			$items = array();
		}
		if ($_SERVER['REQUEST_METHOD'] === 'POST') {
			if (isset($_POST['itemNo'])){
				$item = $_POST;
			}
			array_push($items, $item);
		}
		if (isset($_GET['key'])) {
			$key = $_GET['key'];
			unset($items[$key]);
			array_merge($items);
		}
		$_SESSION['items'] = $items;

		$itemInfo = $this->itemInfo($items);
		return $itemInfo;
	}

	public function itemInfo($items) {
		foreach ($items as $key => $item) {
			$itemInfo[$key]['info'] = $this->itemRepository->getItemInfo($item['itemNo']);
			$itemInfo[$key]['info']['img'] = $this->itemRepository->getFirstImage($item['itemNo'], $item['colorNo']);
			$itemInfo[$key]['info']['colorName'] = $this->itemRepository->getColor($item['colorNo']);
			$itemInfo[$key]['info']['colorNo'] = $item['colorNo'];
			$itemInfo[$key]['info']['stock'] = $item['itemStock'];
			$itemInfo[$key]['info']['size'] = $item['size'];
		}
		return $itemInfo;
	}

	function sizeView($itemSize) {
		$size = substr($itemSize, 0, 2);
		$size = $size . '.' . substr($itemSize, -1);
		echo $size;
	}
}