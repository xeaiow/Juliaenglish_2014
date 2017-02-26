<?php session_start(); ?>
<?php

    if(empty($_SESSION['nickname'])){

        echo '<meta http-equiv=REFRESH CONTENT=0;url=login.php>';
        exit();
    }

    require '../../config/new_dbconfig.php';

    $id = $_POST['id'];
    $pw = sha1($_POST['pw']);

    $isChange = $link->query("UPDATE sd SET pw = '$pw' WHERE id = '$id'");

    ( $link->affected_rows > 0 ) ? $response['status'] = true : $response['status'] = false;

    echo json_encode($response);
