<?php


class InsertItems extends Admin {
	function run(){
// 		$brand = $_POST['brand'];
// 		$category = $_POST['category'];
// 		$color = $_POST['color'];
// 		$itemName = $_POST['itemName'];
// 		$ItemSex = $_POST['ItemSex'];
// 		$madein = $_POST['madein'];
// 		$value = $_POST['value'];
// 		$info = $_POST['info'];
// 		$uploadfile = $_FILES['uploadfile'];

// 		$_SESSION['brand'] = $_POST['brand'];
// 		$_SESSION['category'] = $_POST['category'];
// 		$_SESSION['color'] = $_POST['color'];
// 		$_SESSION['itemName'] = $_POST['itemName'];
// 		$_SESSION['ItemSex'] = $_POST['ItemSex'];
// 		$_SESSION['madein'] = $_POST['madein'];
// 		$_SESSION['value'] = $_POST['value'];
// 		$_SESSION['info'] = $_POST['info'];



		$brand = $_SESSION['brand'];
		$category = $_SESSION['category'];
		$color = $_SESSION['color'];
		$itemName = $_SESSION['itemName'];
		$ItemSex = $_SESSION['ItemSex'];
		$madein = $_SESSION['madein'];
		$value = $_SESSION['value'];
		$info = $_SESSION['info'];
		$uploadfile = $_SESSION['file'];
		var_dump($_SESSION);
		try {
			$sql = 'insert into itemNoTable (itemNo, itemName, itemValue, itemBrandNo, itemCate, 	ItemSex, itemInfo, itemFrom, date, regiDate)
				values (null, :itemName, :itemValue, :itemBrandNo, :itemCate, :ItemSex, :itemInfo, :itemFrom, now(), now())';

			$stmh = $this->db->prepare($sql);
			$stmh->bindParam(':itemName', $itemName, \PDO::PARAM_STR);
			$stmh->bindParam(':itemValue', $value, \PDO::PARAM_INT);
			$stmh->bindParam(':itemBrandNo', $brand, \PDO::PARAM_INT);
			$stmh->bindParam(':itemCate', $category, \PDO::PARAM_INT);
			$stmh->bindParam(':ItemSex', $ItemSex, \PDO::PARAM_INT);
			$stmh->bindParam(':itemInfo', $info, \PDO::PARAM_STR);
			$stmh->bindParam(':itemFrom', $madein, \PDO::PARAM_INT);
			$stmh->execute();
			$itemNo = $this->db->lastInsertId(itemNo);


			foreach ($uploadfile as $key => $tmpIMG){
				//ディレクトリの指定
				$updir = "../img/Item";
				//ファイルの取得
// 				$tmp_file = $uploadfile['tmp_name'][$key];
// 				list($file_name,$file_type) = explode(".",$uploadfile['name'][$key]);
				$copy_file = $brand . $color . $itemNo . '_' . $key . '.jpg';
				if (rename("../img/tmp/$tmpIMG","$updir/$copy_file")) {
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
		echo "登録しました";
	}
}