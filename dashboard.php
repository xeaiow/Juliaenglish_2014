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
    </style>
</head>
<body>

    <?php
        require 'config/new_dbconfig.php';
        require 'navbar.php'
    ?>

    <div class="ui container" style="margin:50px;">
        <div class="ui grid" id="container">
            <div class="three wide column">
                <?php require 'dashboard_menu.php' ?>
            </div>
            <div class="twelve wide column">
                <div class="ui top attached tabular menu">
                    <a class="item active" data-tab="first"><i class="add icon"></i>文章</a>
                    <a class="item" data-tab="second"><i class="inbox icon"></i>教材</a>
                </div>
                <div class="ui bottom attached tab segment active" data-tab="first">
                    <div class="ui form attached">
                        <div class="field">
                            <label>標題</label>
                            <input type="text" id="title" placeholder="來個醒目的標題..">
                        </div>
                        <div class="field">
                            <label>內容</label>
                            <textarea id="content" class="ckeditor"></textarea>
                        </div>
                        <div class="field">
                            <div class="ui checkbox">
                                <input type="checkbox" value="1" id="top">
                                <label>置頂</label>
                            </div>
                        </div>
                        <div class="ui bottom attached green button" id="post">新增文章</div>
                    </div>
                </div>
                <div class="ui bottom attached tab segment" data-tab="second">
                    <iframe src="function/index.php" width="100%" onload="Javascript:SetCwinHeight()" id="mainframe" frameborder="0" scrolling="no"></iframe>
                </div>
            </div>
        </div>
    </div>

    <script>

        function SetCwinHeight(){
            var iframeid=document.getElementById("mainframe"); //iframe id
            if (document.getElementById){
                if (iframeid && !window.opera) {
                    if (iframeid.contentDocument && iframeid.contentDocument.body.offsetHeight) {
                        iframeid.height = iframeid.contentDocument.body.offsetHeight;
                    }
                    else if(iframeid.Document && iframeid.Document.body.scrollHeight) {
                        iframeid.height = iframeid.Document.body.scrollHeight;
                    }
                }
            }
        };

        $('.menu .item').tab();

        $("#post").click(function(){

            if ( $("#title").val() == '' || CKEDITOR.instances["content"].getData() == '' ) {
                Messenger().post({
                    message: "請填寫標題及內容！",
                    type: "error",
                    showCloseButton: true,
                    hideAfter: 2
                });
                return false;
            }

            $.ajax({
                type: 'post',
                url: '<?=$base_url?>ajax/article/post.php',
                dataType: 'json',
                data: {
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
                            message: "新增成功！",
                            type: "success",
                            showCloseButton: true,
                            hideAfter: 2
                        });
                        $("#title").val('');
                        CKEDITOR.instances["content"].setData('');
                        $("#top").prop("checked", false);
                    }
                    else{

                        Messenger().post({
                            message: "新增失敗！",
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
