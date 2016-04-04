<?php

require_once(__DIR__ . '/../../config/config.php');

$app = new InsertBrand();

$app->run();

?>
<!DOCTYPE html>
<html>
<head>
	<title>ブランド追加画面</title>
</head>
<body>
	<form action="" method="POST" enctype="multipart/form-data">
		<label><input type="text" name="brandName"></label>
		<input type="file" name="uploadfile">
		<input type="submit" value="登録">
	</form>
</body>
</html>