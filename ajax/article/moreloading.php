<?php

    require '../../config/new_dbconfig.php';

    $page  = $_POST['page'];

    $more = $link->query("SELECT * FROM newinfo ORDER BY id DESC LIMIT $page, 5");
    $counts = $more->num_rows;

    if ($counts > 0) {

        for ( $i = 0; $i < $counts; $i++ ) { $response['result'][$i] = $more->fetch_assoc(); }
        $response['status'] = true;
        $response['page'] = $page + 5;
    }
    else {

        $response['status'] = false;
    }

    echo json_encode($response, JSON_UNESCAPED_UNICODE);
