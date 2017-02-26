<?php session_start(); ?>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootswatch/3.3.5/flatly/bootstrap.min.css">
  <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
  <script src="js/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
<style type="text/css">
  table{
     table-layout:fixed;
     word-break:break-all;
     word-wrap:break-word;
     font-size: 15px;
  }
  input[type="checkbox"]{
    margin-left: 17px;
  }
</style>
<?php
if(empty($_SESSION['nickname'])){

        echo '<meta http-equiv=REFRESH CONTENT=0;url=login.php>';
        exit();
    }
?>
<!--功能選單-->
<nav class="navbar navbar-default" role="navigation">
  <div class="container-fluid">
      <!--學員資料-->
    <ul class="nav navbar-nav">
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-search"></i> 篩選學員</a>
          <ul class="dropdown-menu" role="menu">
            <li><a href="studentdate.php?e1=a1">高一菁英(二)</a></li>
            <li><a href="studentdate.php?e1x=b1">高一資優(日)</a></li>
            <li><a href="studentdate.php?e11=l1">高一先修班</a></li>
            <li><a href="studentdate.php?e2=c1">高二魔力寫作班</a></li>
            <li><a href="studentdate.php?e3=d1">高三資優衝刺模考班</a></li>
            <li><a href="studentdate.php?e6=g1">新聞閱讀搶修班</a></li>
            <li><a href="studentdate.php?e7=h1">PISA 英檢預備B班</a></li>
            <li><a href="studentdate.php?e8=i1">PISA 英檢初級班</a></li>
            <li><a href="studentdate.php?e9=j1">PISA 英檢文法衝刺班</a></li>
            <li><a href="studentdate.php?e10=k1">PISA 英檢初級聽力班</a></li>
            <li><a href="studentdate.php?e12=m1">PISA 菁英進階班</a></li>
            <li><a href="studentdate.php?e4=e1">指考翻譯寫作班</a></li>
            <li><a href="studentdate.php?e5=f1">中級暨中高級英檢聽力班</a></li>
          </ul>
        </li>
      </ul>

      <form class="navbar-form navbar-left" role="search">
        <div class="form-group">
          <input type="text" name="stdate" id="stdate" class="form-control" placeholder="輸入姓名 / 學號搜尋">
        </div>
        <button type="submit" id="search" name="search" class="btn btn-primary"><i class="fa fa-search"></i></button>
      </form>

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

<div class="alert alert-warning" role="alert">
  <div style="text-align:center;font-size:30px;">
  <?php
      require 'config/dbconfig.php';

      $url = substr($_SERVER['QUERY_STRING'],-2);
      $sql = "SELECT * FROM sd  WHERE (e1 = '$url' OR e1x = '$url' OR e2 = '$url' OR e3 = '$url' OR e4 = '$url' OR e5 = '$url' OR e6 = '$url' OR e7 = '$url' OR e8 = '$url' OR e9 = '$url' OR e10 = '$url' OR e11 = '$url' OR e12 = '$url') ORDER BY id DESC";
      $result = mysql_query($sql);
      $total  = mysql_num_rows($result);
      require 'curr_str.php'; ?>

      <?php echo "課程名稱：".$url0; ?>

      <span class="label label-primary" style="font-size:18px;margin-top:15px;"><?php echo "此學程有 ".$total." 位學生"; ?></span>
      <button class="btn btn-primary" data-toggle="modal" data-target="#about"><i class="fa fa-user-plus"></i></button>&nbsp;
      <button class="btn btn-primary" data-toggle="modal" data-target="#delete"><i class="fa fa-trash-o"></i></button>
  </div>
</div>

<table class="table">
      <th>姓名</th><th>資料</th><th>菁英(二)</th><th>資優(日)</th><th>高一先修</th><th>魔力寫作</th><th>高三模考</th><th>指考翻譯</th><th>中高英檢</th>
      <th>新聞閱讀</th><th>英檢B</th><th>英檢初級</th><th>英檢文法</th><th>英檢聽力</th><th>菁英進階</th><th></th>

