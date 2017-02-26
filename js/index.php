<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="44/css/style.css" />
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/bootstrap-theme.min.css">
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<title>林錦英語教室</title>
	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.5.2/jquery.min.js"></script>
	<script type="text/javascript" src="44/jquery.aw-showcase.js"></script>
	<script type="text/javascript">

$(document).ready(function()
{
	$("#showcase").awShowcase(
	{
		content_width:			550,
		content_height:			590,
		fit_to_parent:			false,
		auto:					true,
		interval:				3000,
		continuous:				true,
		loading:				true,
		tooltip_width:			200,
		tooltip_icon_width:		16,
		tooltip_icon_height:	16,
		tooltip_offsetx:		18,
		tooltip_offsety:		0,
		arrows:					false,
		buttons:				false,
		btn_numbers:			true,
		keybord_keys:			true,
		mousetrace:				false, /* Trace x and y coordinates for the mouse */
		pauseonover:			true,
		stoponclick:			false,
		transition:				'fade', /* hslide/vslide/fade */
		transition_delay:		0,
		transition_speed:		500,
		show_caption:			'onload', /* onload/onhover/show */
		thumbnails:				false,
		thumbnails_position:	'outside-last', /* outside-last/outside-first/inside-last/inside-first */
		thumbnails_direction:	'vertical', /* vertical/horizontal */
		thumbnails_slidex:		1, /* 0 = auto / 1 = slide one thumbnail / 2 = slide two thumbnails / etc. */
		dynamic_height:			false, /* For dynamic height to work in webkit you need to set the width and height of images in the source. Usually works to only set the dimension of the first slide in the showcase. */
		speed_change:			true, /* Set to true to prevent users from swithing more then one slide at once. */
		viewline:				false, /* If set to true content_width, thumbnails, transition and dynamic_height will be disabled. As for dynamic height you need to set the width and height of images in the source. */
		custom_function:		null /* Define a custom function that runs on content change */
	});
});
</script>
<style>
	body{
		margin:0;
		padding:0;
		background: #000 url(img/eveybg.jpg) center center fixed no-repeat;
		-moz-background-size: cover;
		background-size: cover;
		overflow-x: hidden;
	}
</style>
</head>
<body>
<!--上面-->

<? require 'title.html';
   require 'config/dbconfig.php';
?>

<div class="row">
  <!--左-->
  <div class="col-md-4" id="leftmenu">
	<!--左選單-->
	<ul>
		<li style="background-color:rgba(0,0,0,0.2);border-radius:5px;padding:2px;"><img src="img/icon/video.png" class="iconimg"> <a href="quota.php">&nbsp;<span style="font-size:22px;">林錦語錄</span></a></li>
		<li style="background-color:rgba(0,0,0,0.2);border-radius:5px;padding:2px;"><img src="img/icon/video.png" class="iconimg"> <a href="videoe1.php">&nbsp;<span style="font-size:18px;">高一菁英班(二)</span></a></li>
		<li style="background-color:rgba(0,0,0,0.2);border-radius:5px;padding:2px;"><img src="img/icon/video.png" class="iconimg"> <a href="videoe1x.php">&nbsp;<span style="font-size:18px;">高一資優班(日)</span></a></li>
		<li style="background-color:rgba(0,0,0,0.2);border-radius:5px;padding:2px;"><img src="img/icon/video.png" class="iconimg"> <a href="videoe2.php">&nbsp;<span style="font-size:18px;">高二魔力寫作班</span></a></li>
		<li style="background-color:rgba(0,0,0,0.2);border-radius:5px;padding:2px;"><img src="img/icon/video.png" class="iconimg"> <a href="videoe3.php">&nbsp;<span style="font-size:18px;">高三資優衝刺模考班</span></a></li>
		<li style="background-color:rgba(0,0,0,0.2);border-radius:5px;padding:2px;"><img src="img/icon/video.png" class="iconimg"> <a href="videoe4.php">&nbsp;<span style="font-size:18px;">指考翻譯寫作班</span></a></li>
		<li style="background-color:rgba(0,0,0,0.2);border-radius:5px;padding:2px;"><img src="img/icon/video.png" class="iconimg"> <a href="videoe5.php">&nbsp;<span style="font-size:18px;">中級暨中高級英檢聽力班</span></a></li>
		<li style="background-color:rgba(0,0,0,0.2);border-radius:5px;padding:2px;"><img src="img/icon/video.png" class="iconimg"> <a href="videoe6.php">&nbsp;<span style="font-size:18px;">PISA 英檢預備A班</span></a></li>
		<li style="background-color:rgba(0,0,0,0.2);border-radius:5px;padding:2px;"><img src="img/icon/video.png" class="iconimg"> <a href="videoe7.php">&nbsp;<span style="font-size:18px;">PISA 英檢預備B班</span></a></li>
		<li style="background-color:rgba(0,0,0,0.2);border-radius:5px;padding:2px;"><img src="img/icon/video.png" class="iconimg"> <a href="videoe8.php">&nbsp;<span style="font-size:18px;">PISA 英檢初級班</span></a></li>
		<li style="background-color:rgba(0,0,0,0.2);border-radius:5px;padding:2px;"><img src="img/icon/video.png" class="iconimg"> <a href="videoe9.php">&nbsp;<span style="font-size:18px;">PISA 英檢文法衝刺班</span></a></li>
		<li style="background-color:rgba(0,0,0,0.2);border-radius:5px;padding:2px;"><img src="img/icon/video.png" class="iconimg"> <a href="videoe10.php">&nbsp;<span style="font-size:18px;">PISA 英檢初級聽力班</span></a></li>
	</ul>
  </div>
  <!--中-->
  <div class="col-md-4" id="centerpic">
	<!--圖片輪播-->
		<div id="showcase" class="showcase">
	<?
		$i = 1;
		$countdate = "SELECT advcount FROM user";
		$count = mysql_query($countdate);
		$row = mysql_fetch_array($count);
		while ($i <= $row['advcount']) { ?>
			<div class="showcase-slide">
				<div class="showcase-content">
					<? echo "<img src=\"img/adv/0".$i.".jpg\">"; ?>
				</div>
			</div>
	<?
		$i++;
		}
		mysql_free_result($count);
	?>
		</div>
  </div>
  <!--右-->
  <div class="col-md-4" id="newborder">
	<!--最新資訊-->
		<div id="newinfo">
		    <h4 align="center" style="font-size:30px;" class="new-font">最新資訊 <img src="img/icon/new1.png" style="width:32px;hieght:32px;margin-top:-5px;"></h4>
		<?php
			$newinfo = "SELECT title,time FROM newinfo ORDER BY id DESC LIMIT 7";
			$query = mysql_query($newinfo);
			while ($row = mysql_fetch_array($query)) {
			?>
			<p style="font-size:18px;color:#444;margin-left:10px;margin-bottom:-2px;"><a href="newinfo.php"><img src="img/icon/ms.png" style="width:32px;height:32px;"> <? echo "".$row['title']." <span style=\"font-size:15px;\">".$row['time']."</span>"; ?></a></p>
		<?
			}
		?>
		</div>
		<div id="fb"><a href="https://www.facebook.com/juliaenglish2005" title="&#x6797;&#x9326;" target="_TOP"><img class="img" src="https://badge.facebook.com/badge/308441589337847.342.349940586.png" style="border: 0px;" alt="" /></a></div>
		</div>
	</div>

</div>

<?php
	mysql_free_result($query);
	mysql_close($link);
?>

<div id="footer">
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
