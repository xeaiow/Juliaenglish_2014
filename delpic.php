<?php
	$code  = 1;
	$add   = substr($_SERVER['QUERY_STRING'],3);
	$file2 = $code+$add; 
	$file  = "0".$file2.".jpg";
	echo $file;
	unlink("img/adv/$file");
?>