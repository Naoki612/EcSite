<?php

class UserRegi extends Model {
	public function createUser() {
		$userInfo = $_SESSION['userInfo'];
		try{
		/* トランザクションを開始する。オートコミットがオフになる */
			$this->db->beginTransaction();

			$sql = "INSERT INTO userInfo(userFirstName, userFirstNameK, userLastName, userLastNameK, userBirth, userSex, userTel)
					VALUES (:userFirstName, :userFirstNameK, :userLastName, :userLastNameK, :userBirth, :userSex, :userTel)";
			$stmh = $this->db->prepare($sql);
			$stmh->bindParam(':userFirstName', $userInfo['FirstName'], \PDO::PARAM_STR);
			$stmh->bindParam(':userFirstNameK', $userInfo['FirstNameK'], \PDO::PARAM_STR);
			$stmh->bindParam(':userLastName', $userInfo['LastName'], \PDO::PARAM_STR);
			$stmh->bindParam(':userLastNameK', $userInfo['LastNameK'], \PDO::PARAM_STR);
			$stmh->bindParam(':userBirth', $userInfo['userBirth'], \PDO::PARAM_STR);
			$stmh->bindParam(':userSex', $userInfo['userSex'], \PDO::PARAM_INT);
			$stmh->bindParam(':userTel', $userInfo['userTel'], \PDO::PARAM_INT);
			$stmh->execute();
			$user = $this->db->lastInsertId();

			$sql = "INSERT INTO userLogin(user, userEmail, userPass, userID, enable) VALUES (:user, :userEmail, :userPass, :userID, :enable)";
			$stmh = $this->db->prepare($sql);
			$stmh->bindParam(':user', $user, \PDO::PARAM_INT);
			$stmh->bindParam(':userEmail', $userInfo['userEmail'], \PDO::PARAM_STR);
			$stmh->bindParam(':userPass', $userInfo['userPass'], \PDO::PARAM_STR);
			$stmh->bindParam(':userID', $userInfo['userID'], \PDO::PARAM_STR);
			$stmh->bindParam(':enable', $userInfo['enable'], \PDO::PARAM_INT);
			$stmh->execute();

			$sql = "INSERT INTO userAddr(user, zip, pref01, addr01, addr02)
					VALUES (:user, :zip, :pref01, :addr01, :addr02)";
			$stmh = $this->db->prepare($sql);
			$stmh->bindParam(':user', $user, \PDO::PARAM_INT);
			$stmh->bindParam(':zip', $userInfo['zip'], \PDO::PARAM_STR);
			$stmh->bindParam(':pref01', $userInfo['pref01'], \PDO::PARAM_STR);
			$stmh->bindParam(':addr01', $userInfo['addr01'], \PDO::PARAM_INT);
			$stmh->bindParam(':addr02', $userInfo['addr02'], \PDO::PARAM_INT);
			$stmh->execute();
			$this->db->commit();
			echo '登録しました';
		} catch (RuntimeException $e) {
			$this->db-rollBack();
			http_response_code($e instanceof PDOException ? 500 : $e->getCode());
			$msgs[] = ['red', $e->getMessage()];
			var_dump($msgs);
		}
	}
}