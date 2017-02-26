<?php session_start(); ?>
<?php

    if(empty($_SESSION['nickname'])){

        echo '<meta http-equiv=REFRESH CONTENT=0;url=login.php>';
        exit();
    }

    require '../../config/new_dbconfig.php';

    $keywords = $_POST['keywords'];

    $isFind = $link->query("SELECT * FROM sd WHERE ( sid LIKE '%$keywords%' OR sname LIKE '%$keywords%' ) AND status = '0'");
    $counts = $isFind->num_rows;

    if ($counts > 0) {

        for ( $i = 0; $i < $counts; $i++ ) { $response['result'][$i] = $isFind->fetch_assoc(); }

        $response['status'] = true;
        $response['counts'] = $counts;
    }
    else {

        $response['status'] = false;
    }

    echo json_encode($response);
