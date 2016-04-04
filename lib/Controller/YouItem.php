<?php

class YouItem extends Controller {
	private $itemRepository;

	public function __construct() {
		parent::__construct();
		$this->itemRepository = new ItemRepository();
	}

	public function run() {
		try{
			$stmh = $this->itemRepository->search();
// 			if (!$row = $stmh->fetch()) {
// 			}
		} catch (RuntimeException $e) {
			http_response_code($e instanceof PDOException ? 500 : $e->getCode());
			$msgs[] = ['red', $e->getMessage()];
		}
		return $stmh;
	}
}