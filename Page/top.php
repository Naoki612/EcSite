<?php

require_once(__DIR__ . '/../config/config.php');

$top = new Top();

require_once 'header.php';
$brand = $top->run();
$lady = 1;
$men = 0;
$rank1 = $top->rankItem($men);
$rank2 = $top->rankItem($lady);
?>

<ul id="iCatchs">
	<li id="iCatch1" class="iCatch">
		  <!-- ここはコンテンツ -->
		  <a href="<?=$brandBoxLink?>"></a>
	</li>
	<li id="iCatch2" class="iCatch">
		  <!-- ここはコンテンツ -->
		  <a href=""></a>
	</li>
	<li id="iCatch3" class="iCatch">
		  <!-- ここはコンテンツ -->
		  <a href=""></a>
	</li>
</ul>
<!--メインボックス-->
<div id="main">
	<!-- ブランドボックス-->
	<div class="itemTopRankTitle rankBlue">
		<p>Men's Shoes Ranking  [ メンズ シューズ ブランド ]</p>
	</div>
	<div class="brands clearfix">
		<?php foreach ($row as $key => $brand) { ?>
			<div class="brandBox">
				<a href="itemView.php?brandNo=<?= $brand['brandNo']?>">
					<img src="img/Brand/<?=$brand['brandName']?>.jpg">
					<p><?=$brand['brandName']?></p>
				</a>
			</div>
		<?php } ?>
<!-- ブランドボックス-->
	</div><!--brands-->
	<div class="itemTopRankTitle rankPink">
		<p>LADIES Shoes Ranking  [ レディース シューズ ブランド ]</p>
	</div>
	<div class="brands clearfix">
		<?php foreach ($row as $key => $brand) { ?>
			<div class="brandBox">
				<a href="itemView.php?brandNo=<?= $brand['brandNo']?>">
					<img src="img/Brand/<?=$brand['brandName']?>.jpg">
					<p><?=$brand['brandName']?></p>
				</a>
			</div>
		<?php } ?>
<!-- ブランドボックス-->
	</div><!--brands-->
<!--ブランドボックス終了-->
<!-- ランキング　ヘッダー-->
	<div class="itemTopRankTitle rankPink">
		<p>LADIES' Shoes Ranking  [ レディース シューズ ランキング ]</p>
	</div>
	<div class="itemsRank">
		<!--商品個別ページリンク-->
		<?php foreach ($rank2 as $key => $item) {?>
		<div class="rankItem item">
			<a href="itemPage.php?itemNo=<?= $item['itemNo']?>&color=<?=$item['colorNo']?>">
				<img src="img/item/<?=$item['img'] ?>">
				<p><?=$item['itemName'] ?></p>
				<p class="item-cate">レディース</p>
				<p class="value"><span class="inValue"><?= $item['itemValue'] ?>円</p>
				<div class="rankStar"></div>
			  </a><!-- rankItem -->
		</div><!-- RankItem -->
		<?php } ?>

		<!--商品個別ページリンク-->
	</div><!--itemsRank-->
<!-- ランキング　ヘッダー-->
	<div class="itemTopRankTitle rankBlue">
		<p>MENS' Shoes Ranking  [ メンズ シューズ ランキング ]</p>
	</div>
	<div class="itemsRank">
		<!--商品個別ページリンク-->
		<?php foreach ($rank1 as $key => $item) {?>
		<div class="rankItem item">
			<a href="itemPage.php?itemNo=<?= $item['itemNo']?>&color=<?=$item['colorNo']?>">
				<img src="img/item/<?=$item['img'] ?>">
				<p><?=$item['itemName'] ?></p>
				<p class="item-cate">メンズ</p>
				<p class="value"><span class="inValue"><?= $item['itemValue'] ?>円</p>
				<div class="rankStar"></div>
			  </a><!-- rankItem -->
		</div><!-- RankItem -->
		<?php } ?>
		<!--商品個別ページリンク-->
	</div><!--itemsRank-->
</div><!-- main -->
<?php require_once 'footer.php';?>