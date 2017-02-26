<?php
	session_start();
	if(empty($_SESSION['nickname'])){

	    echo '<meta http-equiv=REFRESH CONTENT=0;url=login.php>';
	    exit();
	}

	require 'config/dbconfig.php';

	$id 	= 	substr($_SERVER['QUERY_STRING'], 3);
	$sql 	= 	"DELETE FROM hearing_record WHERE id = '$id'";
	$query 	=	mysql_query($sql);
?>
<script>
	location.href="hearing_record.php";
</script>