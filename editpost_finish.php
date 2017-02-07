<?php session_start(); ?>

<?php
if(empty($_SESSION['nickname'])){

    echo '<meta http-equiv=REFRESH CONTENT=0;url=login.php>';
    exit();
} 

	$title   = $_POST['title'];
	$content = $_POST['content'];
	$id      = $_POST['id'];
	require 'config/dbconfig.php';
	$query = "UPDATE newinfo SET title = '$title' , content = '$content' WHERE id = '$id'";
	if (mysql_query($query)) { ?>

		<script>
			alert('更新成功');
			history.go(-1);
		</script>
<?	} 
	else { ?>

		<script>
			alert('更新失敗');
			history.go(-1);
		</script>	 	
<?
	}
mysql_close($link);
?>