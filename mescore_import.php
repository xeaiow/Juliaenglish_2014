<?php session_start(); ?>
<!DOCTYPE html>
<html lang="zh-tw">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootswatch/3.3.4/sandstone/bootstrap.min.css">
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<title>輸入成績-月考</title>
	<style type="text/css">
		body{
			overflow-x: hidden;
			background-color: #E9EAED;
		}
		#form_import{
			width: 500px;
			margin: 10px auto;
		}
		#test_name{
			color: red;
			font-size: 20px;
		}
	</style>
</head>
<body>

<?php
if(empty($_SESSION['stlogin'])){

		echo '<meta http-equiv=REFRESH CONTENT=0;url=sdlogin.php>';
		exit();
	}

require 'config/dbconfig.php';
$me = $_SESSION['stlogin'];
$sql = "SELECT * FROM sd WHERE sid = '$me'";
$query = mysql_query($sql);
$row = mysql_fetch_array($query);
$sid = $row['sid'];
$name = $row['sname'];

$curr = substr($_SERVER['QUERY_STRING'], 3);

$sql2 = "SELECT * FROM score WHERE curr_id = '$curr'";
$query2 = mysql_query($sql2);
$row2 = mysql_fetch_array($query2);

?>

<div class="row">
	<div class="col-md-12">
		<div id="form_import">
			<nav class="navbar navbar-default">
			  <div class="container-fluid">
			    <div class="navbar-header">
			      <a class="navbar-brand">
			        <?php echo "姓名：".$name." | 學號：".$sid; ?>
			      </a>
			    </div>
			  </div>
			</nav>
			<div class="well well-sm">
				<?php echo "<span class=\"glyphicon glyphicon-alert\"></span> <span id=\"test_name\">考卷名稱：".$row2['curr_name']."</span>".
				"<br/>請確認成績輸入無誤後登陸，一旦確認將無法修改！"; ?>
			</div>
			<form method="POST" action="mescore_import_finish.php">
				預約日一：<input type="date" class="form-control" name="import_reser1" style="display:inline;width:200px;"><br />
				預約日二：<input type="date" class="form-control" name="import_reser2" style="display:inline;width:200px;"><br /><br />
				<input type="hidden" name="import_name" value="<?php echo $name ?>">
				<input type="hidden" name="import_curr" value="<?php echo $curr ?>">
				<input type="hidden" name="import_after" value="1">
				<input type="text" name="import_ver" placeholder="版本" class="form-control"><br />
				<input type="text" name="import_book" placeholder="冊" class="form-control"><br />
				<input type="text" name="import_less1" placeholder="課" class="form-control" style="display:inline;width:80px;"> 到 
				<input type="text" name="import_less2" placeholder="課" class="form-control" style="display:inline;width:80px;"><br /><br />
				<input type="submit" value="確認送出" class="btn btn-primary" onclick="return confirm('確定無誤並登錄成績')">
				<input type="button" value="取消返回" class="btn btn-danger" onclick="javasciprt:window.location.href='sdfunction.php';">
			</form>
		</div>
		
	</div>
</div>
<?php mysql_close($link); ?>
</body>
</html>