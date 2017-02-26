<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="//maxcdn.bootstrapcdn.com/bootswatch/3.3.2/flatly/bootstrap.min.css">
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<script type="text/javascript" src="js/minwt.auto_full_height.mini.js"></script>
	<title>影片區</title>
	<style>
		body{
			margin:0;
			padding:0;
			background: #000 url(img/eveybg.jpg) center center fixed no-repeat;
			-moz-background-size: cover;
			background-size: cover;
		}
	</style>
	<script>
	(function(d, s, id) {
	  var js, fjs = d.getElementsByTagName(s)[0];
	  if (d.getElementById(id)) return;
	  js = d.createElement(s); js.id = id;
	  js.src = "//connect.facebook.net/zh_TW/sdk.js#xfbml=1&appId=799883043394541&version=v2.0";
	  fjs.parentNode.insertBefore(js, fjs);
	}
	(document, 'script', 'facebook-jssdk'));
	</script>
</head>
<body>
	
<div id="warrper">	
	<? require 'title.html'; ?>
	<!--左選單-->
	<ul class="list-group" style="width:150px;position:relative;float: left;">
	  <li class="list-group-item"><a href="index.php" style="color:crimson;"><img src="img/icon/home.png" style="width:22px;height:20px;margin-left:2px;"> &nbsp;回首頁</a></li>
	  <li class="list-group-item"><img src="img/icon/exam.png" class="iconimg"> <a href="newinfo.php">&nbsp;最新公告</a></li>
	  <li class="list-group-item"><img src="img/icon/play.png" class="iconimg"> <a href="video.php">&nbsp;影片試看</a></li>
	  <li class="list-group-item"><img src="img/icon/fb.png" class="iconimg"> <a href="https://www.facebook.com/juliaenglish2005">&nbsp;FB粉絲專頁</a></li>
	</ul>

	<?php
		$class = substr($_SERVER['QUERY_STRING'],6);
		require 'config/dbconfig.php';
		$newinfo = "SELECT * FROM video WHERE class = '$class' ORDER BY id DESC";
		$query = mysql_query($newinfo);
		$i = 1;
		while ($row = mysql_fetch_array($query)) {
	?>
	<div>
		<div style="width:1000px;margin:0 auto;">
			<span class="label label-danger" style="font-size:20px;"><?echo $i; ?></span>&nbsp;
			<span style="background-color: rgba(142, 219, 47, 0.9);text-shadow:-1px 1px 2px #777;color:#333;border-radius:3px;font-size:30px;">&nbsp;<?echo $row['title']; ?> </span>&nbsp;
			<span class="label label-default" style="font-size:15px;"><img src="img/icon/time.png" style="margin-top:-3px;"> <?echo "上傳於 ".$row['time']; ?></span>
		</div>
		<div style="width:1000px;margin:0 auto;font-size:20px;" class="panel panel-default" >
			<div class="panel-footer" style="background-image:url(img/bg3.png);" id="content"><p style="text-align:center;"><?echo  $row['content'];?></p>
		<div class="fb-like"></div>
		</div>
	</div><br/>
	<?
		$i++;
		}
	?>

	<!--footer-->
	<div id="footer" style="margin-top:470px;">
		<div id="address">
			<br/><img src="img/icon/address.png" style="width:20px;height:20px;margin-top:-5px;"><a href="http://goo.gl/khhMJU" style="color:#DDD;">&nbsp;&nbsp;地址：桃園市中壢區中山路100號7樓 (光南樓上)</a><br/>
			<img src="img/icon/phone.png" style="width:18px;height:18px;margin-top:-5px;margin-left:2px;">&nbsp;&nbsp;電話：03-4255189<span style="font-size:20px;margin-left:300px;"><img src="img/icon/manage.png" style="width:18px;height:18px;margin-top:-5px;">&nbsp;&nbsp;<a href="add.php" style="color:#DDD;">管理網頁</a></span>
		</div>
		<div id="time">
			<img src="img/icon/shop.png" style="width:32px;height:32px;margin-top:-5px;">&nbsp;營業時間：星期(二) - (五) 3:30pm-10:00pm；(六) - (日)：8:30am~10:00am
		</div>
	</div>

	<div style="margin-top:-210px;margin-left:510px;position:relative;float:left;z-index:-2;">
		<img src="img/indexp3.png" style="width:498px;height:153px;">
	</div>

	<div style="margin-top:-250px;margin-left:60px;position:relative;float:left;z-index:-2;">
		<img src="img/indexp2.png" style="width:83px;height:223px;">
	</div>
</div>

</body>
</html>