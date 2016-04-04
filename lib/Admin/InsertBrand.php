<?php

class InsertBrand extends Admin {
	function run() {
		if ($_SERVER['REQUEST_METHOD'] === 'POST') {
			try {
				try {
					//ディレクトリの指定
					$updir = "../img/Brand";
					$brandName = $_POST['brandName'];
					$uploadfile = $_FILES['uploadfile'];
					//ファイルの取得
					$tmp_file = $uploadfile['tmp_name'];
					list($file_name,$file_type) = explode(".",$uploadfile['name']);
					$copy_file = $brandName . '.jpg';
					if (move_uploaded_file($tmp_file,"$updir/$copy_file")) {
						chmod("$updir/$copy_file", 0644);
						echo $uploadfile["name"] . "をアップロードしました。<br />";
					} else {
						echo "ファイルをアップロード出来ませんでした。";
					}
				}catch (\PDOException $Exception) {
					print "エラー：" . $Exception->getMessage();
					exit;
				}
				$sql = "INSERT INTO brandNo(brandName, brandImg) VALUES (:brandName,:brandImg)";
				$stmh = $this->db->prepare($sql);
				$stmh->bindParam(':brandName', $brandName, \PDO::PARAM_STR);
				$stmh->bindParam(':brandImg', $copy_file , \PDO::PARAM_STR);
				$stmh->execute();
				echo '登録しました';
			} catch (RuntimeException $e) {
				http_response_code($e instanceof PDOException ? 500 : $e->getCode());
				$msgs[] = ['red', $e->getMessage()];
				var_dump($msgs);
			}
		}
	}
	//あとでイメージチェック関数作成

	function cheackIMG() {
		// $_FILE['uploadfile']['error']の値の確認
		switch ($_FILES['uploadfile']['error']) {
			case UPLOAD_ERR_OK: //OK
				break;
			case UPLOAD_ERR_NO_FILE:
				throw new RuntimeException('ファイルが選択されていません', 400);
			case UPLOAD_ERR_INI_SIZE:
			case UPLOAD_ERR_FORM_SIZE:
				throw new RuntimeException('ファイルサイズが大きすぎます', 400);
			default:
				throw new RuntimeException('その他のエラーが発生しました',500);
		}
		// $_FILES['upfile']['mime']の値はブラウザ側で偽装可能なので
		// MIMEタイプを自前でチェックする
		if (!$info = @getimagesize($_FILES['uploadfile']['tmp_name'])) {
			throw new RuntimeException('有効な画像ファイルを指定してください', 400);
		}
		if (!in_array($info[2], [IMAGETYPE_GIF, IMAGETYPE_JPEG, IMAGETYPE_PNG], true)) {
			throw new RuntimeException('未対応の画像形式です', 400);
		}
		if ($_FILES["uploadfile"]["type"] == 'image/gif'){
			$imageType = 1;
		} else if($_FILES["uploadfile"]["type"] == 'image/jpeg'){
			$imageType = 2;
		} else if($_FILES["uploadfile"]["type"] == 'image/png'){
			$imageType = 3;
		}
	}
}