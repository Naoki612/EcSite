<?php

class Signup extends Controller {

	public function run() {
		if ($this->isLoggedIn()) {
			header('Location: ' . SITE_URL);
			exit;
		}

		if ($_SERVER['REQUEST_METHOD'] === 'POST') {
			$this->postProcess();
		}
	}

	protected function postProcess() {
		// validate
		try {
			$this->_validate();
		} catch (InvalidEmail $e) {	//メールアドレスの形式が異なるとき
// 			echo $e->getMessage();
// 			exit();

				$this->setErrors('email', $e->getMessage());
		} catch (InvalidPassword $e) {	//パスワードがセットされていない正しくない時
// 			echo $e->getMessage();
// 			exit();
				$this->setErrors('password', $e->getMessage());
		}

		if($this->hasError()){
		}	else{
			// create user
			try {
				$userModel = new User();
				$userModel->create([
					'email' => $_POST['email'],
					'password' => $_POST['password']
				]);
			} catch (DuplicateEmail $e) {
				$this->setErrors('email', $e->getMessage());
				return;
			}
			// redirect to login
		}
	}

	private function _validate() {
		if (!isset($_POST['token']) || $_POST['token'] !== $_SESSION['token']) {
			echo "Invalid Token!";
			exit;
		}
		if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
			throw new InvalidEmail();
		}

		if (!preg_match('/\A[a-zA-Z0-9]+\z/', $_POST['passwor'])) {
			throw new InvalidPassword();
		}
	}

}
