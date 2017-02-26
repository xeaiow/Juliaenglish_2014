<?php session_start(); ?>
<?php

if(empty($_SESSION['stlogin'])){

		echo '<meta http-equiv=REFRESH CONTENT=0;url=sdlogin.php>';
		exit();
	}

	require 'config/dbconfig.php';


	$import_name  = $_POST['import_name'];
	$import_score = $_POST['score_import'];
	$import_curr  = $_POST['import_curr'];
	$import_after = $_POST['import_after'];
	$import_code  = $_SESSION['stlogin'];

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
	

	if (empty($import_score)) { ?>
	 	<script type="text/javascript">
	 		alert('請輸入成績！');
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


	if (!preg_match("/^[0-9]{1,3}$/", $import_score)) { ?>
	 	<script type="text/javascript">
	 		alert('請輸入數字0~100！');
	 		history.go(-1);
	 	</script>
<?
	exit();
	}

	if ($import_score > 100) { ?>
	 	<script type="text/javascript">
	 		alert('請檢查分數是否輸入錯誤！');
	 		history.go(-1);
	 	</script>
<?
	exit();
	}




	$query = "INSERT INTO score_import (import_name, import_score, import_curr, import_after, import_code) VALUES 
	('$import_name', '$import_score', '$import_curr', '$import_after', '$import_code')";	

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