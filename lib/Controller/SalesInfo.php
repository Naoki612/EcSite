<?php

class SalesInfo extends Controller {
	private $itemRepository;
	private $Sales;

	public function __construct() {
		parent::__construct();
		$this->itemRepository = new ItemRepository();
		$this->Sales = new Sales();
	}

	public function run() {
		$salesDetail = $this->Sales->getSales();
		foreach ($salesDetail as $salesNo => $sales){
			foreach ($sales as $key => $sale){
				$itemInfo = $this->itemRepository->getItemInfo($sale['itemNo']);
				$itemImg = $this->itemRepository->getFirstImage($sale['itemNo'], $sale['colorNo']);
				$salesDetails[$salesNo][$key] = array_merge($itemInfo, $sale);
				$salesDetails[$salesNo][$key]['itemIMG'] = $itemImg;
				$salesDetails[$salesNo][$key]['colorName'] = $this->itemRepository->getColor($sale['colorNo']);
			}
		}
		return $salesDetails;
	}

	function sizeView($itemSize) {
		$size = substr($itemSize, 0, 2);
		$size = $size . '.' . substr($itemSize, -1);
		echo $size;
	}
}