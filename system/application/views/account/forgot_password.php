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
            </ul>
    	</div>
        <div id="description">
            <span>travelohic.com</span>
            <h1><a href=#>Forgot Password</a></h1>
            <div>
                <h2><font color="red"><?=$e?></font> </h2>
            </div>
        </div>
        <div id="form">
            <?php echo form_open('accounts/forgot_password'); ?>
            	<input type="hidden" name="issend" value="1">
                <div class="box" style="">
                    <label>
                        <span>your email</span>
                        <input type="input" class="input_text" name="email" id="email" value="">
                        <input type="submit" class="button" value="submit">
                    </label>
                </div>
            <?php echo form_close();?>
        </div>
    </body>
</html>
<script src="<?=base_url()?>js/jquery.min.js">
</script>
