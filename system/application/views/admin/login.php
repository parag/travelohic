<html>
	<head>
		<title>
			Admin Login
		</title>
		<body>
			 <?php echo form_open_multipart('admin/campaigns/login'); ?>
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
                    <label>
                        <input type="submit" class="button" value="login">
                    </label>
                </div>
            <?php echo form_close();?>
		</body>
	</head>
</html>