<?php
require_once(__DIR__ . '/../config/config.php');
$cssName = 'kounyuu';
require_once 'header.php';
$app = new Cart();
$itemInfo = $app->run();
$sum = 0;
?>

<div id="cartMain">
	<div id="cartLeft">
		<div id="inCart">
			<ul id="inCartItems">
				<li id="cartTop">
					<h1>買い物かごの中身</h1>
				</li>
				<?php
				if (isset($itemInfo)) {
					foreach ($itemInfo as $key => $item) { ?>
					<li class="clearfix">
						<div class="cartItem">
							<img src="img/Item/<?= $item['info']['img'] ?>" >
							<div class="cartItemInner">
								<p class="itemTitle"><?=$item['info']['itemName']?></p>
								<p class="cartItemValue">￥<?php echo number_format($item['info']['itemValue'] * $item['info']['stock']); $sum += $item['info']['itemValue'] * $item['info']['stock'];?></p>
								<p class="cartItemInfo clearfix"> <span class="itemOption">スタイル - カラー番号#:  <?=$item['info']['itemNo']?>-<?=$item['info']['colorNo']?></span> <span class="itemOption">
								サイズ:  JP  <?php $app->sizeView($item['info']['size'])?></span> <span class="itemOption">カラー: <?= $item['info']['colorName']?></span> <span class="itemOption">
								数量: <?=$item['info']['stock']?>  単価  ￥<?=$item['info']['itemValue']?></span> </p>
							</div>
						</div>
						<div class="cartItemOption">
							<a href="cart.php?key=<?= $key ?>">削除</a>
							<a href="">変更</a>
						</div>
					</li>
				<?php }
				} else {
					echo "買い物カゴが空です";
				}
				?>
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
			<div class="summaryButtons">
				<a href="cratPro.php">購入手続きに進む</a>
			</div>
		</div>
	</div><!--cartRight-->
</div><!--cartMain-->
<?php require 'footer.php';?>