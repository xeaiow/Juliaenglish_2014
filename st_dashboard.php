<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-migrate/3.0.0/jquery-migrate.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.2.7/semantic.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/messenger/1.5.0/js/messenger.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/messenger/1.5.0/js/messenger-theme-future.js"></script>
    <script src="ckeditor/ckeditor.js" type="text/javascript"></script>
    <link rel="stylesheet" href="css/dashboard_style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.2.7/semantic.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/messenger/1.5.0/css/messenger.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/messenger/1.5.0/css/messenger-theme-future.min.css">
    <title>學生資訊系統 - 林錦英語教室</title>
    <style media="screen">
        body{
            overflow-x: hidden;
        }
        .item a {
            color: #000000;
            font-size: 18px;
            font-family: '微軟正黑體';
        }
    </style>
</head>
<body>

    <?php
        require 'config/new_dbconfig.php';

        if (empty($_SESSION['stlogin']) || empty($_SESSION['pw'])) {

            echo '<meta http-equiv=REFRESH CONTENT=0;url=sdlogin.php>';
            exit();
        }
    ?>

    <div class="ui top fixed inverted menu">
        <a class="item" href="st_dashboard.php"><i class="book icon"></i>林錦英語學生資訊系統</a>
    </div>


    <div class="ui container" style="margin:50px;">
        <div class="ui grid">
            <div class="four wide column">
                <div class="ui secondary vertical pointing menu">
                    <a class="item" href="st_dashboard.php"><i class="bookmark icon"></i>我的課程</a>
                    <a class="item" href="sdlogout.php"><i class="sign out icon"></i>登出</a>
                </div>
            </div>
            <div class="twelve wide column">
                <h1 class="ui header centered">我的課程</h1>
                    <div class="ui divided items">
                    <?php
                        $id         = $_SESSION['stlogin'];
                        $all_course = $link->query("SELECT * FROM sd WHERE sid = '$id'");

                        $row = $all_course->fetch_assoc();

    					require 'str.php';

    					$re1 = $row['e1'];

                        echo '<div class="item">
                                <div class="middle aligned content">
                                    '.$msg.'
                                </div>
                            </div>';
                        echo '<div class="item">
                                <div class="middle aligned content">
                                    '.$msg1.'
                                </div>
                            </div>';
                        echo '<div class="item">
                                <div class="middle aligned content">
                                    '.$msg11.'
                                </div>
                            </div>';
                        echo '<div class="item">
                                <div class="middle aligned content">
                                    '.$msg2.'
                                </div>
                            </div>';
                        echo '<div class="item">
                                <div class="middle aligned content">
                                    '.$msg3.'
                                </div>
                            </div>';
                        echo '<div class="item">
                                <div class="middle aligned content">
                                    '.$msg6.'
                                </div>
                            </div>';
                        echo '<div class="item">
                                <div class="middle aligned content">
                                    '.$msg7.'
                                </div>
                            </div>';
                        echo '<div class="item">
                                <div class="middle aligned content">
                                    '.$msg8.'
                                </div>
                            </div>';
                        echo '<div class="item">
                                <div class="middle aligned content">
                                    '.$msg9.'
                                </div>
                            </div>';
                        echo '<div class="item">
                                <div class="middle aligned content">
                                    '.$msg10.'
                                </div>
                            </div>';
                        echo '<div class="item">
                                <div class="middle aligned content">
                                    '.$msg12.'
                                </div>
                            </div>';
                        echo '<div class="item">
                                <div class="middle aligned content">
                                    '.$msg4.'
                                </div>
                            </div>';
                        echo '<div class="item">
                                <div class="middle aligned content">
                                    '.$msg5.'
                                </div>
                            </div>';
                    ?>
                </div>
            </div>
        </div>
    </div>


    <script>
        $("#chpw").click(function(){
            $("#chpw-modal").show();
        });
    </script>

</body>
</html>
