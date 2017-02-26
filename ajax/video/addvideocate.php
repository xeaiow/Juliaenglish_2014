<?php session_start(); ?>
<?php

    if(empty($_SESSION['nickname'])){

        echo '<meta http-equiv=REFRESH CONTENT=0;url=login.php>';
        exit();
    }

    require '../../config/new_dbconfig.php';

    $cate_name    = $_POST['cate_name'];

    $newVideo = $link->query("INSERT INTO video_category (cate_name) VALUES ('$cate_name')");

    if ( $link->affected_rows == 1 ) {

        $response['status'] = true;
        $response['insert_id'] = $link->insert_id;
    }
    else{

        $response['status'] = false;
    }

    echo json_encode($response, JSON_UNESCAPED_UNICODE);
