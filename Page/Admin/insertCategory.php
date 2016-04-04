<?php

require_once(__DIR__ . '/../../config/config.php');
$app = new InsertCategory();

$app->run();

?>
<!DOCTYPE html>
<html>
<head>
	<title>カテゴリ追加画面</title>
</head>
<body>
	<form action="insertCaregory.php" method="POST" enctype="multipart/form-data">
		<label><input type="text" name="category"></label>
		<input type="submit" value="登録">
	</form>
</body>
</html>