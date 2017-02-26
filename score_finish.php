<?php session_start(); ?>
<?php
if(empty($_SESSION['nickname'])){

		echo '<meta http-equiv=REFRESH CONTENT=0;url=login.php>';
		exit();
	} ?>
	

<?
	require 'config/dbconfig.php';

	date_default_timezone_set('Asia/Taipei');
	$currname 		= $_POST['curr_name'];
	$currtype 		= $_POST['select_curr'];
	$currdate 		= date("Y/m/d H:i:s");
	$currenddate 	= $_POST['curr_enddate'];
	$currsort		= $_POST['curr_sort'];

	$query = "INSERT INTO score (curr_name, curr_enddate, curr_type, curr_date, curr_sort) VALUES 
	('$currname', '$currenddate', '$currtype', '$currdate', '$currsort')";

	if(mysql_query($query)){ ?>
		<script type="text/javascript">
			alert('新增成功');
			location.href='score.php';
		</script>
<?
	}
	else{ ?>
		<script type="text/javascript">
			alert('新增失敗');
			location.href='score.php';
		</script>
<?
	}

?>