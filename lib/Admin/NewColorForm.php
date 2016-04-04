<?php

class NewColorForm extends Admin {

	public function run() {
		if ($_SERVER['REQUEST_METHOD'] === 'POST') {
			$this->insertItem();
// 			header('Location: ' . SITE_URL . '/Admin/checkItem.php');
// 			exit;
		}
	}

	function getColor() {
		$sql = "SELECT colorNo, colorName, colorCode FROM colorTable";
		$stmh = $this->db->prepare($sql);
		$stmh->execute();
		return $stmh;
	}
	function getItemInfo($itemNo) {
		$sql = "SELECT itemBrandNo FROM itemNoTable WHERE itemNo = :itemNo";
		$stmh = $this->db->prepare($sql);
		$stmh->bindParam(':itemNo', $itemNo, \PDO::PARAM_INT);
		$stmh->execute();
		$row = $stmh->fetch(\PDO::FETCH_ASSOC);
		return $row;
	}
	function insertItem() {
		if (!($_POST['brand'] === '')) {
			$brand = $_SESSION['brand'] = $_POST['brand'];
		}
		if (!($_POST['color'] === '')) {
			$color = $_SESSION['color'] = $_POST['color'];
		}
		$uploadfile = $_SESSION['uploadfile'] = $_FILES['uploadfile'];
		$itemNo = $_POST['itemNo'];
		var_dump($itemNo);
		try {
			foreach ($uploadfile["tmp_name"] as $key => $value){
				$count++;
			}
			for ($key=0; $key<$count-1; $key++){
				//ディレクトリの指定
				$updir = "../img/Item";
				//ファイルの取得
				$tmp_file = $uploadfile['tmp_name'][$key];
				list($file_name,$file_type) = explode(".",$uploadfile['name'][$key]);
				$copy_file = $brand . $color . $itemNo . '_' . $key . '.jpg';
				if (move_uploaded_file($tmp_file,"$updir/$copy_file")) {
					chmod("$updir/$copy_file", 0644);
					echo $uploadfile["name"][$key] . "をアップロードしました。<br />";
				} else {
					echo "ファイルをアップロード出来ませんでした。";
				}
				try {
					$sql = 'INSERT INTO imageTable (itemNo, colorNo, itemIMGName, date)
						values (:itemNo, :colorNo, :itemIMGName, now())';

					$stmh = $this->db->prepare($sql);
					$stmh->bindParam(':itemNo', $itemNo, \PDO::PARAM_INT);
					$stmh->bindParam(':colorNo', $color, \PDO::PARAM_INT);
					$stmh->bindParam(':itemIMGName', $copy_file, \PDO::PARAM_STR);
					$stmh->execute();
				} catch (PDOException $Exception){
					print "エラー：" . $Exception->getMessage();
					exit;
				}
			}
		}catch (\PDOException $Exception) {
			print "エラー：" . $Exception->getMessage();
			exit;
		}
	}
}