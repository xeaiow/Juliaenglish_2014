<!DOCTYPE HTML>
<html>
	<head>
		<title>林錦英語教室 - 最新資訊</title>
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
						<?php
							require 'config/dbconfig.php';
							$class = substr($_SERVER['QUERY_STRING'],3);
							$newinfo = "SELECT * FROM newinfo WHERE id = '$class'";
							$query = mysql_query($newinfo);
							$i = 1; 
						?>

						<!-- Content -->
						<div id="content" class="12u skel-cell-important">
							<section class="newinfobg">
							<?php
								while ($row = mysql_fetch_array($query)) { ?>
									<header class="major">
										<p style="text-align:center;margin-top:10px;"><?="<span style='background-color:#8ec06c;border-radius:5px;padding:8px;margin-right:15px;color:#333;font-size:30px;'><i class='fa fa-paper-plane-o'></i> ".$row['title']."</span>"."<span style='background-color:#b4a996;border-radius:5px;padding:8px;font-size:30px;'><i class='fa fa-clock-o'></i> ".$row['time']."</span>"; ?></p>
									</header>
									<p>
										<?=$row['content'];?>
									</p>
							<?php
									$i++;
								}
								mysql_close($link);
							?>
							</section>
						</div>
					</div>
				</div>
			</div>
		
			<div class="wrapper style5">

				<section id="team" class="container">

					<div class="row">

						<div class="3u">

							<a href="about.php" class="image"><i class="fa fa-graduation-cap"></i></a>
							
							<h3 class="h3_fc">關於林錦</h3>
							
						</div>

						<div class="3u">

							<a href="nmc.php" class="image"><i class="fa fa-calendar"></i></i></a>
							
							<h3 class="h3_fc">重要日程</h3>
							
						</div>

						<div class="3u">

							<a href="https://www.facebook.com/juliaenglish2005" class="image"><i class="fa fa-facebook-square fa-4"></i></a>
							
							<h3 class="h3_fc">粉絲專頁</h3>
							
						</div>

						<div class="3u">

							<a href="http://goo.gl/cJyLC8" class="image"><i class="fa fa-map-marker fa-4"></i></a>
							
							<h3 class="h3_fc">林錦地圖</h3>
							
						</div>

					</div>

				</section>

			</div>


	<!-- Footer -->
		<div id="footer">

			<section class="container">

				<header class="major">

					<div class="byline" id="eng_info">

					<div id="shop_info">

						<span><i class="fa fa-map-marker"></i> &nbsp;<a style="color:#333;" href="http://goo.gl/cJyLC8">桃園市中壢區中山路100號7樓 (光南樓上)</a></span>
						<span><i class="fa fa-phone"></i> 03-4255189</span>
						<span><i class="fa fa-home"></i> 營業時間：星期(二) - (五) 3:30pm-10:00pm；(六) 12：30pm~10:00pm；(日) 8：30am~10：00pm</span>	
					</div>
					
					</div>

				</header>

			</section>	

		</div>

	</body>
</html>