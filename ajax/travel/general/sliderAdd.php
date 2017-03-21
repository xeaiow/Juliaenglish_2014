<?php session_start(); ?>
<?php

    if(empty($_SESSION['nickname'])){

        echo '<meta http-equiv=REFRESH CONTENT=0;url=login.php>';
        exit();
    }

    require '../../../config/new_dbconfig.php';

    $image       = $_POST['slider_image'];
    $title       = $_POST['slider_title'];
    $content     = $_POST['slider_description'];

    $query = $link->query("INSERT INTO slider_images (image_url, title, content) VALUES ('$image', '$title', '$content')");

    ( $link->affected_rows == 1 ) ? $response['status'] = true : $response['status'] = false;
    

    echo json_encode($response);
