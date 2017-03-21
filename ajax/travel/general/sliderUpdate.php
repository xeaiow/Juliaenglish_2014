<?php session_start(); ?>
<?php

    if(empty($_SESSION['nickname'])){

        echo '<meta http-equiv=REFRESH CONTENT=0;url=login.php>';
        exit();
    }

    require '../../../config/new_dbconfig.php';

    if (isset($_POST['action']) == "get") {

        $query = $link->query("SELECT * FROM slider_images");
        $counts = $query->num_rows;

        if ($counts > 0) {

            for ( $i = 0; $i < $counts; $i++ ) { $response['result'][$i] = $query->fetch_assoc(); }
            $response['get_status'] = true;
        }
        else {

            $response['get_status'] = false;
        }
    }
    else {

        $slider_image       = $_POST['slider_image'];
        $slider_title       = $_POST['slider_title'];
        $slider_content     = $_POST['slider_content'];
        $id                 = $_POST['id'];

        $query = $link->query(

            "UPDATE 
                slider_images 
             SET 
                image_url    = '$slider_image', 
                title        = '$slider_title', 
                content      = '$slider_content' 
            WHERE 
                id = '$id'"
        );

        ( $link->affected_rows > 0 ) ? $response['status'] = true : $response['status'] = false;
    }

    echo json_encode($response);
