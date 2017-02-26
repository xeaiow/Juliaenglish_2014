<?php
    if(empty($_SESSION['nickname'])){

        echo '<meta http-equiv=REFRESH CONTENT=0;url=login.php>';
        exit();
    }
?>

<div class="ui top fixed inverted menu">
    <a class="item" href="dashboard.php"><i class="options icon"></i>林錦英語教室後臺系統</a>
    <div class="right menu">
        <a class="ui item" href="logout.php">
            登出
        </a>
    </div>
</div>
