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
    <title>編輯文章 - 林錦英語教室</title>
    <style media="screen">
        body{
            overflow: hidden;
            background-color: #F7F7F7;
        }
    </style>
</head>
<body>

    <?php
        require 'config/new_dbconfig.php';
        require 'navbar.php'
    ?>

    <div class="ui container" style="margin:50px;">
        <div class="ui grid">
            <div class="three wide column">
                <?php require 'dashboard_menu.php' ?>
            </div>
            <div class="twelve wide column">
                <div class="ui segment basic">
                    <div class="ui middle aligned divided list">

                        <?php

                            $id          = $_GET['id'];
                            $postList    = $link->query("SELECT id, title, content, time, art_top FROM newinfo WHERE id = '$id'");
                            $postListRow = $postList->fetch_assoc();
                        ?>

                        <div class="ui form attached segment">
                            <div class="field">
                                <label>標題</label>
                                <input type="text" id="title" placeholder="來個醒目的標題.." value="<?=$postListRow['title']?>">
                            </div>
                            <div class="field">
                                <label>內容</label>
                                <textarea id="content" class="ckeditor"><?=$postListRow['content']?></textarea>
                            </div>
                            <div class="field">
                                <div class="ui checkbox">
                                    <input type="checkbox" value="1" id="top" <?=( $postListRow['art_top'] == 1 ) ? "checked" : "" ?>>
                                    <label>置頂</label>
                                </div>
                            </div>
                        </div>
                        <div class="ui bottom attached blue button" id="update">更新文章</div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>

    $("#update").click(function(){
        $.ajax({
            type: 'post',
            url: '<?=$base_url?>ajax/article/edit.php',
            dataType: 'json',
            data: {
                id      : "<?=$_GET['id']?>",
                title   : $("#title").val(),
                content : CKEDITOR.instances["content"].getData(),
                isTop   : ( $("#top").is(":checked") ? '1' : '0' )
            },
            error: function (xhr) {

            },
            success: function (response) {

                var response = $.parseJSON(JSON.stringify(response));

                if (response.status == true) {

                    Messenger().post({
                        message: "編輯成功！",
                        type: "success",
                        showCloseButton: true,
                        hideAfter: 2
                    });
                }
                else{

                    Messenger().post({
                        message: "編輯失敗！",
                        type: "error",
                        showCloseButton: true,
                        hideAfter: 2
                    });
                }
            }
        });
    });

    </script>

</body>
</html>
