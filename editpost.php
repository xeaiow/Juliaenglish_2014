<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootswatch/3.3.5/flatly/bootstrap.min.css">
  <script src="js/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="ckeditor/ckeditor.js" type="text/javascript"><!--mce:2--></script>
  <link rel="stylesheet" type="text/css" href="css/editpost.css"> 
  <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css"> 
  <title>編輯文章</title>
</head>
<body>

<?php
if(empty($_SESSION['nickname'])){

    echo '<meta http-equiv=REFRESH CONTENT=0;url=login.php>';
    exit();
} ?>


<!--功能選單-->
<nav class="navbar navbar-default" role="navigation">
  <div class="container-fluid">
      <ul class="nav navbar-nav navbar-right">
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-cog"></span> 操作 <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="add.php">管理介面</a></li>
            <li><a href="index.php">首頁</a></li>
            <li><a href="logout.php">登出</a></li>
          </ul>
        </li>
      </ul>

  </div>
</nav>

<div class="row">
  <div class="col-xs-7">

    <?php
        require 'config/dbconfig.php';
        $post = substr($_SERVER['QUERY_STRING'],3);
        $sql = "SELECT id,title,content,time FROM newinfo WHERE id = '$post'";
        $result = mysql_query($sql);
        while ($row = mysql_fetch_row($result)) {
    ?>

    <form class="form-inline" role="form" method="POST" action="editpost_finish.php">
      <div class="form-group">
        <div class="input-group">
          <div class="input-group-addon">文章標題</div>
          <? echo"<input type=\"text\" class=\"form-control\" value=\"$row[1]\" style=\"width:280px;\" name=\"title\">"; ?>
          <? echo"<input type=\"text\" class=\"hidden\" value=\"$row[0]\" style=\"width:180px;\" name=\"id\">"; ?>
        </div>  

        <div class="input-group">
          <div class="input-group-addon">發佈日期</div>
          <? echo"<input type=\"text\" class=\"form-control\" value=\"$row[3]\" style=\"width:177px;\" readonly>"; ?>
        </div><br/><br/>

        <div class="input-group">
          <? echo"<textarea type=\"text\" class=\"ckeditor\" name=\"content\">$row[2]</textarea>"; ?>
        </div>    

      </div><br/><br/>
      <div id="submit">
        <input type="submit" class="btn btn-primary btn-lg" value="更新">
      </div>
    </form>      
    <?
      }
    ?>

    
  </div>
  <div class="col-xs-5">
    
    <?php
      $querypost = "SELECT id,title,time FROM newinfo ORDER BY id DESC";
      $sqlpost = mysql_query($querypost);
    ?>
    <table class="table table-condensed">
          <tr>
            <th><i class="fa fa-file-o"></i> 文章標題</th>
            <th><i class="fa fa-calendar"></i> 發布日期</th>
            <th><i class="fa fa-wrench"></i> 編輯</th>
          </tr>
          <?php
            while ($row = mysql_fetch_array($sqlpost)) { ?>
            <tr>
                <td><? echo $row['title']; ?></td>
                <td><? echo $row['time']; ?></td>
                <td><a href="editpost.php?id=<? echo $row['id']; ?>"><i id="edit" class="fa fa-pencil-square-o"></i></a>
                    <a href="editdelete.php?id=<? echo $row['id']; ?>" onclick="return confirm('確定刪除?');"><i id="del" class="fa fa-trash-o"></i></a>
                    <hr /> 
                </td> 
            </tr>           
      <?  }
          mysql_close($link);
          ?>
      </table>

  </div>
</div>

</body>
</html>
 