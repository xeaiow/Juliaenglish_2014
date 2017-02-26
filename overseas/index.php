<!DOCTYPE html>
<html lang="en">
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
         <link rel="stylesheet" type="text/css" href="css/style1.css" />
		<script type="text/javascript" src="js/modernizr.custom.53451.js"></script>
    </head>
    <body>
        <div class="container">

        <?php require 'index.html'; ?>

			<div><iframe width="560" height="315" src="https://www.youtube.com/embed/Jk7lEZ7zNlc" frameborder="100" allowfullscreen></iframe></div><br />

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