<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <title>Add new campaign</title>
        <link rel="stylesheet" type="text/css" href="<?=base_url()?>css/reset-fonts-grid.css">
        <link rel="stylesheet" type="text/css" href="<?=base_url()?>css/nicescreen.css">
	</head>
	<body>
		<div id="description">
            <span>travelohic.com</span>
            <h1><a href=#>Add Campaign</a></h1>
            <div>
                <h2>This step will create a new page in campaigns. Just categorise and tag properly. Make sure image is 1024x800px for best display. The tags, in addition should be seperated by spaces. </h2>
            </div>
        </div>
		<div id="form">
			<form method="post">
                <div class="box">
                    <label>
                        <span>name</span>
                        <input type="text" class="input_text" name="name" id="name">
                    </label>
					<label>
                        <span>tag</span>
                        <input type="text" class="input_text" name="name" id="name">
                    </label>
					<label>
                        <span>category</span>
                        <select id="category" name="category" class="input_text">
                        	<option value="cat1">cat1</option>
							<option value="cat2">cat2</option>
							<option value="cat3">cat3</option>
                        </select>
                    </label>
					<label>
						<span>photo</span>
						<input type="file" name="photo" size="12" />
					</label>
					<label>
                        <span>description</span>
                        <br/>
                        <br/>
                        <textarea class="message" name="comment" id="comment">
                        </textarea>
                        <br/>
                        <br/>
                        <input type="button" class="button" value="submit" onclick="this.form.submit();">
                    </label>
                </div>
            </form>
		</div>
	</body>
</html>