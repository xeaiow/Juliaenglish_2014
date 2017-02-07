<?php session_start(); ?>

<?php
if(empty($_SESSION['nickname'])){

    echo '<meta http-equiv=REFRESH CONTENT=0;url=login.php>';
    exit();
} 
	$id = $_GET['id'];
	require 'config/dbconfig.php';
	$query = "DELETE FROM video WHERE id = '$id'";
	if (mysql_query($query)) { ?>

		<script>
			alert('已刪除影片');
			history.go(-1);
		</script>
<?	} 
	else { ?>

		<script>
			alert('刪除失敗');
			history.go(-1);
		</script>	 	
<?
	}
mysql_close($link);
?>