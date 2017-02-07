<!DOCTYPE html>
<html>
	<meta charset="UTF-8">
	<script type="text/javascript" src="../../js/jquery.min.js"></script>

	<link rel="stylesheet" href="../../css/bootstrap.css">
	<link rel="stylesheet" href="../../css/bootstrap.min.css">

	<script src="../../js/jquery.js"></script>
	<script src="../../js/bootstrap.min.js"></script>

<head>
	<style>
		body{
			width: 600px;
			margin:10px auto;
			background-image: url(../bg2.png);
		}
	</style>
</head>
<body>
	
<?
	function generatorPassword($pt = 8,$myWord = ""){
	    $password = "";
	    $str = "abcdefghijklmnopqrstuvwxyz";
	    $str.= $myWord;
	    $str_len = strlen($str);
	for ($i = 1 ; $i <= $pt ; $i++){
	        $rg = rand()%$str_len;
	        $password.= $str{$rg};
	    }
	return $password;
	}
	$dd = 1;
	$picsc = $dd+count(glob("*.jpg"));

	$Random   = "0".$picsc;
	$filename = $_FILES['upload']['name']; //$filename =原始檔名
	$extend   = strrchr($filename, ".");   //取得檔案的副檔名 abc.jpg 會成為 .jpg
	$fname    = $Random.$extend;		     //目前時間.附檔名

	if($_FILES["upload"]["size"] > 0 && $_FILES["upload"]["type"] == "image/jpeg"){   //判斷是否有檔案上傳
		copy($_FILES["upload"]["tmp_name"],"".$fname);  //用copy的函數將暫存檔存入指定路徑中
		echo $fname;
		echo "<div class=\"alert alert-success\" role=\"alert\" style=\"text-align:center;font-size:25px;\">成功上傳！</div>";
		echo "<meta http-equiv=\"refresh\" content=\"1;url=../../add.php\">";
	}
	else{
		echo "<div class=\"alert alert-danger\" role=\"alert\" style=\"text-align:center;font-size:25px;\">上傳失敗！</div>";
		echo "<meta http-equiv=\"refresh\" content=\"1;url=../../add.php\">";
	}
?>

</body>
</html>