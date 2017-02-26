<!DOCTYPE HTML>
<html data-ts-native>
	<head>
		<title>影片試看 - 林錦英語教室</title>
		<meta name="keywords" content="林錦,英語,補習班,中壢英文,英語教室,林錦英語,補習" />
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta property="og:image" content="http://juliaenglish.com/images/oversealogo201609.png">
		<meta property="og:image:width" content="591">
		<meta property="og:image:height" content="192">
		<meta property="article:author" content="http://juliaenglish.com">
		<meta name="author" content="林錦英語教室 - 林錦國際文創有限公司">
		<script src="play/js/jquery-2.0.3.min.js"></script>
		<script src="play/js/zoom.min.js"></script>
		<link rel="stylesheet" href="new_assets/style.css">
		<link rel="stylesheet" href="play/css/zoom.css" />
		<link rel="stylesheet" href="new_assets/tocas.css">
		<script src="new_assets/tocas.js"></script>
	</head>
	<body>

		<?php require 'navbar_article.php' ?>

       <div class="ts container" style="margin-top:30px;">
            <div class="ts grid">
                <div class="sixteen wide column">
                    <?php
                        $video_id = $_GET['id'];
                        $getPost = $link->query("SELECT title, content, time FROM newinfo WHERE id = '$video_id' LIMIT 1");
                        $postRow = $getPost->fetch_assoc();
                    ?>
                    <h3 class="ts center aligned header">
                        <i class="bookmark icon"></i><?=$postRow['title']?>
                    </h3>
                    <div class="ts heading slate">
                        <span class="description">
                            <?=nl2br($postRow['content'])?>
                        </span>
                    </div>
                </div>
            </div>
       </div>

       <div class="ts grid center aligned" id="about">
		    <div class="five wide column">
				<a href="about.php"><h1 class="ts header center aligned"><i class="at icon"></i> 關於林錦</h1></a>
			</div>
		    <div class="five wide column">
				<a href="nmc.php"><h1 class="ts header center aligned"><i class="calendar icon"></i> 重要日程</h1></a>
			</div>
		    <div class="five wide column">
				<a href="https://www.facebook.com/juliaenglish2005"><h1 class="ts header center aligned"><i class="facebook icon"></i> 粉絲專頁</h1></a>
			</div>
		</div>

		<div class="ts grid centered" id="maps">
		    <div class="five wide column">
				<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d537.7171373719649!2d121.2258101837733!3d24.955384827626602!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3468224848068aeb%3A0xbdec52f711da666b!2zMzIw5qGD5ZyS5biC5Lit5aOi5Y2A5Lit5bGx6LevMTAw6Jmf!5e0!3m2!1szh-TW!2stw!4v1484379770593" width="400" height="300" frameborder="0" style="border:0" allowfullscreen></iframe>
			</div>
			<div class="eight wide column">
				<div class="ts large list" id="content">
					<div class="item"><i class="map pin icon"></i> &nbsp;&nbsp;桃園市中壢區中山路100號7樓 (光南樓上)</div>
					<div class="item"><i class="phone icon"></i> &nbsp;&nbsp;03-4255189</div>
					<div class="item"><i class="alarm outline icon"></i> &nbsp;&nbsp;營業時間：星期(二) - (五) 3:30PM-10:00PM；(六) 12：30PM~10:00PM；(日) 8：30AM~10：00PM</div>
					<div class="item"><a href="dashboard.php"><i class="toggle on icon"></i></a></div>
				</div>
			</div>
		</div>

		<script>
		    ts('.ts.dropdown:not(.basic)').dropdown();
		</script>
		<script src="play/js/zoom.min.js"></script>
		<script type="text/javascript">
			(function(d,s,id){var z=d.createElement(s);z.type="text/javascript";z.id=id;z.async=true;z.src="//static.zotabox.com/d/0/d0f921f9abc61a9e02437f8d7fd377a9/widgets.js";var sz=d.getElementsByTagName(s)[0];sz.parentNode.insertBefore(z,sz)}(document,"script","zb-embed-code"));
		</script>
	</body>
</html>
