<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootswatch/3.3.5/flatly/bootstrap.min.css">
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
	<title>林錦英語教室 - 管理英聽項目</title>
	<style>
		th, td{
			text-align: center;
		}
	</style>
</head>
<body>

<?php
if(empty($_SESSION['nickname'])){

    echo '<meta http-equiv=REFRESH CONTENT=0;url=login.php>';
    exit();
  } ?>

<nav class="navbar navbar-default">
  <div class="container-fluid">

    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <!--選單2-->
        <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-user"></span> 篩選 <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="studentdate.php?e1=a1">高一菁英(二)</a></li>
            <li><a href="studentdate.php?e1x=b1">高一資優(日)</a></li>
            <li><a href="studentdate.php?e11=l1">高一先修班</a></li>
            <li><a href="studentdate.php?e2=c1">高二魔力寫作班</a></li>
            <li><a href="studentdate.php?e3=d1">高三資優衝刺模考班</a></li>
            <li><a href="studentdate.php?e6=g1">PISA 英檢預備A班</a></li>
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
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-cog"></span> 設定 <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="logout.php">登出</a></li>
            <li><a href="http://juliaenglish.com/">回首頁</a></li>
            <li><a href="sdfunction.php">回管理主介面</a></li>
          </ul>
        </li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>

<div class="row">
	<div class="col-md-12">
			<?php require 'config/dbconfig.php';
				$sql = "SELECT * FROM hearing_record";
				$query = mysql_query($sql); ?>
				<table class="table table-bordered">
          <tr>
            <th>聆聽者</th>
            <th>項目</th>
            <th>開始時間</th>
            <th>結束時間</th>
            <th>總時間 (大約)</th>
            <th>編輯</th>
          </tr>
      <?php
        while ($row = mysql_fetch_array($query)) { ?>
          <tr>
            <td><?=$row['listener']?></td>
            <td><?=$row['hname']?></td>
            <td><?=$row['now']?></td>
            <td><?=$row['end']?></td>
            <td>
              <?=
                number_format((strtotime($row['end']) - strtotime($row['now'])) / 60, 1);
              ?> 分鐘
            </td>
            <td><a href="hearing_recode_del.php?id=<?=$row['id'];?>"><button class="btn btn-danger btn-sm"><i class="fa fa-minus"></i></button></a></td>
          </tr> 
      <?php
        }
        mysql_close($link);
      ?>
      </table>
	</div>
</div>

</body>
</html>