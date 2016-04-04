<?php

class Header extends Controller {

	private $UserRepository;
	private $itemRepository;

	public function __construct() {
		parent::__construct();
		$this->itemRepository = new ItemRepository();
		$this->UserRepository = new UserRepository();
	}

	public function run() {
		if (isset($_GET[log])){
			session_destroy();
		}
		if ($_SERVER['REQUEST_METHOD'] != 'POST'){
			//setToken();
		} else {
			//checkToken();
			$formUserId = h($_POST['username']);
			$formPassword = h($_POST['password']);
			if ($formUserId == "") {
				$err['username'] = 'メールアドレスを入力してください';
			}
// 			else if(!checkmail($this->db, $formUserId)) {
// 				$err['username'] = "そのユーザー名もしくはメールアドレスは登録されていません";
// 			}
		if ($formPassword == ""){
				$err['password'] = 'パスワードを入力してください';
			}
			if (empty($err)){
				$user = $this->UserRepository->userLogin($formUserId, $formPassword);
				if (!empty($user)){
					$_SESSION['me'] = $user;
				} else {
					$err['password'] = 'パスワードが違います。';
				}
			} else {

			}
		}

		$stmh = $this->itemRepository->getItemBrands();
		return $stmh;
	}

	//クラス化前の関数
// 	}
// 	function EmailExist($email,$PDO){
// 		$sql = 'SELECT * FROM userLogin WHERE userEmail = :userEmail';
// 		$stmh = $PDO->prepare($sql);
// 		$stmh->bindParam(':userEmail', $email, PDO::PARAM_STR);
// 		$stmh->execute();
// 		$row = $stmh->fetchColumn();
// 		return $row;
// 	}

// 	function getImage($itemNo) {
// 		$sql = "SELECT ItemIMGName FROM imageTable WHERE itemNo =:itemNo AND ItemIMGName LIKE '%_0.jpg'";
// 		$stmh = $this->db->prepare($sql);
// 		$stmh->bindParam(':itemNo', $itemNo, \PDO::PARAM_INT);
// 		$stmh->execute();
// 		$IMG = $stmh->fetch(\PDO::FETCH_ASSOC);
// 		echo $IMG['ItemIMGName'];
// 	}
}