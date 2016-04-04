<?php

class CheckItem extends Admin {

	function run(){
		$brand = $_POST['brand'];
		$category = $_POST['category'];
		$color = $_POST['color'];
		$itemName = $_POST['itemName'];
		$ItemSex = $_POST['ItemSex'];
		$madein = $_POST['madein'];
		$value = $_POST['value'];
		$info = $_POST['info'];
		$uploadfile = $_FILES['uploadfile'];

		$_SESSION['brand'] = $_POST['brand'];
		$_SESSION['category'] = $_POST['category'];
		$_SESSION['color'] = $_POST['color'];
		$_SESSION['itemName'] = $_POST['itemName'];
		$_SESSION['ItemSex'] = $_POST['ItemSex'];
		$_SESSION['madein'] = $_POST['madein'];
		$_SESSION['value'] = $_POST['value'];
		$_SESSION['info'] = $_POST['info'];

		$count =0;
		foreach ($uploadfile["tmp_name"] as $key => $value){
			$count++;
		}
		for ($key=0; $key<$count-1; $key++){
			//ディレクトリの指定
			$updir = "../img/tmp";
			//ファイルの取得
			$tmp_file = $uploadfile['tmp_name'][$key];
			list($file_name,$file_type) = explode(".",$uploadfile['name'][$key]);
			$copy_file = $brand . $color . $itemNo . '_' . $key . '.jpg';
			$_SESSION['file'][$key] = $copy_file;
			if (move_uploaded_file($tmp_file,"$updir/$copy_file")) {
				chmod("$updir/$copy_file", 0644);
				$_SESSION['file'][$key] = $copy_file;
				echo $uploadfile["name"][$key] . "をアップロードしました。<br />";
			} else {
				echo "ファイルをアップロード出来ませんでした。";
			}
		}
	}
}