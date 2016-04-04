<?php

class UserRegi extends Controller {

	private $userRepository;

	public function __construct() {
		parent::__construct();
		$this->userRepository = new UserRepository();
	}

	public function run () {
		if($this->userRepository->insertUser($_SESSION['userInfo'])) {
			unset($_SESSION['userInfo']);
			echo '登録完了しました';
		} else {
			header("Location: ./regiForm.php");
		}
	}

}