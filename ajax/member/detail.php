<?php session_start(); ?>
<?php

    if(empty($_SESSION['nickname'])){

        echo '<meta http-equiv=REFRESH CONTENT=0;url=login.php>';
        exit();
    }

    require '../../config/new_dbconfig.php';

    $id = $_POST['id'];

    $isFind = $link->query("SELECT * FROM sd WHERE id = '$id'");
    $counts = $isFind->num_rows;

    if ($counts > 0) {

        $response['result'] = $isFind->fetch_assoc();
        $response['status'] = true;
    }
    else {

        $response['status'] = false;
    }

    echo json_encode($response);
