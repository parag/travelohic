<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <title><?=$title?></title>
        <link rel="stylesheet" type="text/css" href="<?=base_url()?>css/reset-fonts-grid.css">
        <link rel="stylesheet" type="text/css" href="<?=base_url()?>css/nicescreen.css">
    </head>
    <body>
        <img src="<?=base_url()?>images/bgs/<?=$photo?>" class="bg" />
		<div id="moving"><div id="moviecomments"></div></div>
		<div id="menu">
            <ul>
                <li>
                    welcome Parag!
                </li>
                <li>
                    <a href="#">home</a>
                </li>
                <li>
                    <a href="#moods" id="openmoods">categories</a>
                </li>
                <li>
                    <a href="#comments" id="openslidecomments">comments</a>
                </li>
				<li>
                    <a href="#similiar" id="opensimiliar">similiar</a>
                </li>
            </ul>
        </div>
        <div id="description">
            <span>travelohic.com</span>
            <h1><a href=#><?=$name?></a></h1>
            <div>
                <h2><?=$description?></h2>
            </div>
        </div>
        <div id="similiar">
            testing the related field
			<span id="close-similiar"><a href="#" id="closesimiliar"><img src="<?=base_url()?>/images/icons/close.png"></a></span>
        </div>
		<div id="moods" class="slide-right">
			<span class="close-slider"><a href="#" id="closemoods"><img src="<?=base_url()?>/images/icons/close.png"></a></span>
			<ul>
			<?php
			$cg = new Categorie();
			$cg->get();
			foreach($cg->all as $cat)
			{
				echo "<li class='slidelist'><a href=#>".strtolower($cat->name)."</a></li>";
			}
			?>
			</ul>
		</div>
        <div id="slidecomments" class="slide-right">
        	<span class="close-slider"><a href="#" id="closeslidecomments"><img src="<?=base_url()?>/images/icons/close.png"></a></span>
            <form method = "post" name="commentform" id="commentform">
            	<div class="smallbox">
            		<label>
		                <span>comment</span>
		                <br/>
		                <br/>
		                <textarea class="message" name="commentarea" id="commentarea"></textarea>
		                <br/>
		                <br/>
		                <input type="button" class="button" value="comment" id="commentbutton">
		            </label>
            	</div>
            </form>
			<div id="allcomments">
				<div id="content-slider"></div>
				<div id="content-scroll">
					<div id="content-holder"></div>
					</div>
				</div>
			</div>
        </div>
        <div id="leader">
            <form method="get" action="#">
                <div class="box">
                    <label>
                        <span>name</span>
                        <input type="text" class="input_text" name="name" id="name">
                    </label>
                    <label>
                        <span>email</span>
                        <input type="text" class="input_text" name="email" id="email">
                    </label>
                    <label>
                        <span>phone</span>
                        <input type="text" class="input_text" name="phone" id="email">
                    </label>
                    <label>
                        <span>country</span>
                        <input type="text" class="input_text" name="country" id="country">
                    </label>
                    <label>
                        <span>comment</span>
                        <br/>
                        <br/>
                        <textarea class="message" name="comment" id="comment"></textarea>
                        <br/>
                        <br/>
                        <input type="button" class="button" value="enquire" onclick="alert('test');">
                    </label>
                </div>
            </form>
        </div>
    </body>
</html><!-- time for some javascript-->
<script type="text/javascript">
	var comments = {
			num: <?=$commentsNum?>,
			comments: <?=$commentsStr?>
		};
	var campaign_id = '<?=$campaign_id?>';
</script>
<script src="<?=base_url()?>js/jquery.min.js"></script>
<script src="<?=base_url()?>js/jquery-ui.min.js"></script>
<script src="<?=base_url()?>js/jquery.dotimeout.min.js"></script>
<script src="<?=base_url()?>js/campano.js"></script>

