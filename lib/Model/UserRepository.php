<?php

class UserRepository extends DbManager {
// ユーザー登録
	public function insertUser($userInfo) {
		try{
			/* トランザクションを開始する。オートコミットがオフになる */
			$this->db->beginTransaction();
			$sql = "INSERT INTO userInfo(userFirstName, userFirstNameK, userLastName, userLastNameK, userBirth, userSex, userTel)
					VALUES (:userFirstName, :userFirstNameK, :userLastName, :userLastNameK, :userBirth, :userSex, :userTel)";
			$stmh = $this->execute($sql, array(
				':userFirstName' => $userInfo['FirstName'],
				':userFirstNameK' => $userInfo['FirstNameK'],
				':userLastName' => $userInfo['LastName'],
				':userLastNameK' => $userInfo['LastNameK'],
				':userBirth' => $userInfo['userBirth'],
				':userSex' => $userInfo['userSex'],
				':userTel' => $userInfo['userTel'],
			));
			$user = $this->db->lastInsertId();

			$sql = "INSERT INTO userLogin(user, userEmail, userPass, userID, enable) VALUES (:user, :userEmail, :userPass, :userID, :enable)";
			$stmh = $this->execute($sql, array(
					':user' => $user,
					':userEmail' => $userInfo['userEmail'],
					':userPass' => $userInfo['userPass'],
					':userID' => $userInfo['userID'],
					':enable' => $userInfo['enable'],
			));

			$sql = "INSERT INTO userAddr(user, zip, pref01, addr01, addr02)
					VALUES (:user, :zip, :pref01, :addr01, :addr02)";
			$stmh = $this->execute($sql, array(
					':user' => $user,
					':zip' => $userInfo['zip'],
					':pref01' => $userInfo['pref01'],
					':addr01' => $userInfo['addr01'],
					':addr02' => $userInfo['addr02'],
			));
			return $this->db->commit();
		} catch (RuntimeException $e) {
			$this->db-rollBack();
			http_response_code($e instanceof PDOException ? 500 : $e->getCode());
			$msgs[] = ['red', $e->getMessage()];
			var_dump($msgs);
		}
	}

// メールの登録チェック
	public function EmailExist($email){
		$sql = 'SELECT * FROM userLogin WHERE userEmail = :userEmail';
		$stmh = $this->fetch($sql, array(
				':userEmail' => $email
		));
		return $stmh;
	}
// ユーザーIDの登録チェック
	public function UserIdExist($userID){
		$sql = 'SELECT * FROM userLogin WHERE userID = :userID';
		$stmh = $this->fetch($sql, array(
				':userID' => $userID
		));
		return $stmh;
	}
//ユーザーログイン
	public function userLogin($userID, $userPass){
		$sql="SELECT user, userPass FROM userLogin where (userID=:username or userEmail=:email)";
		$user = $this->fetch($sql, array(
				':username' => $userID,
				':email' => $userID
		));
		if (password_verify($userPass, $user['userPass'])){
			return $user['user'];
		}
	}
//ユーザー情報の取得
	public function getUser($user) {
		$sql = 'SELECT zip, pref01, addr01, addr02 FROM userAddr WHERE user = :user';
		$userInfo = $this->fetch($sql, array(
				':user' => $user
		));
		$sql = 'SELECT userFirstName, userLastName FROM userInfo WHERE user = :user';
		$userName = $this->fetch($sql, array(
				':user' => $user
		));
		$userInfo = array_merge($userInfo, $userName);
		return $userInfo;
	}
}