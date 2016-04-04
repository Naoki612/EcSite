<?php

class CartPro extends Controller{
	private $itemRepository;
	private $Sales;
	private $UserRepository;

	public function __construct() {
		parent::__construct();
		$this->itemRepository = new ItemRepository();
		$this->Sales = new Sales();
		$this->UserRepository = new UserRepository();
	}

	public function run() {
		if ($this->isLoggedIn()){
			if ($_POST['boughtPlan']==='regiAddr'){
				$this->Sales->setSales();
				unset($_SESSION['items']);
				header("location:top.php");
				exit();
			}	else {
			}
		} else {

		}
	}
	public function getUser() {
		$userInfo = $this->UserRepository->getUser($_SESSION['me']);
		return $userInfo;
	}
}