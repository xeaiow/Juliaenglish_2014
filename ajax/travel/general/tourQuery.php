<?php session_start(); ?>
<?php

    if(empty($_SESSION['nickname'])){

        echo '<meta http-equiv=REFRESH CONTENT=0;url=login.php>';
        exit();
    }

    require '../../../config/new_dbconfig.php';

    if (isset($_POST['action']) == "get") {

        $query = $link->query("SELECT * FROM study_tour");
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

        $id          = $_POST['id'];
        $cover       = $_POST['cover'];
        $title       = $_POST['title'];
        $content     = $_POST['content'];
        $period      = $_POST['period'];
        $price       = $_POST['price'];
        $description = $_POST['description'];

        $query = $link->query(

            "UPDATE
                study_tour
             SET
                cover       = '$cover',
                title       = '$title',
                content     = '$content',
                period      = '$period',
                price       = '$price',
                description = '$description'
            WHERE
                id = '$id'"
        );

        ( $link->affected_rows > 0 ) ? $response['status'] = true : $response['status'] = false;
    }

    echo json_encode($response);
