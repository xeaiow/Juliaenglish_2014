<?php session_start(); ?>
<?php

    if(empty($_SESSION['nickname'])) {

        echo '<meta http-equiv=REFRESH CONTENT=0;url=login.php>';
        exit();
    }

    require 'config/new_dbconfig.php';
	date_default_timezone_set('Asia/Taipei');

	$title 		= $_POST['title'];
	$content 	= $_POST['content'];
	$date 		= date("Y-m-d");
	$title_img	= $_POST['title_img'];
    $art_top    = (isset($_POST['art_top']) ? 1 : 0);

    $query = $link->query("INSERT INTO newinfo (title, content, time, title_img, art_top) VALUES ('$title', '$content', '$date', '$title_img', '$art_top')");

	if ($query) {
		?>
		<script>
			alert ("新增成功！");
			window.location.href = "add.php";
		</script> <?php
	}
	else {
		?>
		<script>
			alert ("失敗！再試一次");
			window.location.href = "add.php";
		</script> <?php
	}
