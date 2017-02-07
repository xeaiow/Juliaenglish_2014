<?php
	require 'config/dbconfig.php';

	$url   		= substr($_SERVER['QUERY_STRING'], 5);
	// 檔名
	$fileurl	= "SELECT url FROM mc WHERE name = '$url'";
	$sqlfileurl	= mysql_query($fileurl);
	$delfileurl	= mysql_fetch_array($sqlfileurl);
	$endfileurl	= 'upmc/'.substr($delfileurl[0], 30);
	$del   		= "DELETE FROM mc WHERE name = '$url' ";

	if (mysql_query($del) AND unlink($endfileurl)) { ?>
		
		<script>
			alert('刪除成功！');
			location.href="mcmg.php";
		</script>	

<?php

	}

	else { ?>

		<script>
			alert('刪除失敗！');
			location.href="mcmg.php";
		</script>

<?php

	}

	mysql_close($link);
?>