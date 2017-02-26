<!DOCTYPE html>
<html lang="zh-tw">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/bootstrap-theme.min.css">
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>林錦英語行事曆</title>
	<style>
		body{
			background-image: url(images/mcbg.png);
		}
		#pic{
			margin-top: 20px;
			padding-left: 30px;
		}
		#sdate{
			margin-top: 20px;
			width: 150px;
		}
	</style>
</head>
<body>

<div class="row">

  <div class="col-xs-10" id="pic">
	<?php
		require 'config/dbconfig.php';
		$class = substr($_SERVER['QUERY_STRING'],5);
		$mc = "SELECT * FROM mc WHERE name = '$class'";
		$query = mysql_query($mc);
		while ($row = mysql_fetch_row($query)) {
			echo " <img src=\"$row[1]\" /> ";
			mysql_close($link);
		}
	?>  	
  </div>

  <div class="col-xs-2">
  	<select id="sdate" class="form-control" onChange="self.location.href=this.value">
  		<option>請選擇月份</option>
  		<option value="mc.php?date=201504">2015/4</option>
  		<option value="mc.php?date=201505">2015/5</option>
  		<option value="mc.php?date=201506">2015/6</option>
  		<option value="mc.php?date=201507">2015/7</option>
  	</select>
  </div>
</div>

</body>
</html>