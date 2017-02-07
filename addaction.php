<?php session_start(); ?>
<?php   
if(empty($_SESSION['nickname'])){

		echo '<meta http-equiv=REFRESH CONTENT=0;url=login.php>';
		exit();
	}

	require 'config/dbconfig.php';	

	$sid = $_POST['sid'];
	$pw = $_POST['pw'];
	$pw2 = $_POST['pw2'];
	$e1 = "a".$_POST['e1'];
	$e1x = "b".$_POST['e1x'];
	$e2 = "c".$_POST['e2'];
	$e3 = "d".$_POST['e3'];
	$e4 = "e".$_POST['e4'];
	$e5 = "f".$_POST['e5'];
	$e6 = "g".$_POST['e6'];
	$e7 = "h".$_POST['e7'];
	$e8 = "i".$_POST['e8'];
	$e9 = "j".$_POST['e9'];
	$e10 = "k".$_POST['e10'];
	$e11 = "l".$_POST['e11'];
	$e12 = "m".$_POST['e12'];
	$sname = $_POST['sname'];

	if ($e1 == "a") {
		$e1 = "a0";
	}
	if ($e1x == "b") {
		$e1x = "b0";
	}
	if ($e2 == "c") {
		$e2 = "c0";
	}
	if ($e3 == "d") {
		$e3 = "d0";
	}
	if ($e4 == "e") {
		$e4 = "e0";
	}
	if ($e5 == "f") {
		$e5 = "f0";
	}
	if ($e6 == "g") {
		$e6 = "g0";
	}
	if ($e7 == "h") {
		$e7 = "h0";
	}
	if ($e8 == "i") {
		$e8 = "i0";
	}
	if ($e9 == "j") {
		$e9 = "j0";
	}
	if ($e10 == "k") {
		$e10 = "k0";
	}
	if ($e11 == "l") {
		$e11 = "l0";
	}
	if ($e12 == "m") {
		$e12 = "m0";
	}	


	if ($pw != $pw2){ ?>
	    <script type="text/javascript">
	      alert('密碼不一致！');
	      history.back();
	    </script>
	  <?
	    exit();	
	}

	
/*檢查學號重複*/
      $addre = "SELECT * FROM sd WHERE sid = '$sid'"; 
      $addrequ = mysql_query($addre);
      $row = mysql_fetch_row($addrequ);
     if ($row[1] == $sid){ ?>
        <script type="text/javascript">
          alert('已經有這組學號了！'); 
          history.back();
        </script>
<?   
        exit(); 
      }		

	$sql = "INSERT INTO sd (sid,pw,e1,e1x,e2,e3,e4,e5,e6,e7,e8,e9,e10,e11,e12,sname) VALUES ('$sid','$pw','$e1','$e1x','$e2','$e3','$e4','$e5','$e6','$e7','$e8','$e9','$e10','$e11','$e12','$sname');";
	      
	      if (mysql_query($sql)) { ?>
	        <div class="alert alert-success" role="alert" style="font-size:25px; text-align:center;">新增成功！</div>
	<?      echo '<meta http-equiv=REFRESH CONTENT=1;url=add.php>';   
	      } 

	      else { ?>
	        <div class="alert alert-danger" role="alert" style="font-size:25px; text-align:center;">新增失敗！</div>
	<?      echo '<meta http-equiv=REFRESH CONTENT=1;url=add.php>';
	      }

	mysql_close($link);

	function error1(){ ?>
	    <script type="text/javascript">
	      alert('課程欄位不能是空的！');
	      history.back();
	    </script>
	  <?
	    exit();	
	}

?>