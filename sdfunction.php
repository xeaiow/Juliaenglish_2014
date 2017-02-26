<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootswatch/3.3.5/flatly/bootstrap.min.css">
	<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<title>學員資訊系統</title>
	<style>
		body{
			background-image: url(images/bg3.png);
			color: #555;
			overflow-x: hidden;
			line-height: 35px;
			font-size: 20px;
		}
		#wrapper{
			margin: 0 auto;
		}
		a{
			text-decoration: none;
			color: #DDD;
		}
		a:hover{
			text-decoration: none;
			color: #205081;
		}
		input[type="text"]{
			background-color: #333;
			color: #DDD;
		}
		#title{
			font-size: 30px;
			text-align: center;
			color: #DDD;
		}
		ul li a{
			color: #444;
			font-size: 25px;
			list-style: none;
		}
		ul li{
			color: #BBB;
			font-size: 25px;
			list-style: none;
		}
		#curr_menu{
			width: 450px;
			background-color: #EEE;
			border: 1px solid #333;
			box-shadow: 1px 1px 2px #DDD;
		}
		.fa.fa-inbox, .fa.fa-file{
			font-size: 30px;
			padding-right: 19px;
		}
		.fa.fa-flag{
			font-size: 30px;
			padding-right: 15px;
		}
		.fa.fa-paper-plane-o{
			padding-right: 10px;
		}
		.button_right{
			float: right;
		}
	</style>
</head>
<body>
<?php

if(empty($_SESSION['stlogin']) || empty($_SESSION['pw'])){

		echo '<meta http-equiv=REFRESH CONTENT=0;url=sdlogin.php>';
		exit();
	}
?>

<!--選單-->

<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">

		<?php
			require 'config/dbconfig.php';
			$id = $_SESSION['stlogin'];
			$newinfo = "SELECT * FROM sd WHERE sid = '$id'";
			$query = mysql_query($newinfo);
			$row = mysql_fetch_array($query);
		?>
		<a class="navbar-brand" href="#"><?php echo $row['sid']." , ".$row['sname']." 您好";?></a>

		<ul class="nav navbar-nav navbar-right">
	        <li class="dropdown">
	          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-cog"></i> 操作 <span class="caret"></span></a>
	          <ul class="dropdown-menu">
	            <li><a href="http://juliaenglish.com/">回首頁</a></li>
				<li><a data-toggle="modal" data-target="#cpw">更改密碼</a></li>
				<li><a href="sdlogout.php">登出</a></li>
	          </ul>
	          <?php
				$me    = $_SESSION['stlogin'];
				$query = "SELECT sid, e5, e10 FROM sd WHERE sid = '$me' AND (e5 = 'f1' OR e10 = 'k1')";
				$sql   = mysql_query($query);

				if (mysql_num_rows($sql) != 0) { ?>
					<li><a href="hearing.php"><i class="fa fa-volume-up"></i> 英聽系統</a></li>
				<?php
				}
	          ?>
	        </li>
	    </ul>

    </div>
  </div>
</nav>

<div class="row" id="wrapper">
	<!--課程表-->
	<div class="col-md-4">

		<div class="panel panel-primary" id="curr_menu">
			<div class="panel-heading" id="title">課程選單</div>
			<div class="panel-body">
			<?php

				$id = $_SESSION['stlogin'];
				$lp = "SELECT * FROM sd WHERE sid = '$id'";
				$query2 = mysql_query($newinfo);

				while ($row = mysql_fetch_array($query2)) {

					require 'str.php';

					$re1 = $row['e1'];
					echo "<ul>"."<li>".$msg."</li>";
					echo "<li>".$msg1."</li>";
					echo "<li>".$msg11."</li>";
					echo "<li>".$msg2."</li>";
					echo "<li>".$msg3."</li>";
					echo "<li>".$msg6."</li>";
					echo "<li>".$msg7."</li>";
					echo "<li>".$msg8."</li>";
					echo "<li>".$msg9."</li>";
					echo "<li>".$msg10."</li>";
					echo "<li>".$msg12."</li>";
					echo "<li>".$msg4."</li>";
					echo "<li>".$msg5."</li>"."</ul>";
				}
			?>
			</div>
		</div>

	</div>
	<!--成績登陸-->
	<div class="col-md-8">

