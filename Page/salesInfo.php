<?php


require_once(__DIR__ . '/../config/config.php');
$cssName = 'kounyuu';
require_once 'header.php';
$app = new SalesInfo();

$salesDetail = $app->run();

?>

<?php foreach ($salesDetail as $key => $sales) {
	$sum = 0;
?>
<div id="cartMain">
	<div id="cartLeft">
		<div id="inCart">
			<ul id="inCartItems">
				<li id="cartTop">
					<h1>注文履歴</h1>
				</li>
					<?php foreach ($sales as $key => $sale){?>
					<li class="clearfix">
						<div class="cartItem">
							<img src="img/Item/<?=$sale['itemIMG']?>" >
							<div class="cartItemInner">
								<p class="itemTitle"><?=$sale['itemName']?></p>
								<p class="cartItemValue">￥<?php echo number_format($sale['itemValue'] * $sale['itemStock']); $sum += $sale['itemValue'] * $sale['itemStock'];?></p>
								<p class="cartItemInfo clearfix"> <span class="itemOption">スタイル - カラー番号#:  <?=$sale['itemNo']?>-<?=$sale['colorNo']?></span> <span class="itemOption">
								サイズ:  JP  <?php $app->sizeView($sale['itemSize'])?></span> <span class="itemOption">カラー: <?= $sale['colorName']?></span> <span class="itemOption">
								数量: <?=$sale['itemStock']?>  単価  ￥<?=$sale['itemValue']?></span> </p>
							</div>
						</div>
						<div class="cartItemOption">
							<a href="cart.php?key=<?= $key ?>">削除</a>
							<a href="">変更</a>
						</div>
					</li>
					<?php } ?>
			</ul>
		</div><!--inCart-->
	</div><!--cartLeft-->
	<div id="cartRight">
		<div id="summaryCol">
			<div class="summaryHead">
				<h2>内訳</h2>
			</div>
			<div class="summarySubtotal">
				<h3>小計</h3>
				<p>¥<?=number_format($sum)?></p>
			</div>
			<div class="summaryShipping">
				<h3>配送料</h3>
				<p>¥540</p>
			</div>
			<div class="summaryTotal">
				<h3>合計</h3>
				<p>¥<?= number_format($sum + 540); ?></p>
			</div>
		</div>
	</div><!--cartRight-->
</div><!--cartMain-->
<?php }?>
<?php require_once 'footer.php';?>