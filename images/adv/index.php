<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
</head>
<body>
	
<?php

if(empty($_SESSION['nickname'])){
		echo '<meta http-equiv=REFRESH CONTENT=1;url=../../login.php>';
		exit();
	} ?>

<?php
	$picsc = count(glob("images/adv/*.jpg"));
	$pics = glob('images/adv/*.jpg');
	$i = 0; ?>

<div style="background-color:rgba(255,255,255,0.1);border-radius:8px;">
<?
if ($picsc > 0) {

	while ($i < $picsc) {
		for ($j = 0; $j < $picsc ; $j++) { 
			echo 
			"<span class='example'><a class=\"sample\" href=\"$pics[$j]\" data-lighter=\"$pics[$j]\"><img style=\"width:20%;height:20%;\" src=\"$pics[$j]\"></a></span>";
			$i++;
		}
	}
}
?>
</div>

</body>
</html>