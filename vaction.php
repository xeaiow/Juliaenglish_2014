<?php session_start(); ?>
<?php
if(empty($_SESSION['nickname'])){

        echo '<meta http-equiv=REFRESH CONTENT=0;url=login.php>';
        exit();
    }

	date_default_timezone_set('Asia/Taipei');

	$title 		= $_POST['title'];
	$content 	= $_POST['content'];
	$class 		= $_POST['class'];
	$date 		= date("Y-m-d");

	if ($title == null) { ?>
		<script>
			alert('記得標題啊');
			history.back();
		</script>
	<?		exit();
	}

	if ($content == null) { ?>
		<script>
			alert('打個敘述吧！');
			history.back();
		</script>
	<?		exit();
	}

	if ($class == 'no') { ?>
		<script>
			alert('請選擇分類！');
			history.back();
		</script>
	<?		exit();
	}		

	require 'config/dbconfig.php';

	$query = "INSERT INTO video (title, content, class, time) VALUES ('" .$title. "', '" .$content. "','" .$class. "','" .$date. "');";
	$result = mysql_query($query);

	if ($result) {
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
	mysql_close($link);
?>
