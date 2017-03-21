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
    <title>文章列表 - 林錦英語教室</title>
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
                <div class="ui segment">
                    <div class="ui middle aligned divided list">

                        <?php

                            $postList = $link->query("SELECT id, title, content, time FROM newinfo ORDER BY id DESC limit 100");
                            while ($postListRow = $postList->fetch_assoc()) { ?>

                                <div class="item">
                                    <div class="right floated content">
                                        <button class="ui icon basic button" onclick="window.location.href='editarticle.php?id=<?=$postListRow['id']?>'">
                                            <i class="edit icon"></i>
                                        </button>
                                    </div>
                                    <div class="header" style="font-size:16px;line-height:40px;color:#222222;"><?=$postListRow['title']?></div>
                                    <div class="content">
                                        <span style="font-style:italic;color:#888888;"><i class="wait icon"></i><?=$postListRow['time']?></span>
                                    </div>
                                </div>
                    <?php  } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>
</html>
