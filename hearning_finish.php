<?php
	require 'config/dbconfig.php';

	$hname 		= $_POST['hname'];
	$hcontent 	= $_POST['hcontent'];

	if (empty($hname)) {
		hname_error();
		exit();
	}
	elseif (empty($hcontent)) {
		hcontent_error();
		exit();
	}
	else{
			$time = time();
			move_uploaded_file($_FILES["uploads"]["tmp_name"],"tm_upload/".$time.$_FILES["uploads"]["name"]);
			$fileurl = $time.$_FILES["uploads"]["name"];

		if (mysql_query("INSERT INTO hearing (hname, hcontent, hurl) VALUES ('$hname', '$hcontent', '$fileurl')")) {

			success();
		}
	}
	mysql_close($link);
	


/* function */
	function hname_error(){ ?>
		<script>
			alert('給教材名稱吧！');
			history.go(-1);
		</script>
<?php
	}

	function hcontent_error(){ ?>
		<script>
			alert('啥內容都沒有啊！');
			history.go(-1);
		</script>
<?php
	}

	function success(){ ?>
		<script>
			alert('新增成功！');
			location.href='add.php';
		</script>
<?php
	}
	
?>
