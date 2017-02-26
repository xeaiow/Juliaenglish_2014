<!DOCTYPE HTML>
<!--
	Solarize by TEMPLATED
	templated.co @templatedco
	Released for free under the Creative Commons Attribution 3.0 license (templated.co/license)
-->
<html>
	<head>
		<title>林錦英語教室 - 影片試看</title>
		<meta charset="utf-8" />
		<meta name="description" content="" />
		<meta name="keywords" content="" />
		<link rel="stylesheet" href="css/bootstrap.min.css">
		<link rel="stylesheet" href="css/bootstrap-theme.min.css">
		<script src="js/bootstrap.min.js"></script>
		<!--[if lte IE 8]><script src="css/ie/html5shiv.js"></script><![endif]-->
		<script src="js/jquery.min.js"></script>
		<script src="js/jquery.dropotron.min.js"></script>
		<script src="js/skel.min.js"></script>
		<script src="js/skel-layers.min.js"></script>
		<script src="js/init.js"></script>
		<noscript>
			<link rel="stylesheet" href="css/skel.css" />
			<link rel="stylesheet" href="css/style.css" />
		</noscript>
		<!--[if lte IE 8]><link rel="stylesheet" href="css/ie/v8.css" /><![endif]-->
	</head>
	<body>

		<!-- Header Wrapper -->
			<div class="wrapper style1">
			
				<!-- Header -->
				<div id="header">
					<div class="container">	
					<!--Nav -->
						<?php require 'title.html';?>
					</div>
				</div>

			</div>
		
		<!-- Main -->
			<div id="main" class="wrapper style4">
				<div class="container">
					<div class="row">

						<!-- Sidebar -->
						<div id="sidebar" class="4u">
							<!--影片分類-->
							<section>
								<header class="major">
									<h2>最新影片</h2>
								</header>									
								<ul class="default">
								<?php
									require 'config/dbconfig.php';
									$class = substr($_SERVER['QUERY_STRING'],3);
									$video = "SELECT * FROM video ORDER BY id DESC";
									$query = mysql_query($video);

									while($row = mysql_fetch_array($query)) { ?>
										<li><i class="fa fa-youtube-play"></i> <a href="newvideo.php?id=<?php echo $row['id'];?>"><?php echo $row['title']."&nbsp;-"."&nbsp;".$row['time'];?></a></li>
								<?php
									}
								?>
								</ul>
							</section>
							<!--最新影片-->
							<section>
								<header class="major">
									<h2>影片分類</h2>
								</header>									
								<ul class="default">
									<i class="fa fa-circle"></i> <a href="video.php?class=quota">林錦語錄</a><br/>
									<i class="fa fa-circle"></i> <a href="video.php?class=e1">高一菁英班(二)</a><br/>
									<i class="fa fa-circle"></i> <a href="video.php?class=e1x">高一資優班(日)</a><br/>
									<i class="fa fa-circle"></i> <a href="video.php?class=e11">高一先修班</a><br/>
									<i class="fa fa-circle"></i> <a href="video.php?class=e2">高二魔力寫作班</a><br/>
									<i class="fa fa-circle"></i> <a href="video.php?class=e3">高三資優衝刺模考班</a><br/>
									<i class="fa fa-circle"></i> <a href="video.php?class=e6">PISA 英檢預備A班</a><br/>
									<i class="fa fa-circle"></i> <a href="video.php?class=e7">PISA 英檢預備B班</a><br/>
									<i class="fa fa-circle"></i> <a href="video.php?class=e8">PISA 英檢初級班</a><br/>
									<i class="fa fa-circle"></i> <a href="video.php?class=e9">PISA 英檢文法衝刺班</a><br/>
									<i class="fa fa-circle"></i> <a href="video.php?class=e10">PISA 英檢初級聽力班</a><br/>
									<i class="fa fa-circle"></i> <a href="video.php?class=e12">PISA 菁英進階班</a><br/>
									<i class="fa fa-circle"></i> <a href="video.php?class=e4">指考翻譯寫作班</a><br/>
									<i class="fa fa-circle"></i> <a href="video.php?class=e5">中級暨中高級英檢聽力班</a><br/>
								</ul>
							</section>

							
						</div>

						<?php
							$class = substr($_SERVER['QUERY_STRING'],3);
							$video2 = "SELECT * FROM video WHERE id = '$class' ORDER BY id DESC";
							$query2 = mysql_query($video2);
						?>

						<!-- Content -->
						<div id="content" class="8u skel-cell-important">
							<section class="newinfobg">
							<?php
								while ($row = mysql_fetch_array($query2)) { ?>
									<header class="major">
										<h2><?echo $row['title']."&nbsp;".$row['time']; ?></h2>
									</header>
									<p>
										<?echo $row['content'];?>
									</p>
							<?php
								}
								mysql_close($link);
							?>
								
							</section>
						</div>
					</div>
				</div>
			</div>
		
		<!-- Team -->
			<div class="wrapper style5">
				<section id="team" class="container">
					<div class="row">
						<div class="3u">
							<a href="newinfo.php" class="image"><i class="fa fa-comments fa-4"></i></a>
							<h3>所有公告</h3>
							
						</div>
						<div class="3u">
							<a href="video.php" class="image"><i class="fa fa-video-camera fa-4"></i></a>
							<h3>影片試看</h3>
							
						</div>
						<div class="3u">
							<a href="https://www.facebook.com/juliaenglish2005" class="image"><i class="fa fa-facebook-square fa-4"></i></a>
							<h3>粉絲專頁</h3>
							
						</div>
						<div class="3u">
							<a href="http://goo.gl/cJyLC8" class="image"><i class="fa fa-map-marker fa-4"></i></a>
							<h3>林錦地圖</h3>
							
						</div>
					</div>
				</section>
			</div>

	<!-- Footer -->
		<div id="footer">
			<section class="container">
				<header class="major">
					<span class="byline">
						<i class="fa fa-map-marker"></i> <a href="http://goo.gl/cJyLC8">地址：桃園市中壢區中山路100號7樓 (光南樓上)</a>｜<i class="fa fa-phone"></i> 電話：03-4255189｜<i class="fa fa-home"></i> 營業時間：星期(二) - (五) 3:30pm-10:00pm；(六) 12：30pm~10:00pm；(日) 8：30am~10：00pm｜<a href="add.php"><i class="fa fa-wrench"></i></a>						
					</span>
				</header>
				<ul class="icons">
					<a href="https://www.facebook.com/juliaenglish2005" title="&#x6797;&#x9326;" target="_TOP"><img class="img" src="https://badge.facebook.com/badge/308441589337847.342.349940586.png" style="border: 0px;" alt="" /></a>
				</ul>
			</section>			
		</div>

	</body>
</html>