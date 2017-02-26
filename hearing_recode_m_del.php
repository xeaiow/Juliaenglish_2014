<?php
	session_start();
	if(empty($_SESSION['nickname'])){

	    echo '<meta http-equiv=REFRESH CONTENT=0;url=login.php>';
	    exit();
	}

	require 'config/dbconfig.php';

	$id 	= 	substr($_SERVER['QUERY_STRING'], 3);
	$select =   "SELECT * FROM hearing WHERE id = '$id'";
	$q_s    =   mysql_query($select);
	$sql 	= 	"DELETE FROM hearing WHERE id = '$id'";
	$query 	=	mysql_query($sql);


	$row = mysql_fetch_array($q_s);
	$file = "tm_upload/".$row['hurl'];
	unlink($file);
?>
<script>
	location.href="hearing_recode_m.php";
</script>
