<?php session_start(); ?>
<?php

    if(empty($_SESSION['nickname'])){

        echo '<meta http-equiv=REFRESH CONTENT=0;url=login.php>';
        exit();
    }

    require '../../config/new_dbconfig.php';

    $id       = $_POST['id'];
    $title    = $_POST['title'];
    $content  = $_POST['content'];
    $top      = $_POST['isTop'];

    $isUpdate = $link->query("UPDATE newinfo SET title = '$title', content = '$content', art_top = '$top' WHERE id = '$id'");

    ( $link->affected_rows == 1) ? $response['status'] = true : $response['status'] = false;

    echo json_encode($response, JSON_UNESCAPED_UNICODE);
