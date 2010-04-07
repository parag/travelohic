<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <title>Change Password</title>
        <link rel="stylesheet" type="text/css" href="<?=base_url()?>css/reset-fonts-grid.css">
        <link rel="stylesheet" type="text/css" href="<?=base_url()?>css/smallscreen.css">
    </head>
    <body>
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
            </ul>
    	</div>
        <div id="description">
            <span>travelohic.com</span>
            <h1><a href=#>Change Password</a></h1>
            <div>
                <h2><font color="red"><?=$e?></font> </h2>
            </div>
        </div>
        <div id="form">
            <?php echo form_open_multipart('accounts/changepassword'); ?>
            	<input type="hidden" name="issend" value="1">
                <div class="box" style="">
                    <label>
                        <span>new password</span>
                        <input type="password" class="input_text" name="password" id="password" value="">
                    </label>
					 <label>
                        <span>verify password</span>
                        <input type="password" class="input_text" name="verify_password" id="verify_password" value="">
                    </label>
                    <label>
                        <input type="submit" class="button" value="change password">
                    </label>
                </div>
            <?php echo form_close();?>
        </div>
    </body>
</html>
<script src="<?=base_url()?>js/jquery.min.js">
</script>
