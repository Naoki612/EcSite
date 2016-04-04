<?php
class Top extends Controller {


	private $itemRepository;

	public function __construct() {
		parent::__construct();
		$this->itemRepository = new ItemRepository();
	}

	public function run() {
		$row = $this->itemRepository->getItemBrands();
		return $row;
	}
	public function rankItem($sex) {
		$itemRank = $this->itemRepository->getTopSales($sex);
		return $itemRank;
	}
}