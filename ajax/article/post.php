<?php session_start(); ?>
<?php

    if(empty($_SESSION['nickname'])){

        echo '<meta http-equiv=REFRESH CONTENT=0;url=login.php>';
        exit();
    }

    require '../../config/new_dbconfig.php';

    $title    = $_POST['title'];
    $content  = $_POST['content'];
    $now      = date("Y-m-d");
    $art_top  = $_POST['isTop'];

    $isPost = $link->query("INSERT INTO newinfo (title, content, time, art_top) VALUES ('$title', '$content', '$now', '$art_top')");

    ( $link->affected_rows == 1) ? $response['status'] = true : $response['status'] = false;

    echo json_encode($response, JSON_UNESCAPED_UNICODE);
