<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.2.7/semantic.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/messenger/1.5.0/js/messenger.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/messenger/1.5.0/js/messenger-theme-future.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.2.7/semantic.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/messenger/1.5.0/css/messenger.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/messenger/1.5.0/css/messenger-theme-future.min.css">
    <title>翻轉教室 - 林錦英語教室</title>
    <style media="screen">
        * {
            font-family: '微軟正黑體';
        }
        body{
            overflow-x: hidden;
        }
        .item a {
            color: #000000;
            font-size: 18px;
        }
        p a {
            color: #333;
            font-size: 18px;
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


        $id  = $_SESSION['stlogin'];
        $row = $link->query("SELECT * FROM sd WHERE sid = '$id'")->fetch_assoc();
    ?>

    <div class="ui left vertical inverted menu sidebar">
        <a class="item" href="<?=$base_url?>st_dashboard.php">
            <i class="bookmark icon"></i>我的課程
        </a>
        <a class="item" href="<?=$base_url?>flip_class.php">
            <i class="video icon"></i>翻轉教室
        </a>
        <a class="item">
            <i class="sign out icon"></i>預約補課
        </a>
        <a class="item">
            <i class="hashtag icon"></i>更改密碼
        </a>
        <a class="item right" href="sdlogout.php">
            <i class="sign out icon"></i>登出
        </a>
    </div>

    <div class="pusher">
        <div class="ui inverted segment">
            <div class="ui inverted secondary pointing menu">
                <a class="item" id="open-silderbar"><i class="content icon"></i></a>
            </div>
        </div>

        <div class="ui container" style="margin:30px;">
            <div class="ui grid stackable">
                <div class="four wide column">
                    <div class="ui segment">
                        <div class="ui card centered">
                            <div class="image">
                                <img src="https://i.imgur.com/ig3xqEN.jpg">
                            </div>
                            <div class="content">
                                <a class="center aligned header"><?=$row['sname']?> | <?=$row['sid']?></a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="ten wide column">
                    <div class="ui segment center aligned" id="mycourse">
                        <h1 class="ui header"><img src="https://i.imgur.com/hDd5HD4.png" width="24" alt="">Flipped classroom</h1>
                    </div>
                </div>

                <!-- <div class="five wide column">
                    <div class="ui segment center aligned">
                        <h1 class="ui header"><img src="https://i.imgur.com/OyjRou3.png" width="24" alt="">Record</h1>
                    </div>
                </div> -->
            </div>
        </div>
    </div>


    <script>

        $("#chpw").click(function(){
            $("#chpw-modal").show();
        });

        $.getJSON("course.json",function(result){
            course_list = $.parseJSON(JSON.stringify(result)); // 載入所有課程資訊
        });

        var arr = [];

        // 所有課程
        var course_code = ['a1', 'b1', 'c1', 'd1', 'e1', 'f1', 'g1', 'h1', 'i1', 'j1', 'k1', 'l1', 'm1'];

        var course_list; // 我的課程清單

        $.ajax({
            type: 'post',
            url: '<?=$base_url?>ajax/member/getcourse.php',
            dataType: 'json',
            data: {
                id : "<?=$row['sid']?>",
            },
            error: function (xhr) {
            },
            success: function (response) {

                var response = $.parseJSON(JSON.stringify(response));

                if (response.status == true) {

                    // 把我的課程轉乘陣列
                    for(var x in response.result) {
                        arr.push(response.result[x]);
                    }


                    $.ajax({
                        type: 'post',
                        url: '<?=$base_url?>ajax/member/getfliproom.php',
                        dataType: 'json',
                        error: function (xhr) {
                        },
                        success: function (response) {

                            var response = $.parseJSON(JSON.stringify(response));

                            if (response.status == true) {

                                $.each(response.result, function(i) {

                                    if ($.inArray(response.result[i].types, arr) > -1) {

                                        $("#mycourse").append(
                                            '<div class="ui segment">' +
                                                '<p><a href="' + response.result[i].url + '">' + response.result[i].course + '</a></p>' +
                                            '</div>'
                                        );
                                    }
                                });
                            }
                        }
                    });

                    // // 把我有的課程都 appen
                    // for ( var i = 0; i < arr.length; i++ ) {
                    //
                    //     if ( arr[i] == course_code[i] ) {
                    //
                    //         $("#mycourse").append(
                    //             '<div class="ui segment">' +
                    //                 '<p><img src="https://i.imgur.com/dZNu2Bd.png" width="32"><a href="' + course_list[i].t_m + '">' + course_list[i].name + '</a></p>' +
                    //             '</div>'
                    //         );
                    //     }
                    // }
                }
            }
        });

        // open silderbar
        $("#open-silderbar").click(function() {

            $('.ui.sidebar').sidebar('toggle');
        });

    </script>

</body>
</html>
