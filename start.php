<?php
	session_start();
	if(empty($_SESSION['stlogin'])){

		echo '<meta http-equiv=REFRESH CONTENT=0;url=sdlogin.php>';
		exit();
	}

	date_default_timezone_set("Asia/Taipei");
	$listener = $_SESSION['stlogin'];
	$hcontent = $_POST['hcontent'];
	$now = date("Y-m-d H:i:s");

	require 'config/dbconfig.php';
	$my = "SELECT sname FROM sd WHERE sid = '$listener'";
	$query = mysql_query($my);
	$mys = mysql_fetch_array($query);
	$ok = $mys['sname'];

	$sql = "INSERT INTO hearing_record (listener, hname, now, listener_ch) VALUES ('$listener', '$hcontent', '$now', '$ok')";
	mysql_query($sql);
	mysql_close($link);
?>