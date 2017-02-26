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
        
    $pw = $_POST['pw'];
    $id = $_POST['sid'];
    $e1 = $_POST['sel1'];
    $e1x = $_POST['sel1x'];
    $e2 = $_POST['sel2'];
    $e3 = $_POST['sel3'];
    $e4 = $_POST['sel4'];
    $e5 = $_POST['sel5'];
    $e6 = $_POST['sel6'];
    $e7 = $_POST['sel7'];
    $e8 = $_POST['sel8'];
    $e9 = $_POST['sel9'];
    $e10 = $_POST['sel10'];
    $e11 = $_POST['sel11'];
    $e12 = $_POST['sel12'];
    $ach = $_POST['ach'];

    if ($e1 != "a1") {
            $e1 = "a0";
        }
    if ($e1x != "b1") {
            $e1x = "b0";
        }    
    if ($e2 != "c1") {
            $e2 = "c0";
        }
    if ($e3 != "d1") {
            $e3 = "d0";
        }
    if ($e4 != "e1") {
            $e4 = "e0";
        }
    if ($e5 != "f1") {
            $e5 = "f0";
        }
    if ($e6 != "g1") {
            $e6 = "g0";
        }
    if ($e7 != "h1") {
            $e7 = "h0";
        }
    if ($e8 != "i1") {
            $e8 = "i0";
        }
    if ($e9 != "j1") {
            $e9 = "j0";
        }
    if ($e10 != "k1") {
            $e10 = "k0";
        }
    if ($e11 != "l1") {
            $e11 = "l0";
        }
    if ($e12 != "m1") {
            $e12 = "m0";
        }        

 
        $query = "UPDATE sd SET pw = '$pw' , e1 = '$e1' , e1x = '$e1x' , e2 = '$e2' , e3 = '$e3' , e4 = '$e4' , 
        e5 = '$e5' , e6 = '$e6' , e7 = '$e7' , e8 = '$e8' , e9 = '$e9' , e10 = '$e10' , e11 = '$e11' , e12 = '$e12' , ach = '$ach' WHERE sid = '$id'"; 

        if(mysql_query($query)){ ?>
            <script>
                alert('更新成功！');
                history.go(-1);
            </script>          
<?      }
        else{ ?>
            <script>
                alert('更新失敗！');
                history.go(-1);
            </script>          
<?      }
    mysql_close($link);
?>