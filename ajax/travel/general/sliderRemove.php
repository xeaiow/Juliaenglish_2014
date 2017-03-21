<?php session_start(); ?>
<?php

    if(empty($_SESSION['nickname'])){

        echo '<meta http-equiv=REFRESH CONTENT=0;url=login.php>';
        exit();
    }

    require '../../../config/new_dbconfig.php';

    $id = $_POST['id'];
    $query = $link->query("DELETE FROM slider_images WHERE id = '$id'");

    ( $link->affected_rows == 1 ) ? $response['status'] = true : $response['status'] = false;

    echo json_encode($response);
