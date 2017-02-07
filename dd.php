<?php
	require 'config/dbconfig.php';
	$query = "SELECT * FROM me, sd WHERE sd.sid = 'z111'";
	$sql	= mysql_query($query);

	while ($row = mysql_fetch_array($sql)) {
		echo $row['e1'];
	}
?>