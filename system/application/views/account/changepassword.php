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
			<h2>Enter your new password and verify the same.</h2>
			</div>
    	</div>
		<div id="right">
			<div class="box">
				<font color="red"><?=$e?></font>
				<h1>Change Password</h1>
            <?php echo form_open('accounts/changepassword'); ?>
            	<input type="hidden" name="issend" value="1">
                <div class="box" style="">
                    <label>
                        <span>new</span>
                        <input type="password" class="input_text" name="password" id="password" value="">
                    </label>
					 <label>
                        <span>verify</span>
                        <input type="password" class="input_text" name="verify_password" id="verify_password" value="">
                    </label>
                    <label>
                        <input type="submit" class="button" value="change password">
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