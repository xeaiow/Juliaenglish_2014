<?php session_start(); ?>
<?php
if(empty($_SESSION['nickname'])){

        echo '<meta http-equiv=REFRESH CONTENT=0;url=login.php>';
        exit();
    }
?>
<div>
    <form method="POST" action="addaction.php" role="form">
        <div class="form-group">
            <div class="input-group">
                <div class="input-group-addon"><span class="glyphicon glyphicon-user"></span></div>
                <input type="text" class="form-control" name="sname" placeholder="姓名">
            </div><br/>

            <div class="input-group">
                <div class="input-group-addon"><span class="glyphicon glyphicon-user"></span></div>
                <input type="text" class="form-control" name="sid" placeholder="學號" onblur="this.value = this.value.toUpperCase();">
            </div><br/>

            <div class="input-group">
                <div class="input-group-addon"><span class="glyphicon glyphicon-star"></span></div>
                <input type="text" class="form-control" name="pw" placeholder="密碼">
            </div><br/>

            <div class="input-group">
                <div class="input-group-addon"><span class="glyphicon glyphicon-star"></span></div>
                <input type="text" class="form-control" name="pw2" placeholder="確認密碼">
            </div>                                

            <div class="checkbox" style="margin-left:2px;font-size:18px;">
              <label>
                <input type="checkbox" value="1" name="e1" style="width:15px;height:15px;">
                高一菁英班 (二)
              </label>
            </div>

            <div class="checkbox" style="margin-left:2px;font-size:18px;">
              <label>
                <input type="checkbox" value="1" name="e1x" style="width:15px;height:15px;">
                高一資優班 (日)
              </label>
            </div>

            <div class="checkbox" style="margin-left:2px;font-size:18px;">
              <label>
                <input type="checkbox" value="1" name="e11" style="width:15px;height:15px;">
                高一先修班
              </label>
            </div>            
            
            <div class="checkbox" style="margin-left:2px;font-size:18px;">
              <label>
                <input type="checkbox" value="1" name="e2" style="width:15px;height:15px;">
                高二魔力寫作班
              </label>
            </div> 

            <div class="checkbox" style="margin-left:2px;font-size:18px;">
              <label>
                <input type="checkbox" value="1" name="e3" style="width:15px;height:15px;">
                高三資優衝刺模考班
              </label>
            </div> 

            <div class="checkbox" style="margin-left:2px;font-size:18px;">
              <label>
                <input type="checkbox" value="1" name="e4" style="width:15px;height:15px;">
                指考翻譯寫作班
              </label>
            </div> 

            <div class="checkbox" style="margin-left:2px;font-size:18px;">
              <label>
                <input type="checkbox" value="1" name="e5" style="width:15px;height:15px;">
                中級暨中高級英檢聽力班
              </label>
            </div>

            <div class="checkbox" style="margin-left:2px;font-size:18px;">
              <label>
                <input type="checkbox" value="1" name="e6" style="width:15px;height:15px;">
                PISA 英檢預備 A 班
              </label>
            </div> 

            <div class="checkbox" style="margin-left:2px;font-size:18px;">
              <label>
                <input type="checkbox" value="1" name="e7" style="width:15px;height:15px;">
                PISA 英檢預備 B 班
              </label>
            </div>

            <div class="checkbox" style="margin-left:2px;font-size:18px;">
              <label>
                <input type="checkbox" value="1" name="e8" style="width:15px;height:15px;">
                PISA 英檢初級班
              </label>
            </div> 

            <div class="checkbox" style="margin-left:2px;font-size:18px;">
              <label>
                <input type="checkbox" value="1" name="e9" style="width:15px;height:15px;">
                PISA 英檢文法衝刺班
              </label>
            </div>

            <div class="checkbox" style="margin-left:2px;font-size:18px;">
              <label>
                <input type="checkbox" value="1" name="e10" style="width:15px;height:15px;">
                PISA 英檢初級聽力班
              </label>
            </div>

            <div class="checkbox" style="margin-left:2px;font-size:18px;">
              <label>
                <input type="checkbox" value="1" name="e12" style="width:15px;height:15px;">
                PISA 菁英進階班
              </label>
            </div>                                                       
                          
        </div>

        <div style="text-align:center;">
            <input type="submit" value="新增" class="btn btn-info btn-lg">
        </div>
    </form><br/>
</div>