<?
	date_default_timezone_set('Asia/Taipei');
	$now = date("Y-m-d");
	$score_import    = "SELECT * FROM score, sd WHERE sd.sid = '$id' AND (score.curr_type = sd.e1 OR score.curr_type = sd.e1x OR score.curr_type = sd.e2 OR score.curr_type = sd.e3 OR score.curr_type = sd.e4 OR score.curr_type = sd.e5 OR score.curr_type = sd.e6 OR score.curr_type = sd.e7 OR score.curr_type = sd.e8 OR score.curr_type = sd.e9 OR score.curr_type = sd.e10 OR score.curr_type = sd.e11 OR score.curr_type = sd.e12) AND score.curr_enddate > '$now'";
	$score_query     = mysql_query($score_import); /* 列出要被登錄的成績單 */
	$score_query_num = mysql_num_rows($score_query);  /* 如果沒有就顯示 "目前沒有考卷需要登錄成績" */

	if ($score_query_num == 0) {

		echo "<span id=\"import_curr_score\" class=\"glyphicon glyphicon-volume-up\"> 目前沒有考卷需要登錄成績</span>";

	}

	else{

		while ($row = mysql_fetch_array($score_query)) {

			require 'score_replace2.php';

			if ($row['curr_sort'] == 2) { ?>
				<div class="panel panel-primary">
					<div class="panel-heading"><i class="fa fa-file"></i>名稱：<?php echo $row['curr_name'];?></div>
					<div class="panel-body">
						<i class="fa fa-flag"></i>課程：<?php echo $ms1."<br/>"."<i class=\"fa fa-inbox\"></i>類別：月考"; ?>
						<div class="button_right"><button  onclick="javascript:location.href='mescore_import.php?id=<?php echo $row['curr_id'];?>'" class="btn btn-warning btn-xs"><i class="fa fa-paper-plane-o"></i>登錄成績</button></div>
					</div>

				</div>
	<?php
			}

			else{ ?>

				<div class="panel panel-primary">
					<div class="panel-heading"><i class="fa fa-file"></i>名稱：<?php echo $row['curr_name'];?></div>
					<div class="panel-body">
						<i class="fa fa-flag"></i>課程：<?php echo $ms1."<br/>"."<i class=\"fa fa-inbox\"></i>類別：小考"; ?>
						<div class="button_right"><button  onclick="javascript:location.href='score_import.php?id=<?php echo $row['curr_id'];?>'" class="btn btn-danger btn-xs"><i class="fa fa-paper-plane-o"></i>登錄成績</button></div>
					</div>
				</div>

	<?php
			}
		}
	}
?>

	</div>

</div>





<!--改密碼-->
<div id="cpw" class="modal fade">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" align="center">設定新的密碼</h4>
      </div>
      <div class="modal-body">
	  <form method="GET" action="sdfunction.php">
			<input type="text" name="did" placeholder="輸入新的密碼" class="form-control"><br/>
			<input type="text" name="did2" placeholder="確認密碼" class="form-control"><br/>
			<input type="submit" class="btn btn-primary" value="更改" name="submit">
	  </form>
      </div>
    </div>
  </div>
</div>


<?php

	if (isset($_GET['submit'])) {

		$did = $_GET['did'];
		$did2 = $_GET['did2'];

	if ($did != $did2) { ?>
		<script>
			alert('密碼不一致！');
            history.back();
		</script>
	<?
		exit();
	}

    if (!preg_match('/^[A-Za-z0-9]{4,15}$/', $_GET['did'])) { ?>
        <script type="text/javascript">
            alert('抱歉，密碼限制輸入英文A-z及長度4-15字元！');
            history.back();
        </script>
    <?php
        exit();
    }

		$myid = $_SESSION['stlogin'];
		$query3 = "UPDATE sd SET pw = '$did' WHERE sid = '$myid'";
		if(mysql_query($query3)){ ?>
	        <div class="alert alert-success" role="alert" align="center"><h3>更改成功！</h3></div> <?
	        echo '<meta http-equiv=REFRESH CONTENT=1;url=sdfunction.php>';
	    }
	    else{ ?>
	        <div class="alert alert-danger" role="alert" align="center"><h3>更改失敗！</h3></div> <?
	        echo '<meta http-equiv=REFRESH CONTENT=1;url=sdfunction.php>';
	    }
	}

	mysql_close($link);

?>

</body>
</html>
