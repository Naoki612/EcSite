<?php

require_once(__DIR__ . '/../../config/config.php');

$app = new ItemForm();

$app->run();
?>
<html>
<head>
<script src="../jquery/jquery-1.11.3.js">
</script>
<script type="text/javascript">
//色がクリックされた時
try{
	document.addEventListener ('click',function(e){clickfunc(e)},true);
}catch(e){
	document.attachEvent('onclick',function(e){clickfunc(e)});
}
function clickfunc(e){
	var t = (e.srcElement || e.target);
	if(t.nodeName=="LI"){
		var flg = 0;
		pulldown_option = document.getElementById('color').getElementsByTagName('option');
		for(i=0; i<pulldown_option.length && flg==0;i++ ){
			//プルダウンの値と等しい時セレクトボックスを変更
			if(pulldown_option[i].value == t.value){
				pulldown_option[i].selected = true;
				flg=1;
			}
		}
	}
}
//イメージの追加用スクリプト
$(function fileInputChange() {
	$('.inputFile').on("change", function() {
		var idName = $(this).get(0).className.split(" ")[1];
		var className = $("#imageList").children('img:nth-child(n)').attr('class');
		var n = 1;
		var file = this.files[0];// 2. files配列にファイルを取得
		var fileReader = new FileReader();   // 3. ファイルを読み込むFileReaderオブジェクト
		// 4. 読み込みが完了した際のイベントハンドラ。imgのsrcにデータをセット
		fileReader.onload = function(event) {
			// 読み込んだデータをimgに設定
			$('.'+idName).attr('src', fileReader.result);
		};
		// 5. 画像読み込み
		fileReader.readAsDataURL(file);
		//フォームの追加プログラム
		if($("#filelist").find(".inputFile").filter(":last").val() != ""){
			var size = $("#filelist").children('li').length;
			//イメージの表示スペースの確保
			$("#imageList").append('<img src="" alt="" class="image'+size+'" width="200" height="200">');
			size = size+ 1;
			//フォームを追加
			$("#filelist").append('<li><input type="file" name="uploadfile[]" class="inputFile image'+size+'" /></li>')
			.bind('change', fileInputChange);
		}
	});
});
</script>
</head>
<body>
<form action="insertItems.php" method="POST" enctype="multipart/form-data">
<input type="radio" value="1" name="ItemSex">男
<input type="radio" value="2" name="ItemSex">女<br>
重:軽い<input type="range" name="weight">重い<br>
幅:狭い <input type="range" name="width">広い<br>
高さ:低い <input type="range" name="width">高い<br>
	<select id="brand" name="brand">
<?php
	//ブランドリストのプログラム
	$stmh = $app->getBrandName();
	while($row = $stmh->fetch(\PDO::FETCH_ASSOC)){
?>
	<option value="<?=$row['brandNo']?>"><?= $row['brandName'] ?></option>
<?php
	}
?>
	</select><br>
	<select id="madein" name="madein">
<?php
	//生産国リストのプログラム
	$stmh = $app->getContory();
	while($row = $stmh->fetch(\PDO::FETCH_ASSOC)){
?>
	<option value="<?=$row['madeinNo']?>"><?= $row['countryCode'] ?></option>
<?php
	}
?>
</select><br>
<select id="category" name="category">
<?php
	//カテゴリリストのプログラム
	$stmh = $app->getCategory();
	while($row = $stmh->fetch(\PDO::FETCH_ASSOC)){
?>
	<option value="<?=$row['categoryNo']?>"><?= $row['categoryName'] ?></option>
<?php
	}
?>
</select><br>
	<select id="color" name="color">
<?php
	//カラーリストのプログラム
	$stmh = $app->getColor();
	while($row = $stmh->fetch(\PDO::FETCH_ASSOC)){
?>
	<option value="<?=$row['colorNo']?>"><?= $row['colorName'] ?></option>
<?php
	}
?>
	</select><br>
	<?php
		//カラーリストのプログラム
		$stmh = $app->getColor();
		while($row=$stmh->fetch(\PDO::FETCH_ASSOC)){
	?>
		<li class="color" value="<?=$row['colorNo']?>" style="background:#<?= $row['colorCode'] ?>"><?= $row['colorName'] ?></li>
	<?php
		}
	?>
	<input type="text" name="itemName">アイテムの名前<br>
	<input type="text" name="value">価格<br>
	<textarea rows="4" cols="40" name="info"></textarea>
	<!-- ファイルのインプットフォーム -->
	<ul id="filelist">
		<li><input type="file" name="uploadfile[]" class="inputFile image1" accept="image/*" id="image1" multiple></li>
	</ul>
	<div id="imageList">
		<!-- イメージの表示位置 -->
	</div>
	<input type="submit" value="チェック画面">
</form>
<script>

</script>
</body>
</html>