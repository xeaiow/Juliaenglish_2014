<?php

	mysql_connect('140.131.7.87', 'root', 'hank3781');
	mysql_select_db('taigo');

	$sql  = "SELECT * FROM va2rq_users";
	$sqls = mysql_query($sql);
	while (mysql_fetch_array($sqls)) {
		$row['name'];
	}
	
?>