<?php session_start(); ?>
<?php

    if(empty($_SESSION['nickname'])){

        echo '<meta http-equiv=REFRESH CONTENT=0;url=login.php>';
        exit();
    }

    require '../../config/new_dbconfig.php';

    $id  = $_POST['id'];
    $e1  = $_POST['e1'];
    $e1x = $_POST['e1x'];
    $e2  = $_POST['e2'];
    $e3  = $_POST['e3'];
    $e4  = $_POST['e4'];
    $e5  = $_POST['e5'];
    $e6  = $_POST['e6'];
    $e7  = $_POST['e7'];
    $e8  = $_POST['e8'];
    $e9  = $_POST['e9'];
    $e10 = $_POST['e10'];
    $e11 = $_POST['e11'];
    $e12 = $_POST['e12'];

    $saveDetail     = $link->query("UPDATE sd SET e1 = '$e1', e1x = '$e1x', e2 = '$e2', e3 = '$e3', e4 = '$e4', e5 = '$e5', e6 = '$e6', e7 = '$e7', e8 = '$e8', e9 = '$e9', e10 = '$e10', e11 = '$e11', e12 = '$e12' WHERE id = '$id'");

    // filter REGEXP 用
    $findUser       = $link->query("SELECT * FROM sd WHERE id = '$id'");
    $findUserRow    = $findUser->fetch_assoc();
    $userCurrent    = $findUserRow['e1'].','.$findUserRow['e1x'].','.$findUserRow['e2'].','.$findUserRow['e3'].','.$findUserRow['e4'].','.$findUserRow['e5'].','.$findUserRow['e6'].','.$findUserRow['e7'].','.$findUserRow['e8'].','.$findUserRow['e9'].','.$findUserRow['e10'].','.$findUserRow['e11'].','.$findUserRow['e12'];
    $link->query("UPDATE sd SET filter = '$userCurrent' WHERE id = '$id'");

    ( $link->affected_rows == 1 ) ? $response['status'] = true : $response['status'] = false;

    echo json_encode($response);
