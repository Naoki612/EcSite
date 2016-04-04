<?php
require_once (__DIR__ . '/../config/config.php');
$cartPro = new CartPro();
$cartPro->run();

$cssName = 'kounyuuw';
include_once 'header.php';
?>
<script type="text/javascript">
function entryChange1(){
	check = document.getElementsByName('entryPlan')
	if(check[0].checked) {
		//フォーム
		document.getElementById('singupForm').style.display = "";
	}else {
		//フォーム
		document.getElementById('singupForm').style.display = "none";
	}
}
function entryChange2(){
	check = document.getElementsByName('boughtPlan')
	if(check[0].checked) {
		//フォーム
		document.getElementById('checkoutForm').style.display = "none";
	}else {
		//フォーム
		document.getElementById('checkoutForm').style.display = "";
	}
}

//オンロードさせ、リロード時に選択を保持
window.onload = entryChange1;
window.onload = entryChange2;
</script>
<div id="main">
<h1>チェックアウト</h1>
	<div id="contentColumn">
		<div id="contentContainer">
			<form action="" method="post">
			<div class="checkoutHead">
				<h2>配送先</h2>
			</div><!--checkoutHead-->

			<?php
			if($cartPro->isLoggedIn()) {
				$userInfo = $cartPro->getUser();?>

			<div id="userForm">
				<p>〒<?=$userInfo['zip']?></p>
				<p>住所：<?= $userInfo['pref01'].$userInfo['addr01'].$userInfo['addr02']?></p>
				<p>宛先名:<?= $userInfo['userFirstName']. ' ' . $userInfo['userLastName'] ?></p>
				<label><input type="radio" name="boughtPlan" value="regiAddr" onclick="entryChange2();" checked="checked" />登録してある住所に送る</label>
				<label><input type="radio" name="boughtPlan" value="newAddr" onclick="entryChange2();" />新しい住所に送る</label>
			</div>
			<?php } ?>
			<div id="checkoutForm">
				<div class="checkoutFormRow">
					<label for="firstName">名前(性)</label>
					<input type="text" id="firstName">
				</div><!--checkoutFormRow-->
				<div class="checkoutFormRow">
					<label for="lastName">名前(名)</label>
					<input type="text" id="lastName">
				</div><!--checkoutFormRow-->
				<div class="checkoutFormRow">
					<label for="firstKana">フリガナ(性)</label>
					<input type="text" id="firstKana">
				</div><!--checkoutFormRow-->
				<div class="checkoutFormRow">
					<label for="lastKana">フリガナ(名)</label>
					<input type="text" id="lastKana">
				</div><!--checkoutFormRow-->
				<div class="checkoutFormRow">
					<label for="postAddr">郵便番号 (半角) 例:140-8631または1408631</label>
					<input type="text" id="postAddr">
				</div><!--checkoutFormRow-->
				<div class="checkoutFormRow">
					<label for="Prefectures">都道府県</label>
					<input type="text" id="Prefectures">
				</div><!--checkoutFormRow-->
				<div class="checkoutFormRow">
					<label for="municipality">市区町村</label>
					<input type="text" id="municipality">
				</div><!--checkoutFormRow-->
				<div class="checkoutFormRow">
					<label for="townArea">町域</label>
					<input type="text" id="townArea">
				</div><!--checkoutFormRow-->
				<div class="checkoutFormRow">
					<label for="address">番地</label>
					<input type="text" id="address">
				</div><!--checkoutFormRow-->
				<div class="checkoutFormRow">
					<label for="apartment">アパート/マンション名</label>
					<input type="text" id="apartment">
				</div><!--checkoutFormRow-->
			</div><!--checkoutForm-->
			<?php if (!$cartPro->isLoggedIn()) {?>
			<!-- 新規登録用 -->
			<div class="singupFormBtn">
				<label><input type="checkbox" name="entryPlan" value="hoge1" onclick="entryChange1();" checked="checked" />会員登録をしてメールマガジンなど会員特典を受けますか？</label>
			</div><!--singupFormBtn-->
			<div id="singupForm">
				<div class="singupFormRow">
					<label for="singupMail">メールアドレス</label>
					<input type="text" id="singupMail">
				</div><!--singupFormRow-->
				<div class="singupFormRow">
					<label for="singupMail2">メールアドレス 再入力</label>
					<input type="text" id="singupMail2">
				</div><!--singupFormRow-->
				<div class="singupFormRow">
					<label for="singupUserId">ユーザーID</label>
					<input type="text" id="singupUserId">
				</div><!--singupFormRow-->
				<div class="singupFormRow">
					<label for="singupPass">パスワード</label>
					<input type="text" id="singupPass">
				</div><!--singupFormRow-->
				<div class="singupFormRow">
					<label for="singupPass2">パスワード 再入力</label>
					<input type="text" id="singupPass2">
				</div><!--singupFormRow-->
				<div class="singupFormRow">
					<label>生年月日</label>
					<select name="custBirt_y" id="year">
						<option value="1900" selected>1900</option>
						<option value="1901">1901</option>
						<option value="1902">1902</option>
						<option value="1903">1903</option>
						<option value="1904">1904</option>
						<option value="1905">1905</option>
						<option value="1906">1906</option>
						<option value="1907">1907</option>
						<option value="1908">1908</option>
						<option value="1909">1909</option>
						<option value="1910">1910</option>
						<option value="1911">1911</option>
						<option value="1912">1912</option>
						<option value="1913">1913</option>
						<option value="1914">1914</option>
						<option value="1915">1915</option>
						<option value="1916">1916</option>
						<option value="1917">1917</option>
						<option value="1918">1918</option>
						<option value="1919">1919</option>
						<option value="1920">1920</option>
						<option value="1921">1921</option>
						<option value="1922">1922</option>
						<option value="1923">1923</option>
						<option value="1924">1924</option>
						<option value="1925">1925</option>
						<option value="1926">1926</option>
						<option value="1927">1927</option>
						<option value="1928">1928</option>
						<option value="1929">1929</option>
						<option value="1930">1930</option>
						<option value="1931">1931</option>
						<option value="1932">1932</option>
						<option value="1933">1933</option>
						<option value="1934">1934</option>
						<option value="1935">1935</option>
						<option value="1936">1936</option>
						<option value="1937">1937</option>
						<option value="1938">1938</option>
						<option value="1939">1939</option>
						<option value="1940">1940</option>
						<option value="1941">1941</option>
						<option value="1942">1942</option>
						<option value="1943">1943</option>
						<option value="1944">1944</option>
						<option value="1945">1945</option>
						<option value="1946">1946</option>
						<option value="1947">1947</option>
						<option value="1948">1948</option>
						<option value="1949">1949</option>
						<option value="1950">1950</option>
						<option value="1951">1951</option>
						<option value="1952">1952</option>
						<option value="1953">1953</option>
						<option value="1954">1954</option>
						<option value="1955">1955</option>
						<option value="1956">1956</option>
						<option value="1957">1957</option>
						<option value="1958">1958</option>
						<option value="1959">1959</option>
						<option value="1960">1960</option>
						<option value="1961">1961</option>
						<option value="1962">1962</option>
						<option value="1963">1963</option>
						<option value="1964">1964</option>
						<option value="1965">1965</option>
						<option value="1966">1966</option>
						<option value="1967">1967</option>
						<option value="1968">1968</option>
						<option value="1969">1969</option>
						<option value="1970">1970</option>
						<option value="1971">1971</option>
						<option value="1972">1972</option>
						<option value="1973">1973</option>
						<option value="1974">1974</option>
						<option value="1975">1975</option>
						<option value="1976">1976</option>
						<option value="1977">1977</option>
						<option value="1978">1978</option>
						<option value="1979">1979</option>
						<option value="1980" selected>1980</option>
						<option value="1981">1981</option>
						<option value="1982">1982</option>
						<option value="1983">1983</option>
						<option value="1984">1984</option>
						<option value="1985">1985</option>
						<option value="1986">1986</option>
						<option value="1987">1987</option>
						<option value="1988">1988</option>
						<option value="1989">1989</option>
						<option value="1990">1990</option>
						<option value="1991">1991</option>
						<option value="1992">1992</option>
						<option value="1993">1993</option>
						<option value="1994">1994</option>
						<option value="1995">1995</option>
						<option value="1996">1996</option>
						<option value="1997">1997</option>
						<option value="1998">1998</option>
						<option value="1999">1999</option>
						<option value="2000">2000</option>
						<option value="2001">2001</option>
						<option value="2002">2002</option>
						<option value="2003">2003</option>
						<option value="2004">2004</option>
						<option value="2005">2005</option>
						<option value="2006">2006</option>
						<option value="2007">2007</option>
						<option value="2008">2008</option>
						<option value="2009">2009</option>
						<option value="2010">2010</option>
						<option value="2011">2011</option>
						<option value="2012">2012</option>
						<option value="2013">2013</option>
						<option value="2014">2014</option>
						<option value="2015">2015</option>
					</select>
					<select name="custBirt_m" id="month">
						<option value="1" selected>1</option>
						<option value="2">2</option>
						<option value="3">3</option>
						<option value="4">4</option>
						<option value="5">5</option>
						<option value="6">6</option>
						<option value="7">7</option>
						<option value="8">8</option>
						<option value="9">9</option>
						<option value="10">10</option>
						<option value="11">11</option>
						<option value="12">12</option>
					</select>
					<select name="custBirt_d" id="day">
						<option value="1" selected>1</option>
						<option value="2">2</option>
						<option value="3">3</option>
						<option value="4">4</option>
						<option value="5">5</option>
						<option value="6">6</option>
						<option value="7">7</option>
						<option value="8">8</option>
						<option value="9">9</option>
						<option value="10">10</option>
						<option value="11">11</option>
						<option value="12">12</option>
						<option value="13">13</option>
						<option value="14">14</option>
						<option value="15">15</option>
						<option value="16">16</option>
						<option value="17">17</option>
						<option value="18">18</option>
						<option value="19">19</option>
						<option value="20">20</option>
						<option value="21">21</option>
						<option value="22">22</option>
						<option value="23">23</option>
						<option value="24">24</option>
						<option value="25">25</option>
						<option value="26">26</option>
						<option value="27">27</option>
						<option value="28">28</option>
						<option value="29">29</option>
						<option value="30">30</option>
						<option value="31">31</option>
					</select>
				</div><!--singupFormRow-->
				<div class="singupFormRow">
					<label>性別</label>
					<input type="radio" name="custSexs" id="custSexs2" value="2"><label for="custSexs2">男性</label>　
					<input type="radio" name="custSexs" id="custSexs1" value="1"><label for="custSexs1">女性</label>
				</div><!--singupFormRow-->
			</div><!--checkoutForm-->
			<?php }/*<?php if ($cartPro->isLoggedIn)*/ ?>
			<button>購入</button>
			</form>
		</div><!--contentContainer-->
	</div><!--contentColumn-->
</div><!--main-->
<?php require_once 'footer.php';?>