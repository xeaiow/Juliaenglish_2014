<?php session_start(); ?>
<!DOCTYPE html>
<html lang="zh-tw">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootswatch/3.3.5/flatly/bootstrap.min.css">
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="css/scorestyle.css">
	<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
	<title>新增一份考卷</title>
</head>
<body>

<?php
if(empty($_SESSION['nickname'])){

		echo '<meta http-equiv=REFRESH CONTENT=0;url=login.php>';
		exit();
	} ?>

<!--功能選單-->
<nav class="navbar navbar-default" role="navigation">
  <div class="container-fluid">
      <button class="btn btn-warning btn-lg" data-toggle="modal" data-target="#add"><span class="glyphicon glyphicon-plus"> 新增考卷</span></button>
      <ul class="nav navbar-nav navbar-right">
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-cog"></span> 操作 <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="add.php">管理介面</a></li>
            <li><a href="index.php">首頁</a></li>
            <li><a href="logout.php">登出</a></li>
          </ul>
        </li>
      </ul>

  </div>
</nav>
		
<div class="row">

	<!--左-->
	<div class="col-md-12">
		<?
			require 'config/dbconfig.php';
			date_default_timezone_set('Asia/Taipei');
			$now = date("Y-m-d");
			$query = "SELECT * FROM score ORDER BY curr_id DESC";
			$sql   = mysql_query($query);
			while ($row = mysql_fetch_row($sql)) {
				require 'score_replace.php';
				if ($row[2] > $now) { ?>

					<div class="alert alert-success" id="curr_all" role="alert"> <?php
						echo "<span class=\"curr_name\">"."代號&nbsp;：".$row[0]."</span><br />".
							"<span class=\"curr_name\">名稱&nbsp;：</span>".$row[3]."<br />".
							"<span class=\"curr_name\">課程&nbsp;：</span>".$ms1."<br />".
							"<span class=\"curr_name\">日期&nbsp;：</span>".$row[1]."<br />".
							"<span class=\"curr_name\">到期&nbsp;：</span>".$row[2]."<br />";
							if ($row[5] == 2) {
								echo "<span class=\"curr_name\">類型&nbsp;：</span>"."月考";
								echo "<a class=\"btn btn-info\" id=\"view\" href=\"meview_score.php?id=$row[0]\"><i class=\"fa fa-bar-chart\"></i></a>";
								echo "<a class=\"btn btn-danger\" id=\"delete\" href=\"view_score_delete.php?id=$row[0]\" onclick=\"return confirm('確定刪除?')\"><i class=\"fa fa-trash-o\"></i></a>";
							}
							else{
								echo "<span class=\"curr_name\">類型&nbsp;：</span>"."小考";
								echo "<a class=\"btn btn-info\" id=\"view\" href=\"view_score.php?id=$row[0]\"><i class=\"fa fa-bar-chart\"></i></a>";
								echo "<a class=\"btn btn-danger\" id=\"delete\" href=\"view_score_delete.php?id=$row[0]\" onclick=\"return confirm('確定刪除?')\"><i class=\"fa fa-trash-o\"></i></a>";
							}
							?>
							</div> <?
				}
				else{ ?>
					<div class="alert alert-success" id="curr_all_die" role="alert"> <?php
						echo "<span class=\"curr_name\">"."代號&nbsp;：".$row[0]."</span><br />".
							"<span class=\"curr_name\">名稱&nbsp;：</span>".$row[3]."<br />".
							"<span class=\"curr_name\">課程&nbsp;：</span>".$ms1."<br />".
							"<span class=\"curr_name\">日期&nbsp;：</span>".$row[1]."<br />".
							"<span class=\"curr_name\">到期&nbsp;：</span>".$row[2]."<br />";
							if ($row[5] == 2) {
								echo "<span class=\"curr_name\">類型&nbsp;：</span>"."月考";
								echo "<a class=\"btn btn-info\" id=\"view\" href=\"meview_score.php?id=$row[0]\"><i class=\"fa fa-bar-chart\"></i></a>";
								echo "<a class=\"btn btn-danger\" id=\"delete\" href=\"view_score_delete.php?id=$row[0]\" onclick=\"return confirm('確定刪除?')\"><i class=\"fa fa-trash-o\"></i></a>";
							}
							else{
								echo "<span class=\"curr_name\">類型&nbsp;：</span>"."小考";
								echo "<a class=\"btn btn-info\" id=\"view\" href=\"view_score.php?id=$row[0]\"><i class=\"fa fa-bar-chart\"></i></a>";
								echo "<a class=\"btn btn-danger\" id=\"delete\" href=\"view_score_delete.php?id=$row[0]\" onclick=\"return confirm('確定刪除?')\"><i class=\"fa fa-trash-o\"></i></a>";
							}
							?>
						
					</div> <?
				}
			}
				?>
	</div>
</div>

<!--新增成績單-->
<div id="add" class="modal fade">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-body">
			<form method="POST" action="score_finish.php">
				<h2>名稱：</h2>
				<input type="text" placeholder="輸入成績單名稱" class="form-control" name="curr_name"><br />
				<h2>截止：</h2>
				<input type="date" placeholder="截止日期" class="form-control" name="curr_enddate"><br />
				<h2>課程：</h2>
				<select class="form-control" name="select_curr">
					<option value="a1">高一菁英班(二)</option>
					<option value="b1">高一資優班(日)</option>
					<option value="c1">高二魔力寫作班</option>
					<option value="d1">高三資優衝刺模考班</option>
					<option value="e1">指考翻譯寫作班</option>
					<option value="f1">中級暨中高級英檢聽力班</option>
					<option value="g1">PISA 英檢預備A班</option>
					<option value="h1">PISA 英檢預備B班</option>
					<option value="i1">PISA 英檢初級班</option>
					<option value="j1">PISA 英檢文法衝刺班</option>
					<option value="k1">PISA 英檢初級聽力班</option>
					<option value="l1">高一先修班</option>
					<option value="m1">PISA 菁英進階班</option>
				</select><br />
				<input type="checkbox" name="curr_sort" value="2"> 段考範圍<br/><br/>
				<input type="submit" class="btn btn-success" value="新增">
			</form>
      </div>
    </div>
  </div>
</div>
<?php mysql_close($link); ?>
</body>
</html>