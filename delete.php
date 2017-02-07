<?php session_start(); ?>
<meta charset="utf-8">
<link rel="stylesheet" href="css/bootstrap.css">
<link rel="stylesheet" href="css/bootstrap.min.css">

<?php
if(empty($_SESSION['nickname'])){

        echo '<meta http-equiv=REFRESH CONTENT=0;url=login.php>';
        exit();
    }

	require 'config/dbconfig.php';
    $sid = $_POST['did'];

	/*判斷空值輸入*/
	if ($sid == null) { ?>
		<script>
			alert('不能是空值！');
			history.go(-1);
		</script>
	<?php
		exit();	
	}
	
    /*執行刪除程式*/
    $del = "DELETE from sd WHERE sid = '$sid'";
    if (mysql_query($del)) { ?>
        <div class="alert alert-success" role="alert" align="center"><h3>除名成功！</h3></div> <?php
        echo '<meta http-equiv=REFRESH CONTENT=1;url=add.php>';
    } else { ?>
        <div class="alert alert-danger" role="alert" align="center"><h3>除名失敗！</h3></div> <?php
        echo '<meta http-equiv=REFRESH CONTENT=1;url=add.php>';
    }
    
