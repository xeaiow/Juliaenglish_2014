<?php
	session_start();
	if(empty($_SESSION['stlogin'])){

		echo '<meta http-equiv=REFRESH CONTENT=0;url=sdlogin.php>';
		exit();
	}

	date_default_timezone_set("Asia/Taipei");

	$end 		= date("Y-m-d H:i:s");
	$me 		= $_SESSION['stlogin'];
	$hcontent 	= $_POST['hcontent'];

	require 'config/dbconfig.php';

	$sql = "UPDATE hearing_record SET end = '$end' WHERE listener = '$me' AND hname = '$hcontent'";
	mysql_query($sql);
	mysql_close($link);
?>