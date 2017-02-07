<?php
	$DBHOST = "localhost";
	$DBUSER = "root";
	$DBPASSWORD = "123456";
	$DBNAME = "juliaeng_english";

	$link = @mysql_connect($DBHOST,$DBUSER,$DBPASSWORD);
	@mysql_select_db($DBNAME);
	@mysql_query("SET NAMES UTF8");

?>
