<?php session_start(); ?>
<!DOCTYPE html>
<html lang="zh-tw">
<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/bootstrap-theme.min.css">
  <script src="js/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="//code.jquery.com/jquery-1.11.2.min.js"></script>
  <script src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
  <script src="ckeditor/ckeditor.js" type="text/javascript"><!--mce:2--></script>
  <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css"> 
  <link rel="stylesheet" type="text/css" href="css/editpost.css">  
  <title>編輯影片</title>
</head>
<body>

<?php
if(empty($_SESSION['nickname'])){

    echo '<meta http-equiv=REFRESH CONTENT=0;url=login.php>';
    exit();
} ?>

<div class="row">
  <div class="col-xs-6">

    <?php
        require 'config/dbconfig.php';
        $post = substr($_SERVER['QUERY_STRING'],3);
        $sql = "SELECT id,title,content,time,class FROM video WHERE id = '$post'";
        $result = mysql_query($sql);
        while ($row = mysql_fetch_row($result)) {
    ?>

    <form class="form-inline" role="form" method="POST" action="editvideo_finish.php">
      <div class="form-group">
        <div class="input-group">
          <div class="input-group-addon">影片標題</div>
          <? echo"<input type=\"text\" class=\"form-control\" value=\"$row[1]\" style=\"width:180px;\" name=\"title\">"; ?>
          <? echo"<input type=\"text\" class=\"hidden\" value=\"$row[0]\" style=\"width:180px;\" name=\"id\">"; ?>
        </div>  

        <div class="input-group">
          <div class="input-group-addon">發佈日期</div>
          <? echo"<input type=\"text\" class=\"form-control\" value=\"$row[3]\" style=\"width:125px;\" readonly>"; ?>
        </div><br/><br/>      

        <div class="input-group">
          <? echo"<textarea type=\"text\" class=\"ckeditor\" name=\"content\">$row[2]</textarea>"; ?>
        </div>    

      </div><br/><br/>
      <div id="submit">
        <input type="submit" class="btn btn-primary btn-lg" value="更改">
        <input type="button" class="btn btn-success btn-lg" value="返回" onclick="javascript:location.href='add.php'">
      </div>
    </form>      
    <?
      }
    ?>
    
  </div>
  <div class="col-xs-6">
    
    <?php
      $querypost = "SELECT id,title,class,time FROM video ORDER BY id DESC";
      $sqlpost = mysql_query($querypost);
    ?>
    <table class="table table-condensed">
        <thead>
          <tr>
            <th><i class="fa fa-file-o"></i> 影片標題</th>
            <th><i class="fa fa-calendar"></i> 發布日期</th>
            <th><i class="fa fa-bookmark-o"></i> 分類</th>
            <th><i class="fa fa-wrench"></i> 編輯</th>
          </tr>
        </thead>
        <tbody>
          <?php
            while ($row = mysql_fetch_array($sqlpost)) { ?>
            <tr>
                <td><? echo $row['title']; ?></td>
                <td><? echo $row['time']; ?></td>
                <?php
                  $vn1 = array('e10','e11','e12','e1x','quota','e1','e2','e3','e4','e5','e6','e7','e8','e9',);
                  $vn2 = array('PISA 英檢聽力','高一先修','PISA 菁英進階','高一資優(日)','林錦語錄','高一菁英(二)','高二魔力作文','高三資優衝刺','指考翻譯寫作','中級暨中高級英檢聽力','PISA 英檢預備A','PISA 英檢預備B','PISA 英檢初級','PISA 英檢文法衝刺',);
                  $vn  = $row['class'];
                  $vn  = str_replace($vn1, $vn2, $row['class']);
                ?>
                <td><? echo $vn; ?></td>
                <td><a href="editvideo.php?id=<? echo $row['id']; ?>"><i id="edit" class="fa fa-pencil-square-o"></i></a>
                    <a href="editdelete2.php?id=<? echo $row['id']; ?>" onclick="return confirm('確定刪除?');"><i id="del" class="fa fa-trash-o"></i></a>
                </td> 
              </tr>             
      <?  }
          mysql_close($link);
          ?>
        </tbody>
      </table>

  </div>
</div>

</body>
</html>
 