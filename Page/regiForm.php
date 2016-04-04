<?php

require_once(__DIR__ . '/../config/config.php');
$app = new RegiForm();

$app->run();

$script = '// 年月に応じて日付を変更する関数setDateForm
			function setDateForm(selectYear,selectMonth,selectDay){
				year = selectYear;
				month = parseInt(selectMonth);

				selMonth = document.getElementById("month");
				selDay = document.getElementById("day");

				listDay = document.getElementById("ulDay");
				// 日付optionの初期化
				if(selDay.options[28] == null){
					selDay.appendChild(document.createElement("option"));
					selDay.options[28].value = "29";
					selDay.options[28].text = "29";
					var elemLi = document.createElement("li");
					elemLi.textContent = "29";
					elemLi.value = "29";
					elemLi.className = "c_Day";
					listDay.appendChild(elemLi);
				}
				if(selDay.options[29] == null){
					selDay.appendChild(document.createElement("option"));
					selDay.options[29].value = "30";
					selDay.options[29].text = "30";
					var elemLi = document.createElement("li");
					elemLi.textContent = "30";
					elemLi.value = "30";
					elemLi.className = "c_Day";
					listDay.appendChild(elemLi);
				}
				if(selDay.options[30] == null){
					selDay.appendChild(document.createElement("option"));
					selDay.options[30].value = "31";
					selDay.options[30].text = "31";
					var elemLi = document.createElement("li");
					elemLi.textContent = "31";
					elemLi.value = "31";
					elemLi.className = "c_Day";
					listDay.appendChild(elemLi);
				}

				// 月に応じて日付optionのノードを削除
				if(month == 2){
					selDay.removeChild(selDay.options[30]);
					selDay.removeChild(selDay.options[29]);
					listDay.removeChild(listDay.children[30]);
					listDay.removeChild(listDay.children[29]);
					// 閏年ではない場合
					if(year%4 != 0){
						selDay.removeChild(selDay.options[28]);
						listDay.removeChild(listDay.children[28]);
					}
				}else if(month == 4 || month == 6 || month == 9 || month == 11){
					selDay.removeChild(selDay.options[30]);
					listDay.removeChild(listDay.children[30]);
				}
			}


			try{
				document.addEventListener ("click",function(e){clickfunc(e)},true);
			}catch(e){
				document.attachEvent("onclick",function(e){clickfunc(e)});
			}
			function clickfunc(e){
				var t = (e.srcElement || e.target);
				if(t.nodeName=="LI"){
					var flg = 0;
					var ddd = 0;
					var del;
					if (t.className == "c_year") {
						ddd = "year";
						del = "ulYear";
					} else if (t.className == "c_Month") {
						ddd = "month";
						del = "ulMonth";
					} else if (t.className == "c_Day") {
						ddd = "day";
						del = "ulDay";
					}
					pulldown_option = document.getElementById(ddd).getElementsByTagName("option");
					for(i=0; i<pulldown_option.length && flg==0;i++ ){
						if(pulldown_option[i].value == t.value){
							pulldown_option[i].selected = true;
							flg=1;
						}
					}
					var bYear = document.forms.inputData.year.value;
					var bMonth = document.forms.inputData.month.value;
					var bDay = document.forms.inputData.day.value;
					setDateForm(bYear,bMonth,bDay);
					document.getElementById(del).className = "";
					targetYear = document.getElementById("Pyear");
					targetMonth = document.getElementById("Pmonth");
					targetDay = document.getElementById("Pday");
					targetYear.innerHTML = bYear;
					targetMonth.innerHTML = bMonth;
					targetDay.innerHTML = bDay;
				}
			}
			function addClass(name){
				var clsName = document.getElementById(name).className;
				if(clsName == ""){
					document.getElementById(name).className = "birthView";
				} else{
					document.getElementById(name).className = "";
				}
			}
			';

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

