<?php session_start(); ?>
<?php

    if(empty($_SESSION['nickname'])){

        echo '<meta http-equiv=REFRESH CONTENT=0;url=login.php>';
        exit();
    }

    require '../../config/new_dbconfig.php';

    $counts   = $_POST['counts'];

    $isUpdate = $link->query("UPDATE user SET advcount = '$counts'");

    ( $link->affected_rows > 0) ? $response['status'] = true : $response['status'] = false;

    echo json_encode($response, JSON_UNESCAPED_UNICODE);
