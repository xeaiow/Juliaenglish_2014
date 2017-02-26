<?php session_start(); ?>

<link rel="stylesheet" href="css/bootstrap.min.css">
<link rel="stylesheet" href="css/bootstrap-theme.min.css">

<?php
if(empty($_SESSION['nickname'])){

		echo '<meta http-equiv=REFRESH CONTENT=0;url=login.php>';
		exit();
	}

	require 'config/dbconfig.php';
	$count = $_POST['count'];

    if (!preg_match('/^[0-9]{1,2}$/', $_POST['count'])) { ?>
        <script type="text/javascript">
            alert('請輸入1~99的自然數！');
            history.back();
        </script>   
    <?php  
        exit();
    }	

	$query = "UPDATE user SET advcount = '$count'";

	if(mysql_query($query)){ ?>
        <div class="alert alert-success" role="alert" align="center"><h3>更新成功！</h3></div> <?
        echo '<meta http-equiv=REFRESH CONTENT=1;url=add.php>';
    }
    else{ ?>
        <div class="alert alert-danger" role="alert" align="center"><h3>更新失敗！</h3></div> <?
        echo '<meta http-equiv=REFRESH CONTENT=1;url=add.php>';
    }
	
	mysql_close($link);

?>