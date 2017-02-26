<?php
	session_start();
	require 'config/new_dbconfig.php';

	$username = $_POST['username'];
	$psw 	  = sha1($_POST['password']);

	$stmt = $link->prepare("SELECT username, password FROM user WHERE username = ? AND password = ?");
	$stmt->bind_param('ss', $username, $psw);
	$stmt->execute();
	$stmt->bind_result($username, $password);
	$stmt->store_result();

	if ($stmt->num_rows == 1) {

		$_SESSION['nickname'] = $username;
		$_SESSION['password'] = $password;
		$response['status']   = true;
		$response['redirect'] = "dashboard.php";
	}

	else {

		$response['status'] = false;
	}

	echo json_encode($response);