<?php
while ($row = mysql_fetch_row($result)) { ?>
  <form class="form-inline" role="form" method="POST" action="update.php">
  <?php $total-=1; ?>
        <tr>
          <td>
          <? echo"$row[16]"; ?>
          </td>
        <td>
        <? echo "<a style=\"margin-left: 6px;font-size:20px;\" data-toggle=\"collapse\" data-target=\"#$total\" aria-expanded=\"false\" aria-controls=\"collapseExample\">";?>
          <i class="fa fa-external-link"></i>
        </a>
        <? echo "<div class=\"collapse\" id=".$total." style=\"margin-left: 6px;\">";?>
          <div class="well" style="width:200px;">
            <? echo "學號："."<input type=\"text\" class=\"form-control\" value=\"$row[1]\" style=\"width:110px;\" name=\"sid\" readonly>";?>
            <? echo "密碼："."<input type=\"text\" class=\"form-control\" value=\"$row[2]\" style=\"width:110px;\" name=\"pw\">";?><br/>
            <? echo "成就："."<input type=\"text\" class=\"form-control\" value=\"$row[17]\" style=\"width:110px;\" name=\"ach\">";?>
          </div>
        </td>
        <td>
          <? require 'datestr.php';
          echo $msg;?>
        </td>
        <td>
          <? echo $msg1;?>
        </td>
        <td>
          <? echo $msg11;?>
        </td>
        <td>
          <? echo $msg2;?>
        </td>
        <td>
          <? echo $msg3;?>
        </td>
        <td>
          <? echo $msg4;?>
        </td>
        <td>
          <? echo $msg5;?>
        </td>
        <td>
          <? echo $msg6;?>
        </td>
        <td>
          <? echo $msg7;?>
        </td>
        <td>
          <? echo $msg8;?>
        </td>
        <td>
          <? echo $msg9;?>
        </td>
        <td>
          <? echo $msg10;?>
        </td>
        <td>
          <? echo $msg12;?>
        </td>
        <td>
          <button type="submit" class="btn btn-primary"><i class="fa fa-floppy-o"></i></button>
        </td>
      </tr>
</form>
<?php
    } ?>
</table>



<!--新增-->
<div id="about" class="modal fade">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" align="center">新增學員</h4>
      </div>
      <div class="modal-body">
    <? require 'studentadd.php'; ?>
      </div>
    </div>
  </div>
</div>

<!--刪除-->
<div id="delete" class="modal fade">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" align="center">刪除學員</h4>
      </div>
      <div class="modal-body">
    <form method="POST" action="delete.php">
      <input type="text" name="did" placeholder="ex. A111" class="form-control"><br/>
      <input type="submit" class="btn btn-danger" value="除名">
    </form>
      </div>
    </div>
  </div>
</div>

<?php
    require 'config/dbconfig.php';
    $fid = $_GET['stdate'];
    if (isset($_GET['search']) == $fid) {
      if(preg_match("/[<>'-]/",$fid)){ ?>
        <script type="text/javascript">
          alert('請輸入正確學號！');
          history.go(-1);
        </script>
      <?  exit();
      }
      $query = "SELECT * FROM sd WHERE (sid = '$fid' OR sname = '$fid')";
      $sql = mysql_query($query);
      while ($row = mysql_fetch_array($sql)) { ?>
        <form class="form-inline" role="form" method="POST" action="update.php">
          <?php $total-=1; ?>
            <table class="table">
              <tbody>
                <tr>
                  <td>
                  <? echo"$row[16]"; ?>
                  </td>
                <td>
                <? echo "<button class=\"btn btn-primary\" style=\"margin-left: -6px;\" type=\"button\" data-toggle=\"collapse\" data-target=\"#$total\" aria-expanded=\"false\" aria-controls=\"collapseExample\">";?>
                  <i class="fa fa-external-link"></i>
                </button>
                <? echo "<div class=\"collapse\" id=".$total." style=\"margin-left: -6px;\">";?>
                  <div class="well" style="width:200px;">
                    <? echo "學號："."<input type=\"text\" class=\"form-control\" value=\"$row[1]\" style=\"width:110px;\" name=\"sid\" readonly>";?>
                    <? echo "密碼："."<input type=\"text\" class=\"form-control\" value=\"$row[2]\" style=\"width:110px;\" name=\"pw\">";?><br/>
                    <? echo "成就："."<input type=\"text\" class=\"form-control\" value=\"$row[17]\" style=\"width:110px;\" name=\"ach\">";?>
                  </div>
                </td>
                <td>
                  <? require 'datestr.php';
                  echo $msg;?>
                </td>
                <td>
                  <? echo $msg1;?>
                </td>
                <td>
                  <? echo $msg11;?>
                </td>
                <td>
                  <? echo $msg2;?>
                </td>
                <td>
                  <? echo $msg3;?>
                </td>
                <td>
                  <? echo $msg4;?>
                </td>
                <td>
                  <? echo $msg5;?>
                </td>
                <td>
                  <? echo $msg6;?>
                </td>
                <td>
                  <? echo $msg7;?>
                </td>
                <td>
                  <? echo $msg8;?>
                </td>
                <td>
                  <? echo $msg9;?>
                </td>
                <td>
                  <? echo $msg10;?>
                </td>
                <td>
                  <? echo $msg12;?>
                </td>
                <td>
                  <button type="submit" class="btn btn-success"><i class="fa fa-floppy-o"></i></button>
                </td>
              </tr>
            </tbody>
          </table>

        </form>
        <?php
            }
          }
          mysql_close($link);
?>
