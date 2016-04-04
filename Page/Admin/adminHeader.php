<?php
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
	</div><!-- /headerTop -->
</div><!-- header -->
<!--loginおしまい-->
<header>
	<div id="logo">
		<div id="hlogo">
			<a href="top.php"><img src="../img/top.png" width="150px" border="1px"></a>
		</div>
		<div id="itemBrandWrapper" class="clearfix">
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
					<a href="itemView.php?ItemSex=0">キッズ<span class=""> <i class=""></i></span></a>
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
