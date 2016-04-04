<?php

require_once(__DIR__ . '/../../config/config.php');

$cssName = 'search';
require_once 'adminHeader.php';
$app = new NewColor();

$app->run();
$stmh = $app->getItem();
?>
	<div id="searchMain">
		<h1>新規カラー追加画面</h1>
		<div id="searchItem">
		<?php while($row = $stmh->fetch(\PDO::FETCH_ASSOC)){ ?>
			<div class="item searchResult">
			<?php var_dump($row);?>
				<a href="insertDiscount.php?No=<?= $row['itemNo'] ?>">
				<?php var_dump($app->getImage($row['itemNo']))?>
					<img src="../img/Item/<?php $app->getImage($row['itemNo']) ?>">
					<p><?= $row['itemName']?></p>
					<p class="item-cate"><?= $row['ItemSex'] == 1 ? "メンズ" : 'レディース'?></p>
					<p class="value"><span class="inValue"><?= $row['itemValue'] ?></span>→<span class="sValue">7600円</span></p>
					<div class="rankStar"></div>
				</a><!-- rankItem -->
			</div><!-- athorItem -->
			<?php } ?><!-- PHP WHILE 閉じタグ -->
		</div>
	</div><!--searchMain-->
</body>
</html>