<form id="inputData" action="" method="POST">
	<div class="regist_form clearfix">
		<table class="table1 ">
			<tr>
				<th class="inputHead">お名前<font color="#ff0000">（必須）</font></th>
			</tr>
			<tr>
				<td class="inputCol">姓<input type="text" name="custFirstName1" value="<?= isset($userInfo['FirstName']) ? h($userInfo['FirstName']) : ''; ?>">　
				名<input type="text" name="custLastName1"  value="<?= isset($userInfo['LastName']) ? h($userInfo['LastName']) : ''; ?>"><br> 　例：（姓）山田　（名）太郎<p class="err"><?= h($app->getErrors('kanjiName')); ?></p></td>
			</tr>
			<tr>
				<th class="inputHead">お名前(カナ)<font color="#ff0000">（必須）</font></th>
			</tr>
			<tr>
				<td class="inputCol">セイ<input type="text" name="custFirstName2"  value="<?= isset($userInfo['FirstNameK']) ? h($userInfo['FirstNameK']) : ''; ?>">　
				メイ<input type="text" name="custLastName2" value="<?= isset($userInfo['LastNameK']) ? h($userInfo['LastNameK']) : ''; ?>"><br> 　例：（姓）山田　（名）太郎<p class="err"><?= h($app->getErrors('kanaName')); ?></p></td>
			</tr>
			<tr>
				<th class="inputHead">メールアドレス<font color="#ff0000">（必須）</font><br>
				</th>
			</tr>
			<tr>
				<td class="inputCol"><input class="formWidth" type="text" name="custLgMail1" value="<?= isset($userInfo['userEmail']) ? h($userInfo['userEmail']) : ''; ?>"><p class="err"><?= h($app->getErrors('email')); ?></p></td>
			</tr>
			<tr>
				<th class="inputHead">メールアドレス再入力<font color="#ff0000">（必須）</font></th>
			</tr>
			<tr>
				<td class="inputCol"><input class="formWidth" type="text" name="custLgMail2" value="<?= isset($userInfo['userEmail']) ? h($userInfo['userEmail']) : ''; ?>"><br>　※確認のため再入力をお願いいたします<p class="err"><?= h($app->getErrors('email')); ?></p></td>
			</tr>
			<tr>
				<th class="inputHead">ユーザーID<font color="#ff0000">（必須）</font></th>
			</tr>
			<tr>
				<td class="inputCol"><input class="formWidth" type="text" name="userID" value="<?= isset($userInfo['userID']) ? h($userInfo['userID']) : ''; ?>"><p class="err"><?= h($app->getErrors('userID')); ?></p></td>
			</tr>
			<tr>
				<th class="inputHead">パスワード<font color="#ff0000">（必須）</font></th>
			</tr>
			<tr>
				<td class="inputCol"><input class="formWidth" type="password" name="custLgPW" value=""><br>　※8文字以上（半角英数字で数字、英字をそれぞれ 1 文字以上の入力が必要です。）<p class="err"><?= h($app->getErrors('password')); ?></p></td>
			</tr>
			<tr>
				<th class="inputHead">パスワード再入力<font color="#ff0000">（必須）</font></th>
			</tr>
			<tr>
				<td class="inputCol"><input class="formWidth" type="password" name="custLgPW2" value=""><br>　※確認のため再入力をお願いいたします<p class="err"><?= h($app->getErrors('password1')); ?></p></td>
			</tr>
		</table>
		<table class="table2 clearfix">
			<tr>
				<th class="inputHead">郵便番号<font color="#ff0000">（必須）</font></th>
			</tr>
			<tr>
				<td class="inputCol">〒 <input type="text" name="zip01" size="10" maxlength="8" onKeyUp="AjaxZip3.zip2addr(this,'','pref01','addr01');" value="<?= isset($userInfo['zip']) ? h($userInfo['zip']) : ''; ?>">&nbsp;<input type="button" value="住所自動入力" name="postSearch" class="button"><br>　郵便番号が分からない方は<a href="#" >こちら</a><br>例：1530044（ハイフンなし・半角）
					<p class="err"><?= h($app->getErrors('zip')); ?></p>
				</td>
			</tr>
			<tr>
				<th class="inputHead">住所<font color="#ff0000">（必須）</font></th>
			</tr>
			<tr>
				<td class="inputCol"><input  class="formWidth" type="text" id="custCity" name="pref01" size="20" value="<?= isset($userInfo['pref01']) ? h($userInfo['pref01']) : ''; ?>"><br>　※例：東京都<p class="err"><?= h($app->getErrors('pref01')); ?></p></td>
			</tr>
			<tr>
				<th class="inputHead">市町村<font color="#ff0000">（必須）</font></th>
			</tr>
			<tr>
				<td class="inputCol"><input class="formWidth" type="text" name="addr01" size="60" value="<?= isset($userInfo['addr01']) ? h($userInfo['addr01']) : ''; ?>"><br>　※例：港区六本木○丁目○番○号△△マンション○○号<p class="err"><?= h($app->getErrors('addr01')); ?></p></td>
			</tr>
			<tr>
				<th class="inputHead">番地、以降<font color="#ff0000">（必須）</font></th>
			</tr>
			<tr>
				<td class="inputCol"><input class="formWidth" type="text" name="addr02" size="60" value="<?= isset($userInfo['addr02']) ? h($userInfo['addr02']) : ''; ?>"><br>　※例：港区六本木○丁目○番○号△△マンション○○号<p class="err"><?= h($app->getErrors('addr02')); ?></p></td>
			</tr>
			<tr>
				<th class="inputHead">電話番号<font color="#ff0000">（必須）</font></th>
			</tr>
			<tr>
				<td class="inputCol"><input class="formWidth" type="text" name="custTel" value="<?= isset($userInfo['userTel']) ? h($userInfo['userTel']) : ''; ?>"><br>&nbsp;例：0312345678（ハイフンなし・半角）<p class="err"><?= h($app->getErrors('tel')); ?></p></td>
			</tr>
			<tr>
				<th class="inputHead">生年月日<font color="#ff0000">（必須）</font></th>
			</tr>
			<tr>
				<td class="inputCol">
					<div class="selectBox">
					  <p class="birth" onClick="addClass('ulYear')"><span id="Pyear"></span>年<em class="fa fa-angle-down fa-2x"></em></p>
					  <p class="birth" onClick="addClass('ulMonth')"><span id="Pmonth"></span>月<i class="fa fa-angle-down fa-2x"></i></p>
					  <p class="birth" onClick="addClass('ulDay')"><span id="Pday"></span>日<i class="fa fa-angle-down fa-2x"></i></p>
					</div>
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
					<ul id="ulYear" class="">
						<li class="c_year" value="1900">1900</li>
						<li class="c_year" value="1901">1901</li>
						<li class="c_year" value="1902">1902</li>
						<li class="c_year" value="1903">1903</li>
						<li class="c_year" value="1904">1904</li>
						<li class="c_year" value="1905">1905</li>
						<li class="c_year" value="1906">1906</li>
						<li class="c_year" value="1907">1907</li>
						<li class="c_year" value="1908">1908</li>
						<li class="c_year" value="1909">1909</li>
						<li class="c_year" value="1910">1910</li>
						<li class="c_year" value="1911">1911</li>
						<li class="c_year" value="1912">1912</li>
						<li class="c_year" value="1913">1913</li>
						<li class="c_year" value="1914">1914</li>
						<li class="c_year" value="1915">1915</li>
						<li class="c_year" value="1916">1916</li>
						<li class="c_year" value="1917">1917</li>
						<li class="c_year" value="1918">1918</li>
						<li class="c_year" value="1919">1919</li>
						<li class="c_year" value="1920">1920</li>
						<li class="c_year" value="1921">1921</li>
						<li class="c_year" value="1922">1922</li>
						<li class="c_year" value="1923">1923</li>
						<li class="c_year" value="1924">1924</li>
						<li class="c_year" value="1925">1925</li>
						<li class="c_year" value="1926">1926</li>
						<li class="c_year" value="1927">1927</li>
						<li class="c_year" value="1928">1928</li>
						<li class="c_year" value="1929">1929</li>
						<li class="c_year" value="1930">1930</li>
						<li class="c_year" value="1931">1931</li>
						<li class="c_year" value="1932">1932</li>
						<li class="c_year" value="1933">1933</li>
						<li class="c_year" value="1934">1934</li>
						<li class="c_year" value="1935">1935</li>
						<li class="c_year" value="1936">1936</li>
						<li class="c_year" value="1937">1937</li>
						<li class="c_year" value="1938">1938</li>
						<li class="c_year" value="1939">1939</li>
						<li class="c_year" value="1940">1940</li>
						<li class="c_year" value="1941">1941</li>
						<li class="c_year" value="1942">1942</li>
						<li class="c_year" value="1943">1943</li>
						<li class="c_year" value="1944">1944</li>
						<li class="c_year" value="1945">1945</li>
						<li class="c_year" value="1946">1946</li>
						<li class="c_year" value="1947">1947</li>
						<li class="c_year" value="1948">1948</li>
						<li class="c_year" value="1949">1949</li>
						<li class="c_year" value="1950">1950</li>
						<li class="c_year" value="1951">1951</li>
						<li class="c_year" value="1952">1952</li>
						<li class="c_year" value="1953">1953</li>
						<li class="c_year" value="1954">1954</li>
						<li class="c_year" value="1955">1955</li>
						<li class="c_year" value="1956">1956</li>
						<li class="c_year" value="1957">1957</li>
						<li class="c_year" value="1958">1958</li>
						<li class="c_year" value="1959">1959</li>
						<li class="c_year" value="1960">1960</li>
						<li class="c_year" value="1961">1961</li>
						<li class="c_year" value="1962">1962</li>
						<li class="c_year" value="1963">1963</li>
						<li class="c_year" value="1964">1964</li>
						<li class="c_year" value="1965">1965</li>
						<li class="c_year" value="1966">1966</li>
						<li class="c_year" value="1967">1967</li>
						<li class="c_year" value="1968">1968</li>
						<li class="c_year" value="1969">1969</li>
						<li class="c_year" value="1970">1970</li>
						<li class="c_year" value="1971">1971</li>
						<li class="c_year" value="1972">1972</li>
						<li class="c_year" value="1973">1973</li>
						<li class="c_year" value="1974">1974</li>
						<li class="c_year" value="1975">1975</li>
						<li class="c_year" value="1976">1976</li>
						<li class="c_year" value="1977">1977</li>
						<li class="c_year" value="1978">1978</li>
						<li class="c_year" value="1979">1979</li>
						<li class="c_year" value="1980">1980</li>
						<li class="c_year" value="1981">1981</li>
						<li class="c_year" value="1982">1982</li>
						<li class="c_year" value="1983">1983</li>
						<li class="c_year" value="1984">1984</li>
						<li class="c_year" value="1985">1985</li>
						<li class="c_year" value="1986">1986</li>
						<li class="c_year" value="1987">1987</li>
						<li class="c_year" value="1988">1988</li>
						<li class="c_year" value="1989">1989</li>
						<li class="c_year" value="1990">1990</li>
						<li class="c_year" value="1991">1991</li>
						<li class="c_year" value="1992">1992</li>
						<li class="c_year" value="1993">1993</li>
						<li class="c_year" value="1994">1994</li>
						<li class="c_year" value="1995">1995</li>
						<li class="c_year" value="1996">1996</li>
						<li class="c_year" value="1997">1997</li>
						<li class="c_year" value="1998">1998</li>
						<li class="c_year" value="1999">1999</li>
						<li class="c_year" value="2000">2000</li>
						<li class="c_year" value="2001">2001</li>
						<li class="c_year" value="2002">2002</li>
						<li class="c_year" value="2003">2003</li>
						<li class="c_year" value="2004">2004</li>
						<li class="c_year" value="2005">2005</li>
						<li class="c_year" value="2006">2006</li>
						<li class="c_year" value="2007">2007</li>
						<li class="c_year" value="2008">2008</li>
						<li class="c_year" value="2009">2009</li>
						<li class="c_year" value="2010">2010</li>
						<li class="c_year" value="2011">2011</li>
						<li class="c_year" value="2012">2012</li>
						<li class="c_year" value="2013">2013</li>
						<li class="c_year" value="2014">2014</li>
						<li class="c_year" value="2015">2015</li>
					</ul>
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
					<ul id="ulMonth" class="">
						<li class="c_Month" value="1">1</li>
						<li class="c_Month" value="2">2</li>
						<li class="c_Month" value="3">3</li>
						<li class="c_Month" value="4">4</li>
						<li class="c_Month" value="5">5</li>
						<li class="c_Month" value="6">6</li>
						<li class="c_Month" value="7">7</li>
						<li class="c_Month" value="8">8</li>
						<li class="c_Month" value="9">9</li>
						<li class="c_Month" value="10">10</li>
						<li class="c_Month" value="11">11</li>
						<li class="c_Month" value="12">12</li>
					</ul>
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
					<ul id="ulDay" class="">
						<li class="c_Day" value="1">1</li>
						<li class="c_Day" value="2">2</li>
						<li class="c_Day" value="3">3</li>
						<li class="c_Day" value="4">4</li>
						<li class="c_Day" value="5">5</li>
						<li class="c_Day" value="6">6</li>
						<li class="c_Day" value="7">7</li>
						<li class="c_Day" value="8">8</li>
						<li class="c_Day" value="9">9</li>
						<li class="c_Day" value="10">10</li>
						<li class="c_Day" value="11">11</li>
						<li class="c_Day" value="12">12</li>
						<li class="c_Day" value="13">13</li>
						<li class="c_Day" value="14">14</li>
						<li class="c_Day" value="15">15</li>
						<li class="c_Day" value="16">16</li>
						<li class="c_Day" value="17">17</li>
						<li class="c_Day" value="18">18</li>
						<li class="c_Day" value="19">19</li>
						<li class="c_Day" value="20">20</li>
						<li class="c_Day" value="21">21</li>
						<li class="c_Day" value="22">22</li>
						<li class="c_Day" value="23">23</li>
						<li class="c_Day" value="24">24</li>
						<li class="c_Day" value="25">25</li>
						<li class="c_Day" value="26">26</li>
						<li class="c_Day" value="27">27</li>
						<li class="c_Day" value="28">28</li>
						<li class="c_Day" value="29">29</li>
						<li class="c_Day" value="30">30</li>
						<li class="c_Day" value="31">31</li>
					</ul>
				<p class="err"><?= h($app->getErrors('birth')); ?></p></td>
			</tr>
			<tr>
				<th class="inputHead">性別<font color="#ff0000">（必須）</font></th>
			</tr>
			<tr>
				<td class="inputCol"><input type="radio" name="custSex" id="custSexs2" value="2"><label for="custSexs2">男性</label>　<input type="radio" name="custSex" id="custSexs1" value="1"><label for="custSexs1">女性</label><p class="err"><?= h($app->getErrors('sex')); ?></p></td>
			</tr>
		</table>
	</div>

	<div class="formSubmit">
	<div id="formBtn">
		<input type="hidden" name="token" value="<?= h($_SESSION['token']); ?>">
		<button class="btn">登録</button>
		<button class="btn">戻る</button>
	</div>
</div>
</form>
<?php require_once 'footer.php';?>