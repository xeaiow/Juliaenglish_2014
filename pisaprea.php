<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/bootstrap-theme.min.css">
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<title>PISA 英檢預備A班</title>
	<style>
		body{
			margin:0;
			padding:0;
			background: #000 url(img/eveybg.jpg) center center fixed no-repeat;
			-moz-background-size: cover;
			background-size: cover;
		}
		div img{
			-moz-box-shadow:4px 4px 12px -2px rgba(20%,20%,40%,0.5);
			-webkit-box-shadow:4px 4px 12px -2px rgba(20%,20%,40%,0.5);
			box-shadow:4px 4px 12px -2px rgba(20%,20%,40%,0.5);	
		}		
	</style>	
</head>
<body>
	
<? require 'title.html'; ?>

<ul class="list-group" style="width:150px;position:relative;float: left;">
  <li class="list-group-item"><a href="index.php" style="color:crimson;"><img src="img/icon/home.png" style="width:22px;height:20px;margin-left:2px;"> &nbsp;回首頁</a></li>
  <li class="list-group-item"><img src="img/icon/exam.png" class="iconimg"> <a href="newinfo.php">&nbsp;最新公告</a></li>
  <li class="list-group-item"><img src="img/icon/play.png" class="iconimg"> <a href="video.php">&nbsp;影片試看</a></li>
  <li class="list-group-item"><img src="img/icon/fb.png" class="iconimg"> <a href="https://www.facebook.com/juliaenglish2005">&nbsp;FB粉絲專頁</a></li>
</ul>

<div style="width:800px;height:100px;margin:0 auto;">
	<img src="img/es/01.jpg">
</div>

<!--footer-->
<div id="footer" style="margin-top:530px;">
	<div id="address">
		<br/><img src="img/icon/address.png" style="width:20px;height:20px;margin-top:-5px;"><a href="http://goo.gl/khhMJU" style="color:#DDD;">&nbsp;&nbsp;地址：桃園市中壢區中山路100號7樓 (光南樓上)</a><br/>
		<img src="img/icon/phone.png" style="width:18px;height:18px;margin-top:-5px;margin-left:2px;">&nbsp;&nbsp;電話：03-4255189<span style="font-size:20px;margin-left:300px;"><img src="img/icon/manage.png" style="width:18px;height:18px;margin-top:-5px;">&nbsp;&nbsp;<a href="add.php" style="color:#DDD;">管理網頁</a></span>
	</div>
	<div id="time">
		<img src="img/icon/shop.png" style="width:32px;height:32px;margin-top:-5px;">&nbsp;營業時間：星期(二) - (五) 3:30pm-10:00pm；(六) - (日)：8:30am~10:00am
	</div>
</div>

</body>
</html>