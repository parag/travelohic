<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <title>Edit Profile</title>
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
            <h1><a href=#>Register</a></h1>
            <div>
                <h2><font color="red"><?=$e?></font> </h2>
            </div>
        </div>
        <div id="form">
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
                        <input type="submit" class="button" value="edit">
                    </label>
                </div>
            <?php echo form_close();?>
        </div>
    </body>
</html>
<script src="<?=base_url()?>js/jquery.min.js">
</script>
