<?php

	require 'config/new_dbconfig.php';

	if (!preg_match("/^[0-9]{6}$/", $_POST['mcname'])) {

		echo "format : 201702";
		exit();
	}

	// 產生亂數將 image 重新命名
	function generatorPassword($pt = 8, $myWord = ""){

		$password="";
		$str = "0123456789abcdefghijklmnopqrstuvwxyz";
		$str.= $myWord;
		$str_len = strlen($str);

		for ($i = 1; $i <= $pt; $i++){
			$rg = rand()%$str_len;
			$password.= $str{$rg};
		}
		return $password;
	}

	$mc     = $_POST['mcname'];

	// 是否已有這份月曆
	if ( $link->query("SELECT name FROM mc WHERE name = '$mc'")->num_rows == 1 ) {

		echo "如要更新月曆請先刪除舊的！";
		exit();
	}

	// 重新命名
	$target_file = "upmc/".generatorPassword().strrchr($_FILES["fileToUpload"]["name"], ".");

	$uploadOk = 1;
	$imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);

	if (isset($_POST["submit"])) {

		( getimagesize($_FILES["fileToUpload"]["tmp_name"]) !== false ) ? $uploadOk = 1 : $uploadOk = 0;
	}

	if (file_exists($target_file)) {
	    echo "檔案名稱重複，請改名後上傳！";
	    $uploadOk = 0;
	}

	if ($_FILES["fileToUpload"]["size"] > 5000000) {
	    echo "檔案過大，請壓縮後上傳！";
	    $uploadOk = 0;
	}

	if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
	    echo "請上傳 jpg、png、gif 檔！";
	    $uploadOk = 0;
	}

	if ($uploadOk == 0) {
	    echo "上傳失敗！";
	}

	else {

		// $temp = explode(".", $_FILES["file"]["name"]);

	    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {

	        $mcname = $_POST['mcname'];
	        $mcurl  = "http://" . $_SERVER['HTTP_HOST'] . "/" . $target_file;

	        $link->query("INSERT INTO mc (name, url) VALUES ('$mcname', '$mcurl')");

	   		echo "上傳成功！";
			echo '<meta http-equiv="refresh" content="1;url=mc_manage.php" />';
	    }
	    else {
	        echo "上傳失敗！";
	    }
	}
