<?php

class ItemView extends Controller {

	private $itemRepository;

	public function __construct() {
		parent::__construct();
		$this->itemRepository = new ItemRepository();
	}

	public function run() {
		if (isset($_POST['sport'])){
			$stmh = $this->itemRepository->searchFit();
			var_dump($_POST);
		} else {
			try{
				$stmh = $this->itemRepository->search();
	// 			if (!$row = $stmh->fetch()) {
	// 			}
			} catch (RuntimeException $e) {
				http_response_code($e instanceof PDOException ? 500 : $e->getCode());
				$msgs[] = ['red', $e->getMessage()];
			}
		}
		return $stmh;
	}
	function viewDiscoutn($itemNo, $regularValue) {
		if($row = $this->itemRepository->getDiscountValue($itemNo)) {
			echo '<span class="inValue">'. $regularValue .'円</span>→<span class="sValue">'.$row['DiscountValue'].'円</span>';
			return ;
		}
		echo '<span class="sValue">'.$regularValue.'円</span>';
		return;
	}

}