<?php session_start(); ?>
<?php

    if (empty($_SESSION['stlogin']) || empty($_SESSION['pw'])) {

        echo '<meta http-equiv=REFRESH CONTENT=0;url=sdlogin.php>';
        exit();
    }

    require '../../config/new_dbconfig.php';

    $id = $_POST['id'];
    $sql = $link->query("SELECT e1 AS a, e1x AS b, e2 AS c, e3 AS d, e4 AS e, e5 AS f, e6 AS g, e7 AS h, e8 AS i, e9 AS j, e10 AS k, e11 AS l, e12 AS m FROM sd WHERE sid = '$id'");
    $counts = $sql->num_rows;

    if ($counts > 0) {

        $response['status'] = true;
        $response['result'] = $sql->fetch_assoc();
    }
    else {

        $response['status'] = false;
    }


    echo json_encode($response);
