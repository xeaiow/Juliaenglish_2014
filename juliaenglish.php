<!DOCTYPE HTML>
<html data-ts-native>
	<head>
		<title>林錦英語教室</title>
		<meta name="keywords" content="林錦,英語,補習班,中壢英文,英語教室,林錦英語" />
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta property="og:image" content="http://juliaenglish.com/images/oversealogo201609.png">
		<meta property="og:image:width" content="591">
		<meta property="og:image:height" content="192">
		<meta property="article:author" content="http://juliaenglish.com">
		<meta name="author" content="林錦英語教室 - 林錦國際文創有限公司">
		<script src="play/js/jquery-2.0.3.min.js"></script>
		<script src="play/js/zoom.min.js"></script>
		<link rel="stylesheet" href="new_assets/style.css">
		<link rel="stylesheet" href="play/css/zoom.css" />
		<link rel="stylesheet" href="new_assets/tocas.css">
		<script src="new_assets/tocas.js"></script>
	</head>
	<body>

		<!-- nav -->
		<div class="ts menu big inverted" style="margin-top:0px;">
			<div class="ts item dropdown">
				<div class="text"><i class="search icon"></i> 認識林錦</div>
				<div class="menu">
					<a class="item" href="about.php">關於林錦</a>
					<a class="item" href="aboutteacher.php">林錦老師</a>
					<a class="item" href="environment.php">環境介紹</a>
				</div>
			</div>

			<div class="ts item dropdown">
				<div class="text"><i class="child icon"></i> 閱讀素養 (國中小適)</div>
				<div class="menu">
					<a class="item" href="pisapreaa.php">PISA 英檢預備 A 班</a>
					<a class="item" href="pisapreab.php">PISA 英檢預備 B 班</a>
					<a class="item" href="pisabasic.php">PISA 英檢初級班</a>
					<a class="item" href="pisasprint.php">PISA 英檢文法衝刺班</a>
					<a class="item" href="pisahearning.php">PISA 英檢初級聽力班</a>
					<a class="item" href="eliteadv.php">PISA 菁英進階班</a>
				</div>
			</div>

			<div class="ts item dropdown">
				<div class="text"><i class="user icon"></i> 高中英語部</div>
				<div class="menu">
					<a class="item" href="ce.php">指考翻譯寫作班</a>
					<a class="item" href="hs3.php">高三資優衝刺模考班</a>
					<a class="item" href="hs2.php">高二魔力寫作班</a>
					<a class="item" href="hshearning.php">中級暨中高級英檢聽力班</a>
					<a class="item" href="hselite.php">高一菁英班 (六)</a>
					<a class="item" href="hselite2.php">高一菁英班 (日)</a>
					<a class="item" href="ap1.php">高一先修班</a>
				</div>
			</div>

			<div class="right menu">
				<div class="ts item dropdown">
					<div class="text"><i class="book icon"></i> 英文證照與相關測驗</div>
					<div class="menu">
						<a class="item" href="">英檢 VS 多益</a>
						<a class="item" href="">GEPT 英檢中心</a>
						<a class="item" href="">ETS 多益測驗中心</a>
						<a class="item" href="">國中英語 VS 高中英語</a>
					</div>
				</div>
				<div class="ts item dropdown">
					<div class="text"><i class="lab icon"></i> 教學成果</div>
					<div class="menu">
						<a class="item" href="studentref.php">學生優異成績與感言</a>
						<a class="item" href="studentChild.php">小小林錦 - 大成就</a>
						<div class="divider"></div>
						<a class="item" href="studentTOEIC.php">多益佳績</a>
						<a class="item" href="studentGept2.php">英檢中高級佳績</a>
						<a class="item" href="studentGept1.php">英檢中級佳績</a>
						<a class="item" href="studentGept1.php">英檢初級佳績</a>
					</div>
				</div>
		    </div>
			<a class="item" style="z-index:1;" href="sdlogin.php"><i class="diamond icon"></i> 學員專區</a>
		</div>

		<!-- LOGO -->
		<div class="ts four column centered grid" style="margin-top:-80px;padding-top:10px;">
		    <div class="column" style="text-align:center;">
				<img src="images/logo.png" alt="">
			</div>
		</div>

		<!-- 成果榜單 -->
		<div class="ts two column centered grid" style="margin-top:80px;">
		    <div class="column" style="text-align:center;">
		    	<h1><i class="trophy icon"></i> 成果榜單</h1>
				<div class="ts flatted segment info">
					<div class="ts small images gallery" id="adv_pic">
						<?php
							require 'config/new_dbconfig.php';

							$i 			= 1;
							$countdate 	= $link->query("SELECT advcount FROM user");
							$row 		= $countdate->fetch_assoc();

							while ($i <= $row['advcount']) {
						?>

									<a href="images/adv/0<?=$i?>.jpg">
										<?="<img src=\"images/adv/0".$i.".jpg\" class=\"adv_pic\">"?>
									</a>

						<?php

								$i++;

							}

						?>
					</div>
				</div>
		    </div>
		</div>

		<!-- 最新資訊 -->
		<div class="ts one column centered grid" style="margin-top:80px;">
		    <div class="column" style="text-align:center;">
		    	<h1><i class="trophy icon"></i> 最新資訊</h1>
				<div class="ts flatted segment basic">
					<div class="ts two column centered grid">
						<div class="ts segment info">
							<?php
								$art_top = $link->query("SELECT id, title, time FROM newinfo WHERE art_top = '1' ORDER BY id DESC LIMIT 1");
								$art_top_row = $art_top->fetch_assoc();
								$newinfo = $link->query("SELECT id, title, time FROM newinfo WHERE art_top = '0' ORDER BY id DESC LIMIT 7");
							?>
								<div class="ts segment basic left aligned">
									<a href="newinfo.php?id=<?=$art_top_row['id']?>" class="article-top-title">
										<i class="star icon"></i> <?="".$art_top_row['title']." <span class=\"art_top_time\">".$art_top_row['time']."</span>"?>
									</a>
								</div>
							<?php

								while ($row = $newinfo->fetch_assoc()) {
							?>
								<div class="ts segment basic left aligned">
									<a href="newinfo.php?id=<?=$row['id']?>" class="article-title">
										<i class="announcement icon"></i> <?="".$row['title']." <span class=\"art_time\">".$row['time']."</span>"?>
									</a>
								</div>
							<?php } ?>
						</div>
					</div>
				</div>
		    </div>
		</div>

		<div class="ts grid center aligned" id="about">
		    <div class="five wide column">
				<a href="about.php"><h1 class="ts header center aligned"><i class="at icon"></i> 關於林錦</h1></a>
			</div>
		    <div class="five wide column">
				<a href="nmc.php"><h1 class="ts header center aligned"><i class="calendar icon"></i> 重要日程</h1></a>
			</div>
		    <div class="five wide column">
				<a href="https://www.facebook.com/juliaenglish2005"><h1 class="ts header center aligned"><i class="facebook icon"></i> 粉絲專頁</h1></a>
			</div>
		</div>

		<div class="ts grid centered" id="maps">
		    <div class="five wide column">
				<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d537.7171373719649!2d121.2258101837733!3d24.955384827626602!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3468224848068aeb%3A0xbdec52f711da666b!2zMzIw5qGD5ZyS5biC5Lit5aOi5Y2A5Lit5bGx6LevMTAw6Jmf!5e0!3m2!1szh-TW!2stw!4v1484379770593" width="400" height="300" frameborder="0" style="border:0" allowfullscreen></iframe>
			</div>
			<div class="eight wide column">
				<div class="ts large list" id="content">
					<div class="item"><i class="map pin icon"></i> &nbsp;&nbsp;桃園市中壢區中山路100號7樓 (光南樓上)</div>
					<div class="item"><i class="phone icon"></i> &nbsp;&nbsp;03-4255189</div>
					<div class="item"><i class="alarm outline icon"></i> &nbsp;&nbsp;營業時間：星期(二) - (五) 3:30PM-10:00PM；(六) 12：30PM~10:00PM；(日) 8：30AM~10：00PM</div>
					<div class="item"><a href="dashboard.php"><i class="toggle on icon"></i></a></div>
				</div>
			</div>
		</div>




		<script>
		    ts('.ts.dropdown:not(.basic)').dropdown();
		</script>
		<script src="play/js/zoom.min.js"></script>
	</body>
</html>
