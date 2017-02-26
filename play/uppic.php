<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootswatch/3.3.4/flatly/bootstrap.min.css">
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>

<?php
//8位亂數密碼產生器
function generatorPassword($pt=8,$myWord=""){
    $password="";
    $str="0123456789abcdefghijklmnopqrstuvwxyz";
    $str.=$myWord;
    $str_len=strlen($str);
for ($i=1;$i<=$pt;$i++){
        $rg=rand()%$str_len;
        $password.=$str{$rg};
    }
return $password;
}

  $Random = generatorPassword();
?>
<?
  $size = $_FILES['upload_file']['size'];//取得檔案size大小
  $KB1 = ($size/1024); //size除1024
  $KB2 = round($KB1); //除後結果
//  echo "$KB2 <br>";   //為KB大小
?>
<?
  $filename = $_FILES['upload_file']['name']; //$filename =原始檔名
  $extend = strrchr($filename, ".");   //取得檔案的副檔名 abc.jpg 會成為 .jpg
  $fname = $Random.$extend ;         //目前時間.附檔名
?>
<?php

  $Move = 'mcpic/';

  $FILE_TYPES['JPG'] = true;
  $FILE_TYPES['JPEG'] = true;
  $FILE_TYPES['GIF'] = true;
  $FILE_TYPES['PNG'] = true;
  $FILE_SIZES['max'] = 2000000;
  $FILE_SIZES['min'] = 0;

  $stylehead="<b><font color=\"blue\">";
  $styletail="</font></b><br>";
  
  function inspect_file($strFileName, $intFileSize){

    $arrSm = split('[.]', $strFileName);
    $strEt = $arrSm[count($arrSm) - 1];

    if ($GLOBALS['FILE_TYPES'][strtoupper($strEt)] != true){
      return 1;
    }

    if ($intFileSize < $GLOBALS['FILE_SIZES']['min'] || $intFileSize > $GLOBALS['FILE_SIZES']['max']){
      return 2;
    }
 
    return 0;
 
  }

  $intInspectResult = inspect_file($HTTP_POST_FILES['upload_file']['name'], $HTTP_POST_FILES['upload_file']['size']);

  if ($intInspectResult == 1){
    echo "請上傳jpg,png,gif檔！";  
  }

  elseif ($intInspectResult == 2){
    echo "檔案太大，請壓縮後上傳！";
  }

  elseif ($intInspectResult == 0){
    
    if (!(move_uploaded_file($HTTP_POST_FILES['upload_file']['tmp_name'], $Move . $Upload_folder.$fname))){
      echo "檔案移動失敗，請重新上傳";
    }

    else{

      require 'config/dbconfig.php';
      $mcname = $_POST['mcname'];
      $mcurl = "http://".$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF'])."/".$Move.$fname;
      mysql_query("INSERT INTO mc (name,url) VALUES ('$mcname','$mcurl')");
      mysql_close($link);
      echo "<p class=\"bg-success\" style=\"text-align:center;font-size:40px;color:#FFF;\">檔案成功上傳！</p><br />";
      echo "<meta http-equiv=\"refresh\" content=\"1;url=add.php\">";
    }

  }

?>

<p class="bg-primary" style="text-align:center;"><img src="<?php echo "http://".$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF'])."/".$Move.$fname;?>" ></p>

