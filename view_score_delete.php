<?php
	require 'config/dbconfig.php';

 	$curr_id = substr($_SERVER['QUERY_STRING'], 3);
 	$curr = "DELETE FROM score WHERE curr_id = '$curr_id'";
 	$curr_sql = mysql_query($curr);
 	if ($curr_sql) { ?>
 		<script type="text/javascript">
 			alert('刪除完成！');
 			history.go(-1);
 		</script>	
<?
 	}
 	else{ ?>
 		<script type="text/javascript">
 			alert('刪除失敗！！');
 			history.go(-1);
 		</script>	
<?
 	}
 	mysql_close($link);
?>