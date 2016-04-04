<?php


class RegiForm extends Controller {
	private $userRepository;

	public function __construct() {
		parent::__construct();
		$this->userRepository = new UserRepository();
	}

	public function run() {
		if (!isset($_SESSION['token'])) {
			$_SESSION['token'] = bin2hex(openssl_random_pseudo_bytes(16));
		}
		if ($this->isLoggedIn()) {
			header('Location: ' . SITE_URL);
			exit;
		}
		if ($_SERVER['REQUEST_METHOD'] === 'POST') {
			$this->postProcess();
		}
		if (isset($_SESSION['userInfo'])) {
			global $userInfo;
			$userInfo = $_SESSION['userInfo'];
		}
	}
	protected function postProcess() {
		// validate
		$userInfo['FirstName'] = $_POST['custFirstName1'];
		$userInfo['LastName'] = $_POST['custLastName1'];
		$userInfo['FirstNameK'] = $_POST['custFirstName2'];
		$userInfo['LastNameK'] = $_POST['custLastName2'];
		$userInfo['userID'] = $_POST['userID'];
		$userInfo['userPass'] = password_hash($_POST['custLgPW2'], PASSWORD_DEFAULT);
		$userInfo['userEmail'] = $_POST['custLgMail1'];
		$userInfo['userTel'] = $_POST['custTel'];
		$userInfo['zip'] = $_POST['zip01'];
		$userInfo['pref01'] = $_POST['pref01'];
		$userInfo['addr01'] = $_POST['addr01'];
		$userInfo['addr02'] = $_POST['addr02'];
		$userInfo['year'] = $_POST['custBirt_y'];
		$userInfo['month'] = $_POST['custBirt_m'];
		$userInfo['day'] = $_POST['custBirt_d'];
		$userInfo['userBirth'] = $userInfo['year'] . '/' . $userInfo['month'] . '/'. $userInfo['day'];
		$userInfo['userSex'] = $_POST['custSex'];
		$userInfo['enable'] = 1;
		$_SESSION['userInfo'] = $userInfo;
		try {
			$this->_validate();
		} catch (InvalidEmail $e) {	//メールアドレスの形式が異なるとき
			$this->setErrors('email', $e->getMessage());
		} catch (DifferentEmail $e) {	//メールアドレスが異なるとき
			$this->setErrors('email', $e->getMessage());
		} catch (InvalidPassword $e) {	//パスワードがセットされていない正しくない時
			$this->setErrors('password', $e->getMessage());
		} catch (DifferentPassword $e) {	//PASSWORDが異なるとき
			$this->setErrors('password1', $e->getMessage());
		} catch (KanjiName $e) {	//名前漢字されていない正しくない時
			$this->setErrors('kanjiName', $e->getMessage());
		} catch (KanaName $e) {	//名前かながセットされていない正しくない時
			$this->setErrors('kanaName', $e->getMessage());
		} catch (UserID $e) {	//ユーザーIDがセットされていない正しくない時
			$this->setErrors('userID', $e->getMessage());
		} catch (InvalidZip $e) {	//郵便番号がセットされていない正しくない時
			$this->setErrors('zip', $e->getMessage());
		} catch (InvalidPref01 $e) {	//都道府県がセットされていない正しくない時
			$this->setErrors('pref01', $e->getMessage());
		} catch (InvalidAddr01 $e) {	//市町村がセットされていない正しくない時
			$this->setErrors('addr01', $e->getMessage());
		} catch (InvalidAddr02 $e) {	//番地以降がセットされていない正しくない時
			$this->setErrors('addr02', $e->getMessage());
		} catch (InvalidTel $e) {	//電話番号がセットされていない正しくない時
			$this->setErrors('tel', $e->getMessage());
		} catch (InvalidBirth $e) {	//誕生日がセットされていない正しくない時
			$this->setErrors('birth', $e->getMessage());
		} catch (InvalidSex $e) {	//性別がセットされていない正しくない時
			$this->setErrors('sex', $e->getMessage());
		}

		if($this->hasError()){
			$this->userRepository->insertUser($userInfo);
		}	else{
			header("Location: ./checkUserRegi.php");
			exit();
		}
	}

	private function _validate() {
		// 		if (!isset($_POST['token']) || $_POST['token'] !== $_SESSION['token']) {
		// 			echo "Invalid Token!";
		// 			exit;
		// 		}
		//メールアドレスに関するエラーチェック
		if (!$_POST['custLgMail1'] == $_POST['custLgMail2']){
			throw new InvalidEmail();
		}
		if (!filter_var($_POST['custLgMail1'], FILTER_VALIDATE_EMAIL)) {
			throw new InvalidEmail();
		}
		if (!filter_var($_POST['custLgMail2'], FILTER_VALIDATE_EMAIL)) {
			throw new InvalidEmail();
		}
		if(!$_POST['custLgMail1'] == $_POST['custLgMail2']){
			throw new DifferentEmail();
		}
		if(!$this->userRepository->EmailExist($_POST['custLgMail1'])){
			throw new InvalidEmail();
		}
		//パスワードに関するエラー
		// 		if (!preg_match('/\A[a-zA-Z0-9]+\z/', $_POST['custLgPW1'])) {
		// 			throw new InvalidPassword();
		// 		}
		// 		if (!preg_match('/\A[a-zA-Z0-9]+\z/', $_POST['custLgPW2'])) {
		// 			throw new InvalidPassword();
		// 		}
		if (!$_POST['custLgPW'] == $_POST['custLgPW2']){
			throw new DifferentPassword();
		}
		//名前に関するエラー
		if ($_POST['custLastName1'] == '' || $_POST['custFirstName1'] == ''){
			throw new KanjiName();
		}
		if($_POST['custFirstName2'] == '' || $_POST['custLastName2'] == '') {
			throw new KanaName();
		}
		//ユーザーIDに関するエラー
		if($_POST['userID'] == ''){
			throw new UserID();
		}
		if($this->userRepository->UserIdExist($_POST['userID'] == '')) {
			throw new UserID();
		}
		//住所に関するエラー
		if($_POST['zip01'] == ''){
			throw new InvalidZip();
		}
		if($_POST['pref01'] == ''){
			throw new InvalidPref01();
		}
		if($_POST['addr01'] == ''){
			throw new InvalidAddr01();
		}
		if($_POST['addr02'] == ''){
			throw new InvalidAddr02();
		}
		//電話番号に関するエラー
		if($_POST['custTel'] == ''){
			throw new InvalidTel();
		}
		//誕生日に関するエラー
		if($_POST['custBirt_y'] == '' || $_POST['custBirt_m'] == '' || $_POST['custBirt_d'] == ''){
			throw new InvalidBirth();
		}
		//性別に関するエラー
		if($_POST['custSex'] == ''){
			throw new InvalidSex();
		}
	}
}
