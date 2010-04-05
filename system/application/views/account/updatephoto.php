<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <title>Update Photo</title>
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
            <h1><a href=#>Update photo</a></h1>
            <div>
                <h2><?=$e?></h2>
            </div>
        </div>
        <div id="form">
            <?php echo form_open_multipart('accounts/updatephoto'); ?>
            	<input type="hidden" name="issend" value="1">
                <div class="box" style="">
                    <label>
                        <span>photo</span>
                        <input type="file" name="userfile" size="12" />
                    </label>
                    <label>
                        <input type="submit" class="button" value="update photo">
                    </label>
                </div>
            <?php echo form_close();?>
        </div>
    </body>
</html>
<script src="<?=base_url()?>js/jquery.min.js">
</script>