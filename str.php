<?php
if(empty($_SESSION['stlogin'])){

        echo '<meta http-equiv=REFRESH CONTENT=0;url=login.php>';
        exit();
    }

	$arr1 = array(
			    'a1','a0','b1','b0','c1','c0','d1','d0','e1','e0','f1','f0','g1','g0','h1','h0','i1','i0','j1','j0','k1','k0','l1','l0','m1','m0');
			$arr2 = array(
			    '<div class="ui mini image"><img src="images/icon/ok.png" style="width:32px;height:32px;"></div><a href="function/Grammar & Reading B/">高一菁英班(六)</a>',
			    '<div class="ui mini image"><img src="images/icon/item.png" style="width:32px;height:32px;"></div>高一菁英班(六)',
			    '<div class="ui mini image"><img src="images/icon/ok.png" style="width:32px;height:32px;"></div><a href="function/Grammar & Reading A/">高一資優班(日)</a>',
			    '<div class="ui mini image"><img src="images/icon/item.png" style="width:32px;height:32px;"></div>高一資優班(日)',
			    '<div class="ui mini image"><img src="images/icon/ok.png" style="width:32px;height:32px;"></div><a href="function/Translating &Writing/">高二魔力寫作班</a>',
			    '<div class="ui mini image"><img src="images/icon/item.png" style="width:32px;height:32px;"></div>高二魔力寫作班',
			    '<div class="ui mini image"><img src="images/icon/ok.png" style="width:32px;height:32px;"></div><a href="function/Senior CEEISC/">高三資優衝刺模考班</a>',
			    '<div class="ui mini image"><img src="images/icon/item.png" style="width:32px;height:32px;"></div>高三資優衝刺模考班',
			    '<div class="ui mini image"><img src="images/icon/ok.png" style="width:32px;height:32px;"></div><a href="function/Senior CEEISS/">指考翻譯寫作班</a>',
			    '<div class="ui mini image"><img src="images/icon/item.png" style="width:32px;height:32px;"></div>指考翻譯寫作班',
			    '<div class="ui mini image"><img src="images/icon/ok.png" style="width:32px;height:32px;"></div><a href="function/Listening & Vocabulary Senior/">中級暨中高級英檢聽力班</a>',
			    '<div class="ui mini image"><img src="images/icon/item.png" style="width:32px;height:32px;"></div>中級暨中高級英檢聽力班',
			    '<div class="ui mini image"><img src="images/icon/ok.png" style="width:32px;height:32px;"></div><a href="function/PISA A Class/">PISA 高中英文搶讀班</a>',
			    '<div class="ui mini image"><img src="images/icon/item.png" style="width:32px;height:32px;"></div>PISA 高中英文搶讀班',
			    '<div class="ui mini image"><img src="images/icon/ok.png" style="width:32px;height:32px;"></div><a href="function/PISA B Class/">PISA 英檢預備B班</a>',
			    '<div class="ui mini image"><img src="images/icon/item.png" style="width:32px;height:32px;"></div>PISA 英檢預備B班',
			    '<div class="ui mini image"><img src="images/icon/ok.png" style="width:32px;height:32px;"></div><a href="function/PISA Junior/">PISA 英檢初級班</a>',
			    '<div class="ui mini image"><img src="images/icon/item.png" style="width:32px;height:32px;"></div>PISA 英檢初級班',
			    '<div class="ui mini image"><img src="images/icon/ok.png" style="width:32px;height:32px;"></div><a href="function/PISA Senior/">PISA 英檢文法衝刺班</a>',
			    '<div class="ui mini image"><img src="images/icon/item.png" style="width:32px;height:32px;"></div>PISA 英檢文法衝刺班',
			    '<div class="ui mini image"><img src="images/icon/ok.png" style="width:32px;height:32px;"></div><a href="function/Listening & Vocabulary Junior/">PISA 英檢初級聽力班</a>',
			    '<div class="ui mini image"><img src="images/icon/item.png" style="width:32px;height:32px;"></div>PISA 英檢初級聽力班',
			    '<div class="ui mini image"><img src="images/icon/ok.png" style="width:32px;height:32px;"></div><a href="function/PRE-Grammar%20&%20Reading/">高一先修班</a>',
			    '<div class="ui mini image"><img src="images/icon/item.png" style="width:32px;height:32px;"></div>高一先修班',
			    '<div class="ui mini image"><img src="images/icon/ok.png" style="width:32px;height:32px;"></div><a href="function/PISA%20Elite%20Advanced/">PISA 菁英進階班</a>',
			    '<div class="ui mini image"><img src="images/icon/item.png" style="width:32px;height:32px;"></div>PISA 菁英進階班',
			    );
			$msg = $row['e1'];
			$msg1 = $row['e1x'];
			$msg2 = $row['e2'];
			$msg3 = $row['e3'];
			$msg4 = $row['e4'];
			$msg5 = $row['e5'];
			$msg6 = $row['e6'];
			$msg7 = $row['e7'];
			$msg8 = $row['e8'];
			$msg9 = $row['e9'];
			$msg10 = $row['e10'];
			$msg11 = $row['e11'];
			$msg12 = $row['e12'];
			$msg = str_replace($arr1, $arr2, $msg);
			$msg1 = str_replace($arr1, $arr2, $msg1);
			$msg2 = str_replace($arr1, $arr2, $msg2);
			$msg3 = str_replace($arr1, $arr2, $msg3);
			$msg4 = str_replace($arr1, $arr2, $msg4);
			$msg5 = str_replace($arr1, $arr2, $msg5);
			$msg6 = str_replace($arr1, $arr2, $msg6);
			$msg7 = str_replace($arr1, $arr2, $msg7);
			$msg8 = str_replace($arr1, $arr2, $msg8);
			$msg9 = str_replace($arr1, $arr2, $msg9);
			$msg10 = str_replace($arr1, $arr2, $msg10);
			$msg11 = str_replace($arr1, $arr2, $msg11);
			$msg12 = str_replace($arr1, $arr2, $msg12);
