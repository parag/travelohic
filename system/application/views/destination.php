<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml"
      xmlns:fb="http://www.facebook.com/2008/fbml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
		<meta property="og:title" content="<?=$title?>"/>
    	<meta property="og:site_name" content="travelohic.com"/>
    	<meta property="og:image" content="<?=base_url()?>images/bgsmall/<?=$photo?>"/>
		<meta property="og:url" content="<?=$currUrl?>"/>
		<meta property="fb:app_id" content="<?=FBAPPID?>"/>
		<meta property="og:description"
          content="<?=$description?>"/>
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
                    <?php
					if($a->isLogin())
					{
						echo "welcome ".$a->name;
					}
					else
					{
						echo "<li><a href='#openlogin' id='openlogin'>login</a></li>";
						echo "<li><a href='#openregister' id='openregister'>register</a></li>";
					}
					?>
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
				<?php
				if($a->isLogin())
					{
						echo "<li><a href='".site_url('accounts/editprofile')."'>settings</a></li>";
						echo "<li><a href='".site_url('accounts/logout')."' id='logout'>logout</a></li>";
					}
				?>
				<li id="status">
					loading...
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
            <div style="left:5px;position:absolute;width:50%">
				<?php
				foreach($carr1 as $campaign)
				{
					echo $campaign->name;
					echo "<br/>";
				}
				?>
			</div>
			<div style="right:5px;position:absolute;width:50%">
				<?php
				foreach($carr2 as $campaign)
				{
					echo $campaign->name;
					echo "<br/>";
				}
				?>
			</div>
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
			<?php
			if($a->isLogin())
			{
			?>
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
			<?php
			}
			else
				echo "Please Login to comment."
			?>
			<div id="allcomments">
				<div id="content-slider"></div>
				<div id="content-scroll">
					<div id="content-holder"></div>
					</div>
				</div>
			</div>
        </div>
        <div id="leader">
            <iframe src="http://www.facebook.com/plugins/like.php?href=<?=$cleanUrl?>&amp;layout=standard&amp;show_faces=true&amp;width=279&amp;width=100&amp;action=like&amp;font=lucida+grande&amp;colorscheme=dark" scrolling="no" frameborder="0" allowTransparency="true" style="border:none; overflow:hidden; width:279px; height:px"></iframe>
			<?
			if($a->isLogin())
			{
			?>
			<div id="wishlist">
				<div class="box">
				<input type="button" class="button" value="add to wishlist" id="wishlistbutton"><br/>
				<small><a href="#">Learn more about wishlist</a></small>
				</div>
			</div>
			<?
			}
			else
			{
			?>
			<div id="wishlist">
				<div class="box">
				<input type="button" class="button" value="login" id="wishlist-login"><br/>
				<small>Login to add to wishlist.<a href="#"> Learn more about wishlist</a></small><br/>
				<h2>OR</h2><br/>
				<a href="<?php echo $fb_connect; ?>">
				<img src="http://static.ak.fbcdn.net/rsrc.php/zB6N8/hash/4li2k73z.gif">
				</a>
				</div>
			</div>
			<?
			}
			?>
			
        </div>
		<div id="loginwindow" class="leftwindow">
			<div class="box">
				<form method="post" action="<?=site_url('accounts/login')?>">
					<input type="hidden" value="1" name="issend">
					<span class="close-left"><a href="#" id="closelogin"><img src="<?=base_url()?>/images/icons/close.png"></a></span>
		            <label>
		                <span>email</span>
		                <input type="text" class="input_text" name="email" id="email">
		            </label>
		            <label>
		                <span>password</span>
		                <input type="password" class="input_text" name="password" id="password">
		            </label>
					<label>
						<input type="submit" class="button" value="login">
					</label>
				</form>
				<br/>
				<h2>or</h2> <br/>
				<a href="<?php echo $fb_connect; ?>">
				<img src="http://static.ak.fbcdn.net/rsrc.php/zB6N8/hash/4li2k73z.gif">
				</a>
			</div>
		</div>
		<div id="registerwindow" class="leftwindow">
			<div class="box">
				<?php echo form_open_multipart('accounts/signup'); ?>
            	<input type="hidden" name="issend" value="1">
                <div class="box" style="">
                    <label>
                        <span>name</span>
                        <input type="text" class="input_text" name="name" id="name">
                    </label>
                     <label>
                        <span>email</span>
                        <input type="text" class="input_text" name="email" id="email">
                    </label>
					 <label>
                        <span>password</span>
                        <input type="password" class="input_text" name="password" id="password">
                    </label>
					 <label>
                        <span>mobile</span>
                        <input type="text" class="input_text" name="mobile" id="mobile">
                    </label>
                    <label>
                        <input type="submit" class="button" value="register">
                    </label>
                </div>
            <?php echo form_close();?>
			<br/>
			<h2>or</h2> <br/>
				<a href="<?php echo $fb_connect; ?>">
				<img src="http://static.ak.fbcdn.net/rsrc.php/zB6N8/hash/4li2k73z.gif">
				</a>
			</div>
		</div>
    </body>
</html><!-- time for some javascript-->
<script type="text/javascript">
	var comments = {
			num: <?=$commentsNum?>,
			comments: <?=$commentsStr?>
		};
	var campaign_id = '<?=$campaign_id?>';
	var base_url = '<?=base_url()?>index.php/';
	var user_id = '<?=$a->id?>';
</script>
<script src="<?=base_url()?>js/jquery.min.js"></script>
<script src="<?=base_url()?>js/jquery-ui.min.js"></script>
<script src="<?=base_url()?>js/jquery.dotimeout.min.js"></script>
<script src="<?=base_url()?>js/campano.js"></script>

