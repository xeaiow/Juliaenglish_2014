<?php

    require 'config/new_dbconfig.php';

    $sql = $link->query("SELECT * FROM sd");
    while ($row = $sql->fetch_assoc()) {

        $result = $row['e1'].','.$row['e1x'].','.$row['e2'].','.$row['e3'].','.$row['e4'].','.$row['e5'].','.$row['e6'].','.$row['e7'].','.$row['e8'].','.$row['e9'].','.$row['e10'].','.$row['e11'].','.$row['e12'];
        $user = $row['sid'];
        $link->query("UPDATE sd SET filter = '$result' WHERE sid = '$user'");

    }
