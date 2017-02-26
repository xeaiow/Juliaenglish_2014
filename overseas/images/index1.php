<!DOCTYPE html>
<html>

    <head>
		<meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
        <title>林錦英語教室 - 海外英文課程</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
        <meta name="description" content="3D Gallery with CSS3 and jQuery" />
        <meta name="keywords" content="3d, gallery, jquery, css3, auto, slideshow, navigate, mouse scroll, perspective" />
        <meta name="author" content="Codrops" />
        <link rel="stylesheet" type="text/css" href="css/demo.css" />
        <link rel="stylesheet" type="text/css" href="css/style.css" />
		<script type="text/javascript" src="js/modernizr.custom.53451.js"></script>
		<style>
	<ul class="drop-down-menu">
        <li><a href="#">關於我們</a>
        </li>
        <li><a href="#">Magento</a>
        </li>
        <li><a href="#">服務項目</a>
        </li>
        <li><a href="#">專案介紹</a>
        </li>
        <li><a href="#">資訊分享</a>
        </li>
        <li><a href="#">聯絡我們</a>
        </li>
    </ul>
    ul { /* 取消ul預設的內縮及樣式 */
        margin: 0;
        padding: 0;
        list-style: none;
    }

    ul.drop-down-menu {
        border: #ccc 1px solid;
        display: inline-block;
        font-family: 'Open Sans', Arial, sans-serif;
        font-size: 13px;
    }

    ul.drop-down-menu li {
        position: relative;
        white-space: nowrap;
        border-right: #ccc 1px solid;
    }

    ul.drop-down-menu > li:last-child {
        border-right: none;
    }

    ul.drop-down-menu > li {
        float: left; /* 只有第一層是靠左對齊*/
    }

     ul.drop-down-menu a {
        background-color: #fff;
        color: #333;
        display: block;
        padding: 0 30px;
        text-decoration: none;
        line-height: 40px;

    }
    ul.drop-down-menu a:hover { /* 滑鼠滑入按鈕變色*/
        background-color: #ef5c28;
        color: #fff;
    }
    ul.drop-down-menu li:hover > a { /* 滑鼠移入次選單上層按鈕保持變色*/
        background-color: #ef5c28;
        color: #fff;
    }
    <li><a href="#">關於我們</a>
            <ul>
                <li><a href="#">服務據點</a>
                </li>
                <li><a href="#">服務客戶</a>
                </li>
                <li><a href="#">服務地區</a>
                </li>
                <li><a href="#">徵才資訊</a>
                </li>
            </ul>
        </li>
    <ul class="drop-down-menu">
        <li><a href="#">關於我們</a>
            <ul>
                <li><a href="#">服務據點</a>
                </li>
                <li><a href="#">服務客戶</a>
                </li>
                <li><a href="#">服務地區</a>
                </li>
                <li><a href="#">徵才資訊</a>
                </li>
            </ul>
        </li>
        <li><a href="#">Magento</a>
        </li>
        <li><a href="#">服務項目</a>
            <ul>
                <li><a href="#">系統整合</a>
                    <ul>
                        <li><a href="#">Magento與POS訂單系統整合</a>
                        </li>
                        <li><a href="#">Magento與CRM客戶管理系統整合</a>
                        </li>
                        <li><a href="#">Magento與ERP管理系統整合</a>
                        </li>
                        <li><a href="#">Magento金流串接服務</a>
                        </li>
                    </ul>

                </li>
                <li><a href="#">專業網頁設計</a>
                    <ul>
                        <li><a href="#">響應式網頁設計 (Responsive Web Design)</a>
                        </li>
                        <li><a href="#">手機網站設計</a>
                        </li>
                        <li><a href="#">WordPress 網頁設計</a>
                        </li>
                    </ul>
                </li>
                <li><a href="#">網路行銷服務</a>
                    <ul>
                        <li><a href="#">Amazon亞馬遜網路商城</a>
                        </li>
                        <li><a href="#">社群媒體行銷</a>
                        </li>
                        <li><a href="#">SEO 搜尋引擎優化</a>
                            <ul>
                                <li><a href="#">在地SEO</a>
                                </li>
                                <li><a href="#">SEO 搜尋引擎優化</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <li><a href="#">網站客製開發</a>
                </li>
            </ul>
        </li>
        <li><a href="#">專案介紹</a>
        </li>
        <li><a href="#">資訊分享</a>
        </li>
        <li><a href="#">聯絡我們</a>
        </li>
    	</ul>
   	 ul.drop-down-menu ul {
        border: #ccc 1px solid;
        position: absolute;
        z-index: 99;
        left: -1px;
        top: 100%;
       min-width: 180px;
   	 }

    	ul.drop-down-menu ul li {
        border-bottom: #ccc 1px solid;
  	  }

    	ul.drop-down-menu ul li:last-child {
        border-bottom: none;
   	 }

    	ul.drop-down-menu ul ul { /*第三層以後的選單出現位置與第二層不同*/
        z-index: 999;
        top: 10px;
  	      left: 90%;
    	}
   	 ul.drop-down-menu ul { /*隱藏次選單*/
        display: none;
   	 }

   	 ul.drop-down-menu li:hover > ul { /* 滑鼠滑入展開次選單*/
        display: block;
   	 	}
	

	
    	</head>
		</style>
    <body>
        <div class="container">

			<header>
				<h1>林錦英語教室 <span>海外英文課程</span></h1>
				<nav class="codrops-demos">
					<a class="current-demo" href="http://juliaenglish.com">回首頁</a>
					<a href="http://juliaenglish.com/aboutteacher.php">關於林錦老師</a>
					<a href="https://www.facebook.com/juliaenglish2005">粉絲專頁</a>
				</nav>
			</header>

			<div class="wrapper style1">
			
		
		


			<div><iframe width="560" height="315" src="https://www.youtube.com/embed/Jk7lEZ7zNlc" frameborder="0" allowfullscreen></iframe></div><br />

			<section id="dg-container" class="dg-container">
				<div class="dg-wrapper">
				<?php
					for ($i = 1; $i <= 4; $i++) {

						echo '<a href="#"><img src="images/'.$i.'.jpg" alt="image'.$i.'"></a>';

					}
					
				?>
				</div>
				<nav>	
					<span class="dg-prev">&lt;</span>
					<span class="dg-next">&gt;</span>
				</nav>
			</section>
        </div>
		<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
		<script type="text/javascript" src="js/jquery.gallery.js"></script>
		<script type="text/javascript">
			$(function() {
				$('#dg-container').gallery();
			});
		</script/>
    </body>
</html>