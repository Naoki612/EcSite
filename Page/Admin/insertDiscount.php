<?php

require_once(__DIR__ . '/../../config/config.php');

$app = new InsertDiscount();

$app->run();
?>
<form method="post">
開始
	<select name="sYear">
		<?php
		 $year = date(Y);for ($i = 0; $i < 2; $i++){
		?>
		<option value="<?=$year?>"><?=$year?></option>
		<?php $year++; }?>
	</select>
	<select name="sMonth">
		<?php
			for ($i = 0; $i < 12; $i++){
		?>
		<option value="<?=$i+1?>"><?=$i+1?></option>
		<?php }?>
	</select>
	<select name="sDay">
		<?php
			for ($i = 0; $i < 31; $i++){
		?>
		<option value="<?=$i+1?>"><?=$i+1?></option>
		<?php }?>
	</select><br>
	終わり
	<select name="fYear">
		<?php
		 $year = date(Y);for ($i = 0; $i < 2; $i++){
		?>
		<option value="<?=$year?>"><?=$year?></option>
		<?php $year++; }?>
	</select>
	<select name="fMonth">
		<?php
			for ($i = 0; $i < 12; $i++){
		?>
		<option value="<?=$i+1?>"><?=$i+1?></option>
		<?php }?>
	</select>
	<select name="fDay">
		<?php
			for ($i = 0; $i < 31; $i++){
		?>
		<option value="<?=$i+1?>"><?=$i+1?></option>
		<?php }?>
	</select><br>
	<input type="text" name="value">
	<input type="hidden" name="itemNo" value="<?=$_GET['No']?>">
	<input type="submit">
</form>