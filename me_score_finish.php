<?php session_start(); ?>
<?php
if(empty($_SESSION['nickname'])){

		echo '<meta http-equiv=REFRESH CONTENT=0;url=login.php>';
		exit();
	} ?>
	

<?
	require 'config/dbconfig.php';

	date_default_timezone_set('Asia/Taipei');
	$curr_name 		= $_POST['curr_name'];
	$curr_type 		= $_POST['curr_type'];
	$curr_date 		= date("Y-m-d");
	$curr_enddate 	= $_POST['curr_enddate'];

	$query = "INSERT INTO me (curr_name, curr_enddate, curr_type, curr_date) VALUES 
	('$curr_name', '$curr_enddate', '$curr_type', '$curr_date')";

	if(mysql_query($query)){ ?>
		<script type="text/javascript">
			alert('新增成功');
			location.href='me_score.php';
		</script>
<?
	}
	else{ ?>
		<script type="text/javascript">
			alert('新增失敗');
			location.href='me_score.php';
		</script>
<?
	}

?>