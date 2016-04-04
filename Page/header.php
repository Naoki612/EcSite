<?php

require_once(__DIR__ . '/../config/config.php');
$app = new Header();


$row = $app->run();
?>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="css/reset.css" type="text/css">
<link rel="stylesheet" href="css/style.css" type="text/css">
<link rel="stylesheet" href="css/<?=$cssName ?>.css" type="text/css">
<link rel="stylesheet" href="css/header.css" type="text/css">
<script type="text/javascript" src="jquery/jquery-2.1.4.min.js"></script>

<meta charset="UTF-8">
<title>EC-Site</title>
<script>
<?php if (isset($script)){
	echo $script;
}
?>

/*ログイン画面用*/
$(function(){
    // 「id="login"」を非表示
    $("#login").css("display", "none");
 
    // 「id="loginBtn"」がクリックされた場合
    $("#loginBtn").click(function(){
        // 「id="login"」の表示、非表示を切り替える
        $("#login").toggle();
		hsize = $(window).height();
		$("#login").css("height", hsize + "px");
		$('body').css("overflow", "hidden");
    });
	$(window).resize(function () {
		hsize = $(window).height();
		$("#login").css("height", hsize + "px");
		$('body').css("overflow", "hidden");
	});
	$("#login").click(function(e){
		if(!$.contains($("#login")[0], e.target)){
	        // 「id="login"」の表示、非表示を切り替える
	        $("#login").toggle();
			$('body').css("overflow", "");
		}
	});

});
</script>
</head>
<body>
<div id="header">
	<div id="headerTop">
		<div id="cmArea"><!-- cmエリア日毎に変更javascript PHP のどちらかを使用-->
			<span class="pirceBatch">本日限定&nbsp;16,200円以上お買い上げで</span><span class="red">送料無料</span>
<!--変更部分
			<sapn class="pirceBatch">本日限定&nbsp;10,800円以上お買い上げで</span><span class="red">送料無料</span>
			<sapn class="pirceBatch">本日限定&nbsp;8,640円以上お買い上げで</span><span class="red">送料無料</span>
			<sapn class="pirceBatch">本日限定&nbsp;7,560円以上お買い上げで</span><span class="red">送料無料</span>
			<sapn class="pirceBatch">本日限定&nbsp;5,400円以上お買い上げで</span><span class="red">送料無料</span>
-->
		</div>
		<ul id="topNav">
		<?php if (!isset($_SESSION['me'])) {?>
			<li id="loginBtn">ログイン</li>
			<li><a href="regiForm.php">会員登録</a></li>
		<?php } else { echo '<li id="">ようこそ</li><li id=""><a href="?log=out">ログアウト</a></li>
			<li><a href="salesInfo.php">購入履歴</a></li>'; }?>
			<li><a href="cart.php">カート</a></li>
			<li><a href="">ヘルプ</a></li>
		</ul>
	</div><!-- /headerTop -->
</div><!-- header -->
<div id="login">
	<form id="loginForm" method="post" action="">
		<label class="clearfix" for="loginMail">ユーザーID または  メールアドレス</label><input class="clearfix" id="loginMail" type="text" name="username">
		<label class="clearfix" for="loginPW">パスワード</label><input id="loginPW" type="text" class="clearfix" name="password">
		<button>ログイン</button>
		<button>新規登録</button>
	</form>
</div>
<!--loginおしまい-->
<header>
	<div id="logo">
		<div id="hlogo">
			<a href="top.php"><img src="img/top.png" width="150px" border="1px"></a>
		</div>
		<div id="itemBrandWrapper" class="clearfix">
			<ul class="clearfix" >
			<?php foreach ($row as $key => $brand) { ?>
				<li><a href="itemView.php?brandNo=<?= $brand['brandNo']?>"> >> <?=$brand['brandName']?></a></li>
			<?php }?>
			</ul>
		</div><!-- /itemBrandWrapper -->
		<div class="formSearch">
			<input type="text" size="18" value="何をお探しですか？">
			<button>検索</button>
		</div>
	   <!-- 検索フォーム-->
	</div><!-- /logo ロゴ閉じタグ-->
	<nav id="gNav">
		<div id="gNaviInner" class="clearfix">
			<ul class="mainMenu" id="genderMenu">
				<li id="Nmen">
					<a href="itemView.php?ItemSex=1">メンズ<span class=""> <i class=""></i></span></a>
					<div class="hoverMenu">
						<ul>
							<li><a href=""><i class=""></i> NIKE</a></li>
							<li><a href=""><i class=""></i> PUMA</a></li>
							<li><a href=""><i class=""></i> REEBOK</a></li>
							<li><a href=""><i class=""></i> Asics</a></li>
						</ul>
					</div><!---->
				</li><!--Nmen-->
				<li id="Nwomen">
					<a href="itemView.php?ItemSex=0">レディース<span class=""> <i class=""></i></span></a>
					<div class="hoverMenu">
						<ul>
							<li><a href=""><i class=""></i> NIKE</a></li>
							<li><a href=""><i class=""></i> PUMA</a></li>
							<li><a href=""><i class=""></i> REEBOK</a></li>
							<li><a href=""><i class=""></i> Asics</a></li>
						</ul>
					</div><!---->
				</li><!--Nmen-->
				<li id="Nkids">
					<a href="youItem.php">フィットする靴を探す<span class=""> <i class=""></i></span></a>
					<div class="hoverMenu">
						<ul>
							<li><a href=""><i class=""></i> NIKE</a></li>
							<li><a href=""><i class=""></i> PUMA</a></li>
							<li><a href=""><i class=""></i> REEBOK</a></li>
							<li><a href=""><i class=""></i> Asics</a></li>
						</ul>
					</div><!---->
				</li><!--Nmen-->
				<li id="Noutlet">
					<a href="">セール<span class=""> <i class=""></i></span></a>
					<div class="hoverMenu">
						<ul>
							<li><a href=""><i class=""></i> NIKE</a></li>
							<li><a href=""><i class=""></i> PUMA</a></li>
							<li><a href=""><i class=""></i> REEBOK</a></li>
							<li><a href=""><i class=""></i> Asics</a></li>
						</ul>
					</div><!---->
				</li><!--Nmen-->
			</ul><!--mainMenu-->
		</div><!--gNaviInner-->
	</nav><!--gNav-->
</header>
