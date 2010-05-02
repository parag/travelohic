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
    		<span id="logo">travelohic</span>
			<h2>edit some important information about you here.</h2>
			</div>
    	</div>
		<div id="right">
			<div class="box">
				<font color="red"><?=$e?></font>
				<h1>Edit Profile</h1>
            <?php echo form_open('accounts/editprofile'); ?>
            	<input type="hidden" name="issend" value="1">
                <div class="box" style="">
                    <label>
                        <span>name</span>
                        <input type="text" class="input_text" name="name" id="name" value="<?=$a->name?>">
                    </label>
					 <label>
                        <span>mobile</span>
                        <input type="text" class="input_text" name="mobile" id="mobile" value="<?=$a->mobile?>">
                    </label>
					 <label>
                        <span>url</span>
                        <input type="text" class="input_text" name="url" id="url" value="<?=$a->url?>">
                    </label>
					<label>
                        <span>hometown</span>
                        <input type="text" class="input_text" name="fb_hometown" id="fb_hometown" value="<?=$a->fb_hometown?>">
                    </label>
                    <label>
                        <input type="submit" class="button" value="edit">
                    </label>
                </div>
            <?php echo form_close();?>
			</div>
		</div>
		<div id="menu">
            <ul>
                <li>
                    welcome
                </li>
                <li>
                    <a href="<?=site_url('welcome')?>">home</a>
                </li>
				 <li>
                    <a href="<?=site_url('accounts/editprofile')?>">edit profile</a>
                </li>
				 <li>
                    <a href="<?=site_url('accounts/updatephoto')?>">update photo</a>
                </li>
				 <li>
                    <a href="<?=site_url('accounts/changepassword')?>">change password</a>
                </li>
				<li>
                    <a href="<?=site_url('accounts/logout')?>">logout</a>
                </li>
            </ul>
        </div>
		
		<div id="copyrights">copyrights &copy; travelohic.com</div>
    </body>
</html>