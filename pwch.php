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

    $pwold = $_POST['pwch'];
    $pw  = sha1($_POST['pwch']);
    $pw2 = sha1($_POST['pwch2']); 

    if (empty($pwold)) { ?>
        <script>
            alert('請輸入新密碼！');
            history.go(-1);
        </script> <?
        exit(); 
    }
    

    if(preg_match("/[<>'-]/",$pwold)){ ?>
        <script>
            alert('敏感字符！');
            history.go(-1);
        </script> <?
        exit(); 
    }

    if ($pw != $pw2) { ?>
        <script>
            alert('密碼不一致！');
            history.go(-1);
        </script> <?
        exit();
    } 
    else {
 
    $query = "UPDATE user SET password = '$pw'"; 

    if(mysql_query($query)){ ?>
        <script>
            alert('更改成功！');
            history.go(-1);
        </script>          
<?      }
    else{ ?>
        <script>
            alert('更改失敗！');
            history.go(-1);
        </script>          
<?      }
}
    mysql_close($link);
?>