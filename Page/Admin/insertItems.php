<?php

require_once(__DIR__ . '/../../config/config.php');

$cssName = 'item';
require_once 'adminHeader.php';
$app = new CheckItem();

$app->run();
?>
<script>
function chgPic(pictURL){
	document.images['centerImg'].src = "../img/tmp/" + pictURL;
}
</script>
<div id="main">
	<div class="pankz">
		<p>トップスペシャルセールベンチレーター シュプリーム Reebok CLASSIC（リーボック　クラシック）</p>
	</div>
	<div class="itemBox">
		<div id="left" class="clearfix">
			<div id="leftImg">
				<ul>
				<?php foreach ($_SESSION['file'] as $key => $tmp){ ?>
					<li onMouseOver="chgPic('<?=$tmp?>')"><img src="../img/tmp/<?=$tmp?>"></li>
				<?php }?>
				</ul>
			</div>
			<div id="mainImg">
				<img name="centerImg" src="../img/tmp/<?=$_SESSION['file'][0]?>">
			</div>
		</div><!--left-->
		<div id="right" class="clearfix">
			<div class="rightInner clearfix">
				<div class="rightTop">
					<h1><?=$_SESSION['itemName']?></h1>
					<h2><?= $_SESSION['category'] ?></h2>
					<div class="itemValue">¥<?=$_SESSION['value']?></div>
				</div><!--rightTop-->
			</div>
		</div>
	</div>
	<div id="itemInfo">
	<p>商品情報</p>
		<img src="../img/tmp/<?=$_SESSION['file'][0]?>">
		<p><?=$_SESSION['info'] ?></p>
	</div>
</div><!--main-->

<a href="insertItem.php">登録</a>