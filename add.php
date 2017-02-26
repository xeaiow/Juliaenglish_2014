<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="https://bootswatch.com/yeti/bootstrap.min.css">
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="ckeditor/ckeditor.js" type="text/javascript"></script>
	<link rel="stylesheet" href="css/adminsystem.css">
	<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
	<title>管理員系統</title>
</head>
<body>

	<?php
	if (empty($_SESSION['nickname']) && empty($_SESSION['password'])) {

		echo '<meta http-equiv=REFRESH CONTENT=0;url=login.php>';
		exit();

	}
	?>

	<nav class="navbar navbar-default">
		<div class="container-fluid">

			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				<ul class="nav navbar-nav">
					<!--選單2-->
					<li class="dropdown">
						<a class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-user"></span> 篩選 <span class="caret"></span></a>
						<ul class="dropdown-menu">
							<li><a href="studentdate.php?e1=a1">高一菁英(六)</a></li>
							<li><a href="studentdate.php?e1x=b1">高一資優(日)</a></li>
							<li><a href="studentdate.php?e11=l1">高一先修班</a></li>
							<li><a href="studentdate.php?e2=c1">高二魔力寫作班</a></li>
							<li><a href="studentdate.php?e3=d1">高三資優衝刺模考班</a></li>
							<li><a href="studentdate.php?e6=g1">PISA 高中英文搶讀班</a></li>
							<li><a href="studentdate.php?e7=h1">PISA 英檢預備B班</a></li>
							<li><a href="studentdate.php?e8=i1">PISA 英檢初級班</a></li>
							<li><a href="studentdate.php?e9=j1">PISA 英檢文法衝刺班</a></li>
							<li><a href="studentdate.php?e10=k1">PISA 英檢初級聽力班</a></li>
							<li><a href="studentdate.php?e12=m1">PISA 菁英進階班</a></li>
							<li><a href="studentdate.php?e4=e1">指考翻譯寫作班</a></li>
							<li><a href="studentdate.php?e5=f1">中級暨中高級英檢聽力班</a></li>
						</ul>
					</li>
				</ul>

				<form class="navbar-form navbar-left" role="search" method="GET" action="studentdate.php">
					<div class="form-group">
						<input type="text" name="stdate" id="stdate" class="form-control" placeholder="輸入姓名 / 學號搜尋">
					</div>
					<button type="submit" id="search" name="search" class="btn btn-primary"><span class="glyphicon glyphicon-search"></span></button>
				</form>

				<ul class="nav navbar-nav navbar-right">
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">操作 <span class="caret"></span></a>
						<ul class="dropdown-menu">
							<li><a href="logout.php"><i class="fa fa-sign-out"></i> 登出</a></li>
							<li><a href="http://juliaenglish.com/"><i class="fa fa-home"></i> 回首頁</a></li>
							<li><a data-toggle="modal" data-target="#pwch"><i class="fa fa-key"></i> 密碼修改</a></li>
						</ul>
					</li>
				</ul>
			</div><!-- /.navbar-collapse -->
		</div><!-- /.container-fluid -->
	</nav>

	<div class="row">
		<div class="col-md-2" id="admin_menu">
			<ul class="nav nav-pills nav-stacked">
				<li><a href="postlist.php"><i class="fa fa-pencil-square-o"></i> 編輯文章</a></li>
				<!-- <li><a href="score.php"><i class="fa fa-file-excel-o"></i> 新增成績單</a></li> -->
				<li><a data-toggle="modal" data-target="#updateadv"><i class="fa fa-bullhorn"></i> 圖片輪播</a></li>
				<li><a data-toggle="modal" data-target="#mc"><i class="fa fa-th"></i> 編輯月曆</a></li>
				<!-- <li><a href="hearing_record.php"><i class="fa fa-eye"></i> 查看英聽紀錄</a></li>
				<li><a href="hearing_recode_m.php"><i class="fa fa-clone"></i> 管理英聽項目</a></li> -->
			</ul>
		</div>

		<div class="col-md-10">

			<div class="tabbable"> <!-- Only required for left/right tabs -->

				<ul class="nav nav-tabs">
					<li class="active"><a href="#newpost" data-toggle="tab"><i class="fa fa-comment"></i> 文章</a></li>
					<!--<li><a href="#tab2" data-toggle="tab"><i class="fa fa-video-camera"></i> 新增影片</a></li>-->
					<li><a href="#2" data-toggle="tab"><i class="fa fa-book"></i> 教材</a></li>
					<!-- <li><a href="#3" data-toggle="tab"><i class="fa fa-book"></i> 上傳聽力教材</a></li> -->
				</ul>

				<div class="tab-content">

					<div class="tab-pane active" id="newpost">
						<form action="action.php" method="POST" name="dataadd">
							<input type="text" name="title" class="form-control" placeholder="標題" id="post_title">
							<select name="title_img" class="form-control" id="type_title">
								<optgroup label="分類">
									<option value="images/post/04.png">資訊</option>
									<option value="images/post/01.png">下載</option>
									<option value="images/post/02.png">玩樂</option>
									<option value="images/post/03.png">備忘</option>
									<option value="images/post/05.png">私密</option>
									<option value="images/post/06.png">音樂</option>
									<option value="images/post/07.png">影片</option>
									<option value="images/post/08.png">施工</option>
									<option value="images/post/09.png">信件</option>
									<option value="images/post/10.png">推薦</option>
									<option value="images/post/11.png">地標</option>
									<option value="images/post/12.png">連結</option>
									<option value="images/post/13.png">介紹</option>
									<option value="images/post/14.png">喜歡</option>
								</optgroup>
							</select>
							<div class="checkbox">
								<label>
									<input type="checkbox" name="art_top" value="1"> 置頂文章
								</label>
							</div>
							<textarea id="content" name="content" class="ckeditor"></textarea>
							<input type="submit" name="ok" value="發佈" class="btn btn-primary btn-sm" id="post_submit">
						</form>
					</div>

					<div class="tab-pane" id="2">
						<iframe src="function/index.php" width="1024px" height="768px" frameborder="0" scrolling="no"></iframe>
					</div>

					<div class="tab-pane" id="3">
						<form action="hearning_finish.php" method="post" enctype="multipart/form-data">
							<div class="form-group">
								<i class="fa fa-flask"></i> <label>教材名稱</label>
								<input type="text" class="form-control" name="hname" placeholder="取個名字給學生辨識" required>
							</div>

							<div class="form-group">
								<i class="fa fa-file-audio-o"></i> <label>描述內容</label>
								<textarea name="hcontent" class="form-control" rows="5" placeholder="描述一下大綱，可有可無"></textarea>
							</div>

							<div class="form-group">
								<label>教材選擇</label> <i class="fa fa-exclamation-triangle"></i> <span style="color:#ff4c4c;">只有聽力相關課程的同學才能預覽</span>
								<input name="uploads" type="file" style="width:80px;" required />
							</div>
							<button type="submit" class="btn btn-info btn-sm"><i class="fa fa-check"></i> 新增</button>
						</form>
					</div>

				</div>
			</div>

		</div>
	</div>

	<!--密碼修改-->
	<div id="pwch" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
					<h4 class="modal-title" align="center">密碼修改</h4>
				</div>
				<div class="modal-body">
					<form method="POST" action="pwch.php">
						<input type="text" name="pwch" placeholder="新密碼" class="form-control"><br/>
						<input type="text" name="pwch2" placeholder="確認" class="form-control"><br/>
						<input type="submit" class="btn btn-success" value="更改">
					</form>
				</div>
			</div>
		</div>
	</div>

	<!--月曆-->
	<div id="mc" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
					<h4 class="modal-title" align="center">新增/編輯月曆</h4>
				</div>
				<div class="modal-body">
					<!--上傳月曆-->
					<form action="uppic.php" method="post" enctype="multipart/form-data">
						1.<input type="text" class="form-control" placeholder="輸入年月ex. 201505" name="mcname" style="width:180px;"><br />
						2.<input type="file" name="fileToUpload" id="fileToUpload"><br />
						<input type="submit" value="新增" name="submit" class="btn btn-success"><hr />
					</form>
					<div style="text-align:center;"><button class="btn btn-warning" onclick="javascript:location.href='mcmg.php'">進入管理</button></div>
				</div>
			</div>
		</div>
	</div>

	<!--首頁廣告更改-->
	<? require 'config/dbconfig.php'; ?>

	<div id="updateadv" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">

				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
					<h4 class="modal-title" align="center">輪播廣告張數</h4>
				</div>

				<div class="modal-body">

					<div class="alert alert-default" role="alert">
						<form method="POST" action="updateadv.php" class="form-inline">
							<?php // 顯示圖片張數數量
							$sql = "SELECT advcount FROM user";
							$result = mysql_query($sql);
							$row = mysql_fetch_array($result);
							echo "<input type=\"text\" name=\"count\" placeholder=\"張\" class=\"form-control\" value=\"$row[advcount]\" style=\"width:70px;\">";
							mysql_close($link);
							?>
							<input type="submit" class="btn btn-success" value="更新">
							<input class="btn btn-primary" onclick="location.href='images/adv/see.php'" value="管理">
						</form>

					</div>
				</div>
			</div>
		</div>

	</body>
	</html>
