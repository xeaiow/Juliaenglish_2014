<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>林錦英語教室 - 英文聽力測驗</title>
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootswatch/3.3.5/superhero/bootstrap.min.css">
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="css/adminsystem.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
	<style>
		body{
			background-color: #E9EAED;
			color: #333;
			font-size: 25px;
		}
		#wrapper{
			margin: 10px auto;
		}
		#info1{
			font-size: 30px;
			text-align: center;
		}
		#h_title{
			font-size: 28px;
		}
		a{
			color: #f47721;
		}
		a:hover{
			text-decoration: none;
			cursor: pointer;
			color: #fbb034;
		}
		.alert.alert-black{
			background-color: #2b82ad;
		}
	</style>
</head>
<body>
	
<?php
	if(empty($_SESSION['stlogin'])){

		echo '<meta http-equiv=REFRESH CONTENT=0;url=sdlogin.php>';
		exit();
	}
	require 'config/dbconfig.php';
	$me    = $_SESSION['stlogin'];
	$query = "SELECT * FROM sd WHERE sid = '$me' AND (e5 = 'f1' OR e10 = 'k1')";
	$sql   = mysql_query($query);
	if (mysql_num_rows($sql) == 0) {
		echo '<meta http-equiv=REFRESH CONTENT=0;url=sdfunction.php>';
	}
?>

<div class="row" id="wrapper">
	<div class="col-md-12">
		<div class="alert alert-black" role="alert" id="info1">
			<img src="images/icon/people.png" style="width:5%;"> <?=$me?> 歡迎您進入線上聽力系統！
			<button onclick="location.href='sdfunction.php'" class="btn btn-success">返回課程選單</button>
			<button onclick="location.href='sdlogout.php'" class="btn btn-danger">登出</button>
		</div>

		<div class="row">
			<div class="col-md-12">
			<!--英聽視窗-->
			<?php
				$url = substr($_SERVER['QUERY_STRING'], 3);
				$sql = "SELECT * FROM hearing WHERE id = '$url'";
				$query = mysql_query($sql);
				while ($row = mysql_fetch_array($query)) { ?>
				<div class="alert alert-success" role="alert">
					<div style="text-align:center;" id="hcontent"><?=$row['hcontent'];?></div>
					<div style="text-align:center;">
						<div style="margin:10px auto;">
							<audio controls>
							  <source src="tm_upload/<?=$row['hurl'];?>" type="audio/mpeg">
							</audio>	
						</div>
						<button onclick="start()" class="btn btn-default" id="start">開始計時 <i class="fa fa-clock-o"></i></button>
						<button onclick="stop()" class="btn btn-danger" id="stop" style="display:none;">結束計時 <i class="fa fa-times-circle"></i></button>
					</div>
				</div>
				
			<?php		
				}
			?>				
			</div>
		</div>

		<ul class="list-group">
		<?php
			$sql = "SELECT id, hname, hcontent FROM hearing ORDER BY id DESC";
			$query = mysql_query($sql);
			while ($row = mysql_fetch_array($query)) {
				echo '<li class="list-group-item" id="h_title"><a href="hearing.php?id='.$row['id'].'"><i class="fa fa-headphones"></i> '.$row['hname'].'</a></li>';
			}
		?>
		</ul>
	</div>
</div>

<script>
	function start(){
		document.getElementById("start").style.display = "none";
		document.getElementById("stop").style.display = "inline";
		var hcontent = $('#hcontent').text();
        $.ajax({
            url: 'start.php', //路徑
            type: "POST",
            dataType:'html',
            data: {hcontent : hcontent},
            success: function(data){
                console.log(data); //回傳結果
            },
            error: function(data){
                alert('發生錯誤');
            }
        });
    }

    function stop(){
		document.getElementById("stop").style.display = "none";
		document.getElementById("start").style.display = "inline";
    	var hcontent = $('#hcontent').text();
        $.ajax({
            url: 'stop.php', //路徑
            type: "POST",
            dataType:'html',
            data: {hcontent : hcontent},    
            success: function(data){
                console.log(data); //回傳結果
            },
            error: function(data){
                alert('發生錯誤');
            }
        });
    }
</script>

</body>
</html>