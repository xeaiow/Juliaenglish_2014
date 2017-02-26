<?php session_start(); ?>
<?php

if(empty($_SESSION['stlogin'])){

		echo '<meta http-equiv=REFRESH CONTENT=0;url=sdlogin.php>';
		exit();
	}

	require 'config/dbconfig.php';


	$import_name  = $_POST['import_name'];
	$import_reser1 = $_POST['import_reser1'];
	$import_reser2 = $_POST['import_reser2'];
	$import_curr  = $_POST['import_curr'];
	$import_after = $_POST['import_after'];
	$import_code  = $_SESSION['stlogin'];
	$import_ver   = $_POST['import_ver'];
	$import_book  = $_POST['import_book'];
	$import_less1 = $_POST['import_less1'];
	$import_less2 = $_POST['import_less2'];

	$repty = "SELECT * FROM score_import WHERE import_code = '$import_code' AND import_curr = '$import_curr'";
	$repty_query = mysql_query($repty); /* 檢查重複 */
	$repty_sql = mysql_num_rows($repty_query);

	date_default_timezone_set("Asia/Taipei");
	$nowtime = date("Y-m-d"); /* 時間到期 */
	$time 	 = "SELECT * FROM score WHERE curr_id = '$import_curr'";
	$time_query = mysql_query($time);
	$time_sql	= mysql_fetch_array($time_query);
	$times 		= $time_sql['curr_enddate'];

	if (strtotime($times) < strtotime($nowtime)) { ?>
	 	<script type="text/javascript">
	 		alert('已經截止囉！');
	 		history.go(-1);
	 	</script>
<?
	exit();
	}
	

	if (empty($import_reser1)) { ?>
	 	<script type="text/javascript">
	 		alert('請輸入預約日！');
	 		history.go(-1);
	 	</script>
<?
	exit();
	}

	if (empty($import_ver)) { ?>
	 	<script type="text/javascript">
	 		alert('請輸入版本！');
	 		history.go(-1);
	 	</script>
<?
	exit();
	}

	if (empty($import_book)) { ?>
	 	<script type="text/javascript">
	 		alert('請輸入冊！');
	 		history.go(-1);
	 	</script>
<?
	exit();
	}	

	if (empty($import_less1)) { ?>
	 	<script type="text/javascript">
	 		alert('請輸入開始範圍！');
	 		history.go(-1);
	 	</script>
<?
	exit();
	}

	if (empty($import_less2)) { ?>
	 	<script type="text/javascript">
	 		alert('請輸入結束範圍！');
	 		history.go(-1);
	 	</script>
<?
	exit();
	}					
	
	if ($repty_sql > 0) { ?>
	 	<script type="text/javascript">
	 		alert('請勿重複登錄，如需修改請洽管理員！');
	 		history.go(-1);
	 	</script>
<?
	exit();
	}


	$query = "INSERT INTO score_import (import_name, import_reser1, import_reser2, import_curr, import_after, import_code, import_ver, import_book, import_less1, import_less2) VALUES 
	('$import_name', '$import_reser1', '$import_reser2', '$import_curr', '$import_after', '$import_code', '$import_ver', '$import_book', '$import_less1', '$import_less2')";	

	if(mysql_query($query)){ ?>
		<script type="text/javascript">
			alert('登陸成功');
			location.href='sdfunction.php';
		</script>
<?
	}
	else{ ?>
		<script type="text/javascript">
			alert('登陸失敗');
			location.href='sdfunction.php';
		</script>
<?
	}
mysql_close($link);
?>