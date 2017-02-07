<?php session_start(); ?>
<?php
if(empty($_SESSION['nickname'])){

        echo '<meta http-equiv=REFRESH CONTENT=0;url=login.php>';
        exit();
    }

	$arr1 = array(
			    'l1','l0','a1','a0','b1','b0','c1','c0','d1','d0','e1','e0','f1','f0','g1','g0','h1','h0','i1','i0','j1','j0','k1','k0','m1','m0',);
			$arr2 = array(
				'<input type="checkbox" value="l1" name="sel11" checked>',
			    '<input type="checkbox" value="l1" name="sel11">',				
			    '<input type="checkbox" value="a1" name="sel1" checked>',
			    '<input type="checkbox" value="a1" name="sel1">',
			    '<input type="checkbox" value="b1" name="sel1x" checked>',
			    '<input type="checkbox" value="b1" name="sel1x">',
			    '<input type="checkbox" value="c1" name="sel2" checked>',
			    '<input type="checkbox" value="c1" name="sel2">',
			    '<input type="checkbox" value="d1" name="sel3" checked>',
			    '<input type="checkbox" value="d1" name="sel3">',
			    '<input type="checkbox" value="e1" name="sel4" checked>',
			    '<input type="checkbox" value="e1" name="sel4">',
			    '<input type="checkbox" value="f1" name="sel5" checked>',
			    '<input type="checkbox" value="f1" name="sel5">',
			    '<input type="checkbox" value="g1" name="sel6" checked>',
			    '<input type="checkbox" value="g1" name="sel6">',
			    '<input type="checkbox" value="h1" name="sel7" checked>',
			    '<input type="checkbox" value="h1" name="sel7">',
			    '<input type="checkbox" value="i1" name="sel8" checked>',
			    '<input type="checkbox" value="i1" name="sel8">',
			    '<input type="checkbox" value="j1" name="sel9" checked>',
			    '<input type="checkbox" value="j1" name="sel9">',
			    '<input type="checkbox" value="k1" name="sel10" checked>',
			    '<input type="checkbox" value="k1" name="sel10">',	
			    '<input type="checkbox" value="m1" name="sel12" checked>',
			    '<input type="checkbox" value="m1" name="sel12">',	
			    		    			    	    			    			    			    			    			    			    
			    );
			$msg = $row[3];
			$msg1 = $row[4];
			$msg2 = $row[5];
			$msg3 = $row[6];
			$msg4 = $row[7];
			$msg5 = $row[8];
			$msg6 = $row[9];
			$msg7 = $row[10];
			$msg8 = $row[11];
			$msg9 = $row[12];	
			$msg10 = $row[13];
			$msg11 = $row[14];					
			$msg12 = $row[15];
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