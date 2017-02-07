<?php session_start();

	if(empty($_SESSION['nickname'])){

	        echo '<meta http-equiv=REFRESH CONTENT=0;url=login.php>';
	        exit();
	    }

		$arr1 = array(
			    'a1','b1','c1','d1','e1','f1',
			    'g1','h1','i1','j1','k1','l1','m1');

		$arr2 = array(
				'高一菁英班(二)','高一資優班(日)','高二魔力寫作班','高三資優衝刺模考班',
				'指考翻譯寫作班','中級暨中高級英檢聽力班','PISA 英檢預備A班',
				'PISA 英檢預備B班','PISA 英檢初級班','PISA 英檢文法衝刺班',
				'PISA 英檢初級聽力班','高一先修班','PISA 菁英進階班');

		$url0 = str_replace($arr1, $arr2, $url);
		$url1 = str_replace($arr1, $arr2, $url1);
		$url2 = str_replace($arr1, $arr2, $url2);
		$url3 = str_replace($arr1, $arr2, $url3);
		$url4 = str_replace($arr1, $arr2, $url4);
		$url5 = str_replace($arr1, $arr2, $url5);
		$url6 = str_replace($arr1, $arr2, $url6);
		$url7 = str_replace($arr1, $arr2, $url7);
		$url8 = str_replace($arr1, $arr2, $url8);
		$url9 = str_replace($arr1, $arr2, $url9);
		$url10 = str_replace($arr1, $arr2, $url10);	
		$url11 = str_replace($arr1, $arr2, $url11);
		$url12 = str_replace($arr1, $arr2, $url12);
?>