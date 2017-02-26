<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-migrate/1.4.1/jquery-migrate.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.2.7/semantic.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/messenger/1.5.0/js/messenger.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/messenger/1.5.0/js/messenger-theme-future.js"></script>
    <script src="ckeditor/ckeditor.js" type="text/javascript"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.2.7/semantic.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/messenger/1.5.0/css/messenger.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/messenger/1.5.0/css/messenger-theme-future.min.css">
    <title>影片管理 - 林錦英語教室</title>
    <style media="screen">
        body{
            overflow-x: hidden;
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
                <div class="ui top attached tabular menu">
                    <a class="item active first" data-tab="first"><i class="video icon"></i>所有影片</a>
                    <a class="item second" data-tab="second"><i class="add icon"></i>新增影片</a>
                    <a class="item third" data-tab="third"><i class="inbox icon"></i>新增分類</a>
                </div>
                <div class="ui bottom attached tab segment active first" data-tab="first">
                    <div class="ui list" id="all-videos">
                    <?php
                        $videoList = $link->query("SELECT * FROM video AS v, video_category AS vc WHERE v.category = vc.id ");
                        while ($videoListRow = $videoList->fetch_assoc()) {

                            echo '
                                <div class="item">[ '.$videoListRow['cate_name'].' ] - '.$videoListRow['title'].'</div>
                            ';
                        }
                    ?>
                    </div>
                </div>
                <div class="ui bottom attached tab segment second" data-tab="second">

                    <div class="four wide column ui form" id="video-form">
                        <div class="field">
                            <label>影片標題</label>
                            <input type="text" placeholder="來個聳動的" id="video-title">
                        </div>
                        <div class="field">
                            <label>描述</label>
                            <textarea id="video-content"></textarea>
                        </div>
                        <div class="field">
                            <label>語法</label>
                            <textarea id="video-grammar"></textarea>
                        </div>
                        <select class="ui dropdown fluid" id="video-cate">
                            <?php
                                // video_category
                                $video_category = $link->query("SELECT id, cate_name FROM video_category");
                                while ($videoCategoryRow = $video_category->fetch_assoc()) {echo '<option value="'.$videoCategoryRow['id'].'">'.$videoCategoryRow['cate_name'].'</option>';}
                            ?>
                        </select>
                    </div>

                    <button class="ui button green fluid" id="video-add" type="button">新增影片</button>

                </div>
                <div class="ui bottom attached tab segment third" data-tab="third">

                    <div class="four wide column ui form" id="video-cate-form">
                        <div class="field">
                            <label>分類名稱</label>
                            <input type="text" id="video-cate-name">
                        </div>
                    </div>

                    <button class="ui button green fluid" id="video-cate-add" type="button">新增分類</button>

                    <div class="ui segment">
                        <h1 class="ui header centered">目前分類</h1>
                        <ol class="ui list" id='video-cate-result'>
                            <?php
                                $cateList = $link->query("SELECT * FROM video_category");
                                while ($cateListRow = $cateList->fetch_assoc()) {
                                    echo '<li value="-" id="video-remove-'.$cateListRow['id'].'">'.$cateListRow['cate_name'].' <i class="remove circle red icon video-remove" title="'.$cateListRow['id'].'"></i></li>';
                                }
                            ?>
                        </ol>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <script>

        $(document).ready(function(){
            $("#result, #filter-result").hide();
            $('.menu .item').tab();
            $('.ui.dropdown').dropdown();
            $('.ui.modal').modal();
            $('.max.example .ui.normal.dropdown')
            $('.tag.example .ui.dropdown').dropdown({
                allowAdditions: true,
            });
        });

        $("#video-add").click(function(){

            var title = $("#video-title").val();
            var cate_text = $("#video-cate :selected").text();

            $.ajax({
                type: 'post',
                url: '<?=$base_url?>ajax/video/addvideo.php',
                dataType: 'json',
                data: {
                    title   : title,
                    content : $("#video-content").val(),
                    grammar : $("#video-grammar").val(),
                    cate    : $("#video-cate").val()
                },
                error: function (xhr) {},
                success: function (response) {

                    var response = $.parseJSON(JSON.stringify(response));

                    if (response.status == true) {

                        Messenger().post({
                            message: "新增成功！",
                            type: "success",
                            showCloseButton: true,
                            hideAfter: 2
                        });
                        $("#video-form input, #video-form textarea").val('');
                        $("#all-videos").append('<div class="item">[ ' + cate_text + ' ] - ' + title + '</div>')
                        $(".first, .second, .third").removeClass('active');
                        $(".first").addClass('active');
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

        $("#video-cate-add").click(function(){

            var cate_name = $("#video-cate-name").val();
            if (cate_name) {
                $.ajax({
                    type: 'post',
                    url: '<?=$base_url?>ajax/video/addvideocate.php',
                    dataType: 'json',
                    data: {
                        cate_name   : cate_name,
                    },
                    error: function (xhr) {},
                    success: function (response) {

                        var response = $.parseJSON(JSON.stringify(response));

                        if (response.status == true) {

                            Messenger().post({
                                message: "新增成功！",
                                type: "success",
                                showCloseButton: true,
                                hideAfter: 2
                            });
                            $("#video-cate-form input, #video-cate-form textarea").val('');
                            $("#video-cate-result").append(
                                '<li value="-" id="video-remove-' + response.insert_id + '" >' + cate_name + ' <i class="remove circle red icon video-remove" title="' + response.insert_id + '"></i></li>'
                            );

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
            }
        });

        $(".video-remove").click(function(){

            var msg = Messenger().post({
                message: "確定刪除嗎？",
                actions: {
                    retry: {
                        label: '是',
                        action: function() {
                            return remove_video_cate(), msg.cancel();
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

            var id = $(this).attr('title');

            function remove_video_cate () {

                $.ajax({
                    type: 'post',
                    url: '<?=$base_url?>ajax/video/remove.php',
                    dataType: 'json',
                    data: {
                        id : id,
                    },
                    error: function (xhr) {},
                    success: function (response) {

                        var response = $.parseJSON(JSON.stringify(response));

                        if (response.status == true) {

                            Messenger().post({
                                message: "刪除成功！",
                                type: "success",
                                showCloseButton: true,
                                hideAfter: 2
                            });
                            $('#video-remove-' + id).hide();
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
