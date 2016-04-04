<?php

$cssName = 'item';
require_once 'header.php';
require_once(__DIR__ . '/../config/config.php');
$app = new ItemPage();

$row = $app->run();
$item = $row['itemInfo'];

$rank = $app->userRecommend($item);
?>
<script src="jquery/Chart.js"></script>
<script src="jquery/jquery-2.1.4.js"></script>

<script>
function addClass(name){
	var clsName = document.getElementById(name).className;
	if(clsName == ''){
		 document.getElementById(name).className = 'selectView';
	} else{
		 document.getElementById(name).className = '';
	}
}
try{
	document.addEventListener ('click',function(e){clickfunc(e)},true);
}catch(e){
	document.attachEvent('onclick',function(e){clickfunc(e)});
}
function clickfunc(e){
	var t = (e.srcElement || e.target);
	if(t.nodeName=="LI"){
		var flg = 0;
		var ddd = 0;
		var del;
		var val = String(t.value);
		if (t.className == "goodSize") {
			ddd = "itemSizeId";
			del = "ulSize";
			val = "JP " + val.slice(0, 2) + "." + val.slice(2);
		} else if (t.className == "goodKazu") {
			ddd = "goodKazuId";
			del = "ulKazu";
		}
		pulldown_option = document.getElementById(ddd).getElementsByTagName('option');
		for(i=0; i < pulldown_option.length && flg==0; i++ ){
			if(pulldown_option[i].value == t.value){
				pulldown_option[i].selected = true;
				flg=1;
			}
		}
		target = document.getElementById('P'+ddd);
		document.getElementById(del).className = '';
		target.innerHTML = val;
	}
}
function chgPic(pictURL){
	document.images['centerImg'].src = "img/Item/" + pictURL;
}
</script>
<div id="main">
	<div class="pankz">
		<p><?=$item['itemName']?></p>
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
					<div class="itemValue"><?php $app->viewDiscoutn($_GET['itemNo'], $item['itemValue'])?></div>
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
			   <form class="kartForm" id="kartForm" name="inKart" action="cart.php" method="post">
			   <input type="hidden" name="itemNo" value="<?=$_GET['itemNo']?>">
			   <input type="hidden" name="colorNo" value="<?=$_GET['color']?>">
					<div class="selectBox clearfix">
			   		  	<p  class="" onClick="addClass('ulSize')"><span id="PitemSizeId">-</span>cm<em class="fa fa-angle-down"></em></p>
			   		  	<p onClick="addClass('ulKazu')"><span id="PgoodKazuId">4</span>個<em class="fa fa-angle-down"></em></p>
					<p onclick="document.inKart.submit()">カートに入れる</p>
					</div><!--selectBox-->
						<div class="sizeForm clearfix">
							<select class="itemSize" id="itemSizeId" name="size">
								<option class="exp-pdp-size-not-in-stock"></option>
								<option value="245" name="skuId">JP24.5</option>
								<option value="250" name="skuId">JP25</option>
								<option value="255" name="skuId">JP25.5</option>
								<option value="260" name="skuId">JP26</option>
								<option value="265" name="skuId">JP26.5</option>
								<option value="270" name="skuId">JP27</option>
								<option value="275" name="skuId">JP27.5</option>
								<option value="280" name="skuId">JP28</option>
								<option value="285" name="skuId">JP28.5</option>
								<option value="290" name="skuId">JP29</option>
								<option value="295" name="skuId">JP29.5</option>
								<option value="300" name="skuId">JP30</option>
							</select>
							<ul id="ulSize">
								<li class="goodSize" value="245">JP24.5</li>
								<li class="goodSize" value="250">JP25</li>
								<li class="goodSize" value="255">JP25.5</li>
								<li class="goodSize" value="260">JP26</li>
								<li class="goodSize" value="265">JP26.5</li>
								<li class="goodSize" value="270">JP27</li>
								<li class="goodSize" value="275">JP27.5</li>
								<li class="goodSize" value="280">JP28</li>
								<li class="goodSize" value="285">JP28.5</li>
								<li class="goodSize" value="290">JP29</li>
								<li class="goodSize" value="295">JP29.5</li>
								<li class="goodSize" value="300">JP30</li>
							</ul>
					  </div><!--sizeForm-->
					  <div class="itemOty">
							<select name="itemStock" id="goodKazuId">
								<option class="skuId" value="1">1</option>
								<option class="skuId" value="2">2</option>
								<option class="skuId" value="3">3</option>
								<option class="skuId" value="4">4</option>
								<option class="skuId" value="5">5</option>
								<option class="skuId" value="6">6</option>
								<option class="skuId" value="7">7</option>
								<option class="skuId" value="8">8</option>
								<option class="skuId" value="9">9</option>
								<option class="skuId" value="10">10</option>
							</select>
							<ul id="ulKazu">
								<li class="goodKazu" value="1">1</li>
								<li class="goodKazu" value="2">2</li>
								<li class="goodKazu" value="3">3</li>
								<li class="goodKazu" value="4">4</li>
								<li class="goodKazu" value="5">5</li>
								<li class="goodKazu" value="6">6</li>
								<li class="goodKazu" value="7">7</li>
								<li class="goodKazu" value="8">8</li>
								<li class="goodKazu" value="9">9</li>
								<li class="goodKazu" value="10">10</li>
							</ul>
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
					<canvas id="canvas" width="200px" height="200px">
					</canvas>
					<script>
