<?php session_start(); ?>
<?php

    if(empty($_SESSION['nickname'])){

        echo '<meta http-equiv=REFRESH CONTENT=0;url=login.php>';
        exit();
    }

    require '../../../config/new_dbconfig.php';

    if (isset($_POST['action']) == "get") {

        $query = $link->query("SELECT * FROM travel_setting");
        $counts = $query->num_rows;

        if ($counts > 0) {

            $response['result'] = $query->fetch_assoc();
            $response['get_status'] = true;
        }
        else {

            $response['get_status'] = false;
        }
    }
    else {

        $title                  = $_POST['title'];
        $current_new_title      = $_POST['current_new_title'];
        $current_new_content    = $_POST['current_new_content'];

        $query = $link->query(

            "UPDATE 
                travel_setting 
             SET 
                title               = '$title', 
                current_new_title   = '$current_new_title', 
                current_new_content = '$current_new_content'"
        );

        ( $link->affected_rows > 0 ) ? $response['status'] = true : $response['status'] = false;
    }

    echo json_encode($response);
