<?php session_start(); ?>
<?php

	require 'config/new_dbconfig.php';

	$username = $_POST['username'];
	$pw 	  = $_POST['password'];

	$login = $link->prepare("SELECT sid, pw FROM sd WHERE sid = ? AND pw = sha1(?)");
	$login->bind_param('ss', $username, $pw);
	$login->execute();
	$login->bind_result($username, $password);
	$login->store_result();

	if ($login->num_rows == 1) {

		$_SESSION['stlogin']  = $username;
		$_SESSION['pw'] 	  = $password;

		$response['status']   = true;
		$response['redirect'] = "st_dashboard.php";
	}
	else{

		$response['status'] = false;
	}

	echo json_encode($response);
