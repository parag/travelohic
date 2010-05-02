<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml"
      xmlns:fb="http://www.facebook.com/2008/fbml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
		<meta name="title" content="<?=$title?>" /> 
		<meta name="description" content="<?=$description?>" /> 
        <title><?=$title?></title>
        <link rel="stylesheet" type="text/css" href="<?=base_url()?>css/reset-fonts-grid.css">
        <link rel="stylesheet" type="text/css" href="<?=base_url()?>css/messagescreen.css">
    </head>
    <body>
    	<div id="left">
    		<div id="leftmsg">
    		<span id="logo">travelohic</span><h2> is a social utility to explore cool places and get best deals
			in the market to visit them whenever available. Would you like to know about <a href=#>wishlist</a>? </h2>
			<h1><a href=#>ready to explore?</a></h1>
			<h2>travelohic is currently in stealth mode</h2>
			</div>
    	</div>
		<div id="right">
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
			<br/><br/><br/>
			<h2>or</h2> <br/>
				<a href="<?php echo $fb_connect; ?>">
				<img src="http://static.ak.fbcdn.net/rsrc.php/zB6N8/hash/4li2k73z.gif">
				</a>
			</div>
		</div>
		<div id="menu">
            <ul>
                <li>
                    <a href="#">home</a>
                </li>
                <li>
                    <a href="#moods" id="openmoods">categories</a>
                </li>
				<?php
				if($a->isLogin())
					{
						echo "<li><a href='".site_url('accounts/editprofile')."'>settings</a></li>";
						echo "<li><a href='".site_url('accounts/logout')."' id='logout'>logout</a></li>";
					}
				else
				{
					echo "<li><a href='".site_url('accounts/login')."'>login</a></li>";
				}
				?>
            </ul>
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
		<div id="copyrights">copyrights &copy; travelohic.com</div>
    </body>
</html>
<script src="<?=base_url()?>js/jquery.min.js"></script>
<script src="<?=base_url()?>js/jquery-ui.min.js"></script>
<script src="<?=base_url()?>js/jquery.dotimeout.min.js"></script>
<script src="http://static.ak.fbcdn.net/connect.php/js/FB.Share" type="text/javascript"></script>
<script type="text/javascript">
	var show_moods = function(){
        if ($('div#moods').is(':visible')) {
            // do nothing
        }
        else {
            $("div#moods").show("slide", {
                direction: "right"
            }, 1000);
        }
    }
    
    var hide_moods = function(){
        if ($('div#moods').is(':visible')) {
            $("div#moods").hide("slide", {
                direction: "right"
            }, 1000);
        }
        else {
            // do nothign
        }
    }
	hide_moods();
	$("#openmoods").click(function(event){
        show_moods();
        event.preventDefault();
    });
    $("#closemoods").click(function(event){
        hide_moods();
        event.preventDefault();
    });
</script>