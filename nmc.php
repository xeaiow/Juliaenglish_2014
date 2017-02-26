<!DOCTYPE html>
<html lang="zh-tw">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootswatch/3.3.2/yeti/bootstrap.min.css">
  	<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
  	<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootswatch/3.3.4/flatly/bootstrap.min.css">
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<title>管理月曆</title>
	<style>
		img{
			width:70%;height:70%;
		}
    body{
      text-align: center;
    }
	</style>
</head>
<body>

<div class="row">
  <div class="col-md-12">
  	<?php
  		require 'config/dbconfig.php';
  		$mc    = "SELECT * FROM mc ORDER BY name DESC";
  		$query = mysql_query($mc);
  		while ($row = mysql_fetch_array($query)) {
  			echo " <div class=\"well\" style=\"font-size:40px;\"><img src=\"$row[2]\" /> </div> ";
  		}
  		mysql_close($link);
  	?>
  </div>
</div>

</body>
</html>
