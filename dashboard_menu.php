<div class="ui secondary vertical pointing menu">
    <a class="item" href="dashboard.php"><i class="dashboard icon"></i>主控臺</a>
    <a class="item" href="member.php"><i class="user icon"></i>學員</a>
    <a class="item" href="postlist.php"><i class="bookmark icon"></i>文章</a>
    <a class="item" id="adv-management"><i class="image icon"></i>輪播</a>
    <a class="item" id="mc-management"><i class="calendar icon"></i>月曆</a>
    <a class="item" href="album.php"><i class="video icon"></i>影片</a>
</div>

<!-- 圖片輪播 -->
<div class="ui basic modal" id="adv-modal">
    <div class="ui icon header">
        <i class="image icon"></i>
        圖片輪播數量 (依照數字遞增)
    </div>
    <div class="content ui form">
        <div class="ui grid">
            <div class="five wide column centered">
                <div class="field">
                    <?php $adv_counts = $link->query("SELECT advcount FROM user LIMIT 1")->fetch_assoc(); ?>
                    <input type="number" id="adv-counts" value="<?=$adv_counts['advcount']?>" placeholder="請輸入阿拉伯數字">
                </div>
            </div>
        </div>
    </div>
    <div class="actions">
        <div class="ui red basic cancel inverted button">
            <i class="remove icon"></i>
            沒事
        </div>
        <a href="images/adv/see.php">
            <div class="ui blue basic inverted button">
                <i class="settings icon"></i>管理廣告
            </div>
        </a>
        <div class="ui green inverted button" id="adv-update">
            <i class="checkmark icon"></i>
            更新
        </div>
    </div>
</div>
<!-- 圖片輪播結束 -->

<!-- 月曆 -->
<div class="ui basic modal" id="mc-modal">
    <div class="ui icon header">
        <i class="calendar icon"></i>
        新增月曆
    </div>
    <div class="content">
        <div class="ui grid">
            <div class="five wide column centered">
                <form action="uppic.php" method="post" enctype="multipart/form-data" class="ui form">
                    <div class="field">
                        <input type="text" id="mc-date" name="mcname" placeholder="format : 201702">
                    </div>
                    <div class="field">
                        <input type="file" name="fileToUpload" id="fileToUpload">
                    </div>
                    <button class="ui green button" type="submit">上傳月曆</button>
                </form>
            </div>
        </div>
    </div>
    <div class="actions">
        <div class="ui red basic cancel inverted button">
            <i class="remove icon"></i>
            沒事
        </div>
        <a href="mc_manage.php">
            <div class="ui green basic cancel inverted button">
                <i class="settings icon"></i>
                月曆管理
            </div>
        </a>
    </div>
</div>
<!-- 月曆結束 -->

<script>
    $("#adv-management").click(function(){
        $('#adv-modal').modal('show');
    });

    $("#mc-management").click(function(){
        $('#mc-modal').modal('show');
    });

    $("#adv-update").click(function(){
        $.ajax({
            type: 'post',
            url: '<?=$base_url?>ajax/adv/update.php',
            dataType: 'json',
            data: {
                counts : $("#adv-counts").val(),
            },
            error: function (xhr) {
            },
            success: function (response) {

                var response = $.parseJSON(JSON.stringify(response));

                if (response.status == true) {

                    Messenger().post({
                        message: "更新成功，可以關閉視窗！",
                        type: "success",
                        showCloseButton: true,
                        hideAfter: 2
                    });
                }
                else{

                    Messenger().post({
                        message: "更新失敗或數字未更改！",
                        type: "error",
                        showCloseButton: true,
                        hideAfter: 2
                    });
                }
            }
        });
    });
</script>