$(function() {
// チャートの枠組み
var radarChartData = {
// 項目
  labels: ["広さ", "高さ", "軽さ", "フィット感"],
  datasets: [
  {
   // 透明を使いたいのでRGBAで色を再現→rgba(xxx,xxx,xxx,0.5):透過度50%
   fillColor: "rgba(255,241,78,0.7)",	// チャート内の色
   strokeColor: "#6f6f6f",	// チャートを囲む線の色
   pointColor: "#111111", 	// チャートの点の色
   pointStrokeColor: "#fff",	// 点を囲む線の色
   // 各項目の値
   data: [<?=$item['itemWidth'] ?>,
		   		<?=$item['itemHeight']?>,
				  <?=$item['itemWeight']?>,
						  93]
   }
             ]
   };

   // レーダーチャートの目盛とかの設定
   var canvas = document.getElementById("canvas");
   var context = canvas.getContext("2d");
   var chart = new Chart(context);
   var rader = chart.Radar(radarChartData, {
   scaleShowLabels: true,  // 目盛を表示（true/false）
   pointLabelFontSize : 10, // ラベルのフォントサイズ
   scaleOverride : true, // 目盛の最大値を手動設定（true/false）
   scaleSteps : 5, // 目盛の数
   scaleStartValue : 0, // 目盛の最初の数
   scaleStepWidth : 20, // 目盛の間隔
   // 目盛の最大値の計算：scaleSteps（目盛の数）→5　scaleStepWidth（目盛の間隔）→2 だと5×2で最大値は10
   });
   });

</script>
				</div>
		   	</div><!--rightInner-->
		</div><!--right-->
	<p>他のカラー</p>
		<div id="itemColor">

		<?php $stmh = $app->getAthorItem($_GET['itemNo'])?>
		<?php while ($Another=$stmh->fetch(\PDO::FETCH_ASSOC)){?>
			<a href="itemPage.php?itemNo=<?=$_GET['itemNo']?>&color=<?=$Another['colorNo']?>">
				<div class="atherColor">
					<div class="atherColorInner">
						<img src="img/Item/<?=$Another['ItemIMGName']?>">
						<p>
							<span>25.0cm<br> ●</span>
							<span>25.5cm<br> ●</span>
							<span>26.0cm<br> ●</span>
							<span>26.5cm<br> ●</span>
							<span>27.0cm<br> ●</span>
							<span>27.5cm<br> ●</span>
							<span>28.0cm<br> ●</span>
							<span>28.5cm<br> ●</span>
							<span>29.0cm<br> ●</span>
							<span>29.5cm<br> ●</span>
							<span>30.0cm<br> ●</span>
						</p>
					</div>
				</div>
		</a>
		<?php }?>
		</div>
	</div><!--itemColor-->
	<p>他のおすすめ商品</p>
	<div id="athorItems">
		<!--商品個別ページリンク-->
		<?php foreach ($rank as $key => $items) {?>
		<div class="athorItem item">
			<a href="itemPage.php?itemNo=<?= $items['itemNo']?>&color=<?=$items['colorNo']?>">
				<img src="img/item/<?=$items['ItemIMGName'] ?>">
				<p><?=$items['itemName'] ?></p>
				<p class="item-cate">メンズ</p>
				<p class="value"><?php $app->viewDiscoutnItems($item['itemNo'], $item['itemValue'])?></p>
				<div class="rankStar"></div>
			  </a><!-- rankItem -->
		</div><!-- athorItem -->
		<?php } ?>
		<!--商品個別ページリンク-->
  </div><!--athorItems-->
	<div id="itemInfo">
		<img src="img/Item/<?= $row['itemFirstIMG']?>">
		<p><?=$item['itemInfo']?></p>
	</div>
</div><!--main-->
<?php require_once 'footer.php';?>