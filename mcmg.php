<?php session_start(); ?>
<!DOCTYPE html>
<html lang="zh-tw">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootswatch/3.3.2/yeti/bootstrap.min.css">
  	<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
  	<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootswatch/3.3.4/flatly/bootstrap.min.css">
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<title>月曆</title>
	<style>
		img{
			width:50%;height:50%;
		}
	</style>
</head>
<body>

<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
    	<a class="navbar-brand" href="#">
    		<button class="btn btn-warning" onclick="javascript:location.href='add.php'">回管理介面</button>
    	</a>
    </div>
  </div>
</nav>

<div class="row">
  <div class="col-md-12">
  	<?php 
  		require 'config/dbconfig.php';
  		$mc    = "SELECT * FROM mc ORDER BY name DESC";
  		$query = mysql_query($mc);
  		while ($row = mysql_fetch_array($query)) {
  			echo " <div class=\"well\" style=\"font-size:40px;\">月份：$row[0]<br/><img src=\"$row[1]\" /> <a href=\"delmc.php?name=$row[0]\"><button class=\"btn btn-danger\" OnClick=\"return confirm('確定刪除 $row[0] 月曆？');\">刪除月曆</button></a> </div> ";
  		}
  		mysql_close($link);
  	?>
  </div>
</div>

</body>
</html>