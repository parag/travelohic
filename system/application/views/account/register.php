<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <title>Register</title>
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
                    <a href="#">home</a>
                </li>
            </ul>
    	</div>
        <div id="description">
            <span>travelohic.com</span>
            <h1><a href=#>Register</a></h1>
            <div>
                <h2>This step will create a new page in campaigns. Just categorise and tag properly. Make sure image is 1024x800px for best display. The tags, in addition should be seperated by spaces. </h2>
            </div>
        </div>
        <div id="form">
        	<font color="red"><?=$e?></font>
            <?php echo form_open_multipart('accounts/register'); ?>
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
                        <span>verify password</span>
                        <input type="password" class="input_text" name="verify_password" id="verify_password">
                    </label>
					 <label>
                        <span>mobile</span>
                        <input type="text" class="input_text" name="mobile" id="mobile">
                    </label>
					<label>
                        <span>country</span>
                        <select id="country_id" name="country_id" class="input_text">
                        	<? $this->load->view('data/countries'); ?>
                        </select>
                    </label>
                    <label>
                        <span>photo</span>
                        <input type="file" name="userfile" size="12" />
                    </label>
                    <label>
                        <input type="submit" class="button" value="register">
                    </label>
                </div>
            <?php echo form_close();?>
        </div>
    </body>
</html>
<script src="<?=base_url()?>js/jquery.min.js">
</script>
