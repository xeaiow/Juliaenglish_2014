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
    <title>林錦國際文創設定 - 林錦英語教室</title>
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
                        <a class="item active first" data-tab="first"><i class="setting icon"></i>一般</a>
                        <a class="item second" data-tab="second"><i class="image icon"></i>圖片輪播</a>
                        <a class="item third" data-tab="third"><i class="inbox icon"></i>遊學團</a>
                    </div>
                    <div class="ui bottom attached tab segment active first" data-tab="first">

                        <div class="four wide column ui form">
                            <div class="field">
                                <label>Logo 標題</label>
                                <input type="text" id="travel-title">
                            </div>
                            <div class="field">
                                <label>矚目新聞標題</label>
                                <input type="text" id="travel-current_new_title">
                            </div>
                            <div class="field">
                                <label>矚目新聞內容</label>
                                <textarea id="travel-current_new_content"></textarea>
                            </div>
                        </div>

                        <div class="ui segment basic">
                            <button class="ui button teal fluid" id="travel-update" type="button">修改</button>
                        </div>

                    </div>
                    <div class="ui bottom attached tab segment second" data-tab="second">

                        <div class="ui styled accordion" id="travel-slider-images">
                            <div class="title">
                                <i class="add icon"></i> 新增輪播圖片
                            </div>
                            <div class="content">
                                <p class="transition visible" style="display: block !important;">
                                    <div class="four wide column ui form">
                                        <div class="field">
                                            <label>圖片網址</label>
                                            <input type="text" id="travel-slider-image-add">
                                        </div>
                                        <div class="field">
                                            <label>矚目標題</label>
                                            <input type="text" id="travel-slider-title-add">
                                        </div>
                                        <div class="field">
                                            <label>描述文字</label>
                                            <textarea id="travel-slider-description-add"></textarea>
                                        </div>
                                    </div>
                                    <div class="ui segment basic">
                                        <button class="ui button teal fluid" id="travel-slider-add" type="button">新增</button>
                                    </div>
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="ui bottom attached tab segment third" data-tab="third">


                        <div class="ui styled accordion" id="travel-tour">
                            <div class="title">
                                <i class="add icon"></i> 新增輪播圖片
                            </div>
                            <div class="content">
                                <p class="transition visible" style="display: block !important;">
                                    <div class="four wide column ui form">
                                        <div class="field">
                                            <label>封面</label>
                                            <input type="text" id="travel-tour-cover" placeholder="圖片網址">
                                        </div>
                                        <div class="field">
                                            <label>標題</label>
                                            <input type="text" id="travel-tour-title">
                                        </div>
                                        <div class="field">
                                            <label>內容</label>
                                            <input type="text" id="travel-tour-content" placeholder="簡述即可">
                                        </div>
                                        <div class="field">
                                            <label>期間</label>
                                            <input type="text" id="travel-tour-period" placeholder="ex. 2017/03/07">
                                        </div>
                                        <div class="field">
                                            <label>價格</label>
                                            <input type="text" id="travel-tour-price" placeholder="ex. 150000">
                                        </div>
                                        <div class="field">
                                            <label>內容描述</label>
                                            <textarea id="travel-tour-description" placeholder="詳述"></textarea>
                                        </div>
                                    </div>

                                    <div class="ui segment basic">
                                        <button class="ui button teal fluid" id="travel-tour-add" type="button">新增</button>
                                    </div>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script>
            $(document).ready(function() {
                $("#result, #filter-result").hide();
                $('.menu .item').tab();
                $('.ui.dropdown').dropdown();
                $('.ui.modal').modal();
                $('.ui.accordion').accordion();
                $('.max.example .ui.normal.dropdown')
                $('.tag.example .ui.dropdown').dropdown({
                    allowAdditions: true,
                });
                travelUpdate('get');
                travelSliderUpdate('get');
                tour_lists('get');
            });

            $("#travel-update").click(function() {

                travelUpdate();
            });

            $("#travel-slider-add").click(function() {
                travelSliderAdd();
            });

            $(document).on('click', '.travel-tour-update', function(){

                var id = $(this).attr('title');

                $.ajax({
                    type: 'post',
                    url: '<?=$base_url?>ajax/travel/general/tourQuery.php',
                    dataType: 'json',
                    data: {
                        id      : id,
                        cover   : $("#travel-tour-cover"+id).val(),
                        title   : $("#travel-tour-title"+id).val(),
                        content : $("#travel-tour-content"+id).val(),
                        period  : $("#travel-tour-period"+id).val(),
                        price   : $("#travel-tour-price"+id).val(),
                        description : $("#travel-tour-description"+id).val(),
                    },
                    error: function(xhr) {},
                    success: function(response) {

                        var response = $.parseJSON(JSON.stringify(response));

                        if (response.status == true) {

                            Messenger().post({
                                message: "更動完成！",
                                type: "success",
                                showCloseButton: true,
                                hideAfter: 2
                            });
                        }
                    }
                });
            });

            $(document).on('click', '.travel-slider-remove', function(){

                var id = $(this).attr('title');
                $.ajax({
                    type: 'post',
                    url: '<?=$base_url?>ajax/travel/general/sliderRemove.php',
                    dataType: 'json',
                    data: {
                        id: id,
                    },
                    error: function(xhr) {},
                    success: function(response) {

                        var response = $.parseJSON(JSON.stringify(response));

                        if (response.status == true) {

                            Messenger().post({
                                message: "刪除完成！",
                                type: "success",
                                showCloseButton: true,
                                hideAfter: 2
                            });
                            $("#travel-slider-title-remove"+id).hide();
                            $("#travel-slider-content-remove"+id).hide();
                        }
                    }
                });
            });

            $(document).on('click', '.travel-slider-update', function() {

                var id = $(this).attr('title');
                $.ajax({
                    type: 'post',
                    url: '<?=$base_url?>ajax/travel/general/sliderUpdate.php',
                    dataType: 'json',
                    data: {
                        id: id,
                        slider_image: $("#travel-slider-image"+id).val(),
                        slider_title: $("#travel-slider-title"+id).val(),
                        slider_content: $("#travel-slider-description"+id).val(),
                    },
                    error: function(xhr) {},
                    success: function(response) {

                        var response = $.parseJSON(JSON.stringify(response));

                        if (response.status == true) {

                            Messenger().post({
                                message: "更新完成！",
                                type: "success",
                                showCloseButton: true,
                                hideAfter: 2
                            });
                        }
                    }
                });
            });


            function travelUpdate(action) {
                $.ajax({
                    type: 'post',
                    url: '<?=$base_url?>ajax/travel/general/Update.php',
                    dataType: 'json',
                    data: {
                        action: action,
                        title: $("#travel-title").val(),
                        current_new_title: $("#travel-current_new_title").val(),
                        current_new_content: $("#travel-current_new_content").val(),
                    },
                    error: function(xhr) {},
                    success: function(response) {

                        var response = $.parseJSON(JSON.stringify(response));

                        if (response.get_status == true) {

                            var res = response.result;
                            $("#travel-title").val(res.title);
                            $("#travel-current_new_title").val(res.current_new_title);
                            $("#travel-current_new_content").val(res.current_new_content);
                        } else if (response.status == true) {

                            Messenger().post({
                                message: "更新完成！",
                                type: "success",
                                showCloseButton: true,
                                hideAfter: 2
                            });
                        }
                    }
                });
            }

            // slider images
            function travelSliderUpdate(action) {

                $.ajax({
                    type: 'post',
                    url: '<?=$base_url?>ajax/travel/general/sliderUpdate.php',
                    dataType: 'json',
                    data: {
                        action: action,
                        slider_image: $("#travel-slider-image").val(),
                        slider_title: $("#travel-slider-title").val(),
                        slider_content: $("#travel-slider-description").val(),
                    },
                    error: function(xhr) {},
                    success: function(response) {

                        var response = $.parseJSON(JSON.stringify(response));

                        if (response.get_status == true) {

                            var res = response.result;

                            $.each(res, function(i) {

                                $("#travel-slider-images").append(
                                    '<div class="title" id="travel-slider-title-remove' + res[i].id + '">' +
                                    '<i class="dropdown icon"></i>' + res[i].title + '</div>' +
                                    '<div class="content" id="travel-slider-content-remove' + res[i].id + '">' +
                                    '<p class="transition visible" style="display: block !important;">' +
                                    '<div class="four wide column ui form">' +
                                    '<div class="field">' +
                                    '<label>圖片網址</label>' +
                                    '<input type="text" id="travel-slider-image' + res[i].id + '" value="' + res[i].image_url + '">' +
                                    '</div>' +
                                    '<div class="field">' +
                                    '<label>矚目標題</label>' +
                                    '<input type="text" id="travel-slider-title' + res[i].id + '" value="' + res[i].title + '">' +
                                    '</div>' +
                                    '<div class="field">' +
                                    '<label>描述文字</label>' +
                                    '<textarea id="travel-slider-description' + res[i].id + '">' + res[i].content + '</textarea>' +
                                    '</div>' +
                                    '</div>' +
                                    '<div class="ui segment basic">' +
                                    '<div class="ui buttons fluid">' +
                                    '<button class="ui button teal travel-slider-update" title="' + res[i].id + '" type="button">修改</button>' +
                                    '<button class="ui button red travel-slider-remove" title="' + res[i].id + '" type="button">刪除</button>' +
                                    '</div>' +
                                    '</div>' +
                                    '</p>' +
                                    '</div>'
                                );
                            });
                        }
                    }
                });
            }

            // slider add
            function travelSliderAdd() {

                var slider_image = $("#travel-slider-image-add").val();
                var slider_title = $("#travel-slider-title-add").val();
                var slider_description = $("#travel-slider-description-add").val();

                $.ajax({
                    type: 'post',
                    url: '<?=$base_url?>ajax/travel/general/sliderAdd.php',
                    dataType: 'json',
                    data: {
                        slider_image : slider_image,
                        slider_title : slider_title,
                        slider_description : slider_description
                    },
                    error: function(xhr) {},
                    success: function(response) {

                        var response = $.parseJSON(JSON.stringify(response));

                        if (response.status == true) {

                            Messenger().post({
                                message: "新增完成！",
                                type: "success",
                                showCloseButton: true,
                                hideAfter: 2
                            });

                            $("#travel-slider-images").append(
                                '<div class="title">' +
                                '<i class="dropdown icon"></i>' + slider_title + '</div>' +
                                '<div class="content">' +
                                '<p class="transition visible" style="display: block !important;">' +
                                '<div class="four wide column ui form">' +
                                '<div class="field">' +
                                '<label>圖片網址</label>' +
                                '<input type="text" id="travel-slider-image" value="' + slider_image + '">' +
                                '</div>' +
                                '<div class="field">' +
                                '<label>矚目標題</label>' +
                                '<input type="text" id="travel-slider-title" value="' + slider_title + '">' +
                                '</div>' +
                                '<div class="field">' +
                                '<label>描述文字</label>' +
                                '<textarea id="travel-slider-description">' + slider_description + '</textarea>' +
                                '</div>' +
                                '</div>' +
                                '<div class="ui segment basic">' +
                                '<div class="ui buttons fluid">' +
                                '<button class="ui button teal travel-slider-update" type="button">修改</button>' +
                                '<button class="ui button red travel-slider-remove" type="button">刪除</button>' +
                                '</div>' +
                                '</div>' +
                                '</p>' +
                                '</div>'
                            );

                            $("#travel-slider-images input, #travel-slider-images textarea").val('');
                        }
                    }
                });
            }

            // tour lists
            function tour_lists (action) {

                var id = $(this).attr('title');

                $.ajax({
                    type: 'post',
                    url: '<?=$base_url?>ajax/travel/general/tourQuery.php',
                    dataType: 'json',
                    data: {
                        id      : id,
                        action  : action,
                        cover   : $("#travel-tour-cover").val(),
                        title   : $("#travel-tour-title").val(),
                        content : $("#travel-tour-content").val(),
                        period  : $("#travel-tour-period").val(),
                        price   : $("#travel-tour-price").val(),
                        description : $("#travel-tour-description").val(),
                    },
                    error: function(xhr) {},
                    success: function(response) {

                        var response = $.parseJSON(JSON.stringify(response));

                        if (response.get_status == true) {

                            var res = response.result;

                            $.each(res, function(i) {

                                $("#travel-tour").append(

                                    '<div class="title">' +
                                        '<i class="add icon"></i>' + res[i].title +
                                    '</div>' +
                                    '<div class="content">' +
                                        '<p class="transition visible" style="display: block !important;">' +
                                            '<div class="four wide column ui form">' +
                                                '<div class="field">' +
                                                    '<label>封面</label>' +
                                                    '<input type="text" id="travel-tour-cover' + res[i].id + '" value="' + res[i].cover + '" placeholder="圖片網址">' +
                                                '</div>' +
                                                '<div class="field">' +
                                                    '<label>標題</label>' +
                                                    '<input type="text" id="travel-tour-title' + res[i].id + '" value="' + res[i].title + '">' +
                                                '</div>' +
                                                '<div class="field">' +
                                                    '<label>內容</label>' +
                                                    '<input type="text" id="travel-tour-content' + res[i].id + '" value="' + res[i].content + '" placeholder="簡述即可">' +
                                                '</div>' +
                                                '<div class="field">' +
                                                    '<label>期間</label>' +
                                                    '<input type="text" id="travel-tour-period' + res[i].id + '" value="' + res[i].period + '" placeholder="ex. 2017/03/07">' +
                                                '</div>' +
                                                '<div class="field">' +
                                                    '<label>價格</label>' +
                                                    '<input type="text" id="travel-tour-price' + res[i].id + '" value="' + res[i].price + '" placeholder="ex. 150000">' +
                                                '</div>' +
                                                '<div class="field">' +
                                                    '<label>內容描述</label>' +
                                                    '<textarea id="travel-tour-description' + res[i].id + '" placeholder="詳述">' + res[i].description + '</textarea>' +
                                                '</div>' +
                                            '</div>' +

                                            '<div class="ui buttons fluid">' +
                                                '<button class="ui button teal travel-tour-update" title="' + res[i].id + '" type="button">修改</button>' +
                                                '<button class="ui button red travel-tour-remove" title="' + res[i].id + '" type="button">刪除</button>' +
                                            '</div>' +
                                        '</p>' +
                                    '</div>'
                                );
                            });

                        }
                    }
                });
            }
        </script>

</body>

</html>
