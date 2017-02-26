<?php session_start(); ?>
<?php

    if(empty($_SESSION['nickname'])){

        echo '<meta http-equiv=REFRESH CONTENT=0;url=login.php>';
        exit();
    }

    require '../../config/new_dbconfig.php';

    $title    = $_POST['title'];
    $content  = $_POST['content'];
    $grammar  = $_POST['grammar'];
    $cate     = $_POST['cate'];
    $today    = date("Y-m-d");

    $newVideo = $link->query("INSERT INTO video (title, content, grammar, category, createTime) VALUES ('$title', '$content', '$grammar', '$cate', '$today')");

    ( $link->affected_rows == 1) ? $response['status'] = true : $response['status'] = false;

    echo json_encode($response, JSON_UNESCAPED_UNICODE);
