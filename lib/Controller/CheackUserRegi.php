<?php


class CheackUserRegi extends Controller {

	public function run() {

		$this->postProcess();
		if (!isset($_SESSION['token'])) {
			$_SESSION['token'] = bin2hex(openssl_random_pseudo_bytes(16));
		}
		if ($this->isLoggedIn()) {
			header('Location: ' . SITE_URL);
			exit;
		}
		if ($_SERVER['REQUEST_METHOD'] === 'POST') {
			if (!$_POST['regist'] == '') {
				header("Location: ./userRegi.php");
			} else if (!$_POST['back'] == '') {
				header("Location: ./regiForm.php");
			}
		} else {
		}
	}
	protected function postProcess() {
		global $userInfo;
		$userInfo = $_SESSION['userInfo'];
	}

	private function _validate() {
		if (!isset($_POST['token']) || $_POST['token'] !== $_SESSION['token']) {
			echo "Invalid Token!";
			exit;
		}
	}
}