<?php session_start(); ?>
<?php

    if (empty($_SESSION['stlogin']) || empty($_SESSION['pw'])) {

        echo '<meta http-equiv=REFRESH CONTENT=0;url=sdlogin.php>';
        exit();
    }

    require '../../config/new_dbconfig.php';

    $sql = $link->query("SELECT * FROM flip_room");
    $counts = $sql->num_rows;

    if ($counts > 0) {

        $response['status'] = true;

        for ($i = 0; $i < $counts; $i++) { $response['result'][$i] = $sql->fetch_assoc(); }

    }
    else {

        $response['status'] = false;
    }


    echo json_encode($response);
