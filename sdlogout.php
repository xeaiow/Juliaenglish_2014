<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootswatch/3.3.5/flatly/bootstrap.min.css">
	<title>Logout</title>
	<style>
		#wrapper{
			width: 500px;
			margin: 10px auto;
		}
		#title{
			text-align: center;
			font-size: 20px;
		}
		#fonts{
			text-align: center;
			font-size: 30px;
		}
	</style>
</head>
<body>
<?php

	unset($_SESSION['stlogin']);
	unset($_SESSION['pw']);
?>

<div class="panel panel-primary" id="wrapper">
	<div class="panel-heading" id="title">
		已成功登出
	</div>
	<div class="panel-body" id="fonts">
		登出是個好習慣，請繼續保持！
	</div>
</div>

<?php
	echo '<meta http-equiv=REFRESH CONTENT=1;url=http://juliaenglish.com/>';
?>