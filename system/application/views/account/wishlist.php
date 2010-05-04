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
	    		<ul id="grid">
	<?
	$w = new Wishe();
	$w->where('user_id', $user_id)->get();
	$count = 0;
	foreach($w->all as $wish)
	{
		$c = new Campaign();
		$c->where('id', $wish->campaign_id)->get();
		$pic = base_url()."images/bgsmall/".$c->photo;
		echo "<li><img src=\"".$pic."\"/></li>";
		$count++;
	}
	?>
	</ul>
	<?
	if($count==0)
		echo "No destination added in wishlist yet.";
	else
		echo "Click on destination to add to your wishlist.";
	?>
				</ul>
			</div>
    	</div>
		<div id="right">
			<div class="box">
				<font color="red"><?=$e?></font>
				<h1>Login</h2>
            <?php echo form_open_multipart('accounts/login'); ?>
            	<input type="hidden" name="issend" value="1">
                <div class="box" style="">
                     <label>
                        <span>email</span>
                        <input type="text" class="input_text" name="email" id="email">
                    </label>
					 <label>
                        <span>password</span>
                        <input type="password" class="input_text" name="password" id="password">
                    </label>
					<span><a href="<?=site_url('accounts/forgot_password')?>">forgot password?</a></span>
                    <label>
                        <input type="submit" class="button" value="login">
                    </label>
                </div>
            <?php echo form_close();?>
			</div>
			
		</div>
		<div id="menu">
            <ul>
                <li>
                    <a href="#">home</a>
                </li>
				
            </ul>
        </div>
		
		<div id="copyrights">copyrights &copy; travelohic.com</div>
    </body>
</html>