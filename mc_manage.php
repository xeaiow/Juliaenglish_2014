<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.2.7/semantic.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-migrate/3.0.0/jquery-migrate.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.2.7/semantic.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/messenger/1.5.0/js/messenger.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/messenger/1.5.0/js/messenger-theme-future.js"></script>
    <script src="ckeditor/ckeditor.js" type="text/javascript"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/messenger/1.5.0/css/messenger.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/messenger/1.5.0/css/messenger-theme-future.min.css">
    <title>後台系統 - 林錦英語教室</title>
    <style media="screen">
        @import url(//fonts.googleapis.com/earlyaccess/cwtexhei.css);
        body {
            overflow-x: hidden;
            background-image:url('https://i.imgur.com/ND1KI66.jpg');
			background-attachment: fixed;
			background-position: center center;
			background-size: cover;
        }
        #container {
            margin-top: 1px;
            background-color: rgba(255, 255, 255, .1); !important;
            border-radius: 10px;
        }
        .secondary a {
            font-family: 'cwTeXHei', sans-serif;
            color: #EEE !important;
            font-size: 18px;
        }
        .item {
            font-family: 'cwTeXHei', sans-serif;
            font-size: 15px;
        }
        span {
            color: #DDD !important;
            font-size: 20px;
        }
    </style>
</head>
<body>

    <?php
        require 'config/new_dbconfig.php';
        require 'navbar.php'
    ?>

    <div class="ui container" style="margin:50px;">
        <div class="ui grid" id="container">
            <div class="four wide column">
                <?php require 'dashboard_menu.php' ?>
            </div>
            <div class="twelve wide column">
                <div class="ui grid">
                    <?php
                        $all_mc     = $link->query("SELECT id, name, url FROM mc ORDER BY id DESC");
                        $mc_counts  = $all_mc->num_rows;
                        if ($mc_counts == 0) {
                    ?>
                            <div class="eight wide column centered">
                                <div class="ui info message">
                                    <i class="close icon"></i>
                                    <div class="header">
                                        沒有任何月曆。
                                    </div>
                                    <ul class="list">
                                        <li>欲新增請點選單的「月曆管理」進行上傳</li>
                                    </ul>
                                </div>
                            </div>
                    <?php
                        }
                        while ($all_mc_row = $all_mc->fetch_assoc()) {
                    ?>
                            <div class="eight wide column" id="mc-<?=$all_mc_row['id']?>">
                                <a class="ui basic ribbon label remove-mc" code="<?=$all_mc_row['id']?>"><i class="remove red icon"></i></a>
                                <span><?=$all_mc_row['name']?></span>
                                <div class="ui card attached">
                                    <img class="ui big centered image" src="<?=$all_mc_row['url']?>">
                                </div>
                            </div>
                    <?php
                        }
                    ?>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(".remove-mc").click(function(){


            var msg = Messenger().post({
                message: "確定刪除嗎？",
                actions: {
                    retry: {
                        label: '是',
                        action: function() {
                            return confirm_remove(), msg.cancel();
                        }
                    },
                    cancel: {
                        label: '否',
                        action: function() {
                            return msg.cancel();
                        }
                    }
                }
            });

            var code = $(this).attr('code');

            function confirm_remove () {
                $.ajax({
                    type: 'post',
                    url: '<?=$base_url?>ajax/mc/remove.php',
                    dataType: 'json',
                    data: {
                        code : code,
                    },
                    error: function (xhr) {
                    },
                    success: function (response) {

                        var response = $.parseJSON(JSON.stringify(response));

                        if (response.status == true) {

                            Messenger().post({
                                message: "刪除成功！",
                                type: "success",
                                showCloseButton: true,
                                hideAfter: 2
                            });
                            $("#mc-" + code).css('display','none');
                        }
                        else{

                            Messenger().post({
                                message: "刪除失敗！",
                                type: "error",
                                showCloseButton: true,
                                hideAfter: 2
                            });
                        }
                    }
                });
            }
        });
    </script>


</body>
</html>
