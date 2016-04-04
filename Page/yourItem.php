<?php

$cssName = 'item';
require_once 'header.php';
require_once(__DIR__ . '/../config/config.php');
$app = new yourItem();

$row = $app->run();
$item = $row['itemInfo'];

?>
<script>
function addClass(name){
	var clsName = document.getElementById(name).className;
	if(clsName == ''){
		 document.getElementById(name).className = 'selectView';
	} else{
		 document.getElementById(name).className = '';
	}
}
function chgPic(pictURL){
	document.images['centerImg'].src = "img/Item/" + pictURL;
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
				<?php while($itemIMG = $row['itemIMG']->fetch(PDO::FETCH_ASSOC)){ ?>
					<li onMouseOver="chgPic('<?=$itemIMG['ItemIMGName']?>')"><img src="img/Item/<?=$itemIMG['ItemIMGName']?>"></li>
				<?php }?>
				</ul>
			</div>
			<div id="mainImg">
				<img name="centerImg" src="img/Item/<?= $row['itemFirstIMG']?>">
			</div>
		</div><!--left-->
		<div id="right" class="clearfix">
			<div class="rightInner clearfix">
				<div class="rightTop">
					<h1><?=$item['itemName']?></h1>
					<h2><?= $row['itemCategory'] ?></h2>
					<div class="itemValue"><span class="orgPrice">¥<?=$item['itemValue']?></span><span class="valueTag">   特別特価</span>　<?=$item['itemValue']?></div>
			   </div><!--rightTop-->

				<div id="colorImg" class="clearfix">
					<p>----他のカラー----</p>
					<ul class="clearfix" id="atherColorItem">
					<?php $stmh = $app->getAthorItem($_GET['itemNo'])?>
					<?php while ($anotherItem = $stmh->fetch(\PDO::FETCH_ASSOC)){?>
					<a href="itemPage.php?itemNo=<?=$_GET['itemNo']?>&color=<?=$anotherItem['colorNo']?>">
						<li><img src="img/Item/<?=$anotherItem['ItemIMGName']?>"></li>
					</a>
					<?php }?>
					</ul>
				</div><!--colorImg-->
			   <form class="kartForm" id="kartForm" name="inKart" action="itemView.php" method="post">
			   <input type="hidden" name="itemNo" value="<?=$_GET['itemNo']?>">
			   <input type="hidden" name="colorNo" value="<?=$_GET['color']?>">
			   <input type="hidden" name=itemHeight value="<?=$item['itemHeight']?>">
			   <input type="hidden" name="itemWidth" value="<?=$item['itemWidth']?>">
			   <input type="hidden" name="itemWeight" value="<?=$item['itemWeight']?>">
					<div class="selectBox clearfix">
			   		  	<p  class="" onClick="addClass('ulSize')"><span id="PitemSizeId">-</span>cm<em class="fa fa-angle-down"></em></p>
			   		  	<p onClick="addClass('ulKazu')"><span id="PgoodKazuId">4</span>個<em class="fa fa-angle-down"></em></p>
					<p onclick="document.inKart.submit()">ピッタリの靴を探す</p>
					</div><!--selectBox-->
						<div class="sizeForm clearfix">
							<select class="sport" id="itemSizeId" name="sport" style="display: block;">
								<option value="1" name="skuId">筋トレ</option>
								<option value="2" name="skuId">ダイエット</option>
								<option value="3" name="skuId">ランニング</option>
								<option value="4" name="skuId">スタジオ</option>
								<option value="5" name="skuId">ダンス</option>
							</select>
					  </div><!--sizeForm-->
					  <div class="itemOty">
							<select name="yourSize" id="goodKazuId" style="display: block;">
								<option class="skuId" value="1">きつい</option>
								<option class="skuId" value="2">ややきつい</option>
								<option class="skuId" value="3">ちょうど</option>
								<option class="skuId" value="4">ややゆるい</option>
								<option class="skuId" value="5">ゆるい</option>
							</select>
						</div><!--itemOty-->
			  	</form><!--kartForm-->
				<div class="summaryLink clearfix">
					<div class="ratingLink review-style">
						<a title="すべてのレビューを読む" href="">
							<span class="review-total">3</span>件のレビューをすべて読む
						</a>
					</div>
					<div class="ratingLink">
						<a href="" title="レビューを書く" rel="nofollow">レビューを書く</a> |
					</div>
				</div>
				<div class="clearfix">
					<p>靴の横幅</p>
					<p><img alt="アイテム横幅のイメージ" src="img/<?=$item['itemWidth'] ?>.png"></p>
					<p>靴の軽さ</p>
					<p><img alt="アイテム軽さのイメージ" src="img/k<?=$item['itemWeight'] ?>.png"></p>
				</div>
		   	</div><!--rightInner-->
		</div><!--right-->
 	</div><!--itemPage-->
	<div id="itemInfo">
		<img src="img/Item/<?= $row['itemFirstIMG']?>">
		<p><?=$item['itemInfo']?></p>
	</div>
</div><!--main-->
<?php require_once 'footer.php';?>