<?php session_start(); ?>
<?php

    if(empty($_SESSION['nickname'])){

        echo '<meta http-equiv=REFRESH CONTENT=0;url=login.php>';
        exit();
    }

    require '../../config/new_dbconfig.php';

    $sname = $_POST['sname'];
    $pw    = sha1($_POST['pw']);
    $sid   = $_POST['sid'];
    $ne1   = $_POST['ne1'];
    $ne1x  = $_POST['ne1x'];
    $ne2   = $_POST['ne2'];
    $ne3   = $_POST['ne3'];
    $ne4   = $_POST['ne4'];
    $ne5   = $_POST['ne5'];
    $ne6   = $_POST['ne6'];
    $ne7   = $_POST['ne7'];
    $ne8   = $_POST['ne8'];
    $ne9   = $_POST['ne9'];
    $ne10  = $_POST['ne10'];
    $ne11  = $_POST['ne11'];
    $ne12  = $_POST['ne12'];

    $isExist = $link->query("SELECT id FROM sd WHERE sid = '$sid'")->num_rows;

    if ($isExist == 0) {

        $newMember = $link->query("INSERT INTO sd (sid, pw, e1, e1x, e2, e3, e4, e5, e6, e7, e8, e9, e10, e11, e12, sname) VALUES ('$sid', '$pw', '$ne1', '$ne1x', '$ne2', '$ne3', '$ne4', '$ne5', '$ne6', '$ne7', '$ne8', '$ne9', '$ne10', '$ne11', '$ne12', '$sname')");

        $findUser       = $link->query("SELECT * FROM sd WHERE sid = '$sid'");
        $findUserRow    = $findUser->fetch_assoc();
        $userCurrent    = $findUserRow['e1'].','.$findUserRow['e1x'].','.$findUserRow['e2'].','.$findUserRow['e3'].','.$findUserRow['e4'].','.$findUserRow['e5'].','.$findUserRow['e6'].','.$findUserRow['e7'].','.$findUserRow['e8'].','.$findUserRow['e9'].','.$findUserRow['e10'].','.$findUserRow['e11'].','.$findUserRow['e12'];
        $link->query("UPDATE sd SET filter = '$userCurrent' WHERE sid = '$sid'");

        ( $link->affected_rows == 1 ) ? $response['status'] = true : $response['status'] = false;
    }
    else {

        $response['status'] = false;
        $response['counts'] = 1;
    }

    echo json_encode($response);
