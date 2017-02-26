<?php session_start(); ?>
<!DOCTYPE html>
<html lang="zh-tw">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootswatch/3.3.4/sandstone/bootstrap.min.css">
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<title>查看段考成績繳交狀態</title>
	<style type="text/css">
		#title{
			font-size:35px;
		}
		table th,td{
			font-size: 20px;
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
	
<div class="row">
	<div class="col-md-12">

		<div class="alert alert-success" role="alert" id="title">
			<button class="btn btn-primary" onclick="javascript:location.href='me_score.php'">查看其他段考考卷</button>
			<button class="btn btn-danger" onclick="javascript:location.href='add.php'">回管理介面</button>
			<button class="btn btn-success" data-toggle="modal" data-target="#np"><span class="glyphicon glyphicon-book"> 應繳交名單</span></button>
			<?php
				require 'config/dbconfig.php';
				/*標題那些*/
			 	$curr = substr($_SERVER['QUERY_STRING'], 3);
			 	$curr_title = "SELECT * FROM mescore WHERE curr_id = '$curr'";
			 	$curr_sql = mysql_query($curr_title);
			 	$row = mysql_fetch_array($curr_sql);
			 	/*繳交人數*/
			 	$ap = "SELECT * FROM mescore_import WHERE import_curr = '$curr'";
			 	$ap_sql = mysql_query($ap);
			 	$ap_num = mysql_num_rows($ap_sql);
			 	/*總人數*/
				$total_pe = "SELECT * FROM sd,score WHERE score.curr_id = '$curr' AND (sd.e1 = score.curr_type OR sd.e1x = score.curr_type OR sd.e2 = score.curr_type OR sd.e3 = score.curr_type OR sd.e4 = score.curr_type OR sd.e5 = score.curr_type OR sd.e6 = score.curr_type OR sd.e7 = score.curr_type OR sd.e8 = score.curr_type OR sd.e9 = score.curr_type OR sd.e10 = score.curr_type OR sd.e11 = score.curr_type OR sd.e12 = score.curr_type)";
				$total_pe_sql = mysql_query($total_pe);
				$total_pe_num = mysql_num_rows($total_pe_sql);

			 	echo "<p style=\"text-align:left;\">"."考卷名稱：".$row['curr_name']."</p>";
			 	echo "<p>"."繳交人數：".$ap_num."/".$total_pe_num."</p>";
			?>
		</div>
		<?php
		 	$curr = substr($_SERVER['QUERY_STRING'], 3);
		 	$sql = "SELECT * FROM mescore_import WHERE import_curr = '$curr'";
		 	$query = mysql_query($sql); ?>

		 	<table class="table table-striped">
				<tr>
					<th>學號</th>
					<th>姓名</th>
					<th>預約日一</th>
					<th>預約日二</th>
				</tr>
				<?php
				while ($row = mysql_fetch_array($query)) { ?>	
				<tr>
					<td><?php echo strtoUpper($row['import_code']); ?></td>
					<td><?php echo $row['import_name']; ?></td>
					<td><?php echo $row['import_reser1']; ?></td>
					<td><?php echo $row['import_reser2']; ?></td>
				</tr>
				<?php
		 	}
		 	?>
			</table>
	</div>
</div>

<div id="np" class="modal fade">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-body" style="text-align:center;">
			<?php
				while ($row = mysql_fetch_array($total_pe_sql)) {
					echo "<span style=\"font-size:20px;\">".$row['sname']."<br/>";
				}
			?>
      </div>
    </div>
  </div>
</div>

</body>
</html>