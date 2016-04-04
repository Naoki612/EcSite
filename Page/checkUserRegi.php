<?php
// 新規登録

require_once(__DIR__ . '/../config/config.php');

$app = new CheackUserRegi();

$app->run();
?>
<?php
$cssName= 'regiform';
require_once 'header.php';
?>
<div id="regiTop" class="">
	<ul>
		<li>Step1 入力画面</li>
		<li>Step2 登録情報確認</li>
		<li>Step3 登録完了</li>
	</ul>
</div>
	<div class="regist_form clearfix">
		<table class="table1 ">
			<tr>
				<th class="inputHead">お名前<font color="#ff0000">（必須）</font></th>
			</tr>
			<tr>
				<td class="inputCol">姓: <?=h($userInfo['FirstName']); ?>
				名 :<?= h($userInfo['LastName']) ?><br> 　例：（姓）山田　（名）太郎</td>
			</tr>
			<tr>
				<th class="inputHead">お名前(カナ)<font color="#ff0000">（必須）</font></th>
			</tr>
			<tr>
				<td class="inputCol">セイ:<?=h($userInfo['FirstNameK']) ?>
				メイ:<?= h($userInfo['LastNameK']) ?><br> 　例：（姓）山田　（名）太郎</td>
			</tr>
			<tr>
				<th class="inputHead">メールアドレス<font color="#ff0000">（必須）</font><br></th>
			</tr>
			<tr>
				<td class="inputCol"><?= h($userInfo['userEmail'])?></td>
			</tr>
			<tr>
				<th class="inputHead">メールアドレス再入力<font color="#ff0000">（必須）</font></th>
			</tr>
			<tr>
				<td class="inputCol"><?=  h($userInfo['userEmail'])?><br>　※確認のため再入力をお願いいたします</td>
			</tr>
			<tr>
				<th class="inputHead">ユーザーID<font color="#ff0000">（必須）</font></th>
			</tr>
			<tr>
				<td class="inputCol"><?= h($userInfo['userID'])?></td>
			</tr>
			<tr>
				<th class="inputHead">パスワード<font color="#ff0000">（必須）</font></th>
			</tr>
			<tr>
				<td class="inputCol">*****************<br>　※8文字以上（半角英数字で数字、英字をそれぞれ 1 文字以上の入力が必要です。）</td>
			</tr>
			<tr>
				<th class="inputHead">パスワード再入力<font color="#ff0000">（必須）</font></th>
			</tr>
			<tr>
				<td class="inputCol">*****************<br>　※確認のため再入力をお願いいたします</td>
			</tr>
		</table>
		<table class="table2 clearfix">
			<tr>
				<th class="inputHead">郵便番号<font color="#ff0000">（必須）</font></th>
			</tr>
			<tr>
				<td class="inputCol">〒<?= h($userInfo['zip'])?>
			</tr>
			<tr>
				<th class="inputHead">住所<font color="#ff0000">（必須）</font></th>
			</tr>
			<tr>
				<td class="inputCol"><?= h($userInfo['pref01']) ?><br>　※例：東京都</td>
			</tr>
			<tr>
				<th class="inputHead">市町村<font color="#ff0000">（必須）</font></th>
			</tr>
			<tr>
				<td class="inputCol"><?= h($userInfo['addr01']) ?><br>　※例：港区六本木○丁目○番○号△△マンション○○号</td>
			</tr>
			<tr>
				<th class="inputHead">番地、以降<font color="#ff0000">（必須）</font></th>
			</tr>
			<tr>
				<td class="inputCol"><?= h($userInfo['addr02']) ?><br>　※例：港区六本木○丁目○番○号△△マンション○○号</td>
			</tr>
			<tr>
				<th class="inputHead">電話番号<font color="#ff0000">（必須）</font></th>
			</tr>
			<tr>
				<td class="inputCol"><?= h($userInfo['userTel'])?><br>&nbsp;例：0312345678（ハイフンなし・半角）</td>
			</tr>
			<tr>
				<th class="inputHead">生年月日<font color="#ff0000">（必須）</font></th>
			</tr>
			<tr>
				<td class="inputCol">
					<div class="selectBox">
					  <p class="birth" onClick="addClass('ulYear')"><span id="Pyear"><?= h($userInfo['year'])?></span>年<em class="fa fa-angle-down fa-2x"></em></p>
					  <p class="birth" onClick="addClass('ulMonth')"><span id="Pmonth"><?= h($userInfo['month'])?></span>月<i class="fa fa-angle-down fa-2x"></i></p>
					  <p class="birth" onClick="addClass('ulDay')"><span id="Pday"><?= h($userInfo['day'])?></span>日<i class="fa fa-angle-down fa-2x"></i></p>
					</div>
				</td>
			</tr>
			<tr>
				<th class="inputHead">性別<font color="#ff0000">（必須）</font></th>
			</tr>
			<tr>
				<td class="inputCol"></td>
			</tr>
		</table>
	</div>

	<div class="formSubmit">
		<div id="formBtn">
			<form action="" method="POST">
				<input type="hidden" name="token" value="<?= h($_SESSION['token']); ?>">
				<input type="submit" name="regist" value="regist">
				<input type="submit" name="back" value="back">
			</form>
		</div>
	</div>

	<?php require_once 'footer.php';?>