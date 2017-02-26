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
    <title>學員資料 - 林錦英語教室</title>
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
                    <a class="item active" data-tab="first"><i class="search icon"></i>搜尋學員</a>
                    <a class="item" data-tab="second"><i class="users icon"></i>所有學員</a>
                    <a class="item" data-tab="third"><i class="add icon"></i>新增學員</a>
                </div>
                <div class="ui bottom attached tab segment active" data-tab="first">
                    <div class="ui form attached" id="find-container">
                        <div class="ui icon input fluid">
                            <input type="text" id="keywords" placeholder="輸入關鍵字 ex. 吳">
                            <i class="search icon"></i>
                        </div>
                    </div>
                    <table class="ui celled table" id="result">
                        <thead>
                            <tr>
                                <th>編號</th>
                                <th>姓名</th>
                                <th>操作</th>
                            </tr>
                        </thead>
                    </table>
                </div>
                <div class="ui bottom attached tab segment" data-tab="second">

                    <!-- <div class="ui segment basic">
                        施工中...
                    </div> -->
                    <div class="ui fluid multiple search selection dropdown">
                        <input type="hidden" id="filterResult">
                        <i class="dropdown icon"></i>
                        <div class="default text">選擇該課程學員</div>
                        <div class="menu">
                            <div class="item" data-value="a1">菁英(二)</div>
                            <div class="item" data-value="b1">資優(日)</div>
                            <div class="item" data-value="l1">高一先修</div>
                            <div class="item" data-value="c1">魔力寫作</div>
                            <div class="item" data-value="d1">高三模考</div>
                            <div class="item" data-value="e1">指考翻譯</div>
                            <div class="item" data-value="f1">中高英檢</div>
                            <div class="item" data-value="g1">新聞閱讀</div>
                            <div class="item" data-value="h1">英檢B</div>
                            <div class="item" data-value="i1">英檢初級</div>
                            <div class="item" data-value="j1">英檢文法</div>
                            <div class="item" data-value="k1">英檢聽力</div>
                            <div class="item" data-value="m1">菁英進階</div>
                        </div>
                    </div>

                    <button class="ui button blue fluid" id="filterMember" type="button">篩選</button>

                    <table class="ui celled table" id="filter-result">
                        <thead>
                            <tr>
                                <th>編號</th>
                                <th>姓名</th>
                                <th>操作</th>
                            </tr>
                        </thead>
                    </table>

                </div>
                <div class="ui bottom attached tab segment" data-tab="third">

                    <div class="four wide column ui form">
                        <div class="field">
                            <input type="text" placeholder="姓名" id="new-sname">
                        </div>
                        <div class="field">
                            <input type="text" placeholder="學號" id="new-sid">
                        </div>
                        <div class="field">
                            <input type="text" placeholder="密碼" id="new-pw">
                        </div>
                        <div class="field">
                            <input type="text" placeholder="確認密碼" id="new-ckpw">
                        </div>
                    </div>

                    <div class="ui relaxed divided list">
                        <div class="item">
                            <div class="ui checkbox">
                                <input type="checkbox" id="ne1">
                                <label>菁英(二)</label>
                            </div>
                        </div>
                    </div>
                    <div class="ui relaxed divided list">
                        <div class="item">
                            <div class="ui checkbox">
                                <input type="checkbox" id="ne1x">
                                <label>資優(日)</label>
                            </div>
                        </div>
                    </div>
                    <div class="ui relaxed divided list">
                        <div class="item">
                            <div class="ui checkbox">
                                <input type="checkbox" id="ne11">
                                <label>高一先修</label>
                            </div>
                        </div>
                    </div>
                    <div class="ui relaxed divided list">
                        <div class="item">
                            <div class="ui checkbox">
                                <input type="checkbox" id="ne2">
                                <label>魔力寫作</label>
                            </div>
                        </div>
                    </div>
                    <div class="ui relaxed divided list">
                        <div class="item">
                            <div class="ui checkbox">
                                <input type="checkbox" id="ne3">
                                <label>高三模考</label>
                            </div>
                        </div>
                    </div>
                    <div class="ui relaxed divided list">
                        <div class="item">
                            <div class="ui checkbox">
                                <input type="checkbox" id="ne4">
                                <label>指考翻譯</label>
                            </div>
                        </div>
                    </div>
                    <div class="ui relaxed divided list">
                        <div class="item">
                            <div class="ui checkbox">
                                <input type="checkbox" id="ne5">
                                <label>中高英檢</label>
                            </div>
                        </div>
                    </div>
                    <div class="ui relaxed divided list">
                        <div class="item">
                            <div class="ui checkbox">
                                <input type="checkbox" id="ne6">
                                <label>新聞閱讀</label>
                            </div>
                        </div>
                    </div>
                    <div class="ui relaxed divided list">
                        <div class="item">
                            <div class="ui checkbox">
                                <input type="checkbox" id="ne7">
                                <label>英檢B</label>
                            </div>
                        </div>
                    </div>
                    <div class="ui relaxed divided list">
                        <div class="item">
                            <div class="ui checkbox">
                                <input type="checkbox" id="ne8">
                                <label>英檢初級</label>
                            </div>
                        </div>
                    </div>
                    <div class="ui relaxed divided list">
                        <div class="item">
                            <div class="ui checkbox">
                                <input type="checkbox" id="ne9">
                                <label>英檢文法</label>
                            </div>
                        </div>
                    </div>
                    <div class="ui relaxed divided list">
                        <div class="item">
                            <div class="ui checkbox">
                                <input type="checkbox" id="ne10">
                                <label>英檢聽力</label>
                            </div>
                        </div>
                    </div>
                    <div class="ui relaxed divided list">
                        <div class="item">
                            <div class="ui checkbox">
                                <input type="checkbox" id="ne12">
                                <label>菁英進階</label>
                            </div>
                        </div>
                    </div>
                    <button class="ui button blue fluid" id="submitNewMember" type="button">加入</button>
                </div>
            </div>
        </div>
    </div>

    <!-- DetailModal -->
    <div class="ui fullscreen modal" id="detailmodal">
        <i class="close icon"></i>
        <div class="header" id="sname"></div>
        <div class="content ui form">
            <table class="ui table celled">
                <thead>
                    <tr>
                        <th>菁英(二)</th>
                        <th>資優(日)</th>
                        <th>高一先修</th>
                        <th>魔力寫作</th>
                        <th>高三模考</th>
                        <th>指考翻譯</th>
                        <th>中高英檢</th>
                        <th>新聞閱讀</th>
                        <th>英檢B</th>
                        <th>英檢初級</th>
                        <th>英檢文法</th>
                        <th>英檢聽力</th>
                        <th>菁英進階</th>
                    </tr>
                </thead>
                <tbody>
                    <tr id="courseSwitch">
                        <td>
                            <div class="ui toggle checkbox"><input type="checkbox" id="e1"><label></label></div>
                        </td>
                        <td>
                            <div class="ui toggle checkbox"><input type="checkbox" id="e1x"><label></label></div>
                        </td>
                        <td>
                            <div class="ui toggle checkbox"><input type="checkbox" id="e11"><label></label></div>
                        </td>
                        <td>
                            <div class="ui toggle checkbox"><input type="checkbox" id="e2"><label></label></div>
                        </td>
                        <td>
                            <div class="ui toggle checkbox"><input type="checkbox" id="e3"><label></label></div>
                        </td>
                        <td>
                            <div class="ui toggle checkbox"><input type="checkbox" id="e4"><label></label></div>
                        </td>
                        <td>
                            <div class="ui toggle checkbox"><input type="checkbox" id="e5"><label></label></div>
                        </td>
                        <td>
                            <div class="ui toggle checkbox"><input type="checkbox" id="e6"><label></label></div>
                        </td>
                        <td>
                            <div class="ui toggle checkbox"><input type="checkbox" id="e7"><label></label></div>
                        </td>
                        <td>
                            <div class="ui toggle checkbox"><input type="checkbox" id="e8"><label></label></div>
                        </td>
                        <td>
                            <div class="ui toggle checkbox"><input type="checkbox" id="e9"><label></label></div>
                        </td>
                        <td>
                            <div class="ui toggle checkbox"><input type="checkbox" id="e10"><label></label></div>
                        </td>
                        <td>
                            <div class="ui toggle checkbox"><input type="checkbox" id="e12"><label></label></div>
                        </td>
                    </tr>
                </tbody>
            </table>

        </div>
        <div class="actions">
            <div class="ui button blue" id="saveDetail">儲存</div>
            <div class="ui button" id="changePw">設定新密碼</div>
            <div class="ui button" id="removeMember">除名</div>
        </div>
    </div>
    <!-- DetailModalEnd -->

    <!-- ChangePwModal -->
    <div class="ui basic modal" id="changePwModal">
        <div class="ui icon header">
            <i class="hashtag icon"></i>
            忘記密碼嗎？設定一組新密碼吧！
        </div>
        <div class="ui grid ui form centered">
            <div class="four wide column">
                <div class="field">
                    <input type="text" placeholder="新密碼" id="pw">
                </div>
                <div class="field">
                    <input type="text" placeholder="確認新密碼" id="ckpw">
                </div>
                <button class="ui button blue fluid" id="submitChangePw" type="button">確定</button>
            </div>
        </div>
    </div>
    <!-- ChangePwModalEnd -->

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

        var focus_id;

        $("#keywords").keypress(function(e){

			code = (e.keyCode ? e.keyCode : e.which);
			if (code == 13) {
				find();
			}
		});

        $("#find").click(function(){
            find();
        });

        function find () {

            if ( $("#keywords").val() == '' ) {
                Messenger().post({
                    message: "請輸入關鍵字！",
                    type: "error",
                    showCloseButton: true,
                    hideAfter: 2
                });
                return false;
            }

            $("#result").show();
            $("#result, .countTitle").text('');

            $.ajax({
                type: 'post',
                url: '<?=$base_url?>ajax/member/find.php',
                dataType: 'json',
                data: {
                    keywords : $("#keywords").val(),
                },
                error: function (xhr) {

                },
                success: function (response) {

                	var response = $.parseJSON(JSON.stringify(response));

                    if (response.status == true) {

                        $("#find-container").after('<h4 class="ui header countTitle">共找到：<span>' + response.counts + '</span> 位學生</h4>');
                        $("#result").append(
                            '<thead>' +
                                '<tr class="center aligned">' +
                                    '<th>編號</th>' +
                                    '<th>姓名</th>' +
                                    '<th>操作</th>' +
                                '</tr>' +
                            '</thead>'
                        );

                        $.each(response.result, function(i) {
                            $("#result").append(
                                '<tbody>' +
                                    '<tr class="center aligned">' +
                                        '<td>' + response.result[i].sid + '</td>' +
                                        '<td>' + response.result[i].sname + '</td>' +
                                        '<td><button class="ui icon button basic" onclick="showDetail (' + response.result[i].id + ')"><i class="edit icon"></i></button></td>' +
                                    '</tr>' +
                                '</tbody>'
                            );
                        });
                        $("#keywords").val('');

                    }
                    else{

                        Messenger().post({
                            message: "沒有這個人！",
                            type: "error",
                            showCloseButton: true,
                            hideAfter: 2
                        });
                    }
                }
            });
        }


        function showDetail (id) {

            $('input:checkbox').prop('checked', false);
            $("#sname").text('');
            $.ajax({
                type: 'post',
                url: '<?=$base_url?>ajax/member/detail.php',
                dataType: 'json',
                data: {
                    id : id,
                },
                error: function (xhr) {
                },
                success: function (response) {

                    var response = $.parseJSON(JSON.stringify(response));

                    if (response.status == true) {

                        $("#sname").append('[ ' + response.result.sid + ' ' + response.result.sname + '] 的修課資訊');
                        ( response.result.e1 == "a1" ? $('#e1').prop("checked", true) : '' );
                        ( response.result.e1x == "b1" ? $('#e1x').prop("checked", true) : '' );
                        ( response.result.e11 == "l1" ? $('#e11').prop("checked", true) : '' );
                        ( response.result.e2 == "c1" ? $('#e2').prop("checked", true) : '' );
                        ( response.result.e3 == "d1" ? $('#e3').prop("checked", true) : '' );
                        ( response.result.e4 == "e1" ? $('#e4').prop("checked", true) : '' );
                        ( response.result.e5 == "f1" ? $('#e5').prop("checked", true) : '' );
                        ( response.result.e6 == "g1" ? $('#e6').prop("checked", true) : '' );
                        ( response.result.e7 == "h1" ? $('#e7').prop("checked", true) : '' );
                        ( response.result.e8 == "i1" ? $('#e8').prop("checked", true) : '' );
                        ( response.result.e9 == "j1" ? $('#e9').prop("checked", true) : '' );
                        ( response.result.e10 == "k1" ? $('#e10').prop("checked", true) : '' );
                        ( response.result.e12 == "m1" ? $('#e12').prop("checked", true) : '' );

                        focus_id = response.result.id;
                    }
                }
            });
            $('#detailmodal').modal({
                blurring: true,
                duration:200,
            }).modal('show');
        }

        $("#saveDetail").click(function(){

            $.ajax({
                type: 'post',
                url: '<?=$base_url?>ajax/member/savedetail.php',
                dataType: 'json',
                data: {
                    id   : focus_id,
                    e1   : ( $("#e1").is(":checked") ? 'a1' : 'a0' ),
                    e1x  : ( $("#e1x").is(":checked") ? 'b1' : 'b0' ),
                    e2   : ( $("#e2").is(":checked") ? 'c1' : 'c0' ),
                    e3   : ( $("#e3").is(":checked") ? 'd1' : 'd0' ),
                    e4   : ( $("#e4").is(":checked") ? 'e1' : 'e0' ),
                    e5   : ( $("#e5").is(":checked") ? 'f1' : 'f0' ),
                    e6   : ( $("#e6").is(":checked") ? 'g1' : 'g0' ),
                    e7   : ( $("#e7").is(":checked") ? 'h1' : 'h0' ),
                    e8   : ( $("#e8").is(":checked") ? 'i1' : 'i0' ),
                    e9   : ( $("#e9").is(":checked") ? 'j1' : 'j0' ),
                    e10  : ( $("#e10").is(":checked") ? 'k1' : 'k0' ),
                    e11  : ( $("#e11").is(":checked") ? 'l1' : 'l0' ),
                    e12  : ( $("#e12").is(":checked") ? 'm1' : 'm0' )
                },
                error: function (xhr) {
                },
                success: function (response) {

                    var response = $.parseJSON(JSON.stringify(response));

                    if (response.status == true) {

                        Messenger().post({
                            message: "儲存成功！",
                            type: "success",
                            showCloseButton: true,
                            hideAfter: 2
                        });
                    }
                    else {

                        Messenger().post({
                            message: "儲存失敗！",
                            type: "error",
                            showCloseButton: true,
                            hideAfter: 2
                        });
                    }
                }
            });
        });

        $("#changePw").click(function(){
            $("#changePwModal").modal('show');
        });

        $("#submitChangePw").click(function(){

            if ($("#pw").val() == $("#ckpw").val()) {

                $.ajax({
                    type: 'post',
                    url: '<?=$base_url?>ajax/member/changepw.php',
                    dataType: 'json',
                    data: {
                        id   : focus_id,
                        pw   : $("#pw").val()
                    },
                    error: function (xhr) {
                    },
                    success: function (response) {

                        var response = $.parseJSON(JSON.stringify(response));

                        if (response.status == true) {

                            Messenger().post({
                                message: "更改成功！",
                                type: "success",
                                showCloseButton: true,
                                hideAfter: 2
                            });
                            $("#pw").val('');
                            $("#ckpw").val('');
                        }
                        else {

                            Messenger().post({
                                message: "更改失敗或與原密碼相同！",
                                type: "error",
                                showCloseButton: true,
                                hideAfter: 2
                            });
                        }
                    }
                });
            }
        });

        $("#submitNewMember").click(function(){

            if ( ( $("#new-pw").val() == $("#new-ckpw").val() ) && $("#new-sid").val() && $("#new-sname").val() ) {

                $.ajax({
                    type: 'post',
                    url: '<?=$base_url?>ajax/member/newmember.php',
                    dataType: 'json',
                    data: {
                        sname   : $("#new-sname").val(),
                        sid     : $("#new-sid").val(),
                        pw      : $("#new-pw").val(),
                        ckpw    : $("#new-ckpw").val(),
                        ne1     : ( $("#ne1").is(":checked") ? 'a1' : 'a0' ),
                        ne1x    : ( $("#ne1x").is(":checked") ? 'b1' : 'b0' ),
                        ne2     : ( $("#ne2").is(":checked") ? 'c1' : 'c0' ),
                        ne3     : ( $("#ne3").is(":checked") ? 'd1' : 'd0' ),
                        ne4     : ( $("#ne4").is(":checked") ? 'e1' : 'e0' ),
                        ne5     : ( $("#ne5").is(":checked") ? 'f1' : 'f0' ),
                        ne6     : ( $("#ne6").is(":checked") ? 'g1' : 'g0' ),
                        ne7     : ( $("#ne7").is(":checked") ? 'h1' : 'h0' ),
                        ne8     : ( $("#ne8").is(":checked") ? 'i1' : 'i0' ),
                        ne9     : ( $("#ne9").is(":checked") ? 'j1' : 'j0' ),
                        ne10    : ( $("#ne10").is(":checked") ? 'k1' : 'k0' ),
                        ne11    : ( $("#ne11").is(":checked") ? 'l1' : 'l0' ),
                        ne12    : ( $("#ne12").is(":checked") ? 'm1' : 'm0' ),
                    },
                    error: function (xhr) {
                    },
                    success: function (response) {

                        var response = $.parseJSON(JSON.stringify(response));

                        if (response.status == true) {

                            Messenger().post({
                                message: "加入成功！",
                                type: "success",
                                showCloseButton: true,
                                hideAfter: 3
                            });
                            $("#new-sname, #new-sid, #new-pw, #new-ckpw").val('');
                            $('input:checkbox').prop('checked', false);
                        }
                        else if (response.counts == '1') {

                            Messenger().post({
                                message: "存在的帳號！",
                                type: "error",
                                showCloseButton: true,
                                hideAfter: 2
                            });
                        }
                        else {

                            Messenger().post({
                                message: "加入失敗！",
                                type: "error",
                                showCloseButton: true,
                                hideAfter: 2
                            });
                        }
                    }
                });
            }
            else{

                Messenger().post({
                    message: "密碼與確認密碼不符或有欄位未填寫！",
                    type: "error",
                    showCloseButton: true,
                    hideAfter: 2
                });
            }
        });

        $("#filterMember").click(function(){

            $.ajax({
                type: 'post',
                url: '<?=$base_url?>ajax/member/filtermember.php',
                dataType: 'json',
                data: {
                    filterresult : $("#filterResult").val(),
                },
                error: function (xhr) {
                },
                success: function (response) {

                    var response = $.parseJSON(JSON.stringify(response));

                    if (response.status == true) {

                        Messenger().post({
                            message: "篩選完成！",
                            type: "success",
                            showCloseButton: true,
                            hideAfter: 3
                        });


                        $("#filter-result, .filterCountTitle").text('');
                        $("#filter-result").show();
                        $("#filterMember").after('<h4 class="ui header filterCountTitle">共找到：<span>' + response.counts + '</span> 位學生</h4>');

                        $("#filter-result").append(
                            '<thead>' +
                                '<tr class="center aligned">' +
                                    '<th>編號</th>' +
                                    '<th>姓名</th>' +
                                    '<th>操作</th>' +
                                '</tr>' +
                            '</thead>'
                        )

                        $.each(response.result, function(i) {
                            $("#filter-result").append(
                                '<tbody>' +
                                    '<tr class="center aligned">' +
                                        '<td>' + response.result[i].sid + '</td>' +
                                        '<td>' + response.result[i].sname + '</td>' +
                                        '<td><button class="ui icon button basic" onclick="showDetail (' + response.result[i].id + ')"><i class="edit icon"></i></button></td>' +
                                    '</tr>' +
                                '</tbody>'
                            );
                        });
                    }
                    else {

                        Messenger().post({
                            message: "篩選失敗！",
                            type: "error",
                            showCloseButton: true,
                            hideAfter: 2
                        });
                    }
                }
            });
        });

        $("#removeMember").click(function(){

            $.ajax({
                type: 'post',
                url: '<?=$base_url?>ajax/member/removemember.php',
                dataType: 'json',
                data: {
                    id : focus_id,
                },
                error: function (xhr) {
                },
                success: function (response) {

                    var response = $.parseJSON(JSON.stringify(response));

                    if (response.status == true) {

                        Messenger().post({
                            message: "除名完成！",
                            type: "success",
                            showCloseButton: true,
                            hideAfter: 3
                        });
                        $("#detailmodal").modal('hide');
                        $("#result").text('');
                    }
                    else {

                        Messenger().post({
                            message: "除名失敗！",
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
