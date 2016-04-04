<?php
	/*データベース接続関数*/
	function db_connect(){
		require_once('../Config/config.php');
		//DSN組み立て

		try{
			$pdo = new PDO(DNS,DB_USER);
			$pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
			$pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES,false);
		}catch(PDOException $Exception){
			die('エラー:' .$Exception->getMessage());
		}
		return $pdo;
	}
	/*スペシャルキャラ*/
	function h($s){
		return htmlspecialchars($s,ENT_QUOTES,"UTF-8");
	}

?>