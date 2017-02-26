<?php session_start(); ?>
<?php

    if(empty($_SESSION['nickname'])){

        echo '<meta http-equiv=REFRESH CONTENT=0;url=login.php>';
        exit();
    }

    require '../../config/new_dbconfig.php';

    $id = $_POST['id'];

    $isRemove = $link->query("UPDATE sd SET status = 1 WHERE id = '$id'");

    ( $link->affected_rows == 1 ) ? $response['status'] = true : $response['status'] = false;

    echo json_encode($response);
