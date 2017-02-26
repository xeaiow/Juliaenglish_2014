<?php session_start(); ?>
<?php

    if(empty($_SESSION['nickname'])){

        echo '<meta http-equiv=REFRESH CONTENT=0;url=login.php>';
        exit();
    }

    require '../../config/new_dbconfig.php';

    $filterresult = str_replace(",", "|", $_POST['filterresult']);

    $newMember = $link->query("SELECT * FROM sd WHERE filter REGEXP '$filterresult' AND status = '0'");

    $counts = $newMember->num_rows;

    if ($counts > 0) {

        for ( $i = 0; $i < $counts; $i++ ) { $response['result'][$i] = $newMember->fetch_assoc(); }

        $response['status'] = true;
        $response['counts'] = $counts;
    }
    else {

        $response['status'] = false;
    }


    echo json_encode($response);
