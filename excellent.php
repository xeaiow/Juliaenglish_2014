<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/bootstrap-theme.min.css">
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<title>優異學生成績</title>
  <style>
    body{
      margin:0;
      padding:0;
      background: #000 url(img/eveybg.jpg) center center fixed no-repeat;
      -moz-background-size: cover;
      background-size: cover;
    }
    #carousel-example-generic{
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

<div id="carousel-example-generic" class="carousel slide" data-ride="carousel" style="width:600px;margin:0 auto;">

  <!-- Wrapper for slides -->
  <div class="carousel-inner" role="listbox">
    <div class="item active">
      <img src="img/teach/01.jpg">
    </div>

    <div class="item">
      <img src="img/teach/02.jpg">
    </div>

    <div class="item">
      <img src="img/teach/03.png">
    </div> 

    <div class="item">
      <img src="img/teach/04.jpg">
    </div> 

    <div class="item">
      <img src="img/teach/05.jpg">
    </div>  
  </div>

  <!-- Controls -->
  <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
  
</div>

<!--footer-->
<div id="footer" style="margin-top:50px;">
  <div id="address">
    <br/><img src="img/icon/address.png" style="width:20px;height:20px;margin-top:-5px;"><a href="http://goo.gl/khhMJU" style="color:#DDD;">&nbsp;&nbsp;地址：桃園市中壢區中山路100號7樓 (光南樓上)</a><br/>
    <img src="img/icon/phone.png" style="width:18px;height:18px;margin-top:-5px;margin-left:2px;">&nbsp;&nbsp;電話：03-4255189<span style="font-size:20px;margin-left:300px;"><img src="img/icon/manage.png" style="width:18px;height:18px;margin-top:-5px;">&nbsp;&nbsp;<a href="add.php" style="color:#DDD;">管理網頁</a></span>
  </div>
  <div id="time">
    <img src="img/icon/shop.png" style="width:32px;height:32px;margin-top:-5px;">&nbsp;營業時間：星期(二) - (五) 3:30pm-10:00pm；(六) - (日)：8:30am~10:00am
  </div>
</div>

<div style="margin-top:-430px;margin-left:100px;position:relative;float:left;z-index:-2;">
  <img src="img/indexp1.png" style="width:192px;height:396px;">
</div>

<div style="margin-top:-250px;margin-left:20px;position:relative;float:left;z-index:-2;">
  <img src="img/indexp2.png" style="width:83px;height:223px;">
</div>

<div style="margin-top:-610px;margin-left:910px;position:relative;float:left;z-index:-2;">
  <img src="img/indexp3.png" style="width:498px;height:153px;">
</div>

<div style="margin-top:-1105px;margin-left:220px;position:relative;float:left;z-index:-2;">
  <img src="img/teach/09.png" style="width:100px;height:170px;">
</div>

</body>
</html>