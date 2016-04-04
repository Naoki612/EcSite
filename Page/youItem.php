<?php
require_once(__DIR__ . '/../config/config.php');

$cssName = 'search';
require_once 'header.php';
$app = new YouItem();

$stmh = $app->run();

?>
	<?php require_once 'sidebar.php';?>
	<div id="searchMain">
		<h1>今履いてる靴は何でしょうか？</h1>
		<div id="searchItem">
		<?php while($row = $stmh->fetch(PDO::FETCH_ASSOC)){?>
			<div class="item searchResult">
				<a href="yourItem.php?itemNo=<?= $row['itemNo']?>&color=<?=$row['colorNo']?>">
					<img src="img/Item/<?= $row['ItemIMGName']?>">
					<p><?= $row['itemName']?></p>
					<p class="item-cate"><?= $row['ItemSex'] == 1 ? "メンズ" : 'レディース'?></p>
					<p class="value"><span class="inValue"><?= $row['itemValue'] ?></span>→<span class="sValue">7600円</span></p>
					<div class="rankStar"></div>
				</a><!-- rankItem -->
			</div><!-- athorItem -->
			<?php } ?><!-- PHP WHILE 閉じタグ -->
		</div>
	</div><!--searchMain-->
</div><!-- sidebar閉じ -->
	<?php require_once 'footer.php';?>