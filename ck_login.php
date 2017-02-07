<?php
	session_start();
	require 'config/new_dbconfig.php';

	$nickname = $_POST['id'];
	$pw 	  = sha1($_POST['password']);

	if(preg_match("/[<>'-]/",$nickname)) {
		error();
	}

	if(preg_match("/[<>'-]/",$pw)) {
		error();
	}	

	$stmt = $link->prepare("SELECT username, password FROM user WHERE username = ? AND password = ? LIMIT 1");
	$stmt->bind_param('ss', $nickname, $pw);
	$stmt->execute();
	$stmt->bind_result($username, $password);
	$stmt->store_result();

	if($stmt->num_rows == 1){

		while ($stmt->fetch()) {

			$_SESSION['nickname']   = $username;
			$_SESSION['password']   = $password;

			$link->close();
			echo '<meta http-equiv="refresh" content="0;url=add.php">';

		} 

	}

	else { 

		$link->close();
		echo '<meta http-equiv="refresh" content="0;url=login.php">';

	}
